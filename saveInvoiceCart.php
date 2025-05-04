<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $o_id = $_POST["oid"];
    $mail = $_POST["mail"];
    $dechrge = $_POST["dechrge"];

    $total = 0;
    $ship = 0;
    $shipping = 0;

    $Cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $mail . "'");
    $cart_num = $Cart_rs->num_rows;

    $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
    user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id = district.id INNER JOIN `province` ON district.province_id = province.id WHERE 
    `user_email` = '" . $_SESSION["u"]["email"] . "'");

    $address_data = $address_rs->fetch_assoc();

    for ($x = 0; $x < $cart_num; $x++) {


        $cart_data = $Cart_rs->fetch_assoc();

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $cart_data["product_id"] . "'");
        $product_data = $product_rs->fetch_assoc();

        if ($address_data["city_id"] == 6) {
            $ship = $product_data["delivery_fee_colombo"];
            $shipping = $shipping + $ship;
        } else {
            $ship = $product_data["delivery_fee_other"];
            $shipping = $shipping + $ship;
        }

        $total = $total + ($product_data["price"] * $cart_data["qty"]);

        $current_qty = $product_data["qty"];
        $new_qty = $current_qty - $cart_data["qty"];

        Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $cart_data["product_id"] . "'");
    }

    $date = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($tz);

    $Formated_date = $date->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice` (`order_id`,`date`,`total`,`delivary`,`status`,`user_email`)
    VALUES ('" . $o_id . "','" . $Formated_date . "','" . $total . "','" . $shipping . "','0','" . $mail . "')");

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $o_id . "'");
    $invoice_data = $invoice_rs->fetch_assoc();

    $cart_rs_1 = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $mail . "' ");
    $cart_num_1 = $cart_rs_1->num_rows;

    for ($y = 0; $y < $cart_num_1; $y++) {

        $cart_data_1 = $cart_rs_1->fetch_assoc();
        Database::iud("INSERT INTO `invoice_items` (`invoice_id`,`product_id`,`qty`)  VALUES ('" . $invoice_data["id"] . "','" . $cart_data_1["product_id"] . "','" . $cart_data_1["qty"] . "')");
    }


    Database::iud("DELETE FROM `cart` WHERE `user_email` = '" . $mail . "'");

    echo ("1");
}
