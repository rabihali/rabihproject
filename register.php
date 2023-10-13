<!Doctype html>

<head>
    <title>Registration Form Page</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <style type="text/css">
        .error{
            color:darkblue;
            font-size: 20px;
        }
        body{
            margin:0;
            padding:0;
            background-image:url(image/reg.jpg);
            background-repeat: no-repeat;
            background-size:cover;
            
        }
        .sign{
            color:white;
            width:400px;
            position:relative;
            top:50px;
            margin:25px;
            border-radius: 10px;
        }
        .container{
            margin-top: 30px;
        }
        .btn{
            border: 1px solid black;
            border-radius: 15px;
            font-size: 20px;
            padding: 10px 20px;
            font-family: "montserrat";
            margin: 10px;
        }
        .btn::before{
            background: whitesmoke;
        }
        .btn1::before,.btn2::before{
            height: 10px;
        }
        .lh{
            color:black;
            text-decoration: none;
        }
        .s{
             
            color:whitesmoke;
            font-size:25px;
        }
        .error1{
            text-align:left;
            color:darkblue;
            font-size:20px;
        }
        .pl{
            color:whitesmoke;
            font-size: 15px;
        }
        label{
            color:#000;
            font-size:20px;
        }
        .container h3{
            color:whitesmoke;
           font-size: 20px;
              
        }
        .sign h2{
            color:#000;
        }
        

    </style>
</head>

<?php
session_start();
// Creating the connection to the database "users" in local server
require_once "config.php";

// define variables and set to empty values
$usernameErr = $passwordErr = $confirmpasswordErr = $note = "";
if (isset($_POST["submit"])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['confirmpassword'];

    $dt = date("y-m-d");
    $sql = "SELECT * FROM users WHERE username = '$name' ";
    $result = $conn->query($sql);
    $num = $result->rowCount();
    if ($num == 0) {
        if ($pass == $cpass) {
            try {
                $query = 'INSERT INTO users (id,username,password, created_at) VALUES (null,:username,:password, :created_at)';

                $stmt = $conn->prepare($query);

                $stmt->bindParam(":username", $name);
                $stmt->bindParam(":password", $pass);
                $stmt->bindParam(":created_at", $dt);
                $stmt->execute();
                $note = "Registration Successfully.New User Created";
            } catch (PDOException $e) {
                die("<br> Coudn Not Able To Execute Insert Query ( $query ):" . $e->getMessage());
            }
        } else {
            $confirmpasswordErr = "Password does not match .";
        }
    } else {
        $usernameErr = "Oops!This username taken by another user. ";
    }
}
?>
<div class="sign">
    <div class = "s"><p>BookStore Online Registration.</p></div>
    <h2> Sign Up Now</h2>
    <p><span class="error"></span></p>
    <div class = "pl"><h3>Please fill this form to create an account</h3></div>
    <form method="post" action="register.php">  
        <label>  Username </label> <br><br>
        <input type="text" name="username" required ><br>
        <span class="error"> <?php echo $usernameErr; ?></span>
        <br>
        <label> Password </label> <br><br> 
        <input type="text" name="password" required><br>
        <span class="error"> <?php echo $passwordErr; ?></span>
        <br>
        <label>  Confirm password </label> <br><br> 
        <input type="text" name="confirmpassword" required><br>
        <span class="error"><?php echo $confirmpasswordErr; ?></span>
        <div class="container">
            <input type="submit" class="btn btn1" name="submit" value="Submit">
            <input type="reset" class="btn btn2" name="rest" value="Reset">
            <h3>Already have an account?<a href="Login.php" class="lh">Login here.</a></h3>
             <span class="error1"><?php echo $note; ?></span>
        </div>
    </form>
</div>
</body>
</html>
