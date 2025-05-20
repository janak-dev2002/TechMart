<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];
$id = $_GET["id"];


//matak karala passe mekata recent product tabel ekak hadahan
Database::iud("DELETE FROM `images` WHERE `product_id` = '".$id."'");
Database::iud("DELETE FROM `product` WHERE `id` = '".$id."'");

echo("successs");

?>