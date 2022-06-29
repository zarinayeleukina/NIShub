<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    require_once "../config/db-connect.php";
?>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
         margin: 0;
         font-family: Arial, Helvetica, sans-serif;
         text-align: center
        }
        p{
            text-align: center;
            margin-top: 6px;
        }
        h2{
            text-align: center;
            margin-top: 36px;
            font-size: 48px;
            letter-spacing: 3px;
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
        .tableDown {
        border: solid 1px #4db052;
        border-collapse: collapse;
        border-spacing: 0;
	font: normal 13px Arial, sans-serif;
        }
    .tableDown thead th {
        background-color: #DDEFEF;
        border: solid 1px #4db052;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        }
    .tableDown tbody td {
        border: solid 1px #4db052;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
        }

        
    </style>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <title>Saved files</title>
</head>
<body>

<h2>Saved files</h2>

<?php
    if ($_SESSION["Role"]=="Teacher"):  //teach
        //echo "Teacher";
?>
        <form action="subjects.php" method="post" enctype="multipart/form-data">

            <p><strong>Select your classes by holding down the ctrl or cmd key to select more than one option.</strong></p> 
        
            <select name="subjects[]" multiple> <!--should name changed-->
                <option value="" disabled selected>Choose your option</option>
<?php               
                $sql= "SELECT ClassID, Class FROM Class";
                if($result = mysqli_query($conn,$sql)){
                    while($row=mysqli_fetch_assoc($result)){
?>      
                    <option value="<?php echo $row['ClassID']; ?>"><?php echo $row['Class']; ?></option>
<?php
                    }
                } else echo "PROBLEM";
?>              
            </select>
        
        
            <input type="file" name="file">
            <input type='submit' value='Submit' name="submit"/>
        
        </form>

<?php 
$stmt = mysqli_prepare($conn,"SELECT Class.Class, Teacher_Files.filename, Teacher_Files.FileID 
                                  FROM Teacher_Files INNER JOIN Class
                                  ON Teacher_Files.ClassID = Class.ClassID;");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
?>          
    <br/>       
    <table align="center" class="tableDown">
        <thead>
            <tr>
                <th>Class</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php   
        while($data = mysqli_fetch_array($result)):
?>  
            <tr>
                <td><?php echo $data['Class'];?></td>
                <td><?php echo $data['filename'];?></td>
                <td><a href="filedown.php?fileid=<?php echo $data["FileID"]; ?>">Download</a></td>
            </tr>
<?php
        endwhile;
?>
        </tbody>            
    </table>
<?php       
    mysqli_close($conn);
    
?>



<?php
    elseif ($_SESSION["Role"]=="Student"):                              //student
        //echo "Student";
?>

    <form action="subjects.php" method="post" enctype="multipart/form-data">

        <p><strong>Select your subjects by holding down the ctrl or cmd key to select more than one option.</strong></p> 
    
        <select name="subjects[]" multiple> 
        <option value="" disabled selected>Choose your option</option>
<?php               
        $sql= "SELECT SubjectID, Subject FROM Subjects";
        if($result = mysqli_query($conn,$sql)){
        while($row=mysqli_fetch_assoc($result)){
?>      
<option value="<?php echo $row['SubjectID']; ?>"><?php echo $row['Subject']; ?></option>
<?php
        }
        } else echo "PROBLEM";
?>              
        </select>
    
    
        <input type="file" name="file">
        <input type='submit' value='Submit' name="submit"/>
        
    </form>

<?php 
    $stmt = mysqli_prepare($conn,"SELECT Class.Class, Student_Files.filename, Student_Files.FileID 
                                  FROM Student_Files INNER JOIN Class
                                  ON Student_Files.ClassID = Class.ClassID;");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
?>          
            
    <table class="tableDown">
        <thead>
            <tr>
                <th>Class</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php   
        while($data = mysqli_fetch_array($result)):
?>  
            <tr>
                <td><?php echo $data['Class'];?></td>
                <td><?php echo $data['filename'];?></td>
                <td><a href="filedown.php?fileid=<?php echo $data["FileID"]; ?>">Download</a></td>
            </tr>
<?php
        endwhile;
?>
        </tbody>            
    </table>
<?php       
    mysqli_close($conn);
    
?>



<?php
    elseif ($_SESSION["Role"]=="Curator"):                            //curator
        //echo "Curator";
?>
<form action="subjects.php" method="post" enctype="multipart/form-data">

        <p><strong>Select your classes by holding down the ctrl or cmd key to select more than one option.</strong></p> 
    
        <select name="subjects[]" multiple> 
        <option value="" disabled selected>Choose your option</option>
<?php               
        $sql= "SELECT ClassID, Class FROM Class";
        if($result = mysqli_query($conn,$sql)){
        while($row=mysqli_fetch_assoc($result)){
?>      
            <option value="<?php echo $row['ClassID']; ?>"><?php echo $row['Class']; ?></option>
<?php
        }
        } else echo "PROBLEM";
?>              
        </select>
    
    
        <input type="file" name="file">
        <input type='submit' value='Submit' name="submit"/>
        
    </form>

<?php 
    $stmt = mysqli_prepare($conn,"SELECT Class.Class, Curators_Files.filename, Curators_Files.FileID 
                                  FROM Curators_Files INNER JOIN Class
                                  ON Curators_Files.ClassID = Class.ClassID;");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
?>          
            
    <table class="tableDown">
        <thead>
            <tr>
                <th>Class</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php   
        while($data = mysqli_fetch_array($result)):
?>  
            <tr>
                <td><?php echo $data['Class'];?></td>
                <td><?php echo $data['filename'];?></td>
                <td><a href="filedown.php?fileid=<?php echo $data["FileID"]; ?>">Download</a></td>
            </tr>
<?php
        endwhile;
?>
        </tbody>   
</table>
<?php       
    mysqli_close($conn);
?>
<?php
    endif;
?>


<div class="navbar">
  <a href="./messen.php" >Messengers</a>
  <a href='./files.php' class="active">Files</a>
  <a href='./todolist.php'>Chat</a>
  <a href="#foundlost">Found & lost</a>
  <div id="leftSide">
    <a href="./profile.php" >Profile</a>
    <a href="#settings">Settings</a>
    <a href='../templates/Newfile.php' >Sign out</a>  
  </div>
</div>

</body>
</html>