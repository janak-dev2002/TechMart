<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $pCode = $_POST["pCode"];

    if (isset($_FILES["image"])) {

        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_extention = $image["type"];

        if (!in_array($file_extention, $allowed_image_extentions)) {

            echo ("Please select a valid image");
        } else {

            $newFileExtension;

            if ($file_extention == "image/jpg") {
                $newFileExtension = ".jpg";
            } else if ($file_extention == "image/jpeg") {
                $newFileExtension = ".jpeg";
            } else if ($file_extention == "image/png") {
                $newFileExtension = ".png";
            } else if ($file_extention == "image/svg+xml") {
                $newFileExtension = ".svg+xml";
            }

            $file_name = "reso/profile_img/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $newFileExtension;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path` = '" . $file_name . "' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_image` (`path`, `user_email`) VALUES ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "' , `lname` = '" . $lname . "' , `mobile` = '" . $mobile . "' 
WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    $address_num = $address_rs->num_rows;


    if ($address_num == 1) {

        if (!$city == 0) {

            Database::iud("UPDATE `user_has_address` SET `line1` = '" . $line1 . "' , `line2` = '" . $line2 . "',
        `city_id` = '" . $city . "' , `postal_code` = '" . $pCode . "' 
        WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
        } else {
            echo ("0");
        }
    } else {

        if (!$city == 0) {

            Database::iud("INSERT INTO `user_has_address` (`line1`,`line2`,`user_email`,`postal_code`,`city_id`) VALUES ('" . $line1 . "','" . $line2 . "','" . $_SESSION["u"]["email"] . "','" . $pCode . "','" . $city . "')");
        } else {
            echo ("0");
        }

        echo ("success");
    }
} else {

    echo ("please Login First");
}
?>