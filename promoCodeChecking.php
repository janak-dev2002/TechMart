<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    if (!empty($_GET["code"])) {

        $PromoCode = $_GET["code"];
        $email = $_SESSION["u"]["email"];

        $code_rs = Database::search("SELECT * FROM `promo_code` WHERE `code` = '" . $PromoCode . "'");
        $code_num = $code_rs->num_rows;

        if ($code_num == 1) {

            $code_data = $code_rs->fetch_assoc();

            $codeHasUser_rs = Database::search("SELECT * FROM `promo_code_has_user` WHERE `promo_code_id` = '" . $code_data["id"] . "' AND `user_email` = '".$email."'");
            $codeHasUser_num = $codeHasUser_rs->num_rows;

            if($codeHasUser_num == 0){
                echo "success";
            }else{
                echo "You have already used this code !";
            }

        } else {
            echo "Invalid Code";
        }
    } else {
        echo "Please Enter Your Discount Code";
    }
} else {
    echo "Something Went Wrong";
}

?>
