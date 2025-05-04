<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Teach | Watchlist</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">
</head>

<body>

    <?php include "header2.php";
    require "connection.php";

    if (isset($_SESSION["u"])) {


    ?>
        <div class="container py-5">
            <div class="row">

                <div class="col-12">
                    <div class="row d-md-flex align-items-center justify-content-center mb-2 mt-2 ">

                        <div class="col-12 col-md-1 d-md-block d-flex justify-content-center mb-5 mb-md-0 ">
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

                <div class="col-md-12 col-12 mt-1 ">
                    <div class="row clr-bg d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                                <li class="breadcrumb-item active text-black-50" aria-current="page">Watchlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <h2 class="fs-1 text_shadow fw-bold">Watchlist</h2>
                </div>

                <div class="col-12 mt-1">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2 d-none col-5 d-md-grid">
                            <button onclick="removeSelectedWatchlist();" 
                            class="btn btn-outline-dark btn-danger btnclrwatch text-center text-decoration-none" style="font-size: 16px;">DELETE</button>
                        </div>
                        <!-- <div class="offset-md-5 col-md-2 col-12 mt-4 mt-md-0">
                            <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-5" id="s">
                                <option value="0">All Categories</option>
                                <option value="1">PRICE HIGH TO LOW</option>
                                <option value="2">PRICE LOW TO HIGH</option>
                                <option value="3">QUANTITY HIGH TO LOW</option>
                                <option value="4">QUANTITY LOW TO HIGH</option>
                            </select>
                        </div> -->
                        <!-- <div class="offset-md-8 col-md-2 col-12 mt-4 mt-md-0">
                            <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-5" id="s">
                                <option value="0">SORT BY</option>
                                <option value="1">PRICE HIGH TO LOW</option>
                                <option value="2">PRICE LOW TO HIGH</option>
                                <option value="3">QUANTITY HIGH TO LOW</option>
                                <option value="4">QUANTITY LOW TO HIGH</option>
                            </select>
                        </div> -->
                    </div>
                </div>

                <div class="col-12 mt-5 ">
                    <div class="row d-flex flex-column" id="viewPortWatchlist">


                        <?php

                        $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                        $watch_num = $watch_rs->num_rows;

                        if ($watch_num == 0) {

                        ?>
                            <!-- empty view -->
                            <div class="col-12 mt-5">
                                <div class="row">
                                    <hr>
                                    <div class="col-12 emptyView"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                        <a href="index.php" class="btn clr-bg fs-3 fw-bold">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                            <!-- empty view -->
                            <?php
                        } else {

                            for ($x = 0; $x < $watch_num; $x++) {

                                $watch_data = $watch_rs->fetch_assoc();

                            ?>
                                <!-- Card---------------------------------------------- -->

                                <div class="col-12 mb-4">
                                    <div class="row d-flex">
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="row d-flex ">

                                                <div class="col-11">
                                                    <div class="row justify-content-md-end justify-content-center">
                                                        <div class="col-1 d-md-flex flex-column form-check justify-content-center d-none">
                                                            <input onclick="numRowsItems(<?php echo $watch_num; ?>);" class="checks form-check-input" type="checkbox" value="<?php echo $watch_data["id"]; ?>"
                                                             id="">
                                                        </div>
                                                        <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 16rem; height: 16rem;">

                                                            <?php
                                                            $img = array();

                                                            $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watch_data["product_id"] . "'");
                                                            $images_data = $images_rs->fetch_assoc();

                                                            ?>

                                                            <img src="<?php echo $images_data["code"]; ?>" class="card-img-top cartimg" alt="...">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <?php
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $watch_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();
                                        ?>

                                        <div class="col-md-3 col-12 border-end">
                                            <div class="row d-flex flex-column align-items-center align-items-md-start">
                                                <div class="col-12 mt-2">
                                                    <h5 class="text_shadow text-center text-md-start"><?php echo $product_data["title"]; ?></h5>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-12 text-center text-md-start">
                                                        <?php
                                                        $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product_data["condition_id"] . "'");
                                                        $condition__data = $condition_rs->fetch_assoc();
                                                        ?>
                                                        <h6 class="text-black-50">Condition : <span><?php echo $condition__data["name"]; ?></span></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center text-md-start">
                                                        <?php
                                                        $brandM_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `id` = '" . $product_data["brand_has_model_id"] . "'");
                                                        $brandM__data = $brandM_rs->fetch_assoc();

                                                        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $brandM__data["brand_id"] . "'");
                                                        $brand__data = $brand_rs->fetch_assoc();
                                                        ?>
                                                        <h6 class="text-black-50">Brand : <span><?php echo $brand__data["name"]; ?></span></h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center text-md-start">
                                                        <h6 class="text-black">Only <span><?php echo $product_data["qty"]; ?></span> item(s) in stock</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12 text-center text-md-start">
                                                        <div class="row d-flex flex-row align-items-center">

                                                            <div class="col-12" style="font-size: 13px;">
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                            </div>
                                                            <div class="col-12 mt-2 text-center text-md-start">
                                                                <h4 class="text-black" style="font-size: 13px;">4.5 Stars | 39 Reviews & Ratings</h4>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-3 col-12 border-end">

                                            <?php

                                            $price = $product_data["price"]; 
                                            $adding_price = ($price / 100) * 5;
                                            $new_price = $price + $adding_price;
                                            $difference = $new_price - $price;
                                            $percentage = ($difference / $price) * 100;

                                            ?>

                                            <div class="row d-flex flex-column align-items-center">
                                                <div class="row">
                                                    <div class="col-12 mt-2 text-center text-md-start">
                                                        <h6 class="text-black-50">Item Price :</h6>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-12 text-center text-md-start">
                                                        <span class="fs-3 fw-bold text-dark">Rs. <?php echo $price; ?> .00</span>
                                                    </div>
                                                    <div class="col-12 text-center text-md-start">
                                                        <span class="fs-5 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                    </div>
                                                    <div class="col-12 text-center text-md-start">
                                                        <span class="fs-5 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00 &nbsp;|&nbsp; (<?php echo $percentage; ?>%)</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12 mt-4">
                                            <div class="row d-flex flex-column align-items-center ">
                                                <div class="row mt-4">
                                                    <div class="col-10 offset-1 d-grid">
                                                        <a href='<?php echo "productView.php?id=" . $watch_data["product_id"]; ?>' class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;"><i class="bi bi-bag"></i> Buy It Now</a>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-10 offset-1 d-grid">
                                                        <button onclick="addtoCart(<?php echo $watch_data['product_id']; ?>);" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;"><i class="bi bi-cart4"></i> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mb-4">
                                                    <div class="col-10 offset-1 d-grid">
                                                        <button onclick="removeFromWatchlist(<?php echo $watch_data['id']; ?>);" class="btn btn-outline-dark btn-danger btnclrwatch text-center text-decoration-none" style="font-size: 16px;"><i class="bi bi-trash"></i> Remove Item</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card---------------------------------------------- -->
                            <?php
                            }

                            ?>

                        <?php

                        }
                        ?>


                    </div>
                </div>

            </div>
        </div>
    <?php


    } else {
        header("Location:index.php");
    }
    ?>


    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>