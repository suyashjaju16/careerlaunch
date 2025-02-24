<?php 

$comp_data = $prepost_comp_data;
if (is_array($comp_data)) {
    $student_averages = [];
    $evaluator_averages = [];
    
    // Create a hashmap to map the original keys from API to human-readable names
    $categoryNames = [
        "communication_results" => "Communication",
        "teamwork_results" => "Teamwork",
        "self_development_results" => "Career & Self Development",
        "professionalism_results" => "Professionalism",
        "leadership_results" => "Leadership",
        "critical_thinking_results" => "Critical Thinking",
        "technology_results" => "Technology",
        "equity_results" => "Equity & Inclusion",
        "overall_career_readiness_results" => "Overall Career Readiness"
    ];

    // Colors hashmap for each competency
    $colors = [
        "Communication" => "#01a4fe",
        "Teamwork" => "#E06B60",
        "Career & Self Development" => "#ffb601",
        "Professionalism" => "#66d202",
        "Leadership" => "#796258",
        "Critical Thinking" => "#A056E6",
        "Technology" => "#556B9B",
        "Equity & Inclusion" => "#ad3131",
        "Overall Career Readiness" => "#666666"
    ];
    
    // Loop through each category and separate student and evaluator data
    foreach ($comp_data as $category => $results) {
        if (isset($results['student']) && isset($results['evaluator'])) {
            $humanReadableName = $categoryNames[$category] ?? $category;
            
            // Student data
            $student_averages[$humanReadableName] = [
                'average' => (float)$results['student'],
                'color' => $colors[$humanReadableName] ?? '#000000'
            ];
            
            // Evaluator data
            $evaluator_averages[$humanReadableName] = [
                'average' => (float)$results['evaluator'],
                'color' => $colors[$humanReadableName] ?? '#000000'
            ];
        }
    }

    // Sort both arrays in descending order by average values
    uasort($student_averages, function($a, $b) {
        return $b['average'] <=> $a['average'];
    });

    uasort($evaluator_averages, function($a, $b) {
        return $b['average'] <=> $a['average'];
    });

} else {
    echo "Error decoding JSON data.";
}
?>
<div class="card">
        <div class="card-body p-5">
            <h5 class="card-title text-black mb-5">
                Competency Comparison
            </h5>
            <div class="d-flex justify-content-between align-content-center">
                <div class="align-content-center">
                    <div class="d-flex"
                        style="writing-mode: vertical-rl;text-orientation: mixed;">
                        <div class="card-title text-black row">
                            <div class="col-sm-4"><i class="dripicons-arrow-thin-left"></i></div>
                            <div class="col-sm-8">
                                <h5>Lowest</h5>
                            </div>
                            <!-- <i class="ri-arrow-left-fill">Lowest </i> -->
                        </div>
                        <div class="card-title text-black row">
                            <div class="col-sm-8">
                                <h5>Highest</h5>
                            </div>
                            <div class="col-sm-4"><i class="dripicons-arrow-thin-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="p-4 border border-2" style="border-radius:20px">
                    <h5 class="card-title text-black mb-2">
                        The Skills Employers Value Most
                    </h5>
                    <div class="row bg-light comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-info text-white">
                            1 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center comm-hov text-black">Communication
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #E06B60;">
                            2 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center team-hov text-black">Teamwork</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #A056E6;">
                            3 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center critical-hov text-black">Critical
                            Thinking
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-success text-white">
                            4 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center professionalism-hov text-black">
                            Professionalism
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color:#ad3131">
                            5 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center equity-hov text-black">Equity
                            & Inclusion</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #556B9B;">
                            6 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center tech-hov text-black">Technology
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-warning text-white">
                            7 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center career-hov text-black">Career
                            &
                            Self-Development</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #796258;">
                            8 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center leadership-hov text-black">
                            Leadership
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-1"></div> -->
                <div class="p-4 border border-2" style="border-radius:20px">
                    <h5 class="card-title text-black mb-2">
                        How Students Rated Themselves
                    </h5>
                    <!-- <div class="row bg-light comp"> -->
                    <?php
                    $count = 1;
                    // Colors hashmap for each category
                    $hoverColorsClass = [
                        "Communication" => "comm-hov",
                        "Teamwork" => "team-hov",
                        "Career & Self Development" => "career-hov",
                        "Professionalism" => "professionalism-hov",
                        "Leadership" => "leadership-hov",
                        "Critical Thinking" => "critical-hov",
                        "Technology" => "tech-hov",
                        "Equity & Inclusion" => "equity-hov"
                    ];

                    // echo $competency_colors["foo"];
                    foreach ($student_averages as $category => $info) {
                            // echo "$category : {$info['color']}<br>";
                            if($category != "Overall Career Readiness"){
                    ?>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color:<?=$info['color']?>">
                            <?= $count ?> </div>
                        <div class="col-sm-9 p-3 align-items-center text-black text-center <?= $hoverColorsClass[$category] ?>">
                            <?= $category ?>
                        </div>
                    </div>
                    <?php $count++; } } ?>
                </div>
                <!-- <div class="col-sm-1"></div> -->
                <div class="p-4 border border-2" style="border-radius:20px">
                    <h5 class="card-title text-black mb-2">
                    How Evaluators Rated Students
                    </h5>
                    <!-- <div class="row bg-light comp"> -->
                    <?php
                    $count = 1;
                    // Colors hashmap for each category
                    $hoverColorsClass = [
                        "Communication" => "comm-hov",
                        "Teamwork" => "team-hov",
                        "Career & Self Development" => "career-hov",
                        "Professionalism" => "professionalism-hov",
                        "Leadership" => "leadership-hov",
                        "Critical Thinking" => "critical-hov",
                        "Technology" => "tech-hov",
                        "Equity & Inclusion" => "equity-hov"
                    ];

                    // echo json_encode($averages);
                    foreach ($evaluator_averages as $category => $info) {
                            // echo "$category : {$info['color']}<br>";
                            if($category != "Overall Career Readiness"){
                    ?>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color:<?=$info['color']?>">
                            <?= $count ?> </div>
                        <div class="col-sm-9 p-3 align-items-center text-black text-center <?= $hoverColorsClass[$category] ?>">
                            <?= $category ?>
                        </div>
                    </div>
                    <?php $count++; } } ?>
                </div>
            </div>
        </div>
    </div>