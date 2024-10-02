<?php
$server = 'db';
$usu = 'root';
$passwd = 'root';
$db = 'mydatabase';

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$conn = new mysqli($server,$usu,$passwd,$db);

$sql2 ="SELECT usuario from formulario where email = '$email' and contrasena = $contrasena";

$result = $conn->query($sql2);


if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc(); 
    $_SESSION['nombre'] = $row['usuario']; 
    header( "refresh:5;index.php" );
    echo "Sesión iniciada.";
} else {
    header( "refresh:5;index.php" );
    echo "Nombre de usuario o contraseña incorrectos.";
}



/* OTRA FORMA
$err = 0;

$sql = 'select usuario, contrasena from formulario';
$result = $conn->query($sql);

if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['usuario']==$nombre && $row['contrasena'] == $contrasena) {
            session_start();
            $_SESSION['nombre'] = $nombre;
            header( "refresh:5;index.php" );
            echo 'Sesión iniciada correctamente.';
            $err = 1;
        }
    }
}

if ($err == 0) {
header( "refresh:5;formularios.html" );
echo 'Login incorrecto.';
}
*/




?>
