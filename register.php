<?php

    include "connect.php";

    if(isset($_POST["submit"])){
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];

        $dup=mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$username' OR email='$email'");

        if(mysqli_num_rows($dup) >0){
            echo
            "<script> alert('username or email already taken');</script>";
        }
        else{
            $sql="INSERT INTO tbuser(`username`,`email`,`password`) VALUES ('$username','$email','$password')";
            mysqli_query($conn,$sql);
            echo
            "<script> alert('Registration Successful');</script>";
        }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
