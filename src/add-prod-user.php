<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {

    require("../connection/conexion.php");

    $product = (isset($_POST['prod'])) ? $_POST['prod'] : '';
    $user = (isset($_POST['id-us'])) ? $_POST['id-us'] : '';

    //Funciones{
    function editUser($product, $user, $con)
    {
        // Validar datos de entrada
        if (empty($product) || empty($user)) {
            return [
                'icon' => 'error',
                'msj' => 'Seleccione algun producto.'
            ];
        }

        // Verificar si el producto ya existe
        $checkProdQ = "SELECT COUNT(*) FROM user_product WHERE ID_USER = :id_us AND ID_PRODUCT = :id_prod";
        $stmt = $con->prepare($checkProdQ);
        $stmt->bindParam(':id_us', $user, PDO::PARAM_INT);
        $stmt->bindParam(':id_prod', $product, PDO::PARAM_INT);
        $stmt->execute();
        $prodExists = $stmt->fetchColumn();

        if ($prodExists > 0) {
            return [
                'icon' => 'error',
                'msj' => 'El usuario ya tiene este producto'
            ];
        }

        try {
            // Consulta de insercion
            $q = "INSERT INTO user_product (ID_USER, ID_PRODUCT) VALUES (:id_us, :id_prod)";
            $res = $con->prepare($q);

            // Vinculamos los parámetros
            $res->bindParam(':id_us', $user, PDO::PARAM_INT);
            $res->bindParam(':id_prod', $product, PDO::PARAM_INT);

            // Ejecutamos la consulta de actualización
            if ($res->execute()) {
                $icon = "success";
                $msj = "Se añadio el producto";
            } else {
                $icon = "error";
                $msj = "No se pudo añadir el producto";
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

    $response = editUser($product, $user, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}