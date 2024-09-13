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

class FakJenisPendapatan extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function FakJenisPendapatan()
    {
        $this->Entity();
    }

    function insert()
    {

        $str = "INSERT INTO FAK_JENIS_PENDAPATAN 
                (KODE, PENDAPATAN, INISIAL, KODE_FAKTUR, KD_TEMPLATE, STATUS, CREATE_BY, CREATE_DATE, PROGRAM_NAME)
                VALUES (
                '" . $this->getField("KODE") . "',
                '" . $this->getField("PENDAPATAN") . "',
                '" . $this->getField("INISIAL") . "',
                '" . $this->getField("KODE_FAKTUR") . "',
                '" . $this->getField("KD_TEMPLATE") . "',
                'A',
                '" . $this->getField("CREATE_BY") . "',
                SYSDATE,
                'FINA'
                )
                ";

        $this->id = $this->getField("KODE");
        $this->query = $str;
       
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE FAK_JENIS_PENDAPATAN
                SET    
                    KODE = '" . $this->getField("KODE") . "',
                    PENDAPATAN = '" . $this->getField("PENDAPATAN") . "',
                    INISIAL ='" . $this->getField("INISIAL") . "',
                    KODE_FAKTUR ='" . $this->getField("KODE_FAKTUR") . "',
                    STATUS ='" . $this->getField("STATUS") . "',
                    KD_TEMPLATE ='" . $this->getField("KD_TEMPLATE") . "',
                    LAST_MODIF_BY ='" . $this->getField("LAST_MODIF_BY") . "',
                    LAST_MODIF_DATE = SYSDATE
                WHERE KODE= '" . $this->getField("KODE") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM FAK_JENIS_PENDAPATAN
                 WHERE KODE= '" . $this->getField("KODE") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.KODE ASC")
    {
        $str = "SELECT A.KODE,A.PENDAPATAN,A.INISIAL, A.KD_TEMPLATE, A.STATUS, A.KODE_FAKTUR, A.CREATE_BY,A.CREATE_DATE,A.LAST_MODIF_BY,A.LAST_MODIF_DATE
                FROM FAK_JENIS_PENDAPATAN A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM FAK_JENIS_PENDAPATAN A WHERE 1=1 " . $statement;
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
