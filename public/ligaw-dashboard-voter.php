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
        <link rel="stylesheet" href="../assets/css/bootstrap513.min.css">

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
                        <a href="ligaw-dashboard.php" class="dashboard"><i
                            class="material-icons">dashboard</i><span>Ligaw</span></a>
                        </li>

                        <li class="active">
                            <a href="#"><i class="material-icons">content_copy</i><span>Voters</span></a>
                        </li>

                        <li class="">
                            <a href="ligaw-dashboard-addvoter.php"><i class="material-icons">date_range</i><span>Add Voter</span></a>
                        </li>

                        <li class="">
                            <a href="Ligaw-Dashboard-Analytics.php"><i class="material-icons">library_books</i><span>Analytics</span></a>
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

                                    <a class="navbar-brand" href="#"> Voters </a>

                                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="material-icons">more_vert</span>
                                    </button>

                                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                                    </div>
                                </div>
                            </nav>
                        </div>

                        <div class="main-content">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card" style="min-height: 485px">
                                        <div class="card-header card-header-text">
                                            <h4 class="card-title">Recent Activity</h4>
                                            <form class="d-flex my-2 my-lg-0">
                                                <input class="form-control me-sm-2" type="text" placeholder="Search">
                                                <button class="btn btn-outline-success me-sm-2" type="submit">Search</button>
                                            </form>
                                            <p class="category">New Voters on DD/MM/YYYY</p>
                                        </div>

                                        <div class="card-content table-responsive">
                                            <table class="table table-hover">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Last Name</th>
                                                        <th>Region</th>
                                                        <th>Province</th>
                                                        <th>City</th>
                                                        <th>Barangay</th>
                                                        <th>Precinct No.</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Bob </td>
                                                        <td>T</td>
                                                        <td>Williams</td>
                                                        <td>NCR</td>
                                                        <td>Cavite</td>
                                                        <td>Bacoor</td>
                                                        <td>Any</td>
                                                        <td>2</td>
                                                        <td>
                                                            <button type="button" class="btn btn-pink text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#myModal">
                                                                Update
                                                            </button>
                                                            <a href="#">
                                                                <div class="btn btn-pink text-dark">Delete</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Voter</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form mb-5">
                                                <form action="#">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-2"></div>
                                                            <div class="col-lg-8">
                                                                
                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">First Name</label>
                                                                        <input type="text" class="form-control" placeholder="First name"
                                                                        aria-label="First name" id="name">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">Middle Name</label>
                                                                        <input type="text" class="form-control" placeholder="Middle name"
                                                                        aria-label="Middle name" id="name">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="l-name" class="form-label">Last Name</label>
                                                                        <input type="text" class="form-control" placeholder="Last name"
                                                                        aria-label="Last name" id="l-name">
                                                                    </div>
                                                                </div>
                                                                
                                                                                <!-- <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <label for="email" class="form-label">Email Address</label>
                                                                                        <input type="email" class="form-control" placeholder="name@example.com"
                                                                                            aria-label="Last name" id="email">
                                                                                    </div>
                                                                                </div> -->
                                                                                
                                                                                <!-- <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                                                                        <textarea class="form-control" placeholder="Comment"
                                                                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                                    </div>
                                                                                </div> -->
                                                                                
                                                                                <!-- <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <label for="formFile" class="form-label">Choose File</label>
                                                                                        <input class="form-control" type="file" id="formFile">
                                                                                    </div>
                                                                                </div> -->
                                                                                
                                                                                <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <select class="form-select" aria-label="Default select example">
                                                                                            <option selected>Select your Region</option>
                                                                                            <option value="1">Region I</option>
                                                                                            <option value="2">Region II</option>
                                                                                            <option value="3">Region III</option>
                                                                                            <option value="3">Region IV</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <select class="form-select" aria-label="Default select example">
                                                                                            <option selected>Select your Province</option>
                                                                                            <option value="1">Manila</option>
                                                                                            <option value="2">Bataan</option>
                                                                                            <option value="3">Cavite</option>
                                                                                            <option value="3">Batangas</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <select class="form-select" aria-label="Default select example">
                                                                                            <option selected>Select your City</option>
                                                                                            <option value="1">Malabon</option>
                                                                                            <option value="2">Caloocan</option>
                                                                                            <option value="3">Navotas</option>
                                                                                            <option value="3">Pasig</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="row mb-3">
                                                                                    <div class="col-lg-12">
                                                                                        <select class="form-select" aria-label="Default select example">
                                                                                            <option selected>Select your Precinct </option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="3">4</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                <div class="row text-center">
                                                                                    <div class="col-lg-12">
                                                                                        <a href="" type="button" class="btn1 btn-lg btn-pink" style="width:250px">
                                                                                        Update </a>
                                                                                        <!-- <a href="" type="button" class="btn2 btn-lg btn-pink" style="width:250px">
                                                                                        RESET </a> -->
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="col-lg-2"></div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-pink" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php require("footer-dashboard.php"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
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