<?php 

include '../../includes/config.php';
$cust_fname = $_GET['cust_fname'];
$cust_lname = $_GET['cust_lname'];
$getsource = mysqli_query($conn,"SELECT customer_id FROM tbl_customer WHERE cust_fname = '$cust_fname' AND cust_lname = '$cust_lname' ORDER BY cust_fname DESC LIMIT 1");


if (mysqli_num_rows($getsource)>0) {
$response = 1;
}else{
$response = 2;
}

echo json_encode($response);





?>