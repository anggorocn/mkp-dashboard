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

class PatimbanLoader extends Entity
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
        $str = "DELETE FROM PATIMBAN_LOADER
                 WHERE PERIODE= '" . $this->getField("PERIODE") . "' AND URUT = '" . $this->getField("URUT") . "' ";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }


    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.URUT ASC")
    {
        $str = "SELECT 
                    URUT, PERIODE, JENIS, 
                       COST_ELEMENT, COST_ELEMENT_NAME, JUMLAH, 
                       PURCHASING_DOCUMENT, PURCHASE_ORDER_TEXT, NAME, 
                       COST_CENTER, DOCUMENT_NUMBER, POSTING_DATE
                    FROM PATIMBAN_LOADER A
                 WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }



    function selectByParamsRekap($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.COST_ELEMENT ASC")
    {
        $str = "SELECT  COST_ELEMENT, COST_ELEMENT_NAME, SUM(JUMLAH) JUMLAH
                    FROM PATIMBAN_LOADER A
                 WHERE 1=1 AND JENIS IN ('BARANG', 'JASA') ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " GROUP BY  COST_ELEMENT, COST_ELEMENT_NAME " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }



    function getCountByParamsMonitoring($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM PATIMBAN_LOADER A WHERE 1=1 " . $statement;
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
