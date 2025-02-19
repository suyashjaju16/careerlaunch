<div class="card px-3">
                            <?php 
                            $eval_pad = $competency_data['overall_career_readiness_results']['evaluator'] == null ? "" : "pt-0";
                            ?>
                            <div class="card-body <?=$eval_pad?> pe-0">
                                <?php 
                                if($competency_data["overall_career_readiness_results"]["evaluator"] != null){ 
                                    ?>
                                <div class="row p-0 mt-2">
                                    <div class="col-sm-12 p-0">
                                        <div class="d-flex float-end align-content-center">
                                            <div class="mt-1">
                                                <h5 class="font-size-14 text-black"> Evaluator Data</h5>
                                            </div>
                                            <div style="margin-left:5px">
                                                <div class="form-check form-switch" style="width:fit-content!important">
                                                    <input class="form-check-input bg-success" type="checkbox"
                                                        role="switch" id="evaluator_switch" onclick="eval_toggle()"
                                                        checked>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } 
                                
                                ?>
                                <div class="row align-items-center" style="padding-left: 12px;">
                                    <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                        style="width:23.5%;background-color:#323c48!important">
                                        <img class="img-fluid" src="./assets/images/ocr.png"
                                            style="height: 70px;width: 70px;margin: auto;">
                                        <h3 class="px-2 icon-text text-dark mb-0"
                                            style="color: white!important;font-size: 18px;font-weight: 700;">
                                            Overall Career Readiness
                                        </h3>
                                    </div>
                                    <div class="col-sm-9 mt-4 px-3">
                                        <?php
                                        $evaluator_value = intval(json_encode($competency_data["overall_career_readiness_results"]["evaluator"])); 
                                        if($competency_data["evaluator"])
                                        {
                                        ?>
                                        <div class="progress mb-3 bg-white evalu"
                                            style="margin-bottom:32px!important;margin-left:37px;">
                                            <div class="progress-bar animated-progress " role="progressbar"
                                                data-width="<?= $evaluator_value-6; ?>" aria-valuemin="0"
                                                aria-valuemax="100" style="max-width:86%;background-color:#000000">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                <?= $evaluator_value > 0 ? $evaluator_value : "" ?>
                                            </div>
                                            <?php 
                                            ?>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b> Evaluator </b>
                                            </p>
                                        </div>
                                        <?php } 

                                        $pre_value = intval(json_encode($competency_data["overall_career_readiness_results"]["pre"]));
                                         if($competency_data["pre"])
                                        {
                                            $pre_hide = $competency_data['overall_career_readiness_results']['evaluator'] == null ? "" : "display:none";
                                            $val = intval(json_encode($competency_data["overall_career_readiness_results"]["pre"]));
                                            $color = returnColor($val);
                                            $self_label = $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Pre" : "Self";
                                            $self_label = $GLOBALS["implementation_time"] == "general" ? "" : $self_label;
                                        ?>
                                        <div class="progress mb-3 pre-bar bg-white"
                                            style="margin-bottom:32px!important;margin-left:37px;<?=$pre_hide?>;">
                                            <div class="progress-bar animated-progress" role="progressbar"
                                                data-width="<?= $pre_value-6; ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="width:<?= $pre_value; ?>%;max-width:86%;background-color:<?=$color?>">
                                            </div>
                                            <div class="progress-value"
                                                style="font-size:16px;background-color:<?=$color?>">
                                                <?= $pre_value > 0 ? $pre_value : "" ?>
                                            </div>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b class="self_label pre-label">
                                                    <?= $self_label ?></b>
                                            </p>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <?php } 
                                        $post_value = intval(json_encode($competency_data["overall_career_readiness_results"]["post"]));
                                        if($competency_data["post"])
                                        {
                                            $color = returnColor($post_value);
                                            $self_label = $competency_data["overall_career_readiness_results"]['evaluator'] == null ? "Post" : "Self";
                                            $self_label = $GLOBALS["implementation_time"] == "general" ? "" : $self_label;
                                            ?>
                                        <div class="progress mb-3 post-bar bg-white"
                                            style="margin-bottom:32px!important;margin-left:37px;">
                                            <div class="progress-bar animated-progress" role="progressbar"
                                                data-width="<?= $post_value-6 ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="max-width:86%;background-color:<?=$color?>">
                                            </div>
                                            <div class="progress-value"
                                                style="font-size:16px;background-color:<?=$color?>">
                                                <?= $post_value > 0 ? $post_value : ""?>
                                            </div>
                                            <p style="position:relative;margin-top:-12px;font-size:18px;color:black">
                                                <b class="self_label post-label">
                                                    <?=$self_label?></b>
                                            </p>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <?php } ?>
                                    </div>

                                    <!-- <div class="col-sm-1">
                                        <?php 
                                            if($evaluator_value >= 85)
                                            {
                                            ?>
                                        <p style="font-size:17px;margin-top:20px;color:black">
                                            <b class="self_label post-label">
                                                Evaluator </b>
                                        </p>
                                        <?php 
                                            }
                                            
                                            if($pre_value >= 85)
                                            {
                                                ?>
                                        <p style="font-size:18px;color:black;margin-bottom:32px">
                                            <b class="self_label pre-label">
                                                <?= $self_label ?> </b>
                                        </p>
                                        <?php }
                                        
                                            if($post_value >= 85)
                                            {
                                        ?>
                                        <p style="font-size:18px;color:black;margin-bottom:32px">
                                            <b class="self_label post-label">
                                                <?= $self_label ?> </b>
                                        </p>
                                        <?php }?>
                                    </div> -->

                                </div>
                            </div>
                        </div>