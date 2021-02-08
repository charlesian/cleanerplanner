<?php 

include '../../includes/config.php';

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$password = $_GET['password'];
$user_id = $_GET['user_id'];

if ($password != '') {
$update = mysqli_query($conn,"UPDATE tbl_login SET first_name = '$fname', last_name = '$lname', password='$passowrd' WHERE user_id = '$user_id' ");
}else{
$update = mysqli_query($conn,"UPDATE tbl_login SET first_name = '$fname', last_name = '$lname' WHERE user_id = '$user_id' ");
}

if ($update) {
    # code...
    $response = 1;
}else{
    $response = 2;
}


echo json_encode($response);





?>