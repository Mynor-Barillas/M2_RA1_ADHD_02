<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel Academico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
</head>

<body>
    <div class="container">
        <?php 

        //require once
        require_once("conexion.php");
        //Declarar consulta sql
        $sql = "SELECT * FROM nivelesacademicos";
        //Ejecutar la consulta sql
        $ejecutar = mysqli_query($conexion, $sql);

        ?>
        <h1>Niveles Academicos</h1>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary animate__animated animate__bounce animate__delay-1s" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Nivel Academico
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud_nivelacad.php" method="post">
                            <label for="txt_codigo" class="form-label">Codigo</label>
                            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
                            <br>
                            <label for="txt_nombre" class="form-label">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                            <br>
                            <label for="txt_desc" class="form-label">Descripcion</label>
                            <input type="text" name="txt_desc" id="txt_desc" class="form-control">
                            <br>   
                            <button type="submit" name="btn_insert" id="btn_insert" class="btn btn-primary">
                                Agregar Nivel Academico
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="vista_nivelesacademicos_card.php" class="btn btn-secondary animate__animated animate__bounce animate__delay-2s">Vista con Cartas</a>
        <br>
        <br>
        <br>
        <table class="table table-striped table-dark table-border border-dark animate__animated animate__zoomIn">
            <thead>
                <tr>
                    <th>Codigo nivel academico</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
        while ($fila = mysqli_fetch_assoc($ejecutar)) {
        ?>
                <tr>
                    <td>
                        <?php
                        echo $fila['cod_nivel_acad'];
                    ?>
                    </td>
                    <td>
                        <?php
                        echo $fila['nombre'];
                    ?>
                    </td>
                    <td>
                        <?php
                        echo $fila['descripcion'];
                    ?>
                    </td>
                    <td class="d-flex flex-row">
                        <form action="crud_nivelacad.php" method="post">
                            <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $fila['cod_nivel_acad'] ?>">
                            <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-outline-danger p-1 holographic-card">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                        <form action="form_actualizar_nivelacad.php" method="post" class="ms-2">
                            <input type="hidden" name="hidden_cod" id="hidden_cod" value="<?php echo $fila['cod_nivel_acad'] ?>">
                            <button type="submit" name="btn_actu" id="btn_actu" class="btn btn-outline-info p-1 holographic-card">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
        }

        ?>
        </tbody>
        </table>
        <a href="../index.php">Inicio</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>



