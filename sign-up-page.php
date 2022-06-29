<html>
    <head>
        <meta charset=utf-8/>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Регистрация </title>
    </head>
    <body>      
        <?php
        if(empty($email))
            {
                include "../templates/sign-up-template.php";
            }
            else
            {
                redirect("../index.php");
            }
        ?>
    </body>
</html>