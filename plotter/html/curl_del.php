<?php
    session_start();
    include_once '../../db.php';

    $sql = "SELECT ttoken FROM token WHERE u_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $time = (int)$row['ttoken']; 

    $sql = "DELETE FROM curl WHERE time_s = '$time'";
    $r = mysqli_query($conn,$sql);

    
?>