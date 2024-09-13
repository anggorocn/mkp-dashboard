<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class jasa_json  extends CI_Controller
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
        $this->SERVICES_ID_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_ID_ACCESS;
	}

	function json()
	{
		$this->load->model("Jasa");
		$jasa = new Jasa();

		$aColumns = array(
			"SERVICES_ID", "KODE", "NAMA", "DUE_DAYS", "KODE_FAKTUR", "METODE_PEMBAYARAN", "APPROVAL_JABATAN_NAMA1", "APPROVAL_JABATAN_NAMA2"
		);

		$aColumnsAlias = array(
			"SERVICES_ID", "KODE", "NAMA", "DUE_DAYS", "KODE_FAKTUR", "METODE_PEMBAYARAN", "APPROVAL_JABATAN_NAMA1", "APPROVAL_JABATAN_NAMA2"
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


		if($this->MASTER_DATA == "1")
		{}
		else
		{
			$statement_privacy = " AND A.SERVICES_ID IN (".$this->SERVICES_ID_ACCESS.") ";
		}

		$statement = " AND (UPPER(A.NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $jasa->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $jasa->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$jasa->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $jasa->query;
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

		while ($jasa->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($jasa->getField($aColumns[$i]), 2);
				else
					$row[] = $jasa->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}



	function json_tarif()
	{
		$this->load->model("Jasa");
		$jasa = new Jasa();

		$aColumns = array(
			"SERVICES_ID", "SERVICES_TARIF_ID", "KODE", "NAMA", "TANGGAL_AWAL", "TANGGAL_AKHIR"
		);

		$aColumnsAlias = array(
			"SERVICES_ID", "SERVICES_TARIF_ID", "KODE", "NAMA", "TANGGAL_AWAL", "TANGGAL_AKHIR"
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


		$statement_privacy = " AND A.JENIS_TRANSAKSI = 'ACTIVITY' ";



		if($this->MASTER_DATA == "1")
		{}
		else
		{
			$statement_privacy .= " AND A.SERVICES_ID IN (".$this->SERVICES_ID_ACCESS.") ";
		}



		$statement = " AND (UPPER(A.NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $jasa->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $jasa->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$jasa->selectByParamsTarif(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $jasa->query;
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

		while ($jasa->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($jasa->getField($aColumns[$i]), 2);
				else
					$row[] = $jasa->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}

	function add()
	{
		$this->load->model("Jasa");
		$jasa = new Jasa();
		$reqId = $this->input->post("reqId");

		$reqName = $this->input->post("reqName");
		$reqDescription = $this->input->post("reqDescription");
		$reqCOA = $this->input->post("reqCOA");
		$reqKode = $this->input->post("reqKode");
		$reqDueDays = $this->input->post("reqDueDays");
		$reqMetodePembayaran = $this->input->post("reqMetodePembayaran");
		$reqKodeFaktur = $this->input->post("reqKodeFaktur");
		$reqKodePendapatan = $this->input->post("reqKodePendapatan");



		$reqApprovalJabatan1 = $this->input->post("reqApprovalJabatan1");
		$reqApprovalJabatan2 = $this->input->post("reqApprovalJabatan2");

		$reqApprovalJabatanNama1 = $this->db->query(" SELECT NAMA_POSISI FROM PEGAWAI_STRUKTURAL WHERE POSITION = '$reqApprovalJabatan1' ")->row()->NAMA_POSISI;
		$reqApprovalJabatanNama2 = $this->db->query(" SELECT NAMA_POSISI FROM PEGAWAI_STRUKTURAL WHERE POSITION = '$reqApprovalJabatan2' ")->row()->NAMA_POSISI;

		$jasa->setField("SERVICES_ID", $reqId);
		$jasa->setField("NAMA", $reqName);
		$jasa->setField("KET", $reqDescription);
		$jasa->setField("KODE", $reqKode);
		$jasa->setField("COA", $reqCOA);
		$jasa->setField("DUE_DAYS", $reqDueDays);
		$jasa->setField("METODE_PEMBAYARAN", $reqMetodePembayaran);
		$jasa->setField("KODE_FAKTUR", $reqKodeFaktur);
		$jasa->setField("KODE_PENDAPATAN", $reqKodePendapatan);
		$jasa->setField("APPROVAL_JABATAN1", $reqApprovalJabatan1);
		$jasa->setField("APPROVAL_JABATAN2", $reqApprovalJabatan2);
		$jasa->setField("APPROVAL_JABATAN_NAMA1", $reqApprovalJabatanNama1);
		$jasa->setField("APPROVAL_JABATAN_NAMA2", $reqApprovalJabatanNama2);
		if (empty($reqId)) {
			$jasa->setField("CREATED_BY", $this->USERNAME);
			$jasa->setField("CREATED_DATE", "CURRENT_DATE");
			$jasa->insert();
			$reqId = $jasa->id;
		} else {
			$jasa->setField("UPDATED_BY", $this->USERNAME);
			$jasa->setField("UPDATED_DATE", "CURRENT_DATE");
			$jasa->update();
		}


		$reqServiceDetilId = $this->input->post("reqServiceDetilId");
		$reqServicesId = $this->input->post("reqServicesId");
		$reqNamaDetil = $this->input->post("reqNamaDetil");
		$reqKeteranganDetil = $this->input->post("reqKeteranganDetil");
		$reqCoaDetil = $this->input->post("reqCoaDetil");
		$reqSatuan = $this->input->post("reqSatuan");

		for($i=0;$i<count($reqServiceDetilId);$i++)
		{
			if($reqNamaDetil[$i] == "")
				continue;
 
			if($reqServiceDetilId[$i] == "")
			{
				$sql = " INSERT INTO SERVICES_DETIL (
						   SERVICES_ID, NAMA, COA, KET, SATUAN, CREATED_BY) 
						 VALUES('$reqId', '".$reqNamaDetil[$i]."', '".$reqCoaDetil[$i]."', '".$reqKeteranganDetil[$i]."', '".$reqSatuan[$i]."', '".$this->USERNAME."') ";
			}
			else
			{
				$sql = " UPDATE SERVICES_DETIL SET 
							NAMA = '".$reqNamaDetil[$i]."',
							COA  = '".$reqCoaDetil[$i]."',
							KET  = '".$reqKeteranganDetil[$i]."',
							SATUAN  = '".$reqSatuan[$i]."',
							UPDATED_BY   = '".$this->USERNAME."',
							UPDATED_DATE = SYSDATE
						 WHERE SERVICES_DETIL_ID = '".$reqServiceDetilId[$i]."'
							 ";
			}

			$this->db->query($sql);

		}




		$reqServiceKertasKerjaId = $this->input->post("reqServiceKertasKerjaId");
		$reqNamaDetilKK = $this->input->post("reqNamaDetilKK");
		$reqKeteranganDetilKK = $this->input->post("reqKeteranganDetilKK");
		$reqTipeDataKK = $this->input->post("reqTipeDataKK");

		
		for($i=0;$i<count($reqServiceKertasKerjaId);$i++)
		{
			if($reqNamaDetilKK[$i] == "")
				continue;
 
			if($reqServiceKertasKerjaId[$i] == "")
			{
				$sql = " INSERT INTO SERVICES_KERTAS_KERJA (
						   SERVICES_ID, NAMA, TIPE, KET, CREATED_BY) 
						 VALUES('$reqId', '".$reqNamaDetilKK[$i]."', '".$reqTipeDataKK[$i]."', '".$reqKeteranganDetilKK[$i]."', '".$this->USERNAME."') ";
			}
			else
			{
				$sql = " UPDATE SERVICES_KERTAS_KERJA SET 
							NAMA = '".$reqNamaDetilKK[$i]."',
							TIPE  = '".$reqTipeDataKK[$i]."',
							KET  = '".$reqKeteranganDetilKK[$i]."',
							UPDATED_BY   = '".$this->USERNAME."',
							UPDATED_DATE = SYSDATE
						 WHERE SERVICES_KERTAS_KERJA_ID = '".$reqServiceKertasKerjaId[$i]."'
							 ";
			}

			$this->db->query($sql);

		}


		echo "Data berhasil disimpan.";
	}


	function delete()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("Jasa");
		$jasa = new Jasa();

		$jasa->setField("SERVICES_ID", $reqId);
		if ($jasa->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo 'Data berhasil dihapus';
	}



	function delete_detil()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("Jasa");
		$jasa = new Jasa();

		$jasa->setField("SERVICES_DETIL_ID", $reqId);
		if ($jasa->deleteDetil())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo 'Data berhasil dihapus';
	}




	function delete_detil_kk()
	{
		$reqId	= $this->input->get('reqId');
		$this->load->model("Jasa");
		$jasa = new Jasa();

		$jasa->setField("SERVICES_KERTAS_KERJA_ID", $reqId);
		if ($jasa->deleteDetilKertasKerja())
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
