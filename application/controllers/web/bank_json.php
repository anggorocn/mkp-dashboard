<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class bank_json extends CI_Controller
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
		$this->load->model("Bank");
		$bank = new Bank();

		$aColumns = array(
			"BANK_PEMBAYARAN_ID", "NAMA", "KODE_REKENING", "NAMA_REKENING", "COA", "KODE_VA", "BANK_HOST"

		);

		$aColumnsAlias = array(
			"BANK_PEMBAYARAN_ID", "NAMA", "KODE_REKENING", "NAMA_REKENING", "COA", "KODE_VA", "BANK_HOST"

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
			if (trim($sOrder) == "ORDER BY BANK_PEMBAYARAN_ID asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY BANK_PEMBAYARAN_ID desc";
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

		$statement_privacy = " ";

		$statement = " AND (UPPER(A.KODE_REKENING) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $bank->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $bank->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$bank->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $bank->query;
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

		while ($bank->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($bank->getField($aColumns[$i]), 2);
				else
					$row[] = $bank->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}




	function json_inquery()
	{
		$this->load->model("Company");
		$bank = new Company();


		$reqBankId = $this->input->get("reqBankId");

		$aColumns = array(
			"COMPANY_BANK_ID", "COMPANY", "REKENING", "ATAS_NAMA", "CABANG"

		);

		$aColumnsAlias = array(
			"COMPANY_BANK_ID", "COMPANY", "REKENING", "ATAS_NAMA", "CABANG"

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
			if (trim($sOrder) == "ORDER BY COMPANY_BANK_ID asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY COMPANY asc";
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

		$statement_privacy = "  AND BANK_PEMBAYARAN_ID = '$reqBankId' ";

		$statement = " AND (UPPER(A.REKENING) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.COMPANY) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $bank->getCountByParamsBank(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $bank->getCountByParamsBank(array(), $statement_privacy . $statement);

		$bank->selectByParamsBank(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $bank->query;
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

		while ($bank->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($bank->getField($aColumns[$i]), 2);
				else
					$row[] = $bank->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}



	function add()
	{
		$this->load->model("Bank");
		$reqId =	$this->input->post("reqId");

		$bank = new Bank();

		$reqNama 			= $this->input->post("reqNama");
		$reqCoa 			= $this->input->post("reqCoa");
		$reqKodeVA 			= $this->input->post("reqKodeVA");
		$reqKodeRekening 	= $this->input->post("reqKodeRekening");
		$reqNamaRekening 	= $this->input->post("reqNamaRekening");


		$BANK_HOST = $this->input->post("BANK_HOST"); 
		$BANK_HOST_USERNAME = $this->input->post("BANK_HOST_USERNAME"); 
		$BANK_HOST_PASSWORD = $this->input->post("BANK_HOST_PASSWORD"); 
	    $BANK_AUTH = $this->input->post("BANK_AUTH"); 
	    $BANK_TRANS_INQ = $this->input->post("BANK_TRANS_INQ"); 
	    $BANK_BALANCE_INQ = $this->input->post("BANK_BALANCE_INQ"); 
	    $BANK_TODAY_TRANS_INQ = $this->input->post("BANK_TODAY_TRANS_INQ"); 
	    $BANK_AUTODEBIT_NON_HOLD = $this->input->post("BANK_AUTODEBIT_NON_HOLD"); 
	    $BANK_INSERT_HOLD = $this->input->post("BANK_INSERT_HOLD"); 
	    $BANK_UPDATE_HOLD = $this->input->post("BANK_UPDATE_HOLD"); 
	    $BANK_RELEASE_HOLD = $this->input->post("BANK_RELEASE_HOLD"); 
	    $BANK_RELEASE_PAYMENT = $this->input->post("BANK_RELEASE_PAYMENT"); 
	    $BANK_HOLD_INQ = $this->input->post("BANK_HOLD_INQ"); 
	    $BANK_BULK_INQ = $this->input->post("BANK_BULK_INQ"); 



		$bank->setField("BANK_PEMBAYARAN_ID", $reqId);
		$bank->setField("NAMA", $reqNama);
		$bank->setField("COA", $reqCoa);
		$bank->setField("KODE_VA", $reqKodeVA);
		$bank->setField("KODE_REKENING", $reqKodeRekening);
		$bank->setField("NAMA_REKENING", $reqNamaRekening);

		$bank->setField("BANK_HOST", $BANK_HOST); 
		$bank->setField("BANK_HOST_USERNAME", $BANK_HOST_USERNAME); 
		$bank->setField("BANK_HOST_PASSWORD", $BANK_HOST_PASSWORD); 
	    $bank->setField("BANK_AUTH", $BANK_AUTH); 
	    $bank->setField("BANK_TRANS_INQ", $BANK_TRANS_INQ); 
	    $bank->setField("BANK_BALANCE_INQ", $BANK_BALANCE_INQ); 
	    $bank->setField("BANK_TODAY_TRANS_INQ", $BANK_TODAY_TRANS_INQ); 
	    $bank->setField("BANK_AUTODEBIT_NON_HOLD", $BANK_AUTODEBIT_NON_HOLD); 
	    $bank->setField("BANK_INSERT_HOLD", $BANK_INSERT_HOLD); 
	    $bank->setField("BANK_UPDATE_HOLD", $BANK_UPDATE_HOLD); 
	    $bank->setField("BANK_RELEASE_HOLD", $BANK_RELEASE_HOLD); 
	    $bank->setField("BANK_RELEASE_PAYMENT", $BANK_RELEASE_PAYMENT); 
	    $bank->setField("BANK_HOLD_INQ", $BANK_HOLD_INQ); 
	    $bank->setField("BANK_BULK_INQ", $BANK_BULK_INQ); 
	    

		if (empty($reqId)) {
			$bank->setField("CREATED_BY", $this->USERNAME);
			$bank->setField("CREATED_DATE", "CURRENT_DATE");
			$bank->insert();
		} else {
			$bank->setField("UPDATED_BY", $this->USERNAME);
			$bank->setField("UPDATED_DATE", "CURRENT_DATE");
			$bank->update();
		}

		echo 'Data Berhasil di simpan';
	}


	function delete()
	{
		$this->load->model("Bank");
		$bank = new Bank();

		$reqId = $this->input->get('reqId');

		$bank->setField("BANK_PEMBAYARAN_ID", $reqId);
		if ($bank->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo json_encode($arrJson);
	}
}
