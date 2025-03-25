<?php

function get_ruler_html() {
    return '
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

    <div class="d-flex justify-content-between mt-2" style="margin-left: -3px;">
        <span class="fw-bold text-black fw-bolder small" style="padding-right:8px;">0</span>
        <span class="fw-bold text-black fw-bolder small" style="padding-left:5px;">25</span>
        <span class="fw-bold text-black fw-bolder small" style="padding-left:10px;">50</span>
        <span class="fw-bold text-black fw-bolder small" style="padding-left:10px;">75</span>
        <span class="fw-bold text-black fw-bolder small" style="margin-right:-5px;">100</span>
    </div>';
}

function get_ruler_labels($labels) {
    $desktop_labels = '';
    $mobile_labels = '';
    $color_bars = '';

    foreach ($labels as $label) {
        $bgClass = isset($label['class']) ? '.$label['class'].' : '';
        $bgColor = isset($label['color']) ? 'background-color:'.$label['color'].';' : '';

        $desktop_labels .= '<div class="col-md-3 text-center"><span class="badge text-black text-center fw-bolder fs-6 p-1 text-break w-100 '.$bgClass.'" style="'.$bgColor.'">'.$label['text'].'</span></div>';

        $mobile_labels .= '<div class="col-6 d-flex align-items-center pe-2 ps-0"><span class="badge me-2 rounded '.$bgClass.'" style="min-width: 20px; min-height: 20px; '.$bgColor.'">&nbsp;</span><span class="text-dark fw-bold flex-grow-1 text-nowrap">'.$label['text'].'</span></div>';

        $color_bars .= '<div class="flex-fill mx-1 rounded-pill h-100 '.$bgClass.'" style="'.$bgColor.'"></div>';
    }

    return '<div class="d-none d-md-flex row gx-2 px-2 justify-content-between align-items-center mb-3 progress-bar-labels">'.$desktop_labels.'</div>

    <div class="d-block d-md-none mt-1" style="border-top: #0000001f solid 1px;"></div>
    <div id="mobile-labels" class="d-flex d-md-none row text-center gy-3 px-3 pb-3 mb-3 mt-1" style="border-bottom: #0000001f solid 1px;">'.$mobile_labels.'</div>

    <div class="d-flex align-items-center justify-content-between d-md-none" style="height: 12px;">'.$color_bars.'</div>';
}

?>