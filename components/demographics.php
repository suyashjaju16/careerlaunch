<?php 

// include("./models/common/demographics.php");

$demo = json_decode(fetch_data(API_DEMOGRAPHICS_ENDPOINT,$data),true);

$demo_data = $demo;

$dataArray = json_decode(fetch_data(API_DEMOGRAPHICS_ENDPOINT,$data),true);

$formattedData = [];

// echo json_encode($data);

foreach ($dataArray as $question => $details) {
    $formattedData['data'] = []; 
    $sum = 0;
    foreach ($details['values'] as $index => $value) {
        $formattedData['data'][] = [
            'y' => $value,
            'per' => intval($details['percentages'][$index])
        ];
        $sum += $value;
    }
    $dataArray[$question]['formatted_data'] = $formattedData['data'];
    $dataArray[$question]["total"] = $sum;
    $sum = 0;
}
$updatedJson = json_encode($dataArray, JSON_PRETTY_PRINT);


$dataArray = json_decode($updatedJson, true);

// echo count($demographicData["what degree/certificate/class year are you currently enrolled?"]["formatted_data"]);
// echo json_encode($dataArray);
?>
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
                        <div id="container_demographicChart1" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> At what degree/certificate/class year are you
                                                                currently
                                                                enrolled? </h6>
                                    <div id="demographicChart1" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Which of the
                                        following best
                                        represent your
                                        program
                                        or
                                        area
                                        of study? </h6>

                                    <!-- <div id="bar_chart3" class="apex-charts" dir="ltr"
                                                            style="height:370px">
                                                        </div> -->
                                    <div class style="height:372px;overflow:scroll">
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
                                            <?php
                                             
                                            $areaOfStudy = $dataArray['Which of the following best represent your program or area of study?'];
                                            // echo json_encode(json_encode($areaOfStudy["labels"]));
                                            // echo sizeof($areaOfStudy["labels"]);
                                            // echo count($areaOfStudy);
                                            for($i = 0;$i < sizeof($areaOfStudy["labels"]);$i++){
                                                // echo json_encode(json_encode($areaOfStudy["labels"][$i])." - ".json_encode($areaOfStudy["values"][$i])." - ".json_encode($areaOfStudy["percentages"][$i])."<br>");
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $i+1 ?></th>
                                                    <td> <?= $areaOfStudy["labels"][$i] ?></td>
                                                    <td><?= json_encode($areaOfStudy["values"][$i]) ?></td>
                                                    <td><?= number_format((float) json_encode($areaOfStudy["percentages"][$i]), 2, '.', ''); ?>%</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart2" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Gender: How do
                                        you identify?
                                    </h6>
                                    <div id="demographicChart2" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart3" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h4 class="pie-text"> Which of the following categories would you use to
                                                                best
                                                                describe yourself?
                                                            </h4>
                                    <div id="demographicChart3" dir="ltr" style="height:395px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart4" class="col-sm-6  d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> What is your parent(s) or caregiver(s) highest
                                                                level of
                                                                education in the
                                                                United
                                                                States?</h6>
                                    <div id="demographicChart4" class="apex-charts" dir="ltr" style="height:390px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart5" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Do you have a
                                        diagnosed
                                        disability?
                                    </h6>
                                    <div id="demographicChart5" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                    <!-- <div class="d-flex justify-content-evenly">
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
                                                                    Prefer
                                                                    not to
                                                                    respond</div>
                                                            </div>
                                                        </div> -->
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart6" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Do you identify
                                        as a member of
                                        the
                                        LGBTQ+
                                        community?
                                    </h6>
                                    <div id="demographicChart6" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart7" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Is English the
                                        primary language
                                        spoken
                                        at your
                                        childhood
                                        home?</h6>
                                    <div id="demographicChart7" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart8" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Are you a parent
                                        to a child under
                                        18
                                        years old?
                                    </h6>
                                    <div id="demographicChart8" class="apex-charts" dir="ltr" style="height:370px"></div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart9" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> Have you ever served on active duty in the U.S.
                                                                Armed
                                                                Forces, Reserves, or
                                                                National Guard? (Optional)</h6>
                                    <div id="demographicChart9" class="apex-charts" dir="ltr" style="height:390px"></div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart10" class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Are you the
                                        primary
                                        caregiver to a
                                        family member
                                        (not a
                                        child) such as a
                                        parent, partner,
                                        etc.?
                                        (Optional)</h6>
                                    <div id="demographicChart10" class="apex-charts" dir="ltr" style="height:370px"></div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart11" class="col-sm-6  d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> Age </h6>
                                    <div id="demographicChart11" class="apex-charts" dir="ltr" style="height:410px"></div>
                                </div>
                            </div>
                        </div>
                        <div id="container_demographicChart12" class="col-sm-6">
                            <div class="card p-3 border-2 w-100">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-body px-3 py-3">
                                            <h6 class="pie-text"> Which of the following sources did you use
                                                                        to
                                                                        finance your college
                                                                        tuition?
                                                                        (Optional) </h6>
                                            <div id="demographicChart12" class="apex-charts" dir="ltr" style="height:390px">
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

demographicData = <?= json_encode($dataArray)?>;
const COMMON_CHART_CONFIG = {
    chart: {
        type: 'bar'
    },
    tooltip: {
        valueSuffix: ' Students'
    },
    plotOptions: {
        column: {
            pointPadding: 0.5,
            borderWidth: 0,
            color: '#000033',
        },
        series: {
            pointWidth: 25,
            color: '#000051',
            dataLabels: {
                enabled: true,
                inside: true,
                align: 'right'
            }
        }
    },
    legend: {
        enabled: false
    },
    dataLabels: {
        enabled: true,
        color: '#000',
        floating: true,
        format: '{point.y:.1f}', // one decimal
        backgroundColor: '#000033',
        style: {
            fontSize: '6px',
            fontFamily: 'Mulish, sans-serif',
            textOutline: 'none'
        },
    }
};

function createBarChart(container, question) {
    
    // const total =
    // alert(total);
    Highcharts.chart(container, {
        ...COMMON_CHART_CONFIG,
        title: {
            show: false,
            text: question,
            align: 'left'
        },
        xAxis: {
            categories: demographicData[question]["labels"],
            crosshair: true,
            accessibility: {
                description: 'Countries'
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Responses'
            },
            max : demographicData[question]["total"],
            maxPadding: 0,
            endOnTick: false
        },
        series: [{
            name: 'Responses',
            dataLabels: [{
                align: 'right',
                inside: false,
                floating: true,
                formatter: function() {
                    barWidth = this.shapeArgs.width;
                    var max = demographicData[question]["total"];
                    var color = this.y / max < 0.2 ? 'black' : 'white'; // 5% width
                    // var color = this.point.isInside == true ? 'white' : 'black'; // 5% width
                    perc = Number(((Math.round((this.y / max) * 100) / 100).toFixed(2))) * 100;
                    console.log(this.point.isInside);
                    if(this.y > 0 && perc == 0){perc = "< 1"}
                    return '<span style="color: ' + color + '">' + perc + '% (' + this.y +
                        ')</span>';
                },
            }],
            data: demographicData[question]["formatted_data"],
            showInLegend: false
        }]
    });
}


function renderCharts() {
    const barChartQuestions = {
        'demographicChart1': 'what degree/certificate/class year are you currently enrolled?',
        'demographicChart3': 'Which of the following categories would you use to best describe yourself?',
        'demographicChart4': 'What is your parent(s) or caregiver(s) highest level of education in the United States?',
        'demographicChart9': 'Have you ever served on active duty in the U.S. Armed Forces, Reserves, or National Guard?',
        'demographicChart11': 'What is your age? (Optional)',
        'demographicChart12': 'Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:'
    };

    for (const [chartId, question] of Object.entries(barChartQuestions)) {
        if (question in demographicData) {
            createBarChart(chartId, question);
        }
        else{
            $("#container_"+chartId).hide()
        }   
    }
}

renderCharts()

function createDonutChart(container, question) {
    const options = {
        series: demographicData[question]["values"],
        chart: {
            type: 'donut',
            height: 400
        },
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            itemMargin: {
                horizontal: 10,
                vertical: 5
            }
        },
        labels: demographicData[question]["labels"],
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
    var chart = new ApexCharts(document.querySelector(container), options);
    chart.render();
}

function renderDonutCharts() {
    const donutChartQuestions = {
        "#demographicChart2": "Gender: How do you identify?",
        "#demographicChart5": "Do you have a diagnosed disability?",
        "#demographicChart6": "Do you identify as a member of the LGBTQ+ community?",
        "#demographicChart7": "Is English the primary language spoken at your childhood home?",
        "#demographicChart8": "Are you a parent to a child under 18 years old?",
        "#demographicChart10": "Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?"
    };

    for (const [chartId, question] of Object.entries(donutChartQuestions)) {
        if (question in demographicData) {
            createDonutChart(chartId, question);
        }
        else{
            $("#container_"+chartId).hide()
        }   
    }
}

renderDonutCharts()
</script>