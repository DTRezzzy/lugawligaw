<?php 
require_once("../src/utils/auto-copyright.php");
require_once("../config/database.php");
require_once("../src/utils/pagination.php");

$database = new Database();
$db = $database->get_connection();

$stmt = $db->query("SELECT COUNT(Id) as id from fund_projects")->fetch(PDO::FETCH_ASSOC);
$total_rows = $stmt['id'];
if($total_rows > 0){
    // Calculate total pages
    $total_pages = ceil($total_rows / $records_per_page);
    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;

    $project_details = $db->query("SELECT id, Title, Description, SUBSTRING_INDEX(ProjectImages, '|',1) as ProjectImages, ProjectDeadline FROM fund_projects ORDER BY DateCreated DESC LIMIT {$records_per_page} OFFSET {$from_record_num}")->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html lang="en">
    <head>

    <!-- Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/bootstrap513.bundle.min.js"></script>

    <title>NCR Political Unit</title>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-1 fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="../assets/images/index/POLITICAL UNIT2.png" alt="Team Leni">
                </a>

                <button class="navbar-toggler btn bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto" >
                        <li class="nav-item" style="padding: 5px;">
                            <a href="../index.php" class="nav-link btn btn-primary mt-auto">BACK TO HOME</a>
                        </li>
                        <li class="nav-item" style="padding: 5px;">
                            <a href="about-us.php" class="nav-link btn btn-primary mt-auto">ABOUT US</a>
                        </li>
                        <li class="nav-item" style="padding: 5px;">
                            <a href="lugaw-register.php" class="nav-link btn btn-primary mt-auto">REGISTER</a>
                        </li>
                        <li class="nav-item" style="padding: 5px;">
                            <a href="lugaw-login.php" class="nav-link btn btn-primary mt-auto">LOG IN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- bg -->
        <section class="" >
            <img src="../assets/images/index/LeniBackground.png" alt="Team Leni BG" class="img-fluid">
        </section>

        <!-- fields -->
        <section id="team" class="p-5">

            <div class="container">
                <h5 class="section-title h1 text-center">PROJECTS</h5>
                <div class="row">
                <?php 
                if($total_rows > 0) {
                    foreach($project_details as $project_details):
                        //$first_image = explode('|', $project_details['ProjectImages']);           
                    ?>
                    <!-- Card Start -->
                    <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                        
                        <!-- ontouchstart="this.classList.toggle('hover')" -->
                        <div class="image-flip" > 
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p>
                                                <img class="img-fluid"
                                                    src="<?php echo htmlspecialchars("../".$project_details['ProjectImages']); ?>"
                                                    alt="card image">
                                            </p>
                                            <h4 class="card-title">
                                                <?php echo htmlspecialchars($project_details['Title']); ?>
                                            </h4>
                                            <p class="card-text">
                                                <?php echo htmlspecialchars($project_details['Description']); ?>
                                            </p>
                                            <a href="lugaw-login.php" class="nav-link btn mt-auto text-white" style="background: rgb(254,24,163);" data-bs-toggle="modal" data-bs-target="#viewproject"><b>View</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card End -->
                    <?php 
                    endforeach; }
                    ?>
                </div>
            </div>
        </section>

        <?php if($total_rows > 0){ ?>
        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                            href="<?php if($page >= $total_pages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php } ?>

        <!-- Project Modal -->
        <div class="modal" id="viewproject">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Lugaw Project</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form mb-5 mx-5">
                            <form action="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-11 ">

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Project Images</h5>
                                                </div>
                                                <div id="carouselExampleFade" class="carousel slide carousel-fade ps-5" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="rounded mx-1 my-2 d-block " src="../assets/images/index/LIGAW BUTTON RECT.png" width="100%">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="rounded mx-1 my-2 d-block " src="../assets/images/index/LUGAW BUTTON RECT.png" width="100%">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Project Title</h5>
                                                    <h3 class="ps-5">TEST TITLE</h3>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Project Description</h5>
                                                    <h3 class="ps-5">This is a test description, please ignore and move along. Thank You</h3>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Project Deadline</h5>
                                                    <h3 class="ps-5">03/10/2022</h3>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Project Head</h5>
                                                    <h3 class="ps-5">Sean Mark Cajuban</h3>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Contact Information</h5>
                                                    <h3 class="ps-5">Number</h3>
                                                    <h3 class="ps-5">Email</h3>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-12">
                                                    <h5>Account Number</h5>
                                                    <h3 class="ps-5">xxxxxxxxxxx</h3>
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

        <!-- Footer -->
        <?php require("footer.php"); ?>

        <!-- Bootstrap Bundle with Popper -->
        <script src="../assets/js/bootstrap513.bundle.min.js"></script>
    </body>
</html>