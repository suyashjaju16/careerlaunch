<?php 
function fetch_data($url, $data,$type="POST") {
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
?>