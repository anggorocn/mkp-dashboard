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
					<div class="nilai-total">Rp XX M</div>
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
		        <div class="nilai-total">130</div>
		        Vendor
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
							73
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
							Rp. XXXXM
						</div>
						<div class="title" style="float: none; width: 100%;">
							Last Month Rp. XXXM
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
							74
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
							3600
						</div>
						<div class="title">
							Catalogue From 12 Categories
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
	  	<div class="row">
	  		
	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card area-vendor">
	  				<div class="card-body">
	  					<div class="judul">Vendor</div>
	  					<div id="grafik-vendor" style="height: calc(25vh - 20px);"></div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card item-data-angka area-top-suppliers">
					<div class="card-body">
						<div class="judul">Top suppliers</div>

						<div class="item">
							<div class="ikon">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>	
							<div class="data">
								<div class="title">
									<span>10</span>
									Supplier 1
								</div>
								<div class="nilai">
									Rp. 1x.xxx M
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="item">
							<div class="ikon">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>	
							<div class="data">
								<div class="title">
									<span>60</span>
									Supplier 2
								</div>
								<div class="nilai">
									Rp. 1x.xxx M
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="item">
							<div class="ikon">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>	
							<div class="data">
								<div class="title">
									<span>100</span>
									Supplier 3
								</div>
								<div class="nilai">
									Rp. 1x.xxx M
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
	  		</div>

	  		<div class="col-md-5ths col-xs-6">
	  			<div class="card border-radius-15 margin-left-9 margin-right-9">
	  				<div class="card-body">
	  					<div class="judul">% Efisiensi thdp HPP</div>
	  					<div id="grafik-efisiensi" class="grafik-item" style="height: calc(25vh - 50px);"></div>
	  					<div class="item-keterangan">
	  						<span>Total HPE</span>			: 3.500,00
	  					</div>
	  					<div class="item-keterangan">
	  						<span>Total Spent</span>			: 3.450,00
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
	  	<div class="row">
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
							<span class="nilai">29</span>
			  			</div>
			  			<div id="grafik-procurement-total"></div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Kembali ke User</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>12</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Cancel</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>3</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Perencanaan</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>20</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Pelaksanaan</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>17</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Levering</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>17</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Pekerjaan Selesai</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>9</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Penagihan</div>
								<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>9</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Terbayar</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>11</span></i></div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-md-1">
			  			<div class="card border-radius-15">
			  				<div class="card-body">
			  					<div class="title">Gagal</div>
								<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>11</span></i></div>
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
                }
            },
            series: [{
                name: 'Browsers',
                data: [["DPT",75],["Unlisted",25]],
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
    });
</script>

<script type="text/javascript">
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
		  text: "<div class='persentase'>80%</div>",
		  align: "center",
		  verticalAlign: "middle",
		  style: {
		    "textAlign": "center"
		  },
		  x: 0,
		  y: 16,
		  useHTML: true
		},
		series: [{
		  type: 'pie',
		  enableMouseTracking: false,
		  innerSize: '50%',
		  dataLabels: {
		    enabled: false
		  },
		  data: [{
		    y: 80,
		    color: '#4faab9'
		  }, {
		    y: 20,
		    color: '#e75656'
		  }]
		}]
	});
</script>

<script type="text/javascript">
	// Data retrieved from:
	// - https://en.as.com/soccer/which-teams-have-won-the-premier-league-the-most-times-n/
	// - https://www.statista.com/statistics/383679/fa-cup-wins-by-team/
	// - https://www.uefa.com/uefachampionsleague/history/winners/
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
	    series: [{
	        name: 'Pengadaan Langsung',
	        data: [3],
	        color: '#4faab9'
	    }, {
	        name: 'Pengadaan Langsung',
	        data: [14],
	        color: '#e75656'
	    }, {
	        name: 'Lelang',
	        data: [6],
	        color: '#1f6875'
	    }, {
	        name: 'M-Speed',
	        data: [8],
	        color: '#81cbd8'
	    }]
	});

</script>

<script type="text/javascript">
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
	        categories: ['Item 1', 'Item 2', 'Item 3', 'Item 4'],
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
	        data: [631, 727, 3202, 721],
	        color: '#4faab9'
	    }]
	});

</script>

<script type="text/javascript">
	$(function () {
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
                categories: [
                    'Item 5',
                    'Item 4',
                    'Item 3',
                    'Item 2',
                    'Item 1'
                ],
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
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: [34.4, 41.8, 45.1, 20, 19.6],
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
    });
</script>
<script type="text/javascript">
  $(function() {
        // Create the chart
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
                }
            },
            series: [{
                name: 'Browsers',
                data: [["Item 1",6],["Item 2",4],["Item 3",6],["Item 4",4],["Item 5",6]],
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
                        distance: -20,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '8px',
                            color: 'white',
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
            	itemStyle: {
            		fontSize: '7px'
            	},
            	enabled: false
            }
        });
    });
</script>

<script type="text/javascript">
	$(function () {
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
                categories: [
                    'Item 5',
                    'Item 4',
                    'Item 3',
                    'Item 2',
                    'Item 1'
                ],
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
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: [34.4, 21.8, 20.1, 20, 19.6],
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
    });
</script>
<script type="text/javascript">
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-donut-spend-by-store',
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
                }
            },
            series: [{
                name: 'Browsers',
                data: [["Item 1",6],["Item 2",4],["Item 3",6],["Item 4",4],["Item 5",6]],
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
                        distance: -20,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '8px',
                            color: 'white',
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
            	itemStyle: {
            		fontSize: '7px'
            	},
            	enabled: false
            }
        });
    });
</script>

<script type="text/javascript">
	$(function () {
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
                    'Okt'
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
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: [4, 3, 2, 1, 5, 6, 3, 4, 6, 7],
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

<script type="text/javascript">
	$(function () {
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
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: [4, 3, 2, 1, 5, 6, 3, 4, 6, 7],
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