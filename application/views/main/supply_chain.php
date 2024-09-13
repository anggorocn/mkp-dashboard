<?
$reqTransaksiBerhasil= 396;

$reqJumlahTransaksi= 12430910831;
$reqJumlahTransaksi= round($reqJumlahTransaksi / 1000000000,2);
$reqJumlahBulanLaluTransaksi= 4199489522;
$reqJumlahBulanLaluTransaksi= round($reqJumlahBulanLaluTransaksi / 1000000000,2);

$reqTotalToko= 143;

$reqTotalSpend= 32037381984;
$reqTotalSpend= round($reqTotalSpend / 1000000000);

$reqTotalKatalog= 4752;
$reqTotalKategori= 6;

$arrgrafikmontlystore= array(43, 57, 62, 68, 90, 113, 137, 143);

$arrvendor= array(
	array("nama"=>"DPT", "nilai"=>62)
	, array("nama"=>"Unlisted", "nilai"=>184)
);

$reqTotalVendor= array_sum(array_column($arrvendor, "nilai"));

$arrtopsuplier= array(
	array("periode"=>"072024", "nama"=>"PT Pratama Baur Sukses", "jumlah"=>4, "nominal"=>1534860270)
	, array("periode"=>"072024", "nama"=>"Warung Waka", "jumlah"=>4, "nominal"=>1440086000)
	, array("periode"=>"072024", "nama"=>"PT Galangan Sumber Rejeki", "jumlah"=>3, "nominal"=>3325279725)
);
$arrtopsuplier= arrorderby($arrtopsuplier, 'nominal', SORT_DESC);
// print_r($arrtopsuplier);exit;

$arrefisiensidpp= array(
	array("nama"=>"Total DPP", "nilai"=>38540523037)
	, array("nama"=>"Total Spent", "nilai"=>32037381984)
);
$efisiensidpppersen= round(($arrefisiensidpp[1]["nilai"] / $arrefisiensidpp[0]["nilai"]) * 100);

$arrrasiopengadaan= array(
	array("nama"=>"Penunjukan langsung", "nilai"=>82, "color"=>"#4faab9")
	, array("nama"=>"Pengadaan langsung", "nilai"=>null, "color"=>"#e75656")
	, array("nama"=>"Lelang", "nilai"=>6, "color"=>"#1f6875")
	, array("nama"=>"M-Speed", "nilai"=>434, "color"=>"#81cbd8")
);

$arrorangproses= array(
	array("nama"=>"ALI FAKHRIZAL", "nilai"=>88)
	, array("nama"=>"DEO FALA", "nilai"=>88)
	, array("nama"=>"DEBRI", "nilai"=>0)
);

$arrorangproseskategori= $arrorangprosesnilai= [];
foreach ($arrorangproses as $k => $v)
{
	array_push($arrorangproseskategori, $v["nama"]);
	array_push($arrorangprosesnilai, $v["nilai"]);
}

$arrspendcategory= array(
	array("periode"=>"072024", "nama"=>"Consumable", "jumlah"=>358, "nominal"=>12430910831)
	, array("periode"=>"072024", "nama"=>"Item B", "jumlah"=>null, "nominal"=>null)
	, array("periode"=>"072024", "nama"=>"Item C", "jumlah"=>null, "nominal"=>null)
	, array("periode"=>"072024", "nama"=>"Item D", "jumlah"=>null, "nominal"=>null)
	, array("periode"=>"072024", "nama"=>"Item E", "jumlah"=>null, "nominal"=>null)
);

$arrspendcategorykategori= $arrspendcategoryjumlah= $arrspendcategorynilai= [];
foreach ($arrspendcategory as $k => $v)
{
	array_push($arrspendcategorykategori, $v["nama"]);
	array_push($arrspendcategoryjumlah, $v["jumlah"]);
	array_push($arrspendcategorynilai, array($v["nama"], $v["nominal"]));
}

$arrspendstore= array(
	array("periode"=>"072024", "nama"=>"CV Gentala Multi Procurement", "jumlah"=>48, "nominal"=>2304096280)
	, array("periode"=>"072024", "nama"=>"Dunia Teknik Mandiri", "jumlah"=>38, "nominal"=>1527349025)
	, array("periode"=>"072024", "nama"=>"Insanhk Teknindo Machinery", "jumlah"=>27, "nominal"=>1180745850)
	, array("periode"=>"072024", "nama"=>"Hansu Teknik", "jumlah"=>27, "nominal"=>921833155)
	, array("periode"=>"072024", "nama"=>"CV Agha Jaya Sakti", "jumlah"=>17, "nominal"=>670477630)
);

$arrspendstorekategori= $arrspendstorejumlah= $arrspendstorenilai= [];
foreach ($arrspendstore as $k => $v)
{
	array_push($arrspendstorekategori, $v["nama"]);
	array_push($arrspendstorejumlah, $v["jumlah"]);
	array_push($arrspendstorenilai, array($v["nama"], $v["nominal"]));
}

$arrprocurementtotal= array(12, 21, 25, 33, 42, 69, 80, 88, null, null, null, null);

$kmbliuser=0;
$cancel=0;
$perencanaan=1;
$pelaksanaan=0;
$levering=13;
$pselesai=0;
$penagihan=63;
$terbayar=11;
$gagal=0;


?>
<ul class="breadcrumb">
  <li><a href="app/">Home</a></li>
  <li>Dashboard Procurement</li>
</ul> 
<!-- <h3 class="judul-halaman">SCM Dashboard (Layer 1)</h3> -->
<h3 class="judul-halaman"> Dashboard Procurement</h3>
<!-- Content Row -->
<div class="row row-konten area-settlement">
  	<div class="col-md-2">
	    <div class="card item-data-angka">
			<div class="card-body">
				<div class="data">
					Total Spend
					<div class="nilai-total">Rp <?=$reqTotalSpend?> M</div>
					<!-- <div class="keterangan">30% Yoy    </div> -->
				</div>
				<div class="ikon">
					<span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
				</div>
				<div class="clearfix"></div>
			</div>
	    </div>
	    <div class="card item-data-angka">
	    	<div class="card-body">
		        <div class="nilai-total"><?=$reqTotalVendor?></div>
		        Listed Vendor
		        <div class="gambar-vendor"><img src="images/img-vendor.png" height="68"></div>
	        </div>
	    </div>

		<div class="card item-data-angka area-summary-mspeed">
			<div class="card-body">
				<div class="judul">Summary M-Speed</div>

				<div class="item">
					<div class="ikon">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>	
					<div class="data">
						<div class="nilai">
							<?=$reqTransaksiBerhasil?>
						</div>
						<div class="title">
							Transaction Succesfully
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="item">
					<div class="ikon">
						<i class="fa fa-line-chart" aria-hidden="true"></i>
					</div>	
					<div class="data">
						<div class="nilai" style="float: none; width: 100%;">
							Rp. <?=$reqJumlahTransaksi?>M
						</div>
						<div class="title" style="float: none; width: 100%;">
							Last Month Rp. <?=$reqJumlahBulanLaluTransaksi?>M
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="item">
					<div class="ikon">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>	
					<div class="data">
						<div class="nilai">
							<?=$reqTotalToko?>
						</div>
						<div class="title">
							Store
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="item">
					<div class="ikon">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>	
					<div class="data">
						<div class="nilai">
							<?=$reqTotalKatalog?>
						</div>
						<div class="title">
							Catalogue From <?=$reqTotalKategori?> Categories
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="item">
					<div id="grafik-monthly-store" style="height: calc(10vh - 0px);"></div>
				</div>
				
			</div>
		</div>
  	</div>
  
  	<div class="col-md-10">
	  	<div class="row" style="heightx: calc(35vh - 0px);">
	  		
	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card area-vendor">
	  				<div class="card-body">
	  					<div class="judul">Listed Vendor</div>
	  					<div id="grafik-vendor" style="height: calc(25vh - 20px);"></div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card item-data-angka area-top-suppliers">
					<div class="card-body">
						<div class="judul">Top suppliers</div>

						<?
						foreach ($arrtopsuplier as $k => $v)
						{
							$vnilai= round($v["nominal"] / 1000000000,2);
						?>
						<div class="item">
							<div class="ikon">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>	
							<div class="data">
								<div class="title">
									<!-- <span><?=$v["jumlah"]?></span> -->
									<?=$v["nama"]?>
								</div>
								<div class="nilai">
									Rp. <?=$vnilai?> M
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<?
						}
						?>
					</div>
				</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card border-radius-15 margin-left-9 margin-right-9">
	  				<div class="card-body">
	  					<div class="judul">% Efisiensi DPP</div>
	  					<div id="grafik-efisiensi" class="grafik-item" style="height: calc(25vh - 50px);"></div>
	  					<div class="item-keterangan">
	  						<span>Total DPP</span> : <?=numberToIna(round($arrefisiensidpp[0]["nilai"] / 1000000,2))?>
	  					</div>
	  					<div class="item-keterangan">
	  						<span>Total Spent</span> : <?=numberToIna(round($arrefisiensidpp[1]["nilai"] / 1000000,2))?>
	  					</div>
	  					<div class="item-keterangan" style="text-align: rightx;font-size: 6pt">
	  						* Dalam jutaan rupiah
	  					</div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card border-radius-15 margin-left-9 margin-right-9">
	  				<div class="card-body">
	  					<div class="judul">Rasio Pengadaan</div>
	  					<div id="grafik-rasio-pengadaan" style="height: calc(25vh - 20px);"></div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card border-radius-15 margin-left-9">
	  				<div class="card-body">
	  					<div class="judul">Orang/Proses</div>
	  					<div id="grafik-orang-proses" style="height: calc(25vh - 20px);"></div>
	  				</div>
	  			</div>
	  		</div>

	  	</div>
	  	<div class="row" style="heightx: calc(20vh - 0px);">
	  		<div class="col-md-12">
	  			<div class="area-spend-by">
	  				<div class="row">
	  					<div class="col-md-6">
	  						<div class="card border-radius-15 margin-right-7">
				  				<div class="card-body">
				  					<div class="judul">Spend by Category</div>
				  					<div class="row">
				  						<div class="col-md-2">
				  							<div class="item-ikon">
					  							<img src="images/icon-category.png" height="34">
					  						</div>
				  						</div>
				  						<div class="col-md-5">
				  							<div id="grafik-bar-spend-by-category" style="height: calc(21vh - 0px);"></div>
				  						</div>
				  						<div class="col-md-5">
				  							<div id="grafik-donut-spend-by-category" style="height: calc(21vh - 0px);"></div>
				  						</div>
				  					</div>
				  					
				  				</div>
				  			</div>
	  					</div>
	  					<div class="col-md-6">
	  						<div class="card border-radius-15 margin-left-7">
				  				<div class="card-body">
				  					<div class="judul">Spend by Store</div>
				  					<div class="row">
				  						<div class="col-md-2">
				  							<div class="item-ikon">
					  							<img src="images/icon-store.png" height="34">
					  						</div>
				  						</div>
				  						<div class="col-md-5">
				  							<div id="grafik-bar-spend-by-store" style="height: calc(21vh - 0px);"></div>
				  						</div>
				  						<div class="col-md-5">
				  							<div id="grafik-donut-spend-by-store" style="height: calc(21vh - 0px);"></div>
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

  	<div class="col-md-12">
  		<div class="area-procurement-total">
  			<div class="inner">
  				<div class="row">
			  		<div class="col-md-3">
			  			<div class="judul">
			  				Procurement<br>total
							<span class="nilai"><?=array_sum($arrprocurementtotal)?></span>
			  			</div>
			  			<div id="grafik-procurement-total"></div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Kembali ke User</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$kmbliuser?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Cancel</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$cancel?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Perencanaan</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$perencanaan?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Pelaksanaan</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$pelaksanaan?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Levering</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$levering?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Pekerjaan Selesai</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$pselesai?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Penagihan</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$penagihan?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Terbayar</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$terbayar?></span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Gagal</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$gagal?></span></i></div>
			  				</div>
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
            renderTo: 'grafik-vendor',
            type: 'pie',
            backgroundColor: null,
            marginLeft: -10,
            marginRight: -10,
            marginBottom: 0
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
                return '<b>'+ this.point.name +'</b>: '+ this.y;
            }
        },
        series: [{
            name: 'Browsers',
            data: [["<?=$arrvendor[0]['nama']?>",<?=$arrvendor[0]['nilai']?>],["<?=$arrvendor[1]['nama']?>",<?=$arrvendor[1]['nilai']?>]],
            colors: ['#4faab9','#e75656'],
            size: '90%',
            innerSize: '50%',
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
                    distance: 0,
                    format: '{point.percentage:.1f}%',
                    style: {
                        fontSize: '10px',
                        color: 'black',
                        textOutline: 'none',
                        opacity: 1
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        legend: {
        	enabled: false,
        	itemStyle: {
        		fontSize: '8px'
        	}

        }
    });

	Highcharts.chart('grafik-efisiensi', {
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
		  text: "<div class='persentase'><?=$efisiensidpppersen?>%</div>",
		  align: "center",
		  verticalAlign: "middle",
		  style: {
		    "textAlign": "center"
		  },
		  x: 0,
		  y: 16,
		  useHTML: true
		},
		tooltip: {
            formatter: function() {
                // return '<b>'+ this.point.name +'</b>: '+ this.y;
                return '<b>'+ this.point.name +'</b><br/>'+ this.point.nominalformat;
            }
        },
		series: [{
		  type: 'pie',
		  // enableMouseTracking: false,
		  innerSize: '50%',
		  dataLabels: {
		    enabled: false
		  },
		  data: [{
		    y: <?=$arrefisiensidpp[0]["nilai"]?>,
		    name: '<?=$arrefisiensidpp[0]["nama"]?>',
		    nominalformat: 'Rp <?=numberToIna($arrefisiensidpp[0]["nilai"])?>',
		    color: '#4faab9'
		  }, {
		    y: <?=$arrefisiensidpp[1]["nilai"]?>,
		    name: '<?=$arrefisiensidpp[1]["nama"]?>',
		    nominalformat: 'Rp <?=numberToIna($arrefisiensidpp[1]["nilai"])?>',
		    color: '#e75656'
		  }]
		}]
	});

	Highcharts.chart('grafik-rasio-pengadaan', {
	    chart: {
	        type: 'column',
	        marginBottom: 90
	    },
	    exporting: {
	    	enabled: false
	    },
	    title: {
	        text: null,
	        align: 'left'
	    },
	    xAxis: {
	        categories: ['Rasio Pengadaan'],
	        labels: {
	        	enabled: false
	        }
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: null
	        },
	        stackLabels: {
	            enabled: true
	        }
	    },
	    legend: {
	    	itemStyle: {
	    		fontSize: '8px'
	    	}
	        // align: 'left',
	        // x: 70,
	        // verticalAlign: 'top',
	        // y: 70,
	        // floating: true,
	        // backgroundColor:
	        //     Highcharts.defaultOptions.legend.backgroundColor || 'white',
	        // borderColor: '#CCC',
	        // borderWidth: 1,
	        // shadow: false
	    },
	    tooltip: {
	        headerFormat: '<b>{point.x}</b><br/>',
	        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
	    },
	    plotOptions: {
	        column: {
	            stacking: 'normal',
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    series: [
	    <?
	    foreach ($arrrasiopengadaan as $k => $v)
	    {
	    	if($k > 0) echo ",";
	    ?>
	    {
	        name: '<?=$v["nama"]?>',
	        data: [<?=$v["nilai"]?>],
	        color: '<?=$v["color"]?>'
	    }
	    <?
		}
	    ?>
	    ]
	});

	Highcharts.chart('grafik-orang-proses', {
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
	        categories: <?=json_encode($arrorangproseskategori)?>,
	        title: {
	            text: null
	        },
	        gridLineWidth: 1,
	        lineWidth: 0
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: null,
	            align: 'high'
	        },
	        labels: {
	            overflow: 'justify'
	        },
	        gridLineWidth: 0
	    },
	    tooltip: {
	        valueSuffix: ''
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
	        // layout: 'vertical',
	        // align: 'right',
	        // verticalAlign: 'top',
	        // x: -40,
	        // y: 80,
	        // floating: true,
	        // borderWidth: 1,
	        // backgroundColor:
	        //     Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
	        // shadow: true
	        enabled: false
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'Jumlah',
	        data: <?=json_encode($arrorangprosesnilai)?>,
	        color: '#4faab9'
	    }]
	});

    $('#grafik-bar-spend-by-category').highcharts({
        chart: {
            type: 'bar',
            // margin: [ 50, 50, 100, 80]
        },
        exporting: {
        	enabled: false
        },
        plotOptions: {
            bar: {
                colorByPoint: true
            }
        },
        colors: [
            '#acc726',
            '#2fabb1',
            '#ff7789',
            '#248b98',
            '#a2ecef'
        ],
        title: {
            text: null
        },
        xAxis: {
            categories: <?=json_encode($arrspendcategorykategori)?>,
            labels: {
                // rotation: -45,
                align: 'right',
                style: {
                    fontSize: '10px',
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
        	labels: {
        		enabled: false,	
        	},
            min: 0,
            title: {
                text: null
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+
                    'Jumlah: '+ Highcharts.numberFormat(this.y, 1)
            }
        },
        series: [{
            name: 'Qty',
            data: <?=json_encode($arrspendcategoryjumlah)?>,
            dataLabels: {
                enabled: true,
                // rotation: -90,
                // color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 0,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Nunito-Bold'
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'grafik-donut-spend-by-category',
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
                return '<b>'+ this.point.name +'</b><br>Nominal : '+ Highcharts.numberFormat(this.y, 1);
            }
        },
        series: [{
            name: 'Category',
            data: <?=json_encode($arrspendcategorynilai)?>,
            colors: ['#a2ecef','#248b98','#ff7789','#2fabb1','#acc726'],
            size: '100%',
            innerSize: '50%',
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
                    distance: -15,
                    format: '{point.percentage:.1f}%',
                    style: {
                        fontSize: '8px',
                        color: '#333',
                        // textOutline: 'none',
                        opacity: 1
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        legend: {
        	itemStyle: {
        		fontSize: '7px'
        	},
        	enabled: false
        }
    });

    $('#grafik-bar-spend-by-store').highcharts({
        chart: {
            type: 'bar',
            // margin: [ 50, 50, 100, 80]
        },
        exporting: {
        	enabled: false
        },
        plotOptions: {
            bar: {
                colorByPoint: true
            }
        },
        colors: [
            '#acc726',
            '#2fabb1',
            '#ff7789',
            '#248b98',
            '#a2ecef'
        ],
        title: {
            text: null
        },
        xAxis: {
            categories: <?=json_encode($arrspendstorekategori)?>,
            labels: {
                // rotation: -45,
                align: 'right',
                style: {
                    fontSize: '10px',
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
        	labels: {
        		enabled: false,	
        	},
            min: 0,
            title: {
                text: null
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+
                    'Jumlah: '+ Highcharts.numberFormat(this.y, 1)
            }
        },
        series: [{
            name: 'Qty',
            data: <?=json_encode($arrspendstorejumlah)?>,
            dataLabels: {
                enabled: true,
                // rotation: -90,
                // color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 0,
                style: {
                    fontSize: '10px',
                    fontFamily: 'Nunito-Bold'
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'grafik-donut-spend-by-store',
            type: 'pie',
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
                return '<b>'+ this.point.name +'</b><br>Nominal : '+ Highcharts.numberFormat(this.y, 1);
            }
        },
        series: [{
            name: 'Category',
            data: <?=json_encode($arrspendstorenilai)?>,
            colors: ['#a2ecef','#248b98','#ff7789','#2fabb1','#acc726'],
            size: '100%',
            innerSize: '50%',
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
                    distance: -15,
                    format: '{point.percentage:.1f}%',
                    style: {
                        fontSize: '8px',
                        color: '#333',
                        // textOutline: 'none',
                        opacity: 1
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        legend: {
        	itemStyle: {
        		fontSize: '7px'
        	},
        	enabled: false
        }
    });

    $('#grafik-monthly-store').highcharts({
        chart: {
            type: 'column',
            margin: [ 0, 0, 0, 0],
            backgroundColor: null
        },
        exporting: {
        	enabled: false
        },
        plotOptions: {
            column: {
                colorByPoint: true
            },
            series: {
            	groupPadding: 0.1,
            	pointPadding: 0
            }
        },
        // plotOptions: {
        //     column: {
        //         colorByPoint: true
        //     },
            
        // },
        colors: [
            '#2fabb1',
            '#ff7789',
            '#248b98',
            '#78dde4',
            // '#a2ecef'
        ],
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt'
            ],
            labels: {
            	enabled: false,

                // rotation: -45,
                align: 'right',
                style: {
                    fontSize: '10px',
                    // fontFamily: 'Verdana, sans-serif'
                },
                step: 1,
            }
        },
        yAxis: {
        	labels: {
        		enabled: false,	
        	},
            min: 0,
            title: {
                text: null
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            formatter: function() {
                return '<b>Jumlah Toko '+ this.x +'</b><br/>' + this.y;
            }
        },
        series: [{
            name: 'Jumlah Toko',
            data: <?=json_encode($arrgrafikmontlystore)?>,
            dataLabels: {
                enabled: true,
                // rotation: -90,
                // color: '#FFFFFF',
                align: 'right',
                x: 0,
                y: 0,
                style: {
                    fontSize: '8px',
                    fontFamily: 'Nunito-Regular'
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    $('#grafik-procurement-total').highcharts({
        chart: {
            type: 'column',
            margin: [ 0, 0, 35, 0],
            backgroundColor: null
        },
        exporting: {
        	enabled: false
        },
        plotOptions: {
            column: {
                colorByPoint: true
            },
            series: {
            	groupPadding: 0.1,
            	pointPadding: 0
            }
        },
        // plotOptions: {
        //     column: {
        //         colorByPoint: true
        //     },
            
        // },
        colors: [
            '#2fabb1',
            '#ff7789',
            '#248b98',
            '#78dde4',
            // '#a2ecef'
        ],
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
            labels: {

                // rotation: -45,
                align: 'right',
                style: {
                    fontSize: '10px',
                    // fontFamily: 'Verdana, sans-serif'
                },
                step: 1,
            }
        },
        yAxis: {
        	labels: {
        		enabled: false,	
        	},
            min: 0,
            title: {
                text: null
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+ 'Procurement: '+ this.y;
            }
        },
        series: [{
            name: 'Procurement',
            data: <?=json_encode($arrprocurementtotal)?>,
            dataLabels: {
                enabled: true,
                // rotation: -90,
                // color: '#FFFFFF',
                align: 'right',
                x: 0,
                y: 0,
                style: {
                    fontSize: '8px',
                    fontFamily: 'Nunito-Regular'
                    // fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

});

</script>