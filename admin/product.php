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
        <title>Productos</title>
        <?php
        require('../src/component/fonts-bootstrap.php');
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body class="bg-dark text-white">

        <?php
        require('src/components/nav.php');
        ?>

        <div class="container my-3">

            <div class="row my-3">

                <div class="col-md-3 offset-md-1">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="text-center pp">📦Productos registrados 8</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
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
                                    <h1 class="modal-title fs-5" id="addLabel">Nuevo producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            placeholder="Nombre" required />
                                                        <label for="nombre">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Descripción"
                                                            id="descripcion"></textarea>
                                                        <label for="descripcion">Descripción</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <input type="file" class="form-control" id="img" name="img"
                                                            placeholder="Imagen" required />
                                                        <label for="img">Imagen</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="lab" name="lab" required>
                                                            <option value="Aguascalientes">Aguascalientes</option>
                                                            <option value="Baja California">Baja California</option>
                                                        </select>
                                                        <label for="lab">Laboratorio</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <input type="submit" value="Agregar" class="btn btn-primary btn-lg"
                                                            id="btn-prod" />
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

                <div class="col-md-3 position-relative">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/400" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <p class="card-title">Nombre producto</p>
                            <p class="card-text">Descripción: Lorem ipsum dolor sit amet</p>

                            <div class="d-flex justify-content-evenly">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#edit"><i class="bi bi-pencil-square"></i> Editar</button>
                                <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar</a>
                            </div>
                        </div>

                        <div class="position-absolute top-0 start-0 m-2">
                            <p><span class="badge rounded-pill text-bg-dark">Bruluart</span></p>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 position-relative">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/400" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <p class="card-title">Nombre producto</p>
                            <p class="card-text">Descripción: Lorem ipsum dolor sit amet</p>

                            <div class="d-flex justify-content-evenly">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#edit"><i class="bi bi-pencil-square"></i> Editar</button>
                                <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar</a>
                            </div>
                        </div>

                        <div class="position-absolute top-0 start-0 m-2">
                            <p><span class="badge rounded-pill text-bg-dark">Bruluart</span></p>
                        </div>

                    </div>
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
                                <form>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="nombre" name="nombre"
                                                    placeholder="Nombre" required />
                                                <label for="nombre">Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Descripción"
                                                    id="descripcion"></textarea>
                                                <label for="descripcion">Descripción</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input type="file" class="form-control" id="img" name="img"
                                                    placeholder="Imagen" required />
                                                <label for="img">Imagen</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" id="lab" name="lab" required>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                </select>
                                                <label for="lab">Laboratorio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <input type="submit" value="Agregar" class="btn btn-primary btn-lg"
                                                    id="btn-prod" />
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
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>