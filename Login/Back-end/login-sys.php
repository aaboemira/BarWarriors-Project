<?php 
session_start();
require('database.php');
$username=$_POST['username'];
$password=$_POST['password'];
$pass_err="";
$errs=['Please fill All Fields','Please Activate Your Account','Password not correct'];
if (empty($username)||empty($password)) {
		$pass_err="Please Enter All Fields";
		header("Location:../Login.php?err=$errs[0]");
	}
	else{
		$sql="SELECT Activation FROM users WHERE Username=?" ;
	$stmt=mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		die("sql error");
	}
	elseif (mysqli_stmt_prepare($stmt,$sql)) {
		mysqli_stmt_bind_param($stmt,'s',$username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$result=mysqli_stmt_num_rows($stmt);
	}
	if ($result>0) {
		mysqli_stmt_bind_result($stmt,$Activate);
		mysqli_stmt_fetch($stmt);
		if ($Activate==0) {
		$pass_err="Please Activate Your Acc";
		header("Location:../Login.php?err=$errs[1]");	
		}
else{
	$sql="SELECT Pass FROM users WHERE Username=?" ;
	$stmt=mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		die("sql error");
	}
	elseif (mysqli_stmt_prepare($stmt,$sql)) {
		mysqli_stmt_bind_param($stmt,'s',$username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$result=mysqli_stmt_num_rows($stmt);
	if ($result>0) {
		mysqli_stmt_bind_result($stmt,$storedpass);
		mysqli_stmt_fetch($stmt);
		if (password_verify($password,$storedpass)) {
		$pass_err="Login sucess";
		header("Location:../../Home/index.php");	
		}
		else{
		header("Location:../login.php?err=$errs[2]");		
		}
					}
}
}
}
}
$_SESSION['pass-err']=$pass_err;
 ?>