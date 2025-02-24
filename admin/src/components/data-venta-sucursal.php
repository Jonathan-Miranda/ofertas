<?php
session_start();
if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require('../../../connection/conexion.php');
    $q_ventas = "SELECT admin.NOMBRE AS sucursal, COALESCE(SUM(compra.CANTIDAD), 0) AS total_ventas FROM admin LEFT JOIN compra ON admin.ID = compra.ID_ADMIN WHERE admin.ROLL = 2 GROUP BY admin.NOMBRE ORDER BY total_ventas DESC LIMIT 10";

    $r_q_ventas = $con->prepare($q_ventas);
    $r_q_ventas->execute();
    $data_ventas = $r_q_ventas->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data_ventas);
} else {
    $data_ventas = null;

    echo json_encode($data_ventas);
    exit();
}
?>