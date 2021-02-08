<?php 
include '../../includes/config.php';
$filter_round = $_GET['filter_round']; // always has value
$filter_service =  $_GET['filter_service'];
$filter_due_dates =  $_GET['filter_due_dates'];
$filter_due_date_from =  $_GET['filter_due_date_from'];
$filter_due_date_to =  $_GET['filter_due_date_to'];
$filter_quote =  $_GET['filter_quote'];

$val = $_GET['headertext'];
$val = array_filter($val);
$col = array();
foreach ($val as $val) {
	$val1 = $val;
}
$val = implode(',', $val1);
$headers = explode(',', $val);

// if (in_array('Due', $headers)) {
// 	$col[] = 'jobs_sched_date';
// }

if (in_array('Job Ref', $headers)) {
	$col[] = 'job_ref';
}

if (in_array('Cust Ref', $headers)) {
	$col[] = 'cust_ref';
}

if (in_array('Adress 1', $headers)) {
	$col[] = 'cust_addess1';
}
if (in_array('Adress 2', $headers)) {
	$col[] = 'cust_addess2';
}

if (in_array('Name', $headers)) {
	$col[] = 'cust_fname';
	$col[] = 'cust_lname';
}
if (in_array('Town', $headers)) {
	$col[] = 'cust_town';
}
if (in_array('Country', $headers)) {
	$col[] = 'cust_country';
}
if (in_array('Postcode', $headers)) {
	$col[] = 'cust_postcode';
}
if (in_array('Phone', $headers)) {
	$col[] = 'cust_phone';
}
if (in_array('Mobile', $headers)) {
	$col[] = 'cust_mobile';
}
if (in_array('Email', $headers)) {
	$col[] = 'cust_email';
}
if (in_array('Schedule', $headers)) {
	$col[] = 'number_d_w_m';
}
if (in_array('Price', $headers)) {
	$col[] = 'jobs_price1';
}
if (in_array('Round', $headers)) {
	$col[] = 'my_round';
}
if (in_array('Status', $headers)) {
	$col[] = 'stats';
}



foreach ($col as $asd) {
	$col1[] = $asd;
}
$col1 = implode(',', $col1);


echo "<br>";
echo $val;
echo "<br>";
http://localhost/cleaner/pages/jobs/php_queries/filter.php?filter_round=All%20Rounds&filter_service=&filter_due_dates=All%20Due%20Dates&filter_due_date_from=&filter_due_date_to=&filter_quote=All%20Statuses&headertext%5B0%5D%5B%5D=&headertext%5B0%5D%5B%5D=Due&headertext%5B0%5D%5B%5D=Worksheet&headertext%5B0%5D%5B%5D=Start&headertext%5B0%5D%5B%5D=&headertext%5B0%5D%5B%5D=&headertext%5B0%5D%5B%5D=&headertext%5B0%5D%5B%5D=

$detault_values = "job_id,checkbox_ref2,checkbox_ref3,checkbox_jobs_invoice,checkbox_ref1,jobs_sched_date";

// note :
/*
filter by service is missing or not yet define


*/
// if all is not empty
if ($filter_service == 'no' && $filter_due_dates == 'no' && $filter_due_date_from == 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){

	//filter it by round only

	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' ORDER BY jobs_sched_date DESC ");

}


// with filter service 
if ($filter_service != 'no' && $filter_due_dates == 'no' && $filter_due_date_from == 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){
	//filter it by round and service
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");

}

if ($filter_service != 'no' && $filter_due_dates != 'no' && $filter_due_date_from == 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){
	//filter it by round and service and All due date
	$date = date('Y-m-d');
	$tomorrow = date('m-d-Y',strtotime($date . "+1 days"));
	$this_week = new DateTime('this week');
	$this_week->format('Y-m-d');
	$next_week = new DateTime('next week');
	$next_week->format('Y-m-d');
	if ($filter_due_dates == 'Overdue') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$date' ORDER BY jobs_sched_date DESC ");
	}
	if ($filter_due_dates == 'Due') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date <= '$date' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Today') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$date' ORDER BY jobs_sched_date DESC ");
	}
	if ($filter_due_dates == 'Due Tomorrow') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$tomorrow' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due This Week') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$this_week' ORDER BY jobs_sched_date DESC ");
	}
	if ($filter_due_dates == 'Due Next Week') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$next_week' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Not Yet Due') {
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$next_week' ORDER BY jobs_sched_date DESC ");

	}
	

}

if ($filter_service != 'no' && $filter_due_dates != 'no' && $filter_due_date_from != 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){

	//filter it by round and service and All due date and due date from
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$filter_due_date_from' ORDER BY jobs_sched_date DESC ");

}
if ($filter_service != 'no' && $filter_due_dates != 'no' && $filter_due_date_from != 'no' && $filter_due_date_to != 'no' && $filter_quote == 'no'){

	//filter it by round and service and All due date and due date from and due date to 
	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}
if ($filter_service != 'no' && $filter_due_dates != 'no' && $filter_due_date_from != 'no' && $filter_due_date_to != 'no' && $filter_quote != 'no'){

	//filter it by round and service and All due date and due date from and due date to and quote

	$select = mysqli_query($conn,"SELECT $col1,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");
}



// with filter all due dates
if ($filter_due_dates != 'no' && $filter_service == 'no' && $filter_due_date_from == 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){
	//filter it by round and All due date


}


// with filter filter_due_date_from
if ($filter_due_date_from != 'no' && $filter_service == 'no' && $filter_due_dates == 'no' && $filter_due_date_to == 'no' && $filter_quote == 'no'){

	//filter it by round and filter_due_date_from

}

// with filter filter_due_date_to
if ($filter_due_date_to != 'no' && $filter_service == 'no' && $filter_due_date_from == 'no' && $filter_due_dates == 'no' && $filter_quote == 'no'){

	//filter it by round and filter_due_date_to

}

// with filter filter_quote
if ($filter_quote != 'no' && $filter_service == 'no' && $filter_due_date_from == 'no' && $filter_due_date_to == 'no' && $filter_due_dates == 'no'){
	//filter it by round and filter_quote


}

$response = array();
$display = array();
$display[]=$col1;

foreach($select as $data){


if(in_array('cust_ref', $display)){
	$cust_ref = $data['cust_ref'];
}else{
	$cust_ref = 'no';

}
if(in_array('cust_address1', $display)){
	$cust_address1 = $data['cust_address1'];
}else{
	$cust_address1 = 'no';

}
if(in_array('cust_address2', $display)){
	$cust_address2 = $data['cust_address2'];
}else{
	$cust_address2 = 'no';

}
if(in_array('cust_town', $display)){
	$cust_town = $data['cust_town'];
}else{
	$cust_town = 'no';

}
if(in_array('cust_country', $display)){
	$cust_country = $data['cust_country'];
}else{
	$cust_country = 'no';

}
if(in_array('cust_postcode', $display)){
	$cust_postcode = $data['cust_postcode'];
}else{
	$cust_postcode ='no';
}
if(in_array('cust_fname', $display)){
	$cust_fname = $data['cust_fname'];
	$cust_lname = $data['cust_lname'];
	$name = $cust_fname.' '.$cust_lname;
}else{
	$name = 'no';
}
if(in_array('cust_lname', $display)){
	$cust_fname = $data['cust_fname'];
	$cust_lname = $data['cust_lname'];
	$name = $cust_fname.' '.$cust_lname;
}else{
	$name = 'no';
}
if(in_array('cust_phone', $display)){
	$cust_phone = $data['cust_phone'];
}else{
	$cust_phone = 'no';
}
if(in_array('cust_mobile', $display)){
	$cust_mobile = $data['cust_mobile'];
}else{
	$cust_mobile = 'no';
}
if(in_array('cust_email', $display)){
	$cust_email = $data['cust_email'];
}else{
	$cust_email = 'no';
}
if(in_array('d_w_m_option1', $display)){
	$d_w_m_option1 = $data['d_w_m_option1'];
}
if(in_array('jobs_price1', $display)){
	$jobs_price1 = $data['jobs_price1'];
}else{
	$jobs_price1 = 'no';
}
if(in_array('my_round', $display)){
	$my_round = $data['my_round'];
}else{
	$my_round = 'no';
}
if(in_array('job_ref', $display)){
	$job_ref = $data['job_ref'];
}else{
	$job_ref = 'no';

}
if(in_array('stats', $display)){
	$stats = $data['stats'];
}else{
	$stats = 'no';
}

if(in_array('number_d_w_m', $display)){
	$one_off = $data['number_d_w_m'];
}else{
	$one_off = 'no';
}

	$job_id = $data['job_id'];
	$checkbox_ref1 = $data['checkbox_ref1'];
	$checkbox_ref2 = $data['checkbox_ref2'];
	$checkbox_ref3 = $data['checkbox_ref3'];
	$checkbox_jobs_invoice = $data['checkbox_jobs_invoice'];
	$jobs_sched_date = $data['jobs_sched_date'];

$response[] = array(
		"job_id" => $job_id,
		"checkbox_ref1" => $checkbox_ref1,
		"checkbox_ref2" => $checkbox_ref2,
		"checkbox_ref3" => $checkbox_ref3,
		"checkbox_jobs_invoice" => $checkbox_jobs_invoice,
		"job_ref" => $job_ref,
		"jobs_sched_date" => $jobs_sched_date,
		"cust_ref" => $cust_ref,
		"cust_address1" => $cust_address1,
		"cust_address2" => $cust_address2,
		"cust_town" => $cust_town,
		"cust_country" => $cust_country,
		"cust_postcode" => $cust_postcode,
		"cust_fname" => $cust_fname,
		"name" => $name,
		"cust_lname" => $cust_lname,
		"cust_phone" => $cust_phone,
		"cust_mobile" => $cust_mobile,
		"cust_email" => $cust_email,
		"d_w_m_option1" => $d_w_m_option1,
		"jobs_price1" => $jobs_price1,
		"my_round" => $my_round,
		"stats" => $stats,
	);
		// echo $data[$header]; echo "<br>";
}
echo json_encode($response);
exit;








?>