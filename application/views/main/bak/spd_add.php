<!-- DATEPICKER -->
<script src="lib/gijgo/gijgo.min.js" type="text/javascript"></script>
<link href="lib/gijgo/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li class="active"><a>Riwayat Perjalanan Dinas</a></li>
                <li><a href="app/index/spd_approval">Approval Perjalanan Dinas</a></li>
            </ul>
            <a onclick="location.href='app/index/spd_add'" class="btn btn-warning pull-right">Ajukan Permohonan SPD</a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Add SPD</div>
            </div>
            
            <div class="col-md-12">
                
                <form class="form-horizontal" action="/action_page.php">
                    
                    <div class="sub-judul-halaman">Permohonan SPD</div>
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
                        <label class="control-label col-sm-2">Tujuan Dinas:</label>
                        <div class="col-sm-4">
                            <input class="form-control" value="Semarang">
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Keperluan Dinas:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control">Menghadiri Pembukaan MUBES VI SPBUN PTPN IX</textarea>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-2">Berangkat Tanggal:</label>
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
                        <label class="control-label col-sm-2">Kembali Tanggal:</label>
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
                        <label class="control-label col-sm-2">Fasilitas Transport:</label>
                        <div class="col-sm-5">
                            <input class="form-control" value="Pesawat Udara">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Rombongan</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Nama:</label>
                        <div class="col-sm-4">
                            <table>
                                <tr>
                                    <td><input class="form-control" value="Chairunnisa Lubis"></td>
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" value="Ibnu Faisal"></td>
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" value="Widya Udianti"></td>
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Approval</label>
                        <div class="col-sm-5">
                            <table>
                                <tr>
                                    <td><input class="form-control" value="Approval 1"></td>
                                    <td><i class="fa fa-user" aria-hidden="true"></i></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Dokumen Pendukung</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
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


