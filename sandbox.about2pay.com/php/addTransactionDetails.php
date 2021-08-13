<?php 
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

    $data = json_decode(file_get_contents('php://input'), true);

	$ID = $data['ID'];
	$m_tx_id = $data['m_tx_id'];
	$m_tx_amount = $data['m_tx_amount'];
	$m_tx_item_name = $data['m_tx_item_name'];
	$m_tx_item_description = $data['m_tx_item_description'];
	$m_tx_account_uuid = $data['m_tx_account_uuid'];
	$m_tx_order_nr = $data['m_tx_order_nr'];
	$m_tx_invoice_nr = $data['m_tx_invoice_nr'];
	$m_tx_category_1 = $data['m_tx_category_1'];
	$m_tx_category_2 = $data['m_tx_category_2'];
	$tx_category_3 = $data['tx_category_3'];
	$m_tx_site_reference = $data['m_tx_site_reference'];
	$m_tx_site_name = $data['m_tx_site_name'];
	$m_tx_due_date = $data['m_tx_due_date'];
	$m_tx_message = $data['m_tx_message'];
	$dateJoined = $data['dateJoined'];
	$dateDeleted = $data['dateDeleted'];
	$status = $data['status'];

$result = $db->query("
INSERT INTO `transactionDetails`(`ID`, `m_tx_id`, `m_tx_amount`, `m_tx_item_name`, `m_tx_item_description`, `m_tx_account_uuid`, `m_tx_order_nr`, `m_tx_invoice_nr`, `m_tx_category_1`, `m_tx_category_2`, `tx_category_3`, `m_tx_site_reference`, `m_tx_site_name`, `m_tx_due_date`, `m_tx_message`, `dateJoined`, `dateDeleted`, `status`)
VALUES 
(
	NULL,
	'$m_tx_id',
	'$m_tx_amount',
	'$m_tx_item_name',
	'$m_tx_item_description',
	UUID(),
	'$m_tx_order_nr',
	'$m_tx_invoice_nr',
	'$m_tx_category_1',
	'$m_tx_category_2',
	'$tx_category_3',
	'$m_tx_site_reference',
	'$m_tx_site_name',
	'$m_tx_due_date',
	'$m_tx_message',
	CURRENT_TIMESTAMP,
	'',
	1
)
");


if($result)
{
 	echo '{"error":"false", "Message":"Thank you, your transaction has been created"}';
}
else
{
 	echo '{"error":"'. mysqli_error($db).'"}';
}


?>