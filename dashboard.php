<?php 
include("./models/config.php");
// include("./models/nace/kpi.php");
// echo json_encode($data);

// Set Filters Dropdown
$selected_values = [
    'data_type' => $_POST['data_type'] ?? '',
    'implementation_time' => $_POST['implementation_time'] ?? '',
    'implementation_type' => $_POST['implementation_type'] ?? $filters->implementation_type,
    'semester' => $_POST['semester'] ?? '',
    'use_case_id' => $_POST['use_case_id'] ?? '',
    'academic_level' => $_POST['academic_level'] ?? '',
    'demographics' => $_POST['demographics'] ?? ''
];
// echo "<pre>".json_encode($selected_values)."</pre>";
// echo "<pre>".json_encode($_POST)."</pre>";

if($filters->implementation_type == "general"){
    $selected_values["implementation_type"] = "general";
    // echo "Should be general";
}


if($_POST['implementation_time'] == "prepost")
$kpi_data = json_decode(fetch_data(API_PREPOST_KPI_ENDPOINT,$data),true);
else
$kpi_data = json_decode(fetch_data(API_KPI_ENDPOINT,$data),true);

// echo json_encode($data);
// Get Compentency Data
$comp_data = json_decode(fetch_data(API_COMPETENCY_ENDPOINT,$data),true);

// echo json_encode($comp_data);

// All Calculations for competency comparison
// Check if the data was decoded successfully and is an array
if (is_array($comp_data)) {
    $averages = [];
    // Create a hashmap to map the original keys from API to human-readable names
    $categoryNames = [
        "communication_results" => "Communication",
        "teamwork_results" => "Teamwork",
        "self_development_results" => "Career & Self Development",
        "professionalism_results" => "Professionalism",
        "leadership_results" => "Leadership",
        "critical_thinking_results" => "Critical Thinking",
        "technology_results" => "Technology",
        "equity_results" => "Equity & Inclusion"
    ];


    // Colors hashmap for each competency
    $colors = [
        "Communication" => "#01a4fe",
        "Teamwork" => "#E06B60",
        "Career & Self Development" => "#ffb601",
        "Professionalism" => "#66d202",
        "Leadership" => "#796258",
        "Critical Thinking" => "#A056E6",
        "Technology" => "#556B9B",
        "Equity & Inclusion" => "#ad3131"
    ];


    // Loop through each category and add the human-readable name, average, and color to the averages array
    foreach ($comp_data as $category => $results) {
        if (isset($results['Average'])) {
            // if($results != "")
            $humanReadableName = $categoryNames[$category] ?? $category;
            $averages[$humanReadableName] = [
                'average' => (float)$results['Average'],
                'color' => $colors[$humanReadableName] ?? '#000000' // Default color if not found
            ];
        }
    }

    // Sort the averages array in descending order by average values for the competency comparison
    uasort($averages, function($a, $b) {
        return $b['average'] <=> $a['average'];
    });

} else {
    echo "Error decoding JSON data.";
}


// Fetching competency questions values
$comp_q_data = json_decode(fetch_data(API_COMPETENCY_QUESTIONS_ENDPOINT,$data),true);

// include("./models/filters/dropdowns.php");

$allfilters = json_decode(fetch_data(API_ALL_DROPDOWNS_ENDPOINT,$data),true);
// echo json_encode($data);
// echo json_encode($allfilters);

$implementation_time = $allfilters["implementationTimes"];
$implementation_type = $allfilters["implementationTypes"];
$version = $allfilters["inventoryVersions"];
$semester = $allfilters["semesters"];
$use_case_id = $allfilters["useCaseIds"];
$academics = $allfilters["academicLevels"];
$demographics = $allfilters["demographicGroups"];
?>
<!doctype html>
<html lang="en">

<body style="background-color:#dadadd59">
    <?php include("includes/header.php"); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="container">
        <?php include("includes/navbar.php") ?>
        <!-- Navbar End -->
        <div class="page-content" style="padding-top: 27px!important;">
            <div class="container-fluid">
                <!-- KPI Row Start -->
               <?php if($_POST['implementation_time'] == "prepost")
                include("components/kpiPrePost.php"); 
                else
                include("components/kpi.php"); 
                ?>
                <!-- KPI Row End -->

                <!-- Filters Start -->
                <form method="POST" class="row mb-3" style="border-radius: 16px;background-color:#000033!important;">
                    <div class="col col-lg-3 px-4 py-5">
                        <center>
                            <h5 class="mb-2 text-white" style="font-size:20px">Data Type</h5><br>
                            <select id="inventory_version" name="data_type" class="dynamic-dropdown form-select select-light" style="border-radius: 20px;">
                                <option value="" <?= $selected_values['data_type'] === '' ? 'selected' : ''; ?>>
                                    NACE Career
                                    Readiness Competencies</option>
                                <option value="plus" <?= $selected_values['data_type'] === 'plus' ? 'selected' : ''; ?>>
                                    Social
                                    Capital + Life Design + Career Mobility </option>
                            </select>
                            <select id="implementation_time" name="implementation_time"
                                    class="dynamic-dropdown form-select select-light mt-3" style="border-radius: 20px;">
                                <?php 
                                if($general_exists || $selected_values["implementation_time"] == "general"){
                                    echo '<option value="">All Data</option>';
                                }
                                $first = true;
                                foreach ($implementation_time as $key => $value): 
                                    $isSelected = ($selected_values['implementation_time'] === $key) ? 'selected' : '';
                                    if ($isSelected) {
                                        $first = false; // If a match is found, don't select the first by default
                                    }
                                ?>
                                    <option value="<?= $key ?>" <?= $isSelected ?: ($first ? 'selected' : ''); ?>>
                                        <?= ucwords($value) ?>
                                    </option>
                                <?php 
                                    $first = false; // Ensure only the first option gets selected if no previous selection exists
                                endforeach; 
                                ?>
                            </select>
                        </center>
                    </div>
                    <div class="col col-lg-3 px-4 py-5">
                        <center>
                            <h5 class="text-white mb-2" style="font-size:20px">Implementation Type</h5><br>
                            <select id="implementation_type" name="implementation_type" class="dynamic-dropdown form-select select-light"
                                style="border-radius: 20px;" <?= INVENTORY ? "disabled" : "" ?>>
                                <option value=""><?= INVENTORY ? ucfirst($_GET['inventory']) : "All Types Pre/Post" ?>
                                </option>
                                <?php foreach($implementation_type as $key=>$value): ?>
                                <option value="<?= $key ?>"
                                    <?= $selected_values['implementation_type'] === $key ? 'selected' : ''; ?>>
                                    <?= ucwords($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="d-flex">
                                <div class="col-sm-6">
                                    <select id="semester" name="semester" class="dynamic-dropdown form-select select-light mt-3"
                                        style="border-radius: 20px;" <?= SEMESTER ? "disabled" : "" ?>>
                                        <option value="<?= SEMESTER ? $_GET['semester'] : "" ?>"><?= SEMESTER ? $_GET['semester'] : "All Time" ?></option>
                                        <?php foreach($semester as $key=>$value): ?>
                                        <option value="<?=$key ?>"
                                            <?= $selected_values['semester'] === $key ? 'selected' : ''; ?>>
                                            <?= ucwords($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select id="use_case_id" name="use_case_id" class="dynamic-dropdown form-select select-light mt-3"
                                        style="border-radius: 20px;" <?= USE_CASE_ID ? "disabled" : "" ?>>
                                        <option value="">
                                            <?= USE_CASE_ID ? $_GET['use_case_id'] : "All Groups" ?>
                                        </option>
                                        <?php foreach($use_case_id as $key=>$value): ?>
                                        <option value="<?= $key ?>"
                                            <?= $selected_values['use_case_id'] === $key ? 'selected' : ''; ?>>
                                            <?= ucwords($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col col-lg-3 px-4 py-5">
                        <center>
                            <h5 class="text-white mb-2" style="font-size:20px">Academic Level</h5><br>
                            <select id="academic_level" name="academic_level" class="dynamic-dropdown form-select select-light" style="border-radius: 20px;">
                                <option value="">All Levels</option>
                                <?php foreach($academics as $key=>$value): ?>
                                    <?= $key ?>
                                <option value="<?= $key ?>"
                                    <?= $selected_values['academic_level'] === $key ? 'selected' : ''; ?>>
                                    <?= ucwords($key) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </center>
                    </div>
                    <div class="col col-lg-3 px-4 py-5">
                        <center>
                            <h5 class="text-white mb-2" style="font-size:20px">Demographic Group</h5><br>
                            <select name="demographics" class="dynamic-dropdown form-select select-light" style="border-radius: 20px;">
                                <option value="">All Students</option>
                                <!-- <option value="First Generation"
                                    <?= $selected_values['demographics'] === 'First Generation' ? 'selected' : ''; ?>>
                                    First Generation Students</option>
                                <option value="International"
                                    <?= $selected_values['demographics'] === 'International' ? 'selected' : ''; ?>>
                                    International Student</option> -->
                                <?php foreach($demographics as $key=>$value): ?>
                                    <option value="<?= $key ?>"
                                        <?= $selected_values['demographics'] === $key ? 'selected' : ''; ?>>
                                        <?= ucwords($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" class="btn bg-white p-2 mt-3 rounded-circle btn-lg"
                                data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"
                                style="height: 45px; font-size: 25px; width: 45px; line-height: 112%; color: #000032;">
                                <i class="fa fa-plus"></i>
                            </button>
                        </center>
                    </div>
                    <div class="col col-lg-12">
                        <hr style="background-color:white;margin-top:-20px;margin-bottom:20px">
                        <center>
                            <button type="submit" class="btn bg-white p-2 mb-3"
                                style="line-height: 112%; color: #000032;border-radius:20px;font-size:17px!important;width:12%">Apply
                                Filters</button>
                        </center>
                    </div>

                    <!-- Hidden fields to store second form values -->
                    <input type="hidden" name="demographics_questions[]" id="demographics_questions">
                    <input type="hidden" name="demographics_condition[]" id="demographics_condition">
                    <input type="hidden" name="demographics_answers[]" id="demographics_answers">
                </form>
                <!-- Filters End -->

                <div class="modal modal-lg fade bs-example-modal-center" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Filter by
                                    Demographic Group</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-5">
                                <form>
                                    <div id="demographic_modal">
                                        <div class="card p-3 border-2">
                                            <div class=" row mb-4">
                                                <div class="col-sm-11">
                                                    <select name="demographic_question[]" class="form-select"
                                                        style="color:#000032">
                                                        <option value="d61f96be-29e6-4a26-bf62-55993bb6b8ac">Gender
                                                        </option>
                                                        <option value="a54979a3-daed-4b76-8968-663daa743786">
                                                            Demographic Category</option>
                                                        <option value="dd5c1e33-8813-46af-9f79-75f10e9d69ff">Preset
                                                            Groups
                                                        </option>
                                                        <option value="9a149e36-a5e8-4602-b6a4-e47aab952508">
                                                            Disability
                                                        </option>
                                                        <option value="bd7e349a-4e0a-435d-9a68-551cc7999981">LGBTQ
                                                        </option>
                                                        <option value="d16579f7-ec39-4c00-b8e9-4b297a62c10d">
                                                            Language
                                                        </option>
                                                        <option value="37963d7a-dd81-4366-9ec0-5e02b0dadf63">Parent
                                                        </option>
                                                        <option value="af505188-1f22-405c-88e0-d953591f0a6b">
                                                            Military
                                                        </option>
                                                        <option value="c2436b4e-8084-4346-b78e-372b063aa9d4">
                                                            Caregiver
                                                        </option>
                                                        <option value="ba35d9d9-8265-4e8e-8bc5-49264505917c">Finance
                                                            Sources
                                                        </option>
                                                        <option value="a7dab9b7-a07d-430c-a8c7-3113f12d2c00">Age
                                                        </option>
                                                        <option value="d9b64530-72b3-45b2-b714-2016c5ac7626">Program
                                                        </option>
                                                        <option value="c974a276-95a6-4237-869e-5161234da62d">
                                                            Academic
                                                            Level
                                                        </option>
                                                    </select>
                                                    <center>
                                                        <select name="demographic_condition[]"
                                                            class="form-select mt-4 mb-4"
                                                            style="width:20%;border-color: #000032;border-radius: 20px;border:2px solid;color:#000032">
                                                            <option>is equal
                                                                to</option>
                                                            <option>not equal
                                                                to</option>
                                                        </select>
                                                    </center>
                                                    <select name="demographic_answers[]" class="form-select"
                                                        style="color:#000032">
                                                        <option>Option
                                                            A</option>
                                                        <option>Option
                                                            B</option>
                                                        <option>Option
                                                            C</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 align-content-center">
                                                    <a href="#" style="color:red;"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="text-center mb-4">AND</h4>
                                        <!-- <hr style="color: rgba(108, 108, 108, 0.629);height:1px;opacity:1"> -->
                                        <div class="card p-3 border-2">
                                            <div id="questions_modal" class="row mb-4">
                                                <div class="col-sm-11">
                                                    <select name="demographic_question[]" class="form-select"
                                                        style="color:#000032">
                                                        <option value="d61f96be-29e6-4a26-bf62-55993bb6b8ac">Gender
                                                        </option>
                                                        <option value="a54979a3-daed-4b76-8968-663daa743786">
                                                            Demographic Category</option>
                                                        <option value="dd5c1e33-8813-46af-9f79-75f10e9d69ff">Preset
                                                            Groups
                                                        </option>
                                                        <option value="9a149e36-a5e8-4602-b6a4-e47aab952508">
                                                            Disability
                                                        </option>
                                                        <option value="bd7e349a-4e0a-435d-9a68-551cc7999981">LGBTQ
                                                        </option>
                                                        <option value="d16579f7-ec39-4c00-b8e9-4b297a62c10d">
                                                            Language
                                                        </option>
                                                        <option value="37963d7a-dd81-4366-9ec0-5e02b0dadf63">Parent
                                                        </option>
                                                        <option value="af505188-1f22-405c-88e0-d953591f0a6b">
                                                            Military
                                                        </option>
                                                        <option value="c2436b4e-8084-4346-b78e-372b063aa9d4">
                                                            Caregiver
                                                        </option>
                                                        <option value="ba35d9d9-8265-4e8e-8bc5-49264505917c">Finance
                                                            Sources
                                                        </option>
                                                        <option value="a7dab9b7-a07d-430c-a8c7-3113f12d2c00">Age
                                                        </option>
                                                        <option value="d9b64530-72b3-45b2-b714-2016c5ac7626">Program
                                                        </option>
                                                        <option value="c974a276-95a6-4237-869e-5161234da62d">
                                                            Academic
                                                            Level
                                                        </option>
                                                    </select>
                                                    <center>
                                                        <select name="demographic_condition[]"
                                                            class="form-select mt-4 mb-4"
                                                            style="width:20%;border-color: #000032;border-radius: 20px;border:2px solid;color:#000032">
                                                            <option>is equal
                                                                to</option>
                                                            <option>not equal
                                                                to</option>
                                                        </select>
                                                    </center>
                                                    <select name="demographic_answers[]" class="form-select"
                                                        style="color:#000032">
                                                        <option>Option
                                                            A</option>
                                                        <option>Option
                                                            B</option>
                                                        <option>Option
                                                            C</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 align-content-center">
                                                    <a href="#" style="color:red;"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <button type="button"
                                            class="btn p-2 mt-3 rounded-circle btn-lg align-content-center text-center align-items-center"
                                            onclick="generate_question()"
                                            style="height: 45px; font-size: 25px; width: 45px; line-height: 112%; color: white;background-color: #000032;"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </center>
                                </form>
                                <!-- <hr style="color: rgba(108, 108, 108, 0.629);"> -->
                            </div>
                            <hr class="mt-5 mb-0" style="color: rgba(108, 108, 108, 0.629);">
                            <div class="py-3 px-3 d-flex justify-content-around">

                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target=".bs-example-modal-center"
                                    onclick="
                                        const values = Array.from(document.querySelectorAll('select[name=\'demographic_question[]\']'))
                                                            .map(select => select.value);
                                        document.getElementById('demographics_questions').value = JSON.stringify(values);
                                         const values1 = Array.from(document.querySelectorAll('select[name=\'demographic_condition[]\']'))
                                                            .map(select => select.value);
                                        document.getElementById('demographics_condition').value = JSON.stringify(values1);
                                         const values2 = Array.from(document.querySelectorAll('select[name=\'demographic_answers[]\']'))
                                                            .map(select => select.value);
                                        document.getElementById('demographics_answers').value = JSON.stringify(values2);">Apply
                                    Filter</button>
                                <!-- <button type="button" class="btn" style="background-color: #000032;color: white;">Save
                                    Group</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <?php
                if($_POST['implementation_time'] == "prepost"){
                    include("components/prepost.php");
                }
                else{
                    if($total_students[0] == 0){
                        echo "<div class='p-5'>
                        <div class='card-body'>
                        <div class='row'>
                         <div class='col-sm-3'></div>
                        <div class='col-sm-3'>
                            <div style='margin:auto'>
                             <img class='img img-fluid' src='assets/images/no_folder.svg' />
                            </div>
                        </div>
                        <div class='col-sm-4 text-center align-content-center'>
                            <h2> <b>NO DATA FOUND! </b></h2>
                        </div>
                        </div>
                        </div>
                        </div>";
                    }                        
                    else{
                        // echo json_encode($_POST);
                        if(isset($_POST['implementation_time']) || isset($_POST['data_type'])){
                            
                            if($_POST['implementation_time'] == "prepost")
                                include("components/prepost.php");
                            else if($_POST['implementation_time'] == "eval")
                                include("components/student_eval.php");
                            else if($_POST['data_type'] == "")
                                include("components/nace-board.php");
                            else if($_POST['data_type'] == "plus"){
                                include("components/plus-board.php");
                            }
                            }
                            else{
                                include("components/nace-board.php");
                            }
                    }
                }
                ?>
                <!-- <?php
                if($_POST['data_type'] == "plus")
                    include("cplus-board.php");
                ?> -->
            </div>
        </div>
        <!-- End Page-content -->

        <?php include("includes/footer.php"); ?>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <script src="assets/js/pages/jquery-knob.init.js"></script>

    <!-- materialdesign icon js-->
    <script src="assets/js/pages/materialdesign.init.js"></script>


    <script>
    $(document).ready(function() {

        $('.comm-hov').on('click', function() {
            $('.comm-hov').toggleClass('comm-click');
        });

        $('.team-hov').on('click', function() {
            $('.team-hov').toggleClass('team-click');
        });

        $('.critical-hov').on('click', function() {
            $('.critical-hov').toggleClass('critical-click');
        });

        $('.professionalism-hov').on('click', function() {
            $('.professionalism-hov').toggleClass('professionalism-click');
        });

        $('.equity-hov').on('click', function() {
            $('.equity-hov').toggleClass('equity-click');
        });

        $('.tech-hov').on('click', function() {
            $('.tech-hov').toggleClass('tech-click');
        });

        $('.career-hov').on('click', function() {
            $('.career-hov').toggleClass('career-click');
        });

        $('.leadership-hov').on('click', function() {
            $('.leadership-hov').toggleClass('leadership-click');
        });


    });
    </script>

    <script>
    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    function generate_question() {
        demo_id = "demo" + getRandomInt(9999999);
        $("#demographic_modal").append(
            '<div id="' + demo_id +
            '" ><h4 class="text-center mb-4">AND</h4><div class="card p-3 border-2"> <div class="row mb-4"> <div class="col-sm-11"> <select name="demographic_question[]" class="form-select" style="color:#000032"> <option value="d61f96be-29e6-4a26-bf62-55993bb6b8ac">Gender </option> <option value="a54979a3-daed-4b76-8968-663daa743786"> Demographic Category</option> <option value="dd5c1e33-8813-46af-9f79-75f10e9d69ff">Preset Groups </option> <option value="9a149e36-a5e8-4602-b6a4-e47aab952508">Disability </option> <option value="bd7e349a-4e0a-435d-9a68-551cc7999981">LGBTQ </option> <option value="d16579f7-ec39-4c00-b8e9-4b297a62c10d">Language </option> <option value="37963d7a-dd81-4366-9ec0-5e02b0dadf63">Parent </option> <option value="af505188-1f22-405c-88e0-d953591f0a6b">Military </option> <option value="c2436b4e-8084-4346-b78e-372b063aa9d4">Caregiver </option> <option value="ba35d9d9-8265-4e8e-8bc5-49264505917c">Finance Sources </option> <option value="a7dab9b7-a07d-430c-a8c7-3113f12d2c00">Age </option> <option value="d9b64530-72b3-45b2-b714-2016c5ac7626">Program </option> <option value="c974a276-95a6-4237-869e-5161234da62d">Academic Level </option> </select> <center> <select name="demographic_condition[]" class="form-select mt-4 mb-4" style="width:20%;border-color: #000032;border-radius: 20px;border:2px solid;color:#000032"> <option>is equal to</option> <option>not equal to</option> </select> </center> <select name="demographic_answers[]" class="form-select" style="color:#000032"> <option>Option A</option> <option>Option B</option> <option>Option C</option> </select> </div> <div class="col-sm-1 align-content-center"> <a href="#" onclick="remove_question(' +
            demo_id + ')" style="color:red;"><i class="fa fa-trash"></i></a> </div> </div> </div> </div>'
        );
    }

    function remove_question(demo_id) {
        $(demo_id).remove();
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                loadGraph(entry.target.id); // Custom function to load the graph
                observer.unobserve(entry.target);
            }
        });
    });

    document.querySelectorAll('#accordionWork').forEach((container) => {
        observer.observe(container);
    });
    </script>


<script>
    $(document).ready(function () {
    function updateDropdowns() {
        // alert("Change");
        let selectedValues = {
            org : "<?= $_GET["organization"] ?>",
            inventory_version: $("#inventory_version").val(),
            implementation_time: $("#implementation_time").val(),
            implementation_type: $("#implementation_type").val(),
            semester: $("#semester").val(),
            use_case_id: $("#use_case_id").val(),
            academic_level: $("#academic_level").val(),
        };

        console.log(selectedValues);
        $.ajax({    
            url: "fetch_filters.php?",
            type: "POST",
            data: selectedValues,
            // dataType: "json",
            success: function (response) {
                // alert(response)
                result = JSON.parse(response)
                console.log(result);
                updateDropdown("#implementation_time", result.implementationTimes, "All Time");
                var $_GET = <?php echo json_encode($_GET); ?>;
                console.log($_GET);
                if(!$_GET['inventory'])
                    updateDropdown("#implementation_type", result.implementationTypes, "All Types Pre & Post");
                
                if(!$_GET['semester'])
                    updateDropdown("#semester", result.semesters, "All Time");
                
                if(!$_GET['use_case_id'])
                    updateDropdown("#use_case_id", result.useCaseIds, "All Groups");

                updateDropdown("#academic_level", result.academicLevels, "All Levels");
                if($("implementation_type").val() == "general"){
                    $("#implementation_time").prop('disabled', true);
                }
                else{
                    $("#implementation_time").prop('disabled', false);
                }
            },
            error: function (textStatus, errorThrown) {
            alert(errorThrown);
        }
        });
    }

    function updateDropdown(selector, options, defaultText) {
        // alert(options);
        let $dropdown = $(selector);
        let currentValue = $dropdown.val(); // Store current selection

        $dropdown.empty().append(`<option value="">${defaultText}</option>`);

        $.each(options, function (index, value) {
            let isSelected = currentValue === index ? 'selected' : '';
            $dropdown.append('<option value="' + index + '" ' + isSelected + '>' + value + '</option>');
        });
    }

    $(".dynamic-dropdown").on("change", function () {
        let changedDropdown = $(this).attr("id");

        if (changedDropdown === "implementation_type") {
            // Reset dropdown 3 and 4
            // alert("Change BOTH");
            $("#semester, #use_case_id").empty().append('<option value="">Select</option>');
        }

        if (changedDropdown === "use_case_id"  && $("#semester").val() == "") {
            $("#semester").empty().append('<option value="" selected>Select</option>');
        }
        else if (changedDropdown === "semester"  && $("#use_case_id").val() ==""){
            $("#use_case_id").empty().append('<option value="" selected>Select</option>');
        }

        updateDropdowns(); // Fetch new data
    });

    // updateDropdowns(); // Initial Load
});

document.addEventListener("DOMContentLoaded", function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl, {
            trigger: 'hover', 
            html: true
        });
    });
});

</script>
</body>

</html>