<?php
$text = $_POST["texto"];
$patron = "/\b([0-2][0-9]|(3)[0-1])\/(0[1-9]|1[0-2])\/([0-9]{4})\b/" ;

preg_match_all($patron, $text, $fecha);


print_r($fecha[0]);







?>