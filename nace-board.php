<?php
function renderCompetencyQuestion($categoryName, $categoryData) {
    foreach ($categoryData as $subCategory => $values) {
        ?>
<div class="card upcard border-2">
    <div class="row w-100 align-items-center">
        <div class="col-sm-3 text-center mb-0 align-content-center">
            <p class="px-2 icon-text text-dark mb-0"
                style="font-size: 18px;font-weight: 700;padding-left: 15px!important;">
                <?= htmlspecialchars($subCategory) ?>
            </p>
        </div>
        <div class="col-sm-8" style="margin:auto">
            <div class="grid1 mt-4 mb-4" style="grid-column-gap : 8px;margin-left:-16px">
                <?php
                        $levels = ['Emerging Knowledge', 'Understanding', 'Early Application', 'Advanced Application'];
                        $colors = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger'];
                        foreach ($levels as $index => $level) {
                            $isMax = isset($values['Max'][1]) && $values['Max'][1] == $level ? "border border-dark border-5 max-border" : '';
                            ?>
                <div class="align-items-center card <?= $colors[$index] ?> p-1 <?= $isMax ?>"
                    style="width:80%;margin:auto;<?= $index > 0 ? 'margin-left:9px;' : '' ?>">
                    <h4 class="text-white mt-2">
                        <?= intval($values[$level][0] ?? 0); ?>%
                    </h4>
                </div>
                <?php
                        }
                        ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
}

// foreach ($comp_q_data as $categoryName => $categoryData) {
//     echo "<h2>" . htmlspecialchars($categoryName) . "</h2>";
//     renderCompetencyQuestion($categoryName, $categoryData);
// }
?>

<div id="nace">
    <div class="page-content p-0">
        <div class="container-fluid">
            <!-- Overall Career Readiness -->
            <div class="row">
                <div class="col-sm-12 px-0">
                    <div class="card">
                        <div class="card-body">
                            <!-- <div class="card"> -->
                            <div class="card-body">
                                <h5 class="card-title text-black mb-5">
                                    Overall Career Readiness
                                </h5>
                                <div class="row mt-3" style="width:94%;margin:auto">
                                    <div class="col-lg-3">
                                        <div class="card upcard border-2 d-flex align-content-center flex-wrap">
                                            <!-- <div class="card body"> -->
                                            <div class="text-center" dir="ltr">
                                                <h4 class="font-size-18 mb-3 mt-3" style="font-weight:700">
                                                    Emerging
                                                    Knowledge</h4>

                                                <div class="gauge-container" style="margin-left: 15px;">
                                                    <svg class="gauge" viewBox="-2 -2 50 50">
                                                        <!-- Updated viewBox -->
                                                        <path class="gauge-background" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <path id="gauge-emerging-foreground"
                                                            class="gauge-foreground gauge-emerging" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <text x="22" y="21" class="gauge-percentage"
                                                            id="gauge-emerging-percentage"
                                                            style="font-size: 0.7em;font-weight: 700;color: #343A40">0%</text>
                                                    </svg>
                                                </div>

                                                <!-- <input class="knob " data-width="150" data-min="0" data-max="4"
                                                            data-readOnly=true data-fgcolor="#008ffb" -->
                                                <!-- data-displayprevious="true" value="1"> -->
                                                <h5 class="font-size-16 mb-3" style>
                                                    <?= intval($comp_data['overall_career_readiness_results']['Emerging Knowledge'][1]) ?>
                                                    Students
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- </div> -->

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card upcard border-2 d-flex align-content-center flex-wrap">
                                            <div class="text-center" dir="ltr">
                                                <h4 class="font-size-18 mb-3 mt-3" style="font-weight:700">
                                                    Understanding
                                                </h4>

                                                <div class="gauge-container" style="margin-left: 15px;">
                                                    <svg class="gauge" viewBox="-2 -2 50 50">
                                                        <!-- Updated viewBox -->
                                                        <path class="gauge-background" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <path id="gauge-understanding-foreground"
                                                            class="gauge-foreground gauge-understanding" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <text x="22" y="21" class="gauge-percentage"
                                                            id="gauge-understanding-percentage"
                                                            style="font-size: 0.7em;font-weight: 700;color: #343A40">0%</text>
                                                    </svg>
                                                </div>
                                                <h5 class="font-size-16 mb-3">
                                                    <?= intval($comp_data['overall_career_readiness_results']['Understanding'][1]) ?>
                                                    Students</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card upcard border-2 d-flex align-content-center flex-wrap">
                                            <div class="text-center" dir="ltr">
                                                <h4 class="font-size-18 text-black mb-3 mt-3" style="font-weight:700">
                                                    Early
                                                    Application
                                                </h4>
                                                <div class="gauge-container" style="margin-left: 15px;">
                                                    <svg class="gauge" viewBox="-2 -2 50 50">
                                                        <!-- Updated viewBox -->
                                                        <path class="gauge-background" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <path id="gauge-early-foreground"
                                                            class="gauge-foreground gauge-early" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <text x="22" y="21" class="gauge-percentage"
                                                            id="gauge-early-percentage"
                                                            style="font-size: 0.7em;font-weight: 700;color: #343A40">0%</text>
                                                    </svg>
                                                </div>

                                                <h5 class="font-size-16 text-black mb-3">
                                                    <?= intval($comp_data['overall_career_readiness_results']['Early Application'][1]) ?>
                                                    Students</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card upcard border-2 d-flex justify-content-between flex-wrap">
                                            <div class="text-center" dir="ltr">
                                                <h4 class="font-size-18 mb-3 mt-3" style="font-weight:700">
                                                    Advanced
                                                    Application
                                                </h4>
                                                <div class="gauge-container" style="margin-left: 45px;">
                                                    <svg class="gauge" viewBox="-2 -2 50 50">
                                                        <!-- Updated viewBox -->
                                                        <path class="gauge-background" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <path id="gauge-advanced-foreground"
                                                            class="gauge-foreground gauge-advanced" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                                        <text x="22" y="21" class="gauge-percentage"
                                                            id="gauge-advanced-percentage"
                                                            style="font-size: 0.7em;font-weight: 700;color: #343A40">0%</text>
                                                    </svg>
                                                </div>

                                                <h5 class="font-size-16 text-black mb-3">
                                                    <?= intval($comp_data['overall_career_readiness_results']['Advanced Application'][1]) ?>
                                                    Students</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-3 mt-4" style="width:97%;margin:auto">
                                    <div
                                        style="margin-left:<?= $comp_data['overall_career_readiness_results']['Average'] ?>%!important;margin-top:-5px!important">
                                        <b class="font-size-16 text-black">Average</b>
                                    </div>

                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value bg-warning text-black"
                                        style="position:absolute;left:<?= $comp_data['overall_career_readiness_results']['Average'] + 2 ?>%!important;font-size:20px">
                                        <?= intval($comp_data['overall_career_readiness_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['overall_career_readiness_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Competetency Start -->
    <div class="card p-3">
        <div class="sticky-top bg-white">
            <div class="row pt-0 mt-3 mb-3">
                <div class="col-sm-3 align-content-center">
                    <h2 class="mb-0 text-black text-center" style="font-size:20px!important">Career
                        Readiness Level</h2>
                </div>
                <div class="col-sm-8" style="margin:auto">

                    <div class="d-flex justify-content-around" style="width:94%">
                        <div class=" align-content-center text-black" style="font-size:16px;margin-left:-18px">
                            <b>Emerging Knowledge</b>
                        </div>
                        <div class="text-center text-black" style="font-size:16px">
                            <b>Understanding</b>
                        </div>
                        <div class="text-center text-black" style="font-size:16px;margin-left:12px">
                            <b>Early Application</b>
                        </div>
                        <div class="text-center text-black" style="font-size:16px">
                            <b>Advanced
                                Application</b>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingZero">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseZero" aria-expanded="false" aria-controls="flush-collapseZero">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-info align-content-center">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-communication-black-line-art-icon.png"
                                    alt="communication" style="height: 70px;width: 70px;margin: auto;">
                                <h3 class="px-2 icon-text text-dark mb-0"
                                    style="color: white!important;font-size: 18px;font-weight: 700;padding-left: 15px!important;">
                                    Communication
                                </h3>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['communication_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['communication_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['communication_results']['Emerging Knowledge'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['communication_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['communication_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['communication_results']['Understanding'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['communication_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['communication_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['communication_results']['Early Application'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['communication_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['communication_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>(<?= $comp_data['communication_results']['Advanced Application'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['communication_results']['Average'] ?>%!important;font-size:20px;background-color:#00A4FE">
                                        <?= intval($comp_data['communication_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['communication_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>
                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['communication_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseZero" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseZero" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("communication", $comp_q_data['communication']); ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color: #E06B60;">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png"
                                    alt="teamwork" style="height: 70px;width: 70px;margin: auto;">
                                <h3 class="px-2 icon-text text-dark mb-0"
                                    style="color: white!important;font-size:18px!important">
                                    Teamwork </h3>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['teamwork_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['teamwork_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['teamwork_results']['Emerging Knowledge'][1]?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['teamwork_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['teamwork_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['teamwork_results']['Understanding'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['teamwork_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['teamwork_results']['Early Application'][0])?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small> (
                                                <?= $comp_data['teamwork_results']['Early Application'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['teamwork_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['teamwork_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>(<?= $comp_data['teamwork_results']['Advanced Application'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">

                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['teamwork_results']['Average'] ?>%!important;font-size:20px;background-color:#E06B60">
                                        <?= intval($comp_data['teamwork_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['teamwork_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['self_development_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("teamwork", $comp_q_data['teamwork']); ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <div class="row align-items-center p-0 w-100">
                            <div
                                class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-warning align-content-center">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                    alt="self_development" style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Career & Self Development
                                </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['self_development_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['self_development_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['self_development_results']['Emerging Knowledge'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['self_development_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['self_development_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['self_development_results']['Understanding'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['self_development_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['self_development_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= $comp_data['self_development_results']['Early Application'][1] ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['self_development_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['self_development_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['self_development_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">

                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value bg-warning"
                                        style="position:absolute;left:<?= $comp_data['self_development_results']['Average'] ?>%!important;font-size:20px;">
                                        <?= intval($comp_data['self_development_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['self_development_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['self_development_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("self_development", $comp_q_data['self_development']); ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#609866">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png"
                                    alt="professionalism"
                                    style="height: 60px;width: 60px;margin: auto;margin-bottom:6px">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Professionalism </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['professionalism_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['professionalism_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['professionalism_results']['Emerging Knowledge'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['professionalism_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['professionalism_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['professionalism_results']['Understanding'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['professionalism_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['professionalism_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['professionalism_results']['Early Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['professionalism_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['professionalism_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['professionalism_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['professionalism_results']['Average'] ?>%!important;font-size:20px;background-color:#609866">
                                        <?= intval($comp_data['professionalism_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['professionalism_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['professionalism_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("professionalism", $comp_q_data['professionalism']); ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#796258">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-leadership-black-line-art-icon.png"
                                    alt="leadership" style="height: 60px;width: 60px;margin: auto;margin-bottom:7px">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Leadership </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['leadership_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['leadership_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['leadership_results']['Emerging Knowledge'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['leadership_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['leadership_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['leadership_results']['Understanding'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['leadership_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['leadership_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['leadership_results']['Early Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['leadership_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['leadership_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>(<?= intval($comp_data['leadership_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['leadership_results']['Average'] ?>%!important;font-size:20px;background-color:#796258">
                                        <?= intval($comp_data['leadership_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['leadership_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['leadership_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
            </div>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseFive"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?= renderCompetencyQuestion("leadership", $comp_q_data['leadership']); ?>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#705181">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png"
                                    alt="critical_thinking" style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Critical Thinking </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['critical_thinking_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['critical_thinking_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['critical_thinking_results']['Emerging Knowledge'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['critical_thinking_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['critical_thinking_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['critical_thinking_results']['Understanding'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['critical_thinking_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['critical_thinking_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['critical_thinking_results']['Early Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['critical_thinking_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['critical_thinking_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['critical_thinking_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['critical_thinking_results']['Average'] ?>%!important;font-size:20px;background-color:#705181">
                                        <?= intval($comp_data['critical_thinking_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['critical_thinking_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['critical_thinking_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
            </div>

            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseSix"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?= renderCompetencyQuestion("critical_thinking", $comp_q_data['critical_thinking']); ?>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#3c4b6c">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-technology-black-line-art-icon.png"
                                    alt="technology" style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Technology </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['technology_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['technology_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['technology_results']['Emerging Knowledge'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['technology_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['technology_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['technology_results']['Understanding'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['technology_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['technology_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['technology_results']['Early Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['technology_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['technology_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['technology_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['technology_results']['Average'] ?>%!important;font-size:20px;background-color:#3C4B6C">
                                        <?= intval($comp_data['technology_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['technology_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['technology_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseSeven" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseSeven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("technology", $comp_q_data['technology']); ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingEight">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#ad3131">
                                <img class="img-fluid lazy"
                                    src="./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png"
                                    alt="equity" style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Equity & Inclusion </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;margin:auto">
                                <div class="grid1 mt-1" style="line-height:0;">
                                    <div
                                        class="align-items-center card bg-primary px-3 py-2 mb-3 <?= $comp_data['equity_results']['Max'] == "Emerging Knowledge" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['equity_results']['Emerging Knowledge'][0]) ?>%
                                        </h4>
                                        <p class="icon-text pb-1 text-dark mb-0 f-600" style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['equity_results']['Emerging Knowledge'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                    <div
                                        class="align-items-center card bg-success px-3 py-2 mb-3 <?= $comp_data['equity_results']['Max'] == "Understanding" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white mb-1 f-800">
                                            <?= intval($comp_data['equity_results']['Understanding'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['equity_results']['Understanding'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-warning px-3 py-2 mb-3 <?= $comp_data['equity_results']['Max'] == "Early Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class="text-white f-800">
                                            <?= intval($comp_data['equity_results']['Early Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['equity_results']['Early Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>

                                    <div
                                        class="align-items-center card bg-danger px-3 py-2 mb-3 <?= $comp_data['equity_results']['Max'] == "Advanced Application" ? "border border-dark border-0 max-border max-outline" : '' ?>">
                                        <h4 class=" text-white f-800">
                                            <?= intval($comp_data['equity_results']['Advanced Application'][0]) ?>%
                                        </h4>
                                        <p class="px-2 pb-1 icon-text text-dark mb-0 f-600"
                                            style="color: white!important;">
                                            <small>
                                                (<?= intval($comp_data['equity_results']['Advanced Application'][1]) ?>
                                                Students)</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3" style="width:100%;margin:auto">
                                    <div class="ruler mt-4">
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>

                                    <div class="progress-value"
                                        style="position:absolute;left:<?= $comp_data['equity_results']['Average'] ?>%!important;font-size:20px;background-color:#AD3131">
                                        <?= intval($comp_data['equity_results']['Average']) ?>
                                    </div>

                                    <div class="digit-ruler" style="margin-top:15px">
                                        <?php 
                                                $avg = intval($comp_data['equity_results']['Average']);
                                                if($avg == 0)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>0</div>";

                                                    if($avg == 25)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>25</div>";

                                                    if($avg == 50)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>50</div>";

                                                    if($avg == 75)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>75</div>";

                                                    if($avg == 100)
                                                    echo "<div class='digit'></div>";
                                                else
                                                    echo "<div class='digit'>100</div>";
                                             ?>

                                    </div>

                                    <div class="mt-2"
                                        style="margin-left:<?= $comp_data['equity_results']['Average'] - 2 ?>%!important;">
                                        <b class="font-size-14 text-black">Average</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseEight" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseEight" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= renderCompetencyQuestion("equity", $comp_q_data['equity']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript here incomplete -->
    <div class="card">
        <div class="card-body p-5">
            <h5 class="card-title text-black mb-5">
                Competency Comparison
            </h5>
            <div class="row align-content-center">
                <div class="col-sm-1 align-content-center">
                    <div class="d-flex justify-content-center"
                        style="transform: rotate(270deg);width: 745%; height: -webkit-fill-available;">
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
                <div class="col-sm-5 p-4 border border-2" style="border-radius:20px">
                    <h5 class="card-title text-black mb-2">
                        The Skills Employers Value Most
                    </h5>
                    <div class="row bg-light comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-info text-white">
                            1 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center comm-hov">Communication
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #E06B60;">
                            2 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center team-hov">Teamwork</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #A056E6;">
                            3 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center critical-hov">Critical
                            Thinking
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-success text-white">
                            4 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center professionalism-hov">
                            Professionalism
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color:#ad3131">
                            5 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center equity-hov">Equity
                            & Inclusion</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #556B9B;">
                            6 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center tech-hov">Technology
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-warning text-white">
                            7 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center career-hov">Career
                            &
                            Self-Development</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #796258;">
                            8 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center leadership-hov">
                            Leadership
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 p-4 border border-2" style="border-radius:20px">
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
                    foreach ($averages as $category => $info) {
                            // echo "$category : {$info['color']}<br>";
                            if($category != "overall_career_readiness_results"){
                    ?>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color:<?=$info['color']?>">
                            <?= $count ?> </div>
                        <div class="col-sm-9 p-3 align-items-center text-center <?= $hoverColorsClass[$category] ?>">
                            <?= $category ?>
                        </div>
                    </div>
                    <?php $count++; } } ?>
                    <!-- </div> -->
                    <!-- <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #E06B60;">
                            2 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center team-hov">Teamwork</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #A056E6;">
                            3 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center critical-hov">Critical
                            Thinking
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-success text-white">
                            4 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center professionalism-hov">
                            Professionalism
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-danger text-white">
                            5 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center equity-hov">Equity
                            & Inclusion</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #556B9B;">
                            6 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center tech-hov">Technology
                        </div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center bg-warning text-white">
                            7 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center career-hov">Career
                            &
                            Self-Development</div>
                    </div>
                    <div class="row bg-light mt-2 comp">
                        <div class="col-sm-3 p-3 align-items-center text-center text-white"
                            style="background-color: #796258;">
                            8 </div>
                        <div class="col-sm-9 p-3 align-items-center text-center leadership-hov">
                            Leadership
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>

    <div class="accordion mb-3" id="accordionWork">
        <?php 
                    if(isset($_POST['implementation_type'])){
                        if($_POST['implementation_type'] == "work-exp")
                            include("workexperience.php");
                    }

                        

                    include("demographics.php");
                   ?>
    </div>
</div>