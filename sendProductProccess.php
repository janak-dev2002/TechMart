<?php

session_start();

require "connection.php";

$email = $_SESSION["au"]["email"];
$id = $_GET["id"];

$product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$id."' AND `admin_email` = '".$email."'");
$productnum = $product_rs->num_rows;

if($productnum == 1){

    $product_data = $product_rs->fetch_assoc();
    $_SESSION["p"] = $product_data;
    // echo $_SESSION["p"]["mini_category_id"];
    echo "successs";


}else{

    echo "Somthing Went Wrong";
}

?>