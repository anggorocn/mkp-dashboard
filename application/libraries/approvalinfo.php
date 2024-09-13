<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'kloader.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kauth
 *
 * @author user
 */
class approvalinfo{
	var $approvalId1;
	var $approvalNama1;
	
	var $tanggal;
	var $alasan;
	var $divAlasan;
	var $nama;
	var $jabatan;
	var $qr;
	var $nama_pemohon;
	var $jabatan_pemohon;
	
    /******************** CONSTRUCTOR **************************************/
    function approvalinfo(){
		 $this->emptyProps();
    }

    /******************** METHODS ************************************/
    /** Empty the properties **/
    function emptyProps(){
		$this->approvalId1 = "";
		$this->approvalNama1 = "";
    }
	
		
		
    function getApprovalInfo($reqNomor, $reqApprovalKolom, $reqTabel="", $reqStatement="", $reqSetApprove="", $reqSource=""){			

    	include_once("functions/date.func.php");

		$CI =& get_instance();
		$CI->load->model("ApprovalManager");
		
		if($reqTabel == "")
			$arrStatement = array("NOMOR" => $reqNomor, "TABEL_APPROVAL_KOLOM" => $reqApprovalKolom);
		else
			$arrStatement = array("NOMOR" => $reqNomor, "TABEL_APPROVAL_KOLOM" => $reqApprovalKolom, "TABEL" => $reqTabel);
		
		$approval_manager = new ApprovalManager();
		$approval_manager->selectByParams($arrStatement, -1, -1, $reqStatement, " ORDER BY APPROVAL_TANGGAL DESC ");
		$approval_manager->firstRow();
		
		
		$this->nama 	= $approval_manager->getField("PEGAWAI_APPROVAL_NAMA");
		$this->jabatan 	= $approval_manager->getField("PEGAWAI_APPROVAL_JABATAN");
		$this->nama_pemohon 	= $approval_manager->getField("PEGAWAI");
		$this->jabatan_pemohon 	= $approval_manager->getField("JABATAN");
		$this->alasan 			= $approval_manager->getField("APPROVAL_ALASAN");
		$this->tanggal 			= getFormattedDate($approval_manager->getField("APPROVAL_TANGGAL_FORMAT"));

		$divAlasan = "";
		if(!empty($this->alasan))
		{
			$divAlasan = '<div class="nomor-oe">
							<div class="data" style="font-size:10px; font-style:italic">
								Permohonan ditolak oleh '.$this->nama.' dengan alasan : '.$this->alasan.' pada tanggal '.$this->tanggal.'
							</div>
						  </div>';
		}
		$this->divAlasan = $divAlasan;
		
		$reqJurnal 	   = $approval_manager->getField("TABEL");
		$reqPegawaiId  = $approval_manager->getField("PEGAWAI_APPROVAL_ID");
		$dokumenFolder = "uploads/";
		$filename = $dokumenFolder.$reqJurnal."_".str_replace(" ", "", str_replace("/", "", $reqNomor))."_".$reqPegawaiId.".png";

		$this->linkqr  	= $filename;
		
		$reqApproval = $approval_manager->getField("APPROVAL");
		$reqApprovalId = $approval_manager->getField("APPROVAL_MANAGER_ID");

		if($reqApproval == "Y" || $reqSetApprove == "Y")
			$this->imageqr  = $this->generateQR($reqJurnal, $reqNomor, $reqApprovalId);
		else
		{
			if($reqSource == "wkhtml")
			$this->imageqr  = "<br><br><br><br>";
			else
			$this->imageqr  = "<br><br><br><br><br><br><br>";
		}
    }
	
	
	function generateQR($fileReport, $reqNomor, $approvalId="")
	{		
		$CI =& get_instance();
		/* GENERATE QRCODE */
		include_once("libraries/phpqrcode/qrlib.php");
		if($approvalId == "")
			$qrParaf   = $CI->config->item("mwareUrl")."qr/index/".strtolower($fileReport)."/".md5($reqNomor);
		else
			$qrParaf   = $CI->config->item("mwareUrl")."qr/index/".strtolower($fileReport)."/".md5($reqNomor)."/".md5($approvalId);
			
		$txt = QRcode::text($qrParaf);
		$image = QRimage::image($txt,2,2);
		ob_start();
		imagepng($image);
		$contents =  ob_get_clean();
		imagedestroy($image);
		return "<img src='data:image/png;base64,".base64_encode($contents)."' style='height:100px' />";
		
	}
		

			   
}
	
  /***** INSTANTIATE THE GLOBAL OBJECT */
  $approvalInfo = new approvalinfo();

?>
