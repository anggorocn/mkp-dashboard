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

class Materai extends Entity
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
        $this->setField("MATERAI_ID", $this->getSeqId("MATERAI_ID", "MATERAI"));

        $str = "INSERT INTO MATERAI 
                (MATERAI_ID, NILAI_AWAL, NILAI_AKHIR, MATERAI, CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("MATERAI_ID") . "',
                '" . $this->getField("NILAI_AWAL") . "',
                '" . $this->getField("NILAI_AKHIR") . "',
                '" . $this->getField("MATERAI") . "',
                '" . $this->getField("CREATED_BY") . "',
                " . $this->getField("CREATED_DATE") . "
                )
                ";

        $this->id = $this->getField("MATERAI_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE MATERAI
                SET    
                    MATERAI_ID = '" . $this->getField("MATERAI_ID") . "',
                    NILAI_AWAL = '" . $this->getField("NILAI_AWAL") . "',
                    NILAI_AKHIR ='" . $this->getField("NILAI_AKHIR") . "',
                    MATERAI ='" . $this->getField("MATERAI") . "',
                    UPDATED_BY ='" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE =" . $this->getField("UPDATED_DATE") . "
                WHERE MATERAI_ID= '" . $this->getField("MATERAI_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM MATERAI
                 WHERE MATERAI_ID= '" . $this->getField("MATERAI_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.MATERAI_ID ASC")
    {
        $str = "SELECT A.MATERAI_ID,A.NILAI_AWAL,A.NILAI_AKHIR, A.MATERAI, A.CREATED_BY,A.CREATED_DATE,A.UPDATED_BY,A.UPDATED_DATE
                FROM MATERAI A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM MATERAI A WHERE 1=1 " . $statement;
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
