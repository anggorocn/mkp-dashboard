
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
                    {
                        data: "kode",
                        className: "reqKode",
                        render: function(data, type, row){
                            return type == 'display' ?
                                '<input type="checkbox" name="reqCheck[]"> '+data : data;
                        }
                    },
                    // {
                    //     data: null,
                    //     className: "",
                    //     defaultContent: '<input type="checkbox" name="reqCheck[]">'
                    // },
                    // {data: "kode"},
                    {data: "nama"},
                    {data: "level"},
                    {data: "fungsi"},
                ]
            });


            // Add data
            $('#btnAdd').on('click', function (e) 
            {

            });

    });
    
</script>


<div class="row">

    <div class="col-md-12">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Data Jabatan</div>
            </div>

            <div class="col-md-12">

                <div class="area-menu-aksi">
                    <a class="btn btn-primary btn-xs" id="btnAdd"><i class="fa fa-plus" aria-hidden="true"></i> Tambahkan</a>
                </div>

                <table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Level BOD</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
    
</div>

