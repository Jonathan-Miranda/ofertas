<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {

    require("../../connection/conexion.php");

    $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $lab = (isset($_POST['lab'])) ? $_POST['lab'] : '';

    //Funciones{
    function addProd($name, $lab, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($lab)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        try {
            $q = "INSERT INTO product (NOMBRE, ID_LAB) VALUES (:name, :id)";
            $res = $con->prepare($q);
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':id', $lab, PDO::PARAM_INT);

            if ($res->execute()) {
                $icon = "success";
                $msj = "Se registro el producto correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo registrar el producto";
            }
        } catch (PDOException $e) {
            // Capturar y mostrar el error de la base de datos
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

    $response = addProd($name, $lab, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
