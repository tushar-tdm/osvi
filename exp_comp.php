<?php
	include_once 'db.php';
	session_start();

	//$_SESSION['teacher'] = 1;

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
	<style>
		table {
		    width:100%;
		}
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		th, td {
		    padding: 15px;
		    text-align: left;
		}
		table#t01 tr:nth-child(even) {
		    background-color: #eee;
		}
		table#t01 tr:nth-child(odd) {
		   background-color: #fff;
		}
		table#t01 th {
		    background-color: black;
		    color: white;
		}
		</style>
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
						<div class="row">
			
							<div class="col-lg-6">
									<p class="name"> <?php echo $fname." ".$lname; ?></p>
								</div>
								<div class="col-lg-6">	
									<img src="uploads/default.jpg" class="dp_container col-lg-offset-5 col-md-offset-4 col-sm-offset-4 col-xs-offset-2">
								</div>
							</div>

							<hr>
							<h3> Experiment ABCD </h3>
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<!-- One -->
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<div class="content">
										<h4> Result</h4>
										<table id="t01">
										  <tr>
										    <th>Firstname</th>
										    <th>Lastname</th> 
										    <th>Age</th>
										  </tr>
										  <tr>
										    <td>Jill</td>
										    <td>Smith</td>
										    <td>50</td>
										  </tr>
										  <tr>
										    <td>Eve</td>
										    <td>Jackson</td>
										    <td>94</td>
										  </tr>
										  <tr>
										    <td>John</td>
										    <td>Doe</td>
										    <td>80</td>
										  </tr>
										</table>
									</div>
								</div>
							</section>

						<!-- Two -->
							<section id="two" class="wrapper alt spotlight style2">
								<div class="inner">
									<div class="content">
										here we display the video if experiment is being done
										<div style="text-align:center"> 
										  <button onclick="playPause()">Play/Pause</button> 
										  <button onclick="makeBig()">Big</button>
										  <button onclick="makeSmall()">Small</button>
										  <button onclick="makeNormal()">Normal</button>
										  <br><br>
										  <video id="video1" width="420" style="border:solid 2px black">
										    <source src="mov_bbb.mp4" type="video/mp4">
										    <source src="mov_bbb.ogg" type="video/ogg">
										    Your browser does not support HTML5 video.
										  </video>
										</div> 
									</div>
								</div>
							</section>

						<?php
							if($_SESSION['teacher'] == 1)
							{
						?>
						<!-- Three -->
							<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<div class="content">
										Here if teacher is viewing this page then we give some space for reviews/remarks
										<div class="field">
											<label for="message">REMARKS</label>
										<textarea name="message" id="message" rows="4"></textarea>
										<input type="submit" value="Give Remark" style="margin-top:20px;">
									</div>
									</div>
								</div>
							</section>

							<!-- Four -->
							<!-- this must be displayed only when a teacher views this page -->
							
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
							
							<?php
								}
							?>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
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

			<script> 
				var myVideo = document.getElementById("video1"); 

				function playPause() { 
				    if (myVideo.paused) 
				        myVideo.play(); 
				    else 
				        myVideo.pause(); 
				} 

				function makeBig() { 
				    myVideo.width = 560; 
				} 

				function makeSmall() { 
				    myVideo.width = 320; 
				} 

				function makeNormal() { 
				    myVideo.width = 420; 
				} 
				</script>
	</body>
</html>