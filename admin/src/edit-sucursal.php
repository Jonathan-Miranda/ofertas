<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {
    require("../../connection/conexion.php");

    $name = (isset($_POST['edit-nombre'])) ? $_POST['edit-nombre'] : '';
    $mail = (isset($_POST['edit-email'])) ? $_POST['edit-email'] : '';
    $pw = (isset($_POST['edit-pw'])) ? $_POST['edit-pw'] : '';
    $id = (isset($_POST['edit-id-suc'])) ? $_POST['edit-id-suc'] : '';

    //Funciones{
    function editSuc($name, $mail, $pw, $id, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($mail) || empty($pw) || empty($id)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);
        if ($hashed_pw !== false) {
            try {
                // Consulta de actualización
                $q = "UPDATE admin SET NOMBRE = :name, MAIL = :mail, PW = :pw WHERE ID = :id";
                $res = $con->prepare($q);

                // Vinculamos los parámetros
                $res->bindParam(':name', $name, PDO::PARAM_STR);
                $res->bindParam(':mail', $mail, PDO::PARAM_STR);
                $res->bindParam(':pw', $hashed_pw, PDO::PARAM_STR);
                $res->bindParam(':id', $id, PDO::PARAM_STR);

                // Ejecutamos la consulta de actualización
                if ($res->execute()) {
                    $icon = "success";
                    $msj = "Se actualizó la sucursal correctamente";
                } else {
                    $icon = "error";
                    $msj = "No se pudo actualizar la sucursal";
                }
            } catch (PDOException $e) {
                $icon = "error";
                $msj = "Error de base de datos: " . $e->getMessage();
            }
        } else {
            return [
                'icon' => 'error',
                'msj' => 'Error al encriptar la contraseña'
            ];
        }


        return [
            'icon' => $icon,
            'msj' => $msj
        ];
    }

    //}End funciones

    // ================================================================

    //funcion principal
    $response = editSuc($name, $mail, $pw, $id, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}