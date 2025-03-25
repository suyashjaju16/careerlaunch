document.addEventListener("DOMContentLoaded", function () {
    let stickyHeader = document.querySelector(".sticky-top");
    let stickyHeight = stickyHeader.offsetHeight;
    let studentCompetencySection = document.querySelector(".student-competency-section");

    window.addEventListener("scroll", function () {
        let sectionRect = studentCompetencySection.getBoundingClientRect() ;

        if (sectionRect.bottom < stickyHeight) {
            // If the bottom of .student-competency-section is above the viewport, hide the sticky header
            stickyHeader.classList.add("hide-sticky");
        } else {
            // If it's still in view, show the sticky header
            stickyHeader.classList.remove("hide-sticky");
        }
    });
});

function eval_toggle() {
    // $(".evalu").hide()
    if (document.getElementById('evaluator_switch')?.checked) {
        $(".evaluator-data").show();
        $(".pre-data").hide();
        $(".pre-label").html("Self");
        $(".post-label").html("Self");
    } else {
        $(".evaluator-data").hide();
        $(".pre-data").show();
        $(".pre-label").html("Pre");
        $(".post-label").html("Post");
    }
    positionProgressLabels(document);
}

document.addEventListener("DOMContentLoaded", function () {
    eval_toggle();
});

document.querySelectorAll('.overall-career-readiness-card').forEach(parent => {
    if (parent.querySelector('.evaluator-switch')) {
        parent.classList.add('custom-pb-2');
    }
});

function positionProgressLabels(scope = document) {
    scope.querySelectorAll(".progress-label").forEach(function (label) {
        const percent = parseFloat(label.dataset.percent);
        const parent = label.parentElement;

        if (isNaN(percent) || !parent) return;

        const parentWidth = parent.offsetWidth;
        const labelWidth = label.offsetWidth;

        if (parentWidth === 0 || labelWidth === 0) return;

        const circle = label.previousElementSibling?.classList.contains("progress-value")
            ? label.previousElementSibling
            : null;

        const circleWidth = circle?.offsetWidth || 15;

        // Calculate the raw left value based on percentage
        let left = (percent / 100) * parentWidth - labelWidth / 2;

        // Adjust for half the progress-value width
        left -= circleWidth / 2;

        // Clamp
        if (left < 0) left = 0;
        if (left + labelWidth > parentWidth) left = parentWidth - labelWidth;
        label.style.setProperty('--final-left', `${left}px`);

        // Animate label positioning
        // label.style.left = `0px`;

        // label.style.animation = 'none';
        // void label.offsetWidth; // force reflow
        // label.style.animation = 'progress-label-animation 0.6s ease-out forwards';
    });
}

document.addEventListener("DOMContentLoaded", function () {
    // Listen for all Bootstrap accordion expands
    document.querySelectorAll('.accordion-collapse').forEach(item => {
        item.addEventListener('show.bs.collapse', function () {
            // Only update labels in the expanded section
            this.style.display = 'block';
            this.style.visibility = 'hidden';
            this.style.position = 'absolute';
            positionProgressLabels(this);
            requestAnimationFrame(() => {
                this.style.removeProperty('display');
                this.style.removeProperty('visibility');
                this.style.removeProperty('position');
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const progressBars = document.querySelectorAll('.animated-progress');
    progressBars.forEach(bar => {
        const targetWidth = bar.getAttribute('data-width');
        bar.style.setProperty('--progress-width', `${targetWidth}%`);
    });
});

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

document.addEventListener("DOMContentLoaded", function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl, {
            trigger: 'hover', 
            html: true
        });
    });
});