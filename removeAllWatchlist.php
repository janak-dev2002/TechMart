<?php

$rows = $_POST["num"];

for($x = 0; $x < $rows; $x++){

    echo $_POST["a".$x];
}

?>