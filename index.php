<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Aplikasi Pengolahan Data Penduduk</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="aset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="aset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="aset/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	.jw-slideshow{        
		margin: 100 auto;
	    width: 768px;
	    height: 2000px;
	    background: #000;
	    opacity: 0.7;
	    color: #FFF;
	    padding: 26px;
	    font-weight: bold;
	    font-size: 2em;
	}
	.jw-slideshow h1{
		text-align: center;
	}
	.jw-slideshow p{ 
		padding:100px;
		background:#CCC;
		color:#000;
	}
	</style>
	
  </head>
  <body class="login-page ">
    <div class="login-box gradient">
      <div class="login-logo">
<div class="login-logo">
       <img src="images/kota tasik.png" align="center"> <br><b><h2><font size="" color="black">APLIKASI PENGOLAHAN DATA PENDUDUK </font></h2></b> </div>
	   
      
      </div><!-- /.login-logo -->
      <div class="login-box-body ">
        <h4 class="login-box-msg">Silakan Masuk</h4>
		
        <form name="login-form" action="cek_login.php"  class="login-form" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Nama Pengguna"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback"> 
            <input name="password" type="password" class="form-control" placeholder="Sandi"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">                                    
            </div><!-- /.col -->
			  <div class="col-xs-8">			
		  </div>
            <div class="col-xs-4">
			  <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="ace-icon fa fa-key"></i>Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>          
		<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="Rellita">
    <link rel="icon" href="../../favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background="img/page-background.png">
</html>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  <!-- jQuery 2.1.4 -->
    <script src="aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="aset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="aset/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="./aset/jquery.backstretch.min.js"></script>
	<script type="text/javascript">
		$.backstretch(
		[
			"./images/apdp.jpg",
			"./images/background2.jpg",
			"./images/background3.jpg"
		], 
		{
			duration: 1200, 
			fade: 600
		});
	</script>
  </body>
</html>