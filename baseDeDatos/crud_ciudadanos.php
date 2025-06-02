<?php
// Se utiliza require once para solicitar la conexion con base de datos
    require_once("conexion.php");

// Proceso de Insercion:

    //se identifica desde que boton se solicito el crud con if isset
    if(isset($_POST['btn_insert'])){
        // Se almacenan los valores del formulario con variables $php
        $dpi = $_POST['txt_dpi'];
        $apellido = $_POST['txt_apellido'];
        $nombre = $_POST['txt_nombre'];
        $direccion = $_POST['txt_direccion'];
        $telCasa = $_POST['tel_casa'];
        $telMovil = $_POST['tel_movil'];
        $email = $_POST['txt_email'];
        $fechanac = $_POST['fecha_nac'];
        $cod_acad = $_POST['txt_nivel_acad'];
        $municipio = $_POST['txt_municipio'];
        $contraseña = $_POST['txt_pswd'];

        // se crea una variable que almacene la instruccion insert de sql
        $sql = "INSERT INTO ciudadanos(dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni, contra) 
            values('".$dpi."','".$apellido."','".$nombre."','".$direccion."','".$telCasa."','".$telMovil."','".$email."','".$fechanac."',".$cod_acad.",".$municipio.",'".$contraseña."');";

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido agregados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_ciudadanos.php');
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
        $sql = "DELETE FROM ciudadanos WHERE dpi=".$codigo;

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido eliminados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_ciudadanos.php');
        } catch (Exception $th) {
            echo "<br> Los datos no han sido eliminados <br>". $th;
        }
    }

//Proceso de Actualizacion:
    
    //se identifica desde que boton se solicito el crud con if isset
    if(isset($_POST['btn_update'])){
        // Se almacenan los valores del formulario con variables $php
        $dpi = $_POST['txt_dpi'];
        $apellido = $_POST['txt_apellido'];
        $nombre = $_POST['txt_nombre'];
        $direccion = $_POST['txt_direccion'];
        $telCasa = $_POST['tel_casa'];
        $telMovil = $_POST['tel_movil'];
        $email = $_POST['txt_email'];
        $fechanac = $_POST['fecha_nac'];
        $cod_acad = $_POST['txt_nivel_acad'];
        $municipio = $_POST['txt_municipio'];
        $contraseña = $_POST['txt_pswd'];

        // se crea una variable que almacene la instruccion update de sql
        $sql = "UPDATE ciudadanos SET apellido='".$apellido."', nombre='".$nombre."', direccion='".$direccion."', tel_casa='".$telCasa."', 
                tel_movil='".$telMovil."', email='".$email."', fechanac='".$fechanac."', cod_nivel_acad=".$cod_acad.", cod_muni=".$municipio.", contra='".md5($contraseña)."' WHERE dpi=".$dpi;

        // se utiliza un try para que al ejecutar la instruccion, si se realiza correctamente realice una accion y si hay algun error, realice otra
        try {
            // se crea una variable para ejecutar la instruccion sql
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br> Los datos han sido actualizados";
            // con header(location) redireccionamos al usuario a la pagina de vista
            header('Location: vista_ciudadanos.php');
        } catch (Exception $th) {
            echo "<br> Los datos no han sido actualizados <br>". $th;
        }
    }
?>  