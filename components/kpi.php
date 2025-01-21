<?php 
// KPI Data


// Individually setting KPI Data (Will change as per filters)
$org_logo = $kpi_data['logo'];
$total_student_responses = $kpi_data['total_student_responses'];
$total_students = $kpi_data['total_students'];
$average_duration = $kpi_data['average_duration'];

// Break time from Seconds of Minutes and Seconds
if(is_numeric($average_duration[0])){
    $minutes = floor($average_duration[0] / 60);
    $seconds = $average_duration[0] % 60;        
}
else{
    $minutes = 0;
    $seconds = 0;
}
// echo "KPI : ".json_encode($data);
// echo json_encode($kpi_data);
?>
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-center" style="height: 153px;">
            <div class="card-body" style="height: 100%;align-content: center;">
                <img class="img img-fluid lazy" src="<?= $org_logo ?>" alt="logo-dark"
                    style="object-fit: cover;max-height:100%">
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Students</h4>
                <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                        <?=$total_students[0]?> </b></h2>
                <p class="mb-0 text-black mt-3"><b><?=$total_students[1]?>%</b>
                    from Last Week</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Responses</h4>
                <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>
                        <?=$total_student_responses[0]?></b></h2>
                <p class="mb-0 text-black mt-3"><b> <?=$total_student_responses[1]?>%</b>
                    from Last Week</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Average
                    Duration</h4>
                <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>
                        <?=$minutes?> min <?=$seconds?>s </b>
                </h2>
                <p class="mb-0 text-black mt-3"><b><?=$average_duration[1]?>%</b>
                    from Last Week</p>
            </div>
        </div>
    </div>
</div>