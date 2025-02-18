<?php
session_start();

if (isset($_SESSION['id-user']) && $_SESSION["rol"] === 2) {

    require("../connection/conexion.php");

    $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $apell = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
    $mail = (isset($_POST['mail'])) ? $_POST['mail'] : '';
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : '';

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
    function addUser($name, $apell, $mail, $tel, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($apell) || empty($mail) || empty($tel)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        if (!preg_match("/^[\p{L}]+(?:[\s-][\p{L}]+)*$/u", $name) || !preg_match("/^[\p{L}]+(?:[\s-][\p{L}]+)*$/u", $apell)){
            return [
                'icon' => 'error',
                'msj' => 'Nombre o apellido incorrecto'
            ];
        }

        if (!preg_match("/^\d{10,12}$/",$tel)){
            return [
                'icon' => 'error',
                'msj' => 'Telefono incorrecto'
            ];
        }



        // Verificar si el teléfono ya existe
        $checkPhoneQuery = "SELECT COUNT(*) FROM user WHERE TELEFONO = :tel";
        $stmt = $con->prepare($checkPhoneQuery);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_INT);
        $stmt->execute();
        $phoneExists = $stmt->fetchColumn();

        if ($phoneExists > 0) {
            return [
                'icon' => 'error',
                'msj' => 'El número de teléfono ya está registrado.'
            ];
        }

        try {
            $q = "INSERT INTO user (NOMBRE, APELLIDO, CORREO, TELEFONO, ID_ADMIN) VALUES (:name, :apell, :mail, :tel, :adm)";
            $res = $con->prepare($q);
            $res->bindParam(':name', $name, PDO::PARAM_STR);
            $res->bindParam(':apell', $apell, PDO::PARAM_STR);
            $res->bindParam(':mail', $mail, PDO::PARAM_STR);
            $res->bindParam(':tel', $tel, PDO::PARAM_INT);
            $res->bindParam(':adm', $_SESSION['id-user'], PDO::PARAM_INT);

            if ($res->execute()) {
                $icon = "success";
                $msj = "Se registro el usuario correctamente";
            } else {
                $icon = "error";
                $msj = "No se pudo registrar el usuario";
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

    if (verificarCorreo($mail)) {
        $response = addUser($name, $apell, $mail, $tel, $con);
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