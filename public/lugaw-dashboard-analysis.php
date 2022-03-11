<?php
require_once('../src/utils/session-auth.php');
include_once('../src/utils/auto-copyright.php');
include_once('../config/database.php');

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
        <link rel="stylesheet" href="../assets/css/bootstrap513.min.css">

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
                        <a href="lugaw-dashboard.php" class="dashboard"><i class="material-icons">dashboard</i><span>Lugaw</span></a>
                    </li>

                    <li class="">
                        <a href="lugaw-dashboard-added.php"><i class="material-icons">content_copy</i><span>Contributions</span></a>
                    </li>

                    <li class="">
                        <a href="lugaw-dashboard-pending.php"><i class="material-icons">date_range</i><span>Pending Projects</span></a>
                    </li>

                    <li class="">
                        <a href="lugaw-dashboard-approved.php"><i class="material-icons">call_made</i><span>Approved Projects</span></a>
                    </li>

                    <li class="">
                        <a href="lugaw-dashboard-completed.php"><i class="material-icons">label_important</i><span>Completed Projects</span></a>
                    </li>

                    <li class="active">
                        <a href="lugaw-dashboard-analysis.php"><i class="material-icons">library_books</i><span>Analysis</span></a>
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
                            
                            <div class="card-content">
                                <p class="category"><strong>COUNT</strong></p>
                                <h3 class="card-title">70,340</h3>
                            </div>

                            <div class="card-footer">
                                <div class="stats">
                                    <!-- <i class="material-icons text-info">info</i> -->
                                    <a href="#">TOTAL PROJECTS</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            
                            <div class="card-content">
                                <p class="category"><strong>COUNT</strong></p>
                                <h3 class="card-title">70,340</h3>
                            </div>

                            <div class="card-footer">
                                <div class="stats">
                                    <!-- <i class="material-icons text-info">info</i> -->
                                    <a href="#">PENDING PROJECTS</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        
                            <div class="card-content">
                                <p class="category"><strong>COUNT</strong></p>
                                <h3 class="card-title">102</h3>
                            </div>

                            <div class="card-footer">
                                <div class="stats">
                                    <!-- <i class="material-icons">local_offer</i> -->
                                    <a href="#">APPROVED PROJECTS</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                        <div class="card card-stats">
                            
                            <div class="card-content">
                                <p class="category"><strong>COUNT</strong></p>
                                <h3 class="card-title">102</h3>
                            </div>

                            <div class="card-footer">
                                <div class="stats">
                                    <!-- <i class="material-icons">local_offer</i> -->
                                    <a href="#">ON-GOING PROJECTS</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                        <div class="card card-stats">
                            
                            <div class="card-content">
                                <p class="category"><strong>COUNT</strong></p>
                                <h3 class="card-title">102</h3>
                            </div>

                            <div class="card-footer">
                                <div class="stats">
                                    <!-- <i class="material-icons">local_offer</i> -->
                                    <a href="#">COMPLETED</a>
                                </div>
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
                    <div class="card" >

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Recently Added Projects</h4>
                            <p class="category">Filtering 5 recent added projects</p>
                        </div>

                        <div class="card-content table-responsive">

                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Date Added</th>
                                        <th>Project Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>03 Jan</td>
                                        <td>Project 1: Finding Commonalities </td>  
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="">
                    <div class="card">
                        <div class="card-content">
                            bar graph here
                        </div>
                    </div>
                </div>
            </div> -->


            <?php //require("footer-dashboard.php"); ?>

        </div>
    </div>

    <script src="../assets/js/bootstrap513.min.js"></script>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/lugaw-dashboard-analysis-data.js"></script>

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