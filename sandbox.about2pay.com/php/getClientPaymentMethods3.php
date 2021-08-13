<?php

	$ECOMAPI='https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php';
    session_start();

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

	$data = json_decode(file_get_contents('php://input'), true);


	$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $ECOMAPI);
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data );
	$getOpts 	= curl_exec($ch);

	

	curl_close($ch);

	
	echo $getOpts;


?>
