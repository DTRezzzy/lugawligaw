<?php
require_once('../src/utils/session-auth.php');
include_once('../src/utils/auto-copyright.php');

?> 
<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

        <title>NCR Political Unit</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!----css3---->
        <link rel="stylesheet" href="../assets/css/custom.css">

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">

            <div class="body-overlay"></div>

            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><img src="../assets/images/index/logo.png" class="img-fluid" /><span>USERNAME</span></h3>
                </div>
                <ul class="list-unstyled components">
                    <li class="">
                        <a href="ligaw-dashboard.php" class="dashboard"><i class="material-icons">dashboard</i><span>Ligaw</span></a>
                    </li>

                    <li class="">
                        <a href="ligaw-dashboard-voter.php"><i class="material-icons">content_copy</i><span>Voters</span></a>
                    </li>

                    <li class="active">
                        <a href="#"><i class="material-icons">date_range</i><span>Add Voter</span></a>
                    </li>

                    <li class="">
                        <a href="ligaw-dashboard-analytics.php"><i class="material-icons">library_books</i><span>Analytics</span></a>
                    </li>

                    <li class="endend">
                        <a href="../src/api/logout.php"><i class="material-icons">logout</i><span>Logout</span></a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">

                <div class="top-navbar">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">

                            <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                                <span class="material-icons">arrow_back_ios</span>
                            </button>

                            <a class="navbar-brand" href="#"> Add Voter </a>

                            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="material-icons">more_vert</span>
                            </button>

                            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="main-content">

                    <div class="bootstrap5-form text-center mt-4 mb-5">
                        <h1>Add Voter</h1>
                    </div>

                    <div class="form mb-5">
                        <form action="#">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="firstname" class="form-label">First Name</label>
                                                <input type="text" class="form-control" placeholder="First name"
                                                aria-label="First name" id="firstname">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="middlename" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" placeholder="Middle name"
                                                aria-label="Middle name" id="middlename">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="lastname" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last name"
                                                aria-label="Last name" id="lastname">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select your Region</option>
                                                    <option value="1">Region I</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select your Province</option>
                                                    <option value="1">Manila</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select your City</option>
                                                    <option value="1">Malabon</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select your Barangay </option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-lg-12 ">
                                                <a href="" type="button" class="btn1 btn-lg btn-pink my-2 mx-2" style="width:250px">
                                                SUBMIT </a>
                                                <a href="" type="button" class="btn2 btn-lg btn-pink my-2 mx-2" style="width:250px">
                                                RESET </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <?php require("footer-dashboard.php"); ?>

                </div>
            </div>
        </div>

        <script src="../assets/js/bootstrap513.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('active');
                });

                $('.more-button,.body-overlay').on('click', function () {
                    $('#sidebar,.body-overlay').toggleClass('show-nav');
                });

            });

        </script>

    </body>

</html>