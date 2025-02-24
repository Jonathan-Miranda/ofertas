<?php
session_start();
if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require('../../../connection/conexion.php');
    $q_ventas = "SELECT lab.NOMBRE, COALESCE(SUM(compra.CANTIDAD), 0) AS total_ventas
                    FROM lab
                    LEFT JOIN product ON lab.ID = product.ID_LAB
                    LEFT JOIN compra ON product.ID = compra.ID_PRODUCT
                    GROUP BY lab.NOMBRE
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