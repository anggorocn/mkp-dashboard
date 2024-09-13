<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class report_json extends CI_Controller
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

        $this->load->model("Report");
        $report = new Report();

        $aColumns = array(
            "DOCUMENT_ID", "NO_REPORT", "NAME", "NAME_OF_VESSEL", "TYPE_OF_VESSEL", "SCOPE_OF_WORK", 
            "LOCATION", "DESCRIPTION", "PATH", "START_DATE", "FINISH_DATE", "DELIVERY_DATE",
            "INVOICE_DATE", "REASON", "CLASS_SOCIETY", "NO_OWR"
        );

        $aColumnsAlias = array(
            "DOCUMENT_ID", "NO_REPORT", "NAME", "NAME_OF_VESSEL", "TYPE_OF_VESSEL", "SCOPE_OF_WORK", 
            "LOCATION", "DESCRIPTION", "PATH", "START_DATE", "FINISH_DATE", "DELIVERY_DATE",
            "INVOICE_DATE", "REASON", "CLASS_SOCIETY", "NO_OWR"
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
            if (trim($sOrder) == "ORDER BY DOCUMENT_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY DOCUMENT_ID desc";
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
        $reqCariName                = $this->input->get('reqCariName');
        $reqCariDescription         = $this->input->get('reqCariDescription');
        $reqCariStartDateFrom       = $this->input->get('reqCariStartDateFrom');
        $reqCariStartDateTo         = $this->input->get('reqCariStartDateTo');
        $reqCariFinishDateFrom      = $this->input->get('reqCariFinishDateFrom');
        $reqCariFinishDateTo        = $this->input->get('reqCariFinishDateTo');
        $reqCariDeleveryDateFrom    = $this->input->get('reqCariDeleveryDateFrom');
        $reqCariDeleveryDateTo      = $this->input->get('reqCariDeleveryDateTo');
        $reqCariInvoiceDateFrom     = $this->input->get('reqCariInvoiceDateFrom');
        $reqCariInvoiceDateTo       = $this->input->get('reqCariInvoiceDateTo');

        if (!empty($reqCariName)) {
            $statement_privacy .= " AND UPPER(A.NAME) LIKE '%" . strtoupper($reqCariName) . "%'";
        }
        if (!empty($reqCariDescription)) {
            $statement_privacy .= " AND UPPER(A.DESCRIPTION) LIKE '%" . strtoupper($reqCariDescription) . "%'";
        }
        if (!empty($reqCariStartDateFrom) || !empty($reqCariStartDateTo)) {
            $statement_privacy .= " AND A.START_DATE BETWEEN TO_DATE('" . $reqCariStartDateFrom . "','dd-mm-yyyy') AND TO_DATE('" . $reqCariStartDateFrom . "','dd-mm-yyyy')";
        }
        if (!empty($reqCariFinishDateFrom) || !empty($reqCariFinishDateTo)) {
            $statement_privacy .= " AND A.FINISH_DATE BETWEEN TO_DATE('" . $reqCariFinishDateFrom . "','dd-mm-yyyy') AND TO_DATE('" . $reqCariFinishDateTo . "','dd-mm-yyyy')";
        }
        if (!empty($reqCariDeleveryDateFrom) || !empty($reqCariDeleveryDateTo)) {
            $statement_privacy .= " AND A.DELIVERY_DATE BETWEEN TO_DATE('" . $reqCariDeleveryDateFrom . "','dd-mm-yyyy') AND TO_DATE('" . $reqCariDeleveryDateTo . "','dd-mm-yyyy')";
        }
        if (!empty($reqCariInvoiceDateFrom) || !empty($reqCariInvoiceDateTo)) {
            $statement_privacy .= " AND A.INVOICE_DATE BETWEEN TO_DATE('" . $reqCariInvoiceDateFrom . "','dd-mm-yyyy') AND TO_DATE('" . $reqCariInvoiceDateTo . "','dd-mm-yyyy')";
        }

        $statement = " AND (UPPER(A.NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $report->getCountByParams(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $report->getCountByParams(array(), $statement_privacy . $statement);

        $report->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $report->query;exit;
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

        while ($report->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "DESCRIPTION")
                    $row[] = truncate($report->getField($aColumns[$i]), 2);
                else
                    $row[] = $report->getField($aColumns[$i]);
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function add_new()
    {
        $this->load->model("Report");
        $report = new Report();

        $reqId = $this->input->post("reqId");
        $reqName = $this->input->post("reqName");
        $reqDescription = $this->input->post("reqDescription");

        $report->setField("REPORT_ID", $reqId);
        $report->getField("REPORT", $reqName);
        $report->getField("DESCRIPTION", $reqDescription);

        if (empty($reqId)) {
            $report->insert_new();
        } else {
            $report->update_new();
        }

        echo "Data berhasil disimpan.";
    }

    function add()
    {
        $this->load->model("Report");
        $report = new Report();

        $reqMode = $this->input->post("reqMode");

        $reqId = $this->input->post("reqId");
        $reqName = $this->input->post("reqName");
        $reqDescription = $this->input->post("reqDescription");
        $reqPath = $this->input->post("reqPath");
        $reqStartDate = $this->input->post("reqStartDate");
        $reqFinishDate = $this->input->post("reqFinishDate");
        $reqDeliveryDate = $this->input->post("reqDeliveryDate");
        $reqInvoiceDate = $this->input->post("reqInvoiceDate");
        $reqReason = $this->input->post("reqReason");

        $report->setField("DOCUMENT_ID", $reqId);
        $report->getField("NAME", $reqName);
        $report->getField("DESCRIPTION", $reqDescription);
        $report->getField("PATH", $reqPath);
        $report->getField("START_DATE", $reqStartDate);
        $report->getField("FINISH_DATE", $reqFinishDate);
        $report->getField("DELIVERY_DATE", $reqDeliveryDate);
        $report->getField("INVOICE_DATE", $reqInvoiceDate);
        $report->getField("REASON", $reqReason);

        if ($reqMode == "insert") {
            $report->insert();
        } else {
            $report->update();
        }

        echo "Data berhasil disimpan.";
    }

    function delete()
    {
        $this->load->model("Report");
        $report = new Report();

        $reqId = $this->input->get('reqId');

        $report->setField("DOCUMENT_ID", $reqId);
        if ($report->delete())
            $arrJson["PESAN"] = "Data berhasil dihapus.";
        else
            $arrJson["PESAN"] = "Data gagal dihapus.";

        echo json_encode($arrJson);
    }

    // function combo()
    // {
    //     $this->load->model("ForumKategori");
    //     $forum_kategori = new ForumKategori();

    //     $forum_kategori->selectByParams(array());
    //     $i = 0;
    //     while ($forum_kategori->nextRow()) {
    //         $arr_json[$i]['id']        = $forum_kategori->getField("FORUM_KATEGORI_ID");
    //         $arr_json[$i]['text']    = $forum_kategori->getField("NAMA");
    //         $i++;
    //     }

    //     echo json_encode($arr_json);
    // }
}
