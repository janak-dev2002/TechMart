<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech | Product Listning</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">
</head>

<body>

    <?php include "header2.php";
    require "connection.php";
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
                                <div class="col-lg-10 col-10  offset-lg-0">
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

    <div class="container-fluid">
        <div class="row">
            <div class=" d-none d-md-flex offset-1 col-10 headbanner justify-content-start mb-5 ">
                <div class="col-4 d-flex flex-column justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-5"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active text-white fs-5" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                    <div class="col-12">
                        <h3 class="text-white fw-bold text-uppercase"><?php
                                                                        if (isset($_SESSION["selectCat"])) {


                                                                            if ($_SESSION["selectCat"] == 0) {

                                                                                echo "gfdfgdf ";
                                                                            } else {

                                                                                $cate_rs = Database::search("SELECT * FROM `mini_category` WHERE `id` = '" . $_SESSION["selectCat"] . "'");
                                                                                $cate_data = $cate_rs->fetch_assoc();

                                                                                echo $cate_data["mini_name"];
                                                                            }
                                                                        }
                                                                        ?></h3>
                    </div>
                </div>

                <div class="col-8 d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8 text-center">
                                <h1 style="font-size: 60px;" class="text-black text_shadow">SHOP</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <nav class="offset-1 d-md-none d-block" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active text-black-50" aria-current="page">Shop</li>
                    <li class="breadcrumb-item active text-black-50 text-uppercase" aria-current="page"><?php echo $cate_data["mini_name"]; ?></li>
                </ol>
            </nav>

            <div class="col-12 mt-4 ">
                <div class="row">

                    <div class="offset-lg-1 col-lg-2 col-md-12 offset-1 col-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="row d-flex flex-column">
                                    <h5 class="text-black-50">Shop by <b class="text-black">Category</b></h5>
                                    <hr>

                                    <?php
                                    $mainCat_rs = Database::search("SELECT * FROM `category` ");
                                    $mainCat_num = $mainCat_rs->num_rows;

                                    for ($z = 0; $z < $mainCat_num; $z++) {

                                        $mainCut_data = $mainCat_rs->fetch_assoc();

                                    ?>

                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col-9">
                                                    <span onclick="loadProductFromCategory(<?php echo $mainCut_data['id']; ?>,0);" class="cursorrr a_fo"><?php echo $mainCut_data["name"]; ?></span>
                                                </div>
                                                <div class="col-3 text-end">
                                                    <i class="bi bi-caret-right"></i>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>


                                    <!-- Brand--------------------------------------- -->

                                    <h5 class="text-black-50 mt-5"><b class="text-black">Brands</b></h5>
                                    <hr>

                                    <?php
                                    $brand_rs = Database::search("SELECT * FROM `brand` ");
                                    $brand_num = $brand_rs->num_rows;

                                    for ($z = 0; $z < $brand_num; $z++) {

                                        $barnd_data = $brand_rs->fetch_assoc();

                                    ?>


                                        <div class="form-check ms-2 mt-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault<?php echo $barnd_data["id"]; ?>">
                                            <label class="form-check-label" for="flexRadioDefault<?php echo $barnd_data["id"]; ?>">
                                                <?php echo $barnd_data["name"]; ?>
                                            </label>
                                        </div>

                                    <?php
                                    }
                                    ?>


                                    <!-- Brand--------------------------------------- -->

                                    <h5 class="text-black-50 mt-5"><b class="text-black">Price</b></h5>
                                    <hr>

                                    <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                    <label style="font-size: 15px;" for="customRange2" class="form-label">Price: &nbsp; <label>Rs. 25000</label></label>

                                    <h5 class="text-black-50 mt-5"><b class="text-black">Sort By</b></h5>
                                    <hr>

                                    <div class="col-12 mb-5">
                                        <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none" id="s">
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

                    <!-- Product View -->

                    <div class="offset-lg-1 col-lg-7 col-md-12 offset-1 col-10">
                        <div class="row">

                            <div class="col-12">
                                <div class="row" style="justify-content:start; column-gap: 90px;" id="basic_search_result">


                                    <?php

                                    if (isset($_GET["searchKey"]) || isset($_GET["selected_category"])) {

                                        // echo $_GET["searchKey"] . "__" . $_GET["selected_category"];

                                        if (isset($_GET["page"])) {

                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }


                                        $txt = $_GET["searchKey"];
                                        $select = $_GET["selected_category"];


                                        $query = "SELECT * FROM `product`";

                                        if (!empty($txt) && $select == 0) {
                                            $query .= " WHERE `title` LIKE '%" . $txt . "%'";
                                        } else if (empty($txt) && $select != 0) {
                                            $query .= " WHERE `mini_category_id` = '" . $select . "'";
                                        } else if (!empty($txt) && $select != 0) {
                                            $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `mini_category_id` = '" . $select . "'";
                                        }


                                        $product_rs = Database::search($query);
                                        $product_num = $product_rs->num_rows;


                                        $results_per_page = 6;
                                        $number_of_pages = ceil($product_num / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                        $selected_num = $selected_rs->num_rows;


                                        for ($x = 0; $x < $selected_num; $x++) {
                                            $selected_data = $selected_rs->fetch_assoc();


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



                                        <?php
                                    } else {


                                        if (isset($_GET["page"])) {

                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_rs = Database::search("SELECT * FROM `product`");
                                        $product_num = $product_rs->num_rows;


                                        $results_per_page = 6;
                                        $number_of_pages = ceil($product_num / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $selected_rs =  Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                        $selected_num = $selected_rs->num_rows;

                                        for ($x = 0; $x < $selected_num; $x++) {
                                            $selected_data = $selected_rs->fetch_assoc();


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
                                                    <a href="#" class="mt-3 btn btn-outline-dark search-btn " style="width: 220px; height: auto;">
                                                        <i class="bi bi-cart4"></i> Add to Cart
                                                    </a>
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
                                    }
                                    ?>


                                    <!--  -->
                                    <div class="col-md-10 col-12 mt-3">
                                        <div class="row ">

                                            <div class="col-12 mt-3 d-flex justify-content-center">
                                                <div class="row">
                                                    <div class="col-md-4 offset-md-1">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination pagination-lg ">
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
                                    <!--  -->


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product View -->
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>