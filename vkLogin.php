<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../config/db-connect.php";

    $_SESSION["VKlogin"] = $_POST["VKlogin"]; 
    $_SESSION["VKpass"] = $_POST["VKpass"];
    
    $login = $_SESSION["VKlogin"];
    $pass = $_SESSION["VKpass"];
    
    $result = json_decode(file_get_contents("https://oauth.vk.com/token?grant_type=password&client_id=2274003&client_secret=hHbZxrka2uZ6jB1inYsH&username=$login&password=$pass"));
    $access_token=$result -> access_token;
    $user_id=$result -> user_id;
    
    $_SESSION["token"] = $access_token;
    header('Location: ../process/messen.php');
    exit;
?>
