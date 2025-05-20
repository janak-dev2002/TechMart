<?php

require "connection.php";

if (isset($_GET["br"]) && isset($_GET["mid"])) {

    $brnd_name = $_GET["br"];
    $miniCat_id = $_GET["mid"];

    Database::iud("INSERT INTO `brand` (`name`) VALUES ('".$brnd_name."')");

    $brand_rs = Database::search("SELECT * FROM `brand`");
    $brand_num = $brand_rs->num_rows;
    for ($x = 0; $x < $brand_num; $x++) {

        $brand_data = $brand_rs->fetch_assoc();

    ?>
    <!-- <option value="0">Select Brand</option> -->
        <option value="<?php echo ($brand_data["id"]); ?>"><?php echo ($brand_data["name"]); ?></option>
    <?php

    }

}

?>