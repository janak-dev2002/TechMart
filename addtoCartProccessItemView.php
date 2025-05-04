<?php


session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];
        $buyQty = $_GET["bqty"];


        $cart_rs = Database::search("SELECT * FROM `cart`WHERE `product_id` = '".$pid."' AND `user_email` = '".$email."'");
        $cart_num = $cart_rs->num_rows;

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
        $product_data = $product_rs->fetch_assoc();
        $product_qty = $product_data["qty"];
        echo $product_qty;


        if($cart_num == 1){

            $cart_data = $cart_rs->fetch_assoc();
            $current_qty = $cart_data["qty"];
            $newqty = (int)$current_qty + (int)$buyQty;

            if($product_qty >= $newqty){

                Database::iud("UPDATE `cart` SET `qty` = '".$newqty."' WHERE `product_id` = '".$pid."' AND `user_email` = '".$email."'");
                echo("Product Updated");
            }else{
                echo(" Invalid quantity ");
                echo $newqty;
            }
        }else{

            Database::iud("INSERT INTO `cart`(`product_id`, `user_email`, `qty`) VALUES ('".$pid."','".$email."','1')");
            echo("Successfuly added ");
        }


    }else{
        echo("Something Went Wrong");
    }

}else{

    echo("Please Sign In or Register");
}
