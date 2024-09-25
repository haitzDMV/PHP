<?php
session_start();
if (isset($_POST['tema']) && isset($_POST['idioma'])) {
    $tema = $_POST['tema'];
    $idioma = $_POST['idioma'];

    $_SESSION['tema'] = $tema;
    $_SESSION['idioma'] = $idioma;
    
    
}

header("Location: Session_3.php");


?>