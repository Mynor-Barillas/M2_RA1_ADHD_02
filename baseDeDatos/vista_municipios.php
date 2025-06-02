<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
</head>

<body>

    <div class="container">

        <?php

        //require once
        require_once("conexion.php");
        //declarar la consulta sql
        $sql= "SELECT * FROM municipios";
        //ejecutar la consulta sql
        $ejecutar= mysqli_query($conexion, $sql);
        //cerrar php y empezar la tabla en html
        ?>
        <h1>Municipios</h1>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary animate__animated animate__bounce animate__delay-1s" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Municipio
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Municipio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud_municipio.php" method="post">
                            <label for="txt_codigo" class="form-label">Codigo Municipio</label>
                            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
                            <br>
                            <label for="txt_nombre" class="form-label">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                            <br>
                            <label for="txt_depo" class="form-label">Codigo Departamento</label>
                            <input type="number" name="txt_depo" id="txt_depo" class="form-control">
                            <br>   
                            <button type="submit" name="btn_insert" id="btn_insert" class="btn btn-primary">
                                Agregar Municipio
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="vista_municipios_card.php" class="btn btn-secondary animate__animated animate__bounce animate__delay-2s">Vista con Cartas</a>
        <br>
        <br>
        <br>
        <div class="border animate__animated animate__headShake">
            <table class="table table-striped table-warning table-border border-dark diplay animate__animated animate__headShake" id="myTable">
                <thead>
                    <tr>
                        <th>Codigo Municipio</th>
                        <th>Nombre</th>
                        <th>Codigo departamento</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Se vuelve a abrir php para empezar el ciclo -->
                    <?php
            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                //se cierra php parcialmente para seguir con el uerpo de la tabla
            ?>
                    <!-- Dentro de cada td se abre php para ingrsar los datos -->
                    <tr>
                        <td>
                            <?php
                            echo $fila['cod_muni'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $fila['nombre_municipio'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $fila['cod_depto'];
                            ?>
                        </td>
                        <td class="d-flex flex-row">
                            <form action="crud_municipio.php" method="post">
                                <input type="hidden" name="hidden_id" id="hidden_id"
                                    value="<?php echo $fila['cod_muni'] ?>">
                                <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-outline-danger p-1 holographic-card">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            <form action="form_actualizar_municipio.php" method="post" class="ms-2">
                                <input type="hidden" name="hidden_cod" id="hidden_cod"
                                    value="<?php echo $fila['cod_muni'] ?>">
                                <button type="submit" name="btn_actu" id="btn_actu" class="btn btn-outline-info p-1 holographic-card" >
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- se abre php para cerrar correctamente el ciclo -->
                    <?php
            }
            ?>
                </tbody>
            </table>
        </div>
        <a href="../index.php">Inicio</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
        <script src="../js/tables.js"></script>
        <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>

    </div>

</body>

</html>