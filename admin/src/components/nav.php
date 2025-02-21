<nav class="navbar sticky-top navbar-expand-md bg-body-tertiary">
    <div class="container">
        <span class="fs-5 fw-bold text-dark"><?php echo $_SESSION["ad-name"]; ?></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="d-flex justify-content-evenly">

                            <a href="dashboard.php" class="btn btn-primary"><i class="bi bi-house"></i> Inicio</a>

                            <a href="product.php" class="btn btn-primary"><i class="bi bi-boxes"></i> Productos</a>

                            <a href="users.php" class="btn btn-primary"><i class="bi bi-people"></i> Usuarios</a>

                            <a href="lab.php" class="btn btn-primary"><i class="bi bi-capsule-pill"></i> Laboratorios</a>


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