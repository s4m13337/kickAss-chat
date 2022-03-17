<?php
    session_start();
    include("db.php");
    if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        if(strlen($username)==0 || strlen($password)==0)
            header("Location:login.php?err=1");
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);
        $row_count = $result->num_rows;
        if($row_count==0)
            header("Location:login.php?err=2");
        else{
            $_SESSION["username"] = $username;
            header("Location:index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kickAss Chat!</title>
</head>
<body>
    <h1>kickAss Chat login!</h1>
    <?php
        if(isset($_GET["err"])){
            $error_id = $_GET["err"];
            if($error_id==0)    
                echo("You need to login to see this page!<br><br>");
            elseif($error_id==1)
                echo("Username/ Password cannot be blank!<br><br>");
            elseif($error_id==2)
                echo("Username/ Password is wrong!<br><br>");
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