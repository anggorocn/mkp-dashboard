<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class tarif_json  extends CI_Controller
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
		$this->load->model("Tarif");
		$tarif = new Tarif();

		$aColumns = array(
			"SERVICES_TARIF_ID", "JASA", "NAMA", "KET", "SATUAN", "TARIF"

		);

		$aColumnsAlias = array(
			"SERVICES_TARIF_ID", "JASA", "NAMA", "KET", "SATUAN", "TARIF"

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
			if (trim($sOrder) == "ORDER BY SERVICES_ID asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY SERVICES_ID desc";
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

		$statement_privacy = "  ";

		$statement = " AND (UPPER(A.NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $tarif->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $tarif->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$tarif->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $tarif->query;
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

		while ($tarif->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($tarif->getField($aColumns[$i]), 2);
				else
					$row[] = $tarif->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}

	function add()
	{
		$this->load->model("Tarif");
		$tarif = new Tarif();

		$reqId = $this->input->post("reqId");
		$reqMode = $this->input->post("reqMode");

		$reqServiceTarifId = $this->input->post("reqServiceTarifId");
		$reqName = $this->input->post("reqName");
		$reqDescription = $this->input->post("reqDescription");
		$reqSatuan = $this->input->post("reqSatuan");
		$reqSatuanEntri = $this->input->post("reqSatuanEntri");

		$reqTanggalAwal = $this->input->post("reqTanggalAwal");
		$reqTanggalAkhir = $this->input->post("reqTanggalAkhir");

		/* CHECK APAKAH TMT SUDAH ADA */
		if($reqMode == "add")
		{
			$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM SERVICES_TARIF 
										WHERE SERVICES_ID = '$reqId' AND 
										(
											TO_DATE('$reqTanggalAwal', 'DD-MM-YYYY') BETWEEN TANGGAL_AWAL AND TANGGAL_AKHIR OR
											TO_DATE('$reqTanggalAkhir', 'DD-MM-YYYY') BETWEEN TANGGAL_AWAL AND TANGGAL_AKHIR
										) ")->row()->ADA;

			if($adaData > 0)
			{

				$arrResult["status"] = "failed";
				$arrResult["message"] = "Range tanggal awal dan tanggal akhir telah dientri sebelumnya.";

				echo json_encode($arrResult);
				return;

			}

			$tarif->setField("SERVICES_ID", $reqId);
			$tarif->setField("TANGGAL_AWAL", dateToDbCheck($reqTanggalAwal));
			$tarif->setField("TANGGAL_AKHIR", dateToDbCheck($reqTanggalAkhir));
			$tarif->setField("CREATED_BY", $this->USERNAME);
			$tarif->insert();
			$reqServiceTarifId = $tarif->id;
		}



		$reqTarifDetil = $this->input->post("reqTarifDetil");
		$reqServiceDetilId = $this->input->post("reqServiceDetilId");
		$reqServiceTarifDetilId = $this->input->post("reqServiceTarifDetilId");
		$reqTanggalAwalDetil = $this->input->post("reqTanggalAwalDetil");
		$reqTanggalAkhirDetil = $this->input->post("reqTanggalAkhirDetil");

		for ($i = 0; $i < count($reqServiceDetilId); $i++) {
			
			$tarifDetilId 	= $reqServiceTarifDetilId[$i];
			$serviceDetilId = $reqServiceDetilId[$i];
			$tarifNilai  	= dotToNo($reqTarifDetil[$i]);
			$awalDetil = dateToDbCheck($reqTanggalAwalDetil[$i]);
			$akhirDetil = dateToDbCheck($reqTanggalAkhirDetil[$i]);



			if($tarifDetilId == "")
			{
				$sql = " INSERT INTO SERVICES_TARIF_DETIL (
								   SERVICES_ID, SERVICES_TARIF_ID, SERVICES_DETIL_ID, TANGGAL_AWAL, TANGGAL_AKHIR, TARIF, CREATED_BY)
						 VALUES('$reqId', '$reqServiceTarifId', '$serviceDetilId', $awalDetil, $akhirDetil, '$tarifNilai', '".$this->USERNAME."') ";
			}
			else
			{
				$sql = " UPDATE SERVICES_TARIF_DETIL 
								SET TARIF = '$tarifNilai',
									TANGGAL_AWAL  = $awalDetil,
									TANGGAL_AKHIR = $akhirDetil,									
									UPDATED_BY = '".$this->USERNAME."',
									UPDATED_DATE = SYSDATE
						WHERE SERVICES_TARIF_DETIL_ID = '$tarifDetilId' ";
			}
			

			$this->db->query($sql);

		}



		$arrResult["status"] = "success";
		$arrResult["message"] = "Data berhasil disimpan.";
		$arrResult["services_id"] = $reqId;
		$arrResult["tarif_id"]    = $reqServiceTarifId;

		echo json_encode($arrResult);


	}


	function delete()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("Tarif");
		$tarif = new Tarif();

		$tarif->setField("SERVICES_TARIF_ID", $reqId);
		if ($tarif->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo 'Data berhasil dihapus';
	}


	function getValue()
	{
		$this->load->model("Services");
		$ClassOfVessel = new Services();
		$reqId = $this->input->get("reqId");
		$ClassOfVessel->selectByParamsMonitoring(array("A.SERVICES_ID" => $reqId));
		$ClassOfVessel->firstRow();
		echo $ClassOfVessel->getField('KET');
	}

	function combo()
	{
		$this->load->model("Services");
		$ClassOfVessel = new Services();

		$ClassOfVessel->selectByParamsMonitoring(array());
		$i = 0;
		while ($ClassOfVessel->nextRow()) {
			$arr_json[$i]['id']		= $ClassOfVessel->getField("SERVICES_ID");
			$arr_json[$i]['text']	= $ClassOfVessel->getField("NAMA");
			$i++;
		}

		echo json_encode($arr_json);
	}
}
