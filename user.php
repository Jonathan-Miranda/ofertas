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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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

        <div class="row mb-3">

            <div class="text-center alert border shadow-sm" role="alert">
                <span class="fs-3 fw-bold">🥳Estan cerca del producto gratis🎉</span>
            </div>

            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper py-3 ganadores">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Juan Martha</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Pedro Marmol</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Alicia Villareal</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Peso Pluma</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Pedro Fernandez</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="m-auto xd">🎁</p>
                                    </div>
                                    <div class="col-md-8 m-auto">
                                        <div class="card-body">
                                            <h4 class="card-title">Julio Preciado</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- End Swiper -->

            </div>
        </div>

        <div class="row mb-3">

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-center pp">👦🏻Usuarios registrados 8</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="bi bi-plus-lg"></i> Nuevo usuario
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addLabel">Nuevo usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="Nombre" required />
                                                    <label for="nombre">Nombre/s</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                                        placeholder="Apellido" required />
                                                    <label for="apellido">Apellido/s</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="mail" name="mail"
                                                        placeholder="Correo" required />
                                                    <label for="mail">Correo</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="tel" name="tel"
                                                        placeholder="Telefono" required />
                                                    <label for="tel">Telefono</label>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <input type="submit" value="Registrar" class="btn btn-primary btn-lg" id="btn-prod" />
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

        <div class="row">

            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header"></div>
                    <div class="card-body px-5">
                        <div class="row">

                            <div class="col-md-6 m-auto">
                                <p class="fs-1">Jonathan Miranda</p>
                                <p class="fs-3">📬Jona@gmail.com</p>
                                <p class="fs-3">📞 5524063165</p>

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-us">
                                    <i class="bi bi-pencil-square"></i> Editar usuario
                                </button>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-prod">
                                    + Agregar producto
                                </button>

                            </div>

                            <div class="col-md-6">

                                <div class="text-center mb-3">
                                    <span class="fs-4">📦Productos</span>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Comprados</th>
                                                <th scope="col">Faltantes</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Ky6</th>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>
                                                    <div class="container">
                                                        <div class="input-group">
                                                            <button class="btn btn-secondary" type="button" id="menos"><i class="bi bi-dash"></i></button>
                                                            <input type="number" class="form-control" id="agregar" max="2" min="1">
                                                            <button class="btn btn-secondary" type="button" id="mas"><i class="bi bi-plus"></i></button>
                                                        </div>

                                                        <div class="d-grid mt-3">
                                                            <button class="btn btn-success" type="button" id="btn-add">Agregar</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Fayrus</th>
                                                <td>2</td>
                                                <td>1</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#xxx">
                                                        Canjear🎉
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="add-prod" tabindex="-1" aria-labelledby="add-prodLabel" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title fs-5" id="add-prodLabel">Agregar producto a usuario</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <form>
                                                        <div class="row">

                                                            <div class="col-md-12 mb-3">
                                                                <div class="form-floating">
                                                                    <select class="form-select" id="prod" name="prod" required>
                                                                        <option value="Aguascalientes">Fayrus</option>
                                                                        <option value="Baja California">Ky6</option>
                                                                    </select>
                                                                    <label for="prod">Producto</label>
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

                            <!-- Modal -->
                            <div class="modal fade" id="edit-us" tabindex="-1" aria-labelledby="edit-usLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title fs-5" id="edit-usLabel">Modificar Jonathan</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="edit-nombre" name="edit-nombre"
                                                                    placeholder="Nombre" required />
                                                                <label for="edit-nombre">Nombre/s</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="edit-apellido" name="edit-apellido"
                                                                    placeholder="Apellido" required />
                                                                <label for="edit-apellido">Apellido/s</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-floating">
                                                                <input type="email" class="form-control" id="edit-mail" name="edit-mail"
                                                                    placeholder="Correo" required />
                                                                <label for="edit-mail">Correo</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-floating">
                                                                <input type="number" class="form-control" id="edit-tel" name="edit-tel"
                                                                    placeholder="Telefono" required />
                                                                <label for="edit-tel">Telefono</label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="d-grid">
                                                                <input type="submit" value="Actualizar" class="btn btn-primary btn-lg" id="btn-prod" />
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
                </div>
            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".ganadores", {
            loop: true,
            grabCursor: true,
            slidesPerView: 4,
            spaceBetween: 30,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            },
            autoplay: {
                delay: 5000,
            },
        });

        $('#mas').click(function() {
            var currentVal = parseInt($('#agregar').val()) || 0;
            var maxValue = parseInt($('#agregar').attr('max'));
            if (currentVal < maxValue) {
                $('#agregar').val(currentVal + 1);
            }
        });

        $('#menos').click(function() {
            var currentVal = parseInt($('#agregar').val());
            if (currentVal > 1) {
                $('#agregar').val(currentVal - 1);
            }
        });
    </script>
</body>

</html>