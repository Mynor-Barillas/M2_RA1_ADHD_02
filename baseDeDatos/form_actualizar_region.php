<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Regiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php
    $codigo = $_POST['hidden_codigo'];
    require_once("conexion.php");
    $sql= "SELECT * FROM regiones WHERE cod_region=".$codigo;
    $ejecutar= mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);
    ?>
    <div class="container">
        <h1>Modificar Region</h1>
<!--crud_region.php es el archivo que realizara la conexion con base de datos y los procesos crud-->
        <form action="crud_region.php" method="post">
            <input type="hidden" name="id_oculto" id="id_oculto">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo"
             value="<?php echo $codigo;?>" class="form-control" readonly>
            <br>
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre"
             value="<?php echo $datos['nombre'];?>" class="form-control">
            <br>
            <label for="txt_desc" class="form-label">Descripcion</label>
            <input type="text" name="txt_desc" id="txt_desc"
             value="<?php echo $datos['descripcion']; ?>" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-primary" name="btn_actualizar" id="btn_actualizar">
                Actualizar datos
            </button>
        </form>
    </div>
    <a href="http://localhost/fs2025/ejemplo20mayo/baseDeDatos/">regresar</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>