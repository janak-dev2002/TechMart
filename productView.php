<?php
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,product.title,
    product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.mini_category_id,
    product.brand_has_model_id,product.color_id,product.status_id,product.condition_id,product.admin_email,
    model.name AS mname FROM `product` INNER JOIN `brand_has_model` ON 
    brand_has_model.id=product.brand_has_model_id INNER JOIN `brand` ON brand.id=brand_has_model.brand_id INNER JOIN 
    `model` ON model.id=brand_has_model.model_id WHERE product.id = '" . $pid . "'");


    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

        $miniCat_rs = Database::search("SELECT * FROM `mini_category` WHERE `id` = '" . $product_data["mini_category_id"] . "'");
        $miniCat_data = $miniCat_rs->fetch_assoc();
        $SubCat_rs = Database::search("SELECT * FROM `sub_category` WHERE `id` = '" . $miniCat_data["Sub_category_id"] . "'");
        $SubCat_data = $SubCat_rs->fetch_assoc();
        $Cat_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $SubCat_data["Category_id"] . "'");
        $Cat_data = $Cat_rs->fetch_assoc();


?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $product_data["title"]; ?> | Product View</title>

            <link rel="stylesheet" href="bootstrap.min.css" />
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
            <link rel="icon" href="reso/Logo.png">
        </head>

        <body onload="loadProductFromCategoryToView(<?php echo $SubCat_data['id']; ?>);">

            <?php include "header2.php"; ?>

            <div class="container py-5">
                <div class="row">

                    <div class="col-12">
                        <div class="row d-md-flex align-items-center justify-content-center  mt-2 ">

                            <div class="col-12 col-md-1 d-md-block d-flex justify-content-center mb-4 mb-md-0 ">
                                <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                            </div>

                            <div class=" offset-md-1 col-12 col-md-7 mb-2 mb-md-0">

                                <div class="col-12">
                                    <div class="row d-flex justify-content-between">

                                        <div class="col-2">
                                            <div class="btn-group col-12 d-grid" style="height: 45px;">
                                                <button id="dropdownbtn" class="text-uppercase border-0 search-select clr-bg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 13px;">
                                                    All Categories
                                                </button>
                                                <ul class="dropdown-menu overflow-scroll" style="width: 300px;">
                                                    <div class="d-flex flex-column" style="height: 300px;">


                                                        <?php
                                                        $mainCategory_rs_up = Database::search("SELECT * FROM `category`");
                                                        $mainCategory_num_up = $mainCategory_rs_up->num_rows;

                                                        for ($x = 0; $x < $mainCategory_num_up; $x++) {

                                                            $mainCategory_data_up = $mainCategory_rs_up->fetch_assoc();

                                                        ?>

                                                            <div class="col-12">
                                                                <div class="row d-flex flex-column">

                                                                    <div class="subcat-title col-12">
                                                                        <h6 class=" text-uppercase"><a href="#" class="subcat-titl text-decoration-none p-2 text-black fw-bold"><?php echo $mainCategory_data_up["name"]; ?></a></h6>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="row">

                                                                            <?php
                                                                            $subCategory_rs_up = Database::search("SELECT * FROM `sub_category` WHERE `Category_id` = '" . $mainCategory_data_up["id"] . "'");
                                                                            $subCategory_num_up = $subCategory_rs_up->num_rows;

                                                                            for ($y = 0; $y < $subCategory_num_up; $y++) {

                                                                                $subCategory_data_up = $subCategory_rs_up->fetch_assoc();

                                                                            ?>
                                                                                <div class="subcat-title ms-4 mt-1">
                                                                                    <h6 class=" text-uppercase"><a href="#" class="subcat-titl text-decoration-none p-2 text-black"><?php echo $subCategory_data_up["sub_name"]; ?></a></h6>
                                                                                </div>

                                                                                <?php

                                                                                ?>

                                                                                <ul class="list-unstyled list-group list-group-flush p-2 ms-5">
                                                                                    <?php
                                                                                    $miniCategory_rs_up = Database::search("SELECT * FROM `mini_category` WHERE `Sub_category_id` = '" . $subCategory_data_up["id"] . "'");
                                                                                    $miniCategory_num_up = $miniCategory_rs_up->num_rows;

                                                                                    for ($z = 0; $z < $miniCategory_num_up; $z++) {

                                                                                        $miniCategory_data_up = $miniCategory_rs_up->fetch_assoc();

                                                                                    ?>
                                                                                        <li id="cateo" onclick="slectedCat(<?php echo $miniCategory_data_up['id']; ?>,'<?php echo $miniCategory_data_up['mini_name']; ?>');">
                                                                                            <a href="#" class=" text-dark text-decoration-none a_fo fs-6 text-uppercase"><?php echo $miniCategory_data_up["mini_name"]; ?></a>
                                                                                        </li>



                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </ul>


                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                    </div>
                                                                    <br>

                                                                </div>
                                                            </div>

                                                        <?php
                                                        }
                                                        ?>


                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-9  offset-lg-0">
                                            <input class="d-grid form-control rounded-5 rounded-start border-start-0" type="search" placeholder="Search" style="height: 45px;" id="basic_search_text">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-grid col-md-2 " style="height: 45px;">
                                <button onclick="basicSearch(0);" class="btn btn-outline-dark search-btn fs-5 " type="submit">Search</button>
                            </div>

                            <div class="col-md-1 text-center mt-2">
                                <h5><a class="text-decoration-none text-black" href="advancedSearch.php">Advanced</a></h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-5">
                <div class="row">

                    <div class="col-md-12  col-12 mt-1">
                        <div class="row clr-bg d-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mt-2">

                                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="#"><?php echo $Cat_data["name"]; ?></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="#"><?php echo $SubCat_data["sub_name"]; ?></a></li>
                                    <li class="breadcrumb-item active text-black-50" aria-current="page"><?php echo $miniCat_data["mini_name"]; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="col-12 mt-1 rounded-4 py-5">
                        <div class="row  d-flex justify-content-between">
                            <div class="col-md-6 col-12 ">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-content-center">
                                        <?php
                                        $image_rs_M = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                        $image_num_M = $image_rs_M->num_rows;


                                        if ($image_num_M > 0) {
                                            $image_data_M = $image_rs_M->fetch_assoc();
                                        ?>
                                            <img src="<?php echo $image_data_M["code"]; ?>" id="mainimg" class=" img-thumbnail img_product border-info">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="reso/empty.svg" id="mainimg" class=" img-thumbnail img_product border-info">
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row d-flex justify-content-between">

                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                            $image_num = $image_rs->num_rows;
                                            $img = array();

                                            if ($image_num != 0) {

                                                for ($x = 0; $x < $image_num; $x++) {

                                                    $image_data = $image_rs->fetch_assoc();
                                                    $img[$x] = $image_data["code"];

                                            ?>
                                                    <div class="col-4 d-flex align-items-center">
                                                        <img src="<?php echo $img[$x]; ?>" id="imgp<?php echo $x; ?>" onclick="changimg(<?php echo $x; ?>);" class="cursorrr img_sub_product img-thumbnail border-1">
                                                    </div>
                                                <?php
                                                }
                                            } else {

                                                ?>
                                                <div class="col-4 d-flex align-items-center">
                                                    <img src="reso/empty.svg" id="imgp1" class="cursorrr img_sub_product img-thumbnail border-1">
                                                </div>
                                                <div class="col-4 d-flex align-items-center">
                                                    <img src="reso/empty.svg" id="imgp2" class="cursorrr img-thumbnail img_sub_product border-1">
                                                </div>
                                                <div class="col-4 d-flex align-items-center">
                                                    <img src="reso/empty.svg" id="imgp3" class="cursorrr img-thumbnail img_sub_product border-1">
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mt-4">
                                <div class="row d-flex flex-column">

                                    <div class="col-12 ">
                                        <h3 class="clr"><?php echo $product_data["title"]; ?></h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row d-flex flex-row align-items-center">

                                            <div class="col-md-2 col-12" style="font-size: 13px;">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>
                                            <div class="col-md-9 col-12 mt-2">
                                                <h4 class="text-black" style="font-size: 13px;">4.5 Stars | 39 Reviews & Ratings</h4>
                                            </div>


                                        </div>
                                    </div>

                                    <?php

                                    $price = $product_data["price"];
                                    $adding_price = ($price / 100) * 5;
                                    $new_price = $price + $adding_price;
                                    $difference = $new_price - $price;
                                    $percentage = ($difference / $price) * 100;

                                    ?>

                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <div class="col-12">
                                                <span class="fs-3 fw-bold text-dark">Rs. <?php echo $price; ?> .00</span>
                                            </div>

                                            <span class="fs-5 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                            &nbsp; | &nbsp;
                                            <span class="fs-5 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00 (<?php echo $percentage; ?>%)</span>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <?php
                                            $clr_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product_data["color_id"] . "'");
                                            $clr_data = $clr_rs->fetch_assoc();
                                            ?>
                                            <h4 class="text-black fw-bold" style="font-size: 15px;"> Colour&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; <span class="fw-light"> <?php echo $clr_data["name"]; ?></span></h4>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <?php
                                            $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product_data["condition_id"] . "'");
                                            $condition_data = $condition_rs->fetch_assoc();
                                            ?>
                                            <h4 class="text-black fw-bold" style="font-size: 15px;">Condition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <span class="fw-light"><?php echo $condition_data["name"]; ?></span></h4>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <h4 class="text-black fw-bold" style="font-size: 15px;">Availability &nbsp;&nbsp;&nbsp;&nbsp;: <span class="clr-bg rounded-4 fw-lighter text-white">&nbsp;<?php echo $product_data["qty"]; ?> Items In Stock&nbsp;</span></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <h4 class="text-black fw-bold" style="font-size: 15px;">Warrenty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <span class="fw-lighter">6 Month Warrenty</span></h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">

                                        <div class="col-12  d-flex align-items-center justify-content-between">
                                            <img src="payment_method/paylogo.png" height="120" width="250" />
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <input id="qty_input" type="number" class="form-control rounded-5 text-center" min="1" value="1">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6 col-12">
                                            <div class="row flex-column">
                                                <div class="col-10 d-grid">
                                                    <button onclick="goTobuyThis(<?php echo $pid; ?>);" class="btn btn-outline-dark search-btn"><i class="bi bi-bag"></i> Buy It Now</button>
                                                </div>
                                                <div class="col-10 d-grid mt-3">
                                                    <a onclick="addtoCartInItemView(<?php echo $pid; ?>);" class="btn btn-outline-dark search1-btn ">
                                                        <i class="bi bi-cart4"></i> Add to Cart
                                                    </a>
                                                </div>
                                                <div class="col-10 d-grid mt-3">

                                                    <?php

                                                    if (isset($_SESSION["u"])) {

                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`= '" . $pid . "' AND
                                                        `user_email` = '" . $_SESSION["u"]["email"] . "'");

                                                        $watchlist_num = $watchlist_rs->num_rows;


                                                        if ($watchlist_num == 1) {

                                                    ?>
                                                            <button class="btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo $pid; ?>);">
                                                                <i id="heart<?php echo $pid; ?>" class="bi bi-heart-fill text-primary"></i> Add to Watchlist
                                                            </button>
                                                        <?php
                                                        } else {

                                                        ?>
                                                            <button class="btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo $pid; ?>);">
                                                                <i id="heart<?php echo $pid; ?>" class="bi bi-heart"></i> Add to Watchlist
                                                            </button>
                                                        <?php

                                                        }
                                                    } else {

                                                        ?>
                                                        <button class="btn btn-outline-dark search2-btn " onclick="addtoWatchlist(<?php echo $pid; ?>);">
                                                            <i id="heart<?php echo $pid; ?>" class="bi bi-heart"></i> Add to Watchlist
                                                        </button>
                                                    <?php

                                                    }



                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="row d-none d-md-flex flex-column align-items-center">
                                                <div class="col-12 d-flex flex-column align-items-center">
                                                    <img src="reso/del-1.webp" class="img-thumbnail border-0 diamentions">
                                                    <h6 class="ms-md-4">Island-Wide Delivery</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 mt-5">
                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a id="review_a" class="nav-link active cursorrr" onclick="revi();" aria-current="page">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a id="desc_a" class="nav-link cursorrr" onclick="desc();">Description</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="desText" class="col-12 mt-5 d-none">
                        <div class="row">
                            <textarea name="" id="" cols="160" rows="20" readonly><?php echo $product_data["description"]; ?></textarea>
                            <hr>
                        </div>
                    </div>

                    <div id="revtext" class="d-block col-12 mt-5">
                        <div class="row">

                            <div class="col-12 mb-4">
                                <h4>Rating & Reviews of <?php echo $product_data["title"]; ?></h4>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <h2 class="text-black">100%</h2>&nbsp;&nbsp;&nbsp;
                                                <span class="text-black-50 mt-2">Postive Feedback</span>
                                            </div>
                                            <div class="col-12 mt-1">

                                                <span style="font-size: 40px;"><i class="bi bi-star-fill text-warning"></i></span>
                                                <span style="font-size: 40px;"><i class="bi bi-star-fill text-warning"></i></span>
                                                <span style="font-size: 40px;"><i class="bi bi-star-fill text-warning"></i></span>
                                                <span style="font-size: 40px;"><i class="bi bi-star-fill text-warning"></i></span>
                                                <span style="font-size: 40px;"><i class="bi bi-star-fill text-warning"></i></span>

                                            </div>

                                            <div class="col-12 mt-2">
                                                <h5 class="fw-normal">1 Ratings</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="row">

                                            <div class="col-12 mb-3">
                                                <div class="row">

                                                    <div class="col-7">
                                                        <div class="row">

                                                            <div class="col-12  d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1 text-end"> <span style="font-size: 20px;">1</span></div>
                                                            </div>

                                                            <div class="col-12  d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1 text-end"> <span style="font-size: 20px;">0</span></div>
                                                            </div>

                                                            <div class="col-12  d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1 text-end"> <span style="font-size: 20px;">0</span></div>
                                                            </div>

                                                            <div class="col-12  d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1 text-end"> <span style="font-size: 20px;">0</span></div>
                                                            </div>

                                                            <div class="col-12  d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-secondary"></i></span></div>
                                                                <div class="col-1 text-end"> <span style="font-size: 20px;">0</span></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <hr>
                                    <div class="col-12 mb-2">
                                        <h3>Product Reviews</h3>
                                    </div>
                                    <hr>

                                </div>
                            </div>


                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-10 d-flex">
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                                <div class="col-1"> <span style="font-size: 20px;"><i class="bi bi-star-fill text-warning"></i></span></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex mt-1">
                                                        <span class="text-black-50">by Janaka </span>&nbsp;&nbsp;&nbsp;
                                                        <span class="text-success fw-bold"><i class="bi bi-plus-circle"></i> Positive</span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12 text-end">
                                                        <span>2023-03-10 13:03:24</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12 mt-2">
                                        <p style="font-size: 18px;">item received in good condition and in time. works well. Have to hold on the button to make changes to date and time. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, nihil facilis? Dolore neque expedita corrupti quasi adipisci quam est dolorum.</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row d-flex justify-content-center">
                                                                            <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 12rem; height: 12rem;">

                                                                                <?php
                                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '27'");
                                                                                $image_num = $image_rs->num_rows;

                                                                                if ($image_num == 0) {
                                                                                ?>
                                                                                    <img src="reso/7.png" class="card-img-top cartimg" alt="...">
                                                                                <?php
                                                                                } else {
                                                                                    $image_data = $image_rs->fetch_assoc();
                                                                                ?>
                                                                                    <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 180px;">
                                                                                <?php
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row d-flex justify-content-center">
                                                                            <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 12rem; height: 12rem;">

                                                                                <?php
                                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '27'");
                                                                                $image_num = $image_rs->num_rows;

                                                                                if ($image_num == 0) {
                                                                                ?>
                                                                                    <img src="reso/7.png" class="card-img-top cartimg" alt="...">
                                                                                <?php
                                                                                } else {
                                                                                    $image_data = $image_rs->fetch_assoc();
                                                                                ?>
                                                                                    <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 180px;">
                                                                                <?php
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row d-flex justify-content-center">
                                                                            <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 12rem; height: 12rem;">

                                                                                <?php
                                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '27'");
                                                                                $image_num = $image_rs->num_rows;

                                                                                if ($image_num == 0) {
                                                                                ?>
                                                                                    <img src="reso/7.png" class="card-img-top cartimg" alt="...">
                                                                                <?php
                                                                                } else {
                                                                                    $image_data = $image_rs->fetch_assoc();
                                                                                ?>
                                                                                    <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 180px;">
                                                                                <?php
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="col-12 text-center text-md-start mt-4 mb-4">
                            <h1 class="col-12 fw-bold text_shadow" style="font-size: 30px;">RELATED PRODUCTS</h1>
                            <hr>
                        </div>
                        <div class="row d-flex justify-content-start justify-content-md-between " id="viewProducts">




                        </div>
                    </div>

                </div>
            </div>


            <?php include "footer.php"; ?>

            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->

        </body>

        </html>
<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}
?>