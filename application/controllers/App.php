<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("functions/image.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class App extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//kauth
		if (!$this->kauth->getInstance()->hasIdentity()) {
			// redirect('login');
		}
		// $this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
		// $this->db->query("alter session set nls_numeric_characters=',.'");

		// $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));	

		// $this->TOKEN_FREE = "AGHRIS_MOBILE"; // BUAT TOKEN TANPA HARUS LOGIN
		// $this->KEY = "270F672B-3CEF-4C6C-A362-359B8B0CAEA1"; // KEY AGHRIS

		
		// $this->NIK_SAP 			= "3023255";
		// // $this->NIK_SAP 			= $this->session->userdata('NIK_SAP');
		// $this->ROLEID 			= $this->session->userdata('ROLEID');
		// $this->PTPN 			= $this->session->userdata('PTPN');
		// $this->NIK_INTERNAL 	= $this->session->userdata('NIK_INTERNAL');
		// $this->NIK_SAP_ASAL 	= $this->session->userdata('NIK_SAP_ASAL');
		// $this->PTPN_ASAL 		= $this->session->userdata('PTPN_ASAL');
		// $this->TOKEN 			= $this->session->userdata('TOKEN');
		// $this->CUTI_ACCESS 		= $this->session->userdata('CUTI_ACCESS');
		// $this->SPD_ACCESS 		= $this->session->userdata('SPD_ACCESS');
		// $this->EOFFICE_ACCESS 	= $this->session->userdata('EOFFICE_ACCESS');
		// $this->DASHBOARD_ACCESS = $this->session->userdata('DASHBOARD_ACCESS');


	}

	function cacheName($reqParam, $reqToken)
	{
		return strtoupper("CACHE_".$reqParam."_".$this->router->class."_".$reqToken);	
	}

	public function index()
	{
		
		$menu = $this->input->get("menu");
		$bahasa = $this->input->get("bahasa");
		$page = $this->input->get("pg");
		$lang = $_SESSION['lang'];
		$pg = $this->uri->segment(3, "home");
		$reqParse1 = $this->uri->segment(4, "");
		$reqParse2 = $this->uri->segment(5, "");
		$reqParse3 = $this->uri->segment(6, "");
		$reqParse4 = $this->uri->segment(7, "");
		$reqParse5 = $this->uri->segment(5, "");

		$reqId = $this->input->get("reqId");


		$this->load->library('kauth');

		/*
		$cacheName = $this->cacheName($pg, $this->TOKEN_FREE);
		$cache = $this->cache->get($cacheName);
        if (!empty($cache)) 
        {
			$arrResult = $cache;
        }
        else
        {
			$arrResultHome = $this->kauth->getArrayData(
				array(
					"user-access" => $this->TOKEN_FREE, "key" => $this->KEY, "nik-sap-target" => $this->NIK_SAP), 
					"pb-01-1-get-profile"
				);	
			$this->cache->save($cacheName, $arrResultHome, 43200); // 12 jam
        }
		*/

        /* HOME */

		$arrResultHome = array();

		



		$view = array(
			'pg' => $pg,
			'menu' => $menu,
			'bahasa' => $bahasa,
			'linkBack' => $file . "_detil",
			'reqParse1' => $reqParse1,
			'reqParse2'	=> $reqParse2,
			'reqParse3'	=> $reqParse3,
			'reqParse4'	=> $reqParse4,
			'reqParse5'	=> $reqParse5,
			'reqShowRecord' => $reqShowRecord,
			'arrResultHome' => ($arrResultHome),
			'arrResult' => ($arrResult),
			'uploads_url' => $uploads_url,
			'status' => $status,
			'message' => $message

		);
		// print_r($view);exit;

		$data = array(
			'breadcrumb' => $breadcrumb,
			'content' => $this->load->view("main/" . $pg, $view, TRUE),
			'pg' => $pg,
			'menu' => $menu,
			'bahasa' => $bahasa,
			'reqParse1' => $reqParse1,
			'reqParse2'	=> $reqParse2,
			'reqParse3'	=> $reqParse3,
			'reqParse4'	=> $reqParse4,
			'reqParse5'	=> $reqParse5,
			'reqShowRecord' => $reqShowRecord,
			'arrResultHome' => ($arrResultHome),
			'arrResult' => ($arrResult),
			'uploads_url' => $uploads_url,
			'status' => $status,
			'message' => $message
		);
		
		$this->load->view('main/index', $data);
		
	}

	public function error404(){
		$this->load->view("error/404"); 
	}


	public function logout()
	{
		$paramGet = "niksap=".$this->NIK_SAP;
		$paramGet .= "&token=WEB_AGHRIS";


	    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item("base_web")."access/logout?".$paramGet);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		// print_r($response);

		curl_close($ch);

		$this->session->sess_destroy();
		session_destroy();
		// print_r($this->session);
		redirect ('login');
	}
	
	public function loadUrl()
	{

		$reqFolder = $this->uri->segment(3, "");
		$reqFilename = $this->uri->segment(4, "");
		$reqParse1 = $this->uri->segment(5, "");
		$reqParse2 = $this->uri->segment(6, "");
		$reqParse3 = $this->uri->segment(7, "");
		$reqParse4 = $this->uri->segment(8, "");
		$reqParse5 = $this->uri->segment(9, "");

		if($reqFilename == "popup_nego")
		{
            $reqOrderId = $this->input->get("reqId");
            $reqKomponenId = $this->input->get("reqRowId");
			$arrResultPortalTerbaru = $this->kauth->getArrayData(array("reqToken" => $this->TOKEN, "reqOrderId" => $reqOrderId, "reqKomponenId" => $reqKomponenId), "portal_order_komponen_chat_json");
		}

		$data = array(
			'reqParse1' => urldecode($reqParse1),
			'reqParse2' => urldecode($reqParse2),
			'reqParse3' => urldecode($reqParse3),
			'reqParse4' => urldecode($reqParse4),
			'reqParse5' => urldecode($reqParse5),
			'arrResultPortalTerbaru' => ($arrResultPortalTerbaru["result"]),
		);
		if ($reqFolder == "main")
			$this->session->set_userdata('currentUrl', $reqFilename);

		$this->load->view($reqFolder . '/' . $reqFilename, $data);
	}

	function kontak()
	{
		session_start();

	    require(APPPATH.'/libraries/iconcaptcha/src/captcha-session.class.php');
    	require(APPPATH.'/libraries/iconcaptcha/src/captcha.class.php');
	    
    	IconCaptcha::setIconsFolderPath(realpath('lib/iconcaptcha/assets/icons/'));

	    if(!empty($_POST)) {
	        if(IconCaptcha::validateSubmission($_POST)) {
	        	$status  = "success";
	            $message =  '';
	        } else {
	        	$status  = "failed";
	            $message = "<font color='red'>Validasi captcha gagal.</font>"; //. json_decode(IconCaptcha::getErrorMessage())->error;

			    $arrResult["status"] = $status;
			    $arrResult["message"] = $message;
			    echo json_encode($arrResult);
			    return;

	        }
	    }

	    $reqNama 	= $this->input->post("reqNama"); 
	    $reqEmail 	= $this->input->post("reqEmail"); 
	    $reqSubjek	= $this->input->post("reqSubjek"); 
	    $reqPesan	= $this->input->post("reqPesan");

	    $reqIp		= _ip(); 

	    $ch = curl_init();
		$data = array("reqNama" => $reqNama, 
					  "reqEmail" => $reqEmail, 
					  "reqSubjek" => $reqSubjek, 
					  "reqPesan" => $reqPesan, 
					  "reqIp" => $reqIp);
		$payload = ($data);


		curl_setopt($ch, CURLOPT_URL, $this->config->item("base_api")."kontak_json");
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);


	    $arrResult["status"] = $status;
	    $arrResult["message"] = $message;

	    echo $response;


	}


    function login()
	{
		$reqUser 	= $this->input->post("reqUser");
		$reqPasswd 	= $this->input->post("reqPasswd");

		$reqUser = strtolower($reqUser);
		$reqPasswd = strtolower($reqPasswd);

		if(empty($reqUser) and empty($reqPasswd))
		{

			$data['message'] = "Harap masukkan username dan password.";

			$this->load->view('login/login', $data);

			return;
		}

		$paramGet = "niksap=".$reqUser;
		$paramGet .= "&password=".$reqPasswd;
		$paramGet .= "&status-login=1";
		$paramGet .= "&device_id=WEB";
		$paramGet .= "&imei=";
		$paramGet .= "&token-firebase=WEB_AGHRIS";


	    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item("base_web")."access/login?".$paramGet);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		$res = json_decode($response);

		$result = $res[0];

		$ada = $result->ADA;

		if($ada == "0")
		{

			$data['message'] = "Username atau password salah.";

			$this->load->view('login/login', $data);

			return;
		}	

		$reqNikSap 			= $result->NIK_SAP;  
		$reqRole 			= $result->ROLEID;  
		$reqPtpn 			= $result->PTPN;
		$reqNikInternal 	= $result->NIK_INTERNAL; 
		$reqNikSapAsal  	= $result->NIK_SAP_ASAL;
		$reqPtpnAsal  		= $result->PTPN_ASAL;
		$reqToken 			= $result->TOKEN;
		$reqCutiAccess 		= $result->CUTI_ACCESS;
		$reqSpdAccess	 	= $result->SPD_ACCESS;
		$reqEofficeAccess 	= $result->EOFFICE_ACCESS;
		$reqDashboardAccess = $result->DASHBOARD_ACCESS;

		$this->session->set_userdata('NIK_SAP', $reqNikSap);
		$this->session->set_userdata('ROLEID', $reqRole);
		$this->session->set_userdata('PTPN', $reqPtpn);
		$this->session->set_userdata('NIK_INTERNAL', $reqNikInternal);
		$this->session->set_userdata('NIK_SAP_ASAL', $reqNikSapAsal);
		$this->session->set_userdata('PTPN_ASAL', $reqPtpnAsal);
		$this->session->set_userdata('TOKEN', $reqToken);
		$this->session->set_userdata('CUTI_ACCESS', $reqCutiAccess);
		$this->session->set_userdata('SPD_ACCESS', $reqSpdAccess);
		$this->session->set_userdata('EOFFICE_ACCESS', $reqEofficeAccess);
		$this->session->set_userdata('DASHBOARD_ACCESS', $reqDashboardAccess);

		redirect('app');

	}

	function tiket_add()
	{
		$data = $this->input->post();
		$data["reqToken"] = $this->TOKEN;
		$result = $this->kauth->getArrayData($data, "portal_tiket_monitoring_json", "POST");
		
		redirect("app/index/list_tiket");
	}

	function ambil_data_jabatan()
	{
		$data = array("user-access" => $this->TOKEN_FREE);
		$arrResult = $this->kauth->getArrayDataSQL($data, "hr_perf_m_jabatan_json");	
		
		$arrResult["data"] = $arrResult["result"]["data"];

		echo json_encode($arrResult);
	}
	
}
