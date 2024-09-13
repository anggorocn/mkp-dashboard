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
            <div class="item visited">
                <div class="title">Informasi Personal</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item active">
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
                <div class="judul-halaman">Pilih Metode Pembayaran</div>
                <div class="area-pilih-metode-pembayaran">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optradio" checked>
                                            <img src="images/logo-visa.png">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optradio">
                                            <img src="images/logo-atm.png">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optradio">
                                            <img src="images/logo-livin.png">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optradio">
                                            <img src="images/logo-bca.png">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optradio">
                                            <img src="images/logo-gopay.png">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-info">
                                <div class="title">Informasi Pembayaran</div>
                                Virtual Account BCA
                                Pembayaran dapat dilakukan melalui 
                                KlikBCA Individu, ATM BCA, BCA Mobile or 
                                myBCA
                            </div>
                        </div>
                    </div>
                </div>

                <div class="judul-halaman">Konfirmasi</div>
                <div class="area-kontainer tabel">
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ringkasan</th>
                                        <th>Harga per Tiket</th>
                                        <th>Kuantitas</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiket Kendaraan Mobil</td>
                                        <td>Rp 30.000</td>
                                        <td>3</td>
                                        <td>Rp 90.000</td>
                                    </tr>
                                    <tr>
                                        <td>Tiket Kendaraan Mobil</td>
                                        <td>Rp 30.000</td>
                                        <td>3</td>
                                        <td>Rp 90.000</td>
                                    </tr>
                                    <tr>
                                        <td>Tiket Kendaraan Mobil</td>
                                        <td>Rp 30.000</td>
                                        <td>3</td>
                                        <td>Rp 90.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total Keseluruhan</th>
                                        <th>28</th>
                                        <th>Rp 1.715.000</th>
                                    </tr>
                                </tfoot>
                            </table>
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
