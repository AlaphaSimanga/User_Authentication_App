<?php
session_start();
$error = array();

//require "mail.php";

if(!$connection = mysqli_connect("localhost", "Library", "Library@2022!","Library")){
    die('Could not connect:');
}

$mode = "enter_email";
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

//something is posted

if(count($_POST) > 0) {
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
                $_SESSION['library']['email'] = $email;
                send_email($email);
                header("Location: forgot_password.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
            //code
            $code = $_POST['code'];
            $result = is_code_correct($code);

            if($result == "the code is correct"){
                $_SESSION['library']['code'] = $code;
                header("Location: forgot_password.php?mode=enter_password");
                die;
            }else{
                $error[] = $result;
            }
            break;

        case 'enter_password':
            //code...
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if($password !== $password2){
                $error[] = "Passwords do not match";
            }elseif(!isset($_SESSION['library']['email']) || !isset($_SESSION['library']['code'])){
                header("Location: forgot_password.php");
                die;
            
            }else{
                save_password($password);
                if(isset($_SESSION['library'])){
                    unset($_SESSION['library']);
                }
               
                header("Location: signin.php");
                die; 
            }
            break;

        default:
            //code
            break;
    }
}

function send_email($email){
    global $connection;

    $expire = time() + (60 * 1);
    $code = rand(1000,99999);
    $email = addslashes($email);

    $query = "INSERT INTO forgotPassword (email,code,expire) VALUES ('$email', '$code','$expire')";
    mysqli_query($connection,$query);

}

function save_password($password){
    global $connection;
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = addslashes($_SESSION['library']['email']);

    $query = "UPDATE users SET password = '$password' WHERE email = '$email' limit 1";
    mysqli_query($connection,$query);

}

function valid_email($email){
    global $connection;
    
    $email = addslashes($email);

    $query = "SELECT * FROM users WHERE email = '$email' limit 1";
    $result = mysqli_query($connection,$query);
    if($result){
        if(mysqli_num_rows($result) > 0){
            return true; 
            
        }
    }
    return false;
}

function is_code_correct($code){
    global $connection;

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['library']['email']);

    $query = "SELECT * FROM forgotpassword WHERE code = '$code' && email = '$email' order by id desc limit 1";
    $result = mysqli_query($connection,$query);
    if($result){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['expire'] > $expire){
                return "the code is correct"; 
            }else{
                return "the code is expired";
            }
        }else{
            return "the code is incorrect";
        }
    }
    return "the code is incorrect";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/password.css">
</head>
<body>

        <?php
        
        switch ($mode){
            case 'enter_email':
                //code
                ?>
                    <form method="post" action="forgot_password.php?mode=enter_email">
                        <h1>Forgot Password</h1>
                        <h3>Enter your email below</h3>

                        <span>
                        <?php
                            foreach ($error as $err){
                                //code...
                                echo $err . "<br>";
                            }
                        ?>
                        </span>

                        <input class="textbox" type="email" name="email" placeholder="email"><br>
                        <br>
                        <input type="submit" value="Next">
                        <br><br>
                        <input type="button" value="LOGIN" class="button"><a href="signin.php"></a>
                    </form>
                <?php
                break;
    
            case 'enter_code':
                //code
                ?>
                    <form method="post" action="forgot_password.php?mode=enter_code">
                        <h1>Forgot Password</h1>
                        <h3>Enter the code sent to your email/database below</h3>

                        <span>
                        <?php
                            foreach ($error as $err){
                                //code...
                                echo $err . "<br>";
                            }
                        ?>
                        </span>

                        <input class="textbox" type="text" name="code" placeholder="12345"><br>
                        <br>
                        <input type="submit" value="Next">
                        <a href="forgot_password.php">
                           <input type="button" value="Start Over">
                        </a>
                        <br><br>
                        <input type="button" value="LOGIN" class="button"><a href="signin.php"></a>
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
                                //code...
                                echo $err . "<br>";
                            }
                        ?>
                        </span>

                        <input class="textbox" type="text" name="password" placeholder="Password"><br>
                        <input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
                        <br>
                        <input type="submit" value="Next">
                        <a href="forgot_password.php">
                           <input type="button" value="Start Over">
                        </a>
                        <br><br>
                        <input type="button" value="LOGIN" class="button"><a href="signin.php"></a>
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






































































    


















