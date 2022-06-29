<?php
$token = $_GET['token'];
$mode = $_GET['mode'];

if($mode == 1){
    echo(file_get_contents("https://api.vk.com/method/messages.getConversations?access_token=".$token."&v=5.103&count=15"));
} else if($mode == 2){
    echo(file_get_contents("https://api.vk.com/method/users.get?access_token=".$token."&v=5.103&user_id=".$_GET['uid']));
}