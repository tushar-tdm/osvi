<?php

    $char = json_decode($_GET["a"],false);

    echo shell_exec("python /var/www/html/send.py $char 2>&1");
?>