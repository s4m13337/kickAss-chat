<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "root";

    $conn = new mysqli($db_host, $db_user, $db_pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
?>