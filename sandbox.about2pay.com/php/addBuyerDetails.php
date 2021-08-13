<?php 
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

    $data = json_decode(file_get_contents('php://input'), true);

	$ID = $data['ID'];
	$b_name = $data['b_name'];
	$b_surname = $data['b_surname'];
	$b_email = $data['b_email'];
	$b_mobile = $data['b_mobile'];
	$dateJoined = $data['dateJoined'];
	$dateDeleted = $data['dateDeleted'];
	$status = $data['status'];


$result = $db->query("
INSERT INTO `buyerDetails`(`ID`, `b_name`, `b_surname`, `b_email`, `b_mobile`, `dateJoined`, `dateDeleted`, `status`)
VALUES 
(
	NULL,
	'$b_name',
	'$b_surname',
	'$b_email',
	'$b_mobile',
	CURRENT_TIMESTAMP,
	'',
	1
)
");


if($result)
{
 	echo '{"error":"false", "Message":"Thank you, your buyer details have been created"}';
}
else
{
 	echo '{"error":"'. mysqli_error($db).'"}';
}


?>