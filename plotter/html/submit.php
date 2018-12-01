<?php
    include_once '../../db.php';
    session_start();

    $id = $_SESSION['id'];

    $sql = "SELECT * from ppics where u_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $count = 0;

    while($row = mysqli_fetch_assoc($result)){
        if($row['u_id'] == $id)
            $count++;
    }

    $count = $count+1;
    //now store this data in the recent users.
    $d = date("Y-m-d");
    $sql = "INSERT INTO `recent`( `user_id`, `exp`, `doe`, `picnum`) VALUES ('$id','plotter','$d','$count')";
    $result = mysqli_query($conn,$sql);

    $sql = "INSERT INTO `ppics` (`u_id`,`picnum`) VALUES ('$id','$count')";
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($result);

    $cnt = $count;
    echo shell_exec("python C:/xampp/htdocs/oo/plotter/html/submit.py ".$id." ".$count." 2>&1");
?>