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
            <i class="back" data-feather="skip-back"></i>
            <img src="images/boy.png" height="48px" class="avatar">
            <h3>Sam</h3>
            <i class="menu" data-feather="menu"></i>
        </div>
        <div class="chat-area">
            <div class="incoming">Hello, this is an incoming message...</div>
            <div class="outgoing">Hello, this is an outgoing message....</div>
        </div>
        <div class="message">
             <form action="#" class="message-form">
                <input type="text" class="message-input">
                <button class="send-button" type="submit"><i data-feather="send" ></i></button>
            </form>
        </div>
    </div>
    <script>
      feather.replace()
    </script>
</body>
</html>