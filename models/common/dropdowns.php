<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');


$base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
$filters = new stdClass();

$filters->semester = "Fall 2024 - Spring 2025";
$filters->org_name = "efb383d9-2b47-4dcc-ac2f-8b6e93568b74";
$filters->implementation_type = "general";
$filters->dropdown = "implementation_type";
$filter = json_encode($filters);

$data = new stdClass();
$data->filters = json_decode($filter);
$data->custom_questions = [];

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$impltype = curl_exec($ch);
echo "<pre>$impltype</pre>";
curl_close($ch);
?>