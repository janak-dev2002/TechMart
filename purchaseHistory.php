<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeachMart | Purchase History</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">
</head>

<body>

    <?php include "header2.php";
    require "connection.php";

    if (isset($_SESSION["u"])) {

        $emai = $_SESSION["u"]["email"];

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $emai . "'");
        $invoice_num = $invoice_rs->num_rows;



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
                                <li class="breadcrumb-item active text-black-50" aria-current="page">Purchase History</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <h2 class="fs-1 text_shadow fw-bold">Purchase History</h2>
                </div>


                <?php

                if ($invoice_num == 0) {

                ?>
                    <!-- empty view -->
                    <div class="col-12 mt-5">
                        <div class="row">
                            <hr>
                            <div class="col-12 emptyView"></div>
                            <div class="col-12 text-center">
                                <label class="form-label fs-1 fw-bold">You have no items in your Purchase History</label>
                            </div>
                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                <a href="index.php" class="btn clr-bg fs-3 fw-bold">Start Shopping</a>
                            </div>
                        </div>
                    </div>
                    <!-- empty view -->
                <?php

                } else {
                ?>

                    <div class="col-12 mt-5 mb-5">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4 col-12">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-5 offset-1 offset-md-0">
                                        <h6 class="text-black-50">See order from :</h6>
                                    </div>
                                    <div class="col-md-7 col-5 justify-content-start">
                                        <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-4" style="height: 30px; font-size: 14px;">
                                            <option value="0">Last 60 Days</option>
                                            <option value="1">2022</option>
                                            <option value="2">2021</option>
                                            <option value="3">2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-4 mt-md-0">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-5 offset-1 offset-md-0 text-md-center">
                                        <h6 class="text-black-50">Filter by :</h6>
                                    </div>
                                    <div class="col-md-7 col-5 justify-content-start">
                                        <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-4" style="height: 30px; font-size: 14px;">
                                            <option value="0">All</option>
                                            <option value="1">Shipped</option>
                                            <option value="2">Ready for feedback</option>
                                            <option value="3">To receive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mt-4 mt-md-0">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-5 col-5 offset-1 offset-md-0 text-md-center">
                                        <h6 class="text-black-50">To Invoice :</h6>
                                    </div>
                                    <div class="col-md-7 col-5 justify-content-start">
                                        <div class="col-12 d-grid">
                                            <a href="invoice.php" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">INVOICE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4 d-none d-md-block">
                        <div class="row d-flex">

                            <div class="col-1 text-center">
                                <h6 class="text-black">Order No</h6>
                            </div>

                            <div class="col-4">
                                <h6 class="text-black">Order details</h6>
                            </div>

                            <div class="col-1 text-center">
                                <h6 class="text-black">Qty</h6>
                            </div>

                            <div class="col-2 text-center">
                                <h6 class="text-black">Ammount</h6>
                            </div>

                            <div class="col-2">
                                <h6 class="text-black text-center">Purchase Date & Time</h6>
                            </div>

                            <div class="col-2">

                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                        </div>
                    </div>



                    <div class="col-12 d-none d-md-block">
                        <div class="row">

                            <?php

                            for ($x = 0; $x < $invoice_num; $x++) {

                                $invoice_data = $invoice_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $invoice_data["product_id"] . "'");
                                $image_data = $product_img_rs->fetch_assoc();

                                $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product_data["condition_id"] . "'");
                                $condition_data = $condition_rs->fetch_assoc();

                                $miniCat_rs = Database::search("SELECT * FROM `mini_category` WHERE `id` = '" . $product_data["mini_category_id"] . "'");
                                $miniCat_data = $miniCat_rs->fetch_assoc();

                                $brandhasmodel_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `id` = '" . $product_data["brand_has_model_id"] . "'");
                                $brandhasmodel_data = $brandhasmodel_rs->fetch_assoc();

                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $brandhasmodel_data["brand_id"] . "'");
                                $brand_data = $brand_rs->fetch_assoc();



                            ?>

                                <div class="col-12">
                                    <div class="row d-flex">
                                        <div class="col-1 border-end d-flex flex-column justify-content-center">
                                            <div class="col-12">
                                                <div class="row text-center">
                                                    <h6><?php echo $x + 1; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 border-end">
                                            <div class="row d-flex">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="row">
                                                                <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 10rem; height: 10rem;">
                                                                    <a href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'><img src="<?php echo $image_data["code"]; ?>" class="card-img-top cartimg" alt="..."></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="row d-flex flex-column">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a class="text-decoration-none text-dark" href='<?php echo "productView.php?id=" . $product_data["id"]; ?>'>
                                                                            <h6 style="font-size: 14px;" class="text_shadow text-center text-md-start"><?php echo $product_data["title"]; ?></h6>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h6 style="font-size: 14px;" class="text-black-50">Condition : <span><?php echo $condition_data["name"]; ?></span></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h6 style="font-size: 14px;" class="text-black-50">Brand : <span><?php echo $brand_data["name"]; ?></span></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h6 style="font-size: 14px;" class="text-black-50">Order : <span>#<?php echo $invoice_data["order_id"]; ?></span></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h6 style="font-size: 14px;" class="text-black">Item Price : <span>Rs.<?php echo $product_data["price"]; ?>.00</span></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-1 border-end d-flex flex-column justify-content-center">
                                            <div class="col-12">
                                                <div class="row text-center">
                                                    <h6><?php echo $invoice_data["qty"]; ?></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 border-end d-flex flex-column justify-content-center">
                                            <div class="col-12">
                                                <div class="row text-center">
                                                    <h6>Rs.<?php echo $invoice_data["total"]; ?>.00</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 border-end d-flex flex-column justify-content-center">
                                            <div class="offset-1 col-10">
                                                <div class="col-12">
                                                    <div class="row d-flex justify-content-end">
                                                        <div class="col-12 mb-3">
                                                            <div class="row">
                                                                <h6><?php echo $invoice_data["date"]; ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label cursorrr border-0 rounded-5 text-center text-white" style="height: 25px; width: 160px; background-color: #1eb375;">Track My Order</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 border-end d-flex flex-column justify-content-center">
                                            <div class="offset-1 col-10">
                                                <div class="row text-center">
                                                    <div class="col-12 text-center mb-3">
                                                        <div class="row">
                                                            <button class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;"  onclick="addFeedback(<?php echo $invoice_data['product_id']; ?>);"><i class="bi bi-info-circle"></i> feedback</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <div class="row">
                                                            <button onclick="reomovePurchaseHistory('<?php echo $invoice_data['id']; ?>');" class="btn btn-outline-dark btn-danger btnclrwatch text-center text-decoration-none" style="font-size: 13px;"><i class="bi bi-trash"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- modal -->
                                        <div class="modal" tabindex="-1" id="feedbackModal<?php echo $invoice_data["product_id"]; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add New Feedback</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label class="form-label fw-bold">Type</label>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="type" id="type1">
                                                                                <label class="form-check-label text-success fw-bold" for="type1">
                                                                                    Positive
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="type" id="type2" checked>
                                                                                <label class="form-check-label text-warning fw-bold" for="type2">
                                                                                    Neutral
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="type" id="type3">
                                                                                <label class="form-check-label text-danger fw-bold" for="type3">
                                                                                    Negative
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label class="form-label fw-bold">User's email</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="text" class="form-control" value="<?php echo $_SESSION["u"]["email"]; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label class="form-label fw-bold">Feedback</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <textarea cols="50" rows="8" class="form-control" id="feed"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" onclick="saveFeedback(<?php echo $invoice_data['product_id']; ?>);">Save Feedback</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->


                                        <div class="col-12">
                                            <hr>
                                        </div>

                                    </div>
                                </div>


                            <?php
                            }

                            ?>

                        </div>
                    </div>

                    <div class="col-12 d-block d-md-none">
                        <div class="row">

                            <?php

                            $invoice_rs1 = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $emai . "'");
                            $invoice_num1 = $invoice_rs1->num_rows;


                            for ($y = 0; $y < $invoice_num1; $y++) {

                                $invoice_data1 = $invoice_rs1->fetch_assoc();

                                $product_rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data1["product_id"] . "'");
                                $product_data1 = $product_rs1->fetch_assoc();

                                $product_img_rs1 = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $invoice_data1["product_id"] . "'");
                                $image_data1 = $product_img_rs1->fetch_assoc();

                                $condition_rs1 = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product_data1["condition_id"] . "'");
                                $condition_data1 = $condition_rs1->fetch_assoc();

                                $miniCat_rs1 = Database::search("SELECT * FROM `mini_category` WHERE `id` = '" . $product_data1["mini_category_id"] . "'");
                                $miniCat_data1 = $miniCat_rs1->fetch_assoc();

                                $brand_rs1 = Database::search("SELECT * FROM `brand` WHERE `mini_category_id` = '" . $miniCat_data1["id"] . "'");
                                $brand_data1 = $brand_rs1->fetch_assoc();

                            ?>

                                <div class="col-12 shadow mb-3">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-4 border-end">
                                                    <h6 class="text-black">Order No : <span><?php echo $y + 1; ?></span></h6>
                                                </div>
                                                <div class="col-8">
                                                    <h6 class="text-black">Order Id : <span>#<?php echo $invoice_data1["order_id"]; ?></span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <h6 class="text-black-50" style="font-size: 14px;"><?php echo $invoice_data1["date"]; ?></h6>
                                        </div>
                                        <hr>

                                        <div class="col-12 mb-3">
                                            <div class="row d-flex p-1">
                                                <div class="col-8 border-end">
                                                    <div class="row d-flex">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="ms-1 card border-0 shadow d-flex justify-content-center align-items-center" style="width: 8rem; height: 8rem;">
                                                                            <img src="<?php echo $image_data1["code"]; ?>" class="card-img-top cartimg" alt="...">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row d-flex flex-column">

                                                                        <div class="col-12">
                                                                            <h6 style="font-size: 12px;" class="text_shadow text-md-start"><?php echo $product_data1["title"]; ?></h6>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h6 style="font-size: 14px;" class="text-black-50">Brand : <span><?php echo $brand_data1["name"]; ?></span></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h6 style="font-size: 14px;" class="text-black-50">Condition : <span><?php echo $condition_data1["name"]; ?></span></h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row d-flex flex-column">
                                                        <div class="col-12">
                                                            <h6 style="font-size: 14px;" class="text-black-50">Qty : <span><?php echo $invoice_data1["qty"]; ?> items</span></h6>
                                                        </div>

                                                        <div class="col-12">
                                                            <h6 style="font-size: 14px;" class="text-black-50">Total : <span>Rs.<?php echo $invoice_data1["total"]; ?>.00</span></h6>
                                                        </div>

                                                        <div class="col-12 mt-1 d-grid">
                                                            <a href="" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 13px;"><i class="bi bi-info-circle"></i> feedback</a>
                                                        </div>

                                                        <div class="col-12 mt-1 d-grid ">
                                                            <button onclick="reomovePurchaseHistory('<?php echo $invoice_data1['id']; ?>');" class="btn btn-outline-dark btn-danger btnclrwatch text-center text-decoration-none" style="font-size: 13px;"><i class="bi bi-trash"></i> Remove</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            <?php
                            }

                            ?>

                        </div>
                    </div>

                <?php
                }

                ?>

            </div>
        </div>

        <?php include "footer.php"; ?>

    <?php

    } else {

        header("location:index.php");
    }
    ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>