<?php


$mainCategory_rs = Database::search("SELECT * FROM `category`");
$mainCategory_num = $mainCategory_rs->num_rows;

for ($x = 0; $x < $mainCategory_num; $x++) {

    $mainCategory_data = $mainCategory_rs->fetch_assoc();

?>

    <div class="col-12 mt-2">
        <!-- Split dropend button -->
        <div class="btn-group dropend col-12 d-flex justify-content-between">

            <h6 type="button" class="text-uppercase"><img src="<?php echo $mainCategory_data["icon_path"] ?>"> &nbsp;<?php echo $mainCategory_data["name"]; ?></h6>
            <h6 type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"></span>
            </h6>
            <div class="dropdown-menu dropdown-large" style="width: 900px;">
                <div class="row p-3">

                    <div class="col-12">
                        <div class="row d-flex justify-content-around">

                            <?php
                            $subCategory_rs = Database::search("SELECT * FROM `sub_category` WHERE `Category_id` = '" . $mainCategory_data["id"] . "'");
                            $subCategory_num = $subCategory_rs->num_rows;

                            for ($y = 0; $y < $subCategory_num; $y++) {

                                $subCategory_data = $subCategory_rs->fetch_assoc();

                            ?>

                                <div class="col-4">
                                    <div class="subcat-title">

                                        <h6 onclick="selectSubCategory('<?php echo $subCategory_data['id']; ?>');" class=" text-uppercase"><a href="#" class="subcat-titl text-decoration-none p-2 text-black fw-bold"><?php echo $subCategory_data["sub_name"]; ?></a></h6>

                                    </div>
                                    <ul class="list-unstyled list-group list-group-flush p-2">

                                        <?php
                                        $miniCategory_rs = Database::search("SELECT * FROM `mini_category` WHERE `Sub_category_id` = '" . $subCategory_data["id"] . "'");
                                        $miniCategory_num = $miniCategory_rs->num_rows;

                                        for ($z = 0; $z < $miniCategory_num; $z++) {

                                            $miniCategory_data = $miniCategory_rs->fetch_assoc();

                                        ?>
                                            <li onclick="selectCategory('<?php echo $miniCategory_data['mini_name']; ?>',<?php echo $miniCategory_data['id']; ?>);" class="cursorrr"><a class="text-dark text-decoration-none a_fo fs-6 text-uppercase"><?php echo $miniCategory_data["mini_name"]; ?></a></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                    <br>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr />
    </div>

<?php
}

?>