
<link rel="stylesheet" type="text/css" href="lib/DataTables-1.10.7/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="lib/DataTables-1.10.7/examples/resources/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="lib/DataTables-1.10.7/examples/resources/demo.css">

<style type="text/css" class="init">

</style>

<script type="text/javascript" language="javascript" src="lib/DataTables-1.10.7/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="lib/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="lib/DataTables-1.10.7/examples/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="lib/DataTables-1.10.7/examples/resources/demo.js"></script>

<script type="text/javascript" language="javascript" class="init">
    
    $(document).ready(function() {

        var oTable = $('#example').dataTable({
                "processing": true,
                "ordering": true,
                "searching": true,
                "ajax":"tes_json/json_sub_area",
                "columns":[
                    {data: "kode"},
                    {data: "nama"},
                    {data: "perusahaan"},
                ]
            });

    });
    
</script>


<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri area-over-flow">
            <ul>
                <li class="menu"><a>Setup Master & Saldo Awal</a></li>
                <li><a>Employee History</a></li>
                <li><a>Another Employee History</a></li>
                <li class="menu"><a data-toggle="collapse" data-target="#collapse1">Master Data</a>
                    <ul id="collapse1" class="collapse in">
                        <li><a href="app/index/kelola_jabatan">Jabatan</a></li>
                        <li><a href="app/index/kelola_fungsi">Fungsi</a></li>
                        <li><a href="app/index/kelola_sub_unit">Sub Unit</a></li>
                        <li><a href="app/index/kelola_unit">Unit</a></li>
                        <li><a href="app/index/kelola_komoditi">Komoditi</a></li>
                        <li class="active"><a href="app/index/kelola_sub_area">Personel Sub Area</a></li>
                        <li><a href="app/index/kelola_kpi">Katalog KP</a></li>
                    </ul>
                </li>
                <li><a data-toggle="collapse" data-target="#collapse2">Manajemen Data</a>
                    <ul id="collapse2" class="collapse">
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
                <div class="judul-halaman">Kelola Personel Sub Area</div>
            </div>

            <div class="col-md-12">

                <table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
    
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Ubah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.1);">
          <div class="form-group">
            <label for="kode-sub-area" class="col-form-label">Kode :</label>
            <input type="text" class="form-control" id="kode-sub-area" name="kode-sub-area">
          </div>
          <div class="form-group">
            <label for="nama-sub-area" class="col-form-label">Nama Sub Area :</label>
            <textarea class="form-control" id="nama-sub-area"></textarea>
          </div>
          <div class="form-group">
            <label for="perusahaan" class="col-form-label">Perusahaan :</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan">
          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>