<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="headingCommunication">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "communication_results", "communication", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png", "communication") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCommunication"
                            aria-expanded="false" aria-controls="collapseCommunication">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="collapseCommunication" class="accordion-collapse collapse" aria-labelledby="headingCommunication" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["communication"], "communication"); ?>
                <div class="card-body pb-1 pt-3">
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

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingTwo">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "teamwork_results", "teamwork", "Teamwork","./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png","teamwork") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo"
                            aria-expanded="false" aria-controls="flush-collapseTwo">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["teamwork"], "teamwork"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Teamwork"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingThree">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "self_development_results","career-development", "Career & Self Development","./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png","self_development") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree"
                            aria-expanded="false" aria-controls="flush-collapseThree">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["self_development"], "career-development"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Career & Self Development"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingFour">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "professionalism_results","professionalism", "Professionalism","./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png","professionalism") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour"
                            aria-expanded="false" aria-controls="flush-collapseFour">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["professionalism"], "professionalism"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Professionalism"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingFive">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "leadership_results","leadership", "Leadership","./assets/images/nace-icons/nace-leadership-black-line-art-icon.png","leadership") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive"
                            aria-expanded="false" aria-controls="flush-collapseFive">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["leadership"], "leadership"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Leadership"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingSix">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "critical_thinking_results","critical-thinking", "Critical Thinking","./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png","critical_thinking") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSix"
                            aria-expanded="false" aria-controls="flush-collapseSix">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["critical_thinking"], "critical-thinking"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Critical Thinking"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-3 d-md-none"></div>

    <div class="accordion-item">
        <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingSeven">
            <div class="row align-items-center">
            <?= generate_competency_results($competency_data, "technology_results","technology", "Technology","./assets/images/nace-icons/nace-technology-black-line-art-icon.png","technology") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                    <button class="accordion-button collapsed btn-up"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSeven"
                            aria-expanded="false" aria-controls="flush-collapseSeven">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" >
            <div class="accordion-body">
                <?= generate_competency($competency_data["technology"], "technology"); ?>
                <div class="card-body pb-1 pt-3">
                    <h4 class="card-title text-black mb-3 fw-bold px-2">
                        Recommendations
                    </h4>

                    <div class="card border-2">
                        <div class="card-body" style="color:black">
                            <?= $recommendations["Technology"] ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <?php 
        if(isset($competency_data["equity"])){                                
    ?>

        <div class="py-3 d-md-none"></div>


        <div class="accordion-item">
            <h2 class="accordion-header card-body competency_result py-md-4 py-0" id="flush-headingEight">
                <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "equity_results","equity", "Equity & Inclusion","./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png","equity") ?>
                    <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center py-2 py-md-0 accordion-button-wrapper">
                        <button class="accordion-button collapsed btn-up"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseEight"
                                aria-expanded="false" aria-controls="flush-collapseEight">
                            <span class="d-md-none text-nowrap px-2 text-dark fs-6 fw-bold">View All</span>
                        </button>
                    </div>
                </div>
                

            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" >
                <div class="accordion-body">
                    <?= generate_competency($competency_data["equity"], "equity"); ?>
                    <div class="card-body pb-1 pt-3">
                        <h4 class="card-title text-black mb-3 fw-bold px-2">
                            Recommendations
                        </h4>

                        <div class="card border-2">
                            <div class="card-body" style="color:black">
                                <?= $recommendations["Equity & Inclusion"] ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php 
        }
    ?>

    <!-- Repeat this structure for each competency -->
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
    const accordions = document.querySelectorAll('.accordion-collapse');

    accordions.forEach(function (accordion) {
        const collapseId = accordion.id;
        const button = document.querySelector(`button[data-bs-target="#${collapseId}"]`);
        const span = button?.querySelector('.d-md-none');

        if (button && span) {
            accordion.addEventListener('show.bs.collapse', function () {
                span.textContent = 'Close';
            });

            accordion.addEventListener('hide.bs.collapse', function () {
                span.textContent = 'View All';
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var accordionItems = document.querySelectorAll('.accordion .accordion-item');
    if (accordionItems.length > 0) {
        accordionItems[accordionItems.length - 1].style.borderBottom = 'none';
    }
});
</script>

