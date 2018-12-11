<?php
    session_start();
    include_once '../../db.php';

    if($_SESSION['id'])
    {
        $id = $_SESSION['id'];

        $sql = "SELECT ttoken FROM token WHERE u_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $time = (int)$row['ttoken']; 

    // ---------------- CURL -------------------
        
        $data = array("timestamp"=>$time);
        $string = http_build_query($data);

        echo $string;

        $ch = curl_init("http://localhost/oo/plotter/html/curl_ini.php");
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        curl_exec($ch);
        curl_close($ch);

        //send the user to the index page
        header("Location: c.php");
        exit();
    }
    else{
        header("Location: login/login.html?Please_login_to_continue");
        exit();
    }
    // https://www.youtube.com/watch?v=2YdBrkDdn0M
?>