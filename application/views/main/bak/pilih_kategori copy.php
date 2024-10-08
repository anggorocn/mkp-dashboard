<!-- SLICK -->
<!-- <link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css"> -->

<!-- EASYUI -->
<link rel="stylesheet" type="text/css" href="lib/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="lib/easyui/themes/icon.css">
<!-- <link rel="stylesheet" type="text/css" href="lib/easyui/demo/demo.css"> -->
<script type="text/javascript" src="lib/easyui/jquery.min.js"></script>
<script type="text/javascript" src="lib/easyui/jquery.easyui.min.js"></script>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    /*body{
        font-family: 'Roboto', sans-serif;
    }
    * {
        margin: 0;
        padding: 0;
    }*/
    i {
        margin-right: 10px;
    }

    /*------------------------*/
    input:focus,
    button:focus,
    .form-control:focus{
        outline: none;
        box-shadow: none;
    }
    .form-control:disabled, .form-control[readonly]{
        background-color: #fff;
    }
    /*----------step-wizard------------*/
    .d-flex{
        display: flex;
    }
    .justify-content-center{
        justify-content: center;
    }
    .align-items-center{
        align-items: center;
    }

    /*---------signup-step-------------*/
    .bg-color{
        background-color: #333;
    }
    .signup-step-container{
        padding: 150px 0px;
        padding-bottom: 60px;
    }




        .wizard .nav-tabs {
            position: relative;
            margin-bottom: 0;
            border-bottom-color: transparent;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 75%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        color: #0e214b;
        font-weight: 500;
        border: 1px solid #ddd;
    }
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
            background: #0db02b;
        color: #fff;
        border-color: #0db02b;
    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }
    .wizard .nav-tabs > li.active > a i{
        color: #0db02b;
    }

    .wizard .nav-tabs > li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: red;
        transition: 0.1s ease-in-out;
    }



    .wizard .nav-tabs > li a {
        width: 30px;
        height: 30px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
        background-color: transparent;
        position: relative;
        top: 0;
    }
    .wizard .nav-tabs > li a i{
        position: absolute;
        top: -15px;
        font-style: normal;
        font-weight: 400;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: 700;
        color: #000;
    }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

    .wizard .tab-pane {
        position: relative;
        padding-top: 20px;
    }


    .wizard h3 {
        margin-top: 0;
    }
    .prev-step,
    .next-step{
        font-size: 13px;
        padding: 8px 24px;
        border: none;
        border-radius: 4px;
        margin-top: 30px;
    }
    .next-step{
        background-color: #0db02b;
    }
    .skip-btn{
        background-color: #cec12d;
    }
    .step-head{
        font-size: 20px;
        text-align: center;
        font-weight: 500;
        margin-bottom: 20px;
    }
    .term-check{
        font-size: 14px;
        font-weight: 400;
    }
    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 40px;
        margin-bottom: 0;
    }
    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 40px;
        margin: 0;
        opacity: 0;
    }
    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: 40px;
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 2;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }
    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        height: 38px;
        padding: .375rem .75rem;
        line-height: 2;
        color: #495057;
        content: "Browse";
        background-color: #e9ecef;
        border-left: inherit;
        border-radius: 0 .25rem .25rem 0;
    }
    .footer-link{
        margin-top: 30px;
    }
    .all-info-container{

    }
    .list-content{
        margin-bottom: 10px;
    }
    .list-content a{
        padding: 10px 15px;
        width: 100%;
        display: inline-block;
        background-color: #f5f5f5;
        position: relative;
        color: #565656;
        font-weight: 400;
        border-radius: 4px;
    }
    .list-content a[aria-expanded="true"] i{
        transform: rotate(180deg);
    }
    .list-content a i{
        text-align: right;
        position: absolute;
        top: 15px;
        right: 10px;
        transition: 0.5s;
    }
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #fdfdfd;
    }
    .list-box{
        padding: 10px;
    }
    .signup-logo-header .logo_area{
        width: 200px;
    }
    .signup-logo-header .nav > li{
        padding: 0;
    }
    .signup-logo-header .header-flex{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    /*-----------custom-checkbox-----------*/
    /*----------Custom-Checkbox---------*/
    input[type="checkbox"]{
        position: relative;
        display: inline-block;
        margin-right: 5px;
    }
    input[type="checkbox"]::before,
    input[type="checkbox"]::after {
        position: absolute;
        content: "";
        display: inline-block;   
    }
    input[type="checkbox"]::before{
        height: 16px;
        width: 16px;
        border: 1px solid #999;
        left: 0px;
        top: 0px;
        background-color: #fff;
        border-radius: 2px;
    }
    input[type="checkbox"]::after{
        height: 5px;
        width: 9px;
        left: 4px;
        top: 4px;
    }
    input[type="checkbox"]:checked::after{
        content: "";
        border-left: 1px solid #fff;
        border-bottom: 1px solid #fff;
        transform: rotate(-45deg);
    }
    input[type="checkbox"]:checked::before{
        background-color: #18ba60;
        border-color: #18ba60;
    }






    @media (max-width: 767px){
        .sign-content h3{
            font-size: 40px;
        }
        .wizard .nav-tabs > li a i{
            display: none;
        }
        .signup-logo-header .navbar-toggle{
            margin: 0;
            margin-top: 8px;
        }
        .signup-logo-header .logo_area{
            margin-top: 0;
        }
        .signup-logo-header .header-flex{
            display: block;
        }
    }

</style>



<div class="row">
    <div class="col-md-12">
        <section class="signup-step-container" style="border: 1px solid red;">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                    </li>
                                </ul>
                            </div>
            
                            <form role="form" action="index.html" class="login-box">
                                <div class="tab-content" id="main_form">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <h4 class="text-center">Step 1</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First and Last Name *</label> 
                                                    <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number  *</label> 
                                                    <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email Address *</label> 
                                                    <input class="form-control" type="email" name="name" placeholder=""> 
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password *</label> 
                                                    <input class="form-control" type="password" name="name" placeholder=""> 
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn next-step">Continue to next step</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <h4 class="text-center">Step 2</h4>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 1 *</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City / Town *</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country *</label> 
                                                <select name="country" class="form-control" id="country">
                                                    <option value="NG" selected="selected">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Registration No.</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                       
                                        
                                        
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                            <li><button type="button" class="default-btn next-step">Continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h4 class="text-center">Step 3</h4>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account Name *</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Demo</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Inout</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Information</label> 
                                                <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFile">
                                                  <label class="custom-file-label" for="customFile">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number *</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Input Number</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                            <li><button type="button" class="default-btn next-step">Continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step4">
                                        <h4 class="text-center">Step 4</h4>
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#listone" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Collapse 1 <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listone">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>First and Last Name *</label> 
                                                                    <input class="form-control" type="text"  name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number *</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <a href="#listtwo" data-toggle="collapse" aria-expanded="false" aria-controls="listtwo">Collapse 2 <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listtwo">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Address 1 *</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>City / Town *</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Country *</label> 
                                                                    <select name="country2" class="form-control" id="country2" disabled="disabled">
                                                                        <option value="NG" selected="selected">Nigeria</option>
                                                                        <option value="NU">Niue</option>
                                                                        <option value="NF">Norfolk Island</option>
                                                                        <option value="KP">North Korea</option>
                                                                        <option value="MP">Northern Mariana Islands</option>
                                                                        <option value="NO">Norway</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Legal Form</label> 
                                                                    <select name="legalform2" class="form-control" id="legalform2" disabled="disabled">
                                                                        <option value="" selected="selected">-Select an Answer-</option>
                                                                        <option value="AG">Limited liability company</option>
                                                                        <option value="GmbH">Public Company</option>
                                                                        <option value="GbR">No minimum capital, unlimited liability of partners, non-busines</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Business Registration No.</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Registered</label> 
                                                                    <select name="vat2" class="form-control" id="vat2" disabled="disabled">
                                                                        <option value="" selected="selected">-Select an Answer-</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Seller</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Company Name *</label> 
                                                                    <input class="form-control" type="password" name="name" placeholder="" disabled="disabled"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <a href="#listthree" data-toggle="collapse" aria-expanded="false" aria-controls="listthree">Collapse 3 <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listthree">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name *</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder=""> 
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Number *</label> 
                                                                    <input class="form-control" type="text" name="name" placeholder=""> 
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="button" class="default-btn next-step">Finish</button></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                            <div class="item tiket-mobil">
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
                            <div class="item tiket-mobil">
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

<script id="rendered-js" >

    // ------------step-wizard-------------
    $(document).ready(function () {
        $('.nav-tabs > li a[title]').tooltip();
        
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);
        
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }















</script>
