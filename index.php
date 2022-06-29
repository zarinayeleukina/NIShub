<html>
    <head>
        <meta charset=utf-8/>
        <title>NIShub</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
    p{
        color: #c6806a;
    }
    </style>
    <body>
    
        <?php
            if(empty($email)): include "templates/login-form-template.php";
        ?>
        <?php       
            else:
        ?>
                Hello <?php echo "$firstname $surname" ?>! You are logged in. <br/>
                <a href='process/logout.php'>Click here to logout.</a>      
        <?php
            endif;
        ?>   
    </body>
</html>