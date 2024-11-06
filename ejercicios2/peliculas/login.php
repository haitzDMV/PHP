<?php

$servidor = "db";
$usuario = "root";
$contrasena = "root";
$conn = new mysqli($servidor, $usuario, $contrasena);

$sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
$conn->query($sql);

$server = 'db';
$usu = 'root';
$passwd = 'root';
$db = 'mydatabase';

$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$conn = new mysqli($server,$usu,$passwd,$db);

$query = 'CREATE TABLE IF NOT EXISTS usuarios (
    usuario varchar(20),
    contrasena varchar(30),
    PRIMARY KEY(usuario)
)';
$conn->query($query);

$sql2 ="SELECT usuario from usuarios where usuario = '$nombre' and contrasena = $contrasena";

$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc(); 
    $_SESSION['usuario'] = $row['usuario']; 
    header( "refresh:3;index.php" );
    echo "Sesión iniciada.";
} else {
    header( "refresh:3;formularios.html" );
    echo "Nombre de usuario o contraseña incorrectos.";
}



?>
