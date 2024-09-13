<?php

defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");


// include_once("lib/excel/excel_reader2.php");


class customer_json extends CI_Controller
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
    }



    function json()
    {
        $this->load->model("Customer");
        $customer = new Customer();

        $reqId = $this->input->get("reqId");
        $reqMode = $this->input->get("reqMode");

        $reqCariCompanyName = $this->input->get("reqCariCompanyName");
        $reqCariContactPerson = $this->input->get("reqCariContactPerson");
        $reqCariVasselName = $this->input->get("reqCariVasselName");
        $reqCariEmailPerson = $this->input->get("reqCariEmailPerson");
        $reqCheck = $this->input->get("reqCheck");
        $reqEmails = $this->input->get("reqEmail");
        // echo $reqEmails;


        // echo $reqKategori;exit;

        $aColumns = array(
            "COMPANY_ID", "KODE", "KODE_SAP", "NAME", "CP1_NAME", "PHONE", "EMAIL", "ADDRESS", "FAX",
            "CP1_TELP", "DUE_DAYS", "METODE_PELUNASAN"
        );
        $aColumnsAlias = array(
            "COMPANY_ID", "KODE", "KODE_SAP", "NAME", "CP1_NAME", "PHONE", "EMAIL", "ADDRESS", "FAX",
            "CP1_TELP", "DUE_DAYS", "METODE_PELUNASAN"
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
            if (trim($sOrder) == "ORDER BY COMPANY_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY COMPANY_ID desc";
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
            $sWhere = "AND 1=1";
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

        // if ($reqMode == "validasi")
        //     $statement_privacy = " AND VALIDASI = '0' ";
        // elseif ($reqMode == "tolak")
        //     $statement_privacy = " AND VALIDASI = 'X' ";
        // else
        //     $statement_privacy = " AND VALIDASI = '1' ";


        if (!empty($reqId)) {
            $statement_privacy = " AND A.COMPANY_ID = '" . $reqId . "' ";
        }

        if (!empty($reqCariCompanyName)) {
            $statement_privacy .= " AND UPPER(A.NAME) LIKE UPPER('%" . $reqCariCompanyName . "%') ";
        }
        if (!empty($reqCariContactPerson)) {
            $statement_privacy .= " AND UPPER(A.CP1_NAME) LIKE UPPER('%" . $reqCariContactPerson . "%') ";
        }
        if (!empty($reqCariVasselName)) {
            $statement_privacy .= " AND EXISTS(SELECT 1 FROM vessel v WHERE v.COMPANY_ID = a.COMPANY_ID AND UPPER(v.NAME) LIKE UPPER('%" . $reqCariVasselName . "%')) ";
        }
        if (!empty($reqCariEmailPerson)) {
            $statement_privacy .= " AND UPPER(A.EMAIL) LIKE UPPER('%" . $reqCariEmailPerson . "%') ";
        }
        if ($reqEmails == 'not') {
            $statement_privacy .= " AND A.EMAIL IS NOT NULL  AND A.EMAIL <> '' AND A.EMAIL <> '-' ";
        }


        // echo  $statement_privacy;
        // if (!empty($reqGolonganDarah)) {
        //     $statement_privacy .= " AND UPPER(GOLONGAN_DARAH) = '" . $reqGolonganDarah . "' ";
        // }
        // if (!empty($reqJenisKelamin)) {
        //     $statement_privacy .= " AND UPPER(JENIS_KELAMIN) = '" . $reqJenisKelamin . "' ";
        // }


        $statement = "AND (UPPER(NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $customer->getCountByParams(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $customer->getCountByParams(array(), $statement_privacy . $statement);

        $customer->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $customer->query;exit;


        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($customer->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "NAME")
                    $row[] = $customer->getField($aColumns[$i]);
                // $row[] = truncate($customer->getField($aColumns[$i]), 10) . "...";
                elseif ($aColumns[$i] == "LINK_FILE")
                    $row[] = "<img src='uploads/" . $customer->getField($aColumns[$i]) . "' height='50px'>";
                elseif ($aColumns[$i] == "CHECK") {
                    if ($reqCheck != 'tidak') {
                        $row[] = '<input type="checkbox" value="' . $customer->getField('COMPANY_ID') . '" name="reqIds[]"/>';
                    }
                } elseif ($aColumns[$i] == "STATUS_PUBLISH" || $aColumns[$i] == "STATUS_NOTIFIKASI") {
                    if ($customer->getField($aColumns[$i]) == "Y")
                        $row[] = '<i class="fa fa-check fa-lg" aria-hidden="true"></i>';
                    else
                        $row[] = '<i class="fa fa-close fa-lg" aria-hidden="true"></i>';
                } else
                    $row[] = $customer->getField($aColumns[$i]);
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }



    function json_pelanggan()
    {
        $this->load->model("Customer");
        $customer = new Customer();

        $reqId = $this->input->get("reqId");
        $reqMode = $this->input->get("reqMode");

        $reqCariCompanyName = $this->input->get("reqCariCompanyName");
        $reqCariContactPerson = $this->input->get("reqCariContactPerson");
        $reqCariVasselName = $this->input->get("reqCariVasselName");
        $reqCariEmailPerson = $this->input->get("reqCariEmailPerson");
        $reqCheck = $this->input->get("reqCheck");
        $reqEmails = $this->input->get("reqEmail");
        // echo $reqEmails;


        // echo $reqKategori;exit;

        $aColumns = array(

            "COMPANY_ID", "KODE", "KODE_SAP", "NAME",  "ADDRESS", "PHONE", "FAX",  "EMAIL",  "CP1_NAME",  "CP1_TELP", "CP2_NAME", "CP2_TELP"
        );
        $aColumnsAlias = array(
            "COMPANY_ID", "KODE", "KODE_SAP", "NAME",  "ADDRESS", "PHONE", "FAX",  "EMAIL",  "CP1_NAME",  "CP1_TELP", "CP2_NAME", "CP2_TELP"

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
            if (trim($sOrder) == "ORDER BY COMPANY_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY COMPANY_ID desc";
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
            $sWhere = "AND 1=1";
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

        // if ($reqMode == "validasi")
        //     $statement_privacy = " AND VALIDASI = '0' ";
        // elseif ($reqMode == "tolak")
        //     $statement_privacy = " AND VALIDASI = 'X' ";
        // else
        //     $statement_privacy = " AND VALIDASI = '1' ";




        // echo  $statement_privacy;
        // if (!empty($reqGolonganDarah)) {
        //     $statement_privacy .= " AND UPPER(GOLONGAN_DARAH) = '" . $reqGolonganDarah . "' ";
        // }
        // if (!empty($reqJenisKelamin)) {
        //     $statement_privacy .= " AND UPPER(JENIS_KELAMIN) = '" . $reqJenisKelamin . "' ";
        // }


        $statement = "AND (UPPER(NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(KODE_SAP) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $customer->getCountByParams(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $customer->getCountByParams(array(), $statement_privacy . $statement);

        $customer->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $customer->query;
        // exit;


        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($customer->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "NAME")
                    $row[] = $customer->getField($aColumns[$i]);
                // $row[] = truncate($customer->getField($aColumns[$i]), 10) . "...";
                elseif ($aColumns[$i] == "LINK_FILE")
                    $row[] = "<img src='uploads/" . $customer->getField($aColumns[$i]) . "' height='50px'>";
                elseif ($aColumns[$i] == "CHECK") {
                    if ($reqCheck != 'tidak') {
                        $row[] = '<input type="checkbox" value="' . $customer->getField('COMPANY_ID') . '" name="reqIds[]"/>';
                    }
                } elseif ($aColumns[$i] == "STATUS_PUBLISH" || $aColumns[$i] == "STATUS_NOTIFIKASI") {
                    if ($customer->getField($aColumns[$i]) == "Y")
                        $row[] = '<i class="fa fa-check fa-lg" aria-hidden="true"></i>';
                    else
                        $row[] = '<i class="fa fa-close fa-lg" aria-hidden="true"></i>';
                } else
                    $row[] = $customer->getField($aColumns[$i]);
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function json_lookup()
    {
        $this->load->model("Customer");
        $customer = new Customer();

        $reqId = $this->input->get("reqId");
        $reqMode = $this->input->get("reqMode");

        $reqCariCompanyName = $this->input->get("reqCariCompanyName");
        $reqCariContactPerson = $this->input->get("reqCariContactPerson");
        $reqCariVasselName = $this->input->get("reqCariVasselName");
        $reqCariEmailPerson = $this->input->get("reqCariEmailPerson");
        $reqCheck = $this->input->get("reqCheck");
        $reqEmails = $this->input->get("reqEmail");
        // echo $reqEmails;


        // echo $reqKategori;exit;

        $aColumns = array(
            "COMPANY_ID", "NAME", "ADDRESS", "PHONE", "FAX", "EMAIL", "CP1_NAME",
            "CP1_TELP", "CP2_NAME", "CP2_TELP"
        );
        $aColumnsAlias = array(
            "COMPANY_ID", "NAME", "ADDRESS", "PHONE", "FAX", "EMAIL", "CP1_NAME",
            "CP1_TELP", "CP2_NAME", "CP2_TELP"
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
            if (trim($sOrder) == "ORDER BY COMPANY_ID asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ORDER BY COMPANY_ID desc";
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
            $sWhere = "AND 1=1";
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

        // if ($reqMode == "validasi")
        //     $statement_privacy = " AND VALIDASI = '0' ";
        // elseif ($reqMode == "tolak")
        //     $statement_privacy = " AND VALIDASI = 'X' ";
        // else
        //     $statement_privacy = " AND VALIDASI = '1' ";


        if (!empty($reqId)) {
            $statement_privacy = " AND A.COMPANY_ID = '" . $reqId . "' ";
        }

        if (!empty($reqCariCompanyName)) {
            $statement_privacy .= " AND UPPER(A.NAME) LIKE UPPER('%" . $reqCariCompanyName . "%') ";
        }
        if (!empty($reqCariContactPerson)) {
            $statement_privacy .= " AND UPPER(A.CP1_NAME) LIKE UPPER('%" . $reqCariContactPerson . "%') ";
        }
        if (!empty($reqCariVasselName)) {
            $statement_privacy .= " AND EXISTS(SELECT 1 FROM vessel v WHERE v.COMPANY_ID = a.COMPANY_ID AND UPPER(v.NAME) LIKE UPPER('%" . $reqCariVasselName . "%')) ";
        }
        if (!empty($reqCariEmailPerson)) {
            $statement_privacy .= " AND UPPER(A.EMAIL) LIKE UPPER('%" . $reqCariEmailPerson . "%') ";
        }
        if ($reqEmails == 'not') {
            $statement_privacy .= " AND A.EMAIL IS NOT NULL  AND A.EMAIL <> '' AND A.EMAIL <> '-' ";
        }


        // echo  $statement_privacy;
        // if (!empty($reqGolonganDarah)) {
        //     $statement_privacy .= " AND UPPER(GOLONGAN_DARAH) = '" . $reqGolonganDarah . "' ";
        // }
        // if (!empty($reqJenisKelamin)) {
        //     $statement_privacy .= " AND UPPER(JENIS_KELAMIN) = '" . $reqJenisKelamin . "' ";
        // }


        $statement = "AND (UPPER(NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $customer->getCountByParams(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $customer->getCountByParams(array(), $statement_privacy . $statement);

        $customer->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $customer->query;exit;


        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($customer->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "NAME")
                    $row[] = $customer->getField($aColumns[$i]);
                // $row[] = truncate($customer->getField($aColumns[$i]), 10) . "...";
                elseif ($aColumns[$i] == "LINK_FILE")
                    $row[] = "<img src='uploads/" . $customer->getField($aColumns[$i]) . "' height='50px'>";
                elseif ($aColumns[$i] == "CHECK") {
                    if ($reqCheck != 'tidak') {
                        $row[] = '<input type="checkbox" value="' . $customer->getField('COMPANY_ID') . '" name="reqIds[]"/>';
                    }
                } elseif ($aColumns[$i] == "STATUS_PUBLISH" || $aColumns[$i] == "STATUS_NOTIFIKASI") {
                    if ($customer->getField($aColumns[$i]) == "Y")
                        $row[] = '<i class="fa fa-check fa-lg" aria-hidden="true"></i>';
                    else
                        $row[] = '<i class="fa fa-close fa-lg" aria-hidden="true"></i>';
                } else
                    $row[] = $customer->getField($aColumns[$i]);
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function add_new()
    {
        $this->load->model("Company");
        $company = new Company();


        $reqMode = $this->input->post("reqMode");
        $reqId = $this->input->post("reqId");

        $reqCompanyId = $this->input->post("reqCompanyId");
        $reqName = $this->input->post("reqName");
        $reqAddress = $this->input->post("reqAddress");
        $reqPhone = $this->input->post("reqPhone");
        $reqFax = $this->input->post("reqFax");
        $reqEmail = $this->input->post("reqEmail");
        $reqCp1Name = $this->input->post("reqCp1Name");
        $reqCp1Telp = $this->input->post("reqCp1Telp");
        $reqCp2Name = $this->input->post("reqCp2Name");
        $reqCp2Telp = $this->input->post("reqCp2Telp");
        $reqLa1Name = $this->input->post("reqLa1Name");
        $reqLa1Address = $this->input->post("reqLa1Address");
        $reqLa1Phone = $this->input->post("reqLa1Phone");
        $reqLa1Fax = $this->input->post("reqLa1Fax");
        $reqLa1Email = $this->input->post("reqLa1Email");
        $reqLa1Cp1 = $this->input->post("reqLa1Cp1");
        $reqLa1Cp2 = $this->input->post("reqLa1Cp2");
        $reqLa2Name = $this->input->post("reqLa2Name");
        $reqLa2Address = $this->input->post("reqLa2Address");
        $reqLa2Telp = $this->input->post("reqLa2Telp");
        $reqLa2Fax = $this->input->post("reqLa2Fax");
        $reqLa2Email = $this->input->post("reqLa2Email");
        $reqLa2Cp1 = $this->input->post("reqLa2Cp1");
        $reqLa2Cp2 = $this->input->post("reqLa2Cp2");
        $reqLa1Cp1Phone = $this->input->post("reqLa1Cp1Phone");
        $reqLa1Cp2Phone = $this->input->post("reqLa1Cp2Phone");
        $reqLa2Cp1Phone = $this->input->post("reqLa2Cp1Phone");
        $reqLa2Cp2Phone = $this->input->post("reqLa2Cp2Phone");
        $reqTipe = $this->input->post("reqTipe");
        $reqDueDays = $this->input->post("reqDueDays");
        $reqMetodePembayaran = $this->input->post("reqMetodePembayaran");
        $reqMetodePelunasan = $this->input->post("reqMetodePelunasan");
        $reqKode = $this->input->post("reqKode");
        $reqKodeSAP = $this->input->post("reqKodeSAP");


        $reqNPWP = $this->input->post("reqNPWP");
        $reqKodePajak = $this->input->post("reqKodePajak");


        $reqBank = $this->input->post("reqBank");
        $reqBankCabang = $this->input->post("reqBankCabang");
        $reqBankRekening = $this->input->post("reqBankRekening");
        $reqBankAtasNama = $this->input->post("reqBankAtasNama");


        $company->setField("COMPANY_ID", $reqId);
        $company->setField("NAME", $reqName);
        $company->setField("KODE", $reqKode);
        $company->setField("KODE_SAP", $reqKodeSAP);
        $company->setField("ADDRESS", $reqAddress);
        $company->setField("PHONE", $reqPhone);
        $company->setField("FAX", $reqFax);
        $company->setField("EMAIL", $reqEmail);
        $company->setField("CP1_NAME", $reqCp1Name);
        $company->setField("CP1_TELP", $reqCp1Telp);
        $company->setField("CP2_NAME", $reqCp2Name);
        $company->setField("CP2_TELP", $reqCp2Telp);
        $company->setField("LA1_NAME", $reqLa1Name);
        $company->setField("LA1_ADDRESS", $reqLa1Address);
        $company->setField("LA1_PHONE", $reqLa1Phone);
        $company->setField("LA1_FAX", $reqLa1Fax);
        $company->setField("LA1_EMAIL", $reqLa1Email);
        $company->setField("LA1_CP1", $reqLa1Cp1);
        $company->setField("LA1_CP2", $reqLa1Cp2);
        $company->setField("LA2_NAME", $reqLa2Name);
        $company->setField("LA2_ADDRESS", $reqLa2Address);
        $company->setField("LA2_TELP", $reqLa2Telp);
        $company->setField("LA2_FAX", $reqLa2Fax);
        $company->setField("LA2_EMAIL", $reqLa2Email);
        $company->setField("LA2_CP1", $reqLa2Cp1);
        $company->setField("LA2_CP2", $reqLa2Cp2);
        $company->setField("LA1_CP1_PHONE", $reqLa1Cp1Phone);
        $company->setField("LA1_CP2_PHONE", $reqLa1Cp2Phone);
        $company->setField("LA2_CP1_PHONE", $reqLa2Cp1Phone);
        $company->setField("LA2_CP2_PHONE", $reqLa2Cp2Phone);
        $company->setField("TIPE", $reqTipe);

        $company->setField("NPWP", $reqNPWP);
        $company->setField("KODE_PAJAK", $reqKodePajak);
        $company->setField("BANK", $reqBank);
        $company->setField("BANK_CABANG", $reqBankCabang);
        $company->setField("BANK_REKENING", $reqBankRekening);
        $company->setField("BANK_ATASNAMA", $reqBankAtasNama);
        $company->setField("BANK_ID", $reqBankId);
        $company->setField("DUE_DAYS", $reqDueDays);
        $company->setField("METODE_PEMBAYARAN", $reqMetodePembayaran);
        $company->setField("METODE_PELUNASAN", $reqMetodePelunasan);


        if ($reqMode == "insert") {
            $company->insert();
            $reqId  = $company->id;
        } else {
            $company->update();
        }



        $reqCompanyBankId = $this->input->post("reqCompanyBankId");
        $reqBankCustomerId = $this->input->post("reqBankCustomerId");
        $reqRekening = $this->input->post("reqRekening");
        $reqAtasNama = $this->input->post("reqAtasNama");
        $reqCabang = $this->input->post("reqCabang");


        for($i=0;$i<count($reqCompanyBankId);$i++)
        {

            $companyBankId  = $reqCompanyBankId[$i];
            $bankCustomerId = $reqBankCustomerId[$i];
            $rekening = $reqRekening[$i];
            $atasNama = $reqAtasNama[$i];
            $cabang  = $reqCabang[$i];
            $bank    = $this->db->query("SELECT NAMA FROM BANK_CUSTOMER WHERE BANK_CUSTOMER_ID = '$bankCustomerId'")->row()->NAMA;

            if($companyBankId == "")
            {
                if(empty($bankCustomerId))
                    continue;

                $sql = "
                INSERT INTO COMPANY_BANK (
                   BANK_CUSTOMER_ID, COMPANY_ID, BANK, 
                   REKENING, ATAS_NAMA, CABANG, 
                   CREATED_BY, CREATED_DATE) 
                VALUES(
                    '$bankCustomerId', '$reqId', '$bank',
                    '$rekening', '$atasNama', '$cabang',
                    '".$this->USERNAME."', SYSDATE
                )
                ";
            }
            else
            {
                $sql = "
                    UPDATE COMPANY_BANK SET
                        BANK_CUSTOMER_ID = '$bankCustomerId',
                        BANK = '$bank',
                        REKENING = '$rekening',
                        ATAS_NAMA = '$atasNama',
                        CABANG = '$cabang',
                        UPDATED_BY = '".$this->USERNAME."',
                        UPDATED_DATE = SYSDATE
                    WHERE COMPANY_BANK_ID = '$companyBankId' AND COMPANY_ID = '$reqId'
                ";
            }


            $this->db->query($sql);

        }


        echo $reqId . '-Data berhasil di simpan';
    }


    function delete()
    {
        $this->load->model("Customer");
        $customer = new Customer();

        $reqId = $this->input->get('reqId');

        $customer->setField("COMPANY_ID", $reqId);
        if ($customer->delete())
            $arrJson["PESAN"] = "Data berhasil dihapus.";
        else
            $arrJson["PESAN"] = "Data gagal dihapus.";

        echo json_encode($arrJson);
    }

    function get_pelanggan()
    {

        $reqId = $this->input->get('reqId');
        $sql = "SELECT COMPANY_ID, NAME,  ADDRESS, PHONE, FAX,  EMAIL,  CP1_NAME,  CP1_TELP, CP2_NAME, CP2_TELP, DUE_DAYS, METODE_PELUNASAN FROM COMPANY WHERE COMPANY_ID = '$reqId' ";

        $rowResult = $this->db->query($sql)->row();

        $arrResult["NAME"] = $rowResult->NAME;
        $arrResult["ADDRESS"] = $rowResult->ADDRESS;
        $arrResult["PHONE"] = $rowResult->PHONE;
        $arrResult["FAX"] = $rowResult->FAX;
        $arrResult["EMAIL"] = $rowResult->EMAIL;
        $arrResult["CP1_NAME"] = $rowResult->CP1_NAME;
        $arrResult["CP1_TELP"] = $rowResult->CP1_TELP;
        $arrResult["CP2_NAME"] = $rowResult->CP2_NAME;
        $arrResult["CP2_TELP"] = $rowResult->CP2_TELP;
        $arrResult["DUE_DAYS"] = $rowResult->DUE_DAYS;
        $arrResult["METODE_PELUNASAN"] = $rowResult->METODE_PELUNASAN;

        echo json_encode($arrResult);

    }

}
