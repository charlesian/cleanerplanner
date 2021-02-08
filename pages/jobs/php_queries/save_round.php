<?php 

include '../../includes/config.php';

$jobs_round = $_GET['jobs_round'];
$user = $_GET['user'];
$val = $_GET['val'];


$getuser = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowu = mysqli_fetch_array($getuser);
$user = $rowu['user_id'];

$save_source = mysqli_query($conn,"INSERT INTO tbl_round(round,user,is_check) VALUES('$jobs_round','$user','$val')");

if ($save_source) {
    # code...
    $response = $jobs_round;
}else{
    $response = 2;
}


echo json_encode($response);





?>