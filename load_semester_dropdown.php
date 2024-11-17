<?php
header('Content-Type: application/json');

// Get the implementation type and org_name from the POST and GET requests
$implementation_type = isset($_POST['implementation_type']) ? $_POST['implementation_type'] : '';
$org_name = isset($_GET['org_name']) ? $_GET['org_name'] : '';

// Define the API endpoint
$api_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/dropdowns"; // Replace with your actual API endpoint

// Construct the payload in the required format
$payload = json_encode([
    "type" => "field",
    "dropdown" => "semester",
    "filters" => [
        "implementation_type" => $implementation_type,
        "org_name" => $org_name
    ]
]);

// echo $payload;
// Initialize cURL to make the API request
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload)
]);

// Execute the cURL request and decode the JSON response
$response = curl_exec($ch);
curl_close($ch);

// echo json_encode($response);

// Error handling if the API call fails
if ($response === false) {
    echo json_encode([
        'error' => 'Failed to fetch data from API.'
    ]);
    exit;
}

$data = json_decode($response, true);

// Check if response data is in expected format for use_case_id
if (isset($data)) {
    // Prepare the response for the use_case_id dropdown
    $dropdown_response = [
        'semester_options' => $data
    ];

    echo json_encode($dropdown_response);
} else {
    echo json_encode([
        'error' => 'Invalid data format received from API.'
    ]);
}
?>