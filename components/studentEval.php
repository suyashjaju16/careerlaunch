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
                'evaluator' => null,
                'student' => null,
            ];

            foreach ($values as $value) {
                if (isset($value['evaluator'])) {
                    $restructured[$category][$skillName]['evaluator'] = round($value['evaluator']);
                }
                if (isset($value['student'])) {
                    $restructured[$category][$skillName]['student'] = round($value['student']);
                }
            }
        }
    }

    return $restructured;
}

function returnLevel($level) {
    return isset($level) ? 
        ($level == "Not Observed" ? "0" : 
        ($level == "Emerging" ? "10.5" : 
        ($level == "Understanding" ? "35.5" : 
        ($level == "Early" ? "60" : "85.5")))) : null;
}


$prepost_comp_data = roundOffValues(fetch_data(API_STUDENT_EVAL_ENDPOINT,$data));
$prepost_data = restructureJson(fetch_data(API_STUDENT_EVAL_QUESTIONS_ENDPOINT,$data));


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
                    if(isset($value["evaluator"]) && $value["evaluator"] != null){
                    echo '<div class="progress pre-bar mb-3 bg-white" style="width:90%;margin-bottom:32px!important;margin:auto;">
                        <div class="progress-bar animated-progress bg-dark" role="progressbar"
                            data-width="'.$value['evaluator'].'" aria-valuemin="0" aria-valuemax="100"
                            style="max-width:90%;background-color:'.$color.'">
                        </div>
                        <div class="progress-value bg-dark" style="font-size:16px">
                         <b>'.$value["evaluator"].'</b>
                        </div>
                    </div>';
                    }
                    if(isset($value["student"]) && $value["student"] != null){
                    echo '<div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                        <div class="progress-bar animated-progress" role="progressbar"
                            data-width="'.$value['student'].'" aria-valuemin="0" aria-valuemax="100"
                            style="max-width:90%;background-color:'.$color.'">
                        </div>
                        <div class="progress-value" style="background-color:'.$color.';font-size:16px">
                        <b>'.$value["student"].'</b>
                        </div>
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
    // echo json_encode($competency_data);
    if(isset($competency_data[$competency])){
    echo '<div class="row align-items-center p-0 w-100">
        <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
            style="background-color:'.$color.'!important">
            <img class="img-fluid" src="'.$icon.'" style="height: 70px;width: 70px;margin: auto;">
            <h3 class="px-2 icon-text text-dark mb-0" style="color: white!important;font-size: 18px;font-weight: 700;">
                '.$label.'
            </h3>
        </div>
        <div class="col-sm-9 p-3" style="margin-top:20px;">';
         
                $value = intval(json_encode($competency_data[$competency]["evaluator"]));
            // echo $self_label;
            echo '<div class="progress px-3 pre-bar mb-3 bg-white" style="margin-bottom:32px!important;margin-left:20px;">
                <div class="progress-bar animated-progress bg-dark" role="progressbar"
                    data-width="'.(intval(json_encode($competency_data[$competency]["evaluator"]))-3).'" aria-valuemin="0"
                    aria-valuemax="100" style="background-color:'.$color.'">
                </div>
                <div class="progress-value bg-dark" style="font-size:16px;background-color:'.$color.'">
                    '.$value.'
                </div>
            </div>';
          
                $value = intval(json_encode($competency_data[$competency]["student"]));
            echo '<div class="progress px-3 post-bar bg-white" style="margin-bottom:32px!important;margin-left:20px">
                <div class="progress-bar animated-progress" role="progressbar"
                    data-width="'.(intval(json_encode($competency_data[$competency]["student"]))-3).'" aria-valuemin="0"
                    aria-valuemax="100" style="background-color:'.$color.'">
                </div>
                <div class="progress-value" style="background-color:'.$color.';font-size:16px">
                    '.$value.'
                </div>
            </div>';
            
            echo '</div>
    </div>';
    }
    }
?>

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
                                <div class="btn btn-primary disable-events "
                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                    Emerging
                                    Knowledge</div>

                                <div class="btn btn-success disable-events "
                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                    Understanding
                                </div>

                                <div class="btn btn-warning disable-events "
                                    style="width:22%;margin:auto;font-size:14px;font-weight:bold;color:black">
                                    Early
                                    Application</div>

                                <div class="btn btn-danger disable-events "
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
                         <div class="progress bg-white" style="width:90%;margin:auto;margin-bottom:32px!important">
                             <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="width:<?= json_encode($prepost_comp_data['overall_career_readiness_results']['evaluator']); ?>%">
                             </div>
                             <div class="progress-value" style="background-color:#000;font-size:16px">
                                 <?= json_encode($prepost_comp_data['overall_career_readiness_results']['evaluator']); ?>
                             </div>
                             <p style="margin-top:-11px;position:relative;left:2%;font-size:18px;color:black">
                                 <b>Evaluator</b>
                             </p>
                             <!-- /.progress-bar .progress-bar-danger -->
                         </div><!-- /.progress .no-rounded -->


                         <div class="mt-4">
                             <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                 <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" value="80"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:<?= json_encode($prepost_comp_data['overall_career_readiness_results']['student']); ?>%">
                                 </div>
                                 <div class="progress-value bg-warning" style="font-size:16px">
                                     <?= json_encode($prepost_comp_data['overall_career_readiness_results']['student']); ?>
                                 </div>
                                 <p style="position:relative;margin-top:-11px;left:2%;font-size:18px;color:black">
                                     <b>Student</b>
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
                         <?= generate_competency_results($prepost_comp_data, "communication_results","#3ca4fe", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png","communication") ?>

                     </button>
                 </h2>
                 <div id="flush-collapseZero" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseZero" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= generate_competency($prepost_data["communication"],"#3ca4fe"); ?>
                     </div>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingTwo">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                         <?= generate_competency_results($prepost_comp_data, "teamwork_results","#E06B60", "Teamwork","./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png","teamwork") ?>
                     </button>
                 </h2>
                 <div id="flush-collapseTwo" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseTwo" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= generate_competency($prepost_data["teamwork"], "#E06B60"); ?>
                     </div>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingOne">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                         <?= generate_competency_results($prepost_comp_data, "self_development_results","#f8b603", "Career & Self Development","./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png","self_development") ?>
                     </button>
                 </h2>
                 <div id="flush-collapseOne" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseOne" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= generate_competency($prepost_data["self_development"],"#f8b603"); ?>
                     </div>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingFour">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                         <?= generate_competency_results($prepost_comp_data, "professionalism_results","#609866", "Professionalism","./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png","professionalism") ?>
                     </button>
                 </h2>
                 <div id="flush-collapseFour" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseFour" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= generate_competency($prepost_data["professionalism"],"#609866"); ?>
                     </div>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingFive">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                         <?= generate_competency_results($prepost_comp_data, "leadership_results","#796258", "Leadership","./assets/images/nace-icons/nace-leadership-black-line-art-icon.png","leadership") ?>
                     </button>
                 </h2>
             </div>
             <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseFive"
                 data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                 <?= generate_competency($prepost_data["leadership"],"#796258"); ?>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingSix">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                         <?= generate_competency_results($prepost_comp_data, "critical_thinking_results","#705181", "Critical Thinking","./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png","critical_thinking") ?>
                     </button>
                 </h2>
             </div>

             <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseSix"
                 data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                 <?= generate_competency($prepost_data["critical_thinking"],"#705181"); ?>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingSeven">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseSeven" aria-expanded="false"
                         aria-controls="flush-collapseSeven">
                         <?= generate_competency_results($prepost_comp_data, "technology_results","#3c4b6c", "Technology","./assets/images/nace-icons/nace-technology-black-line-art-icon.png","technology") ?>
                     </button>
                 </h2>
                 <div id="flush-collapseSeven" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseSeven" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= generate_competency($prepost_data["technology"],"#3c4b6c"); ?>
                     </div>
                 </div>
             </div>

             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingEight">
                     <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                         data-bs-target="#flush-collapseEight" aria-expanded="false"
                         aria-controls="flush-collapseEight">
                         <?= generate_competency_results($prepost_comp_data, "equity_results","#ad3131", "Equity & Inclusion","./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png","equity") ?>
                     </button>
                 </h2>
                 <div id="flush-collapseEight" class="accordion-collapse collapse"
                     aria-labelledby="flush-flush-collapseEight" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                     <?= isset($prepost_data["equity"]) ? generate_competency($prepost_data["equity"],"#ad3131") : "" ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- end row -->
 <script> 
     document.addEventListener("DOMContentLoaded", () => {
        const progressBars = document.querySelectorAll('.animated-progress');
        progressBars.forEach(bar => {
            const targetWidth = bar.getAttribute('data-width');
            bar.style.setProperty('--progress-width', `${targetWidth}%`);
        });
    });

 </script>