<?php 
session_start();
header("Access-Control-Allow-Origin: *");

	$data = json_decode(file_get_contents('php://input'), true);


    $_SESSION["tokenId"]=$data['tokenId'];

	echo '{"success": "true"}';


?>