<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("functions/string.func.php");
include_once("functions/default.func.php");
include_once("functions/date.func.php");

class qr extends CI_Controller {

	function __construct() {
		parent::__construct();		
		$this->db->query("alter session set nls_date_format='YYYY-MM-DD'"); 
	}
	
	public function index()
	{		


		$reqParse1 = $this->uri->segment(3, "");
		$reqParse2 = $this->uri->segment(4, "");
		$reqParse3 = $this->uri->segment(5, "");
		$reqParse4 = $this->uri->segment(6, "");
		$reqParse5 = $this->uri->segment(7, "");


		$data = array(
			'pg' => $pg,
			'reqParse1' => $reqParse1,
			'reqParse2'	=> $reqParse2,
			'reqParse3'	=> $reqParse3,
			'reqParse4'	=> $reqParse4,
			'reqParse5'	=> $reqParse5
		);

		$this->load->view('qr/index', $data);
	}

	function json() 
	{
		error_reporting(0);
		$reqId = $this->input->get("reqId");
		
		$this->load->library("AES");
		$aes = new AES();
		
		$decrypt = $aes->decrypt($reqId);
		if($decrypt == "")
			echo "QR tidak dikenali. Pastikan QR Code adalah QR Dokumen.";
		else
			echo $decrypt;
		
	}
	
}

