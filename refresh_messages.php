<?php
    session_start();
    include_once("db.php");
    if(!isset($_SESSION['id'])){
       header("Location:login.php?err=0"); 
    }
    $data = json_decode(file_get_contents('php://input'), true);
    $sender_id = $data["sender_id"];
    $receiver_id = $data["receiver_id"];
    $query = "select * from messages where sender_id='$sender_id' and receiver_id='$receiver_id' or sender_id='$receiver_id' and receiver_id='$sender_id' order by sent_time asc";
    $result = $conn -> query($query);
    while($row = $result -> fetch_assoc()){?>
        <div class="<?php echo ($_SESSION['id'] == $row['sender_id'])?'outgoing':'incoming'; ?>"><?php echo $row['content']?></div>
    <?php }
?>