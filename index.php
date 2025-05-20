<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart | Home</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">

</head>

<body class="bg-body" onload="newlyAddedItems(); GamingLaptops();">


    <?php include "header2.php";
    require "connection.php";
    ?>


    <div class="container py-5">
        <div class="row">

            <div class="col-12">
                <div class="row  ">

                    <div class="col-12 col-md-1 d-md-block d-flex justify-content-center mb-5 mb-md-0 ">
                        <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                    </div>

                    <div class=" offset-md-1 col-12 col-md-7 mb-2 mb-md-0">

                        <div class="col-12">
                            <div class="row ">

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


    <div class="container-fluid bg-light">
        <div class="row">


            <div class="col-12 d-md-block d-none mb-4 shadow">
                <div class="row">

                    <hr />
                    <div class="col-2 border-end border-3 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50"><a href="productListning.php" class="text-decoration-none text-black-50">SHOP</a></h5>
                    </div>
                    <div class="col-2 border-end border-3 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50">GAMING</h5>
                    </div>
                    <div class="col-2 border-end border-3 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50">BUILD YOUR PC</h5>
                    </div>
                    <div class="col-2 border-end border-3 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50">BUY & SELL</h5>
                    </div>
                    <div class="col-2 border-end border-3 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50">RENTALS</h5>
                    </div>
                    <div class="col-2 justify-content-center d-flex mb-2">
                        <h5 class="text-black-50">CONTACT US</h5>
                    </div>
                </div>
            </div>

            <!-- Catagories////////////////////////////////////////////////////////////////////////////////////////////////// -->

            <div class="col-12">
                <div class="row">

                    <div class="col-lg-3 d-none d-lg-block bg-body">
                        <div class="row p-3">

                            <div class="col-12 mt-3">
                                <h4 class="fw-bold"><i class="bi bi-list"></i> SHOP BY DEPARTMENT</h4>
                                <hr>
                            </div>

                            <?php include "departments.php"; ?>

                        </div>
                    </div>


                    <!-- Carosul Slider//////////////////////////////////////////////////////////////////////////////////////// -->

                    <div class="col-lg-9 col-12  ">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item" data-bs-interval="10000">
                                    <img src="https://www.sense.lk/images/uploads/slider/1667982196.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block text-start div-caption ">
                                        <h5 class="h5-size poppins-font text-dark pb-1 fw-bolder"></h5>
                                        <p class="font-mediam p-mediam poppins-font text-secondary pb-2"></p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="10000">
                                    <img src="https://www.sense.lk/images/uploads/slider/1668248039.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block text-start div-caption ">
                                        <h5 class="h5-size poppins-font text-dark pb-1 fw-bolder"></h5>
                                        <p class="font-mediam p-mediam poppins-font text-secondary pb-2"></p>
                                    </div>
                                </div>
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="https://www.sense.lk/images/uploads/slider/1668248073.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block text-start div-caption ">
                                        <h5 class="h5-size poppins-font text-dark pb-1 fw-bolder"></h5>
                                        <p class="font-mediam p-mediam poppins-font text-secondary pb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUB Body////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

            <div class="d-none d-sm-block d-md-none d-lg-block mt-5">
                <div class="row mx-lg-1">
                    <div class="col-lg-3 bg-white py-3 ">
                        <div class="row border-secondary border-end">
                            <div class="col-3">
                                <img src="https://www.sense.lk/images/frontend/service_icons_10.webp" class="w-100" alt="">
                            </div>
                            <div class="col-9">
                                <p class="p-extra-small fw-bolder font-mediam  poppins-font text-uppercase">FAST DELIVERY
                                </p>
                                <p class="p-small font-mediam  poppins-font">Island wide Delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  bg-white py-3">
                        <div class="row border-secondary border-end">
                            <div class="col-3">
                                <img src="https://www.sense.lk/images/frontend/service_icons_07.webp" class="w-100" alt="">
                            </div>
                            <div class="col-9">
                                <p class="p-extra-small fw-bolder font-mediam  poppins-font text-uppercase">SAFE PAYMENT
                                </p>
                                <p class="p-small font-mediam  poppins-font">100% secure payment
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  bg-white py-3">
                        <div class="row border-secondary border-end">
                            <div class="col-3">
                                <img src="https://www.sense.lk/images/frontend/service_icons_16.webp" class="w-100" alt="">
                            </div>
                            <div class="col-9">
                                <p class="p-extra-small fw-bolder font-mediam  poppins-font text-uppercase">SHOP WITH CONFIDENCE
                                </p>
                                <p class="p-small font-mediam  poppins-font">World's No1 IT Brands
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  bg-white py-3">
                        <div class="row ">
                            <div class="col-3">
                                <img src="https://www.sense.lk/images/frontend/service_icons_13.webp" class="w-100" alt="">
                            </div>
                            <div class="col-9">
                                <p class="p-extra-small fw-bolder font-mediam  poppins-font text-uppercase">FRIENDLY SERVICE
                                </p>
                                <p class="p-small font-mediam  poppins-font">Messaging Help Center
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Our Collection bar -->

            <div class="col-12 mt-5 mb-5" style="background-color: #D7E8EB;">
                <div class="row d-flex flex-column flex-md-row justify-content-center">

                    <div class="col-12 col-md-5 text-center mt-md-5 mb-md-5">
                        <h2 class="d-none d-md-block text_shadow mt-5" style="font-size: 66px;">TOP CATEGORY</h2>
                        <h2 class="d-block d-md-none text_shadow mt-5" style="font-size: 40px;">TOP CATEGORY</h2>
                    </div>
                    <div class="col-md-8 col-12 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-between mt-5 mb-4">


                        <div class="col-2 d-flex flex-column align-items-center mb-md-5 cursorrr">
                            <div class="col-12 shadow dot d-flex align-items-center justify-content-center" onmou>
                                <span style="font-size: 60px ;"><img src="reso/cate/net.webp" class=""></span>
                            </div>
                            <h4 class="text_shadow mt-3 mb-5">NETWORKING</h4>
                        </div>

                        <div class="col-2 d-flex flex-column align-items-center mb-md-5 cursorrr">
                            <div class="col-12 shadow dot d-flex align-items-center justify-content-center">
                                <span style="font-size: 60px ;"><img src="reso/cate/cctv.webp" class=""></span>
                            </div>
                            <h4 class="text_shadow mt-3 mb-5">CCTV</h4>
                        </div>

                        <div class="col-2 d-flex flex-column align-items-center mb-md-5 cursorrr">
                            <div class="col-2 shadow dot d-flex align-items-center justify-content-center">
                                <span style="font-size: 60px ;"><img src="reso/cate/lap.jpg" class=""></span>
                            </div>
                            <h4 class="text_shadow mt-3 mb-5">LAPTOPS</h4>
                        </div>

                        <div class="col-2 d-flex flex-column align-items-center mb-md-5 cursorrr">
                            <div class="col-2 shadow dot d-flex align-items-center justify-content-center">
                                <span style="font-size: 60px ;"><img src="reso/cate/pc.webp" class=""></span>
                            </div>
                            <h4 class="text_shadow mt-3 mb-5">DESKTOP PC</h4>
                        </div>

                        <div class="col-2 d-flex flex-column align-items-center mb-md-5 cursorrr">

                            <div class="col-2 shadow dot d-flex align-items-center justify-content-center">
                                <span style="font-size: 60px ;"><img src="reso/cate/phone.webp" class=""></span>
                            </div>
                            <h4 class="text_shadow mt-3 mb-5">MOBILE PHONES</h4>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Our Collection bar -->


            <div class="col-12">
                <div class="row py-3">
                    <div class="col-md-6 col-12 mb-4 mb-md-0">
                        <a onclick="selectCategory('msi gaming',18);" class="cursorrr">
                            <img src="https://www.sense.lk/images/uploads/advertisements/2022/11/20221112155813Katana.jpg" class="w-100 mx-auto" alt="">
                        </a>
                    </div>
                    <!-- <div class="col-lg-4">
                        <a href="https://www.sense.lk/product/bluetooth-speaker-jbl-party-box-100-1y-genuine">
                            <img src="https://www.sense.lk/images/uploads/advertisements/2022/10/202210311413141433x685_84.jpg" class="w-100 mx-auto" alt="">
                        </a>
                    </div> -->
                    <div class="col-md-6 col-12">
                        <a href="https://www.sense.lk/shop?selected_category=141-2&amp;selected_brand=151&amp;min_price=0&amp;max_price=3326000&amp;sort_order=">
                            <img src="https://www.sense.lk/images/uploads/advertisements/2022/11/20221112155640transcend.jpg" class="w-100 mx-auto" alt="">
                        </a>
                    </div>
                </div>
            </div>


            <!-- NEW Arrivals ////////////////////////////////////////////////////////////////////////////////////////////// -->


            <div class="col-12">
                <div class="row">

                    <div class="offset-1 col-10">
                        <div class="row">

                            <div class="col-12 mt-5 mb-5 d-flex text-center justify-content-center align-items-center">
                                <h1 class="col-12 fw-bold d-none d-md-block" style="font-size: 60px;">NEW ARRIALS</h1>
                                <h1 class="col-12 fw-bold d-block d-md-none" style="font-size: 40px;">NEW ARRIALS</h1>
                            </div>


                            <div class="col-12">
                                <div class="row d-flex justify-content-md-between justify-content-center" id="newlyItems">


                                    <!-- <div class="col-lg-3 mt-4 mb-4 card bg-light border-0 shadow" style="width: 19rem;">
                                        <img onclick="showitem();" class="mt-3 im2" src="reso/2.png">
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title text_shadow">Gaming PC Setup</h5>
                                            <div class="rating mt-3">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>
                                            <h2 class="price">Rs. 350.00</h2>
                                            <h6>Availability : &nbsp; Yes</h6>
                                            <div class="btn d-flex justify-content-between align-items-center">
                                                <a href="cart.php" class="btn btn-outline-dark search-btn ">
                                                    <i class="bi bi-cart4"></i> Add to Cart
                                                </a>
                                                <a href="watchlist.php" class="add-to-favourite text-success">
                                                    <i class="fs-4 bi bi-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- first banner -->


            <div class="col-12 mt-5">
                <div class="row p-3">
                    <div class=" col-12 col-md-6 mb-md-5 d-flex flex-column justify-content-center py-4" style="background-color: #74AFBE;">
                        <div class="offset-md-2 row">

                            <div class="row">
                                <div class="col-10 mb-4">
                                    <h2 class="text-white text_shadow" style="font-size: 50px;">HEADPHONES</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 mb-4">
                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Praesentium unde quaerat, ex inventore facilis sapiente.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <a onclick="selectCategory('gaming headset',25);" class="fw-bold cursorrr btn btn-outline-dark shop2-btn " style="font-size: 30px;" type="submit">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 mb-md-5 justify-content-center dfle" style="background-color: #D7E8EB;">
                        <img src="reso/boy.png" class="first_banner-img rounded-end">
                    </div>
                </div>
            </div>



            <!-- first banner -->


            <!-- Gaming Laptops ////////////////////////////////////////////////////////////////////////////////////////////// -->


            <div class="col-12 mb-5">
                <div class="row mb-5">

                    <div class="offset-1 col-10">
                        <div class="row">

                            <div class="col-12 mt-5 mb-5 d-flex text-center justify-content-center align-items-center">
                                <h1 class="col-12 fw-bold d-none d-md-block" style="font-size: 60px;">GAMING LAPTOPS</h1>
                                <h1 class="col-12 fw-bold d-block d-md-none" style="font-size: 40px;">GAMING LAPTOPS</h1>
                            </div>

                            <hr>

                            <div class="col-12" >
                                <div class="row d-flex justify-content-md-between justify-content-center" id="gamingLaps">


                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Gaming Console///////////////////////////////////////////////////////////////////////////////////////////////////// -->


                    <div class="mt-md-5 mb-md-5 d-flex flex-column flex-column-reverse flex-md-row bg-light col-12">


                        <div class="offset-1 col-10 col-md-5 d-flex flex-column justify-content-center">

                            <div class="border-start border-5 border-info">
                                <div class="row ms-1">
                                    <div class="col-4">
                                        <h2 class="text_shadow" style="font-size: 60px;">PS4 V2 Dualshock</h2>
                                    </div>
                                </div>

                                <div class="row ms-1">
                                    <div class="col-8">
                                        <h3 class="text-black-50">Wireless Controller for PlayStaion 4</h3>
                                    </div>
                                </div>

                                <div class="row ms-1">
                                    <div class="col-8">
                                        <p>(Compatible/Genaric)</p>
                                    </div>
                                </div>

                                <div class="row ms-1">
                                    <div class="col-8">
                                        <h3>Rs.25000</h3>
                                    </div>
                                </div>

                                <div class="row ms-1">
                                    <div class="col-8">
                                        <button class="mt-2 btn btn-outline-dark search-btn " type="submit">Shop More <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-5 mb-5">
                            <img src="Playstation_Img/controller.png" class="d-md-none controller-img img-fluid shadow">
                            <img src="Playstation_Img/controller.png" class="d-none d-md-block controller-img">
                        </div>

                    </div>


                    <!-- Last Bannner VR ////////////////////////////////////////////////////////////////////////////////////////////////////-->


                    <div class="col-12 mt-5">
                        <div class="row p-3 flex-row-reverse">
                            <div class=" col-12 col-md-6 mb-md-5 d-flex flex-column justify-content-center py-4" style="background-color: #74AFBE;">
                                <div class="offset-2 row">

                                    <div class="col-6 mb-4">
                                        <h4 class="text-white fw-bold">Gaming Gadgets</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 mb-4">
                                            <h2 class="text-white text_shadow" style="font-size: 55px;">VR HEADSET</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 mb-4">
                                            <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                Praesentium unde quaerat, ex inventore facilis sapiente.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            <a onclick="selectCategory('gaming headset',25);" class="fw-bold btn btn-outline-dark shop2-btn " style="font-size: 30px;" type="submit">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-md-5 justify-content-center" style="background-color: #D7E8EB;">
                                <img src="reso/2.png" class="first_banner-img rounded-end">
                            </div>
                        </div>
                    </div>


                    <!-- Last Bannner -->


                    <!-- Last -->

                    <div class="container-fluid">
                        <div class="row mt-5 mb-3">
                            <div class="offset-1 col-12 col-md-5 d-flex flex-column justify-content-center">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h2 class="d-none d-md-block text-black text_shadow" style="font-size: 55px;">SONOS SPEAKERS</h2>
                                        <h2 class="d-md-none d-block text-black text_shadow" style="font-size: 40px;">SONOS SPEAKERS</h2>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-4">
                                    <div class="col-9">
                                        <p class="text-black-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque harum voluptates
                                            sapiente non ratione necessitatibus quisquam nemo dolorem, ea perspiciatis cupiditate minima reprehenderit,
                                            nisi temporibus assumenda deserunt officiis officia voluptatibus.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <p class="fw-bold fs-2">Rs. 15000</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <a onclick="selectCategory('gaming headset',25);" class="mt-4 mb-5 btn btn-outline-dark shop1-btn" style="font-size: 30px;" type="submit">Shop Now</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-5 col-12">
                                <div class="col-12 align-items-center">
                                    <img class="offset-md-2 offset-1 last-img" src="reso/3.png" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Last -->

                </div>
            </div>


            <?php include "footer.php"; ?>

            <script src="script.js"></script>
            <script src="bootstrap.bundle.min.js"></script>
</body>

</html>