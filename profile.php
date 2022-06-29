<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    require_once "../config/db-connect.php";
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../js/modal-layout.css"/>
<style>

    body {
     margin: 0;
     font-family: Arial, Helvetica, sans-serif;
     /*background: -webkit-linear-gradient(left, #C7CEEA, #FFDAC1); */
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
            
            
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 25%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <title>Profile</title>
</head>
<body>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://curaflo.com/wp-content/uploads/2017/04/male-avatar1-261x300.png" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $_SESSION["Surname"]; ?> <?php echo $_SESSION["Name"]; ?>
                                    </h5>
                                    <h6>
                                        NIS Petropavlovsk
                                    </h6>
                                    <p class="proile-rating">ROLE : <span><?php echo $_SESSION["Role"]; ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                    </div>
                    <div class="modal " align-items: center;>
                        <div class="profilechanges modalcontent" >
                            <label class="closemodal">&times;</label>
                            
                            <form action="changesProfile.php" method="post" enctype="multipart/form-data" class="bwform">
                                <label>Enter profile changes</label><br>
                                        <input type="text" placeholder="Enter Your Nickname" name="Nickname" ><br/><br/>
                                        <input type="email" placeholder="Enter Email Address" name="Email" ><br/><br/>
                                        <input type="text" placeholder="Enter Your Surname" name="Surname" ><br/><br/>
<input type="text" placeholder="Enter Your Firstname" name="Name" ><br/><br/>
                                        <input type="date" id="date" name="DateOfBirth"/><br/><br/>
                                <input type="submit" value="Update profile changes" id="btnSubmit">
                            <form>
                        </div>
                    </div>
                    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            //opens modal
                            $(".profile-edit-btn").click(function() {
                                var $modal = $(this).parent().next();
                                $($modal).fadeIn("1000");
                            });
                            //closes modal
                            $(".closemodal").click(function() {
                                var $modal2 = $(this).parent().parent();
                                $($modal2).fadeOut("800");
                            });
                        });
                    </script>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <br/>   
                        <br/>
                        
                        <p>Quote of the day:</p>
<?php                   

                        $stmt = mysqli_prepare($conn,"SELECT * FROM quotes;");
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        
                        $max = mysqli_num_rows($result);
                        $id = rand(1,$max);
                        echo $data[$id]["quote"];
                        echo "<br/>";
                        echo $data[$id]["author"];
                        
                        
?>                       
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
<div class="col-md-6">
                                                <p><?php echo $_SESSION["Surname"]; ?> <?php echo $_SESSION["Name"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["Email"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nickname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["nickname"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["DateOfBirth"]; ?></p>
                                            </div>
                                        </div>              
        
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

<div class="navbar">
  <a href="./messen.php" >Messengers</a>
  <a href='./files.php'>Files</a>
  <a href='./todolist.php'>Chat</a>
  <a href="#foundlost">Found & lost</a>
  <div id="leftSide">
    <a href="#profile" class="active">Profile</a>
    <a href="#settings">Settings</a>
    <a href='../templates/Newfile.php'>Sign out</a>  
  </div>
</div>

</body>
</html>