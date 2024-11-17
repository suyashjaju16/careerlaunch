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
$filters->id = $_GET['id'];

$data = new stdClass();
$data = $filters;

$filter_data = json_decode(fetch_data($base_url,"student-filters",$data),true);

// Check if the data was decoded successfully and is an array
if (is_array($filter_data)) {
    // Get the first key and its first value
    $imp_time = array_key_first($filter_data);
    $student_filter = $filter_data[$imp_time][0];
} else {
    echo "Error decoding JSON data.";
}

$filters->implementation_type = $imp_time;
// $filters->evaluator_email = "mad6065@psu.edu";
$filters->filter = $student_filter;
// $filter = json_encode($filters);

echo json_encode($filters);
$data = new stdClass();
$data = $filters;

$student_details = json_decode(fetch_data($base_url,"student-details",$data),true);

$competency_data = json_decode(fetch_data($base_url,"student-competency",$data),true);
echo intval(json_encode($competency_data["communication_results"]["pre"]));


function verifyLevel($data, $category, $subCategory, $key) {
    return isset($data[$category][$subCategory][$key]) ? 
        ($data[$category][$subCategory][$key] == "1" ? 10.5 : 
        ($data[$category][$subCategory][$key] == "2" ? 35.5 : 
        ($data[$category][$subCategory][$key] == "3" ? 65.5 : 85.5))) : null;
}

function returnLevel($level) {
    return isset($level) ? 
        ($level == "Emerging" ? "10.5" : 
        ($level == "Understanding" ? "35.5" : 
        ($level == "Early" ? "65.5" : "85.5"))) : null;
}

function generate_filters($filter_data) {
    foreach ($filter_data as $key => $values) {
        foreach ($values as $value) {
            echo "<option value=\"{$key}:{$value}\">{$value}</option>\n";
        }
    }
}

function generate_competency($level) {
    foreach($level as $key => $value) 
    {
        echo '<div class="card border-2"
                style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);">
                <div class="card-body">
                    <div class="row w-100 align-items-center">
                        <div class="col-sm-3 text-center mb-0 align-content-center">
                            <p class="px-2 icon-text text-dark mb-0"
                                style="font-size: 18px;font-weight: 700;">'.$key.'
                            </p>
                        </div>
                        <div class="col-sm-9 mt-4 p-0">
                            <div class="progress mb-3 bg-white"
                                style="width:90%;margin:auto">
                                <div class="progress-bar bg-dark " role="progressbar"
                                    aria-valuenow="80" value="80" aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width:'.returnLevel($value['pre']).'%">
                                </div>
                                <div class="progress-value" style="background-color:#000;font-size:16px">
                                </div>
                                <p style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                    <b>'.$value["pre"].'</b>
                                </p>
                                <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:32px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" value="80" aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="width:'.returnLevel($value['post']).'%">
</div>
<div class="progress-value bg-info" style="font-size:16px">
</div>
<p style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
    <b>'.$value["post"].'</b>
</p>
<!-- /.progress-bar .progress-bar-danger -->
</div><!-- /.progress .no-rounded -->
</div>
</div>
</div>
</div>
</div>';
}
}

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
                            <h3 style="margin-left:20px"><b>CAREER READINESS
                                    INVENTORY REPORT</b></h3>
                            <h5 style="margin-left:20px"><b><?= $student_details['Organisation'] ?></b></h5>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-select">
                                <option> All Responses </option>
                                <?= generate_filters($filter_data); ?>
                                <select>
                        </div>
                    </div>

                    <div class="card mt-2 border-1">
                        <div class="card-body">
                            <div class="d-flex justify-content-around mt-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a class="btn btn-dark text-center"
                                            style="border-radius:50%;width:60px;height:60px;">
                                            <i class="mdi mdi-account" style="font-size:31px;"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-9 align-content-center">
                                        <h4 style="margin-left:20px"><b><?= $student_details['Name'] ?></b>
                                        </h4>
                                    </div>
                                </div>
                                <div>
                                    <h5><b>Area of Study</b></h5>
                                    <h5><?= $student_details['program'] ?></h5>
                                </div>
                                <div>
                                    <h5><b>Academic Level</b></h5>
                                    <h5><?= $student_details['degree'] ?></h5>
                                </div>
                                <div>
                                    <h5><b>Report Date</b></h5>
                                    <h5> <?= date('m/d/Y', strtotime($student_details['timestamp'])) ?> </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="card border-1" style="width:55%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5> <b> Evaluator: Manager (Supervisor) </b>
                                            </h5>
                                            <h5><?= $student_details['Evaluator Name'] ?> </h5>
                                        </div>
                                        <div class="d-flex">
                                            <i class="mdi mdi-email" style="font-size:18px;"></i>
                                            <h5 class="ml-5">
                                                <?= $student_details['Evaluator Email'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 align-content-center">
                                        <h5><b>Work Experience</b></h5>
                                        <h5><?= $student_details['work_experience'] ?></h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex pr-5" style="width:20%">
                            <img src=" <?= $student_details['Logo'] ?>" class="img-fluid rounded"
                                alt=" <?= $student_details['Logo'] ?>" style="object-fit: contain;width:100%">
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
                                        <h3>Career Readiness
                                            Level</h3>
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
                                                <div class="tick"></div>
                                                <!-- 0% -->
                                                <div class="tick" style="left:24.5%"></div>
                                                <!-- 25% -->
                                                <div class="tick" style="left:49.5%"></div>
                                                <!-- 50% -->
                                                <div class="tick" style="left:74%"></div>
                                                <!-- 75% -->
                                                <div class="tick"></div>
                                                <!-- 100% -->
                                            </div>

                                            <div class="d-flex mt-2" style="width:93%">
                                                <p style="margin-left:-3px;color:black">
                                                    <b>0 </b>
                                                </p>
                                                <p style="margin-left:24.9%;color:black"><b>25</b></p>
                                                <p style="margin-left:24.5%;color:black"><b>50</b></p>
                                                <p style="margin-left:23.9%;color:black"><b>75</b></p>
                                                <p style="margin-left:25%;color:black"><b>100</b></p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-1 align-content-center">
                                        <a href="#" data-bs-toggle="popover" data-bs-html="true" data-trigger="focus"
                                            data-bs-content="<div class='btn btn-primary btn-sm' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:black'> Emerging Knowledge</div> <p class='mt-2 mb-2'>The student has an emerging awareness of the behavior, its importance, and related concepts.</p> <div class='btn btn-success btn-sm' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:black'> Understanding </div> <p class='mt-2 mb-2'>The student demonstrates an understanding of the behavior and related concepts.</p> <div class='btn btn-warning btn-sm' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:black'> Early Application</div><p class='mt-2 mb-2'>The student sometimes applies the behavior.</p> <div class='btn btn-sm btn-danger' style='width:23%;margin:auto;font-size:10px;margin-right:5px!important;font-weight:bold;color:black'> Advanced Application</div><p class='mt-2 mb-2'>The behavior is consistent and integrated into the student’s workplace behaviors.</p>"
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
                            <div class="card-body pt-0 pe-0">
                                <div class="row p-0 mt-2">
                                    <div class="col-sm-12 p-0">
                                        <div class="d-flex float-end align-content-center">
                                            <div class="mt-1">
                                                <h5 class="font-size-14 text-black"> Evaluator Data</h5>
                                            </div>
                                            <div style="margin-left:5px">
                                                <div class="form-check form-switch" style="width:fit-content!important">
                                                    <input class="form-check-input bg-success" type="checkbox"
                                                        role="switch" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center p-0">
                                    <div
                                        class="col-sm-3 d-flex flex-row p-3 mb-0 align-items-center card bg-dark align-content-center">
                                        <img class="img-fluid" src="./assets/images/ocr.png"
                                            style="height: 70px;width: 70px;margin: auto;">
                                        <h3 class="px-2 icon-text text-dark mb-0"
                                            style="color: white!important;font-size: 18px;font-weight: 700;">
                                            Overall <br>Career
                                            Readiness </h3>
                                    </div>
                                    <div class="col-sm-8 mt-4 px-3">
                                        <div class="progress mb-3 bg-white" style="width:93%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width:<?= intval(json_encode($competency_data["overall_career_readiness_results"]["post"])); ?>%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                <?= intval(json_encode($competency_data["overall_career_readiness_results"]["post"])); ?>
                                            </div>
                                            <p
                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                <b>Evaluator</b>
                                            </p>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->


                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:93%;margin:auto">
                                                <div class="progress-bar bg-warning " role="progressbar"
                                                    aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:<?= intval(json_encode($competency_data["overall_career_readiness_results"]["pre"])); ?>%">
                                                </div>
                                                <div class="progress-value bg-warning" style="font-size:16px">
                                                    <?= intval(json_encode($competency_data["overall_career_readiness_results"]["pre"])); ?>
                                                </div>
                                                <p
                                                    style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                    <b>Self</b>
                                                </p>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->

                                            <!-- <p style="margin-top:-36px;margin-left:59.5%;font-size:18px;color:black">
                                                <b>Self</b>
                                            </p> -->
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
                                                        Communication
                                                    </h3>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            style="width:<?= intval(json_encode($competency_data["communication_results"]["post"])); ?>%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            <?= intval(json_encode($competency_data["communication_results"]["post"])); ?>
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
                                                        <!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <div style="margin-top:35px">
                                                        <div class="progress mb-3 bg-white"
                                                            style="width:90%;margin:auto">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="80" value="80" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:<?= intval(json_encode($competency_data["communication_results"]["pre"])); ?>%">
                                                            </div>
                                                            <div class="progress-value bg-info" style="font-size:16px">
                                                                <?= intval(json_encode($competency_data["communication_results"]["pre"])); ?>
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["communication"]); ?>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p dir="ltr"><strong>Engage in Class Discussions</strong></p>
                                                    <p dir="ltr">💬 Actively participate in class discussions and group
                                                        projects. When possible, prepare insightful questions and
                                                        comments beforehand to contribute meaningfully to the
                                                        conversation. You will deepen your understanding of the subject
                                                        matter and improve your communication skills.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Be Mindful of Nonverbal
                                                            Communication</strong></p>
                                                    <p dir="ltr">👀 Pay attention to your body language, facial
                                                        expressions, and eye contact during interactions, as well as the
                                                        nonverbal communication of others. <a class="text-primary"
                                                            href="https://www.google.com/" target="_blank">Advance tip
                                                        </a>: mirror positive
                                                        nonverbal cues of others to show understanding and
                                                        attentiveness.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Prepare and Deliver
                                                            Presentations</strong></p>
                                                    <p dir="ltr">🎤 Volunteer to present in class, at meetings, or other
                                                        situations to practice your verbal and non-verbal communication
                                                        skills. By honing your presentation behaviors, you become a more
                                                        effective communicator.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Practice Active Listening
                                                            Skills</strong></p>
                                                    <p dir="ltr">👂Practice active listening during conversations by
                                                        giving your full attention to the speaker and genuinely engaging
                                                        with their message. Avoid interrupting and focus on
                                                        understanding their perspective before formulating a response.
                                                        Reflect back on what the speaker has said to demonstrate
                                                        comprehension and empathy. You will build strong relationships
                                                        when you consistently use active listening behaviors. </p>
                                                    <p dir="ltr"><strong><br></strong><strong>Talk to Professionals in
                                                            Career Roles that Interest You</strong></p>
                                                    <p dir="ltr">🕵🏼 Set up time to talk with professionals in careers
                                                        you're interested in to gain information. Utilize your school
                                                        resources and guidance from your career center to connect with
                                                        individuals in your desired field.</p>


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
                                                        Teamwork
                                                    </h3>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color: #E06B60">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["teamwork"]); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p><strong><span
                                                                class="font-large">Recommendations</span></strong><strong></strong>
                                                    </p>
                                                    <p dir="ltr"><strong>Participate in Study Groups</strong></p>
                                                    <p dir="ltr">👥 Collaborate with peers by creating or joining study
                                                        groups. </p>
                                                    <p dir="ltr"><strong><br></strong><strong>Be Thoughtful About
                                                            Supporting Others</strong></p>
                                                    <p dir="ltr">🤝In group and team settings, think about what you can
                                                        do or say to support your teammates.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Join Relevant Communities
                                                            or Organizations</strong></p>
                                                    <p dir="ltr">🚀 If you currently do not have many opportunities to
                                                        work in groups, think about joining communities or organizations
                                                        related to your fields of interest. These experiences will
                                                        provide opportunities to practice your teamwork skills.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Use Teamwork Apps</strong>
                                                    </p>
                                                    <p dir="ltr">📱For team projects, utilize collaboration tools like
                                                        Trello, Asana, or Slack to enhance your teamwork and
                                                        communication skills. These apps allow you to practice
                                                        organizing and managing group tasks. </p>
                                                    <p dir="ltr"><strong><br></strong><strong>Participate in
                                                            Team-Building Exercises</strong></p>
                                                    <p dir="ltr">🎯 Take the lead or participate in team-building
                                                        exercises to strengthen your relationships with the people in
                                                        your group or on your team. Spending time with people on your
                                                        team in different environments can provide you the opportunity
                                                        to get to know each other better, which can make you a better
                                                        teammate.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Participate in Team
                                                            Sports</strong></p>
                                                    <p dir="ltr">🏀 Engage in recreational sports teams to develop
                                                        essential teamwork skills such as communication, coordination,
                                                        and mutual support. Participating in team sports can provide
                                                        valuable lessons in collaboration and teamwork.<br></p>

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
                                                        Career & Self
                                                        Development
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px">50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["self_development"]); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p><strong><span
                                                                class="font-large">Recommendations</span></strong><strong></strong><strong></strong>
                                                    </p>
                                                    <p dir="ltr"><strong>Attend Professional Events</strong></p>
                                                    <p dir="ltr">🚙 Attending industry events, whether in person or
                                                        virtually, can offer valuable learning and networking
                                                        opportunities into current industry trends. Take advantage of on
                                                        campus and off-campus events to expand your professional network
                                                        and learn.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Ask to have Career
                                                            Conversations</strong></p>
                                                    <p dir="ltr">👫🏼 Cultivate relationships with professionals in your
                                                        desired field by having meaningful career conversations. Talking
                                                        with individuals at organizations where you want to work can
                                                        provide valuable information, possible mentorship, and potential
                                                        future opportunities.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Complete an Internship,
                                                            Micro-Internship, Apprenticeship, or similar
                                                            experience</strong></p>
                                                    <p dir="ltr">💼 These experiences provide invaluable insights into
                                                        potential career paths and allow you to gain practical
                                                        experience in your field of interest. Even if the experience
                                                        isn't what you expected, it still offers valuable learning
                                                        opportunities and helps you refine your career aspirations.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Commit Time for Career and
                                                            Professional Development</strong></p>
                                                    <p dir="ltr">☀ Utilize resources provided by your school's career
                                                        services and actively pursue opportunities relevant to your
                                                        career goals. Dedicate regular time each week or month to focus
                                                        on your career development alongside your academic and/or work
                                                        commitments.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Set Concrete and
                                                            Actionable Goals</strong></p>
                                                    <p dir="ltr">🎯 Continuously strive for improvement by setting
                                                        specific and achievable goals for skill development over defined
                                                        time frames. Focus on one or two skills at a time to ensure
                                                        meaningful progress.<br></p>


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
                                                        Professionalism
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color:#609866">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["professionalism"]); ?>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p><strong><span
                                                                class="font-large">Recommendations</span></strong><strong></strong>
                                                    </p>
                                                    <p dir="ltr"><strong>Talking About Your Professional
                                                            Interests</strong></p>
                                                    <p dir="ltr">⭐ Your professional interests will likely change over
                                                        time. Talking about WHY you're interested in a certain field or
                                                        topic will help your professional communication. It can be easy
                                                        to talk about WHAT you're interested in, but explaining your WHY
                                                        adds depth and clarity to your message.</p>
                                                    <p dir="ltr"><strong>Bring Your Best Self to Work</strong></p>
                                                    <p dir="ltr">😕 Everyone has tough days and times when our personal
                                                        lives are challenging. It’s normal. Do your best to bring your
                                                        best self to work.</p>
                                                    <p dir="ltr"><strong>Practice Gratitude</strong></p>
                                                    <p dir="ltr">🙏🏽 Showing genuine gratitude towards those who
                                                        contribute to your career journey is not only the right thing to
                                                        do but can also lead to opportunities. People appreciate being
                                                        appreciated. Remember to take time to appreciate the people who
                                                        support you. This can be done with an email, text message, phone
                                                        call, or in-person conversation depending on the situation.</p>
                                                    <p dir="ltr"><strong>Create a Professional Online Brand</strong></p>
                                                    <p dir="ltr">📬 If you have examples of previous accomplishments or
                                                        projects (such as writing, artwork, or coding), consider
                                                        showcasing them through a simple online portfolio or linking
                                                        them to a website like LinkedIn. Highlighting your work helps to
                                                        build a professional brand and can show your skills and
                                                        achievements to potential employers.</p>
                                                    <p dir="ltr"><strong>Be Mindful of Your Social Media
                                                            Presence</strong></p>
                                                    <p dir="ltr">🌐 Employers often review public social media profiles
                                                        before making hiring decisions. Make sure your social media
                                                        presence reflects positively on you. Review your profiles and be
                                                        mindful that potential employers might see your profile and
                                                        posts.</p>
                                                    <p dir="ltr"><strong>Demonstrate Dependability</strong></p>
                                                    <p dir="ltr">✅ Employers value being on-time and being reliable. If
                                                        you don’t already, practice consistently being on-time to class,
                                                        group meetings, work, and/or events. If unexpected circumstances
                                                        arise that may affect your timeliness, communicate promptly.
                                                        Being reliable and dependable helps build trust and credibility
                                                        in academic and professional settings.<br></p>

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
                                                        Leadership
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color:#796258">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                        <?= generate_competency($competency_data["leadership"]); ?>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                <p><strong><span
                                                            class="font-large">Recommendations</span></strong><strong></strong>
                                                </p>
                                                <p dir="ltr"><strong>Participate in Student Organizations</strong></p>
                                                <p dir="ltr">🎓 Engage actively in clubs and organizations that align
                                                    with your interests. Consider taking on leadership roles such as
                                                    club officer positions or leading projects. These roles offer
                                                    valuable opportunities to develop leadership skills.</p>
                                                <p dir="ltr"><strong><br></strong><strong>Volunteer for Leadership
                                                        Roles</strong></p>
                                                <p dir="ltr">🌟 Ask to lead study groups, community service projects, or
                                                    events. Volunteering for leadership positions not only demonstrates
                                                    your commitment but also provides valuable experiences in team
                                                    management and organization.</p>
                                                <p dir="ltr"><strong><br></strong><strong>Encourage and Support
                                                        Others</strong></p>
                                                <p dir="ltr">👂 Practice active listening during conversations and
                                                    demonstrate genuine interest in others' perspectives. Also practice
                                                    offering words of encouragement to others for their accomplishments.
                                                    Creating a supportive environment is another skill of a leader.</p>
                                                <p dir="ltr"><strong><br></strong><strong>Stay Informed</strong></p>
                                                <p dir="ltr">📚 Stay updated on emerging trends by listening to
                                                    podcasts, reading articles and books, and watching videos. Keeping
                                                    yourself informed broadens your knowledge base and equips you with
                                                    knowledge that can help your leadership skills.</p>
                                                <p dir="ltr"><strong><br></strong><strong>Seek Out Advice</strong></p>
                                                <p dir="ltr">🤝 Identify and connect with faculty members, alumni, or
                                                    professionals who can offer advice. Attend office hours and
                                                    networking events to establish meaningful connections. Receiving
                                                    advice and feedback can provide you guidance and support as you
                                                    navigate your leadership journey.<br></p>


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
                                                        Critical
                                                        Thinking
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color:#705181">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                        <?= generate_competency($competency_data["critical_thinking"]); ?>

                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                <p><strong><span class="font-large">Recommendations</span></strong></p>
                                                <p><strong></strong><strong>Engage in Class Discussions</strong></p>
                                                <p dir="ltr">💬 Contribute actively to class discussions by sharing your
                                                    perspectives and respectfully challenging ideas presented by peers
                                                    and instructors. Ask questions to deepen your understanding of the
                                                    material and practice your critical thinking
                                                    skills.<br><br><strong><br></strong><strong>Plan for Multiple
                                                        Scenarios</strong></p>
                                                <p dir="ltr">📅 Think about potential situations that might happen and
                                                    develop ideas on what to do if different decisions are made.
                                                    Planning for multiple scenarios develops your critical thinking
                                                    skills. <br><br><strong><br></strong><strong>Take Different Types of
                                                        Classes</strong></p>
                                                <p dir="ltr">🌐 Expand your knowledge by enrolling in courses outside of
                                                    your program of study. This interdisciplinary approach exposes you
                                                    to diverse viewpoints and enhances your ability to think critically
                                                    across different fields, ultimately broadening your intellectual
                                                    toolkit.<br><br><strong><br></strong><strong>Uncover Personal
                                                        Biases</strong></p>
                                                <p dir="ltr">🧠 Seek feedback from people who have different backgrounds
                                                    to uncover blind spots and biases in your thinking. This will
                                                    cultivate your self-awareness and the feedback you receive will
                                                    improve your critical thinking abilities.
                                                    <br><br><strong><br></strong><strong>Participate in Research
                                                        Projects</strong>
                                                </p>
                                                <p dir="ltr">📚 Get involved in research groups or assist professors in
                                                    their projects. This hands-on experience will improve your critical
                                                    thinking skills by learning from the research. Analyzing research
                                                    findings and data are behaviors of someone who thinks
                                                    critically.<br></p>
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
                                                        Technology
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color:#3c4b6c">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["technology"]); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p><strong><span class="font-large">Recommendations</span></strong>
                                                    </p>
                                                    <p dir="ltr"><strong></strong><strong>Understand Technology Trends
                                                            and Uses</strong></p>
                                                    <p dir="ltr">🗞️ Keep yourself informed about the latest industry
                                                        trends about technology by following reliable sources of
                                                        information. </p>
                                                    <p dir="ltr"><strong><br></strong><strong>Be Curious and Open to
                                                            Learning</strong></p>
                                                    <p dir="ltr">🌟 Cultivate a mindset of curiosity and a willingness
                                                        to learn by exploring new technologies. Embrace opportunities to
                                                        experiment with unfamiliar technologies, even if they seem
                                                        difficult. Each new experience contributes to your growth and
                                                        proficiency in technology.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Practice Using
                                                            Technology</strong></p>
                                                    <p dir="ltr">🛠️ Engage in hands-on projects that leverage
                                                        technology, such as creating presentations or utilizing
                                                        artificial intelligence. These practical exercises not only
                                                        enhance your technical skills but can also support your critical
                                                        thinking.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Think About How Technology
                                                            Can Boost Your Productivity</strong></p>
                                                    <p dir="ltr">⏲️ Identify areas in your life where technology can
                                                        improve how you do things. Explore how technology can support
                                                        you in organizing and managing your workload personally,
                                                        academically, and/or professionally.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Use Technology
                                                            Ethically</strong></p>
                                                    <p dir="ltr">🌐 Consider the potential impacts of your technological
                                                        choices for yourself, as well as other individuals, communities,
                                                        and society as a whole. Strive to leverage technology in ways
                                                        that promote fairness. By prioritizing ethical considerations
                                                        you will contribute to a more responsible use of technology.</p>


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
                                                        Equity &
                                                        Inclusion
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 p-3" style="margin-top:20px;">
                                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                        <div class="progress-bar bg-dark " role="progressbar"
                                                            aria-valuenow="80" value="80" aria-valuemin="0"
                                                            aria-valuemax="100" style="width:22%">
                                                        </div>
                                                        <div class="progress-value"
                                                            style="background-color:#000;font-size:16px">
                                                            20
                                                        </div>
                                                        <p
                                                            style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                            <b>Evaluator</b>
                                                        </p>
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
                                                                style="font-size:16px;background-color:#ad3131">
                                                                50
                                                            </div>
                                                            <p
                                                                style="position:relative;margin-top:-12px;left:1%;font-size:18px;color:black">
                                                                <b>Self</b>
                                                            </p>
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
                                            <?= generate_competency($competency_data["equity"]); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <p><strong><span class="font-large">Recommendations</span></strong>
                                                    </p>
                                                    <p><strong></strong><strong>Participate in Multicultural Workshops
                                                            and Trainings</strong></p>
                                                    <p dir="ltr">🌎 Attend workshops and training sessions that address
                                                        cultural competence, equity awareness, and inclusion. These
                                                        opportunities can improve your understanding of diverse
                                                        perspectives and provide you with new diversity and inclusion
                                                        skills.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Volunteer for
                                                            Equity-Focused Initiatives</strong></p>
                                                    <p dir="ltr">🤝 Get involved in campus or community programs focused
                                                        on inclusion and equity. By volunteering for such initiatives,
                                                        you can contribute to creating a more diverse and welcoming
                                                        environment for all.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Engage in Thoughtful
                                                            Conversations</strong></p>
                                                    <p dir="ltr">💬 Actively participate in discussions and debates that
                                                        expose you to diverse viewpoints. Engaging in thoughtful
                                                        conversations cultivates empathy and a deeper understanding of
                                                        inclusion and diversity.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Join Groups</strong></p>
                                                    <p dir="ltr">🤗 Join or start groups dedicated to promoting
                                                        inclusivity. These groups can provide a supportive community
                                                        where you can share experiences, seek guidance, and advocate for
                                                        positive change together.</p>
                                                    <p dir="ltr"><strong><br></strong><strong>Study Abroad</strong></p>
                                                    <p dir="ltr">✈️ Enroll in a study abroad program to live and study
                                                        in a different culture to gain more diverse experiences.
                                                        Studying abroad not only expands your cultural awareness but
                                                        also can improve your cross-cultural communication skills.</p>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END layout-wrapper -->
                        <!-- end row -->

                        <footer class="footer container"
                            style="left: 1px!important;border-radius: 24px 24px 0px 0px;top:101%!important">
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