<!-- SLICK -->
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">

<!--<div class="row row-atas" style="display: flex; justify-content: center; align-items: flex-end; ">-->
<div class="row">
    <div class="col-md-2">
        <div class="area-menu-kiri">
            <ul>
                <li><a href="app/index/profilling">Profil</a></li>
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
                <li class="active"><a>Position</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row area-konten">
            <div class="col-md-12">
                <div class="judul-halaman">Position</div>
            </div>
            
            <div class="col-md-12">
                <div class="area-posisi">
                    
                    <div class="item">
                        <div class="foto"><img src="images/img-atasan.png"></div>
                        <div class="keterangan">
                            <div class="nama">Budi Waluyo S.H</div>
                            <div class="nip">00456788</div>
                            <div class="jabatan">(Direktur SDM dan Layanan Korporasi)</div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="penyambung">
                            <img src="images/arrow-atas-bawah.png">
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="foto"><img src="images/foto.png"></div>
                        <div class="keterangan">
                            <div class="nama">M. Indra Utama (Anda)</div>
                            <div class="nip">3023255</div>
                            <div class="jabatan">(Kepala Sub Div Prog Peny & Peng TI)</div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="penyambung">
                            <img src="images/arrow-atas-bawah.png">
                        </div>
                    </div>
                    
                    <div class="area-bawahan">
                        <section class="regular slider">
                            <div>
                                <div class="item">
                                    <div class="foto"><img src="images/foto-2.png"></div>
                                    <div class="keterangan">
                                        <div class="nama">M. Indra Utama (Anda)</div>
                                        <div class="nip">3023255</div>
                                        <div class="jabatan">(Kepala Sub Div Prog Peny & Peng TI)</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="item">
                                    <div class="foto"><img src="images/foto-3.png"></div>
                                    <div class="keterangan">
                                        <div class="nama">M. Indra Utama (Anda)</div>
                                        <div class="nip">3023255</div>
                                        <div class="jabatan">(Kepala Sub Div Prog Peny & Peng TI)</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="item">
                                    <div class="foto"><img src="images/foto-4.png"></div>
                                    <div class="keterangan">
                                        <div class="nama">M. Indra Utama (Anda)</div>
                                        <div class="nip">3023255</div>
                                        <div class="jabatan">(Kepala Sub Div Prog Peny & Peng TI)</div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        
                    </div>
                    <div class="info">- List bawahan Anda -</div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- SLICK -->
<!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>-->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
        
        $(".regular").slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: false,
            nextArrow: false
        });
      
    });
</script>





