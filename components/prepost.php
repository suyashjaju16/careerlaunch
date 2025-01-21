 <?php 
// include("./models/config.php");
// include("./models/prepost/competency.php");

function roundOffValues($apiResponse, $precision = 2) {
    // Decode JSON if it's a string
    if (is_string($apiResponse)) {
        $apiResponse = json_decode($apiResponse, true);
    }

    // Check if decoding was successful
    if (!is_array($apiResponse)) {
        throw new Exception("Invalid JSON input");
    }

    // Recursive function to round off all values
    $roundValues = function (&$data) use (&$roundValues, $precision) {
        foreach ($data as $key => &$value) {
            if (is_array($value)) {
                // If value is an array, apply rounding recursively
                $roundValues($value);
            } elseif (is_numeric($value)) {
                // Round off numerical values
                $value = round($value);
            }
        }
    };

    $roundValues($apiResponse);
    return $apiResponse;
}

function restructureJson($apiResponse) {
    // Decode JSON if it's a string
    if (is_string($apiResponse)) {
        $apiResponse = json_decode($apiResponse, true);
    }

    // Check if decoding was successful
    if (!is_array($apiResponse)) {
        throw new Exception("Invalid JSON input");
    }

    $restructured = [];

    foreach ($apiResponse as $category => $skills) {
        $restructured[$category] = [];

        foreach ($skills as $skillName => $values) {
            // Initialize the skill with 'pre' and 'post' keys
            $restructured[$category][$skillName] = [
                'pre' => null,
                'post' => null,
            ];

            foreach ($values as $value) {
                if (isset($value['post'])) {
                    $restructured[$category][$skillName]['post'] = round($value['post']);
                }
                if (isset($value['pre'])) {
                    $restructured[$category][$skillName]['pre'] = round($value['pre']);
                }
            }
        }
    }

    return $restructured;
}


$prepost_comp_data = roundOffValues(fetch_data(API_PREPOST_ENDPOINT,$data));
$prepost_data = restructureJson(fetch_data(API_PREPOST_QUESTIONS_ENDPOINT,$data));
?>

 <div class="row sticky-top">
     <div class="col-sm-12 px-0">
         <div class="card">
             <div class="card-body py-1">

                 <div class="row  p-0">
                     <div class="col-sm-3 align-content-center">
                         <h3>Career Readiness Level</h3>
                     </div>
                     <div class="col-sm-8">
                         <div class="d-flex justify-content-around p-2 mt-3" style="margin-left:30px!important">
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
                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="width:<?= json_encode($prepost_comp_data['overall_career_readiness_results']['pre']); ?>%">
                             </div>
                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                 <?= json_encode($prepost_comp_data['overall_career_readiness_results']['pre']); ?>
                             </div>
                             <p style="margin-top:-11px;position:relative;left:2%;font-size:18px;color:black">
                                 <b>Pre</b>
                             </p>
                             <!-- /.progress-bar .progress-bar-danger -->
                         </div><!-- /.progress .no-rounded -->


                         <div class="mt-4">
                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                 <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" value="80"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:<?= json_encode($prepost_comp_data['overall_career_readiness_results']['post']); ?>%">
                                 </div>
                                 <div class="progress-value bg-warning" style="font-size:16px">
                                     <?= json_encode($prepost_comp_data['overall_career_readiness_results']['post']); ?>
                                 </div>
                                 <p style="position:relative;margin-top:-11px;left:2%;font-size:18px;color:black">
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseZero" aria-expanded="false" aria-controls="flush-collapseZero">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-info align-content-center">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-communication-black-line-art-icon.png"
                                     style="height: 70px;width: 70px;margin: auto;">
                                 <h3 class="px-2 icon-text text-dark mb-0"
                                     style="color: white!important;font-size: 18px;font-weight: 700;">
                                     Communication </h3>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar"
                                         aria-valuenow="<?= json_encode($prepost_comp_data['communication_results']['pre']); ?>"
                                         value="<?= json_encode($prepost_comp_data['communication_results']['pre']); ?>"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['communication_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value" style="background-color:#000;font-size:16px">
                                         <?= json_encode($prepost_comp_data['communication_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar bg-info" role="progressbar"
                                             aria-valuenow="<?= json_encode($prepost_comp_data['communication_results']['post']); ?>"
                                             value="<?= json_encode($prepost_comp_data['communication_results']['post']); ?>"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['communication_results']['post']); ?>%">
                                         </div>
                                         <div class="progress-value bg-info" style="font-size:16px">
                                             <?= json_encode($prepost_comp_data['communication_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseZero" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseZero" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Oral
                                             Communication
                                             <!-- <?= json_encode($prepost_data['communication']['Oral Communication']['pre']); ?> -->
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['communication']['Oral Communication']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['communication']['Oral Communication']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['communication']['Oral Communication']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-info" style="font-size:16px">
                                                     <?= json_encode($prepost_data['communication']['Oral Communication']['post']);?>
                                                 </div>
                                                 <!-- /.progress-bar .progress-bar-danger -->
                                             </div><!-- /.progress .no-rounded -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Written
                                             Communication
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['communication']['Written Communication']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['communication']['Written Communication']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['communication']['Written Communication']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-info" style="font-size:16px">
                                                     <?= json_encode($prepost_data['communication']['Written Communication']['post']);?>
                                                 </div>
                                                 <!-- /.progress-bar .progress-bar-danger -->
                                             </div><!-- /.progress .no-rounded -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Non-verbal
                                             Communication
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['communication']['Non-verbal Communication']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['communication']['Non-verbal Communication']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['communication']['Non-verbal Communication']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-info" style="font-size:16px">
                                                     <?= json_encode($prepost_data['communication']['Non-verbal Communication']['post']);?>
                                                 </div>
                                                 <!-- /.progress-bar .progress-bar-danger -->
                                             </div><!-- /.progress .no-rounded -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Active
                                             Listening
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['communication']['Active Listening']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['communication']['Active Listening']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['communication']['Active Listening']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-info" style="font-size:16px">
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color: #E06B60;">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png"
                                     style="height: 70px;width: 70px;margin: auto;">
                                 <h3 class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                     Teamwork </h3>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['teamwork_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value" style="background-color:#000;font-size:16px">
                                         <?= json_encode($prepost_comp_data['teamwork_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar " role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['teamwork_results']['post']); ?>%;background-color: #E06B60">
                                         </div>
                                         <div class="progress-value" style="font-size:16px;background-color: #E06B60">
                                             <?= json_encode($prepost_comp_data['teamwork_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseTwo" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseTwo" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Build
                                             Relationships for Collaboration
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['teamwork']['Build Relationships for Collaboration']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar " role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Respect
                                             Diverse Perspectives
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['teamwork']['Respect Diverse Perspectives']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Integrate
                                             Strengths
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['teamwork']['Integrate Strengths']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['teamwork']['Integrate Strengths']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                         <div class="row align-items-center p-0 w-100">
                             <div
                                 class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-warning align-content-center">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                     style="height: 70px;width: 70px;margin: auto;">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Career & Self Development </h5>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['self_development_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value" style="background-color:#000;font-size:16px">
                                         <?= json_encode($prepost_comp_data['self_development_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['self_development_results']['post']); ?>%">
                                         </div>
                                         <div class="progress-value bg-warning" style="font-size:16px">
                                             <?= json_encode($prepost_comp_data['self_development_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseOne" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseOne" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Awareness of
                                             Strengths & Challenges
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-warning " role="progressbar"
                                                     aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-warning" style="font-size:16px">
                                                     <?= json_encode($prepost_data['self_development']['Awareness of Strengths & Challenges']['post']);?>
                                                 </div>
                                                 <!-- /.progress-bar .progress-bar-danger -->
                                             </div><!-- /.progress .no-rounded -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
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
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['self_development']['Professional Development']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['self_development']['Professional Development']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white"
                                                 style="width: 95%; margin: auto; margin-left: 5%;">
                                                 <div class="progress-bar bg-warning " role="progressbar"
                                                     aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['self_development']['Professional Development']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-warning" style="font-size:16px">
                                                     <?= json_encode($prepost_data['self_development']['Professional Development']['post']);?>
                                                 </div>
                                                 <!-- /.progress-bar .progress-bar-danger -->
                                             </div><!-- /.progress .no-rounded -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Networking
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['self_development']['Networking']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['self_development']['Networking']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar bg-warning " role="progressbar"
                                                     aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:<?= json_encode($prepost_data['self_development']['Networking']['post']);?>%">
                                                 </div>
                                                 <div class="progress-value bg-warning" style="font-size:16px">
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color:#609866">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png"
                                     style="height: 60px;width: 60px;margin: auto;;margin-bottom:6px">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Professionalism </h5>
                             </div>
                             <div class="col-sm-8 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['professionalism_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value"
                                         style="background-color:#000;left:<?= json_encode($prepost_comp_data['professionalism_results']['pre']); ?>%;font-size:16px">
                                         <?= json_encode($prepost_comp_data['professionalism_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['professionalism_results']['post']); ?>%;background-color:#609866">
                                         </div>
                                         <div class="progress-value"
                                             style="left:<?= json_encode($prepost_comp_data['professionalism_results']['post']); ?>%;font-size:16px;background-color:#609866">
                                             <?= json_encode($prepost_comp_data['professionalism_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseFour" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseFour" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Act With
                                             Integrity
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['professionalism']['Act With Integrity']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['professionalism']['Act With Integrity']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Demonstrate
                                             Dependability
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['professionalism']['Demonstrate Dependability']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Achieve Goals
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['professionalism']['Achieve Goals']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['professionalism']['Achieve Goals']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color:#796258">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-leadership-black-line-art-icon.png"
                                     style="height: 60px;width: 60px;margin: auto;;margin-bottom:6px">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Leadership </h5>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['leadership_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value"
                                         style="background-color:#000;left:<?= json_encode($prepost_comp_data['leadership_results']['pre']); ?>%;font-size:16px">
                                         <?= json_encode($prepost_comp_data['leadership_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['leadership_results']['post']); ?>%;background-color:#796258">
                                         </div>
                                         <div class="progress-value"
                                             style="left:<?= json_encode($prepost_comp_data['leadership_results']['post']); ?>%;font-size:16px;background-color:#796258">
                                             <?= json_encode($prepost_comp_data['leadership_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
             </div>
             <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseFive"
                 data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 text-center mb-0 align-content-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Inspire, Persuade,
                                         & Motivate
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['leadership']['Inspire, Persuade, & Motivate']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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

                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 text-center mb-0 align-content-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Engage Various
                                         Resources & Seek Feedback
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['leadership']['Engage Various Resources & Seek Feedback']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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
                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 mb-0 text-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Facilitate Group
                                         Dynamics
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['leadership']['Facilitate Group Dynamics']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color:#705181">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png"
                                     style="height: 70px;width: 70px;margin: auto;">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Critical Thinking </h5>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value"
                                         style="background-color:#000;left:<?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>%;font-size:16px">
                                         <?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>%;background-color:#705181">
                                         </div>
                                         <div class="progress-value"
                                             style="left:<?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>%;font-size:16px;background-color:#705181">
                                             <?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
             </div>

             <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseSix"
                 data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 text-center mb-0 align-content-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Display
                                         Situational Awareness
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['critical_thinking']['Display Situational Awareness']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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

                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 text-center mb-0 align-content-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Gather & Analyze
                                         Data
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['critical_thinking']['Gather & Analyze Data']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar " role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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
                     <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                         <div class="card-body">
                             <div class="row w-100 align-items-center">
                                 <div class="col-sm-3 mb-0 text-center">
                                     <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                         Make Effective &
                                         Fair Decisions
                                     </p>
                                 </div>
                                 <div class="col-sm-8 mt-4">
                                     <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                         <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                             value="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['pre']);?>%">
                                         </div>
                                         <div class="progress-value" style="background-color:#000;font-size:16px">
                                             <?= json_encode($prepost_data['critical_thinking']['Make Effective & Fair Decisions']['pre']);?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                     <div class="mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                 aria-valuemin="0" aria-valuemax="100"
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseSeven" aria-expanded="false"
                         aria-controls="flush-collapseSeven">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color:#3c4b6c">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-technology-black-line-art-icon.png"
                                     style="height: 70px;width: 70px;margin: auto;">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Technology </h5>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value"
                                         style="background-color:#000;left:<?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>%;font-size:16px">
                                         <?= json_encode($prepost_comp_data['critical_thinking_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>%;background-color:#3c4b6c">
                                         </div>
                                         <div class="progress-value"
                                             style="left:<?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>%;font-size:16px;background-color:#3c4b6c">
                                             <?= json_encode($prepost_comp_data['critical_thinking_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseSeven" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseSeven" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Leverage
                                             Technology
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['technology']['Leverage Technology']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['technology']['Leverage Technology']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Adapt to New
                                             Technologies
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['technology']['Adapt to New Technologies']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['technology']['Adapt to New Technologies']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Use Technology
                                             Ethically
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['technology']['Use Technology Ethically']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['technology']['Use Technology Ethically']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseEight" aria-expanded="false"
                         aria-controls="flush-collapseEight">
                         <div class="row align-items-center p-0 w-100">
                             <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                 style="background-color:#ad3131">
                                 <img class="img-fluid"
                                     src="./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png"
                                     style="height: 60px;width: 60px;margin: auto;margin-bottom:6px">
                                 <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                     Equity & Inclusion </h5>
                             </div>
                             <div class="col-sm-9 p-3" style="margin-top:20px;">
                                 <div class="progress mb-3 bg-white" style="width: 95%; margin: auto; margin-left: 5%;">
                                     <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?= json_encode($prepost_comp_data['equity_results']['pre']); ?>%">
                                     </div>
                                     <div class="progress-value"
                                         style="background-color:#000;left:<?= json_encode($prepost_comp_data['equity_results']['pre']); ?>%;font-size:16px">
                                         <?= json_encode($prepost_comp_data['equity_results']['pre']); ?>
                                     </div>
                                     <!-- /.progress-bar .progress-bar-danger -->
                                 </div><!-- /.progress .no-rounded -->
                                 <div style="margin-top:35px">
                                     <div class="progress mb-3 bg-white"
                                         style="width: 95%; margin: auto; margin-left: 5%;">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?= json_encode($prepost_comp_data['equity_results']['post']); ?>%;background-color:#ad3131">
                                         </div>
                                         <div class="progress-value" style="font-size:16px;background-color:#ad3131">
                                             <?= json_encode($prepost_comp_data['equity_results']['post']); ?>
                                         </div>
                                         <!-- /.progress-bar .progress-bar-danger -->
                                     </div><!-- /.progress .no-rounded -->
                                 </div>
                             </div>
                         </div>
                     </button>
                 </h2>
                 <div id="flush-collapseEight" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseEight" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Engage
                                             Multiple Perspectives
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['equity']['Engage Multiple Perspectives']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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

                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 text-center mb-0 align-content-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Use Inclusive
                                             & Equitable Practices
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['equity']['Use Inclusive & Equitable Practices']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
                         <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                             <div class="card-body">
                                 <div class="row w-100 align-items-center">
                                     <div class="col-sm-3 mb-0 text-center">
                                         <p class="px-2 icon-text text-dark mb-0"
                                             style="font-size: 18px;font-weight: 700;">Advocate
                                         </p>
                                     </div>
                                     <div class="col-sm-8 mt-4">
                                         <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                 value="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:<?= json_encode($prepost_data['equity']['Advocate']['pre']);?>%">
                                             </div>
                                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                                 <?= json_encode($prepost_data['equity']['Advocate']['pre']);?>
                                             </div>
                                             <!-- /.progress-bar .progress-bar-danger -->
                                         </div><!-- /.progress .no-rounded -->
                                         <div class="mt-4">
                                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                 <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     value="80" aria-valuemin="0" aria-valuemax="100"
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
         <h2 class="accordion-header bg-white pt-4 px-4" id="headingDemographics">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                 data-bs-target="#collapseDemographics" aria-expanded="false" aria-controls="collapseDemographics">
                 <h3> Demographics </h3>
             </button>
         </h2>
         <div id="collapseDemographics" class="accordion-collapse collapse" aria-labelledby="headingDemographics"
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
                                         <div id="bar_chart2" class="apex-charts" dir="ltr" style="height:370px">
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
                                             <table class="table table-striped" style="text-align:left!important">
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
                                         <div id="bar_chart4" class="apex-charts" dir="ltr" style="height:370px">
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
                                         <div id="bar_chart5" class="apex-charts" dir="ltr" style="height:395px">
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
                                         <div id="bar_chart6" class="apex-charts" dir="ltr" style="height:390px">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="card p-3 border-2">
                                     <div class="card-body px-3 py-3">
                                         <h6 class="pie-text"> Do you have a diagnosed disability?
                                         </h6>
                                         <div id="chart7" class="apex-charts" dir="ltr" style="height:370px">
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
                                         <div id="chart8" class="apex-charts" dir="ltr" style="height:370px">
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
                                         <div id="chart9" class="apex-charts" dir="ltr" style="height:370px">
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
                                         <div id="chart10" class="apex-charts" dir="ltr" style="height:370px"></div>
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
                                         <div id="chart13" class="apex-charts" dir="ltr" style="height:390px"></div>
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
                                         <div id="chart12" class="apex-charts" dir="ltr" style="height:370px"></div>
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
                                         <div id="chart14" class="apex-charts" dir="ltr" style="height:410px"></div>
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
                                                 <div id="chart15" class="apex-charts" dir="ltr" style="height:390px">
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
                                                             <th scope="row" style="color:black!important;">1
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