<?php
	session_start();
	include_once 'db.php';

	if($_SESSION['teacher'] == 0){
		header("Location: login/login.html");
	}

	if($_SESSION['id'])
	{
		$id = $_SESSION['id'];

		$sql = "SELECT * FROM users4 WHERE u_id='$id'";
		$result = mysqli_query($conn,$sql);
		$n = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		$fname = $row['fname'];
		$lname = $row['lname'];
		$roll = $row['u_id'];
		$email = $row['email'];
		$phone = $row['phone'];

		$sql = "SELECT * FROM images WHERE `user_id` = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$format = $row['format'];
		$stat = $row['stat'];
	}

	if($_SESSION['2d'] == 1){
		$_SESSION['2d'] = 0;
		$sql = "DELETE FROM token WHERE u_id = '$id'";
		$result = mysqli_query($conn,$sql);
	}

	if($_SESSION['rubick'] == 1){
		$_SESSION['rubick'] = 0;
		$sql = "DELETE FROM rtoken WHERE u_id='$id'";
		$result = mysqli_query($conn,$sql);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>NITK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" type="image/gif" href="uploads/nitk.png" />
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
								<li><a href="tech_pro.php">Profile</a></li>
								<li><a href="logout.php"> Log out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<p class="name"> <?php echo $fname." ".$lname; ?></p>
								</div>
								<div class="col-lg-6">	
									<?php
									if($stat == 1){
									?>
									<img src="<?php echo "uploads/profile".$id.".".$format; ?>" class="dp_container col-lg-offset-5 col-md-offset-4 col-sm-offset-4 col-xs-offset-2" alt="abc">
									<?php 
										}
									else{
									?>
									<img src="<?php echo "uploads/default.jpg" ?>" class="dp_container col-lg-offset-5 col-md-offset-4 col-sm-offset-4 col-xs-offset-2" alt="def	">
									<?php
									}
									?>									
								</div>
							</div>
						</div>
						</div>
						
						<br><br><br>
						<h2 class="labs" style="margin-left: 20px;margin-bottom: -20px;color:#4abdac;">LABS</h2>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<!-- One -->
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<a class="image"><img src="images/pic01.jpg" alt="" /></a>
									<div class="content">
										<h2 class="major">OSVI</h2>
										<p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
										<button onclick="show_exp(1)"> Experiments</button>
										<div class="experiment" style="display: none;">
											<a href="led/rta.php">LED Control</a><br>
											<a href="plotter/html/index.php">2D Plotter</a><br>
											<a href="prabhu/index.php">BARLINKAGE CONTROL</a><br>
											<a href="rubick/index.html">Rubick's Solving Machine</a><br>
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
										<h2 class="major">Strength Of Materials</h2>
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
										<?php
											$sql = "SELECT * FROM recent ORDER BY doe DESC";
											$result = mysqli_query($conn,$sql);
											$count = 0;
											while($row = mysqli_fetch_assoc($result)){
												$userid = $row['user_id'];
												
												// these are saple users so dont have these entries in images and 
												// users4 table. so make valid users entry and check expain.
												$sql = "SELECT * FROM `images` WHERE `user_id` = '$userid'";
												$result2 = mysqli_query($conn,$sql);
												$row2 = mysqli_fetch_assoc($result2);
												
												$f = $row2['format']; $s = $row2['stat'];
												if($s == 1){	
													$picloc = "uploads/profile/".$userid.".".$f;
												}else{
													$picloc = "uploads/default.jpg";
												}

												$sql = "SELECT * FROM `users4` WHERE `u_id`='$userid'";
												$result3 = mysqli_query($conn,$sql);
												$row3 = mysqli_fetch_assoc($result3);

										?> 
										<article>
											<a class="image"><img src="<?php echo $picloc; ?>" alt="profile" /></a>
											<h3 class="major"><?php echo $row3['fname']; ?></h3>
											<p><?php echo $row['exp']; ?></p> <!-- user_id is the roll no for the students -->
											
											<form id="<?php echo "myform".$count; ?>" action="result_display.php" method="POST">
												<input type="number" name="picnum" value="<?php echo $row['picnum']; ?>" style="display:none;">
												<input type="text" name="user" value="<?php echo $row['user_id']; ?>" style="display:none;">	
											<a onclick="submitform(<?php echo $count; ?>)" class="special" style="margin-left:-20px;margin-top:-20px;cursor:pointer;" 
											type="submit">Profile</a>
											</form>
								
										</article>
										 <?php
										 		$count++;
											}
										?> 
									</section>
								</div>
							</section>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major">DETAILS</h2>
							<form method="post" action="details.php">
								<div class="fields">
									
								<div class="field">
										<label for="fname">First Name</label>
										<input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" />
									</div>
									<div class="field">
										<label for="lname">Last Name</label>
										<input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" value="<?php echo $email; ?>"/>
									</div>
									<div class="field">
										<label for="message">Phone</label>
										<input type="text" name="phone" id="phone" value="<?php echo $phone; ?>"/>
									</div>

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

				function submitform(c){
					var idd = "myform"+c;
					var i = idd.toString();					
					document.getElementById(i).submit();
				}
			</script>
	</body>
</html>