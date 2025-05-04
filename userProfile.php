<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />

    <link rel="icon" href="reso/logo.svg" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header2.php"; ?>


            <?php

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                require "connection.php";

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
                gender.id = user.gender_id WHERE `email` = '" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
                user_has_address.city_id = city.id INNER JOIN `district` ON
                city.district_id = district.id INNER JOIN `province` ON
                district.province_id = province.id WHERE `user_email` = '" . $email . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();




            ?>

                <div class="col-12 bg-light">
                    <div class="row">

                        <div class="col-12 bg-body rounded rounded-2 mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end rounded-4">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-4">


                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="reso/profile_img/user.svg" class="rounded-5 mt-5" style="width: 150px ;" id="viewimage" />
                                        <?php
                                        } else {

                                        ?>
                                            <img src="<?php echo ($image_data["path"]); ?>" class="rounded-3 mt-5" style="width: 150px ;" id="viewimage" />
                                        <?php

                                        }

                                        ?>

                                        <span class="fw-bold"><?php echo ($data["fname"]); ?> <?php echo ($data["lname"]); ?></span>
                                        <span class="fw-bold text-black-50"><?php echo ($data["email"]); ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-5" onclick="updateImage();">Update Profile Image</label>
                                    </div>
                                </div>

                                <div class="col-md-5 offset-1 border-end shadow rounded-4">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6 mb-2">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo ($data["fname"]); ?>" id="fname" />
                                            </div>

                                            <div class="col-6 mb-2">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo ($data["lname"]); ?>" id="lname" />
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo ($data["mobile"]); ?>" id="mob" />
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" readonly value="<?php echo ($data["password"]); ?>" />
                                                    <span class="input-group-text bg-primary" id="basic-addon2"><i class="bi bi-eye-slash-fill text-white"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" readonly value="<?php echo ($data["email"]); ?>" />
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label class="form-label">Registered Date</label>
                                                <input type="email" class="form-control" readonly value="<?php echo ($data["joined_date"]); ?>" />
                                            </div>



                                            <?php

                                            if (!empty($address_data["line1"])) {

                                            ?>

                                                <div class="col-12 mb-2">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" value="<?php echo ($address_data["line1"]); ?>" id="line1" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>
                                                <div class="col-12 mb-2">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" id="line1" />
                                                </div>

                                            <?php
                                            }

                                            ?>

                                            <?php

                                            if (!empty($address_data["line2"])) {

                                            ?>

                                                <div class="col-12 mb-2">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control" value="<?php echo ($address_data["line2"]); ?>" id="line2" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12 mb-2">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="line2" />
                                                </div>

                                            <?php
                                            }

                                            ?>


                                            <div class="col-6 mb-2">
                                                <label class="form-label">Province</label>
                                                <select class="form-select" id="province">
                                                    <option value="0">Select Province</option>
                                                    <?php
                                                    $provice_rs = Database::search("SELECT * FROM `province`");
                                                    $province_num = $provice_rs->num_rows;

                                                    for ($x = 0; $x < $province_num; $x++) {

                                                        $province_data = $provice_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($province_data["id"]); ?>" <?php

                                                                                                                if (!empty($address_data["province_id"])) {
                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {

                                                                                                                ?> selected <?php

                                                                                                                        }
                                                                                                                    }

                                                                                                                            ?>><?php echo ($province_data["name"]); ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <label class="form-label">Distric</label>
                                                <select class="form-select" id="distric">
                                                    <option value="0">Select District</option>
                                                    <?php
                                                    $distric_rs = Database::search("SELECT * FROM `district`");
                                                    $district_num = $distric_rs->num_rows;

                                                    for ($x = 0; $x < $district_num; $x++) {

                                                        $district_data = $distric_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($district_data["id"]); ?>" <?php

                                                                                                                if (!empty($address_data["district_id"])) {
                                                                                                                    if ($district_data["id"] == $address_data["district_id"]) {

                                                                                                                ?> selected <?php

                                                                                                                        }
                                                                                                                    }
                                                                                                                            ?>><?php echo ($district_data["name"]); ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <label class="form-label">City</label>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>

                                                    <?php
                                                    $city_rs    = Database::search("SELECT * FROM `city`");
                                                    $city_num = $city_rs->num_rows;

                                                    for ($x = 0; $x < $city_num; $x++) {

                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($city_data["id"]); ?>" <?php

                                                                                                            if (!empty($address_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {

                                                                                                            ?> selected <?php

                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>><?php echo ($city_data["city_name"]); ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <?php

                                            if (!empty($address_data["postal_code"])) {

                                            ?>
                                                <div class="col-6 mb-2">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control" value="<?php echo ($address_data["postal_code"]) ?>" id="postalCode" />
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-6 mb-2">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control" id="postalCode" />
                                                </div>
                                            <?php
                                            }

                                            ?>

          

                                            <div class="col-12 mb-2">
                                                <label class="form-label">Gender</label>
                                                <input type="text" class="form-control" readonly value="<?php echo ($data["gen"]); ?>" />
                                            </div>


                                            <div class="col-12 d-grid mb-2">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
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

                header("location:index.php");
            }

            ?>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>