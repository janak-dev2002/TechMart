<?php

require "connection.php";

$email = $_POST["em"];
$newPass = $_POST["np"];
$reNewPass = $_POST["rp"];
$vcode = $_POST["vc"];

if(empty($email)){
    echo ("Missing Email address");
}else if(empty($newPass)){
    echo ("Please insert a New Password");
}else if(strlen($newPass)<5 || strlen($newPass)>20){
    echo ("Invalid Password");
}else if(empty($reNewPass)){
    echo ("Please Re-type your New Password");
}else if($newPass != $reNewPass){
    echo ("Password does not matched");
}else if(empty($vcode)){
    echo ("Please enter your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `verification_code`='".$vcode."'");
    $num = $rs->num_rows;

    if($num == 1){

        Database::iud("UPDATE `user` SET `password` = '".$newPass."' WHERE `email` = '".$email."'");
        echo("success");
    }else{
        echo ("Invalid Email or Verification Code");
    }
}


?>