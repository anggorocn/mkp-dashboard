
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
    var oTable;
    
    $(document).ready(function() {
          
        oTable = $('#example').dataTable({
            "oSearch": {"sSearch": sessionStorage.getItem("<?=$pg?>_sSearch") || ""},
            bJQueryUI: true,
            "iDisplayLength": 25,
            /* UNTUK MENGHIDE KOLOM ID */
            "aoColumns": [
               null,
                null,
                null,
                null,
                null,
               
                
               
                null
            ],
            "bSort": true,
            "bProcessing": true,
            "bServerSide": true,
            "responsive": false,
            "bScrollInfinite": true,
            "sAjaxSource": "web/Jabatan_json/json?&pg=<?=$pg?>",
            // columnDefs: [{
            //     className: 'never',
            //     targets: [0]
            // }],
           
            "fnServerParams": function ( aoData ) {
               
            },
            "sPaginationType": "full_numbers"
           


        });
        
             /* Click event handler */

        /* RIGHT CLICK EVENT */
        var anSelectedData = '';
        var anSelectedId = '';
        var anSelectedDownload = '';
        var anSelectedPosition = '';
        var anIndex = '';

        function fnGetSelected(oTableLocal) {
            var aReturn = new Array();
            var aTrs = oTableLocal.fnGetNodes();
            for (var i = 0; i < aTrs.length; i++) {
                if ($(aTrs[i]).hasClass('row_selected')) {
                    aReturn.push(aTrs[i]);
                    anSelectedPosition = i;
                }
            }
            return aReturn;
        }

        $("#example tbody").click(function(event) {
            $(oTable.fnSettings().aoData).each(function() {
                $(this.nTr).removeClass('row_selected');
            });
            $(event.target.parentNode).addClass('row_selected');

            var anSelected = fnGetSelected(oTable);
            anSelectedData = String(oTable.fnGetData(anSelected[0]));
            var element = anSelectedData.split(',');
            anSelectedId = element[0];
            anIndex = anSelected[0];
        });

       
        $('#btnAdd').on('click', function() {
            document.location.href = "app/index/kelola_jabatan_add";

        });

       

        $('#btnPrint').on('click', function() {
              
         
        });

        $('#btnEdit').on('click', function() {
            if (anSelectedData == "")
                return false;
          

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

            <div class="form-group">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data</button>
            </div>

            <div class="col-md-12">
                <table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Level BOD</th>
                            <th>Fungsi</th>
                          <th>  </th>
                            <th> </th>
                        </tr>
                    </thead>

                </table>
            </div>


            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Launch demo modal
            </button> -->
          

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