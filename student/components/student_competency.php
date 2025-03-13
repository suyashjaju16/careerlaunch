<div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item" style="border-top:0px!important">
                                    <h2 class="accordion-header" id="flush-headingZero">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseZero"
                                            aria-expanded="false" aria-controls="flush-collapseZero">

                                            <?= generate_competency_results($competency_data, "communication_results","#3ca4fe", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png","communication") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseZero" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseZero"
                                        data-bs-parent="#accordionFlushExample">
                                        <?= generate_competency($competency_data["communication"],"#3ca4fe"); ?>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                <?= $recommendations["Communication"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <?= generate_competency_results($competency_data, "teamwork_results","#E06B60", "Teamwork","./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png","teamwork") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseTwo"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["teamwork"], "#E06B60"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">

                                                <?= $recommendations["Teamwork"] ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <?= generate_competency_results($competency_data, "self_development_results","#f8b603", "Career & Self Development","./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png","self_development") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseOne"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["self_development"],"#f8b603"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                <?= $recommendations["Career & Self Development"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            <?= generate_competency_results($competency_data, "professionalism_results","#609866", "Professionalism","./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png","professionalism") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseFour"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["professionalism"],"#609866"); ?>
                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                <?= $recommendations["Professionalism"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            <?= generate_competency_results($competency_data, "leadership_results","#796258", "Leadership","./assets/images/nace-icons/nace-leadership-black-line-art-icon.png","leadership") ?>
                                        </button>
                                    </h2>
                                </div>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?= generate_competency($competency_data["leadership"],"#796258"); ?>
                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                <?= $recommendations["Leadership"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSix">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSix"
                                            aria-expanded="false" aria-controls="flush-collapseSix">
                                            <?= generate_competency_results($competency_data, "critical_thinking_results","#705181", "Critical Thinking","./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png","critical_thinking") ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="flush-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="flush-flush-collapseSix" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?= generate_competency($competency_data["critical_thinking"],"#705181"); ?>

                                        <h5 class="card-title text-black mb-3">
                                            Recommendations
                                        </h5>

                                        <div class="card border-2">
                                            <div class="card-body" style="color:black">
                                                 <?= $recommendations["Critical Thinking"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSeven">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven"
                                            aria-expanded="false" aria-controls="flush-collapseSeven">
                                            <?= generate_competency_results($competency_data, "technology_results","#3c4b6c", "Technology","./assets/images/nace-icons/nace-technology-black-line-art-icon.png","technology") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseSeven"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= generate_competency($competency_data["technology"],"#3c4b6c"); ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                <?= $recommendations["Technology"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    if(isset($competency_data["equity"])){                                
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingEight">
                                        <button class="accordion-button collapsed btn-up" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseEight"
                                            aria-expanded="false" aria-controls="flush-collapseEight">
                                            <?= generate_competency_results($competency_data, "equity_results","#ad3131", "Equity & Inclusion","./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png","equity") ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseEight" class="accordion-collapse collapse"
                                        aria-labelledby="flush-flush-collapseEight"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= isset($competency_data["equity"]) ? generate_competency($competency_data["equity"],"#ad3131") : "" ?>

                                            <h5 class="card-title text-black mb-3">
                                                Recommendations
                                            </h5>

                                            <div class="card border-2">
                                                <div class="card-body" style="color:black">
                                                    <?= $recommendations["Equity & Inclusion"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>