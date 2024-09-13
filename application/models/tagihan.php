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

class Tagihan extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function Offer()
    {
        $this->Entity();
    }

    function insert()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $this->setField("TAGIHAN_PROJECT_ID", $this->getSeqId("TAGIHAN_PROJECT_ID", "TAGIHAN_PROJECT"));

        $str = "INSERT INTO TAGIHAN_PROJECT(
                TAGIHAN_PROJECT_ID, SERVICES_ID, COMPANY_ID, PERIODE_TAGIHAN, NOMOR, TANGGAL, 
                NAMA, KETERANGAN, KETERANGAN_BILLING, NO_REF, PPN, PAJAK, MATERAI, TOTAL, LINK_FILE, LINK_LAMPIRAN, 
                COMPANY_DUE_DAYS, SERVICES_DUE_DAYS, 
                DUE_DAYS, DUE_DATE, METODE_PEMBAYARAN, DISKON, DISKON_PERSEN,
                DPP, NETT, KD_PEL, SUB_UNIT,
                PEGAWAI_ID_APPROVAL1, PEGAWAI_ID_APPROVAL2, CREATED_BY, CREATED_DATE )
			    VALUES (
			'" . $this->getField("TAGIHAN_PROJECT_ID") . "',
			'" . $this->getField("SERVICES_ID") . "',
			'" . $this->getField("COMPANY_ID") . "',
			'" . $this->getField("PERIODE_TAGIHAN") . "',
			'" . $this->getField("NOMOR") . "',
			 " . $this->getField("TANGGAL") . ",
			'" . $this->getField("NAMA") . "',
			'" . $this->getField("KETERANGAN") . "',
            '" . $this->getField("KETERANGAN_BILLING") . "',
			'" . $this->getField("NO_REF") . "',
			'" . $this->getField("PPN") . "',
			'" . $this->getField("PAJAK") . "',
			'" . $this->getField("MATERAI") . "',
			'" . $this->getField("TOTAL") . "',
			'" . $this->getField("LINK_FILE") . "',
			'" . $this->getField("LINK_LAMPIRAN") . "',
            '" . $this->getField("COMPANY_DUE_DAYS") . "', '" . $this->getField("SERVICES_DUE_DAYS") . "', 
            '" . $this->getField("DUE_DAYS") . "', " . $this->getField("DUE_DATE") . ", '" . $this->getField("METODE_PEMBAYARAN") . "',
            '" . $this->getField("DISKON") . "', '" . $this->getField("DISKON_PERSEN") . "',
            '" . $this->getField("DPP") . "', '" . $this->getField("NETT") . "',
            '" . $this->getField("KD_PEL") . "', '" . $this->getField("SUB_UNIT") . "',
            '" . $this->getField("PEGAWAI_ID_APPROVAL1") . "',
            '" . $this->getField("PEGAWAI_ID_APPROVAL2") . "',
			'" . $this->getField("CREATED_BY") . "',
			" . $this->getField("CREATED_DATE") . "
			)";

        $this->id = $this->getField("TAGIHAN_PROJECT_ID");
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }


    function update()
    {
        $str = "UPDATE TAGIHAN_PROJECT
				SET
                COMPANY_ID = '" . $this->getField("COMPANY_ID") . "',
                PERIODE_TAGIHAN = '" . $this->getField("PERIODE_TAGIHAN") . "',
                NOMOR = '" . $this->getField("NOMOR") . "',
                TANGGAL = " . $this->getField("TANGGAL") . ",
			    NAMA = '" . $this->getField("NAMA") . "',
                KETERANGAN_BILLING = '" . $this->getField("KETERANGAN_BILLING") . "',
                KETERANGAN = '" . $this->getField("KETERANGAN") . "',
                NO_REF = '" . $this->getField("NO_REF") . "',
                PPN = '" . $this->getField("PPN") . "',
                PAJAK = '" . $this->getField("PAJAK") . "',
                MATERAI = '" . $this->getField("MATERAI") . "',
                DISKON = '" . $this->getField("DISKON") . "',
                DISKON_PERSEN = '" . $this->getField("DISKON_PERSEN") . "',
                DPP = '" . $this->getField("DPP") . "',
                NETT = '" . $this->getField("NETT") . "',
                TOTAL = '" . $this->getField("TOTAL") . "',
                LINK_FILE = '" . $this->getField("LINK_FILE") . "',
                LINK_LAMPIRAN = '" . $this->getField("LINK_LAMPIRAN") . "',
                PEGAWAI_ID_APPROVAL1 = '" . $this->getField("PEGAWAI_ID_APPROVAL1") . "',
                PEGAWAI_ID_APPROVAL2 = '" . $this->getField("PEGAWAI_ID_APPROVAL2") . "',
                COMPANY_DUE_DAYS = '" . $this->getField("COMPANY_DUE_DAYS") . "',
                SERVICES_DUE_DAYS = '" . $this->getField("SERVICES_DUE_DAYS") . "',
                DUE_DAYS = '" . $this->getField("DUE_DAYS") . "',
                DUE_DATE = " . $this->getField("DUE_DATE") . ",
                METODE_PEMBAYARAN = '" . $this->getField("METODE_PEMBAYARAN") . "',
                UPDATED_BY = '" . $this->getField("UPDATED_BY") . "',
                UPDATED_DATE = " . $this->getField("UPDATED_DATE") . "
                WHERE TAGIHAN_PROJECT_ID = " . $this->getField("TAGIHAN_PROJECT_ID") . "
			 ";
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }



    function updateByField()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $str = "UPDATE OFFER A SET
				  " . $this->getField("FIELD") . " = '" . $this->getField("FIELD_VALUE") . "'
				WHERE OFFER_ID = " . $this->getField("OFFER_ID") . "
				";
        $this->query = $str;

        return $this->execQuery($str);
    }


    function validasi()
    {
        $str = "UPDATE PEGAWAI
				SET 
				VALIDASI='" . $this->getField("VALIDASI") . "',
				UPDATED_BY='" . $this->getField("UPDATED_BY") . "',
				UPDATED_DATE=CURRENT_DATE
				WHERE  PEGAWAI_ID = " . $this->getField("PEGAWAI_ID") . "
			 ";
        $this->query = $str;
        // echo $str;exit;
        return $this->execQuery($str);
    }



    function validasiSetuju()
    {
        $str = "UPDATE PEGAWAI
				SET 
                    VALIDASI='" . $this->getField("VALIDASI") . "',
                    NO_SEKAR	= (SELECT MAX(NO_SEKAR::INT) + 1 FROM PEGAWAI)::text,
                    UPDATED_BY='" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE=CURRENT_DATE
				WHERE  PEGAWAI_ID = " . $this->getField("PEGAWAI_ID") . "
			 ";
        $this->query = $str;
        // echo $str;exit;
        return $this->execQuery($str);
    }




    function koreksi()
    {
        $str = "UPDATE PEGAWAI
				SET 
				NRP='" . $this->getField("NRP") . "',
				NIP='" . $this->getField("NIP") . "',
				UPDATED_BY='" . $this->getField("UPDATED_BY") . "',
				UPDATED_DATE=CURRENT_DATE
				WHERE  PEGAWAI_ID = " . $this->getField("PEGAWAI_ID") . "
			 ";
        $this->query = $str;
        // echo $str;exit;
        return $this->execQuery($str);
    }


    function updateProfil()
    {
        $str = "UPDATE PEGAWAI
				SET 
                    NAMA='" . $this->getField("NAMA") . "',
                    NAMA_PANGGILAN='" . $this->getField("NAMA_PANGGILAN") . "',
                    TEMPAT_LAHIR='" . $this->getField("TEMPAT_LAHIR") . "',
                    TANGGAL_LAHIR= " . $this->getField("TANGGAL_LAHIR") . ",
                    ALAMAT='" . $this->getField("ALAMAT") . "',
                    NOMOR_HP='" . $this->getField("NOMOR_HP") . "',
                    EMAIL_PRIBADI='" . $this->getField("EMAIL_PRIBADI") . "',
                    EMAIL_BULOG='" . $this->getField("EMAIL_BULOG") . "',
                    NOMOR_WA='" . $this->getField("NOMOR_WA") . "',
                    CABANG_ID='" . $this->getField("CABANG_ID") . "',
                    UNIT_KERJA='" . $this->getField("UNIT_KERJA") . "',
                    GOLONGAN_DARAH='" . $this->getField("GOLONGAN_DARAH") . "',
                    UPDATED_BY='" . $this->getField("UPDATED_BY") . "',
                    UPDATED_DATE=CURRENT_DATE
				WHERE  NIP = '" . $this->getField("NIP") . "'
			 ";
        $this->query = $str;
        //echo $str;exit;
        return $this->execQuery($str);
    }


    function updateFoto()
    {
        $str = "UPDATE PEGAWAI
				SET   FOTO = '" . $this->getField("FOTO") . "'
				WHERE  NIP = '" . $this->getField("NIP") . "'
			 ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function updateLinkPegawai()
    {
        $str = "UPDATE PEGAWAI
				SET   	   LINK_FILE        = '" . $this->getField("LINK_FILE") . "'
				WHERE  PEGAWAI_ID = '" . $this->getField("PEGAWAI_ID") . "'
			 ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function updateDetil()
    {
        $str = "UPDATE PEGAWAI_DETIL
				SET   	   NAMA        = '" . $this->getField("NAMA") . "'
				WHERE  PEGAWAI_DETIL_ID = '" . (int) $this->getField("PEGAWAI_DETIL_ID") . "'
			 ";
        $this->query = $str;
        return $this->execQuery($str);
    }

    function update_dokument()
    {
        $str = "UPDATE OFFER
                SET    
                    DOCUMENT_ID ='" . $this->getField("DOCUMENT_ID") . "'
       
        
        WHERE OFFER_ID= '" . $this->getField("OFFER_ID") . "'";
        $this->query = $str;
        // echo $str;exit;
        return $this->execQuery($str);
    }

    function delete()
    {
        $str = "DELETE 
                FROM TAGIHAN_PROJECT
                WHERE TAGIHAN_PROJECT_ID = '" . $this->getField("TAGIHAN_PROJECT_ID") . "'";

        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }

    /** 
     * Cari record berdasarkan array parameter dan limit tampilan 
     * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
     * @param int limit Jumlah maksimal record yang akan diambil 
     * @param int from Awal record yang diambil 
     * @return boolean True jika sukses, false jika tidak 
     **/
    function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY TAGIHAN_PROJECT_ID ASC")
    {
        $str = "SELECT A.TAGIHAN_PROJECT_ID, A.SERVICES_ID, A.SERVICES, A.COMPANY_ID, A.COMPANY, 
                        A.COMPANY_KODE, A.COMPANY_NPWP, A.COMPANY_ALAMAT,
                        A.PERIODE_TAGIHAN, A.NOMOR, A.TANGGAL, A.NAMA, A.KETERANGAN, A.NO_REF, 
                        A.PPN, A.PAJAK, A.TOTAL, A.LINK_FILE, A.LINK_LAMPIRAN, A.POSTING, A.POSTING_DATE, A.PEGAWAI_ID_APPROVAL1, A.PEGAWAI_ID_APPROVAL2, A.APPROVAL1, A.APPROVAL2, 
                        A.PENGGUNA_ID_APPROVAL, A.APPROVAL_PENGGUNA, A.PEGAWAI_NAMA_APPROVAL1, A.PEGAWAI_NAMA_APPROVAL2, A.PEGAWAI_JABATAN_APPROVAL1, A.PEGAWAI_JABATAN_APPROVAL2, 
                        A.APPROVAL1_ALASAN, A.APPROVAL2_ALASAN, A.CREATED_BY, A.CREATED_DATE, A.UPDATED_BY, A.UPDATED_DATE, A.MATERAI, A.SERVICES AS JASA, A.COMPANY AS PELANGGAN,
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
                            WHEN A.POSTING = 'JURNAL_PENJUALAN' THEN 'Nota Penjualan Terbit'
                            WHEN A.POSTING = 'LUNAS' THEN 'Lunas'
                            WHEN A.POSTING = 'BATAL' THEN 'Dibatalkan dengan alasan ' || A.STATUS_BATAL_ALASAN
                        ELSE
                         'Draft'
                        END POSTING_DESC, A.NO_NOTA, A.NO_FAKTUR, A.NO_JURNAL_JPJ, A.TANGGAL_NOTA,
                        A.BANK_ID, A.BANK, A.BANK_REKENING, A.METODE_PEMBAYARAN, A.GL_AKUN_PIUTANG, A.GL_NAMA_PIUTANG, A.PROFIT_CENTER,
                        A.DUE_DAYS, A.DUE_DATE, A.COMPANY_DUE_DAYS, A.SERVICES_DUE_DAYS,
                        A.PEGAWAI_ID_FINANCE, A.PEGAWAI_NAMA_FINANCE, A.PEGAWAI_JABATAN_FINANCE, A.APPROVAL_FINANCE, A.APPROVAL_FINANCE_ALASAN,
                        A.STATUS_BATAL_ALASAN, A.DISKON_PERSEN, A.DISKON, A.DPP, A.NETT, A.KETERANGAN_BILLING,
                        A.STATUS_BAYAR, A.STATUS_BAYAR_TANGGAL, A.KODE_BAYAR,
                        CASE WHEN DUE_DATE > SYSDATE THEN 0 ELSE (TRUNC(SYSDATE) - DUE_DATE) + 1 END AGING_PIUTANG,
                        A.NOMOR_SAP, A.REC_STAT, A.METODE_PELUNASAN, A.CREATED_BY_NAMA, A.CREATED_BY_JABATAN
                FROM TAGIHAN_PROJECT A
                WHERE 1=1
				";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $statement . ' ' . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }


    function selectByParamsInvoiceHeader($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY ORDER_NO ASC")
    {
        $str = "SELECT 
                    ORDER_NO, INVOICE_NO, NO_EPB, 
                       NO_FAKTUR, EPB_COUNT, ORDER_SERVICE_CODE, 
                       EXPORT_IMPORT_TRANS, OCEAN_INTERISLAND, A.CUSTOMER, 
                       A.AGENT, NPWP_CUSTOMER, BL_NO, 
                       DO_NO, PEB_EXP_NO, PIB_IMP_NO, 
                       VESSEL_ID, VOY_CODE, ACTIVE_FROM_DT, 
                       ACTIVE_TO_DT, FIRST_ACTIVE_FROM_DT, EXTEND_FROM_DT, 
                       EXTEND_TO_DT, PERCENT_PPN, PPN_SUBSIDY, 
                       CURRENCY, ADM_AMOUNT, PPN_AMOUNT, 
                       TOTAL_AMOUNT, MATERIAL_AMOUNT, SISA_PIUTANG_AMOUNT, 
                       PERCENT_DISCOUNT, DISCOUNT_AMOUNT, PPN_SUBSIDY_AMOUNT, 
                       INVOICE_AMOUNT, DANGEROUS_YN, DANGEROUS_LABLE_YN, 
                       REEFER_FROM_DT, REEFER_TO_DT, FL_20, 
                       FL_40, FL_45, MT_20, 
                       MT_40, MT_45, RF_20, 
                       RF_40, RF_45, OH_20, 
                       OH_40, OH_45, FL_CHS_20, 
                       FL_CHS_40, FL_CHS_45, MT_CHS_20, 
                       MT_CHS_40, MT_CHS_45, MT_RF_20, 
                       MT_RF_40, MT_RF_45, INVOICE_TYPE, 
                       KR_MASA_1, KR_MASA_2, KR_MASA_3, 
                       CTPS_YN, REMARK, PAYMENT_YN, 
                       A.PAYMENT_TIME, A.UPDATE_TIME, A.USERID, 
                       UC_20, UC_40, UC_45, 
                       TARIFF_CODE, JPJ, JKM, 
                       GL_CODE, JENIS_PEMBAYARAN, JENIS_DOC, 
                       TGL_DOC, DO_EXPIRED, MATERAI_AMOUNT, 
                       CUSTOMER_PENGURUS, CREATED_DATE, CREATED_USERID, 
                       FL_20_DG, FL_40_DG, FL_45_DG, 
                       RF_20_DG, RF_40_DG, RF_45_DG, 
                       OH_20_DG, OH_40_DG, OH_45_DG, 
                       FL_CHS_20_DG, FL_CHS_40_DG, FL_CHS_45_DG, 
                       TOTAL_BOOKING, JAMINAN_AMOUNT, A.BANK_CD, 
                       ORDER_NO_PREV, PREV_INVOICE_NO, TRIM(B.FULL_NAME) PELANGGAN,
                       B.ADDR1 PELANGGAN_ALAMAT,
                       B.TAX_NO_NPWP PELANGGAN_NPWP,
                       A.CREATED_DATE + INTERVAL '3' DAY DUE_DATE
                    FROM INVOICE_HEADER A
                    LEFT JOIN CUSTOMER B ON TRIM(A.CUSTOMER) = TRIM(B.CUSTOMER)
                WHERE 1=1
                ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $statement . ' ' . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function selectByParamsInvoiceDetail($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY ORDER_NO ASC")
    {
        $str = "SELECT 
                    ORDER_NO, INVOICE_NO, JOURNAL_CODE, 
                       JOURNAL_DESC, JUMLAH_DIBAYAR, CURRENCY, 
                       BOXES, SIZES, TYPES, 
                       STATUS, HAZ_NONHAZ, BASIC_RATES, 
                       MASA_MASA, UPDATE_TIME, JPJ, 
                       JKM, GL_CODE, NO_EPB, 
                       JUMLAH_DIBAYAR_USD, KURS
                    FROM INVOICE_DETAILS A
                WHERE 1=1
                ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $statement . ' ' . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function selectByParamsCetakNotaAll($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY TANGGAL_NOTA ASC")
    {
        $str = "SELECT 
                TAGIHAN_ID, LINK_PRANOTA, LINK_INVOICE, 
                   SERVICES, SERVICES_ID,
                   NO_PRANOTA, NO_INVOICE, TANGGAL_NOTA, 
                   KODE_BAYAR, NOMOR_SAP, NO_FAKTUR, 
                   KETERANGAN, PELANGGAN, TOTAL, TOTAL_TAGIHAN, 
                   REC_STAT, TOTAL_PELUNASAN, SISA_TAGIHAN, DUE_DATE, TO_CHAR(A.TANGGAL_NOTA, 'MMYYYY') PERIODE
                FROM TAGIHAN_CETAK_NOTA A
                WHERE 1=1
                ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $statement . ' ' . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function selectByParamsPerusahaanTagihan($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY PELANGGAN ASC")
    {
        $str = "SELECT 
                DISTINCT PELANGGAN, PELANGGAN_KODE
                FROM TAGIHAN_CETAK_NOTA A
                WHERE 1=1
                ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $statement . ' ' . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function selectByParamsPajak($paramsArray=array(),$limit=-1,$from=-1,$statement="", $order=" ORDER BY TAGIHAN_PROJECT_PAJAK_ID ASC ")
    {
        $str = "
                SELECT TAGIHAN_PROJECT_PAJAK_ID, TAGIHAN_PROJECT_ID, JENIS_PAJAK_ID, 
                       JENIS_PAJAK_PERSEN_ID, KD_BUKU_BESAR, PERSEN, NAMA, KETERANGAN, 
                       DPP, TOTAL, CREATED_BY, CREATED_DATE, UPDATED_BY, UPDATED_DATE
                  FROM TAGIHAN_PROJECT_PAJAK A
                  WHERE 1 = 1
            ";

        while(list($key,$val) = each($paramsArray))
        {
            $str .= " AND $key = '$val' ";
        }

        $str .= $statement." ".$order;
        $this->query = $str;

        return $this->selectLimit($str,$limit,$from);
    }



    function selectByParamsPranotaTagihan($paramsArray=array(),$limit=-1,$from=-1,$statement="", $order=" ORDER BY TANGGAL_NOTA DESC ")
    {
        $str = "
                SELECT 
                    LINK_INVOICE, LINK_PRANOTA, TAGIHAN_ID, 
                       KD_PEL, SUB_UNIT, POSTING, 
                       SERVICES_ID, SERVICES, NO_PRANOTA, 
                       NO_INVOICE, TANGGAL_PRANOTA, TANGGAL_NOTA, KODE_BAYAR, 
                       NOMOR_SAP, NO_FAKTUR, KETERANGAN, 
                       PELANGGAN_KODE, PELANGGAN, TOTAL, 
                       TOTAL_TAGIHAN, TOTAL_PPH23, REC_STAT, 
                       TOTAL_PELUNASAN, SISA_TAGIHAN, DUE_DATE, 
                       POSTING_DESC
                    FROM PRANOTA_TAGIHAN A
                  WHERE 1 = 1
            ";

        while(list($key,$val) = each($paramsArray))
        {
            $str .= " AND $key = '$val' ";
        }

        $str .= $statement." ".$order;
        $this->query = $str;

        return $this->selectLimit($str,$limit,$from);
    }



    function getCountByParamsPranotaTagihan($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM PRANOTA_TAGIHAN A
                WHERE 1 = 1 ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str = $str . ' ' . $statement;
        $this->query = $str;
        // exit;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }



    function getCountByParamsCetakNotaAll($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM TAGIHAN_CETAK_NOTA A
                WHERE 1 = 1 ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str = $str . ' ' . $statement;
        $this->query = $str;
        // exit;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }


    function getCountByParams($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(TAGIHAN_PROJECT_ID) AS ROWCOUNT FROM TAGIHAN_PROJECT A
		        WHERE TAGIHAN_PROJECT_ID IS NOT NULL ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str = $str . ' ' . $statement;
        $this->query = $str;
        // exit;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }


    function getCountByParamsInvoiceHeader($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(ORDER_NO) AS ROWCOUNT FROM INVOICE_HEADER A
                    LEFT JOIN CUSTOMER B ON TRIM(A.CUSTOMER) = TRIM(B.CUSTOMER) 
                WHERE 1=1 ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str = $str . ' ' . $statement;
        $this->query = $str;
        // exit;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }

    function getCountByParamsLike($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(PEGAWAI_ID) AS ROWCOUNT FROM PEGAWAI

		        WHERE PEGAWAI_ID IS NOT NULL " . $statement;
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key LIKE '%$val%' ";
        }

        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }
}
