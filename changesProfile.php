<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    if ($_SESSION["Role"]=="Teacher"){
        
        
        $id = $_SESSION['TeacherID'];
        if(!empty($_POST['Email'])){
            $email = $_POST['Email'];
            sql = 'UPDATE 'Teacher' SET `Email`='$email' WHERE TeacherID = '$id';'
        }
        
        if(!empty($_POST['Nickname'])){
            $nick = $_POST['Nickname'];
            sql = 'UPDATE 'Teacher' SET `Nickname`='$nick' WHERE TeacherID = '$id';'
        }
        
        if(!empty($_POST['Name'])){
            $name = $_POST['Name'];
            sql = 'UPDATE 'Teacher' SET `Name`='$name' WHERE TeacherID = '$id';'
        }
        
        if(!empty($_POST['Surname'])){
            $surname = $_POST['Surname'];
            sql = 'UPDATE 'Teacher' SET `Surname`='$surname' WHERE TeacherID = '$id';'
        }
        
        if(!empty($_POST['DateOfBirth'])){
$birth = $_POST['DateOfBirth'];
            sql = 'UPDATE 'Teacher' SET `DateOfBirth`='$birth' WHERE TeacherID = '$id';'
        }
        
        
        
    } elseif($_SESSION["Role"]=="Student"){
        $id = $_SESSION['StudentID'];
        if(!empty($_POST['Email'])){
            $email = $_POST['Email'];
            sql = 'UPDATE 'Student' SET `Email`='$email' WHERE StudentID = '$id';'
        }
        
        if(!empty($_POST['Nickname'])){
            $nick = $_POST['Nickname'];
            sql = 'UPDATE 'Student' SET `Nickname`='$nick' WHERE StudentID = '$id';'
        }
        
        if(!empty($_POST['Name'])){
            $name = $_POST['Name'];
            sql = 'UPDATE 'Student' SET `Name`='$name' WHERE StudentID = '$id';'
        }
        
        if(!empty($_POST['Surname'])){
            $surname = $_POST['Surname'];
            sql = 'UPDATE 'Student' SET `Surname`='$surname' WHERE StudentID = '$id';'
        }
        
        if(!empty($_POST['DateOfBirth'])){
            $birth = $_POST['DateOfBirth'];
            sql = 'UPDATE 'Student' SET `DateOfBirth`='$birth' WHERE StudentID = '$id';'
        }
    } else{
        
        
        $id = $_SESSION['CuratorID'];
        if(!empty($_POST['Email'])){
            $email = $_POST['Email'];
            sql = 'UPDATE 'Curators' SET `Email`='$email' WHERE CuratorID = '$id';'
        }
        
        if(!empty($_POST['Nickname'])){
            $nick = $_POST['Nickname'];
            sql = 'UPDATE 'Curators' SET `Nickname`='$nick' WHERE CuratorID = '$id';'
        }
        
        if(!empty($_POST['Name'])){
            $name = $_POST['Name'];
            sql = 'UPDATE 'Curators' SET `Name`='$name' WHERE CuratorID = '$id';'
        }
if(!empty($_POST['Surname'])){
            $surname = $_POST['Surname'];
            sql = 'UPDATE 'Curators' SET `Surname`='$surname' WHERE CuratorID = '$id';'
        }
        
        if(!empty($_POST['DateOfBirth'])){
            $birth = $_POST['DateOfBirth'];
            sql = 'UPDATE 'Curators' SET `DateOfBirth`='$birth' WHERE CuratorID = '$id';'
        }
        
        
    }               

?>