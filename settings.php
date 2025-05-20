<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart| Manage Product</title>

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
                                        <h2 class="text_shadow">Settings</h2>
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