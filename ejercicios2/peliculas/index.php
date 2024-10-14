<?php
session_start();

include "gestion.php";

$advertencia = "";

$servidor = "db";
$usuario = "root";
$contrasena = "root";
$db = "mydatabase";

$conn = new mysqli($servidor, $usuario, $contrasena, $db);

$usu = $_SESSION['usuario'];


mostrarPeliculas($usu);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['isan'])) {

        $isan = $_POST['isan'];
        $result2 = devuelveISAN($isan);

        if (isset($_POST['isan']) && empty($_POST['nombre'])) {            
            if (deletePelicula($isan)) {
                $advertencia = "Pelicula borrada.";
            } else {
                $advertencia = "Error, no se ha podido borrar.";
            }
        }

        if (!empty($_POST['nombre']) && !empty($_POST['ano']) && !empty($_POST['puntuacion'])) {

            $ano = $_POST['ano'];
            $puntuacion = $_POST['puntuacion'];
            $nombre = $_POST['nombre'];

            if ($result2->num_rows > 0 && isset($_POST['nombre']) && isset($_POST['ano']) && isset($_POST['puntuacion'])) {
                if (updatePelicula($isan,$ano,$puntuacion,$nombre)) {
                    $advertencia = "Pelicula actualizada.";
                } else {
                    $advertencia = "Error, no se ha podido actualizar.";
                }
            }

            if (!empty($_POST['ano']) && !empty($_POST['puntuacion'])) {
                if (updatePelicula($isan,$ano,$puntuacion,$nombre)) {
                    $advertencia = "Pelicula insertada.";
                } else {
                    $advertencia = "Error, no se ha podido insertar.";
                }
            }
        }
    }
}


?>

<html>

<body>

    <h1>Peliculas</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        Nombre: <input type="text" name="nombre">
        <br><br>
        ISAN:
        <input type="text" name="isan">
        <br><br>
        Año:
        <input type="text" name="ano">
        <br><br>
        Puntuación:
        <select name="puntuacion">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <form method="post" action="formularios.html">
        <input type="submit" name="close" value="Cerrar sesion">
        <p><?php echo $advertencia ?></p>
    </form>
</body>

</html>