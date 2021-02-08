<?php 
include('../pages/includes/config.php');
$username = $_GET['username'];
$password = $_GET['password'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$subscription = $_GET['subscription'];
$code = $_GET['code'];
$date_now = date('Y-m-d');
$trial_end = date('Y-m-d', strtotime('+30 days'));

echo $add_date;exit;

if ($code == 1) {
$insertuser = mysqli_query($conn,"
	INSERT INTO tbl_login(first_name, last_name, username, password, subscription, date_subscription,date_expired,trial_start,trial_end) 
	VALUES 				('$first_name', '$last_name', '$username', '$password', '$subscription', now(), '$date_expired', now(), '$trial_end')");
}else{
$insertuser = mysqli_query($conn,"INSERT INTO tbl_login(first_name, last_name, username, password, subscription, date_subscription,date_expired) VALUES ('$first_name', '$last_name', '$username', '$password', now(), now(), '$date_expired')");
}

if ($insertuser) {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'http://localhost/pete/';
      </SCRIPT>");
}else{
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Err');
      </SCRIPT>");
}


?>