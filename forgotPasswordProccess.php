<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["em"])){

    $email = $_GET["em"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $num = $rs->num_rows;

    if($num == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code` = '".$code."' WHERE `email` = '".$email."'");


        //---------------------------------------------------------

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'janakasangeethjava@gmail.com';
            $mail->Password = 'yoxuuztgdlslmyiz';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('janakasangeethjava@gmail.com', 'Reset Password');
            $mail->addReplyTo('janakasangeethjava@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'TechMart Forgot Password Verification Code';
            $bodyContent = '<h1 style="color:green">Your Verification code is '.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo(" Verification Code Sending failed");
            }else {

                echo("Success");
            }
    }else {
        echo "Invalid Email Adddress";
    }

}


?>