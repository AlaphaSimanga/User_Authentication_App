<?php

//STILL IN PROGRESS....
//CURRENTLY NOT WORKING

session_start();
$error = array();

require "mail.php";

include ('include/config.php');

$mode = "enter_email";
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

//something is posted
if(count($_POST) > 0){
    
    switch ($mode){
        case 'enter_email':

            //code
            $email = $_POST['email'];
            //validate email 
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $error[] = "Please enter a valid email";
            }elseif(!valid_email($email)){
                $error[] = "That email was not found";
            
            }else{

               $_SESSION['forgotPassword']['email'] = $email;
               send_email($email);
               header("Location: forgot_password.php?mode=enter_code");
               die;
            }
            break;

        case 'enter_code':

            //code
            $code = $_POST['code'];
            $result = is_code_correct($code);

            if($result == "The code is correct"){
                $_SESSION['forgotPassword']['code'] = $code;
                header("Location: forgot_password.php?mode=enter_password");
                die;
            }else{
                $error[] = $result;
            }
           
            break;

        case 'enter_password':

            //code
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            

            if($password !== $password2){
                $error[] = "Passwords do not match";
            }elseif(!isset($_SESSION['forgotPassword']['email']) || !isset($_SESSION['forgotPassword']['code'])){
                header("Location: forgot_password.php");
                die;
            }else{
                save_password($password); 
                if(isset($_SESSION['forgotPassword'])){
                    unset($_SESSION['forgotPassword']);
                }
                header("Location: login.php");
                die;
            }
           
            break;

        default:
          break;
    
    }
}

function send_email($email){
    global $connection;

    $expire = time() + (60 * 1);
    $code = rand(10000,99999);
    $email = addlashes($email);

    $query = "insert into forgotPassword (email,code,expire) value ('$email','$code','$expire')";
    mysqli_query($connection, $query);

    //send email here
    send_email($email, 'Password reset', "Your code is" . $code);
    //mail($mail, 'Website: reset password', 'your code is'. $code);
}

function save_password($password){
    global $connection;
    //$expire = time() + (60 * 1);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = addlashes($_SESSION['forgotPassword']['email']);

    $query = "update forgotPassword set password = '$password' where email = '$email' limit 1";
    mysqli_query($connection, $query);

    //send email here
    //mail($mail, 'Website: reset password', 'your code is'. $code);
}

function valid_email($email){
    //$expire = time() + (60 * 1);
    global $connection;
    
    $email = addlashes($email);

    $query = "select * from forgotPassword where email = '$email' limit 1";
    $result = mysqli_query($connection, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            return true;
        }
    }
    return false;
}

function is_code_correct($code){

    global $connection;

    $code = addlashes($code);
    $expire = time();
    $email = addlashes($_SESSION['forgotPassword']['email']);

    $query = "select * from forgotPassword where code = '$code' && email = '$email && expire = '$expire' order by id desc limit 1";
    $result = mysqli_query($connection, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            if ($row['expire'] > $expire){
                return "the code is correct";
            }else{
                return "The code is expired";
            }
        }else{
            return "The code is incorrect";
        }
    }
    return "The code is incorrect";
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
</head>
<body>

    <?php

    switch ($mode){
        case 'enter_email':
            //code
            ?>
                <form method="post" action="forgot_password.php?mode=enter_email ">
                   <h1>Forgot Password</h1>
                   <h3>Enter your email below</h3>
                
                    <span>
                        <?php
                          foreach ($error as $err){
                          //code
                          echo $err . "<br>";
                          }
                        ?>
                    </span>

                    <input type="email" name="email" placeholder="Email address"><br>

                    <input type = "submit" value="Next">
                    <a href="forgot_password.php">
                    <input type = "button" value="Start Over">
                    <br><br>
                    <div><a href="login.php">Login</a></div>
                </form>
            <?php
            break;

        case 'enter_code':
            //code
            ?>
                <form method="post" action="forgot_password.php?mode=enter_code">
                   <h1>Forgot Password</h1>
                   <h3>Enter the code sent to your email</h3>

                    <span>
                        <?php
                            foreach ($error as $err){
                            //code
                            echo $err . "<br>";
                            }
                        ?>
                    </span>

                    <input type="text" class="textbox" name="code" placeholder="12345"><br>

                    <input type = "submit" value="Next">
                    <a href="forgot_password.php">
                    <input type = "button" value="Start Over">
                    <br><br>
                    <div><a href="login.php">Login</a></div>
                </form>
            <?php
            break;
        

        case 'enter_password':
            //code
            ?>
                <form method="post" action="forgot_password.php?mode=enter_password">
                   <h1>Forgot Password</h1>
                   <h3>Enter your new password</h3>

                    <span>
                        <?php
                          foreach ($error as $err){
                           //code
                           echo $err . "<br>";
                          }
                        ?>
                    </span>

                   <input type="text" class="textbox" name="password" placeholder="Password"><br>
                   <input type="text" class="textbox" name="password2" placeholder="Retype Password"><br>
    
                   <input type = "submit" value="Next"><a href="forgot_password.php">
                   <input type = "button" value="Start Over">
                   <br><br>
                   <div><a href="login.php">Login</a></div>
                </form>
            <?php
            break;

        default:
           //code
        break;
    }
    ?>

    


</body>
</html>
    


















