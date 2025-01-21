<?php 
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

if(isset($_POST['create_dashboard'])){
    header('Location: .././dashboard.php?organization='.$_POST['org'].'&inventory='.$_POST['implementation_type'].'&semester='.$_POST['semester'].'&use_case_id='.$_POST['use_case_id'].'&source=ZmlsdGVyZWQ');
}

$base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";


$url = $base_url."get-org";
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$data = curl_exec($ch);
curl_close($ch);

$jsondata = new stdClass();

$filters = new stdClass();

if(isset($_POST['org'])){
    $org = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST['org']);
    $filters->org_name = $org;
    if($_POST['org'] != $_SESSION['org'])
    {
        session_destroy();
        // $_SESSION['org'] = "";
        // $_SESSION['implementation_type'] =  "";
        // $_SESSION['semester'] =  "";
        // $_SESSION['use_case_id'] =  "";
        $_SESSION['org'] = $org;
    }
        
    // else
        $_SESSION['org'] = $org;
}

if(isset($_POST['implementation_type'])){
$type = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST['implementation_type']);
$filters->implementation_type =  $type;
$_SESSION['implementation_type'] = $type;
}

if(isset($_POST['semester'])){
$semester = $_POST['semester'];
if($_POST['semester'] != "")
{
    $jsondata->semester =  $semester;
    $_SESSION['semester'] = $semester;
}
}

if(isset($_POST['use_case_id'])){
// $use_case_id = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST['use_case_id']);
if($_POST['use_case_id'] != "")
{
    $jsondata->use_case_id =  $use_case_id;
$_SESSION['use_case_id'] = $use_case_id;

}
}

$filter = json_encode($filters);

$jsondata->type = "field";
$jsondata->dropdown = "implementation_type";
$jsondata->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($jsondata);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$implementation_type = json_decode(curl_exec($ch), true);
curl_close($ch);

$jsondata->dropdown = "semester";
$jsondata->filters = json_decode($filter);

$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($jsondata);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$semester = json_decode(curl_exec($ch), true);
curl_close($ch);
$jsondata->dropdown = "use_case_id";
$jsondata->filters = json_decode($filter);
// echo "<hr>";
$url = $base_url."dropdowns";
$ch = curl_init( $url );
$payload = json_encode($jsondata);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$use_case_id = json_decode(curl_exec($ch), true);
curl_close($ch);
// echo json_encode($jsondata);
// echo "<hr>";
// echo json_encode($data);
// echo "<hr>";
// echo json_encode($implementation_type);
// echo "<hr>";
// echo json_encode($semester);
// echo "<hr>";
// echo json_encode($use_case_id);
// echo "<hr>";
// echo json_encode($_SESSION);

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>All Partners | Career Launch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="./../assets/images/favicon.ico">

    <!-- Responsive Table css -->
    <link href="./../assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="./../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="./../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="./../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
    th {
        padding: 20px !important;
    }

    td {
        padding: 20px !important;
    }

    .text-white {
        color: white !important;
    }

    .form-select {
        background-color: white !important;
    }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="light"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="" style="width:90%;margin:auto">

            <div class="page-content">
                <div class="container-fluid align-content-center">
                    <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->


                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 align-self-center">

                            <div id="copyalert">

                            </div>

                            <div class="card" style="border-radius:20px">
                                <div class="card-body">
                                    <h1 style="font-weight:600">All Partners</h1>
                                    <p class="card-title-desc">Click on the <b>View Dashboard</b> button besides
                                        partners name, you will the the NACE dashboard.</p>


                                    <form id="filters_form" method="POST" class="row mb-3"
                                        style="border-radius: 16px;background-color:#000033!important;">
                                        <div class="col col-lg-3 px-4 py-5">
                                            <center>
                                                <h5 class="mb-2 text-white" style="font-size:16px">Organization</h5>
                                                <br>
                                                <!-- <form method="POST"> -->
                                                <select id="org_name" name="org" class="form-select select-light"
                                                    style="border-radius: 20px;" onchange="this.form.submit()">
                                                    <option value=""> Select Organization</option>
                                                    <?php 
                                                     $partners = json_decode($data, true);
                                                $i = 1;
                                                foreach ($partners as $key => $value) {
                                                    if($value == $_SESSION['org'])
                                                        echo "<option value=".$value." selected> ".ucwords($key)." </option>";
                                                    else
                                                        echo "<option value=".$value."> ".ucwords($key)." </option>";
                                                }
                                                    ?>
                                                    <!-- <option value="nace"> NACE Career Readiness Competencies</option>
                                                    <option value="plus"> Social Capital + Life Design + Career Mobility
                                                    </option> -->
                                                    <!-- <option> Work Experience </option> -->
                                                </select>
                                                <!-- </form> -->
                                            </center>
                                        </div>
                                        <div class="col col-lg-3 px-4 py-5">
                                            <center>
                                                <h5 class="text-white mb-2" style="font-size:16px">Implementation
                                                </h5> <br>
                                                <!-- <form method="POST"> -->
                                                <select id="implementation" name="implementation_type"
                                                    class="form-select select-light" style="border-radius: 20px;"
                                                    onchange="this.form.submit()">
                                                    <option value=""> All Data
                                                    </option>
                                                    <?php
                                        foreach($implementation_type as $i){
                                             if($i == strtolower($_SESSION['implementation_type']))
                                                echo "<option value=".$i." selected> ".ucwords($i)." </option>";
                                            else
                                                echo "<option value=".$i."> ".ucwords($i)." </option>";
                                        }
                                    ?>
                                                </select>
                                                <!-- </form> -->
                                                <div class="d-flex">


                                                </div>
                                            </center>
                                        </div>
                                        <div class="col col-lg-3 py-5">
                                            <center>
                                                <h5 class="text-white mb-2" style="font-size:16px">Semester</h5>
                                                <br>
                                                <div class="col-sm-12">
                                                    <select name="semester" class="form-select select-light"
                                                        style="border-radius: 20px;" onchange="this.form.submit()">
                                                        <option value=""> All Time</option>
                                                        <?php
                                                        echo $_SESSION['semester'];
                                                foreach($semester as $i){
                                                    if($i == $_SESSION['semester'])
                                                        echo "<option value='".$i."' selected> ".ucwords($i)." </option>";
                                                    else
                                                        echo "<option value='".$i."'> ".ucwords($i)." </option>";
                                                }
                                            ?>
                                                    </select>
                                                </div>
                                            </center>
                                        </div>
                                        <div class="col col-lg-3 px-4 py-5">
                                            <center>
                                                <h5 class="text-white mb-2"
                                                    style="font-size:16px;color:white!important">Use Case ID</h5> <br>
                                                <select name="use_case_id" class="form-select select-light"
                                                    style="border-radius: 20px;">
                                                    <option value=""> All
                                                        Student Cohort</option>
                                                    <?php
                                                foreach($use_case_id as $i){
                                                    if($i == $_SESSION['use_case_id'])
                                                        echo "<option value='".$i."' selected> ".ucwords($i)." </option>";
                                                    else
                                                        echo "<option value='".$i."'> ".ucwords($i)." </option>";
                                                }
                                            ?>
                                                </select>
                                            </center>
                                        </div>
                                        <div class="col col-lg-12">
                                            <hr style="background-color:white;margin-top:-20px;margin-bottom:20px">
                                            <center>
                                                <div class="d-flex justify-content-center">
                                                    <button name="create_dashboard" class="btn bg-white p-2 mb-3"
                                                        style="line-height: 112%; color: #000032;border-radius:20px;font-size:12px!important;width:25%">Generate
                                                        Dashboard
                                                    </button>
                                                    <div class="">
                                                        <a href='#' onclick="copyurl()" class='btn btn-sm btn-link'
                                                            style='color:white;font-size:20px'>
                                                            <i class='ri-file-copy-line'></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                        <input type="hidden" value="ZmlsdGVyZWQ">
                                    </form>

                                    <table class="table table-hover p-5">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:20px">#</th>
                                                <th style="text-align:center">University Name</th>
                                                <th style="text-align:center">Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                        // Decode JSON string to associative array
                                                $partners = json_decode($data, true);
                                                $i = 1;
                                                foreach ($partners as $key => $value) {
                                                    echo "<tr>
                                                <th scope='row'>".$i."</th>
                                                <td>" . $key . "</td>
                                                <td style='text-align:center'><a href='./../dashboard.php?organization=" . $value . "&source=ZGFzaGJvYXJk' target='_blank' class='btn btn-sm btn-dark'>View
                                                        Dashboard</a>
                                                        <div id='url".$i."' style='display:none'> http://da.careerreadinessinventory.academy/workexp.php?organization=" . $value . "&source=ZGFzaGJvYXJk </div>
                                                        <a href='#' onclick='copy(`url".$i."`,`" . $key . "`)' class='btn btn-sm btn-link' style='color:black;font-size:20px'>
                                                        <i class='ri-file-copy-line'></i>
                                                        </a>
                                                        </td>
                                            </tr>";
                                                    $i++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Appzia.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer> -->

    <script>
    function copyurl() {

        // var aux = document.createElement("input");

        // aux.setAttribute("value", document.getElementById(elementId).innerHTML);

        // document.body.appendChild(aux);

        // aux.select();

        document.execCommand('http://da.careerreadinessinventory.academy/dashboard.php?organization=' +
            <?= $_POST['org'] ?> + '&inventory=' + <?=$_POST['implementation_type']?> + '&semester=' +
            <?=$_POST['semester']?> + '&use_case_id=' + <?=$_POST['use_case_id']?> + "&source=ZmlsdGVyZWQ");

        // document.body.removeChild(aux);
        // $('#copyalert').append(
        //     "<div class='alert alert-success alert-dismissible' role='alert' style='font-size:15px;font-weight:600;'> <div> " +
        //     uni +
        //     "'s Dashboard link is copied! </div> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"
        // );
    }
    </script>

    <script>
    $(document).ready(function() {
        $("#org_name").val("<?= $_SESSION['org'] ?>");
        // $("#implementation").val("<?= $_SESSION['implementation_type'] ?>");
    });

    $("#filters_form").submit(function(e) {
        e.preventDefault();
    });
    </script>

    <!-- JAVASCRIPT -->
    <script src="./../assets/libs/jquery/jquery.min.js"></script>
    <script src="./../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="./../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="./../assets/libs/node-waves/waves.min.js"></script>

    <!-- Responsive Table js -->
    <script src="./../assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

    <!-- Init js -->
    <script src="./../assets/js/pages/table-responsive.init.js"></script>

    <script src="./../assets/js/app.js"></script>

</body>

</html>