<?

if ($this->NIK_SAP == "") {
    redirect("login");
}

?>

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li><a href="app/index/profilling">Profil</a></li>
                <li><a>Detil Profil</a>
                    <ul>
                        <li class="active"><a>Identitas Karyawan</a></li>
                        <li><a href="app/index/sk_karyawan">SK Karyawan</a></li>
                        <li><a href="app/index/penempatan">Penempatan</a></li>
                        <li><a href="app/index/jabatan">Jabatan</a></li>
                        <li><a href="app/index/golongan">Golongan</a></li>
                        <li><a href="app/index/pendidikan">Pendidikan</a></li>
                        <li><a href="app/index/keluarga">Keluarga</a></li>
                        <li><a href="app/index/perubahan_alamat">Perubahan Alamat</a></li>
                        <li><a href="app/index/sertifikasi">Sertifikasi</a></li>
                        <li><a href="app/index/pelatihan">Pelatihan</a></li>
                        <li><a href="app/index/pengalaman_kerja">Pengalaman Kerja</a></li>
                        <li><a href="app/index/penghargaan">Penghargaan</a></li>
                        <li><a href="app/index/hukuman">Hukuman</a></li>
                    </ul>
                </li>
                <li><a href="app/index/position">Position</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Identitas Karyawan</div>
            </div>
            <div class="col-md-12">
                
                <form class="form-horizontal" action="/action_page.php">
                    

                    <div class="sub-judul-halaman">Identitas Pegawai</div>      <!-- IDENTITAS PEGAWAI -->

                    <div class="form-group">
                        <label class="control-label col-sm-2">NIK SAP :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["nik_sap"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">NIK Internal :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["nik_internal"]?>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-2">Jabatan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["jabatan"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Status Pegawai :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["status_pegawai"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Jenis Kelamin :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["jenis_kelamin"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Umur :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["umur"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Bank :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["bank"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">No Rekening :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_pegawai"]["no_rekening"]?>
                        </div>
                    </div>

                    
                    <div class="sub-judul-halaman">Identitas Lain</div>         <!-- IDENTITAS LAIN -->
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Nama :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["nama"]?>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tempat Lahir :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["tempat_lahir"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Tgl Lahir :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["tgl_lahir"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Alamat :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["alamat"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Telepon :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["telp"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Email :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["email"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Tinggi Badan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["tinggi_badan"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Berat Badan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["berat_badan"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Agama :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["agama"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Golongan Darah :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["gol_darah"]?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Hobby :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["identitas_lain"]["hobby"]?>
                        </div>
                    </div>
                    
                    
                    <div class="sub-judul-halaman">Data NPWP</div>          <!-- IDENTITAS NPWP -->

                    <div class="form-group">
                        <label class="control-label col-sm-2">Tgl Daftar NPWP :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["npwp"]["tgl_daftar_npwp"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">NPWP :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["npwp"]["no_npwp"]?>
                        </div>
                    </div>
                    
                    
                    <div class="sub-judul-halaman">Data KK dan KTP</div>          <!-- IDENTITAS KK KTP -->

                    <div class="form-group">
                        <label class="control-label col-sm-2">No KK :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["kk_ktp"]["no_kk"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">No. KTP :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["kk_ktp"]["no_ktp"]?>
                        </div>
                    </div>
                    
                    
                    <div class="sub-judul-halaman">Data Kesehatan</div>          <!-- IDENTITAS KESEHATAN -->

                    <div class="form-group">
                        <label class="control-label col-sm-2">No BPJS Ketenagakerjaan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["bpjs"]["no_bpjs_tenaga_kerja"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal BPJS Ketenagakerjaan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["bpjs"]["tgl_bpjs_tenaga_kerja"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">No BPJS Kesehatan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["bpjs"]["no_bpjs_kesehatan"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal BPJS Kesehatan :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["bpjs"]["tgl_bpjs_kesehatan"]?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2">Faskes BPJS :</label>
                        <div class="col-sm-10">
                            <?=$arrResult["bpjs"]["faskes_bpjs"]?>
                        </div>
                    </div>
   
                </form> 
            </div>
        </div>
    </div>
    
</div>




