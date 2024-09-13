<?
/* *******************************************************************************************************
MODUL NAME 			: 
FILE NAME 			: string.func.php
AUTHOR				: 
VERSION				: 1.0
MODIFICATION DOC	:
DESCRIPTION			: Functions to handle string operation
***************************************************************************************************** */



/* fungsi untuk mengatur tampilan mata uang
 * $value = string
 * $digit = pengelompokan setiap berapa digit, default : 3
 * $symbol = menampilkan simbol mata uang (Rupiah), default : false
 * $minusToBracket = beri tanda kurung pada nilai negatif, default : true
 */
function hitung_umur($tanggal_lahir){
	if(!empty($tanggal_lahir)){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun ".$m." bulan ".$d." hari";
	}
}
function hitung_umur_tahun($tanggal_lahir){

	if(!empty($tanggal_lahir)){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0");
	}

	$y = $today->diff($birthDate)->y;
	
	return $y;
	}
}



function pre_regregName($name){
	preg_match('#\[(.*?)\]#', $name,$match);
	return $match[1];
}

function normal_angka($val){
	$vals = str_replace('.', '', $val);
	return $vals;

}

function retNull($text){
	$textt =$text;
	if(empty($text)){
		$textt ='NULL';
	}
	return $textt;
}

function comboTimeOfTest($val){
	$data = array("","Daily","Weekly","Monthly","6 Monthly","Yearly","2,5 Yearly","5 Yearly");
	return $data[$val];

}



function currencyToPage($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{

    if($value == "")
		$value = 0;
	$rupiah = number_format($value,0, ",",".");
    $rupiah = $rupiah . ",00";
    return $rupiah;
}
function currencyToPage2($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arrValue = explode('.', $value);

    if($arrValue[0] == "")
		$value = 0;
	$rupiah = number_format($value,strlen($arrValue[1]), ",",".");
    $rupiah = $rupiah ;
    return $rupiah;
}
function currencyToPage3($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{

    if($value == "")
		$value = 0;
	$rupiah = number_format($value,2, ",",".");
    $rupiah = $rupiah ;
    return $rupiah;
}
function makedirs($dirpath, $mode=0777)
{
    return is_dir($dirpath) || mkdir($dirpath, $mode, true);
}

function nomorDigit($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arrValue = explode(".", $value);
	$value = $arrValue[0];
	if(count($arrValue) == 1)
		$belakang_koma = "";
	else
		$belakang_koma = $arrValue[1];
	if($value < 0)
	{
		$neg = "-";
		$value = str_replace("-", "", $value);
	}
	else
		$neg = false;
		
	$cntValue = strlen($value);
	//$cntValue = strlen($value);
	
	if($cntValue <= $digit)
		$resValue =  $value;
	
	$loopValue = floor($cntValue / $digit);
	
	for($i=1; $i<=$loopValue; $i++)
	{
		$sub = 0 - $i; //ubah jadi negatif
		$tempValue = $endValue;
		$endValue = substr($value, $sub*$digit, $digit);
		$endValue = $endValue;
		
		if($i !== 1)
			$endValue .= ".";
		
		$endValue .= $tempValue;
	}
	
	$beginValue = substr($value, 0, $cntValue - ($loopValue * $digit));
	
	if($cntValue % $digit == 0)
		$resValue = $beginValue.$endValue;
	else if($cntValue > $digit)
		$resValue = $beginValue.".".$endValue;
	
	//additional
	if($belakang_koma == "")
		$resValue = $symbol." ".$resValue;
	else
		$resValue = $symbol." ".$resValue.",".$belakang_koma;
	
	
	if($minusToBracket && $neg)
	{
		$resValue = "(".$resValue.")";
		$neg = "";
	}
	
	if($minusLess == true)
	{
		$neg = "";
	}
	
	$resValue = $neg.$resValue;
	
	//$resValue = "<span style='white-space:nowrap'>".$resValue."</span>";

	return $resValue;
}


function numberToIna($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arr_value = explode(".", $value);
	
	if(count($arr_value) > 1)
		$value = $arr_value[0];
	
	if($value < 0)
	{
		$neg = "-";
		$value = str_replace("-", "", $value);
	}
	else
		$neg = false;
		
	$cntValue = strlen($value);
	//$cntValue = strlen($value);
	
	if($cntValue <= $digit)
		$resValue =  $value;
	
	$loopValue = floor($cntValue / $digit);
	
	for($i=1; $i<=$loopValue; $i++)
	{
		$sub = 0 - $i; //ubah jadi negatif
		$tempValue = $endValue;
		$endValue = substr($value, $sub*$digit, $digit);
		$endValue = $endValue;
		
		if($i !== 1)
			$endValue .= ".";
		
		$endValue .= $tempValue;
	}
	
	$beginValue = substr($value, 0, $cntValue - ($loopValue * $digit));
	
	if($cntValue % $digit == 0)
		$resValue = $beginValue.$endValue;
	else if($cntValue > $digit)
		$resValue = $beginValue.".".$endValue;
	
	//additional
	if($symbol == true && $resValue !== "")
	{
		$resValue = $resValue;
	}
	
	if($minusToBracket && $neg)
	{
		$resValue = "(".$resValue.")";
		$neg = "";
	}
	
	if($minusLess == true)
	{
		$neg = "";
	}

	if(count($arr_value) == 1)
		$resValue = $neg.$resValue;
	else
		$resValue = $neg.$resValue.",".$arr_value[1];
	
	if(substr($resValue, 0, 1) == ',')
		$resValue = '0'.$resValue;	//$resValue = "<span style='white-space:nowrap'>".$resValue."</span>";

	return $resValue;
}

function getNameValueYaTidak($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak", "1"=>"Ya");
	return $arrValue[$number];
}

function getNameValueKategori($number) {
	$number = (int)$number;
	$arrValue = array("1"=>"Sangat Baik", "2"=>"Baik", "3"=>"Cukup", "4"=>"Kurang");
	return $arrValue[$number];
}	

function getNameValue($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak", "1"=>"Ya");
	return $arrValue[$number];
}	

function getNameValueAktif($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak Aktif", "1"=>"Aktif");
	return $arrValue[$number];
}

function getNameValidasi($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Menunggu Konfirmasi","1"=>"Disetujui", "2"=>"Ditolak");
	return $arrValue[$number];
}	

function getNameInputOutput($char) {
	$arrValue = array("I"=>"Datang", "O"=>"Pulang");
	return $arrValue[$char];
}		
	
function dotToComma($varId)
{
	$newId = str_replace(".", ",", $varId);	
	return $newId;
}

function CommaToQuery($varId)
{
	$newId = str_replace(",", "','", $varId);	
	return $newId;
}


function CommaToDot($varId)
{
	$newId = str_replace(",", ".", $varId);	
	return $newId;
}

function dotToNo($varId)
{
	$newId = str_replace(".", "", $varId);	
	$newId = str_replace(",", ".", $newId);	
	if(empty($newId)){
		$newId=0;
	}
	return $newId;
}
function CommaToNo($varId)
{
	$newId = str_replace(",", "", $varId);	
	return $newId;
}

function CrashToNo($varId)
{
	$newId = str_replace("#", "", $varId);	
	return $newId;
}

function StarToNo($varId)
{
	$newId = str_replace("* ", "", $varId);	
	return $newId;
}

function NullDotToNo($varId)
{
	$newId = str_replace(".00", "", $varId);
	return $newId;
}

function ExcelToNo($varId)
{
	$newId = NullDotToNo($varId);
	$newId = StarToNo($newId);
	return $newId;
}

function ValToNo($varId)
{
	$newId = NullDotToNo($varId);
	$newId = CommaToNo($newId);
	$newId = StarToNo($newId);
	return $newId;
}

function ValToNull($varId)
{
	if($varId == '')
		return 0;
	else
		return $varId;
}

function ValToNullMenit($varId)
{
	if($varId == '')
		return 00;
	else
		return $varId;
}


function ValToNullDB($varId)
{
	if($varId == '')
		return 'NULL';
	elseif($varId == 'null')
		return 'NULL';
	else
		return "'".$varId."'";
}

function setQuote($var, $status='')
{	
	if($status == 1)
		$tmp= str_replace("\'", "''", $var);
	else
		$tmp= str_replace("'", "''", $var);
	return $tmp;
}

// fungsi untuk generate nol untuk melengkapi digit

function generateZero($varId, $digitGroup, $digitCompletor = "0")
{
	$newId = "";
	
	$lengthZero = $digitGroup - strlen($varId);
	
	for($i = 0; $i < $lengthZero; $i++)
	{
		$newId .= $digitCompletor;
	}
	
	$newId = $newId.$varId;
	
	return $newId;
}

// truncate text into desired word counts.
// to support dropDirtyHtml function, include default.func.php
function truncate($text, $limit, $dropDirtyHtml=true)
{
	$tmp_truncate = array();
	$text = str_replace("&nbsp;", " ", $text);
	$tmp = explode(" ", $text);
	
	for($i = 0; $i <= $limit; $i++)		//truncate how many words?
	{
		$tmp_truncate[$i] = $tmp[$i];
	}
	
	$truncated = implode(" ", $tmp_truncate);
	
	if ($dropDirtyHtml == true and function_exists('dropAllHtml'))
		return dropAllHtml($truncated);
	else
		return $truncated;
}

function arrayMultiCount($array, $field_name, $search)
{
	$summary = 0;
	for($i = 0; $i < count($array); $i++)
	{
		if($array[$i][$field_name] == $search)
			$summary += 1;
	}
	return $summary;
}

function getValueArray($var)
{
	//$tmp = "";
	for($i=0;$i<count($var);$i++)
	{			
		if($i == 0)
			$tmp .= $var[$i];
		else
			$tmp .= ",".$var[$i];
	}
	
	return $tmp;
}

function getValueArrayMonth($var)
{
	//$tmp = "";
	for($i=0;$i<count($var);$i++)
	{			
		if($i == 0)
			$tmp .= "'".$var[$i]."'";
		else
			$tmp .= ", '".$var[$i]."'";
	}
	
	return $tmp;
}

function getColoms($var)
{
	$tmp = "";
	if($var == 0)	$tmp = 'D';
	elseif($var == 1)	$tmp = 'E';
	elseif($var == 2)	$tmp = 'F';
	elseif($var == 3)	$tmp = 'G';
	elseif($var == 4)	$tmp = 'H';
	elseif($var == 5)	$tmp = 'I';
	elseif($var == 6)	$tmp = 'J';
	elseif($var == 7)	$tmp = 'K';
	
	return $tmp;
}

function setNULL($var)
{	
	if($var == '')
		$tmp = 'NULL';
	else
		$tmp = $var;
	
	return $tmp;
}

function setNULLModif($var)
{	
	if($var == '')
		$tmp = 'NULL';
	else
		$tmp = "'".$var."'";
	
	return $tmp;
}

function setVal_0($var)
{	
	if($var == '')
		$tmp = '0';
	else
		$tmp = $var;
	
	return $tmp;
}

function get_null_10($varId)
{
	if($varId == '') return '';
	if($varId < 10)	$temp= '0'.$varId;
	else			$temp= $varId;
			
	return $temp;
}

function _ip( )
{
    return ( preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'] );
}

function getFotoProfile($id)
{
	$filename = "uploads/foto/profile-".$id.".jpg";
	if (file_exists($filename)) {
	} else {
		$filename = "images/foto-profile.png";
	}	
	return $filename;
}

/*function getFotoProfile($id)
{
	$filename = "uploads/foto/profile-".$id.".jpg";
	if (file_exists($filename)) {
	} else {
		$filename = "images/foto-profile.jpg";
	}	
	return $filename;
}*/
function toNumber($varId)
{	
	return (float)$varId;
}

function searchWordDelimeter($varSource, $varSearch, $varDelimeter=",")
{

	$arrSource = explode($varDelimeter, $varSource);
	
	for($i=0; $i<count($arrSource);$i++)
	{
		if(trim($arrSource[$i]) == $varSearch)
			return true;
	}
	
	return false;
}

function getZodiac($day,$month){
	if(($month==1 && $day>20)||($month==2 && $day<20)){
	$mysign = "Aquarius";
	}
	if(($month==2 && $day>18 )||($month==3 && $day<21)){
	$mysign = "Pisces";
	}
	if(($month==3 && $day>20)||($month==4 && $day<21)){
	$mysign = "Aries";
	}
	if(($month==4 && $day>20)||($month==5 && $day<22)){
	$mysign = "Taurus";
	}
	if(($month==5 && $day>21)||($month==6 && $day<22)){
	$mysign = "Gemini";
	}
	if(($month==6 && $day>21)||($month==7 && $day<24)){
	$mysign = "Cancer";
	}
	if(($month==7 && $day>23)||($month==8 && $day<24)){
	$mysign = "Leo";
	}
	if(($month==8 && $day>23)||($month==9 && $day<24)){
	$mysign = "Virgo";
	}
	if(($month==9 && $day>23)||($month==10 && $day<24)){
	$mysign = "Libra";
	}
	if(($month==10 && $day>23)||($month==11 && $day<23)){
	$mysign = "Scorpio";
	}
	if(($month==11 && $day>22)||($month==12 && $day<23)){
	$mysign = "Sagitarius";
	}
	if(($month==12 && $day>22)||($month==1 && $day<21)){
	$mysign = "Capricorn";
	}
	return $mysign;
}

function getValueANDOperator($var)
{
	$tmp = ' AND ';
	
	return $tmp;
}

function getValueKoma($var)
{
	if($var == '')
		$tmp = '';
	else
		$tmp = ',';	
	
	return $tmp;
}

function import_format($val)
{
	if($val == ":02")
	{
		$temp= str_replace(":02","24:00",$val);
	}
	else
	{	
		$temp="";
		if($val == "[hh]:mm" || $val == "[h]:mm"){}
		else
			$temp= $val;
	}
	return $temp;
	//return $val;
}

function kekata($x) 
{
	$x = abs($x);
	$angka = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($x <12) 
	{
		$temp = " ". $angka[$x];
	} 
	else if ($x <20) 
	{
		$temp = kekata($x - 10). " Belas";
	} 
	else if ($x <100) 
	{
		$temp = kekata($x/10)." Puluh". kekata($x % 10);
	} 
	else if ($x <200) 
	{
		$temp = " Seratus" . kekata($x - 100);
	} 
	else if ($x <1000) 
	{
		$temp = kekata($x/100) . " Ratus" . kekata($x % 100);
	} 
	else if ($x <2000) 
	{
		$temp = " Seribu" . kekata($x - 1000);
	} 
	else if ($x <1000000) 
	{
		$temp = kekata($x/1000) . " Ribu" . kekata($x % 1000);
	} 
	else if ($x <1000000000) 
	{
		$temp = kekata($x/1000000) . " Juta" . kekata($x % 1000000);
	} 
	else if ($x <1000000000000) 
	{
		$temp = kekata($x/1000000000) . " Milyar" . kekata(fmod($x,1000000000));
	} 
	else if ($x <1000000000000000) 
	{
		$temp = kekata($x/1000000000000) . " Trilyun" . kekata(fmod($x,1000000000000));
	}      
	
	return $temp;
}
function kekata_eng($x) 
{
	$x = abs($x);
	$angka = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven");
	$temp = "";
	if ($x <12) 
	{
		$temp = " ". $angka[$x];
	} 
	else if ($x <20) 
	{
		$temp = kekata_eng($x - 10). " Teens";
	} 
	else if ($x <100) 
	{
		$temp = kekata_eng($x/10)." Twenty". kekata_eng($x % 10);
	} 
	else if ($x <200) 
	{
		$temp = " Hundred" . kekata_eng($x - 100);
	} 
	else if ($x <1000) 
	{
		$temp = kekata_eng($x/100) . " Hundred" . kekata_eng($x % 100);
	} 
	else if ($x <2000) 
	{
		$temp = " Thousand" . kekata_eng($x - 1000);
	} 
	else if ($x <1000000) 
	{
		$temp = kekata_eng($x/1000) . " Thousand" . kekata_eng($x % 1000);
	} 
	else if ($x <1000000000) 
	{
		$temp = kekata_eng($x/1000000) . " Million" . kekata_eng($x % 1000000);
	} 
	else if ($x <1000000000000) 
	{
		$temp = kekata_eng($x/1000000000) . " Billion" . kekata_eng(fmod($x,1000000000));
	} 
	else if ($x <1000000000000000) 
	{
		$temp = kekata_eng($x/1000000000000) . " Trillion" . kekata_eng(fmod($x,1000000000000));
	}      
	
	return $temp;
}

function terbilang($x, $style=4) 
{
	if($x < 0) 
	{
		$hasil = "minus ". trim(kekata($x));
	} 
	else 
	{
		$hasil = trim(kekata($x));
	}      
	switch ($style) 
	{
		case 1:
			$hasil = strtoupper($hasil);
			break;
		case 2:
			$hasil = strtolower($hasil);
			break;
		case 3:
			$hasil = ucwords($hasil);
			break;
		default:
			$hasil = ucfirst($hasil);
			break;
	}      
	return $hasil;
}

function romanic_number($integer, $upcase = true)
{
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1);
    $return = '';
    while($integer > 0)
    {
        foreach($table as $rom=>$arb)
        {
            if($integer >= $arb)
            {
                $integer -= $arb;
                $return .= $rom;
                break;
            }
        }
    }

    return $return;
}

function getExe($tipe)
{
	switch ($tipe) {
	  case "application/pdf": $ctype="pdf"; break;
	  case "application/octet-stream": $ctype="exe"; break;
	  case "application/zip": $ctype="zip"; break;
	  case "application/msword": $ctype="doc"; break;
	  case "application/vnd.ms-excel": $ctype="xls"; break;
	  case "application/vnd.ms-powerpoint": $ctype="ppt"; break;
	  case "image/gif": $ctype="gif"; break;
	  case "image/png": $ctype="png"; break;
	  case "image/jpeg": $ctype="jpeg"; break;
	  case "image/jpg": $ctype="jpg"; break;
	  case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": $ctype="xlsx"; break;
	  case "application/vnd.openxmlformats-officedocument.wordprocessingml.document": $ctype="docx"; break;
	  default: $ctype="application/force-download";
	} 
	
	return $ctype;
} 
function getExtension($varSource)
{
	$temp = explode(".", $varSource);
	return end($temp);
}


function getExtension2($varSource)
{
	$temp = explode(".", $varSource);
	return end($temp);
}


function coalesce($varSource, $varReplace)
{
	if($varSource == "")
		return $varReplace;
		
	return $varSource;
}

function unserialized($serialized)
{
	$arrSerialized = str_replace('@', '"', $serialized);			
	return unserialize($arrSerialized);
}



function translate($id, $en)
{
	if($_SESSION["lang"] == "en")
		return $en;	
	else
		return $id;
}

function getBahasa()
{
	if($_SESSION["lang"] == "en")
		return "en";	
	else
		return "";
}

function getTerbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return getTerbilang($x - 10) . " belas";
  elseif ($x < 100)
    return getTerbilang($x / 10) . " puluh" . getTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . getTerbilang($x - 100);
  elseif ($x < 1000)
    return getTerbilang($x / 100) . " ratus" . getTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . getTerbilang($x - 1000);
  elseif ($x < 1000000)
    return getTerbilang($x / 1000) . " ribu" . getTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return getTerbilang($x / 1000000) . " juta" . getTerbilang($x % 1000000);
}


function renameFile($varSource)
{
	$varSource = str_replace(" ", "_",$varSource);
	$varSource = str_replace("'", "", $varSource);
	return $varSource;
}

function getColumnExcel($var)
{
	$var = strtoupper($var);
	if($var == "")
		return 0;
		
	if($var == "A")	$tmp = 1;
	elseif($var == "B")	$tmp = 2;
	elseif($var == "C")	$tmp = 3;
	elseif($var == "D")	$tmp = 4;
	elseif($var == "E")	$tmp = 5;
	elseif($var == "F")	$tmp = 6;
	elseif($var == "G")	$tmp = 7;
	elseif($var == "H")	$tmp = 8;
	elseif($var == "I")	$tmp = 9;
	elseif($var == "J")	$tmp = 10;
	elseif($var == "K")	$tmp = 11;
	elseif($var == "L")	$tmp = 12;
	elseif($var == "M")	$tmp = 13;
	elseif($var == "N")	$tmp = 14;
	elseif($var == "0")	$tmp = 15;
	elseif($var == "P")	$tmp = 16;
	elseif($var == "Q")	$tmp = 17;
	elseif($var == "R")	$tmp = 18;
	elseif($var == "S")	$tmp = 19;
	elseif($var == "T")	$tmp = 20;
	
	return $tmp;
}

function terbilang_en($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'terbilang_en only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . terbilang_en(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . terbilang_en($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = terbilang_en($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= terbilang_en($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

function decimalNumber($num2)
{
	if(strpos($num2, '.'))
		return number_format($num2, 2, '.', '');	
	
	return $num2;
}

function getconcatseparator($var, $vadd, $separator=",")
{
	$vreturn= "";
	if(empty($var))
		$vreturn = $vadd;
	else
	{
		$vreturn = $var.$separator.$vadd;
	}

	return $vreturn;
}

function in_array_column($text, $column, $array)
{
    if (!empty($array) && is_array($array))
    {
        for ($i=0; $i < count($array); $i++)
        {
            if ($array[$i][$column]==$text || strcmp($array[$i][$column],$text)==0) 
				$arr[] = $i;
        }
		return $arr;
    }
    // print_r($arr);exit;
    return "";
}

function arrorderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

function array_peta()
{
	$vreturn= array(
		array
		(
			"nama" => "Unit Induk Distribusi Jawa Timur"
			, "lat" => "-7.265271683865358"
			, "long" => "112.74358677085856"
			, "ket" => "PLN"
			, "detil" => "SDM: 92"
	    )
	    ,
	    array
		(
			"nama" => "Unit Induk Transmisi Jawa Bagian Timur dan Bali"
			, "lat" => "-7.349147100794933"
			, "long" => "112.70777494387427"
			, "ket" => "PLN"
		)
		,
	    array
		(
			"nama" => "Unit Induk Pembangkitan Tanjung Jati B"
			, "lat" => "-6.449058974675559"
			, "long" => "110.74176299043063"
			, "ket" => "PLN"
			, "detil" => "SDM: 46"
		)
		,
	    array
		(
			"nama" => "PT Sumber Segara Primadaya"
	        , "lat" => "-7.68446439555122"
	        , "long" => "109.08809877647036"
	        , "ket" => "NON PLN"
	        , "detil" => "Unit 1,2<br/>300 MW<br/>SDM: 56<br/>Unit 3<br/>600 MW<br/>SDM: 0<br/>Unit 3A<br/>1000 MW<br/>SDM: 0"
		)
		,
	    array
		(
			"nama" => "PT TJB Power Services"
	        , "lat" => "-6.448727023072568"
	        , "long" => "110.7418649518022"
	        , "ket" => "NON PLN"
	        , "detil" => "550 MW<br/>SDM: 0"
		)
		,
	    array
		(
			"nama" => "PT Komipo Pembangkitan Jawa Bali"
			, "lat" => "-6.44543537824147"
			, "long" => "110.74662641502371"
			, "ket" => "NON PLN"
			, "detil" => "660 MW<br/>SDM: 151"
		)
		,
	    array
		(
			"nama" => "PT Bhumi Jepara Service"
	        , "lat" => "-6.445838639377709"
	        , "long" => "110.75000724385947"
	        , "ket" => "NON PLN"
	        , "detil" => "1000 MW<br/>SDM: 192"
		)
		,
	    array
		(
			"nama" => "PT Bukit Pembangkit Innovative"
	        , "lat" => "-3.636907868466981"
	        , "long" => "103.92451637430075"
	        , "ket" => "NON PLN"
	        , "detil" => "135 MW<br/>SDM: 0"
		)
		,
	    array
		(
			"nama" => "PT Nusantara Power Construction"
	        , "lat" => "-6.299048456229288"
	        , "long" => "106.83214802792256"
	        , "ket" => "NON PLN"
		)
		,
	    array
		(
			"nama" => "PLN Nusantara Power"
			, "lat" => "-7.317139134644471"
			, "long" => "112.73079468766267"
			, "ket" => "PLNNP"
			, "detil" => "SDM: 5"
		)
		,
	    array
		(
			"nama" => "Unit Pembangkitan Arun"
			, "lat" => "5.215690454503681"
			, "long" => "97.09108126654075"
			, "ket" => "PLNNP"
			, "detil" => "184 MW<br/>SDM: 51"
		)
		,
	    array
		(
			"nama" => "UP Pekanbaru ULPLTG Duri"
	        , "lat" => "0.5489004310461164"
	        , "long" => "101.4611356453437"
	        , "ket" => "PLNNP"
	        , "detil" => "16 MW<br/>SDM: 12"
		)
		,
	    array
		(
			"nama" => "UP Pekanbaru ULPLTG Teluk Lembu"
	        , "lat" => "0.29570438749577244"
	        , "long" => "100.8854078075583"
	        , "ket" => "PLNNP"
	        , "detil" => "21.6 MW<br/>SDM: 12"
		)
		,
	    array
		(
			"nama" => "UP Pekanbaru ULPLTA Koto Panjang"
	        , "lat" => "0.29570438749577244"
	        , "long" => "100.8854078075583"
	        , "ket" => "PLNNP"
	        , "detil" => "38 MW<br/>SDM: 12"
		)
		,
	    array
		(
			"nama" => "UP Tenayan"
			, "lat" => "0.5630098994438091"
			, "long" => "101.52495161865764"
			, "ket" => "PLNNP"
			, "detil" => "110 MW<br/>SDM: 172"
		)
		,
	    array
		(
			"nama" => "UP Bukit Asam"
			, "lat" => "-3.758137892457901"
			, "long" => "103.79261041313806"
			, "ket" => "PLNNP"
			, "detil" => "65 MW<br/>SDM: 41"
		)
		,
	    array
		(
			"nama" => "UP Muara Karang"
			, "lat" => "-6.111331491034245"
			, "long" => "106.78268775089329"
			, "ket" => "PLNNP"
			, "detil" => "909 MW<br/>SDM: 108"
		)
		,
	    array
		(
			"nama" => "UP Muara Tawar"
			, "lat" => "-6.089408223059835"
			, "long" => "106.9973221745397"
			, "ket" => "PLNNP"
			, "detil" => "1778 MW<br/>SDM: 63"
		)
		,
	    array
		(
			"nama" => "UP Indramayu"
			, "lat" => "-6.273407326680652"
			, "long" => "107.97399516137423"
			, "ket" => "PLNNP"
			, "detil" => "330 MW<br/>SDM: 110"
		)
		,
	    array
		(
			"nama" => "UP Cirata PLTA Cirata"
	        , "lat" => "-6.673413558185224"
	        , "long" => "107.35110109729187"
	        , "ket" => "PLNNP"
	        , "detil" => "126 MW<br/>SDM: 53"
		)
		,
	    array
		(
			"nama" => "UP Rembang"
	        , "lat" => "-6.636385962651387"
	        , "long" => "111.47581000649517"
	        , "ket" => "PLNNP"
	        , "detil" => "315 MW<br/>SDM: 91"
		)
		,
	    array
		(
			"nama" => "UP Tanjung Awar Awar"
	        , "lat" => "-6.810353452381976"
	        , "long" => "111.99605018434366"
	        , "ket" => "PLNNP"
	        , "detil" => "350 MW<br/>SDM: 91"
		)
		,
	    array
		(
			"nama" => "UP Pacitan"
			, "lat" => "-8.25772578906238"
			, "long" => "111.37346336471643"
			, "ket" => "PLNNP"
			, "detil" => "315 MW<br/>SDM: 256"
		)
		,
	    array
		(
			"nama" => "UP Gresik"
			, "lat" => "-7.164202797385325"
			, "long" => "112.66070708031455"
			, "ket" => "PLNNP"
			, "detil" => "74 MW<br/>SDM: 2219"
		)
		,
	    array
		(
			"nama" => "UP Brantas"
			, "lat" => "-8.146799442677072"
			, "long" => "112.47315644678758"
			, "ket" => "PLNNP"
			, "detil" => "275 MW<br/>SDM: 31"
		)
		,
	    array
		(
			"nama" => "UP Paiton Paiton 1,2"
	        , "lat" => "-7.716221445489223"
	        , "long" => "113.58618788027206"
	        , "ket" => "PLNNP"
	        , "detil" => "400 MW<br/>SDM: 125"
		)
		,
	    array
		(
			"nama" => "UP Paiton Paiton 9"
	        , "lat" => "-7.710482709892657"
	        , "long" => "113.57193808808987"
	        , "ket" => "PLNNP"
	        , "detil" => "660 MW<br/>SDM: 78"
		)
		,
	    array
		(
			"nama" => "UP Kaltim Teluk"
	        , "lat" => "-1.1665832326913053"
	        , "long" => "116.79168208188736"
	        , "ket" => "PLNNP"
	        , "detil" => "110 MW<br/>SDM: 225"
		)
		,
	    array
		(
			"nama" => "UP Pulang Pisau"
	        , "lat" => "-2.7534235353433356"
	        , "long" => "114.25752311258543"
	        , "ket" => "PLNNP"
	        , "detil" => "60 MW<br/>SDM: 209"
		)
		,
	    array
		(
			"nama" => "UP Kapuas ULPLTD Sei Wie"
	        , "lat" => "-3.0070662501323113"
	        , "long" => "114.38628281742434"
	        , "ket" => "PLNNP"
	        , "detil" => "1.5 MW<br/>SDM: 16"
		)
		,
	    array
		(
			"nama" => "UP Kapuas ULPLTD Sei Raya "
	        , "lat" => "-0.07248800317770383"
	        , "long" => "109.38031230355766"
	        , "ket" => "PLNNP"
	        , "detil" => "8.8 MW"
		)
		,
	    array
		(
			"nama" => "UP Kapuas ULPLTD Siantan "
	        , "lat" => "-0.0022513502532613174"
	        , "long" => "109.32813957709607"
	        , "ket" => "PLNNP"
	        , "detil" => "4 MW"
		)
		/*,
	    array
		(
			UP Tarakan
			7.6	MW
		)*/
		,
	    array
		(
			"nama" => "UP Gorontalo ULPLTD Silae"
	        , "lat" => "0.5537220495070777"
	        , "long" => "123.05457029537212"
	        , "ket" => "PLNNP"
	        , "detil" => "1.3 MW<br/>SDM: 46"
		)
		,
	    array
		(
			"nama" => "UP Gorontalo ULPLTD Nopi"
	        , "lat" => "0.5760154674263721"
	        , "long" => "123.04927565971676"
	        , "ket" => "PLNNP"
	        , "detil" => "1.2 MW<br/>SDM: 27"
		)
		,
	    array
		(
			"nama" => "ULPLTD Telaga"
	        , "lat" => "0.57621577820584"
	        , "long" => "123.04876411441491"
	        , "ket" => "PLNNP"
	        , "detil" => "2.5 MW<br/>SDM: 33"
		)
		,
	    array
		(
			"nama" => "UP Sengkang"
	        , "lat" => "-4.135122992599282"
	        , "long" => "120.03732891144315"
	        , "ket" => "PLNNP"
	        , "detil" => "135 MW<br/>SDM: 84"
		)
		,
	    array
		(
			"nama" => "UP Punagaya"
	        , "lat" => "-5.622699222197931"
	        , "long" => "119.55341394700471"
	        , "ket" => "PLNNP"
	        , "detil" => "100 MW<br/>SDM: 4"
		)
		,
	    array
		(
			"nama" => "Unit Maintenance Repair dan Overhaul JP-1"
	        , "lat" => "-6.110284000484365"
	        , "long" => "106.77966931257725"
	        , "ket" => "PLNNP"
	        , "detil" => "SDM: 52"
		)
		,
	    array
		(
	        "nama" => "Unit Maintenance Repair dan Overhaul JP-2"
	        , "lat" => "-7.169190463457479"
	        , "long" => "112.66134056470472"
	        , "ket" => "PLNNP"
	        , "detil" => "SDM: 41"
		)
		,
	    array
		(
	        "nama" => "Unit Maintenance Repair dan Overhaul JIRE"
	        , "lat" => "-7.169190463457479"
	        , "long" => "112.66134056470472"
	        , "ket" => "PLNNP"
		)
		,
	    array
		(
	        "nama" => "PLTU Nagan Raya"
	        , "lat" => "4.111965201188729"
	        , "long" => "96.19973633545887"
	        , "ket" => "PLNNP"
		)
		,
	    array
		(
	        "nama" => "PLTU Sebalang"
	        , "lat" => "-5.585678549150327"
	        , "long" => "105.3875978972293"
	        , "ket" => "PLNNP"
		)
		,
	    array
		(
		    "nama" => "PLN Nusantara Power Services"
	        , "lat" => "-7.378487313767148"
	        , "long" => "112.73730172481336"
	        , "ket" => "PLNNPS"
	        , "detil" => "SDM: 130"
	    )
	    ,
	    array
		(
		    "nama" => "PLTA Asahan"
	        , "lat" => "2.514552947365227"
	        , "long" => "99.26432943545888"
	        , "ket" => "PLNNPS"
	        , "detil" => "90 MW<br/>SDM: 6"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Pangkalan Susu"
		    , "lat" => "4.1197531125825915"
		    , "long" => "98.2588393787068"
		    , "ket" => "PLNNPS"
		    , "detil" => "210 MW<br/>SDM: 16"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Bangka"
	        , "lat" => "-2.077047753241415"
	        , "long" => "106.14954344988617"
	        , "ket" => "PLNNPS"
	        , "detil" => "30 MW<br/>SDM: 178"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Belitung"
	        , "lat" => "-2.892176199707705"
	        , "long" => "107.56464421324927"
	        , "ket" => "PLNNPS"
	        , "detil" => "16.5 MW<br/>SDM: 142"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Tembilahan"
	        , "lat" => "-0.29724135371252736"
	        , "long" => "103.20415826706524"
	        , "ket" => "PLNNPS"
	        , "detil" => "7 MW<br/>SDM: 96"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Banjarsari"
	        , "lat" => "-3.7226746331258824"
	        , "long" => "103.6892869542416"
	        , "ket" => "PLNNPS"
	        , "detil" => "135 MW<br/>SDM: 51"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Belawan"
	        , "lat" => "3.7706378375955327"
	        , "long" => "98.67137910760827"
	        , "ket" => "PLNNPS"
	        , "detil" => "65 MW<br/>SDM: 2"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Bawean PLTMG"
	        , "lat" => "-5.847603976996877"
	        , "long" => "112.64657740944777"
	        , "ket" => "PLNNPS"
	        , "detil" => "3 MW<br/>SDM: 16"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Ketapang"
	        , "lat" => "-1.7441820764456781"
	        , "long" => "109.93683810496653"
	        , "ket" => "PLNNPS"
	        , "detil" => "10 MW<br/>SDM: 142"
	    )
	    ,
	    array
		(
			"nama" => "PLTMH Sampean Baru"
	        , "lat" => "-7.825347298043286"
	        , "long" => "113.937741151809"
	        , "ket" => "PLNNPS"
	        , "detil" => "1.8 MW<br/>SDM: 9"
	    )
	    ,
	    array
		(
			"nama" => "PLTU dan PLTMG Kendari"
	        , "lat" => "-3.8962164112757307"
	        , "long" => "122.53909096339702"
	        , "ket" => "PLNNPS"
	        , "detil" => "10 MW<br/>SDM: 217"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Ampana"
	        , "lat" => "-0.9642324434254224"
	        , "long" => "121.82304542104303"
	        , "ket" => "PLNNPS"
	        , "detil" => "3 MW<br/>SDM: 117"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Anggrek"
	        , "lat" => "0.8505533628510964"
	        , "long" => "122.79648255171908"
	        , "ket" => "PLNNPS"
	        , "detil" => "25 MW<br/>SDM: 150"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Amurang"
	        , "lat" => "1.1833284359761176"
	        , "long" => "124.47968338055368"
	        , "ket" => "PLNNPS"
	        , "detil" => "25 MW<br/>SDM: 172"
	    )
	    ,
	    array
		(
			"nama" => "PLTD Suppa"
	        , "lat" => "-3.9694998928943144"
	        , "long" => "119.62460205018176"
	        , "ket" => "PLNNPS"
	        , "detil" => "10.4 MW<br/>SDM: 34"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Tidore"
	        , "lat" => "0.7390907419673347"
	        , "long" => "127.3885565633646"
	        , "ket" => "PLNNPS"
	        , "detil" => "7 MW<br/>SDM: 157"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Ternate"
	        , "lat" => "0.7672439124708004"
	        , "long" => "127.30635420754176"
	        , "ket" => "PLNNPS"
	        , "detil" => "10 MW<br/>SDM: 24"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Ropa"
	        , "lat" => "-8.50873486471277"
	        , "long" => "121.70153376476016"
	        , "ket" => "PLNNPS"
	        , "detil" => "7 MW<br/>SDM: 134"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Bolok"
	        , "lat" => "-10.238966682543262"
	        , "long" => "123.4902362769962"
	        , "ket" => "PLNNPS"
	        , "detil" => "16.5 MW<br/>SDM: 140"
	    )
	    ,
	    array
		(
			"nama" => "PLTU Sambelia"
	        , "lat" => "-8.418929767489166"
	        , "long" => "116.70672232631549"
	        , "ket" => "PLNNPS"
	        , "detil" => "50 MW<br/>SDM: 23"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Halmahera Timur"
	        , "lat" => "0.8428131473183459"
	        , "long" => "128.25607458425122"
	        , "ket" => "PLNNPS"
	        , "detil" => "60 MW<br/>SDM: 50"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Flores"
	        , "lat" => "-8.427641318969759"
	        , "long" => "119.93554682308418"
	        , "ket" => "PLNNPS"
	        , "detil" => "7 MW<br/>SDM: 20"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Bima"
	        , "lat" => "-8.409430235504562"
	        , "long" => "118.69938230764244"
	        , "ket" => "PLNNPS"
	        , "detil" => "50 MW<br/>SDM: 32"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Sumbawa"
	        , "lat" => "-8.447118316436235"
	        , "long" => "117.33547412880755"
	        , "ket" => "PLNNPS"
	        , "detil" => "50 MW<br/>SDM: 33"
	    )
	    ,
	    array
		(
			"nama" => "PLTMG Maumere"
	        , "lat" => "-8.619835177362278"
	        , "long" => "122.33917242298838"
	        , "ket" => "PLNNPS"
	        , "detil" => "40 MW<br/>SDM: 33"
	    )
	    /*,
	    array
		(
		    Workshop Palembang
		    6   
	    )*/
	    ,
	    array
		(
	    	"nama" => "Workshop Bitung"
	    	, "lat" => "1.4557525328004721"
	    	, "long" => "125.16205856893525"
	    	, "ket" => "PLNNPS"
	    	, "detil" => "SDM: 6"
	    )
	    ,
	    array
		(
	    	"nama" => "PLTMG Teluk Lembu"
	    	, "lat" => "0.5487663261966295"
	    	, "long" => "101.46041680884842"
	    	, "ket" => "PLNNPS"
	    	, "detil" => "30 MW"
	    )
	    ,
	    array
		(
	    	"nama" => "PLTMG Duri"
	    	, "lat" => "1.0744404570741761"
	    	, "long" => "101.28148305358467"
	    	, "ket" => "PLNNPS"
	    	, "detil" => "16 MW"
	    )
	    /*,
	    array
		(
			PLTA Peusangan
	    )*/
	    ,
	    array
		(
	    	"nama" => "PT Pertamina Kilang Balikpapan"
	    	, "lat" => "-1.2528943631685108"
	    	, "long" => "116.82158479535707"
	    	, "ket" => "PLNNPS"
	    )
	    ,
	    array
		(
	    	"nama" => "PLTMG Bau bau"
	    	, "lat" => "-5.396275425058231"
	    	, "long" => "122.62776810887932"
	    	, "ket" => "PLNNPS"
	    )
	    /*
	    ,
	    array
		(
	    )
	    ,
	    array
		(
		    "nama" => ""
	        , "lat" => ""
	        , "long" => ""
	        , "ket" => ""
	        , "detil" => "0 MW<br/>SDM: 0"
	    )
		*/
	);

	return $vreturn;
}

function array_petax()
{
    $array = 
    [
	    0 => [
	        "nama" => "Unit Induk Distribusi Jawa Timur",
	        "lat" => "-7.265271683865358",
	        "long" => "112.74358677085856",
	        "ket" => "PLN"
	    ],
	    1 => [
	        "nama" => "Unit Induk Transmisi Jawa Bagian Timur dan Bali",
	        "lat" => "-7.349147100794933",
	        "long" => "112.70777494387427",
	        "ket" => "PLN"
	    ],
	    2 => [
	        "nama" => "Unit Induk Pembangkitan Tanjung Jati B",
	        "lat" => "-6.449058974675559",
	        "long" => "110.74176299043063",
	        "ket" => "PLN"
	    ],
	    3 => [
	        "nama" => "PT Nusantara Power Construction",
	        "lat" => "-6.299181757005736",
	        "long" => "106.83195491006677",
	        "ket" => "PLN"
	    ],
	    4 => [
	        "nama" => "PT Prima Layanan Nasional Suku Cadang",
	        "lat" => "-6.240501754646522",
	        "long" => "106.80460439231561",
	        "ket" => "PLN"
	    ],
	    5 => [
	        "nama" => "PT Sumber Segara Primadaya"
	        , "lat" => "-7.68446439555122"
	        , "long" => "109.08809877647036"
	        , "ket" => "Non PLN"
	    ],
	    6 => [
	        "nama" => "PT TJB Power Services"
	        , "lat" => "-6.448727023072568"
	        , "long" => "110.7418649518022"
	        , "ket" => "NON PLN"
	        , "mw" => "550"
	    ],
	    7 => [
	        "nama" => "PT Komipo Pembangkitan Jawa Bali",
	        "lat" => "-6.44543537824147",
	        "long" => "110.74662641502371",
	        "ket" => "NON PLN"
	    ],
	    8 => [
	        "nama" => "PT Bhumi Jepara Service",
	        "lat" => "-6.445838639377709",
	        "long" => "110.75000724385947",
	        "ket" => "NON PLN"
	    ],
	    9 => [
	        "nama" => "PT Bukit Pembangkit Innovative",
	        "lat" => "-3.636907868466981",
	        "long" => "103.92451637430075",
	        "ket" => "NON PLN"
	    ],
	    10 => [
	        "nama" => "PT Aneka Jasa Grhadika",
	        "lat" => "-7.151279539099802",
	        "long" => "112.63457404757108",
	        "ket" => "NON PLN"
	    ],
	    11 => [
	        "nama" => "PLN Nusantara Power",
	        "lat" => "-7.317139134644471",
	        "long" => "112.73079468766267",
	        "ket" => "PLNNP"
	    ],
	    12 => [
	        "nama" => "Unit Pembangkitan Arun",
	        "lat" => "5.215690454503681",
	        "long" => "97.09108126654075",
	        "ket" => "PLNNP"
	    ],
	    13 => [
	        "nama" => "UP Pekanbaru ULPLTG Duri",
	        "lat" => "0.5489004310461164",
	        "long" => "101.4611356453437",
	        "ket" => "PLNNP"
	    ],
	    14 => [
	        "nama" => "UP Pekanbaru ULPLTG Teluk Lembu",
	        "lat" => "0.29570438749577244",
	        "long" => "100.8854078075583",
	        "ket" => "PLNNP"
	    ],
	    15 => [
	        "nama" => "UP Pekanbaru ULPLTA Koto Panjang",
	        "lat" => "0.29570438749577244",
	        "long" => "100.8854078075583",
	        "ket" => "PLNNP"
	    ],
	    16 => [
	        "nama" => "UP Tenayan",
	        "lat" => "0.5630098994438091",
	        "long" => "101.52495161865764",
	        "ket" => "PLNNP"
	    ],
	    17 => [
	        "nama" => "UP Bukit Asam",
	        "lat" => "-3.758137892457901",
	        "long" => "103.79261041313806",
	        "ket" => "PLNNP"
	    ],
	    19 => [
	        "nama" => "UP Muara Tawar",
	        "lat" => "-6.089408223059835",
	        "long" => "106.9973221745397",
	        "ket" => "PLNNP"
	    ],
	    20 => [
	        "nama" => "UP Indramayu",
	        "lat" => "-6.273407326680652",
	        "long" => "107.97399516137423",
	        "ket" => "PLNNP"
	    ],
	    21 => [
	        "nama" => "UP Cirata PLTA Cirata",
	        "lat" => "-6.673413558185224",
	        "long" => "107.35110109729187",
	        "ket" => "PLNNP"
	    ],
	    23 => [
	        "nama" => "UP Tanjung Awar Awar",
	        "lat" => "-6.810353452381976",
	        "long" => "111.99605018434366",
	        "ket" => "PLNNP"
	    ],
	    26 => [
	        "nama" => "UP Brantas",
	        "lat" => "-8.146799442677072",
	        "long" => "112.47315644678758",
	        "ket" => "PLNNP"
	    ],
	    27 => [
	        "nama" => "UP Paiton Paiton 1,2",
	        "lat" => "-7.716221445489223",
	        "long" => "113.58618788027206",
	        "ket" => "PLNNP"
	    ],
	    28 => [
	        "nama" => "UP Paiton Paiton 9",
	        "lat" => "-7.710482709892657",
	        "long" => "113.57193808808987",
	        "ket" => "PLNNP"
	    ],
	    29 => [
	        "nama" => "UP Kaltim Teluk",
	        "lat" => "-1.1665832326913053",
	        "long" => "116.79168208188736",
	        "ket" => "PLNNP"
	    ],
	    30 => [
	        "nama" => "UP Pulang Pisau",
	        "lat" => "-2.7534235353433356",
	        "long" => "114.25752311258543",
	        "ket" => "PLNNP"
	    ],
	    31 => [
	        "nama" => "UP Kapuas ULPLTD Sei Wie",
	        "lat" => "-3.0070662501323113",
	        "long" => "114.38628281742434",
	        "ket" => "PLNNP"
	    ],
	    32 => [
	        "nama" => "UP Kapuas ULPLTD Sei Raya ",
	        "lat" => "-0.07248800317770383",
	        "long" => "109.38031230355766",
	        "ket" => "PLNNP"
	    ],
	    33 => [
	        "nama" => "UP Kapuas ULPLTD Siantan ",
	        "lat" => "-0.0022513502532613174",
	        "long" => "109.32813957709607",
	        "ket" => "PLNNP"
	    ],
	    35 => [
	        "nama" => "UP Gorontalo ULPLTD Silae",
	        "lat" => "0.5537220495070777",
	        "long" => "123.05457029537212",
	        "ket" => "PLNNP"
	    ],
	    36 => [
	        "nama" => "UP Gorontalo ULPLTD Nopi",
	        "lat" => "0.5760154674263721",
	        "long" => "123.04927565971676",
	        "ket" => "PLNNP"
	    ],
	    37 => [
	        "nama" => "ULPLTD Telaga",
	        "lat" => "0.57621577820584",
	        "long" => "123.04876411441491",
	        "ket" => "PLNNP"
	    ],
	    38 => [
	        "nama" => "UP Sengkang",
	        "lat" => "-4.135122992599282",
	        "long" => "120.03732891144315",
	        "ket" => "PLNNP"
	    ],
	    39 => [
	        "nama" => "UP Punagaya",
	        "lat" => "-5.622699222197931",
	        "long" => "119.55341394700471",
	        "ket" => "PLNNP"
	    ],
	    40 => [
	        "nama" => "PLTU Pangkalan Susu",
	        "lat" => "4.1197531125825915",
	        "long" => "98.2588393787068",
	        "ket" => "PLNNPS"
	    ],
	    41 => [
	        "nama" => "PLTU Bangka",
	        "lat" => "-2.077047753241415",
	        "long" => "106.14954344988617",
	        "ket" => "PLNNPS"
	    ],
	    42 => [
	        "nama" => "PLTU Belitung",
	        "lat" => "-2.892176199707705",
	        "long" => "107.56464421324927",
	        "ket" => "PLNNPS"
	    ],
	    43 => [
	        "nama" => "PLTU Tembilahan",
	        "lat" => "-0.29724135371252736",
	        "long" => "103.20415826706524",
	        "ket" => "PLNNPS"
	    ],
	    44 => [
	        "nama" => "PLTU Banjarsari",
	        "lat" => "-3.7226746331258824",
	        "long" => "103.6892869542416",
	        "ket" => "PLNNPS"
	    ],
	    45 => [
	        "nama" => "PLTU Belawan",
	        "lat" => "3.7706378375955327",
	        "long" => "98.67137910760827",
	        "ket" => "PLNNPS"
	    ],
	    46 => [
	        "nama" => "PLTMG Bawean PLTMG",
	        "lat" => "-5.847603976996877",
	        "long" => "119.55341394700471",
	        "ket" => "PLNNPS"
	    ],
	    47 => [
	        "nama" => "PLTU Ketapang",
	        "lat" => "-1.7441820764456781",
	        "long" => "109.93683810496653",
	        "ket" => "PLNNPS"
	    ],
	    48 => [
	        "nama" => "PLTMH Sampean Baru",
	        "lat" => "-7.825347298043286",
	        "long" => "113.937741151809",
	        "ket" => "PLNNPS"
	    ],
	    49 => [
	        "nama" => "PLTU Kendari",
	        "lat" => "-3.8962164112757307",
	        "long" => "122.53909096339702",
	        "ket" => "PLNNPS"
	    ],
	    50 => [
	        "nama" => "PLTU Ampana",
	        "lat" => "-0.9642324434254224",
	        "long" => "121.82304542104303",
	        "ket" => "PLNNPS"
	    ],
	    51 => [
	        "nama" => "PLTU Anggrek",
	        "lat" => "0.8505533628510964",
	        "long" => "122.79648255171908",
	        "ket" => "PLNNPS"
	    ],
	    52 => [
	        "nama" => "PLTU Amurang",
	        "lat" => "1.1833284359761176",
	        "long" => "124.47968338055368",
	        "ket" => "PLNNPS"
	    ],
	    53 => [
	        "nama" => "PLTD Suppa",
	        "lat" => "-3.9694998928943144",
	        "long" => "119.62460205018176",
	        "ket" => "PLNNPS"
	    ],
	    54 => [
	        "nama" => "PLTU Tidore",
	        "lat" => "0.7390907419673347",
	        "long" => "127.3885565633646",
	        "ket" => "PLNNPS"
	    ],
	    55 => [
	        "nama" => "PLTMG Ternate",
	        "lat" => "0.7672439124708004",
	        "long" => "127.30635420754176",
	        "ket" => "PLNNPS"
	    ],
	    56 => [
	        "nama" => "PLTU Ropa",
	        "lat" => "-8.50873486471277",
	        "long" => "121.70153376476016",
	        "ket" => "PLNNPS"
	    ],
	    57 => [
	        "nama" => "PLTU Bolok",
	        "lat" => "-10.238966682543262",
	        "long" => "123.4902362769962",
	        "ket" => "PLNNPS"
	    ],
	    58 => [
	        "nama" => "PLTU Sambelia",
	        "lat" => "-8.418929767489166",
	        "long" => "116.70672232631549",
	        "ket" => "PLNNPS"
	    ],
	    59 => [
	        "nama" => "PLTMG Halmahera Timur",
	        "lat" => "0.8428131473183459",
	        "long" => "128.25607458425122",
	        "ket" => "PLNNPS"
	    ],
	    60 => [
	        "nama" => "PLTMG Flores",
	        "lat" => "-8.427641318969759",
	        "long" => "119.93554682308418",
	        "ket" => "PLNNPS"
	    ],
	    61 => [
	        "nama" => "PLTMG Bima",
	        "lat" => "-8.409430235504562",
	        "long" => "118.69938230764244",
	        "ket" => "PLNNPS"
	    ],
	    62 => [
	        "nama" => "PLTMG Sumbawa",
	        "lat" => "-8.447118316436235",
	        "long" => "117.33547412880755",
	        "ket" => "PLNNPS"
	    ],
	    63 => [
	        "nama" => "PLTMG Maumere",
	        "lat" => "-8.619835177362278",
	        "long" => "122.33917242298838",
	        "ket" => "PLNNPS"
	    ],
	    64 => [
	        "nama" => "PLTU Punagaya",
	        "lat" => "-5.620256098872543",
	        "long" => "119.54905145062085",
	        "ket" => "PLNNPS"
	    ],
	    65 => [
	        "nama" => "Workshop Bitung",
	        "lat" => "1.4557525328004721",
	        "long" => "125.16205856893525",
	        "ket" => "PLNNPS"
	    ],
	    66 => [
	        "nama" => "PLTMG Duri",
	        "lat" => "1.0744404570741761",
	        "long" => "101.28148305358467",
	        "ket" => "PLNNPS"
	    ]
	];

    return $array;
}
?>