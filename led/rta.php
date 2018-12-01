<?php
    $obj = json_decode($_GET["b"]);
    $l = $obj[0];

    shell_exec("python C:/xampp/htdocs/osvi-local/led/rta.py $l 2>&1");

?>