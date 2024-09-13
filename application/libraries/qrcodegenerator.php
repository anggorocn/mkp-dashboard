<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kauth
 *
 * @author user
 */
class qrcodegenerator{
	
	var $NIP;
	
    /******************** CONSTRUCTOR **************************************/
    function __construct(){
	
		 $this->emptyProps();
    }

    /******************** METHODS ************************************/
    /** Empty the properties **/
    function emptyProps(){
    }
		
    
    /** $reqJenis = KKA **/
    function generateQr($reqJenis, $reqId, $reqNIPP){		

		include_once("functions/image.func.php");
		include_once("functions/string.func.php");
		$CI =& get_instance();
		
		/* GENERATE QRCODE */
		include_once("libraries/phpqrcode/qrlib.php");
		
		$kodeParaf = $reqJenis.$reqNIPP;
		$qrParaf   = $CI->config->item('base_report')."qr/index/".$reqJenis."/".md5($reqId.$reqNIPP."R415");
		$FILE_DIR= "uploads/".$reqJenis.'/'.$reqId."/";
		makedirs($FILE_DIR);
		$filename = $FILE_DIR.$kodeParaf.'.png';
		
		
		if(file_exists($filename))
			return;
			
		$errorCorrectionLevel = 'L';   
		$matrixPointSize = 2;
		QRcode::png($qrParaf, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
		

    }
			   
}
	
  /***** INSTANTIATE THE GLOBAL OBJECT */
  $qrCode = new qrcodegenerator();

?>
