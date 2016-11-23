<?php
	$nombre = $_GET['nombre'];
	$email = $_GET['email'];
	$telefono = $_GET['telefono'];
	$comentario = $_GET['comentario'];

echo $nombre." ".$email." ".$telefono." ".$comentario;

// try{
// 	require 'lib/PHPMailer/PHPMailerAutoload.php';
//      $mail = new PHPMailer;
//      $mail->isSMTP();
//      $mail->SMTPDebug = 2;
//      $mail->Debugoutput = 'html';
//      $mail->Host = 'smtp.gmail.com';
//      $mail->Port = 587;
//      $mail->SMTPSecure = 'tls';
//      $mail->SMTPAuth = true;
//      $mail->Timeout=20;
//      $mail->CharSet = 'UTF-8';
//      $mail->Username = "contacto.sms.service@gmail.com";
//      $mail->Password = "Barcelona2013.";
//      $mail->setFrom('sistemas@dromedicas.com.co', 'DROPOS ERP App');
//      $mail->addReplyTo('sistemas@dromedicas.com.co', 'DROPOS ERP App');
//      $mail->addAddress("johnduran@dromedicas.com.co", "Gerencia Dromedicas");
//      $mail->addAddress("sistemas@dromedicas.com.co", "Gerencia Dromedicas");
//      $mail->Subject = 'Cambio de Precio en Facturas de Venta';
     
//      $mail->isHTML(true);       
//      $mail->Body = $plantilla;
//      $mail->send();
// }catch(Exception $e){
// 	 echo 'Caught exception: ',  $e->getMessage(), "\n";
// }
 
echo"true";

?>