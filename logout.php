<?php
    //user logout, clear session
    session_start();
    unset($_SESSION['email']);
    header("location:Welcome.php");
?>