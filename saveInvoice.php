<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $o_id = $_POST["o"];
    $p_id = $_POST["i"];
    $mail = $_POST["m"];
    $amount = $_POST["a"];
    $qty = $_POST["q"];
    $deChrge = $_POST["deChrge"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $p_id . "'");
    $product_data = $product_rs->fetch_assoc();

    $current_qty = $product_data["qty"];
    $new_qty = $current_qty - $qty;


    Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $p_id . "'");


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `invoice` (`order_id`,`date`,`total`,`delivary`,`status`,`user_email`)
    VALUES ('" . $o_id . "','" . $date . "','" . $amount . "','" . $deChrge . "','0','" . $mail . "')");

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$o_id."'");
    $invoice_data = $invoice_rs->fetch_assoc();

    Database::iud("INSERT INTO `invoice_items` (`invoice_id`,`product_id`,`qty`)
    VALUES ('". $invoice_data["id"]."','". $p_id."','". $qty ."')");

    echo ("1");
}
