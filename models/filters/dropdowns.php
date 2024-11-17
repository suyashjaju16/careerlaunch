<?php  
error_reporting(E_ALL);
ini_set('display_errors', '1');


$base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
$filters = new stdClass();
$filters->inventory_version =  "plus";

// $filters->inventory_version = "plus";
// $filters->semester = "Fall 2024 - Spring 2025.";
$org = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['organization']);
$filters->org_name = $org;
if(isset($_GET['inventory'])){
$type = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['inventory']);
$filters->implementation_type =  $type;
}

$filter = json_encode($filters);

$data = new stdClass();
$data->type = "field";
$data->dropdown = "implementation_type";
$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$implementation_type = json_decode(curl_exec($ch), true);
curl_close($ch);



$data->dropdown = "semester";

$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$semester = json_decode(curl_exec($ch),true);
// echo $semester;
curl_close($ch);



$data->dropdown = "inventory_version";

$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$version = json_decode(curl_exec($ch),true);
// echo $version;
curl_close($ch);



$data->dropdown = "use_case_id";

$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$use_case_id = json_decode(curl_exec($ch),true);
// echo $use_case_id;
curl_close($ch);




$data->dropdown = "implementation_time";

$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$implementation_time = json_decode(curl_exec($ch),true);
// echo $implementation_time;
curl_close($ch);


$data->type= "demographics";
$data->dropdown = "AcademicLevel";

$data->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$academics = json_decode(curl_exec($ch),true);
// echo json_encode($demographics);
curl_close($ch);
?>