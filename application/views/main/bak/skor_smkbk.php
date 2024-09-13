

<link rel="stylesheet" href="lib/skillset/skillset.css" type="text/css" />
<script>
jQuery(document).ready(function(){
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});
</script>

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li class="active"><a href="app/index/profilling">Profil</a></li>
                <li><a>Detil Profil</a>
                    <ul>
                        <li><a href="app/index/identitas_karyawan">Identitas Karyawan</a></li>
                        <li><a href="app/index/sk_karyawan">SK Karyawan</a></li>
                        <li><a href="app/index/penempatan">Penempatan</a></li>
                        <li><a href="app/index/jabatan">Jabatan</a></li>
                        <li><a href="app/index/golongan">Golongan</a></li>
                        <li><a href="app/index/pendidikan">Pendidikan</a></li>
                        <li><a href="app/index/keluarga">Keluarga</a></li>
                        <li><a href="app/index/perubahan_alamat">Perubahan Alamat</a></li>
                        <li><a href="app/index/sertifikasi">Sertifikasi</a></li>
                        <li><a href="app/index/pelatihan">Pelatihan</a></li>
                        <li><a href="app/index/pengalaman_kerja">Pengalaman Kerja</a></li>
                        <li><a href="app/index/penghargaan">Penghargaan</a></li>
                        <li><a href="app/index/hukuman">Hukuman</a></li>
                    </ul>
                </li>
                <li><a href="app/index/position">Position</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Skor SMKBK</div>
            </div>
            
            <div class="col-md-4">
                <div class="area-profil">
                    <div class="foto">
                        <img src="images/foto.png">
                    </div>
                    <div class="keterangan">
                        <div class="nama">M. Indra Utama</div>
                        NIK. 3023255
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            </div>
<!--
            <div class="col-md-4">
                <div class="area-skor-cli" onClick="location.href='app/index/skor_cli'">
                    <div class="title">Skor CLI</div>
                    <div class="nilai">0</div>
                    <div class="clearfix"></div>
                </div>
            </div>
-->
            <div class="col-md-4">
                <div class="area-skor-cli">
                    <div class="title">Skor SMKBK</div>
                    <div class="nilai">98</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
                
                
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Nilai Indikator</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="area-skillset">
                            <div class="skillbar clearfix " data-percent="20%">
                                <div class="skillbar-title"><span>Indikator Utama</span></div>
                                <div class="skillbar-bar" style="background: #dda009;"></div>
                                <div class="skill-bar-percent">20%</div>
                            </div> <!-- End Skill Bar -->
                            <div class="skillbar clearfix " data-percent="25%">
                                <div class="skillbar-title"><span>Indikator Pendukung</span></div>
                                <div class="skillbar-bar" style="background: #12b24b;"></div>
                                <div class="skill-bar-percent">25%</div>
                            </div> <!-- End Skill Bar -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well">
                    <div id="container"></div> 
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- HIGHCHART -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<script src="lib/highcharts/accessibility.js"></script>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    exporting: {
         enabled: false
    },
    title: {
        text: 'Grafik 5 Tahun Terakhir'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
    xAxis: {
        categories: [
            '2017',
            '2018',
            '2019',
            '2020',
            '2021'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: null
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Indikator Utama',
        data: [3, 4, 3, 5, 4],
        color: '#dda009'
    }, {
        name: 'Indikator Pendukung',
        data: [1, 3, 4, 3, 3],
        color: '#12b24b'
    }]
});
</script>




