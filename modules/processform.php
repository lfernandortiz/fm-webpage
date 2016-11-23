<?php
     
try{
     include('../lib/PHPMailer/PHPMailerAutoload.php');

     $nombre = $_GET['nombrecliente'];
     $email = $_GET['email'];
     $telefono = $_GET['telefono'];
     $comentario = $_GET['comentario'];

     /// Cargo la Plantilla y posteriormente le reemplazo las variables
     $plantilla = "";
     $ruta = "../emailtemaplate/basic.html";
     $fp = fopen($ruta,"r");     
     while ($linea= fgets($fp,2048))
       $plantilla.= $linea;
     
     /// Reemplazo los campos  
     $plantilla = str_replace("{nombre}", $nombre , $plantilla);

     $mail = new PHPMailer;
     $mail->isSMTP();
     $mail->SMTPDebug = 0;     
     $mail->Debugoutput = 'html';
     $mail->Host = 'smtp.gmail.com';
     $mail->Port = 587;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Timeout=20;
     $mail->CharSet = "text/html; charset=UTF-8;";
     $mail->Username = "contacto.sms.service@gmail.com";
     $mail->Password = "Barcelona2013.";
     $mail->setFrom('sistemas@dromedicas.com.co', 'Droguerias Farmanorte');//direccion origen
     $mail->addReplyTo('sistemas@dromedicas.com.co', 'Droguerias Farmanorte');//direccion que recibe respuestas 
     $mail->addAddress($email, "Direccion Cliente");//direccion de destio
   
     $mail->Subject = 'Droguerias Faramanorte - Servicio al Cliente';//asunto
     
     $mail->isHTML(true);       
     $mail->Body = $plantilla;
     $mail->send();

     
     echo"true";

}catch(Exception $e){
      // echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 

?>