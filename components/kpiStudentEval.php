<?php 
error_reporting(E_ALL);
ini_set('display_errors', '0');
// KPI Data

// Individually setting KPI Data (Will change as per filters)

use function PHPSTORM_META\type;

$org_logo = $kpi_data['logo'];
$total_evaluator = $kpi_data['evaluator'];
$total_students = $kpi_data['student'];
$average_duration = $kpi_data['average_duration'];
$org_name = $kpi_data['org_name'];
$logoExists = False;
if($org_logo != "https://cri-organization-logos.s3.amazonaws.com/general/career-launch.png"):
    $logoExists = True;
endif;

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
    <!-- <div class="col-sm-6 col-lg-3">
        <div class="card text-center" style="height: 153px;">
            <div class="card-body" style="height: 100%;align-content: center;">
                <img class="img img-fluid lazy" src="<?= $org_logo ?>" alt="logo-dark"
                    style="object-fit: cover;max-height:100%">
            </div>
        </div>
    </div> -->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center" style="height: 153px;">
            <div class="card-body d-flex justify-content-center align-items-center text-container">
                <?php if (!empty($org_logo) && $logoExists):  ?>
                    <img class="img img-fluid lazy" src="<?= $org_logo ?>" alt="org_logo"
                        style="object-fit: cover; max-height: 100%;">
                <?php else : ?>
                    <span class="org-name"><?= htmlspecialchars($org_name) ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Students</h4>
                <h2 class="mt-3 mb-2"><b>
                        <?=$total_students[0]?> </b></h2>
                <p class="mb-0 text-black mt-3"><b><?=$total_students[1]?></b>
                    New Today</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Evaluator</h4>
                <h2 class="mt-3 mb-2"><b>
                        <?=$total_evaluator[0]?></b></h2>
                <p class="mb-0 text-black mt-3"><b> <?=$total_evaluator[1]?></b>
                   New Today</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-center">
            <div class="card-body p-t-10">
                <h4 class="card-title text-muted mb-0">Average
                    Duration</h4>
                <h2 class="mt-3 mb-2"><b>
                        <?=$minutes?> min <?=$seconds?>s </b>
                </h2>
                <p class="mb-0 text-black mt-3"><b><?=$average_duration[1]?>%</b>
                    from Last Week</p>
            </div>
        </div>
    </div>
</div>