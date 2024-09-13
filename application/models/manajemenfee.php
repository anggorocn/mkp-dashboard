<?
/* *******************************************************************************************************
MODUL NAME 			: IMASYS
FILE NAME 			: 
AUTHOR				: 
VERSION				: 1.0
MODIFICATION DOC	:
DESCRIPTION			: 
***************************************************************************************************** */

/***
 * Entity-base class untuk mengimplementasikan tabel PANGKAT.
 * 
 ***/
include_once("Entity.php");

class ManajemenFee extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function Bank()
    {
        $this->Entity();
    }


    function delete($statement = "")
    {
        $str = "DELETE FROM MANAJEMEN_FEE
                 WHERE PERIODE= '" . $this->getField("PERIODE") . "' AND LPAD(NO_NOTA, 7, '0') = '" . $this->getField("NO_NOTA") . "' ";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }


    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.TANGGAL ASC")
    {
        $str = "SELECT 
                PERIODE, LPAD(NO_NOTA, 7, '0') NO_NOTA, INT_DOM, SEGMEN, 
                   VOYAGE, SERVICE, TANGGAL, 
                   CUSTOMER, INVOICE, INVOICE_NON_ADMIN, 
                   PNBP, MAN_FEE, PPN, 
                   NVL(ADMIN, 0) ADMIN, MAN_FEE_TOTAL
                FROM MANAJEMEN_FEE A
        WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }

    function getCountByParamsMonitoring($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM MANAJEMEN_FEE A WHERE 1=1 " . $statement;
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key =    '$val' ";
        }
        $this->query = $str;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }
}
