<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    require_once "../config/db-connect.php";
    
    if($_SESSION["Role"]=="Teacher" || $_SESSION["Role"]=="Curator"){
            $sql= "SELECT ClassID, Class FROM Class";
    } elseif($_SESSION["Role"]=="Student"){
            $sql= "SELECT SubjectID, Subject FROM Subjects";
    }

        

    $subjid = $_POST["subjects"];
        
    if (is_array($subjid) || is_object($subjid)) {
        foreach ($subjid as $subj)  {
            if (isset($_POST["submit"])) {
                /*if (isset( $_POST["file"]) ) {
                    echo "F";
                } else echo "/////////////////////////////////";*/
                
 
                $strr = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                
                if($_SESSION["Role"]=="Teacher"){
                        $sql = "INSERT INTO Teacher_Files (TeacherID, ClassID, File, filename) VALUES (".$_SESSION["TeacherID"].", ".$subj.", '".$strr."', '".$_FILES["file"]["name"]."')"; 
                } elseif($_SESSION["Role"]=="Student"){
                        $sql = "INSERT INTO Student_Files (StudentID, SubjectID, File, filename) VALUES (".$_SESSION["StudentID"].", ".$subj.", '".$strr."', '".$_FILES["file"]["name"]."')"; 
                } else{
                    $sql = "INSERT INTO Curator_Files (CuratorID, ClassID, File, filename) VALUES (".$_SESSION["CuratorID"].", ".$subj.", '".$strr."', '".$_FILES["file"]["name"]."')"; 
                }
                //echo $sql;
                
                if ($result = mysqli_query($conn,$sql)) {
                    echo "SUCCESS";
                }
                else {
                    echo "FAIL\n";
                    echo mysqli_error($conn);
                }
            }
        } 
    }
    else {
        echo "FAIL";
    }
    header('Location: ./files.php');
    exit;
?>