<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

require('libraries/spreadsheet-reader/php-excel-reader/excel_reader2.php');
require('libraries/spreadsheet-reader/SpreadsheetReader.php');
class manajemen_fee_json extends CI_Controller
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
		$this->load->model("ManajemenFee");
		$manajemen_fee = new ManajemenFee();

		$reqPeriode = $this->input->get("reqPeriode");

		$aColumns = array(
			"NO_NOTA", "NO_NOTA", "INT_DOM", "SEGMEN", 
                   "VOYAGE", "SERVICE", "TANGGAL", 
                   "CUSTOMER", "INVOICE", "INVOICE_NON_ADMIN", 
                   "PNBP", "MAN_FEE", "PPN", 
                   "ADMIN", "MAN_FEE_TOTAL"
		);

		$aColumnsAlias = array(
			"NO_NOTA", "NO_NOTA", "INT_DOM", "SEGMEN", 
                   "VOYAGE", "SERVICE", "TANGGAL", 
                   "CUSTOMER", "INVOICE", "INVOICE_NON_ADMIN", 
                   "PNBP", "MAN_FEE", "PPN", 
                   "ADMIN", "MAN_FEE_TOTAL"
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
			if (trim($sOrder) == "ORDER BY NO_NOTA asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY NO_NOTA desc";
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


		$statement = " AND (UPPER(A.NO_NOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.CUSTOMER) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $manajemen_fee->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $manajemen_fee->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$manajemen_fee->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $manajemen_fee->query;
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

		while ($manajemen_fee->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "INVOICE" || $aColumns[$i] ==  "INVOICE_NON_ADMIN" || $aColumns[$i] ==  "PNBP" 
					 || $aColumns[$i] == "MAN_FEE"  || $aColumns[$i] ==  "PPN"  || 
					 $aColumns[$i] == "ADMIN"  || $aColumns[$i] == "MAN_FEE_TOTAL")
					$row[] = "<div style='text-align:right'>".numberToIna($manajemen_fee->getField($aColumns[$i]))."</div>";
				else
					$row[] = $manajemen_fee->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;

		}


		$sql = "  
				SELECT SUM(INVOICE) INVOICE, SUM(INVOICE_NON_ADMIN) INVOICE_NON_ADMIN, SUM(PNBP) PNBP, 
					SUM(MAN_FEE) MAN_FEE, SUM(PPN) PPN, SUM(ADMIN) ADMIN, SUM(MAN_FEE_TOTAL) MAN_FEE_TOTAL
				FROM MANAJEMEN_FEE A WHERE 1 = 1 ".$statement_privacy;

		$rowResult = $this->db->query($sql)->row();

		$output['INVOICE'] = numberToIna($rowResult->INVOICE);	
		$output['INVOICE_NON_ADMIN'] = numberToIna($rowResult->INVOICE_NON_ADMIN);	
		$output['PNBP'] = numberToIna($rowResult->PNBP);	
		$output['MAN_FEE'] = numberToIna($rowResult->MAN_FEE);	
		$output['PPN'] = numberToIna($rowResult->PPN);	
		$output['ADMIN'] = numberToIna($rowResult->ADMIN);	
		$output['MAN_FEE_TOTAL'] = numberToIna($rowResult->MAN_FEE_TOTAL);	


		echo json_encode($output);
	}




	function json_transaksi()
	{
		$this->load->model("ManajemenFee");
		$manajemen_fee = new ManajemenFee();

		$reqPeriode = $this->input->get("reqPeriode");

		$aColumns = array(
			"NO_NOTA", "NO_NOTA", "INT_DOM", "SEGMEN", 
                   "SERVICE", "TANGGAL", 
                   "CUSTOMER", "INVOICE", "INVOICE_NON_ADMIN", 
                   "PNBP", "MAN_FEE", "PPN", 
                    "MAN_FEE_TOTAL"
		);

		$aColumnsAlias = array(
			"NO_NOTA", "NO_NOTA", "INT_DOM", "SEGMEN", 
                    "SERVICE", "TANGGAL", 
                   "CUSTOMER", "INVOICE", "INVOICE_NON_ADMIN", 
                   "PNBP", "MAN_FEE", "PPN", 
                   "MAN_FEE_TOTAL"
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
			if (trim($sOrder) == "ORDER BY NO_NOTA asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY NO_NOTA desc";
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


		$statement = " AND (UPPER(A.NO_NOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.CUSTOMER) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $manajemen_fee->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $manajemen_fee->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$manajemen_fee->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $manajemen_fee->query;
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

		while ($manajemen_fee->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "INVOICE" || $aColumns[$i] ==  "INVOICE_NON_ADMIN" || $aColumns[$i] ==  "PNBP" 
					 || $aColumns[$i] == "MAN_FEE"  || $aColumns[$i] ==  "PPN"  || 
					 $aColumns[$i] == "ADMIN"  || $aColumns[$i] == "MAN_FEE_TOTAL")
					$row[] = "<div style='text-align:right'>".numberToIna($manajemen_fee->getField($aColumns[$i]))."</div>";
				else
					$row[] = $manajemen_fee->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;

		}


		$sql = "  
				SELECT SUM(INVOICE) INVOICE, SUM(INVOICE_NON_ADMIN) INVOICE_NON_ADMIN, SUM(PNBP) PNBP, 
					SUM(MAN_FEE) MAN_FEE, SUM(PPN) PPN, SUM(ADMIN) ADMIN, SUM(MAN_FEE_TOTAL) MAN_FEE_TOTAL
				FROM MANAJEMEN_FEE A WHERE 1 = 1 ".$statement_privacy;

		$rowResult = $this->db->query($sql)->row();

		$output['INVOICE'] = numberToIna($rowResult->INVOICE);	
		$output['INVOICE_NON_ADMIN'] = numberToIna($rowResult->INVOICE_NON_ADMIN);	
		$output['PNBP'] = numberToIna($rowResult->PNBP);	
		$output['MAN_FEE'] = numberToIna($rowResult->MAN_FEE);	
		$output['PPN'] = numberToIna($rowResult->PPN);	
		$output['ADMIN'] = numberToIna($rowResult->ADMIN);	
		$output['MAN_FEE_TOTAL'] = numberToIna($rowResult->MAN_FEE_TOTAL);	


		echo json_encode($output);
	}


	function delete()
	{
		$this->load->model("ManajemenFee");
		$manajemen_fee = new ManajemenFee();

		$reqId = $this->input->get('reqId');
		$reqPeriode = $this->input->get('reqPeriode');

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM MANAJEMEN_FEE_LOCK WHERE PERIODE = '$reqPeriode' ")->row()->ADA;

		if($adaData > 0)
		{
			echo "Periode telah dikunci sebelumnya";
			return;
		}

		$manajemen_fee->setField("PERIODE", $reqPeriode);
		$manajemen_fee->setField("NO_NOTA", $reqId);
		if ($manajemen_fee->delete())
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

			$sql = " DELETE FROM MANAJEMEN_FEE WHERE PERIODE ='$reqPeriode' ";
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
						$NO_NOTA  = (string)$Row[1];
						$INT_DOM  = (string)$Row[2];
						$SEGMEN   = setQuote($Row[3]);
						$VOYAGE   = setQuote($Row[4]);
						$SERVICE  = setQuote($Row[5]);
						$TANGGAL  = setQuote($Row[6]);
						$CUSTOMER = setQuote($Row[7]);
						$INVOICE  = setQuote($Row[8]);
						$INVOICE_NON_ADMIN  = setQuote($Row[9]);
						$PNBP     = setQuote($Row[10]);
						$MAN_FEE  = setQuote($Row[11]);
						$PPN      = setQuote($Row[12]);
						$ADMIN    = setQuote($Row[13]);
						$MAN_FEE_TOTAL  = CommaToNo(dotToNo($Row[14]));

						if(!empty($NO_NOTA))
						{

						$sql = " INSERT INTO MANAJEMEN_FEE (
							   PERIODE, NO_NOTA, INT_DOM, 
							   SEGMEN, VOYAGE, SERVICE, 
							   TANGGAL, CUSTOMER, INVOICE, 
							   INVOICE_NON_ADMIN, PNBP, MAN_FEE, 
							   PPN, ADMIN, MAN_FEE_TOTAL) 
							    VALUES (
							   '$reqPeriode', '$NO_NOTA', '$INT_DOM', 
							   '$SEGMEN', '$VOYAGE', '$SERVICE', 
							   '$TANGGAL', '$CUSTOMER', '$INVOICE', 
							   '$INVOICE_NON_ADMIN', '$PNBP', '$MAN_FEE', 
							   '$PPN', '$ADMIN', '$MAN_FEE_TOTAL') ";

						$this->db->query($sql);

						$suksesImport++;
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

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM MANAJEMEN_FEE_LOCK WHERE PERIODE = '$reqId' ")->row()->ADA;

		if($adaData > 0)
		{
			echo "Periode telah dikunci sebelumnya";
			return;
		}

		$this->db->query(" INSERT INTO MANAJEMEN_FEE_LOCK(PERIODE, LOCKED_BY) VALUES('$reqId', '$reqLockedBy') ");

		$resultArray = $this->db->query(" SELECT * FROM MANAJEMEN_FEE WHERE PERIODE = '$reqId' ORDER BY TANGGAL ")->result_array();

		$reqData = json_encode($resultArray);

		$reqFile = "uploads/MANAJEMEN_FEE_".$reqId.".json";
		$myfile = fopen($reqFile, "w");
		$myfile = fopen($reqFile, "w") or die("Unable to open file!");
		$txt = $reqData;
		fwrite($myfile, $txt);
		fclose($myfile);	

		echo "Periode berhasil dikunci.";
	}


	function unlock()
	{

		$reqId = $this->input->get("reqId");
		$reqLockedBy = $this->USERID;

		$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM MANAJEMEN_FEE_LOCK WHERE PERIODE = '$reqId' ")->row()->ADA;

		if($adaData == 0)
		{
			echo "Periode belum dikunci.";
			return;
		}

		$this->db->query(" DELETE FROM MANAJEMEN_FEE_LOCK WHERE PERIODE = '$reqId' ");

		echo "Periode berhasil dibuka.";
	}
}