
<?
$MRO=10;
$RLA=9;
$JIRE=2;
$OTHER_SUPPORTING=0;

$ONGOING_MRO=70;
$ONGOING_RLA=89;
$ONGOING_JIRE=21;
$ONGOING_OTHER_SUPPORTING=16;

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

$arrgant= array(
array('nama'=>'OH SE PLTU KALTIM TELUK UNIT 2','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,7,16)','rencana_end'=>'Date.UTC(2024,8,30)','realisasi_start'=>'Date.UTC(2024,7,16)','realisasi_end'=>'',),
array('nama'=>'OH SE PLTU PAITON UNIT 1','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,7,5)','rencana_end'=>'Date.UTC(2024,8,29)','realisasi_start'=>'Date.UTC(2024,7,5)','realisasi_end'=>'',),
array('nama'=>'OH SI PLTU AMPANA UNIT 1','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,7,22)','rencana_end'=>'Date.UTC(2024,8,21)','realisasi_start'=>'Date.UTC(2024,7,22)','realisasi_end'=>'',),
array('nama'=>'OH SE TARAHAN UNIT 3','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,7,20)','rencana_end'=>'Date.UTC(2024,9,13)','realisasi_start'=>'Date.UTC(2024,7,20)','realisasi_end'=>'',),
array('nama'=>'OH SI PULANG PISAU UNIT 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'OH SI BANJARSARI UNIT 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'JASA CLEANING & SCAFFOLDING BOILER CILACAP UNIT 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'OH SI+ KENDARI UNIT 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'CI GT 1.2 Muara Karang','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,8,24)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'ST 1.0 Muara Karang','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,9,1)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SE Tidore Unit 1','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,9,28)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SI Bangka Unit 2','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,9,11)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SE Bolok Unit 1','tipe'=>'MRO','rencana_start'=>'Date.UTC(2024,8,23)','rencana_end'=>'Date.UTC(2024,10,7)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SE Tidore Unit 1','tipe'=>'Other Supporting','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,9,28)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SI Bangka Unit 2','tipe'=>'Other Supporting','rencana_start'=>'Date.UTC(2024,8,13)','rencana_end'=>'Date.UTC(2024,9,11)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'SE Bolok Unit 1','tipe'=>'Other Supporting','rencana_start'=>'Date.UTC(2024,8,23)','rencana_end'=>'Date.UTC(2024,10,7)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'OH SE PLTU KALTIM TELUK UNIT 2','tipe'=>'Other Supporting','rencana_start'=>'Date.UTC(2024,7,16)','rencana_end'=>'Date.UTC(2024,8,30)','realisasi_start'=>'Date.UTC(2024,7,16)','realisasi_end'=>'',),
array('nama'=>'OH SI PLTU AMPANA UNIT 1','tipe'=>'Other Supporting','rencana_start'=>'Date.UTC(2024,7,22)','rencana_end'=>'Date.UTC(2024,8,21)','realisasi_start'=>'Date.UTC(2024,7,22)','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT SI GENERATOR PADA PLTU#20 UP REMBANG','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,6,17)','rencana_end'=>'Date.UTC(2024,6,27)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR UAT #GT 3.1 PLTU MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,6,22)','rencana_end'=>'Date.UTC(2024,7,1)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA SI+ PLTU 2 UP INDRAMAYU','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,6,31)','rencana_end'=>'Date.UTC(2024,7,10)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT TURBIN PADA ME PLTU#1 UP PAITON','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,9)','rencana_end'=>'Date.UTC(2024,7,19)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT NDT PADA PLTA #3 SUTAMI UP BRANTAS','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,12)','rencana_end'=>'Date.UTC(2024,7,22)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA PLTA #3 SUTAMI UP BRANTAS','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,16)','rencana_end'=>'Date.UTC(2024,7,26)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT NDT PADA SE PLTU #3 UPK TARAHAN','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,21)','rencana_end'=>'Date.UTC(2024,7,31)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA ME PLTU#1 UP PAITON','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,19)','rencana_end'=>'Date.UTC(2024,7,29)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA PLTA GIRINGAN','tipe'=>'RLA','rencana_start'=>'Date.UTC(2024,7,20)','rencana_end'=>'Date.UTC(2024,7,30)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'PENUGASAN PERSONIL UNTUK SUPPORTING PEKERJAAN ANNUAL INSPECTION UNIT 1 & UNIT 2 PLTA TANGGAMUS PT TANGGAMUS ELECTRIC POWER','tipe'=>'JIRE','rencana_start'=>'Date.UTC(2024,6,2)','rencana_end'=>'Date.UTC(2024,6,12)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'JASA LABOUR SUPPLY TENAGA AHLI DAYA REPAIR VALVE PADA SI+ PLTU 2 INDRAMAYU','tipe'=>'JIRE','rencana_start'=>'Date.UTC(2024,6,24)','rencana_end'=>'Date.UTC(2024,7,3)','realisasi_start'=>'','realisasi_end'=>'',),
array('nama'=>'Bantuan Personil Untuk Kalibrasi Transduser PLTU Cilacap (S2P)','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,1)','realisasi_end'=>'Date.UTC(2024,0,5)',),
array('nama'=>'Jasa Supporting Pekerjaan LSB Rotor Turbin Dalam Rangka Jasa Repair Rotor, Stator Turbin dan OH Main Turbin PLTU Bukit Asam Unit #2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,3)','realisasi_end'=>'Date.UTC(2024,0,8)',),
array('nama'=>'OH MO PLTP Patuha Unit 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,4)','realisasi_end'=>'Date.UTC(2024,0,26)',),
array('nama'=>'OH SI Punagaya Unit 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,6)','realisasi_end'=>'Date.UTC(2024,0,30)',),
array('nama'=>'OH ME Sebalang #1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,9)','realisasi_end'=>'Date.UTC(2024,1,17)',),
array('nama'=>'OH ME Tanjung Awar-Awar #1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,9)','realisasi_end'=>'Date.UTC(2024,1,17)',),
array('nama'=>'OH Recovery Genarator 3.2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,0,22)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Simple Inspection PLTU Keban Agung Unit 1 PT Priamanaya Energy','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,1,6)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Simple Inspection PLTU Anggrek Unit 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,16)','realisasi_end'=>'Date.UTC(2024,1,20)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Additional Job Simple Inspection PLTU Anggrek Unit 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,16)','realisasi_end'=>'Date.UTC(2024,1,20)',),
array('nama'=>'Relokasi Balai Pungut ke Bangka','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,18)','realisasi_end'=>'Date.UTC(2024,3,1)',),
array('nama'=>'OH Type C GT 2.2 Muara Tawar','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,20)','realisasi_end'=>'Date.UTC(2024,2,7)',),
array('nama'=>'Jasa Tenaga Pendukung Dalam Rangka Boiler Inspection Unit 2 PLTU Banjarsari','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,26)','realisasi_end'=>'Date.UTC(2024,1,9)',),
array('nama'=>'OH SI+ Kendari #1 Standar Job','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,26)','realisasi_end'=>'Date.UTC(2024,2,15)',),
array('nama'=>'OH SI+ Kendari #1 Additional','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,26)','realisasi_end'=>'Date.UTC(2024,2,15)',),
array('nama'=>'CI GT Gresik 3.1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,29)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'OH SI Indramayu #3','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,2)','realisasi_end'=>'Date.UTC(2024,2,14)',),
array('nama'=>'Recovery Generator Indramayu','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,2)','realisasi_end'=>'Date.UTC(2024,5,8)',),
array('nama'=>'Recovery Generator Indramayu','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,2)','realisasi_end'=>'Date.UTC(2024,5,8)',),
array('nama'=>'OH SI Pacitan Unit 1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,16)','realisasi_end'=>'Date.UTC(2024,2,15)',),
array('nama'=>'OH ST Annual Muara Tawar 1.4','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,26)','realisasi_end'=>'Date.UTC(2024,2,20)',),
array('nama'=>'OH MO MO #3 Air Heater PLTU Gresik','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,26)','realisasi_end'=>'Date.UTC(2024,2,28)',),
array('nama'=>'BI Tenayan #2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,6)','realisasi_end'=>'Date.UTC(2024,2,24)',),
array('nama'=>'Cleaning ESP BI Tenayan #2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,6)','realisasi_end'=>'Date.UTC(2024,2,24)',),
array('nama'=>'BFP Kaltim Teluk Unit 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,17)','realisasi_end'=>'Date.UTC(2024,2,27)',),
array('nama'=>'Assestment PLTU Mabar','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,18)','realisasi_end'=>'Date.UTC(2024,2,29)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Jasa Assessment PLTU Mabar 2x150 MW Unit 1&2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,18)','realisasi_end'=>'Date.UTC(2024,2,29)',),
array('nama'=>'OH MO GT 2.2 PLTU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,22)','realisasi_end'=>'Date.UTC(2024,3,7)',),
array('nama'=>'OH ME PLTU Pacitan Unit 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,23)','realisasi_end'=>'Date.UTC(2024,4,19)',),
array('nama'=>'Jasa Tenaga Kerja Dalam Rangka Annual Maintenance PT Suparma TBK 2024','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,8)','realisasi_end'=>'Date.UTC(2024,3,22)',),
array('nama'=>'Rec Sebalang #2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,13)','realisasi_end'=>'Date.UTC(2024,5,21)',),
array('nama'=>'OH SI PLTU Tanjung Awar-Awar Unit 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,15)','realisasi_end'=>'Date.UTC(2024,4,18)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Jasa Pemeliharaan Level B GT #2 PLTGU Tanjung Uncang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,17)','realisasi_end'=>'Date.UTC(2024,4,28)',),
array('nama'=>'Pemasangan dan Support Engineer Generator Transformer Spare Unti 3 A PLTU Cilacap','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,19)','realisasi_end'=>'Date.UTC(2024,5,12)',),
array('nama'=>'OH SE ST 2.0 UP Gresik','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,22)','realisasi_end'=>'Date.UTC(2024,5,2)',),
array('nama'=>'OH SI Banjarsari #1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,1)','realisasi_end'=>'Date.UTC(2024,4,27)',),
array('nama'=>'OH BI Ketapang Unit 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,5)','realisasi_end'=>'Date.UTC(2024,4,19)',),
array('nama'=>'OH SI Tembilahan #1 Standar Job','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,15)','realisasi_end'=>'Date.UTC(2024,5,9)',),
array('nama'=>'OH SI Tembilahan #1 Additional Job','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,15)','realisasi_end'=>'Date.UTC(2024,5,9)',),
array('nama'=>'OH Recovery PLTU Kaltim Teluk #1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,27)','realisasi_end'=>'Date.UTC(2024,5,7)',),
array('nama'=>'MO Cirata #6','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,27)','realisasi_end'=>'Date.UTC(2024,5,7)',),
array('nama'=>'OH SI Bangka #1','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,30)','realisasi_end'=>'Date.UTC(2024,5,19)',),
array('nama'=>'ST 3.0 Muara Karang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,3)','realisasi_end'=>'Date.UTC(2024,5,30)',),
array('nama'=>'OH Blok 3 Muara Karang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,3)','realisasi_end'=>'Date.UTC(2024,6,2)',),
array('nama'=>'Pengerukan Lumpur Blok 3 Muara Karang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,3)','realisasi_end'=>'Date.UTC(2024,5,30)',),
array('nama'=>'TI GT 3.1 Muara Karang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,3)','realisasi_end'=>'Date.UTC(2024,5,30)',),
array('nama'=>'OH AI GT 1.2 PLTGU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,12)','realisasi_end'=>'Date.UTC(2024,5,18)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka HGPI #2 PT PLN MCTN','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,18)','realisasi_end'=>'Date.UTC(2024,6,25)',),
array('nama'=>'OH SE Pulang Pisau Unit 2','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,18)','realisasi_end'=>'Date.UTC(2024,7,9)',),
array('nama'=>'OH Type A GT 1.1 PLTGU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,19)','realisasi_end'=>'Date.UTC(2024,5,25)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Pekerjaan Pull Out Rotor Generator LED','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,19)','realisasi_end'=>'Date.UTC(2024,6,2)',),
array('nama'=>'OH AI GT 2.1 PLTGU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,29)','realisasi_end'=>'Date.UTC(2024,6,5)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka MO Unit 1 PLTU Banjarsari','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,1)','realisasi_end'=>'Date.UTC(2024,6,31)',),
array('nama'=>'OH SI Rembang 20','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,2)','realisasi_end'=>'Date.UTC(2024,6,22)',),
array('nama'=>'OH SI Tarahan #4','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,3)','realisasi_end'=>'Date.UTC(2024,7,5)',),
array('nama'=>'OH AI ST 1.8 PLTGU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,6)','realisasi_end'=>'Date.UTC(2024,6,17)',),
array('nama'=>'OH AI ST 2.8 PLTGU Sengkang','tipe'=>'MRO','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,18)','realisasi_end'=>'Date.UTC(2024,6,25)',),
array('nama'=>'OH MO PLTP Patuha Unit 1','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,4)','realisasi_end'=>'Date.UTC(2024,0,26)',),
array('nama'=>'OH ME Tanjung Awar-Awar #1','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,9)','realisasi_end'=>'Date.UTC(2024,1,17)',),
array('nama'=>'Jasa Tenaga Kerja Pendukung Dalam Rangka Simple Inspection PLTU Keban Agung Unit 1 PT Priamanaya Energy','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,1,6)',),
array('nama'=>'OH SI+ Kendari #1 Standar Job','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,26)','realisasi_end'=>'Date.UTC(2024,2,15)',),
array('nama'=>'BI Tenayan #2','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,6)','realisasi_end'=>'Date.UTC(2024,2,24)',),
array('nama'=>'OH SI PLTU Tanjung Awar-Awar Unit 2','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,15)','realisasi_end'=>'Date.UTC(2024,4,18)',),
array('nama'=>'OH SI Banjarsari #1','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,1)','realisasi_end'=>'Date.UTC(2024,4,27)',),
array('nama'=>'OH BI Ketapang Unit 2','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,5)','realisasi_end'=>'Date.UTC(2024,4,19)',),
array('nama'=>'OH SI Tembilahan #1 Standar Job','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,15)','realisasi_end'=>'Date.UTC(2024,5,9)',),
array('nama'=>'OH SI Bangka #1','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,30)','realisasi_end'=>'Date.UTC(2024,5,19)',),
array('nama'=>'OH SI Rembang 20','tipe'=>'Other Supporting','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,2)','realisasi_end'=>'Date.UTC(2024,6,22)',),
array('nama'=>'PPENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM Generator Electrical PLTU Indramayu #1','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,2)','realisasi_end'=>'Date.UTC(2024,0,31)',),
array('nama'=>'PPENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA ME PLTU #1 UP INDRAMAYU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,2)','realisasi_end'=>'Date.UTC(2024,0,24)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ELECTRICAL PLTU BANTEN 660 MW PT LESTARI BANGUN ENERGI','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,4)','realisasi_end'=>'Date.UTC(2024,0,6)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA IB PLTU#2 UPK PUNAGAYA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,9)','realisasi_end'=>'Date.UTC(2024,0,27)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER pada IB PLTU#2 UP PULANG PISAU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,13)','realisasi_end'=>'Date.UTC(2024,0,25)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA ME PLTU #1 UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,1,5)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM Generator Electrical OH SI PLTU #1 UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,14)','realisasi_end'=>'Date.UTC(2024,0,31)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA ME+ PLTU#1 UP TJ AWAR-AWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,1,16)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA GT 3.2 PLTGU GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,15)','realisasi_end'=>'Date.UTC(2024,0,22)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ECT COOLER GENERATOR PADA IB5 PLTU #2 UP TENAYAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2023,11,27)','realisasi_end'=>'Date.UTC(2024,0,6)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE RLA ASSESMENT GENERATOR PADA ME+ PLTU#1 UP TJ AWAR-AWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,11)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA BI PLTU#1 UP KALTIM TELUK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,24)','realisasi_end'=>'Date.UTC(2024,1,11)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT GT & HRSG PADA TYPE C PLTGU 2.2 UP MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,25)','realisasi_end'=>'Date.UTC(2024,1,12)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA SI+ PLTU 3 UP INDRAMAYU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,28)','realisasi_end'=>'Date.UTC(2024,2,2)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA EMERGENCY BOCOR FURNACE PLTU PAITON','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,5)','realisasi_end'=>'Date.UTC(2024,0,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTGU SENGKANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,1)','realisasi_end'=>'Date.UTC(2024,1,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT GT MAIN TRAFO PLTGU 2.1-2.2 UP MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,1)','realisasi_end'=>'Date.UTC(2024,1,13)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA BOILER PLTU BANJARSARI UNIT 2 (RLA PLN NPS)','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,27)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM Rotor Generator Electrical OH SI PLTU #1 UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,6)','realisasi_end'=>'Date.UTC(2024,1,10)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA PART PERBAIKAN MESIN DIESEL PLTD SILAE','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,6)','realisasi_end'=>'Date.UTC(2024,1,11)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTA WAMPU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,12)','realisasi_end'=>'Date.UTC(2024,1,18)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT KEBOCORAN FURNACE BOILER PADA PLTU#9 UP PAITON','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,5)','realisasi_end'=>'Date.UTC(2024,1,20)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTU NGEBEL (PONOROGO)','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,19)','realisasi_end'=>'Date.UTC(2024,1,24)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BLADE TURBIN BARU PLTU #10 UP REMBANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,19)','realisasi_end'=>'Date.UTC(2024,1,26)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA GT 3.1 PLTGU GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,29)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT TURBIN AIR PADA MO PLTU NGEBEL (PONOROGO)','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,14)','realisasi_end'=>'Date.UTC(2024,1,24)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT KEBOCORAN BOILER PADA PLTU#1 UPK PUNAGAYA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,21)','realisasi_end'=>'Date.UTC(2024,1,27)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER TURBIN PADA ME PLTU 2 UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,20)','realisasi_end'=>'Date.UTC(2024,2,18)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT GENERATOR & TRAFO PADA ME PLTU 2 UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,27)','realisasi_end'=>'Date.UTC(2024,2,10)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER & TURBIN SIMPLE INSPECTION PLTU #1 UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,26)','realisasi_end'=>'Date.UTC(2024,2,15)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO SIMPLE INSPECTION PLTU #1 UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,26)','realisasi_end'=>'Date.UTC(2024,2,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA SI+ PLTU 3 UP INDRAMAYU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,16)','realisasi_end'=>'Date.UTC(2024,4,16)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PAUT WATERBOX CONDENSOR #1 UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,7)','realisasi_end'=>'Date.UTC(2024,2,5)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT TURBINE PADA ANNUAL INSPECTION PLTGU ST 1.4 UP MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,4)','realisasi_end'=>'Date.UTC(2024,2,16)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER PADA BI PLTU #2 UP TENAYAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,7)','realisasi_end'=>'Date.UTC(2024,2,21)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA MI+ GT 2.1 PLTGU UPK BELAWAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,21)','realisasi_end'=>'Date.UTC(2024,1,29)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER PADA MO PLTU #3 UP GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,4)','realisasi_end'=>'Date.UTC(2024,2,13)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA MO PLTU BANJARSARI UNIT 2','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,17)','realisasi_end'=>'Date.UTC(2024,2,23)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ECT COOLER GENERATOR PADA IB5 PLTU #2 UP TENAYAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,10)','realisasi_end'=>'Date.UTC(2024,2,21)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTD PALANGKARAYA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,18)','realisasi_end'=>'Date.UTC(2024,2,25)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER INSPECTION PLTU #1 UP PULANG PISAU','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,20)','realisasi_end'=>'Date.UTC(2024,2,28)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT NDT PADA PART GT - PLTG 2.2 UP SENGKANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,25)','realisasi_end'=>'Date.UTC(2024,2,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT NDT PADA PART GT AISTOM FRAME 5 (PUSHARLIS) UPK SEBALANG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,25)','realisasi_end'=>'Date.UTC(2024,2,30)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTA AMPEL GADING','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,27)','realisasi_end'=>'Date.UTC(2024,3,2)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTU PACITAN UNIT 2','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,27)','realisasi_end'=>'Date.UTC(2024,4,11)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA NDT REPAIR GEN EX GT 3.1 UP MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,29)','realisasi_end'=>'Date.UTC(2024,2,29)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL RLA ASSESMENT NDT PADA TANKI BBM PLTD KOLAKA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,2)','realisasi_end'=>'Date.UTC(2024,3,7)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA PLTU PAITON UNIT 9','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,7)','realisasi_end'=>'Date.UTC(2024,3,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTU PAITON #9','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,8)','realisasi_end'=>'Date.UTC(2024,3,10)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT RSH PADA PLTU PAITON UNIT 1#2','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,11)','realisasi_end'=>'Date.UTC(2024,3,14)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER & TURBIN ME+ PLTU #1 UP TJ AWAR-AWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,16)','realisasi_end'=>'Date.UTC(2024,4,17)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO PADA PLTU #2 UP TJ AWAR-AWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,19)','realisasi_end'=>'Date.UTC(2024,4,4)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT NDT WATERBOX CONDENSOR PLTU#2 (TAHAP 4) UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,6)','realisasi_end'=>'Date.UTC(2024,2,23)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT MEKANIK PADA MI GT/HRSG PLTGU 2.3 UP GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,24)','realisasi_end'=>'Date.UTC(2024,4,28)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT MEKANIK PADA RUNNER SUTAMI MECHANICAL WORKSHOP','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,28)','realisasi_end'=>'Date.UTC(2024,4,6)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ELECTRICAL PADA MI GT/HRSG PLTGU 2.3 UP GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,29)','realisasi_end'=>'Date.UTC(2024,4,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER PADA BI PLTU#1 UP KALTIM TELUK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,3)','realisasi_end'=>'Date.UTC(2024,4,17)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA OH SI+ PLTU BANJARSARI UNIT 1 (RLA PLN NPS)','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,4)','realisasi_end'=>'Date.UTC(2024,4,16)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA PENSTOCK PLTA MENDALAN UP BRANTAS','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,6)','realisasi_end'=>'Date.UTC(2024,4,17)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT BOILER PADA BI PLTU#1 UP TENAYAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,17)','realisasi_end'=>'Date.UTC(2024,5,2)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT MEAN INSPECTION PLTU #2 UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,30)','realisasi_end'=>'Date.UTC(2024,3,20)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE RLA ASSESMENT PADA GENERATOR PLTA MENDALAN UP BRANTAS','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,4)','realisasi_end'=>'Date.UTC(2024,4,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NDE RLA ASSESMENT PADA FO BOILER PLTU #2 UPK PUNAGAYA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,7)','realisasi_end'=>'Date.UTC(2024,4,12)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL PELAYANAN NDT REBBABIT BEARING MOTOR PA FAN OH ME+ PLTU #2 UP PACITAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,3)','realisasi_end'=>'Date.UTC(2024,4,9)',),
array('nama'=>'PENYEDIAAN TENAGA FIITTER MECHANICAL NDE RLA UJI NDT PADA PERBAIKAN POROS PAH PLTU #1 UP PAITON','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,9)','realisasi_end'=>'Date.UTC(2024,4,12)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ELECTRICAL PADA ST GT UP GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,13)','realisasi_end'=>'Date.UTC(2024,4,14)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL PELAYANAN NDT REBBABIT BEARING MOTOR PA FAN OH ME PLTGU UP GRESIK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,14)','realisasi_end'=>'Date.UTC(2024,4,15)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICALNDT REPAIR GENERATOR EX GT3.1 MTW WORKSHOP','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,11)','realisasi_end'=>'Date.UTC(2024,4,12)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE RLA ASSESMENT PADA TRAFO PLTA WLINGI','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,15)','realisasi_end'=>'Date.UTC(2024,4,17)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA RECOVERY TURBIN PLTU #2 UPK SEBALANG TAHAP 1','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,17)','realisasi_end'=>'Date.UTC(2024,4,19)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA UNIT MUARA TAWAR','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,17)','realisasi_end'=>'Date.UTC(2024,4,18)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA BI PLTU#1 UP KALTIM TELUK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,21)','realisasi_end'=>'Date.UTC(2024,4,26)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT FO BOILER PADA PLTU#1 UP KALTIM TELUK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,19)','realisasi_end'=>'Date.UTC(2024,4,27)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT MO BOILER PASCA OH BI PLTU#1 UP KALTIM TELUK','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,29)','realisasi_end'=>'Date.UTC(2024,5,9)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA RECOVERY TURBIN PLTU #2 UPK SEBALANG TAHAP 2','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,23)','realisasi_end'=>'Date.UTC(2024,4,29)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT MEKANIK PADA UNIT PLTA SUTAMI','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,20)','realisasi_end'=>'Date.UTC(2024,4,24)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA ASSESMENT PADA FO PLTU#1 UP PAITON','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,30)','realisasi_end'=>'Date.UTC(2024,5,3)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT BUSHING TRAFO PADA ME PLTA CIRATA','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,4,28)','realisasi_end'=>'Date.UTC(2024,5,6)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER NON MECHANICAL NDE ASM ASSESMENT TRAFO GENERATOR PADA PLTD TELUK BETUNG','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,4)','realisasi_end'=>'Date.UTC(2024,5,12)',),
array('nama'=>'PENYEDIAAN TENAGA FITTER MECHANICAL NDE RLA BOILER PADA BI PLTU #3 UPK TARAHAN','tipe'=>'RLA','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,5,3)','realisasi_end'=>'Date.UTC(2024,5,10)',),
array('nama'=>'Manpower Kalibrasi Tranducer PLTU Cilacap Unit 3 S2P BDD','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,31)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'Manpower Support OH SI #1 PLTU Punagaya','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,24)','realisasi_end'=>'Date.UTC(2024,1,3)',),
array('nama'=>'Reverse Engineering OH SI UP Indramayu #3','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,5)','realisasi_end'=>'Date.UTC(2024,2,3)',),
array('nama'=>'Repair Valve OH SI UP Indramayu #3','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,5)','realisasi_end'=>'Date.UTC(2024,2,10)',),
array('nama'=>'Pengadaan Material Consumable Repair Valve OH SI+ UP Indramayu #3','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,5)','realisasi_end'=>'Date.UTC(2024,2,11)',),
array('nama'=>'Penugasan Personil Penanganan Kebocoran Mech Seal BFP PLTU Nii Tanasa Kendari','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,1,9)','realisasi_end'=>'Date.UTC(2024,1,12)',),
array('nama'=>'Penugasan Personil UP Pulang Pisau untuk Supporting Pekerjaan BUMP Test Generator PLTU Sebalang Unit 2','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,12)','realisasi_end'=>'Date.UTC(2024,2,18)',),
array('nama'=>'MANPOWER REPAIR WORKSHOP SUPPORT OH (GRINDING SLIP RING) UP AWAR-AWAR','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,8)','realisasi_end'=>'Date.UTC(2024,3,13)',),
array('nama'=>'Reverse engineering GENO UP Indramayu','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,19)','realisasi_end'=>'Date.UTC(2024,3,22)',),
array('nama'=>'REPAIR RECOANTING RUNNER PLTA SUTAMI EX #2 UP BRANTAS','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,30)','realisasi_end'=>'Date.UTC(2024,5,6)',),
array('nama'=>'Penugasan Personil MKP Dalam Supporting Mobilisasi Peralatan Kalibrasi Milik UP Paiton','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,6,1)','realisasi_end'=>'Date.UTC(2024,6,3)',),
array('nama'=>'Jasa Manpower WKS Online Test Safety Valve UP Punagaya','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,7,3)','realisasi_end'=>'Date.UTC(2024,7,5)',),
array('nama'=>'Manpower Stanby Start PLTU 4 UP Gresik','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,22)','realisasi_end'=>'Date.UTC(2024,2,22)',),
array('nama'=>'Manpower Support OH (Grinding Slip Ring ) UP Awar-awar','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,3,9)','realisasi_end'=>'Date.UTC(2024,3,15)',),
array('nama'=>'Manpower Fabrikasi Balance Weight PLTU Unit 2 Sebalang','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,3)','realisasi_end'=>'Date.UTC(2024,2,6)',),
array('nama'=>'Manpower Support OH MO PLTU 3 Gresik','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,4)','realisasi_end'=>'Date.UTC(2024,2,29)',),
array('nama'=>'Manpower Drafter Reverse Engineering ME PLTU 1 UP Tanjung Awar Awar','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,20)','realisasi_end'=>'Date.UTC(2024,0,31)',),
array('nama'=>'Manpower Clamp Rotor Generator Reinsulation UP Indramayu','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,0,26)','realisasi_end'=>'Date.UTC(2024,0,31)',),
array('nama'=>'Manpower Balancing Generator GT 3.1 & 3.2 UP Gresik','tipe'=>'JIRE','rencana_start'=>'','rencana_end'=>'','realisasi_start'=>'Date.UTC(2024,2,21)','realisasi_end'=>'Date.UTC(2024,2,22)',),

);

$arrwarna=array('JIRE'=>'194, 123, 160','MRO'=>'109, 158, 235','RLA'=>'246, 178, 107','Other Supporting'=>'147, 196, 125')
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

          <div class="card area-schedule">
            <div class="card-body on-going">
              <div class="judul">On Going</div>
              <div class="inner">
                <div class="item">
                  <div class="title"><span style="width:80%">MRO</span><div class="bulat" style="background-color: #6d9eeb;"></div></div>
                  <div class="nilai"><span><?=$ONGOING_MRO?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">RLA</span><div class="bulat" style="background-color: #f6b26b;"></div></div>
                  <div class="nilai"><span><?=$ONGOING_RLA?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">JIRE</span><div class="bulat" style="background-color: #c27ba0;"></div></div>
                  <div class="nilai"><span><?=$ONGOING_JIRE?></span></div>
                  <div class="clearfix"></div>
                </div>
                <div class="item">
                  <div class="title"><span style="width:80%">Others supporting</span><div class="bulat" style="background-color: #93c47d;"></div></div>
                  <div class="nilai"><span><?=$ONGOING_OTHER_SUPPORTING?></span></div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="area-gantt-chart-grafik" style="height: calc(50vh - 15px);overflow: scroll;">
              <div id="container" style="width:250%"></div>
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

<!-- <script type="text/javascript">

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

</script> -->

<script>
Highcharts.ganttChart('container', {
    title: {
        text: null
    },
    yAxis: {
      type: 'category',
      accessibility: {
        description: 'Organization departments'
      },
      labels: {
        enabled: false
      },
    },
    xAxis: {
        min: Date.UTC(2024, 0, 1),
        max: Date.UTC(2024, 11, 31),
        tickAmount: 12, // Jumlah tick di sumbu X
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
          step: 1,
          style: {
                        fontSize: '12px', // Ukuran font untuk label
                        whiteSpace: 'nowrap' // Menghindari pemotongan label
                    },
        },
      tickPixelInterval: 900,
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

    plotOptions: {
        gantt: {
            dataLabels: {
                enabled: true, // Menyediakan dataLabels
                formatter: function () {
                            return this.series.name + ': ' + this.point.name; // Menampilkan nama seri dan nama tugas
                        },
                style: {
                    color: '#000000', // Warna teks
                    textOutline: 'none' // Menghilangkan outline teks
                }
            }
        }
    },

    series: [
      <?for($i=0; $i<count($arrgant);$i++){?>
        {
          name: '<?=$arrgant[$i]['nama']?>',
          data: [
          <?if($arrgant[$i]['rencana_start']!=null){?>
            {
              name: 'Rencana',
              y: <?=$i?>,
              // start: Date.UTC(tahun, bulan, tanggal),
              start: <?=$arrgant[$i]['rencana_start']?>,
              end: <?=$arrgant[$i]['rencana_end']?>,
              color: 'rgba(<?=$arrwarna[$arrgant[$i]['tipe']]?>, 0.5)'  // Transparansi 50%
            },
          <?}?>

          <?if($arrgant[$i]['realisasi_start']!=null){?>
            {
              name: 'Realisasi',
              y: <?=$i?>,
              // start: Date.UTC(tahun, bulan, tanggal),
              start: <?=$arrgant[$i]['realisasi_start']?>,
              <?
              if($arrgant[$i]['realisasi_end']==''){?>
                end: Date.UTC(<?=date("Y");?>,<?=date("m");?>,<?=date("d");?>),
              <?}
              else{?>
                end:<?=$arrgant[$i]['realisasi_end']?>,
              <?}
              ?>
              color: 'rgba(<?=$arrwarna[$arrgant[$i]['tipe']]?>, 0.3)'  // Transparansi 50%
            },
          <?}?>

          <?if($arrgant[$i]['realisasi_end']!=null){?>
          {
            name: 'selesai',
            start: <?=$arrgant[$i]['realisasi_end']?>,
            y: <?=$i?>,
            milestone: true,
            color: 'rgba(<?=$arrwarna[$arrgant[$i]['tipe']]?>)'  // Transparansi 70%
          }
          <?}?>
          ]
        },
    <?}?>
  ],
  legend: {
    enabled: false
  },
});
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