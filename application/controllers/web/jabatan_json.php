<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class jabatan_json extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->kauth->getInstance()->hasIdentity()) {
			// redirect('login');
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

	function test_json(){
		$arrResult = $this->kauth->getArrayDataV2(
			array( ), 
			"http://valsix.xyz/aghris-html/tes_json/json"
		);	
		$arrResult = $arrResult['data'];
		for($i=0;$i<count($arrResult );$i++){
			$arr_json[$i]['id']		= $arrResult[$i]['nik_sap'];
			$arr_json[$i]['text']	= $arrResult[$i]['nama'];
		}
		echo json_encode($arr_json);
	}


	function json()
	{
		

		$aColumns = array(
			"KODE", "NAMA", "LEVEL", "FUNGSI","EDIT","DELETE"
		);

		$aColumnsAlias = array(
			"KODE", "NAMA", "LEVEL", "FUNGSI","EDIT","DELETE"

		);

		$arrDataCari = array();
		for($i=0;$i<count($aColumns);$i++){
			$arrDataCari[$aColumns[$i]]=$_GET['sSearch'];
		}

		$arrResult = $this->kauth->getArrayDataV2(
			array(), 
			"http://valsix.xyz/aghris-html/tes_json/json"
		);	
		$arrResult = $arrResult['data'];

		$allRecord = count($arrResult);
		if ($_GET['sSearch'] == ""){
			$allRecordFilter = $allRecord;
		}else{
			$arrResult = $this->kauth->getArrayDataV2(
				$arrDataCari, 
				"http://valsix.xyz/aghris-html/tes_json/json"
			);	
			$arrResult_cari = $arrResult['data'];
			$allRecordFilter = count($arrResult_cari);
		}


		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $allRecord,
			"iTotalDisplayRecords" => $allRecordFilter,
			"aaData" => array()
		);

		// while ($bank->nextRow()) {
		for($k=0;$k<count($arrResult);$k++){
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "EDIT"){
					$row[] = '<a href="javascript:void(0)" id="btnEdit"><i class="fa fa-pencil"> </i> </a>';
				}else if($aColumns[$i] == "DELETE"){
					$row[] = '<a href="javascript:void(0)" onclick="delete()"><i class="fa fa-remove"> </i> </a>';
				}
				else{
					$row[] = $arrResult[$k][strtolower($aColumns[$i])];
				}
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}




	


	
}
