<?php 
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

    $data = json_decode(file_get_contents('php://input'), true);

	$ID = $data['ID'];
	$m_uuid = $data['m_uuid'];
	$m_key = $data['m_key'];
	$dateJoined = $data['dateJoined'];
	$dateDeleted = $data['dateDeleted'];
	$status = $data['status'];


$result = $db->query("
INSERT INTO `merchantDetails`(`ID`, `m_uuid`, `m_key`, `dateJoined`, `dateDeleted`, `status`)
VALUES 
(
	NULL,
	'$m_uuid',
	'$m_key',
	CURRENT_TIMESTAMP,
	'',
	1
)
");


if($result)
{
 	echo '{"error":"false", "Message":"Thank you, your merchant details have been created"}';
}
else
{
 	echo '{"error":"'. mysqli_error($db).'"}';
}


?>