<?php
    //Se reautilizara la conexion existente
    require_once("conexion.php");
//Proceso Actualizar

    if(isset($_POST['btn_actualizar'])){
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        $sql="UPDATE regiones SET nombre='".$nombre."', descripcion='".$desc."' WHERE cod_region=".$codigo;
        try {
            $ejecutar= mysqli_query($conexion,$sql);
            echo "<br>Datos Actualizados";
            header('Location: vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron actualizados<br>". $th;
        }
    }

// Proceso de ELiminar

    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_id'];
        $sql = "DELETE FROM regiones WHERE cod_region=". $codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>valor de ejecutar: ". $ejecutar;
            echo "<br>Datos Eliminados";
            header('Location: vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron eliminados<br>". $th;
        }
    }

// Proceso de insertat
    if(isset($_POST['btn_insertar'])){
        
        
        echo "archivo con procesos crud para las regiones";

        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];

        echo "<br> Datos de la region";
        echo "<br> Codigo: ". $codigo;
        echo "<br> Nombre: ". $nombre;
        echo "<br> Descripcion: ". $desc;

        $sql = "INSERT INTO regiones(cod_region, nombre, descripcion)
            values(".$codigo.",'".$nombre."','".$desc."');";

        //$preparar->bind_param()

        

        /*if ($ejecutar) {
            echo "<br>Datos Almacenados";
        } else {
            echo "<br>Datos no fueron Guardados";
        }*/

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>valor de ejecutar: ". $ejecutar;
            echo "<br>Datos Almacenados";
            header('Location: vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron Guardados<br>". $th;
        }
    }

?>