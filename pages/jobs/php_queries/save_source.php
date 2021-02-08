<?php 

include '../../includes/config.php';

$add_source = $_GET['add_source'];
$user = $_GET['user'];


$getuser = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowu = mysqli_fetch_array($getuser);
$user = $rowu['user_id'];

$save_source = mysqli_query($conn,"INSERT INTO tbl_source(source,user) VALUES('$add_source','$user')");

if ($save_source) {
    # code...
    $response = $add_source;
}else{
    $response = 2;
}


echo json_encode($response);





?>