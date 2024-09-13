<?php
$datakemungkinan = [
    [
        "kemungkinan_id" => 1,
        "nama" => "Sangat Besar",
        "bobot" => 0.9,
        "last_create_user" => null,
        "last_update_user" => "Administrator",
        "last_create_date" => null,
        "last_update_date" => "2023-08-28",
        "status" => null,
        "kode" => "SBR",
        "peraturan_id" => 1,
        "n_min" => 0.8,
        "n_max" => 1.0,
        "status_info" => "Aktif",
        "peraturan_info" => "SK Manajemen Risiko Tahun 2022"
    ],
    [
        "kemungkinan_id" => 2,
        "nama" => "Besar",
        "bobot" => 0.7,
        "last_create_user" => null,
        "last_update_user" => "Administrator",
        "last_create_date" => null,
        "last_update_date" => "2023-08-28",
        "status" => null,
        "kode" => "BSR",
        "peraturan_id" => 1,
        "n_min" => 0.6,
        "n_max" => 0.8,
        "status_info" => "Aktif",
        "peraturan_info" => "SK Manajemen Risiko Tahun 2022"
    ],
    [
        "kemungkinan_id" => 3,
        "nama" => "Sedang",
        "bobot" => 0.5,
        "last_create_user" => null,
        "last_update_user" => "Administrator",
        "last_create_date" => null,
        "last_update_date" => "2023-08-28",
        "status" => null,
        "kode" => "SDG",
        "peraturan_id" => 1,
        "n_min" => 0.41,
        "n_max" => 0.7,
        "status_info" => "Aktif",
        "peraturan_info" => "SK Manajemen Risiko Tahun 2022"
    ],
    [
        "kemungkinan_id" => 4,
        "nama" => "Kecil",
        "bobot" => 0.3,
        "last_create_user" => null,
        "last_update_user" => "Administrator",
        "last_create_date" => null,
        "last_update_date" => "2023-08-28",
        "status" => null,
        "kode" => "KCL",
        "peraturan_id" => 1,
        "n_min" => 0.2,
        "n_max" => 0.41,
        "status_info" => "Aktif",
        "peraturan_info" => "SK Manajemen Risiko Tahun 2022"
    ],
    [
        "kemungkinan_id" => 5,
        "nama" => "Sangat Kecil",
        "bobot" => 0.1,
        "last_create_user" => null,
        "last_update_user" => "Administrator",
        "last_create_date" => null,
        "last_update_date" => "2023-08-28",
        "status" => null,
        "kode" => "SKL",
        "peraturan_id" => 1,
        "n_min" => 0.0,
        "n_max" => 0.2,
        "status_info" => "Aktif",
        "peraturan_info" => "SK Manajemen Risiko Tahun 2022"
    ]
];

$datadampak = [
    [
        'dampak_id' => 1,
        'nama' => 'Tidak Signifikan',
        'n_min' => 0,
        'n_max' => 0.075,
        'bobot' => 0.05
    ],
    [
        'dampak_id' => 2,
        'nama' => 'Minor',
        'n_min' => 0,
        'n_max' => 0.12,
        'bobot' => 0.1
    ],
    [
        'dampak_id' => 3,
        'nama' => 'Medium',
        'n_min' => 0.10,
        'n_max' => 0.3,
        'bobot' => 0.2
    ],
    [
        'dampak_id' => 4,
        'nama' => 'Signifikan',
        'n_min' => 0.3,
        'n_max' => 0.5,
        'bobot' => 0.4
    ],
    [
        'dampak_id' => 5,
        'nama' => 'Malapetaka',
        'n_min' => 0.61,
        'n_max' => 1,
        'bobot' => 0.8
    ]
];

$datalaporan = [
    [
        'kode' => 'E.1',
        'kemungkinan_id' => 1,
        'dampak_id' => 1,
        'risiko' => 'Rendah',
        'dampak' => 'Tidak Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '32cb00'
    ],
    [
        'kode' => 'E.2',
        'kemungkinan_id' => 1,
        'dampak_id' => 2,
        'risiko' => 'Moderat',
        'dampak' => 'Minor',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '34cdf9'
    ],
    [
        'kode' => 'E.3',
        'kemungkinan_id' => 1,
        'dampak_id' => 3,
        'risiko' => 'Tinggi',
        'dampak' => 'Medium',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8ff00'
    ],
    [
        'kode' => 'E.4',
        'kemungkinan_id' => 1,
        'dampak_id' => 4,
        'risiko' => 'Sangat Tinggi',
        'dampak' => 'Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8a102'
    ],
    [
        'kode' => 'E.5',
        'kemungkinan_id' => 1,
        'dampak_id' => 5,
        'risiko' => 'Ekstrem',
        'dampak' => 'Malapetaka',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'fe0000'
    ],

    [
        'kode' => 'D.1',
        'kemungkinan_id' => 2,
        'dampak_id' => 1,
        'risiko' => 'Rendah',
        'dampak' => 'Tidak Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '32cb00'
    ],
    [
        'kode' => 'D.2',
        'kemungkinan_id' => 2,
        'dampak_id' => 2,
        'risiko' => 'Moderat',
        'dampak' => 'Minor',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '34cdf9'
    ],
    [
        'kode' => 'D.3',
        'kemungkinan_id' => 2,
        'dampak_id' => 3,
        'risiko' => 'Tinggi',
        'dampak' => 'Medium',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8ff00'
    ],
    [
        'kode' => 'D.4',
        'kemungkinan_id' => 2,
        'dampak_id' => 4,
        'risiko' => 'Sangat Tinggi',
        'dampak' => 'Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8a102'
    ],
    [
        'kode' => 'D.5',
        'kemungkinan_id' => 2,
        'dampak_id' => 5,
        'risiko' => 'Ekstrem',
        'dampak' => 'Malapetaka',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'fe0000'
    ],

    [
        'kode' => 'C.1',
        'kemungkinan_id' => 3,
        'dampak_id' => 1,
        'risiko' => 'Rendah',
        'dampak' => 'Tidak Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '32cb00'
    ],
    [
        'kode' => 'C.2',
        'kemungkinan_id' => 3,
        'dampak_id' => 2,
        'risiko' => 'Moderat',
        'dampak' => 'Minor',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '34cdf9'
    ],
    [
        'kode' => 'C.3',
        'kemungkinan_id' => 3,
        'dampak_id' => 3,
        'risiko' => 'Tinggi',
        'dampak' => 'Medium',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8ff00'
    ],
    [
        'kode' => 'C.4',
        'kemungkinan_id' => 3,
        'dampak_id' => 4,
        'risiko' => 'Sangat Tinggi',
        'dampak' => 'Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8a102'
    ],
    [
        'kode' => 'C.5',
        'kemungkinan_id' => 3,
        'dampak_id' => 5,
        'risiko' => 'Ekstrem',
        'dampak' => 'Malapetaka',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'fe0000'
    ],

    [
        'kode' => 'B.1',
        'kemungkinan_id' => 4,
        'dampak_id' => 1,
        'risiko' => 'Rendah',
        'dampak' => 'Tidak Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '32cb00'
    ],
    [
        'kode' => 'B.2',
        'kemungkinan_id' => 4,
        'dampak_id' => 2,
        'risiko' => 'Moderat',
        'dampak' => 'Minor',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '34cdf9'
    ],
    [
        'kode' => 'B.3',
        'kemungkinan_id' => 4,
        'dampak_id' => 3,
        'risiko' => 'Tinggi',
        'dampak' => 'Medium',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8ff00'
    ],
    [
        'kode' => 'B.4',
        'kemungkinan_id' => 4,
        'dampak_id' => 4,
        'risiko' => 'Sangat Tinggi',
        'dampak' => 'Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8a102'
    ],
    [
        'kode' => 'B.5',
        'kemungkinan_id' => 4,
        'dampak_id' => 5,
        'risiko' => 'Ekstrem',
        'dampak' => 'Malapetaka',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'fe0000'
    ],

    [
        'kode' => 'A.1',
        'kemungkinan_id' => 5,
        'dampak_id' => 1,
        'risiko' => 'Rendah',
        'dampak' => 'Tidak Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '32cb00'
    ],
    [
        'kode' => 'A.2',
        'kemungkinan_id' => 5,
        'dampak_id' => 2,
        'risiko' => 'Moderat',
        'dampak' => 'Minor',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => '34cdf9'
    ],
    [
        'kode' => 'A.3',
        'kemungkinan_id' => 5,
        'dampak_id' => 3,
        'risiko' => 'Tinggi',
        'dampak' => 'Medium',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8ff00'
    ],
    [
        'kode' => 'A.4',
        'kemungkinan_id' => 5,
        'dampak_id' => 4,
        'risiko' => 'Sangat Tinggi',
        'dampak' => 'Signifikan',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'f8a102'
    ],
    [
        'kode' => 'A.5',
        'kemungkinan_id' => 5,
        'dampak_id' => 5,
        'risiko' => 'Ekstrem',
        'dampak' => 'Malapetaka',
        'kemungkinan' => 'Besar',
        'status_info' => 'Aktif',
        'kode_warna' => 'fe0000'
    ],
];

$datalaporantot = [
    [
        'kode' => 'D.5',
        'angka' => 1
    ],
    [
        'kode' => 'E.4',
        'angka' => 2
    ],
    [
        'kode' => 'D.4',
        'angka' => 3
    ],
    [
        'kode' => 'D.4',
        'angka' => 4
    ],
    [
        'kode' => 'D.4',
        'angka' => 5
    ],
    [
        'kode' => 'D.4',
        'angka' => 6
    ],
    [
        'kode' => 'D.4',
        'angka' => 7
    ],
    [
        'kode' => 'C.4',
        'angka' => 8
    ],
    [
        'kode' => 'D.3',
        'angka' => 9
    ],
    [
        'kode' => 'C.3',
        'angka' => 10
    ],
    [
        'kode' => 'C.3',
        'angka' => 11
    ],
    [
        'kode' => 'C.3',
        'angka' => 12
    ],
    [
        'kode' => 'C.3',
        'angka' => 13
    ],
];

$datalaporantot2 = [
    [
        'kode' => 'D.3',
        'angka' => 1
    ],
    [
        'kode' => 'D.3',
        'angka' => 2
    ],
    [
        'kode' => 'D.2',
        'angka' => 3
    ],
    [
        'kode' => 'C.4',
        'angka' => 4
    ],
    [
        'kode' => 'C.3',
        'angka' => 5
    ],
    [
        'kode' => 'D.4',
        'angka' => 6
    ],
    [
        'kode' => 'C.4',
        'angka' => 7
    ],
    [
        'kode' => 'C.3',
        'angka' => 8
    ],
    [
        'kode' => 'C.3',
        'angka' => 9
    ],
    [
        'kode' => 'C.3',
        'angka' => 10
    ],
    [
        'kode' => 'B.3',
        'angka' => 11
    ],
    [
        'kode' => 'C.3',
        'angka' => 12
    ],
    [
        'kode' => 'C.2',
        'angka' => 13
    ],
];



$arrkemungkinan= [];
$jmlkemungkinan=0;
foreach ($datakemungkinan as $key => $value)
{
    $arrdata= array();
    $arrdata["id"]= $value['kemungkinan_id'];
    $arrdata["text"]= $value['nama'];
    $arrdata["KEMUNGKINAN_ID"]= $value['kemungkinan_id'];
    $arrdata["NAMA"]=$value['nama'];
    $arrdata["N_MIN"]=$value['n_min'];
    $arrdata["N_MAX"]=$value['n_max'];
    $arrdata["BOBOT"]=$value['bobot'];
    $jmlkemungkinan++;
    array_push($arrkemungkinan, $arrdata);
}


$arrdampak= [];
$jmldampak=1;
foreach ($datadampak as $key => $value)
{
    $arrdata= array();
    $arrdata["id"]= $value['dampak_id'];
    $arrdata["text"]= $value['nama'];
    $arrdata["DAMPAK_ID"]= $value['dampak_id'];
    $arrdata["NAMA"]=$value['nama'];
    $arrdata["N_MIN"]=$value['n_min'];
    $arrdata["N_MAX"]=$value['n_max'];
    $arrdata["BOBOT"]=$value['bobot'];
    $jmldampak++;
    array_push($arrdampak, $arrdata);
}

//GCG
$nilaiGcgPercent= '80';
$nilaiGcgReal= '80';
$nilaiGcgTarget= '80';
$grafikgcgcat= "['Aspek 1', 'Aspek 2', 'Aspek 3', 'Aspek 4', 'Aspek 5']";
$grafikgcgdat= "[92, 79, 85, 87, 68]";

//RUPS
$rupsTotal= 47;
$rupsSelesai= 5;
$rupsLanjut= 37;
$rupsTL= 5;

//REKOM
$rekomTotal= 33;
$rekomSelesai= 5;
$rekomLanjut= 24;
$rekomTL= 4;

//PROGRAM STRATEGIS
$dataprogst = [
    [
        'nama' => 'Isu 1',
        'rencana' => '-',
        'realisasi' => '-',
        'percent' => '76',
        'warna' => 'e67e22',
    ],
    [
        'nama' => 'Isu 2',
        'rencana' => '-',
        'realisasi' => '-',
        'percent' => '83',
        'warna' => '3498db',
    ],
    [
        'nama' => 'Isu 3',
        'rencana' => '-',
        'realisasi' => '-',
        'percent' => '75',
        'warna' => '2c3e50',
    ],
    [
        'nama' => 'Isu 4',
        'rencana' => '-',
        'realisasi' => '-',
        'percent' => '78',
        'warna' => '5a68a5',
    ],
    [
        'nama' => 'Isu 5',
        'rencana' => '-',
        'realisasi' => '-',
        'percent' => '56',
        'warna' => '525252',
    ],
];

$arrprogst= [];
foreach ($dataprogst as $key => $value)
{
    $arrdata= array();
    $arrdata["id"]= '';
    $arrdata["text"]= $value['nama'];
    $arrdata["NAMA"]= $value['nama'];
    $arrdata["RENCANA"]=$value['rencana'];
    $arrdata["REALISASI"]=$value['realisasi'];
    $arrdata["PERCENT"]=$value['percent'];
    $arrdata["WARNA"]=$value['warna'];
    array_push($arrprogst, $arrdata);
}

//M-ACTION
$dataradir= '[["Selesai",72],["Belum",2],["Dalam proses",20]]';
$datardd= '[["Selesai",13],["Dalam proses",9]]';
$dataslmeet= '[["Selesai",8],["Dalam proses",0]]';

//DOK PROBIS
$dataprobis= '[["Selesai",184],["Dalam<br>proses",0]]';
$datakebdir= '[["Selesai (Update di 2024)",9],["Dalam proses (review / Drafting SK di 2024)",6]]';

//IT Avaibility
$dataitav = [
    [
        'nama' => 'Jaringan',
        'percent' => '98',
    ],
    [
        'nama' => 'Aplikasi',
        'percent' => '96',
    ],
];

$arritav= [];
foreach ($dataitav as $key => $value)
{
    $arrdata= array();
    $arrdata["id"]= '';
    $arrdata["text"]= $value['nama'];
    $arrdata["NAMA"]= $value['nama'];
    $arrdata["PERCENT"]=$value['percent'];
    array_push($arritav, $arrdata);
}

//Pengembangan IT
$datapengit = [
    [
        'nama' => 'Realisasi (Rp)',
        'percent' => '',
        'angka' => '285000000',
        'class' => '',
    ],
    [
        'nama' => 'Selesai',
        'percent' => '',
        'angka' => '0',
        'class' => 'selesai',
    ],
    [
        'nama' => 'Dalam proses',
        'percent' => '',
        'angka' => '3',
        'class' => 'dalam-proses',
    ],
];

$arrpengit= [];
foreach ($datapengit as $key => $value)
{
    $arrdata= array();
    $arrdata["id"]= '';
    $arrdata["text"]= $value['nama'];
    $arrdata["NAMA"]= $value['nama'];
    $arrdata["PERCENT"]=$value['percent'];
    $arrdata["ANGKA"]=$value['angka'];
    $arrdata["CLASS"]=$value['class'];
    array_push($arrpengit, $arrdata);
}

//Risk Management Report
$datacontrol= '[["Selesai",0],["Dalam proses",0]]';
$datamitigasi= '[["Selesai",73],["Dalam proses",116]]';

//internal external
$datainternal= "[['Selesai', 12],['Dalam proses', 0]]";
$dataexternal= "[['Selesai', 6],['Dalam proses', 0]]";
?>

<style type="text/css">
	th, td {
            padding: 5px;
            font-size: 10px; /* Mengecilkan ukuran teks */
            border: 1px solid black; /* Menambahkan border */
        }
</style>

<!-- SKILLSET -->
<link rel="stylesheet" href="lib/skillset/skillset.css" type="text/css" />

<ul class="breadcrumb">
	<li><a href="app/">Home</a></li>
	<li>Dashboard GRC</li>
</ul> 
<!-- <h3 class="judul-halaman">GRC (Layer 1)</h3> -->
<h3 class="judul-halaman">Dashboard GRC</h3>
<!-- Content Row -->
<div class="row row-konten area-internal-proses-bisnis">
  	<div class="col-md-4">
  		<div class="card area-gcg">
  			<div class="card-body">
  				<div class="judul">GCG</div>
  				<div class="row">
  					<div class="col-md-5">
  						<div class="item-data-angka">
	  						<div class="data">
		  						<div class="nilai"><?=$nilaiGcgPercent?></div>
								<div class="keterangan">Realisasi : <?=$nilaiGcgReal?></div>
								<div class="keterangan">Target : <?=$nilaiGcgTarget?></div>
							</div>
							<div class="ikon">
								<span>
									<img src="images/icon-idea.png" height="29">
								</span>
							</div>
							<div class="clearfix"></div>
						</div>
  					</div>
  					<div class="col-md-7">
  						<div id="grafik-gcg" style="width: 100%; height: calc(20vh - 60px);"></div>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="card area-arahan">
  			<div class="card-body">
  				<div class="row">
  					<div class="col-md-4">
  						<div class="judul">Arahan RUPS</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rupsTotal?></span></i></div>
  						<div class="title">Total</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rupsSelesai?></span></i></div>
  						<div class="title">Selesai</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rupsLanjut?></span></i></div>
  						<div class="title">Berkelanjutan</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$rupsTL?></span></i></div>
  						<div class="title">Tindak Lanjut</div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-4">
  						<div class="judul">Rekom Dekom</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rekomTotal?></span></i></div>
  						<div class="title">Total</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rekomSelesai?></span></i></div>
  						<div class="title">Selesai</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span><?=$rekomLanjut?></span></i></div>
  						<div class="title">Berkelanjutan</div>
  					</div>
  					<div class="col-md-2">
  						<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span><?=$rekomTL?></span></i></div>
  						<div class="title">Tindak Lanjut</div>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="card area-program-strategis">
  			<div class="card-body">
  				<div class="judul">Program Strategis</div>
				<div class="inner">
                    <?
                    foreach ($arrprogst as $key => $value) 
                    {
                        ?>
                        <div class="item">
                            <div class="skillbar-title"><span><?=$value['NAMA']?></span></div>
                            <div class="skillbar clearfix " data-percent="<?=$value['PERCENT']?>%">
                                <div class="skillbar-bar" style="background: #<?=$value['WARNA']?>;"></div>
                                <div class="skill-bar-percent"><?=$value['PERCENT']?>%</div>
                            </div> <!-- End Skill Bar -->
                            <div class="clearfix"></div>
                        </div>
                        <?
                    }
                    ?>

					
				</div>
  			</div>
  		</div>

  		<div class="card area-program-strategis">
  			<div class="card-body">
  				<div class="judul">General Afair Help Desk</div>
  				<div class="row">
  					<div class="col-md-2" style="font-size: 10px; text-align: right; padding-top: 10px;">
  						Proses
  					</div>
  					<div class="col-md-8">
  						<div id="grafik-general-affair" style="height: calc(10vh - 30px);"></div>
  					</div>
  					<div class="col-md-2" style="font-size: 10px; padding-top: 10px;">
  						Done
  					</div>
  				</div>
  				
			</div>
		</div>

  	</div>
  	<div class="col-md-4">
  		<div class="card area-program-strategis">
  			<div class="card-body">
  				<div class="judul">M-Action
  					<div class="legend">
  						<span><i class="fa fa-circle kuning" aria-hidden="true"></i> Dalam Proses</span>
  						<span><i class="fa fa-circle merah" aria-hidden="true"></i> Belum</span>
  						<span><i class="fa fa-circle hijau" aria-hidden="true"></i> Selesai</span>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-4">
  						<div class="item-data-angka margin-right-7">
  							<div class="judul text-center">Radir</div>
  							<div id="grafik-m-action-radir" style="height: calc(18vh - 30px);"></div>
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="item-data-angka margin-left-7 margin-right-7">
  							<div class="judul text-center">RDD</div>
  							<div id="grafik-m-action-rdd" style="height: calc(18vh - 30px);"></div>
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="item-data-angka margin-left-7">
  							<div class="judul text-center">SL Meeting</div>
  							<div id="grafik-m-action-sl-meeting" style="height: calc(18vh - 30px);"></div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-6">
  				<div class="card area-program-strategis margin-right-7">
		  			<div class="card-body">
		  				<div class="judul">Dokumen Probis</div>
		  				<div id="grafik-dokumen-probis" style="height: calc(20vh - 0px);"></div>
		  			</div>
		  		</div>
  			</div>
  			<div class="col-md-6">
  				<div class="card area-program-strategis margin-left-7">
		  			<div class="card-body">
		  				<div class="judul">Kebijakan Direksi</div>
		  				<div id="grafik-kebijakan-direksi" style="height: calc(20vh - 0px);"></div>
		  			</div>
		  		</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-12">
  				<div class="card area-arahan">
		  			<div class="card-body">
		  				<div class="row" style="border: none;">
		  					<div class="col-md-4">
		  						<div class="judul">Izin Usaha</div>
		  					</div>
		  					<div class="col-md-2">
		  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>40</span></i></div>
		  						<div class="title">Active</div>
		  					</div>
		  					<div class="col-md-2">
		  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>32</span></i></div>
		  						<div class="title">‹ 60 Days</div>
		  					</div>
		  					<div class="col-md-2">
		  						<div class="ikon"><i class="fa fa-circle-o hijau" aria-hidden="true"><span>5</span></i></div>
		  						<div class="title">Overdue</div>
		  					</div>
		  					<div class="col-md-2">
		  						<div class="ikon"><i class="fa fa-circle-o merah" aria-hidden="true"><span>3</span></i></div>
		  						<div class="title">In Progress</div>
		  					</div>
		  				</div>
		  			</div>
		  		</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-6">
  				<div class="card border-radius-15 margin-right-7">
  					<div class="card-body">
		  				<div class="judul">Pengembangan IT</div>
                        <?
                        foreach ($arrpengit as $key => $value) 
                        {
                            if ($key=='0') {
                                ?>
                                <div class="item-data-angka no-border no-padding no-background" style="margin-bottom: 5px;">
                                    <div class="informasi">
                                        <div class="keterangan"><?=$value['NAMA']?></div>
                                        <div class="nilai">Rp. <?=number_format($value['ANGKA']/1000000,0,',','.')?> M</div>
                                    </div>
                                    <div class="persentase">
                                        <?=$value['PERCENT']?>%
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?
                            }
                            else
                            {
                                ?>
                                <div class="item-data-angka item-jumlah no-border no-padding no-background <?=$value['CLASS']?>">
                                    <div class="title"><?=$value['NAMA']?></div>
                                    <div class="nilai"><?=$value['ANGKA']?></div>
                                    <div class="clearfix"></div>
                                </div>
                                <?
                            }
                        }
                        ?>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="col-md-6">
  				<div class="card border-radius-15 margin-left-7">
		  			<div class="card-body">
		  				<div class="judul">IT Avaibility</div>
                        <?
                        foreach ($arritav as $key => $value) {
                            ?>
                            <div class="item-data-angka no-border no-padding no-background" style="margin-bottom: 15px; margin-top: 10px;">
                                <div class="informasi">
                                    <div class="keterangan"><?=$value['NAMA']?></div>
                                </div>
                                <div class="persentase">
                                    <?=$value['PERCENT']?>%
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?
                        }
                        ?>
		  			</div>
		  		</div>
		  	</div>
		</div>
  	</div>
  	<div class="col-md-4">
  		<div class="card border-radius-15">
  			<div class="card-body">
  				<div class="judul">
  					Risk Management Report
  					<div class="legend">
  						<span><i class="fa fa-circle kuning" aria-hidden="true"></i> Dalam Proses</span>
  						<span><i class="fa fa-circle hijau" aria-hidden="true"></i> Selesai</span>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-6">
  						<div class="item-data-angka margin-right-7">
  							<div class="row">
  								<div class="col-md-8">
  									<div id="grafik-risk-management-report-control" style="height: calc(18vh - 60px);"></div>		
  								</div>
  								<div class="col-md-4 no-padding">
  									<div class="title">
  										<br><br>
	  									% Control
	  									2024
	  								</div>
  								</div>
  							</div>
		  					
		  				</div>
  					</div>
  					<div class="col-md-6">
  						<div class="item-data-angka margin-left-7">
  							<div class="row">
  								<div class="col-md-8">
  									<div id="grafik-risk-management-report-mitigasi" style="height: calc(18vh - 60px);"></div>		
  								</div>
  								<div class="col-md-4 no-padding">
  									<div class="title">
  										<br><br>
	  									% Mitigasi
	  									2024
	  								</div>
  								</div>
  							</div>
		  					
		  				</div>
  					</div>
  				</div>
  			</div>

  			<div class="card-body area-grafik-heatmap">
  				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
						    <li><a class="active" href="#tab1" data-toggle="tab">Inherit Risk</a></li>
						    <li><a href="#tab2" data-toggle="tab">Current Risk</a></li>
						</ul>
						<div class="tab-content">

						    <!-- First Pane -->
						    <div class="tab-pane fade in active show" id="tab1">
						    	<div class="row">
						            <div class="col-md-12">
							        	<div id="ctkmatriks" style="height: auto;">
							        		<table class="tbmatrix" id="rmatriksrisiko">
			                                    <tr> 
			                                        <td rowspan='<?=$jmlkemungkinan+1?>' style='font-weight:bold;position:relative;width:25px'>
                                                <div class="judul-vertikal">
                                                  <span>TINGKAT&nbsp;KEMUNGKINAN</span>
                                                </div>
			                                        </td>
			                                    </tr>

			                                    <?
			                                    function toAlpha($data){
												    $alphabet =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
												    $alpha_flip = array_flip($alphabet);
											        if($data <= 25){
											          return $alphabet[$data];
											        }
											        elseif($data > 25){
											          $dividend = ($data + 1);
											          $alpha = '';
											          $modulo;
											          while ($dividend > 0){
											            $modulo = ($dividend - 1) % 26;
											            $alpha = $alphabet[$modulo] . $alpha;
											            $dividend = floor((($dividend - $modulo) / 26));
											          } 
											          return $alpha;
											        }
												}

			                                    $z=$jmlkemungkinan-1;
			                                    foreach ($arrkemungkinan as $key => $value) 
			                                    {

			                                        $alpnum=toAlpha($z);
			                                        
			                                        $arrmatrik= [];
                                                    $arrangka= [];

			                                        foreach ($datalaporan as $keyss => $valuess)
			                                        {
                                                        if ($valuess['kemungkinan_id']==$value['id']) 
                                                        {
                                                            $arrdata= array();
                                                            $arrdata["id"]= $valuess['matriks_risiko_id'];
                                                            $arrdata["text"]= $valuess['NAMA'];
                                                            $arrdata["RISIKO"]= $valuess['risiko'];
                                                            $arrdata["KODE"]= $valuess['kode'];
                                                            $arrdata["KEMUNGKINAN_ID"]= $valuess['kemungkinan_id'];
                                                            $arrdata["DAMPAK"]= $valuess['dampak'];
                                                            $arrdata["DAMPAK_ID"]= $valuess['dampak_id'];
                                                            $arrdata["KEMUNGKINAN"]= $valuess['kemungkinan'];
                                                            $arrdata["KODE_WARNA"]= $valuess['kode_warna'];
                                                            array_push($arrmatrik, $arrdata);
                                                        }

                                                        foreach ($datalaporantot as $k => $vlaptot) 
                                                        {
                                                            if ($valuess['kode']==$vlaptot['kode']) 
                                                            {
                                                                $arrdata= array();
                                                                $arrdata["KODE"]= $vlaptot['kode'];
                                                                $arrdata["ANGKA"]= $vlaptot['angka'];
                                                                array_push($arrangka, $arrdata);
                                                            }
                                                        }
			                                        }
			                                    ?>
			                                    <tr>
			                                        <td align='center' style='width: 25px;text-align:center;vertical-align:middle;font-weight:bold'><?=$value["text"]?></td>
			                                        <td style='width: 25px;text-align:center;font-weight:bold;vertical-align:middle'><?=$alpnum?></td>
			                                        <?
			                                        foreach ($arrmatrik as $key => $value) 
			                                        {

			                                            ?>
			                                            <td class='bg-#<?=$value["KODE_WARNA"]?>' style='background-color:#<?=$value["KODE_WARNA"]?>;'>
			                                                <div class="inner-td">
                                                                <label><?=$value["RISIKO"]?></label>
    		                                                    <div class="inner-angka">
                                                                  <?
                                                                  foreach ($arrangka as $k => $vangka) 
                                                                  {
                                                                    if ($value['KODE']==$vangka['KODE']) 
                                                                    {
                                                                      ?>
                                                                      <span><? echo $vangka['ANGKA']; ?></span>
                                                                      <?
                                                                    }
                                                                  }
                                                                  
                                                                  ?>
                                                                  <!-- <span>1</span>
                                                                  <span>2</span>
                                                                  <span>3</span>
                                                                  <span>4</span>
                                                                  <span>5</span>
                                                                  <span>6</span>
                                                                  <span>7</span>
                                                                  <span>8</span>
                                                                  <span>9</span>
                                                                  <span>10</span>
                                                                  <span>11</span>
                                                                  <span>12</span>
                                                                  <span>13</span> -->
                                                                  <div class="clearfix"></div>
    		                                                    </div>
			                                                </div>
			                                            </td>
			                                        <?
			                                        }
			                                        ?>
			                                    </tr>
			                                    <?
			                                     $z--;
			                                    }
			                                    ?>
			                                   
			                                    <tr class="keterangan-bawah">
			                                        <td colspan='3' rowspan='3' ></td>
			                                        <?
			                                        for ($i=1; $i < $jmldampak ; $i++) 
			                                        { 
			                                        ?>
			                                        <td style='font-weight:bold;text-align:center'><?=$i?></td>
			                                        <?
			                                        }
			                                        ?>
			                                            
			                                    </tr>
			                                    <tr class="keterangan-bawah">
			                                        <?
			                                        foreach ($arrdampak as $key => $value) 
			                                        {
			                                        ?>
			                                            <td style='font-weight:bold;text-align:center;vertical-align:middle'><?=$value["text"]?></td>
			                                        <?
			                                        }
			                                        ?>
			                                    </tr>
			                                    <tr class="keterangan-bawah">
			                                        <td colspan='5' style='font-weight:bold;text-align:center'>TINGKAT DAMPAK</td>
			                                    </tr> 
			                                </table>
							        	</div>
								    </div>
								</div>
						    </div>

						    <!-- Second Pane -->
						    <div class="tab-pane fade" id="tab2">
						        <div class="row">
						            <div class="col-md-12">
			        			        <div id="ctkmatriks" style="height: auto;">
                                            <table class="tbmatrix" id="rmatriksrisiko">
                                                <tr> 
                                                    <td rowspan='<?=$jmlkemungkinan+1?>' style='font-weight:bold;position:relative;width:25px'>
                                                <div class="judul-vertikal">
                                                  <span>TINGKAT&nbsp;KEMUNGKINAN</span>
                                                </div>
                                                    </td>
                                                </tr>

                                                <?

                                                $z=$jmlkemungkinan-1;
                                                foreach ($arrkemungkinan as $key => $value) 
                                                {

                                                    $alpnum=toAlpha($z);
                                                    
                                                    $arrmatrik= [];
                                                    $arrangka= [];

                                                    foreach ($datalaporan as $keyss => $valuess)
                                                    {
                                                        if ($valuess['kemungkinan_id']==$value['id']) 
                                                        {
                                                            $arrdata= array();
                                                            $arrdata["id"]= $valuess['matriks_risiko_id'];
                                                            $arrdata["text"]= $valuess['NAMA'];
                                                            $arrdata["RISIKO"]= $valuess['risiko'];
                                                            $arrdata["KODE"]= $valuess['kode'];
                                                            $arrdata["KEMUNGKINAN_ID"]= $valuess['kemungkinan_id'];
                                                            $arrdata["DAMPAK"]= $valuess['dampak'];
                                                            $arrdata["DAMPAK_ID"]= $valuess['dampak_id'];
                                                            $arrdata["KEMUNGKINAN"]= $valuess['kemungkinan'];
                                                            $arrdata["KODE_WARNA"]= $valuess['kode_warna'];
                                                            array_push($arrmatrik, $arrdata);
                                                        }

                                                        foreach ($datalaporantot2 as $k => $vlaptot) 
                                                        {
                                                            if ($valuess['kode']==$vlaptot['kode']) 
                                                            {
                                                                $arrdata= array();
                                                                $arrdata["KODE"]= $vlaptot['kode'];
                                                                $arrdata["ANGKA"]= $vlaptot['angka'];
                                                                array_push($arrangka, $arrdata);
                                                            }
                                                        }
                                                    }
                                                ?>
                                                <tr>
                                                    <td align='center' style='width: 25px;text-align:center;vertical-align:middle;font-weight:bold'><?=$value["text"]?></td>
                                                    <td style='width: 25px;text-align:center;font-weight:bold;vertical-align:middle'><?=$alpnum?></td>
                                                    <?
                                                    foreach ($arrmatrik as $key => $value) 
                                                    {

                                                        ?>
                                                        <td class='bg-#<?=$value["KODE_WARNA"]?>' style='background-color:#<?=$value["KODE_WARNA"]?>;'>
                                                            <div class="inner-td">
                                                                <label><?=$value["RISIKO"]?></label>
                                                                <div class="inner-angka">
                                                                  <?
                                                                  foreach ($arrangka as $k => $vangka) 
                                                                  {
                                                                    if ($value['KODE']==$vangka['KODE']) 
                                                                    {
                                                                      ?>
                                                                      <span><? echo $vangka['ANGKA']; ?></span>
                                                                      <?
                                                                    }
                                                                  }
                                                                  ?>
                                                                  <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?
                                                    }
                                                    ?>
                                                </tr>
                                                <?
                                                 $z--;
                                                }
                                                ?>
                                               
                                                <tr class="keterangan-bawah">
                                                    <td colspan='3' rowspan='3' ></td>
                                                    <?
                                                    for ($i=1; $i < $jmldampak ; $i++) 
                                                    { 
                                                    ?>
                                                    <td style='font-weight:bold;text-align:center'><?=$i?></td>
                                                    <?
                                                    }
                                                    ?>
                                                        
                                                </tr>
                                                <tr class="keterangan-bawah">
                                                    <?
                                                    foreach ($arrdampak as $key => $value) 
                                                    {
                                                    ?>
                                                        <td style='font-weight:bold;text-align:center;vertical-align:middle'><?=$value["text"]?></td>
                                                    <?
                                                    }
                                                    ?>
                                                </tr>
                                                <tr class="keterangan-bawah">
                                                    <td colspan='5' style='font-weight:bold;text-align:center'>TINGKAT DAMPAK</td>
                                                </tr> 
                                            </table>
                                        </div>
						            </div>
						        </div>
						    </div>

						</div><!-- tab content -->
					</div>
				</div>
  			</div>
  		</div>
  		<div class="card border-radius-15">
  			<div class="card-body">
  				<div class="judul">Jumlah temuan selesai/jumlah total temuan</div>
  				<div class="row">
  					<div class="col-md-6">
  						<div class="item-data-angka">
	  						<div class="judul">Audit Internal</div>
	  						<div id="grafik-audit-internal" class="chart-container" style="height: calc(18vh - 80px);"></div>
	  					</div>
  					</div>
  					<div class="col-md-6">
  						<div class="item-data-angka">
	  						<div class="judul">Audit External</div>
	    					<div id="grafik-audit-external" class="chart-container" style="height: calc(18vh - 80px);"></div>
	    				</div>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="item-data-angka area-menu-jumlah-temuan">	
  							<div class="area-menu-temuan">
  								<div class="row">
	  								<div class="col-md-3"><a href="#">Website</a></div>
	  								<div class="col-md-3"><a href="#">Instagram</a></div>
	  								<div class="col-md-3"><a href="#">Linkedin</a></div>
	  								<div class="col-md-3"><a href="#">M-Team Receivable</a></div>

	  								<div class="col-md-3"><a href="#">M-Team Payable</a></div>
	  								<div class="col-md-3"><a href="#">M-Action</a></div>
	  								<div class="col-md-3"><a href="#">ERM</a></div>
	  								<div class="col-md-3"><a href="#">VMS</a></div>

	  								<div class="col-md-3"><a href="#">M-Speed</a></div>
	  								<div class="col-md-3"><a href="#">Arteri</a></div>
	  								<div class="col-md-3"><a href="#">HRIS</a></div>
	  								<div class="col-md-3"><a href="#">M_EV</a></div>
	  							</div>
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

<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Custom Stacked Column Chart'
        },
        xAxis: {
            categories: ['Category 1']
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'Percentage (%)'
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return this.point.y + '%';
                    }
                }
            }
        },
        series: [{
            name: 'Values',
            data: [0],  // Initial placeholder for single category
            colorByPoint: true,
            dataLabels: {
                formatter: function() {
                    const value = this.y;
                    if (value > 50) return 'green';
                    if (value > 0) return 'yellow';
                    return 'red';
                }
            }
        }]
    });
    
    // Function to generate data with intervals
    function generateStackedData(percent) {
        const data = [];
        let remaining = percent;
        
        // Create intervals of 10%
        while (remaining > 0) {
            const value = Math.min(10, remaining);
            data.push({
                y: value,
                color: value > 50 ? 'green' : value > 0 ? 'yellow' : 'red'
            });
            remaining -= value;
        }
        
        return data;
    }

    // Example data: 75% total
    const data = generateStackedData(75);

    // Update chart with generated data
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Custom Stacked Column Chart'
        },
        xAxis: {
            categories: ['Category 1']
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'Percentage (%)'
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return this.point.y + '%';
                    }
                }
            }
        },
        series: [{
            name: 'Values',
            data: data
        }]
    });
</script>

<script type="text/javascript">
	$(function() {
	  var myChart = Highcharts.chart('grafik-gcg', {
	    chart: {
	      type: 'column',
	      events: {
	        load: function() {
	          var chart = this
	          var series = this.series[0]
	          var points = series.processedYData
	          var newSeriesData = [[], [], []]
	          var newSeries = []
	          // Divide point for three separate values, and push that values to
	          // three arrays.
	          var dividePoint = (arr, value) => {
	            arr[0].push(value <= 50 ? value : 50)
	            arr[1].push(value <= 100 ? value - 50 : 50)
	            arr[2].push(value > 100 ? value - 100 : 0)
	          }
	          chart.options.colors = ['#73d170', '#4faab9', '#e75656']
	          // Delete current series
	          series.remove()
						
	          // Prepare series
	          points.forEach(function(elem) {
	            dividePoint(newSeriesData, elem)
	          })
	          newSeriesData.reverse() // Array should be reversed because of series.stacking
	          newSeriesData.forEach((series, i) => {
	          		newSeries.push({
	              		data: series,
	                  linkedTo: i > 0 ? ':previous' : undefined,
	              })
	          })
	   
						// Add new series
	          chart.update({
	            series: newSeries
	          }, true, true)

	        }
	      },
	      marginTop: 0,
	      marginBottom: 20
	    },
	    exporting: {
	    	enabled: false
	    },
	    title: {
	      text: null
	    },
	    xAxis: {
			categories: <?=$grafikgcgcat?>,
			labels: {
				y: 15,
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
	    legend: {
	    	enabled: false
	    },
	    plotOptions: {
			series: {
				stacking: 'normal',
				groupPadding: 0.12,
				pointPadding: 0
			},
	    },
	    yAxis: {
	      title: {
	        text: null
	      },
	      labels: {
	      	enabled: false
	      }
	    },
	    series: [{
	      name: 'Jane',
	      data: <?=$grafikgcgdat?>

	    }]
	  });
	});

</script>

<script type="text/javascript">
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-m-action-radir',
                type: 'pie',
                backgroundColor: null,
                marginLeft: -10,
                marginRight: -10,
                marginTop: 0,
                marginBottom: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$dataradir?>,
                colors: ['#4faab9','#e75656','#f7c958'],
                size: '100%',
                innerSize: '40%',
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
                        distance: -13,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-m-action-rdd',
                type: 'pie',
                backgroundColor: null,
                marginLeft: -10,
                marginRight: -10,
                marginTop: 0,
                marginBottom: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$datardd?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '100%',
                innerSize: '40%',
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
                        distance: -13,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-m-action-sl-meeting',
                type: 'pie',
                backgroundColor: null,
                marginLeft: -10,
                marginRight: -10,
                marginTop: 0,
                marginBottom: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$dataslmeet?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '100%',
                innerSize: '40%',
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
                        distance: -13,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-dokumen-probis',
                type: 'pie',
                backgroundColor: null,
                marginTop: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$dataprobis?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '60%',
                innerSize: '60%',
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
                        enabled: true,
                        distance: 5,
                        format: '{point.name}<br>{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
                            color: 'black',
                            textOutline: 'none',
                            opacity: 1
                        },
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-kebijakan-direksi',
                type: 'pie',
                backgroundColor: null,
                marginTop: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$datakebdir?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '60%',
                innerSize: '60%',
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
                        enabled: true,
                        distance: 5,
                        format: '{point.name}<br>{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
                            color: 'black',
                            textOutline: 'none',
                            opacity: 1
                        },
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-risk-management-report-control',
                type: 'pie',
                backgroundColor: null,
                marginLeft: -10,
                marginRight: -10,
                marginTop: 0,
                marginBottom: 0,
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
                data: <?=$datacontrol?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '100%',
                innerSize: '40%',
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
                        distance: -13,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
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
  $(function() {
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik-risk-management-report-mitigasi',
                type: 'pie',
                backgroundColor: null,
                marginLeft: -10,
                marginRight: -10,
                marginTop: 0,
                marginBottom: 0,
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
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' ';
                }
            },
            series: [{
                name: 'Browsers',
                data: <?=$datamitigasi?>,
                colors: ['#4faab9','#f7c958','#e75656'],
                size: '100%',
                innerSize: '40%',
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
                        distance: -13,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '7px',
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
	$(function() {
	  $('#grafik-general-affair').highcharts({
	    chart: {
	      type: 'bar',
	      marginTop: 0,
	      marginBottom: 0
	    },
	    exporting: {
	    	enabled: false
	    },
	    title: {
	      text: null
	    },
	    xAxis: {
	    	gridLineColor: '#ffffff',
      		lineColor: '#ffffff',
	      categories: [''],
	     	labels: {
    			enabled: false,	
    		},
	    },
	    yAxis: {
	    	gridLineColor: '#ffffff',
      		lineColor: '#ffffff',
	    	labels: {
    			enabled: false,	
    		},

	      //min: 0,
	      title: {
	        text: null
	      },
	      stackLabels: {
	        enabled: false,
	        style: {
	          fontWeight: 'bold',
	          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
	        }
	      }
	    },
	    legend: {
	    	enabled: false,
	      align: 'right',
	      x: -70,
	      verticalAlign: 'top',
	      y: 20,
	      floating: true,
	      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
	      borderColor: '#CCC',
	      borderWidth: 1,
	      shadow: false
	    },
	    tooltip: {
	      formatter: function() {
	        return '<b>' + this.x + '</b><br/>' +
	          this.series.name + ': ' + this.y + '<br/>' +
	          'Total: ' + this.point.stackTotal;
	      }
	    },
	    plotOptions: {
	      bar: {
	        stacking: 'normal',
	        dataLabels: {
	          enabled: true,
	          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
	          style: {
	            // textShadow: '0 0 3px black, 0 0 3px black'
	          }
	        }
	      },
	      series: {
                	groupPadding: 0.1,
	            	pointPadding: 0
                }
	    },
	    series: [{
	      name: 'Proses Tindak Lanjut',
	      data: [50],
	      color: '#ff7789'
	    }, {
	      name: 'Selesai',
	      data: [25],
	      color: '#8c8b8b'
	    }, {
          name: 'Total',
          data: [25],
          color: '#8c8b8b'
        }]
	  });
	});


</script>

<!-- HIGHCHARTS INSIDE TAB -->
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script>

    jQuery(document).ready(function () {

        // Build a chart
        jQuery('#grafik-inherit-risk').highcharts({
        	chart: {
	            type: 'heatmap',
	            marginTop: 40,
	            marginBottom: 40,
	            marginTop: 0,
	            marginRight: 0,
	            // height: 300,
	            plotBorderWidth: 1
	        },
	        exporting: {
	        	enabled: false
	        },


	        title: {
	            text: null
	        },

	        xAxis: {
	            categories: ['Tidak<br>Signifikan','Minor', 'Medium', 'Signifikan', 'Malapetaka'],
	            labels: {
                    style: {
                        fontSize: '9px',
                    }
                }
	        },

	        yAxis: {
	            categories: ['Sangat Kecil', 'Kecil', 'Sedang', 'Besar', 'Sangat Besar'],
	            title: null
	        },

	        colorAxis: {
	            min: 0,
	            minColor: '#19af54',
	            /*Highcharts.getOptions().colors[0]*/
	            maxColor: '#fc0d1b' ,

	        },

	        legend: {
	        	enabled: false,
	            align: 'right',
	            layout: 'vertical',
	            margin: 0,
	            verticalAlign: 'top',
	            y: 25,
	            symbolHeight: 200
	        },

	        tooltip: {
	            formatter: function () {
	                return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> test <br><b>' +
	                    this.point.value + '</b> err/ms in <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
	            }
	        },

	        series: [{
	            // name: 'PhyERR per Zone',
	            borderWidth: 1,
	            data: [
	            		[0, 0, 10], [0, 1, 19], [0, 2, 8], [0, 3, 24], [0, 4, 67], [1, 0, 92], [1, 1, 58], [1, 2, 78], [1, 3, 117], [1, 4, 48], [2, 0, 35], [2, 1, 15], [2, 2, 123], [2, 3, 64], [2, 4, 52], [3, 0, 72], [3, 1, 132], [3, 2, 114], [3, 3, 19], [3, 4, 16], [4, 0, 38], [4, 1, 5], [4, 2, 8], [4, 3, 117], [4, 4, 115]],
	            dataLabels: {
	                enabled: true,
	                color: '#000000'
	            }
	        }]
        });




        // Build a chart
        jQuery('#grafik-current-risk').highcharts({
            chart: {
	            type: 'heatmap',
	            marginTop: 40,
	            marginBottom: 80,
	            marginTop: 0,
	            marginRight: 0,
	            // height: 300,
	            plotBorderWidth: 1
	        },
	        exporting: {
	        	enabled: false
	        },


	        title: {
	            text: null
	        },

	        xAxis: {
	            categories: ['Tidak Signifikan','Minor', 'Medium', 'Signifikan', 'Malapetaka'],
	            labels: {
                    style: {
                        fontSize: '9px',
                    }
                }
	        },

	        yAxis: {
	            categories: ['Sangat Kecil', 'Kecil', 'Sedang', 'Besar', 'Sangat Besar'],
	            title: null
	        },

	        colorAxis: {
	            min: 0,
	            minColor: '#19af54',
	            /*Highcharts.getOptions().colors[0]*/
	            maxColor: '#fc0d1b' ,

	        },

	        legend: {
	        	enabled: false,
	            align: 'right',
	            layout: 'vertical',
	            margin: 0,
	            verticalAlign: 'top',
	            y: 25,
	            symbolHeight: 200
	        },

	        tooltip: {
	            formatter: function () {
	                return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> test <br><b>' +
	                    this.point.value + '</b> err/ms in <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
	            }
	        },

	        series: [{
	            // name: 'PhyERR per Zone',
	            borderWidth: 1,
	            data: [
	            		[0, 0, 10], [0, 1, 19], [0, 2, 8], [0, 3, 24], [0, 4, 67], [1, 0, 92], [1, 1, 58], [1, 2, 78], [1, 3, 117], [1, 4, 48], [2, 0, 35], [2, 1, 15], [2, 2, 123], [2, 3, 64], [2, 4, 52], [3, 0, 72], [3, 1, 132], [3, 2, 114], [3, 3, 19], [3, 4, 16], [4, 0, 38], [4, 1, 5], [4, 2, 8], [4, 3, 117], [4, 4, 115]],
	            dataLabels: {
	                enabled: true,
	                color: '#000000'
	            }
	        }]
        });

		// fix dimensions of chart that was in a hidden element
		jQuery(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) { // on tab selection event
		    jQuery( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
		        var chart = jQuery(this).highcharts(); // target the chart itself
		        chart.reflow() // reflow that chart
		    });
		})

    });

</script>

<!-- HIGHCHART SOLID GAUGE -->
<script src="lib/highcharts/highcharts-more.js"></script>
<script src="lib/highcharts/solid-gauge.js"></script>

<script type="text/javascript">
	// const gaugeOptions = {
	//     chart: {
	//         type: 'solidgauge',
	//         marginTop: -20

	//     },

	//     title: null,

	//     pane: {
	//         center: ['50%', '85%'],
	//         size: '115%',
	//         startAngle: -90,
	//         endAngle: 90,
	//         background: {
	//             backgroundColor:
	//                 Highcharts.defaultOptions.legend.backgroundColor || '#fafafa',
	//             borderRadius: 5,
	//             innerRadius: '60%',
	//             outerRadius: '100%',
	//             shape: 'arc'
	//         }
	//     },

	//     exporting: {
	//         enabled: false
	//     },

	//     tooltip: {
	//         enabled: false
	//     },

	//     // the value axis
	//     yAxis: {
	//         stops: [
	//             [0.1, '#55BF3B'], // green
	//             [0.5, '#DDDF0D'], // yellow
	//             [0.9, '#DF5353'] // red
	//         ],
	//         lineWidth: 0,
	//         tickWidth: 0,
	//         minorTickInterval: null,
	//         tickAmount: 2,
	//         title: {
	//             y: -70
	//         },
	//         labels: {
	//             y: 16
	//         }
	//     },

	//     plotOptions: {
	//         solidgauge: {
	//             borderRadius: 3,
	//             dataLabels: {
	//                 y: 5,
	//                 borderWidth: 0,
	//                 useHTML: true
	//             }
	//         }
	//     }
	// };

	// // The speed gauge
	// const chartSpeed = Highcharts.chart(
	//     'grafik-audit-internal', Highcharts.merge(gaugeOptions, {
	//     	yAxis: {
	//             min: 0,
	//             max: 200,
	//             title: {
	//                 text: null
	//             }
	//         },

	//         credits: {
	//             enabled: false
	//         },

	//         series: [{
	//             name: 'Speed',
	//             data: [80],
	//             dataLabels: {
	//                 format:
	//                 '<div style="text-align:center">' +
	//                 '<span style="font-size:25px">{y}</span><br/>' +
	//                 '<span style="font-size:12px;opacity:0.4">km/h</span>' +
	//                 '</div>'
	//             },
	//             tooltip: {
	//                 valueSuffix: ' km/h'
	//             }
	//         }]

	//     }));

	// // The RPM gauge
	// const chartRpm = Highcharts.chart(
	//     'grafik-audit-external', Highcharts.merge(gaugeOptions, {
	//         yAxis: {
	//             min: 0,
	//             max: 5,
	//             title: {
	//                 text: null
	//             }
	//         },

	//         series: [{
	//             name: 'RPM',
	//             data: [1],
	//             dataLabels: {
	//                 format:
	//                 '<div style="text-align:center">' +
	//                 '<span style="font-size:25px">{y:.1f}</span><br/>' +
	//                 '<span style="font-size:12px;opacity:0.4">' +
	//                 '* 1000 / min' +
	//                 '</span>' +
	//                 '</div>'
	//             },
	//             tooltip: {
	//                 valueSuffix: ' revolutions/min'
	//             }
	//         }]

	//     }));

	// // Bring life to the dials
	// setInterval(function () {
	//     // Speed
	//     let point,
	//         newVal,
	//         inc;

	//     if (chartSpeed) {
	//         point = chartSpeed.series[0].points[0];
	//         inc = Math.round((Math.random() - 0.5) * 100);
	//         newVal = point.y + inc;

	//         if (newVal < 0 || newVal > 200) {
	//             newVal = point.y - inc;
	//         }

	//         point.update(newVal);
	//     }

	//     // RPM
	//     if (chartRpm) {
	//         point = chartRpm.series[0].points[0];
	//         inc = Math.random() - 0.5;
	//         newVal = point.y + inc;

	//         if (newVal < 0 || newVal > 5) {
	//             newVal = point.y - inc;
	//         }

	//         point.update(newVal);
	//     }
	// }, 2000);

</script>

<!-- HIGHCHART SEMI CIRCLE DONUT -->
<script type="text/javascript">
    Highcharts.chart('grafik-audit-internal', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            margin: [-15,0,-25,0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            backgroundColor: null
        },
        title: {
            text: null // Ini akan menghilangkan title
            // text: '',
            // align: 'center',
            // verticalAlign: 'middle',
            // y: 60,
            // style: {
            //     fontSize: '1.1em'
            // }
        },
        exporting: {
            enabled: false
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: 3,
                    style: {
                        fontWeight: 'normal',
                        fontSize: '8px',
                        color: '#333'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            colors: ['#4faab9','#f7c958','#e75656'],
            name: '',
            innerSize: '50%',
            data: <?=$datainternal?>
        }]
    });

    Highcharts.chart('grafik-audit-external', {
        chart: {
            // plotBackgroundColor: null,
            // plotBorderWidth: 0,
            // plotShadow: false
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            margin: [-15,0,-25,0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            backgroundColor: null
        },
        title: {
            text: null // Ini akan menghilangkan title
            // text: '',
            // align: 'center',
            // verticalAlign: 'middle',
            // y: 60,
            // style: {
            //     fontSize: '1.1em'
            // }
        },
        exporting: {
            enabled: false
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: 3,
                    style: {
                        fontWeight: 'normal',
                        fontSize: '8px',
                        color: '#333'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            colors: ['#4faab9','#f7c958','#e75656'],
            name: '',
            innerSize: '50%',
            data: <?=$dataexternal?>
        }]
    });
</script>


<!-- SKILLSET -->
<!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<script>
jQuery(document).ready(function () {
    jQuery('.skillbar').each(function () {
        jQuery(this).find('.skillbar-bar').animate({ width: jQuery(this).attr('data-percent') }, 6000);
    });
});
//# sourceURL=pen.js
</script>


