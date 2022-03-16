<?php
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

    if($username == "test" && $password="test"){
        $_SESSION["username"] = $username;
        header("Location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kickAss Chat</title>
</head>
<body>
    <h1>kickAss Chat login!</h1>
    <?php
        if(isset($_GET["err"])){
                echo("You need to login to see this page!<br><br>");
            }
    ?>
    <form action="#" method="post">
        <label>Username</label><br> 
        <input type="text" name="username" id="username"><br><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" name="login" value="Log in">
    </form>
</body>
</html>