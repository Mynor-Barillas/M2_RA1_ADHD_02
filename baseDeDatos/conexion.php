<?php

    //definir variables

    $servidor = "localhost";
    $usuario = "root";
    $password = ""; //usuario root no tiene contraseña
    $basedatos = "fs2025_ciudadanos";


    //conexion con mysqli

    $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

    if (!$conexion) {
        die("Error en conexion". mysqli_connect_error());
    } 

?>