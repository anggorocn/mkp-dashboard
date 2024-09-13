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
  * Entity-base class untuk mengimplementasikan tabel AGAMA.
  * 
  ***/
  include_once(APPPATH.'/models/Entity.php');

  class ApprovalManager extends Entity{ 

    var $query;
    /**
    * Class constructor.
    **/
    function ApprovalManager()
    {
      $this->Entity(); 
    }
    
    function insert()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        
        $this->setField("APPROVAL_MANAGER_ID", $this->getSeqId("APPROVAL_MANAGER_ID","APPROVAL_MANAGER"));
        
        $str = "
                INSERT INTO APPROVAL_MANAGER(
                APPROVAL_MANAGER_ID, TABEL, TABEL_ID, TABEL_APPROVAL_KOLOM, PEGAWAI_ID, PEGAWAI_APPROVAL_ID, PEGAWAI_APPROVAL_JENIS, NOMOR, STATUS_AKTIF, URUT, PROJECT_KONTRAK_TERMIN_ID)
                VALUES (
                  ".$this->getField("APPROVAL_MANAGER_ID").",
                  '".$this->getField("TABEL")."',
                  '".$this->getField("TABEL_ID")."',
                  '".$this->getField("TABEL_APPROVAL_KOLOM")."',
                  '".$this->getField("PEGAWAI_ID")."',
                  '".$this->getField("PEGAWAI_APPROVAL_ID")."',
                  '".$this->getField("PEGAWAI_APPROVAL_JENIS")."',
                  '".$this->getField("NOMOR")."',
                  '".$this->getField("STATUS_AKTIF")."',
                  '".(int)$this->getField("URUT")."',
                  '".$this->getField("PROJECT_KONTRAK_TERMIN_ID")."'
                )"; 
        $this->id = $this->getField("APPROVAL_MANAGER_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }
    
    
    function insertApproval()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        
        $this->setField("APPROVAL_MANAGER_ID", $this->getSequenceId("APPROVAL_MANAGER_ID","APPROVAL_MANAGER"));
        
        $str = "
                INSERT INTO APPROVAL_MANAGER(
                APPROVAL_MANAGER_ID, TABEL, TABEL_ID, TABEL_APPROVAL_KOLOM, PEGAWAI_ID, PEGAWAI_APPROVAL_ID, PEGAWAI_APPROVAL_JENIS, NOMOR, STATUS_AKTIF,
                APPROVAL, APPROVAL_ALASAN, APPROVAL_TANGGAL)
                VALUES (
                  ".$this->getField("APPROVAL_MANAGER_ID").",
                  '".$this->getField("TABEL")."',
                  '".$this->getField("TABEL_ID")."',
                  '".$this->getField("TABEL_APPROVAL_KOLOM")."',
                  '".$this->getField("PEGAWAI_ID")."',
                  '".$this->getField("PEGAWAI_APPROVAL_ID")."',
                  '".$this->getField("PEGAWAI_APPROVAL_JENIS")."',
                  '".$this->getField("NOMOR")."',
                  '".$this->getField("STATUS_AKTIF")."',
                  '".$this->getField("APPROVAL")."',
                  '".$this->getField("APPROVAL_ALASAN")."',
                  CURRENT_TIMESTAMP
                )"; 
        $this->id = $this->getField("APPROVAL_MANAGER_ID");
        $this->query = $str;
        return $this->execQuery($str);
    }


    function updateApproval()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $str = "
                UPDATE APPROVAL_MANAGER
                SET
                       PEGAWAI_APPROVAL_ID = '".$this->getField("PEGAWAI_APPROVAL_ID")."',
                       APPROVAL            = '".$this->getField("APPROVAL")."',
                       APPROVAL_ALASAN     = '".$this->getField("APPROVAL_ALASAN")."',
                       APPROVAL_TANGGAL       = CURRENT_TIMESTAMP
                WHERE APPROVAL_MANAGER_ID        = '".$this->getField("APPROVAL_MANAGER_ID")."'
                ";
                $this->query = $str;
        
        $this->query = $str;
        return $this->execQuery($str);
    }

    

    function approval()
    {
        /*Auto-generate primary key(s) by next max value (integer) */
        $str = "
                UPDATE APPROVAL_MANAGER
                SET
                       APPROVAL            = '".$this->getField("APPROVAL")."',
                       APPROVAL_ALASAN     = '".$this->getField("APPROVAL_ALASAN")."',
                       APPROVAL_QR         = '".$this->getField("APPROVAL_QR")."',
                       APPROVAL_TANGGAL       = CURRENT_TIMESTAMP
                WHERE  PEGAWAI_APPROVAL_ID       = '".$this->getField("PEGAWAI_APPROVAL_ID")."' AND
                       APPROVAL_MANAGER_ID       = '".$this->getField("APPROVAL_MANAGER_ID")."'
                ";
                $this->query = $str;
        
        $this->query = $str;
        return $this->execQuery($str);
    }
    

    function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order=" ")
    {
        $str = "
                SELECT APPROVAL_MANAGER_ID, TABEL, TABEL_ID, TABEL_APPROVAL_KOLOM, PEGAWAI_ID, 
                       PEGAWAI, JABATAN, PERUSAHAAN, PERUSAHAAN_CABANG, PEGAWAI_APPROVAL_JENIS, 
                       PEGAWAI_APPROVAL_ID, PEGAWAI_APPROVAL_NAMA, PEGAWAI_APPROVAL_JABATAN, 
                       PEGAWAI_APPROVAL_EMAIL, APPROVAL, APPROVAL_ALASAN, APPROVAL_TANGGAL, 
                       CREATED_DATE, NOMOR, APPROVAL_QR, TO_CHAR(APPROVAL_TANGGAL, 'YYYY-MM-DD') APPROVAL_TANGGAL_FORMAT,
                       PEGAWAI_NRP, URUT,
                       SERVICES, KETERANGAN
                  FROM APPROVAL_MANAGER A
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



    function selectByParamsMonitoring($paramsArray=array(),$limit=-1,$from=-1, $statement="", $order=" ")
    {
        $str = "
                SELECT APPROVAL_MANAGER_ID, TABEL, TABEL_ID, TABEL_APPROVAL_KOLOM, PEGAWAI_ID, 
                       PEGAWAI, JABATAN, PERUSAHAAN, PERUSAHAAN_CABANG, PEGAWAI_APPROVAL_JENIS, 
                       PEGAWAI_APPROVAL_ID, PEGAWAI_APPROVAL_NAMA, PEGAWAI_APPROVAL_JABATAN, 
                       PEGAWAI_APPROVAL_EMAIL, APPROVAL, APPROVAL_ALASAN, APPROVAL_TANGGAL, 
                       CREATED_DATE, NOMOR, APPROVAL_QR, TO_CHAR(APPROVAL_TANGGAL, 'YYYY-MM-DD') APPROVAL_TANGGAL_FORMAT,
                       TO_CHAR(CREATED_DATE, 'DD-MM-YYYY HH24:MI') TANGGAL_PERMOHONAN,
                       PEGAWAI_NRP, URUT, MD5(PEGAWAI_APPROVAL_ID || 'F1N4T3lukLAM0n6') TOKEN,
                       SERVICES, KETERANGAN
                  FROM APPROVAL_MANAGER A
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


    function getCountByParamsMonitoring($paramsArray = array(), $statement = "")
    {
        $str = "SELECT COUNT(1) AS ROWCOUNT FROM APPROVAL_MANAGER A WHERE 1=1 " . $statement;
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
?>