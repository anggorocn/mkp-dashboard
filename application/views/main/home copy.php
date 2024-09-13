

<!-- slick-1.8.1 -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<style type="text/css">
/*html, body {
  margin: 0;
  padding: 0;
}

* {
  box-sizing: border-box;
}*/

.slider {
    width: 100%;
    margin: 0px auto;
}

.slick-slide {
  margin: 0px 5px;
}

.slick-slide img {
  width: 100%;
}

.slick-prev:before,
.slick-next:before {
  color: black;
}


.slick-slide {
  transition: all ease-in-out .3s;
  opacity: 1;
}

.slick-active {
  opacity: 1;
}

.slick-current {
  opacity: 1;
}
</style>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
<!-- </div> -->

<!-- Content Row -->
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="area-info-atas">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">KPI</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                        <div class="col-md-7 padding-left-none">
                                            <div class="title">KPI</div>
                                            <div class="nilai-info">
                                                102,11
                                                <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 padding-left-none padding-right-none">
                                            <div class="item-data-angka">
                                                <div class="title">Last month</div>
                                                <div class="nilai">99,31</div>
                                            </div>
                                            <div class="item-data-angka">
                                                <div class="title">YoY</div>
                                                <div class="nilai">97,97%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Revenue</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                        <div class="col-md-7 padding-left-none">
                                            <div class="title">Total Revenue</div>
                                            <div class="nilai-info">
                                                104%
                                                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 padding-left-none padding-right-none">
                                            <div class="item-data-angka">
                                                <div class="title">Target YTD</div>
                                                <div class="nilai">Rp177,7 M</div>
                                            </div>
                                            <div class="item-data-angka">
                                                <div class="title">Actual</div>
                                                <div class="nilai">Rp189,7 M</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cash Available</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body border-left-info">
                                    <div class="row">
                                            <div class="col-md-7 padding-left-none">
                                                <div class="title">Cash Available</div>
                                                <div class="nilai-info">
                                                    Rp23,3 M
                                                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 padding-left-none padding-right-none">
                                                <div class="item-data-angka">
                                                    <div class="title">Last Month</div>
                                                    <div class="nilai">33,31</div>
                                                </div>
                                                <!-- <div class="item-data-angka">
                                                    <div class="title">Actual</div>
                                                    <div class="nilai">Rp189,7 M</div>
                                                </div> -->
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="area-data-by-menu">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Peta</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="area-menu-vertical">
                                                    <section class="vertical slider">
                                                        <div>
                                                            <a href="#">PNP</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">NPS</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">PLN</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">IPP</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">Test</a>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="area-menu-horisontal">
                                                    <section class="regular slider">
                                                        <div>
                                                            <a href="#">OM</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">Proyek</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">IC</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">Alber</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">EV</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">Scaff</a>
                                                        </div>
                                                        <div>
                                                            <a href="#">Test</a>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="area-peta">
                                                    <div class="inner">
                                                        <div class="inner-peta" id="map">
                                                            <img src="images/img-map.png"> <!-- GANTI DISINI -->
                                                        </div>
                                                        <div class="area-jumlah-angka">
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong>4552</strong> orang
                                                            </div>
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong>56</strong> unit
                                                            </div>
                                                            <div class="item">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <strong>100</strong> proyek
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Trend Pendapatan</h6>
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalPendapatan">
                                        <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>

                                    <!-- Modal -->
                                    <div id="myModalPendapatan" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">Trend Pendapatan</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="grafik-trend-pendapatan"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Piutang Usaha & Tagihan Bruto (per segmentasi | per usia)</h6>
                                    <!-- Trigger the modal with a button -->
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalPiutangUsaha">
                                        <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>

                                    <!-- Modal -->
                                    <div id="myModalPiutangUsaha" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">Piutang Usaha & Tagihan Bruto (per segmentasi | per usia)</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-piutang-usaha-tagihan-bruto">
                                        <div class="row equal-height-column">
                                            <div class="col-md-2">
                                                <div class="item">
                                                    <div class="title">Total Piutang Usaha</div>
                                                    <div class="nilai">Rp100M</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">Total Tagihan Bruto</div>
                                                    <div class="nilai">Rp100M</div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="area-table">
                                                    <table>
                                                        <tr>
                                                            <td>PLN</td>
                                                            <td>0,5</td>
                                                            <td>0,4</td>
                                                            <td>0,2</td>
                                                            <td>&nbsp;</td>
                                                            <td>0,8</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NP</td>
                                                            <td>20,9</td>
                                                            <td>7,7</td>
                                                            <td>0,2</td>
                                                            <td>2,8</td>
                                                            <td>31,6</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NPS</td>
                                                            <td>15,9</td>
                                                            <td>5,3</td>
                                                            <td>4,6</td>
                                                            <td>5,8</td>
                                                            <td>31,7</td>
                                                        </tr>
                                                        <tr>
                                                            <td>IPP</td>
                                                            <td>1,5</td>
                                                            <td>1,1</td>
                                                            <td>0,39</td>
                                                            <td>1,1</td>
                                                            <td>3,8</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="area-table table2">
                                                    <table>
                                                        <tr>
                                                            <td>PLN</td>
                                                            <td>0,7</td>
                                                            <td>0,4</td>
                                                            <td>0,0</td>
                                                            <td>0,0</td>
                                                            <td>0,0</td>
                                                            <td>1,0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NP</td>
                                                            <td>26,7</td>
                                                            <td>7,8</td>
                                                            <td>9,4</td>
                                                            <td>0,3</td>
                                                            <td>2,0</td>
                                                            <td>46,2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLN NPS</td>
                                                            <td>13,5</td>
                                                            <td>3,3</td>
                                                            <td>1,2</td>
                                                            <td>5,4</td>
                                                            <td>2,5</td>
                                                            <td>26,0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>IPP</td>
                                                            <td>2,4</td>
                                                            <td>0,8</td>
                                                            <td>0,7</td>
                                                            <td>0,3</td>
                                                            <td>0,6</td>
                                                            <td>4,8</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 area-kanan-dashboard">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-trend-kpi">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Trend Key Performance Indicator</h6>
                            <!-- Trigger the modal with a button -->
                            <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModal">
                                <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                <img src="images/ikon-bod-note-add.png">
                            </a>

                            <!-- Modal -->
                            <div id="myModal" class="modal modal-bod fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="display: block;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">BOD Notes : <span class="nama-modul">Trend Key Performance Indicator</span></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="comment">Comment:</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                        </div> 
                                        <button type="submit" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div> -->
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="grafik-trend-kpi"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="area-kpi-tidak-tercapai">
                        <div class="card">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">KPI tidak tercapai</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="inner">
                                        <section class="regular-kpi-tidak-tercapai slider">
                                            <div>
                                                <div class="card">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary">Collection Period</h6>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <div class="nilai"><span>112 (hari)</span>  Current Month</div>
                                                        <div class="nilai"><span>95 (hari)</span>       Last Month</div>
                                                        <div class="nilai"><span>110 (hari)</span>  Target this month</div>
                                                        <div class="persentase">
                                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                            98,18%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="card">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary">BOPO</h6>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <div class="nilai"><span>93,95%</span>  Current Month</div>
                                                        <div class="nilai"><span>95,16%</span>       Last Month</div>
                                                        <div class="nilai"><span>93,93%</span>  Target this month</div>
                                                        <div class="persentase">
                                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                            98,18%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="card">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary">Test Nama</h6>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <div class="nilai"><span>112 (hari)</span>  Current Month</div>
                                                        <div class="nilai"><span>95 (hari)</span>       Last Month</div>
                                                        <div class="nilai"><span>110 (hari)</span>  Target this month</div>
                                                        <div class="persentase">
                                                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                                                            98,18%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <div>
                                                <a href="#">Proyek</a>
                                            </div>
                                            <div>
                                                <a href="#">IC</a>
                                            </div>
                                            <div>
                                                <a href="#">Alber</a>
                                            </div>
                                            <div>
                                                <a href="#">EV</a>
                                            </div>
                                            <div>
                                                <a href="#">Scaff</a>
                                            </div>
                                            <div>
                                                <a href="#">Test</a>
                                            </div> -->
                                        </section>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 sub-kiri">
                    <div class="row">
                        <div class="col-md-6 sub-kiri">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Employee</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-total-employee">
                                        <div class="nilai">4551</div>
                                        <div class="persentase">30% YoY</div>
                                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="area-grafik-status">
                                <div class="card">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="inner">
                                            <div id="grafik-status"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="area-tl-rups">
                                <div class="card">
                                    <!-- Card Header - Dropdown -->
                                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">TL RUPS, TL Radir</h6>
                                    </div> -->
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="area-data-angka">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="judul">TL RUPS</div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item on-going">
                                                        <div class="title">On Going</div>
                                                        <div class="nilai">5</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item done">
                                                        <div class="title">Done</div>
                                                        <div class="nilai">7</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item total">
                                                        <div class="title">Total</div>
                                                        <div class="nilai">12</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="judul">TL Radir</div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item on-going">
                                                        <div class="title">On Going</div>
                                                        <div class="nilai">5</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item done">
                                                        <div class="title">Done</div>
                                                        <div class="nilai">7</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="item total">
                                                        <div class="title">Total</div>
                                                        <div class="nilai">12</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">

                            <section class="vertical-persekot slider">
                                <div>
                                    <div class="card">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Persekot over the limit</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div id="grafik-persekot-over-the-limit"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Persekot jatuh tempo</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div id="grafik-persekot-jatuh-tempo"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            
                            <? /* ?>
                            
                            <? */ ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Outstanding Kontrak</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-data-angka">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Sign</div>
                                                    <div class="nilai">5</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Unsign</div>
                                                    <div class="nilai">7</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">3 Month Left</div>
                                                    <div class="nilai">12</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Project on progress</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-data-angka">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item on-going">
                                                    <div class="title">On Going</div>
                                                    <div class="nilai">5</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item done">
                                                    <div class="title">Done</div>
                                                    <div class="nilai">7</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="title">Upcoming</div>
                                                    <div class="nilai">12</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA</h6>
                                    <!-- Trigger the modal with a button -->
                                    <a href="#" class="pull-right btn-bod-note" data-toggle="modal" data-target="#myModalSLA">
                                        <!-- <i class="fa fa-comment" aria-hidden="true"></i> -->
                                        <img src="images/ikon-bod-note-add.png">
                                    </a>

                                    <!-- Modal -->
                                    <div id="myModalSLA" class="modal modal-bod fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="display: block;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">BOD Notes : <span class="nama-modul">SLA</span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div> 
                                                <button type="submit" class="btn btn-warning">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="area-sla">
                                        <div class="row">
                                            <div class="col-md-3 padding-left-none padding-right-none">
                                                <div class="item">
                                                    <div class="title">Top Perform</div>
                                                    <div class="nilai">5</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">Under Perform</div>
                                                    <div class="nilai">7</div>
                                                </div>
                                            </div>
                                            <div class="col-md-9 padding-right-none">
                                                <div class="item item-top5">
                                                    <div class="title">Top 5 Under Perform</div>
                                                    <div class="nilai">
                                                        <ul>
                                                            <li>1. Alber PLTU Bolok</li>
                                                            <li>2. IC Pulang Pisau</li>
                                                            <li>3. IC Pacitan</li>
                                                            <li>4. IC Kaltim Teluk</li>
                                                            <li>5. IC KPJB</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="display: none;">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row" style="display: none;">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row" style="display: none;">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span
                        class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span
                        class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span
                        class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span
                        class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span
                        class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <!-- <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="...">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a
                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                    constantly updated collection of beautiful svg images that you can use
                    completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                    unDraw &rarr;</a>
            </div>
        </div> -->

        <!-- Approach -->
        <!-- <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div> -->

    </div>
</div>

<!-- SLICK -->
    <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
    <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical").slick({
        dots: false,
        arrows: false,
        vertical: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
      });
      // $(".vertical-persekot").slick({
      //   dots: false,
      //   arrows: false,
      //   vertical: true,
      //   slidesToShow: 1,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2600,
      // });
      // $(".regular").slick({
      //   dots: false,
      //   arrows: false,
      //   infinite: true,
      //   slidesToShow: 6,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2000,
      // });
      // $(".regular-kpi-tidak-tercapai").slick({
      //   dots: false,
      //   // arrows: false,
      //   infinite: true,
      //   slidesToShow: 2,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2100,
      // });
    });
    </script>

    <!-- <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
    </script> -->

    <?php
    function isMobileDevice() {
        $mobileDevices = array(
            'iPhone','iPad','Android','Windows Phone','BlackBerry',
            'Opera Mini','Symbian','Kindle','Mobile','Tablet','Mobi'
        );

        foreach ($mobileDevices as $device) {
            if (stripos($_SERVER['HTTP_USER_AGENT'], $device) !== false) {
                return true;
            }
        }

        return false;
    }

    if (isMobileDevice()) {
        // echo "Ini adalah perangkat mobile.";
        ?>
        <script type="text/javascript">
        $(document).on('ready', function() {
            $(".vertical-persekot").slick({
                dots: false,
                arrows: false,
                vertical: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2600,
            });
            $(".regular").slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
            $(".regular-kpi-tidak-tercapai").slick({
                dots: false,
                // arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2100,
            });
        });
        </script>
        <?php
    } else {
        // echo "Ini bukan perangkat mobile.";
        ?>
        <script type="text/javascript">
        $(document).on('ready', function() {
            $(".vertical-persekot").slick({
                dots: false,
                arrows: false,
                vertical: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2600,
            });
            $(".regular").slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
            $(".regular-kpi-tidak-tercapai").slick({
                dots: false,
                // arrows: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2100,
            });
        });
        </script>
        <?php
    }
    ?>

    <!-- MAP -->
    <script src="lib/leaflet/leaflet.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="lib/leaflet/leaflet.css">
    <script>
        // startmap

        map = L.map('map').setView([-0.8917, 117.8707], 4);
        var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        var buffers = [];
        function addMarker(code,lat,lng,color){
            var pinColor = "FE7569";
            if (color=='pltmh') 
            {
                pinColor = "189db8";
            }
            else if (color=='pltm') 
            {
                pinColor = "14647a";
            }
            else if (color=='pltd') 
            {
                pinColor = "18b8a0";
            }
            else if (color=='pltgu') 
            {
                pinColor = "2bb818";
            }
            else if (color=='plta') 
            {
                pinColor = "b8a318";
            }
            else if (color=='pltg') 
            {
                pinColor = "b87218";
            }
            else if (color=='pltmg') 
            {
                pinColor = "6318b8";
            }
            else if (color=='pltu') 
            {
                pinColor = "b818af";
            }
            console.log(pinColor)

            let customIcon = {
                iconUrl:"images/marker/marker"+pinColor.toUpperCase()+".png",
                // iconUrl:"images/coba.png",
                iconAnchor: [10, 34],
                 popupAnchor: [1, -34],
                // iconSize:[20,40]
            }

            let myIcon = L.icon(customIcon);
            //let myIcon = L.divIcon();

            let iconOptions = {
                // title:"company name",
                // draggable:true,
                icon:myIcon
            }

            var p = L.marker([lat,lng],iconOptions);
            // var p = L.marker([lat,lng]);
            p.title = code;
            p.alt = code;
            p.bindPopup(code);
            p.addTo(map);
            addRowTable(code, [lat,lng]);

            var c = L.circle([lat,lng], {
                color: pinColor,
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 0
            }).addTo(map);
            buffers.push(c);
        }

        $(document).ready(function (){
          // for (var i=0; i < locations.length; i++){
          //   addMarker(locations[i][0],locations[i][1],locations[i][2],locations[i][4]);
          // }
            addMarker('PLTA BAKARU','5.21579729862986','97.0905126384537','plta');
        });

        L.control.scale({maxWidth:240, metric:true, position: 'bottomleft'}).addTo(map);

        $("#range").change(function(e){
          var radius = parseInt($(this).val())
          buffers.forEach(function(e){
            e.setRadius(radius);
            e.addTo(map);
          });
        });

        function addRowTable(code, coords){
          var tr = document.createElement("tr");
          var td = document.createElement("td");
          td.textContent = code;
          tr.appendChild(td);
          tr.onclick = function(){map.flyTo(coords, 17);};
        }
        // endmap
    </script>

    <!-- HIGHCHART -->
    <script src="lib/highcharts/highcharts.js"></script>
    <script src="lib/highcharts/series-label.js"></script>
    <script src="lib/highcharts/exporting.js"></script>
    <script src="lib/highcharts/export-data.js"></script>
    <script src="lib/highcharts/accessibility.js"></script>

    <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

    <!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
    <!-- <script src="http://code.highcharts.com/modules/exporting.js"></script> -->


    <!-- TREND KPI -->
    <script type="text/javascript">
        Highcharts.chart('grafik-trend-kpi', {
            chart: {
                type: 'spline',
                // margin: [0, 0, 0, 0],
                marginBottom: 30,
            },
            exporting: {
                enabled: false
            },

            title: {
                text: null,
                align: 'left'
            },

            subtitle: {
                text: null,
                align: 'left'
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2020'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                enabled: false
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Series 1',
                data: [
                    43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610
                ]
            }, {
                name: 'Series 2',
                data: [
                    24916, 37941, 29742, 29851, 52490, 60282,
                    59121, 49885, 54726, 65243, 82050
                ]
            }, {
                name: 'Series 3',
                data: [
                    11744, 30000, 16005, 19771, 20185, 24377,
                    32147, 30912, 29243, 29213, 25663
                ]
            }],
            // }, {
            //     name: 'Operations & Maintenance',
            //     data: [
            //         null, null, null, null, null, null, null,
            //         null, 11164, 11218, 10077
            //     ]
            // }, {
            //     name: 'Other',
            //     data: [
            //         21908, 5548, 8105, 11248, 8989, 11816, 18274,
            //         17300, 13053, 11906, 10073
            //     ]
            // }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

    </script>

    <!-- TREND PENDAPATAN -->
    <script type="text/javascript">
        Highcharts.chart('grafik-trend-pendapatan', {
            chart: {
                type: 'spline',
                marginBottom: 30,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            subtitle: {
                text: null
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        max: 11
            },
            yAxis: {
                // min: -50,
                title: {
                    text: null
                }
            },
            series: [{
                data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 144.0, 176.0]
            }],
            legend: {
                enabled: false
            }
        });
    </script>

    <!-- GRAFIK STATUS -->
    <script type="text/javascript">
        // Data retrieved from https://netmarketshare.com/
        // Build the chart
        // Highcharts.chart('grafik-status', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     exporting: {
        //         enabled: false,
        //     },
        //     title: {
        //         text: null,
        //         align: 'left'
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        //     },
        //     accessibility: {
        //         point: {
        //             valueSuffix: '%'
        //         }
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: false
        //             },
        //             showInLegend: true
        //         }
        //     },
        //     series: [{
        //         name: 'Brands',
        //         colorByPoint: true,
        //         data: [{
        //             name: 'Chrome',
        //             y: 74.77,
        //             sliced: true,
        //             selected: true
        //         },  {
        //             name: 'Edge',
        //             y: 12.82
        //         },  {
        //             name: 'Firefox',
        //             y: 4.63
        //         }, {
        //             name: 'Safari',
        //             y: 2.44
        //         }, {
        //             name: 'Internet Explorer',
        //             y: 2.02
        //         }, {
        //             name: 'Other',
        //             y: 3.28
        //         }]
        //     }]
        // });

    </script>
    <script type="text/javascript">
        $(function() {           
           var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'grafik-status',
                    
                    margin: [0, 0, 0, 0],
                    marginRight: 65,
                    // spacingTop: 0,
                    // spacingBottom: 0,
                    // spacingLeft: 0,
                    // spacingRight: 20
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: null
                },
                plotOptions: {
                    pie: {
                        size:'110%',
                        innerSize: '50%',
                        dataLabels: {
                            enabled: false
                        }
                    }
                },
                series: [{
                    showInLegend:true,
                    type: 'pie',
                    name: 'Status',
                    data: [
                        ['PKWTT', 60],
                        ['PKWT', 40]
                    ],
                    colors: ['#2d82cc','#ffc534']
                }],
                // legend: {
                    // itemStyle: {
                    //     // color: 'white',
                    //     // fontWeight: 'bold',
                    //     fontSize: '5px'
                    // },
                    // layout: 'horizontal', // default
                    // itemDistance: 50
                // },
                // legend: {
                    // width: '100%',
                    // floating: true,
                    // align: 'left',
                    // x: 0, // = marginLeft - default spacingLeft
                    // itemWidth: 150,
                    // borderWidth: 1,
                    // layout: 'vertical', // default
                // },
                legend: {
                    itemStyle: {
                        fontSize: '8px'
                    },
                    align: 'right',
                    verticalAlign: 'top',
                    layout: 'vertical',
                    x: 0,
                    y: 0
                },
                
                
            });
        });
    </script>

    <!-- GRAFIK PERSEKOT OTL -->
    <script type="text/javascript">
        Highcharts.chart('grafik-persekot-over-the-limit', {
            chart: {
                type: 'bar',
                marginTop: 0,
                marginBottom: 0,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                labels: {
                    enabled: false
                }
            },
            legend: {
                enabled: false
            },
            // plotOptions: {
            //     series: {
            //         stacking: 'normal'
            //     }
            // },
            plotOptions: {
                bar: {
                    stacking: 'normal',
                    pointPadding: 0,
                    groupPadding: 0.2,
                    dataLabels: {
                        enabled: true,
                        color: 'black',
                        align: "right",
                        format: '{y} M',
                        inside: false,
                        style: {
                            fontWeight: 'bold'
                        },
                        verticalAlign: "middle"
                    },
                }
            },
            series: [{
                name: 'John',
                data: [0.72],
                color: '#f5153c'
            }, {
                name: 'Jane',
                data: [0.27],
                color: '#2d9ca0'
            }]
        });

    </script>

    <!-- GRAFIK PERSEKOT JATUH TEMPO -->
    <script type="text/javascript">
        Highcharts.chart('grafik-persekot-jatuh-tempo', {
            chart: {
                type: 'bar',
                marginTop: 0,
                marginBottom: 0,
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: null
                },
                labels: {
                    enabled: false
                }
            },
            legend: {
                enabled: false
            },
            // plotOptions: {
            //     series: {
            //         stacking: 'normal'
            //     }
            // },
            plotOptions: {
                bar: {
                    stacking: 'normal',
                    pointPadding: 0,
                    groupPadding: 0.2,
                    dataLabels: {
                        enabled: true,
                        color: 'black',
                        align: "right",
                        format: '{y} M',
                        inside: false,
                        style: {
                            fontWeight: 'bold'
                        },
                        verticalAlign: "middle"
                    },
                }
            },
            series: [{
                name: 'A',
                data: [4],
                color: '#a7050f'
            }, {
                name: 'B',
                data: [3],
                color: '#fc0d1d'
            },
            {
                name: 'C',
                data: [3],
                color: '#fc5457'
            }, {
                name: 'D',
                data: [2],
                color: '#fd7c7e'
            }]
        });

    </script>