<?php
    require_once "../config/db-connect.php";
    
    require_once "utility-functions.php";
    
if(!empty($_POST['Email']) && 
       !empty($_POST['Name']) && 
       !empty($_POST['Surname']) && 
       !empty($_POST['Password']) && 
       !empty($_POST['ConfirmPassword']) &&
       !empty($_POST['Nickname']) && 
       !empty($_POST['DateOfBirth']) &&
       !empty($_POST['ClassTC']) &&
       strlen($_POST['Password'])>=8 &&
       $_POST['Password'] == $_POST['ConfirmPassword']){
           
        $email = $_POST['Email'];
        $name = $_POST['Name'];
        $surname = $_POST['Surname'];
        $password = $_POST['Password'];
        $DateOfBirth = $_POST['DateOfBirth'];
        $nickname = $_POST['Nickname'];
        $class = $_POST['ClassTC'];



        $sql ="SELECT Email FROM Teacher WHERE Email = '$email'";
    
        
        if ($result=mysqli_query($conn,$sql)){
            if(mysqli_num_rows($result)<=0){
            
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO Teacher(`Nickname`, `Email`, `Surname`, `Name`, `HashPass`, `DateOfBirth`) VALUES ('$nickname', '$email', '$surname', '$name', '$hashedPassword', '$DateOfBirth')";
                if ($result=mysqli_query($conn,$sql))
                {
                    echo "Signed up.";
                    header('Location: ../profile.php');
                    
                }
                else
                {
                    echo "Error: " . mysqli_error($conn);
                    exit();
                }
            }else   {
                echo "User already exists.
                You should log in.";
                
                header('Location: ../index.php');
exit();
                
            }
        }
        
        
    }
    else
    {
        echo "Password too short or don't match. Use at least 8 characters.";

    }
    
    
mysqli_close($conn);
?>