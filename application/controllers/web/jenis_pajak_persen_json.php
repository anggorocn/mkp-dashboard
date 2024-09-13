<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/default.func.php");
include_once("functions/date.func.php");

class jenis_pajak_persen_json extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //kauth

        if (!$this->kauth->getInstance()->hasIdentity()) {
            redirect('login');
        }


        /* GLOBAL VARIABLE */
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


    function add()
    {
        /* INCLUDE FILE */
        $this->load->model("JenisPajakPersen");
        $jenis_pajak_persen = new JenisPajakPersen();

        $reqId = $this->input->post("reqId");
        $reqMode = $this->input->post("reqMode");

        $reqJenisPajakPersenId = $this->input->post("reqJenisPajakPersenId");

        $reqNama = $this->input->post("reqNama");
        $reqKeterangan = $this->input->post("reqKeterangan");
        $reqPersen = $this->input->post("reqPersen");

        for ($i = 0; $i < count($reqPersen); $i++) {
            if ($reqPersen[$i] == "") {
            } else {
                $jenis_pajak_persen->setField("JENIS_PAJAK_PERSEN_ID", $reqJenisPajakPersenId[$i]);
                $jenis_pajak_persen->setField("JENIS_PAJAK_ID", $reqId);
                $jenis_pajak_persen->setField("NAMA", $reqNama[$i]);
                $jenis_pajak_persen->setField("KETERANGAN", $reqKeterangan[$i]);
                $jenis_pajak_persen->setField("PERSEN", $reqPersen[$i]);
                $jenis_pajak_persen->setField("CREATED_BY", $this->nama);
                $jenis_pajak_persen->setField("CREATED_DATE", "CURRENT_DATE");

                if ($reqJenisPajakPersenId[$i] == "")
                    $jenis_pajak_persen->insert();
                else
                    $jenis_pajak_persen->update();
            }
            // unset($jenis_pajak_persen);
        }
        echo "Data berhasil disimpan.";
    }


    function json()
    {

        $this->load->model("JenisPajak");
        $jenis_pajak = new JenisPajak();

        ini_set("memory_limit", "500M");
        ini_set('max_execution_time', 520);


        $aColumns = array("JENIS_PAJAK_ID", "KD_BUKU_BESAR", "NAMA", "KETERANGAN");
        $aColumnsAlias = array("JENIS_PAJAK_ID", "KD_BUKU_BESAR", "NAMA", "KETERANGAN");

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
            if (trim($sOrder) == "ORDER BY JENIS_PAJAK_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY JENIS_PAJAK_ID ASC";
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


        $allRecord = $jenis_pajak->getCountByParams(array());
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter = $jenis_pajak->getCountByParams(array(), " AND (UPPER(NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')");

        $jenis_pajak->selectByParams(array(), $dsplyRange, $dsplyStart, " AND (UPPER(NAMA) LIKE '%" . strtoupper($_GET['sSearch']) . "%')", $sOrder);

        /* Output */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $allRecord,
            "iTotalDisplayRecords" => $allRecordFilter,
            "aaData" => array()
        );

        while ($jenis_pajak->nextRow()) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "NAMA")
                    $row[] = $jenis_pajak->getField($aColumns[$i]);
                else if ($aColumns[$i] == "KETERANGAN")
                    $row[] = truncate($jenis_pajak->getField($aColumns[$i]), 5) . "...";
                else
                    $row[] = $jenis_pajak->getField($aColumns[$i]);
            }

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }


    function delete()
    {
        $reqId = httpFilterGet("reqId");

        $this->load->model("JenisPajakPersen");
        $jenis_pajak_persen = new JenisPajakPersen();

        $jenis_pajak_persen->setField("JENIS_PAJAK_PERSEN_ID", $reqId);
        if ($jenis_pajak_persen->delete())
            $pesan = "Data berhasil dihapus.";
        else
            $pesan = "Data gagal dihapus.";

        echo $pesan;
    }
}
