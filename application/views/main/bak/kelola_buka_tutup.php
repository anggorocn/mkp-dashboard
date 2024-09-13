
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
                "ajax":"tes_json/json_buka_tutup",
                "columns":[
                    {data: "unit"},
                    {data: "status"},
                    {data: "tgl_mulai"},
                    {data: "tgl_selesai"},
                    {
                        data: null,
                        className: "",
                        defaultContent: '<button class="aksi-edit"><i class="fa fa-pencil"></i></button>'
                    },
                ]
            });


            // Delete a record
            $('#example').on('click', '.aksi-delete', function (e) {
                alert("Delete");
            });

            $('#example tbody').on( 'click', '.aksi-edit', function () {
                var data = oTable.api().row( $(this).parents('tr') ).data();
                console.log(data);
                // top.openAdd("app/index/kelola");
                $('#exampleModalCenter').modal('show');
                document.getElementById("kode-jabatan").value = data.kode;
                document.getElementById("nama-jabatan").value = data.nama;
                document.getElementById("level-bod").value = data.level;
                document.getElementById("fungsi-jabatan").value = data.fungsi;
            } );

            // $('#myModal').on('shown.bs.modal', function () {
            //   $('#recipient-name').trigger('focus')
            // })

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
                    <ul id="collapse1" class="collapse">
                        <li><a href="app/index/kelola_jabatan">Jabatan</a></li>
                        <li><a href="app/index/kelola_fungsi">Fungsi</a></li>
                        <li><a href="app/index/kelola_sub_unit">Sub Unit</a></li>
                        <li><a href="app/index/kelola_unit">Unit</a></li>
                        <li><a href="app/index/kelola_komoditi">Komoditi</a></li>
                        <li><a href="app/index/kelola_sub_area">Personel Sub Area</a></li>
                        <li><a href="app/index/kelola_kpi">Katalog KP</a></li>
                    </ul>
                </li>
                <li><a data-toggle="collapse" data-target="#collapse2">Manajemen Data</a>
                    <ul id="collapse2" class="collapse in">
                        <li><a href="app/index/kelola_map_jabatan_subunit">Mapping Jabatan - Sub Unit</a></li>
                        <li><a href="app/index/kelola_map_kpi_jabatan">Mapping KPI - Jabatan</a></li>
                        <li><a href="app/index/kelola_status_bawahan">Satatus Bawahan</a></li>
                        <li><a href="app/index/kelola_jabatan_karyawan">Jabatan Karyawan</a></li>
                        <li class="active"><a href="app/index/kelola_buka_tutup">Buka / Tutup Akses</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Kelola Buka / Tutup Akses</div>
            </div>

            <div class="col-md-12">

                <!-- <div class="area-menu-aksi">
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-excel-o" aria-hidden="true"></i> Export</a>
                </div> -->

                <table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            
                            <th>Sub Unit</th>
                            <th>Status Akses</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th width="80"></th>
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
        <h4 class="modal-title" id="exampleModalLongTitle">Ubah Data Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.1);">
          <div class="form-group">
            <label for="kode-jabatan" class="col-form-label">Kode :</label>
            <input type="text" class="form-control" id="kode-jabatan" name="kode-jabatan">
          </div>
          <div class="form-group">
            <label for="nama-jabatan" class="col-form-label">Nama Jabatan :</label>
            <textarea class="form-control" id="nama-jabatan"></textarea>
          </div>
          <div class="form-group">
            <label for="level-bod" class="col-form-label">Level :</label>
            <input type="text" class="form-control" id="level-bod" name="level-bod">
          </div>
          <div class="form-group">
            <label for="fungsi-jabatan" class="col-form-label">Fungsi :</label>
            <input type="text" class="form-control" id="fungsi-jabatan" name="fungsi-jabatan">
          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>