<?php
session_start();

$advertencia = "";

$servidor = "db";
$usuario = "root";
$contrasena = "root";
$db = "mydatabase";

$conn = new mysqli($servidor, $usuario, $contrasena,$db);

$usu = $_SESSION['nombre'];

$sql1 = "SELECT * from peliculasUsuario where usuario = '$usu'";
$result1 = $conn -> query($sql1);





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['isan'])) {

        $isan = $_POST['isan'];
        $sql2 = "SELECT isan from peliculasUsuario where isan = '$isan'";
        $result2 = $conn -> query($sql2);
        $res2 = $result2->fetch_assoc();

        if (isset($_POST['isan']) && empty($_POST['nombre'])) {
            $sql3 = "DELETE FROM peliculasUsuario where isan='$isan'";
            $conn -> query($sql3);
            $advertencia = "Pelicula borrada.";
            
        }
    
    
        if (!empty($_POST['nombre']) && !empty($_POST['ano']) && !empty($_POST['puntuacion'])) {
    
            $ano = $_POST['ano'];
            $puntuacion = $_POST['puntuacion'];
            $nombre = $_POST['nombre'];

            if ($result2->num_rows > 0 && isset($_POST['nombre']) && isset($_POST['ano']) && isset($_POST['puntuacion'])) {

                $sql4 = "UPDATE peliculasUsuario set ano = '$ano', puntuacion = '$puntuacion', nombre_pelicula = '$nombre' where isan = '$isan'";
                $conn -> query($sql4);
                $advertencia = "Pelicula actualizada.";
                
                
                
            }
           
        
        
            if ( !empty($_POST['ano']) && !empty($_POST['puntuacion'])) {
                $sql5 = "INSERT INTO peliculasUsuario VALUES ('$usu','$isan','$nombre','$puntuacion','$ano')";
                $conn -> query($sql5);
                $advertencia = "Pelicula añadida.";
                
            }
        
        } 

    }
    
}
while($row = $result1->fetch_assoc()) {

    echo "Nombre: " . $row['nombre_pelicula'] . " / ISAN: " . $row['ISAN'] . " / Puntuacion: " . $row['puntuacion'] . " / Año: " . $row['ano'] . "<br>";

}

?>

<html>
    <body>

    <h1>Peliculas</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

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
        <p><?php echo $advertencia?></p>
    </form>
    </body>
</html>