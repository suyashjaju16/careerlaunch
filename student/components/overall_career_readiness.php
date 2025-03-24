<div class="card">
    <?php 
    $eval_pad = $competency_data['overall_career_readiness_results']['evaluator'] == null ? "" : "pt-0";
    ?>
    <div class="card-body py-md-4 pt-0 pb-4 overall-career-readiness-card">

        <div class="row align-items-center" >

            <div class="col-md-3 col-12 ">
                <div class="d-flex flex-row flex-md-column align-items-center justify-content-center px-2 py-3 mobile-competency-name"
                    style="background-color: #323c48; border-radius: 20px;">

                    <img class="img-fluid" src="./assets/images/ocr.png">

                    <h4 class="ms-2 ms-md-0 mt-md-2 mb-0 text-white text-wrap text-center fw-bold fs-5">Overall Career Readiness</h4>
                </div>
            </div>

            <div class="col-md-8 col-12 pt-md-0 pt-4 pb-3" id="progress-bars-container">

                <?php
                    $firstBar = true;
                    $attached = true;
                    $evaluator_value = intval(json_encode($competency_data["overall_career_readiness_results"]["evaluator"])); 
                    $pre_value = intval(json_encode($competency_data["overall_career_readiness_results"]["pre"]));
                    $post_value = intval(json_encode($competency_data["overall_career_readiness_results"]["post"]));

                    function renderProgressBar($condition, $value, $label, &$firstBar, $true_label = "self") {
                        if($condition) {
                            echo "<div class='$true_label-data mt-1'>";
                            if($firstBar) {
                                echo "<h5 class='text-dark fs-5 mb-3 fw-bold $true_label-label'>{$label}</h5>";
                                echo "<div class='progress bg-white position-relative'>";
                            } else {
                                echo "<div class='progress bg-white position-relative'>";
                            }

                            echo "<div class='progress-bar animated-progress' data-width='{$value}' role='progressbar' style='width:{$value}%; background-color:".returnColor($value, $true_label).";'></div>";
                            echo "<div class='progress-value mobile-circle' style='background-color:".returnColor($value, $true_label).";'>{$value}</div>";
                            echo "</div>";

                            echo "</div>";
                        }
                    }

                    renderProgressBar($competency_data["evaluator"], $evaluator_value, "Evaluator", $firstBar, "evaluator");
                    renderProgressBar($competency_data["pre"], $pre_value, $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Pre" : "Self", $firstBar, "pre");
                    renderProgressBar($competency_data["post"], $post_value, $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Post" : "Self", $firstBar, "post");
                ?>
            </div>

        </div>

        <?php 
        if($competency_data["overall_career_readiness_results"]["evaluator"] != null){ 
            ?>
        <div class="row p-0 m-0 evaluator-switch">
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

    </div>
</div>