<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class get_token_json extends REST_Controller {
 
    function __construct() {
        parent::__construct();

		$this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
		$this->db->query("alter session set nls_numeric_characters=',.'");
    }
 
    
    // insert new data to entitas
    function index_post() {
		
		/* DEFAULT */
        $reqUsername = $this->input->post('username');
        $reqPassword = $this->input->post('password');
        $result = array();
		
		if (empty($reqUsername) || empty($reqPassword)) {
			$this->response(array('status' => 'fail', 'message' => 'Masukkan username / password', 'code' => 502));
			return;

		}
		
		$this->load->model("Users");
		$users = new Users();
		$users->selectByIdNonAplikasi($reqUsername, md5($reqPassword));

		if ($users->firstRow()) 
		{

			$PEGAWAI_ID = coalesce($users->getField("NIK"), $users->getField("USER_ID"));
			$KD_PEL = $users->getField("KD_PEL");
			$SUB_UNIT = $users->getField("SUB_UNIT");
			$USER_LEVEL = $users->getField("USER_LEVEL");
			$USER_LEVEL_DESC = $users->getField("LEVEL_DESC");
			$FULLNAME = $users->getField("FULLNAME");


			$this->load->model("UserLoginMobile");
			$user_Login_mobile = new UserLoginMobile();
			$user_Login_mobile->setField("PEGAWAI_ID", $PEGAWAI_ID);
			$user_Login_mobile->setField("KD_PEL", $KD_PEL);
			$user_Login_mobile->setField("SUB_UNIT", $SUB_UNIT);
			$user_Login_mobile->setField("USER_LEVEL", $USER_LEVEL);
			$user_Login_mobile->insertBearerToken();

			$TOKEN = $user_Login_mobile->idToken;


        	$this->response(array('status' => 'success', 'token' => $TOKEN, 'user_name' => $FULLNAME, 'user_level' => $USER_LEVEL, 'user_level_desc' => $USER_LEVEL_DESC));
        	return;

		
		}
		
		$this->response(array('status' => 'fail', 'message' => 'Username / password salah.', 'code' => 502));
		
    }
		
 
}
