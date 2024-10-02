<?php 
    $servidor = "db";
    $usuario = "root";
    $contrasena = "root";
    $db = "mydatabase";

    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $contra = $_POST["contrasena"];

    // Create connection
    $conn = new mysqli($servidor, $usuario, $contrasena,$db);


    // Check connection
    if ($conn->connect_error) {
        die("<br>Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO formulario (usuario, email, contrasena)
    VALUES ('$nombre', '$email', '$contra')";

    if ($conn->query($sql) === TRUE) {
        header( "refresh:5;formularios.html" );
        echo "Insertado correctamente.";
    } else {
        header( "refresh:5;formularios.html" );
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

            
        
      ?>