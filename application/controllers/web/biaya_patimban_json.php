<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

require('libraries/spreadsheet-reader/php-excel-reader/excel_reader2.php');
require('libraries/spreadsheet-reader/SpreadsheetReader.php');

class biaya_patimban_json extends CI_Controller
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


	function json()
	{
		$this->load->model("PatimbanLoader");
		$patimban_loader = new PatimbanLoader();

		$reqPeriode = $this->input->get("reqPeriode");

		$aColumns = array(
			"PERIODE", "URUT", "JENIS", "COST_ELEMENT", "COST_ELEMENT_NAME", "JUMLAH", "PURCHASING_DOCUMENT", "PURCHASE_ORDER_TEXT", 
			"NAME", "COST_CENTER", "DOCUMENT_NUMBER", "POSTING_DATE"
		);

		$aColumnsAlias = array(
			"PERIODE", "URUT", "JENIS", "COST_ELEMENT", "COST_ELEMENT_NAME", "JUMLAH", "PURCHASING_DOCUMENT", "PURCHASE_ORDER_TEXT", 
			"NAME", "COST_CENTER", "DOCUMENT_NUMBER", "POSTING_DATE"
		);
		/*
		 * Ordering
		 */
		if (isset($_GET['iSortCol_0'])) {
			$sOrder = " ORDER BY ";

			//Go over all sorting cols
			for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
				//If need to sort by current col
				if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
					//Add to the order by clause
					$sOrder .= $aColumnsAlias[intval($_GET['iSortCol_' . $i])];

					//Determine if it is sorted asc or desc
					if (strcasecmp(($_GET['sSortDir_' . $i]), "asc") == 0) {
						$sOrder .= " asc, ";
					} else {
						$sOrder .= " desc, ";
					}
				}
			}

			//Remove the last space / comma
			$sOrder = substr_replace($sOrder, "", -2);

			//Check if there is an order by clause
			if (trim($sOrder) == "ORDER BY POSTING_DATE asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY POSTING_DATE desc";
			}
		}

		/*
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables.
		 */
		$sWhere = "";
		$nWhereGenearalCount = 0;
		if (isset($_GET['sSearch'])) {
			$sWhereGenearal = $_GET['sSearch'];
		} else {
			$sWhereGenearal = '';
		}

		if ($_GET['sSearch'] != "") {
			//Set a default where clause in order for the where clause not to fail
			//in cases where there are no searchable cols at all.
			$sWhere = " AND (";
			for ($i = 0; $i < count($aColumnsAlias) + 1; $i++) {
				//If current col has a search param
				if ($_GET['bSearchable_' . $i] == "true") {
					//Add the search to the where clause
					$sWhere .= $aColumnsAlias[$i] . " LIKE '%" . $_GET['sSearch'] . "%' OR ";
					$nWhereGenearalCount += 1;
				}
			}
			$sWhere = substr_replace($sWhere, "", -3);
			$sWhere .= ')';
		}

		/* Individual column filtering */
		$sWhereSpecificArray = array();
		$sWhereSpecificArrayCount = 0;
		for ($i = 0; $i < count($aColumnsAlias); $i++) {
			if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
				//If there was no where clause
				if ($sWhere == "") {
					$sWhere = "AND ";
				} else {
					$sWhere .= " AND ";
				}

				//Add the clause of the specific col to the where clause
				$sWhere .= $aColumnsAlias[$i] . " LIKE '%' || :whereSpecificParam" . $sWhereSpecificArrayCount . " || '%' ";

				//Inc sWhereSpecificArrayCount. It is needed for the bind var.
				//We could just do count($sWhereSpecificArray) - but that would be less efficient.
				$sWhereSpecificArrayCount++;

				//Add current search param to the array for later use (binding).
				$sWhereSpecificArray[] =  $_GET['sSearch_' . $i];
			}
		}

		//If there is still no where clause - set a general - always true where clause
		if ($sWhere == "") {
			$sWhere = " AND 1=1";
		}

		//Bind variables.
		if (isset($_GET['iDisplayStart'])) {
			$dsplyStart = $_GET['iDisplayStart'];
		} else {
			$dsplyStart = 0;
		}
		if (isset($_GET['iDisplayLength']) && $_GET['iDisplayLength'] != '-1') {
			$dsplyRange = $_GET['iDisplayLength'];
			if ($dsplyRange > (2147483645 - intval($dsplyStart))) {
				$dsplyRange = 2147483645;
			} else {
				$dsplyRange = intval($dsplyRange);
			}
		} else {
			$dsplyRange = 2147483645;
		}

		if(!empty($reqPeriode))
			$statement_privacy = " AND A.PERIODE = '$reqPeriode' ";
		else
			$statement_privacy = " AND A.PERIODE = '1' ";


		$statement = " AND (UPPER(A.DOCUMENT_NUMBER) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $patimban_loader->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $patimban_loader->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$patimban_loader->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		 //echo $patimban_loader->query;
		// exit;
		// echo "IKI ".$_GET['iDisplayStart'];

		/*
			 * Output
			 */
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $allRecord,
			"iTotalDisplayRecords" => $allRecordFilter,
			"aaData" => array()
		);

		$INVOICE = 0;
		$INVOICE_NON_ADMIN = 0;
		$PNBP = 0;
		$MAN_FEE = 0;
		$PPN = 0;
		$ADMIN = 0;
		$MAN_FEE_TOTAL = 0;

		while ($patimban_loader->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "JUMLAH")
					$row[] = "<div style='text-align:right'>".numberToIna($patimban_loader->getField($aColumns[$i]))."</div>";
				else
					$row[] = $patimban_loader->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;

		}


		$sql = "  
				SELECT SUM(JUMLAH) JUMLAH
				FROM PATIMBAN_LOADER A WHERE 1 = 1 ".$statement_privacy;

		$rowResult = $this->db->query($sql)->row();

		$output['JUMLAH'] = numberToIna($rowResult->JUMLAH);	

		echo json_encode($output);
	}

	function delete()
	{
		$this->load->model("PatimbanLoader");
		$patimban_loader = new PatimbanLoader();

		$reqId = $this->input->get('reqId');
		$reqPeriode = $this->input->get('reqPeriode');

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM LOADER_LOCK WHERE PERIODE = '$reqPeriode' AND TRANSAKSI = 'PATIMBAN_LOADER' ")->row()->ADA;

		if($adaData > 0)
		{
			echo "Periode telah dikunci sebelumnya";
			return;
		}

		$patimban_loader->setField("PERIODE", $reqPeriode);
		$patimban_loader->setField("URUT", $reqId);
		if ($patimban_loader->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo "Data berhasil dihapus.";
	}



	function add()
	{

		$reqPeriode = $this->input->post('reqPeriode');
		$reqLinkFile = $_FILES["reqLinkFile"];



		$FILE_DIR = "uploads/";
		/* UPLOAD FILE */	
		$adaFile = 0;

		if(empty(getExtension($reqLinkFile['name'])))
			$renameFile = "";
		else
			$renameFile = md5(date("dmYHis").$reqLinkFile['name']).".".getExtension($reqLinkFile['name']);
		
		$this->load->library("FileHandler");
		$file = new FileHandler();


		$suksesImport = 0;
		if($file->uploadToDir('reqLinkFile', $FILE_DIR, $renameFile))
		{

			$sql = " DELETE FROM PATIMBAN_LOADER WHERE PERIODE ='$reqPeriode' ";
			$this->db->query($sql);

			$Spreadsheet = new SpreadsheetReader($FILE_DIR.$renameFile);	
			$Sheets = $Spreadsheet -> Sheets();
		
			foreach ($Sheets as $Index => $Name)
			{
				if($Index > 0)
					continue;

				$namaSheet = $Name;
				
				$Spreadsheet -> ChangeSheet($Index);
				$rowKe = 1;
				$urut = 1;
				foreach ($Spreadsheet as $Key => $Row)
				{

					if($rowKe >= 2)
					{
						$JENIS  	   = trim(strtoupper((string)$Row[0]));
						$COST_ELEMENT  = (string)$Row[1];
						$COST_ELEMENT_NAME   = setQuote($Row[2]);
						$JUMLAH   			 = setQuote($Row[3]);
						$PURCHASING_DOCUMENT = setQuote($Row[4]);
						$PURCHASE_ORDER_TEXT = setQuote($Row[5]);
						$NAME 				 = setQuote($Row[6]);
						$COST_CENTER  	 	 = setQuote($Row[7]);
						$DOCUMENT_NUMBER  	 = setQuote($Row[8]);
						$POSTING_DATE     	 = setQuote($Row[9]);


						if(!empty($DOCUMENT_NUMBER))
						{

							$sql = " INSERT INTO PATIMBAN_LOADER (
										   URUT, PERIODE, JENIS, 
										   COST_ELEMENT, COST_ELEMENT_NAME, JUMLAH, 
										   PURCHASING_DOCUMENT, PURCHASE_ORDER_TEXT, NAME, 
										   COST_CENTER, DOCUMENT_NUMBER, POSTING_DATE) 
										VALUES ('$urut', '$reqPeriode', '$JENIS', 
										   '$COST_ELEMENT', '$COST_ELEMENT_NAME', '$JUMLAH', 
										   '$PURCHASING_DOCUMENT', '$PURCHASE_ORDER_TEXT', '$NAME', 
										   '$COST_CENTER', '$DOCUMENT_NUMBER', '$POSTING_DATE') ";

							$this->db->query($sql);

							$suksesImport++;
							$urut++;
						}

					}

					$rowKe++;


				}

			}


			$adaFile++;
			echo $suksesImport." data berhasil diimport.";

		}
		else
			echo "Upload dokumen gagal";




	}


	function lock()
	{

		$reqId = $this->input->get("reqId");
		$reqLockedBy = $this->USERID;

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM LOADER_LOCK WHERE PERIODE = '$reqId' AND TRANSAKSI = 'PATIMBAN_LOADER' ")->row()->ADA;

		if($adaData > 0)
		{
			echo "Periode telah dikunci sebelumnya";
			return;
		}

		$this->db->query(" INSERT INTO LOADER_LOCK(TRANSAKSI, PERIODE, STATUS, LOCKED_BY) VALUES('PATIMBAN_LOADER', '$reqId', 'APPROVE', '$reqLockedBy') ");

		echo "Periode berhasil dikunci.";
	}


	function unlock()
	{

		$reqId = $this->input->get("reqId");
		$reqLockedBy = $this->USERID;

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM LOADER_LOCK WHERE PERIODE = '$reqId' AND TRANSAKSI = 'PATIMBAN_LOADER' ")->row()->ADA;

		if($adaData == 0)
		{
			echo "Periode belum dikunci.";
			return;
		}

		$this->db->query(" DELETE FROM LOADER_LOCK WHERE PERIODE = '$reqId' AND TRANSAKSI = 'PATIMBAN_LOADER' ");

		echo "Periode berhasil dibuka.";
	}


	function posting()
	{

		$reqPeriode = $this->input->post("reqPeriode");
		$reqPegawaiApproval1 = $this->input->post("reqPegawaiApproval1");
		$reqPegawaiApproval2 = $this->input->post("reqPegawaiApproval2");
		$reqLockedBy  = $this->USERID;
		$reqPegawaiId = $this->USERID;
		$reqNama      = $this->FULLNAME;

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM LOADER_LOCK WHERE PERIODE = '$reqPeriode' AND TRANSAKSI = 'PATIMBAN_LOADER' AND NOT STATUS = 'REJECT' ")->row()->ADA;

		if($adaData > 0)
		{
			echo "Periode telah diproses.";
			return;
		}

		$this->db->query(" DELETE FROM  LOADER_LOCK WHERE PERIODE = '$reqPeriode' AND TRANSAKSI = 'PATIMBAN_LOADER' ");

		$this->db->query(" INSERT INTO LOADER_LOCK(TRANSAKSI, PERIODE, LOCKED_BY, POSTING_BY, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, POSTING_DATE, STATUS) 
							VALUES('PATIMBAN_LOADER', '$reqPeriode', '$reqLockedBy', '$reqLockedBy', '$reqPegawaiApproval1', '$reqPegawaiApproval2', SYSDATE, 'POSTING') ");



		$reqNomor = $this->db->query(" SELECT NOMOR FROM  LOADER_LOCK WHERE PERIODE = '$reqPeriode' AND TRANSAKSI = 'PATIMBAN_LOADER'  ")->row()->NOMOR;

        $this->load->library('usermobile'); 

        $userMobile = new usermobile();


        $statusEmail1 = $userMobile->pushNotifikasi($reqPegawaiApproval1, $reqPegawaiId, $reqNama, $reqPeriode, $reqNomor, "BIAYA PENGELOLAAN PATIMBAN", "PATIMBAN_LOADER", "APPROVAL1", 1);
    

        if(!empty($reqPegawaiApproval2))
        {
            $statusEmail2 = $userMobile->pushNotifikasi($reqPegawaiApproval2, $reqPegawaiId, $reqNama, $reqPeriode, $reqNomor, "BIAYA PENGELOLAAN PATIMBAN", "PATIMBAN_LOADER", "APPROVAL2", 2, false);
        }



		echo "Data berhasil diposting. ".$statusEmail1;
	}


}