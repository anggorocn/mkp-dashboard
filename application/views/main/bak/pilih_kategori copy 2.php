<!-- SLICK -->
<!-- <link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css"> -->

<!-- EASYUI -->
<link rel="stylesheet" type="text/css" href="lib/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="lib/easyui/themes/icon.css">
<!-- <link rel="stylesheet" type="text/css" href="lib/easyui/demo/demo.css"> -->
<script type="text/javascript" src="lib/easyui/jquery.min.js"></script>
<script type="text/javascript" src="lib/easyui/jquery.easyui.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="area-step">
            <div class="item active">
                <div class="title">Pilih Kategori</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item">
                <div class="title">Informasi Personal</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item">
                <div class="title">Konfirmasi</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item">
                <div class="title">Bayar</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="info-widget">Widget : Samudra Ancol</div>
                <div class="info-referral">Referral : ANCOLUMUM</div>
                <div class="info-tanggal">
                    <label>Tanggal Kedatangan :</label>
                    <div>
                        <input class="easyui-datebox" label="Start Date:" labelPosition="top" style="width:100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="area-pilih-kategori">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="item tiket-mobil">
                                <div class="inner">
                                    <div class="nama">Tiket Kendaraan Mobil</div>
                                    <div class="harga">
                                        Harga per tiket
                                        <div class="nilai">Rp.30.000</div>
                                    </div>
                                    <div class="easyui-panel" style="padding:30px 60px;">
                                        <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                    onChange: function(value){
                                                        $('#vvmobil').text(value*30000);
                                                    }
                                                ">
                                        <div class="pull-right nilai-sub-total" style="margin:10px 0;">
                                            Rp. <span id="vvmobil"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item tiket-motor">
                                <div class="inner">
                                    <div class="nama">Tiket Kendaraan Motor</div>
                                    <div class="harga">
                                        Harga per tiket
                                        <div class="nilai">Rp.20.000</div>
                                    </div>
                                    <div class="easyui-panel" style="padding:30px 60px;">
                                        <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                    onChange: function(value){
                                                        $('#vvmotor').text(value*20000);
                                                    }
                                                ">
                                        <div class="pull-right nilai-sub-total" style="margin:10px 0;">
                                            Rp. <span id="vvmotor"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item tiket-bus">
                                <div class="inner">
                                    <div class="nama">Tiket Kendaraan Bus</div>
                                    <div class="harga">
                                        Harga per tiket
                                        <div class="nilai">Rp.45.000</div>
                                    </div>
                                    <div class="easyui-panel" style="padding:30px 60px;">
                                        <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                    onChange: function(value){
                                                        $('#vvbus').text(value*45000);
                                                    }
                                                ">
                                        <div class="pull-right nilai-sub-total" style="margin:10px 0;">
                                            Rp. <span id="vvbus"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="item tiket-ancol bg-pink">
                                <div class="inner">
                                    <div class="nama">(LU) Romb. Umum Weekday ODS + SWA + Ancol </div>
                                    <div class="harga">
                                        Harga per tiket
                                        <div class="nilai">Rp.145.000</div>
                                    </div>
                                    <div class="easyui-panel" style="padding:30px 60px;">
                                        <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                    onChange: function(value){
                                                        $('#vvbus').text(value*45000);
                                                    }
                                                ">
                                        <div class="pull-right nilai-sub-total" style="margin:10px 0;">
                                            Rp. <span id="vvbus"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="item tiket-ancol bg-kuning">
                                <div class="inner">
                                    <div class="nama">(LU) Romb. Umum Weekday ODS+Ancol</div>
                                    <div class="harga">
                                        Harga per tiket
                                        <div class="nilai">Rp.85.000</div>
                                    </div>
                                    <div class="easyui-panel" style="padding:30px 60px;">
                                        <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                    onChange: function(value){
                                                        $('#vvbus').text(value*45000);
                                                    }
                                                ">
                                        <div class="pull-right nilai-sub-total" style="margin:10px 0;">
                                            Rp. <span id="vvbus"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            Dengan menekan tombol “Pesan Sekarang” di samping ini,
                            Saya telah membaca & setuju dengan <a href="#">TOC</a> atau aturan yang telah disebutkan. 
                        </div>
                        <div class="col-md-3">
                            <button class="pull-right btn btn-primary">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SLICK -->
<!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>-->
  <!-- <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
        
        $(".vertical").slick({
            dots: false,
            vertical: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: false,
            nextArrow: false
        });
        
        $(".regular").slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: false,
            nextArrow: false
        });
      
    });
</script> -->


