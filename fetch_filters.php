<?php 
$filters = new stdClass();

if($_POST["inventory_version"] != "")
$filters->inventory_version = htmlspecialchars($_POST['inventory_version'], ENT_QUOTES, 'UTF-8');

if($_POST["org"] != "")
$filters->org_name = htmlspecialchars($_POST['org'], ENT_QUOTES, 'UTF-8');

if($_POST["implementation_type"] != "")
$filters->implementation_type = htmlspecialchars($_POST['implementation_type'], ENT_QUOTES, 'UTF-8');

if($_POST["implementation_time"] != "")
$filters->implementation_time = htmlspecialchars($_POST['implementation_time'], ENT_COMPAT, 'UTF-8');

if($_POST["semester"] != ""){
$filters->semester = htmlspecialchars($_POST['semester'], ENT_QUOTES, 'UTF-8');
}

if($_POST["use_case_id"] != "")
$filters->use_case_id = htmlspecialchars($_POST['use_case_id'], ENT_QUOTES, 'UTF-8');

if($_POST["academic_level"] != "")
$filters->academic_level = htmlspecialchars($_POST['academic_level'], ENT_COMPAT, 'UTF-8');

$data = new stdClass();
$data->filters = $filters;

function fetch_data($url, $data) {
    $ch = curl_init($url);
    $payload = json_encode($data);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    // echo json_encode($response);
}

define('API_BASE_URL', 'https://ged4f9bmkk.execute-api.us-east-1.amazonaws.com/dev/');
define('API_ALL_DROPDOWNS_ENDPOINT', API_BASE_URL . '/get-dropdown-filters-test');

$allfilters = json_decode(fetch_data(API_ALL_DROPDOWNS_ENDPOINT,$data),true);

echo json_encode($allfilters);
?>