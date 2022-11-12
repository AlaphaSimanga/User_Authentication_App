<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/library.css">
</head>
<body>
<?php

include("include/config.php");

/*if (isset($_POST['email'])){
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

        header("Location:books.php");

    }else{
        echo "<p style = 'color:red; text-align:center;'> Invalid Login Credentials </p>";
    }
}*/
   
?>
    <form class="form" action="books.php" method="post" name="login">
        <h1 class="login-title">Member's Login Form</h1>
        <input type="email" class="login-input" name="email" id="email" placeholder="Email Address" autofocus="true">
        <input type="password" class="login-input" name="password" id="password" placeholder="Password">
        <div><a href="forgot_password.php">Forgot password?</a></div>
        <input type="submit" value="Login" name="submit" class="login-button">
        <p class="link"><a href="registration.php">Not yet a member? Sign up now</a></p>
    </form>

</body>
</html>