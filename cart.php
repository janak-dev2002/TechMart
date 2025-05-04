<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart| Cart</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />

    <link rel="icon" href="reso/Logo.png">
</head>

<body>

    <?php include "header2.php";
    require "connection.php";

    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];
        $total = 0;
        $subtotal = 0;
        $shipping = 0;

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
                                <li class="breadcrumb-item active text-black-50" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <div class="col-md-8 col-12 mt-5 shadow">
                    <div class="row">

                        <?php
                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "'");
                        $cart_num = $cart_rs->num_rows;
                        ?>

                        <div class="col-12">
                            <h2>Cart <i class="bi bi-cart4"></i> &nbsp; - (<?php echo $cart_num; ?> Items)</h2>
                        </div>

                        <?php

                        if ($cart_num == 0) {

                        ?>

                            <!-- Empty View -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold">
                                            You have no items in your Cart yet.
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                        <a href="index.php" class="btn btn-outline-info fs-3 fw-bold">
                                            Start Shopping
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Empty View -->

                        <?php
                        } else {

                        ?>

                            <?php
                            for ($x = 0; $x < $cart_num; $x++) {

                                $cart_data = $cart_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $total = $total + ($product_data["price"]) * $cart_data["qty"];

                                $address_rs = Database::search("SELECT `city_id` AS did FROM `user_has_address` INNER JOIN `city` ON 
                                user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id = district.id WHERE 
                                `user_email` = '" . $email . "'");

                                $address_data = $address_rs->fetch_assoc();
                                $ship = 0;

                                if ($address_data["did"] == 6) {
                                    $ship = $product_data["delivery_fee_colombo"];
                                    $shipping = $shipping + $ship;
                                } else {
                                    $ship = $product_data["delivery_fee_other"];
                                    $shipping = $shipping + $ship;
                                }


                            ?>
                                <div class="col-12 d-flex flex-column">
                                    <div class="row">

                                        <div class="ms-md-4 col-md-4 col-12 mt-4 mb-4">
                                            <div class="row d-flex justify-content-center">
                                                <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 18rem; height: 20rem;">

                                                    <?php
                                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "'");
                                                    $image_num = $image_rs->num_rows;

                                                    if ($image_num == 0) {
                                                    ?>
                                                       <img src="reso/7.png" class="card-img-top cartimg" alt="...">
                                                    <?php
                                                    } else {
                                                        $image_data = $image_rs->fetch_assoc();
                                                    ?>
                                                        <a href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'><img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;"></a>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12 flex-column mt-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-8 col-12 text-center text-md-start">
                                                            <a class="text-decoration-none text-dark" href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'><h5 class="text_shadow"><?php echo $product_data["title"]; ?></h5></a>
                                                        </div>
                                                        <div class="col-12 col-md-4 d-flex justify-content-center mt-3 mt-md-0">
                                                            <!-- quantity inc dec -->

                                                            <ul class="pagination justify-content-end set_quantity">
                                                                <li class="page-item">
                                                                    <button class="page-link " onclick="decreaseNumber(<?php echo $product_data['id']; ?>);"><i class="fas fa-minus"></i> </button>
                                                                </li>
                                                                <li class="page-item">
                                                                    <input type="text" name="" class="page-link" disabled min="0" value="<?php echo $cart_data["qty"]; ?>" id="textbox">
                                                                </li>
                                                                <li class="page-item">
                                                                    <button class="page-link" onclick="increaseNumber(<?php echo $product_data['id']; ?>);"> <i class="fas fa-plus"></i></button>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 text-center text-md-start">
                                                    <?php
                                                    $brandM_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `id` = '" . $product_data["brand_has_model_id"] . "'");
                                                    $brandM__data = $brandM_rs->fetch_assoc();

                                                    $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $brandM__data["brand_id"] . "'");
                                                    $brand__data = $brand_rs->fetch_assoc();

                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product_data["condition_id"] . "' ");
                                                    $condition_data = $condition_rs->fetch_assoc();

                                                    $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product_data["color_id"] . "' ");
                                                    $color_data = $color_rs->fetch_assoc();

                                                    ?>
                                                    <h6 class="text-black-50">Brand : <span><?php echo $brand__data["name"]; ?></span></h6>
                                                </div>
                                                <div class="col-12 text-center text-md-start">
                                                    <h6 class="text-black-50">Condition : <span><?php echo $condition_data["name"]; ?></span></h6>
                                                </div>
                                                <div class="col-12 text-center text-md-start">
                                                    <h6 class="text-black-50">Colour : <span><?php echo $color_data["name"]; ?></span></h6>
                                                </div>
                                                <div class="col-12 text-center text-md-start">
                                                    <h6 class="text-danger fw-bold">Delivery Fee : <span>Rs.<?php echo $ship; ?>.00</span></h6>
                                                </div>
                                                <div class="col-12 mt-3 text-center text-md-start">
                                                    <h6 class="text-black">Only <span><?php echo $product_data["qty"]; ?></span> item(s) in stock</h6>
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4  text-center text-md-start">
                                                            <h6 class="text-black-50 remo" onclick="removeFromCart(<?php echo $cart_data['id']; ?>);" style="font-size: 13px;"><i class="bi bi-trash3"></i> REMOVE ITEM</h6>
                                                        </div>

                                                        <!--  -->
                                                        <?php

                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`= '" . $product_data["id"] . "' AND
                                                        `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                        if ($watchlist_num == 1) {

                                                        ?>
                                                            <div class="col-4 text-center text-md-start">
                                                                <h6 onclick="addtoWatchlist(<?php echo $product_data['id']; ?>);" class="text-black-50 watc" style="font-size: 13px;"><i id="heart<?php echo ($product_data["id"]); ?>" class="bi bi-heart-fill text-primary"></i> MOVE TO WATCHLIST</h6>
                                                            </div>
                                                        <?php
                                                        } else {

                                                        ?>
                                                            <div class="col-4 text-center text-md-start">
                                                                <h6 onclick="addtoWatchlist(<?php echo $product_data['id']; ?>);" class="text-black-50 watc" style="font-size: 13px;"><i id="heart<?php echo ($product_data["id"]); ?>" class="bi bi-heart"></i> MOVE TO WATCHLIST</h6>
                                                            </div>
                                                        <?php

                                                        }
                                                        ?>
                                                        <!--  -->

                                                        <div class="col-4 text-center">
                                                            <h6 class="text-black fw-bold" style="font-size: 13px;">Rs. <?php echo ($product_data["price"]) * $cart_data["qty"]; ?>.00</h6>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        $results = mysqli_query(Database::$connection, "SELECT sum(qty) FROM cart WHERE `user_email` = '" . $email . "'");

                        while ($rows = mysqli_fetch_array($results)) {
                            $sub = $rows['sum(qty)'];
                        }
                        ?>

                    </div>
                </div>


                <div class="ms-md-3 col-md-3 col-12 mt-5 shadow" style="height: 650px;">
                    <div class="row d-flex flex-column">
                        <div class="col-12 mt-3">
                            <h4 class="text_shadow">Order Summary</h4>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h6 class="text-black-50" style="font-size: 15px;">Subtotal (<?php echo $sub; ?> items)</h6>
                                </div>
                                <div class="col-5 text-end">
                                    <h6 class="text-black-50 fw-bold" style="font-size: 15px;">Rs. <?php echo $total; ?>.00</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h6 class="text-black-50" style="font-size: 15px;">Shipping Charge</h6>
                                </div>
                                <div class="col-5 text-end">
                                    <h6 class="text-black-50 fw-bold" style="font-size: 15px;">Rs. <?php echo $shipping; ?>.00</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3 ">
                            <hr>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h6 class="text-black-50" style="font-size: 15px;">The total amount of</h6>
                                </div>
                                <div class="col-5 text-end">
                                    <h6 class=" fw-bold text-danger" style="font-size: 15px;">Rs. <span id="grandTot"><?php echo ($total + $shipping);?></span>.00</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-9 mt-3 d-grid">
                            <a href="purchaseCart.php" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">PROCEED TO CHECKOUT</a>
                        </div>

                        <div class="col-12 mt-5 ">
                            <hr>
                        </div>

                        <div class="col-12 mt-2">
                            <h6 class="text-black-50" style="font-size: 15px;">Add a discount code (Optional)</h6>
                        </div>

                        <div class="col-12 mt-2">
                            <input type="text" id="promoText" class="form-control rounded-5" style="height: 30px;">
                        </div>

                        <div class="col-4 mt-3 d-grid">
                            <button onclick="promoChecking();" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">APPLY</button>
                        </div>

                        <div class="col-12 mt-3 ">
                            <hr>
                        </div>

                        <div class="col-12 mt-3">
                            <h5 class="text_shadow">Expected Delivery Date</h5>
                        </div>

                        <div class="col-12 mt-2">
                            <h6 class="text-black-50" style="font-size: 13px;">July 8th 2022 - July 18th 2022</h6>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    <?php

    } else {

        echo "Please Sign In or Register";
    }

    ?>

    <?php include "footer.php"; ?>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>