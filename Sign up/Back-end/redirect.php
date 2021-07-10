<?php 
session_start();
$email=$_SESSION['email'];
$username=$_SESSION['username'];
$token=$_SESSION['token'];
header("Location:../../Access_token/token.php?username=$username&token=$token");?>