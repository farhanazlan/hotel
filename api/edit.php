<?php
    $conn = new mysqli('localhost', 'root', '', 'maifara');
    
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false, 'quantity' => false, 'alias' => false);

	$ID = $data->ID;
    $password = $data->password;
    $fullname = $data->fullname;
    $phone = $data->phone;
	$email = $data->email;
	
	$sql = "SELECT ID FROM customer WHERE ID = '$ID'";
	$query=$conn->query($sql);
	if($query->num_rows > 0) {
		 
		 $sql = "INSERT INTO customer (ID, password, fullname, phone, email) 
		 VALUES ('$ID', '$password', '$fullname', '$phone', '$email')";
		$query = $conn->query($sql);
	}
	else {
		$out['message'] = 'Alias ID does not exist!';
	}    
    echo json_encode($out);
?>