<?php
    include_once '../../db.php';

    $time = mysqli_real_escape_string($conn,$_POST['times']);
	
    $file = $_FILES['file'];
	if($_FILES['file']['error'] != 4)		//4 indicates that no file was selected
	{
		$fileName = $_FILES['file']['name'];
		$fileSize = $_FILES['file']['size'];
		$fileType = $_FILES['file']['type'];
		$fileError = $_FILES['file']['error'];
		$fileTmpName = $_FILES['file']['tmp_name'];

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('gcode');

		if($fileError != 0){
			echo $fileError."<br>";
			echo "there's an error while uploading the g-code"."<br>";
		}
		else{
			if(in_array($fileActualExt, $allowed)){
                if($fileSize < 4000000){ //approx 4mb
					//for the first time num will be equal to num
					$fileNewName = $time.".gcode";
					$fileDestination = "uploads/".$fileNewName;
					move_uploaded_file($fileTmpName, $fileDestination);
					//file transfer successfull so call python code
					shell_exec("python /var/www/html/pyplotter.py ".$fileNewName." 2>&1");
            	}
			}else{
				echo "files of this type are not allowed";
				}
			}
	}
	else{
        header("Location: http://192.168.3.1/plotter.php?Please_choose_a_file");
        exit();
    }

    // --------------------------------- IMP ---------------------------------
	/*		FINAL PLAN
		we will upload the website on nitk server it self. and connect each project with the website through LAN
		after uploading it to the uploads folder.
		call another php file which sends the file through ftp to the rpi
		in rpi run a script file which keeps checking whether a new file has arrivede or not
		if yes then call teh python file of plotter
	*/

    //from rpi this file can be accessed through this method:'
    //method explained in this video:  https://www.youtube.com/watch?v=7EyV3vYpQ8s
    //but we must call that function once the file has been uploaded.
    //if the server and the rpi are connected by lan then we can use localhost in rpi
    //we can then call the php script on rpi by the website on teh server
	
	// https://www.youtube.com/watch?v=x8xEZq43wgc - configure ftp on xampp.
	//this can be accessed by the server
	//https://stackoverflow.com/questions/1491020/get-the-latest-file-addition-in-a-directory (directory scanning)

	//we will host 
?>