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

class InvoiceDetail    extends Entity
{

    var $query;
    var $id;
    /**
     * Class constructor.
     **/
    function InvoiceDetail()
    {
        $this->Entity();
    }

    function insert()
    {
        $this->setField("INVOICE_DETAIL_ID", $this->getSeqId("INVOICE_DETAIL_ID","INVOICE_DETAIL")); 

        $str = "INSERT INTO INVOICE_DETAIL ( INVOICE_DETAIL_ID, INVOICE_ID, SERVICE_TYPE, SERVICE_DATE, LOCATION,        VESSEL, AMOUNT, CURRENCY, ADDITIONAL)VALUES (
        '".$this->getField("INVOICE_DETAIL_ID")."',
        '".$this->getField("INVOICE_ID")."',
        '".$this->getField("SERVICE_TYPE")."',
        ".$this->getField("SERVICE_DATE").",
        '".$this->getField("LOCATION")."',
        '".$this->getField("VESSEL")."',
        ".$this->getField("AMOUNT").",
        '".$this->getField("CURRENCY")."',
        '".$this->getField("ADDITIONAL")."'
        )";

    $this->id = $this->getField("INVOICE_DETAIL_ID");
    $this->query= $str;
        // echo $str;exit();
    return $this->execQuery($str);
    }

    function update()
    {
        $str = "
        UPDATE INVOICE_DETAIL
        SET    
        INVOICE_DETAIL_ID ='".$this->getField("INVOICE_DETAIL_ID")."',
        INVOICE_ID ='".$this->getField("INVOICE_ID")."',
        SERVICE_TYPE ='".$this->getField("SERVICE_TYPE")."',
        SERVICE_DATE =".$this->getField("SERVICE_DATE").",
        LOCATION ='".$this->getField("LOCATION")."',
        VESSEL ='".$this->getField("VESSEL")."',
        AMOUNT =".$this->getField("AMOUNT").",
        CURRENCY ='".$this->getField("CURRENCY")."',
        ADDITIONAL ='".$this->getField("ADDITIONAL")."'
        WHERE INVOICE_DETAIL_ID= '".$this->getField("INVOICE_DETAIL_ID")."'";
        $this->query = $str;
          // echo $str;exit;
        return $this->execQuery($str);
    }

    function delete($statement= "")
    {
        $str = "DELETE FROM INVOICE_DETAIL
        WHERE INVOICE_DETAIL_ID= '".$this->getField("INVOICE_DETAIL_ID")."'"; 
        $this->query = $str;
          // echo $str;exit();
        return $this->execQuery($str);
    }

    function deleteParent($statement= "")
    {
        $str = "DELETE FROM INVOICE_DETAIL
        WHERE INVOICE_ID= '".$this->getField("INVOICE_ID")."'"; 
        $this->query = $str;
          // echo $str;exit();
        return $this->execQuery($str);
    }

    function selectByParamsMonitoring($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order="ORDER BY A.INVOICE_DETAIL_ID ASC")
    {
        $str = "
        SELECT A.INVOICE_DETAIL_ID,A.INVOICE_ID,A.SERVICE_TYPE,A.SERVICE_DATE,A.LOCATION,A.VESSEL,A.AMOUNT,A.CURRENCY,A.ADDITIONAL
        FROM INVOICE_DETAIL A
        WHERE 1=1 ";
        while(list($key,$val) = each($paramsArray))
        {
            $str .= " AND $key = '$val'";
        }

        $str .= $statement." ".$order;
        $this->query = $str;
        return $this->selectLimit($str,$limit,$from); 
    }

    function getCountByParamsMonitoring($paramsArray=array(), $statement="")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM INVOICE_DETAIL A WHERE 1=1 ".$statement;
        while(list($key,$val)=each($paramsArray))
        {
            $str .= " AND $key =    '$val' ";
        }
        $this->query = $str;
        $this->select($str); 
        if($this->firstRow()) 
            return $this->getField("ROWCOUNT"); 
        else 
            return 0; 
    }

    
}
