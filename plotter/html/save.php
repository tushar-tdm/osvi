<?php
    $obj = json_deode($_GET["b"],false);
    $uid = $obj;
    shell_exec("python C:/xampp/htdocs/oo/plotter/html/save.py $uid 2>&1");

    //do not return anything
?>
