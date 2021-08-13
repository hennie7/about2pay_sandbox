<?php
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

			$data = json_decode(file_get_contents('php://input'), true);
			$ch = curl_init();
			
			
			curl_setopt($ch,CURLOPT_URL, $data['notifyurl']);
			//curl_setopt($ch,CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
			$result = curl_exec($ch);
			curl_close($ch);
			//echo $result;
			  $File = "LogFile.txt"; 

 $Handle = fopen($File, 'a');


 fwrite($Handle, json_encode( $data )."\n"); 
 fwrite($Handle, json_encode( $result )."\n");


 fclose($Handle); 
  echo json_encode( $data );



?>
