<? 
/* *******************************************************************************************************
MODUL NAME 			: IMASYS
FILE NAME 			: 
AUTHOR				: 
VERSION				: 1.0
MODIFICATION DOC	:
DESCRIPTION			: 
***************************************************************************************************** */

  /***
  * Entity-base class untuk mengimplementasikan tabel KAPAL_JENIS.
  * 
  ***/
  include_once(APPPATH.'/models/Entity.php');

  class UserLoginMobile extends Entity{ 

	var $query;
    /**
    * Class constructor.
    **/
    function UserLoginMobile()
	{
      $this->Entity(); 
    }
	
	function insert()
	{
		/*Auto-generate primary key(s) by next max value (integer) */
		$this->setField("TOKEN", $this->getToken($this->getField("PEGAWAI_ID")));

		$str = "
				INSERT INTO USER_LOGIN_MOBILE (
				   PEGAWAI_ID, TOKEN, STATUS, KD_PEL, SUB_UNIT, USER_LEVEL) 
				VALUES ( 
				 '".$this->getField("PEGAWAI_ID")."',
				 '".$this->getField("TOKEN")."',
				 '1',
				 '".$this->getField("KD_PEL")."',
				 '".$this->getField("SUB_UNIT")."',
				 '".$this->getField("USER_LEVEL")."' )
				"; 
		$this->idToken = $this->getField("TOKEN");
		$this->query = $str;
		return $this->execQuery($str);
    }


	function insertBearerToken()
	{
		/*Auto-generate primary key(s) by next max value (integer) */
		$this->setField("TOKEN", $this->getBearerToken($this->getField("PEGAWAI_ID")));

		$str = "
				INSERT INTO USER_LOGIN_MOBILE (
				   PEGAWAI_ID, TOKEN, STATUS, KD_PEL, SUB_UNIT, USER_LEVEL) 
				VALUES ( 
				 '".$this->getField("PEGAWAI_ID")."',
				 '".$this->getField("TOKEN")."',
				 '1',
				 '".$this->getField("KD_PEL")."',
				 '".$this->getField("SUB_UNIT")."',
				 '".$this->getField("USER_LEVEL")."' )
				"; 
		$this->idToken = $this->getField("TOKEN");
		$this->query = $str;
		return $this->execQuery($str);
    }


    /** 
    * Cari record berdasarkan array parameter dan limit tampilan 
    * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
    * @param int limit Jumlah maksimal record yang akan diambil 
    * @param int from Awal record yang diambil 
    * @return boolean True jika sukses, false jika tidak 
    **/ 
    function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order="ORDER BY USER_LOGIN_MOBILE_ID ASC")
	{
		$str = "
				SELECT 
				USER_LOGIN_MOBILE_ID, A.PEGAWAI_ID, WAKTU_LOGIN, 
				   TOKEN, STATUS, DEVICE_ID, 
				   TOKEN_FIREBASE, B.NAMA NAMA_PEGAWAI
				FROM USER_LOGIN_MOBILE A
				LEFT JOIN PDS_SIMPEG.PEGAWAI B ON A.PEGAWAI_ID = B.PEGAWAI_ID
				  WHERE 1=1
				"; 
		
		while(list($key,$val) = each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$str .= $statement." ".$order;
		$this->query = $str;
		
		return $this->selectLimit($str,$limit,$from); 
    }
    
	function getTokenPegawaiId($paramsArray=array(), $statement="")
	{
		$str = "SELECT PEGAWAI_ID AS ROWCOUNT FROM USER_LOGIN_MOBILE A
		        WHERE 0=0  ".$statement; 
		
		while(list($key,$val)=each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		$this->select($str); 
		if($this->firstRow()) 
			return $this->getField("ROWCOUNT"); 
		else 
			return 0; 
    }


	function getTokenUserLevel($paramsArray=array(), $statement="")
	{
		$str = "SELECT USER_LEVEL AS ROWCOUNT FROM USER_LOGIN_MOBILE A
		        WHERE 0=0  ".$statement; 
		
		while(list($key,$val)=each($paramsArray))
		{
			$str .= " AND $key = '$val' "; 
		}


		$this->select($str); 
		if($this->firstRow()) 
			return $this->getField("ROWCOUNT"); 
		else 
			return 0; 
    }


  } 
?>