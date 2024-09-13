
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("functions/image.func.php");
include_once("functions/string.func.php");

class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
		//kauth

		if (!$this->kauth->getInstance()->hasIdentity())
		{
			//redirect('login');
		}		
		$this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
		$this->db->query("alter session set nls_numeric_characters=',.'");
		$this->USERID = $this->kauth->getInstance()->getIdentity()->USERID;
		$this->USERNAME = $this->kauth->getInstance()->getIdentity()->USERNAME;
		$this->FULLNAME = $this->kauth->getInstance()->getIdentity()->FULLNAME;
		$this->USERPASS = $this->kauth->getInstance()->getIdentity()->USERPASS;
		$this->LEVEL = $this->kauth->getInstance()->getIdentity()->LEVEL;
		$this->LEVEL_DESC = $this->kauth->getInstance()->getIdentity()->LEVEL_DESC;
		$this->TRANSAKSI = $this->kauth->getInstance()->getIdentity()->TRANSAKSI;
		$this->PELUNASAN = $this->kauth->getInstance()->getIdentity()->PELUNASAN;
		$this->LOCKING_PIUTANG = $this->kauth->getInstance()->getIdentity()->LOCKING_PIUTANG;
		$this->REPORT = $this->kauth->getInstance()->getIdentity()->REPORT;
		$this->DASHBOARD = $this->kauth->getInstance()->getIdentity()->DASHBOARD;
		$this->MASTER_DATA = $this->kauth->getInstance()->getIdentity()->MASTER_DATA;
        $this->VIEW_ALL_TRANS = $this->kauth->getInstance()->getIdentity()->VIEW_ALL_TRANS;

		$this->POSITION = $this->kauth->getInstance()->getIdentity()->POSITION;
		$this->NAMA_POSISI = $this->kauth->getInstance()->getIdentity()->NAMA_POSISI;
		$this->KD_PEL = $this->kauth->getInstance()->getIdentity()->KD_PEL;
		$this->NAMA_PEL = $this->kauth->getInstance()->getIdentity()->NAMA_PEL;
		$this->SUB_UNIT = $this->kauth->getInstance()->getIdentity()->SUB_UNIT;
		$this->TOKEN = $this->kauth->getInstance()->getIdentity()->TOKEN;

		if(empty($this->TOKEN))
		{
			//$reqToken = $this->input->get("reqToken");
			//$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM USER_LOGIN_MOBILE WHERE TOKEN = '$reqToken' ")->row()->ADA;

			//if($adaData == 0) 
				//redirect('login');
		}


	}
	
	public function index()
	{
		
		$pg = $this->uri->segment(3, "home");
		$reqParse1 = $this->uri->segment(4, "");
		$reqParse2 = $this->uri->segment(5, "");
		$reqParse3 = $this->uri->segment(6, "");
		$reqParse4 = $this->uri->segment(7, "");
		$reqParse5 = $this->uri->segment(5, "");
		$reqId = $this->input->get("reqId");

				
		$view = array(
			'pg' => $pg,
			'linkBack' => $file."_detil",
			'reqParse1' => $reqParse1,
			'reqParse2'	=> $reqParse2,
			'reqParse3'	=> $reqParse3,
			'reqParse4'	=> $reqParse4,
			'reqParse5'	=> $reqParse5
		);	
		
		$data = array(
			'breadcrumb' => $breadcrumb,
			'content' => $this->load->view("report/".$pg,$view,TRUE),
			'pg' => $pg,
			'reqParse1' => $reqParse1,
			'reqParse2'	=> $reqParse2,
			'reqParse3'	=> $reqParse3,
			'reqParse4'	=> $reqParse4,
			'reqParse5'	=> $reqParse5
		);	
		$this->load->view('report/'.$pg, $data);
	}	
	
	public function loadUrl()
	{
		
		$reqFolder = $this->uri->segment(3, "");
		$reqFilename = $this->uri->segment(4, "");
		$reqParse1 = $this->uri->segment(5, "");
		$reqParse2 = $this->uri->segment(6, "");
		$reqParse3 = $this->uri->segment(7, "");
		$reqParse4 = $this->uri->segment(8, "");
		$reqParse5 = $this->uri->segment(9, "");
		$data = array(
			'reqParse1' => urldecode($reqParse1),
			'reqParse2' => urldecode($reqParse2),
			'reqParse3' => urldecode($reqParse3),
			'reqParse4' => urldecode($reqParse4),
			'reqParse5' => urldecode($reqParse5)
		);
		if($reqFolder == "main")
			$this->session->set_userdata('currentUrl', $reqFilename);
		
		$this->load->view($reqFolder.'/'.$reqFilename, $data);
	}	

}

