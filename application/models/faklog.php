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
  include_once(APPPATH.'/models/Entity.php');
  
  class FakLog extends Entity{ 

	var $query;
    /**
    * Class constructor.
    **/
    function FakLog()
	{
      $this->Entity(); 
    }
	
    /** 
    * Cari record berdasarkan array parameter dan limit tampilan 
    * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
    * @param int limit Jumlah maksimal record yang akan diambil 
    * @param int from Awal record yang diambil 
    * @return boolean True jika sukses, false jika tidak 
    **/ 
    function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order=" ORDER BY A.TGL_FAKTUR DESC ")
	{
		$str = "
				SELECT 
				NPWP, CUSTOMER_NAME, NOFAKTUR, 
				TO_CHAR(TGL_FAKTUR,'DD/MM/YYYY HH24:MI:SS') TGL_FAKTUR, PERIODE_PAJAK, DPP_AMOUNT, 
				   PPN_AMOUNT, MATERAI_AMOUNT, 
				   INVOICE_AMOUNT, DISCOUNT_AMOUNT, JENIS_FAKTUR, 
				   APPNAME, CREATE_DATE, STATUS, 
				   USERID, DESKRIPSI, CUSTOMER, 
				   TAHUN_PAJAK, BULAN_PAJAK
				FROM FAKTUR_PAJAK_ALL A
				WHERE 1 = 1
				"; 
		//, FOTO
		while(list($key,$val) = each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$str .= $statement." ".$order;
		$this->query = $str;
		return $this->selectLimit($str,$limit,$from); 
    }
    
    /** 
    * Hitung jumlah record berdasarkan parameter (array). 
    * @param array paramsArray Array of parameter. Contoh array("id"=>"xxx","IJIN_USAHA_ID"=>"yyy") 
    * @return long Jumlah record yang sesuai kriteria 
    **/ 
    function getCountByParams($paramsArray=array(), $statement="")
	{
		$str = "SELECT COUNT(1) AS ROWCOUNT FROM FAKTUR_PAJAK_ALL A
		        WHERE 1 = 1 ".$statement; 
		
		while(list($key,$val)=each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$this->select($str);
		$this->query = $str; 
		if($this->firstRow()) 
			return $this->getField("ROWCOUNT"); 
		else 
			return 0; 
    }
    
  } 
?>