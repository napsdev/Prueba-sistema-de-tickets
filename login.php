<?php
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

include_once "funciones.php";
$logueadoConExito = login($correo, $contrasena);
if ($logueadoConExito) {
    header("Location: empresa.php");
    exit;
} else {
    $err = "Usuario o contraseña incorrecta";
    header("Location: /user/login.php?err=".$err);
}
