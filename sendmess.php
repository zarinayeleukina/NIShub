<?php

$from    = $_POST['Mymail'];
$to      = $_POST['Email'];
$subject = $_POST['Subject'];
$message = $_POST['Message'];
    
$headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


mail($to, $subject, $message, $headers);
?>