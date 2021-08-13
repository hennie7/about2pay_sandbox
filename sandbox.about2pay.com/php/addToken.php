<?php
    header("Access-Control-Allow-Origin: *");
    include 'dbConnect.php';

    $data = json_decode(file_get_contents('php://input'), true);




	$id = strval($data['id']);
	$m_tx_item_name = $data['m_tx_item_name'];
  $m_tx_item_description = $data['m_tx_item_description'];
  $m_tx_message = $data['m_tx_message'];
  $m_notify_url = $data['m_notify_url'];
	$m_tx_order_nr = $data['m_tx_order_nr'];
	$m_tx_invoice_nr = $data['m_tx_invoice_nr'];
  $m_tx_due_date = $data['m_tx_due_date'];
	$m_return_url = $data['m_return_url'];
  $m_tx_cc_allowed = $data['m_tx_cc_allowed'];
  $m_tx_dc_allowed = $data['m_tx_dc_allowed'];
  $m_tx_eft_allowed = $data['m_tx_eft_allowed'];
  $m_tx_ch_allowed = $data['m_tx_ch_allowed'];
	$m_tx_mp_allowed = $data['m_tx_mp_allowed'];
	$m_tx_cd_allowed = $data['m_tx_cd_allowed'];
  $m_tx_ss_allowed = $data['m_tx_ss_allowed'];
	$m_tx_zp_allowed = $data['m_tx_zp_allowed'];
	$m_tx_trident_allowed = $data['m_tx_trident_allowed'];
  /*$id = $_GET['id'];
  $m_tx_item_name = $_GET['m_tx_item_name'];
  $m_tx_order_nr = $_GET['m_tx_order_nr'];
  $m_tx_invoice_nr = $_GET['m_tx_invoice_nr'];
    $m_due_date = $_GET['m_tx_due_date'];
  $m_return_url = $_GET['m_return_url'];*/


$result = $db->query("
INSERT IGNORE INTO `tokens` (`id`,  `m_tx_item_name`, `m_tx_order_nr`, `m_tx_invoice_nr`, `m_tx_due_date`, `m_return_url`,`m_notify_url`,
`m_tx_message`,`m_tx_item_description`,
`m_tx_cc_allowed`,`m_tx_dc_allowed`,`m_tx_eft_allowed`,`m_tx_ch_allowed`,`m_tx_mp_allowed`,`m_tx_cd_allowed`,`m_tx_ss_allowed`,`m_tx_zp_allowed`,`m_tx_trident_allowed`)
VALUES
(
	'$id',
	'$m_tx_item_name',
	'$m_tx_order_nr',
	'$m_tx_invoice_nr',
	'$m_tx_due_date',
	'$m_return_url',
  '$m_notify_url',
  '$m_tx_message',
  '$m_tx_item_description',
  '$m_tx_cc_allowed',
  '$m_tx_dc_allowed',
  '$m_tx_eft_allowed',
  '$m_tx_ch_allowed',
  '$m_tx_mp_allowed',
  '$m_tx_cd_allowed',
  '$m_tx_ss_allowed',
  '$m_tx_zp_allowed',
  '$m_tx_trident_allowed'

)
");


if($result)
{
 	echo '{"error":"false", "Message":"Thank you, your token has been created"}';
}
else
{
 	echo '{"error":"'. mysqli_error($db).'"}';
}


?>
