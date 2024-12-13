<?php 
include("./models/config.php");
// include("./models/nace/kpi.php");

$selected_values = [
    'data_type' => $_POST['data_type'] ?? '',
    'implementation_time' => $_POST['implementation_time'] ?? '',
    'implementation_type' => $_POST['implementation_type'] ?? '',
    'semester' => $_POST['semester'] ?? '',
    'use_case_id' => $_POST['use_case_id'] ?? '',
    'academic_level' => $_POST['academic_level'] ?? '',
    'demographics' => $_POST['demographics'] ?? ''
];


$kpi_data = json_decode(fetch_data($base_url,"summary",$data),true);
// echo "<br>".json_encode($kpi_data)."<br>";
// $kpi_data = json_decode($kpi, true);
$org_logo = $kpi_data['logo'];
$total_student_responses = $kpi_data['total_student_responses'];
$total_students = $kpi_data['total_students'];
$average_duration = $kpi_data['average_duration'];

if(is_numeric($average_duration[0])){
    $minutes = floor($average_duration[0] / 60);
    $seconds = $average_duration[0] % 60;        
}
else{
    $minutes = 0;
    $seconds = 0;
}
//     header('Location: nodata.php');
//     die();
// }

$comp_data = json_decode(fetch_data($base_url,"competency",$data),true);
// echo json_encode($comp_data);

// Check if the data was decoded successfully and is an array
if (is_array($comp_data)) {
    $averages = [];
    
    // Create a hashmap to map the original keys to human-readable names
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

    // Colors hashmap for each category
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

    // Sort the averages array in descending order by average values
    uasort($averages, function($a, $b) {
        return $b['average'] <=> $a['average'];
    });

    // Display the sorted results with only category name and color
    // foreach ($averages as $category => $info) {
    //     echo "$category : {$info['color']}\n";
    // }
} else {
    echo "Error decoding JSON data.";
}


$comp_q_data = json_decode(fetch_data($base_url,"competency-questions",$data),true);


include("./models/common/demographics.php");
$demo_data = json_decode($demo, true);

$dataArray = json_decode($demo, true);

$formattedData = [];

foreach ($dataArray as $question => $details) {
    $formattedData['data'] = []; 
    
    foreach ($details['values'] as $index => $value) {
        $formattedData['data'][] = [
            'y' => $value,
            'per' => intval($details['percentages'][$index])
        ];
    }
    $dataArray[$question]['formatted_data'] = $formattedData['data'];
}
$updatedJson = json_encode($dataArray, JSON_PRETTY_PRINT);


$dataArray = json_decode($updatedJson, true);

// echo json_encode($dataArray);
include("./models/filters/dropdowns.php");

// echo json_encode($_POST);

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Career Readiness Inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Career Readiness Inventory" name="Career Launch" />
    <meta name="description" content="CRI Partners Dashboard">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <!-- <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" /> -->

    <!-- <link rel="stylesheet" href="assets/libs/morris.js/morris.css"> -->

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <!-- <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- Responsive datatable examples -->
    <!-- <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"type="text/css" /> -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-css.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://code.highcharts.com/highcharts-more.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/solid-gauge.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
    <!-- <script src="http://code.highcharts.com/modules/exporting.js"></script> -->


    <style>
    .grid1 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 16px;
        grid-row-gap: 0px;
    }

    .grid1child {
        grid-area: 1 / 1 / 2 / 5;
    }

    .highcharts-credits {
        display: none !important;
    }

    .pie-text {
        font-size: 19.2px;
        font-weight: bold;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    .apexcharts-tooltip-y-group {
        background-color: white !important;
        /* Custom background color */
        color: Black !important;
        /* Custom text color */
    }

    .apexcharts-tooltip-series-group {
        background-color: white !important;
        border: black 2px;
    }

    .ruler {
        position: relative;
        width: 100%;
        height: 2px;
        background-color: #eaeaea;
        border: 1px solid #000;
    }

    .tick {
        position: absolute;
        width: 3.5px;
        height: 17px;
        margin-top: -8px;
        background-color: #000;
    }

    .tick:nth-child(1) {
        left: -1px;
    }

    .tick:nth-child(2) {
        left: 25%;
    }

    .tick:nth-child(3) {
        left: 50%;
    }

    .tick:nth-child(4) {
        left: 75%;
    }


    .tick:nth-child(5) {
        left: 100%;
        margin-left: -1px;
        /* Adjust to center the last tick */
    }

    .digit-ruler {
        position: relative;
        width: 99%;
        height: 2px;
        /* opacity: 0; */
    }

    .digit {
        position: absolute;
        text-align: center;
        margin-top: -8px;
        font-weight: bolder;
        color: black;
    }

    .digit:nth-child(1) {
        left: -5px;
    }

    .digit:nth-child(2) {
        left: 25%;
    }

    .digit:nth-child(3) {
        left: 50%;
    }

    .digit:nth-child(4) {
        left: 75%;
    }

    .digit:nth-child(5) {
        left: 100%;
        margin-left: -1px;
        /* Adjust to center the last tick */
    }



    .shimmer-animation {
        background: linear-gradient(-45deg, #eee 40%, #fafafa 50%, #eee 60%);
        /* add the following line: */
        background-attachment: fixed;
        background-size: 300%;
        animation-name: shimmer;
        animation-duration: 1000ms;
        animation-timing-function: linear;
        animation-delay: 0;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
    }

    @keyframes shimmer {
        0% {
            background-position-x: 100%;
        }

        100% {
            background-position-x: 0%;
        }
    }

    select {
        color: #000033 !important;
    }

    #SvgjsText1111 {
        fill: #12171dbf !important;
    }

    #SvgjsText1124 {
        fill: #12171dbf !important;
    }

    #SvgjsText1150 {
        fill: #12171dbf !important;
    }

    #SvgjsText1163 {
        fill: #12171dbf !important;
    }

    #SvgjsG1136 {
        fill: #12171dbf !important;
    }

    #SvgjsG1175 {
        fill: #12171dbf !important;
    }
    </style>
</head>

<body data-sidebar="dark" style="background-color:#dadadd59">

    <!-- <body data-layout="horizontal" data-topbar="light"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="container px-4">

            <nav class="navbar navbar-expand-lg navbar-dark py-2 px-3"
                style="border-radius: 0px 0px 16px 16px;background-color:#000033!important;">
                <a class="navbar-brand card mt-2" href="#"
                    style="margin-left:20px;padding-bottom:10p;border-radius:8px">
                    <div class="p-3">
                        <img class="img-fluid lazy" src="assets/images/logo.png" alt="cri_logo" style="width: 200px;">
                    </div>
                </a>
                <button class="navbar-toggler mr-5" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 100px;">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item card">
                            <div class="card-body py-1">
                                <a class="nav-link text-dark"
                                    href="./dashboard?organization=<?= $_GET['organization']?>"
                                    style="font-size:18px;">Dashboard
                                    <span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item" style="margin-left: 100px;">
                            <a class="nav-link" href="./resp?organization=<?= $_GET['organization']?>"
                                style="font-size:18px;color:white!important;">Responses</a>
                        </li>
                    </ul>
                    <select class="form-select bg-light" style="width:20%;margin-left:45%;display:none">
                        <option> All </option>
                        <option selected>This Week</option>
                        <option>This Month</option>
                        <option>This year</option>
                    </select>

                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                </div>
            </nav>

            <div class="page-content" style="padding-top: 27px!important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center" style="height: 153px;">
                                <div class="card-body" style="height: 100%;align-content: center;">
                                    <img class="img img-fluid lazy" src="<?= $org_logo ?>" alt="logo-dark"
                                        style="object-fit: cover;max-height:100%">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Students</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            <?=$total_students[0]?> </b></h2>
                                    <p class="mb-0 text-black mt-3"><b><?=$total_students[1]?>%</b>
                                        from Last Week</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Responses</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            <?=$total_student_responses[0]?></b></h2>
                                    <p class="mb-0 text-black mt-3"><b> <?=$total_student_responses[1]?>%</b>
                                        from Last Week</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Average
                                        Duration</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                                            <?=$minutes?> min <?=$seconds?>s </b>
                                    </h2>
                                    <p class="mb-0 text-black mt-3"><b><?=$average_duration[1]?>%</b>
                                        from Last Week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form method="POST" class="row mb-3"
                        style="border-radius: 16px;background-color:#000033!important;">
                        <div class="col col-lg-3 px-4 py-5">
                            <center>
                                <h5 class="mb-2 text-white" style="font-size:20px">Data Type</h5><br>
                                <select name="data_type" class="form-select select-light" style="border-radius: 20px;">
                                    <option value="nace"
                                        <?= $selected_values['data_type'] === 'nace' ? 'selected' : ''; ?>> NACE Career
                                        Readiness Competencies</option>
                                    <option value="plus"
                                        <?= $selected_values['data_type'] === 'plus' ? 'selected' : ''; ?>> Social
                                        Capital + Life Design + Career Mobility </option>
                                </select>
                                <select id="implementation_time" name="implementation_time"
                                    class="form-select select-light mt-3" style="border-radius: 20px;">
                                    <option value=""
                                        <?= $selected_values['implementation_time'] === '' ? 'selected' : ''; ?>>
                                        All Time</option>

                                    <!-- <?php foreach($implementation_type as $i): ?>
                                    <option value="<?= $i ?>"
                                        <?= $selected_values['implementation_time'] === $i ? 'selected' : ''; ?>>
                                        <?= ucwords($i) ?></option>
                                    <?php endforeach; ?> -->

                                    <option value="pre"
                                        <?= $selected_values['implementation_time'] === 'pre' ? 'selected' : ''; ?>>
                                        Pre-Experience</option>
                                    <option value="post"
                                        <?= $selected_values['implementation_time'] === 'post' ? 'selected' : ''; ?>>
                                        Post-Experience</option>
                                    <option value="Student : Pre vs. Post"
                                        <?= $selected_values['implementation_time'] === 'Student : Pre vs. Post' ? 'selected' : ''; ?>>
                                        Student : Pre vs. Post</option>
                                    <?php if(isset($_POST['implementation_type']) && $_POST['implementation_type'] == "work-exp"){ ?>
                                    <option value="eval"
                                        <?= $selected_values['implementation_time'] === 'eval' ? 'selected' : ''; ?>>
                                        Evaluator vs. Student (Post)</option>
                                    <?php } ?>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 px-4 py-5">
                            <center>
                                <h5 class="text-white mb-2" style="font-size:20px">Implementation Type</h5><br>
                                <select id="implementation_type" name="implementation_type"
                                    class="form-select select-light" style="border-radius: 20px;">
                                    <option value="">All Data</option>
                                    <?php foreach($implementation_type as $i): ?>
                                    <option value="<?= $i ?>"
                                        <?= $selected_values['implementation_type'] === $i ? 'selected' : ''; ?>>
                                        <?= ucwords($i) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="d-flex">
                                    <div class="col-sm-6">
                                        <select id="semester" name="semester" class="form-select select-light mt-3"
                                            style="border-radius: 20px;">
                                            <option value="">All Time</option>
                                            <?php foreach($semester as $i): ?>
                                            <option value="<?= base64_encode($i) ?>"
                                                <?= $selected_values['semester'] === base64_encode($i) ? 'selected' : ''; ?>>
                                                <?= ucwords($i) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="use_case_id" name="use_case_id"
                                            class="form-select select-light mt-3" style="border-radius: 20px;">
                                            <option value="">All Student Cohort</option>
                                            <?php foreach($use_case_id as $i): ?>
                                            <option value="<?= $i ?>"
                                                <?= $selected_values['use_case_id'] === $i ? 'selected' : ''; ?>>
                                                <?= ucwords($i) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="col col-lg-3 px-4 py-5">
                            <center>
                                <h5 class="text-white mb-2" style="font-size:20px">Academic Level</h5><br>
                                <select name="academic_level" class="form-select select-light"
                                    style="border-radius: 20px;">
                                    <option value="">All Levels</option>
                                    <?php foreach($academics as $i): ?>
                                    <option value="<?= $i ?>"
                                        <?= $selected_values['academic_level'] === $i ? 'selected' : ''; ?>>
                                        <?= ucwords($i) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 px-4 py-5">
                            <center>
                                <h5 class="text-white mb-2" style="font-size:20px">Demographic Group</h5><br>
                                <select name="demographics" class="form-select select-light"
                                    style="border-radius: 20px;">
                                    <option value="">All Students</option>
                                    <option value="First Generation"
                                        <?= $selected_values['demographics'] === 'First Generation' ? 'selected' : ''; ?>>
                                        First Generation Students</option>
                                    <option value="International"
                                        <?= $selected_values['demographics'] === 'International' ? 'selected' : ''; ?>>
                                        International Student</option>
                                    <!-- <?php foreach($demographics as $i): ?>
                                    <option value="<?= $i ?>"
                                        <?= $selected_values['demographics'] === $i ? 'selected' : ''; ?>>
                                        <?= ucwords($i) ?></option>
                                    <?php endforeach; ?> -->
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
                        if(isset($_POST['implementation_time'])){
                            if($_POST['implementation_time'] == "Student : Pre vs. Post")
                                include("prepost.php");
                            if($_POST['implementation_time'] == "eval")
                                include("student_eval.php");
                            else if($_POST['data_type'] == "nace")
                                include("nace-board.php");
                            else if($_POST['data_type'] == "plus")
                                include("plus-board.php");
                            }
                            else{
                                include("nace-board.php");
                            }
                    }    
                ?>
                    <!-- <?php
                if($_POST['data_type'] == "plus")
                    include("plus-board.php");
                ?> -->
                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer container" style="left: 20px!important;border-radius: 24px 24px 0px 0px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> © Career Launch.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Team Career Launch
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
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
    /**
     * In the chart render event, add icons on top of the circular shapes
     */
    function renderIcons() {

        this.series.forEach(series => {
            if (!series.icon) {
                series.icon = this.renderer
                    .text(
                        `<i class="fa fa-${series.options.custom.icon}"></i>`,
                        0,
                        0,
                        true
                    )
                    .attr({
                        zIndex: 10
                    })
                    .css({
                        color: series.options.custom.iconColor,
                        fontSize: '1.5em'
                    })
                    .add(this.series[2].group);
            }
            series.icon.attr({
                x: this.chartWidth / 2 - 15,
                y: this.plotHeight / 2 -
                    series.points[0].shapeArgs.innerR -
                    (
                        series.points[0].shapeArgs.r -
                        series.points[0].shapeArgs.innerR
                    ) / 2 +
                    8
            });
        });
    }
    </script>

    <!-- <script>
    $(".knob").knob({
                'format': function(value) {
                    return value + '%';
                });
    </script> -->

    <script>
    function setEmergingGaugeValue(percentage) {
        const gauge = document.getElementById('gauge-emerging-foreground');
        const text = document.getElementById('gauge-emerging-percentage');

        // Ensure percentage is between 0 and 100
        percentage = Math.max(0, Math.min(percentage, 100));

        // Calculate stroke-dasharray value
        const dashArrayValue = (percentage * 100) / 100;
        // Set the strokeDasharray and update the text content
        gauge.style.strokeDasharray = `${dashArrayValue + 7}, 100`;
        text.textContent = `${percentage}%`;
    }

    setEmergingGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Emerging Knowledge'][0]) ?>);
    // setEmergingGaugeValue(0);

    function setUnderstandingGaugeValue(percentage) {
        const gauge = document.getElementById('gauge-understanding-foreground');
        const text = document.getElementById('gauge-understanding-percentage');
        const offset = ((100 - percentage) / 100) * 100;
        gauge.style.strokeDasharray = `${percentage+7}, 100`;
        text.textContent = `${percentage}%`;
    }

    setUnderstandingGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Understanding'][0]) ?>);

    function setEarlyGaugeValue(percentage) {
        const gauge = document.getElementById('gauge-early-foreground');
        const text = document.getElementById('gauge-early-percentage');
        const offset = ((100 - percentage) / 100) * 100;
        gauge.style.strokeDasharray = `${percentage+7}, 100`;
        text.textContent = `${percentage}%`;
    }

    setEarlyGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Early Application'][0]) ?>);

    function setAdvancedGaugeValue(percentage) {
        const gauge = document.getElementById('gauge-advanced-foreground');
        const text = document.getElementById('gauge-advanced-percentage');
        const offset = ((100 - percentage) / 100) * 100;
        gauge.style.strokeDasharray = `${percentage+7}, 100`;
        text.textContent = `${percentage}%`;
    }

    setAdvancedGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Advanced Application'][0]) ?>);
    </script>

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
    $(document).ready(function() {
        $('#implementation_type').on('change', function() {
            var implementationType = $(this).val();
            var orgName = "<?php echo $_GET['organization']; ?>";
            $.ajax({
                url: 'load_caseid_dropdowns.php?org_name=' + encodeURIComponent(
                    orgName), // Add org_name as query parameter
                type: 'POST',
                dataType: 'json',
                data: {
                    implementation_type: implementationType
                },
                success: function(response) {
                    if (response.use_case_id_options) {
                        var useCaseIdDropdown = $('#use_case_id');
                        useCaseIdDropdown.empty(); // Clear existing options
                        useCaseIdDropdown.append(new Option("All", ""));
                        // Populate the dropdown with new options from the response
                        $.each(response.use_case_id_options, function(index, option) {
                            useCaseIdDropdown.append(new Option(option, option));
                        });
                    } else if (response.error) {
                        console.error(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#implementation_type').on('change', function() {
            var implementationType = $(this).val();
            var orgName = "<?php echo $_GET['organization']; ?>";
            $.ajax({
                url: 'load_semester_dropdown.php?org_name=' + encodeURIComponent(
                    orgName), // Add org_name as query parameter
                type: 'POST',
                dataType: 'json',
                data: {
                    implementation_type: implementationType
                },
                success: function(response) {
                    if (response.semester_options) {
                        var semesterDropdown = $('#semester');
                        semesterDropdown.empty(); // Clear existing options

                        semesterDropdown.append(new Option("All Time", ""));
                        // Populate the dropdown with new options from the response
                        $.each(response.semester_options, function(index, option) {
                            semesterDropdown.append(new Option(option, option));
                        });
                    } else if (response.error) {
                        console.error(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + error);
                }
            });

            if (implementationType == "work-exp")
                $("#implementation_time").append(new Option("Evaluator vs. Student (Post)"),
                    "studenteval");
        });
    });
    </script>

    <script>
    jQuery(function($) {
        console.log($, 'jquery works');
        console.log($("img.lazy").length);
        $("img.lazy").lazyload();
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
    </script>
</body>

</html>