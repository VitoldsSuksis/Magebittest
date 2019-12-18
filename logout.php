<?php
    session_start();
    include_once 'user.php';
    $user = new User();
    $user->logout();
    header("location:login.php");
?>