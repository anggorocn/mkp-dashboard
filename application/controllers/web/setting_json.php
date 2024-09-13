<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class setting_json extends CI_Controller
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

	function email_add()
	{

		$this->load->model("Setting");

		$setting = new Setting();

		$reqName 			= $this->input->post("reqName");
		$reqSmtp 			= $this->input->post("reqSmtp");
		$reqUseAuth 		= $this->input->post("reqUseAuth");
		$reqUsername 		= $this->input->post("reqUsername");
		$reqPass 			= $this->input->post("reqPass");
		$reqUseSsl 			= $this->input->post("reqUseSsl");
		$reqPort 			= $this->input->post("reqPort");

		$setting->setField("SETTING_ID", "EMAIL_NAME");
		$setting->setField("VALUE", $reqName);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_STMP");
		$setting->setField("VALUE", $reqSmtp);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_USE_AUTH");
		$setting->setField("VALUE", $reqUseAuth);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_USERNAME");
		$setting->setField("VALUE", $reqUsername);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_PASS");
		$setting->setField("VALUE", $reqPass);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_USE_SSL");
		$setting->setField("VALUE", $reqUseSsl);
		$setting->update();

		$setting->setField("SETTING_ID", "EMAIL_PORT");
		$setting->setField("VALUE", $reqPort);
		$setting->update();

		echo 'Data Berhasil di simpan';
	}
	function delete(){
		$reqId =	$this->input->post("reqId");
		$this->load->model("Setting");
		$setting = new Setting();
		$setting->setField("CABANG_ID", $reqId);
		$setting->delete();


	}

	function combo()
	{
		$this->load->model('Setting');
		$jenis_kualifikasi = new Setting();
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
