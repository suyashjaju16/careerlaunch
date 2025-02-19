<div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 style="margin-left:20px"><b>NACE CAREER READINESS
                                    INVENTORY REPORT</b></h3>
                            <h5 style="margin-left:20px"><b><?= $student_details['Organisation'] ?></b></h5>
                        </div>
                        <div class="col-sm-4">
                            <form method="POST">
                                <select name="filterData" class="form-select" onchange="this.form.submit()">
                                    <?= generate_filters($selected_value, $filter_data); ?>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-2 border-1">
                        <div class="card-body">
                            <div class="d-flex justify-content-around mt-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a class="btn btn-dark text-center"
                                            style="border-radius:50%;width:60px;height:60px;">
                                            <i class="mdi mdi-account" style="font-size:31px;"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-9 align-content-center">
                                        <h4 class="animate__animated animate__fadeInDown" style="margin-left:20px">
                                            <b><?= $student_details['Name'] ?></b>
                                        </h4>
                                    </div>
                                </div>
                                <div>
                                    <h5><b>Area of Study</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['program'] ?>
                                    </h5>
                                </div>
                                <div>
                                    <h5><b>Academic Level</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['degree'] ?>
                                    </h5>
                                </div>
                                <div>
                                    <h5><b>Report Date</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown">
                                        <?= date('m/d/Y', strtotime($student_details['timestamp'])) ?> </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    // echo $student_details["work_experience"];
                    if(isset($student_details["Evaluator Relation"])){                            
                        ?>
                    <div class="d-flex justify-content-between">

                        <div class="card border-1" style="width:55%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h5> <b> Evaluator:
                                                    <?= isset($student_details["Evaluator Relation"]) ? $student_details['Evaluator Relation'] : "" ?>
                                                </b>
                                            </h5>
                                            <h5><?= isset($student_details["Evaluator Name"]) ? $student_details['Evaluator Name'] : "Not Assigned" ?>
                                            </h5>
                                        </div>
                                        <div class="d-flex">
                                            <i class="mdi mdi-email" style="font-size:18px;"></i>
                                            <h5 class="ml-5">
                                                <?= isset($student_details['Evaluator Email']) ? $student_details['Evaluator Email'] : "N/A" ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 align-content-center">
                                        <h5><b>Work Experience</b></h5>
                                        <h5><?= $student_details['work_experience'] ?></h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex pr-5" style="width:20%">
                            <img src="<?= $student_details['Logo'] == "NULL" ? "assets/images/logo.png" : $student_details['Logo'] ?>"
                                class="img-fluid rounded" alt="Org Logo"
                                style="object-fit: contain;width:100%;max-height:140px">
                        </div>
                    </div>
                    <?php } 
                        else{
                            ?>
                    <div class="float-end pb-3 mt-3" style="width:20%">
                        <img src="<?= $student_details['Logo'] == "NULL" ? "assets/images/logo.png" : $student_details['Logo'] ?>"
                            class="img-fluid rounded" alt=" <?= $student_details['Organisation'] ?>"
                            style="object-fit: contain;width:100%;max-height:140px">
                    </div>
                    <?php
                        }
                        ?>
                </div>
            </div>