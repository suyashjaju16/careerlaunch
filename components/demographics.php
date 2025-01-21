<?php 

// include("./models/common/demographics.php");

$demo = json_decode(fetch_data(API_DEMOGRAPHICS_ENDPOINT,$data),true);

$demo_data = $demo;

$dataArray = json_decode(fetch_data(API_DEMOGRAPHICS_ENDPOINT,$data),true);

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


$dataArray = json_decode($updatedJson, true);
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
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> At what degree/certificate/class year are you
                                                                currently
                                                                enrolled? </h6>
                                    <div id="bar_chart2" class="apex-charts" dir="ltr" style="height:370px">
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
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Accounting
                                                        and
                                                        Computer
                                                        Science</td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Accounting
                                                        and
                                                        Related
                                                        Services</td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Aerospace,
                                                        Aeronautical
                                                        and
                                                        Astronautical
                                                        Engineering</td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>African
                                                        Languages,
                                                        Literatures,
                                                        and
                                                        Linguistics
                                                    </td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Agricultural
                                                        and
                                                        Domestic
                                                        Animal
                                                        Services
                                                    </td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Agricultural
                                                        and
                                                        Food
                                                        Products
                                                        Processing
                                                    </td>
                                                    <td>222</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Agricultural
                                                        Engineering</td>
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
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Gender: How do
                                        you identify?
                                    </h6>
                                    <div id="bar_chart4" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h4 class="pie-text"> Which of the following categories would you use to
                                                                best
                                                                describe yourself?
                                                            </h4>
                                    <div id="bar_chart5" dir="ltr" style="height:395px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6  d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> What is your parent(s) or caregiver(s) highest
                                                                level of
                                                                education in the
                                                                United
                                                                States?</h6>
                                    <div id="bar_chart6" class="apex-charts" dir="ltr" style="height:390px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Do you have a
                                        diagnosed
                                        disability?
                                    </h6>
                                    <div id="chart7" class="apex-charts" dir="ltr" style="height:370px">
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
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Do you identify
                                        as a member of
                                        the
                                        LGBTQ+
                                        community?
                                    </h6>
                                    <div id="chart8" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Is English the
                                        primary language
                                        spoken
                                        at your
                                        childhood
                                        home?</h6>
                                    <div id="chart9" class="apex-charts" dir="ltr" style="height:370px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text">
                                        Are you a parent
                                        to a child under
                                        18
                                        years old?
                                    </h6>
                                    <div id="chart10" class="apex-charts" dir="ltr" style="height:370px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> Have you ever served on active duty in the U.S.
                                                                Armed
                                                                Forces, Reserves, or
                                                                National Guard? (Optional)</h6>
                                    <div id="chart13" class="apex-charts" dir="ltr" style="height:390px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-fill">
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
                                    <div id="chart12" class="apex-charts" dir="ltr" style="height:370px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6  d-flex flex-fill">
                            <div class="card p-3 border-2 w-100">
                                <div class="card-body px-3 py-3">
                                    <h6 class="pie-text"> Age </h6>
                                    <div id="chart14" class="apex-charts" dir="ltr" style="height:410px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card p-3 border-2 w-100">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-body px-3 py-3">
                                            <h6 class="pie-text"> Which of the following sources did you use
                                                                        to
                                                                        finance your college
                                                                        tuition?
                                                                        (Optional) </h6>
                                            <div id="chart15" class="apex-charts" dir="ltr" style="height:390px">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <div class="card-body">
                                            <h3>Others</h3>
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
                                                            International
                                                            Student
                                                            Scholorship
                                                        </td>
                                                        <td style="color:black!important;">4
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div> -->
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
Highcharts.chart('bar_chart2', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'At what degree/certificate/class year are you currently enrolled?',
        align: 'left'
    },
    xAxis: {
        categories: ["Bachelor's - 1st Year",
            "Bachelor's - 2nd Year",
            "Bachelor's - 3rd Year",
            "Bachelor's - 4th Year",
            "Bachelor's - 5th Year or Beyond",
            "Masters",
            "Doctoral"
        ],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
        },
    },
    series: [{
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            format: '{y} ({point.per}%)',
            style: {
                color: 'white'
            },
        }],
        data: [{
            y: 1,
            per: 72,
        }, {
            y: 30,
            per: 74,
        }, {
            y: 48,
            per: 83
        }, {
            y: 32,
            per: 76
        }, ],
        showInLegend: false
    }]
});

var options = {
    series: <?= json_encode($demo_data['Gender: How do you identify?']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?= json_encode($demo_data['Gender: How do you identify?']['labels']); ?>,
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 100
            },
            legend: {
                position: 'bottom',
            }
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#bar_chart4"), options);
chart.render();

Highcharts.chart('bar_chart5', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'Which of the following categories would you use to best describe yourself?',
        align: 'left'
    },
    xAxis: {
        categories: <?= json_encode($dataArray[
                            'Which of the following categories would you use to best describe yourself?'][
                            'labels'
                        ]);?>,
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
                align: 'right',
            }

        }
    },
    legend: {
        enabled: false
    },
    series: [{
        colorByValue: true,
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' :
                    'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y +
                    ' (' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($dataArray[
                            'Which of the following categories would you use to best describe yourself?'
                            ]['formatted_data']);?>,
        showInLegend: false
    }]
});

Highcharts.chart('bar_chart6', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'What is your parent(s) or caregiver(s) highest level of education in the United States?',
        align: 'left',
    },
    xAxis: {
        categories: <?= json_encode($dataArray[ 'Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?' ]['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
                align: 'right',
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
            fontFamily: 'Mulish, sans-serif'
        },
    },
    series: [{
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            inside: false,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' :
                    'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y +
                    ' (' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($dataArray[ 'Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?' ]['formatted_data']);?>,
        showInLegend: false
    }]
});

var options = {
    series: <?= json_encode($demo_data['Do you have a diagnosed disability?']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?= json_encode($demo_data['Do you have a diagnosed disability?']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#chart7"), options);
chart.render();


var options = {
    series: <?= json_encode($demo_data['Do you identify as a member of the LGBTQ+ community?']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?= json_encode($demo_data['Do you identify as a member of the LGBTQ+ community?']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#chart8"), options);
chart.render();

var options = {
    series: <?= json_encode($demo_data['Is English the primary language spoken at your childhood home?']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?= json_encode($demo_data['Is English the primary language spoken at your childhood home?']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#chart9"), options);
chart.render();

var options = {
    series: <?=json_encode($demo_data['Are you a parent to a child under 18 years old?']['values']);?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?=json_encode($demo_data['Are you a parent to a child under 18 years old?']['labels']);?>,
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

var chart = new ApexCharts(document.querySelector("#chart10"), options);
chart.render();

Highcharts.chart('chart13', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'Have you ever served on active duty in the U.S. Armed Forces, Reserves, or National Guard? (Optional)',
        align: 'left'
    },
    xAxis: {
        categories: <?= json_encode($dataArray['Have you ever served on active duty in the U.S. Armed Forces, Reserves, or National Guard?']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
            fontFamily: 'Mulish, sans-serif'
        },
    },
    series: [{
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.1 ? 'black' :
                    'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y +
                    ' (' + perc +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($dataArray['Have you ever served on active duty in the U.S. Armed Forces, Reserves, or National Guard?']['formatted_data']);?>,
        showInLegend: false
    }]
});

var options = {
    series: <?= json_encode($demo_data['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['values']); ?>,
    chart: {
        type: 'donut',
        height: 400
    },
    legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        position: 'bottom',
        horizontalAlign: 'center',
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
        offsetY: 0,

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
    labels: <?= json_encode($demo_data['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['labels']); ?>,
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

var chart = new ApexCharts(document.querySelector("#chart12"), options);
chart.render();

Highcharts.chart('chart15', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'Which of the following sources did you use to finance your college tuition? (Optional)',
        align: 'left'
    },
    xAxis: {
        categories: <?= json_encode($dataArray['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
            pointWidth: 30,
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
        // floating: true,
        format: '{point.y:.1f}', // one decimal
        backgroundColor: '#000033',
        style: {
            fontSize: '6px',
            fontFamily: 'Mulish, sans-serif'
        },
    },
    series: [{
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            // inside: false,
            format: '{y} ({point.per}%)'
        }],
        data: <?= json_encode($dataArray['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['formatted_data']);?>,
        showInLegend: false
    }]
});

Highcharts.chart('chart14', {
    chart: {
        type: 'bar'
    },
    title: {
        show: false,
        text: 'Age',
        align: 'left'
    },
    xAxis: {
        categories: <?= json_encode($dataArray['What is your age? (Optional)']['labels']);?>,
        crosshair: true,
        accessibility: {
            description: 'Countries'
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses'
        }
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
        inside: false,
        format: '{point.y:.1f}', // one decimal
        backgroundColor: '#000033',
        style: {
            fontSize: '6px',
            fontFamily: 'Mulish, sans-serif'
        },
    },
    series: [{
        name: 'Responses',
        dataLabels: [{
            align: 'right',
            inside: false,
            floating: true,
            formatter: function() {
                var max = this.series.yAxis.max;
                var color = this.y / max <= 0.14 ? 'black' :
                    'white'; // 5% width
                perc = ((this.y / max).toFixed(2)) * 100;
                return '<span style="color: ' + color + '">' + this.y +
                    ' (' + perc
                    .toFixed(2) +
                    '%)</span>';
            },
        }],
        data: <?= json_encode($dataArray['What is your age? (Optional)']['formatted_data']);?>,
        showInLegend: false
    }]
});
</script>

<!-- <script>
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
            fontFamily: 'Mulish, sans-serif'
        },
    }
};

function createBarChart(container, title, categories, data) {
    Highcharts.chart(container, {
        ...COMMON_CHART_CONFIG,
        title: {
            show: false,
            text: title,
            align: 'left'
        },
        xAxis: {
            categories: categories,
            crosshair: true,
            accessibility: {
                description: 'Countries'
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Responses'
            }
        },
        series: [{
            name: 'Responses',
            dataLabels: [{
                align: 'right',
                inside: false,
                floating: true,
                formatter: function() {
                    var max = this.series.yAxis.max;
                    var color = this.y / max <= 0.1 ? 'black' : 'white'; // 5% width
                    perc = ((this.y / max).toFixed(2)) * 100;
                    return '<span style="color: ' + color + '">' + this.y + ' (' + perc +
                        '%)</span>';
                },
            }],
            data: data,
            showInLegend: false
        }]
    });
}

createBarChart('bar_chart2', 'At what degree/certificate/class year are you currently enrolled?', [
    "Bachelor's - 1st Year",
    "Bachelor's - 2nd Year",
    "Bachelor's - 3rd Year",
    "Bachelor's - 4th Year",
    "Bachelor's - 5th Year or Beyond",
    "Masters",
    "Doctoral"
], [{
    y: 1,
    per: 72
}, {
    y: 30,
    per: 74
}, {
    y: 48,
    per: 83
}, {
    y: 32,
    per: 76
}]);

createBarChart('bar_chart5', 'Which of the following categories would you use to best describe yourself?',
    <?= json_encode($dataArray['Which of the following categories would you use to best describe yourself?']['labels']);?>,
    <?= json_encode($dataArray['Which of the following categories would you use to best describe yourself?']['formatted_data']);?>
);

createBarChart('bar_chart6', 'What is your parent(s) or caregiver(s) highest level of education in the United States?',
    <?= json_encode($dataArray['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['labels']);?>,
    <?= json_encode($dataArray['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['formatted_data']);?>
);

function createDonutChart(container, seriesData, labelsData) {
    const options = {
        series: seriesData,
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
        labels: labelsData,
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

createDonutChart("#bar_chart4", <?= json_encode($demo_data['Gender: How do you identify?']['values']); ?>,
    <?= json_encode($demo_data['Gender: How do you identify?']['labels']); ?>);
createDonutChart("#chart8",
    <?= json_encode($demo_data['Do you identify as a member of the LGBTQ+ community?']['values']); ?>,
    <?= json_encode($demo_data['Do you identify as a member of the LGBTQ+ community?']['labels']); ?>);
createDonutChart("#chart9",
    <?= json_encode($demo_data['Is English the primary language spoken at your childhood home?']['values']); ?>,
    <?= json_encode($demo_data['Is English the primary language spoken at your childhood home?']['labels']); ?>);
createDonutChart("#chart10",
    <?= json_encode($demo_data['Are you a parent to a child under 18 years old?']['values']); ?>,
    <?= json_encode($demo_data['Are you a parent to a child under 18 years old?']['labels']); ?>);
createDonutChart("#chart12",
    <?= json_encode($demo_data['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['values']); ?>,
    <?= json_encode($demo_data['Are you the primary caregiver to a family member (not a child) such as a parent, partner, etc.?']['labels']); ?>
);
createDonutChart("#chart14",
    <?= json_encode($demo_data['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['values']); ?>,
    <?= json_encode($demo_data['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['labels']); ?>
);

createBarChart('chart15', 'Which of the following sources did you use to finance your college tuition? (Optional)',
    <?= json_encode($dataArray['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['labels']);?>,
    <?= json_encode($dataArray['Which of the following sources did you use to finance your college tuition? (Optional)  Select all that apply:']['formatted_data']);?>
);

createBarChart('chart14', 'Age',
    <?= json_encode($dataArray['What is your age? (Optional)']['labels']);?>,
    <?= json_encode($dataArray['What is your age? (Optional)']['formatted_data']);?>
);

createDonutChart('chart7',
    <?= json_encode($dataArray['Do you have a diagnosed disability?']['values']);?>,
    <?= json_encode($dataArray['Do you have a diagnosed disability?']['labels']);?>
);
</script> -->

<!-- <?= json_encode($demo_data['Do you have a diagnosed disability?']['labels']); ?> -->