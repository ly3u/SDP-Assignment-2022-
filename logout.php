<?php
    //user logout, clear session
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['club']);
    unset($_SESSION['admin']);
    header("location:homepage.php");
?>