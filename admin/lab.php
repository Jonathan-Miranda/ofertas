<?php
session_start();
if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require('../connection/conexion.php');
    ?>
    <!doctype html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laboratorios</title>
        <?php
        require('../src/component/fonts-bootstrap.php');
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body class="bg-dark">

        <?php
        require('src/components/nav.php');
        ?>

        <div class="container my-3">

            <div class="row my-3">

                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <?php
                        $q_l = "SELECT COUNT(*) AS total_lab FROM lab";
                        $r_q_l = $con->prepare($q_l);
                        $r_q_l->execute();
                        $restot = $r_q_l->fetch(PDO::FETCH_ASSOC);
                        $total_lab = $restot['total_lab'];
                        ?>
                        <div class="card-body">
                            <p class="text-center pp">🧪Laboratorios registrados: <?php echo $total_lab; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="search" class="form-control" placeholder="Buscar" id="buscar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                    <i class="bi bi-plus-lg"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addLabel">Nuevo laboratorio</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form id="add-lab" method="POST" enctype="multipart/form-data"
                                            accept-charset="utf-8">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            placeholder="Nombre" required />
                                                        <label for="nombre">Nombre</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <input type="submit" value="Agregar"
                                                            class="btn btn-primary btn-lg" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="result">

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal-edit -->
                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLabel">Editar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form id="edit-lab" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="edit-nombre"
                                                        name="edit-nombre" placeholder="Nombre" required />
                                                    <label for="edit-nombre">Nombre</label>
                                                </div>
                                                <input type="hidden"  id="edit-id-lab" name="edit-id-lab" value="id" required>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <input type="submit" value="Editar" class="btn btn-primary btn-lg" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal-edit -->

            </div>

            <?php
            require('../js/jquery-boot-sweetalert.php');
            ?>
            <?php
            require('js/lab.php');
            ?>
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>