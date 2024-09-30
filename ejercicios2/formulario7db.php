<html>
<body>
  <?php
        $nombreErr = $emailErr = $contraseñaErr = $repitacontraErr = "";
        $nombre = $email = $contraseña = $repitacontra = "";
        
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $patternNombre = "/^[a-zA-Z\s]+$/";
        $contadorError=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
              $nombreErr = "Requiere nombre";
            } else {
              if(preg_match($patternNombre, $_POST["nombre"])){
                $nombre = test_input($_POST["nombre"]);
                $contadorError++;
              }else{
                $nombreErr = "Nombre no valido";
                
              }
            }
          
            if (empty($_POST["email"])) {
              $emailErr = "Requiere email";
            } else {
              if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $email = test_input($_POST["email"]);
                $contadorError++;
              }else{
                $emailErr = "E-mail no valido";
                
              }
            }
            
            if (empty($_POST["contraseña"]) && empty($_POST["repitacontra"])) {
              $contraseñaErr = "Requiere contraseña";
            } else {
              $contraseña = test_input($_POST["contraseña"]);
              $repitacontra = test_input($_POST["repitacontra"]);
              if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $contraseña) && $contraseña==$repitacontra) {
                $contadorError++;
            } else {
                $contraseñaErr = "La contraseña no es válida.";
                
            }
          }
        }
        
        ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        Nombre: <input type="text" name="nombre" value=" <?php echo $nombre; ?>">
        <span class="error">* <?php echo $nombreErr;?></span>
        <br><br>
        E-mail:
        <input type="email" name="email" value= "<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Contraseña:
        <input type="text" name="contraseña">
        <span class="error"><?php echo $contraseñaErr;?></span>
        <br><br>
        Repita contraseña:
        <input type="password" name="repitacontra">
        <span class="error"><?php echo $repitacontraErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        
        </form>
      <?php 
        if($contadorError==3){
            echo "<br>Formulario correctamente completado";
            $servidor = "db";
            $usuario = "root";
            $contrasena = "root";
            $db = "mydatabase";

            $correo = $_POST["email"];
            $nombre = $_POST["nombre"];
            $contra = $_POST["contraseña"];

            // Create connection
            $conn = new mysqli($servidor, $usuario, $contrasena,$db);


            // Check connection
            if ($conn->connect_error) {
                die("<br>Connection failed: " . $conn->connect_error);
            } else {
                echo "<br>Connected successfully";
            }

            $sql = "INSERT INTO formulario (usuario, email, contrasena)
            VALUES ('$nombre', '$email', '$contra')";

            if ($conn->query($sql) === TRUE) {
                echo "<br>Insertado correctamente.";
            } else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        }
      ?>
</body>
</html>