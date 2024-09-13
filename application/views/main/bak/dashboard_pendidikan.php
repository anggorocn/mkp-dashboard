<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li><a href="app/index/dashboard">Demografi Karyawan</a></li>
                <li><a>Executive Information</a>
                    <ul>
                        <li><a href="app/index/dashboard_kategori">Kategori</a></li>
                        <li><a href="app/index/dashboard_kelamin">Jenis Kelamin</a></li>
                        <li><a href="app/index/dashboard_usia">Usia</a></li>
                        <li class="active"><a >Pendidikan</a></li>
                        <li><a href="app/index/dashboard_nikah">Status Nikah</a></li>
                        <li><a href="app/index/dashboard_agama">Agama</a></li>
                        <li><a href="app/index/dashboard_level_jabatan">Level Jabatan</a></li>
                        <li><a href="app/index/dashboard_jenis_jabatan">Jenis Jabatan</a></li>
                        <li><a href="app/index/dashboard_kelas_jabatan">Kelas Jabatan</a></li>
                        <li><a href="app/index/dashboard_karyawan_keluar">Karyawan Keluar</a></li>
                        <li><a href="app/index/dashboard_karyawan_masuk">Karyawan Masuk</a></li>
                        <li><a href="app/index/dashboard_golongan">Golongan</a></li>
                        <li><a href="app/index/dashboard_lokasi_kerja">Lokasi Kerja</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Dashboard - Pendidikan
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="area-dashboard">
                    <div id="container"></div>        
                </div>
            </div>
            
        </div>
    </div>
    
</div>

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/highcharts-3d.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<script src="lib/highcharts/accessibility.js"></script>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: false,
            alpha: 45
        },
        backgroundColor: null
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
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45,
            showInLegend: true
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'center',
        labelFormatter: function () {
            if (!this.series.total)
              this.series.calcTotal();

            return this.name + " (" + (this.y / this.series.total * 100).toFixed(2) + "%)";
      }
    },
    series: [{
        name: 'Jumlah Karyawan',
        data: [
            ['SD', 28066],
            ['SLTP', 15983],
            ['SLTA', 46551],
            ['D1-D3', 409],
            ['S1', 6505],
            ['S2-S3', 398]
        ]
    }]
});
</script>



