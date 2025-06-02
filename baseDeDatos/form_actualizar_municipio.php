<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    
    <?php 
        //Se almacena el valor del inpu hidden en una vaiable 
        $codigo = $_POST['hidden_cod'];
        //Se solicita la conexion a la base de datos
        require_once('conexion.php');
        // Se hace una busqueda especifica del registro que se quiere editar
        $sql = "SELECT * FROM municipios WHERE cod_muni=".$codigo;
        //Se ejecuta la busqueda
        $ejecutar = mysqli_query($conexion, $sql);
        // se le asignan los valores a un array php para poder extraerlos individualmente
        $datos = mysqli_fetch_assoc($ejecutar);
    ?>

    <div class="container">
        <h1>Modificar Municipio</h1>
        <form action="crud_municipio.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo Municipio</label>
            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control" value="<?php echo $codigo; ?>" readonly>
            <br>
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?php echo $datos['nombre_municipio']; ?>">
            <br>
            <label for="txt_depo" class="form-label">Codigo Departamento</label>
            <input type="text" name="txt_depo" id="txt_depo" class="form-control" value="<?php echo $datos['cod_depto']; ?>">
            <br>
            <button type="submit" name="btn_update" id="btn_update" class="btn btn-primary">Agregar Cambios</button>
        </form>
    </div>

    <a href="http://localhost/fs2025/ejemplo20mayo/baseDeDatos/">regresar</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>