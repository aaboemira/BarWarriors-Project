<?php
	$_SESSION['err']="1";

$host="sql300.epizy.com";
$username="epiz_24608613";
$password="kp5O3QJrFByuDN1";
$database="epiz_24608613_barWarriors";
$conn=mysqli_connect($host,$username,$password,$database);
if (!$conn) {
	die('Connection error'.mysqli_connect_error());
}

  ?>