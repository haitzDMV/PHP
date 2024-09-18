<html>
    <title>Formulario 7</title>
<body>

<?php
$usuErr = $correoErr = $contra1Err = $contra2Err = "";
$usu = $correo = $contra1 = $contra2 = "";
$patronNombre = "/^[a-zA-Z\s]+$/";
$patronContra = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~`-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~`-]{6,}$/";
$contErrores = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["usu"])) {
            $usuErr = "Nombre obligatorio";
            $contErrores++;
        } else {
            if (preg_match($patronNombre,$_POST["usu"])) {
                $nombre = $_POST["usu"];
            } else {
                $usuErr = "El nombre solo puede contener mayusculas, minusculas y espacios.";
                $contErrores++;
            }
        }
        if (empty($_POST["correo"])) {
            $correoErr = "Correo obligatorio";
            $contErrores++;
        } else {
            if (filter_var($_POST["correo"],FILTER_VALIDATE_EMAIL)) {
                $correo = $_POST["correo"];
            } else {
                $correoErr = "Formato de correo invalido";
                $contErrores++;
            }
            
        }
        if (empty($_POST["contra1"]) ) {
            $contra1Err = "Contraseña obligatoria";
            $contErrores++;
        } else {
            if (preg_match($patronContra,$_POST["contra1"])) {
                $contra1 = $_POST["contra1"];
                if ($contra1 == $_POST["contra2"]) {
                    $contra2 = $_POST["contra2"];
                }
            } else {
                $contra1Err = "La contraseña debe se al menos de 6 caracteres y contener al menos una letra minuscula, una letra mayuscula, un numero y un caracter especial";
                $contErrores++;
            }
            
        }
        if (empty($_POST["contra2"])) {
            $contra2Err = "Contraseña obligatoria";
            $contErrores++;
        }


        if ($contErrores == 0) {
            print_r("TODO BIEN");
        }
        
    }    




?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
Nombre usuario: <input type="text" name="usu"><?php echo $usuErr ?><br>
Correo electronico: <input type="text" name="correo"><?php echo $correoErr ?><br>
Contraseña: <input type="password" name="contra1"><?php echo $contra1Err ?><br>
Confirmar contraseña: <input type="password" name="contra2"><?php echo $contra2Err ?><br>
<input type="submit">
</form>

</body>
</html>
