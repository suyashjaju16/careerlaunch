<?php 
include("./models/config.php");
include("./models/plus/social-capital-bar.php");

function dataformatter($data){
    $dataArray = json_decode($data, true);

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
    return json_decode($updatedJson, true);
}

$social_bars_data = dataformatter($social_capital_bars);

include("./models/plus/life-design.php");
$life_design_data = dataformatter($life_design);

include("./models/plus/career-mobility-bars.php");
$career_mobility_data = dataformatter($career_mobility_bars);
// echo "<hr>";
include("./models/plus/career-mobility-pie.php");
$career_mobility_pie_data = dataformatter($career_mobility_pie);
// echo json_encode($career_mobility_data);
// echo json_encode($career_mobility_pie_data['Career Counselor (Choose Below)'],JSON_PRETTY_PRINT);

include("./models/plus/social-capital-pie.php");
// $social_pie_data = json_encode($social_capital_pie);
// Decode the JSON into an associative array
// $data = json_decode($social_pie_data, true);

// Access specific nested keys
// $category = json_encode($data);
// echo $social_capital_pie;

$social_pie_data = json_decode($social_capital_pie, true);

// echo json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Family Members (Choose Below)']['values']);

// Function to get values and labels for a specified key
function getValuesOrLabelsInJson($mainKey, $subKey, $type) {
    global $data; // Use the global data variable
    
    if (isset($data[$mainKey]) && isset($data[$mainKey][$subKey])) {
        if ($type === 'values') {
            // Return the values array as JSON
            return json_encode($data[$mainKey][$subKey]['values']);
        } elseif ($type === 'labels') {
            // Return the labels array as JSON
            return json_encode($data[$mainKey][$subKey]['labels']);
        } else {
            return json_encode(["error" => "Invalid type requested"]);
        }
    } else {
        return json_encode(["error" => "Key not found"]);
    }
}

// echo getValuesOrLabelsInJson(
//     "I have proactively asked family members (other than parents/guardians) and friends about their job or career.",
//     "Family Members (Choose Below)",
//     "values");

// echo getValuesOrLabelsInJson(
//     "I have proactively asked family members (other than parents/guardians) and friends about their job or career.",
//     "Family Members (Choose Below)",
//     "labels");

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Career Readiness Inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Career Readiness Inventory" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="assets/libs/morris.js/morris.css">

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

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
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

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
    </style>
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="light"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->


        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark py-2 px-3"
                style="border-radius: 0px 0px 16px 16px;background-color:#000033!important;">
                <a class="navbar-brand card mt-2" href="#"
                    style="margin-left:20px;padding-bottom:10p;border-radius:8px">
                    <div class="p-3">
                        <img class="img-fluid" src="assets/images/logo.png" style="width: 200px;">
                    </div>
                </a>
                <button class="navbar-toggler mr-5" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 100px;">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./index.html"
                                style="font-size:18px;color:white!important;">Dashboard <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" style="margin-left: 100px;">
                            <a class="nav-link" href="./responses.html"
                                style="font-size:18px;color:white!important;">Responses</a>
                        </li>
                    </ul>
                    <select class="form-select bg-light" style="width:20%;margin-left:45%">
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
                            <div class="card text-center" style="height: 86%;">
                                <div class="card-body" style="height: 100%;align-content: center;">
                                    <!-- <h4 class="card-title text-muted">Total Subscription</h4> -->
                                    <!-- <span class="logo-lg"> -->
                                    <img src="assets/images/asu.png" alt="logo-dark"
                                        style="object-fit: cover;width: 75%;">
                                    <!-- </span> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Students</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            100</b></h2>
                                    <p class="text-muted mb-0 mt-3"><b>42%</b> from Last 2 months</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Responses</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            250</b></h2>
                                    <p class="text-muted mb-0 mt-3"><b>22%</b> from Last 24 Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Average Duration</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                                            8 min 20 s </b>
                                    </h2>
                                    <p class="text-muted mb-0 mt-3"><b>35%</b> From Last 1 Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3" style="border-radius: 16px;background-color:#000033!important;">
                        <!-- <div class="col-sm-12">
                            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"> <i
                                    class="mdi mdi-filter-variant"
                                    style="color:white;width:50px;float:right;font-size:24px"></i> </a>
                        </div> -->
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2 card-title" style="color:white!important">Data Type</h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> NACE Competencies</option>
                                    <option selected> Plus Competencies </option>
                                    <option> Work Experience </option>
                                </select>
                                <select class="form-select bg-light mt-3" style="border-radius: 20px;">
                                    <option> Student: Pre-Experience</option>
                                    <option> Student: Post-Experience </option>
                                    <option> Student: Pre vs. Post </option>
                                    <option> Evaluator vs. Student (Post) </option>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-1 card-title" style="color:white!important">Experience Group
                                </h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option selected disabled> All Time </option>
                                    <option> Fall 24 </option>
                                    <option> Winter 25 </option>
                                    <option> Spring 24 </option>
                                </select>
                                <select class="form-select bg-light mt-3" style="border-radius: 20px;">
                                    <option selected disabled> All Group </option>
                                    <option> Work+ </option>
                                    <option> Department A</option>
                                    <option> Department B </option>
                                    <option> Department C </option>
                                    <option> Class 1 </option>
                                    <option> Class 2 </option>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2 card-title" style="color:white!important">School Year</h5>
                                <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> Bachelor's - 1st Year </option>
                                    <option> Bachelor's - 2nd Year </option>
                                    <option> Bachelor's - 3rd Year </option>
                                    <option> Bachelor's - 4th Year </option>
                                    <option> Bachelor's - 5th Year or beyond </option>
                                    <option> Masters </option>
                                    <option> Doctoral </option>
                                    <option disabled=""> OR </option>
                                    <option> Certificate Program </option>
                                    <option> Associate - 1st Year </option>
                                    <option> Associate - 2nd Year </option>
                                    <option> Associate 3rd Year or beyond </option>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2 card-title" style="color:white!important">Demographic Group
                                </h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> All Students </option>
                                    <option> First Gen Students </option>
                                    <option> International Students </option>
                                    <option disabled=""> ----------------------- </option>
                                    <option disabled=""> CUSTOM GROUPS </option>
                                    <option> Group A </option>
                                    <option> Group B </option>
                                    <option> Group C </option>
                                </select>
                                <button type="button" class="btn bg-white p-2 mt-3 rounded-circle btn-lg"
                                    style="height: 45px; font-size: 25px; width: 45px; line-height: 112%; color: #000032;"><i
                                        class="fa fa-plus"></i>
                                </button>
                            </center>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal modal-lg fade bs-example-modal-center" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Filter Dashboard</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-5">
                                    <div class="row p-3">
                                        <div class="col-sm-12">
                                            <select class="form-select">
                                                <option>Question 1</option>
                                            </select>
                                            <center>
                                                <h6 class="text-center self-align-center mt-3 mb-3 btn btn-secondary">
                                                    is equal to
                                                </h6>
                                            </center>
                                            <select class="form-select">
                                                <option>Option A</option>
                                                <option>Option B</option>
                                                <option>Option C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h2 class="text-center">+</h2>
                                    <!-- <hr style="color: rgba(108, 108, 108, 0.629);height:1px;opacity:1"> -->
                                    <div class="row p-3">
                                        <div class="col-sm-12">
                                            <select class="form-select">
                                                <option>Question 2</option>
                                            </select>
                                            <center>
                                                <h6 class="text-center self-align-center mt-3 mb-3 btn btn-secondary">
                                                    is equal to
                                                </h6>
                                            </center>
                                            <select class="form-select">
                                                <option>Option A</option>
                                                <option>Option B</option>
                                                <option>Option C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h2 class="text-center bg-primary align-content-center"
                                        style="width:50px;height:50px;margin:auto;border-radius:50%;color:white;font-size:30px">
                                        +</h2>
                                    <!-- <hr style="color: rgba(108, 108, 108, 0.629);"> -->
                                </div>
                                <hr class="mt-5 mb-0" style="color: rgba(108, 108, 108, 0.629);">
                                <div class="py-3 px-3 d-flex justify-content-between">
                                    <button type="button" class="btn btn-light " data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Apply Filter</button>
                                    <button type="button" class="btn btn-dark">Save Group</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <!-- <div class="row">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="inventorychart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- </div> -->
                </div>




                <!-- </div> -->

                <div class="accordion mb-3 mt-4 bg-white" id="accordionWork">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSocial">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSocial" aria-expanded="true" aria-controls="collapseSocial">
                                <div class="row w-100">
                                    <div class="col-sm-4">
                                        <div class="card mt-4" style="background-color:#1f5e34;margin-left:25px">
                                            <div class="row p-3">
                                                <div class="col-sm-4">
                                                    <img class="img-fluid" src="assets/images/social.png">
                                                </div>
                                                <div class="col-sm-8">
                                                    <h2 class="text-white text-center">Social <br> Capital</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseSocial" class="accordion-collapse" aria-labelledby="headingSocial"
                            data-bs-parent="#accordionSocial">
                            <div class="accordion-body">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="row p-4">
                                            <div class="col-sm-12">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 style="font-size:18px"> <b>I have relationships with
                                                                former
                                                                employers and professors
                                                                who would be willing to give me a formal recommendation
                                                                if/when needed.</b> </h6>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="card  border-2 mt-4">
                                                                    <div class="card-body">
                                                                        <div class="card-title">
                                                                            <h6 style="font-size:18px">Employer</h6>
                                                                        </div>
                                                                        <div id="social_chart1" class="apex-charts"
                                                                            dir="ltr" style="height:260px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card  border-2 mt-4">
                                                                    <div class="card-body">
                                                                        <div class="card-title">
                                                                            <h6 style="font-size:18px">Professor</h6>
                                                                        </div>
                                                                        <div id="social_chart2" class="apex-charts"
                                                                            dir="ltr" style="height:260px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 m-auto d-flex justify-content-between">
                                                                <div class="d-flex">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#2a4c09!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">Not yet
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#457010!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">1
                                                                        Relationship</div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#385b4f!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">2
                                                                        Relationship</div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#b1d8b7!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">3 or more
                                                                        Relationship
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="card p-3  border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 style="font-size:19.2px"> <b> I have proactively asked
                                                                family
                                                                members (other than
                                                                parents/guardians) and friends about their job or
                                                                career. </b>
                                                        </h6>
                                                        <div class="row mt-4">
                                                            <div class="col-sm-6">
                                                                <div class="card border-2">
                                                                    <div class="card-body">
                                                                        <div class="card-title">
                                                                            <h6 style="font-size:18px">Family Members
                                                                            </h6>
                                                                        </div>
                                                                        <div id="social_chart3" class="apex-charts mt-2"
                                                                            dir="ltr" style="height:260px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card border-2">
                                                                    <div class="card-body">
                                                                        <div class="card-title">
                                                                            <h6 style="font-size:18px">Friends and
                                                                                Family Friends</h6>
                                                                        </div>
                                                                        <div id="social_chart4" class="apex-charts mt-2"
                                                                            dir="ltr" style="height:260px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8 m-auto d-flex justify-content-between">
                                                                <div class="d-flex">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#2a4c09!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">Not and I
                                                                        had not
                                                                        considered this</div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#457010!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">Not yet
                                                                        but I plan to
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#385b4f!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">Yes, Once
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex ml-5">
                                                                    <div class="div mt-1"
                                                                        style="height:10px;width:10px;background-color:#b1d8b7!important">
                                                                    </div>
                                                                    <div style="margin-left:10px;color:black">Yes,
                                                                        Multiple times
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>Which of the following best represent your program or
                                                                area of study?</h6> -->
                                                            <div id="social_chart5" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>Which of the following best represent your program or
                                                                area of study?</h6> -->
                                                            <div id="social_chart6" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>I have proactively asked to have a career
                                                                conversation with a professional at an
                                                                organization I’m interested in working for.</h6> -->
                                                            <div id="social_chart7" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>I have proactively asked someone I know to introduce me
                                                                to someone they know so I can talk to them to learn
                                                                about their career.</h6> -->
                                                            <div id="social_chart8" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingLife">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseLife" aria-expanded="true" aria-controls="collapseLife">
                                <div class="row w-100">
                                    <div class="col-sm-4">
                                        <div class="card mt-4" style="background-color:#ff8c00;margin-left:25px">
                                            <div class="row p-3">
                                                <div class="col-sm-4">
                                                    <img class="img-fluid" src="assets/images/life.png">
                                                </div>
                                                <div class="col-sm-8 align-content-center">
                                                    <h2 class="text-center" style="color:black!important">Life Design
                                                        <br> Mindsets
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseLife" class="accordion-collapse" aria-labelledby="headingLife"
                            data-bs-parent="#accordionLife">
                            <div class="accordion-body">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="row p-4">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>When things don't go the way I had envisioned or
                                                                when I encounter a setback, I recognize that the
                                                                setback is an opportunity to learn and grow,
                                                                rather than a “mistake."?</h6> -->
                                                            <div id="life_chart1" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>When I feel stuck in life, I reach out to others
                                                                who help me uncover new solutions or ways of
                                                                thinking about the situation.</h6> -->
                                                            <div id="life_chart2" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>When I feel stuck in regards to my career plans, I
                                                                have strategies I use to help me move forward
                                                                (become “unstuck”).
                                                            </h6> -->
                                                            <div id="life_chart3" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>I think taking measured risks and learning to
                                                                embrace failure is important in my career
                                                                success.</h6> -->
                                                            <div id="life_chart4" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>I have the tools I need to build a happy,
                                                                meaningful, and successful life.</h6> -->
                                                            <div id="life_chart5" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card border-2">
                                                        <div class="card-body">
                                                            <!-- <h6>I often try to look at problems from different
                                                                perspectives to find new ways to move forward.
                                                            </h6> -->
                                                            <div id="life_chart6" class="apex-charts" dir="ltr"
                                                                style="height:300px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCareer">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseCareer" aria-expanded="true" aria-controls="collapseCareer">
                                <div class="row w-100">
                                    <div class="col-sm-4">
                                        <div class="card mt-4" style="background-color:#1f3f95;margin-left:25px">
                                            <div class="row p-3">
                                                <div class="col-sm-4">
                                                    <img class="img-fluid" src="assets/images/career.png">
                                                </div>
                                                <div class="col-sm-8">
                                                    <h2 class="text-white text-center">Career <br> Mobility
                                                        Skills</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseCareer" class="accordion-collapse" aria-labelledby="headingCareer"
                            data-bs-parent="#accordionCareer">
                            <div class="accordion-body">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="card border-2">
                                            <div class="p-3">
                                                <div class="card-title">
                                                    <text class="highcharts-title"
                                                        style="font-size: 19.2px; color: rgb(51, 51, 51); font-weight: bold; fill: rgb(51, 51, 51);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji"">
                                                        I have received helpful career
                                                        advice from a faculty member,
                                                        career
                                                        counselor, or employer.</text>
                                                </div>
                                                <div class=" row mt-3">
                                                        <div class="col-sm-4">
                                                            <div class="card border-2">
                                                                <div class="card-body">
                                                                    <h6 style="font-size:18px">Professor or Faculty
                                                                        Member</h6>
                                                                    <!-- <h6>Professor or Faculty Member
                                                                    </h6> -->
                                                                    <div id="career_chart1" class="apex-charts mt-5"
                                                                        dir="ltr" style="height:300px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card border-2">
                                                                <div class="card-body">
                                                                    <!-- <h6>Career Counselor
                                                                    </h6> -->
                                                                    <h6 style="font-size:18px">Career Counselor</h6>
                                                                    <div id="career_chart2" class="apex-charts mt-5"
                                                                        dir="ltr" style="height:300px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card border-2">
                                                                <div class="card-body">
                                                                    <!-- <h6>Employers
                                                                    </h6> -->
                                                                    <h6 style="font-size:18px">Employers</h6>
                                                                    <div id="career_chart3" class="apex-charts mt-5"
                                                                        dir="ltr" style="height:300px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 m-auto d-flex justify-content-between">
                                                            <div class="d-flex">
                                                                <div class="div mt-1"
                                                                    style="height:10px;width:10px;background-color:#2f5f98!important">
                                                                </div>
                                                                <div style="margin-left:10px;color:black">Not and I had
                                                                    not
                                                                    considered this</div>
                                                            </div>
                                                            <div class="d-flex ml-5">
                                                                <div class="div mt-1"
                                                                    style="height:10px;width:10px;background-color:#2c8bba!important">
                                                                </div>
                                                                <div style="margin-left:10px;color:black">Not yet but I
                                                                    plan to
                                                                </div>
                                                            </div>
                                                            <div class="d-flex ml-5">
                                                                <div class="div mt-1"
                                                                    style="height:10px;width:10px;background-color:#40b8d5!important">
                                                                </div>
                                                                <div style="margin-left:10px;color:black">Yes, Once
                                                                </div>
                                                            </div>
                                                            <div class="d-flex ml-5">
                                                                <div class="div mt-1"
                                                                    style="height:10px;width:10px;background-color:#6ce5e8!important">
                                                                </div>
                                                                <div style="margin-left:10px;color:black">Yes, Multiple
                                                                    times
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="row p-4">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="card border-2">
                                                            <div class="card-body">
                                                                <!-- <h6>My college/university has helped me build
                                                                    relationships with employers.
                                                                </h6> -->
                                                                <div id="career_chart4" class="apex-charts" dir="ltr"
                                                                    style="height:300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="card border-2">
                                                            <div class="card-body">
                                                                <!-- <h6>I have completed at least one experience
                                                                    working in an environment similar to my career
                                                                    interests (internship, research position, part-
                                                                    time job, significant volunteering).
                                                                </h6> -->
                                                                <div id="career_chart5" class="apex-charts" dir="ltr"
                                                                    style="height:300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="card border-2">
                                                            <div class="card-body">
                                                                <!-- <h6>I have created career plans with guidance from a
                                                                    staff or faculty member at my college.
                                                                </h6> -->
                                                                <div id="career_chart6" class="apex-charts" dir="ltr"
                                                                    style="height:300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="card border-2">
                                                            <div class="card-body">
                                                                <!-- <h6>I have received feedback on my resume, and I
                                                                    am confident that it effectively showcases my
                                                                    candidacy (from counselors, professionals
                                                                    and/or my school's resume software provider).
                                                                </h6> -->
                                                                <div id="career_chart7" class="apex-charts" dir="ltr"
                                                                    style="height:300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="card border-2">
                                                            <div class="card-body">
                                                                <!-- <h6>I feel prepared to land internships, jobs, or
                                                                    research positions that have not been posted
                                                                    online.
                                                                </h6> -->
                                                                <div id="career_chart8" class="apex-charts" dir="ltr"
                                                                    style="height:300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header bg-white pt-4" id="headingDemographics">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDemographics" aria-expanded="true"
                                aria-controls="collapseDemographics">
                                <h1 style="margin-left:25px"> Demographics </h1>
                            </button>
                        </h2>
                        <div id="collapseDemographics" class="accordion-collapse" aria-labelledby="headingDemographics"
                            data-bs-parent="#accordionDemographics">
                            <div class="accordion-body bg-white">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <!-- <h6> At what degree/certificate/class year are you
                                                                currently
                                                                enrolled? </h6> -->
                                                        <div id="bar_chart2" class="apex-charts" dir="ltr"
                                                            style="height:370px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2" style="height:435px;overflow:scroll">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Which of the following best represent
                                                            your
                                                            program
                                                            or
                                                            area
                                                            of study? </h6>

                                                        <!-- <div id="bar_chart3" class="apex-charts" dir="ltr"
                                                            style="height:370px">
                                                        </div> -->
                                                        <table class="table table-striped"
                                                            style="text-align:left!important">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Students</th>
                                                                    <th scope="col">%</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Accounting and Computer Science</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Accounting and Related Services</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Aerospace, Aeronautical and Astronautical
                                                                        Engineering</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>African Languages, Literatures, and
                                                                        Linguistics
                                                                    </td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>Agricultural and Domestic Animal Services
                                                                    </td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td>Agricultural and Food Products Processing
                                                                    </td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>Agricultural Engineering</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td>Jacob</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td>Larry</td>
                                                                    <td>222</td>
                                                                    <td>33%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Gender: How do you identify? </h6>
                                                        <div id="bar_chart4" class="apex-charts" dir="ltr"
                                                            style="height:370px">
                                                        </div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Male</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Female</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Non-binary</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#ff4560">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 d-flex flex-fill">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <!-- <h6> Which of the following categories would you use to
                                                                best
                                                                describe yourself?
                                                            </h6> -->
                                                        <div id="bar_chart5" class="apex-charts" dir="ltr"
                                                            style="height:395px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6  d-flex flex-fill">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <!-- <h6> What is your parent(s) or caregiver(s) highest
                                                                level of
                                                                education in the
                                                                United
                                                                States?</h6> -->
                                                        <div id="bar_chart6" class="apex-charts" dir="ltr"
                                                            style="height:390px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Do you have a diagnosed disability?
                                                        </h6>
                                                        <div id="chart7" class="apex-charts" dir="ltr"
                                                            style="height:370px"></div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Yes</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    No</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Do you identify as a member of the
                                                            LGBTQ+
                                                            <br> community?
                                                        </h6>

                                                        <div id="chart8" class="apex-charts" dir="ltr"
                                                            style="height:370px"></div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Yes</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    No</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Is English the primary language spoken
                                                            at your
                                                            childhood
                                                            home?</h6>
                                                        <div id="chart9" class="apex-charts" dir="ltr"
                                                            style="height:370px"></div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Yes</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    No</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Are you a parent to a child under 18
                                                            years old?
                                                        </h6>
                                                        <div id="chart10" class="apex-charts" dir="ltr"
                                                            style="height:370px"></div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Yes</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    No</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6  d-flex flex-fill">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <!-- <h6> Have you ever served on active duty in the U.S.
                                                                Armed
                                                                Forces, Reserves, or
                                                                National Guard? (Optional)</h6> -->
                                                        <div id="chart13" class="apex-charts" dir="ltr"
                                                            style="height:390px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <h6 class="pie-text"> Are you the primary caregiver to a
                                                            family member
                                                            (not a
                                                            child) such as a
                                                            parent, partner, etc.? (Optional)</h6>
                                                        <div id="chart12" class="apex-charts" dir="ltr"
                                                            style="height:370px"></div>
                                                        <div class="d-flex justify-content-evenly">
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Yes</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e296 !important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    No</div>
                                                            </div>
                                                            <div class="d-inline-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#fdb01a">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Prefer not to respond</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6  d-flex flex-fill">
                                                <div class="card p-3 border-2">
                                                    <div class="card-body px-3 py-3">
                                                        <!-- <h6> Age </h6> -->
                                                        <div id="chart14" class="apex-charts" dir="ltr"
                                                            style="height:410px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card p-3 border-2">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="card-body px-3 py-3">
                                                                <!-- <h6> Which of the following sources did you use
                                                                        to
                                                                        finance your college
                                                                        tuition?
                                                                        (Optional) </h6> -->
                                                                <div id="chart15" class="apex-charts" dir="ltr"
                                                                    style="height:390px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="card-body">
                                                                <h3>Others</h3>
                                                                <!-- <hr style="color:grey"> -->
                                                                <!-- <ol style="line-height:200%">
                                                <li>Cash - 5 </li>
                                                <li> Grant A - 2 </li>
                                                <li> International Student Scholorship - 4 </li>
                                            </ol> -->

                                                                <table class="table" style="color:black!important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Detail</th>
                                                                            <th scope="col">Count</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr style="color:black!important;">
                                                                            <th scope="row"
                                                                                style="color:black!important;">1
                                                                            </th>
                                                                            <td style="color:black!important;">Cash
                                                                            </td>
                                                                            <td style="color:black!important;">5
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td style="color:black!important;">Grant
                                                                                A</td>
                                                                            <td style="color:black!important;">2
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td style="color:black!important;">
                                                                                International Student
                                                                                Scholorship
                                                                            </td>
                                                                            <td style="color:black!important;">4
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Team Career Launch
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4 shadow">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                            data-bsStyle="assets/css/bootstrap-dark.min.css"
                            data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch"
                            data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>


        <!-- morris chart -->
        <script src="assets/libs/morris.js/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/pages/index.init.js"></script>

        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <script src="assets/js/pages/jquery-knob.init.js"></script>

        <!-- materialdesign icon js-->
        <script src="assets/js/pages/materialdesign.init.js"></script>


        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
        var options = {
            series: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Employers (Choose Below)']['values']); ?>,
            chart: {
                type: 'donut',
                height: 250,
                width: 300,
            },
            fill: {
                colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7'],
            },

            legend: {
                show: false
            },
            tooltip: {
                fillSeriesColor: true, // Tooltip uses the series fill color              
            },
            labels: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Employers (Choose Below)']['labels']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#social_chart1"), options);
        chart.render();

        var options = {
            series: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Teachers/Professors (Choose Below)']['values']); ?>,
            chart: {
                type: 'donut',
                height: 250,
                width: 300
            },
            fill: {
                colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7']
            },
            legend: {
                show: false
            },
            labels: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Teachers/Professors (Choose Below)']['values']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#social_chart2"), options);
        chart.render();

        var options = {
            series: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Family Members (Choose Below)']['values']);?>,
            chart: {
                type: 'donut',
                height: 250,
                width: 300
            },
            fill: {
                colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7']
            },
            legend: {
                show: false
            },
            labels: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Family Members (Choose Below)']['labels']);?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#social_chart3"), options);
        chart.render();

        var options = {
            series: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Friends and Family Friends (Choose Below)']['values']);?>,
            chart: {
                type: 'donut',
                height: 250,
                width: 300
            },
            fill: {
                colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7']
            },
            legend: {
                show: false
            },
            labels: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Friends and Family Friends (Choose Below)']['labels']);?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#social_chart4"), options);
        chart.render();


        Highcharts.chart('social_chart5', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1e5e34',
                },
                series: {
                    pointWidth: 30,
                    color: '#1e5e34',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($social_bars_data['I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($social_bars_data['I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).']['formatted_data']);?>,
                showInLegend: false
            }]

        });


        Highcharts.chart('social_chart6', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1e5e34',
                },
                series: {
                    pointWidth: 30,
                    color: '#1e5e34',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($social_bars_data['I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($social_bars_data['I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.']['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('social_chart7', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1e5e34',
                },
                series: {
                    pointWidth: 30,
                    color: '#1e5e34',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($social_bars_data['I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($social_bars_data['I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.']['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('social_chart8', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have proactively reached out to an alum from my school to learn about their career path.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1e5e34',
                },
                series: {
                    pointWidth: 30,
                    color: '#1e5e34',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($social_bars_data['I have proactively reached out to an alum from my school to learn about their career path.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($social_bars_data['I have proactively reached out to an alum from my school to learn about their career path.']['formatted_data']);?>,
                showInLegend: false
            }]

        });



        Highcharts.chart('life_chart1', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have the tools I need to build a happy, meaningful, and successful life.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['I have the tools I need to build a happy, meaningful, and successful life.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['I have the tools I need to build a happy, meaningful, and successful life.']['formatted_data']);?>,
                showInLegend: false
            }]

        });


        Highcharts.chart('life_chart2', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I often try to look at problems from different perspectives to find new ways to move forward.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['I often try to look at problems from different perspectives to find new ways to move forward.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['I often try to look at problems from different perspectives to find new ways to move forward.']['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('life_chart3', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I think taking measured risks and learning to embrace failure is important in my career success.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['I think taking measured risks and learning to embrace failure is important in my career success.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['I think taking measured risks and learning to embrace failure is important in my career success.']['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('life_chart4', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.']['formatted_data']);?>,
                showInLegend: false
            }]

        });


        Highcharts.chart('life_chart5', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).']['formatted_data']);?>,
                showInLegend: false
            }]

        });


        Highcharts.chart('life_chart6', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#ff8c00',
                },
                series: {
                    pointWidth: 30,
                    color: '#ff8c00',
                    dataLabels: {
                        enabled: true,
                        inside: false,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($life_design_data['When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.']['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = 'black'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($life_design_data['When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.']['formatted_data']);?>,
                showInLegend: false
            }]

        });

        var options = {
            series: <?= json_encode($career_mobility_pie_data['Professor or Faculty Member (Choose Below)']['values']); ?>,
            chart: {
                type: 'donut',
                height: 400,
                width: 300
            },
            fill: {
                colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
            },
            legend: {
                show: false,
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
                position: 'bottom',
                horizontalAlign: 'left',
                floating: false,
                fontSize: '16px',
                fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"',
                fontWeight: 400,
                formatter: undefined,
                inverseOrder: false,
                width: undefined,
                height: undefined,
                tooltipHoverFormatter: undefined,
                customLegendItems: [],
                offsetX: 0,
                offsetY: 50,

                labels: {
                    colors: undefined,
                    useSeriesColors: false
                },
                markers: {
                    size: 9,
                    shape: 'square',
                    strokeWidth: 1,
                    fillColors: undefined,
                    customHTML: undefined,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 5
                },
                onItemClick: {
                    toggleDataSeries: true
                },
                onItemHover: {
                    highlightDataSeries: true
                },
            },
            labels: <?= json_encode($career_mobility_pie_data['Professor or Faculty Member (Choose Below)']['labels']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#career_chart1"), options);
        chart.render();

        var options = {
            series: <?= json_encode($career_mobility_pie_data['Career Counselor (Choose Below)']['values']); ?>,
            chart: {
                type: 'donut',
                height: 400,
                width: 300
            },
            fill: {
                colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
            },
            legend: {
                show: false
            },
            labels: <?= json_encode($career_mobility_pie_data['Career Counselor (Choose Below)']['labels']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#career_chart2"), options);
        chart.render();

        var options = {
            series: <?= json_encode($career_mobility_pie_data['Employers (Choose Below)']['values']); ?>,
            chart: {
                type: 'donut',
                height: 400,
                width: 300
            },
            fill: {
                colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
            },
            legend: {
                show: false
            },
            labels: <?= json_encode($career_mobility_pie_data['Employers (Choose Below)']['labels']); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 100
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#career_chart3"), options);
        chart.render();


        Highcharts.chart('career_chart4', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I feel prepared to land internships / jobs / research positions that have not been posted online.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1f3f95',
                },
                series: {
                    pointWidth: 30,
                    color: '#1f3f95',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($career_mobility_data[
                            'I feel prepared to land internships / jobs / research positions that have not been posted online.'
                            ]['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($career_mobility_data[
                            'I feel prepared to land internships / jobs / research positions that have not been posted online.'
                            ]['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('career_chart5', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have completed at least one experience working in an environment similar to my career interests.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1f3f95',
                },
                series: {
                    pointWidth: 30,
                    color: '#1f3f95',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($career_mobility_data[
                            'I have completed at least one experience working in an environment similar to my career interests.'
                            ]['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($career_mobility_data[
                            'I have completed at least one experience working in an environment similar to my career interests.'
                            ]['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('career_chart6', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have created career plans with guidance from a staff or faculty member at my college.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1f3f95',
                },
                series: {
                    pointWidth: 30,
                    color: '#1f3f95',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($career_mobility_data[
                            'I have created career plans with guidance from a staff or faculty member at my college.'
                            ]['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($career_mobility_data[
                            'I have created career plans with guidance from a staff or faculty member at my college.'
                            ]['formatted_data']);?>,
                showInLegend: false
            }]

        });

        Highcharts.chart('career_chart7', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1f3f95',
                },
                series: {
                    pointWidth: 30,
                    color: '#1f3f95',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($career_mobility_data[
                            'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.'
                            ]['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($career_mobility_data[
                            'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.'
                            ]['formatted_data']);?>,
                showInLegend: false
            }]

        });


        Highcharts.chart('career_chart8', {

            chart: {
                type: 'bar'
            },

            title: {
                text: 'I have received helpful career advice from a faculty member, career counselor, or employer.',
                align: 'left'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    backgroundColor: '#1f3f95',
                },
                series: {
                    pointWidth: 30,
                    color: '#1f3f95',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                    }
                },
            },

            xAxis: {
                categories: <?= json_encode($career_mobility_data[
                            'I have received helpful career advice from a faculty member, career counselor, or employer.'
                            ]['labels']);?>,
                crosshair: true,
                accessibility: {
                    description: 'Labels'
                },
            },

            yAxis: {
                title: {
                    text: 'Responses'
                }
            },

            series: [{
                dataLabels: [{
                    align: 'right',
                    inside: false,
                    floating: true,
                    formatter: function() {
                        var max = this.series.yAxis.max;
                        var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                        perc = ((this.y / max).toFixed(2)) * 100;
                        return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                            '%)</span>';
                    },
                }],
                data: <?= json_encode($career_mobility_data[
                            'I have received helpful career advice from a faculty member, career counselor, or employer.'
                            ]['formatted_data']);?>,
                showInLegend: false
            }]

        });
        </script>

        <script>
        $(".knob").knob({
                    'format': function(value) {
                        return value + '%';
                    }
        </script>



        <!-- apexcharts init -->
        <script src="assets/js/pages/apexcharts.init.js"></script>
</body>

</html>