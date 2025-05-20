<?php

require "connection.php";

if (isset($_GET["mtxt"])) {

    $model_txt = $_GET["mtxt"];

    Database::iud("INSERT INTO `model` (`name`) VALUES ('" . $model_txt . "')");

    $brnd_rs = Database::search("SELECT * FROM `model`");
    $brnd_num = $brnd_rs->num_rows;

    for ($x = 0; $x < $brnd_num; $x++) {

        $brnd_data = $brnd_rs->fetch_assoc();

?>

        <option value="<?php echo ($brnd_data["id"]); ?>"><?php echo ($brnd_data["name"]); ?></option>
<?php
    }
}

?>