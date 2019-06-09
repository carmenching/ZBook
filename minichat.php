<?php
require('config/DBCNX.php');
session_start();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="css/minichat.css">
        <title>Minichat</title>
    </head>
    <body>
        <header>
            <div class="logo_search">
                <img id="talkpile_logo" src="img/horizontal_logo-i.png" alt="talkpile_logo" style="height:30px;">
                <input type="text">
            </div>
            <nav>
                <li><img src="img/chat.svg" alt="chat notification" style="width:20px;"></li>
                <li>s'est connecté en tant que ...</li>
                <li><img src="img/avatar.svg" alt="chat notification" style="width:22px;"></li>
            </nav>
        </header>
        <section class="main">
        <aside>
            <ul>
                <li class="user_tab">
                    <img src="img/avatar.svg" alt="user_avatar" style="width:22px;">
                    <h4>UserName (Online)</h4>
                </li>
            </ul>
        </aside>
            
            <section id="messages_panel">
                <div id="chat_header">
                    <h2 id="destined_user">Chatting with Username 1</h2>
                </div>
                <div class="message_sent">
                    <div class="avatar_block">
                        <img class="message_sender_avatar" src="img/avatar.svg" alt="message sender photo">
                    </div>
                    <div class="message_block">
                        <p class="message_display">test messages...</p>
                    </div>
                </div>
                <div id="message_section"></div>
        <?php
            if($query = $db->prepare("SELECT IDConv, IDUser, ConvMsgContent FROM conv_msg WHERE")) {
                $query->execute();
                $query->bind_result($message);
                while ($query->fetch()) {
                echo 
                "<div class=\"message_sent\">
                    <div class=\"avatar_block\">
                        <img class=\"message_sender_avatar\" src=\"img/avatar.svg\" alt=\"message sender photo\">
                    </div>
                    <div class=\"message_block\">
                        <p class=\"message_display\">". $message ."</p>
                    </div>
                </div>";
                }
                $query->close();
            } 
          
        ?>
                <form action="minichat_post.php" method="post" class="message_edit">
                    <textarea id="message_editor" name="message_editor" id="" cols="30" rows="10"></textarea>
                    <button type="submit">Send</button>
                </form>
            </section>
        </section>
            
    </body>
    </html>