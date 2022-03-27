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
        $query = "INSERT INTO login (username, email, password, status) VALUES ('$username', '$email', '$password', 0)";
        if($conn->query($query) === TRUE)
            header("Location:login.php?signup=0");
        else
            $error = $conn -> error;
    }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kickAss chat Sign up</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
</head>
<body>
    <div class="signup">
        <h1>kickAss Chat!</h1>
        <h3>Sign up</h3>
        <?php
            if(isset($_GET["err"])){
                $error_id = $_GET["err"];
                if($error_id==1)    
                    echo("<div class='error'>Username already taken! Please use a different username!</div>");
                elseif($error_id==2)    
                    echo("<div class='error'>Passwords do not match!</div>");
                elseif($error_id==3)    
                    echo("<div class='error'>Please fill all the fields!</div>");
                else
                    echo($error);
            }
        ?>
        <form action="" method="post">
            <input type="text" name="username" class="username" placeholder="Username"><br><br>
            <input type="email" name="email" class="email" placeholder="Email"><br><br>
            <input type="password" name="password" class="password" placeholder="Password"><br><br>
            <input type="password" name="re_password" class="re-password" placeholder="Re-type password"><br><br>
            <input type="submit" name="sign_up" value="Sign up!" class="signup-button">
        </form>
    </div>    
</body>
</html>