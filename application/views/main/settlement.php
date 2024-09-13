<?
$reqBulan= $this->input->get("reqBulan");
$reqTahun= $this->input->get("reqTahun");
$rpro= $this->input->get("r");
$rcust= $this->input->get("c");

if(empty($reqBulan)){
    $reqBulan=8;
}

if(empty($reqTahun)){
    $reqTahun=2024;
}

if(empty($rpro))
{
  $rpro= "rutin";
}

$arrprk= array(
  array("key"=>"PLN-NP", "label"=>"PLN-NP")
  , array("key"=>"PJBS", "label"=>"PJBS")
  , array("key"=>"PLN", "label"=>"PLN")
  , array("key"=>"NON PLN", "label"=>"NON PLN")
);
// print_r($arrprk);exit;

$arrjenispekerjaan= array(
  array("key"=>"kontrak", "label"=>"Kontrak", "color"=>"#e75656")
  , array("key"=>"laporan_onprogress", "label"=>"Laporan/On Progress", "color"=>"#6d6d6d")
  , array("key"=>"bapp", "label"=>"BAPP", "color"=>"#ede731")
  , array("key"=>"siap_tagih", "label"=>"Siap Tagih", "color"=>"#facb2c")
  , array("key"=>"tertagih", "label"=>"Tertagih", "color"=>"#9fd566")
  , array("key"=>"terbayar", "label"=>"Terbayar", "color"=>"#69abdb")
);

/*array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[0]["key"], "jenis"=>"rutin", "periode"=>"072024"
  , "prk"=> $arrprk[0]["key"], "nilai"=>195)
, array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[1]["key"], "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], "nilai"=>30188)
, array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[2]["key"], "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], "nilai"=>199)
, array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[3]["key"], "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], "nilai"=>862)
, array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[4]["key"], "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], "nilai"=>4328)
, array("group"=>"rutin-072024", "groupdetil"=>'rutin-072024-'.$arrjenispekerjaan[5]["key"], "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], "nilai"=>0)*/

$arrpekerjaan= array(
  array("group"=>"rutin-072024", "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], $arrjenispekerjaan[0]["key"]=>195, $arrjenispekerjaan[1]["key"]=>30188, $arrjenispekerjaan[2]["key"]=>199, $arrjenispekerjaan[3]["key"]=>862, $arrjenispekerjaan[4]["key"]=>4328, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-072024", "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[1]["key"], $arrjenispekerjaan[0]["key"]=>827, $arrjenispekerjaan[1]["key"]=>22362, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>156, $arrjenispekerjaan[4]["key"]=>18143, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-072024", "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[2]["key"], $arrjenispekerjaan[0]["key"]=>64, $arrjenispekerjaan[1]["key"]=>1321, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>0, $arrjenispekerjaan[4]["key"]=>1007, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-072024", "jenis"=>"rutin", "periode"=>"072024", "prk"=> $arrprk[3]["key"], $arrjenispekerjaan[0]["key"]=>0, $arrjenispekerjaan[1]["key"]=>5455, $arrjenispekerjaan[2]["key"]=>440, $arrjenispekerjaan[3]["key"]=>0, $arrjenispekerjaan[4]["key"]=>4820, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-072024", "jenis"=>"non_rutin", "periode"=>"072024", "prk"=> $arrprk[0]["key"], $arrjenispekerjaan[0]["key"]=>21534, $arrjenispekerjaan[1]["key"]=>9873, $arrjenispekerjaan[2]["key"]=>922, $arrjenispekerjaan[3]["key"]=>2406, $arrjenispekerjaan[4]["key"]=>26145, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-072024", "jenis"=>"non_rutin", "periode"=>"072024", "prk"=> $arrprk[1]["key"], $arrjenispekerjaan[0]["key"]=>14384, $arrjenispekerjaan[1]["key"]=>2104, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>0, $arrjenispekerjaan[4]["key"]=>4099, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-072024", "jenis"=>"non_rutin", "periode"=>"072024", "prk"=> $arrprk[2]["key"], $arrjenispekerjaan[0]["key"]=>1448, $arrjenispekerjaan[1]["key"]=>0, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>0, $arrjenispekerjaan[4]["key"]=>0, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-072024", "jenis"=>"non_rutin", "periode"=>"072024", "prk"=> $arrprk[3]["key"], $arrjenispekerjaan[0]["key"]=>911, $arrjenispekerjaan[1]["key"]=>356, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>0, $arrjenispekerjaan[4]["key"]=>107, $arrjenispekerjaan[5]["key"]=>0)

  , array("group"=>"rutin-082024", "jenis"=>"rutin", "periode"=>"082024", "prk"=> $arrprk[0]["key"], $arrjenispekerjaan[0]["key"]=>1691, $arrjenispekerjaan[1]["key"]=>16511, $arrjenispekerjaan[2]["key"]=>95, $arrjenispekerjaan[3]["key"]=>362, $arrjenispekerjaan[4]["key"]=>20318, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-082024", "jenis"=>"rutin", "periode"=>"082024", "prk"=> $arrprk[1]["key"], $arrjenispekerjaan[0]["key"]=>778, $arrjenispekerjaan[1]["key"]=>16924, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>5721, $arrjenispekerjaan[4]["key"]=>14814, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-082024", "jenis"=>"rutin", "periode"=>"082024", "prk"=> $arrprk[2]["key"], $arrjenispekerjaan[0]["key"]=>0, $arrjenispekerjaan[1]["key"]=>1347, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>704, $arrjenispekerjaan[4]["key"]=>266, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"rutin-082024", "jenis"=>"rutin", "periode"=>"082024", "prk"=> $arrprk[3]["key"], $arrjenispekerjaan[0]["key"]=>0, $arrjenispekerjaan[1]["key"]=>4514, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>801, $arrjenispekerjaan[4]["key"]=>3819, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-082024", "jenis"=>"non_rutin", "periode"=>"082024", "prk"=> $arrprk[0]["key"], $arrjenispekerjaan[0]["key"]=>26427, $arrjenispekerjaan[1]["key"]=>8450, $arrjenispekerjaan[2]["key"]=>2001, $arrjenispekerjaan[3]["key"]=>8897, $arrjenispekerjaan[4]["key"]=>15978, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-082024", "jenis"=>"non_rutin", "periode"=>"082024", "prk"=> $arrprk[1]["key"], $arrjenispekerjaan[0]["key"]=>16478, $arrjenispekerjaan[1]["key"]=>2685, $arrjenispekerjaan[2]["key"]=>38, $arrjenispekerjaan[3]["key"]=>3222, $arrjenispekerjaan[4]["key"]=>1699, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-082024", "jenis"=>"non_rutin", "periode"=>"082024", "prk"=> $arrprk[2]["key"], $arrjenispekerjaan[0]["key"]=>0, $arrjenispekerjaan[1]["key"]=>466, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>1070, $arrjenispekerjaan[4]["key"]=>1041, $arrjenispekerjaan[5]["key"]=>0)
  , array("group"=>"non_rutin-082024", "jenis"=>"non_rutin", "periode"=>"082024", "prk"=> $arrprk[3]["key"], $arrjenispekerjaan[0]["key"]=>0, $arrjenispekerjaan[1]["key"]=>272, $arrjenispekerjaan[2]["key"]=>0, $arrjenispekerjaan[3]["key"]=>1296, $arrjenispekerjaan[4]["key"]=>107, $arrjenispekerjaan[5]["key"]=>0)
);
// print_r($arrpekerjaan);exit;

$arrcustomer= array(
  array("key"=>"PLN-NP", "label"=>"PLN-NP")
  , array("key"=>"PLN-NPS", "label"=>"PLN-NPS")
  , array("key"=>"PJBS", "label"=>"PJBS")
  , array("key"=>"PLN", "label"=>"PLN")
  , array("key"=>"IPP", "label"=>"IPP")
  , array("key"=>"NP", "label"=>"NP")
  , array("key"=>"NPS", "label"=>"NPS")
);

$arroutstanding= array(
  array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"OH-UJP WORKSHOP PALEMBANG & BITUNG", "customerid"=>"PLN-NPS", "bruto"=>"606", "piutang"=>"4242")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"ADMIN KP PJBS", "customerid"=>"PLN-NPS", "bruto"=>"718", "piutang"=>"1436")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"INDUSTRIAL CLEANING KETAPANG", "customerid"=>"PLN-NPS", "bruto"=>"278", "piutang"=>"1390")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"INDUSTRIAL CLEANING BANJARSARI", "customerid"=>"PLN-NPS", "bruto"=>"270", "piutang"=>"1350")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"PLTU AMURANG", "customerid"=>"PLN-NPS", "bruto"=>"655", "piutang"=>"1310")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"PLTU ANGGREK", "customerid"=>"PLN-NPS", "bruto"=>"595", "piutang"=>"1190")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"IC KPJB", "customerid"=>"IPP", "bruto"=>"565", "piutang"=>"1130")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"UP PAITON 1-2", "customerid"=>"PLN-NPS", "bruto"=>"1088", "piutang"=>"1088")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"UP TENAYAN", "customerid"=>"PLN-NPS", "bruto"=>"1021", "piutang"=>"1021")
  , array("periode"=>"072024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"PLTU ROPA", "customerid"=>"PLN-NPS", "bruto"=>"507", "piutang"=>"1014")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15242054", "pekerjaan"=>"OH SI PLTU #3 Indramayu", "customerid"=>"NP", "bruto"=>"", "piutang"=>"2825101216")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15232421", "pekerjaan"=>"Jasa Pengeloalaan Operasional Pemeliharaan Pembangkitan Pada OH Sebalang #1", "customerid"=>"NP", "bruto"=>"", "piutang"=>"1155432432")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"10242072", "pekerjaan"=>"Sewa Scaffolding Pekerjaan Temuan Area Boiler OH IB5 PLTU 2 Tenayan", "customerid"=>"NP", "bruto"=>"", "piutang"=>"412529980")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"", "pekerjaan"=>"Do 06 Consumable Amurang,395/20", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"402238200")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15233167", "pekerjaan"=>"Relokasi PLTG Paya Pasir ke PLTG Sengkang", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"395420400")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15232294", "pekerjaan"=>"Jasa Pemeliharaan SI Unit 2 Tenayan Temuan", "customerid"=>"NP", "bruto"=>"", "piutang"=>"346449311")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15243111", "pekerjaan"=>"Annual Maintenance PT Suparma TBK 2024", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"343402900")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"10243148", "pekerjaan"=>"Tembilahan #1 Simple Inspection Jasbor Scaffolding", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"299496515")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"15243043", "pekerjaan"=>"Relokasi MPP Balai Pungut 1x25 MW Ke Sistem Bangka", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"292349765")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "prk"=>"10233287", "pekerjaan"=>"Sumbawa #1 Mean Inspection", "customerid"=>"NPS", "bruto"=>"", "piutang"=>"285868000")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"OH-UJP WORKSHOP PALEMBANG & BITUNG", "customerid"=>"PLN-NPS", "bruto"=>"1212", "piutang"=>"4242")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"IC KALTIM TELUK", "customerid"=>"PLN-NPS", "bruto"=>"952", "piutang"=>"1904")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"UP INDRAMAYU", "customerid"=>"PLN-NPS", "bruto"=>"817", "piutang"=>"1634")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"ADMIN KP PJBS", "customerid"=>"PLN-NPS", "bruto"=>"1436", "piutang"=>"1436")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"INDUSTRIAL CLEANING KETAPANG", "customerid"=>"PLN-NPS", "bruto"=>"556", "piutang"=>"1390")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"UP GRESIK", "customerid"=>"PLN-NPS", "bruto"=>"639", "piutang"=>"1278")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"PLTU ANGGREK", "customerid"=>"PLN-NPS", "bruto"=>"1190", "piutang"=>"1190")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"ULPLTD SILAE & NOPI", "customerid"=>"PLN-NPS", "bruto"=>"567", "piutang"=>"1134")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"IC KPJB", "customerid"=>"IPP", "bruto"=>"1130", "piutang"=>"1130")
  , array("periode"=>"082024", "jenis"=>"rutin", "prk"=>"", "pekerjaan"=>"UP PAITON 1-2", "customerid"=>"PLN-NPS", "bruto"=>"1088", "piutang"=>"1088")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15242054", "pekerjaan"=>"OH SI PLTU #3 Indramayu", "customerid"=>"NP", "bruto"=>"", "piutang"=>"2825101216")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15242178", "pekerjaan"=>"Rembang #20 Simple Inspection Jasbor", "customerid"=>"NP", "bruto"=>"", "piutang"=>"2278527384")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15242029", "pekerjaan"=>"OH SI Punagaya", "customerid"=>"NP", "bruto"=>"", "piutang"=>"1859777475")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"10242008", "pekerjaan"=>"Scaffolding OH ME #1 Tj.Awar-awar 2024 (23.000 M3)", "customerid"=>"NP", "bruto"=>"", "piutang"=>"1598500000")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15232421", "pekerjaan"=>"Jasa Pengeloalaan Operasional Pemeliharaan Pembangkitan Pada OH Sebalang #1", "customerid"=>"NP", "bruto"=>"", "piutang"=>"1155432432")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"10242044", "pekerjaan"=>"Jasa pemasangan & Pembongkaran Scaffolding Tahap 6 UP Kaltim Teluk", "customerid"=>"NP", "bruto"=>"", "piutang"=>"1040925000")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15232269", "pekerjaan"=>"Jasa Borongan Pendukung Teknik OH MO GT 1.1 PLTGU Gresik", "customerid"=>"NP", "bruto"=>"", "piutang"=>"740580247")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"10242072", "pekerjaan"=>"Sewa Scaffolding Pekerjaan Temuan Area Boiler OH IB5 PLTU 2 Tenayan", "customerid"=>"NP", "bruto"=>"", "piutang"=>"412529980")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"15232294", "pekerjaan"=>"Jasa Pemeliharaan SI Unit 2 Tenayan Temuan", "customerid"=>"NP", "bruto"=>"", "piutang"=>"346449311")
  , array("periode"=>"082024", "jenis"=>"non_rutin", "prk"=>"11242069", "pekerjaan"=>"Pengadaan Lube Oil Jasa OH #1 Grade A 2024", "customerid"=>"NP", "bruto"=>"", "piutang"=>"314253654")
);
// print_r($arroutstanding);exit;

$arrdataoutstanding= [];
$infocarikey= generateZero($reqBulan, 2).$reqTahun;
$arrcheck= in_array_column($infocarikey, "periode", $arroutstanding);
// print_r($arrcheck);exit;
foreach ($arrcheck as $vindex)
{
  array_push($arrdataoutstanding, $arroutstanding[$vindex]);
}
// print_r($arrdataoutstanding);exit;

if(!empty($rpro))
{
  $vdataoutstanding= $arrdataoutstanding;
  $arrdataoutstanding= [];
  $infocarikey= $rpro;
  $arrcheck= in_array_column($infocarikey, "jenis", $vdataoutstanding);
  // print_r($arrcheck);exit;
  foreach ($arrcheck as $vindex)
  {
    array_push($arrdataoutstanding, $vdataoutstanding[$vindex]);
  }
}
// print_r($arrdataoutstanding);exit;

if(!empty($rcust))
{
  $vdataoutstanding= $arrdataoutstanding;
  $arrdataoutstanding= [];
  $infocarikey= $rcust;
  $arrcheck= in_array_column($infocarikey, "customerid", $vdataoutstanding);
  // print_r($arrcheck);exit;
  foreach ($arrcheck as $vindex)
  {
    array_push($arrdataoutstanding, $vdataoutstanding[$vindex]);
  }
}
// print_r($arrdataoutstanding);exit;
$arrdataoutstanding= arrorderby($arrdataoutstanding, 'piutang', SORT_DESC);
// print_r($arrdataoutstanding);exit;


// Collection Period
$collection_period['target']= 95;
$collection_period['realisasi']= 92;
$pendapatan['target']= 382.02;
$pendapatan['realisasi']= 402.94;
$piutang_usaha['target']= 47130408147/1000000;
$piutang_usaha['realisasi']= 47416;
$tagihan_bruto['target']= 101954;
$tagihan_bruto['realisasi']= 104000;

$piutang_usaha[$arrprk[0]["key"]]= 17567;
$piutang_usaha[$arrprk[1]["key"]]= 24994;
$piutang_usaha[$arrprk[2]["key"]]= 399;
$piutang_usaha[$arrprk[3]["key"]]= 4457;
?>
<!-- SLICK -->
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<style type="text/css">
  /*html, body {
    margin: 0;
    padding: 0;
  }

  * {
    box-sizing: border-box;
  }*/

  .slider {
      width: 100%;
      margin: 0px auto;
  }

  .slick-slide {
    margin: 0px 0px;
  }

  .slick-slide img {
    width: 100%;
  }

  .slick-prev:before,
  .slick-next:before {
    color: black;
  }


  .slick-slide {
    transition: all ease-in-out .3s;
    opacity: 1;
  }
  
  .slick-active {
    opacity: 1;
  }

  .slick-current {
    opacity: 1;
  }
</style>

<ul class="breadcrumb">
  <li><a href="app/">Home</a></li>
  <li>Dashboard Settlement</li>
</ul> 
<!-- <h3 class="judul-halaman">Settlement (Layer 1)</h3> -->
<h3 class="judul-halaman">Dashboard Settlement</h3>
<!-- Content Row -->
<div class="row row-konten area-settlement">
  <div class="col-md-2 equal-height-column">
    <div class="card item-data-angka">
      <div class="card-body">
        <div class="data">
          Collection Period
          <div class="nilai-total">Realisasi: <?=$collection_period['realisasi']?></div>
          <div class="target">Target: <?=$collection_period['target']?></div>
        </div>
        <div class="ikon">
          <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="card item-data-angka">
      <div class="card-body">
        Pendapatan
        <div class="nilai-total">Realisasi: Rp. <?=number_format($pendapatan['realisasi'],0,',','.')?> M</div>
        <div class="target">Target: Rp. <?=number_format($pendapatan['target'],0,',','.')?> M</div>

        <section class="vertical slider">
          <div>
            <div class="card item-data-angka">
              <div class="card-body">
                <div class="ikon">
                  <img src="images/icon-pendapatan-usaha.png">
                </div>
                <div class="data">
                  <div class="title">Piutang Usaha</div>
                  <div class="nilai"><span class="title">Realisasi: </span>Rp. <?=number_format($piutang_usaha['realisasi'],0,',','.')?> M</div>
                  <div class="nilai"><span class="title">Target: </span>Rp. <?=number_format($piutang_usaha['target'],0,',','.')?> M</div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div>
            <div class="card item-data-angka">
              <div class="card-body">
                <div class="ikon">
                  <img src="images/icon-tagihan-bruto.png">
                </div>
                <div class="data">
                  <div class="title">Tagihan Bruto</div>
                  <div class="nilai"><span class="title">Realisasi: </span>Rp. <?=number_format($tagihan_bruto['realisasi'],0,',','.')?> M</div>
                  <div class="nilai"><span class="title">Target: </span>Rp. <?=number_format($tagihan_bruto['target'],0,',','.')?> M</div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </div>
  <div class="col-md-2 equal-height-column">
    <div class="card area-tagihan-piutang">
      <div class="card-body">
        <div id="grafik-tagihan-piutang" class="grafik"></div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="area-data-angka-settlement">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="judul">Piutang Usaha per Segmen</div>
          </div>
          <div class="col-md-6">
            <div class="card item pln">
              <div class="card-body">
                <div class="logo"><img src="images/logo-pln.png"></div>
                <div class="item-data">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="nilai">Rp. <?=number_format($piutang_usaha[$arrprk[0]["key"]],0,',','.')?> M</div>
                      <div class="perusahaan">PT PLN</div>
                    </div>
                    <!-- <div class="col-md-4">
                      <div class="tanda">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card item pln-np">
              <div class="card-body">
                <div class="logo"><img src="images/logo-pln-np.png"></div>
                <div class="item-data">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="nilai">Rp. <?=number_format($piutang_usaha[$arrprk[1]["key"]],0,',','.')?> M</div>
                      <div class="perusahaan">PT PLN NP</div>
                    </div>
                    <!-- <div class="col-md-4">
                      <div class="tanda">
                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card item pln-nps">
              <div class="card-body">
                <div class="logo"><img src="images/logo-pln-nps.png"></div>
                <div class="item-data">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="nilai">Rp. <?=number_format($piutang_usaha[$arrprk[2]["key"]],0,',','.')?> M</div>
                      <div class="perusahaan">PT PLN NPS</div>
                    </div>
                    <!-- <div class="col-md-4">
                      <div class="tanda">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card item non-pln">
              <div class="card-body">
                <div class="logo"><img src="images/logo-non-pln.png"></div>
                <div class="item-data">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="nilai">Rp. <?=number_format($piutang_usaha[$arrprk[3]["key"]],0,',','.')?> M</div>
                      <div class="perusahaan">NON PLN</div>
                    </div>
                    <!-- <div class="col-md-4">
                      <div class="tanda">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-4">
        <div class="card area-monitoring-pekerjaan">
          <div class="card-header">
            Monitoring Pekerjaan
            <ul class="nav nav-tabs">
                <li><a class="active" href="#tab1" data-toggle="tab">Rutin</a></li>
                <li><a href="#tab2" data-toggle="tab">Non Rutin</a></li>
                <li><a href="#tab3" data-toggle="tab">All</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
                
                <div class="tab-pane fade in active show" id="tab1">
                  <div id="grafik-monitoring-pekerjaan" style="height: calc(35vh - 25px);"></div>
                </div>

                <div class="tab-pane fade" id="tab2">
                  <div id="grafik-monitoring-pekerjaan-non-rutin" style="height: calc(35vh - 25px);"></div>
                </div>

                <div class="tab-pane fade" id="tab3">
                  <div id="grafik-monitoring-pekerjaan-all" style="height: calc(35vh - 25px);"></div>
                </div>
            </div><!-- tab content -->
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card area-top-10">
          <div class="card-header">
            <img src="images/img-top-10.png" height="30">
            <span class="nama">Outstanding tagihan bruto dan piutang usaha</span>
            <div class="area-filter">
              R/Pro :   
              <select id="r">
                <option value="rutin" <? if($rpro == "rutin") echo "selected";?>>Rutin</option>
                <option value="non_rutin" <? if($rpro == "non_rutin") echo "selected";?>>Non Rutin</option>
              </select>
              Customer :   
              <select id="c">
                <option value="" <? if($rcust == "") echo "selected";?>>All</option>
                <?
                foreach ($arrcustomer as $k => $v)
                {
                  $voptionid= $v["key"];
                  $voptionlabel= $v["label"];
                ?>
                  <option value="<?=$voptionid?>" <? if($rcust == $voptionid) echo "selected";?>><?=$voptionlabel?></option>
                <?
                }
                ?>
              </select>
            </div>
          </div>
          <div class="card-body">
            <div class="inner">
              <table>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>PRK</th>
                    <th>R/PRO</th>
                    <th>Pekerjaan</th>
                    <th>User</th>
                    <th>Piutang</th>
                    <th>Bruto</th>
                  </tr>
                </thead>
                <tbody>
                  <?
                  foreach ($arrdataoutstanding as $k => $v)
                  {
                  ?>
                  <tr>
                    <td><?=$k+1?></td>
                    <td><?=$v["prk"]?></td>
                    <td><?=ucfirst($v["jenis"])?></td>
                    <td><?=$v["pekerjaan"]?></td>
                    <td><?=$v["customerid"]?></td>
                    <td><?=numberToIna($v["bruto"])?></td>
                    <td><?=numberToIna($v["piutang"])?></td>
                  </tr>
                  <?
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts-gantt.js"></script>
<script src="lib/highcharts/draggable-points.js"></script>
<!-- <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script> -->
<!-- <script src="https://code.highcharts.com/gantt/modules/draggable-points.js"></script> -->
<!-- <script src="https://code.highcharts.com/gantt/modules/accessibility.js"></script> -->

<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<script src="lib/highcharts/accessibility.js"></script>

<script type="text/javascript">
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-tagihan-piutang',
                type: 'pie'
            },
            exporting: {
              enabled: false
            },

            title: {
                text: null
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            plotOptions: {
                pie: {
                    shadow: false
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.y +'';
                }
            },
            series: [{
                name: 'Browsers',
                data: [["Tagihan Bruto",<?=number_format($tagihan_bruto['realisasi'],0,',','.')?>],["Piutang Usaha",<?=number_format($piutang_usaha['realisasi'],0,',','.')?>]],
                colors: ['#e75656','#4faab9'],
                size: '100%',
                innerSize: '0%',
                showInLegend:true,
                dataLabels: {
                    enabled: false
                }
            }],
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: false,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '10px',
                            color: 'white',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
        });
    });
</script>

<script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  $(document).on('ready', function() {
    $(".vertical").slick({
      dots: false,
      vertical: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      // adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false
    });
  });
</script>

<!-- CHART INSIDE TAB -->
<script>

jQuery(document).ready(function () {
  jQuery('#grafik-monitoring-pekerjaan').highcharts({
    chart: {
      type: 'column',
    },
    exporting: {
      enabled: false
    },
    title: {
      text: null,
      align: 'left'
    },
    subtitle: {
      text: null,
      align: 'left'
    },
    xAxis: {
      categories: [
      <?
      foreach ($arrprk as $k => $v) {
        if($k > 0) echo ",";
        echo "'".$v["key"]."'";
      }
      ?>
      ],
      crosshair: true,
      accessibility: {
        description: 'Countries'
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: null
      },
      labels: {
        enabled: false
      }
    },
    tooltip: {
      valueSuffix: ''
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [
    <?
    foreach ($arrjenispekerjaan as $k => $v)
    {
      if($k > 0) echo ",";
    ?>
      {
        name: '<?=$v["label"]?>',
        data: [
          <?
          $indexdetil= 0;
          // print_r($v);
          $infocarikey= "rutin-".generateZero($reqBulan, 2).$reqTahun;
          $arrcheck= in_array_column($infocarikey, "group", $arrpekerjaan);

          foreach ($arrcheck as $vindex)
          {
            foreach ($arrprk as $kd => $vd) {
              if($vd["key"] == $arrpekerjaan[$vindex]["prk"])
              {
                if($indexdetil > 0) echo ",";
                echo $arrpekerjaan[$vindex][$v["key"]];
                $indexdetil++;
              }
            }
          }
          ?>
        ],
        color: '<?=$v["color"]?>'
      }
    <?
    }
    ?>
    ],
    legend: {
      margin: 0,
      // marginBottom: 10,
      // padding: 0,
      itemStyle: {
        fontSize: '8px'
      }
    }
  });

  jQuery('#grafik-monitoring-pekerjaan-non-rutin').highcharts({
    chart: {
      type: 'column',

    },
    exporting: {
      enabled: false
    },
    title: {
      text: null,
      align: 'left'
    },
    subtitle: {
      text: null,
      align: 'left'
    },
    xAxis: {
      categories: [
      <?
      foreach ($arrprk as $k => $v) {
        if($k > 0) echo ",";
        echo "'".$v["key"]."'";
      }
      ?>
      ],
      crosshair: true,
      accessibility: {
        description: 'Countries'
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: null
      },
      labels: {
        enabled: false
      }
    },
    tooltip: {
      valueSuffix: ''
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [
    <?
    foreach ($arrjenispekerjaan as $k => $v)
    {
      if($k > 0) echo ",";
    ?>
      {
        name: '<?=$v["label"]?>',
        data: [
          <?
          $indexdetil= 0;
          // print_r($v);
          $infocarikey= "non_rutin-".generateZero($reqBulan, 2).$reqTahun;
          $arrcheck= in_array_column($infocarikey, "group", $arrpekerjaan);

          foreach ($arrcheck as $vindex)
          {
            foreach ($arrprk as $kd => $vd) {
              if($vd["key"] == $arrpekerjaan[$vindex]["prk"])
              {
                if($indexdetil > 0) echo ",";
                echo $arrpekerjaan[$vindex][$v["key"]];
                $indexdetil++;
              }
            }
          }
          ?>
        ],
        color: '<?=$v["color"]?>'
      }
    <?
    }
    ?>
    ],
    legend: {
      margin: 0, // marginBottom: 10, // padding: 0,
      itemStyle: {
        fontSize: '8px'
      }
    }
  });

  <?
  $arrvalprk= [];
  foreach ($arrjenispekerjaan as $k => $v)
  {
      $infocarikey= generateZero($reqBulan, 2).$reqTahun;
      $arrcheck= in_array_column($infocarikey, "periode", $arrpekerjaan);

      foreach ($arrcheck as $vindex)
      {
        foreach ($arrprk as $kd => $vd) {
          if($vd["key"] == $arrpekerjaan[$vindex]["prk"])
          {
            $arrvalprk[$v["key"]."-".$vd["key"]]+= $arrpekerjaan[$vindex][$v["key"]];
          }
        }
      }
  }
  // print_r($arrvalprk);exit;
  ?>

  jQuery('#grafik-monitoring-pekerjaan-all').highcharts({
    chart: {
      type: 'column',

    },
    exporting: {
      enabled: false
    },
    title: {
      text: null,
      align: 'left'
    },
    subtitle: {
      text: null,
      align: 'left'
    },
    xAxis: {
      categories: [
      <?
      foreach ($arrprk as $k => $v) {
        if($k > 0) echo ",";
        echo "'".$v["key"]."'";
      }
      ?>
      ],
      crosshair: true,
      accessibility: {
        description: 'Countries'
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: null
      },
      labels: {
        enabled: false
      }
    },
    tooltip: {
      valueSuffix: ''
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [
    <?
    foreach ($arrjenispekerjaan as $k => $v)
    {
      if($k > 0) echo ",";
    ?>
      {
        name: '<?=$v["label"]?>',
        data: [
          <?
          foreach ($arrprk as $kd => $vd)
          {
            if($kd > 0) echo ",";
            echo $arrvalprk[$v["key"]."-".$vd["key"]];
          ?>
          <?
          }
          ?>
        ],
        color: '<?=$v["color"]?>'
      }
    <?
    }
    ?>
    ],
    legend: {
      margin: 0, // marginBottom: 10, // padding: 0,
      itemStyle: {
        fontSize: '8px'
      }
    }
  });

  // fix dimensions of chart that was in a hidden element
  jQuery(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) { // on tab selection event
      jQuery( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
          var chart = jQuery(this).highcharts(); // target the chart itself
          chart.reflow() // reflow that chart
      });
  });

  $("#r, #c").change(function(e) {
    reqTahun= $("#reqTahun").val();
    reqBulan= $("#reqBulan").val();
    r= $("#r").val();
    c= $("#c").val();
    location.href = "app/index/<?=$pg?>?reqBulan="+reqBulan+"&reqTahun="+reqTahun+"&r="+r+"&c="+c;
  });

});

</script>