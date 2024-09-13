<?php
 
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");
 
class Approval_monitoring_json extends REST_Controller {
 
    function __construct() {
        parent::__construct();

		$this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
		$this->db->query("alter session set nls_numeric_characters=',.'");
    }
 
    // show data entitas
    function index_get() {
		error_reporting(0);
		
            
        $this->response(array('status' => 'success', 'message' => 'success', 'code' => 200,'data' => $arrResponse, 'jumlah' => $jumlah_approval));
       
    }
    
    // insert new data to entitas
    function index_post() {
		
		/* DEFAULT */
        $reqToken = $this->input->post('reqToken');
        $result = array();
		
		$rowResult = $this->db->query(" SELECT NIK, NAME, NAMA_POSISI, KD_PEL, SUB_UNIT FROM PEGAWAI WHERE MD5(NIK || 'F1N4T3lukLAM0n6') = '$reqToken' ")->row();
		
		$reqPegawaiId = $rowResult->NIK;
		$reqNama = $rowResult->NAME;
		$reqJabatan = $rowResult->NAMA_POSISI;
		$reqPerusahaanId = $rowResult->KD_PEL;
		$reqCabangId = $rowResult->SUB_UNIT;

		if($reqPegawaiId == "" || $reqPegawaiId == "0")
		{
			$this->response(array('status' => 'fail', 'message' => 'Token anda berakhir.', 'code' => 502));
			return;
		}
		/* END OF DEFAULT */


		$reqTipePost 		= $this->input->post("reqTipePost");
		$reqId 			    = $this->input->post("reqId");
		$reqAlasan 			= $this->input->post("reqAlasan");
		$reqJenisApproval   = $this->input->post("reqJenisApproval");
		$reqFinger  		= $this->input->post("reqFinger");
		$reqTtd 			= $_POST["reqTtd"];



		/* UNTUK MENGAKOMODIR SUPAYA SINGLE SOURCE */

		if(trim($reqAlasan) == "")
			$reqApproval = "Y";
		else
			$reqApproval = "T";

		
		$this->load->model("ApprovalManager");
		$approval_manager = new ApprovalManager();
		$approval_manager->setField("APPROVAL",$reqApproval);
		$approval_manager->setField("APPROVAL_ALASAN",$reqAlasan);
		$approval_manager->setField("PEGAWAI_APPROVAL_ID", $reqPegawaiId);
		$approval_manager->setField("APPROVAL_MANAGER_ID", $reqId);
		$approval_manager->approval();

		
		$approval_manager = new ApprovalManager();
		$approval_manager->selectByParams(array("APPROVAL_MANAGER_ID" => $reqId));
		$approval_manager->firstRow();
		
		$reqPegawaiIdNotif = $approval_manager->getField("PEGAWAI_ID");
		$reqAtasan = $approval_manager->getField("PEGAWAI_APPROVAL_NAMA");
		$reqNomor  = $approval_manager->getField("NOMOR");
		$reqTabel = $approval_manager->getField("TABEL");
		$reqKolomApproval = $approval_manager->getField("TABEL_APPROVAL_KOLOM");
		$reqUrut = $approval_manager->getField("URUT");

		if($reqApproval == "Y")
		{
			$reqKata = "menyetujui";
		}
		else
		{
			$reqKata = "menolak";
			$reqDenganAlasan = " dengan alasan ".$reqAlasan;
		}
		
		$notifikasi = $reqAtasan." ".$reqKata." permohonan anda nomor : ".$reqNomor.$reqDenganAlasan;
		

	    $reqUrutMax = $this->db->query("SELECT MAX(URUT) MAXAPPROVAL FROM APPROVAL_MANAGER WHERE NOMOR = '$reqNomor' AND TABEL = '$reqTabel' ")->row()->MAXAPPROVAL;


	    if($reqUrut == $reqUrutMax)
	    {

	        if($reqApproval == "Y")
	        {
	            $message = "Permohonan berhasil divalidasi.";

	            if($reqTabel == "INVOICE")
	            {

					$this->load->model("Tagihan");
					$tagihan = new Tagihan();
				    $tagihan->selectByParams(array("NO_NOTA" => $reqNomor));
				    $tagihan->firstRow();

	            	$reqTagihanId = $tagihan->getField("TAGIHAN_PROJECT_ID");
				    $reqNoNota  = $tagihan->getField("NO_NOTA");
				    $reqTanggalNota = $tagihan->getField("TANGGAL_NOTA");
				    $reqNoFaktur = $tagihan->getField("NO_FAKTUR");
				    $reqGlAkun       = $tagihan->getField("GL_AKUN_PIUTANG");
				    $reqProfitCenter = $tagihan->getField("PROFIT_CENTER");
    				$reqKeterangan = $tagihan->getField("KETERANGAN");
    				$reqTotal = $tagihan->getField("TOTAL");
    				$reqServicesId = $tagihan->getField("SERVICES_ID");


		            $reqNoJurnal = generateZero($reqTagihanId, 10);

		            $sql = "INSERT INTO JURNAL_PENJUALAN (
		                       KTOPL, BKTXT, BELNR, 
		                       BUKRS, GJAHR, LIFNR, 
		                       SGTXT, PSWSL, DMBTR, 
		                       SHKZG, PRCTR, KOSTL, 
		                       XBLNR, 
		                       HKONT) 
		                    VALUES ('$reqProfitCenter', '$reqNoFaktur', '$reqNoJurnal', 
		                       '$reqProfitCenter', TO_CHAR(SYSDATE, 'YYYY'), '$reqGlAkun', 
		                       '$reqKeterangan', 'IDR', '$reqTotal', 
		                       'S', '$reqProfitCenter', '0000000000', 
		                       '$reqNoNota', '')
		                    ";
		            $this->db->query($sql);

		            $reqGlPendapatan = $this->db->query(" SELECT COA FROM SERVICES WHERE SERVICES_ID = '$reqServicesId' ")->row()->COA;
		            $sql = "INSERT INTO JURNAL_PENJUALAN (
		                       KTOPL, BKTXT, BELNR, 
		                       BUKRS, GJAHR, LIFNR, 
		                       SGTXT, PSWSL, DMBTR, 
		                       SHKZG, PRCTR, KOSTL, 
		                       XBLNR, 
		                       HKONT) 
		                    VALUES ('$reqProfitCenter', '$reqNoFaktur', '$reqNoJurnal', 
		                       '$reqProfitCenter', TO_CHAR(SYSDATE, 'YYYY'), '$reqGlPendapatan', 
		                       '$reqKeterangan', 'IDR', '$reqTotal', 
		                       'H', '$reqProfitCenter', '0000000000', 
		                       '$reqNoNota', '')
		                    ";
		            $this->db->query($sql);


			        $sql = "  UPDATE TAGIHAN_PROJECT SET 
			                    NO_JURNAL_JPJ   = '$reqNoJurnal'
			                  WHERE TAGIHAN_PROJECT_ID = '$reqTagihanId' ";

		            $this->db->query($sql);

	            }
	        }
	        else
	            $message = "Permohonan berhasil ditolak.";

	    }
	    else
	    {

		
	        if($reqApproval == "Y")
	        {
	            $this->load->library('usermobile'); 
	            $userMobile = new usermobile();
	            $statusEmail = $userMobile->pushEmail($reqPegawaiId, $reqNomor, "VERIFIKASI PERMOHONAN", $reqTabel, "APPROVAL".($reqUrut+1));

	            $message = $statusEmail."Permohonan berhasil divalidasi dan diteruskan ke Approval ".($reqUrut+1);
	        }
	        else
	        {
	        	$this->reject_keuangan_by_atasan($reqNomor, $reqTabel);
	            $message = "Permohonan berhasil ditolak.";
	        }

	    }

		
		
        $this->response(array('status' => 'success', 'message' => $statusEmail.$message));
		
		
    }


    function reject_keuangan_by_atasan($reqNomor, $reqTabel)
    {

		$sql = "
			INSERT INTO approval_manager_log
			select * from approval_manager
			where nomor = '$reqNomor' and tabel = '$reqTabel' 
		";
		$this->db->query($sql);

		$sql = "
			DELETE FROM approval_manager
			where nomor = '$reqNomor' and tabel = '$reqTabel' 
		";
		$this->db->query($sql);

    }

    // update data entitas
    function index_put() {
    }
 
    // delete entitas
    function index_delete() {

    }

		
 
}
