<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<?php

include("include/config.php");

if (isset($_POST['email'])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypted_password = hash('md5', $password);

    $sql = "select * from Users where email = '$email' AND password = '$encrypted_password'";

    $result = mysqli_query($connection, $sql) or die ("Data Retrieval Error");

    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['surname'] = $row['surname'];

        header("Location:form.php");

    }else{
        echo "<p style = 'color:red; text-align:center;'> Invalid Login Credentials </p>";
    }
}









    /*require('config.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {*/
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login Form</h1>
        <input type="email" class="login-input" name="email" id="email" placeholder="Email Address" autofocus="true" required>
        <input type="password" class="login-input" name="password" id="password" placeholder="Password" required>
        <div><a href="forgot_password.php">Forgot password?</a></div>
        <input type="submit" value="Login" name="submit" class="login-button">
        <p class="link"><a href="registration.php">Not yet a member? Signup now</a></p>
    </form>
<!---php
    }
?>-->
</body>
</html>