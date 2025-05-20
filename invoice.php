<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Teach | Invoice</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>

<body>

    <?php include "header2.php";

    require "connection.php";

    if (isset($_SESSION["u"])) {


        $umail = $_SESSION["u"]["email"];
        $oid = $_GET["id"];

    ?>
        <div class="container">
            <div class="row">

                <div class="col-12" id="page">
                    <div class="row">

                        <div id="in1" class="col-12 mt-5">
                            <div class="row d-flex">
                                <div class="col-md-3 d-flex justify-content-center justify-content-md-start col-12 mt-5">
                                    <img src="reso/Logo.png" style="height: 80px;">
                                </div>
                                <div class="col-md-9 col-12 mt-5 d-none d-md-block">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 mt-3 offset-7 text-start">
                                                    <div class="row flex-column">
                                                        <h3 class="text-black text_shadow">New Tech</h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-black-50">No.72 4/A, Ihalagama, Yakkala Road</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-black-50">Gampaha</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-black-50">Sri Lanka</h5>
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
                        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                        $invoice_num = $invoice_rs->num_rows;
                        // $invoice_data = $invoice_rs->fetch_assoc();

                        ?>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <h2 class=" text-black">INVOICE - 0<?php echo $invoice_data["id"]; ?></h2>
                            </div>
                        </div>

                        <div class="col-12 mt-5 mb-5">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row d-flex flex-column">
                                        <div class="col-12">
                                            <h5 class="text-black-50"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h5>
                                        </div>
                                        <?php

                                        $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $address_data["city_id"] . "'");
                                        $city_data = $city_rs->fetch_assoc();
                                        ?>
                                        <div class="col-12">
                                            <h6 class="text-black-50"><?php echo $address_data["line1"] . ", " . $address_data["line2"]; ?></h6>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-black-50"><?php echo $city_data["city_name"]; ?></h6>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-black-50"><?php echo $address_data["postal_code"]; ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row d-flex flex-column">
                                        <div class="col-12 text-end">
                                            <h6 class="text-black-50">Order Id : <span>#<?php echo $invoice_data["order_id"]; ?></span></h6>
                                        </div>
                                        <div class="col-12 text-end">
                                            <h6 class="text-black-50">Purchased Date : <span><?php echo $invoice_data["date"]; ?></span></h6>
                                        </div>
                                        <div class="col-12 text-end">
                                            <h6 class="text-black-50">Payment Methode : <span>CARD</span></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12 bg-black mt-5">
                            <div class="row d-flex align-items-center">
                                <div class="col-6">
                                    <div class="row mt-1">
                                        <h5 class="text-white">Product</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row mt-1">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6 text-center">
                                                            <h5 class="text-white">Unit Price</h5>
                                                        </div>
                                                        <div class="col-6 text-center">
                                                            <h5 class="text-white">Quantity</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <h5 class="text-white">Price</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        if ($invoice_num == 1) {

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();

                        ?>
                            <!-- items-/////////////////////////////////////////////////////////// -->

                            <div class="col-12 mt-4">
                                <div class="row d-flex">
                                    <div class="col-6">
                                        <div class="row d-flex">
                                            <h6 class="col-1">1 . </h6>
                                            <h6 class="col-11"><?php echo $product_data["title"]; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6 text-center">
                                                                <h6>Rs.<?php echo $product_data["price"]; ?></h6>
                                                            </div>
                                                            <div class="col-6 text-center">
                                                                <h6><?php echo $invoice_data["qty"]; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-center">
                                                <h6>Rs.<?php echo $product_data["price"] * $invoice_data["qty"]; ?>.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>


                            <!-- //////////////////////////////////////////////////////////////////// -->
                            <?php

                        } else if ($invoice_num > 1) {

                            for ($z = 0; $z < $invoice_num; $z++) {

                                $invoice_data_1 = $invoice_rs->fetch_assoc();

                                $product_rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data_1["product_id"] . "'");
                                $product_data1 = $product_rs1->fetch_assoc();

                            ?>

                                <!-- items-/////////////////////////////////////////////////////////// -->

                                <div class="col-12 mt-4">
                                    <div class="row d-flex">
                                        <div class="col-6">
                                            <div class="row d-flex">
                                                <h6 class="col-1">1 . </h6>
                                                <h6 class="col-11"><?php echo $product_data1["title"]; ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 text-center">
                                                                    <h6>Rs.<?php echo $product_data1["price"]; ?></h6>
                                                                </div>
                                                                <div class="col-6 text-center">
                                                                    <h6><?php echo $product_data1["qty"]; ?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <h6>Rs.<?php echo $product_data1["price"] * $invoice_data_1["qty"]; ?>.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                </div>


                                <!-- //////////////////////////////////////////////////////////////////// -->


                        <?php
                            }
                        }


                        ?>



                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-6 offset-6">
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="text-black">Subtotal</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-black">Rs.<?php echo $product_data["price"] * $invoice_data["qty"]; ?>.00</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="text-black">Discount</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-black">Rs.500.00</h6>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="text-black fw-bold">Total</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-black fw-bold">Rs.246000.00</h6>
                                            </div>
                                            <div class="col-12">
                                                <hr class="fw-bold h-25">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-12 mt-1 mb-5">
                            <div class="row">
                                <div class="col-6 offset-6 d-grid">
                                    <div class="col-12">
                                        <div class="col-6 offset-6 text-end">
                                            <a class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;" onclick="printInvoice();"><i class="bi bi-printer"></i> Print Invoice</a>
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
    ?>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>