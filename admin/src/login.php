<?php
session_start();

if (isset($_POST['email']) && isset($_POST['pw'])) {

require("../../connection/conexion.php");

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$password = (isset($_POST['pw'])) ? $_POST['pw'] : '';

//Funciones{

function verificarCorreo($email)
{

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $verificarCorreoResponse = true;
    } else {
        $verificarCorreoResponse = false;
    }

    return $verificarCorreoResponse;
}

// ==========================================================
function loginUsuario($email, $password, $con)
{
    $consulta = "SELECT NOMBRE,PW,ROLL FROM admin WHERE MAIL = :correo  AND ROLL = :rol";
    $resultado = $con->prepare($consulta);
    $rol=0;
    $resultado->bindParam(':correo', $email, PDO::PARAM_STR);
    $resultado->bindParam(':rol', $rol, PDO::PARAM_INT);
    $resultado->execute();
    if ($resultado->rowCount() >= 1) {
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $data['PW'])) {
            $_SESSION["ad-name"] = $data['NOMBRE'];
            $_SESSION["rol"] = $data['ROLL'];

            $icon = "success";
            $msj = "Bienvenido";
        } else {

            $_SESSION["id-user"] = null;
            $icon = "warning";
            $msj = "Contraseña incorrecta";
        }
    } else {

        $_SESSION["id-user"] = null;
        $icon = "error";
        $msj = "No existe este usuario, verifique sus datos";
    }

    return [
        'icon' => $icon,
        'msj' => $msj
    ];
}

//}End funciones

// ================================================================

//funcion principal

if (verificarCorreo($email)) {
    $response = loginUsuario($email, $password, $con);
}else{
    $response=[
        'icon' => 'error',
        'msj' => 'Correo incorrecto'
    ];
}

//end funcion pricipal
print json_encode($response);
$con = null;
}else{
    header("Location: ../index.php");
    exit();
}