<?php
include_once "conexion.php";
function login($correo, $contrasena)
{
    $usuarioreg = obtenerUsuarioPorCorreo($correo);
    if ($usuarioreg === false) {
        return false;
    }
 
    $contrasenaDeBaseDeDatos = $usuarioreg->contrasena;
    $coinciden = coincidenPalabrasSecretas($contrasena, $contrasenaDeBaseDeDatos);
    if (!$coinciden) {
        return false;
    }
    iniciarSesion($usuarioreg);
    return true;
}

function usuarioExiste($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuarioPorCorreo($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, contrasena, empresa FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function registrarUsuario($correo, $contrasena, $empresa)
{
    $contrasena = hashearcontrasena($contrasena);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(correo, contrasena, empresa) values(?, ?, ?)");
    return $sentencia->execute([$correo, $contrasena, $empresa]);
}


function iniciarSesion($usuario)
{
    session_start();
    $_SESSION["correo"] = $usuario->correo;
    $_SESSION["empresa"] = $usuario->empresa;
    
}

function coincidenPalabrasSecretas($contrasena, $contrasenaDeBaseDeDatos)
{
    return password_verify($contrasena, $contrasenaDeBaseDeDatos);
}

function hashearcontrasena($contrasena)
{
    return password_hash($contrasena, PASSWORD_BCRYPT);
}
