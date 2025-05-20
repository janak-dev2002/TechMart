<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row mt-1 mb-1">

                    <div class="offset-md-1 col-12 col-md-5 text-center text-lg-start mt-2  justify-content-lg-start">



                        <?php

                        session_start();
                        $total = 0;
                        $sub = 0;
                        // require "connection.php";

                        if (isset($_SESSION["u"])) {

                            $data = $_SESSION["u"];

                        ?>

                            <span class="text-md-start"><b>Welcome &nbsp;</b><?php echo ($data["fname"]); ?></span> |&nbsp;
                            <span class="text-md-start cursor-pointer fw-bold signOut" onclick="signOut();">Sign Out</span> |


                        <?php

                        } else {

                        ?>

                            <span class="me-2"><a class="text-decoration-none clr" href="logReg.php">Sign In</a></span>
                            <span>|</span>
                            <span class="ms-2"><a class="text-decoration-none clr" href="logReg.php">Sign Up</a></span>&nbsp;

                        <?php
                        }

                        ?>

                        <span class="text-md-start fw-bold">Help and Contact</span>

                    </div>

                    <div class="offset-md-2 col-12 col-md-4 align-self-lg-end">
                        <div class="row">



                            <div class="col-6 offset-lg-1 col-md-4 dropdown d-flex align-items-center">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    My account
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>
                                    <!-- <li><a class="dropdown-item" href="#">My Sellings</a></li> -->
                                    <!-- <li><a class="dropdown-item" href="myProducts.php">My Products</a></li> -->
                                    <li><a class="dropdown-item" href="watchlist.php">Wishlist</a></li>
                                    <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History</a></li>
                                    <li><a class="dropdown-item" href="message.php">Message</a></li>
                                    <li><a class="dropdown-item" href="index.php">Home</a></li>
                                </ul>
                            </div>


                            <?php

                            if (isset($_SESSION["u"])) {

                                $connection = new mysqli("localhost", "root", "Janaka@2002", "techmart", "3306");

                                $cart_rs = $connection->query("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                $cart_num = $cart_rs->num_rows;



                                if ($cart_num == 0) {
                                } else {

                                    for ($x = 0; $x < $cart_num; $x++) {

                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = $connection->query("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
                                        $product_data_cart = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data_cart["price"]) * $cart_data["qty"];
                                    }

                                    $results = $connection->query("SELECT sum(qty) FROM cart WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

                                    while ($rows = mysqli_fetch_array($results)) {
                                        $sub = $rows['sum(qty)'];
                                    }
                                }

                            ?>

                                <div class="col-6 offset-md-0 col-md-3 d-flex justify-content-end align-items-center mt-1">
                                    <span id="cartfullTot" class="clr">Rs: <?php echo $total; ?>.00</span>
                                    <a href="cart.php" class="offset-1 clr">
                                        <i class="bi bi-cart4 position-relative clr" style="font-size: 20px;">
                                            <span style="font-size: 11px;" class="clr-bg position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                                                <?php echo $sub; ?>
                                            </span>
                                        </i>
                                    </a>
                                </div>

                            <?php

                            } else {

                            ?>

                                <div class="col-6 offset-md-0 col-md-3 d-flex justify-content-end align-items-center mt-1">
                                    <span id="cartfullTot" class="clr">Rs: 00.00</span>
                                    <a href="cart.php" class="offset-1 clr">
                                        <i class="bi bi-cart4 position-relative clr" style="font-size: 20px;">
                                            <span style="font-size: 11px;" class="clr-bg position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                                                <?php echo $sub; ?>
                                            </span>
                                        </i>
                                    </a>
                                </div>

                            <?php

                            }


                            ?>



                        </div>
                    </div>

                    <hr>
                </div>
            </div>
        </div>
    </div>




    <script src="script.js"></script>
</body>

</html>