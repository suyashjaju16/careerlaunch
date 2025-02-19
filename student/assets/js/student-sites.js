
function eval_toggle() {
    // $(".evalu").hide()
    if (document.getElementById('evaluator_switch').checked) {
        $(".evalu").show();
        $(".pre-bar").hide();
        // $(".post-bar").hide();
        $(".pre-label").html("Self");
        $(".post-label").html("Self");
    } else {
        $(".pre-bar").show();
        $(".post-bar").show();
        $(".evalu").hide();
        $(".pre-label").html("Pre");
        $(".post-label").html("Post");
    }
}

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