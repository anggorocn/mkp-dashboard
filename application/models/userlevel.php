
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

class UserLevel extends Entity
{

    var $query;
    /**
     * Class constructor.
     **/
    function UserLevel()
    {
        $this->Entity();
    }

    function insert()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $this->setField("USER_LEVEL_ID", $this->getNextId("USER_LEVEL_ID", "USER_LEVEL"));

        $str = "INSERT INTO USER_LEVEL (
                   USER_LEVEL_ID, NAMA, TRANSAKSI, 
                   PELUNASAN, LOCKING_PIUTANG, REPORT, 
                   DASHBOARD, MASTER_DATA, VIEW_ALL_TRANS, 
                   KODE, PRANOTA, CETAK_NOTA, 
                   INQUIRY_BANK, SERVICES_ID_ACCESS) 
			    VALUES (
                " . $this->getField("USER_LEVEL_ID") . ",
                '" . $this->getField("NAMA") . "',
                '" . $this->getField("TRANSAKSI") . "',
                '" . $this->getField("PELUNASAN") . "',
                '" . $this->getField("LOCKING_PIUTANG") . "',
                '" . $this->getField("REPORT") . "',
                '" . $this->getField("DASHBOARD") . "',
                '" . $this->getField("MASTER_DATA") . "',
                '" . $this->getField("VIEW_ALL_TRANS") . "',
                '" . $this->getField("KODE") . "',
                '" . $this->getField("PRANOTA") . "',
                '" . $this->getField("CETAK_NOTA") . "',
                '" . $this->getField("INQUIRY_BANK") . "',
                '" . $this->getField("SERVICES_ID_ACCESS") . "'
                )";

        $this->id = $this->getField("USER_LEVEL_ID");
        $this->query = $str;
        // echo $str;
        // exit;

        return $this->execQuery($str);
    }

    function updateByField()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $str = "UPDATE PEGAWAI A SET
				  " . $this->getField("FIELD") . " = '" . $this->getField("FIELD_VALUE") . "',
						   LAST_UPDATED_USER  = '" . $this->getField("LAST_UPDATED_USER") . "',
						   LAST_UPDATED_DATE  = CURRENT_DATE
				WHERE PEGAWAI_ID = " . $this->getField("PEGAWAI_ID") . "
				";
        $this->query = $str;

        return $this->execQuery($str);
    }

    function update()
    {
        $str = "UPDATE USER_LEVEL
				SET
                KODE = '" . $this->getField("KODE") . "', 
                NAMA = '" . $this->getField("NAMA") . "', 
                TRANSAKSI = '" . $this->getField("TRANSAKSI") . "', 
                PELUNASAN = '" . $this->getField("PELUNASAN") . "', 
                LOCKING_PIUTANG = '" . $this->getField("LOCKING_PIUTANG") . "', 
                REPORT = '" . $this->getField("REPORT") . "', 
                DASHBOARD = '" . $this->getField("DASHBOARD") . "', 
                MASTER_DATA = '" . $this->getField("MASTER_DATA") . "', 
                VIEW_ALL_TRANS = '" . $this->getField("VIEW_ALL_TRANS") . "', 
                PRANOTA  = '" . $this->getField("PRANOTA") . "', 
                CETAK_NOTA = '" . $this->getField("CETAK_NOTA") . "', 
                INQUIRY_BANK = '" . $this->getField("INQUIRY_BANK") . "', 
                SERVICES_ID_ACCESS = '" . $this->getField("SERVICES_ID_ACCESS") . "'
			    WHERE USER_LEVEL_ID = " . $this->getField("USER_LEVEL_ID") . "
			 ";
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }

    function delete()
    {
        $str = "DELETE 
                FROM USER_LEVEL
                WHERE USER_LEVEL_ID = " . $this->getField("USER_LEVEL_ID") . "";

        $this->query = $str;
        return $this->execQuery($str);
    }

    /** 
     * Cari record berdasarkan array parameter dan limit tampilan 
     * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
     * @param int limit Jumlah maksimal record yang akan diambil 
     * @param int from Awal record yang diambil 
     * @return boolean True jika sukses, false jika tidak 
     **/


    function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY USER_LEVEL_ID ASC")
    {
        $str = "SELECT 
                    USER_LEVEL_ID, NAMA, TRANSAKSI, 
                       PELUNASAN, LOCKING_PIUTANG, REPORT, 
                       DASHBOARD, MASTER_DATA, VIEW_ALL_TRANS, 
                       KODE, PRANOTA, CETAK_NOTA, 
                       INQUIRY_BANK,
                       USER_LEVEL_ID USER_LEVEL, NAMA LEVEL_DESC, SERVICES_ID_ACCESS,
                       AMBIL_SERVICES_KODE(SERVICES_ID_ACCESS) SERVICES_KODE_ACCESS
                FROM USER_LEVEL A
                WHERE 1=1
				";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= " " . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function getCountByParams($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(USER_LEVEL_ID) AS ROWCOUNT FROM USER_LEVEL A
		        WHERE USER_LEVEL_ID IS NOT NULL ";

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        // echo $str;
        // exit;
        $this->select($str);
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }

}
