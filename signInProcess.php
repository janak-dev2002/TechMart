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

    $rs = Database::search("SELECT * FROM `user` WHERE `email` ='" . $email . "' AND `password` = '" . $pass . "'");
    $num = $rs->num_rows;

    if($num == 1){

        echo "success";
        $data = $rs->fetch_assoc();

        $_SESSION["u"] = $data;

        if($remem == "true"){

            $remem = "checked";
            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("pass", $pass, time() + (60 * 60 * 24 * 365));
            setcookie("check",$remem,time() +(60 * 60 * 24 * 365));
            
        }else {
            setcookie("email", "", -1);
            setcookie("pass", "", -1);
            setcookie("check", "", -1);
        }

    }else {
        echo("Invalid Username or Password");
    }
}
