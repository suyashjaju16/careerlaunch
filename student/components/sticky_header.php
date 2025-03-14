<div class="row sticky-top">
    <div class="col-12 px-0">
        <div class="card">
            <div class="card-body py-md-4 py-2">

                <div class="row align-items-center">
                    <!-- <div class="col-md-3 col-12 text-center text-md-left mb-2 mb-md-0">
                        <h4 class="text-black">NACE Career Readiness Level</h4>
                    </div> -->

                    <div class="col-md-3 col-12 text-center text-md-left d-flex align-items-center justify-content-between">
                        <h4 class="text-black mb-0 p-2">NACE Career Readiness Level</h4>
                        <a tabindex="0" href="#" class="d-md-none text-dark fs-3 popover-trigger" onclick="return false;">
                            <i class="mdi mdi-information-outline"></i>
                        </a>
                    </div>

                    <div class="col-md-8 col-12">

                        <div class="d-none d-md-flex row gx-4 px-3 justify-content-between">
                            <div class="col-md-3 text-center">
                                <span class="badge text-dark text-center fw-bolder fs-6 px-2 py-3 text-break w-100"
                                    style="background-color: #ADD8E6; display: block; white-space: normal;">
                                    Emerging Knowledge
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-success text-dark text-center fw-bolder fs-6 px-2 py-3 text-break w-100"
                                    style="display: block; white-space: normal;">
                                    Understanding
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-warning text-dark text-center fw-bolder fs-6 px-2 py-3 text-break w-100"
                                    style="display: block; white-space: normal;">
                                    Early Application
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-danger text-dark text-center fw-bolder fs-6 px-2 py-3 text-break w-100"
                                    style="display: block; white-space: normal;">
                                    Advanced Application
                                </span>
                            </div>
                        </div>



                        <!-- Progress Bar -->
                        <div class="progress mt-2" style="height: 18px;">
                            <div class="progress-bar" style="width: 25%; background-color: #ADD8E6; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-right: none;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" style="width: 25%; border-radius: 0;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" style="width: 25%; border-radius: 0;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" style="width: 25%; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-left: none;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <!-- Ruler Values (Aligned Precisely) -->
                        <div class="d-flex justify-content-between mt-1" style=" width: 102% !important;">
                            <span class="fw-bold text-dark small" >0</span>
                            <span class="fw-bold text-dark small" >25</span>
                            <span class="fw-bold text-dark small" >50</span>
                            <span class="fw-bold text-dark small" >75</span>
                            <span class="fw-bold text-dark small" style="transform: translateX(-50%);">100</span>
                        </div>

                    </div>
                    <!-- Info Icon (Popover) -->
                    <div class="col-sm-1 d-none d-md-flex justify-content-center align-content-center">
                        <a href="#" class="text-dark fs-1 popover-trigger" onclick="return false;">
                            <i class="mdi mdi-information-outline"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Popover Content (Stored in a Single Place) -->
<div id="popover-content" class="d-none">
    <div class='badge text-dark px-3 py-2 fw-bold bg-light-blue'>Emerging Knowledge</div>
    <p class='mt-2 mb-2 text-black'>The student has an emerging awareness of the behavior, its importance, and related concepts.</p>
    <div class='badge bg-success text-dark px-3 py-2 fw-bold'>Understanding</div>
    <p class='mt-2 mb-2 text-black'>The student demonstrates an understanding of the behavior and related concepts.</p>
    <div class='badge bg-warning text-dark px-3 py-2 fw-bold'>Early Application</div>
    <p class='mt-2 mb-2 text-black'>The student sometimes applies the behavior.</p>
    <div class='badge bg-danger text-dark px-3 py-2 fw-bold'>Advanced Application</div>
    <p class='mt-2 mb-2 text-black'>The behavior is consistent and integrated into the student’s workplace behaviors.</p>
</div>

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