<?php 
function fetch_data($url, $data) {
    $ch = curl_init($url);
    $payload = json_encode($data);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    // echo json_encode($response);
}

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

function generate_competency($level,$color) {
    if(isset($level)){
    foreach($level as $key => $value)
    {
    echo '
        <div class="card-body competency py-0">
            <div class="row align-items-center py-2 py-md-3">
                <div class="col-md-3 col-12 text-center text-md-left d-flex align-items-center justify-content-between">
                    <p class="text-dark mb-0 py-1 px-0 p-md-2 fw-bold">'.$key.'
                    </p>
                </div>
                <div class="col-md-8 col-12 py-3">';
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
                    echo '<div class="progress pre-bar bg-white" style="'.$pre_hide.'">
                            <div class="progress-bar animated-progress" role="progressbar"
                                data-width="'.returnLevel($value['pre']).'" aria-valuemin="0" aria-valuemax="100"
                                style="width:'.returnLevel($value['pre']).'%;max-width:100%;background-color:'.$color.'">
                            </div>
                            <div class="progress-value mobile-circle"
                                style="background-color:'.$color.'">
                                '.$pre_value.'
                            </div>
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
        </div>';
    }
    }
    }
    
    function generate_competency_results($competency_data, $competency, $color, $label, $icon, $competency_tag) {
        if (isset($competency_data[$competency_tag])) {
            echo '
                <div class="col-md-3 col-12">
                    <div class="d-flex flex-row flex-md-column align-items-center justify-content-center p-2 mobile-competency-name" style="background-color:'.$color.';border-radius: 20px;">
                        <img class="img-fluid me-2" src="'.$icon.'" style="height:40px;width:40px;">
                        <span class="ms-2 ms-md-0 mt-md-2 mb-0 text-white text-wrap text-break text-center fw-bold">'.$label.'</span>
                    </div>
                </div>
                <div class="col-md-8 col-12 py-5">
            ';
    
            if (!empty($competency_data["evaluator"])) {
                $evaluator_value = intval($competency_data[$competency]["evaluator"]);
                echo '
                    <div class="progress position-relative" style="height:8px;">
                        <div class="progress-bar bg-dark" role="progressbar" style="width:'.$evaluator_value.'%;" aria-valuenow="'.$evaluator_value.'" aria-valuemin="0" aria-valuemax="100"></div>
                        <span class="position-absolute top-50 translate-middle-y badge bg-dark rounded-pill" style="right:'.(100 - $evaluator_value).'%;font-size:12px;">
                            '.$evaluator_value.'
                        </span>
                    </div>
                ';
            }
    
            if (!empty($competency_data["pre"])) {
                $pre_value = intval($competency_data[$competency]["pre"]);
                echo '
                    <div class="progress pre-bar bg-white">
                        <div class="progress-bar animated-progress" role="progressbar" data-width="'.$pre_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$pre_value.'%;background-color:'.$color.'; max-width: 100%" ></div>
                        <div class="progress-value mobile-circle" style="background-color:'.$color.';">
                            '.$pre_value.'
                        </div>
                    </div>
                ';
            }
    
            if (!empty($competency_data["post"])) {
                $post_value = intval($competency_data[$competency]["post"]);
                echo '
                    <div class="progress position-relative mt-3" style="height:8px;">
                        <div class="progress-bar" role="progressbar" style="width:'.$post_value.'%;background-color:'.$color.';" aria-valuenow="'.$post_value.'" aria-valuemin="0" aria-valuemax="100"></div>
                        <span class="position-absolute top-50 translate-middle-y badge rounded-pill text-white" style="right:'.(100 - $post_value).'%;background-color:'.$color.';font-size:12px;">
                            '.$post_value.'
                        </span>
                    </div>
                ';
            }
    
            echo '
            </div>';
        }
    }
    
?>