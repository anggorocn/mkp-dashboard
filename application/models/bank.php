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

class Bank extends Entity
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

    function insert()
    {
        $this->setField("BANK_PEMBAYARAN_ID", $this->getSeqId("BANK_PEMBAYARAN_ID", "BANK_PEMBAYARAN"));

        $str = "INSERT INTO BANK_PEMBAYARAN 
                (BANK_PEMBAYARAN_ID, NAMA, KODE_REKENING, NAMA_REKENING, 
                BANK_HOST, BANK_HOST_USERNAME, BANK_HOST_PASSWORD,
                   BANK_AUTH, BANK_TRANS_INQ, BANK_BALANCE_INQ, 
                   BANK_TODAY_TRANS_INQ, BANK_AUTODEBIT_NON_HOLD, BANK_INSERT_HOLD, 
                   BANK_UPDATE_HOLD, BANK_RELEASE_HOLD, BANK_RELEASE_PAYMENT, 
                   BANK_HOLD_INQ, BANK_BULK_INQ, 
                   COA, 
                   KODE_VA,
                   CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("BANK_PEMBAYARAN_ID") . "',
                '" . $this->getField("NAMA") . "',
                '" . $this->getField("KODE_REKENING") . "',
                '" . $this->getField("NAMA_REKENING") . "',
                '" . $this->getField("BANK_HOST") . "', '" . $this->getField("BANK_HOST_USERNAME") . "', '" . $this->getField("BANK_HOST_PASSWORD") . "',
                '" . $this->getField("BANK_AUTH") . "', '" . $this->getField("BANK_TRANS_INQ") . "', '" . $this->getField("BANK_BALANCE_INQ") . "',
                '" . $this->getField("BANK_TODAY_TRANS_INQ") . "', '" . $this->getField("BANK_AUTODEBIT_NON_HOLD") . "', '" . $this->getField("BANK_INSERT_HOLD") . "',
                '" . $this->getField("BANK_UPDATE_HOLD") . "', '" . $this->getField("BANK_RELEASE_HOLD") . "', '" . $this->getField("BANK_RELEASE_PAYMENT") . "',
                '" . $this->getField("BANK_HOLD_INQ") . "', '" . $this->getField("BANK_BULK_INQ") . "', 
                '" . $this->getField("COA") . "',
                '" . $this->getField("KODE_VA") . "',
                '" . $this->getField("CREATED_BY") . "',
                " . $this->getField("CREATED_DATE") . "
                )
                ";

        $this->id = $this->getField("BANK_PEMBAYARAN_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE BANK_PEMBAYARAN
                SET    
                    BANK_PEMBAYARAN_ID = '" . $this->getField("BANK_PEMBAYARAN_ID") . "',
                    NAMA = '" . $this->getField("NAMA") . "',
                    COA = '" . $this->getField("COA") . "',
                    KODE_VA = '" . $this->getField("KODE_VA") . "',
                    KODE_REKENING ='" . $this->getField("KODE_REKENING") . "',
                    NAMA_REKENING ='" . $this->getField("NAMA_REKENING") . "',
                   BANK_HOST               = '" . $this->getField("BANK_HOST") . "',
                   BANK_HOST_USERNAME      = '" . $this->getField("BANK_HOST_USERNAME") . "',
                   BANK_HOST_PASSWORD      = '" . $this->getField("BANK_HOST_PASSWORD") . "',
                   BANK_AUTH               = '" . $this->getField("BANK_AUTH") . "',
                   BANK_TRANS_INQ          = '" . $this->getField("BANK_TRANS_INQ") . "',
                   BANK_BALANCE_INQ        = '" . $this->getField("BANK_BALANCE_INQ") . "',
                   BANK_TODAY_TRANS_INQ    = '" . $this->getField("BANK_TODAY_TRANS_INQ") . "',
                   BANK_AUTODEBIT_NON_HOLD = '" . $this->getField("BANK_AUTODEBIT_NON_HOLD") . "',
                   BANK_INSERT_HOLD        = '" . $this->getField("BANK_INSERT_HOLD") . "',
                   BANK_UPDATE_HOLD        = '" . $this->getField("BANK_UPDATE_HOLD") . "',
                   BANK_RELEASE_HOLD       = '" . $this->getField("BANK_RELEASE_HOLD") . "',
                   BANK_RELEASE_PAYMENT    = '" . $this->getField("BANK_RELEASE_PAYMENT") . "',
                   BANK_HOLD_INQ           = '" . $this->getField("BANK_HOLD_INQ") . "',
                   BANK_BULK_INQ           = '" . $this->getField("BANK_BULK_INQ") . "',
                    UPDATED_BY ='" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE =" . $this->getField("UPDATED_DATE") . "
                WHERE BANK_PEMBAYARAN_ID= '" . $this->getField("BANK_PEMBAYARAN_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM BANK_PEMBAYARAN
                 WHERE BANK_PEMBAYARAN_ID= '" . $this->getField("BANK_PEMBAYARAN_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.BANK_PEMBAYARAN_ID ASC")
    {
        $str = "SELECT 
                    BANK_PEMBAYARAN_ID, NAMA, KODE_REKENING, 
                       NAMA_REKENING, CREATED_BY, CREATED_DATE, 
                       UPDATED_BY, UPDATED_DATE, BANK_HOST, BANK_HOST_USERNAME, BANK_HOST_PASSWORD, 
                       BANK_AUTH, BANK_TRANS_INQ, BANK_BALANCE_INQ, 
                       BANK_TODAY_TRANS_INQ, BANK_AUTODEBIT_NON_HOLD, BANK_INSERT_HOLD, 
                       BANK_UPDATE_HOLD, BANK_RELEASE_HOLD, BANK_RELEASE_PAYMENT, 
                       BANK_HOLD_INQ, BANK_BULK_INQ, COA, KODE_VA
                    FROM BANK_PEMBAYARAN A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM BANK_PEMBAYARAN A WHERE 1=1 " . $statement;
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
