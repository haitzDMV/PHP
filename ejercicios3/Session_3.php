<?php
session_start();

$bienvenido = "BIENVENIDO";
if (isset($_SESSION['idioma']) && isset($_SESSION['tema'])) {
    if ($_SESSION['idioma'] == 'euskera') {
        $bienvenido = "ONGI ETORRI";
    } else {
        $bienvenido = "BIENVENIDO";
    }
    if ($_SESSION['tema'] == "oscuro") {
        $tema = '#000';
        $letra = 'white';
    }
}





?>

<html>
    <title>Cookie 3</title>
<body style="background-color: <?php echo $tema ?>;color:<?php echo $letra?>">

<form action="guardarsession.php" method="POST">
<h1><?php echo $bienvenido ?></h1>

<p>Selecciona tema:
<p>Tema claro<input type="radio" name="tema" value="claro"></p>
<p>Tema oscuro<input type="radio" name="tema" value="oscuro"></p>
<p>Selecciona idioma:
<p>Espanol<input type="radio" name="idioma" value="espanol"></p>
<p>Euskera<input type="radio" name="idioma" value="euskera"></p>

<input type="submit" value="ACEPTAR" name="aceptar">

</form>

<?php




?>

</body>
</html>
