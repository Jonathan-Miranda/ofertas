<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {

    require("../../connection/conexion.php");

    $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $lab = (isset($_POST['lab'])) ? $_POST['lab'] : '';

    $compra = (isset($_POST['compra'])) ? $_POST['compra'] : '';
    $oferta = (isset($_POST['oferta'])) ? $_POST['oferta'] : '';

    //Funciones{
    function addProd($name, $lab, $compra, $oferta, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($lab)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        if ($compra < $oferta) {
            return [
                'icon' => 'error',
                'msj' => 'Oferta incorrecta, revisa la estructura (la compra no puede ser menor a lo que se paga)'
            ];
        }

        try {
            $q = "INSERT INTO product (NOMBRE, ID_LAB, OFERTA) VALUES (:name, :id, :oferta)";
            $res = $con->prepare($q);
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':id', $lab, PDO::PARAM_INT);
            $res->bindParam(':oferta', $oferta, PDO::PARAM_INT);

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

    $response = addProd($name, $lab, $compra, $oferta, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
