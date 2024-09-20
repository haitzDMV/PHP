<?php

$usu = $_POST["usu"];
$em = $_POST["email"];
$passwd1 = $_POST["passwd1"];
$passwd2 = $_POST["passwd2"];

class Usuario {
    private $usuario;
    private $email;
    private $contrasena1;
    private $contrasena2;

    function __construct($usuario,$email,$contrasena1,$contrasena2)
    {
        $this -> usuario = $usuario;
        $this -> email = $email;
        $this -> contrasena1 = $contrasena1;
        $this -> contrasena2 = $contrasena2;
    }

    function getUsuario() {
        return $this->usuario;
    }
    function getEmail() {
        return $this->email;
    }
    function getContrasena1() {
        return $this->contrasena1;
    }
    function getContrasena2() {
        return $this->contrasena2;
    }

}

$u1 = new Usuario($usu,$em,$passwd1,$passwd2);

echo "Nombre de usuario: " . $u1->getUsuario() . "<br>";
echo "Email: " . $u1->getEmail() . "<br>";
if ($u1->getContrasena1() == $u1->getContrasena2()) {
    echo "Las contraseñas coinciden.<br>";
} else {
    echo "Las contraseñas no coinciden.<br>";
}





?>