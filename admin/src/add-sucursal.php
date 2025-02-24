<?php
session_start();

if (isset($_SESSION['ad-name']) && $_SESSION["rol"] === 0) {

    require("../../connection/conexion.php");

    $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $pw = (isset($_POST['pw'])) ? $_POST['pw'] : '';

    //Funciones{
    function addsuc($name, $email, $pw, $con)
    {
        // Validar datos de entrada
        if (empty($name) || empty($email) || empty($pw)) {
            return [
                'icon' => 'error',
                'msj' => 'Todos los campos son obligatorios.'
            ];
        }

        $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);

        if ($hashed_pw !== false) {
            try {
                $q = "INSERT INTO admin (NOMBRE, MAIL, PW) VALUES (:name, :mail, :pw)";
                $res = $con->prepare($q);
                $res->bindParam(':name', $name, PDO::PARAM_STR);
                $res->bindParam(':mail', $email, PDO::PARAM_STR);
                $res->bindParam(':pw', $hashed_pw, PDO::PARAM_STR);
    
                if ($res->execute()) {
                    $icon = "success";
                    $msj = "Se registro la sucursal correctamente";
                } else {
                    $icon = "error";
                    $msj = "No se pudo registrar la sucursal";
                }
            } catch (PDOException $e) {
                // Capturar y mostrar el error de la base de datos
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

    $response = addsuc($name, $email, $pw, $con);

    //end funcion pricipal
    print json_encode($response);
    $con = null;
} else {
    header("Location: ../index.php");
    exit();
}
