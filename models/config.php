<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

$base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";

// Initialize the filters object
$filters = new stdClass();

// Check and set each filter dynamically, excluding empty values

// $filters->inventory_version = "nace";
// $filters->implementation_time = "pre";


// Inventory Version (from POST)
if (isset($_POST['data_type']) && $_POST['data_type'] !== "nace") {
    $filters->inventory_version = htmlspecialchars($_POST['data_type'], ENT_QUOTES, 'UTF-8');
}

// Organization name (from GET)
if (isset($_GET['organization']) && $_GET['organization'] !== "") {
    $filters->org_name = htmlspecialchars($_GET['organization'], ENT_QUOTES, 'UTF-8');
}

// Inventory type (from GET)
if (isset($_GET['inventory']) && $_GET['inventory'] !== "") {
    $filters->implementation_type = htmlspecialchars($_GET['inventory'], ENT_QUOTES, 'UTF-8');
}
// Implementation type (from POST)
else if (isset($_POST['implementation_type']) && $_POST['implementation_type'] !== "") {
    $filters->implementation_type = htmlspecialchars($_POST['implementation_type'], ENT_QUOTES, 'UTF-8');
}

// Implementation Time (from POST)
else if (isset($_POST['implementation_time']) && $_POST['implementation_time'] !== "") {
    $filters->implementation_type = htmlspecialchars($_POST['implementation_time'], ENT_COMPAT, 'UTF-8');
}

// Inventory version (from POST)
if (isset($_POST['inventory_version']) && $_POST['inventory_version'] !== "") {
    if($_POST['inventory_version'] != "")
        $filters->inventory_version = htmlspecialchars($_POST['inventory_version'], ENT_QUOTES, 'UTF-8');
}

// Semester (from POST, base64-decoded)
if (isset($_POST['semester']) && $_POST['semester'] !== "") {
    $semester = base64_decode($_POST['semester']);
    if ($semester !== "") {
        $filters->semester = htmlspecialchars($semester, ENT_QUOTES, 'UTF-8');
    }
}

// Use case ID (from POST)
if (isset($_POST['use_case_id']) && $_POST['use_case_id'] !== "") {
    $filters->use_case_id = htmlspecialchars($_POST['use_case_id'], ENT_QUOTES, 'UTF-8');
}
// Academic Level (from POST)
if (isset($_POST['academic_level']) && $_POST['academic_level'] !== "") {
    $filters->academic_level = htmlspecialchars($_POST['academic_level'], ENT_COMPAT, 'UTF-8');
}

// Demographic group (from POST)
if (isset($_POST['demographics']) && $_POST['demographics'] !== "") {
    $filters->demographic_group = htmlspecialchars($_POST['demographics'], ENT_QUOTES, 'UTF-8');
}

// Demographics question structure (from POST)
$filters->demographics_question = [];
if (
    isset($_POST['demographic_question_id'], $_POST['demographic_response'], $_POST['demographic_condition']) &&
    $_POST['demographic_question_id'] !== "" && $_POST['demographic_response'] !== "" && $_POST['demographic_condition'] !== ""
) {
    $demographic_question = new stdClass();
    $demographic_question->question = htmlspecialchars($_POST['demographic_question_id'], ENT_QUOTES, 'UTF-8');
    $demographic_question->response = htmlspecialchars($_POST['demographic_response'], ENT_QUOTES, 'UTF-8');
    $demographic_question->condition = htmlspecialchars($_POST['demographic_condition'], ENT_QUOTES, 'UTF-8');
    
    // Add the demographics question to the filters
    $filters->demographics_question[] = $demographic_question;
}

// Convert filters object to JSON within a data structure
$data = new stdClass();
$data->filters = $filters;

// Output the payload for verification
// echo json_encode($data);

// Function to send data via cURL
function fetch_data($base_url, $url, $data) {
    $url = $base_url . $url;
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
?>