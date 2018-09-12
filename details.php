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
								</div>
								<ul class="actions">
									<li><input type="submit" value="Edit Details" /></li>
									<li><button onclick="chg_pwd()"> Change Password</button>
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