<?php 
    session_start();
    include_once("db.php");
    if(isset($_SESSION['id'])){
        $username = $_SESSION["username"];
        $result = $conn -> query("SELECT id, username, status FROM login WHERE username!='$username'");
        while($row = $result->fetch_assoc()){?>
            <div class="user">
            <a href="chat.php?recepient=<?php echo $row["username"].$row["id"]?>">
                <?php echo $row["username"];?>
                <div class=<?php echo ($row['status']==0)?"status-away":"status-active"; ?>></div>
            </a>
        </div>    
    <?php }
    }
    else
        header("Location:login.php?err=0")
?>