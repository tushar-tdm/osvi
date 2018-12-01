<?php
	session_start();
	include_once 'db.php';

	//check whether it is a teacher visit.
	
	$id = $_SESSION['id'];
	
	if($id){
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

	else{
		header("Location: login/login.html?login_to_continue");
		exit();
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
			<div id="page-wrapper">
					<header id="header" class="alt">
						<h1><a href="index.html">OSVI</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.php">Home</a></li>
								<li><a href="stud_pro.php">Profile</a></li>
								<li><a href="logout.php">Log Out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
				

				
					<section id="banner">
						<div class="inner">
							<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<p class="name"> <?php echo $fname." ".$lname; ?></p>
									<p class="name" style="font-size:25px;"> <?php echo $roll; ?></p>
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
										<img src="<?php echo "uploads/default.jpg" ?>" class="dp_container col-lg-offset-5 col-md-offset-4 col-sm-offset-4 col-xs-offset-2" alt="def">
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

				
					<section id="wrapper">

						
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
									<div class="content">
										<h2 class="major">Open Source Virtual Instrumentation</h2>
										<p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
										<button class="special" onclick = "show_exp()">Experiments</button>
										<div id="exp" style="display: none;">
											<a href="plotter/html/index.php">2D-Plotter</a><br>
											<a href="led/rta.php">LED Control</a><br>
											<a href="prabhu/index.php">BARLINKAGE CONTROL</a><br>
											<a href="rubick/index.php">Rubick</a><br>
											<a href="#">Experiment 5</a><br>
											<a href="#">Experiment 6</a>
										</div>
									</div>
								</div>
							</section>

				
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
									<li><input type="submit" value="Edit DETAILS" /></li>
								</ul>
							</form>
							
							<ul class="copyright">
								<li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

	
		<script >
		function show_exp()
		{
			var x = document.getElementById("exp");
			if(x.style.display == "none"){
				x.style.display = "block";
			}

			else{
				x.style.display = "none";
			}
		}			
		</script>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>