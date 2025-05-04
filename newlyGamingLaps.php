<?php

session_start();
require "connection.php";

if ($_GET["btn"] == "2") {

    $brnHasModal_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `Sub_category_id` = '3'");

    for ($y = 0; $y < $brnHasModal_rs->num_rows; $y++) {

        $brndHasModal_data = $brnHasModal_rs->fetch_assoc();

        $product_rs = Database::search("SELECT * FROM `product` WHERE `brand_has_model_id` = '" . $brndHasModal_data["id"] . "' ORDER BY `datetime_added` DESC LIMIT 4");
        $product_num = $product_rs->num_rows;

        for ($x = 0; $x < $product_num; $x++) {

            $product_data = $product_rs->fetch_assoc();

            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "'");
            $image_data = $image_rs->fetch_assoc();

?>


            <div class="col-lg-3 mt-4 mb-4 card bg-light border-0 shadow" style="width: 19rem;">
                <img onclick="showitem();" class="mt-3 im2" src="<?php echo $image_data["code"]; ?>">
                <div class="card-body text-center mt-3">
                    <h5 style="font-size: 15px;" class="card-title text_shadow"><?php echo $product_data["title"]; ?></h5>
                    <div class="rating mt-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <h2 class="price">Rs. <?php echo $product_data["price"]; ?>.00</h2>
                    <h6>Availability : &nbsp; <?php echo $product_data["qty"]; ?> item(s)</h6>
                    <a href="#" class="mt-3 btn btn-outline-dark search-btn " style="width: 220px; height: auto;">
                        <i class="bi bi-cart4"></i> Add to Cart
                    </a>
                    <a href='<?php echo "productView.php?id=" . $product_data["id"]; ?>' class="mt-3 btn btn-outline-warning buy-btn " style="width: 220px; height: auto;">
                        <i class="bi bi-bag"></i> Buy Now
                    </a>

                    <!-- Watch List -->
                    <?php
                    if (isset($_SESSION["u"])) {

                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`= '" . $product_data["id"] . "' AND
`user_email` = '" . $_SESSION["u"]["email"] . "'");
                        $watchlist_num = $watchlist_rs->num_rows;

                        if ($watchlist_num == 1) {

                    ?>
                            <button class="mt-3 btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo ($product_data['id']); ?>);" style="width: 220px; height: auto;">
                                <i id="heart<?php echo ($product_data["id"]); ?>" class="bi bi-heart-fill text-primary"></i> Add to Watchlist
                            </button>
                        <?php
                        } else {

                        ?>
                            <button class="mt-3 btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo ($product_data['id']); ?>);" style="width: 220px; height: auto;">
                                <i id="heart<?php echo ($product_data["id"]); ?>" class="bi bi-heart"></i> Add to Watchlist
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

?>