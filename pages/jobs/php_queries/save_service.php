<?php 

include '../../includes/config.php';

$field_add_service = $_GET['field_add_service'];
$user = $_GET['user'];


$getuser = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowu = mysqli_fetch_array($getuser);
$user = $rowu['user_id'];

$save_source = mysqli_query($conn,"INSERT INTO tbl_service(service,user) VALUES('$field_add_service','$user')");

if ($save_source) {
    # code...
    $response = $field_add_service;
}else{
    $response = 2;
}


echo json_encode($response);





?>