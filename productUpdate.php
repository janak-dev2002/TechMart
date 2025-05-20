<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Product | TechMart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="reso/logo.png" />

</head>

<body>


    <div class="container-fluid bg-light">
        <div class="row">


            <div class="col-12">
                <div class="row shadow">
                    <div class="col-md-2 col-1 p-1 offset-md-1">
                        <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                    </div>
                    <div class="col-md-2 col-5 d-flex align-items-center offset-6">
                        <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-4" style="height: 33px; font-size: 14px;">
                            <option value="">Dashboard</option>
                            <option value="">Product Add</option>
                            <option value="">Product Update</option>
                            <option value="">Manage Product</option>
                            <option value="">Mange Users</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php
            session_start();
            require "connection.php";


            if (isset($_SESSION["au"])) {

            ?>


                <!-- <div class="col-12 mt-5">
                    <div class="row">
                        <div class="col-md-2 text-center text-lg-start col-12 p-1 offset-md-1">
                            <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                        </div>
                    </div>
                </div> -->

                <div class="col-10 offset-1 mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="clr text_shadow">Update your Product</h2>
                            <hr>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row gy-3">


                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5">
                                                    <h6>Product Category</h6>
                                                </div>
                                                <div class="col-7">
                                                    <select disabled class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="category" onchange="loadBrand();">

                                                        <?php

                                                        if (isset($_SESSION["p"])) {

                                                            $products = $_SESSION["p"];
                                                        } else {

                                                            header("Location:index.php");
                                                        }



                                                        $category_rs = Database::search("SELECT * FROM `mini_category` WHERE `id` = '" . $products["mini_category_id"] . "'");
                                                        $category_data = $category_rs->fetch_assoc();
                                                        ?>


                                                        <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["mini_name"]); ?></option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 text-md-center">
                                                    <h6>Product Brand</h6>
                                                </div>
                                                <div class="col-7">
                                                    <select disabled class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="brand" onchange="loadModel();">

                                                        <?php

                                                        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` IN(SELECT `brand_id` FROM `brand_has_model` 
                                                        WHERE `id` = '" . $products["brand_has_model_id"] . "')");
                                                        $brand_data = $brand_rs->fetch_assoc();
                                                            $productbrand_rs = Database::search("SELECT * FROM `products_brand` WHERE `id` = '".$brand_data["products_brand_id"]."'");
                                                            $product_brand_data = $productbrand_rs->fetch_assoc();
                                                        ?>

                                                        <option value="<?php echo ($brand_data["id"]); ?>"><?php echo ($product_brand_data["br_name "]); ?></option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 text-md-center">
                                                    <h6>Product Model</h6>
                                                </div>
                                                <div class="col-7">
                                                    <select disabled class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="model">

                                                        <?php

                                                        $model_rs = Database::search("SELECT * FROM `model` WHERE `id` IN(SELECT `model_id` FROM `brand_has_model`
                                                        WHERE `id` = '" . $products["brand_has_model_id"] . "')");
                                                        $model_data = $model_rs->fetch_assoc();

                                                        ?>
                                                        <option value="<?php echo ($model_data["id"]); ?>"><?php echo ($model_data["name"]); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-md-2  col-12">
                                    <h6>Product Ttile</h6>
                                </div>
                                <div class="col-md-10 col-12 d-grid">
                                    <input type="text" class="form-control rounded-5" value="<?php echo $products["title"]; ?>" placeholder="     Title here" id="title">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <h6>Product Condition</h6>
                                                </div>
                                                <div class="col-6">

                                                    <?php

                                                    if ($products["condition_id"] == 1) {

                                                    ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                                                            <label class="form-check-label" for="inlineRadio1">Brandnew</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                                                            <label class="form-check-label" for="inlineRadio2">Used</label>
                                                        </div>
                                                    <?php

                                                    } else {

                                                    ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                                            <label class="form-check-label" for="inlineRadio1">Brandnew</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked disabled>
                                                            <label class="form-check-label" for="inlineRadio2">Used</label>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <h6>Product Colour</h6>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <select disabled class="form-select text-center border  border-1 border-primary shadow-none rounded-4" style="height: 35px; font-size: 14px;" id="clr">



                                                        <?php

                                                        $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $products["color_id"] . "'");
                                                        $color_data = $color_rs->fetch_assoc();


                                                        ?>
                                                        <option value="<?php echo ($color_data["id"]); ?>"><?php echo ($color_data["name"]); ?></option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="offset-md-4 col-md-4 col-12">
                                                    <div class="input-group ">
                                                        <input disabled type="text" class="form-control rounded-5" placeholder="Add New Colour..." id="clr_in">
                                                        <button class="btn btn-outline-primary rounded-5 ms-2" type="button" id="button-addon2">+ Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12 text-md-center">
                                                    <h6>Product Quantity</h6>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <input type="number" class="form-control rounded-5" placeholder="     Qty here" class="text-center" value="<?php echo $products["qty"]; ?>" min="1" id="qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <h6>Cost per item</h6>
                                        </div>
                                        <div class="col-md-4 col-12 d-flex align-items-center">
                                            <label for="">Rs.</label>&nbsp;
                                            <input id="iprice" type="text" class="form-control rounded-5" value="<?php echo $products["price"]; ?>" placeholder=".00" class="text-center" id="cost">
                                        </div>
                                        <div class="col-md-4 col-12 mt-3 mt-md-0 d-flex align-items-center justify-content-between">
                                            <div class="col-12 d-flex align-items-center justify-content-between">
                                                <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="320" height="60" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <h6>Delivery cost</h6>
                                                </div>
                                                <div class="col-md-4 col-12 d-flex align-items-center">
                                                    <label for="">Rs.</label>&nbsp;
                                                    <input id="dcw" type="text" class="form-control rounded-5" value="<?php echo $products["delivery_fee_colombo"]; ?>" placeholder=".00" class="text-center" id="dwc">

                                                </div>
                                                <div class="col-md-4 col-12 d-flex align-items-center mt-2 mt-md-0">
                                                    <label for="">Rs.</label>&nbsp;
                                                    <input id="dco" type="text" class="form-control rounded-5" value="<?php echo $products["delivery_fee_other"]; ?>" placeholder=".00" class="text-center" id="doc">
                                                </div>
                                                <div class="col-12 d-flex d-none d-md-flex">
                                                    <div class="col-4 offset-4 text-center mt-1">
                                                        <h6 class="text-black-50" style="font-size: 13px;">Deliver Cost Within Colombo</h6>
                                                    </div>
                                                    <div class="col-4 text-center mt-1">
                                                        <h6 class="text-black-50" style="font-size: 13px;">Deliver Cost Out Of Colombo</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-md-2 col-12 ">
                                    <h6>Product Description</h6>
                                </div>

                                <div class="col-md-10 col-12">
                                    <textarea cols="30" rows="20" class="form-control" id="desc"><?php echo $products["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-md-2 col-12 ">
                                    <h6>Add product image</h6>
                                </div>
                                <div class="col-md-10 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class=" col-12">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div class="row d-flex justify-content-between g-3">

                                                                <?php

                                                                $img = array();

                                                                $img[0] = "reso/addproductimg.svg";
                                                                $img[1] = "reso/addproductimg.svg";
                                                                $img[2] = "reso/addproductimg.svg";

                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $products["id"] . "'");
                                                                $image_num = $image_rs->num_rows;

                                                                for ($x = 0; $x < $image_num; $x++) {

                                                                    $image_data = $image_rs->fetch_assoc();
                                                                    $img[$x] = $image_data["code"];
                                                                }

                                                                ?>

                                                                <div class="col-md-4 col-12">
                                                                    <img src="<?php echo $img[0]; ?>" style="height: 400px; width: 400px;" class="img-thumbnail" id="img0" onclick="img_0();">
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <img src="<?php echo $img[1]; ?>" style="height: 400px; width: 400px;" class="img-thumbnail" id="img1" onclick="img_1();">
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <img src="<?php echo $img[2]; ?>" style="height: 400px; width: 400px;" class="img-thumbnail" id="img2" onclick="img_2();">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-md-4 col-12 d-grid">
                                                                    <input type="file" class="d-none" id="imageuploader" accept="image/*" multiple />
                                                                    <label for="imageuploader" class="mt-3 btn btn-outline-dark btn-success btnclr text-center text-decoration-none" style="font-size: 16px;" onclick="changeProductImage();"><i class="bi bi-plus-circle"></i> Add Image</label>
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
                                    <hr>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Fees</h6>
                                </div>
                                <div class="col-10">
                                    <h6 class="text-black-50">We are taking 5% of the product from price from every product as a service charge.</h6>
                                </div>
                                <div class="col-12 mt-1">
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5 mb-5">
                            <div class="row">
                                <div class="col-12 d-md-flex">
                                    <div class="col-md-12 col-12 d-grid d-md-block text-end">
                                        <button href="" class="mt-3 btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;" onclick="updateProduct();"><i class="bi bi-plus-circle"></i> Update Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            } else {

                header("Location:adminPanel.php");
            }

            ?>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>