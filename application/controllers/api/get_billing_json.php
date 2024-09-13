<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class get_billing_json extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        
        
        $this->load->library('Kauth');
    }
 
    // show data entitas
    function index_get() {
        
    }
    
   
    // insert new data to entitas
    function index_post() {


       
        $reqToken = getallheaders()["Authorization"];
        $reqToken = trim(substr($reqToken, 7));
        $reqKodeBayar = $this->input->post('kode_bayar');

        $this->load->model('UserLoginMobile');
        $user_login_mobile = new UserLoginMobile();
        $result = array();
            
        $reqUserId = $user_login_mobile->getTokenPegawaiId(array("TOKEN" => $reqToken, "STATUS" => '1'));
        if($reqUserId == "" || $reqUserId == "0")
        {
            $this->response(array('status' => 'fail', 'message' => 'Token anda berakhir.', 'code' => 502));
            return;
        }

        if(trim($reqKodeBayar) == "")
        {
            $this->response(array('status' => 'fail', 'message' => 'Masukkan kode bayar.', 'code' => 502));
            return;
        }

        


        $rowResult = $this->db->query(" select bank_pembayaran_id, bank_pembayaran from users where user_id = '$reqUserId' ")->row();

        $reqBankPembayaranId = $rowResult->BANK_PEMBAYARAN_ID;
        $reqBankPembayaran = $rowResult->BANK_PEMBAYARAN;
        if($reqBankPembayaranId == "" || $reqBankPembayaranId == "0")
        {
            $this->response(array('status' => 'fail', 'message' => 'Akun tidak memiliki hak akses, hubungi administrator.', 'code' => 502));
            return;
        }


        $statement .= " AND NVL(FLAG_LUNAS, '0') = '0' ";


        if($reqKodeBayar == "")
        {}
        else
          $statement .= " AND KD_BAYAR = '$reqKodeBayar' ";
            
        $sql = " SELECT 
                    ID, KD_BAYAR, 
                       CUSTOMER_ID, CUSTOMER_NAME, NO_INVOICE, 
                       TO_CHAR(TGL_INVOICE, 'DD-MM-YYYY') TGL_INVOICE, DESKRIPSI, JENIS_INVOICE, 
                       JML_INVOICE, 
                       REMARK, FLAG_LUNAS, CREATED_BY, TO_CHAR(CREATED_DATE, 'DD-MM-YYYY HH24:MI:SS')  CREATED_DATE
                    FROM KODE_BAYAR_LOG WHERE STATUS = 'A' ".$statement;

        $result = $this->db->query($sql)->row();

        if($result->FLAG_LUNAS == "1")
        {
            $this->response(array('status' => 'fail', 'message' => 'Tagihan telah dilunasi.', 'code' => 502));
            return;
        }

        if($result->KD_BAYAR == "")
        {
            $this->response(array('status' => 'fail', 'message' => 'Kode bayar tidak ditemukan.', 'code' => 502));
            return;
        }
             
       $this->response(array('status' => 'success', 'message' => 'success', 'code' => 200, 
                            'kode_bayar' => $result->KD_BAYAR, 
                            'customer' => $result->CUSTOMER_NAME, 
                            'description' => $result->DESKRIPSI, 
                            'amount' => $result->JML_INVOICE
                    ));

    }
 
}