<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class fak_log_json extends CI_Controller
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
		$this->load->model("FakLog");
		$fak_log = new FakLog();

		$reqKodePelanggan = $this->input->get("reqKodePelanggan");
		$reqPeriode = $this->input->get("reqPeriode");
        $reqOutput = $this->input->get("reqOutput");

		$aColumns = array(
			"NPWP", "NPWP", "CUSTOMER_NAME", "NOFAKTUR", 
				"TGL_FAKTUR", "PERIODE_PAJAK", "DPP_AMOUNT", 
				   "PPN_AMOUNT", "MATERAI_AMOUNT", 
				   "INVOICE_AMOUNT"
		);

		$aColumnsAlias = array(
			"NPWP", "NPWP", "CUSTOMER_NAME", "NOFAKTUR", 
				"TGL_FAKTUR", "PERIODE_PAJAK", "DPP_AMOUNT", 
				   "PPN_AMOUNT", "MATERAI_AMOUNT", 
				   "INVOICE_AMOUNT"
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
			if (trim($sOrder) == "ORDER BY NPWP asc") {
				/*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
				$sOrder = " ORDER BY TGL_FAKTUR desc";
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

		if(!empty($reqPeriode))
			$statement_privacy = " AND A.PERIODE_PAJAK = '$reqPeriode' ";

		if(!empty($reqKodePelanggan))
			$statement_privacy = " AND A.CUSTOMER = '$reqKodePelanggan' ";



		$statement = " AND (UPPER(A.NPWP) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.NOFAKTUR) LIKE '%" . strtoupper($_GET['sSearch']) . "%' OR UPPER(A.CUSTOMER_NAME) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
		$allRecord = $fak_log->getCountByParams(array(), $statement_privacy . $statement);
		// echo $allRecord;exit;
		if ($_GET['sSearch'] == "")
			$allRecordFilter = $allRecord;
		else
			$allRecordFilter =  $fak_log->getCountByParams(array(), $statement_privacy . $statement);

		if(empty($sOrder))
			$sOrder = " ORDER BY A.TGL_FAKTUR ASC ";
		$fak_log->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
	
		// exit;
		// echo "IKI ".$_GET['iDisplayStart'];

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
                    for($i=1;$i<count($aColumnsAlias);$i++)
                    {
                        echo "<th>".str_replace("_", " ", $aColumns[$i])."</th>";       
                    }
                    ?>
                    </tr>
                    <?
                    while ($fak_log->nextRow()) {
                        ?>
                        <tr>
                        <?
                        for ($i = 1; $i < count($aColumns); $i++) {
                            if ($aColumns[$i] == "PERIODE_PAJAK") {
                                $row = getNamePeriode($fak_log->getField($aColumns[$i]));
                            } elseif(stristr($aColumns[$i], "AMOUNT")) {
                                $row = ($fak_log->getField($aColumns[$i]));
                            } else {
                                $row = $fak_log->getField($aColumns[$i]);
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

		while ($fak_log->nextRow()) {
			$row = array();
			for ($i = 0; $i < count($aColumns); $i++) {
				if (stristr($aColumns[$i], "AMOUNT"))
					$row[] = numberToIna($fak_log->getField($aColumns[$i]));
				else
					$row[] = $fak_log->getField($aColumns[$i]);
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}




}
