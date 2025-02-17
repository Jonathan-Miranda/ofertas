<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-grey">

    <nav class="navbar sticky-top navbar-expand-md bg-body-tertiary">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="d-flex justify-content-evenly">

                                <a href="#" class="btn btn-primary"><i class="bi bi-boxes"></i> Productos</a>

                                <a href="#" class="btn btn-primary"><i class="bi bi-people"></i> Usuarios</a>

                                <a href="#" class="btn btn-primary"><i class="bi bi-capsule-pill"></i> Laboratorios</a>


                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i> Perfil
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item link-danger" href="src/destroy.php"><i
                                                    class="bi bi-x-circle"></i> Cerrar sesión</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="container my-3">

        <div class="row my-3">

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-center pp">🏥Farmacias registradas 8</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
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
                                <h1 class="modal-title fs-5" id="addLabel">Nueva sucursal</h1>
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

                                            <div class="col-md-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Correo electronico" required />
                                                    <label for="email">Correo electronico</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <input type="submit" value="Agregar" class="btn btn-primary btn-lg" id="btn-prod" />
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

                <div class="card shadow-sm">
                    <div class="card-header"></div>
                    <div class="card-body px-5">
                        <div class="table-responsive text-center">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Ky6</th>
                                        <th>ejemplo@ejemplo.com</th>
                                        <td>
                                            <button class="btn btn-success" type="button" id="btn-add"><i class="bi bi-pencil-square"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" type="button" id="btn-add"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                                <textarea class="form-control" placeholder="Descripción" id="descripcion"></textarea>
                                                <label for="descripcion">Descripción</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input type="file" class="form-control" id="img" name="img" placeholder="Imagen" required />
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
                                                <input type="submit" value="Agregar" class="btn btn-primary btn-lg" id="btn-prod" />
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

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>