<?php
function conn() {
    $servidor = "db";
    $usuario = "root";
    $contrasena = "root";
    $conn = new mysqli($servidor, $usuario, $contrasena);

    $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
    $conn->query($sql);

    $servidor = "db";
    $usuario = "root";
    $contrasena = "root";
    $db = "mydatabase";

    $conn = new mysqli($servidor, $usuario, $contrasena,$db);
    

    $query = "CREATE TABLE IF NOT EXISTS peliculasUsuario (
        usuario varchar(20),
        ISAN varchar(255),
        nombre_pelicula varchar(255),
        puntuacion int,
        ano int,
        PRIMARY KEY (usuario, ISAN),
        CONSTRAINT `peliculasUsuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`)
        )";
        $conn->query($query);

    return $conn;

}

function mostrarPeliculas($usu) {
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
    if ($conn->query($sql2) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

function deletePelicula($isan) {
    $conn = conn();
    $sql3 = "DELETE FROM peliculasUsuario where isan='$isan'";
    $conn->query($sql3);
    if ($conn->query($sql3) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

function updatePelicula($isan,$ano,$puntuacion,$nombre) {
    $conn = conn();
    $sql4 = "UPDATE peliculasUsuario set ano = '$ano', puntuacion = '$puntuacion', nombre_pelicula = '$nombre' where isan = '$isan'";
    $conn->query($sql4);
    if ($conn->query($sql4) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

function insertarPelicula($isan, $ano, $puntuacion, $nombre, $usu) {
    $conn = conn();
    $sql5 = "INSERT INTO peliculasUsuario (usuario, ISAN, nombre_pelicula, puntuacion, ano) VALUES ('$usu', '$isan', '$nombre', '$puntuacion', '$ano')";

    if ($conn->query($sql5) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

?>