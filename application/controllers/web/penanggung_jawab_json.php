<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class penanggung_jawab_json  extends CI_Controller
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
		$this->load->model("PenanggungJawab");
		$penanggung_jawab = new PenanggungJawab();
		$reqId= $this->input->post("reqId");

		
		$reqNama= $this->input->post("reqNama");
		$reqJabatan= $this->input->post("reqJabatan");
		$reqLinkTTD= $this->input->post("reqLinkTTD");

		$this->load->library("FileHandler");
        $file = new FileHandler();

        $FILE_DIR = "uploads/ttd/";
        makedirs($FILE_DIR);
        $filesData = $_FILES["reqLinkFileTTD"];
        $renameFile = "IMG" . date("dmYhis") . '-' . $reqId . "." . getExtension2($filesData['name'][0]);
        if ($file->uploadToDirArray('reqLinkFileTTD', $FILE_DIR, $renameFile, 0)) {
            $reqLinkFileTTD = $FILE_DIR.$renameFile;
        } else {
            $reqLinkFileTTD = $reqLinkTTD;
        }

		$penanggung_jawab->setField("PENANGGUNG_JAWAB_ID", $reqId);
		$penanggung_jawab->setField("NAMA", $reqNama);
		$penanggung_jawab->setField("JABATAN", $reqJabatan);
		$penanggung_jawab->setField("TTD_LINK", $reqLinkFileTTD);
		if(empty($reqId)){
			$penanggung_jawab->setField("CREATED_BY", $this->USERID);
			$penanggung_jawab->insert();
		}else{
			$penanggung_jawab->setField("UPDATED_BY", $this->USERID);
			$penanggung_jawab->update();	
		}
		

		echo "Data berhasil disimpan.";
	}


	function delete()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("PenanggungJawab");
		$penanggung_jawab = new PenanggungJawab();


		$penanggung_jawab->setField("PENANGGUNG_JAWAB_ID", $reqId);
		if ($penanggung_jawab->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo 'Data berhasil dihapus';
	}

}
