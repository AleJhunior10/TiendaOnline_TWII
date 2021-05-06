<?php
    $servidor = "localhost:3307";
    $bd = "shop";
    $usuario = "root";
    $pass = "";

    $conexion = new mysqli($servidor, $usuario, $pass, $bd);

    if($conexion -> connect_error){
        die("Conexion no establecida.");
    }
?>