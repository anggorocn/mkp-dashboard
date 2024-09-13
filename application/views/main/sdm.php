<!-- <div class="area-mockup-wrapper">
  <img src="images/sdm-mockup.jpg">
</div> -->
<?
$reqBulan = $this->input->get("reqBulan");

if($reqBulan==''){
	$reqBulan=8;
	$reqBulan=(int)$reqBulan;
}
$total_employe=[0,4503,4532,4552,4684,4730,4778,4797];

$pkwt=[0,2225,2271,2267,2265,2259,2251,2239,2573];
$pkwtt=[0,2278,2261,2285,2419,2471,2527,2558,2283];

$jekel_l=[0,4282,4321,4337,4436,4477,4518,4535,4585];
$jekel_p=[0,221,211,215,248,253,260,262,271];

$Usia_17_25=[0,582,612,631,657,673,690,695,720];
$Usia_26_35=[0,2290,2317,2320,2406,2436,2456,2470,2506];
$Usia_36_45=[0,1065,1045,1055,1072,1076,1089,1090,1094];
$Usia_46_55=[0,514,510,504,507,507,506,505,501];
$Usia_55=[0,52,48,42,42,38,37,37,35];

$Pendidikan_SD=[0,72,77,72,75,76,76,76,76];
$Pendidikan_SMP=[0,93,107,105,108,108,109,109,109];
$Pendidikan_SMA=[0,2661,2803,2796,2839,2861,2873,2873,2873];
$Pendidikan_D1=[0,47,47,47,48,48,48,48,48];
$Pendidikan_D3=[0,110,122,126,129,129,128,128,128];
$Pendidikan_D4_S1=[0,412,455,476,526,533,535,535,535];
$Pendidikan_S2=[0,2,2,3,4,4,4,4,4];
$Pendidikan_NO_DATA=[0,1106,919,927,955,971,1005,1024,1083];

$PENDUKUNG_OM=[0,3044,2988,3031,3098,3142,3188,3204,3260];
$INDUSTRIAL_CLEANING=[0,848,836,827,830,831,835,835,915];
$ELECTRIC_VEHICLE=[0,32,34,33,33,33,33,33, 33];
$ALAT_BERAT=[0,342,360,360,359,359,359,360,361];
$PRODUK_LAINNYA=[0,181,257,245,308,309,307,309,231];
$KANTOR_PUSAT=[0,56,57,57,57,57,57,56,56];

$FREELANCE_HELPER=[0,0,0,0,0,0,1280,4847,0];
$FREELANCE_FITTER=[0,0,0,0,0,0,2706,0,0];
$FREELANCE_WELDER=[0,0,0,0,0,0,0,0,0	];

$TURN_IN=[248,65,61,139,64,68,37,0,0,0,0,0];
$TURN_OUT=[10,36,41,7,18,20,18,0,0,0,0,0];

$BULAN_6=[0,672,739,642,891,1116,1192,1487];
$BULAN_3_6=[0,339,334,385,371,199,132,561];
$BULAN_3=[0,679,504,384,112,334,379,284];
$OVERDUE=[0,535,684,874,1045,822,824,226];

$TIME_TO_HIRE['target']='14';
$TIME_TO_HIRE['realisasi']='9.63';
$TIME_TO_HIRE['satuan']='HARI/HIRE';
// $COST_TO_HIRE_RATIO='0';

$BIPEG_RASIO['target']=[0,0,0,0,0,0,0,55];
$BIPEG_RASIO['realisasi']=[0,0,0,0,0,0,0,57];
$BIPEG_RASIO['satuan']='%';

$ENGAGEMENT_RATING=96.75;
// $ENGAGEMENT_RATING=96.43;

$TRAINING_EXPENSE_RATIO=[0,0,2.26,5.44,10.10,0.91,53.31,3.47];
$OVERTIME_PERCENTAGE=[0,28,36,38,23,35,43,43];
$HR_TO_EMPLOYEE=[0,0.24,0.24,0.24,0.23,0.23,0.23,0.23];
$RATIO_COST_PER_EMPLOYEE=[0,0.89,0.22,0.427,0.67,0.82,0.95,1.06 ];
$HC_ROI=[0,  37.653,79.744,139.541,189.707,235.430,284.963,340.739  ];

$TOTAL_MANDATORY_MKP=[0,1305,1301,1320,1339,1328,1337,1353,0];
$TOTAL_MANDATORY_USER=[0,1639,1643,1658,1694,1746,1770,1763,0];
$TOTAL_KARYAWAN=[0,4503,4532,4552,4684,4730,4778,4797,4856];

$TURN_OVER_RATIO=[0,0.23,0.80,0.90,0.15,0.38,0.42,0.38,0.27,0.00,0.00,0.00,0.00,0.00];

$SUMATERA=[0,653,682,682,739,736,752,766,797];
$JAWA=[0,1925,1907,1894,1922,1932,1927,1931,1934];
$KALIMANTAN=[0,575,588,585,587,581,584,586,589];
$SULAWESI=[0,727,725,762,773,779,787,784,784];
$MALUKU=[0,623,630,629,663,702,728,730,752];

$SERTIFIKASI_RENCANA_MKP=[0,12,5,2,81,42,83,27,0,0];
$SERTIFIKASI_REALISASI_MKP=[0,12,0,4,91,38,63,8,0,0];

$SERTIFIKASI_RENCANA_USER=[0,0,0,0,0,0,0,0,0,0];
$SERTIFIKASI_REALISASI_USER=[0,1028,1086,1134,1154,1158,1156,1169,0,0];

$PEMENUHAN_FTK_UNIT=['PLTU KETAPANG','PLTU KETAPANG','PLTMG BIMA','PLTMG SUMBAWA','UP PULANG PISAU','PLTU BANGKA','PLTU ANGGREK', 'PLTU ANGGREK','PLTU KENDARI','PJBS PUSAT','PLTMG ARUN','PLTMG BAWEAN','KILANG PERTAMINA','PLTU SAMBELIA','PLTU BELITUNG','PLTMG BAU - BAU','PLTU KALTIM TELUK','PLTU TENAYAN','UPK BUKIT ASAM','UP GRESIK','UP GRESIK','UPK BUKIT ASAM','UPK BUKIT ASAM','UPDK KAPUAS (SEI RAYA)','UPDK KAPUAS (SIANTAN)','UP PULANG PISAU','BJS TJ JATI 56','BDSN'];

$PEMENUHAN_FTK_PERSEN=['67','100','67','100','100','100','100','100','100','100','100','100','100','100','67','33','100','100','100','100','100','100','67','33','33','100','100','33'];

$PEMENUHAN_FTK_GAP=['2','','2','','','1','2','','','','','','41','18','6','36','','','','','','','2','31','44','','','14'];

$PEMENUHAN_FTK_START_DATE=['21 jun','21 jun','28 jul','28 jun','03 jun','28 jun','10 jul','10 jul','20 jun','20 jun','20 jun','20 jun','08 jul','01 aug','01 aug','26 aug','01 jul','03 jun','26 jun','20 jun','11 jul','16 jul','12 aug','02 sep','02 sep','27 jun','30 jul','26 aug'];

$PEMENUHAN_FTK_END_DATE=['','18 jul ','','07 jul ','28 jun ','23 aug ','23 aug ','19 jul ','28 jun ','28 jun ','14 aug ','28 jun ','01 aug ','23 aug ','','','28 jul ','01 jul ','28 jun ','28 jun ','20 jul ','31 jul ','','','','23 aug ','15 aug ','26 aug '];

$PEMENUHAN_FTK_NEED=['2','1','2','3','9','7','3','1','9','1','1','1','42','32','6','36','1','10','1','1','1','20','2','31','44','8','2','14'];

$PEMENUHAN_FTK_REALISASI=['0','1','0','3','9','6','1','1','9','1','1','1','1','14','0','0','1','10','1','1','1','20','0','0','0','8','2','0'];
?>

<link rel="stylesheet" href="libraries/skillset/skillset.css" type="text/css" />
<script>
jQuery(document).ready(function(){
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});
</script>

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
	margin: 0px 5px;
  /*margin: 0px 20px;*/
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
  <!-- <li><a href="#">Pictures</a></li>
  <li><a href="#">Summer 15</a></li> -->
  <li>Dashboard HR</li>
</ul> 
<h3 class="judul-halaman">Dashboard HR</h3>
<!-- Content Row -->
<div class="row area-sdm">
    <div class="col-md-6">
    	<div class="card area-peta-tenaga-kerja">
    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sebaran tenaga kerja</h6>
            </div>
            <div class="card-body nopadding">
		    	<div class="area-peta">
                    <div class="inner">
                        <div class="inner-peta" id="map">
                            <img src="images/img-map.png"> <!-- GANTI DISINI -->
                        </div>
                    </div>
                </div>
		    </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-6">
	    		<div class="row">
	    			<div class="col-md-4">
	    				<div class="card">
				    		<!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Overview Tenaga Kerja</h6>
				            </div> -->
				            <div class="card-body">
				            	<div class="item-data-angka">
				            		<div class="title">Total Pegawai</div>
									<!-- <div class="nilai"><?=$total_employe[$reqBulan]?></div> -->
									<div class="nilai"><?=$jekel_l[$reqBulan]+$jekel_p[$reqBulan]?></div>
									<div class="keterangan">30% Yoy</div>	
				            	</div>
						    </div>
					    </div>
					    <div class="card">
				    		<!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Overview Tenaga Kerja</h6>
				            </div> -->
				            <div class="card-body">
								<div class="judul-grafik-status">Status</div>
								<div id="grafik-status" style="min-width: 100%; height: 60px; margin: 0 auto"></div>
						    </div>
					    </div>
	    			</div>
	    			<div class="col-md-4">
	    				<div class="card">
				    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Laki-laki</h6>
				            </div>
				            <div class="card-body">
								<div class="item-data-angka">
									<div class="ikon"><img src="images/icon-male.png"></div>
				            		<div class="nilai" align="center"><?=$jekel_l[$reqBulan]?></div>
									<div class="keterangan" align="center">Orang</div>	
				            	</div>
						    </div>
					    </div>
	    			</div>
	    			<div class="col-md-4">
	    				<div class="card">
				    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Perempuan</h6>
				            </div>
				            <div class="card-body">
								<div class="item-data-angka">
									<div class="ikon"><img src="images/icon-female.png"></div>
				            		<div class="nilai" align="center"><?=$jekel_p[$reqBulan]?></div>
									<div class="keterangan" align="center">Orang</div>	
				            	</div>
						    </div>
					    </div>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="row">
	    			<div class="col-md-6">
	    				<div class="card">
				    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Usia</h6>
				            </div>
				            <div class="card-body">
								<div id="grafik-usia" style="min-width: 100%; height: 110px; margin: 0 auto"></div>
						    </div>
					    </div>
	    			</div>
	    			<div class="col-md-6">
	    				<div class="card">
				    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                <h6 class="m-0 font-weight-bold text-primary">Pendidikan</h6>
				            </div>
				            <div class="card-body">
								<div id="grafik-pendidikan" style="min-width: 100%; height: 110px; margin: 0 auto"></div>
						    </div>
					    </div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-9">
	    		<!-- pendukung OM -->
	    		<div class="area-item-slider rutin">
		    		<section class="regular slider">
					    <div>
					    	<div class="item-slider orange">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">PENDUKUNG OM</div>
										<div class="nilai"><?=$PENDUKUNG_OM[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider biru">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">INDUSTRIAL CLEANING</div>
										<div class="nilai"><?=$INDUSTRIAL_CLEANING[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider hijau">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">ELECTRIC VEHICLE</div>
										<div class="nilai"><?=$ELECTRIC_VEHICLE[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">ALAT BERAT</div>
										<div class="nilai"><?=$ALAT_BERAT[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">PRODUK LAINNYA</div>
										<div class="nilai"><?=$PRODUK_LAINNYA[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">KANTOR PUSAT</div>
										<div class="nilai"><?=$KANTOR_PUSAT[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					</section>
				</div>
	    	</div>
	    	<div class="col-md-3">
	    		<div class="area-item-slider non-rutin">
		    		<section class="vertical slider">
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">FREELANCE HELPER</div>
										<div class="nilai"><?=$FREELANCE_HELPER[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">FREELANCE FITTER</div>
										<div class="nilai"><?=$FREELANCE_FITTER[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider toska">
						    	<div class="ikon">
						    		<img src="images/icon-users.png">
						    	</div>
						    	<div class="data">
							    	<div class="item-data-angka">
								    	<div class="title">FREELANCE WELDER</div>
										<div class="nilai"><?=$FREELANCE_WELDER[$reqBulan]?> orang</div>
										<!-- <div class="keterangan">56 unit</div> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					</section>
				</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-8">
	    		<div class="area-item-slider turn-inout">
		    		<section class="vertical turninout slider">
					    <div>
					    	<div class="item-slider">
						    	<div class="judul">
						    		Turn In
						    	</div>
						    	<div class="data">
						    		<div id="grafik-turn-in" style="height: 35px;"></div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					    <div>
					    	<div class="item-slider">
						    	<div class="judul">
						    		Turn Out
						    	</div>
						    	<div class="data">
							    	<div id="grafik-turn-out" style="height: 35px;"></div>
								</div>
								<div class="clearfix"></div>
							</div>
					    </div>
					</section>
				</div>
	    		

	    		<div class="card">
		    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">Kontrak Kerja Pegawai</h6>
		            </div>
		            <div class="card-body">
						<div id="grafik-kontrak-kerja-pegawai" style="min-width: 100%; height: 45px; margin: 0 auto"></div>
				    </div>
			    </div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="card">
		    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">Presensi</h6>
		            </div>
		            <div class="card-body">
						<div class="area-presensi">
							<div class="row">
								<!-- <div class="col-md-6">
									<div class="item-data-angka pagi">
								    	<div class="title">Pagi</div>
										<div class="nilai">100</div>
										<div class="keterangan">orang</div>
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="item-data-angka siang">
								    	<div class="title">Siang</div>
										<div class="nilai">98</div>
										<div class="keterangan">orang</div>
									</div>
								</div>
							</div>
						</div>
				    </div>
			    </div>
	    	</div>
	    </div>
    </div>
    <div class="col-md-6">
    	<div class="area-data-angka">
    		<div class="inner">
    			<div class="row">
	    			<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item merah">
			    			<div class="title">Time to Hire</div>
			    			<div class="nilai"><?=$TIME_TO_HIRE['realisasi']?> <?=$TIME_TO_HIRE['satuan']?></div>
							<div class="keterangan">Target <?=$TIME_TO_HIRE['target']?> <?=$TIME_TO_HIRE['satuan']?></div>
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
<!-- 			    	<div class="col-md-2">
			    		<div class="item merah">
			    			<div class="title">Cost to Hire</div>
			    			<div class="nilai"><?=$COST_TO_HIRE_RATIO?></div>
							<div class="tanda">
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div> -->
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item kuning">
			    			<div class="title">Bipeg Rasio</div>
			    			<div class="nilai"><?=$BIPEG_RASIO['realisasi'][$reqBulan-1]?> <?=$BIPEG_RASIO['satuan']?></div>
							<div class="keterangan">Target <?=$BIPEG_RASIO['realisasi'][$reqBulan-1]?> <?=$BIPEG_RASIO['satuan']?></div>
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item hijau">
			    			<div class="title">Engagement Rating</div>
			    			<div class="nilai"><?=$ENGAGEMENT_RATING?>%</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item abu-abu">
			    			<div class="title">Training effectivness</div>
			    			<div class="nilai">22,90%</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item abu-abu">
			    			<div class="title">Training Expense ratio</div>
			    			<div class="nilai"><?=$TRAINING_EXPENSE_RATIO[$reqBulan]?> %</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item hitam">
			    			<div class="title">Overtime expenses ratio</div>
			    			<div class="nilai"><?=$OVERTIME_PERCENTAGE[$reqBulan]?>%</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item hitam">
			    			<div class="title">Turnover ratio</div>
			    			<div class="nilai"><?=$TURN_OVER_RATIO[$reqBulan]?>%</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
<!-- 			    	<div class="col-md-2">
			    		<div class="item hitam">
			    			<div class="title">Early Turnover ratio</div>
			    			<div class="nilai">0%</div>
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div> -->
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item pink">
			    			<div class="title">HR to Employee ratio</div>
			    			<div class="nilai"><?=$HR_TO_EMPLOYEE[$reqBulan]?> %</div>
							<!-- <div class="keterangan">PERSEN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item pink">
			    			<div class="title">Revenue/Cost to employee</div>
			    			<div class="nilai">Rp. <?=$RATIO_COST_PER_EMPLOYEE[$reqBulan]?> Juta</div>
							<!-- <div class="keterangan">JUTA</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    	<div class="col-md-2" style="max-width:20%; flex: 0 0 20%;">
			    		<div class="item pink">
			    			<div class="title">HC ROI</div>
			    			<div class="nilai"><?=$HC_ROI[$reqBulan]?></div>
							<!-- <div class="keterangan">SATUAN</div> -->
							<div class="tanda">
								<i class="fa fa-caret-up" aria-hidden="true"></i>
							</div>
			    		</div>
			    	</div>
			    </div>
	    	</div>
    	</div>
    	<div class="row">
    		<div class="col-md-6">
    			<div class="card">
		    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">Pemenuhan FTK</h6>
		            </div>
		            <div class="card-body area-data-customer">
				    	<div class="">
		    				<!-- <div class="judul">Customer</div> -->
		    				<div class="judul">
		    					<div class="customer">Customer</div>
		    					<div class="needs">#&nbsp;Needs</div> 
		    					<div class="data-progress">Progress</div>
		    					<div class="realisasi">Realisasi</div>
		    					<div class="gap">GAP</div>
			    				<div class="start-date">Start Date</div>
			    				<div class="end-date">End Date</div>
			    				<div class="tanda">&nbsp;</div>
			    				<div class="clearfix"></div>
			    			</div>
		    				<div class="inner">

		    					<section class="slider pemenuhan-ftk">
		    						<?for($i=0;$i<count($PEMENUHAN_FTK_UNIT);$i++){
		    						if($PEMENUHAN_FTK_PERSEN[$i]==100 && $PEMENUHAN_FTK_GAP[$i]==''){} else{?>
				    					<div>
				    						<div class="skillbar-item">
						    					<div class="skillbar-title"><span><?=$PEMENUHAN_FTK_UNIT[$i]?></span></div>
						    					<div class="skillbar-needs"><?=$PEMENUHAN_FTK_NEED[$i]?></div>
						    					<div class="skillbar-progress">
						    						<div class="skillbar clearfix " data-percent="<?=$PEMENUHAN_FTK_PERSEN[$i]?>%">
														<div class="skillbar-bar" style="background: #507ebd;">
															<div class="skill-bar-percent"><?=$PEMENUHAN_FTK_PERSEN[$i]?>%</div>
														</div>
													</div> <!-- End Skill Bar -->
												</div>
												<div class="skillbar-realisasi"><?=$PEMENUHAN_FTK_REALISASI[$i]?></div>
												<div class="skillbar-gap"><?=$PEMENUHAN_FTK_GAP[$i]?></div>
												<div class="skillbar-start-date">
													<?=strtoupper($PEMENUHAN_FTK_START_DATE[$i])?>
												</div>
												<div class="skillbar-end-date">
													<?=strtoupper($PEMENUHAN_FTK_END_DATE[$i])?>
												</div>
												<div class="skillbar-tanda">
													<i class="fa fa-caret-down" aria-hidden="true" style="font-size:20px; color:red"></i>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<?}
									}?>
								</section>
		    				</div>
		    			</div>
				    </div>
			    </div>
    		</div>
    		<div class="col-md-6">
    			<div class="card">
		    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">Sertifikasi Mandatory</h6>
		            </div>
		            <div class="card-body">
		            	<div class="row">
			            	<div class="col-md-6">
			            		<div class="area-grafik">
			            			<div class="title">MKP</div>
									<div class="nilai"><?=$TOTAL_MANDATORY_MKP[$reqBulan]?> orang</div>
									<div class="keterangan">dari <?=$TOTAL_KARYAWAN[$reqBulan]?></div>
									<div class="grafik" id="grafik-sertifikasi-mkp"></div>
			            		</div>
						    </div>
						    <div class="col-md-6">
						    	<div class="area-grafik">
			            			<div class="title">Customer</div>
									<div class="nilai"><?=$TOTAL_MANDATORY_USER[$reqBulan]?> orang</div>
									<div class="keterangan">dari <?=$TOTAL_KARYAWAN[$reqBulan]?></div>
									<div class="grafik" id="grafik-sertifikasi-user"></div>
			            		</div>
						    </div>
						</div>
				    </div>
			    </div>

			    <div class="card">
		    		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                <h6 class="m-0 font-weight-bold text-primary">Pelatihan &amp; Sertifikasi</h6>
		            </div>
		            <div class="card-body">
		            	<div class="row">
		            		<div class="col-md-3">
		            			<div class="area-menu-vertical sdm">
                                    <!-- <section class="vertical menu slider"> -->
                                        <div>
                                            <a href="#">MKP</a>
                                        </div>
                                        <div>
                                            <a href="#">Pelatihan</a>
                                        </div>
                                        <div>
                                            <a href="#">User</a>
                                        </div>
                                        <div>
                                            <a href="#">Sertifikasi</a>
                                        </div>
                                    <!-- </section> -->
                                </div>
		            		</div>
		            		<div class="col-md-9">
		            			<div class="area-grafik">
			            			<div id="container" style="height: 166px;"></div>
			            		</div>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-md-12">
		            			<div class="area-menu-horisontal sdm">
                                    <!-- <section class="regular menu slider"> -->
                                        <div>
                                            <a href="#">KIT</a>
                                        </div>
                                        <div>
                                            <a href="#">K3</a>
                                        </div>
                                        <div>
                                            <a href="#">SIO</a>
                                        </div>
                                        <div>
                                            <a href="#">Scaff</a>
                                        </div>
                                        <div>
                                            <a href="#">TKPK</a>
                                        </div>
                                        <div>
                                            <a href="#">Others</a>
                                        </div>
                                    <!-- </section> -->
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
  $(".vertical").slick({
    dots: false,
    vertical: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
	autoplaySpeed: 2200,
  });
  $(".regular").slick({
	dots: false,
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,

  });
  $(".pemenuhan-ftk").slick({
    dots: false,
    vertical: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: false,
	autoplaySpeed: 1800,
	arrows: true
  });
  

 //  $(".regular.menu").slick({
	// dots: false,
	// infinite: true,
	// slidesToShow: 6,
	// slidesToScroll: 1,
	// autoplay: false,
	// autoplaySpeed: 2000,

 //  });

  $(".vertical.turninout").slick({
    dots: false,
    vertical: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
	autoplaySpeed: 2300,
  });

 //  $(".vertical.menu").slick({
 //    dots: false,
 //    vertical: true,
 //    slidesToShow: 4,
 //    slidesToScroll: 1,
 //    autoplay: true,
	// autoplaySpeed: 2300,
 //  });

  
  

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

<!-- MAP -->
<script src="lib/leaflet/leaflet.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="lib/leaflet/leaflet.css">
<script>
    // startmap

    map = L.map('map').setView([-0.8917, 117.8707], 3);
    var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    var buffers = [];
    function addMarker(code,lat,lng,color){
        var pinColor = "FE7569";
        if (color=='pltmh') 
        {
            pinColor = "189db8";
        }
        else if (color=='pltm') 
        {
            pinColor = "14647a";
        }
        else if (color=='pltd') 
        {
            pinColor = "18b8a0";
        }
        else if (color=='pltgu') 
        {
            pinColor = "2bb818";
        }
        else if (color=='plta') 
        {
            pinColor = "b8a318";
        }
        else if (color=='pltg') 
        {
            pinColor = "b87218";
        }
        else if (color=='pltmg') 
        {
            pinColor = "6318b8";
        }
        else if (color=='pltu') 
        {
            pinColor = "b818af";
        }
        // console.log(pinColor)

        let customIcon = {
            iconUrl:"images/marker/marker"+pinColor.toUpperCase()+".png",
            // iconUrl:"images/coba.png",
            iconAnchor: [10, 34],
             popupAnchor: [1, -34],
            // iconSize:[20,40]
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
        p.bindPopup(code);
        p.addTo(map);
        addRowTable(code, [lat,lng]);

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
        addMarker('SUMATERA<br><span><?=$SUMATERA[$reqBulan]?> Orang</span>','	3.597031','98.678513','');
        addMarker('JAWA BALI<br><span><?=$JAWA[$reqBulan]?> Orang</span>','	-6.200000','106.816666','');
        addMarker('KALIMATAN<br><span><?=$KALIMANTAN[$reqBulan]?> Orang</span>','	-3.316694','114.590111','');
        addMarker('SULAWESI<br><span><?=$SULAWESI[$reqBulan]?> Orang</span>','	1.474830','124.842079','');
        addMarker('MALUKU NUSRA<br><span><?=$MALUKU[$reqBulan]?> Orang</span>','	-1.500000','127.750000','');
    });

    L.control.scale({maxWidth:240, metric:true, position: 'bottomleft'}).addTo(map);

    $("#range").change(function(e){
      var radius = parseInt($(this).val())
      buffers.forEach(function(e){
        e.setRadius(radius);
        e.addTo(map);
      });
    });

    function addRowTable(code, coords){
      var tr = document.createElement("tr");
      var td = document.createElement("td");
      td.textContent = code;
      tr.appendChild(td);
      tr.onclick = function(){map.flyTo(coords, 17);};
    }
    // endmap
</script>

<!-- SKILLSET -->
<!-- <script src='//assets.codepen.io/assets/common/stopExecutionOnTimeout.js?t=1'></script> -->
<!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<script>
jQuery(document).ready(function () {
    jQuery('.skillbar').each(function () {
        jQuery(this).find('.skillbar-bar').animate({ width: jQuery(this).attr('data-percent') }, 6000);
    });
});
//# sourceURL=pen.js
</script>

<!-- HIGHCHART -->
<script src="lib/highcharts/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	Highcharts.chart('container', {
	  chart: {
	    type: 'column'
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
	    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
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
	    valueSuffix: ' (1000 MT)'
	  },
	  plotOptions: {
	    column: {
	      pointPadding: 0.2,
	      borderWidth: 0
	    }
	  },
	  legend: {
	  	enabled: false
	  },
	  series: [
	    {
	      name: 'RENCANA',
	      data: <?=json_encode($SERTIFIKASI_RENCANA_MKP)?>,
	      color: "#f2594a"
	    },
	    {
	      name: 'REALISASI',
	      data: <?=json_encode($SERTIFIKASI_REALISASI_MKP)?>,
	      color: "#4faab9"
	    }
	  ]
	});
</script>

<script type="text/javascript">
	var data = [  
	{  
	    name: 'Done',  
	    y: <?=$TOTAL_MANDATORY_MKP[$reqBulan]?>,  
	    color: "#ff6666",  
	    dataLabels: {  
	      enabled: false  
	    }  
	  },  
	  {  
	    name: 'To do',  
	    y: <?=$TOTAL_KARYAWAN[$reqBulan]-$TOTAL_MANDATORY_MKP[$reqBulan]?>,  
	    color:"#dddddd",  
	    dataLabels: {  
	      enabled: false  
	    }  
	  }  
	];  

	Highcharts.chart('grafik-sertifikasi-mkp', {  
	  chart: {  
	    plotBorderWidth: 0,  
	    // height:"200px"
	    margin: [0,0,0,0]
	  },  
	  exporting: {
	  	enabled: false
	  },
	  title: {  
	    text: null
	  },  
	  tooltip: {  
	    pointFormat: '<b>{point.percentage:.1f}%</b>'  
	  },  
	  plotOptions: {  
	    pie: {  
	      dataLabels: {  
	        enabled: true,
	        distance: -50,  
	        style: {fontWeight: 'bold', color: 'white'}  
	      },  
	      startAngle: -90,  
	      endAngle: 90,  
	      center: ['50%', '95%'],
	      size: "200%"
	    }  
	  },  
	  series: [{type: 'pie',name: 'Value',innerSize: '60%',data: data}]  
	});
</script>

<script type="text/javascript">
	var data = [  
	{  
	    name: 'Done',  
	    y: <?=$TOTAL_MANDATORY_USER[$reqBulan]?>,  
	    color: "#ff6666",  
	    dataLabels: {  
	      enabled: false  
	    }  
	  },  
	  {  
	    name: 'To do',  
	    y: <?=$TOTAL_KARYAWAN[$reqBulan]-$TOTAL_MANDATORY_USER[$reqBulan]?>,  
	    color:"#dddddd",  
	    dataLabels: {  
	      enabled: false  
	    }  
	  }  
	];  

	Highcharts.chart('grafik-sertifikasi-user', {  
	  chart: {  
	    plotBorderWidth: 0,  
	    // height:"200px"
	    margin: [0,0,0,0]

	  },  
	  exporting: {
	  	enabled: false
	  },
	  title: {  
	    text: null
	  },  
	  tooltip: {  
	    pointFormat: '<b>{point.percentage:.1f}%</b>'  
	  },  
	  plotOptions: {  
	    pie: {  
	      dataLabels: {  
	        enabled: true,
	        distance: -50,  
	        style: {fontWeight: 'bold', color: 'white'}  
	      },  
	      startAngle: -90,  
	      endAngle: 90,  
	      center: ['50%', '95%'],
	      size: "200%"
	    }  
	  },  
	  series: [{type: 'pie',name: 'Value',innerSize: '60%',data: data}]  
	});
</script>

<script type="text/javascript">
	$(function () {
        $('#grafik-usia').highcharts({
            chart: {
                type: 'column',
                margin: [ 0, 0, 25, 0]
            },
            exporting: {
            	enabled: false
            },
            plotOptions: {
                column: {
                    colorByPoint: true
                },
                series: {
                	groupPadding: 0.12,
	            	pointPadding: 0
                }

            },
            colors: [
                '#f7931f',
                '#dd8117',
                '#4faab9',
                '#1f6875',
                '#507ebd'
            ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    '17-25',
                    '26-35',
                    '36-45',
                    '46-55',
                    '>55',
                ],
                labels: {
                    // rotation: -45,
                    // align: 'right',
                    style: {
                        fontSize: '7px',
                        fontFamily: 'Nunito-Regular'
                    }
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
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1);
                }
            },
            series: [{
                name: 'Population',
                data: [<?=$Usia_17_25[$reqBulan]?>, <?=$Usia_26_35[$reqBulan]?>, <?=$Usia_36_45[$reqBulan]?>, <?=$Usia_46_55[$reqBulan]?>, <?=$Usia_55[$reqBulan]?>],
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '8px',
                        fontFamily: 'Nunito-Regular'
                    }
                }
            }]
        });
    });
</script>

<script type="text/javascript">
	$(function () {
        $('#grafik-pendidikan').highcharts({
            chart: {
                type: 'column',
                margin: [ 0, 0, 45, 0]
            },
            exporting: {
            	enabled: false
            },
            plotOptions: {
                column: {
                    colorByPoint: true
                },
                series: {
                	groupPadding: 0.12,
	            	pointPadding: 0
                }
            },
            // colors: [
            //     '#f7931f',
            //     '#dd8117',
            //     '#4faab9',
            //     '#1f6875',
            //     '#507ebd'
            // ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    'SD',
                    'SMP',
                    'SMA',
                    'D1',
                    'D3',
                    'D4/S1',
                    'S2',
                    'NO_DATA',
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
					// 	fontSize: '8px',
					// 	fontFamily: 'lato'
					// }
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
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) ;
                }
            },
            series: [{
                name: 'Population',
                data: [<?=$Pendidikan_SD[$reqBulan]?>, <?=$Pendidikan_SMP[$reqBulan]?>, <?=$Pendidikan_SMA[$reqBulan]?>, <?=$Pendidikan_D1[$reqBulan]?>, <?=$Pendidikan_D3[$reqBulan]?>, <?=$Pendidikan_D4_S1[$reqBulan]?>, <?=$Pendidikan_S2[$reqBulan]?>, <?=$Pendidikan_NO_DATA[$reqBulan]?>],
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '8px',
                        fontFamily: 'Nunito-Regular'
                    }
                }
            }]
        });
    });
</script>

<script type="text/javascript">
	$(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-status',
                type: 'pie',
                margin: [ 5, 25, -1, -20]
            },
            exporting: {
            	enabled: false
            },
            title: {
                text: null
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }
            },
            plotOptions: {
                pie: {
                    shadow: false
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.y
                }
            },
            series: [{
                name: 'Browsers',
                data: [["PKWT",<?=$pkwt[$reqBulan]?>],["PKWTT",<?=$pkwtt[$reqBulan]?>]],
                size: '140%',
                colors: ["#4faab9","#f7931f"],
                innerSize: '50%',
                showInLegend:true,
                dataLabels: {
                    enabled: false
                }
            }],
      //       legend: {
		    //     align: 'right',
		    //     verticalAlign: 'bottom',
		    //     x: 0,
		    //     y: 0
		    // },

		    legend: {
		        align: 'right',
		        verticalAlign: 'bottom',
		        x: 17,
		        y: 10,
		        floating: true,
		        itemStyle: {
		            // color: 'white',
		            // fontWeight: 'bold',
		            fontSize: '6px'
		        },
		        // itemWidth: 80
		    },
        });
    });
</script>

<script type="text/javascript">
	Highcharts.chart('grafik-turn-in', {
		chart: {
            margin: [ 0, 0, 0, 0]
        },
	  title: {
	    text: null,
	    align: 'left'
	  },
	  exporting: {
	  	enabled: false
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
	  	categories : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	  	labels: {
			enabled: false
		}
	    // accessibility: {
	      // rangeDescription: 'Range: 2010 to 2020'
	    // }
	  },

	  legend: {
	    layout: 'vertical',
	    align: 'right',
	    verticalAlign: 'middle',
	    enabled: false
	  },

	  plotOptions: {
	    series: {
	      label: {
	        connectorAllowed: false
	      },
	      // pointStart: 2010
	    }
	  },

	  series: [{
	    name: 'Turn In',
	    data: <?=json_encode($TURN_IN)?>
	}
	  // }, {
	  //   name: 'Manufacturing',
	  //   data: [
	  //     24916, 37941, 29742, 29851, 32490, 30282,
	  //     38121, 36885, 33726, 34243, 31050
	  //   ]
	  // }, {
	  //   name: 'Sales & Distribution',
	  //   data: [
	  //     11744, 30000, 16005, 19771, 20185, 24377,
	  //     32147, 30912, 29243, 29213, 25663
	  //   ]
	  // }, {
	  //   name: 'Operations & Maintenance',
	  //   data: [
	  //     null, null, null, null, null, null, null,
	  //     null, 11164, 11218, 10077
	  //   ]
	  // }, {
	  //   name: 'Other',
	  //   data: [
	  //     21908, 5548, 8105, 11248, 8989, 11816, 18274,
	  //     17300, 13053, 11906, 10073
	  //   ]
	  // }
	  ],

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
	  }

	});
</script>

<script type="text/javascript">
	Highcharts.chart('grafik-turn-out', {
		chart: {
            margin: [ 0, 0, 0, 0]
        },
	  title: {
	    text: null,
	    align: 'left'
	  },
	  exporting: {
	  	enabled: false
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
	  	categories : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	  	labels: {
			enabled: false
		}
	    // accessibility: {
	      // rangeDescription: 'Range: 2010 to 2020'
	    // }
	  },

	  legend: {
	    layout: 'vertical',
	    align: 'right',
	    verticalAlign: 'middle',
	    enabled: false
	  },

	  plotOptions: {
	    series: {
	      label: {
	        connectorAllowed: false
	      },
	      // pointStart: 2010
	    }
	  },

	  series: [{
	    name: 'Turn Out',
	    data: <?=json_encode($TURN_OUT)?>
	}
	  // }, {
	  //   name: 'Manufacturing',
	  //   data: [
	  //     24916, 37941, 29742, 29851, 32490, 30282,
	  //     38121, 36885, 33726, 34243, 31050
	  //   ]
	  // }, {
	  //   name: 'Sales & Distribution',
	  //   data: [
	  //     11744, 30000, 16005, 19771, 20185, 24377,
	  //     32147, 30912, 29243, 29213, 25663
	  //   ]
	  // }, {
	  //   name: 'Operations & Maintenance',
	  //   data: [
	  //     null, null, null, null, null, null, null,
	  //     null, 11164, 11218, 10077
	  //   ]
	  // }, {
	  //   name: 'Other',
	  //   data: [
	  //     21908, 5548, 8105, 11248, 8989, 11816, 18274,
	  //     17300, 13053, 11906, 10073
	  //   ]
	  // }
	  ],

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
	  }

	});
</script>

<script type="text/javascript">
	// Data retrieved from: https://ferjedatabanken.no/statistikk
	Highcharts.chart('grafik-kontrak-kerja-pegawai', {
	    chart: {
	        type: 'bar',
	        margin: [0,0,14,0]
	    },
	    exporting: {
	    	enabled: false
	    },
	    title: {
	        text: null
	    },
	    xAxis: {
	        categories: [
	            'January'
	        ],
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
	        reversed: true,
	        align: 'center',
	        verticalAlign: 'bottom',
	        x: -20,
	        y: 24,
	        itemStyle: {
				fontSize:'8px',
				// font: '20pt Trebuchet MS, Verdana, sans-serif',
				// color: '#A0A0A0'
			},
	    },
	    
	    plotOptions: {
	        series: {
	            stacking: 'normal',
	            dataLabels: {
	                enabled: true
	            },
	            groupPadding: 0,
	            pointPadding: 0
	        }
	    },
	 //    plotOptions: {
		//     bar: {
		//       dataLabels: {
		//         enabled: true
		//       }
		//     },
		//     series: {
		//       groupPadding: 0,
		//       pointPadding: 0
		//     },
		// },
	    series: [{
	        name: '6 bulan',
	        data: [<?=$BULAN_6[$reqBulan]?>],
	        color: "#4faab9"
	    }, {
	        name: '6 - 3 bulan',
	        data: [<?=$BULAN_3_6[$reqBulan]?>],
	        color: "#507ebd"
	    }, {
	        name: '< 3 bulan',
	        data: [<?=$BULAN_3[$reqBulan]?>],
	        color: "#f7931f"
	    }, {
	        name: 'Overdue',
	        data: [<?=$OVERDUE[$reqBulan]?>],
	        color: "#f2594a"
	    }]
	});

</script>

