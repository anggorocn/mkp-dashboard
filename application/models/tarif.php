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

class Tarif extends Entity
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
		$this->setField("SERVICES_TARIF_ID", $this->getSeqId("SERVICES_TARIF_ID", "SERVICES_TARIF"));

		$str = "INSERT INTO SERVICES_TARIF(
				SERVICES_TARIF_ID, SERVICES_ID, NAMA, TANGGAL_AWAL, TANGGAL_AKHIR, KET, SATUAN, TARIF, CREATED_BY, CREATED_DATE)
				VALUES (
				'" . $this->getField("SERVICES_TARIF_ID") . "',
				'" . $this->getField("SERVICES_ID") . "',
				'" . $this->getField("NAMA") . "',
				" . $this->getField("TANGGAL_AWAL") . ",
				" . $this->getField("TANGGAL_AKHIR") . ",
				'" . $this->getField("KET") . "',
				'" . $this->getField("SATUAN") . "',
				'" . $this->getField("TARIF") . "',
				'" . $this->getField("CREATED_BY") . "',
				SYSDATE
    	)";

		$this->id = $this->getField("SERVICES_TARIF_ID");
		$this->query = $str;
		return $this->execQuery($str);
	}

	function update()
	{
		$str = "UPDATE SERVICES_TARIF
				SET    
				NAMA ='" . $this->getField("NAMA") . "',
				KET = '" . $this->getField("KET") . "',
				SATUAN = '" . $this->getField("SATUAN") . "',
				TARIF ='" . $this->getField("TARIF") . "',
				UPDATED_BY = '" . $this->getField("UPDATED_BY") . "',
				UPDATED_DATE = " . $this->getField("UPDATED_DATE") . "
				WHERE SERVICES_TARIF_ID= '" . $this->getField("SERVICES_TARIF_ID") . "'
				";
		$this->query = $str;
		// echo $str;
		// exit;
		return $this->execQuery($str);
	}

	function delete($statement = "")
	{
		$str = "DELETE FROM SERVICES_TARIF
				WHERE SERVICES_TARIF_ID= '" . $this->getField("SERVICES_TARIF_ID") . "'";
		$this->query = $str;
		// echo $str;exit();
		return $this->execQuery($str);
	}

	function selectByParamsMonitoring($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_TARIF_ID ASC")
	{
		$str = "SELECT A.SERVICES_TARIF_ID, A.SERVICES_ID, A.NAMA, A.KET, A.SATUAN, A.TARIF, A.CREATED_BY, A.CREATED_DATE, A.UPDATED_BY, A.UPDATED_DATE, B.NAMA AS JASA, A.TMT
				FROM SERVICES_TARIF A
				INNER JOIN SERVICES B
				ON A.SERVICES_ID = B.SERVICES_ID
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);
	}


	function selectByParamsEntriTarif($reqTarifId, $paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "ORDER BY A.SERVICES_DETIL_ID ASC")
	{
		$str = "SELECT 
				B.SERVICES_TARIF_DETIL_ID, A.SERVICES_DETIL_ID, A.SERVICES_ID, A.SERVICES, 
				   A.NAMA, A.COA, A.KET, A.SATUAN, B.TARIF, B.TANGGAL_AWAL, B.TANGGAL_AKHIR
				FROM SERVICES_DETIL A 
				LEFT JOIN SERVICES_TARIF_DETIL B ON A.SERVICES_ID = B.SERVICES_ID AND A.SERVICES_DETIL_ID = B.SERVICES_DETIL_ID AND B.SERVICES_TARIF_ID = '$reqTarifId'
				WHERE 1 = 1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		return $this->selectLimit($str, $limit, $from);
	}

	function selectByParamsMonitoringV2($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = "")
	{
		$str = "SELECT DISTINCT A.SATUAN, A.TARIF 
				FROM SERVICES_TARIF A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		// echo $str;
		// exit;
		return $this->selectLimit($str, $limit, $from);
	}


	function selectByParamsTMT($paramsArray = array(), $limit = -1, $from = -1, $statement = "", $order = " ORDER BY TANGGAL_AWAL DESC ")
	{
		$str = "SELECT A.SERVICES_TARIF_ID, A.TANGGAL_AWAL, A.TANGGAL_AKHIR
				FROM SERVICES_TARIF A
				WHERE 1=1 ";
		while (list($key, $val) = each($paramsArray)) {
			$str .= " AND $key = '$val'";
		}

		$str .= $statement . " " . $order;
		$this->query = $str;
		// echo $str;
		// exit;
		return $this->selectLimit($str, $limit, $from);
	}

	function getCountByParamsMonitoring($paramsArray = array(), $statement = "")
	{
		$str = "SELECT COUNT(1) AS ROWCOUNT FROM SERVICES_TARIF A WHERE 1=1 " . $statement;
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
