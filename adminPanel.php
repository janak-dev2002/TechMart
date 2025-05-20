    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TechMart | Admin Panel</title>
        <link rel="icon" href="reso/Logo.png">

        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    </head>

    <body>


        <div class="container-fluid">
            <div class="row">

                <?php

                session_start();
                if (isset($_SESSION["au"])) {

                ?>




                    <div id="side_panel" class="col-2 clr-bg py-4 px-4 d-none d-md-block">
                        <div class="row ">
                            <div class="col-12 mb-5">
                                <h2 class="text-white "><i class="bi bi-android2"></i> &nbsp; Tech Mart</h2>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 bg-white rounded-5 d-flex align-items-center" style="height: 50px;">
                                    <h3 class="text-black-50"><i class="bi bi-speedometer2"></i> &nbsp; Dashboard</h3>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-people-fill"></i> &nbsp; &nbsp; Customers</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-file-earmark-text"></i> &nbsp; &nbsp; Products</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-bag"></i> &nbsp; &nbsp; Orders</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="productRegister.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-plus-circle"></i> &nbsp; &nbsp; Add Product</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="updateProduct.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-pencil-square"></i> &nbsp; &nbsp; Update Product</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="manageUsers.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-card-text"></i> &nbsp; &nbsp; Manage Users</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="manageProducts.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-card-text"></i> &nbsp; &nbsp; Manage Product</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="productListning.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-house"></i> &nbsp; &nbsp; To Shopping</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="settings.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-gear"></i> &nbsp; &nbsp; Settings</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a class="text-decoration-none text-white" href="adminLogin.php" style="font-size: 23px; cursor: pointer;" class="text-white"><i class="bi bi-box-arrow-left"></i> &nbsp; &nbsp; Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="main_view" class="col-10 offset-1 offset-md-0">
                        <div class="row">

                            <div class="col-12 mb-5">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-4 col-3 d-none d-md-block">
                                        <h2 id="dash_btn_1" class="text_shadow d-none d-md-block" onclick="menudash1();"><i class="bi bi-list"></i> Dashboard</h2>
                                        <h2 id="dash_btn_2" class="text_shadow d-none" onclick="menudash2();"><i class="bi bi-list"></i> Dashboard</h2>

                                    </div>
                                    <div class="col-lg-4 d-none d-lg-block col-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text rounded-5" id="basic-addon1"><i class="bi bi-search"></i></span>&nbsp;
                                            <input type="text" class="form-control rounded-5" placeholder="     Search here">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-9 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-1 col-3 offset-lg-4">
                                                        <img src="reso/user.svg" class="rounded-circle" style="scale: 0.7;">
                                                    </div>
                                                    <div class="col-8 col-lg-5">
                                                        <div class="row d-flex flex-column">
                                                            <div class="col-12 mt-4 ms-4 ms-md-0">
                                                                <h6 class="text-black text_shadow">Janaka Sangeeth</h6>
                                                            </div>
                                                            <div class="col-12 ms-4 ms-md-0">
                                                                <h6 class="text-black-50">Super Admin</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3 d-md-none">
                                        <div class="row">
                                            <select class="form-select text-center border border-start-0 border-top-0 border-end-0 border-2 border-primary shadow-none rounded-4" style="height: 30px; font-size: 14px;">
                                                <option value="">Dashboard</option>
                                                <option value="">Product Add</option>
                                                <option value="">Product Update</option>
                                                <option value="">Manage Product</option>
                                                <option value="">Mange Users</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-10 col-12 offset-lg-1 mt-4 mt-md-5">
                                <div class="row d-flex justify-content-between">

                                    <div id="cust" class="col-lg-2 col-6 offset-lg-0  ">
                                        <div class="row shadow rounded-4">
                                            <div class="col-12">
                                                <div class="row d-flex">
                                                    <div class="col-6 mt-5 mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2>57</h2>
                                                            </div>
                                                            <div class="col-12">
                                                                <h3 class="text-black-50">Customers</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-5 mb-5 d-flex justify-content-center align-items-center">
                                                        <div class="row ">
                                                            <i style="font-size: 40px;" class="bi bi-people-fill clr"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="prod" class="col-lg-2 col-6 ">
                                        <div class="row shadow rounded-4">
                                            <div class="col-12">
                                                <div class="row d-flex">
                                                    <div class="col-6 mt-5 mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2>180</h2>
                                                            </div>
                                                            <div class="col-12">
                                                                <h3 class="text-black-50">Products</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-5 mb-5 d-flex justify-content-center align-items-center">
                                                        <div class="row ">
                                                            <i style="font-size: 40px;" class="bi bi-card-list clr"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="orde" class="col-lg-2 col-6 ">
                                        <div class="row shadow rounded-4">
                                            <div class="col-12">
                                                <div class="row d-flex">
                                                    <div class="col-6 mt-5 mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2>1879</h2>
                                                            </div>
                                                            <div class="col-12">
                                                                <h3 class="text-black-50">Orders</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-5 mb-5 d-flex justify-content-center align-items-center">
                                                        <div class="row ">
                                                            <i style="font-size: 40px;" class="bi bi-bag clr"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="inco" class="col-lg-2 col-6 clr-bg shadow rounded-4">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="row d-flex">
                                                    <div class="col-6 mt-5 mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2 class="text-white">Rs.12000</h2>
                                                            </div>
                                                            <div class="col-12">
                                                                <h3 class="text-white">Income</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-5 mb-5 d-flex justify-content-center align-items-center">
                                                        <div class="row ">
                                                            <i style="font-size: 40px;" class="bi bi-cash-coin text-white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="col-lg-10 col-12 offset-lg-1 mt-5">
                                <div class="row">

                                    <div class="col-12 ">
                                        <div class="row d-flex justify-content-between">

                                            <div class="col-lg-7 col-12 shadow rounded-4">
                                                <div class="row mt-3">

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h3>Recent Orders</h3>
                                                            </div>
                                                            <div class="col-6 d-flex justify-content-end">
                                                                <a href="" class="btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">See all <i class="bi bi-arrow-right-short"></i></a>
                                                            </div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row ">

                                                            <div class="col-4">
                                                                <h5>Products</h5>
                                                            </div>
                                                            <div class="col-4">
                                                                <h5>Customer Name</h5>
                                                            </div>
                                                            <div class="col-4">
                                                                <h5>Status</h5>
                                                            </div>

                                                            <div class="col-12">
                                                                <hr>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Gaming PC - 8GB RAM / 120GB SSD + 500GB HDD / Nvidia! / Intel i5</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Janaka Sangeeth</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Oculus Quest 2 128GB Headset Only VR Virtual Reality</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Wanidu Hasaranga</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-danger bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Wating review</h6>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">128GB Headset Only VR Virtual Reality</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Kusal Janith</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">To be shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>



                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Gaming PC - 8GB RAM / 120GB SSD + 500GB HDD / Nvidia! / Intel i5</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Janaka Sangeeth</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Gaming PC - 8GB RAM / 120GB SSD + 500GB HDD / Nvidia! / Intel i5</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Janaka Sangeeth</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Oculus Quest 2 128GB Headset Only VR Virtual Reality</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Wanidu Hasaranga</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-danger bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Wating review</h6>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">128GB Headset Only VR Virtual Reality</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Kusal Janith</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">To be shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>



                                                    <!-- Data Row-------------- -->


                                                    <div class="col-12 mb-3">
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Gaming PC - 8GB RAM / 120GB SSD + 500GB HDD / Nvidia! / Intel i5</h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <h6 class="text-black-50">Janaka Sangeeth</h6>
                                                            </div>
                                                            <div class="col-4 d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success bi bi-dot" viewBox="0 0 16 16">
                                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                                </svg>
                                                                <h6 class="text-black-50 mt-1">Shipped</h6>
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12 shadow rounded-4 mt-4 mt-md-0">
                                                <div class="row mt-3">

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <h3> Customers</h3>
                                                            </div>
                                                            <div class="col-7 d-flex justify-content-end">
                                                                <a href="" class=" col-4 btn btn-outline-dark btn-dark btnclr text-center text-decoration-none" style="font-size: 16px;">See all</a>
                                                            </div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">

                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Users---------------------------------------------------- -->

                                                    <div class="col-12">
                                                        <div class="row d-flex">
                                                            <div class="col-2 d-flex justify-content-start">
                                                                <img src="reso/user.svg" class="rounded-circle" style="scale: 0.6;">
                                                            </div>
                                                            <div class="col-6 d-flex flex-column justify-content-center px-5">
                                                                <div class="row">
                                                                    <div class="col-12 mt-4">
                                                                        <h5 class="text-black">Janaka Sangeeth</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="rating ">
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                            <i class="bi bi-star-fill text-warning"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex align-items-center">
                                                                <div class="row">


                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-person-circle"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-chat-dots"></i></span>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <span class="fs-4"><i class="bi bi-telephone"></i></span>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
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