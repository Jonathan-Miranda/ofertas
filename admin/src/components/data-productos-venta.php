<?php
session_start();
if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require('../../../connection/conexion.php');
    $q_ventas = "SELECT 
    product.NOMBRE AS producto, 
    COALESCE(SUM(compra.CANTIDAD), 0) AS total_ventas 
    FROM product 
    LEFT JOIN compra ON product.ID = compra.ID_PRODUCT 
    GROUP BY product.NOMBRE 
    ORDER BY total_ventas DESC";

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