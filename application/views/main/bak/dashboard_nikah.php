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
                        <li><a href="app/index/dashboard_pendidikan">Pendidikan</a></li>
                        <li class="active"><a >Status Nikah</a></li>
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
                <div class="judul-halaman">Dashboard - Status Nikah
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
$(function() {
  'use strict';
(function(factory) {
	if(typeof module === 'object' && module.exports) {
		module.exports = factory;
	} else {
		factory(Highcharts);
	}
}(function(Highcharts) {
	(function(H) {
		H.wrap(H.seriesTypes.column.prototype, 'translate', function(proceed) {
			const options = this.options;
			const topMargin = options.topMargin || 0;
			const bottomMargin = options.bottomMargin || 0;

			proceed.call(this);

			H.each(this.points, function(point) {
				if(options.borderRadiusTopLeft || options.borderRadiusTopRight || options.borderRadiusBottomRight || options.borderRadiusBottomLeft) {
					const w = point.shapeArgs.width;
					const h = point.shapeArgs.height;
					const x = point.shapeArgs.x;
					const y = point.shapeArgs.y;

					let radiusTopLeft = H.relativeLength(options.borderRadiusTopLeft || 0, w);
					let radiusTopRight = H.relativeLength(options.borderRadiusTopRight || 0, w);
					let radiusBottomRight = H.relativeLength(options.borderRadiusBottomRight || 0, w);
					let radiusBottomLeft = H.relativeLength(options.borderRadiusBottomLeft || 0, w);

					const maxR = Math.min(w, h) / 2

					radiusTopLeft = radiusTopLeft > maxR ? maxR : radiusTopLeft;
					radiusTopRight = radiusTopRight > maxR ? maxR : radiusTopRight;
					radiusBottomRight = radiusBottomRight > maxR ? maxR : radiusBottomRight;
					radiusBottomLeft = radiusBottomLeft > maxR ? maxR : radiusBottomLeft;

					point.dlBox = point.shapeArgs;

					point.shapeType = 'path';
					point.shapeArgs = {
						d: [
							'M', x + radiusTopLeft, y + topMargin,
							'L', x + w - radiusTopRight, y + topMargin,
							'C', x + w - radiusTopRight / 2, y, x + w, y + radiusTopRight / 2, x + w, y + radiusTopRight,
							'L', x + w, y + h - radiusBottomRight,
							'C', x + w, y + h - radiusBottomRight / 2, x + w - radiusBottomRight / 2, y + h, x + w - radiusBottomRight, y + h + bottomMargin,
							'L', x + radiusBottomLeft, y + h + bottomMargin,
							'C', x + radiusBottomLeft / 2, y + h, x, y + h - radiusBottomLeft / 2, x, y + h - radiusBottomLeft,
							'L', x, y + radiusTopLeft,
							'C', x, y + radiusTopLeft / 2, x + radiusTopLeft / 2, y, x + radiusTopLeft, y,
							'Z'
						]
					};
				}

			});
		});
	}(Highcharts));
}));


Highcharts.chart('container', {
    chart: {
        type: 'column',
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
    xAxis: {
        categories: ['TK 0', 'TK 1', 'TK 2', 'TK 3', 'K0', 'K1', 'K2']
    },

    plotOptions: {
            column: {
                grouping: false,
                borderRadiusTopLeft: 10,
            		borderRadiusTopRight: 10
            }
        },

    series: [{
        name: "Jumlah",
        data: [24192, 1633, 1365, 758, 12664, 21181, 30289],
        color: "#12b24b"
    }]
});
});
</script>



