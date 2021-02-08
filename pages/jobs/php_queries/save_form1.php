<?php 

include '../../includes/config.php';
$user = $_GET['user'];
$cust_ref = $_GET['cust_ref'];
$source_dropdown = $_GET['source_dropdown'];
$cust_title = $_GET['cust_title'];
$cust_fname = $_GET['cust_fname'];
$cust_lname = $_GET['cust_lname'];
$cust_company = $_GET['cust_company'];
$cust_address1 = $_GET['cust_address1'];
$cust_address2 = $_GET['cust_address2'];
$cust_town = $_GET['cust_town'];
$cust_country = $_GET['cust_country'];
$cust_postcode = $_GET['cust_postcode'];
$cust_mobile = $_GET['cust_mobile'];
$cust_phone = $_GET['cust_phone'];
$cust_email = $_GET['cust_email'];


$job_ref = $_GET['job_ref'];
$checkbox_ref1 = $_GET['checkbox_ref1'];
$checkbox_ref2 = $_GET['checkbox_ref2'];
$checkbox_ref3 = $_GET['checkbox_ref3'];
$my_round = $_GET['my_round'];
$window_cleaning = $_GET['window_cleaning'];
$job_hrs = $_GET['job_hrs'];
$job_mins = $_GET['job_mins'];
$job_ppl = $_GET['job_ppl'];
$jobs_sched_date = $_GET['jobs_sched_date'];
$number_d_w_m = $_GET['number_d_w_m'];
$d_w_m_option1 = $_GET['d_w_m_option1'];
$d_w_m_option2 = $_GET['d_w_m_option2'];
$jobs_price1 = $_GET['jobs_price1'];
$per_jobs = $_GET['per_jobs'];
$jobs_price2 = $_GET['jobs_price2'];
$jobs_price3 = $_GET['jobs_price3'];
$checkbox_job_price = $_GET['checkbox_job_price'];
$payment_method = $_GET['payment_method'];
$checkbox_jobs_invoice = $_GET['checkbox_jobs_invoice'];
$job_notes = $_GET['job_notes'];
$checkbox_notes = $_GET['checkbox_notes'];
$new_customer_input = "new";

$getuserid = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowU = mysqli_fetch_array($getuserid);
$user_id = $rowU['user_id'];

$insert_new_customer = mysqli_query($conn,"INSERT INTO tbl_customer(
	 user_id,
	 source_dropdown,
	 cust_ref,
	 cust_title,
	 cust_fname,
	 cust_lname,
	 cust_company,
	 cust_address1,
	 cust_address2,
	 cust_town,
	 cust_country,
	 cust_postcode,
	 cust_mobile,
	 cust_phone,
	 cust_email 
	 ) 
	VALUES (
	'$user_id',
	'$source_dropdown',
	'$cust_ref',
	'$cust_title',
	'$cust_fname',
	'$cust_lname',
	'$cust_company',
	'$cust_address1',
	'$cust_address2',
	'$cust_town',
	'$cust_country',
	'$cust_postcode',
	'$cust_mobile',
	'$cust_phone',
	'$cust_email')
	");

$select_custmer = mysqli_query($conn,"SELECT customer_id FROM tbl_customer WHERE cust_fname ='$cust_fname' AND cust_lname = '$cust_lname' ");
$rowI = mysqli_fetch_array($select_custmer);
$customer_id = $rowI['customer_id'];


if ($insert_new_customer) {

$insert_job = mysqli_query($conn,"INSERT INTO tbl_jobs(
  user_id,
  customer_id,
  job_ref,
  checkbox_ref1,
  checkbox_ref2,
  checkbox_ref3,
  my_round,
  window_cleaning,
  job_hrs,
  job_mins,
  job_ppl,
  jobs_sched_date,
  number_d_w_m,
  d_w_m_option1,
  d_w_m_option2,
  jobs_price1,
  per_jobs,
  jobs_price2,
  jobs_price3,
  checkbox_job_price,
  payment_method,
  checkbox_jobs_invoice,
  job_notes,
  checkbox_notes,
  new_customer_input
  ) 
	VALUES (
	'$user_id',
	'$customer_id',
	'$job_ref',
	'$checkbox_ref1',
	'$checkbox_ref2',
	'$checkbox_ref3',
	'$my_round',
	'$window_cleaning',
	'$job_hrs',
	'$job_mins',
	'$job_ppl',
	'$jobs_sched_date',
	'$number_d_w_m',
	'$d_w_m_option1',
	'$d_w_m_option2',
	'$jobs_price1',
	'$per_jobs',
	'$jobs_price2',
	'$jobs_price3',
	'$checkbox_job_price',
	'$payment_method',
	'$checkbox_jobs_invoice',
	'$job_notes',
	'$checkbox_notes',
	'$new_customer_input'
	)
	");

}

$select_custmer = mysqli_query($conn,"SELECT job_id FROM tbl_jobs WHERE user_id ='$user_id' AND customer_id = '$customer_id' ");
$rowI = mysqli_fetch_array($select_custmer);
$customer_id = $rowI['job_id'];

$cust_fname = $_GET['cust_fname'];
$cust_lname = $_GET['cust_lname'];
$name = $cust_fname.' '.$cust_lname;

if ($cust_ref == '') {
$cust_ref = $user_id;
}else{
$cust_ref = $_GET['cust_lname'];
}
$response = array();
	$response[] = array(
		"id" => $customer_id,
		"cust_ref" => $cust_ref,
		"source_dropdown" => $_GET['source_dropdown'],
		"cust_title" => $_GET['cust_title'],
		"name" => $name,
		"cust_company" => $_GET['cust_company'],
		"cust_address1" => $_GET['cust_address1'],
		"cust_address2" => $_GET['cust_address2'],
		"cust_town" => $_GET['cust_town'],
		"cust_country" => $_GET['cust_country'],
		"cust_postcode" => $_GET['cust_postcode'],
		"cust_mobile" => $_GET['cust_mobile'],
		"cust_phone" => $_GET['cust_phone'],
		"cust_email" => $_GET['cust_email'],

		// "job_postcode" => $_GET['job_postcode'],
		// "job_country" => $_GET['job_country'],
		// "job_town" => $_GET['job_town'],
		// "job_address2" => $_GET['job_address2'],
		// "job_address1" => $_GET['job_address1'],

		"job_ref" => $_GET['job_ref'],
		"checkbox_ref1" => $_GET['checkbox_ref1'],
		"checkbox_ref2" => $_GET['checkbox_ref2'],
		"checkbox_ref3" => $_GET['checkbox_ref3'],
		"my_round" => $_GET['my_round'],
		"window_cleaning" => $_GET['window_cleaning'],
		"job_hrs" => $_GET['job_hrs'],
		"job_mins" => $_GET['job_mins'],
		"job_ppl" => $_GET['job_ppl'],
		"jobs_sched_date" => $_GET['jobs_sched_date'],
		"number_d_w_m" => $_GET['number_d_w_m'],
		"d_w_m_option1" => $_GET['d_w_m_option1'],
		"d_w_m_option2" => $_GET['d_w_m_option2'],
		"jobs_price1" => $_GET['jobs_price1'],
		"per_jobs" => $_GET['per_jobs'],
		"jobs_price2" => $_GET['jobs_price2'],
		"jobs_price3" => $_GET['jobs_price3'],
		"checkbox_job_price" => $_GET['checkbox_job_price'],
		"payment_method" => $_GET['payment_method'],
		"checkbox_jobs_invoice" => $_GET['checkbox_jobs_invoice'],
		"job_notes" => $_GET['job_notes'],
		"checkbox_notes" => $_GET['checkbox_notes'],
	);
echo json_encode($response);



?>