<?php
	
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
							<div class="dp_container">
								<img src="images/default.jpg" class="dp">
							</div>
							<h2 style="margin-top:10px;">Name</h2>
							
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<!-- One -->
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
									<div class="content">
										<h2 class="major">Strength Of Materials</h2>
										<p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
										<button onclick="show_exp(1)"> Experiments</button>
										<div class="experiment" style="display: none;">
											<a href="">Experiment 1</a><br>
											<a href="">Experiment 2</a><br>
											<a href="">Experiment 3</a><br>
											<a href="">Experiment 4</a>
										</div>
									</div>
								</div>
							</section>

						<!-- Two -->
							<section id="two" class="wrapper alt spotlight style2">
								<div class="inner">
									<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
									<div class="content">
										<h2 class="major">Fluid Mechanics</h2>
										<p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
										<button onclick="show_exp(2)"> Experiments</button>
										<div class="experiment" style="display: none;">
											<a href="">Experiment 1</a><br>
											<a href="">Experiment 2</a><br>
											<a href="">Experiment 3</a><br>
											<a href="">Experiment 4</a>
										</div>
									</div>
								</div>
							</section>

						<!-- Three -->
							<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
									<div class="content">
										<h2 class="major">OSVI</h2>
										<p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
										<button onclick="show_exp(3)"> Experiments</button>
										<div class="experiment" style="display: none;">
											<a href="">Experiment 1</a><br>
											<a href="">Experiment 2</a><br>
											<a href="">Experiment 3</a><br>
											<a href="">Experiment 4</a>
										</div>
									</div>
								</div>
							</section>

						<!-- Four -->
							<section id="four" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">RECENT USERS</h2>
									<section class="features">
										<!-- php code to display all the users -->
										<!-- <?php
											$i = 0;
											for($i=0;$i<6;++$i){
										?> -->
										<article>
											<a href="#" class="image"><img src="images/default.jpg" alt="" /></a>
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

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major">DETAILS</h2>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" disabled="true" />
									</div>
									<div class="field">
										<label for="contact">Phone</label>
										<input type="text" name="name" id="name" disabled="true"/>
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" disabled="true"/>
									</div>
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" disabled="true"/>
									</div>
 								<!--<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div> -->
								</div>
								<ul class="actions">
									<li><input type="submit" value="Edit Details" /></li>
								</ul>
							</form>
							<ul class="copyright">
								<li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

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