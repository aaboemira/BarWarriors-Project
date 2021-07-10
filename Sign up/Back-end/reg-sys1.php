<?php
	session_start();
	if (isset($_POST['submit'])) {
		# code...
require('database.php');
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_conf=$_POST['password-conf'];
$number=$_POST['phone-number'];
$errs=array("Please fill All Fields","Unvalid email","Unvaild Username","Passwords doesn't match","Unvalid phone number","Email is already taken","Username is already taken","Registration sucess Check your Account");
$str="ASDFGHJKLZXCVBNMQWERTYUOIPasdfghjklzxcvbnmqwertyuiop0123456789";
$token=str_shuffle($str);
$token=substr($token, 0,10);
$activation="0";
	if (empty($username)||empty($email)||empty($password)||empty($password_conf)||empty($number)) {
			$_SESSION['err']=$errs[0];
		header("Location:../sign up.php?err=$errs[0]");
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['err']=$errs[1];
		header("Location:../sign up.php?err=$errs[1]");
	}
	else if (!preg_match("/^[a-zA-z0-9]*$/",$username)) {
		header("Location:../sign up.php?err=$errs[2]");
	}
	elseif ($password!==$password_conf) {
			$_SESSION['err']=$errs[2];
		header("Location:../sign up.php?err=$errs[3]");
		# code...
	}
	else if(!preg_match("/^[+]{1}+[0-9]{12} *$/",$number)){
		header("Location:../sign up.php?err=$errs[4]");
	}
		else{
			$sql="SELECT * FROM users WHERE Email=?";
			$stmt=mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					die('sql error of email selection');
					# code...
				}
			elseif (mysqli_stmt_prepare($stmt,$sql)) {
					mysqli_stmt_bind_param($stmt,"s",$email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$result=mysqli_stmt_num_rows($stmt);
					if ($result>0) {
						header("Location:../sign up.php?err=$errs[5]");
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
							$_SESSION['err']=$errs[5];
							header("Location:../sign up.php?err=$errs[6]");
							exit();
								}#username-check  result
							else{
								$err="";
								$_SESSION['username']=$username;
								$_SESSION['email']=$email;
								$_SESSION['token']=$token;
								$sql="INSERT INTO users(Username,Email,Pass,Activation,Token,Phonenumber) VALUES (?,?,?,?,?,?)";//template
								$stmt=mysqli_stmt_init($conn);
								if (!mysqli_stmt_prepare($stmt,$sql)) {
									die('sql error');

								}
									elseif (mysqli_stmt_prepare($stmt,$sql)) {
									$_SESSION['err']="";
									$password=password_hash($password, PASSWORD_DEFAULT);
									mysqli_stmt_bind_param($stmt,"ssssss",$username,$email,$password,$activation,$token,$number);
									mysqli_stmt_execute($stmt);
									mysqli_stmt_store_result($stmt);
									$stmt->close();
									require"mailtest.php";
					}
				}
			}#username stmt prepare 
		}#username check else statment	
	}#email-check prepare stmt
}#email check else statment
	}
?>
