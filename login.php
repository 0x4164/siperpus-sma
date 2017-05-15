<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> SIPERPUS </title>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/337/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/337/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="vertical-center">
    <div class="container" style="margin:auto;">
	<fieldset>
		<div class="row text-center" style="margin-bottom:10px">
			<h1>SISTEM INFORMASI PERPUSTAKAAN</h1>
			<h1>SMA NEGERI 1 BATU</h1>
		</div>
		<div class="row">
		<div class="col-lg-4">
			<h2>Pencarian Pustaka</h2>
			<form class="form" action="aksi_pustaka.php" method="post">
			  <input class="form-control" type="text" name="katakunci" value="">
			  <input class="form-control" type="submit" name="proses" value="Cari">
			</form>
		</div>
			<div id="loginbox" style="" class="mainbox col-md-4 col-md-offset-8  col-sm-8 col-sm-offset-8">	  <div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Sign In</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
					</div>
					<div style="padding-top:30px" class="panel-body">
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<?php //form_open('login/cek_login','class="form-horizontal"')?>
						<form class="" action="ceklogin.php" method="post">
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input name="user" type="text" class="form-control" id="userid" placeholder="Masukkan Username" value="admin">
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input name="pass" type="password" class="form-control" id="password" placeholder="Masukkan Password" value="admin">
							</div>
							<div class="input-group">
								<div class="checkbox">
									<label>
									<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
									</label>
								</div>
							</div>
							<div style="margin-top:10px" class="form-group">
									<!-- Button -->
								<div class="col-sm-12 controls">
									<button name="login" type="submit" class="btn btn-success">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</fieldset>
    	</div>
  	</div>
  </div>
  <!--endlogin-->
  <div class="">
  </div>
</body>
</html>
