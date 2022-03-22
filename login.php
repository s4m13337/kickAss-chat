<?php
    session_start();
    include_once("db.php");
    if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        
        // Check if username or password is blank
        if(strlen($username)==0 || strlen($password)==0)
            header("Location:login.php?err=1");
        else{
            $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
            $result = $conn->query($query);
            $row_count = $result->num_rows;
            if($row_count==0)
                header("Location:login.php?err=2");
            else{
                $row = $result->fetch_assoc();
                $_SESSION["id"] = $username.$row['id'];
                $_SESSION["username"] = $username;
                $conn->query("UPDATE login SET status=1 where username='$username'");
                header("Location:users.php");
            }
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
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
    <div class="login">
        <h1>kickAss Chat login!</h1>
        <?php
            if(isset($_GET["err"])){
                $error_id = $_GET["err"];
                if($error_id==0)    
                    echo("<div class=error>You need to login to see this page!</div>");
                elseif($error_id==1)
                    echo("<div class=error>Username/ Password cannot be blank!</div>");
                elseif($error_id==2)
                    echo("<div class=error>Username/ Password is wrong!</div>");
            }
        ?>
        <form action="#" method="post">
            <input class="text-field" type="text" name="username" id="username" placeholder="Username"><br>
            <input class="text-field" type="password" name="password" id="password" placeholder="Password"><br>
            <input class="login-button" type="submit" name="login" value="Log in">
        </form>
            <a class="signup-button" href="signup.php">Sign up!</a>
    </div>    
</body>
</html>