<?php

require "connection.php";
session_start();

if ($_GET["btnId"] == 1) {

    $Pid = $_GET["id"];
    $email = $_SESSION["u"]["email"];

    $rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '" . $Pid . "' AND `user_email` = '" . $email . "'");
    $data = $rs->fetch_assoc();


    $currentQty = $data["qty"];

    $newQty = (int)$currentQty - 1;

    if ($newQty == "0") {
        Database::iud("DELETE FROM `cart` WHERE `product_id` = '" . $Pid . "' AND `user_email` = '" . $email . "'");
        echo ("ok");
    } else {

        Database::iud("UPDATE `cart` SET `qty` = '" . $newQty . "' WHERE `product_id` = '" . $Pid . "' AND `user_email` = '" . $email . "'");
        echo ("ok");
    }
} else if ($_GET["btnId"] == 2) {

    $Pid = $_GET["id"];
    $email = $_SESSION["u"]["email"];

    $rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '" . $Pid . "' AND `user_email` = '" . $email . "'");
    $data = $rs->fetch_assoc();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $Pid . "'");
    $product_data = $product_rs->fetch_assoc();
    $product_qty = $product_data["qty"];

    $currentQty = $data["qty"];

    $newQty = (int)$currentQty + 1;

    if ($product_qty < $newQty) {
        echo "Out of stock";
    } else {

        Database::iud("UPDATE `cart` SET `qty` = '" . $newQty . "' WHERE `product_id` = '" . $Pid . "' AND `user_email` = '" . $email . "'");
        echo ("ok");
    }
}

?>
