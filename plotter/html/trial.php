<?php
    include_once "../../db.php";
    session_start();
    $id = $_SESSION['id'];

        //$_SESSION['2d'] = 0; 
        $sql = "DELETE FROM token where u_id='$id'"; 
        //$sql = "INSERT INTO token VALUES ('tdm','1122334','7')";
		$result = mysqli_query($conn,$sql);
?>