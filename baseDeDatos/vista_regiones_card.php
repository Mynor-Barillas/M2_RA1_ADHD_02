<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regiones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="../css/style.css"/>
</head>

<body>

  <div class="container">
    <?php

    require_once("conexion.php");
    $sql= "SELECT * FROM regiones";
    $ejecutar= mysqli_query($conexion, $sql);
    ?>
    <div class="container">
      <h1>Regiones</h1>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary animate__animated animate__bounce animate__delay-1s" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nueva Region
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Region</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <h1>Nueva Region</h1>
                <!--crud_region.php es el archivo que realizara la conexion con base de datos y los procesos crud-->
                <form action="crud_region.php" method="post">
                  <label for="txt_codigo" class="form-label">Codigo</label>
                  <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
                  <br>
                  <label for="txt_nombre" class="form-label">Nombre</label>
                  <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                  <br>
                  <label for="txt_desc" class="form-label">Descripcion</label>
                  <input type="text" name="txt_desc" id="txt_desc" class="form-control">
                  <br>
                  <button type="submit" class="form-control btn btn-primary" name="btn_insertar" id="btn_insertar">
                    Agregar Region
                  </button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <a href="vista_regiones.php" class="btn btn-secondary animate__animated animate__bounce animate__delay-2s">Vista Normal</a>
      <br>
      <br>
      <div class="container row">


        <?php
      while($fila = mysqli_fetch_assoc($ejecutar)) {
      ?>
        <div class="card col-3 m-2" style="width: 18rem;">
          <img
            src="https://viajegt.com/wp-content/uploads/2024/03/Las-7-regiones-turisticas-de-Guatemala-son-lugares-para-visitar-en-Guatemala.-Lugares-turisticos-para-visitar-en-Guatemala.-1.jpg"
            class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $fila['nombre']; ?>
            </h5>
            <p class="card-text">
              <?php echo $fila['descripcion']; ?>
            </p>
            <div class="d-flex flex-row justify-content-center">
              <form action="crud_region.php" method="post">
                <input type="hidden" name="hidden_id" id="hidden_id" value="<?php
                  echo $fila['cod_region'];
                ?>">
                <button type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-outline-danger p-1 holographic-card">
                  <i class="bi bi-trash3"></i>
                </button>
              </form>
              <form action="form_actualizar_region.php" method="post" class="ms-2">
                <input type="hidden" name="hidden_codigo" id="hidden_codigo" value="<?php
                  echo $fila['cod_region'];
                ?>">
                <button type="submit" name="btn_actu" id="btn_actu" class="btn btn-outline-primary p-1 holographic-card">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </div>
          </div>
        </div>

        <?php

        }

        ?>
      </div>
    </div>
    <a href="../index.php">Inicio</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"></script>
  </div>

</body>

</html>