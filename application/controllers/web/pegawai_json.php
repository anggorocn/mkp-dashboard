<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("functions/image.func.php");
include_once("functions/string.func.php");

class pegawai_json extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //kauth
        if($this->session->userdata("HAKAKSES") == "") {
            //redirect('app');
        }

        $this->db->query("alter session set nls_date_format='DD-MM-YYYY'");
        $this->db->query("alter session set nls_numeric_characters='.,'");

        $this->CABANG_ID = $this->session->userdata("CABANG_ID");
        $this->CABANG = $this->session->userdata("CABANG");
        $this->PERIODE_ID = $this->session->userdata("PERIODE_ID");
		$this->PERIODE = $this->session->userdata("PERIODE");
		$this->USER_LOGIN_ID = $this->session->userdata("USER_LOGIN_ID");
		$this->KD_DIT = $this->session->userdata("KD_DIT");
		$this->KD_SUBDIT = $this->session->userdata("KD_SUBDIT");
		$this->DIREKTORAT = $this->session->userdata("DIREKTORAT");
		$this->SUBDIT = $this->session->userdata("SUBDIT");
		$this->NIP = $this->session->userdata("NIP");
		$this->USER_LOGIN = $this->session->userdata("USER_LOGIN");
		$this->NAMA = $this->session->userdata("NAMA");
		$this->JABATAN = $this->session->userdata("JABATAN");
		$this->USER_GROUP_ID = $this->session->userdata("USER_GROUP_ID");
		$this->USER_GROUP = $this->session->userdata("USER_GROUP");
		$this->HAKAKSES = $this->session->userdata("HAKAKSES");
		$this->HAKAKSES_DESC = $this->session->userdata("HAKAKSES_DESC");
		$this->LOGIN_TIME = $this->session->userdata("LOGIN_TIME");
		$this->LOGIN_DATE = $this->session->userdata("LOGIN_DATE");

        /* BLOCK AKSES MASTER SELAIN ADMINISTRATOR */
        if (stristr($this->uri->segment(3, ""), "master")) {
            if ($this->USER_TYPE_ID == "1") {
            } else {
                redirect('app');
            }
        }
    }

    public function json()
    {
        include_once("functions/string.func.php");
        include_once("functions/default.func.php");
        include_once("functions/date.func.php");
        $this->load->model("Pegawai");

        $pegawai = new Pegawai();

        /* LOGIN CHECK
        if ($this->checkUserLogin())
        {
            $this->retrieveUserInfo();
        }
        */
        ini_set("memory_limit", "500M");
        ini_set('max_execution_time', 520);


        $aColumns = array("NIK", "NIK", "NAME", "NAMA_PEL", "SUB_UNIT", "NAMA_POSISI");
        $aColumnsAlias = array("NIK", "NIK", "NAME", "NAMA_PEL", "SUB_UNIT", "NAMA_POSISI");

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
            if (trim($sOrder) == "ORDER BY NIK asc") {
                /*
                * If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
                * If there is no order by clause there might be bugs in table display.
                * No order by clause means that the db is not responsible for the data ordering,
                * which means that the same row can be displayed in two pages - while
                * another row will not be displayed at all.
                */
                $sOrder = " ";
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

        $statement = " ";

        $allRecord = $pegawai->getCountByParams(array(), $statement);
        if ($_GET['sSearch'] == "") {
            $allRecordFilter = $allRecord;
        } else {
            $allRecordFilter = $pegawai->getCountByParams(array(), $statement . " AND (UPPER(NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')");
        }

        $pegawai->selectByParams(array(), $dsplyRange, $dsplyStart, $statement . " AND (UPPER(NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')", $sOrder);

        /* Output */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($pegawai->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "TANGGAL") {
                    $row[] = getFormattedDate($pegawai->getField($aColumns[$i]));
                } elseif ($aColumns[$i] == "KETERANGAN") {
                    $row[] = truncate($pegawai->getField($aColumns[$i]), 5) . "...";
                } else {
                    $row[] = $pegawai->getField($aColumns[$i]);
                }
            }
			$button = "";
			$ids = $pegawai->getField($aColumns[0]);
			$btn_edit="pilih('".$ids."')";
			$button =$button.'<a data-toggle="tooltip" data-placement="top" data-original-title="Edit" data-aksi="edit" title="Edit" class="btn btn-sm dt-btn-index btn-info" onclick="'.$btn_edit.'" style="'.$stlye.'"> <i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>&nbsp;';
			$row[] =$button;

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }


    function get_approval()
    {

        $reqServicesId = $this->input->get("reqServicesId");

        $sql = "
        SELECT B.NIK APPROVAL1, B.NAME || ' (' || B.NAMA_POSISI || ')' APPROVAL1_DATA,
               C.NIK APPROVAL2, C.NAME || ' (' || C.NAMA_POSISI || ')' APPROVAL2_DATA 
        FROM SERVICES A 
        LEFT JOIN PEGAWAI_STRUKTURAL B ON A.APPROVAL_JABATAN1 = B.POSITION
        LEFT JOIN PEGAWAI_STRUKTURAL C ON A.APPROVAL_JABATAN2 = C.POSITION
            WHERE A.SERVICES_ID = '$reqServicesId'
        ";

        $rowResult = $this->db->query($sql)->first_row();


        $arrResult["APPROVAL1"] = (string)$rowResult->APPROVAL1;
        $arrResult["APPROVAL1_DATA"] = (string)$rowResult->APPROVAL1_DATA;
        $arrResult["APPROVAL2"] = (string)$rowResult->APPROVAL2;
        $arrResult["APPROVAL2_DATA"] = (string)$rowResult->APPROVAL2_DATA;

        echo json_encode($arrResult);

    }


    function get_approval_extend()
    {

        $reqServicesId = $this->input->get("reqServicesId");


        $rowResult = $this->db->query(" SELECT NIK, NAME || ' (' || NAMA_POSISI || ')' NIK_DATA FROM PEGAWAI WHERE POSITION = '50000137' ")->row();

        $approvalSMFinance = $rowResult->NIK;
        $approvalSMFinanceData = $rowResult->NIK_DATA;


        $sql = "
        SELECT B.NIK APPROVAL1, B.NAME || ' (' || B.NAMA_POSISI || ')' APPROVAL1_DATA,
               C.NIK APPROVAL2, C.NAME || ' (' || C.NAMA_POSISI || ')' APPROVAL2_DATA 
        FROM SERVICES A 
        LEFT JOIN PEGAWAI_STRUKTURAL B ON A.APPROVAL_JABATAN1 = B.POSITION
        LEFT JOIN PEGAWAI_STRUKTURAL C ON A.APPROVAL_JABATAN2 = C.POSITION
            WHERE A.SERVICES_ID = '$reqServicesId'
        ";

        $rowResult = $this->db->query($sql)->first_row();

        $approvalPranota1 = $rowResult->APPROVAL1;
        $approvalPranotaData1 = $rowResult->APPROVAL1_DATA;

        $approvalPranota2 = $rowResult->APPROVAL2;
        $approvalPranotaData2 = $rowResult->APPROVAL2_DATA;


        $approvalPranota = $approvalPranota2;
        $approvalPranotaData = $approvalPranotaData2;
        
        if($approvalSMFinance == $approvalPranota2)
        {
            $approvalPranota = $approvalPranota1;
            $approvalPranotaData = $approvalPranotaData1;
        }


        $arrResult["APPROVAL1"] = (string)$approvalPranota;
        $arrResult["APPROVAL1_DATA"] = (string)$approvalPranotaData;
        $arrResult["APPROVAL2"] = (string)$approvalSMFinance;
        $arrResult["APPROVAL2_DATA"] = (string)$approvalSMFinanceData;

        echo json_encode($arrResult);

    }

}
