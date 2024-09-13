<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class locking_piutang_json extends REST_Controller {
 
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
        $reqKodePelanggan = $this->input->post("kode_pelanggan");
        $result = array();

        $this->load->model('UserLoginMobile');
        $user_login_mobile = new UserLoginMobile();
        $reqUserId = $user_login_mobile->getTokenPegawaiId(array("TOKEN" => $reqToken, "STATUS" => '1'));
        $reqUserLevel = $user_login_mobile->getTokenUserLevel(array("TOKEN" => $reqToken, "STATUS" => '1'));


        if($reqUserLevel == "3")
        {}
        else 
        {
            $this->response(array('status' => 'fail', 'message' => 'Akun tidak memiliki hak akses, hubungi administrator.', 'code' => 502));
            return;
        }


        $rowResult = $this->db->query(" SELECT KODE, NAME NAMA FROM COMPANY WHERE TRIM(KODE) = TRIM('$reqKodePelanggan') ")->row();

        $reqKodePelanggan = $rowResult->KODE;
        $reqNamaPelanggan = $rowResult->NAMA;


        if($reqKodePelanggan == "")
        {

            $this->response(array('status' => 'fail', 'message' => 'Kode customer tidak dikenali.', 'code' => 502));
            return; 

        }

        $statement_privacy .= " AND PELANGGAN_KODE = '$reqKodePelanggan' ";
        $statement_privacy .= " AND A.REC_STAT = '0'  ";
        $statement_privacy .= " AND A.DUE_DATE IS NOT NULL AND A.DUE_DATE < SYSDATE  ";
            
        $sql = " SELECT 
                SUM(SISA_TAGIHAN)  SISA_TAGIHAN
                FROM TAGIHAN_CETAK_NOTA A
                WHERE  1 = 1 ".$statement_privacy;

        $SISA_TAGIHAN = $this->db->query($sql)->row()->SISA_TAGIHAN;

        $SISA_TAGIHAN = coalesce($SISA_TAGIHAN, 0);

        if($SISA_TAGIHAN > 0)
        {
            $isLocking = "Y";
            $message = "Locking piutang ".$reqNamaPelanggan." sebesar Rp. ".numberToIna($SISA_TAGIHAN).". Harap dilakukan pelunasan / menghubungi Bagian Keuangan PT Terminal Teluk Lamong";
        }
        else
        {
            $isLocking = "T";
            $message   = $reqNamaPelanggan." tidak memiliki piutang.";
        }
             
        $this->response(array('status' => 'success', 'message' => 'success', 'code' => 200, 
                              'pelanggan_code' => $reqKodePelanggan, 
                              'pelanggan_nama' => $reqNamaPelanggan, 
                              'is_locking' => $isLocking, 
                              'piutang' => $SISA_TAGIHAN,                              
                              'result' => $message));
        
    }
 
}