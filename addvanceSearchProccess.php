<?php


require "connection.php";

$txt = $_POST["t"];
$category = $_POST["c1"];
$brand = $_POST["b1"];
$model = $_POST["m"];
$condition = $_POST["c2"];
$color = $_POST["c3"];
$price_from = $_POST["pf"];
$price_to = $_POST["pt"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }

    if ($status == 0 && $category != 0) {
        $query .= " WHERE `mini_category_id` = '" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= "AND `mini_category_id` = '" . $category . "'";
    }


    $pid = 0;
    if ($brand != 0 && $model == 0) {

        $brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "'");
        $brand_num = $brand_rs->num_rows;
        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {

        $model_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `model_id`='" . $model . "'");
        $model_num = $model_rs->num_rows;
        for ($x = 0; $x < $model_num; $x++) {
            $model_data = $model_rs->fetch_assoc();
            $pid = $model_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {

        $model_has_brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' 
        AND `model_id`='" . $model . "'");
        $model_has_brand_num = $model_has_brand_rs->num_rows;
        for ($x = 0; $x < $model_has_brand_num; $x++) {
            $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
            $pid = $model_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }


    if ($status == 0 && $condition != 0) {
        $query .= " WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($status != 0 && $condition != 0) {
        $query .= " AND `condition_id`='" . $condition . "'";
    }

    if ($status == 0 && $color != 0) {
        $query .= " WHERE `color_id`='" . $color . "'";
        $status = 1;
    } else if ($status != 0 && $color != 0) {
        $query .= " AND `color_id`='" . $color . "'";
    }


    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $price_from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
    
} else if ($sort == 1) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `mini_category_id` = '" . $category . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `mini_category_id` = '" . $category . "' ORDER BY `price` DESC";
    }

 

    $pid = 0;
    if ($brand != 0 && $model == 0) {

        $brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "'");
        $brand_num = $brand_rs->num_rows;
        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id` = '" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id` = '" . $pid . "' ORDER BY `price` DESC";
        }
    }

    if ($brand == 0 && $model != 0) {

        $model_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `model_id`='" . $model . "'");
        $model_num = $model_rs->num_rows;
        for ($x = 0; $x < $model_num; $x++) {
            $model_data = $model_rs->fetch_assoc();
            $pid = $model_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "' ORDER BY `price` DESC";
        }
    }

    if ($brand != 0 && $model != 0) {

        $model_has_brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' 
        AND `model_id`='" . $model . "'");
        $model_has_brand_num = $model_has_brand_rs->num_rows;
        for ($x = 0; $x < $model_has_brand_num; $x++) {
            $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
            $pid = $model_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "' ORDER BY `price` DESC";
        }
    }


    if ($status == 0 && $condition != 0) {
        $query .= " WHERE `condition_id`='" . $condition . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($status != 0 && $condition != 0) {
        $query .= " AND `condition_id`='" . $condition . "' ORDER BY `price` DESC";
    }

    if ($status == 0 && $color != 0) {
        $query .= " WHERE `color_id`='" . $color . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($status != 0 && $color != 0) {
        $query .= " AND `color_id`='" . $color . "' ORDER BY `price` DESC";
    }


    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $price_from . "' ";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
}


if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}


$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;



for ($x = 0; $x < $results_num; $x++) {
    $selected_data = $results_rs->fetch_assoc();


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

?>


<div class="col-11 mt-3">
    <div class="row d-flex justify-content-center ">

        <div class="col-12 mt-3 d-flex justify-content-center">
            <div class="row">
                <div class="col-md-4 offset-md-8">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link cursorrr" <?php if ($pageno <= 1) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="advancedSearch('<?php echo ($pageno - 1); ?>')" <?php
                                                                                                                        } ?> aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {

                                if ($x == $pageno) {

                            ?>
                                    <li class="page-item active">
                                        <a class="page-link cursorrr" onclick="advancedSearch('<?php echo ($x); ?>')"><?php echo $x; ?></a>
                                    </li>
                                <?php
                                } else {

                                ?>
                                    <li class="page-item">
                                        <a class="page-link cursorrr" onclick="advancedSearch('<?php echo ($x); ?>')"><?php echo $x; ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link cursorrr" <?php if ($pageno >= $number_of_pages) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="advancedSearch('<?php echo ($pageno + 1); ?>')" <?php
                                                                                                                        } ?>aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>