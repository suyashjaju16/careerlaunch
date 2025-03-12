<?php 
$filters = new stdClass();
// Student Details START
$filters->id = $_GET['id'];

$data = new stdClass();
$data = $filters;

$filter_data =json_decode(fetch_data(API_STUDENT_FILTERS_ENDPOINT,$data),true);

if(isset($_POST['filterData'])){
    // echo json_encode($_POST['filterData']);
    $filter = $_POST['filterData'];
    $type = explode("//", $filter);
    $filters->implementation_type = $type[0];
    $filters->filter = $type[1];
}
else{
    if(isset($_GET['type']))
        $filters->implementation_type = $_GET['type'];
    else{
        // Check if the data was decoded successfully and is an array
        if (is_array($filter_data)) {
            $imp_time = array_key_first($filter_data);
            $student_filter = $filter_data[$imp_time][0];
            $filters->implementation_type = $imp_time;
            $filters->filter = $student_filter;
            $implementation_time = $imp_time;
        } else {
            echo "Error decoding JSON data.";
        }
    }
    if(isset($_GET['filter']))
        $filters->filter = $_GET['filter'];
}

if(isset($_POST['filterData'])){
    $implementation_time = explode("//", $_POST['filterData']);
    $implementation_time = $implementation_time[0];
}
if(isset( $_GET['type'])){
    $implementation_time = $_GET['type'];
}

echo json_encode($data);

?>