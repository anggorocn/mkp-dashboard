<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="lib/bootstrap-3.3.7/docs/favicon.ico">-->

    <title>AGHRIS | Login Page</title>
    <base href="<?= base_url(); ?>" />

<!--    <script type="text/javascript" src="lib/vegas/jquery-1.11.1.min.js"></script>-->

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="lib/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="lib/bootstrap-3.3.7/docs/examples/signin/signin.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="lib/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="css/gaya.css" type="text/css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 area-login">
            	<div class="inner">
                    <div class="logo"><img src="images/logo-login.png"></div>
                    <div class="nama-aplikasi">agro group Human Resources<br>information system</div>
                	<form class="form-signin" method="post" action="app/login">
    
<!--
                        <label for="inputEmail" class="sr-only">Username</label>
                        <input type="text" name="reqUser" id="inputEmail" class="form-control" placeholder="Username" required>
    
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="reqPasswd" id="inputPassword" class="form-control" placeholder="Password" required>
    
                        <div style="color:#000; font-size:20px;"><?= $pesan ?></div>
    
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
-->
                        
                        <!-------->
                        
                        <div class="form-group">
                            <div class="ikon"><img src="images/icon-user-mask.png"></div>
                            <input name="reqUser" type="text" placeholder="Username..." >
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <div class="ikon"><img src="images/icon-lock.png"></div>
                            <input name="reqPasswd" type="password" placeholder="Password..." >
                            <div class="clearfix"></div>
                        </div>
                        
                        <div style="color:#000; font-size:20px;"><?= $message ?></div>
                        <button class="login" type="submit">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--    <script src="lib/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>-->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="lib/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="lib/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
</body>

</html>
