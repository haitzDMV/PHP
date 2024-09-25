<?php
session_start();

if (!isset($_SESSION['cont'])) {
    $_SESSION['cont'] = 0;
}

if (isset($_POST['reinicio'])) {
    $_SESSION['cont'] = 0;
}

if ($_SESSION['cont'] == 0) {
    $_SESSION['cont']++;
    echo "Es la primera visita";
} else {
    $_SESSION['cont']++;
    echo "Es la visita numero: ".$_SESSION['cont'];
}


?>

<html>
    <title>Cookies 1</title>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

<input type="submit" value="Reiniciar contador" name="reinicio">

</form>

<?php




?>

</body>
</html>
