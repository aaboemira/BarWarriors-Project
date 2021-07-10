<?php 
session_start();
if (isset($_GET['err'])) {
  $ERR=$_GET['err'];
  # code...
}
else{
  $ERR="";
}
?><!DOCTYPE html>
<HTML>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>BAR WARRIORS</title>
   <link rel="stylesheet" href="sign up.css">
   <link rel="shortcut icon" href="img/BAR WARRIORS.png" type="image/x-icone">
	<link rel="stylesheet" href="../Home/bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Home/css/fixed.css">
 </head>
 <body>

  	<!--N A V B A R-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"><img src="img/logo-tilte.png" width="110px";></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
       <a class="nav-link" href="../Home/index.php">Home</a>
      </li>
      <li class="nav-item active">
       <a class="nav-link" href="#">Sign up</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../Login/Login.php">Login</a>
      </li>
     </ul>
    </div>
  </nav>
<!--endnav-->
      <!--Landing-->
		<div class="landing" id="">
			<div class="home-wrap">
				<div class="home-inner">
				</div>
			</div>
		</div>
		<!--End-Landing-->
  <div class="container-fluid">
    <div class="row" >
     <div class="col-md-12">
        <div class="alert-danger" style="position: absolute; top: 15%;"><?=$ERR?></div>
        <div><img src="img/logo-tilte.png" class="img-1 text-center"></div>
        <form class="form-group col-md-12" method="post" action="Back-end/reg-sys1.php">
         <i style="color: black;" class="fas fa-user "></i>
            <input class="input" type="text" placeholder="User Name" name="username">
            <br>
            <i style="color: black;" class="fas fa-envelope"></i>
        <input class="input" type="text" placeholder="E-mail" name="email">
          <br>
          <i style="color: black;" class="fas fa-lock "></i>
         <input class="input" type="password" placeholder="Shhh! This is super secret." name="password">
         <br>
         <i style="color: black;" class="fas fa-key "></i>
         <input class="input" type="password" placeholder="Password Confirm" name="password-conf">
         <br>
         <i style="color: black;" class="fas fa-mobile-alt "></i>
         <input type="tel" class="input" placeholder="Phone Number" maxlength=13s name="phone-number">s
         <br>
         <button class="submit" value="submit" name="submit">Continue</button>
         <br>
         <div class="signin">Already have an account? <a href="file:///C:/Users/20101/Desktop/Bar%20Warriors/Sign%20in&Forget%20Your%20Password/index.html">Sign in</a></div>
        </form>
     </div>     
    </div>
  </div>
  <!--- Script Source Files -->
<script src="../home/js/jquery-3.3.1.min.js"></script>
<script src="../home/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
 </body>
</HTML>