<?php include_once "src/utils/auto-copyright.php"; ?>
<!doctype html>
<html lang="en">
    <head>

        <!-- Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/main.css">

        <title>NCR Political Unit</title>
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-1 fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="assets/images/index/POLITICAL UNIT2.png" alt="Team Leni">
                </a>

                <button class="navbar-toggler btn bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto" >
                        <li class="nav-item" style="padding: 5px;">
                            <a href="public/about-us.php" class="nav-link btn btn-primary mt-auto">ABOUT US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Background -->
        <section class="" >
            <img src="assets/images/index/LeniBackground.png" alt="Team Leni BG" class="img-fluid">
        </section>

        <!-- Cards -->
        <section class="p-5">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                        <div class="card">
                            <img src="assets/images/index/LUGAW BUTTON RECT.png" class="card-img" alt="Card Image">
                            <div class="card-body d-flex flex-column">
                                <a href="public/lugaw-projects.php" class="btn btn-primary mt-auto align-self-justify">LUGAW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                        <div class="card">
                            <img src="assets/images/index/LIGAW BUTTON RECT.png" class="card-img" alt="Card Image">
                            <div class="card-body d-flex flex-column">
                                <a href="public/ligaw-login.php" class="btn btn-primary mt-auto align-self-justify">LIGAW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require("public/footer.php"); ?>

        <!-- Bootstrap Bundle with Popper -->
        <script src="assets/js/bootstrap513.bundle.min.js"></script>
        <script >

  </body>
</html>