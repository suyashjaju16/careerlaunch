<div class="container px-4">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark py-2 px-3"
        style="border-radius: 0px 0px 16px 16px;background-color:#000033!important;">
        <a class="navbar-brand card mt-2" href="#" style="margin-left:20px;padding-bottom:10p;border-radius:8px">
            <div class="p-3">
                <img class="img-fluid lazy" src="assets/images/logo.png" alt="cri_logo" style="width: 200px;">
            </div>
        </a>
        <button class="navbar-toggler mr-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 100px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item card">
                    <div class="card-body py-1">
                        <a class="nav-link text-dark" href="./dashboard?organization=<?= $_GET['organization']?>&source=<?=$_GET['source']?>"
                            style="font-size:18px;">Dashboard
                            <span class="sr-only">(current)</span></a>
                    </div>
                </li>
                <li class="nav-item" style="margin-left: 100px;">
                    <a class="nav-link" href="./resp?organization=<?= $_GET['organization']?>&source=<?=$_GET['source']?>"
                        style="font-size:18px;color:white!important;">Responses</a>
                </li>
            </ul>
            <select class="form-select bg-light" style="width:20%;margin-left:45%;display:none">
                <option> All </option>
                <option selected>This Week</option>
                <option>This Month</option>
                <option>This year</option>
            </select>
        </div>
    </nav>