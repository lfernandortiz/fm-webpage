<?php
			 $datajson = "";
      
       $dirWS = '';
       $ch = curl_init($dirWS);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_POSTFIELDS, $datajson);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($datajson))
       );
       curl_setopt($ch, CURLOPT_TIMEOUT, 5);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

       //execute post
       $jsonResponse = curl_exec($ch);
       echo $jsonResponse;

?>