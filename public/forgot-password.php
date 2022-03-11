<?php 
include_once("../src/utils/auto-copyright.php"); 
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
		<link rel="stylesheet" href="../assets/css/form-forgotpassword.css">

		<title>NCR Political Unit</title>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-1 fixed-top">
			<div class="container-fluid">
				<div href="#" class="navbar-brand">
					<img src="../assets/images/index/POLITICAL UNIT3 NEW.png" alt="Team Leni" height="45px" width="250px">
				</div>

				<button class="navbar-toggler btn bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navmenu">
					<ul class="navbar-nav ms-auto" >
						<li class="nav-item" style="padding: 5px;">
							<a href="../index.php" class="nav-link btn btn-pinkish mt-auto  text-white"><b>HOME</b></a>
						</li>
						<li class="nav-item" style="padding: 5px;">
							<a href="about-us.php" class="nav-link btn btn-pinkish mt-auto  text-white"><b>ABOUT US</b></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		<!-- Section background -->
		<section class="" style="text-align:center; margin-top: -4px;">
			<img src="../assets/images/index/LeniBackground.png" alt="Team Leni BG" class="img-fluid">
		</section>

		<!-- Form -->
		<div class="pb-5">
			<section class="p-5">
				<div class="container">
					<div class="row">
						<div class="content">
							<div class="flex-div">
								<form action="" method="POST">								
									<h2 class="">Forgot Password?</h5>		
										<p>
											Please provide the email address that you used when you signed up for your account.
										</p>
										<h5>Email</h5>
										<input name="email" type="text" placeholder="Email" />
										<h5>New Password</h5>
										<input name="newpassword" type="password" placeholder="New Password" />
										<h5>Retype New Password</h5>
										<input name="retypenewpassword" type="retypepassword" placeholder="New Password" />
										<input type="submit" value="Proceed" name="btn-login-ligaw" class="login">
										<hr>
                                </form>
							</div>
						</div>
					</div>
                </div>
            </section>
        </div>
			
        <!-- Footer -->
        <?php require("footer.php"); ?>

        <script src="../assets/js/bootstrap513.bundle.min.js"></script>
        <script src="../assets/js/mapbox-gl.js"></script>
    </body>
</html>