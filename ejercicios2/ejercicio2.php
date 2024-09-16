<!DOCTYPE html>
<html>
<body>

<?php
$datos = array(
	array("Jon",20,"Bilbao"),
    array("Ane",32,"Donosti"),
    array("Urko",20,"Gasteiz"),
    array("Miren",32,"Donosti"),
);
$i = 0;

echo "<table border='1' style='border-collapse:collapse'>";
echo "<tr>";
	echo "<td>Nombre</td>";
	echo "<td>Edad</td>";
	echo "<td>Ciudad</td>";
echo "</tr>";
while ($i < count($datos)) {
	echo "<tr>";
    echo "<td>" . $datos[$i][0] . "</td>";
	echo "<td>" . $datos[$i][1] . "</td>";
	echo "<td>" . $datos[$i][2] . "</td>";
    echo "</tr>";
    
	$i++;
}
echo "</table>";

?>

</body>
</html>