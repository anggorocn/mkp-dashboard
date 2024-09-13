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
                "ajax":"tes_json/json",
                "columns":[
                    {data: "kode"},
                    {data: "nama"},
                    {data: "level"},
                    {data: "fungsi"},
                    {
                        data: null,
                        className: "aksi-edit",
                        defaultContent: '<i class="fa fa-pencil"/>'
                    },
                    {
                        data: null,
                        className: "aksi-delete",
                        defaultContent: '<i class="fa fa-trash"/>'
                    }
                ]
            });


            // Delete a record
            $('#example').on('click', 'td.aksi-delete', function (e) {
                alert("Delete");
            });

            $('#example tbody').on( 'click', 'td.aksi-edit', function () {
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

//$(document).ready(function() {
//$('#example').dataTable();
//} );

</script>

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li><a>KSK</a>
                    <ul>
                        <li><a href="app/index/sk_karyawan">Pengaturan Jabatan</a></li>
                        <li><a href="app/index/sk_karyawan">Pengaturan Sasaran</a></li>
                        <li><a href="app/index/penempatan">Monitoring Sasaran</a></li>
                    </ul>
                </li>
                <li><a>Penilaian</a>
                    <ul>
                        <li><a href="app/index/aps_pengisian_realisasi">Pengisian Realisasi</a></li>
                        <li><a href="app/index/sk_karyawan">RBK</a></li>
                        <li><a href="app/index/penempatan">ERP</a></li>
                        <li class="active"><a>Contoh Form</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Contoh Form Tambah Data KPI</div>
            </div>
            
            <div class="col-md-12">
                <form class="form-horizontal" action="/action_page.php">
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Test Input:</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Isikan data">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nama Jabatan:</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option>Krani Akuntansi</option>
                                <option>Test</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nama KPI:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Definisi KPI:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Satuan:</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option>Index</option>
                                <option>Jumlah</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Formula:</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option>SUM</option>
                                <option>AVERAGE</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Frekuensi:</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option>Triwulan</option>
                                <option>Semester</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Skala Data:</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option>Kebun/Distrik/Pabrik</option>
                                <option>Test</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Polaritas:</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option>Maximize (MAX)</option>
                                <option>Test</option>
                            </select>
                        </div>
                    </div>
                                        
                    <div class="sub-judul-halaman">Sub Judul Halaman</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Tanggal:</label>
                        <div class="col-sm-4">
                            <div id="filterDate2">
                              <!-- Datepicker as text field -->         
                              <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input  type="date" class="form-control">
                                    <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Lampiran:</label>
                        <div class="col-sm-4">
                            <input class="" type="file">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Checkbox:</label>
                        <div class="col-sm-4">
                            <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                            <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                            <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Radio Button:</label>
                        <div class="col-sm-4">
                            <label class="radio-inline"><input type="radio" name="optradio" checked>Option 1</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Option 2</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Option 3</label> 
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form> 
                
            </div>
            
        </div>
    </div>
    
</div>

<script>
    $('.input-group.date').datepicker({format: "dd.mm.yyyy"}); 
</script>


