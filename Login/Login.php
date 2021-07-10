<?php 
if (isset($_GET['err'])) {
  $err=$_GET['err'];
  }
else{
  $err="";
}
 ?>
<!DOCTYPE html>
<HTML>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>BAR WARRIORS</title>
   <link rel="shortcut icon" href="img/BAR WARRIORS.png" type="image/x-icone">
	<link rel="stylesheet" href="../Home/bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Home/css/fixed.css">
 <link rel="stylesheet" href="style.css">
 </head>
 <body>
        <!--Landing-->
		<div class="landing" id="">
			<div class="home-wrap">
				<div class="home-inner">
				</div>
			</div>
		</div>
		<!--End-Landing-->
  <div class="container">
    <div class="row" >
     <div class="col-md-12 col-xs-12">
  <div class="align">
		<img class="logo" src="img/logo.png">
		<div class="card">
			<div class="head">
				<div></div>
				<a id="login" class="selected" href="#login">Login</a>
				<a id="register" href="#register">Forget Password</a>
				<div></div>
			</div>
			<div class="tabs">
				 <div class="alert-danger" style="position: absolute; top: 20%; background-color:   #ff6666; padding: 3px 1px 1px 1px;"><span style="color: white;"><?=$err?></span></div>
				<form method="post" action="Back-end/login-sys.php">
					<div class="inputs">
						<div class="input">
							<input placeholder="Username" type="text" name="username">
							<img src="img/user.svg">
						</div>
						<div class="input">
							<input placeholder="Password" type="password" name="password">
							<img src="img/pass.svg">
						</div>
						<label class="checkbox">
							<input type="checkbox">
							<span>Remember me</span>
						</label>
					</div>
					<button>Login</button>
				</form>
				<form>
					<div class="inputs">
						<div class="input">
							<input placeholder="Email" type="text">
							<img src="img/mail.svg">
						</div>
					</div>
					<button>Send Login Link</button>
				</form>
			</div>
		</div>
	</div>
  			</div>
		</div>
	</div>
   <!--- Script Source Files -->
   	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/index.js"></script>
 <script src="../home/js/jquery-3.3.1.min.js"></script>
 <script src="../home/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
 <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->
 </body>