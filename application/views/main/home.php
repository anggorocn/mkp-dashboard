<?
$reqBulan = $this->input->get("reqBulan");

if($reqBulan==''){
    $reqBulan=8;
    $reqBulan=(int)$reqBulan;
}

$peta["orang"]= 4856;
$peta["unit"]= 75;
$peta["proyek"]= 196;

$PENDAPATAN_TARGET =[0, 40.63, 79.93, 134.68, 177.72, 217.44, 269.72, 330.9, 382.02 ,429.35,  489.22,  536.07,  600.12];
// $PENDAPATAN_REALISASI =[0, 37.65, 79.74, 139.54,  189.71,  235.43,  284.96,  340.74];
// $PENDAPATAN_PROGNOSA =[0, 0, 0,   0,   0,   0,   19.8,    333.93,  387.88,  445.79,  508.44,  576.75,  651.84];
$PENDAPATAN_REALISASI =[0, 37.65, 79.74, 139.54, 189.71, 235.43, 284.96, 340.74, 402.94];
$PENDAPATAN_PROGNOSA =[null, null, null, null, null, null, null, null, 445.79, 508.44, 576.75, 651.84];

$v_settlement_kontrak=      [0, 0, 0, 0, 0, 0, 0, 0, 45.374, 0, 0, 0, 0];
$v_settlement_laporan=      [0, 0, 0, 0, 0, 0, 0, 0, 51.169, 0, 0, 0, 0];
$v_settlement_bapp=         [0, 0, 0, 0, 0, 0, 0, 0, 2.134, 0, 0, 0, 0];
$v_settlement_siap_tagih=   [0, 0, 0, 0, 0, 0, 0, 0, 22.073, 0, 0, 0, 0];
$v_settlement_tertagih=     [0, 0, 0, 0, 0, 0, 0, 0, 58.042, 0, 0, 0, 0];

$PLN =[306,  43];
$PLN_NP =[11.485,    6.526,   606, 607];
$PLN_NPS =[18.370,   9.148,   1.252,   2.137];
$NON_PLN =[1.416,    2.149,   1.411,   219];

$PLN_NP_BRUTO =[55.966,  342, 127, 384];
$PLN_NPS_BRUTO =[23.463, 108, 78];
$PLN_BRUTO =[741,    312 ];
$NON_PLN_BRUTO =[3.649, 1.559,   28,  112];

$KPI_LAST='103,74';
$KPI_YOY='-1,00%';

$TREN_KPI_TARGET=[100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100];
$TREN_KPI_REALISASI=[91.69, 97.05, 99.31, 102.11, 106.25, 103.74, 105.27, 104.80];
$TREN_KPI_PROGNOSA=[0, 0, 0, 0, 0, 0, 0, 0, 103.36, 103.32, 103.9, 101.87];

$vTREN_KPI_PROGNOSA= $TREN_KPI_PROGNOSA;
$TREN_KPI_PROGNOSA= [];
foreach ($TREN_KPI_TARGET as $k => $v)
{
  $vkpi= null;
  if(empty($TREN_KPI_REALISASI[$k]))
    $vkpi= $vTREN_KPI_PROGNOSA[$k];

  array_push($TREN_KPI_PROGNOSA, $vkpi);
}
// print_r($TREN_KPI_PROGNOSA);exit;

$KPI_TIDAK_TERCAPAI[0]=[ "nama" => "BOPO", "realisasi" => "92,77","target" => "92,62","kemarin" => '93,59'];

$TOTAL_PEGAWAI=[ 0,4503,   4532,    4552,    4684,    4730,    4778,    4797,    0];
$TOTAL_PEGAWAI_PKWT=[0,2225,   2271,    2267,    2265,    2259,    2251,    2239, 2573];
$TOTAL_PEGAWAI_PKWTT=[0,2278, 2261,    2285,    2419,    2471,    2527,    2558, 2283];

$kontak_dalam_proses=66;
$kontak_selesai=276;
$kontak_akan_berakhir=7;

$PROJECT_ON_GOING =11;
$PROJECT_DONE =167;
$PROJECT_UPCOMING =17;

$rups_Total_Arahan =47;
$rups_Selesai =5;
$rups_Berkelanjutan =37;
$rups_Proses_Tindak_Lanjut =5;

$radir_Selesai=72;
$radir_Dalam_proses=20;
$radir_Belum=2;

$STATUS_SETTLEMENT_KONTRAK=[39363];
$STATUS_SETTLEMENT_LAPORAN=[71659];
$STATUS_SETTLEMENT_BAPP=[1561];
$STATUS_SETTLEMENT_SIAP_TAGIH=[3424];
$STATUS_SETTLEMENT_TERTAGIH=[58649];

$total_top_perform=10;
$total_under_perform=1;
$detail_under_perform[0]='PM ALBER BOLOK';

// 'PLTA BAKARU','5.21579729862986','97.0905126384537','plta'

// $arrLat=array( "nama" => "PLTA BAKARU", "lat" => "5.21579729862986","long" => "97.0905126384537","ket" => 'plta');
$arrLat = array_peta();

$arrpiutangusahabruto= array(
    array("nama"=>"Piutang Usaha", "jumlah"=>47.41)
    , array("nama"=>"Target Piutang", "jumlah"=>47.13)
    , array("nama"=>"Tagihan Bruto", "jumlah"=>104)
    , array("nama"=>"Target Bruto", "jumlah"=>101.95)
);

$arrkategoripeta= array(
    array("jenis"=>"PLN", "color"=>"189db8")
    , array("jenis"=>"Non PLN", "color"=>"14647a")
    , array("jenis"=>"PLNNP", "color"=>"18b8a0")
    , array("jenis"=>"PLNNPS", "color"=>"2bb818")
);
?>
<!-- slick-1.8.1 -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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
  margin: 0px 5px;
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

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
<!-- </div> -->

<!-- Content Row -->
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <? /* ?>
                <div class="area-info-atas">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">KPI</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                        <div class="col-md-7 padding-left-none">
                                            <div class="title">KPI</div>
                                            <div class="nilai-info">
                                                102,11
                                                <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 padding-left-none padding-right-none">
                                            <div class="item-data-angka">
                                                <div class="title">Last month</div>
                                                <div class="nilai">99,31</div>
                                            </div>
                                            <div class="item-data-angka">
                                                <div class="title">YoY</div>
                                                <div class="nilai">97,97%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Revenue</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                        <div class="col-md-7 padding-left-none">
                                            <div class="title">Total Revenue</div>
                                            <div class="nilai-info">
                                                104%
                                                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 padding-left-none padding-right-none">
                                            <div class="item-data-angka">
                                                <div class="title">Target YTD</div>
                                                <div class="nilai">Rp177,7 M</div>
                                            </div>
                                            <div class="item-data-angka">
                                                <div class="title">Actual</div>
                                                <div class="nilai">Rp189,7 M</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cash Available</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                            <div class="col-md-7 padding-left-none">
                                                <div class="title">Cash Available</div>
                                                <div class="nilai-info">
                                                    Rp23,3 M
                                                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 padding-left-none padding-right-none">
                                                <div class="item-data-angka">
                                                    <div class="title">Last Month</div>
                                                    <div class="nilai">33,31</div>
                                                </div>
                                                <!-- <div class="item-data-angka">
                                                    <div class="title">Actual</div>
                                                    <div class="nilai">Rp189,7 M</div>
                                                </div> -->
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <? */ ?>
                <div class="area-data-by-menu">
                    <div class="row row-peta">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Peta</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="area-menu-vertical">
                                                    <section class="vertical slider">
                                                        <div>
                                                            <a href="javascript:void(0)" onclick="buatpeta('')">All</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)" onclick="buatpeta('PLNNP')">PNP</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)" onclick="buatpeta('PLNNPS')">NPS</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)" onclick="buatpeta('PLN')">PLN</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)" onclick="buatpeta('NON PLN')">NON PLN</a>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="area-menu-horisontal">
                                                    <section class="regular slider">
                                                        <div>
                                                            <a href="javascript:void(0)">OM</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">Proyek</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">IC</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">Alber</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">EV</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">Scaff</a>
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0)">Test</a>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="area-peta">
                                                    <div class="inner">
                                                        <div class="inner-peta" id="map">
                                                            <img src="images/img-map.png"> <!-- GANTI DISINI -->
                                                        </div>
                                                        <div class="area-jumlah-angka">
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong><?=$peta["orang"]?></strong> orang
                                                            </div>
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong><?=$peta["unit"]?></strong> unit
                                                            </div>
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong><?=$peta["proyek"]?></strong> proyek
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-grafik">
                        <div class="col-md-4">
                            <div class="area-info-atas">
                                <div class="card">
                                    <!-- Card Header - Dropdown -->
                                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Total Revenue</h6>
                                    </div> -->
                                    <!-- Card Body -->
                                    <div class="card-body border-left-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="title">Realisasi Pendapatan</div>
                                                <div class="nilai"><?=$PENDAPATAN_REALISASI[$reqBulan]?></div>
                                                <div class="title">Miliar</div>
                                                <div class="nilai-info">
                                                    104%
                                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 padding-left-none">
                                                <div class="item-data-angka">
                                                    <div class="title">Target</div>
                                                    <div class="nilai">Rp<?=$PENDAPATAN_TARGET[$reqBulan]?> M</div>
                                                </div>
                                                <div class="item-data-angka">
                                                    <div class="title">YoY</div>
                                                    <div class="nilai">Rp<?=$PENDAPATAN_PROGNOSA[$reqBulan]?>M</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- <div class="card-body border-left-info">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-bottom: 10px;margin-top: 10px;">
                                                <div class="title" style="font-size: 20px; text-align: center;">Total Pendapatan</div>
                                                <div class="title" style="font-size: 40px; text-align: center;">340,74</div>
                                                <div class="title" style="font-size: 20px;  text-align: center;">Miliar</div>
                                                <div class="nilai-info">
                                                    104%
                                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item-data-angka">
                                                    <div class="title">Target YTD</div>
                                                    <div class="nilai" style="font-size: 15px; ">Rp<?=$PENDAPATAN_TARGET[$reqBulan]?> M</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 padding-left-none">
                                                <div class="item-data-angka">
                                                    <div class="title">Actual</div>
                                                    <div class="nilai" style="font-size: 15px; ">Rp<?=$PENDAPATAN_REALISASI[$reqBulan]?>7 M</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-grafik border-radius-10 margin-left-9" style="overflow: hidden;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Trend Pendapatan</h6>
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalPendapatan">
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>
                                    <!-- Modal -->
                                    <div id="myModalPendapatan" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">Trend Pendapatan</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="grafik-trend-pendapatan" style="height: calc(20vh - 30px);"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-table">
                        <div class="col-md-12">
                            <div class="card card-piutang">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Piutang Usaha & Tagihan Bruto</h6>
                                    <!-- Trigger the modal with a button -->
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalPiutangUsaha">
                                        <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>

                                    <!-- Modal -->
                                    <div id="myModalPiutangUsaha" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">Piutang Usaha & Tagihan Bruto (per segmentasi | per usia)</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-piutang-usaha-tagihan-bruto">
                                        <div class="row equal-height-column">
                                            <div class="col-md-2">
                                                <div class="item">
                                                    <div class="title"><?=$arrpiutangusahabruto[0]["nama"]?></div>
                                                    <div class="nilai">Rp <?=$arrpiutangusahabruto[0]["jumlah"]?>M</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title"><?=$arrpiutangusahabruto[1]["nama"]?></div>
                                                    <div class="nilai">Rp <?=$arrpiutangusahabruto[1]["jumlah"]?>M</div>
                                                </div>
                                                <div class="nilai-info" style="font-size: 15px;font-weight: 700;bottom: 0;width: 100%;">
                                                    99,39%
                                                    <span><i  style="color: #ff0e1d;font-size: 40px;" class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="item">
                                                    <div class="title"><?=$arrpiutangusahabruto[2]["nama"]?></div>
                                                    <div class="nilai">Rp <?=$arrpiutangusahabruto[2]["jumlah"]?>M</div>
                                                </div>
                                                <div class="item" style="margin-top: 10px">
                                                    <div class="title"><?=$arrpiutangusahabruto[3]["nama"]?></div>
                                                    <div class="nilai">Rp <?=$arrpiutangusahabruto[3]["jumlah"]?>M</div>
                                                </div>
                                                <div class="nilai-info" style="font-size: 15px;font-weight: 700;bottom: 0;width: 100%;">
                                                    97,99%
                                                    <span><i  style="color: #ff0e1d;font-size: 40px;" class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="area-table margin-right-9">
                                                    <table>
                                                        <tr>
                                                            <td colspan="" style="text-align: center;"></td>
                                                            <td colspan="5" style="text-align: center;background-color: #f1f3f8 !important;color: black;">Piutang Usaha</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>30</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">31-60</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">61-90</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>90</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN</td>
                                                            <td><?=$PLN[0]?></td>
                                                            <td><?=$PLN[1]?></td>
                                                            <td><?=$PLN[2]?></td>
                                                            <td><?=$PLN[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NP</td>
                                                            <td><?=$PLN_NP[0]?></td>
                                                            <td><?=$PLN_NP[1]?></td>
                                                            <td><?=$PLN_NP[2]?></td>
                                                            <td><?=$PLN_NP[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NPS</td>
                                                            <td><?=$PLN_NPS[0]?></td>
                                                            <td><?=$PLN_NPS[1]?></td>
                                                            <td><?=$PLN_NPS[2]?></td>
                                                            <td><?=$PLN_NPS[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NON PLN</td>
                                                            <td><?=$NON_PLN[0]?></td>
                                                            <td><?=$NON_PLN[1]?></td>
                                                            <td><?=$NON_PLN[2]?></td>
                                                            <td><?=$NON_PLN[3]?></td>
                                                        </tr>
                                                    </table>
                                                    <div style="text-align: right;font-size: 8pt">* Dalam jutaan rupiah</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="area-table margin-left-9">
                                                    <table>
                                                        <tr>
                                                            <td colspan="" style="text-align: center;"></td>
                                                            <td colspan="6" style="text-align: center;background-color: #f1f3f8 !important;">Tagihan Bruto</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>30</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">31-60</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">61-90</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>90</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN</td>
                                                            <td><?=$PLN_BRUTO[0]?></td>
                                                            <td><?=$PLN_BRUTO[1]?></td>
                                                            <td><?=$PLN_BRUTO[2]?></td>
                                                            <td><?=$PLN_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NP</td>
                                                            <td><?=$PLN_NP_BRUTO[0]?></td>
                                                            <td><?=$PLN_NP_BRUTO[1]?></td>
                                                            <td><?=$PLN_NP_BRUTO[2]?></td>
                                                            <td><?=$PLN_NP_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NPS</td>
                                                            <td><?=$PLN_NPS_BRUTO[0]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[1]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[2]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NON PLN</td>
                                                            <td><?=$NON_PLN_BRUTO[0]?></td>
                                                            <td><?=$NON_PLN_BRUTO[1]?></td>
                                                            <td><?=$NON_PLN_BRUTO[2]?></td>
                                                            <td><?=$NON_PLN_BRUTO[3]?></td>
                                                        </tr>
                                                    </table>
                                                    <div style="text-align: right;font-size: 8pt">* Dalam jutaan rupiah</div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-5">
                                                <div class="area-table table2">
                                                    <table>
                                                        <tr>
                                                            <td colspan="" style="text-align: center;"></td>
                                                            <td colspan="6" style="text-align: center;background-color: #f1f3f8 !important;">Tagihan Bruto</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>30</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">31-60</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">61-90</td>
                                                            <td style=";background-color: #f1f3f8 !important;color: black;">>90</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN</td>
                                                            <td><?=$PLN_BRUTO[0]?></td>
                                                            <td><?=$PLN_BRUTO[1]?></td>
                                                            <td><?=$PLN_BRUTO[2]?></td>
                                                            <td><?=$PLN_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NP</td>
                                                            <td><?=$PLN_NP_BRUTO[0]?></td>
                                                            <td><?=$PLN_NP_BRUTO[1]?></td>
                                                            <td><?=$PLN_NP_BRUTO[2]?></td>
                                                            <td><?=$PLN_NP_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NPS</td>
                                                            <td><?=$PLN_NPS_BRUTO[0]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[1]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[2]?></td>
                                                            <td><?=$PLN_NPS_BRUTO[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NON PLN</td>
                                                            <td><?=$NON_PLN_BRUTO[0]?></td>
                                                            <td><?=$NON_PLN_BRUTO[1]?></td>
                                                            <td><?=$NON_PLN_BRUTO[2]?></td>
                                                            <td><?=$NON_PLN_BRUTO[3]?></td>
                                                        </tr>
                                                    </table>
                                                    <div style="text-align: right;font-size: 8pt">* Dalam jutaan rupiah</div>
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
    </div>
    <div class="col-md-6 area-kanan-dashboard">
        <div class="inner">
            <div class="row row-grafik">
                <div class="col-md-4">
                    <div class="area-info-atas">
                        <div class="card" style="height: calc(100% - 10px);">
                            <!-- Card Header - Dropdown -->
                            <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">KPI</h6>
                            </div> -->
                            <!-- Card Body -->
                            <!-- <div class="card-body border-left-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title">KPI</div>
                                        <div class="title" style="font-size: 30px;"> 105, 27</div>
                                        <div class="title">Miliar</div>
                                        <div class="nilai-info">
                                            102,11
                                            <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 padding-left-none">
                                        <div class="item-data-angka">
                                            <div class="title">Last month</div>
                                            <div class="nilai"><?=$KPI_LAST?></div>
                                        </div>
                                        <div class="item-data-angka">
                                            <div class="title">YoY</div>
                                            <div class="nilai"><?=$KPI_YOY?></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="card-body border-left-info">
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="title">KPI</div>
                                        <div class="nilai"> 105, 27</div>
                                        <!-- <div class="title">Miliar</div> -->
                                        <div class="nilai-info">
                                            102,11
                                            <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                   <div class="col-md-6 padding-left-none">
                                        <div class="item-data-angka">
                                            <div class="title">Last month</div>
                                            <div class="nilai"><?=$KPI_LAST?></div>
                                        </div>
                                        <div class="item-data-angka">
                                            <div class="title">YoY</div>
                                            <div class="nilai"><?=$KPI_YOY?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-trend-kpi">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Trend Key Performance Indicator</h6>
                            <!-- Trigger the modal with a button -->
                            <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModal">
                                <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                <img src="images/ikon-bod-note-add.png">
                            </a>

                            <!-- Modal -->
                            <div id="myModal" class="modal modal-bod fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="display: block;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">BOD Notes : <span class="nama-modul">Trend Key Performance Indicator</span></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="comment">Comment:</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                        </div> 
                                        <button type="submit" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div> -->
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="grafik-trend-kpi"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-slide">
                <div class="col-md-12">
                    <div class="area-kpi-tidak-tercapai">
                        <div class="card">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">KPI tidak tercapai</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="inner">
                                        <section class="regular-kpi-tidak-tercapai slider">
                                            <? for($i=0;$i<count($KPI_TIDAK_TERCAPAI);$i++){ ?>
                                                <div>
                                                    <div class="card">
                                                        <!-- Card Header - Dropdown -->
                                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary"><?=$KPI_TIDAK_TERCAPAI[$i]['nama']?></h6>
                                                        </div>
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <div class="nilai"><span><?=$KPI_TIDAK_TERCAPAI[$i]['realisasi']?> %</span>  Current</div>
                                                            <div class="nilai"><span><?=$KPI_TIDAK_TERCAPAI[$i]['kemarin']?> %</span>       Last Month</div>
                                                            <div class="nilai"><span><?=$KPI_TIDAK_TERCAPAI[$i]['target']?> %</span>  Target</div>
                                                            <div class="persentase">
                                                                <i class="fa fa-caret-up" aria-hidden="true"></i>
                                                                98,18%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?}?>
                                            
                                            <!-- <div>
                                                <a href="#">Proyek</a>
                                            </div>
                                            <div>
                                                <a href="#">IC</a>
                                            </div>
                                            <div>
                                                <a href="#">Alber</a>
                                            </div>
                                            <div>
                                                <a href="#">EV</a>
                                            </div>
                                            <div>
                                                <a href="#">Scaff</a>
                                            </div>
                                            <div>
                                                <a href="#">Test</a>
                                            </div> -->
                                        </section>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-kotak">
                <div class="col-md-6 sub-kiri">
                    <div class="row">
                        <div class="col-md-6 sub-kiri">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total pegawai</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-total-employee">
                                        <?
                                        $vtotalpegawai= $TOTAL_PEGAWAI_PKWT[$reqBulan] + $TOTAL_PEGAWAI_PKWTT[$reqBulan];
                                        ?>
                                        <div class="nilai" style="font-size: 27px"><?=$vtotalpegawai?></div>
                                        <!-- <div class="persentase"style="font-size:10px">Orang</div><br> -->
                                        <!-- <i class="fa fa-caret-up" aria-hidden="true"></i> -->
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="area-grafik-status">
                                <div class="card">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="inner">
                                            <div id="grafik-status"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="area-tl-rups">
                                <div class="card">
                                    <!-- Card Header - Dropdown -->
                                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">TL RUPS, TL Radir</h6>
                                    </div> -->
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="area-data-angka">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="judul">TL RUPS</div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="item on-going">
                                                                <div class="title">Total Arahan</div>
                                                                <div class="nilai"><?=$rups_Total_Arahan?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="item done">
                                                                <div class="title">Selesai</div>
                                                                <div class="nilai"><?=$rups_Selesai?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="item total">
                                                                <div class="title">Berkelanjutan</div>
                                                                <div class="nilai"><?=$rups_Berkelanjutan?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="item total">
                                                                <div class="title">Proses Tindak Lanjut</div>
                                                                <div class="nilai"><?=$rups_Proses_Tindak_Lanjut?></div>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="judul">TL Radir</div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item on-going">
                                                        <div class="title">Selesai</div>
                                                        <div class="nilai"><?=$radir_Selesai?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item done">
                                                        <div class="title">Dalam proses</div>
                                                        <div class="nilai"><?=$radir_Dalam_proses?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item total">
                                                        <div class="title">Belum</div>
                                                        <div class="nilai"><?=$radir_Belum?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">

                            <section class="vertical-persekot slider">
                                <!-- <div>
                                    <div class="card">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Persekot over the limit</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="grafik-persekot-over-the-limit"></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div>
                                    <div class="card">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <div class="row"  style="width:100%">
                                                <div class="col-md-8">
                                                    <h6 class="m-0 font-weight-bold text-primary">Status Settlement</h6>
                                                </div>
                                                <div class="col-md-4" style="text-align:right; font-size:10px ;padding-top: 5px">
                                                    <span>*dalam juta rupiah</span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="area-data-angka pop">
                                                <div class="row">
                                                    <div class="col-xs-5ths">
                                                        <div class="item" style="background-color: #fc3a3a">
                                                            <div class="title"></div>
                                                            <div class="nilai"><?=$v_settlement_kontrak[$reqBulan]?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        <div class="item" style="background-color: #c6c6c6">
                                                            <div class="title"></div>
                                                            <div class="nilai"><?=$v_settlement_laporan[$reqBulan]?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        <div class="item" style="background-color: #f4f972">
                                                            <div class="title"></div>
                                                            <div class="nilai"><?=$v_settlement_bapp[$reqBulan]?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        <div class="item" style="background-color: #f7bc2c">
                                                            <div class="title"></div>
                                                            <div class="nilai"><?=$v_settlement_siap_tagih[$reqBulan]?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        <div class="item" style="background-color: #8cce08">
                                                            <div class="title"></div>
                                                            <div class="nilai"><?=$v_settlement_tertagih[$reqBulan]?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="font-size:9px; text-align: center;">
                                                    <div class="col-xs-5ths">
                                                        KONTRAK
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        LAPORAN
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        BAPP
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        SIAP TAGIH
                                                    </div>
                                                    <div class="col-xs-5ths">
                                                        TERTAGIH
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div id="grafik-persekot-jatuh-tempo"></div> -->
                                        </div>
                                    </div>
                                </div>
                            </section>

                            
                            <? /* ?>
                            
                            <? */ ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status kontrak</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-data-angka pop">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Dalam Proses</div>
                                                    <div class="nilai"><?=$kontak_dalam_proses?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Selesai</div>
                                                    <div class="nilai"><?=$kontak_selesai?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Akan Berakhir</div>
                                                    <div class="nilai"><?=$kontak_akan_berakhir?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status project</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-data-angka pop">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item on-going">
                                                    <div class="title">On Going</div>
                                                    <div class="nilai"><?=$PROJECT_ON_GOING?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item done">
                                                    <div class="title">Done</div>
                                                    <div class="nilai"><?=$PROJECT_DONE?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Upcoming</div>
                                                    <div class="nilai"><?=$PROJECT_UPCOMING?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA</h6>
                                    <!-- Trigger the modal with a button -->
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalSLA">
                                        <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>

                                    <!-- Modal -->
                                    <div id="myModalSLA" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">SLA</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-sla">
                                        <div class="row">
                                            <div class="col-md-3 padding-right-none">
                                                <div class="item">
                                                    <div class="title">Top Perform</div>
                                                    <div class="nilai"><?=$total_top_perform?></div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">Under Perform</div>
                                                    <div class="nilai"><?=$total_under_perform?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="item item-top5">
                                                    <div class="title">Top 5 Under Perform</div>
                                                    <div class="nilai">
                                                        <ul>
                                                            <?for($i=0;$i<count($detail_under_perform);$i++){?>
                                                                <li><?=$i+1?>. <?=$detail_under_perform[$i]?></li>
                                                            <?}?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SLICK -->
    <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
    <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical").slick({
        dots: false,
        arrows: false,
        vertical: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
      });
      // $(".vertical-persekot").slick({
      //   dots: false,
      //   arrows: false,
      //   vertical: true,
      //   slidesToShow: 1,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2600,
      // });
      // $(".regular").slick({
      //   dots: false,
      //   arrows: false,
      //   infinite: true,
      //   slidesToShow: 6,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2000,
      // });
      // $(".regular-kpi-tidak-tercapai").slick({
      //   dots: false,
      //   // arrows: false,
      //   infinite: true,
      //   slidesToShow: 2,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2100,
      // });
    });
    </script>

    <!-- <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
    </script> -->

    <?php
    function isMobileDevice() {
        $mobileDevices = array(
            'iPhone','iPad','Android','Windows Phone','BlackBerry',
            'Opera Mini','Symbian','Kindle','Mobile','Tablet','Mobi'
        );

        foreach ($mobileDevices as $device) {
            if (stripos($_SERVER['HTTP_USER_AGENT'], $device) !== false) {
                return true;
            }
        }

        return false;
    }

    if (isMobileDevice()) {
        // echo "Ini adalah perangkat mobile.";
        ?>
        <script type="text/javascript">
        $(document).on('ready', function() {
            $(".vertical-persekot").slick({
                dots: false,
                arrows: false,
                vertical: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2600,
            });
            $(".regular").slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
            $(".regular-kpi-tidak-tercapai").slick({
                dots: false,
                // arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2100,
            });
        });
        </script>
        <?php
    } else {
        // echo "Ini bukan perangkat mobile.";
        ?>
        <script type="text/javascript">
        $(document).on('ready', function() {
            $(".vertical-persekot").slick({
                dots: false,
                arrows: false,
                vertical: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2600,
            });
            $(".regular").slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
            $(".regular-kpi-tidak-tercapai").slick({
                dots: false,
                // arrows: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2100,
            });
        });
        </script>
        <?php
    }
    ?>

    <!-- MAP -->
    <script src="lib/leaflet/leaflet.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="lib/leaflet/leaflet.css">
    <script>
        // startmap

        var map;
        var arrkategoripeta=<?=json_encode($arrkategoripeta)?>;
        // console.log(arrkategoripeta);

        $(document).on('ready', function() {
            buatpeta('')
        });

        function buatpeta(vjenis){

            var arrLat= <?=json_encode($arrLat)?>;

            // untuk reninit
            if (map != undefined)
            {
                map.remove();
            }
            
            map = L.map('map').setView([-0.8917, 117.8707], 4);
            var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var buffers = [];
            // function addMarker(code,lat,lng,color){
            function addMarker(varrmarker){
                code= varrmarker.nama;
                lat= varrmarker.lat;
                lng= varrmarker.long;
                color= varrmarker.ket;

                dtdetil= varrmarker.detil;
                if(typeof dtdetil == "undefined") dtdetil= "";

                /*dtmw= varrmarker.mw;
                if(typeof dtmw == "undefined") dtmw= "0";*/
                // console.log(dtmw);

                var pinColor = "FE7569";

                varrkategoripeta= arrkategoripeta.filter(item => item.jenis === color);
                // console.log(varrkategoripeta);
                if(Array.isArray(varrkategoripeta) && varrkategoripeta.length)
                {
                    pinColor= varrkategoripeta[0]["color"];
                }
                // console.log(pinColor)

                let customIcon = {
                    iconUrl:"images/marker/marker"+pinColor.toUpperCase()+".png"
                    , iconAnchor: [10, 34]
                    , popupAnchor: [1, -34]
                    // , iconSize:[20,40]
                }

                let myIcon = L.icon(customIcon);
                //let myIcon = L.divIcon();

                let iconOptions = {
                    // title:"company name",
                    // draggable:true,
                    icon:myIcon
                }

                var p = L.marker([lat,lng],iconOptions);
                // var p = L.marker([lat,lng]);
                p.title = code;
                p.alt = code;

                // dtmw= "0";
                /*dtjumlahtenagakerja= "0";
                vinfopopup= ""
                +"<table>"
                    +"<tr>"
                        +"<td>"+code+"</td>"
                    +"</tr>"
                    // +"<tr>"
                    //     +"<td>nama unit</td>"
                    //     +"<td></td>"
                    // +"</tr>"
                    +"<tr>"
                        +"<td>"+dtmw+" MW</td>"
                    +"</tr>"
                    +"<tr>"
                        +"<td>Jumlah tenaga kerja: "+dtjumlahtenagakerja+"</td>"
                    +"</tr>"
                +"</table>";*/

                vinfopopup= ""
                +"<table>"
                    +"<tr>"
                        +"<td>"+code+"</td>"
                    +"</tr>"
                    +"<tr>"
                        +"<td>"+dtdetil+"</td>"
                    +"</tr>"
                +"</table>";

                p.bindPopup(vinfopopup);
                p.addTo(map);
                dtcode= [];
                dtcode[0]= code;
                addRowTable(dtcode, [lat,lng]);

                var c = L.circle([lat,lng], {
                    color: pinColor,
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 0
                }).addTo(map);
                buffers.push(c);
            }

            $(document).ready(function (){
                // for (var i=0; i < locations.length; i++){
                //   addMarker(locations[i][0],locations[i][1],locations[i][2],locations[i][4]);
                // }
                $.each(arrLat, function(key, value) {
                    // console.log(value);
                    if(vjenis == "")
                    {
                        // addMarker(value.nama,value.lat,value.long,value.ket);
                        addMarker(value);
                    }
                    else
                    {
                        vket= value.ket;
                        if(vket == vjenis)
                        {
                            // addMarker(value.nama,value.lat,value.long,value.ket);
                            addMarker(value);
                        }
                    }
                });
               
            });

            L.control.scale({maxWidth:240, metric:true, position: 'bottomleft'}).addTo(map);

            $("#range").change(function(e){
              var radius = parseInt($(this).val())
              buffers.forEach(function(e){
                e.setRadius(radius);
                e.addTo(map);
              });
            });

            function addRowTable(dtcode, coords){
              var tr = document.createElement("tr");
              var td = document.createElement("td");
              td.textContent = dtcode[0];
              tr.appendChild(td);
              tr.onclick = function(){map.flyTo(coords, 17);};
            }
        }
        // endmap
    </script>

    <!-- HIGHCHART -->
    <script src="lib/highcharts/highcharts.js"></script>
    <script src="lib/highcharts/series-label.js"></script>
    <script src="lib/highcharts/exporting.js"></script>
    <script src="lib/highcharts/export-data.js"></script>
    <script src="lib/highcharts/accessibility.js"></script>

    <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

    <!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
    <!-- <script src="http://code.highcharts.com/modules/exporting.js"></script> -->


    <!-- TREND KPI -->
    <script type="text/javascript">
        var datakpi=<?=json_encode($TREN_KPI_PROGNOSA)?>;
        datakpi.forEach(function(element, index) {
                if (element === 0) {
                  datakpi[index] = null;
              }
          });
        Highcharts.chart('grafik-trend-kpi', {
            chart: {
                type: 'spline',
                marginBottom: 30,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            subtitle: {
                text: null
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                max: 11,
                labels: {
                    style: {
                        // color: 'red',
                        fontSize: '10px'
                    }
                },
            },
            yAxis: {
                // min: -50,
                title: {
                    text: null
                }
            },
            series: [
            {
                name: 'TARGET',
                data: <?=json_encode($TREN_KPI_TARGET)?>
            },
            {
                name: 'REALISASI',
                data: <?=json_encode($TREN_KPI_REALISASI)?>
            }, {
                name: 'PROGNOSA',
                data: datakpi
            }],
            legend: {
                enabled: false
            }
        });

    </script>

    <!-- TREND PENDAPATAN -->
    <script type="text/javascript">

        var data=<?=json_encode($PENDAPATAN_PROGNOSA)?>;
        data.forEach(function(element, index) {
                if (element === 0) {
                  data[index] = null;
              }
          });
        // console.log(data);
        Highcharts.chart('grafik-trend-pendapatan', {
            chart: {
                type: 'spline',
                marginBottom: 30,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            subtitle: {
                text: null
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                max: 11,
                labels: {
                    style: {
                        // color: 'red',
                        fontSize: '10px'
                    }
                },
            },
            yAxis: {
                // min: -50,
                title: {
                    text: null
                }
            },
            series: [
                {
                  name: 'TARGET',
                    data: <?=json_encode($PENDAPATAN_TARGET)?>,
                  color: "#f2594a"
                },
                {
                  name: 'REALISASI',
                    data: <?=json_encode($PENDAPATAN_REALISASI)?>,
                  color: "#4faab9"
                },
                {
                  name: 'PROGNOSA',
                    data: data,
                  color: "green"
                }
              ],
            legend: {
                enabled: false
            }
        });
    </script>

    <!-- GRAFIK STATUS -->
    <script type="text/javascript">
        // Data retrieved from https://netmarketshare.com/
        // Build the chart
        // Highcharts.chart('grafik-status', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     exporting: {
        //         enabled: false,
        //     },
        //     title: {
        //         text: null,
        //         align: 'left'
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        //     },
        //     accessibility: {
        //         point: {
        //             valueSuffix: '%'
        //         }
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: false
        //             },
        //             showInLegend: true
        //         }
        //     },
        //     series: [{
        //         name: 'Brands',
        //         colorByPoint: true,
        //         data: [{
        //             name: 'Chrome',
        //             y: 74.77,
        //             sliced: true,
        //             selected: true
        //         },  {
        //             name: 'Edge',
        //             y: 12.82
        //         },  {
        //             name: 'Firefox',
        //             y: 4.63
        //         }, {
        //             name: 'Safari',
        //             y: 2.44
        //         }, {
        //             name: 'Internet Explorer',
        //             y: 2.02
        //         }, {
        //             name: 'Other',
        //             y: 3.28
        //         }]
        //     }]
        // });

    </script>
    <script type="text/javascript">
        $(function() {           
           var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'grafik-status',
                    
                    margin: [0, 0, 0, 0],
                    marginRight: 65,
                    // spacingTop: 0,
                    // spacingBottom: 0,
                    // spacingLeft: 0,
                    // spacingRight: 20
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: null
                },
                plotOptions: {
                    pie: {
                        size:'110%',
                        innerSize: '50%',
                        dataLabels: {
                            enabled: false
                        }
                    }
                },
                series: [{
                    showInLegend:true,
                    type: 'pie',
                    name: 'Status',
                    data: [
                        ['PKWTT', <?=$TOTAL_PEGAWAI_PKWT[$reqBulan]?>],
                        ['PKWT', <?=$TOTAL_PEGAWAI_PKWTT[$reqBulan]?>]
                    ],
                    colors: ['#2d82cc','#ffc534']
                }],
                // legend: {
                    // itemStyle: {
                    //     // color: 'white',
                    //     // fontWeight: 'bold',
                    //     fontSize: '5px'
                    // },
                    // layout: 'horizontal', // default
                    // itemDistance: 50
                // },
                // legend: {
                    // width: '100%',
                    // floating: true,
                    // align: 'left',
                    // x: 0, // = marginLeft - default spacingLeft
                    // itemWidth: 150,
                    // borderWidth: 1,
                    // layout: 'vertical', // default
                // },
                legend: {
                    itemStyle: {
                        fontSize: '8px'
                    },
                    align: 'right',
                    verticalAlign: 'top',
                    layout: 'vertical',
                    x: 0,
                    y: 0
                },
                
                
            });
        });
    </script>

    <!-- GRAFIK PERSEKOT OTL -->
    <script type="text/javascript">
        // Highcharts.chart('grafik-persekot-over-the-limit', {
        //     chart: {
        //         type: 'bar',
        //         marginTop: 0,
        //         marginBottom: 0,
        //     },
        //     exporting: {
        //         enabled: false
        //     },
        //     title: {
        //         text: null
        //     },
        //     xAxis: {
        //         labels: {
        //             enabled: false
        //         }
        //     },
        //     yAxis: {
        //         min: 0,
        //         title: {
        //             text: null
        //         },
        //         labels: {
        //             enabled: false
        //         }
        //     },
        //     legend: {
        //         enabled: false
        //     },
        //     // plotOptions: {
        //     //     series: {
        //     //         stacking: 'normal'
        //     //     }
        //     // },
        //     plotOptions: {
        //         bar: {
        //             stacking: 'normal',
        //             pointPadding: 0,
        //             groupPadding: 0.2,
        //             dataLabels: {
        //                 enabled: true,
        //                 color: 'black',
        //                 align: "right",
        //                 format: '{y} M',
        //                 inside: false,
        //                 style: {
        //                     fontWeight: 'bold'
        //                 },
        //                 verticalAlign: "middle"
        //             },
        //         }
        //     },
        //     series: [{
        //         name: 'John',
        //         data: [0.72],
        //         color: '#f5153c'
        //     }, {
        //         name: 'Jane',
        //         data: [0.27],
        //         color: '#2d9ca0'
        //     }]
        // });

    </script>

    <!-- GRAFIK PERSEKOT JATUH TEMPO -->
<!--     <script type="text/javascript">
        Highcharts.chart('grafik-persekot-jatuh-tempo', {
            chart: {
                type: 'bar',
                marginTop: 0,
                marginBottom: 0,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            xAxis: {
                labels: {
                    enabled: false
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
            legend: {
                enabled: false
            },
            // plotOptions: {
            //     series: {
            //         stacking: 'normal'
            //     }
            // },
            plotOptions: {
                bar: {
                    stacking: 'normal',
                    pointPadding: 0,
                    groupPadding: 0.2,
                    dataLabels: {
                        enabled: true,
                        color: 'black',
                        align: "right",
                        format: '{y}',
                        inside: false,
                        style: {
                            fontWeight: 'bold'
                        },
                        verticalAlign: "middle"
                    },
                }
            },
            series: [{
                name: 'KONTRAK',
                data: <?/*=json_encode($STATUS_SETTLEMENT_KONTRAK)*/?>,
                color: '#fc3a3a'
            }, {
                name: 'LAPORAN/ON PROGRESS',
                data: <?/*=json_encode($STATUS_SETTLEMENT_LAPORAN)*/?>,
                color: '#c6c6c6'
            },{
                name: 'BAPP',
                data: <?/*=json_encode($STATUS_SETTLEMENT_BAPP)*/?>,
                color: '#f4f972'
            }, {
                name: 'SIAP TAGIH',
                data: <?/*=json_encode($STATUS_SETTLEMENT_SIAP_TAGIH)*/?>,
                color: '#f7bc2c'
            }, {
                name: 'TERTAGIH',
                data: <?/*=json_encode($STATUS_SETTLEMENT_TERTAGIH)*/?>,
                color: '#8cce08'
            }]
        });

    </script> -->