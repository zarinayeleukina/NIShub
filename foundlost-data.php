<?php
    require_once "../config/db-connect.php";
    
    $name = $_POST['Name'];
    $phone = $_POST['Phone'];
    $desc = $_POST['Desc'];
    $title = $_POST['Title'];
    
    $sql ="INSERT INTO `FoundLost`(`Name`, `Phone number`, `Description`, `Title`) VALUES ('$name','$phone','$$desc','$title')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
    
    header('Location: ./foundlost.php');
    exit;
?>