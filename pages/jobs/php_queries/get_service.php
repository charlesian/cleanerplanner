<?php 

include '../../includes/config.php';

$getsource = mysqli_query($conn,"SELECT service FROM tbl_service ORDER BY service ASC");

$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "service" => $data['service'],
      );
   }


echo json_encode($response);





?>