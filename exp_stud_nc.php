<?php
	include_once 'db.php';
	session_start();

	$_SESSION['teacher'] = 1;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>NITK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">NITK</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.html">Home</a></li>
								<li><a href="login/login.html">Log In</a></li>
								<li><a href="login/signup.html">Sign Up</a></li>
								<li><a href="logout.php"> Sign-out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="content">
							<div class="row">
								<div class="col-lg-6">
									<p class="name">Experiment ABCD</p>
									<h3> Prinicpal</h3>
										<h6>This is the principal of the experiment</h6>
										<br>
									<h3> Process </h3>
										<h6>Explanation of the process ..</h6>	
								</div>

							</div>
							<hr>
							<?php
								if($_SESSION['teacher']==0){
							?>
								<input type="submit" value="start Expermient"/>
							<?php
							 }
							?>		
							</div>
						</div>
					</section>

				<!-- Wrapper -->
				<section id="wrapper">

						<?php
							if($_SESSION['teacher'] == 1)
							{
						?>
							<!-- this must be displayed only when a teacher views this page -->
							
							<section id="one" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">RECENT USERS</h2>
									<section class="features">
										<!-- php code to display all the users -->
										<!-- <?php
											$i = 0;
											for($i=0;$i<6;++$i){
										?> -->
										<article>
											<a href="#" class="image dp_container"><img src="images/default.jpg" alt="" /></a>
											<h3 class="major">Name</h3>
											<p>Roll No</p>
											<a href="#" class="special" style="margin-left:-20px;margin-top:-20px; ">Profile</a>
										</article>
										<!-- <?php
											}
										?> -->
									</section>
								</div>
							</section>
							
							<?php
								}
							?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

			<script>
				function show_exp(exp){
					var x = document.getElementsByClassName("experiment")[exp-1];
					x.style.display = "block";
				}
			</script>
	</body>
</html>