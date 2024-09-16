<!DOCTYPE html>
<html>
<body>

<?php
$num = 5;
$i = 1;

echo "<table border='1' style='border-collapse:collapse'>";
while ($i <= 10) {
	echo "<tr>";
    echo "<td>" . $num . " x " . $i . "</td>";
    echo "<td>" . ($num*$i) . "</td>";
    echo "</tr>";
    
	$i++;
}
echo "</table>";

?>

</body>
</html>