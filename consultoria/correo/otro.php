<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();
$mail->From = "siguenzaalfred@gmail.com";
$mail->FromName = "My Name";
$mail->AddAddress("siguenzaalfred@gmail.com");
$mail->Subject = "Test PHPMailer Message";
$mail->Body = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->Subject    = "PHPMailer Test Subject via smtp";
$mail->Host = "localhost"; // SMTP server
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = false;
$mail->Port = 25;
if(!$mail->Send()) 
{
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}
?>