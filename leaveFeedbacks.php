<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart| Leave Feedback</title>

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
                                <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="purchaseHistory.php">Purchase History</a></li>
                                <li class="breadcrumb-item active text-black-50" aria-current="page">Leave Feedback</li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <div class="col-12 mt-5">
                    <h2 class="fs-1 text_shadow fw-bold">Leave Feedback</h2>
                    <hr>
                </div>

                <div class="col-12 shadow">
                    <div class="row p-3">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>MSI KATANA GF66-11SC CoRE i5|11GN|16GB</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <span class="text-black-50 fw-bold">Order Id #ITM-7-91282</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                                <div class="col-6">
                                    <div class="row">

                                        <div class="col-12 mt-2">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="card border-0 shadow d-flex justify-content-center align-items-center" style="width: 17rem; height: 17rem;">

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
                                                                        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 250px;">
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-6 border-end">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div class="row g-1 py-2">

                                                                <span>Item Condition : Brandnew</span>
                                                                <span>Item Brand : MSI</span>
                                                                <span>Shipping : Rs:1400.00</span>
                                                                <span class="text-black fw-bold">Only 5 item(s) in stock</span>

                                                                <div class="col-12 mt-3">
                                                                    <div class="col-12">
                                                                        <span class="fs-3 fw-bold text-dark">Rs. 356000 .00</span>
                                                                    </div>

                                                                    <span class="fs-5 fw-bold text-danger text-decoration-line-through">Rs. 4074663 .00</span> <br>
                                                                    <span class="fs-5 fw-bold text-black-50">Save Rs. 19400 .00 | (5%)</span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row g-1 p-3">

                                                <span>Payment Date : <span class="fw-bold">2023-03-09 15:49:25</span></span>
                                                <span>Estimate Delivery : <span class="fw-bold">Between 4 - 16 Days</span></span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <div class="col-12">
                            <div class="row g-1">

                                <div class="col-12">
                                    <h5>Rate this transaction</h5>
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                        <label class="form-check-label" for="inlineRadio1">Postive</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Neutral</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Negative</label>
                                    </div>
                                </div>
                            </div>
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