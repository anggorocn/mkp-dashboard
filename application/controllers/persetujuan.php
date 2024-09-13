<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Persetujuan extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		/*if (!$this->kauth->getInstance()->hasIdentity())
		{
			redirect('app');
		}			
				
		$this->HAKAKSES = $this->kauth->getInstance()->getIdentity()->HAKAKSES;
		$this->HAKAKSES_DESC = $this->kauth->getInstance()->getIdentity()->HAKAKSES_DESC;*/
							
		
	}

	
	public function permohonan()
	{
		
		$data = array(
			'reqTipe' => "permohonan"
		);
		$this->load->view('persetujuan/index', $data);
	}



	public function permohonan_approval()
	{
		$reqId = $this->input->post("reqId");
		$reqToken = $this->input->post("reqToken");
		$reqAlasan = $this->input->post("reqAlasan");


		$reqVerifikasiDokumen = $this->input->post("reqVerifikasiDokumen");
		$reqTagihanId 		  = $this->input->post("reqTagihanId");
		$reqTabel 		  	  = $this->input->post("reqTabel");

		$reqChecklistData 	     = $this->input->post("reqChecklistData");
		$reqDokumenManagerId 	 = $this->input->post("reqDokumenManagerId");
		$reqChecklistCatatan	 = $this->input->post("reqChecklistCatatan");

		
		/* API */
		$ch = curl_init();
		$data = array('reqFinger' => "1", "reqId" => $reqId, "reqToken" => $reqToken, "reqJenisApproval" => "PERMOHONAN", "reqAlasan" => $reqAlasan);
		
		curl_setopt($ch, CURLOPT_URL, $this->config->item("base_api")."apiapproval/approval_monitoring_json");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		$obj = json_decode($response);
		$pesan = $obj->{'message'};
		$pesan = str_replace("%20", " ", $pesan);


		
		redirect("persetujuan/konfirmasi_pesan/".$pesan);
	
	}

	public function loadUrl()
	{
		
		$reqFolder = $this->uri->segment(3, "");
		$reqFilename = $this->uri->segment(4, "");
		$reqParse1 = $this->uri->segment(5, "");
		$reqParse2 = $this->uri->segment(6, "");
		$reqParse3 = $this->uri->segment(7, "");
		$reqParse4 = $this->uri->segment(8, "");
		$data = array(
			'reqParse1' => $reqParse1,
			'reqParse2' => $reqParse2,
			'reqParse3' => $reqParse3,
			'reqParse4' => $reqParse4,
			'reqTahunTerpilih'	=> $this->tahun_terpilih
		);
		$this->load->view($reqFolder.'/'.$reqFilename, $data);
	}	
		

	public function konfirmasi_berhasil()
	{
		$data = array(
			'reqPesan' => "Konfirmasi berhasil."
		);
		$this->load->view('persetujuan/konfirmasi', $data);
	}

	public function konfirmasi_pesan()
	{
		
		$reqPesan = $this->uri->segment(3, "");
		
		$data = array(
			'reqPesan' => $reqPesan
		);
		$this->load->view('persetujuan/konfirmasi', $data);
	}

	public function konfirmasi_gagal()
	{
		$data = array(
			'reqPesan' => "Konfirmasi gagal"
		);
		$this->load->view('persetujuan/konfirmasi', $data);
	}
	
	
	public function konfirmasi_sudah_verifikasi()
	{
		$data = array(
			'reqPesan' => "Sudah diverifikasi"
		);
		$this->load->view('persetujuan/konfirmasi', $data);
	}
	
	

}

