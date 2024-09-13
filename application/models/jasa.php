<?
/* *******************************************************************************************************
MODUL NAME 			: MTSN LAWANG
FILE NAME 			:
AUTHOR				:
VERSION				: 1.0
MODIFICATION DOC	:
DESCRIPTION			:
***************************************************************************************************** */

/***
 * Entity-base class untuk mengimplementasikan tabel kategori.
 *
 ***/
include_once(APPPATH . '/models/Entity.php');

class Jasa extends Entity
{

	var $query;
	var $id;
	/**
	 * Class constructor.
	 **/
	function Services()
	{
		$this->Entity();
	}

	function insert()
	{
		$this->setField("SERVICES_ID", $this->getSeqId("SERVICES_ID", "SERVICES"));

		$str = "INSERT INTO SERVICES 
				(SERVICES_ID, KODE, NAMA, COA, KET, 
				APPROVAL_JABATAN1, APPROVAL_JABATAN2, APPROVAL_JABATAN_NAMA1, APPROVAL_JABATAN_NAMA2, DUE_DAYS, METODE_PEMBAYARAN, 
				KODE_FAKTUR, KODE_PENDAPATAN,
				CREATED_BY, CREATED_DATE)
				VALUES (
    	'" . $this->getField("SERVICES_ID") . "',
    	'" . $this->getField("KODE") . "',
    	'" . $this->getField("NAMA") . "',
    	'" . $this->getField("COA") . "',
    	'" . $this->getField("KET") . "',
    	'" . $this->getField("APPROVAL_JABATAN1") . "', '" . $this->getField("APPROVAL_JABATAN2") . "',
    	'" . $this->getField("APPROVAL_JABATAN_NAMA1") . "', '" . $this->getField("APPROVAL_JABATAN_NAMA2") . "',
    	'" . $this->getField("DUE_DAYS") . "',
    	'" . $this->getField("METODE_PEMBAYARAN") . "',
    	'" . $this->getField("KODE_FAKTUR") . "',
    	'" . $this->getField("KODE_PENDAPATAN") . "',
    	'" . $this->getField("CREATED_BY") . "',
    	" . $this->getField("CREATED_DATE") . "
    	)";

		$this->id = $this->getField("SERVICES_ID");
		$this->query = $str;
		// echo $str;
		// exit();
		return $this->execQuery($str);
	}

	function update()
	{
		$str = "UPDATE SERVICES
				SET    
				KODE = '" . $this->getField("KODE") . "',
				COA = '" . $this->getField("COA") . "',
				NAMA = '" . $this->getField("NAMA") . "',
				KET = '" . $this->getField("KET") . "',
				DUE_DAYS = '" . $this->getField("DUE_DAYS") . "',
				METODE_PEMBAYARAN = '" . $this->getField("METODE_PEMBAYARAN") . "',
				KODE_FAKTUR = '" . $this->getField("KODE_FAKTUR") . "',
				KODE_PENDAPATAN = '" . $this->getField("KODE_PENDAPATAN") . "',
				APPROVAL_JABATAN1 = '" . $this->getField("APPROVAL_JABATAN1") . "',
				APPROVAL_JABATAN2 = '" . $this->getField("APPROVAL_JABATAN2") . "',
				APPROVAL_JABATAN_NAMA1 = '" . $this->getField("APPROVAL_JABATAN_NAMA1") . "',
				APPROVAL_JABATAN_NAMA2 = '" . $this->getField("APPROVAL_JABATAN_NAMA2") . "',
				UPDATED_BY = '" . $this->getField("UPDATED_BY") . "',
				UPDATED_DATE = " . $this->getField("UPDATED_DATE") . "
				WHERE SERVICES_ID = '" . $this->getField("SERVICES_ID") . "'";
		$this->query = $str;
		// echo $str;exit;
		return $this->execQuery($str);
	}

	function delete($statement = "")
	{
		$str = "DELETE FROM SERVICES
				WHERE SERVICES_ID= '" . $this->getField("SERVICES_ID") . "'";
		$this->query = $str;
		// echo $str;exit();
		return $this->execQuery($str);
	}

	
	function deleteDetil($statement = "")
	{
		$str = "DELETE FROM SERVICES_DETIL
				WHERE SERVICES_DETIL_ID= '" . $this->getField("SERVICES_DETIL_ID") . "'";
		$this->query = $str;
		// echo $str;exit();
		return $this->execQuery($str);
	}


	
	function deleteDetilKertasKerja($statement = "")
	{
		$str = "DELETE FROM SERVICES_KERTAS_KERJA
				WHERE SERVICES_KERTAS_KERJA_ID= '" . $this->getField("SERVICES_KERTAS_KERJA_ID") . "'";
		$this->query = $str;
		// echo $str;exit();
		return $this->execQuery($str);
	}



	function selectByParams($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_ID ASC")
	{
		$str = "SELECT A.SERVICES_ID,A.NAMA,A.KODE,A.COA,A.KET,A.CREATED_BY,A.CREATED_DATE,A.UPDATED_BY,A.UPDATED_DATE, A.KODE_FAKTUR, A.KODE_PENDAPATAN,
					A.APPROVAL_JABATAN1, A.APPROVAL_JABATAN2, A.APPROVAL_JABATAN_NAMA1, A.APPROVAL_JABATAN_NAMA2, A.DUE_DAYS, 
					A.METODE_PEMBAYARAN, A.JENIS_TRANSAKSI
				FROM SERVICES A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);
	}



	function selectByParamsDetil($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_DETIL_ID ASC")
	{

		$str = "SELECT 
				SERVICES_DETIL_ID, SERVICES_ID, SERVICES, NAMA, 
				   COA, KET, CREATED_BY, 
				   CREATED_DATE, UPDATED_BY, UPDATED_DATE, SATUAN
				FROM SERVICES_DETIL A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);

	}



	function selectByParamsDetilKertasKerja($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_KERTAS_KERJA_ID ASC")
	{

		$str = "SELECT 
					SERVICES_KERTAS_KERJA_ID, SERVICES_ID, SERVICES, 
					   NAMA, TIPE, KET, 
					   CREATED_BY, CREATED_DATE, UPDATED_BY, 
					   UPDATED_DATE
					FROM SERVICES_KERTAS_KERJA A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);

	}


	function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_ID ASC")
	{
		$str = "SELECT A.SERVICES_ID,A.NAMA,A.KODE,A.COA,A.KET,A.CREATED_BY,A.CREATED_DATE,A.UPDATED_BY,A.UPDATED_DATE, A.KODE_FAKTUR, A.KODE_PENDAPATAN, 
					A.APPROVAL_JABATAN1, A.APPROVAL_JABATAN2, A.APPROVAL_JABATAN_NAMA1, A.APPROVAL_JABATAN_NAMA2, A.DUE_DAYS, A.METODE_PEMBAYARAN,
					A.JENIS_TRANSAKSI
				FROM SERVICES A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);
	}


	function selectByParamsTarif($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_ID ASC")
	{
		$str = "SELECT A.SERVICES_ID, B.SERVICES_TARIF_ID, A.NAMA,A.KODE,A.COA,A.KET,A.CREATED_BY,A.CREATED_DATE,A.UPDATED_BY,A.UPDATED_DATE, B.TANGGAL_AWAL, B.TANGGAL_AKHIR
				FROM SERVICES A
				LEFT JOIN SERVICES_TARIF B ON A.SERVICES_ID = B.SERVICES_ID AND SYSDATE BETWEEN B.TANGGAL_AWAL AND B.TANGGAL_AKHIR
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
		$str = "SELECT COUNT(1) AS ROWCOUNT FROM SERVICES A WHERE 1=1 " . $statement;
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = 	'$val' ";
		}
		$this->query = $str;
		$this->select($str);
		if ($this->firstRow())
			return $this->getField("ROWCOUNT");
		else
			return 0;
	}
}
