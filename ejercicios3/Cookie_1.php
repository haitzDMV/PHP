<?php

if (isset ($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador']+1;
} else {
    $contador=1;
}
setcookie('contador',$contador);


if (isset($_POST['reinicio'])) {
    setcookie('contador','');
    $contador=0;
    header('Refresh: 0');
}


?>

<html>
    <title>Session 1</title>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

<input type="submit" value="Reiniciar contador" name="reinicio">

</form>

<?php
if ($contador > 1) {
    echo "Has visitado la pagina: ".$contador." veces.";
} else {
    echo "Es tu primera visita";
}

?>

</body>
</html>
