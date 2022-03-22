<?php
    session_start();
    include_once("db.php");
    if(!isset($_SESSION["id"])){
        header("Location:login.php?err=0");
        exit();
    }
    $username = $_SESSION["username"];
    $session_id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/users.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>kickAss Chat</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/boy.png" height="48px" class="avatar">
            <h3><?php echo ucfirst($username); ?></h3>
            <a href="logout.php" class="logout">Logout</a>
        </div>
        <div class="users-list"></div>
    </div>
    <script>
      feather.replace()
    </script>
    <script>
        setInterval(() => {
            fetch("users_list.php")
            .then(response => response.text())
            .then(output => document.querySelector(".users-list").innerHTML = output)
        }, 500);
    </script>
</body>
</html>