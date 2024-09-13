<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class user_level_json extends CI_Controller
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
        $this->load->model("UserLevel");
        $user_level = new UserLevel();

        $aColumns = array(
            "USER_LEVEL_ID", "KODE", "NAMA",  "TRANSAKSI", 
            "REPORT",  "PELUNASAN", "LOCKING_PIUTANG",
            "INQUIRY_BANK", "MASTER_DATA", "VIEW_ALL_TRANS"
                    );

        $aColumnsAlias = array(
            "USER_LEVEL_ID", "KODE", "NAMA",  "TRANSAKSI", 
            "REPORT",  "PELUNASAN", "LOCKING_PIUTANG",
            "INQUIRY_BANK", "MASTER_DATA", "VIEW_ALL_TRANS"
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
            if (trim($sOrder) == "ORDER BY A.USER_LEVEL_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY A.USER_LEVEL_ID asc";
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

        $statement = " AND (UPPER(FULLNAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $user_level->getCountByParams(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $user_level->getCountByParams(array(), $statement_privacy . $statement);

        $user_level->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
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

        while ($user_level->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "LEVEL") {
                    $text = "User";
                    if ($user_level->getField($aColumns[$i]) == 0) {
                        $text = 'Administrator';
                    }
                    $row[] = $text;

                } elseif ($aColumns[$i] == "TRANSAKSI" || $aColumns[$i] == "PELUNASAN" || $aColumns[$i] == "LOCKING_PIUTANG" || $aColumns[$i] == "REPORT" || $aColumns[$i] == "DASHBOARD" || $aColumns[$i] == "MASTER_DATA" || $aColumns[$i] == "PRANOTA" || $aColumns[$i] == "CETAK_NOTA" || $aColumns[$i] == "INQUIRY_BANK" || $aColumns[$i] == "VIEW_ALL_TRANS") {
                    $checked = '';
                    if ($user_level->getField($aColumns[$i]) == 1) {
                        $checked = "checked";
                    }
                    $row[] = '<input type="checkbox" ' . $checked . '>';
                } else
                    $row[] = $user_level->getField($aColumns[$i]);
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    function add()
    {
        $this->load->model("UserLevel");
        $user_level = new UserLevel();

        $reqMode = $this->input->post("reqMode");

        $reqId = $this->input->post("reqId");
        $reqKode = $this->input->post("reqKode");
        $reqNama = $this->input->post("reqNama");
        $reqTransaksi = $this->input->post("reqTransaksi");
        $reqReport = $this->input->post("reqReport");
        $reqPelunasan = $this->input->post("reqPelunasan");
        $reqLocking = $this->input->post("reqLocking");
        $reqInquiry = $this->input->post("reqInquiry");
        $reqMaster = $this->input->post("reqMaster");
        $reqView = $this->input->post("reqView");
        $reqServices = $this->input->post("reqServices");



        $reqTransaksi       =  $reqTransaksi == '' ? '0' : '1';
        $reqReport         =    $reqReport == '' ? '0' : '1';
        $reqPelunasan      =  $reqPelunasan == '' ? '0' : '1';
        $reqLocking        =  $reqLocking == '' ? '0' : '1';
        $reqInquiry          =  $reqInquiry == '' ? '0' : '1';
        $reqMaster          =  $reqMaster == '' ? '0' : '1';
        $reqView          =  $reqView == '' ? '0' : '1';


        $user_level->setField("USER_LEVEL_ID", $reqId);
        $user_level->setField("KODE", $reqKode);
        $user_level->setField("NAMA", $reqNama);
        $user_level->setField("VIEW_ALL_TRANS", $reqView);
        $user_level->setField("PRANOTA", $reqTransaksi);
        $user_level->setField("TRANSAKSI", $reqTransaksi);
        $user_level->setField("PELUNASAN", $reqPelunasan);
        $user_level->setField("LOCKING_PIUTANG", $reqLocking);
        $user_level->setField("REPORT", $reqReport);
        $user_level->setField("CETAK_NOTA", $reqReport);
        $user_level->setField("INQUIRY_BANK", $reqInquiry);
        $user_level->setField("MASTER_DATA", $reqMaster);
        $user_level->setField("SERVICES_ID_ACCESS", $reqServices);


        if ($reqMode == "insert") {
            // $user_level->setField("LAST_CREATE_USER", $this->USERNAME);
            $user_level->insert();
        } else {
            // $user_level->setField("LAST_UPDATE_USER", $this->USERNAME);
            $user_level->update();
        }


        echo "Data berhasil disimpan.";
    }

    function delete()
    {
        $this->load->model("UserLevel");
        $user_level = new UserLevel();

        $reqId = $this->input->get('reqId');

        $user_level->setField("USER_LEVEL_ID", $reqId);
        if ($user_level->delete())
            $arrJson["PESAN"] = "Data berhasil dihapus.";
        else
            $arrJson["PESAN"] = "Data gagal dihapus.";

        echo json_encode($arrJson);
    }

    function combo()
    {
        $this->load->model("UserLogin");
        $user_login = new UserLogin();

        $user_login->selectByParams(array());
        $i = 0;
        while ($user_login->nextRow()) {
            $arr_json[$i]['id']        = $user_login->getField("USER_LOGIN_ID");
            $arr_json[$i]['text']    = $user_login->getField("NAMA");
            $i++;
        }

        echo json_encode($arr_json);
    }
}
