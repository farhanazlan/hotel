<?php 
    $conn = new mysqli('localhost', 'root', '', 'maifara');
    
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false, 'ID' => false, 'password' => false, 'fullname' => false,
                 'phone' => false, 'email' => false);

    $ID = $data->ID;
    $password = $data->password;
    $fullname = $data->fullname;
    $phone = $data->phone;
    $email = $data->email;

    if(empty($ID)){
        $out['ID'] = true;
        $out['message'] = 'ID is required'; 
    } 
    elseif(empty($password)){
        $out['password'] = true;
        $out['message'] = 'password is required'; 
    }
    elseif(empty($fullname)){
        $out['fullname'] = true;
        $out['message'] = 'Fullname is required'; 
    }
    elseif(empty($phone)){
        $out['phone'] = true;
        $out['message'] = 'Mobile Phone No. is required'; 
    }
    elseif(empty($email)){
        $out['email'] = true;
        $out['message'] = 'email is required'; 
    }
    else{
        $sql = "INSERT INTO customer (ID, password, fullname, phone, email) 
                VALUES ('$ID', '$password', '$fullname', '$phone', '$email')";
        $query = $conn->query($sql);

        if($query){
            $out['message'] = 'Member Added Successfully';
        }
        else{
            $out['error'] = true;
            $out['message'] = 'Cannot Add Member';
        }
    }
        
    echo json_encode($out); 

    /*
$data = json_decode(file_get_contents("php://input"));
$cID = mysql_real_escape_string($data->cID);
$cpassword = mysql_real_escape_string($data->cpassword);
$cfullname = mysql_real_escape_string($data->cfullname);
$cphone = mysql_real_escape_string($data->$cphone);
$cemail = mysql_real_escape_string($data->$cemail);
mysql_connect("localhost", "root", ""); 
mysql_select_db("maifara");
mysql_query("INSERT INTO customer('ID', 'password', 'fullname', 'phone', 'email') VALUES('".$cID."','".$cpassword."','".$cfullname."','".$cphone."','".$cemail."')");
*/
?> 