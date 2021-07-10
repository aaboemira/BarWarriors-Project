<?php 
require('database.php');
if (isset($_GET['token'])) {
  $token=$_GET['token'];
  $username=$_GET['username'];
  $activation=1;
  # code...
  $sql="SELECT Token FROM users WHERE Username=?";
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
		mysqli_stmt_bind_result($stmt,$acesstoken);
		mysqli_stmt_fetch($stmt);
		if ($acesstoken=$token) {
			echo "Your Account has been activated";
			$activation=1;
			$sql="UPDATE `users` SET `Activation`=? WHERE Token=?";
			$stmt=mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
					die('sql error');

						}
					elseif (mysqli_stmt_prepare($stmt,$sql)) {
						mysqli_stmt_bind_param($stmt,"ss",$activation,$token);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);

					}
			# code...
		}
				}
				else{
					  echo "failed to activate your acc";
				}
}
else{
  $token="";
					  echo "failed to activate your acc";

}
}
 ?>