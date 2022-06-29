<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    require_once "../config/db-connect.php";
    
    $currentValue = $_POST["Role"];
    
    if($currentValue==1) {
                $email = $_POST['Email'];
                $sql="SELECT * FROM Teacher WHERE Email = '$email'";
                $result=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_array($result);                  
                if (password_verify($_POST["Password"],$rows["HashPass"])) {
                    $_SESSION["TeacherID"] = $rows["TeacherID"];
                    $_SESSION["nickname"] = $rows["Nickname"];
                    $_SESSION["DateOfBirth"] = $rows["DateOfBirth"];
                    $_SESSION["Name"] = $rows["Name"];
                    $_SESSION["Surname"] = $rows["Surname"];
                    $_SESSION["Email"] = $rows["Email"];
                    $_SESSION["Role"] = "Teacher";
                    header('Location: ./profile.php');
                }
                
        } else if ($currentValue==2){
                $email = $_POST['Email'];
                $sql="SELECT * FROM Curators WHERE Email = '$email'";
                $result=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_array($result);

                if (password_verify($_POST["Password"],$rows["HashPass"])) {
                $_SESSION["CuratorID"] = $rows["CuratorID"];
                $_SESSION["nickname"] = $rows["Nickname"];
                $_SESSION["DateOfBirth"] = $rows["DateOfBirth"];
                $_SESSION["Name"] = $rows["Name"];
		$_SESSION["Surname"] = $rows["Surname"];
                $_SESSION["Email"] = $rows["Email"];
                $_SESSION["Role"] = "Curator";
                header('Location: ./profile.php');
                }
        } else if ($currentValue==3){
                $email = $_POST['Email'];
                $sql="SELECT * FROM Student WHERE Email = '$email'";
                $result=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_array($result);
                
                if (password_verify($_POST["Password"],$rows["HashPass"])) {
                    $_SESSION["StudentID"] = $rows["StudentID"];
                    $_SESSION["nickname"] = $rows["Nickname"];
                    $_SESSION["DateOfBirth"] = $rows["DateOfBirth"];
                    $_SESSION["Name"] = $rows["Name"];
                    $_SESSION["Surname"] = $rows["Surname"];
                    $_SESSION["Email"] = $rows["Email"];
                    $_SESSION["Role"] = "Student";
                    header('Location: ./profile.php');
                }
        }
?>