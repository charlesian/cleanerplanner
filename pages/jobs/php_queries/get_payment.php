<?php 

include '../../includes/config.php';

$getsource = mysqli_query($conn,"SELECT payment FROM tbl_payment ORDER BY payment ASC");

$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "payment" => $data['payment'],
      );
   }


echo json_encode($response);





?>