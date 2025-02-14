<!-- <?php  
error_reporting(E_ALL);
ini_set('display_errors', '1');

// $base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
// $filters = new stdClass();
// $filters->inventory_version =  "plus";

// $filters->inventory_version = "plus";
// $filters->semester = "Fall 2024 - Spring 2025.";
// $org = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['organization']);
// $filters->org_name = $org;

// if(isset($_GET['inventory'])){
// $type = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['inventory']);
// $filters->implementation_type =  $type;
// }

// $filter = json_encode($filters);

// $data = new stdClass();
// $data->type = "field";

// $data->dropdown = "implementation_type";
// $data->filters = json_decode($filter);
// $implementation_type = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);


// $data->dropdown = "semester";
// $data->filters = json_decode($filter);
// $semester = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);


// $data->dropdown = "inventory_version";
// $data->filters = json_decode($filter);
// $version = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);



// $data->dropdown = "use_case_id";
// $data->filters = json_decode($filter);
// $use_case_id = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);

// $data->dropdown = "implementation_time";

// $data->filters = json_decode($filter);

// $url = $base_url."dropdowns";
// $ch = curl_init( $url );
// $payload = json_encode($data);
// curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
// curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
// $implementation_time = json_decode(curl_exec($ch),true);
// curl_close($ch);


// $data->type= "demographics";
// $data->dropdown = "AcademicLevel";

// $data->filters = json_decode($filter);
// $academics = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);
// curl_close($ch);

echo json_encode($data);

$allfilters = json_decode(fetch_data(API_ALL_DROPDOWNS_ENDPOINT,$data),true);
echo json_encode($allfilters);

$implementation_time = json_decode(curl_exec($ch),true);
$implementation_type = $allfilters["implementationTypes"];
$version = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);
$semester = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);
$use_case_id = json_decode(fetch_data(API_DROPDOWN_ENDPOINT,$data),true);
$academic = $allfilters["academicLevels"];
?> 