<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
/*require 'PHPMailer-master/src/SMTP.php';*/

//require 'vendor/autoload.php';

function  send_mail($recipient, $subject,$message){
//$get_firstname, 

    $mail = new PHPMailer();
    $mail->IsSMTP(true);

	$mail->SMTPDebug = 0;															
	$mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port	 = 587;
    $mail->Host	 = "smtp.gmail.com";	
	$mail->Username = "simangaalapha@gmail.com";				
	$mail->Password = "gfbsagreraf";
	
	//$mail->addAddress($get_email);
	//$mail->addAddress('receiver2@gfg.com', 'Name'); , $get_firstname simangaalapha@gmail.com', "My website
	
	$mail->IsHTML(true);
    $mail->AddAddress($recipient, "recipient-name");
    $mail->SetFrom("simangaalapha@gmail.com", "Alapha");	
    $mail->Subject = $subject;
    $content = $message;

    $mail->MsgHTML($content);
    if(!$mail->Send()){
        return false;
    }else{
        return true;
    }
}
?>

	<?php//$mail->Subject = 'Reset Password Notification';

    /*$email_template = "
    <h2>Hello</h2>
    <h3>You are receiving this email because we received a password reset request for your account. </h3>
    <br></br>
    
    ";

    //<a href='http://localhost/fundaofwebit/register-login-with-verification/password-change.php?token=$token&email=$get_email'>Click Me </a>

    $mail->Body = $email_template;
    $mail->send();

	/*$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";*/
//}





/*if(isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM Librarians WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_row($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        //$get_firstname = $row['firstname'];
        //$get_surname = $row['surname'];
        //$get_email = $row['email'];

        $update_token = "UPDATE Librarians SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);

        if($update_token_run){
            //$get_firstname, $get_surname, 
            send_password_reset($get_email, $update_token);
            $_SESSION['status'] = "We have sent you a password reset link";
            header("Location: forgot_password.php");
            exit(0);

        }else{
            $_SESSION['status'] = "Something went wrong. #1";
            header("Location: forgot_password.php");
            exit(0);
        }
        
    }else{
        $_SESSION['status'] = "No Email Found";
        header("Location: forgot_password.php");
        exit(0);
    }
}

if(isset($_POST['password_update'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if(!empty($token)){
        
        if (!empty($email)) && (!empty($new_password)) && (!empty($confirm_password)){
            //checking if the token is valid or not
            $check_token = "SELECT verify_token FROM Librarians WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if(mysqli_num_rows($check_token_run)>0){

                if($new_password == $confirm_password){
                    $update_password = "UPDATE Librarians SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);

                if($update_password_run){

                    $new_token = md5(rand())."funda";
                    $update_to_new_token = "UPDATE Librarians SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                    $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);

                    $_SESSION['status'] = "New Password Successfully Updated.!";
                    header("Location: login.php");
                    exit(0);

                }else{
                    $_SESSION['status'] = "Did not update password. Something went wrong.";
                    header("Location: password_change.php?token=$token&email=$email");
                    exit(0);
                }

                }else{
                    $_SESSION['status'] = "Password and Confirm Password does not match";
                    header("Location: password_change.php?token=$token&email=$email");
                    exit(0);
                }

            }else{
                $_SESSION['status'] = "Invalid Token";
                header("Location: password_change.php?token=$token&email=$email");
                exit(0);
            }

        }else{
            $_SESSION['status'] = "All fields are mandatory";
            header("Location: password_change.php?token=$token&email=$email");
            exit(0);
        }

    }else{
        $_SESSION['status'] = "No Token Available";
        header("Location: password_change.php");
        exit(0);
    }
}*/

?>