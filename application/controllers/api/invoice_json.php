<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class invoice_json extends REST_Controller {
 
    function __construct() {
        parent::__construct();
		
		
		$this->load->library('Kauth');
    }
 
    // show data entitas
	function index_get() {
		
    $reqToken = $this->input->get('token');

    $this->load->model('UserLoginMobile');
    $user_login_mobile = new UserLoginMobile();
    $result = array();
        
		$reqPegawaiId = $user_login_mobile->getTokenPegawaiId(array("TOKEN" => $reqToken, "STATUS" => '1'));
		if($reqPegawaiId == "" || $reqPegawaiId == "0")
		{
			$this->response(array('status' => 'fail', 'message' => 'Token anda berakhir.', 'code' => 502));
			return;
		}

		
		$result = $this->db->query(" SELECT 
                       TRIM(ORDER_NO) ORDER_NO, 
                       SHA256.ENCRYPT(ORDER_NO) ORDER_NO_ENCRYPT, 
                       TRIM(INVOICE_NO) INVOICE_NO, 
                       TRIM(NO_EPB) NO_EPB, 
                       TRIM(NO_FAKTUR) NO_FAKTUR, EPB_COUNT, TRIM(ORDER_SERVICE_CODE) ORDER_SERVICE_CODE, 
                       TRIM(A.CUSTOMER) CUSTOMER, 
                       TRIM(B.FULL_NAME) CUSTOMER_NAME,
                       B.ADDR1 CUSTOMER_ADDR,
                       B.TAX_NO_NPWP CUSTOMER_NPWP,
                       A.PAYMENT_TIME, 
                       PERCENT_PPN, PPN_SUBSIDY, 
                       CURRENCY, 
                       MATERIAL_AMOUNT, 
                       PPN_AMOUNT, 
                       TOTAL_AMOUNT, 
                       ADM_AMOUNT, 
                       INVOICE_AMOUNT,
                       SISA_PIUTANG_AMOUNT, 
                       PERCENT_DISCOUNT, DISCOUNT_AMOUNT, 
                       PPN_SUBSIDY_AMOUNT, 
                       DANGEROUS_YN, A.USERID, 
                       JPJ, JKM, 
                       GL_CODE, JENIS_PEMBAYARAN, JENIS_DOC, 
                       TGL_DOC, DO_EXPIRED, MATERAI_AMOUNT, 
                       CUSTOMER_PENGURUS, CREATED_DATE, CREATED_USERID, 
                       FL_20_DG, FL_40_DG, FL_45_DG, 
                       RF_20_DG, RF_40_DG, RF_45_DG, 
                       OH_20_DG, OH_40_DG, OH_45_DG, 
                       FL_CHS_20_DG, FL_CHS_40_DG, FL_CHS_45_DG, 
                       TOTAL_BOOKING, JAMINAN_AMOUNT, A.BANK_CD, 
                       ORDER_NO_PREV, PREV_INVOICE_NO
                    FROM INVOICE_HEADER A
                    LEFT JOIN CUSTOMER B ON TRIM(A.CUSTOMER) = TRIM(B.CUSTOMER) ")->result_array();
		 
		$this->response(array('status' => 'success', 'message' => 'success', 'code' => 200, 'result' => $result));
		
		
    }
	
   
    // insert new data to entitas
    function index_post() {
		
		
    }
 
    // update data entitas
    function index_put() {

    }
 
    // delete entitas
    function index_delete() {
    }
 
}