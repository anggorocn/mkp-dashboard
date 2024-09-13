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
            <div class="item visited">
                <div class="title">Konfirmasi</div>
                <div class="circle"><span></span></div>
            </div>
            <div class="item active">
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
                <div class="judul-halaman">Order Review</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="area-kontainer">
                            <div class="sub-judul">Event</div>
                            Jakarta Bird Land Ancol.
                            <hr>
                            <div class="sub-judul">Ticket</div>
                            <table>
                                <tr>
                                    <td>Tiket Kendaraan Mobil</td>
                                    <td>1x</td>
                                    <td>Rp. 30.000</td>
                                </tr>
                                <tr>
                                    <td>(LU) Romb. Umum Weekday JBL+Ancol</td>
                                    <td>25x</td>
                                    <td>Rp. 1.625.000</td>
                                </tr>
                            </table>
                            
                            <div class="sub-judul">Customer Data</div>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Test</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>test@email.com</td>
                                </tr>
                                <tr>
                                    <td>No. Telpon</td>
                                    <td>:</td>
                                    <td>+62123456789</td>
                                </tr>
                                <tr>
                                    <td>Posisi</td>
                                    <td>:</td>
                                    <td>test</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kedatangan</td>
                                    <td>:</td>
                                    <td>23 Jan 2024</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td>DKI Jakarta</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="judul-halaman">Payment Method</div>
                        <div class="area-kontainer">
                            <img src="images/logo-bca.png" height="26">
                            Virtual Account BCA
                            <div class="alert alert-info" style="margin-top: 10px; margin-bottom: 0px;">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Pastikan data diri yang Anda isi sudah benar. <br>
                                Pembayaran dapat dilakukan dengan menggunakan mBCA, KlikBCA dan ATM BCA.
                            </div>
                            
                        </div>

                        <div class="judul-halaman">Payment Detail</div>
                        <div class="area-kontainer">
                            <table>
                                <tr>
                                    <td>Total Ticket Price</td>
                                    <td><strong>Rp. 1.655.000</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        Biaya Lainnya
                                        <div class="keterangan">Tidak dapat dikembalikan</div>
                                    </td>
                                    <td><strong>Rp. 5.000</strong></td>
                                </tr>
                                <tr>
                                    <td>Total Keseluruhan</td>
                                    <td><strong>Rp. 1.660.000</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="area-button">
                    <button class="btn btn-primary pull-right">Bayar Sekarang</button>
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
