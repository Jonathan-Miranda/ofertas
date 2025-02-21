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
        <title>Dashboard</title>
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
        <?php
        require('../js/jquery-boot-sweetalert.php');
        ?>
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
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>