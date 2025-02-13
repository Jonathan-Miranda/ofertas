<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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

        <div class="row mb-3">

            <div class="text-center alert border shadow-sm" role="alert">
                <span class="fs-3 fw-bold">Resumen General</span>
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        💵Total de compras
                    </div>
                    <div class="card-body">
                        <p class="text-center xd">100</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        🎁Productos gratis entregados
                    </div>
                    <div class="card-body">
                        <p class="text-center xd">500</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        📝Usuarios registrados
                    </div>
                    <div class="card-body">
                        <p class="text-center xd">745</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        📦Productos registrados
                    </div>
                    <div class="card-body">
                        <p class="text-center xd">8</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="text-center alert border shadow-sm" role="alert">
                <span class="fs-3 fw-bold">Metricas</span>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        💰Venta por laboratorio
                    </div>
                    <div class="card-body">
                        <canvas id="lab"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        📢Últimas Compras Registradas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Pedro</th>
                                        <td>Ky6</td>
                                        <td>1</td>
                                        <td>10-02-25</td>
                                        <td>1/3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Juan</th>
                                        <td>Fayrus</td>
                                        <td>3</td>
                                        <td>13-02-25</td>
                                        <td>3/3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marta</th>
                                        <td>Fayrus</td>
                                        <td>3</td>
                                        <td>13-02-25</td>
                                        <td>3/3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pablo</th>
                                        <td>Fayrus</td>
                                        <td>3</td>
                                        <td>13-02-25</td>
                                        <td>3/3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sofia</th>
                                        <td>Fayrus</td>
                                        <td>3</td>
                                        <td>13-02-25</td>
                                        <td>3/3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marcos</th>
                                        <td>Fayrus</td>
                                        <td>3</td>
                                        <td>13-02-25</td>
                                        <td>3/3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="text-center alert border shadow-sm" role="alert">
                <span class="fs-3 fw-bold">Productos</span>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        🚀Más vendidos
                    </div>
                    <div class="card-body">
                        <canvas id="vendidos"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center fs-5">
                        🔥Más Canjeados
                    </div>
                    <div class="card-body">
                        <canvas id="canje"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <script>
        const lab = document.getElementById('lab');
        const venta = document.getElementById('vendidos');
        const canje = document.getElementById('canje');

        new Chart(lab, {
            type: 'bar',
            data: {
                labels: ['Bruluart', 'Bruluagsa'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)'
                    ],
                    borderWidth: 1,
                    borderRadius: 20
                }],

            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



        new Chart(venta, {
            type: 'bar',
            data: {
                labels: ['Ky6', 'Fayrus', 'Portem', 'Tribedoce', 'Lo-bruquin', 'Afleno', 'Tarmin', 'Brunadol'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 19, 3, 5, 2, 3, 8, 5],
                    borderWidth: 1,
                    borderRadius: 20
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        new Chart(canje, {
            type: 'doughnut',
            data: {
                labels: ['Ky6', 'Fayrus', 'Portem', 'Tribedoce', 'Lo-bruquin', 'Afleno', 'Tarmin', 'Brunadol'],
                datasets: [{
                    label: 'Canje',
                    data: [12, 19, 3, 5, 2, 3, 8, 5],
                    borderWidth: 1,
                    borderRadius: 20
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>