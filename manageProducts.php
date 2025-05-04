<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart | Manage Product</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php

            session_start();
            require "connection.php";

            if (isset($_SESSION["au"])) {

                $email = $_SESSION["au"]["email"];
                $fname = $_SESSION["au"]["fname"];
                $lname = $_SESSION["au"]["lname"];

            ?>



                <div class="col-12 p-3 shadow rounded-5">
                    <div class="row">

                        <div class="col-md-4 col-12 border-end">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-2 col-12 d-flex d-md-block justify-content-center">
                                            <img src="reso/user.svg" height="60px" width="60px" class="rounded-circle" />
                                        </div>
                                        <div class="col-md-8 col-12 mt-2">
                                            <div class="row ">
                                                <div class="col-12 text-center text-md-start">
                                                    <h5><?php echo $fname . " " . $lname; ?><span class="text-black-50 fs-6">(Admin)</span></h5>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-black-50 text-center text-md-start"><?php echo $email; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 border-end">
                            <div class="row ">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="row">
                                        <h2 class="text_shadow">Manage Products</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-6 col-12 d-grid offset-md-6">
                                            <a href="productRegister.php" class="btn btn-outline-dark clr-bg rounded-5 border-0" style="height: 40px;">Add Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------------/////////////////////////////////////////////////////////////////////////////////----------------------------------------------------------------------- -->

                <div class="col-lg-2 col-12 mt-5">
                    <div class="row p-3">

                        <div class="col-12">
                            <div class="row d-flex flex-column">

                                <h3 class="text_shadow text-black">Sort Product</h3>
                                <hr>


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" placeholder="Search" class="form-control rounded-5" id="s">
                                        </div>
                                        <div class="col-2">
                                            <span class="fs-3"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Brand--------------------------------------- -->

                                <h6 class="mt-4">Active time</h6>
                                <hr>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault" id="new">
                                                <label style="font-size: 15px;" class="form-check-label" for="new">
                                                    Newest to Oldest
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault" id="old">
                                                <label style="font-size: 15px;" class="form-check-label" for="old">
                                                    Oldest to Newest
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Brand--------------------------------------- -->

                                <h6 class="mt-4">By Quantity</h6>
                                <hr>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault1" id="H">
                                                <label style="font-size: 15px;" class="form-check-label" for="H">
                                                    High to Low
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault1" id="L">
                                                <label style="font-size: 15px;" class="form-check-label" for="L">
                                                    Low to High
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mt-4">By Condition</h6>
                                <hr>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault2" id="B">
                                                <label style="font-size: 15px;" class="form-check-label" for="B">
                                                    Brandnew
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input style="font-size: 15px;" class="form-check-input" type="radio" name="flexRadioDefault2" id="U">
                                                <label style="font-size: 15px;" class="form-check-label" for="U">
                                                    Used
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">

                                    <h5 class="text-black-50 mt-5"><b class="text-black">Price</b></h5>
                                    <hr>

                                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                    <label style="font-size: 15px;" for="customRange2" class="form-label">Price: &nbsp; <label>Rs. 25000</label></label>
                                </div>



                                <div class="col-12 mt-4">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button href="" class="btn btn-outline-dark btn-success text-white rounded-5 border-0" 
                                                            style="height: 40px;" onclick="sort(0);">Sort</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button href="" class="btn btn-outline-dark clr-bg rounded-5 border-0" style="height: 40px;"
                                                             onclick="clearSort();">Clear</button>
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



                <!-- Product View -->

                <div class="col-lg-9 offset-1 col-10 mt-5">
                    <div class="row" id="sortview">


                        <div class="col-12">
                            <div class="row px-lg-5 d-flex justify-content-between">



                                <?php

                                if (isset($_GET["page"])) {

                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `admin_email` = '" . $email . "'");
                                $product_num = $product_rs->num_rows;


                                $results_per_page = 6;
                                $number_of_pages = ceil($product_num / $results_per_page);

                                $page_results = ($pageno - 1) * $results_per_page;

                                $selected_rs = Database::search("SELECT * FROM `product` WHERE `admin_email` = '" . $email . "'
                                        LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                $selected_num = $selected_rs->num_rows;

                                if ($selected_num == 0) {

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
                                                <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                                    Start Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Empty View -->
                                    <?php
                                } else {



                                    for ($x = 0; $x < $selected_num; $x++) {

                                        $selected_data = $selected_rs->fetch_assoc();

                                    ?>


                                        <!-- Card---------///////////////////////////////////////////////////////////// -->

                                        <div class="col-md-5 col-12 mt-5 shadow rounded-5 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-4 col-12 ">
                                                            <div class="row">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class=" border-0" style="width: 10rem; height: 12rem;">
                                                                        <?php

                                                                        $product_img_rs = Database::search("SELECT * FROM  `images` WHERE `product_id` = '" . $selected_data["id"] . "'");
                                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                                        ?>
                                                                        <img src="<?php echo $product_img_data["code"]; ?>" class="card-img-top cartimg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 offset-md-1 col-12 p-3">
                                                            <div class="row">
                                                                <div class="col-12 ms-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h6 class="text_shadow"><?php echo $selected_data["title"]; ?></h6>
                                                                        </div>
                                                                        <div class="col-12 mt-1">
                                                                            <h6 style="font-size: 14px;" class="text-black-50">Item Price : <span>Rs. <?php echo $selected_data["price"]; ?>.00</span></h6>
                                                                        </div>
                                                                        <div class="col-12 mt-1">
                                                                            <h6 style="font-size: 14px;" class="text-black-50"><?php echo $selected_data["qty"]; ?> item(s) Left</h6>
                                                                        </div>
                                                                        <div class="col-11 d-flex mt-1">
                                                                            <label style="font-size: 15px;" class="form-check-label fw-bold clr" for="fd<?php echo ($selected_data["id"]); ?>">Make your product <?php if ($selected_data["status_id"] == 2) {
                                                                                                                                                                                                                        echo "Deactivate";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "Activate";
                                                                                                                                                                                                                    } ?>
                                                                            </label>

                                                                            <div class="col-1 d-flex justify-content-end form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo ($selected_data["id"]); ?>" <?php if ($selected_data["status_id"] == 2) { ?>checked<?php } ?> onclick="changeStatus(<?php echo ($selected_data['id']); ?>)">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row me-3">
                                                                                <div class="col-6 d-grid">
                                                                                    <a onclick="sendId(<?php echo $selected_data['id']; ?>);" class="btn btn-outline-dark clr-bg rounded-5 border-0" style="height: 33px;">Update</a>
                                                                                </div>
                                                                                <div class="col-6 d-grid">
                                                                                    <a onclick="removeItem(<?php echo $selected_data['id']; ?>);" class="btn btn-outline-dark btn-danger rounded-5 border-0" style="height: 33px;">Remove</a>
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

                                <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>

                        <div class="col-11 mt-3">
                            <div class="row d-flex justify-content-center ">

                                <div class="col-12 mt-3 d-flex justify-content-center">
                                    <div class="row">
                                        <div class="col-md-4 offset-md-8">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-lg justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                        echo ("#");
                                                                                    } else {
                                                                                        echo ("?page=" . ($pageno - 1));
                                                                                    } ?>" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>

                                                    <?php

                                                    for ($x = 1; $x <= $number_of_pages; $x++) {

                                                        if ($x == $pageno) {

                                                    ?>
                                                            <li class="page-item active">
                                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                            </li>
                                                        <?php
                                                        } else {

                                                        ?>
                                                            <li class="page-item">
                                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                            </li>
                                                    <?php
                                                        }
                                                    }

                                                    ?>

                                                    <li class="page-item">
                                                        <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                                        echo ("#");
                                                                                    } else {
                                                                                        echo ("?page=" . ($pageno + 1));
                                                                                    } ?>" aria-label="Next">
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

                    </div>
                </div>

                <!-- Product View -->




            <?php
            } else {

                header("Location:adminLogin.php");
            }

            ?>


        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>