
<?php 
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
header('Content-Type: text/html; charset=utf-8');

//date_default_timezone_set('Etc/UTC');
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = 2;
//$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "consultoria.svplan@gmail.com";
$mail->Password = "C0nsult0ria";
$mail->setFrom('consultoria.svplan@gmail.com', 'Sistema de Gestion de Consultoría');

$mail->addAddress('isaac.arias07@gmail.com', ''); 
//$mail->addAddress('edgardo.herrera@plan-international.org', '');     
//$mail->addAddress('rosa.monge@plan-international.org', '');     

$mail->Subject = 'mensaje de prueba';
$mail->msgHTML('<b>hola</b>');


if (!$mail->send()) {
    $errors =  "Errori Mailer: " . $mail->ErrorInfo;
} else {
    $errors =  "<h5>Sent!</h5>";
}

header('location:correo.php');

 ?>