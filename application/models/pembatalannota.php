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

class PembatalanNota extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function PembatalanNota()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("PEMBATALAN_NOTA_ID", $this->getSeqId("PEMBATALAN_NOTA_ID", "PEMBATALAN_NOTA"));

        $str = "INSERT INTO PEMBATALAN_NOTA 
                (PEMBATALAN_NOTA_ID, TAGIHAN_PROJECT_ID, ALASAN_BATAL, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, LAMPIRAN, CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("PEMBATALAN_NOTA_ID") . "',
                '" . $this->getField("TAGIHAN_PROJECT_ID") . "',
                '" . $this->getField("ALASAN_BATAL") . "',
                '" . $this->getField("PEGAWAI_ID_APPROVAL1") . "',
                '" . $this->getField("PEGAWAI_ID_APPROVAL2") . "',
                '" . $this->getField("LAMPIRAN") . "',
                '" . $this->getField("CREATED_BY") . "',
                SYSDATE
                )
                ";

        $this->id = $this->getField("PEMBATALAN_NOTA_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE PEMBATALAN_NOTA
                SET    
                    ALASAN_BATAL = '" . $this->getField("ALASAN_BATAL") . "',
                    LAMPIRAN     = '" . $this->getField("LAMPIRAN") . "',
                    UPDATED_BY   = '" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE = SYSDATE
                WHERE PEMBATALAN_NOTA_ID = '" . $this->getField("PEMBATALAN_NOTA_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM PEMBATALAN_NOTA
                 WHERE PEMBATALAN_NOTA_ID= '" . $this->getField("PEMBATALAN_NOTA_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.PEMBATALAN_NOTA_ID ASC")
    {
        $str = "SELECT 
                    PEMBATALAN_NOTA_ID, NOMOR, TAGIHAN_PROJECT_ID, TAGIHAN_PROJECT,
                       NO_NOTA, NO_FAKTUR, ALASAN_BATAL,  TANGGAL,
                       LAMPIRAN, KD_PEL, SUB_UNIT, 
                       POSTING, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, 
                       PEGAWAI_NAMA_APPROVAL1, PEGAWAI_NAMA_APPROVAL2, PEGAWAI_JABATAN_APPROVAL1, 
                       PEGAWAI_JABATAN_APPROVAL2, APPROVAL1, APPROVAL2, 
                       APPROVAL1_ALASAN, APPROVAL2_ALASAN, PEGAWAI_ID_FINANCE, 
                       PEGAWAI_NAMA_FINANCE, PEGAWAI_JABATAN_FINANCE, APPROVAL_FINANCE, 
                       APPROVAL_FINANCE_ALASAN, CREATED_BY, CREATED_DATE, 
                       UPDATED_BY, UPDATED_DATE,
                        CASE 
                            WHEN A.POSTING = 'POSTING' THEN 'Persetujuan Atasan'
                            WHEN A.POSTING = 'APPROVE' THEN 'Disetujui'
                            WHEN A.POSTING = 'REVISI' THEN  'Terdapat revisi ' || NVL(A.APPROVAL2_ALASAN, A.APPROVAL1_ALASAN)
                            WHEN A.POSTING = 'KEUANGAN' THEN 'Persetujuan Keuangan'
                            WHEN A.POSTING = 'KEUANGAN_REVISI' THEN  'Terdapat revisi oleh Keuangan ' || A.APPROVAL_FINANCE_ALASAN
                            WHEN A.POSTING = 'JURNAL_PEMBATALAN' THEN 'Transaksi Batal'
                        ELSE
                         'Draft'
                        END POSTING_DESC
                    FROM PEMBATALAN_NOTA A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM PEMBATALAN_NOTA A WHERE 1=1 " . $statement;
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
