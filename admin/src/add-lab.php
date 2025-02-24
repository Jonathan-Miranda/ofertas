<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {

    require("../../connection/conexion.php");

    $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';

    //Funciones{
    function addLab($name, $con)
    {
        // Validar datos de entrada
        if (empty($name)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        try {
            $q = "INSERT INTO lab (NOMBRE) VALUES (:name)";
            $res = $con->prepare($q);
            $res->bindParam(':name', $name, PDO::PARAM_STR);

            if ($res->execute()) {
                $icon = "success";
                $msj = "Se registro el laboratorio correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo registrar el laboratorio";
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

    $response = addLab($name, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
