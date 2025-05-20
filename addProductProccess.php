<?php

require "connection.php";


session_start();

$email = $_SESSION["au"]["email"];

$Subcategory = $_POST["subcat"];
$category = $_POST["cat"];
$brand = $_POST["bra"];
$model = $_POST["mod"];
$title = $_POST["tit"];
$condition = $_POST["con"];
$clr_in = $_POST["clr_in"];
$clr = $_POST["clr"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$des = $_POST["des"];
//$image = $_FILES["image"];

if ($category == "0") {
    echo ("please Select a Category");
}else if ($Subcategory == "0") {
    echo ("please Select a Sub Category");
}else if (empty($title)) {
    echo ("Please Enter a Title");
} else if (strlen($title <= 200)) {
    echo ("Title should have lower than 100 chracters");
} else if ($clr == "0") {
    echo ("Please Select a Colour");
} else if (empty($qty)) {
    echo ("Please Enter the Quantity");
} else if ($qty == "0" | $qty == "e" | $qty < 0) {
    echo ("Invalid Input For Quantity");
} else if (empty($cost)) {
    echo ("Please Enter the cost");
} else if (!is_numeric($cost)) {
    echo ("Invalid Input For cost");
} else if (empty($dwc)) {
    echo ("Please Enter the delivery fee for colombo");
} else if (!is_numeric($dwc)) {
    echo ("Invalid Input For delivery fee");
} else if (empty($doc)) {
    echo ("Please Enter the delivery fee for out of colombo");
} else if (!is_numeric($doc)) {
    echo ("Invalid Input For delivery fee");
} else if (empty($des)) {
    echo ("Please Enter the description");
} else {

    $bhm_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'");
    $brand_has_model_id;
    // echo $brand;

    if ($bhm_rs->num_rows == 1) {

        $bhm_data = $bhm_rs->fetch_assoc();
        $brand_has_model_id = $bhm_data["id"];
    } else {

        Database::iud("INSERT INTO `brand_has_model` (`brand_id`,`model_id`,`Sub_category_id`) VALUES ('" . $brand . "', '" . $model . "','".$Subcategory."')");
        $brand_has_model_id = Database::$connection->insert_id;
    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime_added`,`delivery_fee_colombo`,
    `delivery_fee_other`,`condition_id`,`mini_category_id`,`color_id`,`status_id`,`brand_has_model_id`,`admin_email`)
    VALUES ('" . $cost . "','" . $qty . "','" . $des . "','" . $title . "','" . $date . "','" . $dwc . "','" . $doc . "','" . $condition . "','" . $category . "',
    '" . $clr . "','" . $status . "','" . $brand_has_model_id . "','" . $email . "')");

    // Database::iud("INSERT INTO `brand` (`brand_id`,`model_id`,`Sub_category_id`) VALUES ('" . $brand . "', '" . $model . "','".$Subcategory."')");

    $product_id = Database::$connection->insert_id;

    //echo($product_id);

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {

            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extention = $image_file["type"];

                if (in_array($file_extention, $allowed_img_extention)) {

                    $new_file_Extention;

                    if ($file_extention == "image/jpg") {
                        $new_file_Extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_file_Extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_file_Extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_file_Extention = ".svg";
                    }


                    $file_name = "reso//product_images//" . $model . "_" . $x . "_" . uniqid() . $new_file_Extention;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
                } else {

                    echo ("Invalid Image Type");
                }
            }
        }

        echo ("Product Save Successfully");
    } else {

        echo ("Invalid Image Count");
    }
}

?>
