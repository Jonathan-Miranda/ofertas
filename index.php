<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                        <form id="registro" method="POST" name="registro" enctype="multipart/form-data" accept-charset="utf-8">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>