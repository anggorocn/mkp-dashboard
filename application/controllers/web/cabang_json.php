<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class cabang_json extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->kauth->getInstance()->hasIdentity()) {
			redirect('login');
		}

		$this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
		$this->db->query("alter session set nls_numeric_characters=',.'");
		$this->USERID = $this->kauth->getInstance()->getIdentity()->USERID;
		$this->USERNAME = $this->kauth->getInstance()->getIdentity()->USERNAME;
		$this->FULLNAME = $this->kauth->getInstance()->getIdentity()->FULLNAME;
		$this->USERPASS = $this->kauth->getInstance()->getIdentity()->USERPASS;
		$this->LEVEL = $this->kauth->getInstance()->getIdentity()->LEVEL;
		$this->TRANSAKSI = $this->kauth->getInstance()->getIdentity()->TRANSAKSI;
		$this->PELUNASAN = $this->kauth->getInstance()->getIdentity()->PELUNASAN;
		$this->LOCKING_PIUTANG = $this->kauth->getInstance()->getIdentity()->LOCKING_PIUTANG;
		$this->REPORT = $this->kauth->getInstance()->getIdentity()->REPORT;
		$this->DASHBOARD = $this->kauth->getInstance()->getIdentity()->DASHBOARD;
		$this->MASTER_DATA = $this->kauth->getInstance()->getIdentity()->MASTER_DATA;
	}

	function add()
	{

		$this->load->model("Cabang");
		$reqId =	$this->input->post("reqId");

		$personal_certificate = new Cabang();

		$reqJenisId 		= $this->input->post("reqJenisId");
		$reqKode 			= $this->input->post("reqKode");
		$reqJenis 			= $this->input->post("reqJenis");
		$reqDescription 	= $this->input->post("reqDescription");

		$personal_certificate->setField("CABANG_ID", $reqId);
		$personal_certificate->setField("KODE", $reqKode);
		$personal_certificate->setField("NAMA", $reqJenis);
		$personal_certificate->setField("DESCRIPTION", $reqDescription);

		if (empty($reqId)) {
			$personal_certificate->insert();
		} else {
			$personal_certificate->update();
		}

		echo 'Data Berhasil di simpan';
	}
	function delete(){
		$reqId =	$this->input->post("reqId");
		$this->load->model("Cabang");
		$personal_certificate = new Cabang();
		$personal_certificate->setField("CABANG_ID", $reqId);
		$personal_certificate->delete();


	}

	function combo()
	{
		$this->load->model('Cabang');
		$jenis_kualifikasi = new Cabang();
		$jenis_kualifikasi->selectByParamsMonitoring(array());
		$i = 0;
		while ($jenis_kualifikasi->nextRow()) {
			$arr_json[$i]['id']		= $jenis_kualifikasi->getField("CABANG_ID");
			$arr_json[$i]['text']	= strtoupper($jenis_kualifikasi->getField("NAMA"));
			$i++;
		}
		echo json_encode($arr_json);
	}
}
