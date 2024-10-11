<?php
$server = 'db';
$usu = 'root';
$passwd = 'root';
$db = 'mydatabase';

$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$conn = new mysqli($server,$usu,$passwd,$db);

$sql2 ="SELECT usuario from usuarios where usuario = '$nombre' and contrasena = $contrasena";

$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc(); 
    $_SESSION['usuario'] = $row['usuario']; 
    header( "refresh:5;index.php" );
    echo "Sesión iniciada.";
} else {
    header( "refresh:5;index.php" );
    echo "Nombre de usuario o contraseña incorrectos.";
}



?>
