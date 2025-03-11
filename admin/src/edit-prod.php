<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    $name = (isset($_POST['edit-nombre'])) ? $_POST['edit-nombre'] : '';
    $lab = (isset($_POST['edit-lab'])) ? $_POST['edit-lab'] : '';
    $idProd = (isset($_POST['edit-id-prod'])) ? $_POST['edit-id-prod'] : '';
    $compra = (isset($_POST['edit-compra'])) ? $_POST['edit-compra'] : '';
    $promo = (isset($_POST['edit-oferta'])) ? $_POST['edit-oferta'] : '';

    //Funciones{
    function editProd($name, $lab, $idProd, $promo, $compra, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($lab) || empty($idProd) || empty($promo) || empty($compra)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        if ($compra < $promo) {
            return [
                'icon' => 'error',
                'msj' => 'Oferta incorrecta, revisa la estructura (la compra no puede ser menor a lo que se paga)'
            ];
        }

        try {
            // Consulta de actualización
            $q = "UPDATE product SET NOMBRE = :name, ID_LAB = :idlab , OFERTA = :oferta WHERE ID = :id";
            $res = $con->prepare($q);

            // Vinculamos los parámetros
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':idlab', $lab, PDO::PARAM_INT);
            $res->bindParam(':oferta', $promo, PDO::PARAM_INT);
            $res->bindParam(':id', $idProd, PDO::PARAM_INT);

            // Ejecutamos la consulta de actualización
            if ($res->execute()) {
                $icon = "success";
                $msj = "Se actualizó el producto correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo actualizar el producto";
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
    $response = editProd($name, $lab, $idProd, $promo, $compra, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}