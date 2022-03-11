<?php
require_once("../src/utils/session-auth.php");
include_once("../src/utils/auto-copyright.php");

?> 

<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap513.min.css">

        <!----css3---->
        <link rel="stylesheet" href="../assets/css/custom.css">

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

        <title>NCR Political Unit</title>
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
                    <li class="active">
                        <a href="#"><i class="material-icons">date_range</i><span>Pending Projects</span></a>
                    </li>
                    <li class="">
                        <a href="lugaw-dashboard-approved.php"><i class="material-icons">call_made</i><span>Approved Projects</span></a>
                    </li>
                    <li class="">
                        <a href="lugaw-dashboard-completed.php"><i class="material-icons">label_important</i><span>Completed Projects</span></a>
                    </li>
                    <li class="">
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

                            <a class="navbar-brand" href="#"> Pending Projects </a>

                            <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                            </button>

                            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Projects</h4>

                                    <form class="d-flex my-2 my-lg-0">
                                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                                        <button class="btn btn-outline-success me-sm-2" type="submit">Search</button>
                                    </form>

                                    <p class="category">Filtering All projects</p>

                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Project Description</th>
                                                <th>Project Thumbnail</th>
                                                <th>Project Images</th>
                                                <th>Status</th>
                                                <th>Project Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>sample1</td>
                                                <td><textarea disabled class="form-control" placeholder="Description" id="#" rows="3">sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1sample1</textarea></td>
                                                <td>1.png</td>
                                                <td>1.png</td>
                                                <td>Pending</td>
                                                <td>03/02/2020</td>
                                                <td>  
                                                    <a href="#">
                                                        <div class="btn btn-pink text-dark">View</div>
                                                    </a>
                                                    <a href="#">
                                                        <div class="btn btn-pink text-dark">Approve</div>
                                                    </a> 
                                                    <a href="#">
                                                        <div class="btn btn-pink text-dark">Deny</div>
                                                    </a>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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