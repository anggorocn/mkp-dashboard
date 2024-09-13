
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

class TagihanDetil extends Entity
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
        $this->setField("TAGIHAN_PROJECT_DETIL_ID", $this->getSeqId("TAGIHAN_PROJECT_DETIL_ID", "TAGIHAN_PROJECT_DETIL"));

        $str = "INSERT INTO TAGIHAN_PROJECT_DETIL(
                TAGIHAN_PROJECT_DETIL_ID, TAGIHAN_PROJECT_ID, SERVICES_ID, SERVICES, SERVICES_DETIL_ID, KETERANGAN, KETERANGAN_TAMBAH, QTY, 
                SATUAN, HARGA_SATUAN, TOTAL, CREATED_BY, CREATED_DATE)
			    VALUES (
			'" . $this->getField("TAGIHAN_PROJECT_DETIL_ID") . "',
			'" . $this->getField("TAGIHAN_PROJECT_ID") . "',
            '" . $this->getField("SERVICES_ID") . "',
            '" . $this->getField("SERVICES") . "',
			'" . $this->getField("SERVICES_DETIL_ID") . "',
			'" . $this->getField("KETERANGAN") . "',
            '" . $this->getField("KETERANGAN_TAMBAH") . "',
			'" . $this->getField("QTY") . "',
			'" . $this->getField("SATUAN") . "',
			'" . $this->getField("HARGA_SATUAN") . "',
			'" . $this->getField("TOTAL") . "',
			'" . $this->getField("CREATED_BY") . "',
			" . $this->getField("CREATED_DATE") . "
			)";

        $this->id = $this->getField("TAGIHAN_PROJECT_DETIL_ID");
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }


    function update()
    {
        $str = "UPDATE TAGIHAN_PROJECT_DETIL
				SET
                TAGIHAN_PROJECT_ID = '" . $this->getField("TAGIHAN_PROJECT_ID") . "',
                KETERANGAN = '" . $this->getField("KETERANGAN") . "',
                KETERANGAN_TAMBAH = '" . $this->getField("KETERANGAN_TAMBAH") . "',
                QTY = '" . $this->getField("QTY") . "',
                SATUAN = '" . $this->getField("SATUAN") . "',
                HARGA_SATUAN = '" . $this->getField("HARGA_SATUAN") . "',
                TOTAL = '" . $this->getField("TOTAL") . "',
                UPDATED_BY = '" . $this->getField("UPDATED_BY") . "',
                UPDATED_DATE = " . $this->getField("UPDATED_DATE") . "
                WHERE TAGIHAN_PROJECT_DETIL_ID = " . $this->getField("TAGIHAN_PROJECT_DETIL_ID") . "
			 ";
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }

    function delete()
    {
        $str = "DELETE 
                FROM TAGIHAN_PROJECT_DETIL
                WHERE TAGIHAN_PROJECT_DETIL_ID = '" . $this->getField("TAGIHAN_PROJECT_DETIL_ID") . "'";

        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }

    function deleteParent()
    {
        $str = "DELETE 
                FROM TAGIHAN_PROJECT_DETIL
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
        $str = "SELECT A.TAGIHAN_PROJECT_DETIL_ID, A.TAGIHAN_PROJECT_ID, A.SERVICES_ID, A.SERVICES_DETIL_ID, A.SERVICES, A.PPN, A.KETERANGAN, A.KETERANGAN_TAMBAH, A.QTY, A.SATUAN, A.HARGA_SATUAN, A.PAJAK, 
                A.TOTAL, A.CREATED_BY, A.CREATED_DATE, A.UPDATED_BY, A.UPDATED_DATE
                FROM TAGIHAN_PROJECT_DETIL A
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


    function selectByParamsInvoiceDetail($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.ORDER_NO ASC")
    {
        $str = "SELECT  
                    A.ORDER_NO, INVOICE_NO, JOURNAL_CODE, 
                       JOURNAL_DESC, JUMLAH_DIBAYAR, CURRENCY, 
                       BOXES, SIZES, TYPES, 
                       STATUS, HAZ_NONHAZ, BASIC_RATES, 
                       MASA_MASA, A.UPDATE_TIME, JPJ, 
                       JKM, GL_CODE, NO_EPB, 
                       JUMLAH_DIBAYAR_USD, KURS
                    FROM INVOICE_DETAILS A
                    INNER JOIN 
                    (SELECT ORDER_NO ORDERS_NO, MAX(UPDATE_TIME) UPDATE_TIME FROM INVOICE_DETAILS GROUP BY ORDER_NO) B ON A.ORDER_NO = B.ORDERS_NO AND A.UPDATE_TIME = B.UPDATE_TIME
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


    function selectByParamsTCSDetail($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.GATE_IN_TIME ASC")
    {
        $str = "SELECT 
                ORDER_NO, INVOICE_NO, NO_EPB, 
                   CUSTOMER, CUSTOMER_NAME, DPP_AMOUNT, 
                   PPN_AMOUNT, MATERAI_AMOUNT, INVOICE_AMOUNT, 
                   CONTAINER_NO, CTR_SIZE, CTR_TYPE, 
                   CTR_STATUS, TRUCK_ID, DRIVER_NAME, 
                   TO_CHAR(A.GATE_IN_TIME, 'DD-MM-YYYY HH24:MI:SS') GATE_IN_TIME, TO_CHAR(A.GATE_OUT_TIME, 'DD-MM-YYYY HH24:MI:SS') GATE_OUT_TIME, AMOUNT
                FROM TCS_CONTAINER_CHARGES A
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



    function selectByParamsEntriService($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_DETIL_ID ASC")
    {
        $str = "SELECT A.SERVICES_DETIL_ID, A.NAMA, A.SATUAN, TARIF
                FROM SERVICES_DETIL A
                LEFT JOIN SERVICES_TARIF_DETIL B ON A.SERVICES_ID = B.SERVICES_ID AND A.SERVICES_DETIL_ID = B.SERVICES_DETIL_ID 
                        AND TRUNC(SYSDATE) BETWEEN B.TANGGAL_AWAL AND B.TANGGAL_AKHIR
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
