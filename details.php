<?php
	include_once 'db.php';
	session_start();

	$id = $_SESSION['id'];

	$sql = "SELECT * FROM users4 WHERE u_id='$id'";
	$result = mysqli_query($conn,$sql);
	
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
	<body>
				</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major">DETAILS</h2>
							<form method="post" action="details_inc.php">
								<div class="fields">
									<div class="field">
										<label for="name">First Name</label>
										<input type="text" name="fname" id="name"  />
									</div>
									
									<div class="field">
										<label for="name">Last Name</label>
										<input type="text" name="lname" id="name"  />
									</div>

									<div class="field">
										<label for="contact">Phone</label>
										<input type="text" name="phone" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" />
									</div>
									<div class="field pass_field" style="display: none;">
										<label for="pass">Current Password</label>
										<input type="text" name="c_pwd" id="name" />
									</div>
									<div class="field pass_field" style="display: none;">
										<label for="new_pass">New Password</label>
										<input type="text" name="n_pwd" id="name" />
									</div>
									<div class="field pass_field" style="display: none;">
										<label for="retype_pass">Re-Type New Password</label>
										<input type="text" name="ren_pwd" id="name" />
									</div>

								</div>
								<ul class="actions">
									<li><button type="button" onclick="chg_pwd()"> Change Password</button></li>
									<li><input type="submit" value="Confirm" /></li>
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

			<script>
				var showing = 0;

				function chg_pwd(){
					if(!showing)
					{
						for(var i=0;i<3;++i)
						{
							var x = document.getElementsByClassName("pass_field")[i];
							x.style.display = "block";
							if(i == 2)
								showing = 1;
						}
					}
					else{
					for(var i=0;i<3;++i)
						{
							var x = document.getElementsByClassName("pass_field")[i];
							x.style.display = "none";
							if(i == 2)
								showing = 0;
						}	
					}
				}
			</script>
	</body>
</html>