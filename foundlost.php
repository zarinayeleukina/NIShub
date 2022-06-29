<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
?>
<html>
<head>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body: {
         margin: 0;
         font-family: Arial, Helvetica, sans-serif;
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
        
        form,.desc{
            padding-left: 30px;
        }
        
        .desc{
            border: solid; 
            border-color: #4daf52;
        }
        
        h1{
            text-align: center;
        }
    </style>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <title>Messages</title>
    <?php require_once "../config/db-connect.php"; ?>
</head>
<body>
<h1>Found and Lost</h1> 
<form action="founlost-data.php" method="post">
    <label>
      <input type="text" placeholder="Enter Your Name" name="Name" required>
    </label><br/><br/>
    
    <label>
      <input type="text" placeholder="Enter the title" name="Title" required>
    </label><br/><br/>  
    
    <input type="tel" name="Phone" placeholder="Enter phone number"
       pattern="[1-9]{1}-[1-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
       required><br/>
    <small>Format: 8-707-777-66-99</small>  <br/><br/>

        <textarea name="Desc" cols="22" rows="10" placeholder="Enter description" required></textarea> <br/><br/>
    
    <input type="submit" name="foundlost" value="Publish"/>
</form> 
<?php
    $stmt = mysqli_prepare($conn,"SELECT * FROM `FoundLost`");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($data = mysqli_fetch_array($result)){
?>
        <div class="desc">
        <br/>
            <label><?php echo "Title: ".$data['Title']; ?></label>
            <p><?php echo "Description: ".$data['Description']; ?><p>
            <p><?php echo "Contact: ".$data['Phone number']; ?><p>
            <p><?php echo "Name: ".$data['Name']; ?><p>
        </div>
<br/>
        <br/>
<?php
    }
?>  
    
    
<div class="navbar">

  <a href='./messen.php' >Messengers</a>
  <a href='./files.php'>Files</a>
  <a href='./todolist.php'>Chat</a>
  <a href="./foundlost.php" class="active">Found & lost</a>
  <div id="leftSide">
    <a href="./profile.php" >Profile</a>
    <a href="#settings">Settings</a>
    <a href='../templates/Newfile.php'>Sign out</a>  
  </div>
</div>

</body>
</html>