<?php 
// include("../../config.php");

// $filters->inventory_version = "plus";
// $filters->semester = "AY 24-25";
// $filters->org_name = "3840aa6f-a1d5-462b-b9b2-5d60b80a34e5";
$filters->implementation_type = "work-exp";
$filter = json_encode($filters);

$data = new stdClass();
$data->filters = json_decode($filter);
echo json_encode($data);
$url = $base_url."work-experience";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$work = curl_exec($ch);
curl_close($ch);
// echo "Work";
echo "<pre>$work</pre>";
?>