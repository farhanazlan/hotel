<?php
    $conn = new mysqli('localhost', 'root', '', 'maifara');
    
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false, 'ID' => false, 'fullname' => false, 'type of room' => false,
                 'date' => false, 'time' => false);

    $ID = $data->ID;
    $fullname = $data->fullname;
	$typeofroom = $data->typeofroom;
    $date = $data->date;
    $time = $data->time;

	$sql = "SELECT reservation.ID, reservation.fullname, reservation.typeofroom, reservation.date, reservation.time 
			FROM reservation
			WHERE reservation.ID = '$ID' AND reservation.fullname = '$fullname' AND reservation.typeofroom = '$typeofroom' AND reservation = 'date' > 0";
	$query=$conn->query($sql);
	if($query->num_rows > 0) {
		$sql = "INSERT INTO orderlist (ID, fullname, typeofroom, date, time) 
      	        VALUES ('$ID', '$fullname', '$typeofroom', '$date', '$time')";
		$query = $conn->query($sql);
		$sql = "UPDATE `reservation`  WHERE ID = '$ID'";
		$query = $conn->query($sql);
	}
	else {
		$out['message'] = 'Authentication Failed!, Invalid Password!.';
	}    
    echo json_encode($out);
?>