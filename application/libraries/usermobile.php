<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kauth
 *
 * @author user
 */
class usermobile{
	
	
	var $PEGAWAI_ID; 
	
    /******************** CONSTRUCTOR **************************************/
    function usermobile(){
	
		 $this->emptyProps();
    }

    /******************** METHODS ************************************/
    /** Empty the properties **/
    function emptyProps(){
		$this->PEGAWAI_ID = "";
				
    }
		


	function pushNotifikasi($reqApprovalId, $reqPegawaiId, $reqPegawai, $reqPermohonanId, $reqPermohonanNomor, $reqPermohonan, $reqTabel, $reqTabelKolom, $reqUrut=1, $sentEmail=true)
	{	
		if($reqApprovalId == "")
			return;
			
		$CI =& get_instance();

		
		$reqType = $reqPermohonan;
		$reqId = $reqPermohonanId;
		$reqJenis = $reqPermohonan;
		$reqTitle = ucwords(str_replace("_", " ", strtolower($reqPermohonan)));
		$reqBody = $reqPegawai." Mengajukan ".$reqTitle." nomor ".$reqPermohonanNomor;
		
		$reqApprovalId 	 	= $reqApprovalId;	
		$reqApprovalTipe 	= "INTERNAL";	
		$reqApprovalKolom 	= "PEGAWAI_ID";
		

        $rowResult = $CI->db->query(" SELECT NIK, NAME, NAMA_POSISI, 'rosyidi.alhamdani.rd@gmail.com' EMAIL FROM PEGAWAI WHERE NIK = '".$reqApprovalId."'  ")->row();

		
		$approvalEmail   = $rowResult->EMAIL;
		$approvalNama    = $rowResult->NAME;
		$approvalJabatan = $rowResult->NAMA_POSISI;
		
		if($sentEmail == true)
		{
			/* JIKA INTERNAL PASTI PUNYA APLIKASI ESS HIT PUSH NOTIF */
			if($reqApprovalTipe == "INTERNAL")
			{
				
				$CI->load->model("NotifikasiPesan");
				$notifikasi_pesan = new NotifikasiPesan();
				$notifikasi_pesan->setField("PEGAWAI_ID", $reqApprovalId);
				$notifikasi_pesan->setField("PESAN", $reqBody);
				$notifikasi_pesan->setField("TIPE", $reqJenis);
				$notifikasi_pesan->setField("TIPE_ID", $reqPermohonanId);
				$notifikasi_pesan->insert();
				
			}
		}
		$statusAktif = ($sentEmail == true) ? "1" : "0";

		
		/* HIT KE PROSES APPROVAL */
		$CI->load->model("ApprovalManager");
		$approval_manager = new ApprovalManager();
		$approval_manager->setField("NOMOR", $reqPermohonanNomor);
		$approval_manager->setField("TABEL", $reqTabel);
		$approval_manager->setField("TABEL_ID", $reqTabel."_ID");
		$approval_manager->setField("TABEL_APPROVAL_KOLOM", $reqTabelKolom);
		$approval_manager->setField("PEGAWAI_ID", $reqPegawaiId);
		$approval_manager->setField("PEGAWAI_APPROVAL_ID", $reqApprovalId);
		$approval_manager->setField("PEGAWAI_APPROVAL_JENIS", $reqApprovalTipe);
		$approval_manager->setField("STATUS_AKTIF", $statusAktif);
		$approval_manager->setField("URUT", $reqUrut);
		$approval_manager->setField("PROJECT_KONTRAK_TERMIN_ID", $reqTerminId);
		$approval_manager->insert();
		$approvalId = $approval_manager->id;
		

		if($sentEmail == true)
		{
		
			/* HIT KE EMAIL */
			if(!empty($approvalEmail))
			{
				
				$CI->load->library("KMail");
				$mail = new KMail();
				$mail->Subject = $reqBody;
				$mail->AddAddress($approvalEmail,$approvalNama);			
				$body = file_get_contents($CI->config->item("base_report")."report/loadUrl/email/permohonan_approval/".$approvalId);		
				$mail->MsgHTML($body);

				if($mail->Send())
				{
					$emailPesan = "Email approval sukses dikirim ke ".$approvalNama;
					$emailStatus = "SUKSES";
				}
				else
				{
					$emailPesan = "Email approval gagal dikirim ke ".$approvalNama;
					$emailStatus = "FAILED";
				}
					
				$CI->db->query(" UPDATE APPROVAL_MANAGER SET EMAIL_STATUS = '".$emailStatus."' WHERE APPROVAL_MANAGER_ID = '".$approvalId."' ");
			}
			
			return $emailPesan;
		}
		else
			return "SUKSES";

	}


			  

	function pushEmail($reqPegawaiId, $reqPermohonanNomor, $reqPermohonan, $reqTabel, $reqTabelKolom)
	{	
		$CI =& get_instance();

		$statusAktif = ($sentEmail == true) ? "1" : "0";
		

		$sql = " SELECT APPROVAL_MANAGER_ID, PEGAWAI_APPROVAL_EMAIL, PEGAWAI_APPROVAL_NAMA, PEGAWAI_APPROVAL_JABATAN, PEGAWAI
									FROM APPROVAL_MANAGER WHERE TABEL = '$reqTabel' AND NOMOR = '$reqPermohonanNomor' AND TABEL_APPROVAL_KOLOM = '".$reqTabelKolom."' AND NVL(approval, 'X') = 'X' ";

		$rowResult = $CI->db->query($sql)->row();

		//return $sql;
		$approvalId      = $rowResult->APPROVAL_MANAGER_ID;
		$approvalEmail   = $rowResult->PEGAWAI_APPROVAL_EMAIL;
		$approvalNama    = $rowResult->PEGAWAI_APPROVAL_NAMA;
		$approvalJabatan = $rowResult->PEGAWAI_APPROVAL_JABATAN;
		$reqPegawai      = $rowResult->PEGAWAI;

		$reqTitle = ucwords(str_replace("_", " ", strtolower($reqPermohonan)));
		$reqBody = "Persetujuan ".$reqTabel." Nomor ".$reqPermohonanNomor;

		
		/* HIT KE EMAIL */
		if(!empty($approvalEmail))
		{
			
			$CI->load->library("KMail");
			$mail = new KMail();
			$mail->Subject = $reqBody;
			$mail->AddAddress($approvalEmail,$approvalNama);		
			$body = file_get_contents($CI->config->item("base_report")."report/loadUrl/email/permohonan_approval/".$approvalId);		
			$mail->MsgHTML($body);
							
			if($mail->Send())
			{
				$emailPesan = "Email approval sukses dikirim ke ".$approvalNama.". ";
				$emailStatus = "SUKSES";
			}
			else
			{
				$emailPesan = "Email approval gagal dikirim ke ".$approvalNama.". ";
				$emailStatus = "FAILED";
			}
				
		}
		
		$CI->db->query(" UPDATE APPROVAL_MANAGER SET EMAIL_STATUS = '".$emailStatus."', STATUS_AKTIF = '1' WHERE APPROVAL_MANAGER_ID = '".$approvalId."' ");

		return $emailPesan;


	}
			  

    
			   
}
	
  /***** INSTANTIATE THE GLOBAL OBJECT */
  $userMobile = new usermobile();

?>
