<div class="card mt-4">
                <div class="card-body">
                    <div class="row align-items-center">

                        <div class="col-12 col-md-8">
                            <h3 class="ms-2"><b>NACE CAREER READINESS INVENTORY REPORT</b></h3>
                            <h5 class="ms-2 d-none d-md-block"><b><?= $student_details['Organisation'] ?></b></h5>
                        </div>
                        
                        <div class="col-12 text-center d-md-none mb-3">
                            <img src="<?= $student_details['Logo'] == 'NULL' ? 'assets/images/logo.png' : $student_details['Logo'] ?>"
                                class="img-fluid rounded" alt="<?= $student_details['Organisation'] ?>"
                                style="object-fit: contain; max-height: 100px; width: auto;">
                        </div>


                        <div class="col-12 col-md-4 mt-2 mt-md-0">
                            <form method="POST">
                                <select name="filterData" class="form-select" onchange="this.form.submit()">
                                    <?= generate_filters($selected_value, $filter_data); ?>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-2 border-1">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="col-12 col-md-3 d-flex align-items-center justify-content-center mb-2">
                                    <a class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:60px;height:60px; aspect-ratio: 1;">
                                        <i class="mdi mdi-account" style="font-size:31px;"></i>
                                    </a>
                                    <h4 class="animate__animated animate__fadeInDown my-0" style="margin-left:20px">
                                        <b><?= $student_details['Name'] ?></b>
                                    </h4>
                                </div>
                                <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                    <h5><b>Area of Study</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['program'] ?>
                                    </h5>
                                </div>
                                <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                    <h5><b>Academic Level</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown"><?= $student_details['degree'] ?>
                                    </h5>
                                </div>
                                <div class="col-12 col-md-3 text-center mt-3 mt-md-0">
                                    <h5><b>Report Date</b></h5>
                                    <h5 class="animate__animated animate__fadeInDown">
                                        <?= date('m/d/Y', strtotime($student_details['timestamp'])) ?> </h5>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <?php 
                        // echo $student_details["work_experience"];
                        if(isset($student_details["Evaluator Relation"])){                            
                        ?>

                        <div class="col-12 col-md-8" >
                            <div class="card border-1">
                                <div class="card-body">
                                    <div class="row student-evaluator-details">
                                        <div class="col-12 col-md-7 mb-2">
                                            <h5> <b> Evaluator:
                                                    <?= isset($student_details["Evaluator Relation"]) ? $student_details['Evaluator Relation'] : "" ?>
                                                </b>
                                            </h5>
                                            <h5><?= isset($student_details["Evaluator Name"]) ? $student_details['Evaluator Name'] : "Not Assigned" ?>
                                            </h5>
                                            <!-- <div class="d-flex align-items-center"> -->
                                                <h5 class="m-0 text-break">
                                                    <i class="mdi mdi-email me-1" style="font-size:1.125rem;"></i>
                                                    <?= isset($student_details['Evaluator Email']) ? $student_details['Evaluator Email'] : "N/A" ?>
                                                </h5>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-12 col-md-5 mt-3 my-md-auto ">
                                            <h5><b>Work Experience</b></h5>
                                            <h5><?= $student_details['work_experience'] ?></h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-1 d-none d-md-block"></div>
                        <div class="col-12 col-md-3 d-none d-md-block mt-md-0">
                            <div class="w-100 d-flex align-items-center justify-content-end">
                                <img src="<?= $student_details['Logo'] == 'NULL' ? 'assets/images/logo.png' : $student_details['Logo'] ?>"
                                    class="img-fluid org-logo rounded" alt="Org Logo">
                            </div>
                        </div>

                        <?php } 
                        else{
                        ?>

                        <div class="col-12 col-md-9" ></div>
                        <div class="col-12 col-md-3 d-none d-md-block mt-md-0">
                            <div class="w-100 d-flex align-items-center justify-content-end">
                                <img src="<?= $student_details['Logo'] == 'NULL' ? 'assets/images/logo.png' : $student_details['Logo'] ?>"
                                    class="img-fluid org-logo rounded" alt="<?= $student_details['Organisation'] ?>">
                            </div>
                        </div>
                    <?php
                        }
                        ?>

                    </div>
                </div>
            </div>