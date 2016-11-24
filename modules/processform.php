<?php
     
try{
     include('../lib/PHPMailer/PHPMailerAutoload.php');

     $nombre = $_GET['nombrecliente'];
     $email = $_GET['email'];
     $telefono = $_GET['telefono'];
     $comentario = $_GET['comentario'];

     enviarEmailCliente( $nombre, $email);
     enviarEmailAdministrativo( $nombre, $email, $telefono, $comentario);
     

     echo"true";

}catch(Exception $e){
      echo 'Caught exception: ',  $e->getMessage(), "\n";
}


function enviarEmailCliente($nombre, $email){
          /// Cargo la Plantilla y posteriormente le reemplazo las define_syslog_variables(oid)
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
          $mail->Host = 'stve.wnkserver5.com';
          $mail->Port = 25;
          $mail->SMTPSecure = 'tls';
          $mail->SMTPAuth = true;
          $mail->Timeout=20;
          $mail->CharSet = "text/html; charset=UTF-8;";
          $mail->Username = "servicioalcliente@dromedicas.com.co";
          $mail->Password = "Dromedicas2013.";
          $mail->setFrom('servicioalcliente@dromedicas.com.co', 'Droguerias Farmanorte');//direccion origen
          $mail->addReplyTo('elianaarredondo@dromedicas.com.co', 'Droguerias Farmanorte');//direccion que recibe respuestas 
          $mail->addAddress($email, "Direccion Cliente");//direccion de destio
        
          $mail->Subject = 'Droguerias Faramanorte - Servicio al Cliente';//asunto
          
          $mail->isHTML(true);       
          $mail->Body = $plantilla;
          $mail->send();
}

function enviarEmailAdministrativo($nombre, $email, $telefono, $comentario){
     $plantilla = "";
     $ruta = "../emailtemaplate/requestpage.html";
     $fp = fopen($ruta,"r");     
     while ($linea= fgets($fp,2048))
       $plantilla.= $linea;
     
     /// Reemplazo los campos  
     $plantilla = str_replace("{nombre}", $nombre , $plantilla);
     $plantilla = str_replace("{emailcliente}", $email , $plantilla);
     $plantilla = str_replace("{telefono}", $telefono , $plantilla);
     $plantilla = str_replace("{nota}", $comentario , $plantilla);

     $mail = new PHPMailer;
     $mail->isSMTP();
     $mail->SMTPDebug = 0;     
     $mail->Debugoutput = 'html';
     $mail->Host = 'stve.wnkserver5.com';
     $mail->Port = 25;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Timeout=20;
     $mail->CharSet = "text/html; charset=UTF-8;";
     $mail->Username = "servicioalcliente@dromedicas.com.co";
     $mail->Password = "Dromedicas2013.";
     $mail->setFrom('servicioalcliente@dromedicas.com.co', 'Droguerias Farmanorte');//direccion origen
     $mail->addReplyTo('elianaarredondo@dromedicas.com.co', 'Droguerias Farmanorte');//direccion que recibe respuestas 
     $mail->addAddress('elianaarredondo@dromedicas.com.co', "Direccion Cliente");//direccion de destio
     $mail->addAddress('sistemas2@dromedicas.com.co', "Direccion Cliente");//direccion de destio2
     $mail->addAddress('sistemas@dromedicas.com.co', "Direccion Cliente");//direccion de destio2
   
     $mail->Subject = 'Farmanorte.com - Contacto de Cliente';//asunto
     
     $mail->isHTML(true);       
     $mail->Body = $plantilla;
     $mail->send();
}

?>