<div id="sticky-sentinel" style="height: 1px;"></div>
<div class="row sticky-top">
    <div class="col-12 px-0">
        <div class="card">
            <div class="card-body py-md-4 py-2">

                <div class="row align-items-center">
                    <!-- <div class="col-md-3 col-12 text-center text-md-left mb-2 mb-md-0">
                        <h4 class="text-black">NACE Career Readiness Level</h4>
                    </div> -->

                    <div class="col-md-3 col-12 text-center text-md-left d-flex align-items-center justify-content-center header-title">
                        <h3 class="text-black mb-0 fs-5">NACE Career Readiness Level</h3>
                        <a tabindex="0" href="#" class="d-md-none text-dark fs-3 popover-trigger" onclick="return false;">
                            <i class="mdi mdi-information-outline"></i>
                        </a>
                    </div>

                    <div class="col-md-8 col-12">

                        <div class="d-none d-md-flex row gx-2 px-2 justify-content-between align-items-center mb-3 progress-bar-labels">
                            <div class="col-md-3 text-center ">
                                <span class="badge text-dark text-center fw-bolder fs-6 p-1 text-break w-100 bg-emerging">
                                    Emerging Knowledge
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-success text-dark text-center fw-bolder fs-6 p-1 text-break w-100">
                                    Understanding
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-warning text-dark text-center fw-bolder fs-6 p-1 text-break w-100">
                                    Early Application
                                </span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="badge bg-danger text-dark text-center fw-bolder fs-6 p-1 text-break w-100">
                                    Advanced Application
                                </span>
                            </div>
                        </div>

                        <div class="d-block d-md-none mt-1" style="border-top: #0000001f solid 1px;"></div>
                        <div id="mobile-labels" class="d-flex d-md-none row text-center gy-3 px-3 pb-3 mb-3 mt-1" style=" border-bottom: #0000001f solid 1px;">
                            <div class="col-6 d-flex align-items-center pe-2 ps-0">
                                <span class="badge me-2 rounded bg-emerging" style="min-width: 20px; min-height: 20px;">&nbsp;</span>
                                <span class="text-dark fw-bold flex-grow-1 text-nowrap">Emerging Knowledge</span>
                            </div>
                            <div class="col-6 d-flex align-items-center pe-2 ps-0">
                                <span class="badge me-2 rounded bg-warning" style="min-width: 20px; min-height: 20px;">&nbsp;</span>
                                <span class="text-dark fw-bold flex-grow-1 text-nowrap">Early Application</span>
                            </div>
                            <div class="col-6 d-flex align-items-center pe-2 ps-0">
                                <span class="badge me-2 rounded bg-success" style="min-width: 20px; min-height: 20px;">&nbsp;</span>
                                <span class="text-dark fw-bold flex-grow-1 text-nowrap">Understanding</span>
                            </div>
                            <div class="col-6 d-flex align-items-center pe-2 ps-0">
                                <span class="badge me-2 rounded bg-danger" style="min-width: 20px; min-height: 20px;">&nbsp;</span>
                                <span class="text-dark fw-bold flex-grow-1 text-nowrap">Advanced Application</span>
                            </div>
                        </div>



                        <!-- Progress Bar -->
                        <!-- <div class="d-flex align-items-center d-md-none" style="height: 12px;">
                            <div class="mx-1" ></div>
                            <div class="mx-1 bg-success" ></div>
                            <div class="mx-1 bg-warning" ></div>
                            <div class="mx-1 bg-danger" ></div>
                        </div> -->

                        <div class="d-flex align-items-center justify-content-between d-md-none" style="height: 12px;">
                            <div class="flex-fill mx-1 rounded-pill h-100 bg-emerging" ></div>
                            <div class="flex-fill mx-1 rounded-pill h-100 bg-success" ></div>
                            <div class="flex-fill mx-1 rounded-pill h-100 bg-warning" ></div>
                            <div class="flex-fill mx-1 rounded-pill h-100 bg-danger" ></div>
                        </div>

                        <div class="mt-2">

                            <div class="ruler mt-0">
                                <div class="tick"></div>
                                <!-- 0% -->
                                <div class="tick" style="left:calc(25% - 1px);"></div>
                                <!-- 25% -->
                                <div class="tick" style="left:calc(50% - 1px);"></div>
                                <!-- 50% -->
                                <div class="tick" style="left:calc(75% - 1px);"></div>
                                <!-- 75% -->
                                <div class="tick" style="left:calc(100% - 2px);"></div>
                                <!-- 100% -->
                            </div>
                        </div>

                        <!-- Ruler Values (Aligned Precisely) -->
                        <div class="d-flex justify-content-between mt-1" style="margin-left: -3px; ">
                            <span class="fw-bold text-dark small" style=" padding-right:8px;">0</span>
                            <span class="fw-bold text-dark small" style=" padding-left:5px;">25</span>
                            <span class="fw-bold text-dark small" style=" padding-left:10px;">50</span>
                            <span class="fw-bold text-dark small" style=" padding-left:10px;">75</span>
                            <span class="fw-bold text-dark small" style="margin-right:-5px;">100</span>
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
    <div class='badge text-dark px-3 py-2 fw-bold bg-emerging'>Emerging Knowledge</div>
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

    // document.addEventListener("DOMContentLoaded", function () {
    //     const sentinel = document.getElementById('sticky-sentinel');
    //     const mobileLabels = document.getElementById('mobile-labels');
    //     const stickyTop = document.querySelector('.sticky-top');

    //     // Set a baseline height when the page loads
    //     function setStickyMinHeight() {
    //         const stickyHeight = stickyTop.offsetHeight;
    //         stickyTop.style.minHeight = `${stickyHeight}px`;
    //     }

    //     const observer = new IntersectionObserver(
    //         ([entry]) => {
    //             const isSticky = !entry.isIntersecting;

    //             if (isSticky) {
    //                 mobileLabels.classList.add('collapsed'); // Collapse smoothly
    //             } else {
    //                 mobileLabels.classList.remove('collapsed'); // Expand smoothly
    //             }
    //         },
    //         {
    //             root: null,
    //             threshold: 0,
    //         }
    //     );

    //     if (sentinel && mobileLabels) {
    //         observer.observe(sentinel);
    //         setStickyMinHeight(); // Set min-height on page load
    //     }

    //     window.addEventListener('resize', () => {
    //         if (window.innerWidth >= 768) {
    //             mobileLabels.classList.remove('collapsed'); // Show on desktop
    //         }
    //     });
    // });


</script>