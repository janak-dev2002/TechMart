<?php
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="reso/Logo.png">

</head>

<body class="main-body">

    <?php include "header1.php"; ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 mt-5">
                <div class="row">

                    <!-- <div class="col-12 mt-3 mb-3">
                        <img src="https://www.sense.lk/images/frontend/inner-banner.webp" class="w-100" alt="">
                    </div> -->

                    <div class="offset-md-1 col-md-5 col-12 py-5 mt-5 border-end border-dark bord">
                        <div id="login" class="row align-items-center d-flex flex-column">


                            <div class="col-12 d-flex justify-content-center">
                                <h2 class=" fw-bold text_shadow text-black fs-1">Sign In to your account</h2>
                            </div>

                            <?php

                            $email = "";
                            $password = "";
                            $rememb = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["pass"])) {
                                $password = $_COOKIE["pass"];
                            }

                            if (isset($_COOKIE["check"])) {
                                $rememb = $_COOKIE["check"];
                            }

                            ?>

                            <div class="row mt-5">
                                <div class="col-12 ">Create
                                    <input class="form-control search-form-input shadow" id="em" value="<?php echo $email; ?>" type="Email" placeholder="       Email">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="pw" value="<?php echo $password; ?>" type="password" placeholder="       Password">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 mt-5 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme" <?php echo $rememb; ?> />
                                        <label class="form-check-label">Remember Me</label>
                                    </div>
                                    <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password</a>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <button class=" w-100 mb-5 btn createbtn" type="submit" onclick="signin();">SIGN IN</button>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <h6 class=""><a class=" text-black" href="adminLogin.php">Login as a Admin</a></h6>
                            </div>

                        </div>
                    </div>

                    <hr class="d-md-none">

                    <div class="col-md-5 col-12 py-5 mt-md-5">
                        <div id="regi" class="row align-items-center d-flex flex-column overflow-hidden">


                            <div class="col-12 d-flex justify-content-center">
                                <h2 class=" fw-bold text_shadow text-black fs-1">Create a new account</h2>
                            </div>

                            <div class="col-12 d-none mb-4" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                    </i>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="fn_s" type="text" placeholder="       Fisrt Name">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="ln_s" type="text" placeholder="       Last Name">
                                </div>
                            </div>


                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="ems_s" type="email" placeholder="       Email">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="mb_s" type="text" placeholder="       Mobile">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <input class="form-control search-form-input shadow" id="pw_s" type="password" placeholder="       Pasword">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <select class="form-select gen-select text-center shadow" id="gen_s">
                                        <?php

                                        $rs =  Database::search("SELECT * FROM `gender`");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {
                                            $data = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["gen"]); ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 ">
                                    <button class=" w-100 mb-5 btn createbtn" onclick="signUp();" type="submit">SIGN UP</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi" value="" />
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" value="" />
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc" value="" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <?php include "footer.php"; ?>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>