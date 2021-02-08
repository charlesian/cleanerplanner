<?php 

include '../../includes/config.php';
$user = $_GET['user'];
$getsource = mysqli_query($conn,"SELECT cust_fname,cust_lname,customer_id FROM tbl_customer ORDER BY cust_fname ASC");

$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "id" => $data['customer_id'],
        "cust_fname" => $data['cust_fname'],
        "cust_lname" => $data['cust_lname'],
      );
   }


echo json_encode($response);





?>