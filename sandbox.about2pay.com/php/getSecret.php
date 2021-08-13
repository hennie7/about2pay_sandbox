<?php
header("Access-Control-Allow-Origin: *");
include 'dbConnect.php';

$data = json_decode(file_get_contents('php://input'), true);

$m_account_uuid =strval($data['m_account_uuid']);



$result2 = $db->query("SELECT * FROM `merchants` WHERE `m_account_uuid` = '".$m_account_uuid."'");
	if($result2){
		$emparray = array();
		while($row =$result2->fetch_assoc())
		{
			$emparray[] = $row;
		}
	    echo json_encode($emparray);
	} else {
	   echo '{"error":"'. mysqli_error($db).'"}';return;
	}

   // $rcpUuid = $row3['m_uuid'];
   // echo ($rcpUuid . "  |  ");

  // User is active and on the system




?>
