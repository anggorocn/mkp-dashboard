<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once 'kloader.php';
include_once("libraries/nusoap-0.9.5/lib/nusoap.php");
class kauth
{
	//put your code here
	private $ldap_config = array('server1' => array(
		'host' => '10.0.0.11',
		'useStartTls' => false,
		'accountDomainName' => 'pp3.co.id',
		'accountDomainNameShort' => 'PP3',
		'accountCanonicalForm' => 3,
		'baseDn' => "DC=pp3,DC=co,DC=id"
	));


	function __construct()
	{
		//        load the auth class
		kloader::load('Zend_Auth');
		kloader::load('Zend_Auth_Storage_Session');

		//        set the unique storege
		Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session("p3rumBUlogOffice"));
	}



	public function portalAuthenticate($username,$credential) {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
		
		$CI =& get_instance();
		$CI->load->model("Users");	
		$CI->load->model("UserLevel");	
		
		ini_set("soap.wsdl_cache_enabled", "0");
		//kloader::load('Zend_Soap_Client');
		$wsdl = 'http://sittl.teluklamong.co.id/wsouth.asmx?wsdl';
		//$cl = new Zend_Soap_Client($wsdl);
		//$rv = $cl->valLoginAkun(array('xIDAPLIKASI'=>25,'xUsername'=>$username,'xPassword'=>$password));
		
		 $client=new SoapClient("http://sittl.teluklamong.co.id/wsouth.asmx?wsdl");
        $rv = $client->valLoginAkun([
            "xIDAPLIKASI"=>"40",
            "xUsername"=>$username,
            "xPassword"=>$credential
        ]);

		switch ($rv->valLoginAkunResult->responType) {
			case 'S':

				$identity = new stdClass();
				$identity->USER_LOGIN_ID = $rv->valLoginAkunResult->USERNAME;
				$identity->NIP = $rv->valLoginAkunResult->USERNAME;
				$identity->USER_LOGIN = $rv->valLoginAkunResult->USERNAME;
				$identity->NAMA = $rv->valLoginAkunResult->NAMA;
				$identity->JABATAN = $rv->valLoginAkunResult->NAMA_JABATAN;
				
				
				$users = new Users();
				$users->selectByIdPegawai($username);

				if ($users->firstRow()) {

					$identity->USER_GROUP_ID = $rv->valLoginAkunResult->HAKAKSES;
					$identity->USER_GROUP = $rv->valLoginAkunResult->HAKAKSES_DESC;
					$identity->HAKAKSES = 	  $rv->valLoginAkunResult->HAKAKSES;
					$identity->HAKAKSES_DESC = $rv->valLoginAkunResult->HAKAKSES_DESC;
					
					//GET THE USER LEVEL
					$tRole = explode(',', $rv->valLoginAkunResult->HAKAKSES);

					if (count($tRole) > 1)
					{
						$auth->getStorage()->write($identity);
						return "MULTIROLE";
					}

					$user_group = new UserLevel();
					$user_group->selectByParams(array('KODE'=> $rv->valLoginAkunResult->HAKAKSES));
					if(!$user_group->firstRow())
					{
					   return "Role tidak ditemukan!!";
					}		


					$identity->LEVEL = $user_group->getField("USER_LEVEL");
					$identity->LEVEL_DESC = $user_group->getField("LEVEL_DESC");
					$identity->TRANSAKSI = $user_group->getField("TRANSAKSI");
					$identity->PELUNASAN = $user_group->getField("PELUNASAN");
					$identity->LOCKING_PIUTANG = $user_group->getField("LOCKING_PIUTANG");
					$identity->REPORT = $user_group->getField("REPORT");
					$identity->DASHBOARD = $user_group->getField("DASHBOARD");
					$identity->MASTER_DATA = $user_group->getField("MASTER_DATA");
					$identity->VIEW_ALL_TRANS = $user_group->getField("VIEW_ALL_TRANS");
					$identity->INQUIRY_BANK = $user_group->getField("INQUIRY_BANK");
					$identity->SERVICES_ID_ACCESS = $user_group->getField("SERVICES_ID_ACCESS");
					$identity->SERVICES_KODE_ACCESS = $user_group->getField("SERVICES_KODE_ACCESS");




					$identity->USERID = $users->getField("USER_ID");
					$identity->USERNAME = $users->getField("USERNAME");
					$identity->FULLNAME = $users->getField("FULLNAME");
					$identity->USERPASS = $users->getField("USERPASS");
					$identity->POSITION = $users->getField("POSITION");
					$identity->NAMA_POSISI = $users->getField("NAMA_POSISI");
					$identity->KD_PEL = $users->getField("KD_PEL");
					$identity->NAMA_PEL = $users->getField("NAMA_PEL");
					$identity->SUB_UNIT = $users->getField("SUB_UNIT");


					$PEGAWAI_ID = $users->getField("NIK");
					$KD_PEL = $users->getField("KD_PEL");
					$SUB_UNIT = $users->getField("SUB_UNIT");
					$USER_LEVEL = $users->getField("USER_LEVEL");


					$CI->load->model("UserLoginMobile");
					$user_Login_mobile = new UserLoginMobile();
					$user_Login_mobile->setField("PEGAWAI_ID", $PEGAWAI_ID);
					$user_Login_mobile->setField("KD_PEL", $KD_PEL);
					$user_Login_mobile->setField("SUB_UNIT", $SUB_UNIT);
					$user_Login_mobile->setField("USER_LEVEL", $USER_LEVEL);
					$user_Login_mobile->insert();

					$identity->TOKEN = $user_Login_mobile->idToken;
					


					$auth->getStorage()->write($identity);

					if ($users->getField("USER_ID") == "")
						$pReturn = "NRP tidak terdaftar pada FINA";
					else
						$pReturn = "1";

				}
				else
					$pReturn = "NRP tidak terdaftar pada FINA";

				return $pReturn;
				break;
			case 'E-002':
				return $rv->valLoginAkunResult->responType.' : '.$rv->valLoginAkunResult->responText;
				break;
			case 'E-018':
					return $rv->valLoginAkunResult->responType.' : '
															.$rv->valLoginAkunResult->responText
															.', <a href="'.$rv->valLoginAkunResult->URL_CP.'"> KLIK DISINI UNTUK UPDATE</a>';
				break;
			default:
				if(!empty($rv->valLoginAkunResult->responType))
					return $rv->valLoginAkunResult->responType.' : '.$rv->valLoginAkunResult->responText;
				else
					return 'Username/Password Salah!';
				break;
		}	 
		
    }
	


	public function localAuthenticate($username, $credential)
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();

		$CI = &get_instance();
		$CI->load->model("Users");
		// $CI->load->model("UserType");

		$users = new Users();
		$users->selectByIdPassword($username, md5($credential));

		if ($users->firstRow()) {

			$identity = new stdClass();

			$identity->USERID = $users->getField("USER_ID");
			$identity->USERNAME = $users->getField("USERNAME");
			$identity->FULLNAME = $users->getField("FULLNAME");
			$identity->USERPASS = $users->getField("USERPASS");
			$identity->LEVEL = $users->getField("USER_LEVEL");
			$identity->LEVEL_DESC = $users->getField("LEVEL_DESC");
			$identity->TRANSAKSI = $users->getField("TRANSAKSI");
			$identity->PELUNASAN = $users->getField("PELUNASAN");
			$identity->LOCKING_PIUTANG = $users->getField("LOCKING_PIUTANG");
			$identity->REPORT = $users->getField("REPORT");
			$identity->DASHBOARD = $users->getField("DASHBOARD");
			$identity->MASTER_DATA = $users->getField("MASTER_DATA");
			$identity->VIEW_ALL_TRANS = $users->getField("VIEW_ALL_TRANS");
			$identity->INQUIRY_BANK = $users->getField("INQUIRY_BANK");
			$identity->SERVICES_ID_ACCESS = $users->getField("SERVICES_ID_ACCESS");
			$identity->SERVICES_KODE_ACCESS = $users->getField("SERVICES_KODE_ACCESS");

			$identity->POSITION = $users->getField("POSITION");
			$identity->NAMA_POSISI = $users->getField("NAMA_POSISI");
			$identity->KD_PEL = $users->getField("KD_PEL");
			$identity->NAMA_PEL = $users->getField("NAMA_PEL");
			$identity->SUB_UNIT = $users->getField("SUB_UNIT");



			$PEGAWAI_ID = $users->getField("NIK");
			$KD_PEL = $users->getField("KD_PEL");
			$SUB_UNIT = $users->getField("SUB_UNIT");
			$USER_LEVEL = $users->getField("USER_LEVEL");

	

			$CI->load->model("UserLoginMobile");
			$user_Login_mobile = new UserLoginMobile();
			$user_Login_mobile->setField("PEGAWAI_ID", $PEGAWAI_ID);
			$user_Login_mobile->setField("KD_PEL", $KD_PEL);
			$user_Login_mobile->setField("SUB_UNIT", $SUB_UNIT);
			$user_Login_mobile->setField("USER_LEVEL", $USER_LEVEL);
			$user_Login_mobile->insert();

			$identity->TOKEN = $user_Login_mobile->idToken;

			
			$auth->getStorage()->write($identity);

			if ($users->getField("USER_ID") == "")
				$pReturn = "Username atau password salah.";
			else
				$pReturn = "1";
		} 
		else
		{

			$users = new Users();
			$users->selectByIdPegawai($username);

			if ($users->firstRow()) {

				$identity = new stdClass();
				$identity->USERID = $users->getField("USER_ID");
				$identity->USERNAME = $users->getField("USERNAME");
				$identity->FULLNAME = $users->getField("FULLNAME");
				$identity->USERPASS = $users->getField("USERPASS");
				$identity->LEVEL = $users->getField("USER_LEVEL");
				$identity->LEVEL_DESC = $users->getField("LEVEL_DESC");
				$identity->TRANSAKSI = $users->getField("TRANSAKSI");
				$identity->PELUNASAN = $users->getField("PELUNASAN");
				$identity->LOCKING_PIUTANG = $users->getField("LOCKING_PIUTANG");
				$identity->REPORT = $users->getField("REPORT");
				$identity->DASHBOARD = $users->getField("DASHBOARD");
				$identity->MASTER_DATA = $users->getField("MASTER_DATA");
				$identity->VIEW_ALL_TRANS = $users->getField("VIEW_ALL_TRANS");
				$identity->INQUIRY_BANK = $users->getField("INQUIRY_BANK");
				$identity->SERVICES_ID_ACCESS = $users->getField("SERVICES_ID_ACCESS");
				$identity->SERVICES_KODE_ACCESS = $users->getField("SERVICES_KODE_ACCESS");

				$identity->POSITION = $users->getField("POSITION");
				$identity->NAMA_POSISI = $users->getField("NAMA_POSISI");
				$identity->KD_PEL = $users->getField("KD_PEL");
				$identity->NAMA_PEL = $users->getField("NAMA_PEL");
				$identity->SUB_UNIT = $users->getField("SUB_UNIT");


				$PEGAWAI_ID = $users->getField("NIK");
				$KD_PEL = $users->getField("KD_PEL");
				$SUB_UNIT = $users->getField("SUB_UNIT");
				$USER_LEVEL = $users->getField("USER_LEVEL");


				$CI->load->model("UserLoginMobile");
				$user_Login_mobile = new UserLoginMobile();
				$user_Login_mobile->setField("PEGAWAI_ID", $PEGAWAI_ID);
				$user_Login_mobile->setField("KD_PEL", $KD_PEL);
				$user_Login_mobile->setField("SUB_UNIT", $SUB_UNIT);
				$user_Login_mobile->setField("USER_LEVEL", $USER_LEVEL);
				$user_Login_mobile->insert();

				$identity->TOKEN = $user_Login_mobile->idToken;
				


				$auth->getStorage()->write($identity);

			if ($users->getField("USER_ID") == "")
				$pReturn = "Username atau password salah.";
			else
				$pReturn = "1";

			}
		}

		if($pReturn == "")
			$pReturn = "Username atau password salah.";

		return $pReturn;
	}

	public function reAuthenticate($username, $credential)
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();

		$CI = &get_instance();
		$CI->load->model("Users");
		// $CI->load->model("UserType");

		$users = new Users();
		$users->selectByPegawai($username);

		if ($users->firstRow()) {

			$identity = new stdClass();

			$identity->USERID = $users->getField("USER_ID");
			$identity->USERNAME = $users->getField("USERNAME");
			$identity->FULLNAME = $users->getField("FULLNAME");
			$identity->USERPASS = $users->getField("USERPASS");
			$identity->LEVEL = $users->getField("USER_LEVEL");
			$identity->MENUMARKETING = $users->getField("MENUMARKETING");
			$identity->MENUFINANCE = $users->getField("MENUFINANCE");
			$identity->MENUPRODUCTION = $users->getField("MENUPRODUCTION");
			$identity->MENUDOCUMENT = $users->getField("MENUDOCUMENT");
			$identity->MENUSEARCH = $users->getField("MENUSEARCH");
			$identity->MENUOTHERS = $users->getField("MENUOTHERS");

			$auth->getStorage()->write($identity);

			if ($users->getField("USER_ID") == "")
				return false;
			else
				return true;
		} else
			return false;
	}


	public function mobileAuthenticate($username, $credential)
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();

		$CI = &get_instance();
		$CI->load->model("Users");
		// $CI->load->model("UserType");

		$users = new Users();
		$users->selectByIdPasswordMobile($username, md5($credential));

		if ($users->firstRow()) {

			$identity = new stdClass();

			$identity->PEGAWAI_ID = $users->getField("NIP");
			$identity->CABANG_ID = $users->getField("CABANG_ID");
			$identity->NO_SEKAR = $users->getField("NO_SEKAR");
			$identity->NRP = $users->getField("NRP");
			$identity->NIP = $users->getField("NIP");
			$identity->NAMA = $users->getField("NAMA");
			$identity->NAMA_PANGGILAN = $users->getField("NAMA_PANGGILAN");
			$identity->JENIS_KELAMIN = $users->getField("JENIS_KELAMIN");
			$identity->TEMPAT_LAHIR = $users->getField("TEMPAT_LAHIR");
			$identity->TANGGAL_LAHIR = $users->getField("TANGGAL_LAHIR");
			$identity->UNIT_KERJA = $users->getField("UNIT_KERJA");
			$identity->ALAMAT = $users->getField("ALAMAT");
			$identity->NOMOR_HP = $users->getField("NOMOR_HP");
			$identity->EMAIL_PRIBADI = $users->getField("EMAIL_PRIBADI");
			$identity->EMAIL_BULOG = $users->getField("EMAIL_BULOG");
			$identity->NOMOR_WA = $users->getField("NOMOR_WA");
			$identity->GOLONGAN_DARAH = $users->getField("GOLONGAN_DARAH");
			$identity->VALIDASI = $users->getField("VALIDASI");

			$auth->getStorage()->write($identity);

			if ($users->getField("PEGAWAI_ID") == "")
				return "0";
			else
				return "1";
		} else
			return "0";
	}

	public function multiAkses($groupId, $username)
	{

		$auth = Zend_Auth::getInstance();
		$CI = &get_instance();


		$CI->load->model("Users");

		$users = new Users();
		$users->selectByIdPegawai($username);


		if ($users->firstRow()) {

			$CI->load->model("UserLevel");
			$user_group = new UserLevel();
			$user_group->selectByParams(array('KODE'=> $groupId));
			if(!$user_group->firstRow())
			{
			   return "Role tidak ditemukan!!";
			}		


			$identity->LEVEL = $user_group->getField("USER_LEVEL");
			$identity->LEVEL_DESC = $user_group->getField("LEVEL_DESC");
			$identity->TRANSAKSI = $user_group->getField("TRANSAKSI");
			$identity->PELUNASAN = $user_group->getField("PELUNASAN");
			$identity->LOCKING_PIUTANG = $user_group->getField("LOCKING_PIUTANG");
			$identity->REPORT = $user_group->getField("REPORT");
			$identity->DASHBOARD = $user_group->getField("DASHBOARD");
			$identity->MASTER_DATA = $user_group->getField("MASTER_DATA");
			$identity->VIEW_ALL_TRANS = $user_group->getField("VIEW_ALL_TRANS");
			$identity->INQUIRY_BANK = $user_group->getField("INQUIRY_BANK");
			$identity->SERVICES_ID_ACCESS = $user_group->getField("SERVICES_ID_ACCESS");
			$identity->SERVICES_KODE_ACCESS = $user_group->getField("SERVICES_KODE_ACCESS");


			$identity->USERID = $users->getField("USER_ID");
			$identity->USERNAME = $users->getField("USERNAME");
			$identity->FULLNAME = $users->getField("FULLNAME");
			$identity->USERPASS = $users->getField("USERPASS");
			$identity->POSITION = $users->getField("POSITION");
			$identity->NAMA_POSISI = $users->getField("NAMA_POSISI");
			$identity->KD_PEL = $users->getField("KD_PEL");
			$identity->NAMA_PEL = $users->getField("NAMA_PEL");
			$identity->SUB_UNIT = $users->getField("SUB_UNIT");

			$PEGAWAI_ID = $users->getField("NIK");
			$KD_PEL = $users->getField("KD_PEL");
			$SUB_UNIT = $users->getField("SUB_UNIT");
			$USER_LEVEL = $users->getField("USER_LEVEL");


			$CI->load->model("UserLoginMobile");
			$user_Login_mobile = new UserLoginMobile();
			$user_Login_mobile->setField("PEGAWAI_ID", $PEGAWAI_ID);
			$user_Login_mobile->setField("KD_PEL", $KD_PEL);
			$user_Login_mobile->setField("SUB_UNIT", $SUB_UNIT);
			$user_Login_mobile->setField("USER_LEVEL", $USER_LEVEL);
			$user_Login_mobile->insert();

			$identity->TOKEN = $user_Login_mobile->idToken;

			$auth->getStorage()->write($identity);

			if ($users->getField("USER_ID") == "")
				$pReturn = "NRP tidak terdaftar pada FINA";
			else
				$pReturn = "1";
		}


		return $pReturn;

	}

	public function getInstance()
	{
		return Zend_Auth::getInstance();
	}
}
