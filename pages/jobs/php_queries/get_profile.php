<?php 

include '../../includes/config.php';
$user_id = $_GET['user_id'];
$getuser = mysqli_query($conn,"SELECT * FROM tbl_login WHERE  user_id = $user_id ");

$response = array();
   foreach($getuser as $data){
      $response[] = array(
        "fname" => $data['first_name'],
        "lname" => $data['last_name'],
      
      );
   }


echo json_encode($response);





?>