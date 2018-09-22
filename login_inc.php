<?php

	session_start();
	include_once 'db.php';

	if(isset($_POST['login'])){
	
		$user = mysqli_real_escape_string($conn,$_POST['username']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);

		echo $user." ".$pass;

		if(empty($user) || empty($pass)){
			header("Location: login/login.html?login=emptyfield");
			exit();
		}
		else{
			$sql = "SELECT * from users4 WHERE u_id='$user'";
			$result = mysqli_query($conn,$sql);
			$result_check = mysqli_num_rows($result);

			if($result_check == 0){
				echo 'user not found!';
				header("Location: login/login.html?login=no user found");
				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($result))
				{
					if(password_verify($pass,$row['pass'])){
						/*echo "login succesfull"."<br>";*/
						$_SESSION['techer'] = $row['tech'];
						$_SESSION['id'] = $user;
						if($row['tech'] == 1){
							header("Location: tech_pro.php?login=success");
						}
						else{
							header("Location: stud_pro.php?login=success");
						}
					}
					else{
						header("Location: login/login.html?login=wrong_password");
					}
				}
			}
		}
	}
