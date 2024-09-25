<?php


if (isset($_POST['aceptar'])) {

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($usuario == 'admin' && $contrasena == "1234") {
        setcookie('usuario',$usuario);
        header('Location: sesioniniciada2.php');
    } else {
        echo "ERROR";
    }
}


?>

<html>
    <title>Cookie 2</title>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p>Nombre: <input type="text" name="usuario"></p>
<p>Contrasena: <input type="text" name="contrasena"></p>
<input type="submit" value="Iniciar sesión" name="aceptar">

</form>

</body>
</html>