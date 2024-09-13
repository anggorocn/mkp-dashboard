<?

// if ($this->NIK_SAP == "") {
//     redirect("login");
// }

?>

<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li><a href="app/index/profilling">Profil</a></li>
                <li><a>Detil Profil</a>
                    <ul>
                        <li><a href="app/index/identitas_karyawan">Identitas Karyawan</a></li>
                        <li class="active"><a >SK Karyawan</a></li>
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
                <div class="judul-halaman">SK Pegawai</div>
            </div>
            <div class="col-md-12">

                <form class="form-horizontal" action="/action_page.php">

                    <?
                    if (empty($arrResult["sk_pegawai"])) 
                    {
                    ?>
                    <span class="text-danger"><i class="fa fa-info-circle" aria-hidden="true"></i> Belum ada data...</span>
                    <?
                    }
                    else
                    {
                        foreach ($arrResult["sk_pegawai"] as $key => $row) {
                        ?>
                        <div class="sub-judul-halaman">No SK : <?=$row["no_sk"]?></div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">TMT :</label>
                            <div class="col-sm-10"><?=$row["tmt"]?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Tanggal SK :</label>
                            <div class="col-sm-10"><?=$row["tanggal_sk"]?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pejabat Penetap :</label>
                            <div class="col-sm-10"><?=$row["pejabat_penetap"]?></div>
                        </div>
                        <?
                        }
                    }
                    ?>

                </form>
                
            </div>
        </div>
    </div>
</div>
