    <?php

require "connection.php";

if (isset($_GET["br"])) {

    $mini_id = $_GET["br"];

    $mini_rs = Database::search("SELECT * FROM `brand` WHERE `mini_category_id` = '" . $mini_id . "'");
    $mini_num = $mini_rs->num_rows;

    if ($mini_num > 0) {

        for ($x = 0; $x < $mini_num; $x++) {

            $mini_data = $mini_rs->fetch_assoc();

?>
            <option value="<?php echo ($mini_data["id"]); ?>"><?php echo ($mini_data["name"]); ?></option>
        <?php

        }
    } else if($mini_num == 0) {


        ?>
        <option value="0">Select Brand</option>

        <?php

        $all_brands = Database::search("SELECT * FROM `brand`");
        $all_num = $all_brands->num_rows;

        for ($y = 0; $y < $all_num; $y++) {

            $all_model_data = $all_brands->fetch_assoc();

        ?>

            <option value="<?php echo ($all_model_data["id"]); ?>"><?php echo ($all_model_data["name"]); ?></option>
<?php
        }
    }
}

?>