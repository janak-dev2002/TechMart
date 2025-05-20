<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

</head>

<body class="bg-body">

    <div class="container mt-5 d-none d-md-block">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="col-2">
                    <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
                </div>
                <div class="offset-md-1 col-5 d-flex justify-content-between">

                    <a href="index.php" class="fw-bold text-decoration-none clr">HOME</a>
                    <a href="productListning.php" class="fw-bold text-decoration-none text-black-50">SHOP</a>
                    <a href="cart.php" class="fw-bold text-decoration-none text-black-50">CART</a>
                    <a href="" class="fw-bold text-decoration-none text-black-50">BLOG</a>
                    <a href="" class="fw-bold text-decoration-none text-black-50">CONTACT</a>
                </div>
                <div class="offset-md-1 col-3 d-flex">

                    <div class="col-6 d-flex justify-content-center">
                        <span class="me-2"><a class="text-decoration-none text-black" href="logReg.php">Sign In</a></span>
                        <span>|</span>
                        <span class="ms-2"><a class="text-decoration-none text-black" href="logReg.php">Sign Up</a></span>
                    </div>

                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <span class="clr">Rs: 56700</span>
                        <a href="cart.php" class="offset-1 clr">
                            <i class="bi bi-cart4 position-relative clr" style="font-size: 20px;">
                                <span style="font-size: 11px;" class="clr-bg position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                                    3
                                </span>
                            </i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container d-md-none">
        <div class="row">
            <div class="col-12 offset-3 mt-5 mb-3">
                <img class="cursorrr" onclick="home();" src="reso/logo.png" style="width: 190px;" />
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-2">
                        <span class="clr-bg text-white fs-1"><i class="bi bi-list"></i></span>
                    </div>
                    <div class="offset-1 col-5">
                        <span class="me-2">Sign In</span>
                        <span>|</span>
                        <span class="ms-2">Sign Up</span>
                    </div>

                    <div class="col-3 d-flex justify-content-center">
                        <a href="#" class="clr">
                            <i class="bi bi-cart4 position-relative clr" style="font-size: 20px;">
                                <span style="font-size: 11px;" class="clr-bg position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                                    1
                                </span>
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>