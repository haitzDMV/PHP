<?php
$usu = $_POST["usu"];
$email = $_POST["email"];
$passwd1 = $_POST["passwd1"];
$passwd2 = $_POST["passwd2"];

echo "Nombre de usuario: " . $usu . "<br>";
echo "Email: " . $email . "<br>";
if ($passwd1 == $passwd2) {
    echo "Las contraseñas coinciden.<br>";
} else {
    echo "Las contraseñas no coinciden.<br>";
}





?>