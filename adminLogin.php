<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart | Admin Login</title>

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

</head>

<body class="admin_bg">


<div class="container-fluid position-absolute p-5">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <img src="reso/LOGO.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row">

            <div class="col-12 mt-5 mb-5">
                <div class="row">

                    <div class="col-md-6 col-12 b mt-5">
                        <div class="row">
                            <div class="col-12 mt-5 mb-3 d-flex d-md-block justify-content-center">
                                <div class="row ">
                                    <h1 class="text-white text_shadow text-decoration-underline">Admin Login</h1>
                                </div>
                            </div>

                            <div class="col-12 mt-5 d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <h3 class="clr">Username</h3>
                                </div>
                            </div>
                            <div class="col-12 mt-2  d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <input type="email" class="form-control rounded-5 bg- text-black" placeholder="we have given username" id="email">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-5  d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <h3 class="clr">Password</h3>
                                </div>
                            </div>
                            <div class="col-12 mt-2  d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <input type="password" class="form-control rounded-5 bg- text-black" placeholder="passsword" id="pass">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4  d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <div class="col-md-5 col-12 mt-1  d-flex d-md-block justify-content-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberme" />
                                            <label class="form-check-label text-white-50">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12  d-flex d-md-block justify-content-center">
                                        <a href="#" class="link-dark">Forgot Password</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-5 d-flex d-md-block justify-content-center">
                                <div class="row">
                                    <div class="col-md-8 col-12 d-flex justify-content-center">
                                        <button class=" w-100 mb-5 btn createbtn btn-outline-dark border-0" type="submit" onclick="signinAsadmin();">SIGN IN</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10">
                                        <h6 class="text-white-50">Do you have any problem ? &nbsp;<a class="link-light" href="">+94762228848</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-md-8 col-12 d-flex justify-content-center">
                                        <a href="" class="link-light">jarvissolutioninfo@gmail.com</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mt-5  d-flex d-md-none justify-content-center">
                                <div class="row mt-5">
                                    <h6 class="text-white mt-5">
                                        Copyright &copy; 2022 New Tech All Rights Reserved
                                    </h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-none mt-5 d-md-flex justify-content-center">
                <div class="row mt-5">
                    <h6 class="text-white mt-5">
                        Copyright &copy; 2022 New Tech All Rights Reserved
                    </h6>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>