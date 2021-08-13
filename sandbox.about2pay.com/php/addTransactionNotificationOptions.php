<?php 
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

    $data = json_decode(file_get_contents('php://input'), true);

	$ID = $data['ID'];
	$m_return_url = $data['m_return_url'];
	$m_cancel_url = $data['m_cancel_url'];
	$m_pending_url = $data['m_pending_url'];
	$m_notify_url = $data['m_notify_url'];
	$m_email_address = $data['m_email_address'];
	$dateJoined = $data['dateJoined'];
	$dateDeleted = $data['dateDeleted'];
	$status = $data['status'];

$result = $db->query("
INSERT INTO `transactionNotificationOptions`(`ID`, `m_return_url`, `m_cancel_url`, `m_pending_url`, `m_notify_url`, `m_email_address`, `dateJoined`, `dateDeleted`, `status`)
VALUES 
(
	NULL,
	'$m_return_url',
	'$m_cancel_url',
	'$m_pending_url',
	'$m_notify_url',
	'$m_email_address',
	CURRENT_TIMESTAMP,
	'',
	1
)
");


if($result)
{
 	echo '{"error":"false", "Message":"Thank you, your transaction notification settings have been created"}';
}
else
{
 	echo '{"error":"'. mysqli_error($db).'"}';
}


?>