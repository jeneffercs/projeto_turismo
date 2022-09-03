<?php 

    session_start();
    $usuario = $_SESSION['usuario'];

    if($usuario == null){
        header('location: index.php');
        exit;
    }

?>