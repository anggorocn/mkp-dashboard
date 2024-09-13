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

class PelunasanNota extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function PelunasanNota()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("PELUNASAN_NOTA_ID", $this->getSeqId("PELUNASAN_NOTA_ID", "PELUNASAN_NOTA"));

        $str = "INSERT INTO PELUNASAN_NOTA 
                (PELUNASAN_NOTA_ID, TAGIHAN_PROJECT_ID, SERVICES_ID,  BANK_PEMBAYARAN_ID, TANGGAL, METODE_PEMBAYARAN, KETERANGAN, METODE_JURNAL, TOTAL, SISA_TAGIHAN, LAMPIRAN, CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("PELUNASAN_NOTA_ID") . "',
                '" . $this->getField("TAGIHAN_PROJECT_ID") . "',
                '" . $this->getField("SERVICES_ID") . "',
                '" . $this->getField("BANK_PEMBAYARAN_ID") . "',
                " . $this->getField("TANGGAL") . ",
                '" . $this->getField("METODE_PEMBAYARAN") . "', 
                '" . $this->getField("KETERANGAN") . "',
                '" . $this->getField("METODE_JURNAL") . "',
                '" . $this->getField("TOTAL") . "',
                '" . $this->getField("SISA_TAGIHAN") . "',
                '" . $this->getField("LAMPIRAN") . "',
                '" . $this->getField("CREATED_BY") . "',
                SYSDATE
                )
                ";

        $this->id = $this->getField("PELUNASAN_NOTA_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE PELUNASAN_NOTA
                SET    
                    TANGGAL              = " . $this->getField("TANGGAL") . ",
                    BANK_PEMBAYARAN_ID   = '" . $this->getField("BANK_PEMBAYARAN_ID") . "',
                    METODE_JURNAL   = '" . $this->getField("METODE_JURNAL") . "',
                    KETERANGAN      = '" . $this->getField("KETERANGAN") . "',
                    LAMPIRAN        = '" . $this->getField("LAMPIRAN") . "',
                    TOTAL           = '" . $this->getField("TOTAL") . "',
                    UPDATED_BY      = '" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE    = SYSDATE
                WHERE PELUNASAN_NOTA_ID = '" . $this->getField("PELUNASAN_NOTA_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM PELUNASAN_NOTA
                 WHERE PELUNASAN_NOTA_ID= '" . $this->getField("PELUNASAN_NOTA_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.PELUNASAN_NOTA_ID ASC")
    {
        $str = "SELECT 
            PELUNASAN_NOTA_ID, KD_PEL, SUB_UNIT, SERVICES_ID,
               NOMOR, TAGIHAN_PROJECT_ID, TAGIHAN_PROJECT, 
               TANGGAL, NO_NOTA, TANGGAL_NOTA, NO_FAKTUR, 
               KODE_BAYAR, TOTAL, STATUS_BATAL, 
               LAMPIRAN, CREATED_BY, CREATED_DATE, 
               UPDATED_BY, UPDATED_DATE, METODE_PEMBAYARAN, KETERANGAN, METODE_JURNAL, SISA_TAGIHAN, 
               BANK_PEMBAYARAN_ID, BANK_PEMBAYARAN, BANK_PEMBAYARAN_COA
            FROM PELUNASAN_NOTA A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM PELUNASAN_NOTA A WHERE 1=1 " . $statement;
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
