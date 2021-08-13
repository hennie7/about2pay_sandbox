<?php

//	header("Access-Control-Allow-Origin: *");
//	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
//	header('Access-Control-Allow-Headers: *');

//	$data = json_decode(file_get_contents('php://input'), true);
  $data = [ 'name' => 'TEST' ];
      // will encode to JSON object: {"name":"God","age":-1}
      // accessed as example in JavaScript like: result.name or result['name'] (returns "God")



  echo json_encode( $data );



?>
