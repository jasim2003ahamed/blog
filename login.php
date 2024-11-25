<?php

    require "connect.php";


    if(isset($_POST["submit"])){
        
        $usernameemail=$_POST["usernameemail"];
        $password=$_POST["password"];

        $result=mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$usernameemail' OR email='$usernameemail' ");
        $row=mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SESSION["login"]= true;
                $_SESSION["id"]=$row["id"];
                header("Location: index.php");
            }
            else{
                echo
                "<script> alert('Wrong password');</script>";
            }
        }
        else{
            echo
            "<script> alert('User Not Registered');</script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" id="usernameemail" name="usernameemail" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
