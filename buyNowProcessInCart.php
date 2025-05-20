<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $cartProduct_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    $cartProduct_num = $cartProduct_rs->num_rows;

    if ($cartProduct_num > 0) {

        $array;
        $shipping = 0;
        $total = 0;
        $order_id = "ITM " . $cartProduct_num . " " . random_int(100000, 999999);

        $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
        user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id = district.id INNER JOIN `province` ON district.province_id = province.id WHERE 
        `user_email` = '" . $_SESSION["u"]["email"] . "'");

        $address_data = $address_rs->fetch_assoc();

        for ($x = 0; $x < $cartProduct_num; $x++) {

            $Cartproduct_data = $cartProduct_rs->fetch_assoc();

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $Cartproduct_data["product_id"] . "'");
            $product_data = $product_rs->fetch_assoc();

            $total = $total + ($product_data["price"]) * $Cartproduct_data["qty"];

            if ($address_data["city_id"] == 6) {
                $ship = $product_data["delivery_fee_colombo"];
                $shipping = $shipping + $ship;
            } else {
                $ship = $product_data["delivery_fee_other"];
                $shipping = $shipping + $ship;
            }
        }

        $amount = $total + $shipping;

        $array["id"] = $order_id;
        $array["amount"] = $amount;
        $array["mobile"] = $_SESSION["u"]["mobile"];
        $array["mail"] = $_SESSION["u"]["email"];
        $array["dechrge"] = $shipping;



        echo json_encode($array);
    } else {
        echo ("2");
    }
} else {
    echo "1";
}
