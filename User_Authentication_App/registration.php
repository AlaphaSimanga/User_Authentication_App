<?php

include ("include/config.php");
if(isset($_POST['email'])){

    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if($password == $confirm_password){

    $encrypted_password = hash('md5', $password);

    $sql = "insert into Users (email,firstname,surname,password) values ('$email', '$firstname','$surname','$encrypted_password')";

    mysqli_query($connection, $sql) or die ("Data Not Saved !");

        echo "<p style='color:red; text-align:center;'>User Account Created Successfully</p>";
    }else{
        echo "<p style='color:green; text-align:center;'>Please Re-Confirm Your Password</p>";
    }
}
?>

<!--<!DOCTYPE html>-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Sign Up Page</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

<section>
<div class=container>
    <form class="form" action="" method="post">
        <h1 class="login-title">Signup Form</h1>
        <input type="email" class="login-input" name="email" id="email" placeholder="Email Address" required />
        <input type="text" class="login-input" name="firstname" id="firstname" placeholder="Firstname" required />
        <input type="text" class="login-input" name="surname" id="surname" placeholder="Surname" required />
        <input type="password" class="login-input" name="password" id="password" placeholder="Password">
        <input type="password" class="login-input" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="text-center"> Already have an account? Please <a href="login.php"> Sign In.</a>
        <!--<p class="link"><a href="login.php">Click to Login</a></p>-->

    </form>
</div>
</section>

</body>
</html>