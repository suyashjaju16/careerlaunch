<?php 
error_reporting(E_ALL);
ini_set('display_errors', '0');
include("config.php");
include("functions.php");
include("payload.php");
include("./components/helpers.php");
include("./components/skill_level_component.php");

// Filters load in payload.php for initial payload generation

//Fetch Student Details
$student_details = json_decode(fetch_data(API_STUDENT_DETAILS_ENDPOINT,$data),true);

$org_id = extractIdFromUrl($student_details["Logo"]);
$recommendations_data = createRecommendationsJson($org_id);
$recommendations_json = json_decode(fetch_data(API_CUSTOM_RECOMMENDATIONS_ENDPOINT,$recommendations_data,"GET"),true);
$url = $recommendations_json["recommendation_url"] != null ? $recommendations_json["recommendation_url"] : STANDARD_RECOMMENDATIONS_URL;
$recommendations = fetchRecommendations($url);

if(isset($student_details["Evaluator Email"]) && $student_details["Evaluator Email"] != null)
    $filters->evaluator_email = $student_details["Evaluator Email"];
$data = $filters;

//Fetch Student Comppetency Data
$competency_data = json_decode(fetch_data(API_STUDENT_COMPETENCY_ENDPOINT,$data),true);

// Get the selected value from the POST request
$selected_value = $_POST['filterData'] ?? ''; // Use null coalescing operator
$selected_filter = isset($_POST['filterData']) ? $_POST['filterData'] : '';
?>

<!doctype html>
<html lang="en">

<?php include("./components/header.php") ?>

<body style="background-color: #e7e7e7!important;">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="container">
        <?php include("./components/student_details.php")?>
            <div class="container-fluid">
                <?php include("./components/sticky_header.php"); ?>
                <div class="row">
                    <div class="col-12 px-0 overall-career-readiness-section">
                        <?php include("./components/overall_career_readiness.php"); ?>
                    </div>
                    <div class="col-12 px-0" >
                        <div class="card student-competency-section">
                            <?php include("./components/student_competency.php") ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("./components/footer.php"); ?>
    </div>
                    
</body>

</html>