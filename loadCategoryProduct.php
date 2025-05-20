<?php

require "connection.php";

if (isset($_GET["cid"])) {

    $cat_id = $_GET["cid"];


    if ("0" != ($_GET["page"])) {

        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $Subcat_rs = Database::search("SELECT * FROM `sub_category` WHERE `Category_id` = '" . $cat_id . "'");
    $Subcat_num = $Subcat_rs->num_rows;

    for ($x = 0; $x < $Subcat_num; $x++) {

        $Subcat_data = $Subcat_rs->fetch_assoc();

        $miniCat_rs = Database::search("SELECT * FROM `mini_category` WHERE `Sub_category_id` = '" . $Subcat_data["id"] . "'");
        $miniCat_num = $miniCat_rs->num_rows;

        for ($y = 0; $y < $miniCat_num; $y++) {

            $miniCat_data = $miniCat_rs->fetch_assoc();

            $query = "SELECT * FROM `product` WHERE `mini_category_id` = '" . $miniCat_data["id"] . "'";

            $Product_rs = Database::search($query);
            $product_num = $Product_rs->num_rows;

            $results_per_page = 1;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
// echo $pageno;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            // echo $selected_num;

            for ($z = 0; $z < $selected_num; $z++) {

                $selected_data = $selected_rs->fetch_assoc();

                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $selected_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();

?>

                <div class="col-3 mt-4 mb-4 card  border-0 shadow">
                    <img onclick="showitem();" class="mt-3 im2" src="<?php echo $image_data["code"]; ?>">
                    <div class="card-body text-center mt-3">
                        <h5 style="font-size: 15px;" class="card-title text_shadow"><?php echo $selected_data["title"]; ?></h5>
                        <div class="rating mt-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <h2 class="price">Rs. <?php echo $selected_data["price"]; ?>.00</h2>
                        <h6>Availability : &nbsp; <?php echo $selected_data["qty"]; ?> item(s)</h6>
                        <button onclick="addtoCart(<?php echo $selected_data['id']; ?>);" class="mt-3 btn btn-outline-dark search-btn " style="width: 220px; height: auto;">
                            <i class="bi bi-cart4"></i> Add to Cart
                        </button>
                        <a href='<?php echo "productView.php?id=" . $selected_data["id"]; ?>' class="mt-3 btn btn-outline-warning buy-btn " style="width: 220px; height: auto;">
                            <i class="bi bi-bag"></i> Buy Now
                        </a>
                        <!-- Watch List -->

                        <?php

                        if (isset($_SESSION["u"])) {

                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`= '" . $selected_data["id"] . "' AND
                            `user_email` = '" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {

                        ?>
                                <button class="mt-3 btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo ($selected_data['id']); ?>);" style="width: 220px; height: auto;">
                                    <i id="heart<?php echo ($selected_data["id"]); ?>" class="bi bi-heart-fill text-primary"></i> Add to Watchlist
                                </button>
                            <?php
                            } else {

                            ?>
                                <button class="mt-3 btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo ($selected_data['id']); ?>);" style="width: 220px; height: auto;">
                                    <i id="heart<?php echo ($selected_data["id"]); ?>" class="bi bi-heart"></i> Add to Watchlist
                                </button>
                            <?php

                            }
                            ?>

                        <?php
                        } else {
                        ?>
                            <button onclick="watchlistWithoutSign();" class="mt-3 btn btn-outline-dark search2-btn " style="width: 220px; height: auto;">
                                <i class="bi bi-heart"></i> Add to Watchlist
                            </button>
                        <?php
                        }
                        ?>

                    </div>
                </div>

    <?php
            }
        }
    }

   
} else {

    echo ("Something Went Wrong");
}


?>