<?php 

include '../../includes/config.php';

$getsource = mysqli_query($conn,"SELECT source FROM tbl_source ORDER BY source ASC");

$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "source" => $data['source'],
      );
   }


echo json_encode($response);





?>