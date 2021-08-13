<?php 
header("Access-Control-Allow-Origin: *");
include 'dbConnect.php';



$m_uuid =$_GET['m_uuid'];
$secret =$_GET['secret'];
$m_account_uuid =$_GET['m_account_uuid'];
$m_name =$_GET['m_name'];


$result2 = $db->query("
INSERT IGNORE INTO `merchants` (`m_uuid`,  `secret`, `m_account_uuid`, `m_name`)
VALUES
(
	'$m_uuid',
	'$secret',
	'$m_account_uuid',
	'$m_name'
)
");

if($result2)
{
 
   echo '{"error":"false", "Message":"Thank you, your merchant details have been created"}';
}
else
{
  // echo '{"error":"'. mysqli_error($db).'"}';
  // $mVerfied = "false with DB error";
  echo '{"error":"'. mysqli_error($db).'"}';
}



?>