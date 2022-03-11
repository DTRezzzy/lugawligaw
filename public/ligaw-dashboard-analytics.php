<?php
require_once "../src/utils/session-auth.php";
include_once('../src/utils/auto-copyright.php');

?> 

<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        
        <title>
            NCR Political Unit
        </title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!----css3---->
        <link rel="stylesheet" href="../assets/css/custom.css">

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


        <!-- charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
                        <a href="Ligaw-Dashboard.php" class="dashboard"><i class="material-icons">dashboard</i><span>Ligaw</span></a>
                    </li>

                    <li class="">
                        <a href="Ligaw-Dashboard-Voter.php"><i class="material-icons">content_copy</i><span>Voters</span></a>
                    </li>

                    <li class="">
                        <a href="Ligaw-Dashboard-Addvoter.php"><i class="material-icons">date_range</i><span>Add
                        Voter</span></a>
                    </li>

                    <li class="active">
                        <a href="#"><i class="material-icons">library_books</i><span>Analytics</span></a>
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

                            <a class="navbar-brand" href="#"> Analytics </a>

                            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="material-icons">more_vert</span>
                            </button>

                            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            </div>
                        </div>
                    </nav>
                </div>

            <div class="main-content">

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="card card-stats">

                        <div class="card-header">
                            <div class="icon icon-warning">
                                <span class="material-icons">location_city</span>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="category"><strong>TOTAL COUNT</strong></p>
                            <h3 class="card-title">70,340</h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <!-- <i class="material-icons text-info">info</i> -->
                                <a href="#">NATIONAL CAPITAL REGION</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="card card-stats">

                        <div class="card-header">
                            <div class="icon icon-rose">
                                <span class="material-icons">playlist_add</span>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="category"><strong>TOTAL COUNT</strong></p>
                            <h3 class="card-title">102</h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <!-- <i class="material-icons">local_offer</i> -->
                                <a href="#">Newly Registered XX/XX/XXXX</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-content">
                            <canvas id="myChart" style="width:100%;max-width:50rem;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-content">
                            <canvas id="myChart2" style="width:100%;max-width:50rem;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="">
                    <div class="card">
                        <div class="card-content">
                            <p>NCR</p>
                            <canvas id="myChart3" style="width:50%;max-width:100rem;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include "footer-dashboard.php" ?>

        </div>

        <script src="../assets/js/bootstrap513.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/ligaw-dashboard-analytics-data.js"></script>

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