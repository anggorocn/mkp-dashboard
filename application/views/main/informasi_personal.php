<!-- EASYUI -->
<link rel="stylesheet" type="text/css" href="libraries/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="libraries/easyui/themes/icon.css">
<!-- <link rel="stylesheet" type="text/css" href="libraries/easyui/demo/demo.css"> -->
<script type="text/javascript" src="libraries/easyui/jquery.min.js"></script>
<script type="text/javascript" src="libraries/easyui/jquery.easyui.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="area-step">
            <div class="item visited">
                <div class="title">Pilih Kategori</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item active">
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
        <div class="area-count-down">Sisa waktu memesan untuk tiket : <span id="time">05:00</span></div>
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
                <div class="judul-halaman">Informasi Personal</div>
                <div class="area-form">
                    <div class="row">
                        <div class="col-md-12">

                            <form class="" action="/action_page.php">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="" for="">Nama Pembeli:</label>
                                        <div class="">
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <label class="" for="">Nama Rombongan:</label>
                                        <div class="">
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>    
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="" for="email">Email Aktif:</label>
                                        <div class="">
                                          <input type="email" class="form-control" id="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="" for="">No. Telpon (WA aktif):</label>
                                        <div class="">
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="" for="">Domisili/Wilayah (Kabupaten/Kota - contoh : Bekasi):</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="">Kota:</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="">Saya setuju untuk menerima notifikasi terkait pemesanan tiket berikut melalui nomor Whatsapp saya:</label>
                                    <div class="">
                                        <div class="radio">
                                            <label class="radio-inline"><input type="radio" name="optradio" checked>Yes</label>
                                            <label class="radio-inline"><input type="radio" name="optradio">No</label>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
                <div class="area-button">
                    <button class="btn btn-danger">Kembali</button>
                    <button class="btn btn-primary pull-right">Lanjut</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * 5,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>


