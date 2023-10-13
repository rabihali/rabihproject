<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once "config.php";
        session_start();
        if (session_destroy()) {
            header("Location:Login.php");
        }
        ?>
    </body>

</html>
