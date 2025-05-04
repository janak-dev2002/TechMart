<?php
require "connection.php";

session_start();

if (isset($_SESSION["au"]["email"])) {
    $email = $_SESSION["au"]["email"];
} else {
    echo "Session email not set.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
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

    // Validate form data
    if ($category == "0") {
        echo "Please select a Category";
    } elseif ($Subcategory == "0") {
        echo "Please select a Sub Category";
    } elseif (empty($title)) {
        echo "Please enter a Title";
    } elseif (strlen($title) > 100) {
        echo "Title should have less than 100 characters";
    } elseif ($clr == "0") {
        echo "Please select a Colour";
    } elseif (empty($qty) || !is_numeric($qty) || $qty <= 0) {
        echo "Invalid input for Quantity";
    } elseif (empty($cost) || !is_numeric($cost) || $cost <= 0) {
        echo "Invalid input for Cost";
    } elseif (empty($dwc) || !is_numeric($dwc) || $dwc < 0) {
        echo "Invalid input for delivery fee (Colombo)";
    } elseif (empty($doc) || !is_numeric($doc) || $doc < 0) {
        echo "Invalid input for delivery fee (Out of Colombo)";
    } elseif (empty($des)) {
        echo "Please enter the Description";
    } else {

        try {
            // Process form data and database operations
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");
            // Check if brand and model combination already exists in brand_has_model table
            $bhm_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id` = '" . $brand . "' AND `model_id` = '" . $model . "'");

            if ($bhm_rs->num_rows == 1) {
                $bhm_data = $bhm_rs->fetch_assoc();
                $brand_has_model_id = $bhm_data["id"];
            } else {
                // Insert into brand_has_model if not already present
                $insert_bhm_query = "INSERT INTO `brand_has_model` (`brand_id`, `model_id`, `Sub_category_id`) VALUES ('" . $brand . "', '" . $model . "', '" . $Subcategory . "')";
                Database::iud($insert_bhm_query);
                $brand_has_model_id = Database::$connection->insert_id;
            }

            // Insert into product table
            $insert_product_query = "INSERT INTO `product` (`price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `condition_id`, `mini_category_id`, `color_id`, `status_id`, `brand_has_model_id`, `admin_email`) 
                VALUES ('" . $cost . "', '" . $qty . "', '" . $des . "', '" . $title . "', '" . $date . "', '" . $dwc . "', '" . $doc . "', '" . $condition . "', '" . $category . "', '" . $clr . "', '1', '" . $brand_has_model_id . "', '" . $email . "')";

            Database::iud($insert_product_query);
            $product_id = Database::$connection->insert_id;

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
            } else {
                echo ("Invalid Image Count");
            }

            echo ("Product Save Successfully");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Invalid request method.";
}
