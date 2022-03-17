<?php
    include("db.php");
    if(isset($_POST["sign_up"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        
        // Check if username already exists
        $query = "SELECT * FROM login WHERE username='$username'";
        $result = $conn->query($query);
        if($result->num_rows == 1)  
            header("Location:signup.php?err=1");
        
        // Check if passwords match
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $re_password = mysqli_real_escape_string($conn, $_POST["re_password"]);
        if($password != $re_password)
            header("Location:signup.php?err=2");
        
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        
        // Check if all fields are entered
        if($username=="" || $email=="" || $password=="")
            header("Location:signup.php?err=3");
        
        // Add entry to database
        $query = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')";
        if($conn->query($query) === TRUE)
            header("Location:login.php");
        else
            header("Location:signup.php?err=4");
    }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kickAss chat Sign up</title>
</head>
<body>
    <h1>kickAss Chat! Sign up</h1>
    <?php
        if(isset($_GET["err"])){
            $error_id = $_GET["err"];
            if($error_id==1)    
                echo("Username already exists! Please use a different username!<br><br>");
            elseif($error_id==2)    
                echo("Password does not match!<br><br>");
            elseif($error_id==3)    
                echo("Please fill all the fields!<br><br>");
            else
                echo("Error: Unknown error!<br><br>");
        }
    ?>
    <form action="" method="post"
        <label for="username">Username</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br><br>
        <label for="re_password">Re-enter password</label><br>
        <input type="password" name="re_password"><br><br>
        <input type="submit" name="sign_up" value="Sign up!">
    </form>
</body>
</html>