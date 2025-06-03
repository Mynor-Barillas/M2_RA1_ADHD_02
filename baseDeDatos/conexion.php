<?php

    //definir variables

    $servidor = "fdb1028.awardspace.net";
    $usuario = "4596237_ciudadanos";
    $password = "paginaxyz@3"; //usuario root no tiene contraseña, contraseña en awardspace
    $basedatos = "4596237_ciudadanos";


    //conexion con mysqli

    $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

    if (!$conexion) {
        die("Error en conexion". mysqli_connect_error());
    } 

?>