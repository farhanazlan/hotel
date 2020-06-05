<?php
	$conn = new mysqli('localhost', 'root', '', 'maifara');
	
	$out = array();
	$sql = "SELECT * FROM type_room";
	$query=$conn->query($sql);
	while($row=$query->fetch_array()){
		$out[] = $row;
	}

	echo json_encode($out);
?>