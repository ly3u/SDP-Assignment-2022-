<?php

//establish database connectivity
$server = "localhost";
$user = "root";
$pass = "";
$database = "apu_club";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}

?>