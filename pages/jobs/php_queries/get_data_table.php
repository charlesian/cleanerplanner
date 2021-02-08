<?php 

include '../../includes/config.php';
$user = $_GET['user'];
$getuserid = mysqli_query($conn,"SELECT user_id FROM tbl_login WHERE username = '$user'");
$rowU = mysqli_fetch_array($getuserid);
$user_id = $rowU['user_id'];
$getsource = mysqli_query($conn,"SELECT tj.job_id,tj.jobs_sched_date,tj.job_notes,tj.job_ref,tc.cust_ref,tc.cust_address1,concat(cust_fname,' ',cust_lname) as name,tj.number_d_w_m as one_off,tj.jobs_price1,tj.jobs_balance,tj.my_round,tj.stats,tj.checkbox_ref1,tj.checkbox_ref2,tj.checkbox_ref3 FROM tbl_jobs tj LEFT JOIN tbl_customer tc on tc.customer_id = tj.customer_id WHERE tc.user_id  = $user_id ORDER BY tj.jobs_sched_date DESC");


$response = array();
   foreach($getsource as $data){
      $response[] = array(
        "id" => $data['job_id'],
        "jobs_sched_date" => $data['jobs_sched_date'],
        "job_notes" => $data['job_notes'],
        "job_ref" => $data['job_ref'],
        "cust_ref" => $data['cust_ref'],
        "cust_address1" => $data['cust_address1'],
        "one_off" => $data['one_off'],
        "jobs_price1" => $data['jobs_price1'],
        "jobs_balance" => $data['jobs_balance'],
        "my_round" => $data['my_round'],
        "stats" => $data['stats'],
        "name" => $data['name'],
        "checkbox_ref1" => $data['checkbox_ref1'],
        "checkbox_ref2" => $data['checkbox_ref2'],
        "checkbox_ref3" => $data['checkbox_ref3'],
      
      );
   }


echo json_encode($response);





?>