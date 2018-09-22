<?php
include_once 'db.php';
session_start();
// for signing in
if(isset($_POST['signup']))
{			//isset -> checks if something is existing inside the file

	$first = mysqli_real_escape_string($conn, $_POST['fname']);
	$last = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	//here roll no is user id
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//to check if any field is empty
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ) {
		header("Location: login/signup.html?signup=emptyfield");
		exit();
	}
	else
	{
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last))
		{
		//perg_match : goes in and checks if have some certain characters inside the string
			header("Location: login/signup.html?signup=invalid");
			exit();
		}
		else
		{
			//check for valid email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
			//filter_var :checks a certain string using a specific method inside the php lang
				header("Location: login/signup.html?signup=invalid_email");
				exit();
			}
			else
			{
				$sql ="SELECT * FROM users4 WHERE user_id='$uid'";
				$result = mysqli_query($conn,$sql);
				$result_check = mysqli_num_rows ($result);

				if($result_check >0)
				{
					header("Location: login/signup.html?signup=invalid_userid");
					exit();
				}
				else
				{
					//hashing or encrypting the password
					$hashpwd = password_hash($pwd,PASSWORD_DEFAULT);
					//insert the user into the database

					$sql = "INSERT INTO users4 (fname,lname,email,u_id,pass,phone,tech) VALUES ('$first','$last','$email','$uid','$hashpwd','$phone',0)";

					mysqli_query($conn,$sql);
					//now we retrirve this user from the database to get his ID
					$sql = "SELECT * FROM users4 WHERE user_id='$uid'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					
					$id = $row['user_id'];
					echo $id;
					/*$num = $row['num'];*/

					//now we try to insert the image
					$file = $_FILES['file'];
					if($_FILES['file']['error'] != 4)		//4 indicates that no file was selected.
					{
						$fileName = $_FILES['file']['name'];
						$fileSize = $_FILES['file']['size'];
						$fileType = $_FILES['file']['type'];
						$fileError = $_FILES['file']['error'];
						$fileTmpName = $_FILES['file']['tmp_name'];

						$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
						$allowed = array('jpg','jpeg','png');

						if($fileError != 0){
							echo $fileError."<br>";
							echo "there's an error while uploading the image"."<br>";
						}
						else{
							if(in_array($fileActualExt, $allowed)){
								if($fileSize < 10000000){ //approx 4mb
									//for the first time num will be equal to num
									$fileNewName = "profile".$uid."-1".".".$fileActualExt;
									$fileDestination = "uploads/".$fileNewName;
									move_uploaded_file($fileTmpName, $fileDestination);
									$sql = "INSERT INTO images (user_id,stat,format,num) VALUES ('$uid',1,'$fileActualExt',1)";	
									mysqli_query($conn,$sql);
								}
							}else{
								echo "files of this type are not allowed";
							}
						}
					}
					else{
						$def_ext = '.jpg';
						$sql = "INSERT INTO images (user_id,stat,format,num) VALUES (0,'$def_ext',0)";
						mysqli_query($conn,$sql);
					}
					$_SESSION['id'] = $uid;
					$_SESSION['teacher'] = 0;

					header("Location: stud_pro.php?signup=success");
					exit();
				}
			}
		}
	}
}

else {
	header("Location: signup.php");
	exit();		//closes and stops the script from running the code after the else statement
}
?>