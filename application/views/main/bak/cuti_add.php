<!-- DATEPICKER -->
<script src="lib/gijgo/gijgo.min.js" type="text/javascript"></script>
<link href="lib/gijgo/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li class="active"><a href="app/index/cuti">Riwayat Cuti</a></li>
                <li><a href="app/index/cuti_approval">Approval Cuti</a></li>
            </ul>
            
            <table>
                <tr>
                    <td><strong>Informasi Saldo Cuti</strong></td>
                </tr>
                
                <tr>
                    <td>Cuti Panjang
                <span class="text-brown">0 hari</span></td>
                </tr>
                
                <tr>
                    <td>Cuti Tahunan
                <span class="text-brown">0 hari</span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Add Cuti</div>
            </div>
            
            <div class="col-md-12">
                
                <form class="form-horizontal" action="/action_page.php">
                    
                    <div class="sub-judul-halaman">Permohonan Cuti</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Permohonan:</label>
                        <div class="col-sm-10">
                            <input id="datepicker" width="270" />
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Alasan Cuti:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Awal:</label>
                        <div class="col-sm-10">
                            <input id="datepicker-awal" width="270" />
                            <script>
                                $('#datepicker-awal').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Akhir:</label>
                        <div class="col-sm-10">
                            <input id="datepicker-akhir" width="270" />
                            <script>
                                $('#datepicker-akhir').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Alamat Cuti:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control">Jl. Semarang No. 01, Jakarta Utara</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Telepon:</label>
                        <div class="col-sm-4">
                            <input class="form-control" value="08163621313">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">&nbsp;</label>
                        <div class="col-sm-10">
                            <a class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</a>
                            <a class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</a>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
    
</div>


