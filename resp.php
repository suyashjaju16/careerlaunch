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
$filters->org_id = $_GET['organization'];
$data = new stdClass();
$data = $filters;
echo json_encode($data);
$students_data = json_decode(fetch_data($base_url,"get-students",$data),true);
// echo json_encode($students_data);
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
    <!-- <link href="assets/css/neumorphism.css" rel="stylesheet" type="text/css" /> -->

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
    <script src="http://code.highcharts.com/modules/exporting.js"></script>


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
                            <a class="nav-link" href="./workexp.php?organization=efb383d9-2b47-4dcc-ac2f-8b6e93568b74"
                                style="font-size:18px;color:white!important;">Dashboard
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item card" style="margin-left: 100px;">
                            <div class="card-body py-1">
                                <a class="nav-link text-dark"
                                    href="./resp.php?organization=efb383d9-2b47-4dcc-ac2f-8b6e93568b74"
                                    style="font-size:18px;">Responses</a>
                            </div>
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
                            <div class="card text-center" style="height: 86%;">
                                <div class="card-body" style="height: 100%;align-content: center;">
                                    <img src="<?= $org_logo ?>" alt="logo-dark" style="object-fit: cover;width: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Total Students</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            <!-- <?=$total_students[0]?> --> 1233
                                        </b></h2>
                                    <!-- <p class="mb-0 text-black mt-3"><b><?=$total_students[1]?>%</b>
                                        from Last Week</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Total Responses</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                                            <!-- <?=$total_student_responses[0]?> -->
                                            1231
                                        </b></h2>
                                    <!-- <p class="mb-0 text-black mt-3"><b> <?=$total_student_responses[1]?>%</b>
                                        from Last Week</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-center">
                                <div class="card-body p-t-10">
                                    <h4 class="card-title text-muted mb-0">Average
                                        Duration</h4>
                                    <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                                            <!-- <?=$minutes?> min <?=$seconds?>s -->
                                            12 min 2 s
                                        </b>
                                    </h2>
                                    <!-- <p class="mb-0 text-black mt-3"><b><?=$average_duration[1]?>%</b>
                                        from Last Week</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card" style="border-radius:20px">
                        <div class="card-body">
                            <h3 style="font-weight:600">Response Table</h3>
                            <p class="card-title-desc">Click on the <i class='ri-eye-fill'
                                    style='color:#000033;font-size:14px'></i> icon in the last column to view the
                                detailed student report.</p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;"
                                data-page-length='25'>
                                <thead class="bg-dark text-white">
                                    <tr style="color:white!important">
                                        <!-- <th scope="col" style="width:20px">#</th> -->
                                        <th style="color:white!important">First Name </th>
                                        <th style="color:white!important">Last Name</th>
                                        <th style="color:white!important">Email</th>
                                        <th style="color:white!important">Overall Score</th>
                                        <th style="color:white!important">Date</th>
                                        <th style="width:20px;color:white!important">Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    foreach ($students_data as $key => $values) {
                                        // echo $values["Id"]."<br>";
                                        $name = explode(" ",$values["Name"]);
                                    ?>
                                    <tr>
                                        <!-- <th scope="col" style="width:20px">1</th> -->
                                        <td> <?= $name[0] ?> </td>
                                        <td> <?= $name[1] ?> </td>
                                        <td> <?= $values["Email"] ?> </td>
                                        <td> <?= $values["Score"] ?> </td>
                                        <td> <?= $values["Time"] ?> </td>
                                        <td><a href='./student.php?id=<?= $values["Id"] ?>' target="_blank">
                                                <i class='ri-eye-fill' style='color:#000033;font-size:20px'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>

                                </tbody>
                            </table>
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

    <!-- apexcharts init -->
    <script src="assets/js/pages/apexcharts.init.js"></script>

    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>
</body>

</html>