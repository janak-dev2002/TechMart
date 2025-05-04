<?php

require "connection.php";

if (isset($_GET["c"])) {

    $category_id = $_GET["c"];

    $sub_rs = Database::search("SELECT * FROM `sub_category` WHERE `Category_id` = '" . $category_id . "'");
    $sub_num = $sub_rs->num_rows;

    if ($sub_num > 0) {

        for ($x = 0; $x < $sub_num; $x++) {

            $sub_data = $sub_rs->fetch_assoc();

?>
            <option value="<?php echo ($sub_data["id"]); ?>"><?php echo ($sub_data["sub_name"]); ?></option>
        <?php

        }
    } else {


        ?>
        <option value="0">Select Sub Category</option>

        <?php

        $all_sub_rs = Database::search("SELECT * FROM `sub_category`");
        $all_sub_num = $all_sub_rs->num_rows;

        for ($y = 0; $y < $all_sub_num; $y++) {

            $all_sub_data = $all_sub_rs->fetch_assoc();


        ?>

            <option value="<?php echo ($all_sub_data["id"]); ?>"><?php echo ($all_sub_data["sub_name"]); ?></option>
<?php
        }
    }
}

?>