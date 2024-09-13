<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class perpanjangan_nota_json extends CI_Controller
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
        $this->USERID = $this->kauth->getInstance()->getIdentity()->USERID;
        $this->USERNAME = $this->kauth->getInstance()->getIdentity()->USERNAME;
        $this->FULLNAME = $this->kauth->getInstance()->getIdentity()->FULLNAME;
        $this->USERPASS = $this->kauth->getInstance()->getIdentity()->USERPASS;
        $this->LEVEL = $this->kauth->getInstance()->getIdentity()->LEVEL;
        $this->LEVEL_DESC = $this->kauth->getInstance()->getIdentity()->LEVEL_DESC;
        $this->TRANSAKSI = $this->kauth->getInstance()->getIdentity()->TRANSAKSI;
        $this->PELUNASAN = $this->kauth->getInstance()->getIdentity()->PELUNASAN;
        $this->LOCKING_PIUTANG = $this->kauth->getInstance()->getIdentity()->LOCKING_PIUTANG;
        $this->REPORT = $this->kauth->getInstance()->getIdentity()->REPORT;
        $this->DASHBOARD = $this->kauth->getInstance()->getIdentity()->DASHBOARD;
        $this->MASTER_DATA = $this->kauth->getInstance()->getIdentity()->MASTER_DATA;
        $this->VIEW_ALL_TRANS = $this->kauth->getInstance()->getIdentity()->VIEW_ALL_TRANS;

        $this->POSITION = $this->kauth->getInstance()->getIdentity()->POSITION;
        $this->NAMA_POSISI = $this->kauth->getInstance()->getIdentity()->NAMA_POSISI;
        $this->KD_PEL = $this->kauth->getInstance()->getIdentity()->KD_PEL;
        $this->NAMA_PEL = $this->kauth->getInstance()->getIdentity()->NAMA_PEL;
        $this->SUB_UNIT = $this->kauth->getInstance()->getIdentity()->SUB_UNIT;
	}


	function json()
	{
		$this->load->model("PerpanjanganNota");
		$perpanjangan_nota = new PerpanjanganNota();

		$aColumns = array(
			"PERPANJANGAN_NOTA_ID", "POSTING", "NOMOR", "TANGGAL", "NO_NOTA", "TAGIHAN_PROJECT", "COMPANY", "PERPANJANGAN_DUE_DAYS", "DUE_DATE_BEFORE", "DUE_DATE_AFTER", "POSTING_DESC"

		);

		$aColumnsAlias = array(
			"PERPANJANGAN_NOTA_ID", "POSTING", "NOMOR", "TANGGAL", "NO_NOTA", "TAGIHAN_PROJECT", "COMPANY", "PERPANJANGAN_DUE_DAYS", "DUE_DATE_BEFORE", "DUE_DATE_AFTER", "POSTING_DESC"

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
			if (trim($sOrder) == "ORDER BY PERPANJANGAN_NOTA_ID asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY PERPANJANGAN_NOTA_ID desc";
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


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy = " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";

		$statement = " AND (UPPER(A.NO_NOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NOMOR) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $perpanjangan_nota->getCountByParamsMonitoring(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $perpanjangan_nota->getCountByParamsMonitoring(array(), $statement_privacy . $statement);

		$perpanjangan_nota->selectByParamsMonitoring(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
		// echo $perpanjangan_nota->query;
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

		while ($perpanjangan_nota->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($aColumns[$i] == "USERNAME")
					$row[] = truncate($perpanjangan_nota->getField($aColumns[$i]), 2);
				else
					$row[] = $perpanjangan_nota->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}


	function add()
	{
		$this->load->model("PerpanjanganNota");
		$reqId =	$this->input->post("reqId");
		$reqTagihanId =	$this->input->post("reqTagihanId");
		$reqServicesId =	$this->input->post("reqServicesId");

		$perpanjangan_nota = new PerpanjanganNota();

		$reqAlasan 			= $this->input->post("reqAlasan");
		$reqPerpanjanganDueDays = $this->input->post("reqPerpanjanganDueDays");
		$reqDueDateAfter = $this->input->post("reqDueDateAfter");
		$reqPegawaiApproval1 	= $this->input->post("reqPegawaiApproval1");
		$reqPegawaiApproval2 	= $this->input->post("reqPegawaiApproval2");


		$reqNoRef 	= $this->input->post("reqNoRef");
		$reqJenisDokumenRef 	= $this->input->post("reqJenisDokumenRef");
		$reqPerihalRef 	= $this->input->post("reqPerihalRef");
		$reqTanggalRef 	= $this->input->post("reqTanggalRef");



        if($reqPegawaiApproval1 == $reqPegawaiApproval2)
            $reqPegawaiApproval2  = "";

		$perpanjangan_nota->setField("PERPANJANGAN_NOTA_ID", $reqId);
		$perpanjangan_nota->setField("ALASAN_PERPANJANGAN", $reqAlasan);
		$perpanjangan_nota->setField("PERPANJANGAN_DUE_DAYS", $reqPerpanjanganDueDays);
		$perpanjangan_nota->setField("DUE_DATE_AFTER", dateToDbCheck($reqDueDateAfter));
		$perpanjangan_nota->setField("TAGIHAN_PROJECT_ID", $reqTagihanId);
		$perpanjangan_nota->setField("SERVICES_ID", $reqServicesId);
		$perpanjangan_nota->setField("PEGAWAI_ID_APPROVAL1", $reqPegawaiApproval1);
		$perpanjangan_nota->setField("PEGAWAI_ID_APPROVAL2", $reqPegawaiApproval2);


		$perpanjangan_nota->setField("NO_REF", $reqNoRef);
		$perpanjangan_nota->setField("JENIS_DOKUMEN_REF", $reqJenisDokumenRef);
		$perpanjangan_nota->setField("PERIHAL_REF", $reqPerihalRef);
		$perpanjangan_nota->setField("TANGGAL_REF", dateToDbCheck($reqTanggalRef));

        /* WAJIB UNTUK UPLOAD DATA */
        include_once("functions/image.func.php");
        $this->load->library("FileHandler");
        $file = new FileHandler();
        $FILE_DIR = "uploads/tagihan/";
        if (!file_exists($FILE_DIR)) {
            mkdir($FILE_DIR, 0777, true);
        }
        $reqLinkFile = $_FILES["document"];
        $reqLinkFileTemp =  $this->input->post("reqLinkFileTemp");
        
        $insertLinkFile = array();
        for ($i=0; $i < count($reqLinkFile['name']); $i++) { 
            $renameFile = "PERPANJANGAN" . date("dmYhis") . rand() . "." . getExtension($reqLinkFile['name'][$i]);
            if ($file->uploadToDirArray('document', $FILE_DIR, $renameFile, $i)) {
                $insertLinkSize = $file->uploadedSize;
                $insertLinkTipe =  $file->uploadedExtension;
                $insertLinkFile[] =  $renameFile;
            } else {
                $insertLinkSize =  $reqLinkFileTempSize[$i];
                $insertLinkTipe =  $reqLinkFileTempTipe[$i];
                $insertLinkFile[] =  $reqLinkFileTemp[$i];
            }
        }
        $perpanjangan_nota->setField("LAMPIRAN", implode(";", $insertLinkFile));


		if (empty($reqId)) {
			$perpanjangan_nota->setField("CREATED_BY", $this->USERNAME);
			$perpanjangan_nota->setField("CREATED_DATE", "CURRENT_DATE");
			$perpanjangan_nota->insert();
			$reqId = $perpanjangan_nota->id;
		} else {
			$perpanjangan_nota->setField("UPDATED_BY", $this->USERNAME);
			$perpanjangan_nota->setField("UPDATED_DATE", "CURRENT_DATE");
			$perpanjangan_nota->update();
		}


        $arrResult["status"]  = "success";
        $arrResult["message"] = "Data berhasil disimpan.";
        $arrResult["id"] = $reqId;
        
        echo json_encode($arrResult);

	}


	function delete()
	{
		$this->load->model("PerpanjanganNota");
		$perpanjangan_nota = new PerpanjanganNota();

		$reqId = $this->input->get('reqId');

		$perpanjangan_nota->setField("PERPANJANGAN_NOTA_ID", $reqId);
		if ($perpanjangan_nota->delete())
			$arrJson["PESAN"] = "Data berhasil dihapus.";
		else
			$arrJson["PESAN"] = "Data gagal dihapus.";

		echo json_encode($arrJson);
	}


    function posting()
    {
        $reqId = $this->input->get('reqId');

        $query = $this->db->query(" SELECT NOMOR, POSTING, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2 FROM PERPANJANGAN_NOTA X WHERE X.PERPANJANGAN_NOTA_ID = '".$reqId."'  ");

        $reqIsVerifikasi       = $query->row()->POSTING;
        $reqNomor              = $query->row()->NOMOR; 
        $reqPegawaiApproval1   = $query->row()->PEGAWAI_ID_APPROVAL1; 
        $reqPegawaiApproval2   = $query->row()->PEGAWAI_ID_APPROVAL2; 
        $reqPegawaiId          = $this->USERID;
        $reqNama               = $this->USERNAME;

        if($reqIsVerifikasi == "DRAFT" || $reqIsVerifikasi == "REVISI")
        {}
        else
        {
            echo "Permohonan telah diposting.";
            return;
        }



      
        $this->load->library('usermobile'); 

        $userMobile = new usermobile();


        $statusEmail1 = $userMobile->pushNotifikasi($reqPegawaiApproval1, $reqPegawaiId, $reqNama, $reqId, $reqNomor, "PERMOHONAN PENAMBAHAN JATUH TEMPO", "PERPANJANGAN_NOTA", "APPROVAL1", 1);
    

        if(!empty($reqPegawaiApproval2))
        {
            $statusEmail2 = $userMobile->pushNotifikasi($reqPegawaiApproval2, $reqPegawaiId, $reqNama, $reqId, $reqNomor, "PERMOHONAN PENAMBAHAN JATUH TEMPO", "PERPANJANGAN_NOTA", "APPROVAL2", 2, false);
        }

      



        $this->db->query(" UPDATE PERPANJANGAN_NOTA X SET POSTING = 'POSTING', POSTING_DATE = SYSDATE WHERE X.PERPANJANGAN_NOTA_ID = '".$reqId."' "); 


        echo $statusEmail1.". Data berhasil diposting.";

        return;


    }


}
