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
                                    <path id="gauge-emerging-foreground" class="gauge-foreground gauge-emerging" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                    <text x="22" y="21" class="gauge-percentage" id="gauge-emerging-percentage"
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
                                    <text x="22" y="21" class="gauge-percentage" id="gauge-understanding-percentage"
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
                                    <path id="gauge-early-foreground" class="gauge-foreground gauge-early" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                    <text x="22" y="21" class="gauge-percentage" id="gauge-early-percentage"
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
                                    <path id="gauge-advanced-foreground" class="gauge-foreground gauge-advanced" d="M21 2.1
                                                                        a 18.9 18.9 0 0 1 0 37.8
                                                                        a 18.9 18.9 0 0 1 0 -37.8" />
                                    <text x="22" y="21" class="gauge-percentage" id="gauge-advanced-percentage"
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


                <div class="ruler mt-4">
                    <div class="tick"></div>
                    <div class="tick"></div>
                    <div class="tick"></div>
                    <div class="tick"></div>
                    <div class="tick"></div>
                </div>
                <div
                    style="position:absolute;left:<?= $comp_data['overall_career_readiness_results']['Average'] + 2 ?>%!important;margin-top:-47px">
                    <center>
                        <div style="margin-top:3px!important">
                            <b class="font-size-16 text-black">Average</b>
                        </div>
                        <div class="progress-value bg-warning text-black" style="font-size:20px;margin-top:1px">
                            <?= intval($comp_data['overall_career_readiness_results']['Average']) ?>
                        </div>
                    </center>
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

<script>
function setEmergingGaugeValue(percentage) {
    const gauge = document.getElementById('gauge-emerging-foreground');
    const text = document.getElementById('gauge-emerging-percentage');
    percentage = Math.max(0, Math.min(percentage, 100));

    let dashArrayValue = (percentage * 100) / 100;

    // Special handling for 0% and 100%
    if (percentage === 0) {
        gauge.style.strokeDasharray = `0, 1000`;  // A small arc for 0%
    } else if (percentage === 100) {
        gauge.style.strokeDasharray = `0, 1`;  // Full gauge fill
    } else {
        gauge.style.strokeDasharray = `${dashArrayValue+6}, 100`;  // Dynamic gauge fill
    }
    text.textContent = `${percentage}%`;
}
setEmergingGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Emerging Knowledge'][0]) ?>);
// setEmergingGaugeValue(75);

function setUnderstandingGaugeValue(percentage) {
    const gauge = document.getElementById('gauge-understanding-foreground');
    const text = document.getElementById('gauge-understanding-percentage');
    percentage = Math.max(0, Math.min(percentage, 100));  // Ensuring the percentage is between 0 and 100

    let dashArrayValue = (percentage * 100) / 100;

    // Special handling for 0% and 100%
    if (percentage === 0) {
        gauge.style.strokeDasharray = `0, 1000`;  // A small arc for 0%
    } else if (percentage === 100) {
        gauge.style.strokeDasharray = `0, 1`;  // Full gauge fill
    } else {
        gauge.style.strokeDasharray = `${dashArrayValue+6}, 100`;  // Dynamic gauge fill
    }
    text.textContent = `${percentage}%`;
}

setUnderstandingGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Understanding'][0]) ?>);

function setEarlyGaugeValue(percentage) {
    const gauge = document.getElementById('gauge-early-foreground');
    const text = document.getElementById('gauge-early-percentage');
    percentage = Math.max(0, Math.min(percentage, 100));  // Ensuring the percentage is between 0 and 100

    let dashArrayValue = (percentage * 100) / 100;

    // Special handling for 0% and 100%
    if (percentage === 0) {
        gauge.style.strokeDasharray = `0, 1000`;  // A small arc for 0%
    } else if (percentage === 100) {
        gauge.style.strokeDasharray = `0, 1`;  // Full gauge fill
    } else {
        gauge.style.strokeDasharray = `${dashArrayValue+6}, 100`;  // Dynamic gauge fill
    }
    text.textContent = `${percentage}%`;
}

setEarlyGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Early Application'][0]) ?>);

function setAdvancedGaugeValue(percentage) {
    const gauge = document.getElementById('gauge-advanced-foreground');
    const text = document.getElementById('gauge-advanced-percentage');
    percentage = Math.max(0, Math.min(percentage, 100));  // Ensuring the percentage is between 0 and 100

    let dashArrayValue = (percentage * 100) / 100;

    // Special handling for 0% and 100%
    if (percentage === 0) {
        gauge.style.strokeDasharray = `0, 1000`;  // A small arc for 0%
    } else if (percentage === 100) {
        gauge.style.strokeDasharray = `0, 1`;  // Full gauge fill
    } else {
        gauge.style.strokeDasharray = `${dashArrayValue+6}, 100`;  // Dynamic gauge fill
    }
    text.textContent = `${percentage}%`;
}

setAdvancedGaugeValue(<?= intval($comp_data['overall_career_readiness_results']['Advanced Application'][0]) ?>);
</script>