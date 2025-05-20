<?php

require "connection.php";

if (isset($_GET["mo"])) {

    $mini_id = $_GET["mo"];

    $mini_rs = Database::search("SELECT * FROM `model` WHERE `brand_id` = '" . $mini_id . "'");
    $mini_num = $mini_rs->num_rows;

    if ($mini_num > 0) {

        for ($x = 0; $x < $mini_num; $x++) {

            $mini_data = $mini_rs->fetch_assoc();

?>
          

            <?php

            ?>
            <option value="<?php echo ($mini_data["id"]); ?>"><?php echo ($mini_data["name"]); ?></option>
        <?php

        }
    } else {


        ?>
        <option value="0">Select Model</option>

        <?php

        $all_models = Database::search("SELECT * FROM `model`");
        $all_num = $all_models->num_rows;

        for ($y = 0; $y < $all_num; $y++) {

            $all_model_data = $all_brands->fetch_assoc();


        ?>

            <option value="<?php echo ($all_model_data["id"]); ?>"><?php echo ($all_model_data["name"]); ?></option>
<?php
        }
    }
}

?>