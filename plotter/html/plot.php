<?php
//send the gcode file and time stamp

    session_start();
    include_once '../../db.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM token WHERE u_id = '$id'";
    $r = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($r);

    $time = (int)$row['ttoken'];

    /* $cwd = getcwd();
    $path = "@".$cwd."\sim\\test.gcode"; */

    $data = array("timestamp"=>$time);
    $string = http_build_query($data);

    //here the actual website

    $ch = curl_init("http://nitkosvi.000webhostapp.com/plotter.php");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_exec($ch);
    curl_close($ch);

?>