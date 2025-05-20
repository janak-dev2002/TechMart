<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart| Buy Now</title>

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
                                <li class="breadcrumb-item active text-black-50" aria-current="page">Buy Now</li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <div class="col-md-8 col-12 mt-5 shadow">
                    <div class="row">

                        <div class="col-12">
                            <h2>Buy It Now</h2>
                        </div>

                        <?php

                        $pid = $_GET["pid"];


                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                        $product_data = $product_rs->fetch_assoc();

                        $total = $total + ($product_data["price"]) * $_GET["qty"];

                        $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                                user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id = district.id INNER JOIN `province` ON district.province_id = province.id WHERE 
                                `user_email` = '" . $email . "'");

                        $address_data = $address_rs->fetch_assoc();
                        $ship = 0;

                        if ($address_data["city_id"] == 6) {
                            $ship = $product_data["delivery_fee_colombo"];
                            $shipping = $shipping + $ship;
                        } else {
                            $ship = $product_data["delivery_fee_other"];
                            $shipping = $shipping + $ship;
                        }


                        ?>
                        <div class="col-12 d-flex flex-column">
                            <div class="row">

                                <hr>

                                <div class="col-12 ms-3">
                                    <h6 class="text-black fw-normal" style="font-size: 13px;"> Deliver To: <?php echo $_SESSION["u"]["fname"]; ?> <?php echo $_SESSION["u"]["lname"] ?></h6>
                                    <label class="form-label cursorrr border-0 text-center" style="height: 20px; width: 50px; background-color: rgba(0,119,135,.08); font-size: 12px; color: #007787;">HOME</label>
                                    <span class="text-black fw-normal" style="font-size: 13px;"><?php echo $_SESSION["u"]["mobile"] ?></span>
                                    <h6 class="text-black fw-normal" style="font-size: 13px;"><?php echo $address_data["line1"]; ?> <?php echo $address_data["line2"]; ?> <?php echo "," . $address_data["city_name"]; ?>, <?php echo $address_data["name"]; ?> <a href="userProfile.php" class="text-info text-decoration-none" style="font-size: 11px;">&nbsp; Change</a></h6>
                                    <h6 class="text-black fw-normal" style="font-size: 13px;">Bill to the same address</h6>
                                    <h6 class="text-black fw-normal" style="font-size: 13px;">Email to &nbsp;&nbsp;&nbsp;<?php echo $_SESSION["u"]["email"]; ?><span class="text-info cursorrr" style="font-size: 11px;">&nbsp; Change</span></h6>


                                </div>

                                <hr>

                                <div class="ms-md-4 col-md-4 col-12 mt-4 mb-4">
                                    <div class="row d-flex justify-content-center">
                                        <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 18rem; height: 15rem;">

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
                                                <div class="col-12 text-center text-md-start">
                                                    <a class="text-decoration-none text-dark" href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'>
                                                        <h5 class="text_shadow"><?php echo $product_data["title"]; ?></h5>
                                                    </a>
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
                                            <h6 class="text-black">Only <span><?php echo $product_data["qty"]; ?></span> item(s) in stock</h6>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-2  text-center text-md-start">
                                                    <h6 class="text-black-50" style="font-size: 13px;"> QTY : <?php echo $_GET["qty"]; ?></h6>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <h6 class="text-black" style="font-size: 13px;">PRICE : Rs. <?php echo ($product_data["price"]) * $_GET["qty"]; ?>.00</h6>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <h6 class="text-danger" style="font-size: 13px;"><i class="bi bi-truck"></i> DELIVERY : Rs.<?php echo $ship; ?>.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <hr>
                                    <div id="card_container"></div>
                                </div>

                            </div>
                        </div>

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
                                    <h6 class="text-black-50" style="font-size: 15px;">Items Total (<?php echo $_GET["qty"]; ?> items)</h6>
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
                                    <h6 class=" fw-bold text-danger" style="font-size: 15px;">Rs. <span id="grandTot"><?php echo ($total + $shipping); ?></span>.00</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-9 mt-3 d-grid">
                            <button onclick="payNow(<?php echo $pid;?>,<?php echo $_GET['qty'];?>,0);" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">PROCEED TO CHECKOUT</button>
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


    <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>