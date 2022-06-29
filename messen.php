<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
?>
<html>
<head>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
         margin: 0;
         font-family: Arial, Helvetica, sans-serif;
        }
        #leftSide{
        text-align:right;
        float: right;
        margin-right: 10px;
        }
        .navbar {
        padding:25px;
	overflow: hidden;
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
        }

        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 25px 20px;
        text-decoration: none;
        font-size: 17px;
        }

        .navbar a:hover {
        background: #f1f1f1;
        color: black;
        }

        .navbar a.active {
        background-color: #4CAF50;
        color: white;
        }

        .main {
        padding: 16px;
        margin-bottom: 30px;
        }
    </style>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <title>Messages</title>
    <?php require_once "../config/db-connect.php"; ?>
</head>
<body>
<br/>
<form action="../process/vkLogin.php" method="post">
    Enter your VK login:<br>
    <input type="text" name = "VKlogin"checked><br><br>
    Enter your VK password:<br>
    <input type="text" name = "VKpass" checked><br><br>
     <input type="submit" value="Submit">
</form>
    <?php echo $_SESSION["VKlogin"]; ?>     

    <div id="APImessages">
    
    </div>

<div id="res"></div>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script>
    var token = '<?php echo $_SESSION["token"];?>';
    alert ('<?php echo $_SESSION["token"];?>');
    var url = `https://api.vk.com/method/messages.getConversations?access_token=${token}&v=5.103&count=15`;
$("#res").html(" ");
    $.ajax({
        url: "apiGet.php?mode=1&token=" + token
    }).done(function(res) {
        res = JSON.parse(res).response.items;
        res.map(async e => {
            var peer = e.conversation.peer.id;
            if(e.conversation.peer.type == "user"){
                var title;
                await $.ajax({
                    url: "apiGet.php?mode=2&token=" + token + "&uid=" + peer
                }).done(async res => {
            res = JSON.parse(res);
                    title = `${res.response[0].first_name} ${res.response[0].last_name}`
                });
            } else if(e.conversation.peer.type == "chat"){
                var title = e.conversation.chat_settings.title;
            }
            $("#res").html($("#res").html() + `${title} - ${peer}<br>`);
        });
    });
</script>


<div class="navbar">

  <a href='./messen.php'  class="active">Messengers</a>
  <a href='./files.php'>Files</a>
  <a href='./todolist.php'>Chat</a>
  <a href="./foundlost.php">Found & lost</a>
  <div id="leftSide">
    <a href="./profile.php" >Profile</a>
    <a href="#settings">Settings</a>
    <a href='../templates/Newfile.php'>Sign out</a>  
  </div>
</div>

</body>
</html>