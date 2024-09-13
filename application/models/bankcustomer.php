<?
/* *******************************************************************************************************
MODUL NAME          : IMASYS
FILE NAME           : 
AUTHOR              : 
VERSION             : 1.0
MODIFICATION DOC    :
DESCRIPTION         : 
***************************************************************************************************** */

/***
 * Entity-base class untuk mengimplementasikan tabel PANGKAT.
 * 
 ***/
include_once("Entity.php");

class BankCustomer extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function BankCustomer()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("BANK_CUSTOMER_ID", $this->getSeqId("BANK_CUSTOMER_ID", "BANK_CUSTOMER"));

        $str = "INSERT INTO BANK_CUSTOMER 
                (BANK_CUSTOMER_ID, NAMA, KODE_BANK, KODE_TRANSFER, CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("BANK_CUSTOMER_ID") . "',
                '" . $this->getField("NAMA") . "',
                '" . $this->getField("KODE_BANK") . "',
                '" . $this->getField("KODE_TRANSFER") . "',
                '" . $this->getField("CREATED_BY") . "',
                SYSDATE
                )
                ";

        $this->id = $this->getField("BANK_CUSTOMER_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE BANK_CUSTOMER
                SET    
                    NAMA = '" . $this->getField("NAMA") . "',
                    KODE_BANK ='" . $this->getField("KODE_BANK") . "',
                    KODE_TRANSFER ='" . $this->getField("KODE_TRANSFER") . "',
                    UPDATED_BY ='" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE = SYSDATE
                WHERE BANK_CUSTOMER_ID= '" . $this->getField("BANK_CUSTOMER_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM BANK_CUSTOMER
                 WHERE BANK_CUSTOMER_ID= '" . $this->getField("BANK_CUSTOMER_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.BANK_CUSTOMER_ID ASC")
    {
        $str = "SELECT A.BANK_CUSTOMER_ID,A.NAMA,A.KODE_BANK, A.KODE_TRANSFER,  A.CREATED_BY,A.CREATED_DATE,A.UPDATED_BY,A.UPDATED_DATE
                FROM BANK_CUSTOMER A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM BANK_CUSTOMER A WHERE 1=1 " . $statement;
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
