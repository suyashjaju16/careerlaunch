<div id="sticky-sentinel" style="height: 1px;"></div>
<div class="row sticky-top">
    <div class="col-12 px-0">
        <div class="card sticky-header-card">
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

                    <div class="col-md-8 col-12" id="primary-ruler">

                        <?php 
                            $labels = [
                                ['text' => 'Emerging Knowledge', 'class' => 'bg-emerging'],
                                ['text' => 'Understanding', 'class' => 'bg-success'],
                                ['text' => 'Early Application', 'class' => 'bg-warning'],
                                ['text' => 'Advanced Application', 'class' => 'bg-danger'],
                            ];
                            echo get_ruler_labels($labels);
                        ?> 

                        <?php echo get_ruler_html(); ?>

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
    <div class='badge text-black px-3 py-2 fw-bold bg-emerging fs-5'>Emerging Knowledge</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student has an emerging awareness of the behavior, its importance, and related concepts.</p>
    <div class='badge bg-success text-black px-3 py-2 fw-bold  fs-5'>Understanding</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student demonstrates an understanding of the behavior and related concepts.</p>
    <div class='badge bg-warning text-black px-3 py-2 fw-bold  fs-5'>Early Application</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The student sometimes applies the behavior.</p>
    <div class='badge bg-danger text-black px-3 py-2 fw-bold  fs-5'>Advanced Application</div>
    <p class='mt-2 mb-2 fs-6 text-black'>The behavior is consistent and integrated into the student’s workplace behaviors.</p>
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

    document.addEventListener("DOMContentLoaded", function () {
        const sentinel = document.getElementById('sticky-sentinel');
        const stickyCard = document.querySelector('.sticky-header-card');

        const observer = new IntersectionObserver(
            ([entry]) => {

                if (entry.isIntersecting) {
                    stickyCard.classList.remove('sticky-top-active');
                } else {
                    stickyCard.classList.add('sticky-top-active');
                }
            },
            {
                root: null,
                threshold: 0,
            }
        );

        if (sentinel) {
            observer.observe(sentinel);
        }
        
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