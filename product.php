<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
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
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="d-grid">
                    <a href="#" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Agregar</a>
                </div>
            </div>
        </div>

        <div class="row my-3">

            <div class="col-md-3 position-relative">
                <div class="card shadow-sm">
                    <img src="https://placehold.co/400" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <p class="card-title">Nombre producto</p>
                        <p class="card-text">Descripción: Lorem ipsum dolor sit amet</p>

                        <div class="d-flex justify-content-evenly">
                            <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                            <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar</a>
                        </div>
                    </div>

                    <div class="position-absolute top-0 start-0 m-2">
                        <p><span class="badge rounded-pill text-bg-dark">Bruluart</span></p>
                    </div>

                </div>
            </div>

        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>