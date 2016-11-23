<?php
	$nombre = $_GET['nombre'];
	$email = $_GET['email'];
	$telefono = $_GET['telefono'];
	$comentario = $_GET['comentario'];

	/// Cargo la Plantilla y posteriormente le reemplazo las variables
     $plantilla = "";
     $ruta = "emailtemplate/basic.html";
     $fp = fopen($ruta,"r");     
     while ($linea= fgets($fp,2048))
       $plantilla.= $linea;
     
     /// Reemplazo los campos  
     $plantilla = str_replace("#{nombre}", $nombre , $plantilla);


try{
	require 'lib/PHPMailer/PHPMailerAutoload.php';

     $mail = new PHPMailer;
     $mail->isSMTP();
     $mail->SMTPDebug = 2;
     $mail->Debugoutput = 'html';
     $mail->Host = 'smtp.gmail.com';
     $mail->Port = 587;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Timeout=20;
     $mail->CharSet = 'UTF-8';
     $mail->Username = "contacto.sms.service@gmail.com";
     $mail->Password = "Barcelona2013.";
     $mail->setFrom('sistemas@dromedicas.com.co', 'DROPOS ERP App');//direccion origen
     $mail->addReplyTo('sistemas@dromedicas.com.co', 'DROPOS ERP App');//direccion que recibe respuestas 
     $mail->addAddress("johnduran@dromedicas.com.co", "Gerencia Dromedicas");//direccion de destio
   
     $mail->Subject = 'Droguerias Faramanorte';//asunto
     
     $mail->isHTML(true);       
     $mail->Body = $plantilla;
     $mail->send();
}catch(Exception $e){
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 
echo"true";

?>