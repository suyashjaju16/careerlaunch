 <meta charset="utf-8" />
 <title>Career Readiness Inventory</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta content="Career Readiness Inventory" name="description" />
 <meta content="Themesdesign" name="author" />
 <!-- App favicon -->
 <link rel="shortcut icon" href="assets/images/favicon.ico">

 <!-- Icons Css -->
 <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

 <!-- Bootstrap Css -->
 <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
 <!-- Icons Css -->
 <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/css/custom-css.css" rel="stylesheet" type="text/css" />

 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
     rel="stylesheet" />

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
 <style>
.grid1 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: 1fr;
    grid-column-gap: 16px;
    grid-row-gap: 0px;
}

.grid1child {
    grid-area: 1 / 1 / 2 / 5;
}

.ruler {
    position: relative;
    width: 100%;
    height: 2px;
    background-color: #eaeaea;
    border: 1px solid #000;
}

.tick {
    position: absolute;
    width: 2px;
    height: 17px;
    margin-top: -8px;
    background-color: #000;
}

.tick:nth-child(1) {
    left: -1px;
    width: 3.5px;
}

.tick:nth-child(2) {
    left: 25%;
}

.tick:nth-child(3) {
    left: 50%;
}

.tick:nth-child(4) {
    left: 75%;
}

.tick:nth-child(5) {
    left: 100%;
    margin-left: -1px;
    width: 3.5px
        /* Adjust to center the last tick */
}

.form-check-input {
    width: 1.5em;
    height: 1.5em;
}

.form-check-label {
    font-size: 18px;
    margin-left: 9px;
}

.animated-progress {
    animation: progress-animation 1s ease-out forwards;
}

@keyframes progress-animation {
    from {
        width: 0%;
    }

    to {
        width: var(--progress-width, 100%);
    }
}

.recommendations-headings {
    font-size: 16px !important;
}
 </style>