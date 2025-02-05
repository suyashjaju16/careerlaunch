<?php 
include("./models/config.php");
include("./models/prepost/competency.php");
$comp_data = json_decode($comp, true);

// echo json_encode($comp_data['communication_results']['pre']);

include("./models/prepost/pre-post-questions.php");
$prepost_data = json_decode($pre_post_questions, true);

// echo json_encode($prepost_data);
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

    .ruler {
        position: relative;
        width: 100%;
        height: 2px;
        background-color: #eaeaea;
        border: 1px solid #000;
    }

    .tick {
        position: absolute;
        width: 2px;
        height: 17px;
        margin-top: -8px;
        background-color: #000;
    }

    .tick:nth-child(1) {
        left: -1px;
        width: 3.5px;
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
        width: 3.5px
            /* Adjust to center the last tick */
    }


    .ntick {
        position: absolute;
        /* width: 2px; */
        height: 17px;
        margin-top: -8px;
    }

    .ntick:nth-child(1) {
        left: -1px;
        width: 3.5px;
    }

    .ntick:nth-child(2) {
        left: 25%;
    }

    .ntick:nth-child(3) {
        left: 50%;
    }

    .ntick:nth-child(4) {
        left: 75%;
    }

    .ntick:nth-child(5) {
        left: 100%;
        margin-left: -1px;
        width: 3.5px
            /* Adjust to center the last tick */
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
                                            100 </b></h2>
                                    <p class="text-muted mb-0 mt-3"><b>42%</b> from Last 2 months</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Responses</h4>
                                    <h2 class="mt-3 mb-2">
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-4"><b>234</b>
                                                <span class="m-0 p-0" style="font-size:18px">Pre</span>
                                            </div>
                                            <div class="col-sm-2"><i class="mdi mdi-arrow-right text-success me-2"></i>
                                            </div>
                                            <div class="col-sm-4"> <b>340 </b>
                                                <span class="m-0 p-0" style="font-size:18px">Post</span>
                                            </div>
                                        </div>
                                    </h2>
                                    <!-- <p class="text-muted mb-0 mt-3"><b>22%</b> from Last 24 Hours</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Average Duration</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                                            8 min 12 s </b>
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
                                    <option> Plus Competencies </option>
                                    <option selected disabled> Work Experience </option>
                                </select>
                                <select class="form-select bg-light mt-3" style="border-radius: 20px;">
                                    <option> Student: Pre-Experience</option>
                                    <option> Student: Post-Experience </option>
                                    <option selected disabled> Student: Pre vs. Post </option>
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

                                <!-- <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                    data-bs-target=".bs-example-modal-center" style="border-radius: 60%;">+</button> -->
                            </center>
                        </div>
                    </div>

                    <div class="row sticky-top">
                        <div class="col-sm-12 px-0">
                            <div class="card">
                                <div class="card-body py-1">

                                    <div class="row  p-0">
                                        <div class="col-sm-3 align-content-center">
                                            <h3>Career Readiness Level</h3>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="d-flex justify-content-around p-2 mt-3"
                                                style="margin-left:30px!important">
                                                <!-- ;color:black;-webkit-text-stroke: 1px white; -->
                                                <div class="btn btn-primary"
                                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                                    Emerging
                                                    Knowledge</div>


                                                <div class="btn btn-success"
                                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                                    Understanding
                                                </div>


                                                <div class="btn btn-warning"
                                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                                    Early
                                                    Application</div>


                                                <div class="btn btn-danger"
                                                    style="width:23%;margin:auto;font-size:14px;margin-right:5px!important;font-weight:bold;color:black">
                                                    Advanced
                                                    Application</div>
                                            </div>
                                            <div class="px-3 mt-4"
                                                style="width:100%;margin:auto;margin-left:20px!important;margin-top:-15px!important">

                                                <div class="ruler mt-4">
                                                    <div class="tick"></div> <!-- 0% -->
                                                    <div class="tick" style="left:24.5%"></div> <!-- 25% -->
                                                    <div class="tick" style="left:49.5%"></div> <!-- 50% -->
                                                    <div class="tick" style="left:74%"></div> <!-- 75% -->
                                                    <div class="tick"></div> <!-- 100% -->
                                                </div>

                                                <div class="d-flex mt-2" style="width:93%">
                                                    <p style="margin-left:-3px;color:black"> <b>0 </b></p>
                                                    <p style="margin-left:24.9%;color:black"><b>25</b></p>
                                                    <p style="margin-left:24.5%;color:black"><b>50</b></p>
                                                    <p style="margin-left:23.9%;color:black"><b>75</b></p>
                                                    <p style="margin-left:25%;color:black"><b>100</b></p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-1 align-content-center">
                                            <a href="#" data-bs-toggle="popover" title="Information"
                                                data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                style="margin-top:20px">
                                                <i class="mdi mdi-information-outline"
                                                    style="font-size:45px;color:black;margin-left:20px"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="card px-3">
                                <div class="card-body">
                                    <div class="row align-items-center p-0 w-100">
                                        <div
                                            class="col-sm-3 d-flex flex-row p-3 mb-0 align-items-center card bg-dark align-content-center">
                                            <img class="img-fluid" src="./assets/images/ocr.png"
                                                style="height: 70px;width: 70px;margin: auto;">
                                            <h3 class="px-2 icon-text text-dark mb-0"
                                                style="color: white!important;font-size: 18px;font-weight: 700;">
                                                Overall <br>Career Readiness </h3>
                                        </div>
                                        <div class="col-sm-8 mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:<?= json_encode($comp_data['overall_career_readiness_results']['pre']); ?>%">
                                                </div>
                                                <div class="progress-value"
                                                    style="background-color:#000;font-size:16px">
                                                    <?= json_encode($comp_data['overall_career_readiness_results']['pre']); ?>
                                                </div>
                                                <p
                                                    style="margin-top:-11px;position:relative;left:2%;font-size:18px;color:black">
                                                    <b>Pre</b>
                                                </p>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->


                                            <div class="mt-4">
                                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                    <div class="progress-bar bg-warning " role="progressbar"
                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        style="width:<?= json_encode($comp_data['overall_career_readiness_results']['post']); ?>%">
                                                    </div>
                                                    <div class="progress-value bg-warning" style="font-size:16px">
                                                        <?= json_encode($comp_data['overall_career_readiness_results']['post']); ?>
                                                    </div>
                                                    <p
                                                        style="position:relative;margin-top:-11px;left:2%;font-size:18px;color:black">
                                                        <b>Post</b>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                </div><!-- /.progress .no-rounded -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row card p-3">
                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <div class="accordion accordion-flush" id="accordionFlushExample">

                                <div class="accordion-item" style="border-top:0px!important">
                                    <h2 class="accordion-header" id="flush-headingZero">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseZero"
                                            aria-expanded="false" aria-controls="flush-collapseZero">
                                            <div class="row align-items-center p-0 w-100">
                                                <div
                                                    class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-info align-content-center">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-communication-black-line-art-icon.png"
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h3 class="px-2 icon-text text-dark mb-0"
                                                        style="color: white!important;font-size: 18px;font-weight: 700;">
                                                        Communication </h3>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="<?= json_encode($comp_data['communication_results']['pre']); ?>"
                                                            value="<?= json_encode($comp_data['communication_results']['pre']); ?>"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['communication_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            <?= json_encode($comp_data['communication_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="<?= json_encode($comp_data['communication_results']['post']); ?>"
                                                                value="<?= json_encode($comp_data['communication_results']['post']); ?>"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['communication_results']['post']); ?>%">
                                                            </div>
                                                            <div class="progress-value bg-info" style="font-size:16px">
                                                                <?= json_encode($comp_data['communication_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseZero" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseZero"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Oral
                                                                Communication
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['communication']['Oral Communication']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['communication']['Oral Communication']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['communication']['Oral Communication']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['communication']['Oral Communication']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Written
                                                                Communication
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['communication']['Written Communication']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['communication']['Written Communication']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['communication']['Written Communication']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['communication']['Written Communication']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Non-verbal
                                                                Communication
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['communication']['Non-verbal Communication']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['communication']['Non-verbal Communication']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['communication']['Non-verbal Communication']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['communication']['Non-verbal Communication']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Active
                                                                Listening
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['communication']['Active Listening']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['communication']['Active Listening']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['communication']['Active Listening']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['communication']['Active Listening']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color: #E06B60;">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png"
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h3 class="px-2 icon-text text-dark mb-0"
                                                        style="color: white!important;">
                                                        Teamwork </h3>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['teamwork_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            <?= json_encode($comp_data['teamwork_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['teamwork_results']['post']); ?>%;background-color: #E06B60">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="font-size:16px;background-color: #E06B60">
                                                                <?= json_encode($comp_data['teamwork_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseTwo"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Build
                                                                Relationships for Collaboration
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar " role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['post']);?>%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color: #E06B60">
                                                                        <?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Respect
                                                                Diverse Perspectives
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['post']);?>%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color: #E06B60">
                                                                        <?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Integrate
                                                                Strengths
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['teamwork']['Integrate Strengths']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['teamwork']['Integrate Strengths']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['teamwork']['Integrate Strengths']['post']);?>%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color: #E06B60">
                                                                        <?= json_encode($prepost_data['teamwork']['Integrate Strengths']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
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
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <div class="row align-items-center p-0 w-100">
                                                <div
                                                    class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-warning align-content-center">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Career & Self Development </h5>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['self_development_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            <?= json_encode($comp_data['self_development_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar bg-warning " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['self_development_results']['post']); ?>%">
                                                            </div>
                                                            <div class="progress-value bg-warning"
                                                                style="font-size:16px">
                                                                <?= json_encode($comp_data['self_development_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseOne"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Awareness of
                                                                Strengths & Challenges
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Professional
                                                                Development
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-9 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width: 95%; margin: auto; margin-left: 5%;">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['self_development']['Professional Development']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['self_development']['Professional Development']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width: 95%; margin: auto; margin-left: 5%;">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['self_development']['Professional Development']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['self_development']['Professional Development']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Networking
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['self_development']['Networking']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['self_development']['Networking']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['self_development']['Networking']['post']);?>%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="font-size:16px">
                                                                        <?= json_encode($prepost_data['self_development']['Networking']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color:#609866">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png"
                                                        style="height: 60px;width: 60px;margin: auto;;margin-bottom:6px">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Professionalism </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['professionalism_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;left:<?= json_encode($comp_data['professionalism_results']['pre']); ?>%;font-size:16px">
                                                            <?= json_encode($comp_data['professionalism_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['professionalism_results']['pre']); ?>%;background-color:#609866">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="left:<?= json_encode($comp_data['professionalism_results']['pre']); ?>%;font-size:16px;background-color:#609866">
                                                                <?= json_encode($comp_data['professionalism_results']['pre']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseFour"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Act With
                                                                Integrity
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['professionalism']['Act With Integrity']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['professionalism']['Act With Integrity']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['professionalism']['Act With Integrity']['post']);?>%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#609866">
                                                                        <?= json_encode($prepost_data['professionalism']['Act With Integrity']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Demonstrate
                                                                Dependability
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['post']);?>%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#609866">
                                                                        <?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Achieve Goals
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['professionalism']['Achieve Goals']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['professionalism']['Achieve Goals']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['professionalism']['Achieve Goals']['post']);?>%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#609866">
                                                                        <?= json_encode($prepost_data['professionalism']['Achieve Goals']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color:#796258">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-leadership-black-line-art-icon.png"
                                                        style="height: 60px;width: 60px;margin: auto;;margin-bottom:6px">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Leadership </h5>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['leadership_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;left:<?= json_encode($comp_data['leadership_results']['pre']); ?>%;font-size:16px">
                                                            <?= json_encode($comp_data['leadership_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['leadership_results']['post']); ?>%;background-color:#796258">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="left:<?= json_encode($comp_data['leadership_results']['post']); ?>%;font-size:16px;background-color:#796258">
                                                                <?= json_encode($comp_data['leadership_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Inspire, Persuade,
                                                            & Motivate
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['post']);?>%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#796258">
                                                                    <?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Engage Various
                                                            Resources & Seek Feedback
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['post']);?>%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#796258">
                                                                    <?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 mb-0 text-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Facilitate Group
                                                            Dynamics
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['post']);?>%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#796258">
                                                                    <?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSix">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSix"
                                            aria-expanded="false" aria-controls="flush-collapseSix">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color:#705181">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png"
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Critical Thinking </h5>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['critical_thinking_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;left:<?= json_encode($comp_data['critical_thinking_results']['pre']); ?>%;font-size:16px">
                                                            <?= json_encode($comp_data['critical_thinking_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['critical_thinking_results']['post']); ?>%;background-color:#705181">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="left:<?= json_encode($comp_data['critical_thinking_results']['post']); ?>%;font-size:16px;background-color:#705181">
                                                                <?= json_encode($comp_data['critical_thinking_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="flush-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseSix" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Display
                                                            Situational Awareness
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['post']);?>%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#705181">
                                                                    <?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Gather & Analyze
                                                            Data
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['post']);?>%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#705181">
                                                                    <?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-2"
                                            style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                            <div class="card-body">
                                                <div class="row w-100 align-items-center">
                                                    <div class="col-sm-3 mb-0 text-center">
                                                        <p class="px-2 icon-text text-dark mb-0"
                                                            style="font-size: 18px;font-weight: 700;">Make Effective &
                                                            Fair Decisions
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-8 mt-4">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-dark " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['pre']);?>%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;font-size:16px">
                                                                <?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['pre']);?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['post']);?>%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="font-size:16px;background-color:#705181">
                                                                    <?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['post']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSeven">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven"
                                            aria-expanded="false" aria-controls="flush-collapseSeven">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color:#3c4b6c">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-technology-black-line-art-icon.png"
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Technology </h5>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['critical_thinking_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;left:<?= json_encode($comp_data['critical_thinking_results']['pre']); ?>%;font-size:16px">
                                                            <?= json_encode($comp_data['critical_thinking_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['critical_thinking_results']['post']); ?>%;background-color:#3c4b6c">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="left:<?= json_encode($comp_data['critical_thinking_results']['post']); ?>%;font-size:16px;background-color:#3c4b6c">
                                                                <?= json_encode($comp_data['critical_thinking_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseSeven"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Leverage
                                                                Technology
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['technology']['Leverage Technology']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['technology']['Leverage Technology']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['technology']['Leverage Technology']['post']);?>%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#3c4b6c">
                                                                        <?= json_encode($prepost_data['technology']['Leverage Technology']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Adapt to New
                                                                Technologies
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['technology']['Adapt to New Technologies']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['technology']['Adapt to New Technologies']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['technology']['Adapt to New Technologies']['post']);?>%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#3c4b6c">
                                                                        <?= json_encode($prepost_data['technology']['Adapt to New Technologies']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Use Technology
                                                                Ethically
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['technology']['Use Technology Ethically']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['technology']['Use Technology Ethically']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['technology']['Use Technology Ethically']['post']);?>%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#3c4b6c">
                                                                        <?= json_encode($prepost_data['technology']['Use Technology Ethically']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingEight">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseEight"
                                            aria-expanded="false" aria-controls="flush-collapseEight">
                                            <div class="row align-items-center p-0 w-100">
                                                <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                                    style="background-color:#ad3131">
                                                    <img class="img-fluid"
                                                        src="./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png"
                                                        style="height: 60px;width: 60px;margin: auto;margin-bottom:6px">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Equity & Inclusion </h5>
                                                </div>
                                                <div class="col-sm-9 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white"
                                                        style="width: 95%; margin: auto; margin-left: 5%;">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= json_encode($comp_data['equity_results']['pre']); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;left:<?= json_encode($comp_data['equity_results']['pre']); ?>%;font-size:16px">
                                                            <?= json_encode($comp_data['equity_results']['pre']); ?>
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width: 95%; margin: auto; margin-left: 5%;">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= json_encode($comp_data['equity_results']['post']); ?>%;background-color:#ad3131">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="font-size:16px;background-color:#ad3131">
                                                                <?= json_encode($comp_data['equity_results']['post']); ?>
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseEight" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseEight"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Engage
                                                                Multiple Perspectives
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['post']);?>%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#ad3131">
                                                                        <?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 text-center mb-0 align-content-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Use Inclusive
                                                                & Equitable Practices
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['post']);?>%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#ad3131">
                                                                        <?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-2"
                                                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                                                <div class="card-body">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-sm-3 mb-0 text-center">
                                                            <p class="px-2 icon-text text-dark mb-0"
                                                                style="font-size: 18px;font-weight: 700;">Advocate
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:<?= json_encode($prepost_data['equity']['Advocate']['pre']);?>%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;font-size:16px">
                                                                    <?= json_encode($prepost_data['equity']['Advocate']['pre']);?>
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:<?= json_encode($prepost_data['equity']['Advocate']['post']);?>%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="font-size:16px;background-color:#ad3131">
                                                                        <?= json_encode($prepost_data['equity']['Advocate']['post']);?>
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
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
                    <!-- end row -->


                    <div class="row accordion mb-3 bg-white" id="accordionWork">
                        <div class="accordion-item">
                            <h2 class="accordion-header bg-white pt-4 px-4" id="headingWork">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWork" aria-expanded="true" aria-controls="collapseWork">
                                    <h3> Work Experience </h3>
                                </button>
                            </h2>
                            <div id="collapseWork" class="accordion-collapse collapse show"
                                aria-labelledby="headingWork" data-bs-parent="#accordionWork">
                                <div class="accordion-body bg-white">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="card border-2" style="height:729px">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 style="font-size:18px">Experimential Learning Type</h6>
                                                    </div>
                                                    <div id="workexpchart1" class="apex-charts mt-5" dir="ltr"
                                                        style="height:530px;"></div>
                                                    <div class="d-flex justify-content-evenly">
                                                        <div class="d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:#008ffb !important">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                On-campus student work</div>
                                                        </div>
                                                        <div class="d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:#00e296 !important">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Micro-internship</div>
                                                        </div>
                                                        <div class="d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:#fdb01a">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Internship</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-evenly mt-2">
                                                        <div class="d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:#ff4560">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Apprenticeship</div>
                                                        </div>
                                                        <div class="d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:#775dd0">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Co-op</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="card border-2">
                                                <div class="card-body">
                                                    <div class="row w-100 mb-3 align-content-center">
                                                        <div class="col-sm-5"></div>
                                                        <div class="col-sm-2 d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:hsl(186 96% 44% / 1) !important">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Min</div>
                                                        </div>
                                                        <div class="col-sm-3 d-inline-flex">
                                                            <div class="div mt-1"
                                                                style="height:15px;width:15px;background-color:hsl(186 96% 40% / 1) !important">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Average</div>
                                                        </div>
                                                        <div class="col-sm-2 d-inline-flex">
                                                            <div class="bg-primary div mt-1"
                                                                style="height:15px;width:15px;">
                                                            </div>
                                                            <div
                                                                style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                Max</div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 text-center align-content-center">
                                                            <h6 style="font-size:18px">Avg Hours Per Week</h6>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress" style="height: 65px;">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 40%;background-color:hsl(186 96% 44% / 1) !important"
                                                                    aria-valuenow="15" aria-valuemin="0"
                                                                    aria-valuemax="100" data-bs-toggle="tooltip"
                                                                    title="22 Students">
                                                                    <b style="font-size:16px">5</b>
                                                                </div>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 30%;background-color:hsl(186 96% 40% / 1) !important"
                                                                    aria-valuenow="30" aria-valuemin="0"
                                                                    aria-valuemax="100" data-bs-toggle="tooltip"
                                                                    title="55 Students">
                                                                    <b style="font-size:16px">12</b>
                                                                </div>
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 30%" aria-valuenow="20"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    data-bs-toggle="tooltip" title="35 Students">
                                                                    <b style="font-size:16px">15</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-sm-4 text-center align-content-center">
                                                            <h6 style="font-size:18px">Total Weeks</h6>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="progress" style="height: 65px;">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 50%;background-color:hsl(186 96% 44% / 1) !important"
                                                                    aria-valuenow="15" aria-valuemin="0"
                                                                    aria-valuemax="100" data-bs-toggle="tooltip"
                                                                    title="22 Students">
                                                                    <b style="font-size:16px">4</b>
                                                                </div>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 30%;background-color:hsl(186 96% 40% / 1) !important"
                                                                    aria-valuenow="30" aria-valuemin="0"
                                                                    aria-valuemax="100" data-bs-toggle="tooltip"
                                                                    title="55 Students">
                                                                    <b style="font-size:16px">8</b>
                                                                </div>
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 20%" aria-valuenow="20"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    data-bs-toggle="tooltip" title="35 Students">
                                                                    <b style="font-size:16px">12</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-2" style="height:225px">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 style="font-size:18px">Pay Status</h6>
                                                    </div>
                                                    <div class="row py-3 px-1">
                                                        <div class="col-sm-4">
                                                            <div class="d-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb!important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Paid</div>
                                                            </div>
                                                            <div class="d-flex mt-3">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e397!important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Unpaid</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 pb-3">
                                                            <div id="workexpchart2" class="apex-charts" dir="ltr"
                                                                style="height:200px;margin-top:-50px"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="card mb-0 border-2" style="height:225px">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 style="font-size:18px">Academic Credit</h6>
                                                    </div>
                                                    <div class="row py-3">
                                                        <div class="col-sm-4">
                                                            <div class="d-flex">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#008ffb!important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Credit</div>
                                                            </div>
                                                            <div class="d-flex mt-3">
                                                                <div class="div mt-1"
                                                                    style="height:15px;width:15px;background-color:#00e397!important">
                                                                </div>
                                                                <div
                                                                    style="margin-left: 10px; color: #12171dbf!important; font-weight: 600;font-size:16px">
                                                                    Not to Credit</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 pb-3">
                                                            <div id="workexpchart3" class="apex-charts" dir="ltr"
                                                                style="height:200px;margin-top:-50px"></div>
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
                            <h2 class="accordion-header bg-white pt-4 px-4" id="headingDemographics">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseDemographics" aria-expanded="false"
                                    aria-controls="collapseDemographics">
                                    <h3> Demographics </h3>
                                </button>
                            </h2>
                            <div id="collapseDemographics" class="accordion-collapse collapse"
                                aria-labelledby="headingDemographics" data-bs-parent="#accordionDemographics">
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
                                                    <div class="card p-3 border-2">
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
                                                            <div class="" style="height:316px;overflow:scroll">
                                                                <table class="table table-striped"
                                                                    style="text-align:left!important">
                                                                    <thead class="sticky-top bg-white">
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
                                                                            <td>Aerospace, Aeronautical and
                                                                                Astronautical
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
                                                                            <td>Agricultural and Domestic Animal
                                                                                Services
                                                                            </td>
                                                                            <td>222</td>
                                                                            <td>33%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Agricultural and Food Products
                                                                                Processing
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
                                                                style="height:370px">
                                                            </div>
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
                                                                community?
                                                            </h6>
                                                            <div id="chart8" class="apex-charts" dir="ltr"
                                                                style="height:370px">
                                                            </div>
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
                                                                style="height:370px">
                                                            </div>
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
        Highcharts.chart('bar_chart2', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'At what degree/certificate/class year are you currently enrolled?',
                align: 'left'
            },
            xAxis: {
                categories: ["Bachelor's - 1st Year",
                    "Bachelor's - 2nd Year",
                    "Bachelor's - 3rd Year",
                    "Bachelor's - 4th Year",
                    "Bachelor's - 5th Year or Beyond",
                    "Masters",
                    "Doctoral"
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 32,
                    per: 76
                }, ],
                showInLegend: false
            }]
        });

        var options = {
            series: [44, 55, 41, 10],
            chart: {
                type: 'donut',
                height: 400
            },
            legend: {
                show: false,
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
                        position: 'bottom',
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#bar_chart4"), options);
        chart.render();

        Highcharts.chart('bar_chart5', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'Which of the following categories would you use to best describe yourself?',
                align: 'left'
            },
            xAxis: {
                categories: ["Prefer not to respond",
                    "Asian",
                    "Black",
                    "Hispanic or Latinx",
                    "International student with non-immigrant (visa) status in the U.S.",
                    "Multiracial",
                    "Native Hawaiian or Other Pacific Islander",
                    "Native American or Native Alaskan",
                    "White"
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 47,
                    per: 76
                }, {
                    y: 40,
                    per: 76
                }, {
                    y: 20,
                    per: 76
                }, {
                    y: 50,
                    per: 76
                }, {
                    y: 22,
                    per: 76
                }, {
                    y: 45,
                    per: 76
                }, ],
                showInLegend: false
            }]
        });

        Highcharts.chart('bar_chart6', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'What is your parent(s) or caregiver(s) highest level of education in the United States?',
                align: 'left'
            },
            xAxis: {
                categories: ["Prefer not to respond",
                    "Grade School",
                    "High School",
                    "Some School",
                    "College Graduate (Associate/Bachelor's Degree)",
                    "Graduate or Professional School",
                    "Unknown",
                    "None of the above (College experience outside the US, etc.)"
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 47,
                    per: 76
                }, {
                    y: 40,
                    per: 76
                }, {
                    y: 20,
                    per: 76
                }, {
                    y: 50,
                    per: 76
                }, {
                    y: 22,
                    per: 76
                }, ],
                showInLegend: false
            }]
        });

        var options = {
            series: [55, 38, 10],
            chart: {
                type: 'donut',
                height: 400
            },
            legend: {
                show: false,
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
                show: false,
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
                show: false,
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
                show: false,
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

        Highcharts.chart('chart13', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'Have you ever served on active duty in the U.S. Armed Forces, Reserves, or National Guard? (Optional)',
                align: 'left'
            },
            xAxis: {
                categories: ["Prefer not to respond",
                    "Never served in the military",
                    "Only on active duty for training in the Reserves or National Guard",
                    "Now on active duty",
                    "On active duty in the past, but not now"
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 47,
                    per: 76
                }, {
                    y: 40,
                    per: 76
                }],
                showInLegend: false
            }]
        });

        var options = {
            series: [20, 70, 10],
            chart: {
                type: 'donut',
                height: 400
            },
            legend: {
                show: false,
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

        Highcharts.chart('chart15', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'Which of the following sources did you use to finance your college tuition? (Optional)',
                align: 'left'
            },
            xAxis: {
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
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 47,
                    per: 76
                }, {
                    y: 40,
                    per: 76
                }, {
                    y: 20,
                    per: 76
                }, {
                    y: 50,
                    per: 76
                }, {
                    y: 22,
                    per: 76
                }, {
                    y: 45,
                    per: 76
                }, ],
                showInLegend: false
            }]
        });

        Highcharts.chart('chart14', {
            chart: {
                type: 'bar'
            },
            title: {
                show: false,
                text: 'Age',
                align: 'left'
            },
            xAxis: {
                categories: ["below 18",
                    "18-25",
                    "25-30",
                    "30+",
                ],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Responses'
                }
            },
            tooltip: {
                valueSuffix: ' Students'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.5,
                    borderWidth: 0,
                    color: '#000033',
                },
                series: {
                    pointWidth: 25,
                    color: '#000051',
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        align: 'right'
                    }

                }
            },
            legend: {
                enabled: false
            },
            dataLabels: {
                enabled: true,
                color: '#000',
                floating: true,
                format: '{point.y:.1f}', // one decimal
                backgroundColor: '#000033',
                style: {
                    fontSize: '6px',
                    fontFamily: 'Mulish, sans-serif'
                },
            },
            series: [{
                name: 'Responses',
                dataLabels: [{
                    align: 'right',
                    format: '{y} ({point.per}%)'
                }],
                data: [{
                    y: 40,
                    per: 72,
                }, {
                    y: 30,
                    per: 74,
                }, {
                    y: 48,
                    per: 83
                }, {
                    y: 47,
                    per: 76
                }],
                showInLegend: false
            }]
        });


        var options = {
            series: [20, 20, 20, 20, 20],
            chart: {
                type: 'donut',
                height: 530
            },
            legend: {
                show: false,
                position: 'bottom',
            },
            labels: ['On-campus student work', 'Micro-internship', 'Internship', 'Apprenticeship', 'Co-op'],
            formatter: function(val) {
                return val + "%"
            },
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

        var chart = new ApexCharts(document.querySelector("#workexpchart1"), options);
        chart.render();


        var options = {
            series: [40, 60],
            chart: {
                type: 'donut',
                height: 230
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: 40,
                        style: {
                            colors: ['#000000'],
                        },
                    }
                }
            },
            legend: {
                show: false
            },
            labels: ['Paid', 'Unpaid'],
            formatter: function(val) {
                return val + "%"
            },
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

        var chart = new ApexCharts(document.querySelector("#workexpchart2"), options);
        chart.render();


        var options = {
            series: [50, 50],
            chart: {
                type: 'donut',
                height: 230,
            },
            legend: {
                show: false
            },
            labels: ['Credit', 'Not to credit'],
            formatter: function(val) {
                return val + "%"
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: 40,
                        style: {
                            colors: ['#000000'],
                        },
                    }
                }
            },
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

        var chart = new ApexCharts(document.querySelector("#workexpchart3"), options);
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
                name: 'Responses',
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