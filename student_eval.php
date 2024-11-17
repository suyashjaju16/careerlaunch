<?php 
// include("./models/config.php");
$comp_data = json_decode(fetch_data($base_url,"student-competency",$data),true);
echo json_encode($comp_data);
?>
<div class="row sticky-top">
    <div class="col-sm-12 px-0">
        <div class="card">
            <div class="card-body py-1">

                <div class="row  p-0">
                    <div class="col-sm-3 align-content-center">
                        <h3>Career Readiness Level</h3>
                    </div>
                    <div class="col-sm-8">
                        <div class="d-flex justify-content-around p-2 mt-3" style="margin-left:30px!important">
                            <!-- ;color:black;-webkit-text-stroke: 1px white; -->
                            <div class="btn btn-primary" style="width:22%;margin:auto;font-size:14px;font-weight:bold;">
                                Emerging
                                Knowledge</div>


                            <div class="btn btn-success" style="width:22%;margin:auto;font-size:14px;font-weight:bold">
                                Understanding
                            </div>


                            <div class="btn btn-warning" style="width:22%;margin:auto;font-size:14px;font-weight:bold">
                                Early
                                Application</div>


                            <div class="btn btn-danger"
                                style="width:23%;margin:auto;font-size:14px;margin-right:5px!important;font-weight:bold">
                                Advanced
                                Application</div>
                        </div>
                        <div class="px-3 mt-4"
                            style="width:100%;margin:auto;margin-left:20px!important;margin-top:-15px!important">

                            <div class="ruler mt-4">
                                <div class="tick"></div> <!-- 0% -->
                                <div class="tick" style="left:24.5%"></div> <!-- 25% -->
                                <div class="tick" style="left:49.5%"></div> <!-- 50% -->
                                <div class="tick" style="left:74%"></div> <!-- 75% -->
                                <div class="tick"></div> <!-- 100% -->
                            </div>

                            <div class="d-flex mt-2" style="width:93%">
                                <p style="margin-left:-3px;color:black"> <b>0 </b></p>
                                <p style="margin-left:24.9%;color:black"><b>25</b></p>
                                <p style="margin-left:24.5%;color:black"><b>50</b></p>
                                <p style="margin-left:23.9%;color:black"><b>75</b></p>
                                <p style="margin-left:25%;color:black"><b>100</b></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-1 align-content-center">
                        <a href="#" data-bs-toggle="popover" title="Information"
                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                            style="margin-top:20px">
                            <i class="mdi mdi-information-outline"
                                style="font-size:45px;color:black;margin-left:20px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="card px-3">
            <div class="card-body">
                <div class="row align-items-center p-0 w-100">
                    <div class="col-sm-3 d-flex flex-row p-3 mb-0 align-items-center card bg-dark align-content-center">
                        <img class="img-fluid" src="./assets/images/ocr.png"
                            style="height: 70px;width: 70px;margin: auto;">
                        <h3 class="px-2 icon-text text-dark mb-0"
                            style="color: white!important;font-size: 18px;font-weight: 700;">
                            Overall <br>Career Readiness </h3>
                    </div>
                    <div class="col-sm-8 mt-4">
                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                aria-valuemin="0" aria-valuemax="100" style="width:22%">
                            </div>
                            <div class="progress-value" style="background-color:#000;font-size:16px">20
                            </div>
                            <!-- /.progress-bar .progress-bar-danger -->
                        </div><!-- /.progress .no-rounded -->

                        <p style="margin:left:-78%;margin-top:-36px;margin-left:30%;font-size:18px;color:black">
                            <b>Self</b>
                        </p>
                        <div class="mt-4">
                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" value="80"
                                    aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                </div>
                                <div class="progress-value bg-warning" style="font-size:16px">50
                                </div>
                                <!-- /.progress-bar .progress-bar-danger -->
                            </div><!-- /.progress .no-rounded -->

                            <p style="margin:left:-78%;margin-top:-36px;margin-left:56.3%;font-size:18px;color:black">
                                <b>Evaluator</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row card p-3">
    <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="accordion-item" style="border-top:0px!important">
                <h2 class="accordion-header" id="flush-headingZero">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseZero" aria-expanded="false" aria-controls="flush-collapseZero">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card bg-info align-content-center">
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-communication-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h3 class="px-2 icon-text text-dark mb-0"
                                    style="color: white!important;font-size: 18px;font-weight: 700;">
                                    Communication </h3>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                        </div>
                                        <div class="progress-value bg-info" style="font-size:16px">50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseZero" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseZero" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                                </div>
                                                <div class="progress-value bg-info" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                                </div>
                                                <div class="progress-value bg-info" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                                </div>
                                                <div class="progress-value bg-info" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-teamwork-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h3 class="px-2 icon-text text-dark mb-0" style="color: white!important;">
                                    Teamwork </h3>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar " role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color: #E06B60">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color: #E06B60">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar " role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color: #E06B60">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color: #E06B60">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color: #E06B60">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color: #E06B60">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color: #E06B60">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color: #E06B60">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-career-and-self-development-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Career & Self Development </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                                        </div>
                                        <div class="progress-value bg-warning" style="font-size:16px">50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-warning " role="progressbar"
                                                    aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%">
                                                </div>
                                                <div class="progress-value bg-warning" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-warning " role="progressbar"
                                                    aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%">
                                                </div>
                                                <div class="progress-value bg-warning" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar bg-warning " role="progressbar"
                                                    aria-valuenow="80" value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%">
                                                </div>
                                                <div class="progress-value bg-warning" style="font-size:16px">50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-professionalism-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Professionalism </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color:#609866">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color:#609866">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#609866">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#609866">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#609866">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#609866">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#609866">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#609866">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-leadership-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Leadership </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color:#796258">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color:#796258">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
            </div>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseFive"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 text-center mb-0 align-content-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Awareness of
                                        Strength
                                        &
                                        Challenges
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#796258">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#796258">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 text-center mb-0 align-content-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Professional
                                        Development
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#796258">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#796258">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 mb-0 text-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Networking
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#796258">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#796258">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#705181">
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-critical-thinking-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Critical Thinking </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color:#705181">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color:#705181">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
            </div>

            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-flush-collapseSix"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 text-center mb-0 align-content-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Awareness of
                                        Strength
                                        &
                                        Challenges
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#705181">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#705181">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 text-center mb-0 align-content-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Professional
                                        Development
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar " role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#705181">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#705181">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                        <div class="card-body">
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-3 mb-0 text-center">
                                    <p class="px-2 icon-text text-dark mb-0" style="font-size: 18px;font-weight: 700;">
                                        Networking
                                    </p>
                                </div>
                                <div class="col-sm-8 mt-4">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                            value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                        </div>
                                        <div class="progress-value" style="background-color:#000;font-size:16px">
                                            20
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                    <div class="mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width:52%;background-color:#705181">
                                            </div>
                                            <div class="progress-value" style="font-size:16px;background-color:#705181">
                                                50
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed btn-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                        <div class="row align-items-center p-0 w-100">
                            <div class="col-sm-3 d-flex p-3 mb-0 align-items-center card align-content-center"
                                style="background-color:#3c4b6c">
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-technology-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Technology </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color:#3c4b6c">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color:#3c4b6c">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseSeven" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseSeven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#3c4b6c">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#3c4b6c">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#3c4b6c">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#3c4b6c">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#3c4b6c">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#3c4b6c">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <img class="img-fluid"
                                    src="./assets/images/nace-icons/nace-equity-and-inclusion-black-line-art-icon.png"
                                    style="height: 70px;width: 70px;margin: auto;">
                                <h5 class="px-2 icon-text text-center text-dark mb-0" style="color: white!important;">
                                    Equity & Inclusion </h5>
                            </div>
                            <div class="col-sm-8 p-3" style="margin-top:20px;">
                                <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                    <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80" value="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                    </div>
                                    <div class="progress-value" style="background-color:#000;font-size:16px">
                                        20
                                    </div>
                                    <!-- /.progress-bar .progress-bar-danger -->
                                </div><!-- /.progress .no-rounded -->
                                <div style="margin-top:35px">
                                    <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" value="80"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:52%;background-color:#ad3131">
                                        </div>
                                        <div class="progress-value" style="font-size:16px;background-color:#ad3131">
                                            50
                                        </div>
                                        <!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseEight" class="accordion-collapse collapse"
                    aria-labelledby="flush-flush-collapseEight" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card border-2" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Awareness of
                                            Strength
                                            &
                                            Challenges
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#ad3131">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#ad3131">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 text-center mb-0 align-content-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Professional
                                            Development
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#ad3131">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#ad3131">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 7px 7px 14px 0px rgba(0,0,0,0.15);width:95%">
                            <div class="card-body">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-3 mb-0 text-center">
                                        <p class="px-2 icon-text text-dark mb-0"
                                            style="font-size: 18px;font-weight: 700;">Networking
                                        </p>
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                            <div class="progress-bar bg-dark " role="progressbar" aria-valuenow="80"
                                                value="80" aria-valuemin="0" aria-valuemax="100" style="width:22%">
                                            </div>
                                            <div class="progress-value" style="background-color:#000;font-size:16px">
                                                20
                                            </div>
                                            <!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->
                                        <div class="mt-4">
                                            <div class="progress mb-3 bg-white" style="width:90%;margin:auto">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                    value="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:52%;background-color:#ad3131">
                                                </div>
                                                <div class="progress-value"
                                                    style="font-size:16px;background-color:#ad3131">
                                                    50
                                                </div>
                                                <!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>