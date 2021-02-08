<?php 

include '../../includes/config.php';
$user = $_GET['user'];
$job_postcode = $_GET['job_postcode'];
$job_country = $_GET['job_country'];
$job_town = $_GET['job_town'];
$job_address2 = $_GET['job_address2'];
$job_address1 = $_GET['job_address1'];
$checkbox_job_diff = $_GET['checkbox_job_diff'];
$customer_id = $_GET['customer_dropdown'];
	

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
  job_postcode,
  job_country,
  job_town,
  job_address2,
  job_address1
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
	'$job_postcode',
	'$job_country',
	'$job_town',
	'$job_address2',
	'$job_address1'
	)
	");

$select_custmer = mysqli_query($conn,"SELECT job_id FROM tbl_jobs WHERE user_id ='$user_id' AND customer_id = '$customer_id' ");
$rowI = mysqli_fetch_array($select_custmer);
$job_id = $rowI['job_id'];

$select_custmer2 = mysqli_query($conn,"SELECT cust_town,cust_fname,cust_lname,cust_address1,cust_address2,cust_country,cust_postcode,cust_mobile,cust_phone,cust_email FROM tbl_customer WHERE customer_id = '$customer_id' ");
$row = mysqli_fetch_array($select_custmer2);
$cust_fname = $row['cust_fname'];
$cust_lname = $row['cust_lname'];
$name = $cust_fname.' '.$cust_lname;


$response = array();
	$response[] = array(
		"id" => $job_id,
		"cust_ref" => $customer_id,
		"name" => $name,
		"cust_address1" => $row['cust_address1'],
		"cust_address2" => $row['cust_address2'],
		"cust_town" => $row['cust_town'],
		"cust_country" => $row['cust_country'],
		"cust_postcode" => $row['cust_postcode'],
		"cust_mobile" => $row['cust_mobile'],
		"cust_phone" => $row['cust_phone'],
		"cust_email" => $row['cust_email'],

		"job_postcode" => $_GET['job_postcode'],
		"job_country" => $_GET['job_country'],
		"job_town" => $_GET['job_town'],
		"job_address2" => $_GET['job_address2'],
		"job_address1" => $_GET['job_address1'],

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