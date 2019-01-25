<?php
    include_once '../../db.php';

	//this is the main web page
	// time stamp and the file must be taken after submitting the form 
	if(mysqli_real_escape_string($conn,$_POST['times'])){
		$time = mysqli_real_escape_string($conn,$_POST['times']);
?>

<html>
	<head>
	<title> NITK </title>
		<link rel="icon" type="image/gif" href="uploads/nitk.png" />
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	</head>
	<style>
		h3{
            font-family: 'Oswald', sans-serif;
			color: #f13c20;
			font-weight: bold;
		}	

		.g{
			font-weight: bold;
			color: green;
		}
		input{
			margin-left: 20%;
		}
	</style>

	<form action="plotter_inc.php" method="POST" enctype="multipart/form-data">
		<input type="text" name="times" style="display:none;" value="<?php echo $time; ?>">
		 <h3> Choose a <span class="g"> G-Code </span> file to plot in the plotter </h3> <br>
		<input type="file" name="file">
		<button type="submit" name="submit">SUBMIT</button>
	</form>
	<?php
		}else{
			echo "You are not authorized to access this page. Please go back";
		}
	?>
</html>
	