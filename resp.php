<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("./models/config.php");
$kpi_data = json_decode(fetch_data(API_KPI_ENDPOINT,$data),true);
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
        <style>
        .page-item.active .page-link {
            color: #fff !important;
            background-color: #000333 !important;
        }

        .page-link {
            color: #000 !important;
            background-color: #fff !important;
        }

        .page-link:hover {
            color: #fff !important;
            background-color: #000333 !important;
        }

        .no-sort::after { 
            display: none!important; 
        }

        .no-sort::before { 
            display: none!important; 
        }

        .no-sort { 
            pointer-events: none!important; 
            cursor: default!important; 
        }
        </style>
</head>
<body style="background-color:#dadadd59">

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
                        <div class="card-body border border-2 py-1 px-3" style="border-radius:20px">
                            <a class="nav-link" href="./dashboard?organization=<?= $_GET['organization']?>&source=<?=$_GET['source']?>"
                                style="font-size:18px;color:white!important;">Dashboard
                                <span class="sr-only">(current)</span></a>
                        </div>
                        </li>
                        <li class="nav-item card" style="margin-left: 100px;">
                            <div class="card-body py-1">
                                <a class="nav-link text-dark" href="./resp?organization=<?= $_GET['organization']?>&source=<?=$_GET['source']?>"
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
                </div>
            </nav>

            <div class="page-content" style="padding-top: 27px!important;">
                <div class="container-fluid">
                    <!-- KPI Row Start -->
                    <?php include("components/kpi.php"); ?>
                    <!-- KPI Row End -->

                    <div class="card" style="border-radius:20px">
                        <div class="card-body">
                            <h3 style="font-weight:600">Response Table</h3>
                            <p class="card-title">Click on the <i class='ri-share-box-fill'
                                    style='color:#000033;font-size:14px'></i> icon in the last column to view the
                                detailed student report.</p>
                            <?php include("components/responsesTable.php") ?>
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