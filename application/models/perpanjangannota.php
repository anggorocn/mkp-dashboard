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

class PerpanjanganNota extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function PerpanjanganNota()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("PERPANJANGAN_NOTA_ID", $this->getSeqId("PERPANJANGAN_NOTA_ID", "PERPANJANGAN_NOTA"));

        $str = "INSERT INTO PERPANJANGAN_NOTA 
                (PERPANJANGAN_NOTA_ID, TAGIHAN_PROJECT_ID, SERVICES_ID, ALASAN_PERPANJANGAN, PERPANJANGAN_DUE_DAYS, DUE_DATE_AFTER, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, LAMPIRAN, 
                    NO_REF, JENIS_DOKUMEN_REF, PERIHAL_REF, TANGGAL_REF,
                    CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("PERPANJANGAN_NOTA_ID") . "',
                '" . $this->getField("TAGIHAN_PROJECT_ID") . "',
                '" . $this->getField("SERVICES_ID") . "',
                '" . $this->getField("ALASAN_PERPANJANGAN") . "',
                '" . $this->getField("PERPANJANGAN_DUE_DAYS") . "',
                " . $this->getField("DUE_DATE_AFTER") . ",
                '" . $this->getField("PEGAWAI_ID_APPROVAL1") . "',
                '" . $this->getField("PEGAWAI_ID_APPROVAL2") . "',
                '" . $this->getField("LAMPIRAN") . "',
                '" . $this->getField("NO_REF") . "', '" . $this->getField("JENIS_DOKUMEN_REF") . "', 
                '" . $this->getField("PERIHAL_REF") . "', " . $this->getField("TANGGAL_REF") . ",
                '" . $this->getField("CREATED_BY") . "',
                SYSDATE
                )
                ";

        $this->id = $this->getField("PERPANJANGAN_NOTA_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE PERPANJANGAN_NOTA
                SET    
                    ALASAN_PERPANJANGAN = '" . $this->getField("ALASAN_PERPANJANGAN") . "',
                    PERPANJANGAN_DUE_DAYS = '" . $this->getField("PERPANJANGAN_DUE_DAYS") . "',
                    DUE_DATE_AFTER = " . $this->getField("DUE_DATE_AFTER") . ",
                    LAMPIRAN     = '" . $this->getField("LAMPIRAN") . "',
                    NO_REF     = '" . $this->getField("NO_REF") . "',
                    JENIS_DOKUMEN_REF     = '" . $this->getField("JENIS_DOKUMEN_REF") . "',
                    PERIHAL_REF     = '" . $this->getField("PERIHAL_REF") . "',
                    TANGGAL_REF     = " . $this->getField("TANGGAL_REF") . ",
                    UPDATED_BY   = '" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE = SYSDATE
                WHERE PERPANJANGAN_NOTA_ID = '" . $this->getField("PERPANJANGAN_NOTA_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }


    function delete($statement = "")
    {
        $str = "DELETE FROM PERPANJANGAN_NOTA
                 WHERE PERPANJANGAN_NOTA_ID= '" . $this->getField("PERPANJANGAN_NOTA_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.PERPANJANGAN_NOTA_ID ASC")
    {
        $str = "SELECT 
                    PERPANJANGAN_NOTA_ID, KD_PEL, SUB_UNIT, 
                       NOMOR, TANGGAL, TAGIHAN_PROJECT_ID, 
                       TAGIHAN_PROJECT, SERVICES_ID, SERVICES, 
                       COMPANY_ID, COMPANY, COMPANY_KODE, 
                       NO_NOTA, NO_FAKTUR, TOTAL, 
                       DUE_DAYS, PERPANJANGAN_DUE_DAYS, TOTAL_DUE_DAYS, 
                       DUE_DATE_BEFORE, DUE_DATE_AFTER, TANGGAL_PERPANJANGAN, 
                       ALASAN_PERPANJANGAN, LAMPIRAN, POSTING, 
                       PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, PEGAWAI_NAMA_APPROVAL1, 
                       PEGAWAI_NAMA_APPROVAL2, PEGAWAI_JABATAN_APPROVAL1, PEGAWAI_JABATAN_APPROVAL2, 
                       APPROVAL1, APPROVAL2, APPROVAL1_ALASAN, 
                       APPROVAL2_ALASAN, PEGAWAI_ID_FINANCE, PEGAWAI_NAMA_FINANCE, 
                       PEGAWAI_JABATAN_FINANCE, APPROVAL_FINANCE, APPROVAL_FINANCE_ALASAN, 
                       CREATED_BY, CREATED_DATE, UPDATED_BY, 
                       UPDATED_DATE, POSTING_DATE, TANGGAL_NOTA, 
                        CASE 
                            WHEN A.POSTING = 'POSTING' THEN 
                                CASE 
                                    WHEN A.APPROVAL1 IS NULL THEN 'Menunggu persetujuan ' || A.PEGAWAI_NAMA_APPROVAL1
                                    WHEN A.APPROVAL1 = 'T' THEN 'Ditolak oleh ' || A.PEGAWAI_NAMA_APPROVAL1 || ' dengan alasan ' || A.APPROVAL1_ALASAN
                                    WHEN A.APPROVAL2 IS NULL THEN 'Menunggu persetujuan ' || A.PEGAWAI_NAMA_APPROVAL2
                                    WHEN A.APPROVAL2 = 'T' THEN 'Ditolak oleh ' || A.PEGAWAI_NAMA_APPROVAL2 || ' dengan alasan ' || A.APPROVAL2_ALASAN
                                END
                            WHEN A.POSTING = 'APPROVE' THEN 'Disetujui'
                            WHEN A.POSTING = 'REVISI' THEN  'Terdapat revisi ' || NVL(A.APPROVAL2_ALASAN, A.APPROVAL1_ALASAN)
                        ELSE
                         'Draft'
                        END POSTING_DESC,
                        NO_REF, JENIS_DOKUMEN_REF, PERIHAL_REF, TANGGAL_REF
                    FROM PERPANJANGAN_NOTA A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM PERPANJANGAN_NOTA A WHERE 1=1 " . $statement;
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
