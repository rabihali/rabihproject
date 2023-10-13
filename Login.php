  
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            body{
                background-image:url(image/login.jpg);
                background-repeat: no-repeat;
                background-size:cover;
            }
            .log{
                position:absolute;
                color: #dedede;
                width:400px;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                margin-top: 40px;
            }
            .c{
                color:#dedede;
                text-align:center;
            }
            .p{
                color:#d5d5d5;
                text-align:center;
            }

            .lo{
                text-align:center;
            }
            a {
                text-decoration: none;
                padding-left: 12px;
                color: #d4d4d4;
            }
            button {
                padding: 12px 20px;
                border: none;
                outline: none;
                background-color: rgb(255,255,255);
                border-radius: 16px;
                color: #000000;
                font-size: 20px;
                cursor: pointer;
            }
            .m{
                position: sticky;
                top:0;
                left:0;
                right:0;
                padding:15px 10px;
                background-color: var(--white);
                text-align: center;
                z-index: 1000;
                box-shadow: var(--box-shadow);
                color:var(--black);
                font-size: 30px;
                text-transform: capitalize;
                cursor: pointer;

            }


        </style>
    </head>
    <body>
        <?php
        require_once "config.php";
        session_start();
        $msg = "";

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            try {
                $sql = "SELECT * FROM users WHERE username = '$username'  AND password= '$password'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["pass"] = $row["password"];
                    $_SESSION["created_dt"] = $row["created_dt"];
                    header("Location:home.php");
                } else {
                    $msg = ('Username or Password is wrong!<br>'
                            );
                }
            } catch (PDOException $e) {
                die("Could Not Able To Execute The Query [ $sql ]" . $e->getMessage());
            }
        }
        unset($stmt);
        ?>
        <?php
        if (isset($msg)) {
            echo '<div class="m" onclick="this.remove();">' . $msg . '</div>';
        }
        ?>

        <div class="log">
            <br><br>
            <br><br>
            <div class ="lo"><h1> Login </h1><div>
                    <p><span class="error"></span></p>
                    <div class ="p"><h3>Please fill in your credentials to login.</h3></div><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                        Username :<input type="text" name="username" required=" * username is required" >
                        <br><br>
                        Password: <input type="text" name="password" required=" * password is required" > 
                        <br><br>
                        <button type="submit" name="submit"> Login</button><br><br>
                        <div class="c"><h3>Don't have an account?<a href="register.php">Sign up.</a></h3>  </div><br><br>

                        </body>
                        </html>