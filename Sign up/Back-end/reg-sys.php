<?php
session_start();
require('database.php');
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_conf=$_POST['password-conf'];
$number=$_POST['phone-number'];
$err="";
$str="ASDFGHJKLZXCVBNMQWERTYUOIPasdfghjklzxcvbnmqwertyuiop0123456789";
$token=str_shuffle($str);
$token=substr($token, 0,10);
$activation="0";
	if (empty($username)||empty($email)||empty($password)||empty($password_conf)||empty($number)) {
		$err="Please Enter All Fields";
		header("Location:../sign up.php?emptyfield");
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)||!preg_match("/^[a-zA-z0-9]*$/",$username)) {
		$err="Unvalid email or password";
		header("Location:../sign up.php?");
	}
	elseif ($password!==$password_conf) {
		$err="Passwords doesn't match";
		$_SESSION['err']=$err;
		header("Location:../sign up.php?");
		# code...
	}
	else if(!preg_match("/^[+]{1}+[0-9]{12} *$/",$number)){
		$err="Unvalid phone number";
		$_SESSION['err']=$err;
		header("Location:../sign up.php?unvalidphone");
	}
		else{
			$sql="SELECT * FROM users WHERE Email=?";
			$stmt=mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					die('sql error');
					# code...
				}
			elseif (mysqli_stmt_prepare($stmt,$sql)) {
					mysqli_stmt_bind_param($stmt,"s",$email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$result=mysqli_stmt_num_rows($stmt);
					if ($result>0) {
						$err="Email is already taken";
						$_SESSION['err']=$err;
						header("Location:../sign up.php?emailalreadytaken");
						exit();
				}
				else{
					$sql="SELECT * FROM users WHERE Username=?";
					$stmt=mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
					die('sql error');
					# code...
						  }
					elseif (mysqli_stmt_prepare($stmt,$sql)) {
						mysqli_stmt_bind_param($stmt,"s",$username);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						$result=mysqli_stmt_num_rows($stmt);
						if ($result>0) {
							$err="Username is already taken";
							$_SESSION['err']=$err;
							header("Location:../sign up.php?emailalreadytaken");
							exit();
								}#username-check  result
				else{
					$err="";
				$sql="INSERT INTO users(Username,Email,Pass,Activation,Token) VALUES (?,?,?,?,?)";//template
				$stmt=mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
					die('sql error');

						}
					elseif (mysqli_stmt_prepare($stmt,$sql)) {
						$password=password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,"sssss",$username,$email,$password,$activation,$token);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
													header("Location:../sign up.php?register_success");

					}
				}
			}#username stmt prepare 
		}#username check else statment	
	}#email-check prepare stmt
}#username check else statment
	$_SESSION['err']=$err;
?>
