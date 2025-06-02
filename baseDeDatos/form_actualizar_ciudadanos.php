<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

        
</head>

<body>

    <?php 
        //Se almacena el valor del inpu hidden en una vaiable 
        $codigo = $_POST['hidden_cod'];
        //Se solicita la conexion a la base de datos
        require_once('conexion.php');
        // Se hace una busqueda especifica del registro que se quiere editar
        $sql = "SELECT * FROM ciudadanos WHERE dpi=".$codigo;
        //Se ejecuta la busqueda
        $ejecutar = mysqli_query($conexion, $sql);
        // se le asignan los valores a un array php para poder extraerlos individualmente
        $datos = mysqli_fetch_assoc($ejecutar);
    ?>

    <div class="container">
        <h1>Modificar Ciudadanos</h1>
        <form action="crud_ciudadanos.php" method="post">
            <label for="txt_dpi" class="form-label">DPI</label>
            <input type="text" name="txt_dpi" id="txt_dpi" class="form-control" value="<?php echo $codigo; ?>" readonly>
            <br>
            <label for="txt_apellido" class="form-label">Apellido</label>
            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" value="<?php echo $datos['apellido'] ; ?>">
            <br>
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?php echo $datos['nombre'] ; ?>">
            <br>
            <label for="txt_direccion" class="form-label">Direccion</label>
            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" value="<?php echo $datos['direccion'] ; ?>">
            <br>
            <label for="tel_casa" class="form-label">Telefono de Casa</label>
            <input type="text" name="tel_casa" id="tel_casa" class="form-control" value="<?php echo $datos['tel_casa'] ; ?>">
            <br>
            <label for="tel_movil" class="form-label">Telefono Movil</label>
            <input type="text" name="tel_movil" id="tel_movil" class="form-control" value="<?php echo $datos['tel_movil'] ; ?>">
            <br>
            <label for="txt_email" class="form-label">E-mail</label>
            <input type="email" name="txt_email" id="txt_email" class="form-control" value="<?php echo $datos['email'] ; ?>">
            <br>
            <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="<?php echo $datos['fechanac'] ; ?>">
            <br>
            <label for="txt_nivel_acad" class="form-label">Codigo de Nivel Academico</label>
            <input type="number" name="txt_nivel_acad" id="txt_nivel_acad" class="form-control" value="<?php echo $datos['cod_nivel_acad'] ; ?>">
            <br>
            <label for="txt_municipio" class="form-label">Codigo de Municipio</label>
            <input type="number" name="txt_municipio" id="txt_municipio" class="form-control" value="<?php echo $datos['cod_muni'] ; ?>">
            <br>
            <label for="txt_pswd" class="form-label">Contraseña</label>
            <input type="text" name="txt_pswd" id="txt_pswd" class="form-control" value="<?php echo $datos['contra'] ; ?>">
            <br>
            <button type="submit" name="btn_update" id="btn_update" class="btn btn-primary">Agregar Cambios</button>
        </form>
    </div>

    <a href="http://localhost/fs2025/ejemplo20mayo/baseDeDatos/">regresar</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>