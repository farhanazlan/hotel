<?php
    $conn = new mysqli('localhost', 'root', '', 'maifara');
    
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false);

    $orderID = $data->orderID;

   	$sql = "DELETE FROM customer WHERE ID = '$ID'";
   	$query = $conn->query($sql);

   	if($query){
   		$out['message'] = 'Order removed Successfully';
   	}
   	else{
   		$out['error'] = true;
   		$out['message'] = 'Cannot remove order';
   	}

    echo json_encode($out);
?>