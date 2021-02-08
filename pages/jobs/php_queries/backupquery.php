<?php 
include '../../includes/config.php';
$val = $_GET['val'];
$val2 = $_GET['val'];

foreach ($val as $val) {
	$va[] = $val;
}
$val = implode(',', $va);
$headers = explode(',', $val);

$response = array();
$select = mysqli_query($conn,"SELECT job_id,checkbox_ref2,checkbox_ref3,checkbox_jobs_invoice,checkbox_ref1,$val FROM tbl_customer tc LEFT JOIN tbl_jobs tj on tj.customer_id = tc.customer_id ORDER BY jobs_sched_date DESC ");
foreach($select as $data){
	foreach ($headers as $header) {
		$response[] = array(
			"job_id" => $data['job_id'],
			"checkbox_ref1" => $data['checkbox_ref1'],
			"checkbox_ref2" => $data['checkbox_ref2'],
			"checkbox_ref3" => $data['checkbox_ref3'],
			"checkbox_jobs_invoice" => $data['checkbox_jobs_invoice'],
			$header => $data[$header],
		);
		// echo $data[$header]; echo "<br>";
	}
}
echo json_encode($response);
exit;

?>

