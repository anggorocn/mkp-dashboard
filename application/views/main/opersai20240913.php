
<?
$MRO=10;
$RLA=9;
$JIRE=2;
$OTHER_SUPPORTING=0;

$ONCOST_HPP=[67.2,35.5,61.6,46.2,187.3,22,43.8,49.8,38.2,10.3,17.5,13.3,29.2];
$ONCOST_REALISASI=[22.3,20.4,0,13.6,0,0,0,0,0,1,0,0,0];
$ONCOST_ETC=[33.3,12,42.5,21,106.9,15.8,35.7,31.4,29.1,6.1,12.4,10,25];
$ONCOST_SELISIH=[11.6,3.1,0,11.6,0,0,0,0,0,3.2,0,0,0];
$ONCOST_NAMA=['Industrial Cleaning PLTU Pacitan',
'Industrial Cleaning BJS',
'Industrial Cleaning KPJB',
'Industrial Cleaning Pulang Pisau',
'Industrial Cleaning Kaltim Teluk',
'IC PLTU Banjarsari',
'IC PLTU Kendari',
'IC PLTU Amurang',
'IC PLTU Anggrek',
'IC PLTU Tidore',
'IC PLTU Ampana',
'IC PLTU Ketapang',
'IC PLTU Bangka'];

arsort($ONCOST_SELISIH);

$i=0;
foreach($ONCOST_SELISIH as $x => $x_value) {
  $ONCOST_SELISIH_JADI[$i]=$x;
  $i++;
}

$ONCOST_HPP_JADI=[$ONCOST_HPP[$ONCOST_SELISIH_JADI[0]],$ONCOST_HPP[$ONCOST_SELISIH_JADI[1]],$ONCOST_HPP[$ONCOST_SELISIH_JADI[2]],$ONCOST_HPP[$ONCOST_SELISIH_JADI[3]]];
$ONCOST_REALISASI_JADI=[$ONCOST_REALISASI[$ONCOST_SELISIH_JADI[0]],$ONCOST_REALISASI[$ONCOST_SELISIH_JADI[1]],$ONCOST_REALISASI[$ONCOST_SELISIH_JADI[2]],$ONCOST_REALISASI[$ONCOST_SELISIH_JADI[3]]];
$ONCOST_ETC_JADI=[$ONCOST_ETC[$ONCOST_SELISIH_JADI[0]],$ONCOST_ETC[$ONCOST_SELISIH_JADI[1]],$ONCOST_ETC[$ONCOST_SELISIH_JADI[2]],$ONCOST_ETC[$ONCOST_SELISIH_JADI[3]]];
$ONCOST_NAMA_JADI=[$ONCOST_NAMA[$ONCOST_SELISIH_JADI[0]],$ONCOST_NAMA[$ONCOST_SELISIH_JADI[1]],$ONCOST_NAMA[$ONCOST_SELISIH_JADI[2]],$ONCOST_NAMA[$ONCOST_SELISIH_JADI[3]]];

$SLA_DIBAWAH_TARGET=[0,0,0,0];
$SLA_BATAS_LIMIT=[2,3,0,0];
$SLA_MENCAPAI_TARGET=[42,41,10,12];

$REPORT_MONITORING_PLNNP=[27,3,0,0,30];
$REPORT_MONITORING_PLNNPS=[34,6,1,0,41];
$REPORT_MONITORING_PLN=[3,0,6,0,9];
$REPORT_MONITORING_IPP=[2,4,3,0,9];
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
  .bulat {
    width: 10px;        /* Lebar elemen */
    height: 10px;       /* Tinggi elemen */
    border-radius: 50%;  /* Membuat elemen menjadi bulat */
  }
  .highcharts-no-tooltip{
    /*display: none;*/
  }
</style>

<ul class="breadcrumb">
  <li><a href="app/">Home</a></li>
  <li>Dashboard Operation</li>
</ul> 
<!-- <h3 class="judul-halaman">Operation & Supporting (Alternatif 3)</h3> -->
<h3 class="judul-halaman">Dashboard Operation</h3>
<!-- Content Row -->
<div class="row row-konten area-operasi">
  <div class="col-md-9">
    <div class="area-gantt-chart">
      <div class="row">
        <div class="col-md-2">

          <div class="card area-schedule">
            <div class="card-body upcoming">
              <div class="judul">Upcoming</div>
              <div class="inner">
                <div class="item">
                  <div class="title"><span style="width:80%">MRO</span><div class="bulat" style="background-color: #6d9eeb;"></div></div>
                  <div class="nilai"></div>
                  <div class="nilai"><span>19</span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">RLA</span><div class="bulat" style="background-color: #f6b26b;"></div></div>
                  <div class="nilai"><span>15</span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">JIRE</span><div class="bulat" style="background-color: #c27ba0;"></div></div>
                  <div class="nilai"><span>13</span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">Others supporting</span><div class="bulat" style="background-color: #93c47d;"></div></div>
                  <div class="nilai"><span>0</span></div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="card area-schedule">
            <div class="card-body on-going">
              <div class="judul">On Going</div>
              <div class="inner">
                <div class="item">
                  <div class="title"><span style="width:80%">MRO</span><div class="bulat" style="background-color: #6d9eeb;"></div></div>
                  <div class="nilai"><span><?=$MRO?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">RLA</span><div class="bulat" style="background-color: #f6b26b;"></div></div>
                  <div class="nilai"><span><?=$RLA?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">JIRE</span><div class="bulat" style="background-color: #c27ba0;"></div></div>
                  <div class="nilai"><span><?=$JIRE?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">Others supporting</span><div class="bulat" style="background-color: #93c47d;"></div></div>
                  <div class="nilai"><span><?=$OTHER_SUPPORTING?></span></div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="area-gantt-chart-grafik" style="height: calc(50vh - 15px);overflow: scroll;">
              <div id="container"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">    
    <div class="card area-finished">
      <div class="card-header">
        Finished
      </div>
      <div class="card-body">
        <div class="inner">
          <section class="vertical slider">
            <div class="item">
              <div class="inner-item">
                <div class="nomor">1.</div>
                <div class="nama">MO #1 BJR (1) Finish 31 Juli 2024</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">2.</div>
                <div class="nama">HGPI MCTN Duri (1) Finish 25 Juli 2024</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">3.</div>
                <div class="nama">AI ST 2.8 PLTGU SKG (2) Finish 25 Juli 2024</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">4.</div>
                <div class="nama">RLA Mek. SI#20 RMB (1)</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">5.</div>
                <div class="nama">RLA Mek. PLTG Siantan UP DK Kapuas (1)</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">6.</div>
                <div class="nama">RLA Mek. Helium Leakage Test PLTU Timor-1 (1)</div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="item">
              <div class="inner-item">
                <div class="nomor">7.</div>
                <div class="nama">JIRE-Penugasan Personil MKP Dalam Supporting Mobilisasi Peralatan Kalibrasi Milik PTN (1)</div>
                <div class="clearfix"></div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="row">
      <div class="col-md-5">
        <div class="area-report-monitoring card">
          <div class="card-body">
            <div class="judul">Report Monitoring</div>
            <div class="row inner">
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-3">
                    <div class="item-grafik"style="text-align: center;">
                      <div class="judul">PLN-NP</div>
                      <div id="grafik-report-monitoring-pln" style="height: calc(30vh - 75px);"></div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-grafik" style="text-align: center;">
                      <div class="judul">PLN-NPS</div>
                      <div id="grafik-report-monitoring-pnp" style="height: calc(30vh - 75px);"></div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-grafik" style="text-align: center;">
                      <div class="judul">PLN</div>
                      <div id="grafik-report-monitoring-nps" style="height: calc(30vh - 75px);"></div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-grafik" style="text-align: center;">
                      <div class="judul">NON PLN</div>
                      <div id="grafik-report-monitoring-non-pln" style="height: calc(30vh - 75px);"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="area-legend">
                  <div class="item m1">
                    <span class="tanda"><i class="fa fa-square" aria-hidden="true"></i></span>                    
                    <span>M1</span>
                  </div>
                  <div class="item m2">
                    <span class="tanda"><i class="fa fa-square" aria-hidden="true"></i></span>                    
                    <span>M2</span>
                  </div>
                  <div class="item m3">
                    <span class="tanda"><i class="fa fa-square" aria-hidden="true"></i></span>                    
                    <span>M3</span>
                  </div>
                  <div class="item m4">
                    <span class="tanda"><i class="fa fa-square" aria-hidden="true"></i></span>                    
                    <span>M4</span>
                  </div>
                  <div class="item target">
                    <span class="tanda"><i class="fa fa-square" aria-hidden="true"></i></span>                    
                    <span>Total</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="area-on-cost card">
          <div class="card-body">
            <div class="judul">
              On Cost
              <div class="pull-right">
                <label>Test filter:</label>
                <select>
                  <option>All</option>
                  <option>Lainnya</option>
                </select>  
              </div>
              <div class="clearfix"></div>

            </div>
            <div id="grafik-on-cost" style="height: calc(30vh - 50px);"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="area-sla-insight card">
          <div class="card-body">
            <div class="judul">SLA Insight</div>
            <div id="grafik-sla-insight" style="height: calc(30vh - 45px);"></div>
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

let today = new Date(),
    isAddingTask = false;

const day = 1000 * 60 * 60 * 24,
each = Highcharts.each,
reduce = Highcharts.reduce,
btnShowDialog = document.getElementById('btnShowDialog'),
btnRemoveTask = document.getElementById('btnRemoveSelected'),
btnAddTask = document.getElementById('btnAddTask'),
btnCancelAddTask = document.getElementById('btnCancelAddTask'),
addTaskDialog = document.getElementById('addTaskDialog'),
inputName = document.getElementById('inputName'),
selectDepartment = document.getElementById('selectDepartment'),
selectDependency = document.getElementById('selectDependency'),
chkMilestone = document.getElementById('chkMilestone');

// Set to 00:00:00:000 today
today.setUTCHours(0);
today.setUTCMinutes(0);
today.setUTCSeconds(0);
today.setUTCMilliseconds(0);
today = today.getTime();

function updateRemoveButtonStatus() {
    const chart = this.series.chart;
    // Run in a timeout to allow the select to update
    setTimeout(function () {
        btnRemoveTask.disabled = !chart.getSelectedPoints().length ||
            isAddingTask;
    }, 10);
}

// Create the chart
const chart = Highcharts.ganttChart('container', {
  chart: {
    spacingLeft: 1,
    backgroundColor: null,
      // height: 300 
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

  lang: {
    accessibility: {
      axis: {
        xAxisDescriptionPlural: 'The chart has a two-part X axis ' + 'showing time in both week numbers and days.'
      }
    }
  },

  accessibility: {
    point: {
      descriptionFormat: '{#if milestone}' +
        '{name}, milestone for {yCategory} at {x:%Y-%m-%d}.' +
        '{else}' +
        '{name}, assigned to {yCategory} from {x:%Y-%m-%d} to ' +
        '{x2:%Y-%m-%d}.' +
        '{/if}'
    }
  },

  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}',
        style: {
          cursor: 'default',
          pointerEvents: 'none'
        }
      },
      allowPointSelect: true,
      point: {
        events: {
          select: updateRemoveButtonStatus,
          unselect: updateRemoveButtonStatus,
          remove: updateRemoveButtonStatus
        }
      }
    }
  },

  yAxis: {
    type: 'category',
    categories: ['MRO', 'RLA', 'JIRE','Other Supporting','','','','','','','',''],
    accessibility: {
      description: 'Organization departments'
    },
    labels: {
      enabled: false
    },
  },

  xAxis: {
    type: 'datetime',
    min: Date.UTC(2024, 0, 1),
    max: Date.UTC(2024, 3, 31),
    tickInterval: 7 * 24 * 3600 * 1000, // Interval satu minggu
    labels: {
        formatter: function () {
        // Menampilkan tanggal dengan format hari, bulan, dan tahun
        // return Highcharts.dateFormat('%e %b', this.value);
        var date = new Date(this.value);
        var month = date.getMonth() + 1; // Bulan dimulai dari 0
        var year = date.getFullYear();
        return Highcharts.dateFormat('%e/'+(month < 10 ? '' : '') + month, this.value);
      },
    },
    tickPixelInterval: 900,
     scrollbar: {
        enabled: true
    },
    tickPositioner: function () {
    var positions = [],
        start = this.min,
        end = this.max,
        interval = 7 * 24 * 3600 * 1000; // Interval 3 bulan dalam milidetik

    while (start <= end) {
        positions.push(start);
        start += interval; // Tambah 3 bulan
      }
        return positions;
    },

  },

  tooltip: {
    pointFormatter: function() {
      return 'Nama Task: <b>' + this.name + '</b><br>' +
       'Mulai: <b>' + Highcharts.dateFormat('%Y-%m-%d', this.start) + '</b><br>' +
       'Selesai: <b>' + Highcharts.dateFormat('%Y-%m-%d', this.end) + '</b>';
    }
  },

  series: [{
    name: 'Project 1',
    data: [{
      name: 'Rencana',
      y: 0,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 8, 1),
      end: Date.UTC(2024, 10, 5),
      color: 'rgba(109, 158, 235, 0.5)'  // Transparansi 50%
    },
    {
      name: 'Realisasi',
      y: 0,
      start: Date.UTC(2024, 8, 2),
      end: Date.UTC(2024, 10, 6),
      color: 'rgba(67, 67, 67, 0.3)'  // Transparansi 70%
    },
    {
      start: Date.UTC(2024, 10, 6),
      y: 0,
      milestone: true,
      color: '#6d9eeb'  // Transparansi 70%
    },
    {
      name: 'Rencana',
      y: 1,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 10, 5),
      color: 'rgba(246, 178, 107, 0.5)'  // Transparansi 50%
    },
    {
      name: 'Realisasi',
      y: 1,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 11, 6),
      color: 'rgba(246, 178, 107, 0.3)'  // Transparansi 70%
    },
    {
      name: 'Rencana',
      y: 2,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 10, 5),
      color: 'rgba(194, 123, 160, 0.5)' // Transparansi 50%
    },
    {
      name: 'Realisasi',
      y: 2,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 11, 31),
      color: 'rgba(194, 123, 160, 0.3)'  // Transparansi 70%
    },
    {
      name: '<span style="color:red">Rencana</span>',
      y: 3,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 11, 5),
      color: 'rgba(147, 196, 125, 0.5)'  // Transparansi 50%
    },
    {
      name: '<span style="color:red">Realisasi</span>',
      y: 3,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 10, 3),
      color: 'rgba(147, 196, 125, 0.3)'  // Transparansi 70%
    },
    {
      name: '<span style="color:red">Rencana</span>',
      y: 4,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 11, 5),
      color: 'rgba(147, 196, 125, 0.5)'  // Transparansi 50%
    },
    {
      name: '<span style="color:red">Realisasi</span>',
      y: 4,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 10, 3),
      color: 'rgba(147, 196, 125, 0.3)'  // Transparansi 70%
    },
    {
      name: '<span style="color:red">Rencana</span>',
      y: 5,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 11, 5),
      color: 'rgba(147, 196, 125, 0.5)'  // Transparansi 50%
    },
    {
      name: '<span style="color:red">Realisasi</span>',
      y: 5,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 10, 3),
      color: 'rgba(147, 196, 125, 0.3)'  // Transparansi 70%
    },
    {
      name: '<span style="color:red">Rencana</span>',
      y: 6,
      // start: Date.UTC(tahun, bulan, tanggal),
      start: Date.UTC(2024, 9, 1),
      end: Date.UTC(2024, 11, 5),
      color: 'rgba(147, 196, 125, 0.5)'  // Transparansi 50%
    },
    {
      name: '<span style="color:red">Realisasi</span>',
      y: 6,
      start: Date.UTC(2024, 9, 2),
      end: Date.UTC(2024, 10, 3),
      color: 'rgba(147, 196, 125, 0.3)'  // Transparansi 70%
    }]
  }],
  legend: {
    enabled: true
  },
});


/* Add button handlers for add/remove tasks */

btnRemoveTask.onclick = function () {
  const points = chart.getSelectedPoints();
  each(points, function (point) {
    point.remove();
  });
};

btnShowDialog.onclick = function () {
  // Update dependency list
  let depInnerHTML = '<option value=""></option>';
  each(chart.series[0].points, function (point) {
    depInnerHTML += '<option value="' + point.id + '">' + point.name +' </option>';
  });
  selectDependency.innerHTML = depInnerHTML;

  // Show dialog by removing "hidden" class
  addTaskDialog.className = 'overlay';
  isAddingTask = true;

  // Focus name field
  inputName.value = '';
  inputName.focus();
};

btnAddTask.onclick = function () {
  // Get values from dialog
  const series = chart.series[0],
  name = inputName.value,
  dependency = chart.get(
      selectDependency.options[selectDependency.selectedIndex].value
  ),
  y = parseInt(
      selectDepartment.options[selectDepartment.selectedIndex].value,
      10
  );
  let undef,
  maxEnd = reduce(series.points, function (acc, point) {
      return point.y === y && point.end ? Math.max(acc, point.end) : acc;
  }, 0);

  const milestone = chkMilestone.checked || undef;

  // Empty category
  if (maxEnd === 0) {
    maxEnd = today;
  }

  // Add the point
  series.addPoint({
    start: maxEnd + (milestone ? day : 0),
    end: milestone ? undef : maxEnd + day,
    y: y,
    name: name,
    dependency: dependency ? dependency.id : undef,
    milestone: milestone
  });

  // Hide dialog
  addTaskDialog.className += ' hidden';
  isAddingTask = false;
};

btnCancelAddTask.onclick = function () {
  // Hide dialog
  addTaskDialog.className += ' hidden';
  isAddingTask = false;
};

</script>

<script type="text/javascript">
  Highcharts.chart('grafik-on-cost', {
    chart: {
      type: 'column',
      backgroundColor: null,
      marginBottom: 20,
      spacingBottom: 0
    },
    exporting: {
      enabled: false
    },
    title: {
      text: null
    },
    xAxis: {
      min : 0,
      max : 1,
      categories: <?=json_encode($ONCOST_NAMA_JADI)?>,
      labels: {
        useHTML: true,
        style: {
          fontSize: '10px'
        }
      },
    },
    yAxis: [{
      min: 0,
      labels: {
            enabled: false // Menonaktifkan label sumbu Y
        },
      title: {
          text: null
      },
    },
    {
      title: {
          text: null
      },
      labels: {
            enabled: false // Menonaktifkan label sumbu Y
        },
      opposite: true
    }],

    legend: {
       enabled: false
    },
    tooltip: {
      headerFormat: '<b>{point.x}</b><br/>',
      pointFormat: '{series.name}: {point.y}'
    },
    plotOptions: {
      column: {
        borderWidth: 0,
        stacking: 'normal',
        dataLabels: {
            enabled: true,
            style: {
              fontWeight: 'normal',
              fontSize: '10px'
            }
        }
      }
    },
    scrollbar: {
      enabled: true,
      height: 10,
      trackBackgroundColor: 'rgba(255,255,255,0.3)',
      trackBorderColor: 'rgba(0,0,0,0.1)',
    },
    series: [
    {
      name: 'HPP',
      data: <?=json_encode($ONCOST_HPP_JADI)?>,
      yAxis: 1,
      stacking: null,  // Tidak ditumpuk
      color: '#7cb5ec'
    },{
      name: 'Realisasi',
      data: <?=json_encode($ONCOST_REALISASI_JADI)?>,
      stack: 'stack1'
    }, {
      name: 'Estimate to complete',
      data: <?=json_encode($ONCOST_ETC_JADI)?>,
      stack: 'stack1'
    }]
  });
</script>

<script type="text/javascript">
  Highcharts.chart('grafik-sla-insight', {
    chart: {
      type: 'column',
      backgroundColor: null,
      marginRight: 150
    },

    exporting: {
      enabled: false
    },

    title: {
      text: null,
      align: 'left'
    },

    subtitle: {
      text:
          null,
      align: 'left'
    },

    xAxis: {
      categories: ['PLN', 'PNP', 'NPS', 'NON PLN'],
      crosshair: true,
      accessibility: {
        description: 'Countries'
      },
      labels: {
        useHTML: true,
        style: {
          fontSize: '10px'
        }
      },
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
            pointPadding: 0.1,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Dibawah Target',
            data:<?=json_encode($SLA_DIBAWAH_TARGET)?>,
            color: '#fd8a8a'
        },
        {
            name: 'Batas Limit Target',
            data:<?=json_encode($SLA_BATAS_LIMIT)?>,
            color: '#68c4d8'
        },
        {
            name: 'Melampaui Target',
            data: <?=json_encode($SLA_MENCAPAI_TARGET)?>,
            color: '#fcbb8f'
        }
    ],
    legend: {
      layout: 'vertical',
      align: 'right',
      enabled: true,
      floating: true,
      verticalAlign: 'bottom',
      y: -40,
      x: 0,
      itemStyle: {
       fontSize: '12px',
      }
    },
});

</script>

<script type="text/javascript">
  $(function () {
        $('#grafik-report-monitoring-pln').highcharts({
            chart: {
                type: 'column',
                margin: [ 10, 5, 10, 5]
            },
            exporting: {
              enabled: false
            },

            plotOptions: {
                column: {
                  colorByPoint: true,
                  pointPadding: 0,
                  borderWidth: 0
                }
            },
            colors: [
                '#4876c8',
                '#f31634',
                '#a8a9a9',
                '#facb2c',
                '#69abdb'
            ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    'M1',
                    'M2',
                    'M3',
                    'M4',
                    'Total'
                ],
                labels: {
                  // step: 1,
                  enabled: false,
                  // rotation: -45,
                  // align: 'right',
                  // style: {
                  //     fontSize: '12px',
                  //     fontFamily: 'Verdana, sans-serif'
                  // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                // labels: {
                //   step: 1,
                // }
            },
            legend: {
                enabled: false
            },
            tooltip: {
              enabled: false,
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: <?=json_encode($REPORT_MONITORING_PLNNP)?>,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito-Regular'
                    },

                },
            }]
        });
    });
</script>

<script type="text/javascript">
  $(function () {
        $('#grafik-report-monitoring-pnp').highcharts({
            chart: {
                type: 'column',
                margin: [ 10, 5, 10, 5]
            },
            exporting: {
              enabled: false
            },

            plotOptions: {
                column: {
                  colorByPoint: true,
                  pointPadding: 0,
                  borderWidth: 0
                }
            },
            colors: [
                '#4876c8',
                '#f31634',
                '#a8a9a9',
                '#facb2c',
                '#69abdb'
            ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    'M1',
                    'M2',
                    'M3',
                    'M4',
                    'Target'
                ],
                labels: {
                  // step: 1,
                  enabled: false,
                  // rotation: -45,
                  // align: 'right',
                  // style: {
                  //     fontSize: '12px',
                  //     fontFamily: 'Verdana, sans-serif'
                  // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                // labels: {
                //   step: 1,
                // }
            },
            legend: {
                enabled: false
            },
            tooltip: {
              enabled: false,
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: <?=json_encode($REPORT_MONITORING_PLNNPS)?>,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito-Regular'
                    },

                },
            }]
        });
    });
</script>

<script type="text/javascript">
  $(function () {
        $('#grafik-report-monitoring-nps').highcharts({
            chart: {
                type: 'column',
                margin: [ 10, 5, 10, 5]
            },
            exporting: {
              enabled: false
            },

            plotOptions: {
                column: {
                  colorByPoint: true,
                  pointPadding: 0,
                  borderWidth: 0
                }
            },
            colors: [
                '#4876c8',
                '#f31634',
                '#a8a9a9',
                '#facb2c',
                '#69abdb'
            ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    'M1',
                    'M2',
                    'M3',
                    'M4',
                    'Target'
                ],
                labels: {
                  // step: 1,
                  enabled: false,
                  // rotation: -45,
                  // align: 'right',
                  // style: {
                  //     fontSize: '12px',
                  //     fontFamily: 'Verdana, sans-serif'
                  // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                // labels: {
                //   step: 1,
                // }
            },
            legend: {
                enabled: false
            },
            tooltip: {
              enabled: false,
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: <?=json_encode($REPORT_MONITORING_PLN)?>,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito-Regular'
                    },

                },
            }]
        });
    });
</script>

<script type="text/javascript">
  $(function () {
        $('#grafik-report-monitoring-non-pln').highcharts({
            chart: {
                type: 'column',
                margin: [ 10, 5, 10, 5]
            },
            exporting: {
              enabled: false
            },

            plotOptions: {
                column: {
                  colorByPoint: true,
                  pointPadding: 0,
                  borderWidth: 0
                }
            },
            colors: [
                '#4876c8',
                '#f31634',
                '#a8a9a9',
                '#facb2c',
                '#69abdb'
            ],
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    'M1',
                    'M2',
                    'M3',
                    'M4',
                    'Target'
                ],
                labels: {
                  // step: 1,
                  enabled: false,
                  // rotation: -45,
                  // align: 'right',
                  // style: {
                  //     fontSize: '12px',
                  //     fontFamily: 'Verdana, sans-serif'
                  // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                // labels: {
                //   step: 1,
                // }
            },
            legend: {
                enabled: false
            },
            tooltip: {
              enabled: false,
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +
                        ' millions';
                }
            },
            series: [{
                name: 'Population',
                data: <?=json_encode($REPORT_MONITORING_IPP)?>,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    // color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Nunito-Regular'
                    },

                },
            }]
        });
    });
</script>



<!-- SLICK -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical").slick({
        dots: false,
        vertical: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        // adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
</script>