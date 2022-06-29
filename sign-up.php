<?php
    require_once "../config/db-connect.php";
    $currentValue = $_POST["Role"];
    
    if($currentValue==1) {
        require_once "sign-up-teacher.php";
        } else if ($currentValue==2){
            require_once "sign-up-curator.php";
        } else if ($currentValue==3){
            require_once "sign-up-student.php";
        }
?>