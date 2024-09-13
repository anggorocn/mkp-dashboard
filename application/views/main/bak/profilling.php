<?
// var_dump($arrResult); exit;
// echo $this->NIK_SAP;exit;

// if ($this->NIK_SAP == "") {
//     redirect("login");
// }

?>
<!--<div class="row row-atas" style="display: flex; justify-content: center; align-items: flex-end; ">-->
<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li class="active"><a>Profil</a></li>
                <li><a>Detil Profil</a>
                    <ul>
                        <li><a href="app/index/identitas_karyawan">Identitas Karyawan</a></li>
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
                <div class="judul-halaman">Profil</div>
            </div>
            
            <div class="col-md-4">
                <div class="area-profil">
                    <div class="foto">
                        <img src="images/foto.png">
                    </div>
                    <div class="keterangan">
                        <div class="nama"><?=$arrResult["nama"]?></div>
                        NIK. <?=$arrResult["nik_sap"]?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="area-skor-cli" onClick="location.href='app/index/skor_cli'">
                    <div class="title">Skor CLI</div>
                    <div class="nilai">0</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="area-skor-cli" onClick="location.href='app/index/skor_smkbk'">
                    <div class="title">Skor SMKBK</div>
                    <div class="nilai">98</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
                
                
            <div class="col-md-6">
                <div class="form-group">
                    
                    <label class="col-md-12">Unit Kerja</label>
                    <?=$arrResult["personnel_area"]?>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-12">Tempat dan Tanggal Lahir</label>
                    <?=$arrResult["tempat_lahir"]?>, <?=$arrResult["tgl_lahir"]?>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-12">Alamat</label>
                    <?=$arrResult["alamat"]?>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-12">No. HP</label>
                    <?=$arrResult["hp"]?>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-12">Email</label>
                    <?=$arrResult["email"]?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well">
                    <div class="judul">Ganti Password</div>
                    <form action="/action_page.php">
    <!--
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
    -->
                        <div class="form-group">
                            <label for="pwd">Masukkan Password Lama:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Masukkan Password Baru:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Konfirmasi Password Baru:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
    <!--
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
    -->
                        <button type="submit" class="btn btn-danger">Ubah Password</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    
</div>




