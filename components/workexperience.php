 <?php 
$work_data = json_decode(fetch_data(API_WORKEXP_ENDPOINT,$data),true);
// echo json_encode($work_data);
// echo json_encode($data);
 ?>
 <div class="accordion-item">
     <h2 class="accordion-header bg-white pt-4 px-4" id="headingWork">
         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWork"
             aria-expanded="true" aria-controls="collapseWork">
             <h3> Work Experience </h3>
         </button>
     </h2>
     <div id="collapseWork" class="accordion-collapse collapse show" aria-labelledby="headingWork"
         data-bs-parent="#accordionWork">
         <div class="accordion-body bg-white">
             <div class="row">
                 <div class="col-sm-7">
                     <div class="card border-2" style="height:720px">
                         <div class="card-body">
                             <div class="card-title">
                                 <h6 class="text-black" style="font-size:18px">Experiential
                                     Learning Type</h6>
                             </div>
                             <div id="workexpchart1" class="apex-charts mt-5" dir="ltr" style="height:630px;"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-5">
                     <div class="card border-2">
                         <div class="">
                             <div class="row mt-3">
                                 <div class="col-sm-12 py-2">
                                     <table class="table table-striped" style="line-height:220%;text-align:center;">
                                         <thead>
                                             <tr>
                                                 <th scope="col"></th>
                                                 <th class="text-black" scope="col">Min</th>
                                                 <th class="text-black" scope="col">Avg</th>
                                                 <th class="text-black" scope="col">Max</th>
                                                 <th class="text-black" scope="col">Responses</th>
                                             </tr>
                                         </thead>
                                         <tbody>

                                             <tr>
                                                 <th  class="text-black"scope="row">Avg Hours Per Week</th>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['hours']['min']))?>
                                                 </td>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['hours']['avg']))?>
                                                 </td>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['hours']['max']))?>
                                                 </td>
                                                 <td class="text-black" data-bs-toggle="tooltip" title="22 Students">
                                                     <?= intval(json_encode($work_data['Average Hours and Weeks']['hours']['response']))?>%
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <th class="text-black" scope="row">Total Weeks</th>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['weeks']['min']))?>
                                                 </td>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['weeks']['avg']))?>
                                                 </td>
                                                 <td class="text-black"><?=intval(json_encode($work_data['Average Hours and Weeks']['weeks']['max']))?>
                                                 </td>
                                                 <td class="text-black" data-bs-toggle="tooltip" title="22 Students">
                                                     <?= intval(json_encode($work_data['Average Hours and Weeks']['weeks']['response']))?>%
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="card border-2" style="height:225px">
                         <div class="card-body">
                             <div class="card-title">
                                 <h6 class="text-black" style="font-size:18px">Pay
                                     Status</h6>
                             </div>
                             <div class="row py-3 px-1">
                                 <div class="col-sm-4">
                                     <div class="d-flex">
                                         <div class="div mt-1"
                                             style="height:15px;width:15px;background-color:#008ffb!important">
                                         </div>
                                         <div class="text-black"
                                             style="margin-left: 10px;font-weight: 600;font-size:16px">
                                             Paid</div>
                                     </div>
                                     <div class="d-flex mt-3">
                                         <div class="div mt-1"
                                             style="height:15px;width:15px;background-color:#00e397!important">
                                         </div>
                                         <div class="text-black"
                                             style="margin-left: 10px;font-weight: 600;font-size:16px">
                                             Unpaid</div>
                                     </div>
                                 </div>

                                 <div class="col-sm-8 pb-3">
                                     <div id="workexpchart2" class="apex-charts label-dark" dir="ltr"
                                         style="height:200px;margin-top:-50px;"></div>
                                 </div>
                             </div>

                         </div>
                     </div>

                     <div class="card mb-0 border-2" style="height:225px">
                         <div class="card-body">
                             <div class="card-title">
                                 <h6 class="text-black" style="font-size:18px">Academic
                                     Credit</h6>
                             </div>
                             <div class="row py-3">
                                 <div class="col-sm-4">
                                     <div class="d-flex">
                                         <div class="div mt-1"
                                             style="height:15px;width:15px;background-color:#008ffb!important">
                                         </div>
                                         <div class="text-black"
                                             style="margin-left: 10px;font-weight: 600;font-size:16px">
                                             Credit</div>
                                     </div>
                                     <div class="d-flex mt-3">
                                         <div class="div mt-1"
                                             style="height:15px;width:15px;background-color:#00e397!important">
                                         </div>
                                         <div class="text-black"
                                             style="margin-left: 10px;font-weight: 600;font-size:16px">
                                             Not to
                                             Credit</div>
                                     </div>
                                 </div>
                                 <div class="col-sm-8 pb-3">
                                     <div id="workexpchart3" class="apex-charts" dir="ltr"
                                         style="height:200px;margin-top:-50px"></div>
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
    series: <?= json_encode($work_data['Experiential Learning Type']['values']); ?>,
    chart: {
        type: 'donut',
        height: 630
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
    labels: <?= json_encode($work_data['Experiential Learning Type']['labels']) ?>,
    formatter: function(val) {
        return val + "%"
    },
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

var chart = new ApexCharts(document.querySelector("#workexpchart1"), options);
chart.render();


var options = {
    series: <?= json_encode($work_data['Pay Status']['percentages']) ?>,
    chart: {
        type: 'donut',
        height: 200
    },
    dataLabels: {
        enabled: true, // Ensuring data labels are visible
        style: {
            textShadow: false,
            colors: ['#fff',] // Setting data label text color to black
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                style: {
                    colors: ['#fff'] // Ensure black color is applied
                }
            }
        }
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($work_data['Pay Status']['labels']) ?>,
    tooltip: {
        y: {
            formatter: function(val) {
                return val + "%"; // Moved inside tooltip where it belongs
            }
        }
    },
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

var chart = new ApexCharts(document.querySelector("#workexpchart2"), options);
chart.render();



var options = {
    series: <?= json_encode($work_data['Academic Credit']['percentages']) ?>,
    chart: {
        type: 'donut',
        height: 200,
    },
    legend: {
        show: false
    },
    labels: <?= json_encode($work_data['Academic Credit']['labels']) ?>,
    formatter: function(val) {
        return val + "%"
    },
    plotOptions: {
        pie: {
            dataLabels: {
                style: {
                    colors: ['#000000'],
                },
            }
        }
    },
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

var chart = new ApexCharts(document.querySelector("#workexpchart3"), options);
chart.render();
 </script>