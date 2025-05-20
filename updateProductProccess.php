<?php

session_start();
require "connection.php";

if (isset($_SESSION["p"])) {

    $pid = $_SESSION["p"]["id"];

    $tite = $_POST["t"];
    $qty = $_POST["q"];
    $dcw = $_POST["dcw"];
    $dco = $_POST["dco"];
    $desc = $_POST["desc"];
    $cost = $_POST["iprice"];
  

    echo $qty;


    Database::iud("UPDATE `product` SET  `title` = '" . $tite . "',`qty` = '" . $qty . "',
    `delivery_fee_colombo` = '" . $dcw . "',`delivery_fee_other` = '" . $dco . "',`description` = '" . $desc . "'
     WHERE `id` = '" . $pid . "'");

     echo ("Product has been updated");
     
     Database::iud("DELETE FROM `images` WHERE `product_id` = '".$pid."'");

    $length = sizeof($_FILES);
    $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

    if ($length <= 3 && $length > 0) {

        for ($x = 0; $x < $length; $x++) {

            if (isset($_FILES["img" . $x])) {

                $img_file = $_FILES["img" . $x];
                $file_type = $img_file["type"];

                if (in_array($file_type, $allowed_img_extentions)) {

                    $new_img_extention;

                    if ($file_type == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_type == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_type == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_type == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "reso//product_images//updated//".$tite."_".uniqid()."_".$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('".$file_name."','".$pid."')");
                    echo ("Product imaget has been updated");


                } else {
                    echo ("File Type Not Allowed");
                }
            }
        }
    }
}
