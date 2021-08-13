<?php 
header("Access-Control-Allow-Origin: *");
include 'dbConnect.php';

$data = json_decode(file_get_contents('php://input'), true);

$m_uuid =$data['m_uuid'];
$m_key =base64_encode($data['m_key']);


//$result2 = $db->query("SELECT * FROM `merchantDetails` WHERE `m_key` = '".$m_key."'"); 
$result2 = $db->query("SELECT * FROM `merchants` WHERE `m_uuid` = '".$m_uuid."'");

if($result2)
{
 
    $emparray = array();
    while($row =$result2->fetch_assoc())
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
  
  
   // $rcpUuid = $row3['m_uuid'];
   // echo ($rcpUuid . "  |  ");
  
  // User is active and on the system
}
else
{
  // echo '{"error":"'. mysqli_error($db).'"}';
  // $mVerfied = "false with DB error";
  echo '{"error":"'. mysqli_error($db).'"}';
}



?>