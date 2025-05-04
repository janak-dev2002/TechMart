<?php

session_start();
require "connection.php";

$email = $_POST["em"];
$pass = $_POST["pw"];
$remem = $_POST["re"];


if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($pass)) {
    echo ("Please enter your Password");
} else if (strlen($pass) < 5 || strlen($pass) > 20) {
    echo ("Password must have between 5-20 charaters");
}else{

    $rs = Database::search("SELECT * FROM `admin` WHERE `email` ='" . $email . "' AND `password` = '" . $pass . "'");
    $num = $rs->num_rows;

    if($num == 1){

        
        $data = $rs->fetch_assoc();
        $_SESSION["au"] = $data;

        echo "success";


        if($remem == "true"){

            $remem = "checked";
            setcookie("email_a", $email, time() + (60 * 60 * 24 * 365));
            setcookie("pass_a", $pass, time() + (60 * 60 * 24 * 365));
            setcookie("check_a",$remem,time() +(60 * 60 * 24 * 365));
            
        }else {
            setcookie("email_a", "", -1);
            setcookie("pass_a", "", -1);
            setcookie("check_a", "", -1);
        }

    }else {
        echo("Invalid Username or Password");
    }
}
