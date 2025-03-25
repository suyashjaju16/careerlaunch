<?php
require_once __DIR__ . '/../functions.php';

function skill_level_component($competency_data, $skill_name, $blue_label, $red_label, $overviews, $recommendations) {
?>

<div class="accordion accordion-flush" id="accordionFlushExample2">
        <div class="accordion-item">

            <div class="accordion-header card-body competency_result py-md-4 py-0" id="headingCommunication2">
                <div class="row align-items-center">

                    <div class="col-md-3 col-12 text-center text-md-left d-flex align-items-center justify-content-center header-title order-1 order-md-0 mt-3 mb-1 mt-md-0">
                        <h3 class="text-black mb-0 fs-4">Skill Level</h3>
                        <a tabindex="0" href="#" class="d-md-none text-dark fs-2 popover-trigger" onclick="return false;">
                            <i class="mdi mdi-information-outline"></i>
                        </a>
                    </div>

                    <div class="col-md-8 col-12 order-md-1 order-2">

                        <?php 
                            $labels = [
                                ['text' => 'Emerging Social Capital Development', 'class' => 'bg-emerging'],
                                ['text' => 'Advanced Social Capital Development', 'class' => 'bg-danger']
                            ];
                            echo get_ruler_labels($labels);
                        ?> 

                        <?php echo get_ruler_html(); ?>

                    </div>
                    <!-- Info Icon (Popover) -->
                    <div class="col-sm-1 d-none d-md-flex justify-content-center align-content-center order-md-2 order-3">
                        <a href="#" class="text-dark fs-1 popover-trigger" onclick="return false;">
                            <i class="mdi mdi-information-outline"></i>
                        </a>
                    </div>
                        <?php 
                            $orderData = [
                                "desktop" => [3, 4],
                                "mobile" => [0, 4]
                            ];
                            
                            echo generate_competency_results($competency_data, "communication_results", "communication", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png", "communication", $orderData); 
                        ?>

                    <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper order-5 order-md-5">
                        <button class="accordion-button collapsed btn-up"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseCommunication"
                                aria-expanded="false" aria-controls="collapseCommunication">
                            <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                        </button>
                    </div>
                </div>
                

            </div>
            <div id="collapseCommunication" class="accordion-collapse collapse" aria-labelledby="headingCommunication2" >
                <div class="accordion-body">
                    <div class="mx-2" style="height:1px; border-top: 1px solid #0000001f;" ></div> 
                    <div class="card-body pb-1 pt-3">
                        <?php foreach ($overviews as $overview) { ?>
                            <div class="card border-2">
                                <div class="card-body" style="color:black">
                                    <?= $overview ?>
                                </div>
                            </div>
                        <?php } ?>
                        <h4 class="card-title text-black mb-3 fw-bold px-2">
                            Recommendations
                        </h4>

                        <div class="card border-2">
                            <div class="card-body" style="color:black">
                                <?= $recommendations["Communication"] ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</div>

    <!-- Hidden Popover Content (Stored in a Single Place) -->
<div id="popover-content" class="d-none">
    <div class='badge text-black px-3 py-2 fw-bold bg-emerging fs-5'>Emerging Knowledge</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student has an emerging awareness of the behavior, its importance, and related concepts.</p>
    <div class='badge bg-success text-black px-3 py-2 fw-bold  fs-5'>Understanding</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student demonstrates an understanding of the behavior and related concepts.</p>
    <div class='badge bg-warning text-black px-3 py-2 fw-bold  fs-5'>Early Application</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student sometimes applies the behavior.</p>
    <div class='badge bg-danger text-black px-3 py-2 fw-bold  fs-5'>Advanced Application</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The behavior is consistent and integrated into the student’s workplace behaviors.</p>
</div>

<?php
    }
?>

<!-- Enable Bootstrap Popovers & Set Triggers Based on Screen Size -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popoverContent = document.getElementById('popover-content').innerHTML;

        var popoverTriggerList = [].slice.call(document.querySelectorAll('.popover-trigger'));

        popoverTriggerList.forEach(function (popoverTriggerEl) {
            var triggerType = window.innerWidth < 768 ? 'click' : 'hover focus'; // Click for mobile, hover for desktop

            new bootstrap.Popover(popoverTriggerEl, {
                html: true,
                content: popoverContent,
                trigger: triggerType
            });
        });

        // Close popovers when clicking outside (For mobile)
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.popover-trigger')) {
                var popovers = document.querySelectorAll('.popover');
                popovers.forEach(function (popover) {
                    popover.remove(); // Removes all open popovers when clicking outside
                });
            }
        });
    });

</script>
