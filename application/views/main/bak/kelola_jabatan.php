
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
                "processing": false,
                "ordering": true,
                "searching": true,
                "ajax":"app/ambil_data_jabatan",
                "columns":[
                    {data: "KODE"},
                    {data: "NAMA"},
                    {data: "LEVEL_BOD_MINUS"},
                    {data: "BIDANG"},
                    {
                        data: null,
                        className: "",
                        defaultContent: '<button class="aksi-edit"><i class="fa fa-pencil"></i></button> <button class="aksi-delete"><i class="fa fa-trash"></i></button>'
                    },
                ]
            });

            // Edit a record
            $('#example tbody').on( 'click', '.aksi-edit', function () 
            {
                var data = oTable.api().row( $(this).parents('tr') ).data();
                console.log(data);
                // top.openAdd("app/index/kelola");
                $('#exampleModalCenter').modal('show');
                document.getElementById("kode-jabatan").value = data.KODE;
                document.getElementById("nama-jabatan").value = data.NAMA;
                document.getElementById("level-bod").value = data.LEVEL_BOD_MINUS;
                document.getElementById("fungsi-jabatan").value = data.BIDANG;
            } );

            // Delete a record
            $('#example').on('click', '.aksi-delete', function (e) 
            {
                var r = confirm("Hapus data terpilih ?");
                if (r == true) {
                  txt = "You pressed OK!";
                } else {
                  txt = "You pressed Cancel!";
                } 
            });

            // Add data
            $('#btnAdd').on('click', function (e) 
            {
                $('#exampleModalCenter').modal('show');
                $("#kode-jabatan").val('');
                $("#nama-jabatan").val('');
                $("#level-bod").val('');
                $("#fungsi-jabatan").val('');
            });

            // Add data
            $('#btnImport').on('click', function (e) 
            {
                $('#importData').modal('show');
            });

            $('#btnExport').on('click', function(){
                newWindow = window.open('app/index/kelola_jabatan_cetak.php?', 'Cetak');
                newWindow.focus();
            })

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
                        <li class="active"><a href="app/index/kelola_jabatan">Jabatan</a></li>
                        <li><a href="app/index/kelola_fungsi">Fungsi</a></li>
                        <li><a href="app/index/kelola_sub_unit">Sub Unit</a></li>
                        <li><a href="app/index/kelola_unit">Unit</a></li>
                        <li><a href="app/index/kelola_komoditi">Komoditi</a></li>
                        <li><a href="app/index/kelola_sub_area">Personel Sub Area</a></li>
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
                <div class="judul-halaman">Kelola Jabatan</div>
            </div>

            <div class="col-md-12">

                <div class="area-menu-aksi">
                    <a class="btn btn-primary btn-xs" id="btnAdd"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
                    <!-- <a class="btn btn-primary btn-xs" id="btnCetak"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a> -->
                    <a class="btn btn-primary btn-xs" id="btnExport"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</a>
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#importData"><i class="fa fa-file" aria-hidden="true"></i> Import</a>
                </div>

                <table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Level BOD</th>
                            <th>Fungsi</th>
                            <th width="80"></th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
    
</div>



<!-- Modal Edit -->
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
            <label for="kode-jabatan" class="col-label">Kode :</label>
            <input type="text" class="form-control" id="kode-jabatan" name="kode-jabatan">
          </div>
          
          <div class="form-group">
            <label for="nama-jabatan" class="col-label">Nama Jabatan :</label>
            <textarea class="form-control" id="nama-jabatan"></textarea>
          </div>
          
          <div class="form-group">
            <label class="control-label" for="level-bod">Level BOD :</label>
            <select class="form-control" id="level-bod">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option selected>5</option>
                <option>6</option>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="fungsi-jabatan">Fungsi :</label>
            <select class="form-control" id="fungsi-jabatan">
                <option>Keuangan</option>
                <option>Quality Assurance</option>
                <option>Tanaman</option>
            </select>
          </div>
          <div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>



<!-- Modal Import -->
<div class="modal fade" id="importData" tabindex="-2" role="dialog" aria-labelledby="importDataExcel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="importDataExcel">Import Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.1);">
        <div class="form-group">
            <label class="control-label col-sm-4">Template :</label>
            <a href="uploads/import_jabatan_excel.xlsx">Download</a>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Lampiran :</label>
            <input id="reqDokumen" type="file">
        </div>

        <div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>