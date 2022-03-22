<?php
    session_start();
    if(!isset($_SESSION['id'])){
       header("Location:login.php?err=0"); 
    }
    include_once("db.php");
    $data = json_decode(file_get_contents('php://input'), true);
    $sender_id = $data["sender_id"];
    $receiver_id = $data["receiver_id"];
    $message = $data["message"];
    $query = "INSERT INTO messages (sender_id, receiver_id, content, sent_time) VALUES ('$sender_id','$receiver_id','$message', now())";
    if($conn -> query($query))
        echo "Message sent";
    else
        echo $conn -> error;
?>