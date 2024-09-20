<?php
$usu = $_POST["usu"];
$val = $_POST["valoracion"];
$com = $_POST["comentario"];

class Valoracion {
    private $usuario;
    private $valoracion;
    private $comentario;

    function __construct($usuario,$valoracion,$comentario)
    {
        $this -> usuario = $usuario;
        $this -> valoracion = $valoracion;
        $this -> comentario = $comentario;
    }

    function getUsuario() {
        return $this -> usuario;
    }
    function getValoracion() {
        return $this -> valoracion;
    }
    function getComentario() {
        return $this -> comentario;
    }
}

$val1 = new Valoracion($usu,$val,$com);

echo "Nombre de usuario: " . $val1->getUsuario() . "<br>";
echo "Valoracion: " . $val1->getValoracion() . "<br>";
echo "Comentario: " . $val1->getComentario() . "<br>";

?>