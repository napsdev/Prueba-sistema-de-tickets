<?php
function obtenerBaseDeDatos()
{
    $DB = "usuarios";
    $usuario = "root";
    $contraseña = "";
    try {
        $CON = new PDO('mysql:host=localhost;dbname=' . $DB, $usuario, $contraseña);
        $CON->query("set names utf8;");
        $CON->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $CON->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $CON->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $CON;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}
