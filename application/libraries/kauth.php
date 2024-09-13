<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once 'kloader.php';
include_once("libraries/nusoap-0.9.5/lib/nusoap.php");
class kauth
{
	function __construct()
	{
        //        load the auth class
        kloader::load('Zend_Auth');
        kloader::load('Zend_Auth_Storage_Session');

        //        set the unique storege
        Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session("p3rumBUlogOffice"));
	}



    public function getArrayData_bak($arrStatement,$apiName, $method="GET") {


        $CI =& get_instance();

        /* API */
        $ch = curl_init();

        $paramGet = "";
        $isPost = 1;
        $data = $arrStatement;

        if($method=="GET")
        {
            $paramGet = "/?method=get";

            foreach ($arrStatement as $key => $value)
            {
                $paramGet .= "&$key=$value";
            }

        }

        curl_setopt($ch, CURLOPT_URL, $CI->config->item("base_api").$apiName.$paramGet);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        if($method=="GET")
        {}
        else
        {
            curl_setopt($ch, CURLOPT_POST, $isPost);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
        
       
        $obj = json_decode($response, true);

        
        return $obj;

    }

    public function getArrayData($arrStatement,$apiName, $method="GET") {


        $CI =& get_instance();

        /* API */
        $ch = curl_init();

        $paramGet = "";
        $isPost = 1;
        $data = $arrStatement;

        if($method=="GET")
        {
            $paramGet = "?";

            foreach ($arrStatement as $key => $value)
            {
                $paramGet .= "&$key=$value";
            }

        }

        // echo $CI->config->item("base_api").$apiName.$paramGet;
        

        curl_setopt($ch, CURLOPT_URL, $CI->config->item("base_api").$apiName.$paramGet);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        if($method=="GET")
        {}
        else
        {
            curl_setopt($ch, CURLOPT_POST, $isPost);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
        
       
        $obj = json_decode($response, true);

        
        return $obj;

    }

    public function getArrayDataV2($arrStatement,$apiName, $method="GET") {


        $CI =& get_instance();

        /* API */
        $ch = curl_init();

        $paramGet = "";
        $isPost = 1;
        $data = $arrStatement;

        if($method=="GET")
        {
            $paramGet = "?";

            foreach ($arrStatement as $key => $value)
            {
                $paramGet .= "&$key=$value";
            }

        }

        // echo $apiName.$paramGet;
        

        curl_setopt($ch, CURLOPT_URL, $apiName.$paramGet);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        if($method=="GET")
        {}
        else
        {
            curl_setopt($ch, CURLOPT_POST, $isPost);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        // var_dump($response); exit;

        curl_close($ch);
        
       
        $obj = json_decode($response, true);
        // var_dump($obj); exit;
        
        return $obj;

    }

    public function getArrayDataSQL($arrStatement,$apiName, $method="GET") {


        $CI =& get_instance();

        /* API */
        $ch = curl_init();

        $paramGet = "";
        $isPost = 1;
        $data = $arrStatement;

        if($method=="GET")
        {
            $paramGet = "?";

            foreach ($arrStatement as $key => $value)
            {
                $paramGet .= "&$key=$value";
            }

        }

        // echo $CI->config->item("base_api").$apiName.$paramGet;
        

        curl_setopt($ch, CURLOPT_URL, $CI->config->item("base_api_web").$apiName.$paramGet);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        if($method=="GET")
        {}
        else
        {
            curl_setopt($ch, CURLOPT_POST, $isPost);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
        
       
        $obj = json_decode($response, true);

        
        return $obj;

    }

	public function getInstance()
	{
		return Zend_Auth::getInstance();
	}
}
