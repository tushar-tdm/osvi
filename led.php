<?php
    /* $obj = json_decode($_GET['x'], false);

     $led = $_POST['led'];
    $act = $_POST['act']; 

    $led = $obj[0];
    $act = $obj[1]; */
    $t = "km"; 

    shell_exec("python C:/xampp/htdocs/osvi-local/pyth.py $t");

    //header("Location: rpi.php");
?>