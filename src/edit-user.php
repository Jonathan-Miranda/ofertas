<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {

    require("../connection/conexion.php");

    $name = (isset($_POST['edit-nombre'])) ? $_POST['edit-nombre'] : '';
    $apell = (isset($_POST['edit-apellido'])) ? $_POST['edit-apellido'] : '';
    $mail = (isset($_POST['edit-mail'])) ? $_POST['edit-mail'] : '';
    $tel = (isset($_POST['edit-tel'])) ? $_POST['edit-tel'] : '';
    $id = (isset($_POST['edit-id'])) ? $_POST['edit-id'] : '';

    //Funciones{
    function verificarCorreo($mail)
    {

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $verificarCorreoResponse = true;
        } else {
            $verificarCorreoResponse = false;
        }

        return $verificarCorreoResponse;
    }

    // ==========================================================
    function editUser($name, $apell, $mail, $tel, $id, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($apell) || empty($mail) || empty($tel) || empty($id)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        if (!preg_match("/^[\p{L}]+(?:[\s-][\p{L}]+)*$/u", $name) || !preg_match("/^[\p{L}]+(?:[\s-][\p{L}]+)*$/u", $apell)) {
            return [
                'icon' => 'error',
                'msj' => 'Nombre o apellido incorrecto'
            ];
        }

        if (!preg_match("/^\d{10,12}$/", $tel)) {
            return [
                'icon' => 'error',
                'msj' => 'Telefono incorrecto'
            ];
        }



        // Verificar si el teléfono ya existe
        $checkPhoneQuery = "SELECT COUNT(*) FROM user WHERE TELEFONO = :tel AND id != :id";
        $stmt = $con->prepare($checkPhoneQuery);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute();
        $phoneExists = $stmt->fetchColumn();

        if ($phoneExists > 0) {
            return [
                'icon' => 'error',
                'msj' => 'El número de teléfono ya está registrado por otro usuario.'
            ];
        }

        try {
            // Consulta de actualización
            $q = "UPDATE user SET NOMBRE = :name, APELLIDO = :apell, CORREO = :mail, TELEFONO = :tel WHERE ID = :id";
            $res = $con->prepare($q);

            // Vinculamos los parámetros
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':apell', $apell, PDO::PARAM_STR);
            $res->bindParam(':mail', $mail, PDO::PARAM_STR);
            $res->bindParam(':tel', $tel, PDO::PARAM_INT);
            $res->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutamos la consulta de actualización
            if ($res->execute()) {
                $icon = "success";
                $msj = "Se actualizó el usuario correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo actualizar el usuario";
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

    if (verificarCorreo($mail)) {
        $response = editUser($name, $apell, $mail, $tel, $id, $con);
    } else {
        $response = [
            'icon' => 'error',
            'msj' => 'Correo incorrecto'
        ];
    }

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}