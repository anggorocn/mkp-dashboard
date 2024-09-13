<?
$reqBulan = $this->input->get("reqBulan");

if($reqBulan==''){
  $reqBulan=8;
  $reqBulan=(int)$reqBulan;
}


$KAS_DIBANK_REALISASI=[0,0,0,0,0,0,0, 42930, 25764];
$KAS_DIBANK_TARGET=[0,0,0,0,0,0,0, 29798, 19675];
$KAS_DIBANK_PERSENTASE=[0,0,0,0,0,0,0, 144.07, 130.95];
$KAS_DIBANK_PERSENTASE_CHART=[0,0,0,0,0,0,0, 100, 100];

$EBITDA_REALISASI=[0,0,0,0,0,0,0,26.45, 33.35];
$EBITDA_TARGET=[0,0,0,0,0,0,0,26.27,33.03 ];
$EBITDA_PERSENTASE=[0,0,0,0,0,0,0,100.69,100.97];
$EBITDA_PERSENTASE_CHART=[0,0,0,0,0,0,0,100, 100];

$BOPO_REALISASI=[0,0,0,0,0,0,0,92.77,92.15];
$BOPO_TARGET=[0,0,0,0,0,0,0,92.62,91.91 ];
$BOPO_PERSENTASE=[0,0,0,0,0,0,0,99.84,99.74];
$BOPO_PERSENTASE_CHART=[0,0,0,0,0,0,0,99.84,99.74];

$COLLECTION_PERIOD_REALISASI=[0,0,0,0,0,0,0,89,92];
$COLLECTION_PERIOD_TARGET=[0,0,0,0,0,0,0,102,95 ];
$COLLECTION_PERIOD_PERSENTASE=[0,0,0,0,0,0,0,112.75,103.16];
$COLLECTION_PERIOD_PERSENTASE_CHART=[0,0,0,0,0,0,0,100,100];

$ROE_REALISASI=[0,0,0,0,0,0,0,13.98,16.86];
$ROE_TARGET=[0,0,0,0,0,0,0,13.17,16.57 ];
$ROE_PERSENTASE=[0,0,0,0,0,0,0,106.19,1.04];
$ROE_PERSENTASE_CHART=[0,0,0,0,0,0,0,100,1.04];

$ROA_REALISASI=[0,0,0,0,0,0,0,11.32,14.42];
$ROA_TARGET=[0,0,0,0,0,0,0,9.12,11.97];
$ROA_PERSENTASE=[0,0,0,0,0,0,0,124.11,120.45];

$NET_PROFIT_MARGIN_REALISASI=[0,0,0,0,0,0,0,5.45,5.95];
$NET_PROFIT_MARGIN_TARGET=[0,0,0,0,0,0,0,5.28,5.81 ];
$NET_PROFIT_MARGIN_PERSENTASE=[0,0,0,0,0,0,0,103.28,102.34];

$NET_PROFIT_REALISASI=[0,0,0,0,0,0,0,18574,23962];
$NET_PROFIT_TARGET=[0,0,0,0,0,0,0,17464,22198 ];
$NET_PROFIT_PERSENTASE=[0,0,0,0,0,0,0,106.35,107.95];

$BEBAN_KONTRAK_REALISASI=[0,0,0,0,0,0,0,304508,358321];
$BEBAN_KONTRAK_TARGET=[0,0,0,0,0,0,0,289172,331731 ];
$BEBAN_KONTRAK_PERSENTASE=[0,0,0,0,0,0,0,105.30,108.02];

$BEBAN_USAHA_REALISASI=[0,0,0,0,0,0,0,11579,12980];
$BEBAN_USAHA_TARGET=[0,0,0,0,0,0,0,17304,19377];
$BEBAN_USAHA_PERSENTASE=[0,0,0,0,0,0,0,66.92,66.99];

$PENDAPATAN_LAINNYA_REALISASI=[0,0,0,0,0,0,0,412,32059];
$PENDAPATAN_LAINNYA_TARGET=[0,0,0,0,0,0,0,1143,29597 ];
$PENDAPATAN_LAINNYA_PERSENTASE=[0,0,0,0,0,0,0,36.02,108.32];

$TOTAL_REVENUE_REALISASI=[0,0,0,0,0,0,0,340739,402946];
$TOTAL_REVENUE_TARGET=[0,0,0,0,0,0,0,330905,382012];
$TOTAL_REVENUE_PERSENTASE=[0,0,0,0,0,0,0,102.97,105.48];

$ASSET_TURN_OFFER_REALISASI=[0,0,0,0,0,0,0,207.62,242.50];
$ASSET_TURN_OFFER_TARGET=[0,0,0,0,0,0,0,172.78,206.03 ];
$ASSET_TURN_OFFER_PERSENTASE=[0,0,0,0,0,0,0,120.16,117.70];

$PENDAPATAN_RUTIN_REALISASI=[0,0,0,0,0,0,0,222785,256181];
$PENDAPATAN_RUTIN_TARGET=[0,0,0,0,0,0,0,216804,248510];
$PENDAPATAN_RUTIN_PERSENTASE=[0,0,0,0,0,0,0,102.76,103.09];

$PENDAPATAN_NON_RUTIN_REALISASI=[0,0,0,0,0,0,0,117954,146765];
$PENDAPATAN_NON_RUTIN_TARGET=[0,0,0,0,0,0,0,114101,133502 ];
$PENDAPATAN_NON_RUTIN_PERSENTASE=[0,0,0,0,0,0,0,103.38,109.93];

$TOTAL_ASSET_REALISASI=[0,0,0,0,0,0,0,214610,211280];
$TOTAL_ASSET_TARGET=[0,0,0,0,0,0,0,250961,241235 ];
$TOTAL_ASSET_PERSENTASE=[0,0,0,0,0,0,0,85.52,87.58];

$FINANCIAL_LEVERAGE_REALISASI=[0,0,0,0,0,0,0,1.24, 1.17];
$FINANCIAL_LEVERAGE_TARGET=[0,0,0,0,0,0,0,1.44,1.35 ];
$FINANCIAL_LEVERAGE_PERSENTASE=[0,0,0,0,0,0,0,85.56,86.55];

$ASSET_TIDAK_LANCAR_REALISASI=[0,0,0,0,0,0,0,13974,14860];
$ASSET_TIDAK_LANCAR_TARGET=[0,0,0,0,0,0,0,15952,17250 ];
$ASSET_TIDAK_LANCAR_PERSENTASE=[0,0,0,0,0,0,0,87.60,86.14];

$ASSET_LANCAR_REALISASI=[0,0,0,0,0,0,0,200636,196420];
$ASSET_LANCAR_TARGET=[0,0,0,0,0,0,0,235009,223986 ];
$ASSET_LANCAR_PERSENTASE=[0,0,0,0,0,0,0,85.37,87.69];

$KAS_SETARA_KAS_REALISASI=[0,0,0,0,0,0,0,47765,35722];
$KAS_SETARA_KAS_TARGET=[0,0,0,0,0,0,0,65534,65172];
$KAS_SETARA_KAS_PERSENTASE=[0,0,0,0,0,0,0,72.89,54.81];

$PIUTANG_USAHA_REALISASI=[0,0,0,0,0,0,0,55675,47416];
$PIUTANG_USAHA_TARGET=[0,0,0,0,0,0,0,76849,47130 ];
$PIUTANG_USAHA_PERSENTASE=[0,0,0,0,0,0,0,72.45,100.61];

$TAGIHAN_BRUTO_REALISASI=[0,0,0,0,0,0,0,86869,104000];
$TAGIHAN_BRUTO_TARGET=[0,0,0,0,0,0,0,82332,101954];
$TAGIHAN_BRUTO_PERSENTASE=[0,0,0,0,0,0,0,105.51,102.01];

$UM_PDM_REALISASI=[0,0,0,0,0,0,0,10327,9282];
$UM_PDM_TARGET=[0,0,0,0,0,0,0,10.294,9730 ];
$UM_PDM_PERSENTASE=[0,0,0,0,0,0,0,100.31,95.40];

$TOTAL_EQUITAS_REALISASI=[0,0,0,0,0,0,0,173721,180671];
$TOTAL_EQUITAS_TARGET=[0,0,0,0,0,0,0,1738114685,17854500 ];
$TOTAL_EQUITAS_PERSENTASE=[0,0,0,0,0,0,0,99.95,101.19];

$CASH_FLOW=array(
  array(
    'SALDO_AWAL_PLAN'=>34570722131, 'SALDO_AWAL_REALISASI'=>34570722131,
  'CASHIN_PLN_NP_PLAN'=>0,  'CASHIN_PLN_NP_REALISASI'=>0,
  'CASHIN_UMRO_PLAN'=>0,  'CASHIN_UMRO_REALISASI'=>0,
  'CASHIN_PLN_NPS_PLAN'=>0, 'CASHIN_PLN_NPS_REALISASI'=>0,
  'CASHIN_PLN_PLAN'=>240000000, 'CASHIN_PLN_REALISASI'=>240160280,
  'CASHIN_IPP_PLAN'=>0, 'CASHIN_IPP_REALISASI'=>0,
  'CASHIN_DLL_PLAN'=>0, 'CASHIN_DLL_REALISASI'=>92552991,
  'CASHIN_TOTAL_PLAN'=>240000000, 'CASHIN_TOTAL_REALISASI'=>332713271,
  'CASHOUT_KONTRAK_FIX_PLAN'=>1600000000, 'CASHOUT_KONTRAK_FIX_REALISASI'=>1728284755,
  'CASHOUT_KONTRAK_VAR_PLAN'=>2650000000, 'CASHOUT_KONTRAK_VAR_REALISASI'=>1112605185,
  'CASHOUT_USAHA_FIX_PLAN'=>0,  'CASHOUT_USAHA_FIX_REALISASI'=>0,
  'CASHOUT_USAHA_VAR_PLAN'=>299400000,  'CASHOUT_USAHA_VAR_REALISASI'=>177223570,
  'CASHOUT_TOTAL_PLAN'=>4549400000, 'CASHOUT_TOTAL_REALISASI'=>3018113510,
  'SALDO_AKHIR_PLAN'=>30261322131,  'SALDO_AKHIR_REALISASI'=>31885321892,
  ),
  array(
    'SALDO_AWAL_PLAN'=>30261322131, 'SALDO_AWAL_REALISASI'=>31885321892,
  'CASHIN_PLN_NP_PLAN'=>0,  'CASHIN_PLN_NP_REALISASI'=>591177762,
  'CASHIN_UMRO_PLAN'=>10000000000,  'CASHIN_UMRO_REALISASI'=>11214869378,
  'CASHIN_PLN_NPS_PLAN'=>4000000000,  'CASHIN_PLN_NPS_REALISASI'=>3782775911,
  'CASHIN_PLN_PLAN'=>0, 'CASHIN_PLN_REALISASI'=>1240416614,
  'CASHIN_IPP_PLAN'=>0, 'CASHIN_IPP_REALISASI'=>0,
  'CASHIN_DLL_PLAN'=>0, 'CASHIN_DLL_REALISASI'=>96247595,
  'CASHIN_TOTAL_PLAN'=>14000000000, 'CASHIN_TOTAL_REALISASI'=>16925487260,
  'CASHOUT_KONTRAK_FIX_PLAN'=>2650000000, 'CASHOUT_KONTRAK_FIX_REALISASI'=>2414535024,
  'CASHOUT_KONTRAK_VAR_PLAN'=>4375000000, 'CASHOUT_KONTRAK_VAR_REALISASI'=>2777385681,
  'CASHOUT_USAHA_FIX_PLAN'=>0,  'CASHOUT_USAHA_FIX_REALISASI'=>0,
  'CASHOUT_USAHA_VAR_PLAN'=>469600000,  'CASHOUT_USAHA_VAR_REALISASI'=>499948460,
  'CASHOUT_TOTAL_PLAN'=>7494600000, 'CASHOUT_TOTAL_REALISASI'=>5691869165,
  'SALDO_AKHIR_PLAN'=>36766722131,  'SALDO_AKHIR_REALISASI'=>43118939987,
  ),
  array(
    'SALDO_AWAL_PLAN'=>36766722131, 'SALDO_AWAL_REALISASI'=>43118939987,
  'CASHIN_PLN_NP_PLAN'=>1100000000, 'CASHIN_PLN_NP_REALISASI'=>2846252295,
  'CASHIN_UMRO_PLAN'=>0,  'CASHIN_UMRO_REALISASI'=>0,
  'CASHIN_PLN_NPS_PLAN'=>4000000000,  'CASHIN_PLN_NPS_REALISASI'=>3734763204,
  'CASHIN_PLN_PLAN'=>0, 'CASHIN_PLN_REALISASI'=>198459788,
  'CASHIN_IPP_PLAN'=>200000000, 'CASHIN_IPP_REALISASI'=>87197862,
  'CASHIN_DLL_PLAN'=>0, 'CASHIN_DLL_REALISASI'=>160160934,
  'CASHIN_TOTAL_PLAN'=>5300000000,  'CASHIN_TOTAL_REALISASI'=>7026834083,
  'CASHOUT_KONTRAK_FIX_PLAN'=>1945000000, 'CASHOUT_KONTRAK_FIX_REALISASI'=>1700372933,
  'CASHOUT_KONTRAK_VAR_PLAN'=>5850000000, 'CASHOUT_KONTRAK_VAR_REALISASI'=>4270779441,
  'CASHOUT_USAHA_FIX_PLAN'=>0,  'CASHOUT_USAHA_FIX_REALISASI'=>0,
  'CASHOUT_USAHA_VAR_PLAN'=>1254400000, 'CASHOUT_USAHA_VAR_REALISASI'=>1045407672,
  'CASHOUT_TOTAL_PLAN'=>9049400000, 'CASHOUT_TOTAL_REALISASI'=>7016560046,
  'SALDO_AKHIR_PLAN'=>33017322131,  'SALDO_AKHIR_REALISASI'=>43129214024,
  ),
  array(
    'SALDO_AWAL_PLAN'=>33017322131, 'SALDO_AWAL_REALISASI'=>43129214024,
  'CASHIN_PLN_NP_PLAN'=>6602384438, 'CASHIN_PLN_NP_REALISASI'=>5569153950,
  'CASHIN_UMRO_PLAN'=>2000000000, 'CASHIN_UMRO_REALISASI'=>3155257349,
  'CASHIN_PLN_NPS_PLAN'=>10000000000, 'CASHIN_PLN_NPS_REALISASI'=>5718549425,
  'CASHIN_PLN_PLAN'=>3000000000,  'CASHIN_PLN_REALISASI'=>2715022557,
  'CASHIN_IPP_PLAN'=>112802138, 'CASHIN_IPP_REALISASI'=>188412088,
  'CASHIN_DLL_PLAN'=>0, 'CASHIN_DLL_REALISASI'=>327210354,
  'CASHIN_TOTAL_PLAN'=>21715186576, 'CASHIN_TOTAL_REALISASI'=>17673605723,
  'CASHOUT_KONTRAK_FIX_PLAN'=>26058000000,  'CASHOUT_KONTRAK_FIX_REALISASI'=>25646134148,
  'CASHOUT_KONTRAK_VAR_PLAN'=>4374872135, 'CASHOUT_KONTRAK_VAR_REALISASI'=>16446753465,
  'CASHOUT_USAHA_FIX_PLAN'=>0,  'CASHOUT_USAHA_FIX_REALISASI'=>0,
  'CASHOUT_USAHA_VAR_PLAN'=>409357150,  'CASHOUT_USAHA_VAR_REALISASI'=>409357150,
  'CASHOUT_TOTAL_PLAN'=>30842229285,  'CASHOUT_TOTAL_REALISASI'=>42502244763,
  'SALDO_AKHIR_PLAN'=>23890279422,  'SALDO_AKHIR_REALISASI'=>18300574984,
  ),
  array(
    'SALDO_AWAL_PLAN'=>23890279422, 'SALDO_AWAL_REALISASI'=>18300574984,
  'CASHIN_PLN_NP_PLAN'=>4371897625, 'CASHIN_PLN_NP_REALISASI'=>3567069032,
  'CASHIN_UMRO_PLAN'=>0,  'CASHIN_UMRO_REALISASI'=>336876436,
  'CASHIN_PLN_NPS_PLAN'=>3000000000,  'CASHIN_PLN_NPS_REALISASI'=>7240647381,
  'CASHIN_PLN_PLAN'=>772569615, 'CASHIN_PLN_REALISASI'=>864001236,
  'CASHIN_IPP_PLAN'=>216000000, 'CASHIN_IPP_REALISASI'=>478777354,
  'CASHIN_DLL_PLAN'=>0, 'CASHIN_DLL_REALISASI'=>330883015,
  'CASHIN_TOTAL_PLAN'=>8360467240,  'CASHIN_TOTAL_REALISASI'=>12818254454,
  'CASHOUT_KONTRAK_FIX_PLAN'=>3545000000, 'CASHOUT_KONTRAK_FIX_REALISASI'=>3688115829,
  'CASHOUT_KONTRAK_VAR_PLAN'=>4200000000, 'CASHOUT_KONTRAK_VAR_REALISASI'=>3398469828,
  'CASHOUT_USAHA_FIX_PLAN'=>0,  'CASHOUT_USAHA_FIX_REALISASI'=>2060888304,
  'CASHOUT_USAHA_VAR_PLAN'=>2679400000, 'CASHOUT_USAHA_VAR_REALISASI'=>2296533905,
  'CASHOUT_TOTAL_PLAN'=>10424400000,  'CASHOUT_TOTAL_REALISASI'=>11444007866,
  'SALDO_AKHIR_PLAN'=>21826346662,  'SALDO_AKHIR_REALISASI'=>19674821572,
  )
);

$vCASH_FLOW= $CASH_FLOW;
$CASH_FLOW= [];
foreach ($vCASH_FLOW as $k => $v)
{
  foreach ($v as $kd => $vd)
  {
    if($kd == "CASHOUT_TOTAL_PLAN" || $kd == "CASHOUT_TOTAL_REALISASI")
      $v[$kd] = $vd / 1000000000;
    else
      $v[$kd] = $vd / 1000000;
  }
  array_push($CASH_FLOW, $v);
}
// print_r($CASH_FLOW);exit;
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
  <li>Dashboard Finance</li>
</ul> 
<h3 class="judul-halaman">Dashboard Finance</h3>
<!-- Content Row -->
<div class="row row-konten equal-child-height">
  <div class="col-md-9">
    <div class="row area-data-angka-finance" >
      <div class="col-md-3">
        <div class="card item">
          <div class="card-body nopadding">
            <div class="data">
              <div class="keterangan">Kas di Bank</div>
              <div class="nilai">Rp<?=number_format(($KAS_DIBANK_REALISASI[$reqBulan]/1000),2, '.', '')?> M</div>
              <div class="target">Target : Rp<?=number_format(($KAS_DIBANK_TARGET[$reqBulan]/1000),2, '.', '')?> M 
                <!-- <i class="fa fa-arrow-up" style="color:#94cf58;" aria-hidden="true"></i> -->
              </div>
            </div>  
            <div class="grafik">
              <div id="grafik-kas-di-bank" class="grafik-item"></div>
            </div>
            <div class="tanda">
              <?
              $vupdown= "fa-caret-down";
              if($KAS_DIBANK_REALISASI[$reqBulan] > $KAS_DIBANK_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
              ?>
              <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
             </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card item">
          <div class="card-body nopadding">
            <div class="data">
              <div class="keterangan">EBITDA</div>
              <div class="nilai">Rp<?=$EBITDA_REALISASI[$reqBulan]?> M</div>
              <div class="target">Target : Rp<?=$EBITDA_TARGET[$reqBulan]?> M
                <!-- <i class="fa fa-arrow-down" style="color:#f2594a;" aria-hidden="true"></i> -->
              </div>
            </div>  
            <div class="grafik">
              <div id="grafik-ebitda" class="grafik-item"></div>
            </div>
            <div class="tanda">
              <?
              $vupdown= "fa-caret-down";
              if($EBITDA_REALISASI[$reqBulan] > $EBITDA_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
              ?>
              <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card item">
          <div class="card-body nopadding">
            <div class="data">
              <div class="keterangan">BoPo</div>
              <div class="nilai"><?=$BOPO_REALISASI[$reqBulan]?> %</div>
              <div class="target">Target : <?=$BOPO_TARGET[$reqBulan]?> %
                <!-- <i class="fa fa-arrow-up" style="color:#94cf58;" aria-hidden="true"></i> -->
              </div>
            </div>  
            <div class="grafik">
              <div id="grafik-bopo" class="grafik-item"></div>
            </div>
            <div class="tanda">
              <?
              $vupdown= "fa-caret-down";
              if($BOPO_REALISASI[$reqBulan] < $BOPO_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
              ?>
              <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card item">
          <div class="card-body nopadding">
            <div class="data">
              <div class="keterangan collection">Collection Period</div>
              <div class="nilai"><?=$COLLECTION_PERIOD_REALISASI[$reqBulan]?> Hari</div>
              <div class="target">Target : <?=$COLLECTION_PERIOD_TARGET[$reqBulan]?> Hari
                <!-- <i class="fa fa-arrow-up" style="color:#94cf58;" aria-hidden="true"></i> -->
              </div>
            </div>  
            <div class="grafik">
              <div id="grafik-collection-period" class="grafik-item"></div>
            </div>
            <div class="tanda">
              <?
              $vupdown= "fa-caret-down";
              if($COLLECTION_PERIOD_REALISASI[$reqBulan] < $COLLECTION_PERIOD_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
              ?>
              <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

    </div>
    <div class="row area-roe-roa">
      <div class="col-md-12">
        <div class="header">
          <div class="inner row">
            <div class="title col-md-2">ROE</div>
            <div class="nilai col-md-6"><?=$ROE_REALISASI[$reqBulan]?> %</div>
            <div class="target col-md-1">Target <?=$ROE_TARGET[$reqBulan]?>%</div>
            <div class="grafik col-md-3">
              <div id="grafik-roe" class="grafik-item" style="height: 45px;"></div>
            </div>
            <?
            $vupdown= "fa-caret-down";
            if($ROE_REALISASI[$reqBulan] > $ROE_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
            ?>
            <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row area-roa">
          <div class="col-md-12">
            <div class="header">
              <div class="inner row">
                <div class="title col-md-2">ROA</div>
                <div class="nilai col-md-6"><?=$ROA_REALISASI[$reqBulan]?> %</div>
                <div class="target col-md-1">
                  <!-- <div class="inner-target"> -->
                    <!-- <?=$ROA_PERSENTASE[$reqBulan]?>%<br> -->
                    Target <?=$ROA_TARGET[$reqBulan]?>%  
                  <!-- </div> -->
                </div>
                <div class="grafik col-md-3">
                  <div id="grafik-roa" class="grafik-item" style="height: 45px;"></div>
                </div>
                <?
                $vupdown= "fa-caret-down";
                if($ROA_REALISASI[$reqBulan] > $ROA_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                ?>
                <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 equal-child-height">
            <!-- GRUP DATA -->
            <div class="grup-data">
              <div class="judul">Net Profit Margin</div>
              <div class="row">
                <div class="col-md-12">
                  <div class="data-persentase">
                    <div class="nilai"><?=$NET_PROFIT_MARGIN_REALISASI[$reqBulan]?>  %</div>
                    <div class="data-kenaikan">
                      <div class="kenaikan"><?=$NET_PROFIT_MARGIN_PERSENTASE[$reqBulan]?> %</div>
                      <div class="target">Target <?=$NET_PROFIT_MARGIN_TARGET[$reqBulan]?> %</div>
                    </div>
                    <div class="tanda">
                      <?
                      $vupdown= "fa-caret-down";
                      if($NET_PROFIT_MARGIN_REALISASI[$reqBulan] > $NET_PROFIT_MARGIN_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                      ?>
                      <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="inner">
                <!-- <div class="item">
                  <div class="data">
                    <div class="title">NET PROFIT</div>
                    <div class="nilai">Rp. M</div>
                    <div class="target">Target M</div>
                  </div>
                  <div class="persentase">
                    <i class="fa fa-caret-up" aria-hidden="true"></i>
                    32%
                  </div>
                  <div class="clearfix"></div>
                </div>  -->   

                <div class="item">
                  <div class="data">
                    <div class="title">NET PROFIT</div>
                    <div class="nilai">Rp.<?=number_format($NET_PROFIT_REALISASI[$reqBulan],0,',','.')?> M</div>
                    <div class="target">Target <?=number_format($NET_PROFIT_TARGET[$reqBulan],0,',','.')?> M</div>
                  </div>
                  <div class="persentase">
                    <?
                    $vupdown= "fa-caret-down";
                    if($NET_PROFIT_REALISASI[$reqBulan] > $NET_PROFIT_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                    ?>
                    <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                    <?=$NET_PROFIT_PERSENTASE[$reqBulan]?>%
                  </div>
                  <div class="clearfix"></div>

                  <section class="vertical-net-profit slider">
                    <div>
                      <div class="item">
                        <div class="data">
                          <div class="title">Beban Kontrak</div>
                          <div class="nilai">Rp.<?=number_format($BEBAN_KONTRAK_REALISASI[$reqBulan],0,',','.')?> M</div>
                        <div class="target">Target <?=number_format($BEBAN_KONTRAK_TARGET[$reqBulan],0,',','.')?> M</div>
                        </div>
                        <div class="persentase">
                          <?
                          $vupdown= "fa-caret-down";
                          if($BEBAN_KONTRAK_REALISASI[$reqBulan] < $BEBAN_KONTRAK_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                          ?>
                          <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                          <?=$BEBAN_KONTRAK_PERSENTASE[$reqBulan]?>%
                        </div>
                        <div class="clearfix"></div>
                      </div>    
                    </div>
                    <div>
                      <div class="item">
                        <div class="data">
                          <div class="title">Beban Usaha</div>
                          <div class="nilai">Rp.<?=number_format($BEBAN_USAHA_REALISASI[$reqBulan],0,',','.')?> M</div>
                        <div class="target">Target <?=number_format($BEBAN_USAHA_TARGET[$reqBulan],0,',','.')?> M</div>
                        </div>
                        <div class="persentase">
                          <?
                          $vupdown= "fa-caret-down";
                          if($BEBAN_USAHA_REALISASI[$reqBulan] < $BEBAN_USAHA_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                          ?>
                          <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                          <?=$BEBAN_USAHA_PERSENTASE[$reqBulan]?>%
                        </div>
                        <div class="clearfix"></div>
                      </div>   
                    </div>
                    <div>
                      <div class="item">
                        <div class="data">
                          <div class="title">Pendapatan (Biaya) lainnnya</div>
                          <div class="nilai">Rp.<?=number_format($PENDAPATAN_LAINNYA_REALISASI[$reqBulan],0,',','.')?> M</div>
                          <div class="target">Target <?=number_format($PENDAPATAN_LAINNYA_TARGET[$reqBulan],0,',','.')?> M</div>
                        </div>
                        <div class="persentase">
                          <?
                          $vupdown= "fa-caret-down";
                          if($PENDAPATAN_LAINNYA_REALISASI[$reqBulan] > $PENDAPATAN_LAINNYA_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                          ?>
                          <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                          <?=$PENDAPATAN_LAINNYA_PERSENTASE[$reqBulan]?>%
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </section>

                </div>    

                <div class="item item-total">
                  <div class="data">
                    <div class="title">Total Revenue</div>
                    <div class="nilai">Rp.<?=number_format($TOTAL_REVENUE_REALISASI[$reqBulan],0,',','.')?> M</div>
                    <div class="target">Target <?=number_format($TOTAL_REVENUE_TARGET[$reqBulan],0,',','.')?> M</div>
                  </div>
                  <div class="persentase">
                    <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
                    <?=$TOTAL_REVENUE_PERSENTASE[$reqBulan]?>%
                  </div>
                  <div class="clearfix"></div>
                </div>    

              </div>
            </div>
          </div>
          <div class="col-md-6 equal-child-height">
            <!-- GRUP DATA -->
            <div class="grup-data">
              <div class="judul">Aset Turn Over</div>
              <div class="row">
                <div class="col-md-12">
                  <div class="data-persentase">
                    <div class="nilai"><?=$ASSET_TURN_OFFER_REALISASI[$reqBulan]?>  %</div>
                    <div class="data-kenaikan">
                      <div class="kenaikan"><?=$ASSET_TURN_OFFER_PERSENTASE[$reqBulan]?> %</div>
                      <div class="target">Target <?=$ASSET_TURN_OFFER_TARGET[$reqBulan]?> %</div>
                    </div>
                    <div class="tanda">
                      <?
                      $vupdown= "fa-caret-down";
                      if($ASSET_TURN_OFFER_REALISASI[$reqBulan] > $ASSET_TURN_OFFER_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                      ?>
                      <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="inner">
                <div class="item">
                  <div class="data">
                    <div class="title">Pendapatan Rutin</div>
                    <div class="nilai">Rp.<?=number_format($PENDAPATAN_RUTIN_REALISASI[$reqBulan],0,',','.')?> M</div>
                    <div class="target">Target <?=number_format($PENDAPATAN_RUTIN_TARGET[$reqBulan],0,',','.')?> M</div>
                  </div>
                  <div class="persentase">
                    <?
                    $vupdown= "fa-caret-down";
                    if($PENDAPATAN_RUTIN_REALISASI[$reqBulan] > $PENDAPATAN_RUTIN_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                    ?>
                    <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                    <?=$PENDAPATAN_RUTIN_PERSENTASE[$reqBulan]?>%
                  </div>
                  <div class="clearfix"></div>
                </div>   

                <div class="item">
                  <div class="data">
                    <div class="title">Pendapatan Non Rutin</div>
                    <div class="nilai">Rp.<?=number_format($PENDAPATAN_NON_RUTIN_REALISASI[$reqBulan],0,',','.')?> M</div>
                    <div class="target">Target <?=number_format($PENDAPATAN_NON_RUTIN_TARGET[$reqBulan],0,',','.')?> M</div>
                  </div>
                  <div class="persentase">
                    <?
                    $vupdown= "fa-caret-down";
                    if($PENDAPATAN_NON_RUTIN_REALISASI[$reqBulan] > $PENDAPATAN_NON_RUTIN_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                    ?>
                    <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                    <?=$PENDAPATAN_NON_RUTIN_PERSENTASE[$reqBulan]?>%
                  </div>
                  <div class="clearfix"></div>
                </div>   

                <div class="item item-total">
                  <div class="data">
                    <div class="title">Total Asset</div>
                    <div class="nilai">Rp.<?=number_format($TOTAL_ASSET_REALISASI[$reqBulan],0,',','.')?> M</div>
                    <div class="target">Target <?=number_format($TOTAL_ASSET_TARGET[$reqBulan],0,',','.')?> M</div>
                  </div>
                  <div class="persentase">
                    <?
                    $vupdown= "fa-caret-down";
                    if($TOTAL_ASSET_REALISASI[$reqBulan] > $TOTAL_ASSET_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                    ?>
                    <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                    <?=$TOTAL_ASSET_PERSENTASE[$reqBulan]?>%
                  </div>
                  <div class="clearfix"></div>
                </div>    

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="grup-data">
          <div class="judul">Financial Leverage</div>
          <div class="row">
            <div class="col-md-12">
              <div class="data-persentase">
                <div class="nilai"><?=$FINANCIAL_LEVERAGE_REALISASI[$reqBulan]?>  %</div>
                <div class="data-kenaikan">
                  <div class="kenaikan"><?=$FINANCIAL_LEVERAGE_PERSENTASE[$reqBulan]?> %</div>
                  <div class="target">Target <?=$FINANCIAL_LEVERAGE_TARGET[$reqBulan]?> %</div>
                </div>
                <div class="tanda">
                  <?
                  $vupdown= "fa-caret-down";
                  if($FINANCIAL_LEVERAGE_REALISASI[$reqBulan] > $FINANCIAL_LEVERAGE_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                  ?>
                  <i class="fa <?=$vupdown?>" aria-hidden="true"></i>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <!-- <div class="col-md-2" align="right">
              
            </div> -->
          </div>
          <div class="inner">
            <div class="item">
              <div class="data">
                <div class="title">Aset Tidak Lancar</div>
                  <div class="nilai">Rp.<?=number_format($ASSET_TIDAK_LANCAR_REALISASI[$reqBulan],0,',','.')?> M</div>
                  <div class="target">Target <?=number_format($ASSET_TIDAK_LANCAR_TARGET[$reqBulan],0,',','.')?> M</div>
                </div>
                <div class="persentase">
                  <?
                  $vupdown= "fa-caret-down";
                  if($ASSET_TIDAK_LANCAR_REALISASI[$reqBulan] > $ASSET_TIDAK_LANCAR_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                  ?>
                  <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                  <?=$ASSET_TIDAK_LANCAR_PERSENTASE[$reqBulan]?>%
                </div>
              <div class="clearfix"></div>
            </div>    

            <div class="item">
              <div class="data">
                <div class="title">Aset Lancar</div>
                  <div class="nilai">Rp.<?=number_format($ASSET_LANCAR_REALISASI[$reqBulan],0,',','.')?> M</div>
                  <div class="target">Target <?=number_format($ASSET_LANCAR_TARGET[$reqBulan],0,',','.')?> M</div>
                </div>
                <div class="persentase">
                  <?
                  $vupdown= "fa-caret-down";
                  if($ASSET_LANCAR_REALISASI[$reqBulan] > $ASSET_LANCAR_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                  ?>
                  <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                  <?=$ASSET_LANCAR_PERSENTASE[$reqBulan]?>%
                </div>
              <div class="clearfix"></div>

              <section class="vertical-aset-lancar slider">
                <div>
                  <div class="item">
                    <div class="data">
                      <div class="title">Kas Setara Kas</div>
                      <div class="nilai">Rp.<?=number_format($KAS_SETARA_KAS_REALISASI[$reqBulan],0,',','.')?> M</div>
                      <div class="target">Target <?=number_format($KAS_SETARA_KAS_TARGET[$reqBulan],0,',','.')?> M</div>
                    </div>
                    <div class="persentase">
                      <?
                      $vupdown= "fa-caret-down";
                      if($KAS_SETARA_KAS_REALISASI[$reqBulan] > $KAS_SETARA_KAS_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                      ?>
                      <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                      <?=$KAS_SETARA_KAS_PERSENTASE[$reqBulan]?>%
                    </div>
                    <div class="clearfix"></div>
                  </div>    
                </div>
                <div>
                  <div class="item">
                    <div class="data">
                      <div class="title">Piutang Usaha</div>
                      <div class="nilai">Rp.<?=number_format($PIUTANG_USAHA_REALISASI[$reqBulan],0,',','.')?> M</div>
                      <div class="target">Target <?=number_format($PIUTANG_USAHA_TARGET[$reqBulan],0,',','.')?> M</div>
                    </div>
                    <div class="persentase">
                      <?
                      $vupdown= "fa-caret-down";
                      if($PIUTANG_USAHA_REALISASI[$reqBulan] < $PIUTANG_USAHA_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                      ?>
                      <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                      <?=$PIUTANG_USAHA_PERSENTASE[$reqBulan]?>%
                    </div>
                    <div class="clearfix"></div>
                  </div>   
                </div>
                <div>
                  <div class="item">
                    <div class="data">
                      <div class="title">Tagihan Bruto</div>
                      <div class="nilai">Rp.<?=number_format($TAGIHAN_BRUTO_REALISASI[$reqBulan],0,',','.')?> M</div>
                      <div class="target">Target <?=number_format($TAGIHAN_BRUTO_TARGET[$reqBulan],0,',','.')?> M</div>
                    </div>
                    <div class="persentase">
                      <?
                      $vupdown= "fa-caret-down";
                      if($TAGIHAN_BRUTO_REALISASI[$reqBulan] < $TAGIHAN_BRUTO_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                      ?>
                      <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                      <?=$TAGIHAN_BRUTO_PERSENTASE[$reqBulan]?>%
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div>
                  <div class="item">
                    <div class="data">
                      <div class="title">UM & PDM Lainnya</div>
                      <div class="nilai">Rp.<?=number_format($UM_PDM_REALISASI[$reqBulan],0,',','.')?> M</div>
                      <div class="target">Target <?=number_format($UM_PDM_TARGET[$reqBulan],0,',','.')?> M</div>
                    </div>
                    <div class="persentase">
                      <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                      <?=$UM_PDM_PERSENTASE[$reqBulan]?>%
                    </div>
                    <div class="clearfix"></div>
                  </div>    
                </div>
              </section>
            </div>    

            <div class="item item-total">
              <div class="data">
                <div class="title">Total Equitas</div>
                  <div class="nilai">Rp.<?=number_format($TOTAL_EQUITAS_REALISASI[$reqBulan],0,',','.')?> M</div>
                  <div class="target">Target <?=number_format($TOTAL_EQUITAS_TARGET[$reqBulan],0,',','.')?> M</div>
                </div>
                <div class="persentase">
                  <?
                  $vupdown= "fa-caret-down";
                  if($TOTAL_EQUITAS_REALISASI[$reqBulan] > $TOTAL_EQUITAS_TARGET[$reqBulan]) $vupdown= "fa-caret-up";
                  ?>
                  <i class="fa <?=$vupdown?> fa-2x" aria-hidden="true"></i>
                  <?=$TOTAL_EQUITAS_PERSENTASE[$reqBulan]?>%
                </div>
              <div class="clearfix"></div>
            </div>    

          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="col-md-3">
    <div class="area-data-mingguan">
      <section class="regular slider">
        <?for($i=0;$i<count($CASH_FLOW);$i++){?>
        <div>
          <div class="card item-mingguan">
            <div class="card-body">
              <div class="header">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?=getNameMonth($reqBulan)?> 2024, Minggu ke-<?=($i+1)?>  
              </div>
              
              <div class="row kategori">
                <div class="col-md-6 item estimasi"><span>Estimasi</span></div>
                <div class="col-md-6 item realisasi"><span>Realisasi</span></div>
              </div>
              <div class="data">

                <div class="card card-grup">
                  <div class="card-body">
                    <div class="judul-grup">Saldo Awal</div>
                    <div class="row nilai saldo">
                      <div class="col-md-6 item estimasi">Rp.<?=number_format($CASH_FLOW[$i]['SALDO_AWAL_PLAN'],0,',','.')?></div>
                      <div class="col-md-6 item realisasi">Rp.<?=number_format($CASH_FLOW[$i]['SALDO_AWAL_REALISASI'],0,',','.')?></div>
                    </div>
                  </div>
                </div>

                <div class="card card-grup">
                  <div class="card-body">
                    <div class="judul-grup">
                      <div class="row">
                        <div class="col-md-6">Cash In</div>
                        <div class="col-md-6" style="text-align: right">*Dalam Jutaan</div>
                      </div>
                    </div>
                    <div class="inner-data">
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">PLN NP  </div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_NP_PLAN'],0,',','.')?> </span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_NP_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">UMRO </div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_UMRO_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_UMRO_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">PLN NPS </div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_NPS_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_NPS_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">PLN </div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_PLN_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">IPP</div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_IPP_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_IPP_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">Sisa Persekot dll   </div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_DLL_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_DLL_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item"><strong>Total Cash In</strong></div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_TOTAL_PLAN'],0,',','.')?> M</span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHIN_TOTAL_REALISASI'],0,',','.')?> M</span></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card card-grup">
                  <div class="card-body">
                    <div class="judul-grup">Cash Out</div>
                    <div class="inner-data">
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">Kontrak FIX</div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_KONTRAK_FIX_PLAN'],0,',','.')?> </span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_KONTRAK_FIX_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">Kontrak VAR</div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_KONTRAK_VAR_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_KONTRAK_VAR_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">Usaha FIK</div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_USAHA_FIX_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_USAHA_FIX_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item">Usaha VAR</div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_USAHA_VAR_PLAN'],0,',','.')?></span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_USAHA_VAR_REALISASI'],0,',','.')?></span></div>
                      </div>
                      <div class="row nilai">
                        <div class="col-md-12 judul-item"><strong>Total Cash In</strong></div>
                        <div class="col-md-6 item estimasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_TOTAL_PLAN'],0,',','.')?> M</span></div>
                        <div class="col-md-6 item realisasi"><span>Rp.<?=number_format($CASH_FLOW[$i]['CASHOUT_TOTAL_REALISASI'],0,',','.')?> M</span></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card card-grup">
                  <div class="card-body">
                    <div class="judul-grup">Saldo Akhir</div>
                    <div class="row nilai saldo">
                      <div class="col-md-6 item estimasi">Rp.<?=number_format($CASH_FLOW[$i]['SALDO_AKHIR_PLAN'],0,',','.')?></div>
                      <div class="col-md-6 item realisasi">Rp.<?=number_format($CASH_FLOW[$i]['SALDO_AKHIR_REALISASI'],0,',','.')?></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- <img src="http://placehold.it/350x300?text=1"> -->
        </div>
        <?}?>
      </section>
    </div>
  </div>
</div>

<!-- <div class="card item"> -->
          <!-- <div class="card-body nopadding"> -->

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<script src="lib/highcharts/accessibility.js"></script>

<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<? /* ?>
<script type="text/javascript">
  // Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'pie',
    margin: [0,0,0,0]
  },
  exporting: {
    enabled: false
  },
  title: {
    text: null
  },
  subtitle: {
    text: "<div class='persentase'>80%</div>",
        // text: "<div>80%</div> of Total",
    align: "center",
    verticalAlign: "middle",
    // style: {
    //   "fontSize": "12px",
    //   "textAlign": "center"
    // },
    x: 0,
    y: -2,
    useHTML: true
  },
  plotOptions: {
    pie: {
      shadow: false,
      center: ["50%", "50%"],
      dataLabels: {
        enabled: false
      },
      states: {
        hover: {
          enabled: false
        }
      },
      size: "100%",
      innerSize: "95%",
      borderColor: null,
      borderWidth: 8
    }

  },
  tooltip: {
    valueSuffix: '%'
  },
  series: [{
    innerSize: '80%',
    data: [{
      name: 'Speed',
      y: 80,
      color: '#e7eaeb'
    }, {
      name: 'Progress',
      y: 75,
      color: '#4faab9'
    }]
  }],
});

</script>
<? */ ?>

<script type="text/javascript">
  Highcharts.chart('grafik-kas-di-bank', {
    chart: {
      margin: [0,0,0,0]
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$KAS_DIBANK_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
        y: <?=$KAS_DIBANK_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: 100-<?=($KAS_DIBANK_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }]
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-ebitda', {
    chart: {
      margin: [0,0,0,0]
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$EBITDA_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
        y: <?=$EBITDA_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: <?=(100-$EBITDA_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }]
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-bopo', {
    chart: {
      margin: [0,0,0,0]
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$BOPO_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
         y: <?=$BOPO_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: <?=(100-$BOPO_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }]
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-collection-period', {
    chart: {
      margin: [0,0,0,0]
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$COLLECTION_PERIOD_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
         y: <?=$COLLECTION_PERIOD_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: <?=(100-$COLLECTION_PERIOD_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }]
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-roe', {
    chart: {
      // margin: [0,0,0,0],
      // margin: [-5, -5, -5, -5],
      margin: [-7, -7, -7, -7],
      spacingTop: 0,
      spacingBottom: 0,
      spacingLeft: 0,
      spacingRight: 0,
      backgroundColor: null
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$ROE_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
        y: <?=$ROE_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: <?=(100-$ROE_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }],

    plotOptions: {
        pie: {
            size:'100%',
            dataLabels: {
                enabled: false
            }
        }
    },
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-roa', {
    chart: {
      // margin: [0,0,0,0],
      // margin: [-5, -5, -5, -5],
      margin: [-7, -7, -7, -7],
      spacingTop: 0,
      spacingBottom: 0,
      spacingLeft: 0,
      spacingRight: 0,
      backgroundColor: null
    },
    exporting: {
      enabled: false
    },
    title: {
      text: ''
    },
    subtitle: {
      text: "<div class='persentase'><?=$ROA_PERSENTASE[$reqBulan]?>%</div>",
      align: "center",
      verticalAlign: "middle",
      style: {
        "textAlign": "center"
      },
      x: 0,
      y: -2,
      useHTML: true
    },
    series: [{
      type: 'pie',
      enableMouseTracking: false,
      innerSize: '65%',
      dataLabels: {
        enabled: false
      },
      data: [{
        y: <?=$ROE_PERSENTASE_CHART[$reqBulan]?>,
        color: '#4faab9'
      }, {
        y: <?=(100-$ROE_PERSENTASE_CHART[$reqBulan])?>,
        color: '#e3e3e3'
      }]
    }],

    plotOptions: {
        pie: {
            size:'100%',
            dataLabels: {
                enabled: false
            }
        }
    },
  });
</script>

<!-- SLICK -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      // $(".vertical-center-4").slick({
      //   dots: true,
      //   vertical: true,
      //   centerMode: true,
      //   slidesToShow: 4,
      //   slidesToScroll: 2
      // });
      // $(".vertical-center-3").slick({
      //   dots: true,
      //   vertical: true,
      //   centerMode: true,
      //   slidesToShow: 3,
      //   slidesToScroll: 3
      // });
      // $(".vertical-center-2").slick({
      //   dots: true,
      //   vertical: true,
      //   centerMode: true,
      //   slidesToShow: 2,
      //   slidesToScroll: 2
      // });
      // $(".vertical-center").slick({
      //   dots: true,
      //   vertical: true,
      //   centerMode: true,
      // });
      $(".vertical-net-profit").slick({
        dots: false,
        vertical: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false
      });
      $(".vertical-aset-lancar").slick({
        dots: false,
        vertical: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false
      });
      $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
      // $(".center").slick({
      //   dots: true,
      //   infinite: true,
      //   centerMode: true,
      //   slidesToShow: 5,
      //   slidesToScroll: 3
      // });
      // $(".variable").slick({
      //   dots: true,
      //   infinite: true,
      //   variableWidth: true
      // });
      // $(".lazy").slick({
      //   lazyLoad: 'ondemand', // ondemand progressive anticipated
      //   infinite: true
      // });
    });
</script>