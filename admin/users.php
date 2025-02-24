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
        <title>Usuarios</title>
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
                        $q_s = "SELECT COUNT(*) AS sucursales FROM admin WHERE ROLL = '2'";
                        $r_q_s = $con->prepare($q_s);
                        $r_q_s->execute();
                        $restot = $r_q_s->fetch(PDO::FETCH_ASSOC);
                        $total_suc = $restot['sucursales'];
                        ?>
                        <div class="card-body">
                            <p class="text-center pp">🏥Farmacias registradas: <?php echo $total_suc; ?></p>
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
                                    <h2 class="modal-title fs-5" id="addLabel">Nueva sucursal</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form id="add-sucursal" method="POST" enctype="multipart/form-data"
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
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Correo electronico" required />
                                                        <label for="email">Correo electronico</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="pw" name="pw"
                                                            placeholder="Contraseña" required />
                                                        <label for="pw">Contraseña</label>
                                                    </div>
                                                    <p>Genera una: <a
                                                            href="https://www.lastpass.com/es/features/password-generator"
                                                            target="_blank" rel="noopener noreferrer">contraseña</a></p>
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
                                    <th scope="col">Correo</th>
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
                                <h2 class="modal-title fs-5" id="editLabel">Editar</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form id="edit-sucursal" method="POST" enctype="multipart/form-data"
                                        accept-charset="utf-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="edit-nombre"
                                                        name="edit-nombre" placeholder="Nombre" required />
                                                    <label for="edit-nombre">Nombre</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="edit-email"
                                                        name="edit-email" placeholder="Correo electronico" required />
                                                    <label for="edit-email">Correo electronico</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="edit-pw" name="edit-pw"
                                                        placeholder="Contraseña" required />
                                                    <label for="edit-pw">Contraseña</label>
                                                </div>
                                                <input type="hidden" id="edit-id-suc" name="edit-id-suc" required>
                                                <p>Genera una: <a
                                                        href="https://www.lastpass.com/es/features/password-generator"
                                                        target="_blank" rel="noopener noreferrer">contraseña</a></p>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <input type="submit" value="Actualizar"
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
                <!-- End Modal-edit -->


            </div>

            <?php
            require('../js/jquery-boot-sweetalert.php');
            ?>
            <?php
            require('js/users.php');
            ?>
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>