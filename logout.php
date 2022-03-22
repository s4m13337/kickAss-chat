<?php
    session_start();

    // Update user status
    include_once("db.php");
    $username = $_SESSION['username'];
    $conn->query("UPDATE login SET status=0 where username='$username'");

    session_unset();
    session_destroy();
    header("Location:login.php");
?>