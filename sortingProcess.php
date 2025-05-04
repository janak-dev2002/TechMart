<?php

session_start();

if (isset($_SESSION["au"])) {

    $email = $_SESSION["au"]["email"];

    require "connection.php";

    $search = $_POST["s"];
    $time = $_POST["t"];
    $qty = $_POST["q"];
    $condition = $_POST["c"];

    // echo $search;

    $query = "SELECT * FROM `product` WHERE `admin_email` = '" . $email . "'";

    // echo $query;

    if (!empty($search)) {
        $query .= " AND `title` LIKE '%" . $search . "%'";
    }

    if ($condition != "0") {

        $query .= " AND `condition_id` = '" . $condition . "'";
    }

    if ($time != "0") {
        if ($time == "1") {
            $query .= " ORDER BY `datetime_added` DESC";
        } else if ($time == "2") {
            $query .= " ORDER BY `datetime_added` ASC";
        }
    }


    if ($time != "0" && $qty != "0") {
        if ($qty == "1") {
            $query .= " , `qty` DESC";
        } else if ($qty == "2") {
            $query .= " , `qty` ASC";
        }
    } else if ($time == "0" && $qty != "0") {
        if ($qty == "1") {
            $query .= " ORDER BY `qty` DESC";
        } else if ($qty == "2") {
            $query .= " ORDER BY `qty` ASC";
        }
    }



?>

    <!-- Product View -->

    <div class="col-12 px-lg-5">
        <div class="row d-flex justify-content-between">


            <?php


            if ("0" != ($_POST["page"])) {

                $pageno = $_POST["page"];
            } else {

                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;



            $results_per_page = 6;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;


            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
            $selected_num = $selected_rs->num_rows;

            // echo $selected_num;

            for ($x = 0; $x < $selected_num; $x++) {

                $selected_data = $selected_rs->fetch_assoc();

                // echo $selected_data["title"];
            ?>




                                        <!-- Card---------///////////////////////////////////////////////////////////// -->

                                        <div class="col-md-5 col-12 mt-5 shadow rounded-5 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-4 col-12 ">
                                                            <div class="row">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class=" border-0" style="width: 10rem; height: 12rem;">
                                                                        <?php

                                                                        $product_img_rs = Database::search("SELECT * FROM  `images` WHERE `product_id` = '" . $selected_data["id"] . "'");
                                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                                        ?>
                                                                        <img src="<?php echo $product_img_data["code"]; ?>" class="card-img-top cartimg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 offset-md-1 col-12 p-3">
                                                            <div class="row">
                                                                <div class="col-12 ms-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h6 class="text_shadow"><?php echo $selected_data["title"]; ?></h6>
                                                                        </div>
                                                                        <div class="col-12 mt-1">
                                                                            <h6 style="font-size: 14px;" class="text-black-50">Item Price : <span>Rs. <?php echo $selected_data["price"]; ?>.00</span></h6>
                                                                        </div>
                                                                        <div class="col-12 mt-1">
                                                                            <h6 style="font-size: 14px;" class="text-black-50"><?php echo $selected_data["qty"]; ?> item(s) Left</h6>
                                                                        </div>
                                                                        <div class="col-11 d-flex mt-1">
                                                                            <label style="font-size: 15px;" class="form-check-label fw-bold clr" for="fd<?php echo ($selected_data["id"]); ?>">Make your product <?php if ($selected_data["status_id"] == 2) {
                                                                                                                                                                                                                        echo "Deactivate";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "Activate";
                                                                                                                                                                                                                    } ?>
                                                                            </label>

                                                                            <div class="col-1 d-flex justify-content-end form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo ($selected_data["id"]); ?>" <?php if ($selected_data["status_id"] == 2) { ?>checked<?php } ?> onclick="changeStatus(<?php echo ($selected_data['id']); ?>)">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row me-3">
                                                                                <div class="col-6 d-grid">
                                                                                    <a onclick="sendId(<?php echo $selected_data['id']; ?>);" class="btn btn-outline-dark clr-bg rounded-5 border-0" style="height: 33px;">Update</a>
                                                                                </div>
                                                                                <div class="col-6 d-grid">
                                                                                    <a onclick="removeItem(<?php echo $selected_data['id']; ?>);" class="btn btn-outline-dark btn-danger rounded-5 border-0" style="height: 33px;">Remove</a>
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
            }
        } else {

            echo ("Wedananee bn");
        }

        ?>



        </div>
    </div>

    <div class="col-11 mt-3">
        <div class="row ">

            <div class="col-12 mt-3 d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                    echo ("#");
                                                                } else {
                                                                    echo ("?page=" . ($pageno - 1));
                                                                } ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php

                                for ($x = 1; $x <= $number_of_pages; $x++) {

                                    if ($x == $pageno) {

                                ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                        </li>
                                    <?php
                                    } else {

                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                        </li>
                                <?php
                                    }
                                }

                                ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                    echo ("#");
                                                                } else {
                                                                    echo ("?page=" . ($pageno + 1));
                                                                } ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Product View -->