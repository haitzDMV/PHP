<?php
session_start();

if (isset($_POST['aceptar'])) {
    $_SESSION['usuario'] = $_POST['usuario'];

    if (isset($_POST['usuario']) || isset($_POST['contrasena'])) {
        if ($_SESSION['usuario'] == 'admin' && $_POST['contrasena'] == '1234') {
        header('Location: sesioniniciada.php');
        } else {
            echo "mal";
        }
    }
    
}



?>

<html>
    <title>Session 2</title>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p>Nombre: <input type="text" name="usuario"></p>
<p>Contrasena: <input type="text" name="contrasena"></p>
<input type="submit" value="Iniciar sesión" name="aceptar">

</form>

<?php




?>

</body>
</html>
