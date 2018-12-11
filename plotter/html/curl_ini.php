<?php
    session_start();
    include_once '../../db.php';

    if(isset($_POST['timestamp'])){ 
        $time = mysqli_real_escape_string($conn,$_POST['timestamp']);
        $sql = "INSERT INTO curl (time_s) VALUES ('$time')";
        $r = mysqli_query($conn,$sql);
    }

?>