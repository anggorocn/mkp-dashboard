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
 * Entity-base class untuk mengimplementasikan tabel AGAMA.
 * 
 ***/
include_once(APPPATH . '/models/Entity.php');

class JenisPajakPersen extends Entity
{

    var $query;
    /**
     * Class constructor.
     **/
    function JenisPajakPersen()
    {
        parent::__construct();
    }

    function insert()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $this->setField("JENIS_PAJAK_PERSEN_ID", $this->getNextId("JENIS_PAJAK_PERSEN_ID", "JENIS_PAJAK_PERSEN"));

        $str = "INSERT INTO JENIS_PAJAK_PERSEN(
                    JENIS_PAJAK_PERSEN_ID, JENIS_PAJAK_ID, NAMA, KETERANGAN, PERSEN, CREATED_BY, CREATED_DATE)
                    VALUES (
				  " . $this->getField("JENIS_PAJAK_PERSEN_ID") . ",
				  '" . $this->getField("JENIS_PAJAK_ID") . "',
				  '" . $this->getField("NAMA") . "',
				  '" . $this->getField("KETERANGAN") . "',
				  '" . $this->getField("PERSEN") . "',
				  '" . $this->getField("CREATED_BY") . "',
				  SYSDATE
				)";
        $this->id = $this->getField("JENIS_PAJAK_PERSEN_ID");
        $this->query = $str;
      echo $str;
        // exit;
        return $this->execQuery($str);
    }


    function update()
    {
        $str = "UPDATE JENIS_PAJAK_PERSEN
				SET    
					NAMA = '" . $this->getField("NAMA") . "',
					KETERANGAN = '" . $this->getField("KETERANGAN") . "',
				    PERSEN = '" . $this->getField("PERSEN") . "',
					UPDATED_BY = '" . $this->getField("UPDATED_BY") . "',
					UPDATED_DATE = SYSDATE
				WHERE JENIS_PAJAK_PERSEN_ID = " . $this->getField("JENIS_PAJAK_PERSEN_ID") . "
			 ";
        $this->query = $str;
        echo $str;
        // exit;
        return $this->execQuery($str);
    }


    function delete()
    {
        $str = "DELETE FROM JENIS_PAJAK_PERSEN
                WHERE 
                JENIS_PAJAK_PERSEN_ID = " . $this->getField("JENIS_PAJAK_PERSEN_ID") . "
			";
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->execQuery($str);
    }


    function deleteParent()
    {
        $str = "DELETE FROM JENIS_DOKUMEN
                WHERE 
                JENIS_ANGGARAN_ID    = " . $this->getField("JENIS_ANGGARAN_ID     ") . "
			";
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

    function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "order by JENIS_PAJAK_PERSEN_ID asc")
    {
        $str = "SELECT JENIS_PAJAK_PERSEN_ID, JENIS_PAJAK_ID, NAMA, KETERANGAN, PERSEN, CREATED_BY, CREATED_DATE, UPDATED_BY, UPDATED_DATE
                FROM JENIS_PAJAK_PERSEN
				WHERE 1 = 1
			";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $str .= $statement . " " . $order;
        $this->query = $str;
        // echo $str;
        // exit;
        return $this->selectLimit($str, $limit, $from);
    }

    function selectByParamsLike($paramsArray = array(), $limit = -1, $from = -1, $statement = "")
    {
        $str = "SELECT 
				BANK_ID, NAMA, ALAMAT, KOTA
				FROM pds_simpeg.BANK				
				WHERE 1 = 1
			 ";
        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key LIKE '%$val%' ";
        }

        $this->query = $str;
        $str .= $statement . " ORDER BY NAMA ASC";
        return $this->selectLimit($str, $limit, $from);
    }

    /** 
     * Hitung jumlah record berdasarkan parameter (array). 
     * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
     * @return long Jumlah record yang sesuai kriteria 
     **/

    function getCountByParams($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(JENIS_PAJAK_PERSEN_ID) AS ROWCOUNT FROM JENIS_PAJAK_PERSEN
		        WHERE JENIS_PAJAK_PERSEN_ID IS NOT NULL " . $statement;

        while (list($key, $val) = each($paramsArray)) {
            $str .= " AND $key = '$val' ";
        }

        $this->select($str);
        $this->query = $str;
        if ($this->firstRow())
            return $this->getField("ROWCOUNT");
        else
            return 0;
    }


    function getCountByParamsLike($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(BANK_ID) AS ROWCOUNT FROM pds_simpeg.BANK
		        WHERE BANK_ID IS NOT NULL " . $statement;
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
