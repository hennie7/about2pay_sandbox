<?php

//SANDBOX
$dbHost = 'localhost';
$dbUsername = 'aboutpay_db';
$dbPassword = 'Wisdom007';
$dbName = 'aboutpay_db';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
else{
	// echo 'connected';
}
?>