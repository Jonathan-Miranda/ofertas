<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php
    require('src/component/fonts-bootstrap.php');
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-grey">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <img src="img/logoFGi.png" class="img-fluid d-block m-auto log" alt="Logo Farmacias Gi">

                <h2 class="text-center my-4">Inicia sesión</h2>


                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <form id="frm-login" method="POST" name="registro" enctype="multipart/form-data" accept-charset="utf-8">

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Correo electronico" required />
                                <label for="email">Correo electronico</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" id="pw" name="pw"
                                    placeholder="Contraseña" required />
                                <label for="pw">Contraseña</label>
                            </div>

                            <div class="d-grid mt-3">
                                <input type="submit" value="Ingresar" class="btn btn-primary btn-lg" id="btn" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('js/jquery-boot-sweetalert.php');
    require('js/login.php');
    ?>
</body>

</html>