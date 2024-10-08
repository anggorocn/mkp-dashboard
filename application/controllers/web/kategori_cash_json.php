<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class kategori_cash_json  extends CI_Controller
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
		$this->load->model("KategoriCash");
		$type_of_service = new KategoriCash();
		$reqId= $this->input->post("reqId");

		
		$reqName= $this->input->post("reqName");
		$reqDescription= $this->input->post("reqDescription");
		$reqFormat= $this->input->post("reqFormat");
		

		$type_of_service->setField("KATEGORI_CASH_ID", $reqId);
		$type_of_service->setField("NAMA", $reqName);
		$type_of_service->setField("FLAG", $reqFormat);
		$type_of_service->setField("KET", $reqDescription);
		if(empty($reqId)){
			$type_of_service->insert();
		}else{
			$type_of_service->update();	
		}
		

		echo "Data berhasil disimpan.";
	}


	function delete()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("KategoriCash");
		$type_of_service = new KategoriCash();


		$type_of_service->setField("KATEGORI_CASH_ID", $reqId);
		if ($type_of_service->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo 'Data berhasil dihapus';
	}



	
	function combo()
	{
		$this->load->model("KategoriCash");
		$ClassOfVessel = new KategoriCash();

		$ClassOfVessel->selectByParamsMonitoring(array());
		$i = 0;
		while ($ClassOfVessel->nextRow()) {
			$arr_json[$i]['id']		= $ClassOfVessel->getField("KATEGORI_CASH_ID");
			$arr_json[$i]['text']	= $ClassOfVessel->getField("NAMA");
			$i++;
		}

		echo json_encode($arr_json);
	}
}
