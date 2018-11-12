<?php
    include_once 'db.php';
    session_start();

    session_destroy();
    header("Location: login/login.html?logged_out");
    exit();
?>