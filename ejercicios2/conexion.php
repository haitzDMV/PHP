<?php
$servidor = "db";
$usuario = "root";
$contrasena = "root";
$db = "mydatabase";

$correo = $_POST["correo"];
$nombre = $_POST["usu"];
$contra = $_POST["contra1"];

// Create connection
$conn = new mysqli($servidor, $usuario, $contrasena,$db);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}


$sql = "INSERT INTO formulario (usuario, email, contrasena)
VALUES ($nombre, $email, $contra)";

if ($conn->query($sql) === TRUE) {
  echo "Insertado correctamente.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>