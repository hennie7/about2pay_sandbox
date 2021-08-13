<?php
header("Access-Control-Allow-Origin: *");
include 'dbConnect.php';

$data = json_decode(file_get_contents('php://input'), true);

$id =strval($data['tokenId']);



$result2 = $db->query("SELECT * FROM `tokens` WHERE `id` = '".$id."'");

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
   echo '{"error":"'. mysqli_error($db).'"}';
  // $mVerfied = "false with DB error";
  //echo ("grr3");
}



?>
