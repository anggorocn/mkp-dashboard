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

class TagihanManfee extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function TagihanManfee()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("TAGIHAN_MANFEE_ID", $this->getSeqId("TAGIHAN_MANFEE_ID", "TAGIHAN_MANFEE"));

        $str = "INSERT INTO TAGIHAN_MANFEE 
                (TAGIHAN_MANFEE_ID, KD_PEL, SUB_UNIT, TANGGAL, PERIODE, KETERANGAN, PEGAWAI_ID_FINANCE, PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, LAMPIRAN, CREATED_BY, CREATED_DATE)
                VALUES (
                '" . $this->getField("TAGIHAN_MANFEE_ID") . "',
                '" . $this->getField("KD_PEL") . "',
                '" . $this->getField("SUB_UNIT") . "',
                " . $this->getField("TANGGAL") . ",
                '" . $this->getField("PERIODE") . "',
                '" . $this->getField("KETERANGAN") . "',
                '" . $this->getField("PEGAWAI_ID_FINANCE") . "',
                '" . $this->getField("PEGAWAI_ID_APPROVAL1") . "',
                '" . $this->getField("PEGAWAI_ID_APPROVAL2") . "',
                '" . $this->getField("LAMPIRAN") . "',
                '" . $this->getField("CREATED_BY") . "',
                SYSDATE
                )
                ";

        $this->id = $this->getField("TAGIHAN_MANFEE_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE TAGIHAN_MANFEE
                SET    
                    TANGGAL      = " . $this->getField("TANGGAL") . ",
                    KETERANGAN   = '" . $this->getField("KETERANGAN") . "',
                    LAMPIRAN     = '" . $this->getField("LAMPIRAN") . "',
                    UPDATED_BY   = '" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE = SYSDATE
                WHERE TAGIHAN_MANFEE_ID = '" . $this->getField("TAGIHAN_MANFEE_ID") . "'
                ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete($statement = "")
    {
        $str = "DELETE FROM TAGIHAN_MANFEE
                 WHERE TAGIHAN_MANFEE_ID= '" . $this->getField("TAGIHAN_MANFEE_ID") . "'";
        $this->query = $str;
        // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.TAGIHAN_MANFEE_ID ASC")
    {
        $str = "SELECT 
                        TAGIHAN_MANFEE_ID, KD_PEL, SUB_UNIT, 
                           SERVICES_ID, SERVICES, COMPANY_ID, 
                           COMPANY, COMPANY_KODE, COMPANY_NPWP, 
                           COMPANY_ALAMAT, NOMOR, TANGGAL, KODE_BAYAR,
                           PERIODE, KETERANGAN, NO_FAKTUR, 
                           TOTAL, PENDAPATAN, PNPB, 
                           MAN_FEE, MAN_FEE_PPN, MAN_FEE_MATERAI, 
                           MAN_FEE_TOTAL, LAMPIRAN, POSTING, 
                           PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, PEGAWAI_NAMA_APPROVAL1, 
                           PEGAWAI_NAMA_APPROVAL2, PEGAWAI_JABATAN_APPROVAL1, PEGAWAI_JABATAN_APPROVAL2, 
                           APPROVAL1, APPROVAL2, APPROVAL1_ALASAN, 
                           APPROVAL2_ALASAN, PEGAWAI_ID_FINANCE, PEGAWAI_NAMA_FINANCE, 
                           PEGAWAI_JABATAN_FINANCE, APPROVAL_FINANCE, APPROVAL_FINANCE_ALASAN, 
                           CREATED_BY, CREATED_DATE, UPDATED_BY, 
                           UPDATED_DATE, POSTING_DATE, STATUS_BATAL, 
                           STATUS_BATAL_ALASAN, STATUS_BATAL_BY, STATUS_BATAL_DATE, 
                           STATUS_BAYAR, STATUS_BAYAR_TANGGAL, DUE_DAYS, 
                           DUE_DATE, 
                       CASE 
                            WHEN A.STATUS_BATAL = '1'  AND NOT A.POSTING = 'BATAL' THEN 'Proses pembatalan'
                             WHEN A.POSTING = 'POSTING' THEN 
                                CASE 
                                    WHEN A.APPROVAL1 IS NULL THEN 'Menunggu persetujuan ' || A.PEGAWAI_NAMA_APPROVAL1
                                    WHEN A.APPROVAL1 = 'T' THEN 'Ditolak oleh ' || A.PEGAWAI_NAMA_APPROVAL1 || ' dengan alasan ' || A.APPROVAL1_ALASAN
                                    WHEN A.APPROVAL2 IS NULL THEN 'Menunggu persetujuan ' || A.PEGAWAI_NAMA_APPROVAL2
                                    WHEN A.APPROVAL2 = 'T' THEN 'Ditolak oleh ' || A.PEGAWAI_NAMA_APPROVAL2 || ' dengan alasan ' || A.APPROVAL2_ALASAN
                                END
                            WHEN A.POSTING = 'APPROVE' THEN 'Disetujui'
                            WHEN A.POSTING = 'REVISI' THEN  'Terdapat revisi ' || NVL(A.APPROVAL2_ALASAN, A.APPROVAL1_ALASAN)
                            WHEN A.POSTING = 'KEUANGAN' THEN 'Persetujuan Keuangan'
                            WHEN A.POSTING = 'KEUANGAN_REVISI' THEN  'Terdapat revisi oleh Keuangan ' || A.APPROVAL_FINANCE_ALASAN
                            WHEN A.POSTING = 'LUNAS' THEN 'Lunas'
                            WHEN A.POSTING = 'BATAL' THEN 'Dibatalkan dengan alasan ' || A.STATUS_BATAL_ALASAN
                        ELSE
                         'Draft'
                        END POSTING_DESC, NOMOR_SAP, REC_STAT
                    FROM TAGIHAN_MANFEE A
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
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM TAGIHAN_MANFEE A WHERE 1=1 " . $statement;
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
