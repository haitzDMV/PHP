<?php
$num1 = $_POST["num1"];
$rand = random_int(1,5);

if ($num1 == $rand) {
    echo "Has acertado";
} else {
    echo "No has acertado, el numero era: " . $rand;
}


?>