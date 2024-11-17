<?php 
// create & initialize a curl session
$curl = curl_init();

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, "https://mnkw9qkrt3.execute-api.us-east-2.amazonaws.com/test/Print?firstgen=yes&universityName=UMass_Boston");

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);

$result = json_decode($output,true);

// echo $output;

// echo $output['result']['NumStudents'];
// echo $result['result']['university'];

var_dump(parse_url($url));
var_dump(parse_url($url, PHP_URL_SCHEME));


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

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2 px-3"
                style="border-radius: 0px 0px 16px 16px;">
                <a class="navbar-brand" href="#" style="margin-left:20px;padding-bottom:10px">
                    <img class="img-fluid" src="assets/images/CRI.png" style="width: 200px;">
                </a>
                <button class="navbar-toggler mr-5" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 100px;">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./index.html">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" style="margin-left: 100px;">
                            <a class="nav-link" href="./responses.html">Responses</a>
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
                                    <img src="assets/images/UMass_Boston_logo.png" alt="logo-dark"
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
                                            <?= $result['result']['NumStudents']; ?></b></h2>
                                    <p class="text-muted mb-0 mt-3"><b>42%</b> from Last 2 months</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Responses</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            <?= $result['result']['total_rows']; ?></b></h2>
                                    <p class="text-muted mb-0 mt-3"><b>22%</b> from Last 24 Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Average Duration</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                                            <?= $result['result']['average_duration']; ?> sec </b>
                                    </h2>
                                    <p class="text-muted mb-0 mt-3"><b>35%</b> From Last 1 Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row bg-dark pt-3 mb-5" style="border-radius: 16px;">
                        <div class="col-sm-12">
                            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"> <i
                                    class="mdi mdi-filter-variant"
                                    style="color:white;width:50px;float:right;font-size:24px"></i> </a>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2">Data Type</h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> NACE Competencies</option>
                                    <option> Plus Competencies </option>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2">Implementation Type</h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> Upon Entry </option>
                                    <option> Upon Exit </option>
                                    <option> Entry VS Exit </option>
                                    <option> Student Cohorts </option>
                                    <option> Embedded Courses </option>
                                    <option> Misc. </option>
                                </select>
                            </center>
                        </div>
                        <div class="col col-lg-3 p-5">
                            <center>
                                <h5 class="text-white mb-2">School Year</h5> <br>
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
                                <h5 class="text-white mb-2">Select Demographic Group</h5> <br>
                                <select class="form-select bg-light" style="border-radius: 20px;">
                                    <option> All Students </option>
                                    <option> First Gen Students </option>
                                    <option> International Students </option>
                                </select>
                                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-center" style="border-radius: 45%;margin-top: 10px;">+</button> -->
                            </center>
                        </div>
                    </div>

                    <!-- <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-lg-3">
                                <div id="radial_chart" class="apex-charts" dir="ltr"></div>
                                <center>
                                <div class="row px-5">
                                    <div class="col-sm-6">
                                       <h4> Pre</h4> 120
                                    </div>
                                    <div class="col-sm-6">
                                       <h4> Post </h4> 120
                                    </div>
                                </div>
                                </center>
                            </div>
                            <div class="col-lg-3">
                                <div id="radial_chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Overall Career Readiness
                            </h5>
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <div class="text-center" dir="ltr">
                                        <h4 class="font-size-14 mb-3" style="font-weight: 800;">Emerging Knowledge</h4>
                                        <input class="knob " data-width="150" data-min="0" data-max="4"
                                            data-readOnly=true data-fgcolor="#008ffb" data-displayprevious="true"
                                            value="1">
                                        <h5 class="font-size-14 mb-3" style="margin-top: -40px;">100 Students</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="text-center" dir="ltr">
                                        <h4 class="font-size-14 mb-3" style="font-weight: 800;">Understanding</h4>
                                        <input class="knob" data-width="150" data-min="0" data-max="4"
                                            data-readOnly=true data-fgcolor="#00e396" data-displayprevious="true"
                                            value="2">
                                        <h5 class="font-size-14 mb-3" style="margin-top: -40px;">200 Students</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="text-center" dir="ltr">
                                        <h4 class="font-size-14 mb-3" style="font-weight: 800;">Early Application</h4>
                                        <input class="knob" data-width="150" data-min="0" data-max="4"
                                            data-readOnly=true data-fgcolor="#fcb92c" data-displayprevious="true"
                                            value="3">
                                        <h5 class="font-size-14 mb-3" style="margin-top: -40px;">300 Students</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="text-center" dir="ltr">
                                        <h4 class="font-size-14 mb-3" style="font-weight: 800;">Advanced Application
                                        </h4>
                                        <input class="knob" data-width="150" data-min="0" data-max="4"
                                            data-readOnly=true data-fgcolor="#ff4560" data-displayprevious="true"
                                            value="4">
                                        <h5 class="font-size-14 mb-3" style="margin-top: -40px;">400 Students</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 mt-4">
                                <div class="progress" style="overflow:unset!important;height:5px;">
                                    <div class="progress-value" style="margin-left:52%!important">60</div>
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;height:5px"
                                        aria-valuenow="0%" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar-marker" role="progressbar"
                                        style="width: 25%;margin-top:-7px;margin-left:-125%" aria-valuenow="1"
                                        aria-valuemin="0" aria-valuemax="0"></div>
                                    <div class="progress-bar-marker" role="progressbar"
                                        style="width: 25%;margin-top:-7px" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                    <div class="progress-bar-marker" role="progressbar"
                                        style="width: 25%;margin-top:-7px" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                    <div class="progress-bar-marker" role="progressbar"
                                        style="width: 25%;margin-top:-7px" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                    <div class="progress-bar-marker" role="progressbar"
                                        style="width: 25%;margin-top:-7px" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>

                                <div class="d-flex mt-2" style="width:93%">
                                    <p> <b>0 </b></p>
                                    <p style="margin-left:25%"><b>25</b></p>
                                    <p style="margin-left:25%"><b>50</b></p>
                                    <p style="margin-left:25%"><b>75</b></p>
                                    <p style="margin-left:25%"><b>100</b></p>
                                </div>
                            </div>
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
                                        <div class="col-sm-2">
                                            <h6>Filter Type</h6>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-select">
                                                <option>Outcome</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>is not equal to</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>Access Denied</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr style="color: rgba(108, 108, 108, 0.629);">
                                    <div class="row p-3">
                                        <div class="col-sm-2">
                                            <h6>Filter Type</h6>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-select">
                                                <option>Outcome</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>is not equal to</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>Access Denied</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr style="color: rgba(108, 108, 108, 0.629);">

                                    <div class="row p-3">
                                        <div class="col-sm-2">
                                            <h6>Filter Type</h6>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-select">
                                                <option>Outcome</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>is not equal to</option>
                                            </select>
                                            <select class="form-select mt-3">
                                                <option>Access Denied</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save
                                        changes</button>
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





                <div class="card p-3">
                    <div class="card">
                        <!-- style="position:fixed; top:0; max-width:80%; z-index:100;" -->
                        <div class="row sticky">
                            <div class="col-sm-3 align-content-center">
                                <h3>Career Readiness Level</h3>
                            </div>
                            <div class="col-sm-9">
                                <div class="row p-3  mt-3">
                                    <div class="col-sm-3">
                                        <div class="btn btn-primary">Emerging Knowledge</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="btn btn-success">Understanding</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="btn btn-warning">Early Application</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="btn btn-danger">Advanced
                                            Application</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingZero">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseZero" aria-expanded="false"
                                    aria-controls="flush-collapseZero">
                                    <div class="row align-items-center p-0 w-100">
                                        <div
                                            class="col-sm-3 d-flex p-3 mb-0 flex-row align-items-center card bg-warning align-content-center">
                                            <img class="img-fluid"
                                                src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                                style="height: 70px;width: 70px;margin: auto;">
                                            <p class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                                Career
                                                & <br>Self Development </p>
                                        </div>
                                        <div class="col-sm-9 p-3">
                                            <div class="grid1 mt-1">
                                                <!-- <div class="grid1child"> -->
                                                <div class="align-items-center card bg-primary p-3">
                                                    <h4 class="text-white mt-1">20%</h4>
                                                    <p class="icon-text text-dark mb-0" style="color: white!important;">
                                                        <small> (100 Students)</small>
                                                    </p>
                                                </div>
                                                <div class="align-items-center card bg-success p-3">
                                                    <h4 class="text-white">10%</h4>
                                                    <p class="px-2 icon-text text-dark mb-0"
                                                        style="color: white!important;">
                                                        <small> (50 Students)</small>
                                                    </p>
                                                </div>
                                                <div class="align-items-center card bg-primary p-3 border border-dark border-4"
                                                    style="box-shadow: 0 0 0 2px #f3f5f6 inset;">
                                                    <h4 class="text-white">30%</h4>
                                                    <p class="px-2 f-small icon-text text-dark mb-0"
                                                        style="color: white!important;">
                                                        <small> (200 Students)</small>
                                                    </p>
                                                </div>
                                                <div class="align-items-center card bg-danger p-3">
                                                    <h4 class="text-white">40%</h4>
                                                    <p class="px-2 icon-text text-dark mb-0"
                                                        style="color: white!important;">
                                                        <small> 150 Students)</small>
                                                    </p>
                                                </div>
                                                <!-- </div> -->
                                            </div>

                                            <div class="progress" style="overflow:unset!important;height:5px">
                                                <div class="progress-value" style="margin-left:53%!important">60</div>
                                                <div class="progress-bar bg-dark" role="progressbar"
                                                    style="width: 100%;height:5px" aria-valuenow="0%" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar-marker" role="progressbar"
                                                    style="width: 25%;margin-top:-7px;margin-left:-125%"
                                                    aria-valuenow="1" aria-valuemin="0" aria-valuemax="0"></div>
                                                <div class="progress-bar-marker" role="progressbar"
                                                    style="width: 25%;margin-top:-7px" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar-marker" role="progressbar"
                                                    style="width: 25%;margin-top:-7px" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar-marker" role="progressbar"
                                                    style="width: 25%;margin-top:-7px" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar-marker" role="progressbar"
                                                    style="width: 25%;margin-top:-7px" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mt-2" style="width:90%">
                                                <p> <b>0 </b></p>
                                                <p style="margin-left:25%"><b>25</b></p>
                                                <p style="margin-left:25%"><b>50</b></p>
                                                <p style="margin-left:25%"><b>75</b></p>
                                                <p style="margin-left:25%"><b>100</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-collapseZero" class="accordion-collapse collapse"
                                aria-labelledby="flush-flush-collapseZero" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-sm-3 text-center mb-0 align-content-center">
                                                <p class="px-2 icon-text text-dark mb-0">Awareness of Strength &
                                                    Challenges
                                                </p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="grid1 mt-4">
                                                    <div class="align-items-center card bg-primary p-3">
                                                        <h4 class="text-white mt-1">20%</h4>
                                                        <p class="icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (100 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-success p-3">
                                                        <h4 class="text-white">10%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (50 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-primary p-3 border border-dark border-4"
                                                        style="box-shadow: 0 0 0 2px #f3f5f6 inset;">
                                                        <h4 class="text-white">30%</h4>
                                                        <p class="px-2 f-small icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (200 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-danger p-3">
                                                        <h4 class="text-white">40%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> 150 Students)</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-sm-3 text-center mb-0 align-content-center">
                                                <p class="px-2 icon-text text-dark mb-0">Professional Development
                                                </p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="grid1 mt-4">
                                                    <div class="align-items-center card bg-primary p-3">
                                                        <h4 class="text-white mt-1">20%</h4>
                                                        <p class="icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (100 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-success p-3">
                                                        <h4 class="text-white">10%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (50 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-primary p-3 border border-dark border-4"
                                                        style="box-shadow: 0 0 0 2px #f3f5f6 inset;">
                                                        <h4 class="text-white">30%</h4>
                                                        <p class="px-2 f-small icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (200 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-danger p-3">
                                                        <h4 class="text-white">40%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> 150 Students)</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-sm-3 mb-0 text-center">
                                                <p class="px-2 icon-text text-dark mb-0"> Networking
                                                </p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="grid1 mt-4">
                                                    <div class="align-items-center card bg-primary p-3">
                                                        <h4 class="text-white mt-1">20%</h4>
                                                        <p class="icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (100 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-success p-3">
                                                        <h4 class="text-white">10%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (50 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-primary p-3 border border-dark border-4"
                                                        style="box-shadow: 0 0 0 2px #f3f5f6 inset;">
                                                        <h4 class="text-white">30%</h4>
                                                        <p class="px-2 f-small icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> (200 Students)</small>
                                                        </p>
                                                    </div>
                                                    <div class="align-items-center card bg-danger p-3">
                                                        <h4 class="text-white">40%</h4>
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="color: white!important;">
                                                            <small> 150 Students)</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <div class="row align-items-center p-0 w-100">
                                        <div
                                            class="col-sm-3 d-flex p-3 mb-0 flex-row align-items-center card bg-warning align-content-center">
                                            <img class="img-fluid"
                                                src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                                style="height: 70px;width: 70px;margin: auto;">
                                            <p class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                                Career
                                                & <br>Self Development </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-container="body"
                                                    data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                    data-bs-placement="top"
                                                    data-bs-content="Emerging Knowledge :  200 Students"
                                                    title="Career & Self Development">
                                                    10%
                                                </div>

                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-container="body"
                                                    data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                    data-bs-placement="top"
                                                    data-bs-content="Understanding :  55 Students"
                                                    title="Career & Self Development"> <b>30%</b> </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-container="body"
                                                    data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                    data-bs-placement="top"
                                                    data-bs-content="Early Application :  35 Students"
                                                    title="Career & Self Development"> <b>20%</b> </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 40%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>40%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm btn-danger w-100 py-2">Advanced
                                                    Application
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Awareness of Strength & Challenges
                                            </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 30%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>30%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 20%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 50%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm btn-warning w-100 py-2">Early
                                                    Application
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Professional Development </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 50%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm btn-primary w-100 py-2">Emerging
                                                    Knowledge
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Networking </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 50%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm btn-success w-100 py-2">
                                                    Understanding
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOnes">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOnes" aria-expanded="false"
                                    aria-controls="flush-collapseOnes">
                                    <div class="row align-items-center p-0 w-100">
                                        <div
                                            class="col-sm-3 d-flex p-3 mb-0 flex-row align-items-center card bg-warning align-content-center">
                                            <img class="img-fluid"
                                                src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                                style="height: 70px;width: 70px;margin: auto;">
                                            <p class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                                Career
                                                & <br>Self Development </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>30%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 40%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>40%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm btn-danger w-100 py-2">Advanced
                                                    Application
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-collapseOnes" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOnes" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Awareness of Strength & Challenges
                                            </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 30%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>30%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 20%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 50%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm border-warning w-100 py-2">Early
                                                    Application
                                                    <hr class="m-2 bg-warning" style="opacity: 0.6;">
                                                    <h4 class="text-warning">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Professional Development </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 50%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm border-primary w-100 py-2">Early
                                                    Application
                                                    <hr class="m-2 bg-primary" style="opacity: 0.6;">
                                                    <h4 class="text-primary">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Networking </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 50%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm border-success w-100 py-2">Early
                                                    Application
                                                    <hr class="m-2 bg-success" style="opacity: 0.6;">
                                                    <h4 class="text-success">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <div class="row align-items-center p-0 w-100">
                                        <div
                                            class="col-sm-3 d-flex p-3 mb-0 flex-row align-items-center card bg-info align-content-center">
                                            <img class="img-fluid"
                                                src="./assets/images/nace-icons/nace-communication-black-line-art-icon.png"
                                                style="height: 70px;width: 70px;margin: auto;">
                                            <p class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                                Communication </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 50%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div><a type="button" class="btn btn-sm w-100 btn-danger py-2">Advanced
                                                    Application
                                                    <hr class="m-2" style="background-color:white;opacity: 0.6;">
                                                    <h4 style="color: white;">12</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </h2>

                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Oral Communication </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 50%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="22 Students">
                                                    <b>50%</b>
                                                </div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="55 Students">
                                                    <b>10%</b>
                                                </div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="35 Students">
                                                    <b>20%</b>
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100" data-bs-toggle="tooltip" title="100 Students">
                                                    <b>20%</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-sm btn-warning w-100 float-end">Early
                                                Application <a class="btn btn-sm btn-light ml-3">1</a> </button>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Written Communication </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 50%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button"
                                                class="btn w-100 btn-sm btn-primary float-end">Emerging
                                                Knowledge <a class="btn btn-sm btn-light ml-3">3</a> </button>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Non-verbal Communication </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 50%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button"
                                                class="btn btn-sm btn-success w-100 float-end">Understanding <a
                                                    class="btn btn-sm btn-light ml-3">2</a> </button>
                                        </div>
                                    </div>

                                    <div class="row p-0 w-100 align-items-center">
                                        <div
                                            class="col-sm-3 d-flex mb-0 flex-row align-items-center align-content-center">
                                            <p class="px-2 icon-text text-dark mb-0">Active Listening </p>
                                        </div>
                                        <div class="col-sm-7 p-5">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 10%" aria-valuenow="15" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 20%" aria-valuenow="30" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 50%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-sm w-100 btn-warning float-end">Early
                                                Application <a class="btn btn-sm btn-light ml-3">3</a> </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="row p-4">
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> At what degree/certificate/class year are you currently enrolled? </h6>
                                        <div id="bar_chart2" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Which of the following best represent your program or area of study? </h6>
                                        <div id="bar_chart3" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Gender: How do you identify? </h6>
                                        <div id="bar_chart4" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Which of the following categories would you use to best describe yourself?
                                        </h6>
                                        <div id="bar_chart5" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> What is your parent(s) or caregiver(s) highest level of education in the
                                            United
                                            States?</h6>
                                        <div id="bar_chart6" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Do you have a diagnosed disability?</h6>
                                        <div id="chart7" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Do you identify as a member of the LGBTQ+ community?</h6>
                                        <div id="chart8" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Is English the primary language spoken at your childhood home?</h6>
                                        <div id="chart9" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Are you a parent to a child under 18 years old?</h6>
                                        <div id="chart10" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Have you ever served on active duty in the U.S. Armed Forces, Reserves, or
                                            National Guard? (Optional)</h6>
                                        <div id="chart11" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Are you the primary caregiver to a family member (not a child) such as a
                                            parent, partner, etc.? (Optional)</h6>
                                        <div id="chart12" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-3">
                                    <div class="card-body px-3 py-3">
                                        <h6> Age </h6>
                                        <div id="chart14" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card-body px-3 py-3">
                                                <h6> Which of the following sources did you use to finance your college
                                                    tuition?
                                                    (Optional) </h6>
                                                <div id="chart13" class="apex-charts" dir="ltr"></div>
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

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Detail</th>
                                                            <th scope="col">Count</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Cash</td>
                                                            <td>5</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Grant A</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>International Student Scholorship</td>
                                                            <td>4</td>
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
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
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
    <!-- <script type="text/javascript">
            var options = {
          series: [{
          data: [2.7, 3, 3.4, 3, 2, 4, 3.3, 3.7]
        }],
          chart: {
          type: 'bar',
          height: 450
        },
        plotOptions: {
          bar: {
            barHeight: '80%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#ebb93b', '#56a9dd', '#705181', '#ad3131', '#796258', '#609866', '#e06b60', '#3c4b6c'],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff'],
            fontSize: '12px',
            fontWeight: '500',
            fontFamily : 'Mulish'
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 0,
          colors: ['#fff']
        },
        xaxis: {
          categories: ['Career & Self-Development', 'Communication', 'Critical Thinking', 'Equity & Inclusion', 'Leadership', 'Professionalism', 'Teamwork',
            'Technology'
          ],
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
            text: 'Career Readiness Inventory',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: '',
            align: 'center',
        },
        legend: {
            show : false
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#inventorychart"), options);
        chart.render();

</script> -->

    <!-- <script>
    options = ((chart = new ApexCharts(document.querySelector("#radial_chart"), options)).render(), {
        chart: {
            height: 320,
            type: "pie"
        },
        series: [44, 55],
        labels: ["Series 1", "Series 4"],
        colors: ["#1cbb8c", "#4aa3ff"],
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0,
            offsetY: 5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: !1
                }
            }
        }]
    })
</script> -->

    <script>
    var options = {
        series: [{
            name: 'Emerging Knowledge',
            data: [44, 55, 41, 37, 22, 43, 21, 10]
        }, {
            name: 'Understanding',
            data: [53, 32, 33, 52, 13, 43, 32, 20]
        }, {
            name: 'Early Application',
            data: [12, 17, 11, 9, 15, 11, 20, 30]
        }, {
            name: 'Advanced Application',
            data: [9, 7, 5, 8, 6, 9, 4, 40]
        }, ],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            stackType: '100%'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        title: {
            text: 'Inventory Chart'
        },
        xaxis: {
            categories: ['Career & Self-Development', 'Communication', 'Critical Thinking', 'Equity & Inclusion',
                'Leadership', 'Professionalism', 'Teamwork',
                'Technology'
            ],
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "K"
                }
            }
        },
        fill: {
            opacity: 1

        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#inventorychart"), options);
    chart.render();

    var options = {
        series: [{
            name: 'Emerging Knowledge',
            data: [44, 55, 41]
        }, {
            name: 'Understanding',
            data: [53, 32, 33]
        }, {
            name: 'Early Application',
            data: [12, 17, 11]
        }, {
            name: 'Advanced Application',
            data: [9, 7, 5]
        }, ],
        chart: {
            type: 'bar',
            height: 250,
            stacked: true,
            stackType: '100%'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        title: {
            text: 'Career & Self Development'
        },
        xaxis: {
            categories: ['Awareness of Strengths & Challenges', 'Professional Development', 'Networking'],
            color: '#000'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "K"
                }
            }
        },
        fill: {
            opacity: 1

        },
        legend: {
            position: 'bottom',
            horizontalAlign: 'left',
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#inventorychart1"), options);
    chart.render();

    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 240, 20]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Bachelor's - 1st Year",
                "Bachelor's - 2nd Year",
                "Bachelor's - 3rd Year",
                "Bachelor's - 4th Year",
                "Bachelor's - 5th Year or Beyond",
                "Masters",
                "Doctoral"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar_chart2"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 48, 47, 40, 20, 50]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Accounting and Computer Science",
                "Accounting and Related Services",
                "Aerospace, Aeronautical and Astronautical Engineering",
                "African Languages, Literatures, and Linguistics",
                "Agricultural and Domestic Animal Services",
                "Agricultural and Food Products Processing",
                "Agricultural Engineering"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar_chart3"), options);
    chart.render();

    var options = {
        series: [44, 55, 41, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Male', 'Female', 'Non-binary', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#bar_chart4"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 48, 47, 40, 20, 50, 10, 10]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Prefer not to respond",
                "Asian",
                "Black",
                "Hispanic or Latinx",
                "International student with non-immigrant (visa) status in the U.S.",
                "Multiracial",
                "Native Hawaiian or Other Pacific Islander",
                "Native American or Native Alaskan",
                "White"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar_chart5"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 48, 47, 40, 20, 50, 10]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Prefer not to respond",
                "Grade School",
                "High School",
                "Some School",
                "College Graduate (Associate/Bachelor's Degree)",
                "Graduate or Professional School",
                "Unknown",
                "None of the above (College experience outside the US, etc.)"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar_chart6"), options);
    chart.render();

    var options = {
        series: [55, 38, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Yes', 'No', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#chart7"), options);
    chart.render();

    var options = {
        series: [20, 70, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Yes', 'No', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#chart8"), options);
    chart.render();

    var options = {
        series: [20, 70, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Yes', 'No', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#chart9"), options);
    chart.render();

    var options = {
        series: [20, 70, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Yes', 'No', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#chart10"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 48, 47, 40]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Prefer not to respond",
                "Never served in the military",
                "Only on active duty for training in the Reserves or National Guard",
                "Now on active duty",
                "On active duty in the past, but not now"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart11"), options);
    chart.render();

    var options = {
        series: [20, 70, 10],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            position: 'bottom',
        },
        labels: ['Yes', 'No', 'Prefer not to respond'],
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

    var chart = new ApexCharts(document.querySelector("#chart12"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 28, 47, 40, 50, 13, 20, 16, 6]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["Federal Student Loans",
                "Private Student Loans",
                "Family / Personal Money",
                "Merit-based Scholarships and Grants",
                "Income-based Scholarships and Grants",
                "Pell Grant",
                "My Own Employment",
                "529 Investment Account",
                "Tuition waivers or reductions due to family or yourself being employed at the college",
                "Others"
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart13"), options);
    chart.render();

    var options = {
        series: [{
            data: [40, 30, 16, 6]
        }],
        chart: {
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        colors: ["#1cbb8c"],
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ["below 18",
                "18-25",
                "25-30",
                "30+",
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart14"), options);
    chart.render();
    </script>

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

    const trackColors = Highcharts.getOptions().colors.map(color =>
        new Highcharts.Color(color).setOpacity(0.3).get()
    );

    Highcharts.chart('container', {

        chart: {
            type: 'solidgauge',
            height: '110%',
            events: {
                render: renderIcons
            }
        },

        title: {
            text: 'Emerging Knowledge',
            style: {
                fontSize: '14px'
            }
        },

        tooltip: {
            borderWidth: 0,
            backgroundColor: 'none',
            shadow: false,
            style: {
                fontSize: '16px'
            },
            valueSuffix: '%',
            pointFormat: '{series.name}<br>' +
                '<span style="font-size: 2em; color: {point.color}; ' +
                'font-weight: bold">{point.y}</span>',
            positioner: function(labelWidth) {
                return {
                    x: (this.chart.chartWidth - labelWidth) / 2,
                    y: (this.chart.plotHeight / 2) + 15
                };
            }
        },

        pane: {
            startAngle: 0,
            endAngle: 360,
            background: [{ // Track for Conversion
                outerRadius: '112%',
                innerRadius: '88%',
                backgroundColor: trackColors[0],
                borderWidth: 0
            }, { // Track for Engagement
                outerRadius: '87%',
                innerRadius: '63%',
                backgroundColor: trackColors[1],
                borderWidth: 0
            }, ]
        },

        yAxis: {
            min: 0,
            max: 100,
            lineWidth: 0,
            tickPositions: []
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    enabled: false
                },
                linecap: 'round',
                stickyTracking: false,
                rounded: true
            }
        },

        series: [{
            name: 'Post',
            data: [{
                color: Highcharts.getOptions().colors[0],
                radius: '112%',
                innerRadius: '88%',
                y: 80
            }],
            custom: {
                icon: 'filter',
                iconColor: '#303030'
            }
        }, {
            name: 'Pre',
            data: [{
                color: Highcharts.getOptions().colors[1],
                radius: '87%',
                innerRadius: '63%',
                y: 65
            }],
            custom: {
                icon: 'comments-o',
                iconColor: '#ffffff'
            }
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