<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');


function fetch_data($base_url,$url,$data){
    $url = $base_url.$url;
    $ch = curl_init( $url );
    $payload = json_encode($data);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
$filters = new stdClass();



// Student Details START
$filters->id = "88d2c084-7686-454f-ab43-167c72c680af";
$filters->implementation_type = "work-exp";
$filters->evaluator_email = "mad6065@psu.edu";
$filters->filter = "HUB Robeson Center:24 - 25 Academic Year";
// $filter = json_encode($filters);

$data = new stdClass();
$data = $filters;

$url = $base_url."student-details";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$student_details = json_decode(curl_exec($ch),true);
// echo "<pre>$comp_q</pre>";
curl_close($ch);
// Student Details END

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

    .form-check-input {
        width: 1.5em;
        height: 1.5em;
    }

    .form-check-label {
        font-size: 18px;
        margin-left: 9px;
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

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 style="margin-left:20px"><b>CAREER READINESS INVENTORY REPORT</b></h3>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-select">
                                <option>Work Experience (Work Study - Fall 24)</option>
                                <select>
                        </div>
                    </div>

                    <div class="card mt-4 border-1">
                        <div class="card-body">
                            <div class="d-flex justify-content-around mt-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a class="btn btn-dark text-center"
                                            style="border-radius:50%;width:60px;height:60px;"> <i
                                                class="mdi mdi-account" style="font-size:31px;"></i> </a>
                                    </div>
                                    <div class="col-sm-9 align-content-center">
                                        <h4 style="margin-left:20px"><b>Suyash Jaju</b></h4>
                                    </div>
                                </div>
                                <div>
                                    <h5><b>Work Experience</b></h5>
                                    <h5>Internship</h5>
                                </div>
                                <div>
                                    <h5><b>Area of Study</b></h5>
                                    <h5>Computer Science</h5>
                                </div>
                                <div>
                                    <h5><b>Academic Level</b></h5>
                                    <h5>Bachelor’s - 4th Year</h5>
                                </div>
                                <div>
                                    <h5><b>Report Date</b></h5>
                                    <h5>07/22/24</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="card border-1" style="width:50%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5> Evaluator
                                            </h5>
                                            <h5>Suyash Jaju</h5>
                                        </div>
                                        <div class="d-flex">
                                            <i class="mdi mdi-email" style="font-size:18px;"></i>
                                            <h5 class="ml-5"> so.jaju444@gmail.com</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-center align-content-center">
                                        <h5 class="ml-5"> <b>Manager</b></h5>
                                        <h5 class="ml-5"> <b>(Supervisor)</b> </h5>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="p-3 align-content-center" style="width:30%">
                            <center>
                                <div class="form-check" style="width:fit-content">
                                    <input name="self" class="form-check-input" type="radio" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault" style="color:black">
                                        Self: Pre vs. Post
                                    </label>
                                </div>
                                <div class="form-check" style="width:fit-content;margin-left:6px">
                                    <input name="self" class="form-check-input" type="radio" value=""
                                        id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked" style="color:black">
                                        Self vs. Evaluator
                                    </label>
                                </div>
                            </center>
                        </div>
                        <div class="d-flex p-3" style="width:20%">
                            <img src="assets/images/asu.png" class="img-fluid rounded" alt="logo-dark"
                                style="object-fit: contain;width:100%">
                            <!-- <h1 class="f-bold" style="color:#901240">Arizona State University<h1> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
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
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value"
                                                style="background-color:#000;margin-left:18%;font-size:16px">20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->

                                        <p
                                            style="margin:left:-78%;margin-top:-36px;margin-left:30%;font-size:18px;color:black">
                                            <b>Evaluator</b>
                                        </p>
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-warning " role="progressbar"
                                                    aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:55%">
                                                </div>
                                                <div class="progress-value bg-warning"
                                                    style="margin-left:47%;font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p
                                                style="margin:left:-78%;margin-top:-36px;margin-left:59.5%;font-size:18px;color:black">
                                                <b>Self</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row card p-3" style="margin-bottom:80px;margin:auto">
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
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100" style="width:55%">
                                                            </div>
                                                            <div class="progress-value bg-info"
                                                                style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-info"
                                                                        style="margin-left:47%;font-size:16px">50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
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
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color: #E06B60">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color: #E06B60">
                                                                50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar " role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color: #E06B60">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color: #E06B60">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color: #E06B60">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color: #E06B60">
                                                                        50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
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
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-warning " role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100" style="width:55%">
                                                            </div>
                                                            <div class="progress-value bg-warning"
                                                                style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="margin-left:47%;font-size:16px">50
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
                                                        <div class="col-sm-8 mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar bg-dark " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="margin-left:47%;font-size:16px">50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar bg-warning "
                                                                        role="progressbar" aria-valuenow="80" value="80"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width:55%">
                                                                    </div>
                                                                    <div class="progress-value bg-warning"
                                                                        style="margin-left:47%;font-size:16px">50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
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
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Professionalism </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color:#609866">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color:#609866">
                                                                50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#609866">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#609866">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#609866">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#609866">
                                                                        50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
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
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Leadership </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color:#796258">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color:#796258">
                                                                50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#796258">
                                                                    50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#796258">
                                                                    50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#796258">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#796258">
                                                                    50
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                It
                                                has roots in a piece of classical Latin literature from 45 BC,
                                                making it
                                                over 2000 years old. Richard McClintock, a Latin professor at
                                                Hampden-Sydney College in Virginia, looked up one of the more
                                                obscure
                                                Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                through
                                                the cites of the word in classical literature, discovered the
                                                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                1.10.33
                                                of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                by
                                                Cicero, written in 45 BC. This book is a treatise on the theory of
                                                ethics, very popular during the Renaissance. The first line of Lorem
                                                Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                1.10.32.
                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                It
                                                has roots in a piece of classical Latin literature from 45 BC,
                                                making it
                                                over 2000 years old. Richard McClintock, a Latin professor at
                                                Hampden-Sydney College in Virginia, looked up one of the more
                                                obscure
                                                Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                through
                                                the cites of the word in classical literature, discovered the
                                                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                1.10.33
                                                of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                by
                                                Cicero, written in 45 BC. This book is a treatise on the theory of
                                                ethics, very popular during the Renaissance. The first line of Lorem
                                                Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                1.10.32.
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
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color:#705181">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color:#705181">
                                                                50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#705181">
                                                                    50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar " role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#705181">
                                                                    50
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
                                                                aria-valuemax="100" style="width:22%">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="background-color:#000;margin-left:18%;font-size:16px">
                                                                20
                                                            </div>
                                                            <!-- /.progress-bar .progress-bar-danger -->
                                                        </div><!-- /.progress .no-rounded -->
                                                        <div class="mt-4">
                                                            <div class="progress mb-3 bg-white"
                                                                style="width:90%;margin:auto">
                                                                <div class="progress-bar" role="progressbar"
                                                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:55%;background-color:#705181">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="margin-left:47%;font-size:16px;background-color:#705181">
                                                                    50
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                It
                                                has roots in a piece of classical Latin literature from 45 BC,
                                                making it
                                                over 2000 years old. Richard McClintock, a Latin professor at
                                                Hampden-Sydney College in Virginia, looked up one of the more
                                                obscure
                                                Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                through
                                                the cites of the word in classical literature, discovered the
                                                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                1.10.33
                                                of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                by
                                                Cicero, written in 45 BC. This book is a treatise on the theory of
                                                ethics, very popular during the Renaissance. The first line of Lorem
                                                Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                1.10.32.
                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                It
                                                has roots in a piece of classical Latin literature from 45 BC,
                                                making it
                                                over 2000 years old. Richard McClintock, a Latin professor at
                                                Hampden-Sydney College in Virginia, looked up one of the more
                                                obscure
                                                Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                through
                                                the cites of the word in classical literature, discovered the
                                                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                1.10.33
                                                of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                by
                                                Cicero, written in 45 BC. This book is a treatise on the theory of
                                                ethics, very popular during the Renaissance. The first line of Lorem
                                                Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                1.10.32.
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
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color:#3c4b6c">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color:#3c4b6c">
                                                                50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#3c4b6c">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#3c4b6c">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#3c4b6c">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#3c4b6c">
                                                                        50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
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
                                                        style="height: 70px;width: 70px;margin: auto;">
                                                    <h5 class="px-2 icon-text text-center text-dark mb-0"
                                                        style="color: white!important;">
                                                        Equity & Inclusion </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;margin-left:18%;font-size:16px">
                                                            20
                                                        </div>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:55%;background-color:#ad3131">
                                                            </div>
                                                            <div class="progress-value"
                                                                style="margin-left:47%;font-size:16px;background-color:#ad3131">
                                                                50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#ad3131">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#ad3131">
                                                                        50
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
                                                                    aria-valuemax="100" style="width:22%">
                                                                </div>
                                                                <div class="progress-value"
                                                                    style="background-color:#000;margin-left:18%;font-size:16px">
                                                                    20
                                                                </div>
                                                                <!-- /.progress-bar .progress-bar-danger -->
                                                            </div><!-- /.progress .no-rounded -->
                                                            <div class="mt-4">
                                                                <div class="progress mb-3 bg-white"
                                                                    style="width:90%;margin:auto">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="80" value="80" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width:55%;background-color:#ad3131">
                                                                    </div>
                                                                    <div class="progress-value"
                                                                        style="margin-left:47%;font-size:16px;background-color:#ad3131">
                                                                        50
                                                                    </div>
                                                                    <!-- /.progress-bar .progress-bar-danger -->
                                                                </div><!-- /.progress .no-rounded -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                    It
                                                    has roots in a piece of classical Latin literature from 45 BC,
                                                    making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more
                                                    obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going
                                                    through
                                                    the cites of the word in classical literature, discovered the
                                                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and
                                                    1.10.33
                                                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                                    by
                                                    Cicero, written in 45 BC. This book is a treatise on the theory of
                                                    ethics, very popular during the Renaissance. The first line of Lorem
                                                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section
                                                    1.10.32.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END layout-wrapper -->
                        <!-- end row -->

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
                        <!-- end main content-->

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
                        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
                        </script>
                        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
                        </script>

                        <!-- Required datatable js -->
                        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

                        <!-- Responsive examples -->
                        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
                        </script>

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
                                categories: ['Career & Self-Development', 'Communication', 'Critical Thinking',
                                    'Equity & Inclusion',
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
                                categories: ['Awareness of Strengths & Challenges', 'Professional Development',
                                    'Networking'
                                ],
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