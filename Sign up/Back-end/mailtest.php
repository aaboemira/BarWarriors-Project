<?php
require 'PHPMailer1/PHPMailerAutoload.php';
$email=$_SESSION['email'];
$username=$_SESSION['username'];
$token=$_SESSION['token'];
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'a.aboemira1@gmail.com';                 // SMTP username
$mail->Password = 'asdwarb32ott1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('barwarriors@gmail.com', 'Bar-Warriors support');
$mail->addAddress($email, $username);     // Add a recipient               // Name is optional // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject ="Thank you for your registration"."  ".$username;
$mail->Body    = 'Verify your Acc here<a href="http://createspace.epizy.com/Bar-Warriors/Sign%20up/Back-end/redirect.php"> Activate your acc</a>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location:../sign up.php?err=$errs[7]");

}
?>