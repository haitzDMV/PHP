<?php

if (isset($_POST['tema']) && isset($_POST['idioma'])) {
    $tema = $_POST['tema'];
    $idioma = $_POST['idioma'];

    setcookie('tema',$tema);
    setcookie('idioma',$idioma);
    
    
}

header("Location: Session_3.php");


?>