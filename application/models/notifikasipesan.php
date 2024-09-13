<? 
/* *******************************************************************************************************
MODUL NAME          : IMASYS
FILE NAME           : 
AUTHOR              : 
VERSION             : 1.0
MODIFICATION DOC    :
DESCRIPTION         : 
***************************************************************************************************** */

  /***
  * Entity-base class untuk mengimplementasikan tabel KAPAL_JENIS.
  * 
  ***/
  include_once(APPPATH.'/models/Entity.php');

  class NotifikasiPesan extends Entity{ 
  
  
    var $query;
    /**
    * Class constructor.
    **/
    function NotifikasiPesan()
    {
      $this->Entity(); 
    }
    
    function insert()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $this->setField("NOTIFIKASI_PESAN_ID", $this->getSeqId("NOTIFIKASI_PESAN_ID","NOTIFIKASI_PESAN"));

        $str = "INSERT INTO NOTIFIKASI_PESAN (
                   NOTIFIKASI_PESAN_ID, PEGAWAI_ID, 
                   PESAN, TIPE, TIPE_ID, TANGGAL) 
                VALUES ( '".$this->getField("NOTIFIKASI_PESAN_ID")."',
                 '".$this->getField("PEGAWAI_ID")."', 
                 '".$this->getField("PESAN")."',
                 '".$this->getField("TIPE")."',
                 '".$this->getField("TIPE_ID")."',
                 SYSDATE
                )"; 
        $this->id = $this->getField("NOTIFIKASI_PESAN_ID");
        $this->query = $str;
        // echo $str; exit();
        return $this->execQuery($str);
    }

    function updateRead()
    {
        $str = "UPDATE NOTIFIKASI_PESAN
                SET    STATUS                = 'Y'
                WHERE  NOTIFIKASI_PESAN_ID = '".$this->getField("NOTIFIKASI_PESAN_ID")."'
             "; 
        $this->query = $str;
        return $this->execQuery($str);
    }
    
    
    function updateReadMD5()
    {
        $str = "UPDATE NOTIFIKASI_PESAN
                SET    STATUS                = 'Y'
                WHERE  MD5(NOTIFIKASI_PESAN_ID) = '".$this->getField("NOTIFIKASI_PESAN_ID")."'
             "; 
        $this->query = $str;
        return $this->execQuery($str);
    }

    function delete()
    {
        $str = "DELETE FROM NOTIFIKASI_PESAN
                WHERE 
                  NOTIFIKASI_PESAN_ID = '".$this->getField("NOTIFIKASI_PESAN_ID")."'"; 
                  
        $this->query = $str;
        return $this->execQuery($str);
    }

    function deleteParent()
    {
        $str = "DELETE FROM NOTIFIKASI_PESAN
                WHERE 
                  PEGAWAI_ID = '".$this->getField("PEGAWAI_ID")."'"; 
                  
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
    function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order="ORDER BY NOTIFIKASI_PESAN_ID DESC")
    {
        $str = "SELECT 
                    NOTIFIKASI_PESAN_ID, PEGAWAI_ID, TIPE, TIPE_ID,
                   PESAN, STATUS, TANGGAL, TO_CHAR(TANGGAL, 'DD-MM-YYYY HH24:MI:SS') TANGGAL_JAM
                    FROM NOTIFIKASI_PESAN A
                  WHERE 1=1 
                "; 
        
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
        $str = "SELECT COUNT(NOTIFIKASI_PESAN_ID) AS ROWCOUNT FROM NOTIFIKASI_PESAN 
                WHERE 0=0 ".$statement; 
        
        while(list($key,$val)=each($paramsArray))
        {
            $str .= " AND $key = '$val' ";
        }
        
        $this->select($str); 
        if($this->firstRow()) 
            return $this->getField("ROWCOUNT"); 
        else 
            return 0; 
    }
} 
?>