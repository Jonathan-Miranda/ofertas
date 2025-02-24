<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    $name = (isset($_POST['edit-nombre'])) ? $_POST['edit-nombre'] : '';
    $lab = (isset($_POST['edit-lab'])) ? $_POST['edit-lab'] : '';
    $idProd = (isset($_POST['edit-id-prod'])) ? $_POST['edit-id-prod'] : '';

    //Funciones{
    function editProd($name, $lab, $idProd, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($lab) || empty($idProd)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        try {
            // Consulta de actualización
            $q = "UPDATE product SET NOMBRE = :name, ID_LAB = :idlab WHERE ID = :id";
            $res = $con->prepare($q);

            // Vinculamos los parámetros
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':idlab', $lab, PDO::PARAM_STR);
            $res->bindParam(':id', $idProd, PDO::PARAM_STR);

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
    $response = editProd($name, $lab, $idProd, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}