<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {

    require("../connection/conexion.php");

    $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
    $id_user = (isset($_POST['id-user'])) ? $_POST['id-user'] : '';
    $id_product = (isset($_POST['id-product'])) ? $_POST['id-product'] : '';
    $id_promo = (isset($_POST['id-promo'])) ? $_POST['id-promo'] : '';
    $faltante = (isset($_POST['faltante'])) ? $_POST['faltante'] : '';

    //Funciones{
    function compra($cantidad, $id_user, $id_product, $id_promo, $faltante, $con)
    {
        // Validar datos de entrada
        if (empty($cantidad) || empty($id_user) || empty($id_product) || empty($id_promo) || empty($faltante)) {
            return [
                'icon' => 'error',
                'msj' => 'El campo "cantidad" está vacío.'
            ];
        }

        if ($cantidad > $faltante) {
            return [
                'icon' => 'error',
                'msj' => 'La cantidad es mayor a los faltantes'
            ];
        }

        try {
            $q_compra = "INSERT INTO compra (ID_USER, ID_PRODUCT, ID_ADMIN, CANTIDAD) VALUES (:id_us, :id_prod, :id_ad, :cant)";
            $resQ = $con->prepare($q_compra);

            $resQ->bindParam(':id_us', $id_user, PDO::PARAM_INT);
            $resQ->bindParam(':id_prod', $id_product, PDO::PARAM_INT);
            $resQ->bindParam(':id_ad', $_SESSION['id-user'], PDO::PARAM_INT);
            $resQ->bindParam(':cant', $cantidad, PDO::PARAM_INT);
            if ($resQ->execute()) {
                $q_promo = "UPDATE promo SET COMPRADOS = COMPRADOS + :cantidad_nueva, FALTANTES = FALTANTES - :cantidad_nueva WHERE ID = :id_promo";
                $resP = $con->prepare($q_promo);
                $resP->bindParam(':cantidad_nueva', $cantidad, PDO::PARAM_INT);
                $resP->bindParam(':id_promo', $id_promo, PDO::PARAM_INT);
                if ($resP->execute()) {
                    $icon = "success";
                    $msj = "Se registro la compra";
                } else {
                    $icon = "error";
                    $msj = "No se registro la promocion";
                }

            } else {
                $icon = "error";
                $msj = "No se registro la compra";
            }
        } catch (PDOException $e) {
            $icon = "error";
            $msj = "Error de base de datos: " . $e->getMessage();
        }

        return [
            'icon' => $icon,
            'msj' => $msj
        ];
    }

    //}End funciones

    // ================================================================

    //funcion principal

    $response = compra($cantidad, $id_user, $id_product, $id_promo, $faltante, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}