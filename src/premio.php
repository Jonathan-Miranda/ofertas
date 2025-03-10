<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {

    require("../connection/conexion.php");

    $id_us_regalo = (isset($_POST['id-us-regalo'])) ? $_POST['id-us-regalo'] : '';
    $id_prod_regalo = (isset($_POST['id-prod-regalo'])) ? $_POST['id-prod-regalo'] : '';
    $id_promo = (isset($_POST['id-promo'])) ? $_POST['id-promo'] : '';
    //Funciones{
    function reclamarPremio($id_us_regalo, $id_prod_regalo, $id_promo, $con)
    {
        // Validar datos de entrada
        if (empty($id_us_regalo) || empty($id_prod_regalo) || empty($id_promo)) {
            return [
                'icon' => 'error',
                'msj' => 'Falta un dato'
            ];
        }

        try {
            $q_history = "INSERT INTO history (ID_USER, ID_PRODUCT, ID_ADMIN) VALUES (:id_us, :id_prod, :id_ad)";
            $resQ = $con->prepare($q_history);

            $resQ->bindParam(':id_us', $id_us_regalo, PDO::PARAM_INT);
            $resQ->bindParam(':id_prod', $id_prod_regalo, PDO::PARAM_INT);
            $resQ->bindParam(':id_ad', $_SESSION['id-user'], PDO::PARAM_INT);
            if ($resQ->execute()) {
                $newComprado = 0;

                // Consulta para obtener el valor de OFERTA del producto
                $q_oferta = "SELECT OFERTA FROM product WHERE ID = :id_prod";
                $resOferta = $con->prepare($q_oferta);
                $resOferta->bindParam(':id_prod', $id_prod_regalo, PDO::PARAM_INT);
                $resOferta->execute();

                // Obtener el valor de la oferta
                $ofe_prod = $resOferta->fetchColumn();

                $q_promo = "UPDATE promo SET COMPRADOS = :cantidad_nueva, FALTANTES = :falta_nueva WHERE ID = :id_promo";
                $resP = $con->prepare($q_promo);
                $resP->bindParam(':cantidad_nueva', $newComprado, PDO::PARAM_INT);
                $resP->bindParam(':falta_nueva', $ofe_prod, PDO::PARAM_INT);
                $resP->bindParam(':id_promo', $id_promo, PDO::PARAM_INT);
                if ($resP->execute()) {
                    $icon = "success";
                    $msj = "Producto gratis canjeado";
                } else {
                    $icon = "error";
                    $msj = "Hubo un error al canjear el producto gratis";
                }

            } else {
                $icon = "error";
                $msj = "No se pudo registrar el canje";
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

    $response = reclamarPremio($id_us_regalo, $id_prod_regalo, $id_promo, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}