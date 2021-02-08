<?php 

include '../../includes/config.php';

$field_payment_add = $_GET['field_payment_add'];
$user = $_GET['user'];
$val = $_GET['val'];


$getuser = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowu = mysqli_fetch_array($getuser);
$user = $rowu['user_id'];

$save_source = mysqli_query($conn,"INSERT INTO tbl_payment(payment,user,is_check) VALUES('$field_payment_add','$user','$val')");

if ($save_source) {
    # code...
    $response = $field_payment_add;
}else{
    $response = 2;
}


echo json_encode($response);





?>