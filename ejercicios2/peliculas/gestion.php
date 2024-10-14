<?php



function conn() {
    $servidor = "db";
    $usuario = "root";
    $contrasena = "root";
    $db = "mydatabase";

    $conn = new mysqli($servidor, $usuario, $contrasena,$db);
    return $conn;
}

function mostrar($usu) {
    $conn = conn();
    $sql1 = "SELECT * from peliculasUsuario where usuario = '$usu'";
    $result1 = $conn->query($sql1);

    while ($row = $result1->fetch_assoc()) {
        echo "Nombre: " . $row['nombre_pelicula'] . " / ISAN: " . $row['ISAN'] . " / Puntuacion: " . $row['puntuacion'] . " / Año: " . $row['ano'] . "<br>";
    }
}

function devuelveISAN($isan) {
    $conn = conn();
    $sql2 = "SELECT isan from peliculasUsuario where isan = '$isan'";
    return $conn->query($sql2);
}

function delete($isan) {
    $conn = conn();
    $sql3 = "DELETE FROM peliculasUsuario where isan='$isan'";
    $conn->query($sql3);
}

function update($isan,$ano,$puntuacion,$nombre) {
    $conn = conn();
    $sql4 = "UPDATE peliculasUsuario set ano = '$ano', puntuacion = '$puntuacion', nombre_pelicula = '$nombre' where isan = '$isan'";
    $conn->query($sql4);
}

function insert($isan,$ano,$puntuacion,$nombre) {
    $conn = conn();
    $sql5 = "INSERT INTO peliculasUsuario VALUES ('$usu','$isan','$nombre','$puntuacion','$ano')";
    $conn->query($sql5);
}


?>