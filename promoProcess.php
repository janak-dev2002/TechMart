<?php

session_start();
require "connection.php";

if ($_SESSION["u"]) {

    $currentTotal = $_GET["ctotal"];
    $email = $_SESSION["u"]["email"];

    if (!empty($_GET["code"])) {

            $PromoCode = $_GET["code"];

            $code_rs = Database::search("SELECT * FROM `promo_code` WHERE `code` = '" . $PromoCode . "'");
            $code_num = $code_rs->num_rows;

            if ($code_num == 1) {

                $code_data = $code_rs->fetch_assoc();
                $discount = $code_data["discount"];

                $newTotal = $currentTotal - $discount;

                Database::iud("INSERT INTO `promo_code_has_user` (`promo_code_id`,`user_email`) VALUES ('".$code_data["id"]."','".$email."')");

                echo $newTotal;

            } 
        }

} else {
    echo "Something Went Wrong";
}
