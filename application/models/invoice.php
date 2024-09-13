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

class Invoice extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function Invoice()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("INVOICE_ID", $this->getSeqId("INVOICE_ID", "INVOICE"));

        $str = "INSERT INTO INVOICE (INVOICE_ID, INVOICE_NUMBER, COMPANY_ID, INVOICE_DATE, PPN, COMPANY_NAME,CONTACT_NAME, ADDRESS, TELEPHONE, FAXIMILE, EMAIL, PPN_PERCENT,STATUS, INVOICE_PO, INVOICE_TAX, TERMS, NO_KONTRAK, NO_REPORT,DAYS,TOTAL_AMOUNT,DP,HP)
        VALUES (
                '" . $this->getField("INVOICE_ID") . "',
                '" . $this->getField("INVOICE_NUMBER") . "',
                " . $this->getField("COMPANY_ID") . ",
                " . $this->getField("INVOICE_DATE") . ",
                '" . $this->getField("PPN") . "',
                '" . $this->getField("COMPANY_NAME") . "',
                '" . $this->getField("CONTACT_NAME") . "',
                '" . $this->getField("ADDRESS") . "',
                '" . $this->getField("TELEPHONE") . "',
                '" . $this->getField("FAXIMILE") . "',
                '" . $this->getField("EMAIL") . "',
                '" . $this->getField("PPN_PERCENT") . "',
                '" . $this->getField("STATUS") . "',
                '" . $this->getField("INVOICE_PO") . "',
                '" . $this->getField("INVOICE_TAX") . "',
                '" . $this->getField("TERMS") . "',
                '" . $this->getField("NO_KONTRAK") . "',
                '" . $this->getField("NO_REPORT") . "', 
                '" . $this->getField("DAYS") . "',
                " . $this->getField("TOTAL_AMOUNT") . ",
                " . $this->getField("DP") . ",
                '" . $this->getField("HP") . "'
            )";

        $this->id = $this->getField("INVOICE_ID");
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE INVOICE
                SET    
                INVOICE_ID ='" . $this->getField("INVOICE_ID") . "',
                INVOICE_NUMBER ='" . $this->getField("INVOICE_NUMBER") . "',
                COMPANY_ID =" . $this->getField("COMPANY_ID") . ",
                INVOICE_DATE =" . $this->getField("INVOICE_DATE") . ",
                PPN ='" . $this->getField("PPN") . "',
                COMPANY_NAME ='" . $this->getField("COMPANY_NAME") . "',
                CONTACT_NAME ='" . $this->getField("CONTACT_NAME") . "',
                ADDRESS ='" . $this->getField("ADDRESS") . "',
                TELEPHONE ='" . $this->getField("TELEPHONE") . "',
                FAXIMILE ='" . $this->getField("FAXIMILE") . "',
                EMAIL ='" . $this->getField("EMAIL") . "',
                PPN_PERCENT ='" . $this->getField("PPN_PERCENT") . "',
                STATUS ='" . $this->getField("STATUS") . "',
                INVOICE_PO ='" . $this->getField("INVOICE_PO") . "',
                INVOICE_TAX ='" . $this->getField("INVOICE_TAX") . "',
                TERMS ='" . $this->getField("TERMS") . "',
                NO_KONTRAK ='" . $this->getField("NO_KONTRAK") . "',
                DAYS ='" . $this->getField("DAYS") . "',
                NO_REPORT ='" . $this->getField("NO_REPORT") . "',
                TOTAL_AMOUNT =" . $this->getField("TOTAL_AMOUNT") . ",
                DP =" . $this->getField("DP") . ",
                HP ='" . $this->getField("HP") . "'  
                WHERE INVOICE_ID= '" . $this->getField("INVOICE_ID") . "'";
        $this->query = $str;
        // echo $str;exit;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM INVOICE
                WHERE INVOICE_ID= '" . $this->getField("INVOICE_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.INVOICE_ID ASC")
    {
        $str = "SELECT A.INVOICE_ID,A.INVOICE_NUMBER,A.COMPANY_ID,A.INVOICE_DATE, TO_CHAR(A.INVOICE_DATE, 'DD-MM-YYYY') INVOICE_DATE2,A.PPN,A.COMPANY_NAME,A.CONTACT_NAME,A.ADDRESS,A.TELEPHONE,A.FAXIMILE,A.EMAIL,A.PPN_PERCENT,A.STATUS,A.INVOICE_PO,A.INVOICE_TAX,A.TERMS,A.NO_KONTRAK,A.NO_REPORT,
            (A.INVOICE_DATE - CURRENT_DATE) DAYS,A.DP,A.OFFER_ID,B.SUBJECT,A.HP
                FROM INVOICE A
                LEFT JOIN OFFER B ON A.OFFER_ID = B.OFFER_ID
                WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }

    // function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY I.INVOICE_ID ASC")
    // {
    //     $str = "SELECT I.INVOICE_ID, I.INVOICE_NUMBER , I.COMPANY_NAME , 
    //             (SELECT VESSEL FROM INVOICE_DETAIL X WHERE X.INVOICE_ID = I.INVOICE_ID LIMIT 1) VESSEL_NAME, TO_CHAR(I.INVOICE_DATE, 'DAY,MONTH DD YYYY') INVOICE_DATE, 
    //             ( CASE WHEN CAST(I.PPN AS INT)  = 0  THEN 'NO'
    //             ELSE 'YES'
    //             END ) PPN,
    //             I.STATUS STATUS,

    //             ( CASE WHEN CAST(D.CURRENCY AS VARCHAR) = '0'  THEN CONCAT('USD ', FORMAT(CAST(AMOUNT AS VARCHAR), 2))
    //             ELSE CONCAT('RP. ', FORMAT(CAST(AMOUNT AS VARCHAR), 2)) 
    //             END ) TOTAL_AMOUNT
    //             ,I.DAYS

    //             FROM INVOICE I LEFT JOIN INVOICE_DETAIL D ON I.INVOICE_ID = D.INVOICE_ID
    //             WHERE 1=1 ";
    //     while (list($key, $val) = each($paramsArray)) {
    //         $str .= " AND $key = '$val'";
    //     }

    //     $str .= $statement . " " . $order;
    //     $this->query = $str;
    //     return $this->selectLimit($str, $limit, $from);
    // }
    function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY I.INVOICE_ID ASC")
    {
        $str = "SELECT I.INVOICE_ID, I.INVOICE_NUMBER , I.COMPANY_NAME , 
                (SELECT VESSEL FROM INVOICE_DETAIL X WHERE X.INVOICE_ID = I.INVOICE_ID LIMIT 1) VESSEL_NAME, TO_CHAR(I.INVOICE_DATE, 'DAY,MONTH DD YYYY') INVOICE_DATE, 
                ( CASE WHEN CAST(I.PPN AS INT)  = 0  THEN 'NO'
                ELSE 'YES'
                END ) PPN,
                I.STATUS STATUS, I.TOTAL_AMOUNT
                ,(I.INVOICE_DATE - CURRENT_DATE) DAYS,I.HP

                FROM INVOICE I 
                WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }


    function selectByParamsCetakPdf($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY I.INVOICE_ID ASC")
    {
        $str = "SELECT I.INVOICE_ID, I.INVOICE_NUMBER , I.COMPANY_NAME , 
                (SELECT VESSEL FROM INVOICE_DETAIL X WHERE X.INVOICE_ID = I.INVOICE_ID LIMIT 1) VESSEL_NAME, TO_CHAR(I.INVOICE_DATE, 'DAY,MONTH DD YYYY') INVOICE_DATE, 
                ( CASE WHEN CAST(I.PPN AS INT)  = 0  THEN 'NO'
                ELSE 'YES'
                END ) PPN,
                I.STATUS STATUS,

                ( CASE WHEN CAST(D.CURRENCY AS VARCHAR) = '0'  THEN CONCAT('USD ', FORMAT(CAST(AMOUNT AS VARCHAR), 2))
                ELSE CONCAT('RP. ', FORMAT(CAST(AMOUNT AS VARCHAR), 2)) 
                END ) TOTAL_AMOUNT, I.HP

                FROM INVOICE I LEFT JOIN INVOICE_DETAIL D ON I.INVOICE_ID = D.INVOICE_ID
                WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }


    function selectByParamsCetakExcel($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY I.INVOICE_ID ASC")
    {
        $str = "SELECT I.INVOICE_ID, I.INVOICE_NUMBER , I.COMPANY_NAME , 
                (SELECT VESSEL FROM INVOICE_DETAIL X WHERE X.INVOICE_ID = I.INVOICE_ID LIMIT 1) VESSEL_NAME, TO_CHAR(I.INVOICE_DATE, 'DAY,MONTH DD YYYY') INVOICE_DATE, 
                ( CASE WHEN CAST(I.PPN AS INT)  = 0  THEN 'NO'
                ELSE 'YES'
                END ) PPN,
                I.STATUS STATUS,

                ( CASE WHEN CAST(D.CURRENCY AS VARCHAR) = '0'  THEN CONCAT('USD ', FORMAT(CAST(AMOUNT AS VARCHAR), 2))
                ELSE CONCAT('RP. ', FORMAT(CAST(AMOUNT AS VARCHAR), 2)) 
                END ) TOTAL_AMOUNT,I.HP

                FROM INVOICE I LEFT JOIN INVOICE_DETAIL D ON I.INVOICE_ID = D.INVOICE_ID
                WHERE 1=1 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        return $this->selectLimit($str, $limit, $from);
    }


    function getCountByParams($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM INVOICE A 
                LEFT JOIN INVOICE_DETAIL D ON A.INVOICE_ID = D.INVOICE_ID
                WHERE 1=1 " . $statement;
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key =    '$val' ";
        }
        $str = $str.' '.$statement;
        $this->query = $str;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }
     function getCountByParamsNews($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM INVOICE I 
                LEFT JOIN INVOICE_DETAIL D ON I.INVOICE_ID = D.INVOICE_ID
                WHERE 1=1 " . $statement;
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key =    '$val' ";
        }
        $str = $str.' '.$statement;
        $this->query = $str;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }

    function getCountByParamsMonitoring($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM INVOICE A WHERE 1=1 " . $statement;
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
