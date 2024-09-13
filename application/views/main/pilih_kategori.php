<!-- EASYUI -->
<link rel="stylesheet" type="text/css" href="libraries/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="libraries/easyui/themes/icon.css">
<!-- <link rel="stylesheet" type="text/css" href="libraries/easyui/demo/demo.css"> -->
<script type="text/javascript" src="libraries/easyui/jquery.min.js"></script>
<script type="text/javascript" src="libraries/easyui/jquery.easyui.min.js"></script>

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
                <div class="judul-halaman">Pilih Kategori</div>
                <div class="area-kontainer tabel">
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Jenis Kategori</th>
                                        <th class="harga">Harga per Tiket</th>
                                        <th class="kuantitas">Kuantitas</th>
                                        <th class="jumlah">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiket Kendaraan Mobil</td>
                                        <td>Rp.30.000</td>
                                        <td>
                                            <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                onChange: function(value){
                                                    $('#vvmobil').text(value*30000);
                                                }
                                            ">
                                        </td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vvmobil">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tiket Kendaraan Motor</td>
                                        <td>Rp.20.000</td>
                                        <td>
                                            <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                onChange: function(value){
                                                    $('#vvmotor').text(value*20000);
                                                }
                                            ">
                                        </td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vvmotor">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tiket Kendaraan Bus</td>
                                        <td>Rp.45.000</td>
                                        <td>
                                            <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                onChange: function(value){
                                                    $('#vvbus').text(value*45000);
                                                }
                                            ">
                                        </td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vvbus">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(LU) Romb. Umum Weekday JBL+Ancol</td>
                                        <td>Rp.65.000</td>
                                        <td><div class="text-sold-out">Sold Out</div></td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vv">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(LU) Romb. Umum Weekend JBL+Ancol</td>
                                        <td>Rp.85.000</td>
                                        <td>
                                            <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                onChange: function(value){
                                                    $('#vvancol').text(value*85000);
                                                }
                                            ">
                                        </td>
                                        
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vvancol">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(LU) Romb. Umum Weekday JBL+ODS+Ancol</td>
                                        <td>Rp.100.000</td>
                                        <td><div class="text-sold-out">Sold Out</div></td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vv">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(LU) Romb. Umum Weekend JBL+ODS+Ancol</td>
                                        <td>Rp.120.000</td>
                                        <td>
                                            <input class="easyui-numberspinner" value="1" style="width:100%;" data-options="
                                                onChange: function(value){
                                                    $('#vvods').text(value*120000);
                                                }
                                            ">
                                        </td>
                                        <td>
                                            <div class="nilai-sub-total">
                                                <span class="mata-uang">Rp. </span>
                                                <span class="pull-right" id="vvods">0</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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