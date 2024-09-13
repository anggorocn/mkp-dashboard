<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class kode_bayar_json extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        
        
        $this->load->library('Kauth');
    }
 
    // show data entitas
    function index_get() {



        $reqToken = getallheaders()["Authorization"];
        $reqToken = trim(substr($reqToken, 7));
        $reqFlagLunas = $this->input->get('flag_lunas');
        $reqKodeBayar = $this->input->get('kode_bayar');

        $this->load->model('UserLoginMobile');
        $user_login_mobile = new UserLoginMobile();
        $result = array();
            
        $reqUserId = $user_login_mobile->getTokenPegawaiId(array("TOKEN" => $reqToken, "STATUS" => '1'));
        if($reqUserId == "" || $reqUserId == "0")
        {
            $this->response(array('status' => 'fail', 'message' => 'Token anda berakhir.', 'code' => 502));
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


        if($reqFlagLunas == "")
        {}
        else
          $statement .= " AND NVL(FLAG_LUNAS, '0') = '$reqFlagLunas' ";


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

        $result = $this->db->query($sql)->result_array();
             
       $this->response(array('status' => 'success', 'message' => 'success', 'code' => 200, 'result' => $result));
            
        
    }
    
   
    // insert new data to entitas
    function index_post() {


        $reqToken = getallheaders()["Authorization"];
        $reqToken = trim(substr($reqToken, 7));
        $result = array();

        $this->load->model('UserLoginMobile');
        $user_login_mobile = new UserLoginMobile();
        $reqUserId = $user_login_mobile->getTokenPegawaiId(array("TOKEN" => $reqToken, "STATUS" => '1'));

        $rowResult = $this->db->query(" select bank_pembayaran_id, bank_pembayaran from users where user_id = '$reqUserId' ")->row();

        $reqBankPembayaranId = $rowResult->BANK_PEMBAYARAN_ID;
        $reqBankPembayaran = $rowResult->BANK_PEMBAYARAN;


        if($reqUserId == "" || $reqUserId == "0")
        {
            $this->response(array('status' => 'fail', 'message' => 'Token anda berakhir.', 'code' => 502));
            return;
        }
        
        if($reqBankPembayaranId == "" || $reqBankPembayaranId == "0")
        {
            $this->response(array('status' => 'fail', 'message' => 'Akun tidak memiliki hak akses, hubungi administrator.', 'code' => 502));
            return;
        }


        $reqKodeBayar = $this->input->post("kode_bayar");
        $reqJumlahBayar = $this->input->post("jumlah_bayar");
        $reqDeskripsi = $this->input->post("deskripsi");

        if((float)$reqJumlahBayar == 0)
        {
            $this->response(array('status' => 'fail', 'message' => 'Jumlah bayar wajib diisi.', 'code' => 502));
            return;

        }

        if(empty($reqKodeBayar))
        {
            $this->response(array('status' => 'fail', 'message' => 'Kode bayar wajib diisi.', 'code' => 502));
            return;

        }

        
        $sql = " SELECT A.TAGIHAN_ID, A.SERVICES_ID, (A.TOTAL_TAGIHAN - NVL(B.TOTAL_PELUNASAN, 0)) SISA_TAGIHAN FROM TAGIHAN_CETAK_NOTA A 
                 LEFT JOIN (  SELECT SERVICES_ID,
                     TAGIHAN_PROJECT_ID     TAGIHAN_ID,
                     SUM (TOTAL)            TOTAL_PELUNASAN
                FROM PELUNASAN_NOTA X
            GROUP BY SERVICES_ID, TAGIHAN_PROJECT_ID) B
               ON     A.SERVICES_ID = B.SERVICES_ID
                  AND A.TAGIHAN_ID = B.TAGIHAN_ID
                WHERE A.KODE_BAYAR = '$reqKodeBayar'  ";
        
        $rowResult = $this->db->query($sql)->row();
        $TAGIHAN_ID = $rowResult->TAGIHAN_ID;
        $SERVICES_ID = $rowResult->SERVICES_ID;
        $SISA_TAGIHAN = $rowResult->SISA_TAGIHAN;

        if($TAGIHAN_ID == "")
        {
            $this->response(array('status' => 'fail', 'message' => 'Kode bayar tidak dikenali.', 'code' => 502));
            return;

        }

        if((float)$SISA_TAGIHAN <= 0)
        {
            $this->response(array('status' => 'fail', 'message' => 'Tagihan sudah terbayar.', 'code' => 502));
            return;

        }

        if((float)$SISA_TAGIHAN < (float)$reqJumlahBayar)
        {
            $this->response(array('status' => 'fail', 'message' => 'Jumlah yang dibayarkan lebih besar.', 'code' => 502));
            return;

        }



        $suksesInsert = 0;
        $this->load->model("PelunasanNota");
        $pelunasan_nota = new PelunasanNota();
        
        
        $reqDeskripsi = (trim($reqDeskripsi) == "") ? "PELUNASAN MELALUI VA ".$reqBankPembayaran : $reqDeskripsi;
        $pelunasan_nota->setField("METODE_PEMBAYARAN", $reqBankPembayaran);
        $pelunasan_nota->setField("TANGGAL", "SYSDATE");
        $pelunasan_nota->setField("TAGIHAN_PROJECT_ID", $TAGIHAN_ID);
        $pelunasan_nota->setField("SERVICES_ID", $SERVICES_ID);
        $pelunasan_nota->setField("BANK_PEMBAYARAN_ID", $reqBankPembayaranId);
        $pelunasan_nota->setField("KETERANGAN", $reqDeskripsi);
        $pelunasan_nota->setField("METODE_JURNAL", "AUTO JURNAL");
        $pelunasan_nota->setField("SISA_TAGIHAN", dotToNo($SISA_TAGIHAN));
        $pelunasan_nota->setField("TOTAL", dotToNo($reqJumlahBayar));
        $pelunasan_nota->setField("CREATED_BY", $reqBankPembayaran);
        if($pelunasan_nota->insert())
            $suksesInsert = 1;

        if($suksesInsert == 0)
        {
            $this->response(array('status' => 'fail', 'message' => 'Data gagal disimpan, hubungi administrator.', 'code' => 502));
            return;
        }


        
        $sql = " SELECT (A.TOTAL_TAGIHAN - NVL(B.TOTAL_PELUNASAN, 0)) SISA_TAGIHAN FROM TAGIHAN_CETAK_NOTA A 
                 LEFT JOIN (  SELECT SERVICES_ID,
                     TAGIHAN_PROJECT_ID     TAGIHAN_ID,
                     SUM (TOTAL)            TOTAL_PELUNASAN
                FROM PELUNASAN_NOTA X
            GROUP BY SERVICES_ID, TAGIHAN_PROJECT_ID) B
               ON     A.SERVICES_ID = B.SERVICES_ID
                  AND A.TAGIHAN_ID = B.TAGIHAN_ID
                WHERE A.KODE_BAYAR = '$reqKodeBayar'  ";
        
        $rowResult = $this->db->query($sql)->row();
        $SISA_TAGIHAN = $rowResult->SISA_TAGIHAN;

        if($SISA_TAGIHAN == 0)
            $message = "Tagihan berhasil dibayar lunas.";
        elseif($SISA_TAGIHAN > 0)
            $message = "Tagihan berhasil dibayar. Sisa tagihan adalah Rp. ".numberToIna($SISA_TAGIHAN).".";
        elseif($SISA_TAGIHAN < 0)
            $message = "Tagihan berhasil dibayar. Lebih bayar adalah Rp. ".numberToIna(abs($SISA_TAGIHAN)).".";


        $this->response(array('status' => 'success', 'message' => $message, 'code' => 200));
        


    }
 
}