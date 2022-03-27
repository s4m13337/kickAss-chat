<?php
    session_start();
    include_once("db.php");
    if(!isset($_SESSION["id"])){
        header("Location:login.php?err=0");
        exit();
    }
    $current_user_id = $_SESSION["id"];
    $receiver_id = $_GET["receiver"].$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/chat.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>kickAss Chat</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="users.php"><i class="back" data-feather="skip-back"></i></a>
            <img src="images/boy.png" height="48px" class="avatar">
            <h3><?php echo $_GET["receiver"] ?></h3>
            <i class="menu" data-feather="menu"></i>
        </div>
        <div class="chat-area">
        </div>
        <div class="message">
             <form action="#" method="post" class="message-form">
                <input class="sender-id" value="<?php echo $current_user_id?>" hidden>
                <input class="receiver-id" value="<?php echo $receiver_id?>" hidden>
                <input type="text" class="message-input">
                <button type="button" class="send-button"><i data-feather="send"></i></button>
            </form>
        </div>
    </div>
    <script>
      feather.replace()
    </script>
    <script>
        sendButton = document.querySelector(".send-button");
        message = document.querySelector(".message-input");
        senderId = document.querySelector(".sender-id").value;
        receiverId = document.querySelector(".receiver-id").value;
        sendButton.onclick = () => {
            if(message.value != ""){
                let data = JSON.stringify({
                    "sender_id": senderId,
                    "receiver_id": receiverId,
                    "message": message.value
                })
                fetch("send_message.php", {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: data
                })
                .then(response => response.text())
                .then(output => console.log(output))
                message.value="";
            }
        }

        setInterval(
            () => {
                let data = JSON.stringify({
                    "sender_id": senderId,
                    "receiver_id": receiverId
                })
                fetch("refresh_messages.php", {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: data
                })
                .then(response => response.text())
                .then(output => document.querySelector('.chat-area').innerHTML = output)
            },
            500
        )
    </script>
</body>
</html>