<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/default.func.php");
include_once("functions/string.func.php");
include_once("functions/date.func.php");
// include_once("lib/excel/excel_reader2.php");

class invoice_json extends CI_Controller
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
        $this->load->model("Invoice");
        $invoice = new Invoice();

        $aColumns = array(
            "INVOICE_ID", "INVOICE_NUMBER", "COMPANY_NAME", "VESSEL_NAME", "INVOICE_DATE", "DAYS", "STATUS", "TOTAL_AMOUNT"
        );

        $aColumnsAlias = array(
            "INVOICE_ID", "INVOICE_NUMBER", "COMPANY_NAME", "VESSEL_NAME", "INVOICE_DATE", "DAYS", "STATUS", "TOTAL_AMOUNT"
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
            if (trim($sOrder) == "ORDER BY INVOICE_ID asc") {
                /*
				* If there is no order by clause - ORDER BY INDEX COLUMN!!! DON'T DELETE IT!
				* If there is no order by clause there might be bugs in table display.
				* No order by clause means that the db is not responsible for the data ordering,
				* which means that the same row can be displayed in two pages - while
				* another row will not be displayed at all.
				*/
                $sOrder = " ORDER BY INVOICE_ID desc";
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

        $statement_privacy .= " ";

        $reqCariNoOrder         = $this->input->get('reqCariNoOrder');
        $reqCariPeriodeYearFrom = $this->input->get('reqCariPeriodeYearFrom');
        $reqCariPeriodeYearTo   = $this->input->get('reqCariPeriodeYearTo');
        $reqCariCompanyName     = $this->input->get('reqCariCompanyName');
        $reqCariVasselName      = $this->input->get('reqCariVasselName');

        if (!empty($reqCariNoOrder)) {
            $statement .= "AND I.INVOICE_NUMBER like '%" . $reqCariNoOrder . "%'";
        }
        if (!empty($reqCariPeriodeYearFrom) && !empty($reqCariPeriodeYearTo)) {
            $statement .= " AND I.INVOICE_DATE BETWEEN  TO_CHAR(" . $reqCariPeriodeYearFrom . ", 'yyyy-MM-dd')  AND TO_CHAR(" . $reqCariPeriodeYearTo . ", 'yyyy-MM-dd') ";
        }

        if (!empty($reqCariCompanyName)) {
            $statement .= "AND I.COMPANY_NAME like '%" . $reqCariCompanyName . "%'";
        }
        if (!empty($reqCariVasselName)) {
            $statement .= "AND (SELECT VESSEL FROM INVOICE_DETAIL X WHERE X.INVOICE_ID = I.INVOICE_ID LIMIT 1) like '%" . $reqCariVasselName . "%'";
        }



        $statement .= " AND (UPPER(INVOICE_NUMBER) LIKE '%" . strtoupper($_GET['sSearch']) . "%')";
        $allRecord = $invoice->getCountByParamsNews(array(), $statement_privacy . $statement);
        // echo $allRecord;exit;
        if ($_GET['sSearch'] == "")
            $allRecordFilter = $allRecord;
        else
            $allRecordFilter =  $invoice->getCountByParamsNews(array(), $statement_privacy . $statement);

        $invoice->selectByParams(array(), $dsplyRange, $dsplyStart, $statement_privacy . $statement, $sOrder);
        // echo $invoice->query;exit;
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

        while ($invoice->nextRow()) {
            
            $status = $invoice->getField('STATUS');
            $color='';
            if($status=='Lunas'){
                 $color='green';
            }else if($status=='Belum Lunas'){
                  $color='red';
            }else if($status=='Pending'){
                 $color='yellow';
            }

            

            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                
                if ($aColumns[$i] == "INVOICE_ID") {
                    $row[] = $invoice->getField($aColumns[$i]);
                } 
                // else if ($aColumns[$i] == "TOTAL_AMOUNT") {
                //     $text_val = substr($invoice->getField($aColumns[$i]), 0, 3);
                //     $text_moninal = substr($invoice->getField($aColumns[$i]), 3);
                //     $row[] = $text_val . ' ' . currencyToPage2($text_moninal);
                // } 
                else if ($aColumns[$i] == "PPN") {
                    $stat = 'No';
                    if ($invoice->getField($aColumns[$i]) == 1) {
                        $stat = 'Yes';
                    }
                    $row[] = $stat;
                } else {
                    $row[] = $invoice->getField($aColumns[$i]);
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }


    function add()
    {
        $this->load->model("Invoice");
        $invoice = new Invoice();

        $reqMode = $this->input->post("reqMode");

        $reqId = $this->input->post("reqId");
        $reqInvoiceNumber = $this->input->post("reqInvoiceNumber");
        $reqInvoiceDate = $this->input->post("reqInvoiceDate");
        // echo $reqInvoiceDate;exit;
        $reqPpn = $this->input->post("reqPpn");
        $reqNoHp = $this->input->post("reqNoHp");
        $reqCompanyName = $this->input->post("reqCompanyName");
        $reqCompanyId = $this->input->post("reqCompanyId");
        $reqContactName = $this->input->post("reqContactName");
        $reqAddress = $this->input->post("reqAddress");
        $reqTelephone = $this->input->post("reqTelephone");
        $reqFaximile = $this->input->post("reqFaximile");
        $reqEmail = $this->input->post("reqEmail");
        $reqPpnPercent = $this->input->post("reqPpnPercent");
        $reqStatus = $this->input->post("reqStatus");
        $reqInvoicePo = $this->input->post("reqInvoicePo");
        $reqInvoiceTax = $this->input->post("reqInvoiceTax");
        $reqTerms = $this->input->post("reqTerms");
        $reqNoKontrak = $this->input->post("reqNoKontrak");
        $reqNoReport = $this->input->post("reqNoReport");
        $reqDays = $this->input->post("reqDays");
        $reqtotalIDR = $this->input->post("totalIDR");
        $reqDP              = $this->input->post('reqDP');
        $reqAdditional      = $this->input->post('reqAdditional');
        // echo $reqtotalIDR;exit;


        $chek = $this->input->post("chek");
        if (empty($chek)) {
            $chek = 0;
        }


        $invoice->setField("INVOICE_ID", $reqId);
        $invoice->setField("INVOICE_NUMBER", $reqInvoiceNumber);
       
        $invoice->setField("PPN", dotToNo($chek));
        $invoice->setField("COMPANY_NAME", $reqCompanyName);
        $invoice->setField("COMPANY_ID", ValToNullDB($reqCompanyId));
        $invoice->setField("CONTACT_NAME", $reqContactName);
        $invoice->setField("ADDRESS", $reqAddress);
        $invoice->setField("TELEPHONE", $reqTelephone);
        $invoice->setField("FAXIMILE", $reqFaximile);
        $invoice->setField("EMAIL", $reqEmail);
        $invoice->setField("PPN_PERCENT", dotToNo($reqPpn));
        $invoice->setField("STATUS", $reqStatus);
        $invoice->setField("INVOICE_PO", $reqInvoicePo);
        $invoice->setField("INVOICE_TAX", $reqInvoiceTax);
        $invoice->setField("TERMS", $reqTerms);
        $invoice->setField("NO_KONTRAK", $reqNoKontrak);
        $invoice->setField("NO_REPORT", $reqNoReport);
        $invoice->setField("DAYS", $reqDays);
        $invoice->setField("TOTAL_AMOUNT", normal_angka($reqtotalIDR));
        $invoice->setField("DP", normal_angka($reqDP));
        $invoice->setField("HP", $reqNoHp);

        $status = '';
        if (empty($reqId)) {
           $invoice->setField("INVOICE_DATE", dateToDBCheck2($reqInvoiceDate));
           $invoice->insert();
           $reqId =  $invoice->id;
           $status = 'baru';
       } else {
           $invoice->setField("INVOICE_DATE", dateToDBCheck2($reqInvoiceDate));
           $invoice->update();
       }

        $this->load->model("InvoiceDetail");
        $invoice_detail = new InvoiceDetail();
        $reqInvoiceDetailId = $this->input->post('reqInvoiceDetailId');
        $reqServiceType     = $this->input->post('reqServiceType');
        $reqVessel          = $this->input->post('reqVessel');
        $reqServiceDate     = $this->input->post('reqServiceDate');
        $reqAmount          = $this->input->post('reqAmount');
        $reqLocation        = $this->input->post('reqLocation');
        $reqCurrencys       = $this->input->post('reqCurrencys');

        $invoice_detail->setField("INVOICE_DETAIL_ID", $reqInvoiceDetailId);
        $invoice_detail->setField("INVOICE_ID", $reqId);
        $invoice_detail->setField("SERVICE_TYPE", $reqServiceType);
        $invoice_detail->setField("SERVICE_DATE", dateToDBCheck($reqServiceDate));
        $invoice_detail->setField("LOCATION", $reqLocation);
        $invoice_detail->setField("VESSEL", $reqVessel);
        $invoice_detail->setField("AMOUNT", ValToNullDB(normal_angka($reqAmount)));
        $invoice_detail->setField("CURRENCY", $reqCurrencys);
        $invoice_detail->setField("ADDITIONAL", $reqAdditional);
        if (empty($reqInvoiceDetailId) && !empty($reqServiceType) && !empty($reqAmount)) {
            $invoice_detail->insert();
        } else {
            if (!empty($reqServiceType) && !empty($reqAmount)) {
                $invoice_detail->update();
            }
        }


        $pesan = "Data berhasil disimpan.-".$reqId."-";
        echo $pesan;
    }

    function delete()
    {
        $reqId = $this->input->get('reqId');
        $this->load->model("Invoice");
        $this->load->model("InvoiceDetail");
        $invoice = new Invoice();
        $invoice_detail = new InvoiceDetail();

        $invoice->setField("INVOICE_ID", $reqId);
        $invoice_detail->setField("INVOICE_ID", $reqId);
        if ($invoice->delete()) {

            // $arrJson["PESAN"] = "Data berhasil dihapus.";
        } else {
            // $arrJson["PESAN"] = "Data gagal dihapus.";
        }

        echo 'Data berhasil dihapus';
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
