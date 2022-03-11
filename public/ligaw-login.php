<?php 
session_start();

require_once('../config/database.php');
include_once('../src/utils/generate-token.php');
include_once('../src/utils/sanitize-input.php');
include_once('../src/utils/auto-copyright.php');

if (empty($_SESSION['token']) && !isset($_SESSION['token'])) {
    $_SESSION['token'] = generate_token();
}
if(!isset($_SESSION['page'])){
    $_SESSION['page'] = 'ligaw';
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
		<link rel="stylesheet" href="../assets/css/form-ligaw.css">

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
                            <a href="../index.php" class="nav-link btn mt-auto text-white" style="background: rgb(254,24,163);"><b>HOME</b></a>
                        </li>
                        <li class="nav-item" style="padding: 5px;">
                            <a href="about-us.php" class="nav-link btn mt-auto text-white" style="background: rgb(254,24,163);"><b>ABOUT US</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


		<!-- Section background -->
		<section class="" style="text-align:center; margin-top: -4px;">
			<img src="../assets/images/index/LeniBackground.png" alt="Team Leni BG" class="img-fluid">
		</section>

		<div class="spacebot">
			&nbsp;
		</div>

		<!-- Form -->
		<section class="px-1 py-5">
			<div class="container">
				<div class="row justify-content-center">

					<div class="content">
						<div class="flex-div">
							<div class="name-content">
								<h1 class="logo">LENI ROBREDO</h1>
								<p class="subhead">Tara. Ipanalo na natin ito!</p>
							</div>

							<form action="../src/api/login.php" method="POST">
								<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
								<h5 class="subheaderform">Ligaw Login</h5>
								<input name="email" type="text" placeholder="Email" />
								<input name="password" type="password" placeholder="Password" />
								<input type="submit" value="Submit" name="btn-login-ligaw">
								<a href="forgot-password.php" class="a mx-2">Forgot password?</a>
								<hr>
							</form>

						</div>
					</div>
			</section>

		<!-- Footer -->
		<?php require("footer.php") ?>

		<script src="../assets/js/bootstrap513.bundle.min.js"></script>
		<script src="../assets/js/mapbox-gl.js"></script>
	</body>
</html>