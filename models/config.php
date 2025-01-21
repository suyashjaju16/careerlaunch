<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * config.php
 * This file stores configuration settings for the project, including API endpoints,
 * AWS configurations, and other reusable constants.
 */

// $base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
define('BASE_URL', 'http://da.careerreadinessinventory.academy/');

if(isset($_GET['source'])){
    if($_GET['source'] == "ZGFzaGJvYXJk" || $_GET['source'] == "ZmlsdGVyZWQ"){
        if(isset($_GET['inventory']) || isset($_GET['semester']) || isset($_GET['use_case_id']))
        {
            define('FILTERED',  true);
        }
        else 
            define('FILTERED', false);
    }
    else{
        header("Location: ./404.php");
        die();
    }
}

else{
    header("Location: ./404.php");
    die();
}


if(isset($_GET['inventory']) && $_GET['inventory'] != "")
     define('INVENTORY',  true);
else
    define('INVENTORY',  false);
 
if(isset($_GET['semester']) && $_GET['semester'] != "")
     define('SEMESTER',  true);
else
    define('SEMESTER',  false);


if(isset($_GET['use_case_id']) && $_GET['use_case_id'] != "")
     define('USE_CASE_ID',  true);
else
    define('USE_CASE_ID',  false);

// API Endpoints
define('API_BASE_URL', 'https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/');
define('API_KPI_ENDPOINT', API_BASE_URL . '/summary');
define('API_COMPETENCY_ENDPOINT', API_BASE_URL . '/competency');
define('API_COMPETENCY_QUESTIONS_ENDPOINT', API_BASE_URL . '/competency-questions');
define('API_DROPDOWN_ENDPOINT', API_BASE_URL . '/dropdowns');
define('API_DEMOGRAPHICS_ENDPOINT', API_BASE_URL . '/demographics');
define('API_STUDENTS_ENDPOINT', API_BASE_URL . '/get-students');
define('API_PREPOST_ENDPOINT', API_BASE_URL . '/pre-post-competency');
define('API_PREPOST_QUESTIONS_ENDPOINT', API_BASE_URL . '/pre-post-questions');


// AWS Configuration
define('AWS_REGION', 'us-west-2');
define('AWS_BUCKET_NAME', 'your-s3-bucket-name');
define('AWS_CDN_URL', 'https://your-cloudfront-url.cloudfront.net');

// Environment Variables
define('ENV', 'production'); // Change to 'development' for local testing
define('DEBUG', false);      // Set to true to enable error reporting in dev mode

// Frontend Specific Settings
define('FRONTEND_THEME', 'light'); // Can be 'light' or 'dark'
define('DEFAULT_LANGUAGE', 'en');  // Default language for the UI

// API Keys (if any, avoid hardcoding sensitive keys here for production)
define('GOOGLE_ANALYTICS_ID', 'UA-XXXXX-Y');
define('STRIPE_PUBLIC_KEY', 'your-stripe-public-key');

// Caching Settings
define('CACHE_LIFETIME', 3600); // Cache duration in seconds

// Security Settings
define('ENABLE_CSRF_PROTECTION', true);
define('CSP_POLICY', "default-src 'self' https://your-api-gateway-url.amazonaws.com;");

// Utility Settings (for debugging or logging)
define('LOG_FILE_PATH', __DIR__ . '/logs/app.log');


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
    $filters->implementation_time = htmlspecialchars($_POST['implementation_time'], ENT_COMPAT, 'UTF-8');
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

// ********************** DEMOGRAPHIC FILTER [DONE] **********************
// if (
//     isset($_POST['demographics_questions'], $_POST['demographics_answers'], $_POST['demographics_condition']) &&
//     $_POST['demographics_questions'] !== "" && $_POST['demographics_answers'] !== "" && $_POST['demographics_condition'] !== ""
// )
// {

//     $questionIds = json_decode($_POST['demographics_questions'][0],true);
//     $responses = json_decode($_POST['demographics_condition'][0],true);
//     $conditions = json_decode($_POST['demographics_answers'][0],true);

//     for ($i = 0; $i < count($responses); $i++) {
//         $demographics_filter[] = [
//             "question" => $questionIds[$i],
//             "response" => $responses[$i],
//             "condition" => $conditions[$i]
//         ];
//     }

//     $$demographics_filter = json_encode($demographics_filter, JSON_PRETTY_PRINT);

//     $filters->demographics_question = $demographics_filter;
// }


// Convert filters object to JSON within a data structure
$data = new stdClass();
$data->filters = $filters;

// Output the payload for verification
// echo json_encode($data);

// Function to send data via cURL
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
?>