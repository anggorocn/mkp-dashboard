<?
$reqBulan= $this->input->get("reqBulan");
$reqTahun= $this->input->get("reqTahun");
$tj= $this->input->get("tj");
$tk= $this->input->get("tk");

if(empty($reqBulan)){
    $reqBulan=8;
}

if(empty($reqTahun)){
    $reqTahun=2024;
}

if(empty($tj))
{
  $tj= "rutin";
}

if(empty($tk))
{
  $tk= "1";
}

$vperiode= generateZero($reqBulan, 2).$reqTahun;

$arrnilaigpm= array(
  array("periode"=>"rekap-072024", "nilai"=> 405.349, "nama"=>"", "persentase"=>67.54, "gpm"=>11.11)
  , array("periode"=>"072024", "nilai"=> 315.025, "nama"=>"PLN NP", "persentase"=>91.20, "gpm"=>14.47)
  , array("periode"=>"072024", "nilai"=> 50.571, "nama"=>"PLN NPS", "persentase"=>23.37, "gpm"=>2.92)
  , array("periode"=>"072024", "nilai"=> 9.607, "nama"=>"PLN", "persentase"=>302.48, "gpm"=>9.25)
  , array("periode"=>"072024", "nilai"=> 30.146, "nama"=>"NON PLN", "persentase"=>85.88, "gpm"=>17.78)
  , array("periode"=>"rekap-082024", "nilai"=> 409.855, "nama"=>"", "persentase"=>68.30, "gpm"=>10.65)
  , array("periode"=>"082024", "nilai"=> 319.531, "nama"=>"PLN NP", "persentase"=>92.51, "gpm"=>13.15)
  , array("periode"=>"082024", "nilai"=> 50.571, "nama"=>"PLN NPS", "persentase"=>23.37, "gpm"=>6.58)
  , array("periode"=>"082024", "nilai"=> 9.607, "nama"=>"PLN", "persentase"=>302.48, "gpm"=>6.71)
  , array("periode"=>"082024", "nilai"=> 30.146, "nama"=>"NON PLN", "persentase"=>85.88, "gpm"=>16.15)
);

$arrdatanilaigpm= [];
$infocarikey= $vperiode;
$arrcheck= in_array_column($infocarikey, "periode", $arrnilaigpm);
// print_r($arrcheck);exit;
foreach ($arrcheck as $vindex)
{
  array_push($arrdatanilaigpm, $arrnilaigpm[$vindex]);
}
// print_r($arrdatanilaigpm);exit;

$grafiksales["target"]= [40631996981/1000000, 79931357203/1000000, 134674172797/1000000, 177717090048/1000000, 217437127220/1000000, 269726325871/1000000, 330904962991/1000000, 382011321345/1000000, 434347929705/1000000, 489215242837/1000000, 536072718966/1000000, null];
$grafiksales["realisasi"]= [78442035975/1000000, 132206812575/1000000, 224496938805/1000000, 297357758639/1000000, 356449977502/1000000, 389285199972/1000000, 400634162273/1000000, 409855320403/1000000];

$arrkontrak["dalam_proses_072024"]["rutin"]= [3];
$arrkontrak["dalam_proses_072024"]["non_rutin"]= [63];
$arrkontrak["dalam_proses_082024"]["rutin"]= [3];
$arrkontrak["dalam_proses_082024"]["non_rutin"]= [63];

$arrkontrak["selesai_072024"]["rutin"]= [62];
$arrkontrak["selesai_072024"]["non_rutin"]= [214];
$arrkontrak["selesai_082024"]["rutin"]= [62];
$arrkontrak["selesai_082024"]["non_rutin"]= [214];

$arrkontrak["akan_berakhir_072024"]= [3,3,1];
$arrkontrak["akan_berakhir_082024"]= [3,3,1];

/*$arrtop5kontrak= array(
  array("periode"=>"072024", "jenis"=>"rutin", "nama"=>"Penugasan PLN NPS OM 1", "nominal"=>44354038872, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"rutin", "nama"=>"Penugasan PLN NPS OM 2", "nominal"=>48254270556, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"rutin", "nama"=>"Penugasan PLN NPS OM 3", "nominal"=>58231147713, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"rutin", "nama"=>"Alat Berat Ketapang PLN NPS", "nominal"=>1071115406, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"rutin", "nama"=>"Rutin PLN NP UPDK Kapuas Sei Wie", "nominal"=>3284657853, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "nama"=>"OH ME Unit 1 Paiton", "nominal"=>5437085917, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "nama"=>"OH MI GT 2.3 GRESIK (Kontrak Payung)", "nominal"=>2014853178, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "nama"=>"OH PULANG PISAU SI PLTU 1 (Kontrak Payung)", "nominal"=>1669187680, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "nama"=>"OH INDRAMAYU SI+ PLTU 2 (Kontrak Payung)", "nominal"=>3050964396, "tanggal"=>"2024-09-08")
  , array("periode"=>"072024", "jenis"=>"non_rutin", "nama"=>"OH KALTIM TELUK SE #2 (Kontrak Payung)", "nominal"=>5503429998, "tanggal"=>"2024-09-08")
);*/

$arrtop5kontrak= array(
  array("jenis"=>"rutin", "tipe"=>"1", "nama"=>"Pengadaan Jasa Borongan Pendukung Teknik Tahun 2022 - 2024 untuk PT PLN Nusantara Power UP Pacitan", "nominal"=>19982752068, "tanggal"=>"2025-12-31")
  , array("jenis"=>"rutin", "tipe"=>"1", "nama"=>"Jasa Borongan Pendukung Teknik Periode 2024 - 2026", "nominal"=>11366400000, "tanggal"=>"2024-12-31")
  , array("jenis"=>"rutin", "tipe"=>"1", "nama"=>"Jasa pengambilan data curah hujan, debit dan klimatologi serta pembersihan stasiun hidroklimatologi dan DWS", "nominal"=>10193880000, "tanggal"=>"2025-12-31")
  , array("jenis"=>"rutin", "tipe"=>"1", "nama"=>"Pengadaan jasa pendukung SMP (Sewa kendaraan listrik) kendaraan golf 6 seat 1 unit", "nominal"=>10069463341, "tanggal"=>"2025-07-31")
  , array("jenis"=>"rutin", "tipe"=>"1", "nama"=>"Pengadaan Jasa sewa motor listrik", "nominal"=>9526833027, "tanggal"=>"2024-12-31")
  , array("jenis"=>"rutin", "tipe"=>"2", "nama"=>"Jasa pemeliharaan rutin AC PT PLN Nusantara Power UP Tenayan", "nominal"=>11343456000, "tanggal"=>"2024-12-31")
  , array("jenis"=>"rutin", "tipe"=>"2", "nama"=>"Jasa Cleaning Industrial Tahun 2024-2026 PT PLN NP UP Pulang Pisau", "nominal"=>7401104520, "tanggal"=>"2025-04-30")
  , array("jenis"=>"rutin", "tipe"=>"2", "nama"=>"Pendukung Pelaksana Jasa O&M PLTMG Sumbawa", "nominal"=>6664494500, "tanggal"=>"")
  , array("jenis"=>"rutin", "tipe"=>"2", "nama"=>"Jasa sewa golf car electric", "nominal"=>6387082800, "tanggal"=>"2026-12-31")
  , array("jenis"=>"rutin", "tipe"=>"2", "nama"=>"Jasa tenaga alih daya (TAD) operator dan pemeliharaan PLTD Sei wie PT PLN NP UPDK Kapuas", "nominal"=>1560000000, "tanggal"=>"2024-08-31")
  , array("jenis"=>"non_rutin", "tipe"=>"1", "nama"=>"Jasa supporting pendukung teknik Overhaul PT PLN NP UMRO JP2 Tahun 2024 OH SI #20 UP Rembang", "nominal"=>5915553660, "tanggal"=>"2024-06-03")
  , array("jenis"=>"non_rutin", "tipe"=>"1", "nama"=>"OH SE UNIT 2 UP PUNAGAYA (Kontrak Payung)", "nominal"=>5469453682, "tanggal"=>"2024-09-02")
  , array("jenis"=>"non_rutin", "tipe"=>"1", "nama"=>"Jasa tenaga kerja pendukung teknik pekerjaan tambahan OH ME #1 UPTA", "nominal"=>5296620191, "tanggal"=>"2024-09-25")
  , array("jenis"=>"non_rutin", "tipe"=>"1", "nama"=>"Jasa pengelolaan operasional pemeliharaan pembangkit untuk repair TVC Pre upgrade tipe C GT 2.2 Muara Tawar", "nominal"=>3392733477, "tanggal"=>"")
  , array("jenis"=>"non_rutin", "tipe"=>"1", "nama"=>"Jasa tenaga pendukung teknik pekerjaan tambahan retubing CWHE B OH SE ST 2.0 Gresik", "nominal"=>2713451767, "tanggal"=>"")
  , array("jenis"=>"non_rutin", "tipe"=>"2", "nama"=>"Jasa tenaga pendukung teknik OH SI PLTU #10 UP Rembang pekerjaan tambahan", "nominal"=>6308412027, "tanggal"=>"2024-10-25")
  , array("jenis"=>"non_rutin", "tipe"=>"2", "nama"=>"Jasa borongan pendukung teknik OH AI GT 2.1 UP Sengkang 2024", "nominal"=>5503429998, "tanggal"=>"")
  , array("jenis"=>"non_rutin", "tipe"=>"2", "nama"=>"OH ME+ UNIT 1 UP PAITON (Kontrak Payung)", "nominal"=>5437085917, "tanggal"=>"2024-09-15")
  , array("jenis"=>"non_rutin", "tipe"=>"2", "nama"=>"OH SI+ UNIT 2 UP TANJUNG AWAR-AWAR (Kontrak Payung)", "nominal"=>4749733999, "tanggal"=>"2024-04-24")
  , array("jenis"=>"non_rutin", "tipe"=>"2", "nama"=>"Jasa tenaga pendukung teknik pekerjaan RSH PLTU #9 Paiton", "nominal"=>4287286850, "tanggal"=>"2024-07-27")
  // , array("jenis"=>"non_rutin", "tipe"=>"", "nama"=>"", "nominal"=>, "tanggal"=>"")
);

if(!empty($tj))
{
  $vtop5kontrak= $arrtop5kontrak;
  $arrdatatop5kontrak= [];
  $infocarikey= $tj;
  $arrcheck= in_array_column($infocarikey, "jenis", $vtop5kontrak);
  // print_r($arrcheck);exit;
  foreach ($arrcheck as $vindex)
  {
    array_push($arrdatatop5kontrak, $vtop5kontrak[$vindex]);
  }
}
// print_r($arrdatatop5kontrak);exit;

if(!empty($tk))
{
  $vtop5kontrak= $arrtop5kontrak;
  $arrdatatop5kontrak= [];
  $infocarikey= $tk;
  $arrcheck= in_array_column($infocarikey, "tipe", $vtop5kontrak);
  // print_r($arrcheck);exit;
  foreach ($arrcheck as $vindex)
  {
    array_push($arrdatatop5kontrak, $vtop5kontrak[$vindex]);
  }
}
// print_r($arrdatatop5kontrak);exit;

$arrtop5kontrak= arrorderby($arrdatatop5kontrak, 'nominal', SORT_DESC);
// print_r($arrtop5kontrak);exit;

// Awareness Program
$arrcusvisit= array(
  array("periode"=>"072024", "nilai"=> 5, "nama"=>"Target")
  , array("periode"=>"072024", "nilai"=> 7, "nama"=>"Realisasi")
  , array("periode"=>"072024", "nilai"=> 140, "nama"=>"%")
  , array("periode"=>"082024", "nilai"=> 6, "nama"=>"Target")
  , array("periode"=>"082024", "nilai"=> 7, "nama"=>"Realisasi")
  , array("periode"=>"082024", "nilai"=> 116, "nama"=>"%")
);

$arrdatacusvisit= [];
$infocarikey= $vperiode;
$arrcheck= in_array_column($infocarikey, "periode", $arrcusvisit);
// print_r($arrcheck);exit;
foreach ($arrcheck as $vindex)
{
  array_push($arrdatacusvisit, $arrcusvisit[$vindex]);
}
// print_r($arrdatacusvisit);exit;
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
    opacity: .2;
  }
  
  .slick-active {
    opacity: .5;
  }

  .slick-current {
    opacity: 1;
  }
</style>

<ul class="breadcrumb">
  <li><a href="app/">Home</a></li>
  <li>Dashboard Sales</li>
</ul> 
<!-- <h3 class="judul-halaman">Marketing Dashboard (Layer 1)</h3> -->
<h3 class="judul-halaman">Dashboard Sales</h3>
<!-- Content Row -->
<div class="row row-konten area-sales">
  <div class="col-md-9">
    <div class="area-data-angka-sales">
      <div class="gambar">
        <img src="images/img-women-sales.png">
      </div>
      <div class="inner">
        <div class="row">
          <div class="col-md-3">
            <div class="item total">
              <?
              $infocarikey= "rekap-".$vperiode;
              $arrcheck= in_array_column($infocarikey, "periode", $arrnilaigpm);
              // print_r($arrcheck);exit;
              $vsalesnilai= $vsalespersentase= $vsalesgpm= "";
              if(!empty($arrcheck))
              {
                $indexsales= $arrcheck[0];
                $vsalesnilai= $arrnilaigpm[$indexsales]["nilai"];
                $vsalespersentase= $arrnilaigpm[$indexsales]["persentase"];
                $vsalesgpm= $arrnilaigpm[$indexsales]["gpm"];
              }
              ?>
              <div class="data">
                <div class="nilai">Rp. <?=$vsalesnilai?> M</div>
                <div class="keterangan">Total Sales</div>
                <div class="persentase">(<?=$vsalespersentase?>%)</div>
              </div>
              <div class="info-persentase">GPM <?=$vsalesgpm?>%</div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="row">
              <?
              foreach ($arrdatanilaigpm as $k => $v)
              {
                // $vnilai= round($v["nilai"] / 1000000000);
                $vnilai= $v["nilai"];
              ?>
              <div class="col-md-3">
                <div class="item">
                  <div class="data">
                    <div class="nilai">Rp. <?=$vnilai?> M</div>
                    <div class="keterangan">By <?=$v["nama"]?></div>
                    <div class="persentase">(<?=$v["persentase"]?>%)</div>
                  </div>
                  <div class="info-persentase">GPM <?=$v["gpm"]?>%</div>
                </div>
              </div>
              <?
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="row" style="height: calc(30vh - 0px);">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            Sales
            <div id="grafik-sales" style="height: calc(30vh - 50px);"></div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                Kontrak Dalam Proses
                <div id="grafik-kontrak-dalam-proses" style="height: calc(30vh - 50px);"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                Kontrak Selesai
                <div id="grafik-kontrak-selesai" style="height: calc(30vh - 50px);"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                Kontrak Akan Berakhir
                <div id="grafik-kontrak-akan-berakhir" style="height: calc(30vh - 50px);"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="area-awareness">

              <div class="judul">Awareness Program</div>

              <div class="item">
                <div class="sub-judul">Total Customer Visit</div>
                <div class="row">
                  <?
                  foreach ($arrdatacusvisit as $k => $val) 
                  {
                    $nilai= $val['nilai'];
                    if ($val['nama']=='%') 
                    {
                      $nilai= $val['nilai']."%";
                    }
                    ?>
                    <div class="col-md-4">
                      <div class="item-data-angka">
                        <div class="title"><?=$val['nama']?></div>
                        <div class="nilai"><?=$nilai?></div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <?
                  }

                  ?>
                  <!-- <div class="col-md-4">
                    <div class="item-data-angka">
                      <div class="title">Target</div>
                      <div class="nilai">5</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="item-data-angka">
                      <div class="title">Realisasi</div>
                      <div class="nilai">7</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="item-data-angka">
                      <div class="title">%</div>
                      <div class="nilai">140%</div>
                      <div class="clearfix"></div>
                    </div>
                  </div> -->
                </div>
              </div>

              <div class="item">
                <div class="sub-judul">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                  Youtube
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Realisasi</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Target</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="sub-judul">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  Instagram
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Realisasi</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Target</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>  
              </div>

              <div class="item">
                <div class="sub-judul">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                  Website
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Realisasi</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-data-angka">
                      <div class="title">Target</div>
                      <div class="nilai">0</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
              

              <!-- <div class="row">
                <div class="col-md-12">
                  <table>
                    <tbody>
                      <tr>
                        <th></th>
                        <th>M1</th>
                        <th>M2</th>
                        <th>M3</th>
                        <th>M4</th>
                      </tr>
                      <tr>
                        <td><i class="fa fa-facebook-square" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                      </tr>
                      <tr>
                        <td><i class="fa fa-instagram" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                      </tr>
                      <tr>
                        <td><i class="fa fa-linkedin-square" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o belum" aria-hidden="true"></i></td>
                        <td align="center"><i class="fa fa-circle-o sudah" aria-hidden="true"></i></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-circle-colorful">
          <div class="card-body">
            <div class="area-prospek">
              <div class="judul">Prospek</div>
              <div class="inner row">
                <div class="col-md-3 item">
                  <div class="">
                    <div class="nilai"><span>4</span></div>
                    <div class="title">PLN</div>
                  </div>
                </div>
                <div class="col-md-3 item">
                  <div class="">
                    <div class="nilai"><span>2</span></div>
                    <div class="title">PNP</div>
                  </div>
                </div>
                <div class="col-md-3 item">
                  <div class="">
                    <div class="nilai"><span>5</span></div>
                    <div class="title">NPS</div>
                  </div>
                </div>
                <div class="col-md-3 item">
                  <div class="">
                    <div class="nilai"><span>3</span></div>
                    <div class="title">NON PLN</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="area-repeat-order">
              <div class="judul">Repeat Order</div>
              <div class="inner">
                <div class="row">
                  <div class="col-md-6">
                    <div class="item">
                      <div class="nilai">9</div>
                      <div class="title">Kontrak akan berakhir</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item">
                      <div class="nilai">7</div>
                      <div class="title">Repeat<br>Order</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="keterangan">
                Terdapat 7 dari 9 kontrak yang repeat order
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="area-repeat-order">
              <div class="judul">Customer get Customer</div>
              <div class="inner">
                <div class="row">
                  <div class="col-md-6">
                    <div class="item">
                      <div class="nilai">2</div>
                      <div class="title">Customer<br>Advocacy</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item">
                      <div class="nilai">5</div>
                      <div class="title">New<br>Customer</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="keterangan">
                Terdapat 5 customer baru dari rekomendasi 2 customer eksisting
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="col-md-3">
    <div class="area-top5">
      <div class="header">
        <div class="row">
          <div class="col-md-6">
            <div class="gambar"><img src="images/img-top5.png"></div>
          </div>
          <div class="col-md-6 text-right">
            <select id="tj">
              <option value="rutin" <? if($tj == "rutin") echo "selected";?>>Rutin</option>
              <option value="non_rutin" <? if($tj == "non_rutin") echo "selected";?>>Non Rutin</option>
            </select>
            <select id="tk">
              <option value="1" <? if($tk == "1") echo "selected";?>>Kontrak Selesai</option>
              <option value="2" <? if($tk == "2") echo "selected";?>>Belum Kontrak</option>
            </select>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="inner">
        <?
        foreach ($arrtop5kontrak as $k => $v)
        {
          $vnominal= numberToIna(round($v["nominal"] / 1000000, 2));
          $vtanggal= "";
          if(!empty($v["tanggal"]))
          {
            $vtanggal= getDay($v["tanggal"])."/".getMonth($v["tanggal"])."/".substr(getYear($v["tanggal"]), 2,2);
          }
        ?>
        <div class="item">
          <span class="nomor"><?=$k+1?></span>
          <span class="nama"><?=$v["nama"]?></span>
          <div class="row">
            <div class="col-md-6">
              <div class="nilai">
                <div class="title">Nilai</div>
                <div class="nilai-info"><?=$vnominal?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="due-date">
                <div class="title">Due Date</div>
                <div class="nilai-info"><?=$vtanggal?></div>
              </div>
            </div>
          </div>
        </div>
        <?
        }
        ?>
        <div style="color: white; text-align: right;font-size: 8pt">* Dalam jutaan rupiah</div>
      </div>
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

<script type="text/javascript">
  Highcharts.chart('grafik-sales', {
    chart: {
        // type: 'column',
        // margin: [ 0, 0, 70, 0]
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

    yAxis: {
        title: {
            text: null
        },
        labels: {
          enabled: false
        }
    },

    xAxis: {
        // accessibility: {
        //     rangeDescription: 'Range: 2010 to 2022'
        // }
        categories: [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        labels: {
          // rotation: -45,
          // align: 'right',
          style: {
              fontSize: '7px',
              fontFamily: 'Nunito-Regular'
          },
          step: 1,
          // rotation: 45,
          // style: {
          //  fontSize: '8px',
          //  fontFamily: 'lato'
          // }
        }
    },

    // legend: {
    //     layout: 'vertical',
    //     align: 'right',
    //     verticalAlign: 'middle'
    // },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            // pointStart: 2010
        }
    },

    series: [{
        name: 'Target',
        data: <?=json_encode($grafiksales["target"])?>,
        color: '#f7931f'
    }, {
        name: 'Realisasi',
        data: <?=json_encode($grafiksales["realisasi"])?>,
        color: '#4faab9'
    }, {
        name: 'Prognosa',
        data: <?=json_encode($grafiksales["prognosa"])?>,
        color: '#e44141'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    },

    legend: {
          itemStyle: {
            fontSize: '10px',
             // font: '9pt Trebuchet MS, Verdana, sans-serif',
             // color: '#A0A0A0'
          },
          itemHoverStyle: {
             // color: '#FFF'
          },
          itemHiddenStyle: {
             // color: '#444'
          }

    },
});
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-kontrak-dalam-proses', {
    chart: {
      type: 'column',
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
        },
        labels: {
          enabled: false
        },
    },
    
    plotOptions: {
      series: {
          borderRadiusTopLeft: '50%',
          borderRadiusTopRight: '50%'
        },
        column: {
            dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none'
            }
        }
    },
    series: [{
        name: 'Rutin',
        data: <?=json_encode($arrkontrak["dalam_proses_".$vperiode]["rutin"])?>,
        color: '#4faab9',
        
    }, {
        name: 'Non Rutin',
        data: <?=json_encode($arrkontrak["dalam_proses_".$vperiode]["non_rutin"])?>,
        color: '#f7931f',
        
    }],
    legend: {
          itemStyle: {
            fontSize: '8px',
             // font: '9pt Trebuchet MS, Verdana, sans-serif',
             // color: '#A0A0A0'
          },
          itemHoverStyle: {
             // color: '#FFF'
          },
          itemHiddenStyle: {
             // color: '#444'
          }

    },

  });

  Highcharts.chart('grafik-kontrak-selesai', {
    chart: {
      type: 'column',
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
        },
        labels: {
          enabled: false
        },
    },
    plotOptions: {
      series: {
          borderRadiusTopLeft: '50%',
          borderRadiusTopRight: '50%'
        },
        column: {
            dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none'
            }
        }
    },
    series: [{
        name: 'Rutin',
        data: <?=json_encode($arrkontrak["selesai_".$vperiode]["rutin"])?>,
        color: '#4faab9',
        
    }, {
        name: 'Non Rutin',
        data: <?=json_encode($arrkontrak["selesai_".$vperiode]["non_rutin"])?>,
        color: '#f7931f',
        
    }],
    legend: {
          itemStyle: {
            fontSize: '8px',
             // font: '9pt Trebuchet MS, Verdana, sans-serif',
             // color: '#A0A0A0'
          },
          itemHoverStyle: {
             // color: '#FFF'
          },
          itemHiddenStyle: {
             // color: '#444'
          }

    },

  });

  Highcharts.chart('grafik-kontrak-akan-berakhir', {
    chart: {
        type: 'bar'
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
        categories: ['60-90 days', '30-60 days', '<30 days'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0,
        labels: {
            style: {
                // color: 'red',
                fontSize: '8px',
            },
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
            align: 'high'
        },
        labels: {
            overflow: 'justify',
            enabled: false
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true,
        enabled: false
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Total',
        data: <?=json_encode($arrkontrak["akan_berakhir_".$vperiode])?>,
        color: '#4f90b9'
    }]
  });

  $("#tj, #tk").change(function(e) {
    reqTahun= $("#reqTahun").val();
    reqBulan= $("#reqBulan").val();
    tj= $("#tj").val();
    tk= $("#tk").val();
    location.href = "app/index/<?=$pg?>?reqBulan="+reqBulan+"&reqTahun="+reqTahun+"&tj="+tj+"&tk="+tk;
  });
</script>

<!-- SLICK -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    });
</script>