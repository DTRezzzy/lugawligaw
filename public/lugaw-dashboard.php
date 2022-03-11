<?php
require_once('../src/utils/session-auth.php');
require_once('../src/utils/auto-copyright.php');
require_once('../src/utils/generate-token.php');
require_once('../src/utils/sanitize-input.php');
require_once('../src/utils/get-message.php');
require_once('../config/database.php');

if(!isset($_SESSION['page'])){
    $_SESSION['page'] = 'lugaw';
}

if (empty($_SESSION['token']) && !isset($_SESSION['token'])) {
    $_SESSION['token'] = generate_token();
}

// $user_role = strtolower($_SESSION['role']['Description']);
// $roles = array(['superadmin', 'admin', 'project_manager']);

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
        <nav id="sidebar" >
            <div class="sidebar-header" style="height: 58px;">
                <h3><img src="../assets/images/index/logo.png" class="img-fluid" /><span>USERNAME</span></h3>
            </div>
            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>Lugaw</span></a>
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

                        <a class="navbar-brand" href="#"> Lugaw </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent"></div>
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow "> 
                                <!-- card-stats -->
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                        <span class="material-icons">library_add</span>
                                        <small></small>
                                    </div>
                                </div> 

                                <div class="card-body text-center">
                                    <div class="card-text">
                                        <h6> <button type="button" class="btn btn-pink text-dark btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">Add Project</button></h6>
                                    </div>
                                </div> 

                                <div class="card-footer text-right">
                                    <div class="stats"> 
                                        <!-- <i class="material-icons text-info">info</i> -->
                                        <a href="#">&nbsp;</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow "> 
                                <!-- card-stats -->
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                        <span class="material-icons">library_books</span>
                                        <small>Total Count</small>
                                    </div>
                                </div> 

                                <div class="card-body text-center">
                                    <div class="card-text">
                                        <h1>0</h1>
                                    </div>
                                </div> 

                                <div class="card-footer text-right">
                                    <div class="stats"> 
                                        <!-- <i class="material-icons text-info">info</i> -->
                                        <a href="#">Pending Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow ">
                                <!-- card-stats -->
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                        <span class="material-icons">collections_bookmark</span>
                                        <small>Total Count</small>
                                    </div>
                                </div> 

                                <div class="card-body text-center">
                                    <div class="card-text">
                                        <h1>0</h1>
                                    </div>
                                </div> 

                                <div class="card-footer text-right">
                                    <div class="stats"> 
                                        <!-- <i class="material-icons text-info">info</i> -->
                                        <a href="#">Approved Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow"> 
                                <!-- card-stats -->
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                        <span class="material-icons">done_all</span>
                                        <small>Total Count</small>
                                    </div>
                                </div> 

                                <div class="card-body text-center">
                                    <div class="card-text">
                                        <h1>0</h1>
                                    </div>
                                </div> 

                                <div class="card-footer text-right">
                                    <div class="stats"> 
                                        <!-- <i class="material-icons text-info">info</i> -->
                                        <a href="#">Completed Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php require("footer-dashboard.php"); ?>
                    </div>
                </div>
            </div>

            <?php require_once("../src/api/add-project.php"); ?>
            
            <!-- Add Project Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Project</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form mb-5">
                                
                                <form enctype="multipart/form-data" method="POST" name="form-add-projects" id="form-add-projects" >
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-8">

                                                <div class="row mb-3">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
                                                        <label for="name" class="form-label">Project Title</label>
                                                        <input type="text" class="form-control" placeholder="Project title" aria-label="Project Title" name="project-title" id="project-title">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-12">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Project Description</label>
                                                        <textarea class="form-control" placeholder="Description" id="project-description" name="project-description" rows="5"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-12">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Account Number to deposit:</label>
                                                        <input type="text" class="form-control" placeholder="1234-5678-9012-3456" aria-label="Account number" name="project-deposit-number" id="project-deposit-number">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-12">
                                                        <label for="formFile" class="form-label">Project Images</label>
                                                        <input class="form-control" type="file" name="project-images[]" id="project-images[]" multiple>
                                                        <label>*First uploaded image will be shown as the project thumbnail </label>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-12">
                                                        <label for="name" class="form-label">Project Deadline</label>
                                                        <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="Project Deadline" aria-label="projdeadline" id="project-deadline" name="project-deadline">
                                                    </div>
                                                </div>

                                                <div class="row text-center">
                                                    <div class="col-lg-12">
                                                        <input type="submit" name="btn-submit" id="btn-submit">
                                                        <button type="button" class="btn1 btn-lg btn-pink" style="width:250px" id="btn-add">Add</button>
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

                // // Add record
                // $(document).on('click','#btn-add',function(e) {
                //     var form_data = new FormData();

                //     // Read selected files
                //     var totalfiles = document.getElementById('project-images').files.length;
                //     for (var index = 0; index < totalfiles; index++) {
                //         form_data.append("files[]", document.getElementById('project-images').files[index]);
                //     }

                //     var data = $("#form-add-projects").serialize();
                //     console.log(data);
                //     $.ajax({
                //         data: data,
                //         type: "POST",
                //         contentType: false,
                //         processData: false,
                //         url: "../src/api/add-project.php",
                //         success: function(dataResult){
                //             var dataResult = JSON.parse(dataResult);
                //             console.log(dataResult);
                //         //         if(dataResult.statusCode === 200){
                //         //             $('#addEmployeeModal').modal('hide');
                //         //             alert('Data added successfully !'); 
                //         //             location.reload();						
                //         //         }
                //         //         else if(dataResult.statusCode === 201){
                //         //             alert(dataResult);
                //         //         }
                //         },
                //         error: function(err){
                //             console.log(err);
                //         }
                //     });
                // });

            });
        </script>
    </body>
</html>