<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];


$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `mini_category_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `mini_category_id` = '" . $select . "'";
}


$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;


$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;
$selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;

?>


