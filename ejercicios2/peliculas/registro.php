<?php 

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

    $nombre = $_POST["nombre"];
    $contra = $_POST["contrasena"];

    // Create connection
    $conn = new mysqli($servidor, $usuario, $contrasena,$db);

    $query = 'CREATE TABLE IF NOT EXISTS usuarios (
        usuario varchar(20),
        contrasena varchar(30),
        PRIMARY KEY(usuario)
    )';
    $conn->query($query);

    // Check connection
    if ($conn->connect_error) {
        die("<br>Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (usuario, contrasena)
    VALUES ('$nombre', '$contra')";
    $sql2 = "SELECT usuario from usuarios where usuario = '$nombre'";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        header( "refresh:5;formularios.html" );
        echo "El usuario ya existe.";
    } else {
        if ($conn->query($sql) === TRUE) {
            header( "refresh:5;formularios.html" );
            echo "Insertado correctamente.";
        } else {
            header( "refresh:5;formularios.html" );
            echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }
    }

    

    $conn->close();

            
        
      ?>