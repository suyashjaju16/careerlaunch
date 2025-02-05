<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

// echo urlencode("axel+e1@careerlaunch.academy");
// echo json_encode($_GET);

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

if(isset($_POST['filterData'])){
    // echo json_encode($_POST['filterData']);
    $filter = $_POST['filterData'];
    $type = explode("//", $filter);
    $filters->implementation_type = $type[0];
    $filters->filter = $type[1];
}
else{
    if(isset($_GET['type']))
        $filters->implementation_type = $_GET['type'];
    else{
        // Check if the data was decoded successfully and is an array
        if (is_array($filter_data)) {
            $imp_time = array_key_first($filter_data);
            $student_filter = $filter_data[$imp_time][0];
            $filters->implementation_type = $imp_time;
            $filters->filter = $student_filter;
            $implementation_time = $imp_time;
        } else {
            echo "Error decoding JSON data.";
        }
    }
    if(isset($_GET['filter']))
        $filters->filter = $_GET['filter'];
}

if(isset($_POST['filterData'])){
    $implementation_time = explode("//", $_POST['filterData']);
    $implementation_time = $implementation_time[0];
}
if(isset( $_GET['type'])){
    $implementation_time = $_GET['type'];
}

// echo $implementation_time;

// if(isset($_GET['evaluator']))
    // $filters->evaluator_email = "axel+e1@careerlaunch.academy";

// echo json_encode($filters);


// $data = new stdClass();
// $data = $filters;

$student_details = json_decode(fetch_data($base_url,"student-details",$data),true);
// echo json_encode($student_details);
// $type = explode("//", $_GET['filter']);
if(isset($student_details["Evaluator Email"]) && $student_details["Evaluator Email"] != null)
    $filters->evaluator_email = $student_details["Evaluator Email"];
//  echo json_encode($student_details);

// echo json_encode($student_details);
//  echo json_encode($filters->evaluator_email);
// $data = new stdClass();
$data = $filters;
$competency_data = json_decode(fetch_data($base_url,"student-competency",$data),true);
// echo intval(json_encode($competency_data["communication_results"]["pre"]));

// echo json_encode($data);
// echo generate_competency($competency_data["communication"]);
function verifyLevel($data, $category, $subCategory, $key) {
    return isset($data[$category][$subCategory][$key]) ? 
        ($data[$category][$subCategory][$key] == "1" ? 10.5 : 
        ($data[$category][$subCategory][$key] == "2" ? 35.5 : 
        ($data[$category][$subCategory][$key] == "3" ? 65.5 : 85.5))) : null;
}

function returnColor($val) {
    return ($val <= 25) ? "#01a2b2" : (($val <= 50) ? "#66d202" : (($val <= 75) ? "#ffb601" : "#e66060"));
}

function returnLevel($level) {
    return isset($level) ? 
        ($level == "Not Observed" ? "0" : 
        ($level == "Emerging" ? "10.5" : 
        ($level == "Understanding" ? "35.5" : 
        ($level == "Early" ? "60" : "85.5")))) : null;
}

// Function to generate filters with selected value
function generate_filters($selected_value, $filter_data) {
    $html = '';
    foreach ($filter_data as $key => $values) {
        foreach ($values as $value) {
            // Check if the current value matches the selected value
            $is_selected = ($selected_value === "{$key}//{$value}") ? 'selected' : '';
            $html .= "<option value=\"{$key}//{$value}\" {$is_selected}>{$value}</option>\n";
        }
    }
    return $html;
}

echo json_encode($data);

// Get the selected value from the POST request
$selected_value = $_POST['filterData'] ?? ''; // Use null coalescing operator

$selected_filter = isset($_POST['filterData']) ? $_POST['filterData'] : '';

function generate_competency($level,$color) {
if(isset($level)){
foreach($level as $key => $value)
{
echo '
<div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);">
    <div class="card-body">
        <div class="row w-100 align-items-center">
            <div class="col-sm-3 text-center mb-0 align-content-center">
                <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">'.$key.'
                </p>
            </div>
            <div class="col-sm-9 mt-4 p-0">';
            // echo json_encode($value);
                if(isset($value["evaluator"]) && $value["evaluator"] != null){
                    $eval_hide = returnLevel($value['evaluator']) < 1 ? "display:none!important;" : "";
                echo '<div class="progress mb-5 bg-white evalu" style="width:90%;margin-bottom:32px;margin:auto;">
                    <div class="progress-bar animated-progress bg-dark " role="progressbar"
                        data-width="'.returnLevel($value['evaluator']).'" aria-valuemin="0" aria-valuemax="100"
                        style="max-width:90%">
                    </div>
                    <div class="progress-value" style="background-color:#000;font-size:16px;'.$eval_hide.'">
                    </div>
                    <p style="position:relative;margin-top:-8px;left:1%;font-size:18px;color:black">
                        <b>'.$value["evaluator"].'</b>
                    </p>
                </div>';
                }
                if(isset($value["pre"]) && $value["pre"] != null){
                    $pre_hide = isset($value['evaluator']) ? "display:none" : "";
                echo '<div class="progress pre-bar mb-3 bg-white" style="width:90%;margin-bottom:32px!important;margin:auto;'.$pre_hide.'">
                    <div class="progress-bar animated-progress" role="progressbar"
                        data-width="'.returnLevel($value['pre']).'" aria-valuemin="0" aria-valuemax="100"
                        style="max-width:90%;background-color:'.$color.'">
                    </div>
                    <div class="progress-value" style="background-color:'.$color.';font-size:16px">
                    </div>
                    <p style="position:relative;margin-top:-8px;left:1%;font-size:18px;color:black">
                        <b>'.$value["pre"].'</b>
                    </p>
                </div>';
                }
                if(isset($value["post"]) && $value["post"] != null){
                echo '<div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                    <div class="progress-bar animated-progress" role="progressbar"
                        data-width="'.returnLevel($value['post']).'" aria-valuemin="0" aria-valuemax="100"
                        style="max-width:90%;background-color:'.$color.'">
                    </div>
                    <div class="progress-value" style="background-color:'.$color.';font-size:16px">
                    </div>
                    <p style="position:relative;margin-top:-8px;left:1%;font-size:18px;color:black">
                        <b>'.$value["post"].'</b>
                    </p>
                </div>';
                }
                echo '</div>
        </div>
    </div>
</div>';
}
}
}

function generate_competency_results($competency_data, $competency,$color, $label, $icon, $competency_tag){
// echo $GLOBALS["implementation_time"];
if(isset($competency_data[$competency_tag])){
// echo $competency_tag;
echo '<div class="row align-items-center p-0 w-100">
    <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
        style="background-color:'.$color.'!important">
        <img class="img-fluid" src="'.$icon.'" style="height: 70px;width: 70px;margin: auto;">
        <h3 class="px-2 icon-text text-dark mb-0" style="color: white!important;font-size: 18px;font-weight: 700;">
            '.$label.'
        </h3>
    </div>
    <div class="col-sm-9 p-3" style="margin-top:20px;">';
    // echo json_encode($competency_data["evaluator"]);
    // echo json_encode($competency_data[$competency]['pre'] != null);
        if(json_encode($competency_data["evaluator"]) == "true")
        {
            $value = intval(json_encode($competency_data[$competency]["evaluator"])) > 0 ? intval(json_encode($competency_data[$competency]["evaluator"])) : "";
        echo '<div class="progress px-3 mb-3 bg-white evalu" style="margin-bottom:32px!important;margin-left:20px">
            <div class="progress-bar animated-progress bg-dark " role="progressbar"
                data-width="'.(intval(json_encode($competency_data[$competency]["evaluator"]))-3).'" aria-valuemin="0"
                aria-valuemax="100">
            </div>
            <div class="progress-value" style="background-color:#000;font-size:16px">
                '.$value.'
            </div>
        </div>';
        }
        if(json_encode($competency_data["pre"]) == "true")
        {
            $value = intval(json_encode($competency_data[$competency]["pre"])) > 0 ? intval(json_encode($competency_data[$competency]["pre"])) : "";
        // $pre = json_encode($competency_data["evaluator"]) == "true" ? "hide" : "";
        // echo "Pre : ".$pre;
        $pre_hide = $competency_data[$competency]['evaluator'] == null ? "" : "display:none";
        // echo $self_label;
        echo '<div class="progress px-3 pre-bar mb-3 bg-white" style="margin-bottom:32px!important;margin-left:20px;'.$pre_hide.'">
            <div class="progress-bar animated-progress" role="progressbar"
                data-width="'.(intval(json_encode($competency_data[$competency]["pre"]))-3).'" aria-valuemin="0"
                aria-valuemax="100" style="background-color:'.$color.'">
            </div>
            <div class="progress-value" style="font-size:16px;background-color:'.$color.'">
                '.$value.'
            </div>
        </div>';
        }
        if(json_encode($competency_data["post"]) == "true")
        {
            $value = intval(json_encode($competency_data[$competency]["post"])) > 0 ? intval(json_encode($competency_data[$competency]["post"])) : "";
        echo '<div class="progress px-3 post-bar bg-white" style="margin-bottom:32px!important;margin-left:20px">
            <div class="progress-bar animated-progress" role="progressbar"
                data-width="'.(intval(json_encode($competency_data[$competency]["post"]))-3).'" aria-valuemin="0"
                aria-valuemax="100" style="background-color:'.$color.'">
            </div>
            <div class="progress-value" style="background-color:'.$color.';font-size:16px">
                '.$value.'
            </div>
        </div>';
        }
        echo '</div>
</div>';
}
}
// if($student_details["Organisation"] == "Cutco")
//     echo "Its Cutco";
// else
//  echo "Not Cutco";

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $student_details['Name'] ?> - Inventory Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Career Readiness Inventory" name="description" />
    <meta content="Career Launch" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-css.css" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KN2V1VKJZ9"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-KN2V1VKJZ9');

    </script>

<script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" >
    </script>


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

    .animated-progress {
        animation: progress-animation 1s ease-out forwards;
    }

    @keyframes progress-animation {
        from {
            width: 0%;
        }

        to {
            width: var(--progress-width, 100%);
        }
    }

    .recommendations-headings {
        font-size: 16px !important;
    }

    .popover-headings {
        font-weight: 800;
        color: #000 !important;
    }

    .text-black {
        color: #000 !important;
    }

    .bg-dark {
        background-color: #000 !important;
    }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div id="printableArea" class="container">

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 style="margin-left:20px"><b>NACE CAREER READINESS
                                    INVENTORY REPORT</b></h3>
                            <h5 style="margin-left:20px"><b><?= $student_details['Organisation'] ?></b></h5>
                        </div>
                        <div class="col-sm-4">
                            <form method="POST">
                                <select name="filterData" class="form-select" onchange="this.form.submit()">
                                    <?= generate_filters($selected_value, $filter_data); ?>
                                </select>
                            </form>
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
                                        <h4 class="animate__animated animate__fadeInDown" style="margin-left:20px">
                                            <b><?= $student_details['Name'] ?></b>
                                        </h4>
                                    </div>
                                </div>
                                <div>
                                    <h5><b>Area of Study</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['program'] ?>
                                    </h5>
                                </div>
                                <div>
                                    <h5><b>Academic Level</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['degree'] ?>
                                    </h5>
                                </div>
                                <div>
                                    <h5><b>Report Date</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown">
                                        <?= date('m/d/Y', strtotime($student_details['timestamp'])) ?> </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    // echo $student_details["work_experience"];
                    if($student_details["work_experience"] != null){                            
                        ?>
                    <div class="d-flex justify-content-between">

                        <div class="card border-1" style="width:55%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5> <b> Evaluator:
                                                    <?= isset($student_details["Evaluator Relation"]) ? $student_details['Evaluator Relation'] : "" ?>
                                                </b>
                                            </h5>
                                            <h5><?= isset($student_details["Evaluator Name"]) ? $student_details['Evaluator Name'] : "Not Assigned" ?>
                                            </h5>
                                        </div>
                                        <div class="d-flex">
                                            <i class="mdi mdi-email" style="font-size:18px;"></i>
                                            <h5 class="ml-5">
                                                <?= isset($student_details['Evaluator Email']) ? $student_details['Evaluator Email'] : "N/A" ?>
                                            </h5>
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
                            <img src="<?= $student_details['Logo'] == "NULL" ? "assets/images/logo.png" : $student_details['Logo'] ?>"
                                class="img-fluid rounded" alt="Org Logo"
                                style="object-fit: contain;width:100%;max-height:140px">
                        </div>
                    </div>
                    <?php } 
                        else{
                            ?>
                    <div class="float-end pb-3 mt-3" style="width:20%">
                        <img src="<?= $student_details['Logo'] == "NULL" ? "assets/images/logo.png" : $student_details['Logo'] ?>"
                            class="img-fluid rounded" alt=" <?= $student_details['Organisation'] ?>"
                            style="object-fit: contain;width:100%;max-height:140px">
                    </div>
                    <?php
                        }
                        ?>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row sticky-top">
                    <div class="col-sm-12 px-0">
                        <div class="card">
                            <div class="card-body py-1">

                                <div class="row  p-0">
                                    <div class="col-sm-3 align-content-center">
                                        <h4 class="text-black">NACE Career Readiness
                                            Level</h4>
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
                                        <a tabindex="0" href="#" data-bs-toggle="popover" data-bs-html="true"
                                            data-placement="right" data-trigger="focus"
                                            data-bs-content="<div class='btn btn-primary btn-sm popover-headings' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:#000!important'> Emerging Knowledge</div> <p class='mt-2 mb-2 text-black'>The student has an emerging awareness of the behavior, its importance, and related concepts.</p> <div class='btn btn-success btn-sm popover-headings' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:black'> Understanding </div> <p class='mt-2 mb-2 text-black'>The student demonstrates an understanding of the behavior and related concepts.</p> <div class='btn btn-warning btn-sm popover-headings' style='width:22%;margin:auto;font-size:14px;font-weight:bold;color:black'> Early Application</div><p class='mt-2 mb-2 text-black'>The student sometimes applies the behavior.</p> <div class='btn btn-sm btn-danger popover-headings' style='width:23%;margin:auto;font-size:10px;margin-right:5px!important;font-weight:bold;color:black'> Advanced Application</div><p class='mt-2 mb-2 text-black'>The behavior is consistent and integrated into the student’s workplace behaviors.</p>"
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
                            <?php 
                            $eval_pad = $competency_data['overall_career_readiness_results']['evaluator'] == null ? "" : "pt-0";
                            ?>
                            <div class="card-body <?=$eval_pad?> pe-0">
                                <?php 
                                if($competency_data["overall_career_readiness_results"]["evaluator"] != null){ 
                                    ?>
                                <div class="row p-0 mt-2">
                                    <div class="col-sm-12 p-0">
                                        <div class="d-flex float-end align-content-center">
                                            <div class="mt-1">
                                                <h5 class="font-size-14 text-black"> Evaluator Data</h5>
                                            </div>
                                            <div style="margin-left:5px">
                                                <div class="form-check form-switch" style="width:fit-content!important">
                                                    <input class="form-check-input bg-success" type="checkbox"
                                                        role="switch" id="evaluator_switch" onclick="eval_toggle()"
                                                        checked>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } 
                                
                                ?>
                                <div class="row align-items-center" style="padding-left: 12px;">
                                    <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                        style="width:23.5%;background-color:#323c48!important">
                                        <img class="img-fluid" src="./assets/images/ocr.png"
                                            style="height: 70px;width: 70px;margin: auto;">
                                        <h3 class="px-2 icon-text text-dark mb-0"
                                            style="color: white!important;font-size: 18px;font-weight: 700;">
                                            Overall Career Readiness
                                        </h3>
                                    </div>
                                    <div class="col-sm-9 mt-4 px-3">
                                        <?php
                                        $evaluator_value = intval(json_encode($competency_data["overall_career_readiness_results"]["evaluator"])); 
                                        if($competency_data["evaluator"])
                                        {
                                        ?>
                                        <div class="progress mb-3 bg-white evalu"
                                            style="margin-bottom:32px!important;margin-left:37px;">
                                            <div class="progress-bar animated-progress " role="progressbar"
                                                data-width="<?= $evaluator_value-6; ?>" aria-valuemin="0"
                                                aria-valuemax="100" style="max-width:86%;background-color:#000000">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                <?= $evaluator_value > 0 ? $evaluator_value : "" ?>
                                            </div>
                                            <?php 
                                            ?>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b> Evaluator </b>
                                            </p>
                                        </div>
                                        <?php } 

                                        $pre_value = intval(json_encode($competency_data["overall_career_readiness_results"]["pre"]));
                                         if($competency_data["pre"])
                                        {
                                            $pre_hide = $competency_data['overall_career_readiness_results']['evaluator'] == null ? "" : "display:none";
                                            $val = intval(json_encode($competency_data["overall_career_readiness_results"]["pre"]));
                                            $color = returnColor($val);
                                            $self_label = $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Pre" : "Self";
                                            $self_label = $GLOBALS["implementation_time"] == "general" ? "" : $self_label;
                                        ?>
                                        <div class="progress mb-3 pre-bar bg-white"
                                            style="margin-bottom:32px!important;margin-left:37px;<?=$pre_hide?>;">
                                            <div class="progress-bar animated-progress" role="progressbar"
                                                data-width="<?= $pre_value-6; ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="width:<?= $pre_value; ?>%;max-width:86%;background-color:<?=$color?>">
                                            </div>
                                            <div class="progress-value"
                                                style="font-size:16px;background-color:<?=$color?>">
                                                <?= $pre_value > 0 ? $pre_value : "" ?>
                                            </div>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b class="self_label pre-label">
                                                    <?= $self_label ?></b>
                                            </p>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <?php } 
                                        $post_value = intval(json_encode($competency_data["overall_career_readiness_results"]["post"]));
                                        if($competency_data["post"])
                                        {
                                            $color = returnColor($post_value);
                                            $self_label = $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Post" : "Self";
                                            $self_label = $GLOBALS["implementation_time"] == "general" ? "" : $self_label;
                                            ?>
                                        <div class="progress mb-3 post-bar bg-white"
                                            style="margin-bottom:32px!important;margin-left:37px;">
                                            <div class="progress-bar animated-progress" role="progressbar"
                                                data-width="<?= $post_value-6 ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="max-width:86%;background-color:<?=$color?>">
                                            </div>
                                            <div class="progress-value"
                                                style="font-size:16px;background-color:<?=$color?>">
                                                <?= $post_value > 0 ? $post_value : ""?>
                                            </div>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b class="self_label post-label">
                                                    <?=$self_label?></b>
                                            </p>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <?php } ?>
                                    </div>

                                    <!-- <div class="col-sm-1">
                                        <?php 
                                            if($evaluator_value >= 85)
                                            {
                                            ?>
                                        <p style="font-size:17px;margin-top:20px;color:black">
                                            <b class="self_label post-label">
                                                Evaluator </b>
                                        </p>
                                        <?php 
                                            }
                                            
                                            if($pre_value >= 85)
                                            {
                                                ?>
                                        <p style="font-size:18px;color:black;margin-bottom:32px">
                                            <b class="self_label pre-label">
                                                <?= $self_label ?> </b>
                                        </p>
                                        <?php }
                                        
                                            if($post_value >= 85)
                                            {
                                        ?>
                                        <p style="font-size:18px;color:black;margin-bottom:32px">
                                            <b class="self_label post-label">
                                                <?= $self_label ?> </b>
                                        </p>
                                        <?php }?>
                                    </div> -->

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

                                            <?= generate_competency_results($competency_data, "communication_results","#3ca4fe", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png","communication") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseZero" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseZero"
                                        data-bs-parent="#accordionFlushExample">
                                        <?= generate_competency($competency_data["communication"],"#3ca4fe"); ?>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                <p class="recommendations-headings" dir="ltr"><strong>Engage in Class
                                                        Discussions</strong></p>
                                                <p dir="ltr">💬 Actively participate in class discussions and group
                                                    projects. When possible, prepare insightful questions and
                                                    comments beforehand to contribute meaningfully to the
                                                    conversation. You will deepen your understanding of the subject
                                                    matter and improve your communication skills.</p>
                                                <p class="recommendations-headings" dir="ltr">
                                                    <strong><br></strong><strong>Be Mindful of Nonverbal
                                                        Communication</strong>
                                                </p>
                                                <p dir="ltr">👀 Pay attention to your body language, facial
                                                    expressions, and eye contact during interactions, as well as the
                                                    nonverbal communication of others. <a class="text-primary"
                                                        href="https://www.google.com/" target="_blank">Advance tip
                                                    </a>: mirror positive
                                                    nonverbal cues of others to show understanding and
                                                    attentiveness.</p>
                                                <p class="recommendations-headings" dir="ltr">
                                                    <strong><br></strong><strong>Prepare and Deliver
                                                        Presentations</strong>
                                                </p>
                                                <p dir="ltr">🎤 Volunteer to present in class, at meetings, or other
                                                    situations to practice your verbal and non-verbal communication
                                                    skills. By honing your presentation behaviors, you become a more
                                                    effective communicator.</p>
                                                <p class="recommendations-headings" dir="ltr">
                                                    <strong><br></strong><strong>Practice Active Listening
                                                        Skills</strong>
                                                </p>
                                                <p dir="ltr">👂Practice active listening during conversations by
                                                    giving your full attention to the speaker and genuinely engaging
                                                    with their message. Avoid interrupting and focus on
                                                    understanding their perspective before formulating a response.
                                                    Reflect back on what the speaker has said to demonstrate
                                                    comprehension and empathy. You will build strong relationships
                                                    when you consistently use active listening behaviors. </p>
                                                <p class="recommendations-headings" dir="ltr">
                                                    <strong><br></strong><strong>Talk to Professionals in
                                                        Career Roles that Interest You</strong>
                                                </p>
                                                <p dir="ltr">🕵🏼 Set up time to talk with professionals in careers
                                                    you're interested in to gain information. Utilize your school
                                                    resources and guidance from your career center to connect with
                                                    individuals in your desired field.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <?= generate_competency_results($competency_data, "teamwork_results","#E06B60", "Teamwork","./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png","teamwork") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseTwo"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["teamwork"], "#E06B60"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">

                                                    <p class="recommendations-headings" dir="ltr"><strong>Participate in
                                                            Study Groups</strong></p>
                                                    <p dir="ltr">👥 Collaborate with peers by creating or joining study
                                                        groups. </p>
                                                    <p class="recommendations-headings" dir="ltr">
                                                        <strong><br></strong><strong>Be Thoughtful About
                                                            Supporting Others</strong>
                                                    </p>
                                                    <p dir="ltr">🤝 In group and team settings, think about what you can
                                                        do or say to support your teammates.</p>
                                                    <p class="recommendations-headings" dir="ltr">
                                                        <strong><br></strong><strong>Join Relevant Communities
                                                            or Organizations</strong>
                                                    </p>
                                                    <p dir="ltr">🚀 If you currently do not have many opportunities to
                                                        work in groups, think about joining communities or organizations
                                                        related to your fields of interest. These experiences will
                                                        provide opportunities to practice your teamwork skills.</p>
                                                    <p class="recommendations-headings" dir="ltr">
                                                        <strong><br></strong><strong>Use Teamwork Apps</strong>
                                                    </p>
                                                    <p dir="ltr">📱For team projects, utilize collaboration tools like
                                                        Trello, Asana, or Slack to enhance your teamwork and
                                                        communication skills. These apps allow you to practice
                                                        organizing and managing group tasks. </p>
                                                    <p class="recommendations-headings" dir="ltr">
                                                        <strong><br></strong><strong>Participate in
                                                            Team-Building Exercises</strong>
                                                    </p>
                                                    <p dir="ltr">🎯 Take the lead or participate in team-building
                                                        exercises to strengthen your relationships with the people in
                                                        your group or on your team. Spending time with people on your
                                                        team in different environments can provide you the opportunity
                                                        to get to know each other better, which can make you a better
                                                        teammate.</p>
                                                    <p class="recommendations-headings" dir="ltr">
                                                        <strong><br></strong><strong>Participate in Team
                                                            Sports</strong>
                                                    </p>
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
                                            <?= generate_competency_results($competency_data, "self_development_results","#f8b603", "Career & Self Development","./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png","self_development") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseOne"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["self_development"],"#f8b603"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
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
                                            <?= generate_competency_results($competency_data, "professionalism_results","#609866", "Professionalism","./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png","professionalism") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseFour"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["professionalism"],"#609866"); ?>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">

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
                                            <?= generate_competency_results($competency_data, "leadership_results","#796258", "Leadership","./assets/images/nace-icons/nace-leadership-black-line-art-icon.png","leadership") ?>
                                        </button>
                                    </h2>
                                </div>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?= generate_competency($competency_data["leadership"],"#796258"); ?>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
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
                                            <?= generate_competency_results($competency_data, "critical_thinking_results","#705181", "Critical Thinking","./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png","critical_thinking") ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="flush-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseSix" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?= generate_competency($competency_data["critical_thinking"],"#705181"); ?>

                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
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
                                            <?= generate_competency_results($competency_data, "technology_results","#3c4b6c", "Technology","./assets/images/nace-icons/nace-technology-black-line-art-icon.png","technology") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseSeven"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["technology"],"#3c4b6c"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
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

                                <?php 
                                    if(isset($competency_data["equity"])){                                
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingEight">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseEight"
                                            aria-expanded="false" aria-controls="flush-collapseEight">
                                            <?= generate_competency_results($competency_data, "equity_results","#ad3131", "Equity & Inclusion","./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png","equity") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseEight" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseEight"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= isset($competency_data["equity"]) ? generate_competency($competency_data["equity"],"#ad3131") : "" ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
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
                                <?php } ?>
                            </div>
                        </div>

                        <!-- END layout-wrapper -->
                        <!-- end row -->

                        <hr style="opacity:1">
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
                        <script src="assets/js/pages/index.init.js"></script>
                        <script src="assets/js/app.js"></script>
                        <!-- materialdesign icon js-->
                        <script src="assets/js/pages/materialdesign.init.js"></script>

                        <script>
                        function eval_toggle() {
                            // $(".evalu").hide()
                            if (document.getElementById('evaluator_switch').checked) {
                                $(".evalu").show();
                                $(".pre-bar").hide();
                                // $(".post-bar").hide();
                                $(".pre-label").html("Self");
                                $(".post-label").html("Self");
                            } else {
                                $(".pre-bar").show();
                                $(".post-bar").show();
                                $(".evalu").hide();
                                $(".pre-label").html("Pre");
                                $(".post-label").html("Post");
                            }
                        }

                        document.addEventListener("DOMContentLoaded", () => {
                            const progressBars = document.querySelectorAll('.animated-progress');
                            progressBars.forEach(bar => {
                                const targetWidth = bar.getAttribute('data-width');
                                bar.style.setProperty('--progress-width', `${targetWidth}%`);
                            });
                        });

                        function printDiv(divName) {
                            var printContents = document.getElementById(divName).innerHTML;
                            var originalContents = document.body.innerHTML;

                            document.body.innerHTML = printContents;

                            window.print();

                            document.body.innerHTML = originalContents;
                        }
                        </script>

                        <!-- apexcharts init -->
                        <!-- <script src="assets/js/pages/apexcharts.init.js"></script> -->
</body>

</html>