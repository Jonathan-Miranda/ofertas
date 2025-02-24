<?php
session_start();
if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require('../connection/conexion.php');
    //
    $query = "SELECT 
        (SELECT COUNT(*) FROM compra) AS compras,
        (SELECT COUNT(*) FROM history) AS gratis,
        (SELECT COUNT(*) FROM user) AS usuarios,
        (SELECT COUNT(*) FROM product) AS productos";

    $query_gral = $con->prepare($query);
    $query_gral->execute();
    $data_gral = $query_gral->fetch(PDO::FETCH_ASSOC);

    $compras = $data_gral['compras'];
    $gratis = $data_gral['gratis'];
    $usuarios = $data_gral['usuarios'];
    $productos = $data_gral['productos'];

    //
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
    <style>
        .xd {
            color: #99d9d9;
            font-size: 10vh;
            font-weight: bold;
        }
    </style>

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
                            <p class="text-center xd"><?php echo $compras; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            🎁Productos gratis entregados
                        </div>
                        <div class="card-body">
                            <p class="text-center xd"><?php echo $gratis; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header text-center fs-5">
                            📝Usuarios registrados
                        </div>
                        <div class="card-body">
                            <p class="text-center xd"><?php echo $usuarios; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header text-center fs-5">
                            📦Productos registrados
                        </div>
                        <div class="card-body">
                            <p class="text-center xd"><?php echo $productos; ?></p>
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
                                            <th scope="col">Sucursal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q_tabla_venta = "SELECT 
                                        user.NOMBRE AS cliente_nombre, 
                                        product.NOMBRE AS producto_comprado, 
                                        compra.CANTIDAD AS cantidad_comprada, 
                                        compra.FECHA_COMPRA AS fecha_compra, 
                                        admin.NOMBRE AS sucursal 
                                        FROM compra 
                                        JOIN user ON compra.ID_USER = user.ID 
                                        JOIN product ON compra.ID_PRODUCT = product.ID 
                                        JOIN admin ON compra.ID_ADMIN = admin.ID 
                                        WHERE compra.CANTIDAD >= 1 
                                        ORDER BY compra.FECHA_COMPRA DESC LIMIT 10";
                                        $res_q_tabla_venta = $con->prepare($q_tabla_venta);
                                        $res_q_tabla_venta->execute();
                                        if ($res_q_tabla_venta->rowCount() > 0) {
                                            while ($data_tabla_venta = $res_q_tabla_venta->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <th><?php echo $data_tabla_venta['cliente_nombre']; ?></th>
                                                    <td><?php echo $data_tabla_venta['producto_comprado']; ?></td>
                                                    <td><?php echo $data_tabla_venta['cantidad_comprada']; ?></td>
                                                    <td><?php echo $data_tabla_venta['fecha_compra']; ?></td>
                                                    <td><?php echo $data_tabla_venta['sucursal']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo '<tr>
                                            <td colspan="5">
                                            <div class="alert alert-danger" role="alert">Aún no hay ventas</div>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
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
                            🔥Ventas por sucursales
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
        <?php
        require('js/dashboard.php');
        ?>
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>