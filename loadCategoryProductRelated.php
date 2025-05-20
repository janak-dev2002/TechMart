<?php

require "connection.php";

if (isset($_GET["cid"])) {

    $cat_id = $_GET["cid"];

    $Subcat_rs = Database::search("SELECT * FROM `sub_category` WHERE `id` = '" . $cat_id . "'");
    $Subcat_num = $Subcat_rs->num_rows;

    for ($x = 0; $x < $Subcat_num; $x++) {

        $Subcat_data = $Subcat_rs->fetch_assoc();

        $miniCat_rs = Database::search("SELECT * FROM `mini_category` WHERE `Sub_category_id` = '" . $Subcat_data["id"] . "'");
        $miniCat_num = $miniCat_rs->num_rows;

        for ($y = 0; $y < $miniCat_num; $y++) {

            $miniCat_data = $miniCat_rs->fetch_assoc();

            $Product_rs = Database::search("SELECT * FROM `product` WHERE `mini_category_id` = '" . $miniCat_data["id"] . "'");
            $product_num = $Product_rs->num_rows;

            for ($z = 0; $z < $product_num; $z++) {

                $product_data = $Product_rs->fetch_assoc();

                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();

?>

                <div class="col-3 mt-4 mb-4 card  border-0 shadow" style="width: 19rem;">

                    <a href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'><img onclick="showitem();" class="mt-3 im2" src="<?php echo $image_data["code"]; ?>"></a>
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
                        <a href="#" class="mt-3 btn btn-outline-dark search-btn " style="width: 200px; height: auto;">
                            <i class="bi bi-cart4"></i> Add to Cart
                        </a>
                        <a href='<?php echo "productView.php?id=" . $product_data["id"]; ?>' class="mt-3 btn btn-outline-warning buy-btn " style="width: 200px; height: auto;">
                            <i class="bi bi-cart4"></i> Buy Now
                        </a>
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