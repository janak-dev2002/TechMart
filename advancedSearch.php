<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart | Advanced Search</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

</head>

<body>

    <?php include "header2.php";
    require "connection.php";
    ?>

    <div class="container py-5">
        <div class="row">


            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-6">
                        <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                    </div>
                    <div class="col-6 d-flex align-items-end justify-content-end">
                        <h2>Advanced Search</h2>
                    </div>
                </div>
            </div>

            <div class="col-12  shadow rounded-5 mt-4 mb-4 p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-10 col-12">
                                <input id="t" class="d-grid form-control search-form-input border-start-0" type="search" placeholder="Search">
                            </div>
                            <div class="col-md-2 col-12 d-grid d-md-flex justify-content-md-end mt-3 mt-md-0">
                                <button class="btn btn-outline-dark search-btn " type="submit">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="row d-flex justify-content-between">

                            <div class="col-md-4 col-12">
                                <select class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="category" onchange="loadSub();">
                                    <option value="0">Select Main Category</option>
                                    <?php

                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;
                                    for ($x = 0; $x < $category_num; $x++) {

                                        $category_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]); ?></option>
                                    <?php

                                    }


                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 col-12 mt-3 mt-md-0">
                                <select class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="subcategory" onclick="loadmini();">
                                    <option value="0">Select Sub Category</option>
                                    <?php

                                    $sub_rs = Database::search("SELECT * FROM `sub_category`");
                                    $sub_num = $sub_rs->num_rows;
                                    for ($x = 0; $x < $sub_num; $x++) {

                                        $sub_data = $sub_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($sub_data["id"]); ?>"><?php echo ($sub_data["sub_name"]); ?></option>
                                    <?php

                                    }


                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 col-12 mt-3 mt-md-0">
                                <select class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="miniCategory" >
                                    <option value="0">Select Product Category</option>
                                    <?php

                                    $mini_rs = Database::search("SELECT * FROM `mini_category`");
                                    $mini_num = $mini_rs->num_rows;
                                    for ($x = 0; $x < $mini_num; $x++) {

                                        $mini_data = $mini_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($mini_data["id"]); ?>"><?php echo ($mini_data["mini_name"]); ?></option>
                                    <?php

                                    }


                                    ?>

                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-4 col-12 mt-3 ">
                                <select class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="brand" >
                                    <option value="0">Select Brand</option>
                                    <?php

                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_num = $brand_rs->num_rows;
                                    for ($x = 0; $x < $brand_num; $x++) {

                                        $brand_data = $brand_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($brand_data["id"]); ?>"><?php echo ($brand_data["name"]); ?></option>
                                    <?php

                                    }


                                    ?>

                                </select>
                            </div>

                            <div class="col-md-4 col-12 mt-3 ">
                                <select class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="modal">
                                    <option value="0">Select Model</option>
                                    <?php

                                    $modal_rs = Database::search("SELECT * FROM `model`");
                                    $modal_num = $modal_rs->num_rows;
                                    for ($x = 0; $x < $modal_num; $x++) {

                                        $modal_data = $modal_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($modal_data["id"]); ?>"><?php echo ($modal_data["name"]); ?></option>
                                    <?php

                                    }


                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row">

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <h5>Product Condition</h5>
                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="B" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Brandnew</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="U" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Used</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <h5>Product Colour</h5>
                                    </div>
                                    <div class="col-6 offset-1">
                                        <select id="clr" class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;">
                                            <option value="0">Select Colour</option>


                                            <?php

                                            $color_rs = Database::search("SELECT * FROM `color`");
                                            $color_num = $color_rs->num_rows;

                                            for ($y = 0; $y < $color_num; $y++) {
                                                $color_data = $color_rs->fetch_assoc();

                                            ?>
                                                <option value="<?php echo ($color_data["id"]); ?>"><?php echo ($color_data["name"]); ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="row d-flex align-items-center">

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                <h5 class="">Price form</h5>
                                            </div>
                                            <div class="col-8">
                                                <input id="pf" class="d-grid form-control search-form-input border-start-0" type="search" placeholder="Rs.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <h5 class="">Price to</h5>
                                            </div>
                                            <div class="col-8">
                                                <input id="pt" class="d-grid form-control search-form-input border-start-0" type="search" placeholder="Rs.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <h5>Sort</h5>
                                    </div>
                                    <div class="col-8 ">
                                        <select class="form-select border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none" id="s">
                                            <option value="0">SORT BY</option>
                                            <option value="1">PRICE HIGH TO LOW</option>
                                            <option value="2">PRICE LOW TO HIGH</option>
                                            <option value="3">QUANTITY HIGH TO LOW</option>
                                            <option value="4">QUANTITY LOW TO HIGH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-md-3 col-12 d-grid">
                                <button onclick="advancedSearch(0);" class="btn btn-outline-dark search-btn " type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 shadow rounded-5">
                <div class="row">

                    <div class="offset-lg-1 col-12 col-lg-10 bg-body rounded mb-2">
                        <div class="row">


                            <div class="col-12">
                                <div class="row" style="justify-content:center; column-gap: 90px;" id="view_area">

                                    <div class="col-11 mt-5 text-center">
                                        <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span>
                                    </div>
                                    <div class="col-12 text-center mt-3 mb-5">
                                        <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>