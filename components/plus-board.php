<?php 
// include("./models/config.php");
// include("./models/plus/social-capital-bar.php");

function dataformatter($data){
    $dataArray = json_decode($data, true);

    $formattedData = [];

    foreach ($dataArray as $question => $details) {
        $formattedData['data'] = []; 
        
        foreach ($details['values'] as $index => $value) {
            $formattedData['data'][] = [
                'y' => $value,
                'per' => intval($details['percentages'][$index])
            ];
        }
        $dataArray[$question]['formatted_data'] = $formattedData['data'];
    }
    $updatedJson = json_encode($dataArray, JSON_PRETTY_PRINT);
    return json_decode($updatedJson, true);
}

$social_capital_bars = fetch_data(API_SOCIAL_CAPITAL_BAR_ENDPOINT,$data);
$social_bars_data = dataformatter($social_capital_bars);
// echo "<pre>".json_encode($social_bars_data)."</pre>";

include("./models/plus/life-design.php");
$life_design = fetch_data(API_LIFE_DESIGN_ENDPOINT,$data);
$life_design_data = dataformatter($life_design);

include("./models/plus/career-mobility-bars.php");
$career_mobility_bars  =  fetch_data(API_CAREER_MOBILITY_BAR_ENDPOINT,$data);
$career_mobility_data = dataformatter($career_mobility_bars);
// echo "<hr>";
include("./models/plus/career-mobility-pie.php");
$career_mobility_pie_data = json_decode(fetch_data(API_CAREER_MOBILITY_PIE_ENDPOINT,$data),true);
// echo json_encode($career_mobility_data);
// echo json_encode($career_mobility_pie_data['Career Counselor (Choose Below)'],JSON_PRETTY_PRINT);

include("./models/plus/social-capital-pie.php");
// $social_pie_data = json_encode($social_capital_pie);
// Decode the JSON into an associative array
// $data = json_decode($social_pie_data, true);

// Access specific nested keys
// $category = json_encode($data);
// echo $social_capital_pie;`
$social_pie_data = json_decode(fetch_data(API_SOCIAL_CAPITAL_PIE_ENDPOINT,$data),true);

// Function to get values and labels for a specified key
function getValuesOrLabelsInJson($mainKey, $subKey, $type) {
    global $data; // Use the global data variable
    
    if (isset($data[$mainKey]) && isset($data[$mainKey][$subKey])) {
        if ($type === 'values') {
            // Return the values array as JSON
            return json_encode($data[$mainKey][$subKey]['values']);
        } elseif ($type === 'labels') {
            // Return the labels array as JSON
            return json_encode($data[$mainKey][$subKey]['labels']);
        } else {
            return json_encode(["error" => "Invalid type requested"]);
        }
    } else {
        return json_encode(["error" => "Key not found"]);
    }
}

// echo getValuesOrLabelsInJson(
//     "I have proactively asked family members (other than parents/guardians) and friends about their job or career.",
//     "Family Members (Choose Below)",
//     "values");

// echo getValuesOrLabelsInJson(
//     "I have proactively asked family members (other than parents/guardians) and friends about their job or career.",
//     "Family Members (Choose Below)",
//     "labels");

?>

<div class="accordion mb-3 mt-4 bg-white" id="accordionWork">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSocial">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSocial"
                aria-expanded="true" aria-controls="collapseSocial">
                <div class="row w-100">
                    <div class="col-sm-4">
                        <div class="card mt-4" style="background-color:#1f5e34;margin-left:25px">
                            <div class="row p-3">
                                <div class="col-sm-4">
                                    <img class="img-fluid" src="assets/images/social.png">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="text-white text-center">Social <br> Capital</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapseSocial" class="accordion-collapse" aria-labelledby="headingSocial"
            data-bs-parent="#accordionSocial">
            <div class="accordion-body">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="row p-4">
                            <div class="col-sm-12">
                                <div class="card p-3 border-2">
                                    <div class="card-body px-3 py-3">
                                        <h6 style="font-size:18px"> <b>I have relationships with
                                                former
                                                employers and professors
                                                who would be willing to give me a formal recommendation
                                                if/when needed.</b> </h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card  border-2 mt-4">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 style="font-size:18px">Employer</h6>
                                                        </div>
                                                        <div id="social_chart1" class="apex-charts" dir="ltr"
                                                            style="height:260px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card  border-2 mt-4">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 style="font-size:18px">Professor</h6>
                                                        </div>
                                                        <div id="social_chart2" class="apex-charts" dir="ltr"
                                                            style="height:260px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 m-auto d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#006f3d!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">Not yet
                                                    </div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#1aa968!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">1
                                                        Relationship</div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#5ccc99!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">2
                                                        Relationship</div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#b1d8b7!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">3 or more
                                                        Relationship
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card p-3  border-2">
                                    <div class="card-body px-3 py-3">
                                        <h6 style="font-size:19.2px"> <b> I have proactively asked
                                                family
                                                members (other than
                                                parents/guardians) and friends about their job or
                                                career. </b>
                                        </h6>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div class="card border-2">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 style="font-size:18px">Family Members
                                                            </h6>
                                                        </div>
                                                        <div id="social_chart3" class="apex-charts mt-2" dir="ltr"
                                                            style="height:260px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card border-2">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 style="font-size:18px">Friends and
                                                                Family Friends</h6>
                                                        </div>
                                                        <div id="social_chart4" class="apex-charts mt-2" dir="ltr"
                                                            style="height:260px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 m-auto d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#2a4c09!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">Not and I
                                                        had not
                                                        considered this</div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#457010!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">Not yet
                                                        but I plan to
                                                    </div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#385b4f!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">Yes, Once
                                                    </div>
                                                </div>
                                                <div class="d-flex ml-5">
                                                    <div class="div mt-1"
                                                        style="height:10px;width:10px;background-color:#b1d8b7!important">
                                                    </div>
                                                    <div style="margin-left:10px;color:black">Yes,
                                                        Multiple times
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">Which of the following best represent your program or
                                                                area of study?</h6>
                                            <div id="social_chart5" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">Which of the following best represent your program or
                                                                area of study?</h6>
                                            <div id="social_chart6" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">I have proactively asked to have a career
                                                                conversation with a professional at an
                                                                organization I’m interested in working for.</h6>
                                            <div id="social_chart7" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">I have proactively asked someone I know to introduce me
                                                                to someone they know so I can talk to them to learn
                                                                about their career.</h6>
                                            <div id="social_chart8" class="apex-charts" dir="ltr" style="height:300px">
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

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingLife">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLife"
                aria-expanded="true" aria-controls="collapseLife">
                <div class="row w-100">
                    <div class="col-sm-4">
                        <div class="card mt-4" style="background-color:#ff8c00;margin-left:25px">
                            <div class="row p-3">
                                <div class="col-sm-4">
                                    <img class="img-fluid" src="assets/images/life.png">
                                </div>
                                <div class="col-sm-8 align-content-center">
                                    <h2 class="text-center" style="color:black!important">Life Design
                                        <br> Mindsets
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapseLife" class="accordion-collapse" aria-labelledby="headingLife" data-bs-parent="#accordionLife">
            <div class="accordion-body">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="row p-4">
                            <div class="row">
                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">When things don't go the way I had envisioned or
                                                                when I encounter a setback, I recognize that the
                                                                setback is an opportunity to learn and grow,
                                                                rather than a “mistake."?</h6>
                                            <div id="life_chart1" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">When I feel stuck in life, I reach out to others
                                                                who help me uncover new solutions or ways of
                                                                thinking about the situation.</h6>
                                            <div id="life_chart2" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">When I feel stuck in regards to my career plans, I
                                                                have strategies I use to help me move forward
                                                                (become “unstuck”).
                                                            </h6>
                                            <div id="life_chart3" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">I think taking measured risks and learning to
                                                                embrace failure is important in my career
                                                                success.</h6>
                                            <div id="life_chart4" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">I have the tools I need to build a happy,
                                                                meaningful, and successful life.</h6>
                                            <div id="life_chart5" class="apex-charts" dir="ltr" style="height:300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 d-flex flex-fill">
                                    <div class="card border-2">
                                        <div class="card-body">
                                            <h6 class="pie-text">I often try to look at problems from different
                                                                perspectives to find new ways to move forward.
                                                            </h6>
                                            <div id="life_chart6" class="apex-charts" dir="ltr" style="height:300px">
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

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingCareer">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer"
                aria-expanded="true" aria-controls="collapseCareer">
                <div class="row w-100">
                    <div class="col-sm-4">
                        <div class="card mt-4" style="background-color:#1f3f95;margin-left:25px">
                            <div class="row p-3">
                                <div class="col-sm-4">
                                    <img class="img-fluid" src="assets/images/career.png">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="text-white text-center">Career <br> Mobility
                                        Skills</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapseCareer" class="accordion-collapse" aria-labelledby="headingCareer"
            data-bs-parent="#accordionCareer">
            <div class="accordion-body">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="card border-2">
                            <div class="p-3">
                                <div class="card-title">
                                    <h6 class="pie-text"
                                        style="font-size: 19.2px; color: rgb(51, 51, 51); font-weight: bold; fill: rgb(51, 51, 51);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji">
                                                        I have received helpful career
                                                        advice from a faculty member,
                                                        career
                                                        counselor, or employer.</h6>
                                                </div>
                                                <div class=" row mt-3">
                                        <div class="col-sm-4">
                                            <div class="card border-2">
                                                <div class="card-body">
                                                    <h6 style="font-size:18px">Professor or Faculty
                                                        Member</h6>
                                                    <!-- <h6>Professor or Faculty Member
                                                                    </h6> -->
                                                    <div id="career_chart1" class="apex-charts mt-5" dir="ltr"
                                                        style="height:300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card border-2">
                                                <div class="card-body">
                                                    <!-- <h6>Career Counselor
                                                                    </h6> -->
                                                    <h6 style="font-size:18px">Career Counselor</h6>
                                                    <div id="career_chart2" class="apex-charts mt-5" dir="ltr"
                                                        style="height:300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card border-2">
                                                <div class="card-body">
                                                    <!-- <h6>Employers
                                                                    </h6> -->
                                                    <h6 style="font-size:18px">Employers</h6>
                                                    <div id="career_chart3" class="apex-charts mt-5" dir="ltr"
                                                        style="height:300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 m-auto d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div class="div mt-1"
                                                    style="height:10px;width:10px;background-color:#2f5f98!important">
                                                </div>
                                                <div style="margin-left:10px;color:black">Not and I had
                                                    not
                                                    considered this</div>
                                            </div>
                                            <div class="d-flex ml-5">
                                                <div class="div mt-1"
                                                    style="height:10px;width:10px;background-color:#2c8bba!important">
                                                </div>
                                                <div style="margin-left:10px;color:black">Not yet but I
                                                    plan to
                                                </div>
                                            </div>
                                            <div class="d-flex ml-5">
                                                <div class="div mt-1"
                                                    style="height:10px;width:10px;background-color:#40b8d5!important">
                                                </div>
                                                <div style="margin-left:10px;color:black">Yes, Once
                                                </div>
                                            </div>
                                            <div class="d-flex ml-5">
                                                <div class="div mt-1"
                                                    style="height:10px;width:10px;background-color:#6ce5e8!important">
                                                </div>
                                                <div style="margin-left:10px;color:black">Yes, Multiple
                                                    times
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row p-4">
                                <div class="row">
                                    <div class="col-sm-6 d-flex flex-fill">
                                        <div class="card border-2">
                                            <div class="card-body">
                                                <h6 class="pie-text">My college/university has helped me build
                                                                    relationships with employers.
                                                                </h6>
                                                <div id="career_chart4" class="apex-charts" dir="ltr"
                                                    style="height:300px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-fill">
                                        <div class="card border-2">
                                            <div class="card-body">
                                                <h6 class="pie-text">I have completed at least one experience
                                                                    working in an environment similar to my career
                                                                    interests (internship, research position, part-
                                                                    time job, significant volunteering).
                                                                </h6>
                                                <div id="career_chart5" class="apex-charts" dir="ltr"
                                                    style="height:300px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-fill">
                                        <div class="card border-2">
                                            <div class="card-body">
                                                <h6 class="pie-text">I have created career plans with guidance from a
                                                                    staff or faculty member at my college.
                                                                </h6>
                                                <div id="career_chart6" class="apex-charts" dir="ltr"
                                                    style="height:300px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-fill">
                                        <div class="card border-2">
                                            <div class="card-body">
                                                <h6 class="pie-text">I have received feedback on my resume, and I
                                                                    am confident that it effectively showcases my
                                                                    candidacy (from counselors, professionals
                                                                    and/or my school's resume software provider).
                                                                </h6>
                                                <div id="career_chart7" class="apex-charts" dir="ltr"
                                                    style="height:300px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-fill">
                                        <div class="card border-2">
                                            <div class="card-body">
                                                <h6 class="pie-text">I feel prepared to land internships, jobs, or
                                                                    research positions that have not been posted
                                                                    online.
                                                                </h6>
                                                <div id="career_chart8" class="apex-charts" dir="ltr"
                                                    style="height:300px">
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
</div>

<script>
var options = {
    series: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Employers (Choose Below)']['values']); ?>,
    chart: {
        type: 'donut',
        height: 250,
        width: 300,
    },
    fill: {
        colors: ['#006f3d', '#068d45', '#1aa968', '#5ccc99'],
    },

    legend: {
        show: false
    },
    tooltip: {
        fillSeriesColor: true, // Tooltip uses the series fill color              
    },
    labels: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Employers (Choose Below)']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#social_chart1"), options);
chart.render();

var options = {
    series: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Teachers/Professors (Choose Below)']['values']); ?>,
    chart: {
        type: 'donut',
        height: 250,
        width: 300
    },
    fill: {
        // colors: ['#2a4c09', '#31542c', '#385b4f', '#b1d8b7']
        colors: ['#006f3d', '#068d45', '#1aa968', '#5ccc99'],
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($social_pie_data['I have relationships with former employers and teachers/professors who would be willing to give me a formal recommendation if/when needed.']['Teachers/Professors (Choose Below)']['values']); ?>,
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

var chart = new ApexCharts(document.querySelector("#social_chart2"), options);
chart.render();

var options = {
    series: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Family Members (Choose Below)']['values']);?>,
    chart: {
        type: 'donut',
        height: 250,
        width: 300
    },
    fill: {
        // colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7']
        colors: ['#006f3d', '#068d45', '#1aa968', '#5ccc99'],
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Family Members (Choose Below)']['labels']);?>,
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

var chart = new ApexCharts(document.querySelector("#social_chart3"), options);
chart.render();

var options = {
    series: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Friends and Family Friends (Choose Below)']['values']);?>,
    chart: {
        type: 'donut',
        height: 250,
        width: 300
    },
    fill: {
        // colors: ['#2a4c09', '#457010', '#385b4f', '#b1d8b7']
        colors: ['#006f3d', '#068d45', '#1aa968', '#5ccc99'],
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($social_pie_data['I have proactively asked family members (other than parents/guardians) and friends about their job or career.']['Friends and Family Friends (Choose Below)']['labels']);?>,
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

var chart = new ApexCharts(document.querySelector("#social_chart4"), options);
chart.render();


Highcharts.chart('social_chart5', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1e5e34',
        },
        series: {
            pointWidth: 30,
            color: '#1e5e34',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($social_bars_data['I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($social_bars_data['I feel confident proactively introducing myself to professionals I have never met (who could be helpful in my career).']['formatted_data']);?>,
        showInLegend: false
    }]

});


Highcharts.chart('social_chart6', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1e5e34',
        },
        series: {
            pointWidth: 30,
            color: '#1e5e34',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($social_bars_data['I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($social_bars_data['I have proactively asked someone I know to introduce me to someone they know so I can talk to them to learn about their career.']['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('social_chart7', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1e5e34',
        },
        series: {
            pointWidth: 30,
            color: '#1e5e34',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($social_bars_data['I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($social_bars_data['I have proactively asked to have a career conversation with a professional at an organization Im interested in working for.']['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('social_chart8', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have proactively reached out to an alum from my school to learn about their career path.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1e5e34',
        },
        series: {
            pointWidth: 30,
            color: '#1e5e34',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($social_bars_data['I have proactively reached out to an alum from my school to learn about their career path.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($social_bars_data['I have proactively reached out to an alum from my school to learn about their career path.']['formatted_data']);?>,
        showInLegend: false
    }]

});



Highcharts.chart('life_chart1', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have the tools I need to build a happy, meaningful, and successful life.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['I have the tools I need to build a happy, meaningful, and successful life.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['I have the tools I need to build a happy, meaningful, and successful life.']['formatted_data']);?>,
        showInLegend: false
    }]

});


Highcharts.chart('life_chart2', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I often try to look at problems from different perspectives to find new ways to move forward.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['I often try to look at problems from different perspectives to find new ways to move forward.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['I often try to look at problems from different perspectives to find new ways to move forward.']['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('life_chart3', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I think taking measured risks and learning to embrace failure is important in my career success.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['I think taking measured risks and learning to embrace failure is important in my career success.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['I think taking measured risks and learning to embrace failure is important in my career success.']['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('life_chart4', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['When I feel stuck in life, I reach out to others who help me uncover new solutions or ways of thinking about the situation.']['formatted_data']);?>,
        showInLegend: false
    }]

});


Highcharts.chart('life_chart5', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['When I feel stuck in regards to my career plans, I have strategies I use to help me move forward (become unstuck).']['formatted_data']);?>,
        showInLegend: false
    }]

});


Highcharts.chart('life_chart6', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#ff8c00',
        },
        series: {
            pointWidth: 30,
            color: '#ff8c00',
            dataLabels: {
                enabled: true,
                inside: false,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($life_design_data['When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = 'black'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($life_design_data['When things dont go the way I had envisioned or when I encounter a setback, I recognize that the setback is an opportunity to learn and grow, rather than a mistake.']['formatted_data']);?>,
        showInLegend: false
    }]

});

var options = {
    series: <?= json_encode($career_mobility_pie_data['Professor or Faculty Member (Choose Below)']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400,
        width: 300
    },
    fill: {
        colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
    },
    legend: {
        show: false,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'left',
        floating: false,
        fontSize: '16px',
        fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"',
        fontWeight: 400,
        formatter: undefined,
        inverseOrder: false,
        width: undefined,
        height: undefined,
        tooltipHoverFormatter: undefined,
        customLegendItems: [],
        offsetX: 0,
        offsetY: 50,

        labels: {
            colors: undefined,
            useSeriesColors: false
        },
        markers: {
            size: 9,
            shape: 'square',
            strokeWidth: 1,
            fillColors: undefined,
            customHTML: undefined,
            onClick: undefined,
            offsetX: 0,
            offsetY: 0
        },
        itemMargin: {
            horizontal: 10,
            vertical: 5
        },
        onItemClick: {
            toggleDataSeries: true
        },
        onItemHover: {
            highlightDataSeries: true
        },
    },
    labels: <?= json_encode($career_mobility_pie_data['Professor or Faculty Member (Choose Below)']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#career_chart1"), options);
chart.render();

var options = {
    series: <?= json_encode($career_mobility_pie_data['Career Counselor (Choose Below)']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400,
        width: 300
    },
    fill: {
        colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($career_mobility_pie_data['Career Counselor (Choose Below)']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#career_chart2"), options);
chart.render();

var options = {
    series: <?= json_encode($career_mobility_pie_data['Employers (Choose Below)']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400,
        width: 300
    },
    fill: {
        colors: ['#2f5f98', '#2c8bba', '#40b8d5', '#6ce5e8']
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($career_mobility_pie_data['Employers (Choose Below)']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#career_chart3"), options);
chart.render();


Highcharts.chart('career_chart4', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I feel prepared to land internships / jobs / research positions that have not been posted online.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1f3f95',
        },
        series: {
            pointWidth: 30,
            color: '#1f3f95',
            dataLabels: {
                enabled: true,
                inside: true,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($career_mobility_data[
                            'I feel prepared to land internships / jobs / research positions that have not been posted online.'
                            ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($career_mobility_data[
                            'I feel prepared to land internships / jobs / research positions that have not been posted online.'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('career_chart5', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have completed at least one experience working in an environment similar to my career interests.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1f3f95',
        },
        series: {
            pointWidth: 30,
            color: '#1f3f95',
            dataLabels: {
                enabled: true,
                inside: true,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($career_mobility_data[
                            'I have completed at least one experience working in an environment similar to my career interests.'
                            ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($career_mobility_data[
                            'I have completed at least one experience working in an environment similar to my career interests.'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('career_chart6', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have created career plans with guidance from a staff or faculty member at my college.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1f3f95',
        },
        series: {
            pointWidth: 30,
            color: '#1f3f95',
            dataLabels: {
                enabled: true,
                inside: true,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($career_mobility_data[
                            'I have created career plans with guidance from a staff or faculty member at my college.'
                            ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($career_mobility_data[
                            'I have created career plans with guidance from a staff or faculty member at my college.'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]

});

Highcharts.chart('career_chart7', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1f3f95',
        },
        series: {
            pointWidth: 30,
            color: '#1f3f95',
            dataLabels: {
                enabled: true,
                inside: true,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($career_mobility_data[
                            'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.'
                            ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($career_mobility_data[
                            'I have received feedback on my resume, and I am confident that it effectively showcases my candidacy.'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]

});


Highcharts.chart('career_chart8', {

    chart: {
        type: 'bar'
    },

    title: {
        text: 'I have received helpful career advice from a faculty member, career counselor, or employer.',
        align: 'left'
    },

    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            backgroundColor: '#1f3f95',
        },
        series: {
            pointWidth: 30,
            color: '#1f3f95',
            dataLabels: {
                enabled: true,
                inside: true,
            }
        },
    },

    xAxis: {
        categories: <?= json_encode($career_mobility_data[
                            'I have received helpful career advice from a faculty member, career counselor, or employer.'
                            ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Labels'
        },
    },

    yAxis: {
        title: {
            text: 'Responses'
        }
    },

    series: [{
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y + '(' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($career_mobility_data[
                            'I have received helpful career advice from a faculty member, career counselor, or employer.'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]

});
</script>