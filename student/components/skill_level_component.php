<?php
    function skill_level_component($skill_name, $skill_icon, $pre_score, $post_score, $blue_label, $red_label, $blue_threshold, $user_image = null, $overview, $recommendations) {
?>
    <div class="card my-4 skill-level-component">
        <div class="card-body py-3">
            <div class="row align-items-center">
                <div class="col-md-3 col-12">
                    <div class="d-flex flex-row flex-md-column align-items-center justify-content-center py-2 skill-label" style="background-color: #323c48; border-radius: 10px;">
                        <img class="img-fluid" src="<?php echo $skill_icon; ?>" style="height: 50px; width: 50px; object-fit: contain;">
                        <h4 class="ms-2 ms-md-0 mt-md-2 mb-0 text-white text-wrap text-center"><?php echo $skill_name; ?></h4>
                    </div>
                </div>

                <div class="col-md-8 col-12 py-4">
                    <div class="progress skill-progress bg-white position-relative">
                        <?php if ($pre_score !== null) { ?>
                            <div class="progress-bar pre-bar animated-progress" style="width: <?php echo $pre_score; ?>%; background-color: #6da97c;"></div>
                            <div class="progress-value pre-value" style="left: <?php echo $pre_score; ?>%;"><?php echo $pre_score; ?></div>
                        <?php } ?>
                        <div class="progress-bar post-bar animated-progress" style="width: <?php echo $post_score; ?>%; background-color: #428bca;"></div>
                        <div class="progress-value post-value" style="left: <?php echo $post_score; ?>%;"><?php echo $post_score; ?></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2 skill-scale-labels">
                        <span class="badge bg-primary"><?php echo $blue_label; ?></span>
                        <span class="badge bg-danger"><?php echo $red_label; ?></span>
                    </div>
                </div>

                <div class="col-md-1 col-12 text-end">
                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo preg_replace('/\s+/', '', $skill_name); ?>">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </div>
            </div>

            <div class="collapse" id="collapse_<?php echo preg_replace('/\s+/', '', $skill_name); ?>">
                <div class="mt-3 card card-body">
                    <h5><strong>Overview:</strong></h5>
                    <p><?php echo $overview; ?></p>

                    <h5><strong>Recommendations:</strong></h5>
                    <ul>
                        <?php foreach ($recommendations as $recommendation) { ?>
                            <li><?php echo $recommendation; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
