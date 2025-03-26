<?php 
function fetch_data($url, $data, $type="POST") {
    $ch = curl_init($url);
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    // echo json_encode($response);
}

function extractIdFromUrl($url) {
    $pattern = "/\/([a-f0-9\-]+)\/logo\//";
    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    }
    return null;
}

function createRecommendationsJson($id) {
    $jsondata = new stdClass();
    $jsondata->filters = new stdClass();
    $jsondata->filters->organization_id = $id;

    return $jsondata;
}

function fetchRecommendations($url) {
    $json = file_get_contents($url);
    if ($json === false) {
        return ['error' => 'Unable to fetch data'];
    }

    $data = json_decode($json, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => 'Invalid JSON format'];
    }

    return $data;
}

function verifyLevel($data, $category, $subCategory, $key) {
    return isset($data[$category][$subCategory][$key]) ? 
        ($data[$category][$subCategory][$key] == "1" ? 10.5 : 
        ($data[$category][$subCategory][$key] == "2" ? 35.5 : 
        ($data[$category][$subCategory][$key] == "3" ? 65.5 : 85.5))) : null;
}

function returnColor($val, $true_label = "self" ) {
    if($true_label == "evaluator") {
        return "#000";
    }
    return ($val <= 25) ? "#01a2b2" : (($val <= 50) ? "#66d202" : (($val <= 75) ? "#ffb601" : "#e66060"));
}

function returnLevel($level) {
    return isset($level) ? 
        ($level == "Not Observed" ? "0" : 
        ($level == "Emerging" ? "0" : 
        ($level == "Understanding" ? "33" : 
        ($level == "Early" ? "67" : "100")))) : null;
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

function generate_competency($level,$competency_label) {
    $post_color_suffix = "post";
    if(isset($level)){
    foreach($level as $key => $value)
    {
        
        echo '
        <div class="card-body competency py-0">
            <div class="row align-items-center py-2 py-md-3">
                <div class="col-md-3 col-12 text-center text-md-left d-flex align-items-center justify-content-center">
                    <div class="text-dark mb-0 pt-2 pb-3 px-0 p-md-2 fw-bolder fs-5">'.$key.'
                    </div>
                </div>
                <div class="col-md-8 col-12 py-3">';

        if (!empty($value["evaluator"])) {
            $evaluator_value = returnLevel($value["evaluator"]);
            $opacityClass = ($value["evaluator"] === "Not Observed") ? "opacity-50" : ""; 
            $opacityClassProgressBar = ($value["evaluator"] === "Not Observed") ? "opacity-0" : "";
            echo '
                    <div class="progress evaluator-data bg-white bar-data w-100">
                        <div class="progress-bar animated-progress '.$opacityClassProgressBar.'" role="progressbar" data-width="'.$evaluator_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$evaluator_value.'%; "></div>
                        <div class="progress-value mobile-circle '.$opacityClass.'" ></div>
                        <div class="progress-label fs-6 fw-bolder text-dark" data-percent="'.$evaluator_value.'">'.$value["evaluator"].'</div>
                    </div>
            ';
        }

        if (!empty($value["pre"])) {
            $pre_value = returnLevel($value["pre"]);
            echo '
                    <div class="progress pre-data bg-white bar-data bar-data">
                        <div class="progress-bar animated-progress bg-'.$competency_label.'-pre" role="progressbar" data-width="'.$pre_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$pre_value.'%;"></div>
                        <div class="progress-value mobile-circle bg-'.$competency_label.'-pre" ></div>
                        <div class="progress-label fs-6 fw-bolder text-dark" data-percent="'.$pre_value.'">'.$value["pre"].'</div>
                    </div>
            ';
        }
        else {
            $post_color_suffix = "pre";
        }

        if (!empty($value["post"])) {
            $post_value = returnLevel($value["post"]);
            echo '
                    <div class="progress post-data bg-white bar-data">
                        <div class="progress-bar animated-progress bg-'.$competency_label.'-'.$post_color_suffix.'" role="progressbar" data-width="'.$post_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$post_value.'%;" ></div>
                        <div class="progress-value mobile-circle bg-'.$competency_label.'-'.$post_color_suffix.'" ></div>
                        <div class="progress-label fs-6 fw-bolder text-dark" data-percent="'.$post_value.'">'.$value["post"].'</div>
                    </div>
            ';
        }

        echo '  </div>
            </div>
        </div>';
    }
    }
    }
    
    function generate_competency_results($competency_data, $competency, $color_label, $label, $icon, $competency_tag, $orders = null) {
        if (isset($competency_data[$competency_tag])) {
            $post_color_suffix = "post";

            $order_name = $orders ? 'order-md-'.$orders['desktop'][0].' order-'.$orders['mobile'][0] : '';
            $order_progress = $orders ? 'order-md-'.$orders['desktop'][1].' order-'.$orders['mobile'][1] : '';
        
            echo '
                <div class="col-md-3 col-12 '.$order_name.'">
                    <div class="d-flex flex-row flex-md-column align-items-center justify-content-center px-2 py-3 mobile-competency-name bg-'.$color_label.'-pre" style="border-radius: 20px;">
                        <img class="img-fluid me-2" src="'.$icon.'" >
                        <span class="ms-2 ms-md-0 mt-md-2 mb-0 text-white text-wrap text-break text-center fw-bold fs-5">'.$label.'</span>
                    </div>
                </div>
                <div class="col-md-8 col-12 pt-5 pb-4-5-mobile py-md-0 '.$order_progress.'">
            ';
    
            if (!empty($competency_data["evaluator"])) {
                $evaluator_value = intval($competency_data[$competency]["evaluator"]);
                echo '
                    <div class="progress evaluator-data bg-white bar-data">
                        <div class="progress-bar animated-progress" role="progressbar" data-width="'.$evaluator_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$evaluator_value.'%;" ></div>
                        <div class="progress-value mobile-circle" >
                            '.$evaluator_value.'
                        </div>
                    </div>
                ';
            }
    
            if (!empty($competency_data["pre"])) {
                $pre_value = intval($competency_data[$competency]["pre"]);
                echo '
                    <div class="progress pre-data bg-white bar-data bar-data">
                        <div class="progress-bar animated-progress bg-'.$color_label.'-pre" role="progressbar" data-width="'.$pre_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$pre_value.'%;" ></div>
                        <div class="progress-value mobile-circle bg-'.$color_label.'-pre" >
                            '.$pre_value.'
                        </div>
                    </div>
                ';
            }
            else {
                $post_color_suffix = "pre";
            }
    
            if (!empty($competency_data["post"])) {
                $post_value = intval($competency_data[$competency]["post"]);
                echo '
                    <div class="progress post-data bg-white bar-data">
                        <div class="progress-bar animated-progress bg-'.$color_label.'-'.$post_color_suffix.'" role="progressbar" data-width="'.$post_value.'" aria-valuemin="0" aria-valuemax="100"
                        style="width:'.$post_value.'%;" ></div>
                        <div class="progress-value mobile-circle bg-'.$color_label.'-'.$post_color_suffix.'" >
                            '.$post_value.'
                        </div>
                    </div>
                ';
            }
    
            echo '
            </div>';
        }
    }
    
?>