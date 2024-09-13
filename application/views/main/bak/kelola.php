
<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            
            <ul>
                <li class="active"><a>Setup Master & Saldo Awal</a></li>
                <li><a>Employee History</a></li>
                <li><a>Another Employee History</a></li>
                <li><a>Master Data</a>
                    <ul>
                        <li><a href="app/index/kelola_jabatan">Jabatan</a></li>
                        <li><a href="app/index/kelola_fungsi">Fungsi</a></li>
                        <li><a href="app/index/kelola_sub_unit">Sub Unit</a></li>
                        <li><a href="app/index/kelola_unit">Unit</a></li>
                        <li><a href="app/index/kelola_komoditi">Komoditi</a></li>
                        <li><a href="app/index/kelola_sub_area">Personel Sub Area</a></li>
                        <li><a href="app/index/kelola_kpi">Katalog KP</a></li>
                    </ul>
                </li>
                <li><a>Manajemen Data</a>
                    <ul>
                        <li><a href="app/index/kelola_map_jabatan_subunit">Mapping Jabatan - Sub Unit</a></li>
                        <li><a href="app/index/kelola_map_kpi_jabatan">Mapping KPI - Jabatan</a></li>
                        <li><a href="app/index/kelola_status_bawahan">Satatus Bawahan</a></li>
                        <li><a href="app/index/kelola_jabatan_karyawan">Jabatan Karyawan</a></li>
                        <li><a href="app/index/kelola_buka_tutup">Buka / Tutup Akses</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Kelola</div>
            </div>

            <button href="#form-revisi" class="fancybox fancybox.inline btn btn-danger btn-merah">
                <i class="fa fa-times" aria-hidden="true"></i> Tolak
            </button>

        </div>
    </div>
    
</div>


<div id="form-revisi" style="display: none;">
    <div class="form-group">
        <label class="control-label col-sm-3" for="narasi">&nbsp;</label>
        <div class="col-sm-9">
              &nbsp;
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="narasi">Alasan Tolak :</label>
        <div class="col-sm-9">
            <textarea name="reqAlasan" id="reqAlasan" class="form-control"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-sm-3" for="narasi">&nbsp;</label>
        <div class="col-sm-9">
            <input type="checkbox" id="carryover" name="carryover">
            <label for="vehicle1"> Carry over ke periode berikutnya.</label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="narasi">&nbsp;</label>
        <div class="col-sm-9">
            <br>
            <button id="btn-revisi" onclick="tolak_permohonan()" class="btn btn-danger btn-merah">Tolak</button>
        </div>
    </div>
</div>


<!-- FANCYBOX PDF BILLING -->
<script type="text/javascript" src="lib/fancybox-2.1.7/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="lib/fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="lib/fancybox-2.1.7/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
    $(document).ready(function() {
        /* Simple image gallery. Uses default settings */
        $('.fancybox').fancybox();
    });
</script>

<style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }
    .fancybox-skin {
        *height: calc(100vh - 200px) !important;
        height: 260px !important;
    }
    .fancybox-outer {
        height: 100% !important;
    }
</style>


