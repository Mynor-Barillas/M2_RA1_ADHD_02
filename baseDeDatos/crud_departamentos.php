<?php
// Se utiliza require once para solicitar la conexion con base de datos
    require_once("conexion.php");

// Proceso de Insercion:

    //se identifica desde que boton se solicito el crud con if isset
    if(isset($_POST['btn_insert'])){
        // Se almacenan los valores del formulario con variables $php
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $region = $_POST['txt_region'];

        // se crea una variable que almacene la instruccion insert de sql
        $sql = "INSERT INTO departamentos(cod_depto, nombre_depto, cod_region) values(".$codigo.",'".$nombre."','".$region."');";

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido agregados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_deptos.php');
        } catch (Exception $th) {
            echo "<br> Los datos no han sido agregados <br>". $th;
        }
    }

//Proceso de Eliminacion:

    //se identifica desde que boton se solicito el crud con if isset
    if(isset($_POST['btn_delete'])){
        
        //Se guarda el valor del input oculto (hidden) en una variable
        $codigo = $_POST['hidden_id'];

        // se crea una variable que almacene la instruccion delete de sql
        $sql = "DELETE FROM departamentos WHERE cod_depto=".$codigo;

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido eliminados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_deptos.php');
        } catch (Exception $th) {
            echo "<br> Los datos no han sido eliminados <br>". $th;
        }
    }

//Proceso de Actualizacion:
    
    //se identifica desde que boton se solicito el crud con if isset
    if(isset($_POST['btn_update'])){
        // Se almacenan los valores del formulario con variables $php
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $region = $_POST['txt_region'];

        // se crea una variable que almacene la instruccion update de sql
        $sql = "UPDATE departamentos SET nombre_depto='".$nombre."', cod_region='".$region."' WHERE cod_depto=".$codigo;

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido actualizados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_deptos.php');
        } catch (Exception $th) {
            echo "<br> Los datos no han sido actualizados <br>". $th;
        }
    }
?>