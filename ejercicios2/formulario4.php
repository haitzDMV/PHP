<?php

$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$ema = $_POST["email"];
$tel = $_POST["telefono"];

class Usuario {
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    

    function __construct($nombre,$apellido,$email,$telefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> telefono = $telefono;
    }

    function getNombre() {
        return $this->nombre;
    }
    function getApellido() {
        return $this->apellido;
    }
    function getEmail() {
        return $this->email;
    }
    function getTelefono() {
        return $this->telefono;
    }

}

$u1 = new Usuario($nom,$ape,$ema,$tel);

echo "Nombre: " . $u1->getNombre() . "<br>";
echo "Apellido: " . $u1->getApellido() . "<br>";
echo "Email: " . $u1->getEmail() . "<br>";
echo "Telefono: " . $u1->getTelefono() . "<br>";





?>