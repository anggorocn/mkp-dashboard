<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class tagihan_json extends CI_Controller
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


        $this->SERVICES_ID_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_ID_ACCESS;
        $this->SERVICES_KODE_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_KODE_ACCESS;


        $this->POSITION = $this->kauth->getInstance()->getIdentity()->POSITION;
        $this->NAMA_POSISI = $this->kauth->getInstance()->getIdentity()->NAMA_POSISI;
        $this->KD_PEL = $this->kauth->getInstance()->getIdentity()->KD_PEL;
        $this->NAMA_PEL = $this->kauth->getInstance()->getIdentity()->NAMA_PEL;
        $this->SUB_UNIT = $this->kauth->getInstance()->getIdentity()->SUB_UNIT;
    }

    function json()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $reqServicesId = $this->input->get("reqServicesId");

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NOMOR", "JASA", "PELANGGAN", "TANGGAL", "KETERANGAN", "TOTAL", "POSTING_DESC"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NOMOR", "JASA", "PELANGGAN", "TANGGAL", "KETERANGAN", "TOTAL", "POSTING"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";
        

        $statement_privacy .= " AND A.SERVICES_JENIS_TRANSAKSI = 'ACTIVITY' ";
        $statement_privacy .= " AND A.POSTING IN ('DRAFT', 'POSTING', 'REVISI') ";

        $statement = " AND (UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NOMOR) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
			 * Output
			 */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }



    function json_pranota_history()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $reqServicesId = $this->input->get("reqServicesId");

        $aColumns = array(
            "TAGIHAN_ID", "POSTING", "LINK_PRANOTA", "NO_PRANOTA", "SERVICES", "PELANGGAN", "TANGGAL_PRANOTA", "KETERANGAN", "TOTAL", "POSTING_DESC"
        );

        $aColumnsAlias = array(
            "TAGIHAN_ID", "POSTING", "LINK_PRANOTA", "NO_PRANOTA", "SERVICES", "PELANGGAN", "TANGGAL_PRANOTA", "KETERANGAN", "TOTAL", "POSTING"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TANGGAL_PRANOTA desc";
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

        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";
        

        $statement_privacy .= " AND NOT A.POSTING IN ('DRAFT', 'POSTING', 'REVISI') ";

        $statement = " AND (UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";

        $allRecord = $tagihan->getCountByParamsPranotaTagihan(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsPranotaTagihan(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsPranotaTagihan(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }




    function json_transaksi_periode()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $reqServicesId = $this->input->get("reqServicesId");

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NOMOR", "JASA", "PELANGGAN", "TANGGAL", "KETERANGAN", "TOTAL", "POSTING_DESC"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NOMOR", "JASA", "PELANGGAN", "TANGGAL", "KETERANGAN", "TOTAL", "POSTING"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";


        $statement_privacy .= " AND A.SERVICES_JENIS_TRANSAKSI = 'KERTAS KERJA' ";
        
        $statement_privacy .= " AND A.POSTING IN ('DRAFT', 'POSTING', 'REVISI') ";

        $statement = " AND (UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NOMOR) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function json_invoice()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.POSTING IN ('APPROVE', 'KEUANGAN_REVISI')  ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";



        $statement = " AND (UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NOMOR) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }




    function json_batal()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "SERVICES_ID", "NO_NOTA", "SERVICES", "COMPANY", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "POSTING_DESC", "TOTAL", "NO_JURNAL_JPJ"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "SERVICES_ID", "NO_NOTA", "SERVICES", "COMPANY", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "POSTING_DESC", "TOTAL", "NO_JURNAL_JPJ"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND (A.POSTING = 'JURNAL_PENJUALAN' OR A.POSTING = 'KEUANGAN') AND A.STATUS_BATAL = '0' AND NOT EXISTS(SELECT 1 FROM PEMBATALAN_NOTA X WHERE X.TAGIHAN_PROJECT_ID = A.TAGIHAN_PROJECT_ID) ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = "";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }




    function json_cetak_nota_all()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES", "NO_PRANOTA", "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES", "NO_PRANOTA", "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");
        $reqKodePelanggan = $this->input->get("reqKodePelanggan");
        $reqOutput = $this->input->get("reqOutput");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus'  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";
        else
        {

            if(!empty($this->SERVICES_ID_ACCESS))
                $statement_privacy .= " AND A.SERVICES_ID IN (".$this->SERVICES_ID_ACCESS.") ";
        }


        if(!empty($reqKodePelanggan))
            $statement_privacy .= " AND A.PELANGGAN_KODE = '$reqKodePelanggan' ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;




        /* untuk output ke excel */
        if($reqOutput == "excel")
        {
        
            $aColumns = array(
                "TAGIHAN_ID", "LINK_PRANOTA", "PERIODE", "SERVICES", "NO_PRANOTA", "NO_INVOICE", "TANGGAL_NOTA", 
                "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN");

            $aColumnsAlias = array(
                "TAGIHAN_ID", "LINK_PRANOTA", "PERIODE", "SERVICES", "NO_PRANOTA", "NO_INVOICE", "TANGGAL_NOTA", 
                "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL_INVOICE", "TOTAL_TAGIHAN");


            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=excel.xls");
            

            ?>


                <table class="area-data-slip" border="1">
                
                    <tr>
                    <?
                    for($i=2;$i<count($aColumnsAlias);$i++)
                    {
                        echo "<th>".str_replace("_", " ", $aColumns[$i])."</th>";       
                    }
                    ?>
                    </tr>
                    <?
                    while ($tagihan->nextRow()) {
                        ?>
                        <tr>
                        <?
                        for ($i = 2; $i < count($aColumns); $i++) {
                            if ($aColumns[$i] == "PERIODE") {
                                $row = getNamePeriode($tagihan->getField($aColumns[$i]));
                            } elseif (($aColumns[$i] == "TOTAL")) {
                                $row = ($tagihan->getField($aColumns[$i]));
                            } else {
                                $row = $tagihan->getField($aColumns[$i]);
                            }
                            
                            ?>
                            <td valign="top"><?=$row?></td>
                            <?  
                            
                        }
            
                        ?>
                        </tr>
                        <?
                    }
                ?>
                </table>


            <?

            return;

        }
        /* end of untuk output ke excel */



        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL") || ($aColumns[$i] == "TOTAL_TAGIHAN")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }





    function json_cetak_nota()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "KODE_BAYAR", "NO_JURNAL_JPJ", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "KODE_BAYAR", "NO_JURNAL_JPJ", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND (A.POSTING IN ('APPROVE', 'LUNAS')) AND A.STATUS_BATAL = '0'  ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = "";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }




    function json_locking_piutang()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES", "NO_INVOICE", "TANGGAL_NOTA", 
            "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES",  "NO_INVOICE", "TANGGAL_NOTA", 
            "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");
        $reqKodePelanggan = $this->input->get("reqKodePelanggan");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus'  ";
        $statement_privacy .= " AND A.DUE_DATE IS NOT NULL AND A.DUE_DATE < SYSDATE  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";

        if(!empty($reqKodePelanggan))
            $statement_privacy .= " AND A.PELANGGAN_KODE = '$reqKodePelanggan' ";



        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TOTAL_PELUNASAN" || $aColumns[$i] == "SISA_TAGIHAN") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL" || $aColumns[$i] == "TOTAL_TAGIHAN")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function json_lookup_locking_piutang()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "SERVICES_ID", "LINK_INVOICE", "SERVICES", "NO_INVOICE", "TANGGAL_NOTA", 
            "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID", "SERVICES_ID", "LINK_INVOICE", "SERVICES",  "NO_INVOICE", "TANGGAL_NOTA", 
            "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");
        $reqKodePelanggan = $this->input->get("reqKodePelanggan");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus'  ";
        $statement_privacy .= " AND A.DUE_DATE IS NOT NULL AND A.DUE_DATE < SYSDATE  ";
        $statement_privacy .= " AND NOT EXISTS(SELECT 1 FROM PERPANJANGAN_NOTA X WHERE TO_CHAR(X.TAGIHAN_PROJECT_ID) = A.TAGIHAN_ID AND 
                                                    X.POSTING IN ('DRAFT', 'REVISI'))  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";

        if(!empty($reqKodePelanggan))
            $statement_privacy .= " AND A.PELANGGAN_KODE = '$reqKodePelanggan' ";



        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TOTAL_PELUNASAN" || $aColumns[$i] == "SISA_TAGIHAN") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    function json_outstanding()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES", "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES",  "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "DUE_DATE", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");
        $reqKodePelanggan = $this->input->get("reqKodePelanggan");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus'  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";

        if(!empty($reqKodePelanggan))
            $statement_privacy .= " AND A.PELANGGAN_KODE = '$reqKodePelanggan' ";

        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TOTAL_PELUNASAN" || $aColumns[$i] == "SISA_TAGIHAN") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL") || ($aColumns[$i] == "TOTAL_TAGIHAN")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function json_pembayaran_history()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES", "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID", "LINK_PRANOTA", "LINK_INVOICE", "SERVICES",  "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_TAGIHAN", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");
        $reqKodePelanggan = $this->input->get("reqKodePelanggan");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus'  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";



        if(!empty($reqKodePelanggan))
            $statement_privacy .= " AND A.PELANGGAN_KODE = '$reqKodePelanggan' ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TOTAL_PELUNASAN" || $aColumns[$i] == "SISA_TAGIHAN") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL") || ($aColumns[$i] == "TOTAL_TAGIHAN")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }



    function json_outstanding_pelunasan()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_ID", "SERVICES_ID", "SERVICES", "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $aColumnsAlias = array(
            "TAGIHAN_ID","SERVICES_ID", "SERVICES",  "NO_INVOICE", "TANGGAL_NOTA", 
            "KODE_BAYAR", "NOMOR_SAP", "NO_FAKTUR", "KETERANGAN", "PELANGGAN", "TOTAL", "TOTAL_PELUNASAN", "SISA_TAGIHAN");

        $reqStatus = $this->input->get("reqStatus");
        $reqPeriode = $this->input->get("reqPeriode");
        $reqServicesId = $this->input->get("reqServicesId");

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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '$reqStatus' AND NOT A.SERVICES_ID = '7'  ";

        if(!empty($reqPeriode))
            $statement_privacy .= " AND TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') = '$reqPeriode' ";


        if(!empty($reqServicesId))
            $statement_privacy .= " AND A.SERVICES_ID = '$reqServicesId' ";



        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = " AND (
                            UPPER(A.NO_PRANOTA) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_INVOICE) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KODE_BAYAR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NOMOR_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_FAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.KETERANGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.PELANGGAN) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $allRecord = $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsCetakNotaAll(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsCetakNotaAll(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TOTAL_PELUNASAN" || $aColumns[$i] == "SISA_TAGIHAN") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function json_outstanding_bak()
    {

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "KODE_BAYAR", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "DUE_DATE", "AGING_PIUTANG", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
        );

        $aColumnsAlias = array(
            "TAGIHAN_PROJECT_ID", "POSTING", "NO_NOTA", "KODE_BAYAR", "NO_FAKTUR", "JASA", "PELANGGAN", "TANGGAL_NOTA", "DUE_DATE", "(CASE WHEN TANGGAL_NOTA > DUE_DATE THEN 0 ELSE (SYSDATE - DUE_DATE) + 1 END)", "KETERANGAN", "TOTAL", "NO_JURNAL_JPJ"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY TAGIHAN_PROJECT_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY TAGIHAN_PROJECT_ID desc";
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

        $statement_privacy = " AND A.REC_STAT = '0' AND A.STATUS_BATAL = '0' AND A.NO_NOTA IS NOT NULL  ";


        if($this->VIEW_ALL_TRANS == "1")
        {}
        else
            $statement_privacy .= " AND A.SUB_UNIT = '".$this->SUB_UNIT."'  ";
        

        $statement = "";

        $allRecord = $tagihan->getCountByParams(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParams(array(), $statement_privacy . $statement);

        $tagihan->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "TOTAL")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }



    function json_cetak_nota_header()
    {

        $reqPeriode = $this->input->get("reqPeriode");
        $reqOutput = $this->input->get("reqOutput");

        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $aColumns = array(
            "ORDER_NO", "ORDER_NO", "INVOICE_NO", "NO_EPB", "ORDER_SERVICE_CODE", "PELANGGAN", "PAYMENT_TIME", "INVOICE_AMOUNT", "NO_FAKTUR"
        );

        $aColumnsAlias = array(
            "ORDER_NO", "ORDER_NO", "INVOICE_NO", "NO_EPB", "ORDER_SERVICE_CODE", "PELANGGAN", "PAYMENT_TIME", "INVOICE_AMOUNT", "NO_FAKTUR"
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
            // echo $sOrder;exit;

            //Check if there is an order by clause
            if (trim($sOrder) == "ORDER BY ORDER_NO asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY A.CREATED_DATE desc";
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


        $statement = " AND (
                            UPPER(A.ORDER_NO) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.INVOICE_NO) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.NO_EPB) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(A.CUSTOMER) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR 
                            UPPER(B.FULL_NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%'
                        )";

        $statement_privacy = " AND TO_CHAR(A.CREATED_DATE, 'MMYYYY') = '$reqPeriode' ";

        $allRecord = $tagihan->getCountByParamsInvoiceHeader(array(), $statement_privacy . $statement);
        // echo $tagihan->query;
        // exit;

        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $tagihan->getCountByParamsInvoiceHeader(array(), $statement_privacy . $statement);

        $tagihan->selectByParamsInvoiceHeader(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $tagihan->query;
        // exit;
        /*
             * Output
             */



        /* untuk output ke excel */
        if($reqOutput == "excel")
        {
        

            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=excel.xls");
            

            ?>


                <table class="area-data-slip" border="1">
                
                    <tr>
                    <?
                    for($i=1;$i<count($aColumns);$i++)
                    {
                        echo "<th>".str_replace("_", " ", $aColumns[$i])."</th>";       
                    }
                    ?>
                    </tr>
                    <?
                    while ($tagihan->nextRow()) {
                        ?>
                        <tr>
                        <?
                        for ($i = 1; $i < count($aColumns); $i++) {
                            if ($aColumns[$i] == "PAJAK") {
                                $row = numberToIna($tagihan->getField($aColumns[$i]));
                            } elseif (($aColumns[$i] == "INVOICE_AMOUNT")) {
                                $row = ($tagihan->getField($aColumns[$i]));
                            } else {
                                $row = $tagihan->getField($aColumns[$i]);
                            }
                            
                            ?>
                            <td valign="top"><?=$row?></td>
                            <?  
                            
                        }
            
                        ?>
                        </tr>
                        <?
                    }
                ?>
                </table>


            <?

            return;

        }
        /* end of untuk output ke excel */


        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($tagihan->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "PAJAK") {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } elseif (($aColumns[$i] == "INVOICE_AMOUNT")) {
                    $row[] = numberToIna($tagihan->getField($aColumns[$i]));
                } else {
                    $row[] = $tagihan->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function add()
    {
        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $this->load->model("TagihanDetil");
        $tagihan_detil = new TagihanDetil();

        $this->load->model("Customer");
        $customer = new Customer();

        $reqMode = $this->input->post("reqMode");
        $reqId = $this->input->post("reqId");

        $reqCompanyId = $this->input->post("reqCompanyId");
        $reqOfferId = $this->input->post("reqOfferId");
        $reqCompanyName = $this->input->post("reqCompanyName");
        $reqDocumentPerson = $this->input->post("reqDocumentPerson");
        $reqAddress = $this->input->post("reqAddress");
        $reqEmail = $this->input->post("reqEmail");
        $reqTelephone = $this->input->post("reqTelephone");
        $reqFaximile = $this->input->post("reqFaximile");
        $reqHp = $this->input->post("reqHp");


        $reqServicesId = $this->input->post("reqServicesId");
        $reqServices = $this->db->query(" SELECT NAMA FROM SERVICES WHERE SERVICES_ID = '$reqServicesId' ")->row()->NAMA;
        $reqPeriodeTagihan = $this->input->post("reqPeriodeTagihan");
        $reqNomor = $this->input->post("reqNomor");
        $reqTanggal = $this->input->post("reqTanggal");
        $reqNama = $this->input->post("reqNama");
        $reqKeterangan = $this->input->post("reqKeterangan");
        $reqNoRef = $this->input->post("reqNoRef");
        $reqPpn = $this->input->post("reqPpn");
        $reqPajak = $this->input->post("reqPajak");
        $reqMaterai = $this->input->post("reqMaterai");
        $reqTotal = $this->input->post("reqTotal");
        $reqDPP = $this->input->post("reqDPP");
        $reqNETT = $this->input->post("reqNETT");
        $reqDiskon = $this->input->post("reqDiskon");
        $reqDiskonPersen = $this->input->post("reqDiskonPersen");
        $reqLinkFile = $this->input->post("reqLinkFile");
        $reqLinkLampiran = $this->input->post("reqLinkLampiran");

        $reqCompanyDueDays = $this->input->post("reqCompanyDueDays");
        $reqServicesDueDays = $this->input->post("reqServicesDueDays");
        $reqTotalDueDays = $this->input->post("reqTotalDueDays");
        $reqMetodePembayaran = $this->input->post("reqMetodePembayaran");

        $reqDueDate = " TO_DATE('$reqTanggal', 'DD-MM-YYYY') + INTERVAL '$reqTotalDueDays' DAY ";



        $reqPegawaiApproval1 = $this->input->post("reqPegawaiApproval1");
        $reqPegawaiApproval2 = $this->input->post("reqPegawaiApproval2");


        $reqTagihanProjectDetilId = $this->input->post("reqTagihanProjectDetilId");
        $reqServicesDetilId = $this->input->post("reqServicesDetilId");
        $reqKeteranganDetil = $this->input->post("reqKeteranganDetil");
        $reqKeteranganTambahDetil = $this->input->post("reqKeteranganTambahDetil");
        $reqQtyDetil = $this->input->post("reqQtyDetil");
        $reqSatuanDetil = $this->input->post("reqSatuanDetil");
        $reqHargaSatuanDetil = $this->input->post("reqHargaSatuanDetil");
        $reqTotalDetil = $this->input->post("reqTotalDetil");


        if($reqTotal == 0)
        {


            $arrResult["status"]  = "failed";
            $arrResult["message"] = "Data gagal diproses. nilai grand total 0.";
            $arrResult["id"] = 0;
            
            return;
        }


        $customer->setField("COMPANY_ID", $reqCompanyId);
        $customer->setField("NAME", $reqCompanyName);
        $customer->setField("CP1_NAME", $reqDocumentPerson);
        $customer->setField("ADDRESS", $reqAddress);
        $customer->setField("EMAIL", $reqEmail);
        $customer->setField("CP1_TELP", $reqTelephone);
        $customer->setField("FAX", $reqFaximile);
        $customer->setField("PHONE", $reqHp);

        if($reqCompanyName != ""){
            if ($reqCompanyId == "") {
                $customer->setField("CREATED_BY", $this->USERNAME);
                $customer->setField("CREATED_DATE", "CURRENT_DATE");
                $customer->insert();
                $reqCompanyId = $customer->id;
            } else {
                $customer->setField("UPDATED_BY", $this->USERNAME);
                $customer->setField("UPDATED_DATE", "CURRENT_DATE");
                $customer->update();
            }
        }

        if(empty($reqPegawaiApproval1))
        {


            $arrResult["status"]  = "failed";
            $arrResult["message"] = "Tentukan terlebih dahulu Approval I.";
            $arrResult["id"] = 0;
            
            return;
        }

        if($reqPegawaiApproval1 == $reqPegawaiApproval2)
            $reqPegawaiApproval2  = "";

        $tagihan->setField("TAGIHAN_PROJECT_ID", $reqId);
        $tagihan->setField("SERVICES_ID", $reqServicesId);
        $tagihan->setField("COMPANY_ID", $reqCompanyId);
        $tagihan->setField("PERIODE_TAGIHAN", $reqPeriodeTagihan);
        $tagihan->setField("NOMOR", $reqNomor);
        $tagihan->setField("TANGGAL", dateToDBCheck($reqTanggal));
        $tagihan->setField("NAMA", $reqNama);
        $tagihan->setField("KETERANGAN", $reqKeterangan);
        $tagihan->setField("NO_REF", $reqNoRef);
        $tagihan->setField("PPN", $reqPpn);
        $tagihan->setField("PAJAK", dotToNo($reqPajak));
        $tagihan->setField("MATERAI", dotToNo($reqMaterai));
        $tagihan->setField("TOTAL", dotToNo($reqTotal));

        $tagihan->setField("DPP", dotToNo($reqDPP));
        $tagihan->setField("NETT", dotToNo($reqNETT));
        $tagihan->setField("DISKON", dotToNo($reqDiskon));
        $tagihan->setField("DISKON_PERSEN", dotToNo($reqDiskonPersen));

        $tagihan->setField("LINK_LAMPIRAN", $reqLinkLampiran);
        $tagihan->setField("PEGAWAI_ID_APPROVAL1", $reqPegawaiApproval1);
        $tagihan->setField("PEGAWAI_ID_APPROVAL2", $reqPegawaiApproval2);

        $tagihan->setField("COMPANY_DUE_DAYS", $reqCompanyDueDays);
        $tagihan->setField("SERVICES_DUE_DAYS", $reqServicesDueDays);
        $tagihan->setField("DUE_DAYS", $reqTotalDueDays);
        $tagihan->setField("DUE_DATE", $reqDueDate);
        $tagihan->setField("METODE_PEMBAYARAN", $reqMetodePembayaran);

        $tagihan->setField("KD_PEL", $this->KD_PEL);
        $tagihan->setField("SUB_UNIT", $this->SUB_UNIT);

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
            $renameFile = "TAGIHAN" . date("dmYhis") . rand() . "." . getExtension($reqLinkFile['name'][$i]);
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
        $tagihan->setField("LINK_FILE", implode(";", $insertLinkFile));

        if ($reqMode == "insert") {
            $tagihan->setField("CREATED_BY", $this->USERNAME);
            $tagihan->setField("CREATED_DATE", "CURRENT_DATE");
            $tagihan->insert();
            $reqIdParent = $tagihan->id;
        } else {
            $tagihan->setField("UPDATED_BY", $this->USERNAME);
            $tagihan->setField("UPDATED_DATE", "CURRENT_DATE");
            $tagihan->update();
            $reqIdParent = $reqId;
        }

        for ($i = 0; $i < count($reqKeteranganDetil); $i++) {

            if ($reqKeteranganDetil[$i] == "") {
            } else {
                $tagihan_detil->setField("TAGIHAN_PROJECT_DETIL_ID", $reqTagihanProjectDetilId[$i]);
                $tagihan_detil->setField("TAGIHAN_PROJECT_ID", $reqIdParent);
                $tagihan_detil->setField("SERVICES_ID", $reqServicesId);
                $tagihan_detil->setField("SERVICES", $reqServices);
                $tagihan_detil->setField("SERVICES_DETIL_ID", $reqServicesDetilId[$i]);
                $tagihan_detil->setField("KETERANGAN", $reqKeteranganDetil[$i]);
                $tagihan_detil->setField("KETERANGAN_TAMBAH", $reqKeteranganTambahDetil[$i]);
                $tagihan_detil->setField("QTY", $reqQtyDetil[$i]);
                $tagihan_detil->setField("SATUAN", $reqSatuanDetil[$i]);
                $tagihan_detil->setField("HARGA_SATUAN", dotToNo($reqHargaSatuanDetil[$i]));
                $tagihan_detil->setField("TOTAL", dotToNo($reqTotalDetil[$i]));

                if ($reqTagihanProjectDetilId[$i] == "") {
                    $tagihan_detil->setField("CREATED_BY", $this->USERNAME);
                    $tagihan_detil->setField("CREATED_DATE", "CURRENT_DATE");
                    $tagihan_detil->insert();
                } else {
                    $tagihan_detil->setField("UPDATED_BY", $this->USERNAME);
                    $tagihan_detil->setField("UPDATED_DATE", "CURRENT_DATE");
                    $tagihan_detil->update();
                }
            }
        }



        $reqJenisPajakPersenId = $this->input->post("reqJenisPajakPersenId");
        $reqJenisPajakDeskripsi = $this->input->post("reqJenisPajakDeskripsi");
        $reqJenisPajakPersen = $this->input->post("reqJenisPajakPersen");
        $reqJenisPajakDPP = $this->input->post("reqJenisPajakDPP");
        $reqJenisPajakTotal = $this->input->post("reqJenisPajakTotal");


        $this->db->query("DELETE FROM TAGIHAN_PROJECT_PAJAK WHERE TAGIHAN_PROJECT_ID = '$reqIdParent' ");
        for($i=0; $i<count($reqJenisPajakPersenId);$i++)
        {

              $insJenisPajakPersenId = ($reqJenisPajakPersenId[$i]);
              $insJenisPajakDeskripsi = setQuote($reqJenisPajakDeskripsi[$i]);
              $insJenisPajakPersen = ($reqJenisPajakPersen[$i]);
              $insJenisPajakDPP = dotToNo($reqJenisPajakDPP[$i]);
              $insJenisPajakTotal = dotToNo($reqJenisPajakTotal[$i]);

              if(!empty($insJenisPajakPersenId))
              {

                  $query = "INSERT INTO TAGIHAN_PROJECT_PAJAK(
                        TAGIHAN_PROJECT_ID, 
                        jenis_pajak_persen_id, persen, keterangan, 
                        dpp, total, created_by)
                        VALUES ('$reqIdParent', 
                        '$insJenisPajakPersenId', '$insJenisPajakPersen', '$insJenisPajakDeskripsi', 
                        '$insJenisPajakDPP', '$insJenisPajakTotal', '".$this->USERNAME."')
                        ";
                  $this->db->query($query);
             }

        }


        $arrResult["status"]  = "success";
        $arrResult["message"] = "Data berhasil disimpan.";
        $arrResult["id"] = $reqIdParent;
        
        echo json_encode($arrResult);

    }

    function add_invoice()
    {


        $reqNomor = $this->input->post("reqNomor");
        $reqId = $this->input->post("reqId");
        $reqMode = $this->input->post("reqMode");
        $reqBankId = $this->input->post("reqBankId");
        $reqMetodePembayaran = $this->input->post("reqMetodePembayaran");
        $reqNoRekening = $this->input->post("reqNoRekening");
        $reqNoFaktur = $this->input->post("reqNoFaktur");
        $reqKeterangan = $this->input->post("reqKeterangan");
        $reqTotal =  dotToNo($this->input->post("reqTotal"));
        $reqNoNota = $this->input->post("reqNoNota");
        $reqServicesId = $this->input->post("reqServicesId");
        $reqDueDays = $this->input->post("reqDueDays");

        $rowResult = $this->db->query(" SELECT NAME, NAMA_POSISI, NIK FROM PEGAWAI WHERE POSITION = '50000142' ")->row();

        $reqPegawaiFinance = $rowResult->NIK;
        $reqPegawaiNamaFinance = setQuote($rowResult->NAME);
        $reqPegawaiJabatanFinance = $rowResult->NAMA_POSISI;

        $reqGlAkun = "TTL";
        $reqGlAkun = "1010201000";


       $reqNoJurnal = generateZero($reqId, 10);

        $sql = "INSERT INTO JURNAL_PENJUALAN (
                   KTOPL, BKTXT, BELNR, 
                   BUKRS, GJAHR, LIFNR, 
                   SGTXT, PSWSL, DMBTR, 
                   SHKZG, PRCTR, KOSTL, 
                   XBLNR, 
                   HKONT) 
                VALUES ('$reqProfitCenter', '$reqNoFaktur', '$reqNoJurnal', 
                   '$reqProfitCenter', TO_CHAR(SYSDATE, 'YYYYY'), '$reqGlAkun', 
                   '$reqKeterangan', 'IDR', '$reqTotal', 
                   'S', '$reqProfitCenter', '0000000000', 
                   '$reqNoNota', '')
                ";
        $this->db->query($sql);

        $reqGlPendapatan = $this->db->query(" SELECT COA FROM SERVICES WHERE SERVICES_ID = '$reqServicesId' ")->row()->COA;
        $sql = "INSERT INTO JURNAL_PENJUALAN (
                   KTOPL, BKTXT, BELNR, 
                   BUKRS, GJAHR, LIFNR, 
                   SGTXT, PSWSL, DMBTR, 
                   SHKZG, PRCTR, KOSTL, 
                   XBLNR, 
                   HKONT) 
                VALUES ('$reqProfitCenter', '$reqNoFaktur', '$reqNoJurnal', 
                   '$reqProfitCenter', TO_CHAR(SYSDATE, 'YYYY'), '$reqGlPendapatan', 
                   '$reqKeterangan', 'IDR', '$reqTotal', 
                   'H', '$reqProfitCenter', '0000000000', 
                   '$reqNoNota', '')
                ";
        $this->db->query($sql);

        $this->load->library('usermobile'); 

        $userMobile = new usermobile();

        $reqPegawaiId          = $this->USERID;
        $reqNama               = $this->USERNAME;
        $statusEmail1 = $userMobile->pushNotifikasi($reqPegawaiFinance, $reqPegawaiId, $reqNama, $reqId, $reqNoNota, "INFORMASI INVOICE", "INVOICE", "APPROVAL1", 1);
    

        $reqStatus = "JURNAL_PENJUALAN";


        $sql = "  UPDATE TAGIHAN_PROJECT SET 
                    NO_JURNAL_JPJ   = '$reqNoJurnal',
                    POSTING         = '$reqStatus',
                    PEGAWAI_ID_FINANCE         = '$reqPegawaiFinance',
                    PEGAWAI_NAMA_FINANCE       = '$reqPegawaiNamaFinance',
                    PEGAWAI_JABATAN_FINANCE    = '$reqPegawaiJabatanFinance'
                  WHERE TAGIHAN_PROJECT_ID = '$reqId' ";
        $this->db->query($sql);

        $message = "Data berhasil di Posting.";


        $arrResult["status"]  = "success";
        $arrResult["message"] = $message;
        $arrResult["id"] = $reqId;

        if($reqMode == "DRAFT")
            $arrResult["link"] = "app/index/invoice_add?reqId=".$reqId;
        else
            $arrResult["link"] = "app/index/invoice";

        echo json_encode($arrResult);
    }

    function pelanggan_detail_row()
    {
        $reqCompanyId = $this->input->get("reqCompanyId");

        $this->load->model("Company");
        $company = new Company();

        $aColumns = array(
            "COMPANY_ID", "NAME", "ADDRESS", "PHONE", "FAX", "EMAIL", "CP1_NAME",
            "CP1_TELP", "CP2_NAME", "CP2_TELP"
        );
        $company->selectByParamsMonitoring(array("A.COMPANY_ID" => $reqCompanyId));
        $company->firstRow();
        for ($i = 0; $i < count($aColumns); $i++) {
            $arr_json[$aColumns[$i]] = $company->getField($aColumns[$i]);
        }

        echo json_encode($arr_json);
    }

    function delete()
    {
        $this->load->model("Tagihan");
        $tagihan = new Tagihan();

        $this->load->model("TagihanDetil");
        $tagihan_detil = new TagihanDetil();

        $reqId = $this->input->get('reqId');

        $tagihan->setField("TAGIHAN_PROJECT_ID", $reqId);
        $tagihan_detil->setField("TAGIHAN_PROJECT_ID", $reqId);

        if ($tagihan->delete())
            if ($tagihan_detil->deleteParent()) {
                $arrJson["PESAN"] = "Data berhasil dihapus.";
            } else
                $arrJson["PESAN"] = "Data gagal dihapus.";

        echo json_encode($arrJson);
    }

    function delete_detil_tagihan()
    {
        $this->load->model("TagihanDetil");
        $tagihan_detil = new TagihanDetil();

        $reqTagihanProjectDetilId = $this->input->get('reqTagihanProjectDetilId');

        $tagihan_detil->setField("TAGIHAN_PROJECT_DETIL_ID", $reqTagihanProjectDetilId);

        if ($tagihan_detil->delete()) {
            $arrJson["PESAN"] = "Data berhasil dihapus.";
        } else
            $arrJson["PESAN"] = "Data gagal dihapus.";

        echo json_encode($arrJson);
    }

    function posting()
    {
        $reqId = $this->input->get('reqId');

        $query = $this->db->query(" SELECT NOMOR, POSTING, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2 FROM TAGIHAN_PROJECT X WHERE X.TAGIHAN_PROJECT_ID = '".$reqId."'  ");

        $reqIsVerifikasi       = $query->row()->POSTING;
        $reqNomor              = $query->row()->NOMOR; 
        $reqPegawaiApproval1   = $query->row()->PEGAWAI_ID_APPROVAL1; 
        $reqPegawaiApproval2   = $query->row()->PEGAWAI_ID_APPROVAL2; 
        $reqPegawaiId          = $this->USERID;
        $reqNama               = $this->USERNAME;

        if($reqIsVerifikasi == "DRAFT" || $reqIsVerifikasi == "REVISI")
        {
            $this->db->query(" INSERT INTO APPROVAL_MANAGER_LOG 
                                SELECT * FROM APPROVAL_MANAGER WHERE NOMOR = '$reqNomor' ");
            $this->db->query(" DELETE FROM APPROVAL_MANAGER WHERE NOMOR = '$reqNomor' ");
        }
        else
        {
            echo "Permohonan telah diposting.";
            return;
        }



      
        $this->load->library('usermobile'); 

        $userMobile = new usermobile();


        $statusEmail1 = $userMobile->pushNotifikasi($reqPegawaiApproval1, $reqPegawaiId, $reqNama, $reqId, $reqNomor, "PERSETUJUAN PRANOTA", "PRANOTA", "APPROVAL1", 1);
    

        if(!empty($reqPegawaiApproval2))
        {
            $statusEmail2 = $userMobile->pushNotifikasi($reqPegawaiApproval2, $reqPegawaiId, $reqNama, $reqId, $reqNomor, "PERSETUJUAN PRANOTA", "PRANOTA", "APPROVAL2", 2, false);
        }

      



        $this->db->query(" UPDATE TAGIHAN_PROJECT X SET POSTING = 'POSTING', APPROVAL1 = NULL, APPROVAL2 = NULL, POSTING_DATE = SYSDATE WHERE X.TAGIHAN_PROJECT_ID = '".$reqId."' "); 


        echo $statusEmail1.". Data berhasil diposting.";

        return;


    }


    function get_tagihan()
    {

        $reqPelunasanId = $this->input->get("reqPelunasanId");
        $reqTagihanId = $this->input->get("reqTagihanId");
        $reqServicesId = $this->input->get("reqServicesId");

        if(empty($reqPelunasanId))
        {
            $sql = " SELECT (A.TOTAL_TAGIHAN - NVL(B.TOTAL_PELUNASAN, 0)) SISA_TAGIHAN FROM TAGIHAN_CETAK_NOTA A 
                     LEFT JOIN (  SELECT SERVICES_ID,
                         TAGIHAN_PROJECT_ID     TAGIHAN_ID,
                         SUM (TOTAL)            TOTAL_PELUNASAN
                    FROM PELUNASAN_NOTA X
                GROUP BY SERVICES_ID, TAGIHAN_PROJECT_ID) B
                   ON     A.SERVICES_ID = B.SERVICES_ID
                      AND A.TAGIHAN_ID = B.TAGIHAN_ID
                    WHERE A.TAGIHAN_ID = '$reqTagihanId' AND A.SERVICES_ID = '$reqServicesId' ";
        }
        else
            $sql = " SELECT SISA_TAGIHAN FROM PELUNASAN_NOTA WHERE PELUNASAN_NOTA_ID = '$reqPelunasanId' ";


        $SISA_TAGIHAN = $this->db->query($sql)->row()->SISA_TAGIHAN;

        echo numberToIna($SISA_TAGIHAN);

    }
}
