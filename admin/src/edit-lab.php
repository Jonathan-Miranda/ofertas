<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    $name = (isset($_POST['edit-nombre'])) ? $_POST['edit-nombre'] : '';
    $id = (isset($_POST['edit-id-lab'])) ? $_POST['edit-id-lab'] : '';

    //Funciones{
    function editLab($name, $id, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($id)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        try {
            // Consulta de actualización
            $q = "UPDATE lab SET NOMBRE = :name WHERE ID = :id";
            $res = $con->prepare($q);

            // Vinculamos los parámetros
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':id', $id, PDO::PARAM_STR);

            // Ejecutamos la consulta de actualización
            if ($res->execute()) {
                $icon = "success";
                $msj = "Se actualizó el laboratorio correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo actualizar el laboratorio";
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
    $response = editLab($name, $id, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}