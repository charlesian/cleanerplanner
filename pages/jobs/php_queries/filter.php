<?php 
include '../../includes/config.php';
$filter_round = $_GET['filter_round']; 
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

if (in_array('Job Ref', $headers)) {
	$col[] = 'job_ref';
}

if (in_array('Cust Ref', $headers)) {
	$col[] = 'cust_ref';
}

if (in_array('Address 1', $headers)) {
	$col[] = 'cust_address1';
}
if (in_array('Address', $headers)) {
	$col[] = 'cust_address1';
}
if (in_array('Address 2', $headers)) {
	$col[] = 'cust_address2';
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
	$col[] = 'd_w_m_option1';
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
if (in_array('Start', $headers)) {
	$col[] = 'stats';
}


foreach ($col as $asd) {
	$col[] = $asd;
}
$columns = implode(',', $col);

$detault_values = "job_id,checkbox_ref2,checkbox_ref3,checkbox_jobs_invoice,checkbox_ref1,jobs_sched_date";
$date = date('Y-m-d');
$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));

$this_weekF = date('Y-m-d',strtotime('this Week'));  
$this_weekT = date('Y-m-d',strtotime($this_weekF . "+6 days"));

$next_weekF = date('Y-m-d',strtotime('next Week'));  
$next_weekT = date('Y-m-d',strtotime($next_weekF . "+6 days"));



if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'All Due Dates' && $filter_quote =='All Statuses')
{
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id  ORDER BY jobs_sched_date DESC ");
}



if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates != 'All Due Dates' && $filter_due_dates != 'Custom' && $filter_quote !='All Statuses')

{ 	

	if ($filter_due_dates == 'Overdue') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");
	

	}
	if ($filter_due_dates == 'Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date <= '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Today') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Tomorrow') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$tomorrow' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due This Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND checkbox_ref1 ='$filter_quote' AND jobs_sched_date between '$this_weekF' AND '$this_weekT' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Next Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND checkbox_ref1 ='$filter_quote' AND jobs_sched_date between '$next_weekF' AND '$next_weekT' ORDER BY jobs_sched_date DESC ");


	}
	if ($filter_due_dates == 'Not Yet Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$next_week' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");


	}

}








if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'All Due Dates' && $filter_quote =='All Statuses')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service'  ORDER BY jobs_sched_date DESC ");

}





if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates != 'All Due Dates' && $filter_due_dates != 'Custom' && $filter_quote =='All Statuses')
{ 	

		if ($filter_due_dates == 'Overdue') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$date' ORDER BY jobs_sched_date DESC ");
	

	}
	if ($filter_due_dates == 'Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date <= '$date' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Today') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$date' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Tomorrow') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date = '$tomorrow' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due This Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date between '$this_weekF' AND '$this_weekT' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Next Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date between '$next_weekF' AND '$next_weekT' ORDER BY jobs_sched_date DESC ");


	}
	if ($filter_due_dates == 'Not Yet Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$next_week' ORDER BY jobs_sched_date DESC ");


	}

}




if($filter_round != 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'All Due Dates' && $filter_quote =='All Statuses')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' ORDER BY jobs_sched_date DESC ");

}




if($filter_round == 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'All Due Dates' && $filter_quote =='All Statuses')
{ 	

	if ($filter_due_dates == 'Overdue') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");
	

	}
	if ($filter_due_dates == 'Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Today') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Tomorrow') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due This Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Next Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");


	}
	if ($filter_due_dates == 'Not Yet Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' ORDER BY jobs_sched_date DESC ");


	}

}









if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates != 'All Due Dates' && $filter_due_dates != 'Custom' && $filter_quote =='All Statuses')
{ 	

	if ($filter_due_dates == 'Overdue') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date < '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");
	

	}
	if ($filter_due_dates == 'Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date <= '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Today') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date = '$date' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Tomorrow') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date = '$tomorrow' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due This Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date between '$this_weekF' AND '$this_weekT' ORDER BY jobs_sched_date DESC ");

	}
	if ($filter_due_dates == 'Due Next Week') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date between '$next_weekF' AND '$next_weekT' ORDER BY jobs_sched_date DESC ");


	}
	if ($filter_due_dates == 'Not Yet Due') {
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date > '$next_week' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");


	}

}








if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'All Due Dates' && $filter_quote !='All Statuses')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");
}







if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$filter_due_date_from' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

}


if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date > '$filter_due_date_from' ORDER BY jobs_sched_date DESC ");

}


if($filter_round != 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND jobs_sched_date > '$filter_due_date_from' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE window_cleaning = '$filter_service' AND jobs_sched_date > '$filter_due_date_from' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date > '$filter_due_date_from' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to == '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date > '$filter_due_date_from' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

}










if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$filter_due_date_to' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

}



if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}



if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date < '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}


if($filter_round != 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND jobs_sched_date < '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE window_cleaning = '$filter_service' AND jobs_sched_date < '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}
if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date < '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from == '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date < '$filter_due_date_to' AND checkbox_ref1 ='$filter_quote' ORDER BY jobs_sched_date DESC ");

}













if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	echo "string";
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND checkbox_ref1 ='$filter_quote' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}


if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}

if($filter_round != 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND window_cleaning = '$filter_service' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}



if($filter_round != 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE my_round = '$filter_round' AND  jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}
if($filter_round == 'All Rounds' && $filter_service != 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE window_cleaning = '$filter_service' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}
if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote =='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}

if($filter_round == 'All Rounds' && $filter_service == 'All Services' && $filter_due_dates == 'Custom' && $filter_quote !='All Statuses' && $filter_due_date_from != '' && $filter_due_date_to != '')
{ 	
	$select = mysqli_query($conn,"SELECT $columns,$detault_values FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id WHERE checkbox_ref1 ='$filter_quote' AND jobs_sched_date BETWEEN '$filter_due_date_from' AND '$filter_due_date_to' ORDER BY jobs_sched_date DESC ");

}


$response = array();

foreach($select as $data){

	if(in_array('cust_ref', $col)){
		$cust_ref = $data['cust_ref'];
	}else{
		$cust_ref = 'no';

	}
	if(in_array('cust_address1', $col)){
		$cust_address1 = $data['cust_address1'];
	}else{
		$cust_address1 = 'no';

	}
	if(in_array('cust_address2', $col)){
		$cust_address2 = $data['cust_address2'];
	}else{
		$cust_address2 = 'no';

	}
	if(in_array('cust_town', $col)){
		$cust_town = $data['cust_town'];
	}else{
		$cust_town = 'no';

	}
	if(in_array('cust_country', $col)){
		$cust_country = $data['cust_country'];
	}else{
		$cust_country = 'no';

	}
	if(in_array('cust_postcode', $col)){
		$cust_postcode = $data['cust_postcode'];
	}else{
		$cust_postcode ='no';
	}
	if(in_array('cust_fname', $headers)){
		$cust_lname = $data['cust_lname'];
		$cust_fname = $data['cust_fname'];
		$name = $cust_fname.''.$cust_lname;
	}else{
		$name = 'no';
	}
	if(in_array('cust_phone', $col)){
		$cust_phone = $data['cust_phone'];
	}else{
		$cust_phone = 'no';
	}
	if(in_array('cust_mobile', $col)){
		$cust_mobile = $data['cust_mobile'];
	}else{
		$cust_mobile = 'no';
	}
	if(in_array('cust_email', $col)){
		$cust_email = $data['cust_email'];
	}else{
		$cust_email = 'no';
	}
	if(in_array('d_w_m_option1', $col)){
		$d_w_m_option1 = $data['d_w_m_option1'];
	}else{
		$d_w_m_option1 = 'no';
	}
	if(in_array('jobs_price1', $col)){
		$jobs_price1 = $data['jobs_price1'];
	}else{
		$jobs_price1 = 'no';
	}
	if(in_array('my_round', $col)){
		$my_round = $data['my_round'];
	}else{
		$my_round = 'no';
	}
	if(in_array('job_ref', $col)){
		$job_ref = $data['job_ref'];
	}else{
		$job_ref = 'no';

	}
	if(in_array('stats', $col)){
		$stats = $data['stats'];
	}else{
		$stats = 'no';
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
		"name" => $name,
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

if (json_encode($response) == '[]') {
	$response[] = 1;
}
echo json_encode($response);
exit;








?>