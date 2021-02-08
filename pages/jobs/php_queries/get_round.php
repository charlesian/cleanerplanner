<?php 

include '../../includes/config.php';

$getsource = mysqli_query($conn,"SELECT round FROM tbl_round ORDER BY round ASC");

$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "round" => $data['round'],
      );
   }


echo json_encode($response);





?>