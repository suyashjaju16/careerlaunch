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
                            <?php
    skill_level_component(
        'Social Capital Skills',
        './assets/icons/social_capital.png',
        48, // Pre Score (optional, use null if not applicable)
        70, // Post Score
        'Emerging Social Capital Development',
        'Advanced Social Capital Development',
        50,
        null,
        "You're on the right path - keep going! You are starting to grasp the importance of social capital skills...",
        [
            "Attend workshops and events hosted by your career center...",
            "Initiate career conversations with professors...",
            "Reach out to industry professionals..."
        ]
    );

    skill_level_component(
        'Life Design Mindsets',
        './assets/icons/life_design.png',
        null,
        70,
        'Fixed Mindset',
        'Growth Mindset',
        50,
        './assets/images/user.png',
        "Having a growth mindset helps you to adapt and embrace challenges...",
        [
            "Reflect regularly on your progress...",
            "Practice gratitude journaling to cultivate positivity...",
            "Engage in mentorship opportunities..."
        ]
    );

    skill_level_component(
        'Career Mobility Best Practices',
        './assets/icons/career_mobility.png',
        null,
        70,
        'Emerging Best Practices',
        'Advanced Best Practices',
        50,
        null,
        "By actively engaging with career mobility best practices...",
        [
            "Attend career fairs and networking sessions...",
            "Regularly update your resume...",
            "Conduct informational interviews..."
        ]
    );
    ?>
                            <hr style="opacity:1">
                            <?php include("./components/footer.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
</body>

</html>