<?php

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["em"];
$mob = $_POST["mb"];
$pass = $_POST["pw"];
$gen = $_POST["gn"];

if (empty($fname)) {
    echo ("Please enter your First Name!!!");
} else if (strlen($fname) > 50) {
    echo ("Last Name must have less than 50 characters");
} else if (empty($lname)) {
    echo ("Please enter your Last Name!!!");
} else if (strlen($lname) > 50) {
    echo ("Last Name must have less than 50 characters");
} else if (empty($email)) {
    echo ("Please enter your Email!!!");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
} else if (empty($pass)) {
    echo ("Please enter your password");
} else if (strlen($pass) < 5 || strlen($pass) > 20) {
    echo ("Password must be between 5 - 20 characters");
} else if (empty($mob)) {
    echo ("Please enter your mobile !!!");
} else if (strlen($mob) != 10) {
    echo ("Mobile must have 10 characters");
} else if (!preg_match("/07[0,1,2,3,4,5,6,7,8][0-9]/", $mob)) {
    echo ("Invalid Mobile !!!");
}else{<>

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `mobile` = '" . $mob . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("User with the same Email or Mobile already exisits.");
    } else{

        $date = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");

        $date->setTimezone($tz);
        $dateformat = $date->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`joined_date`,`status`) VALUES
                  ('" . $fname . "','" . $lname . "','" . $email . "','" . $mob . "','" . $pass . "','" . $gen . "','" . $dateformat . "','1')");
    }

    echo ("success");
}
