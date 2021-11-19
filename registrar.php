<?php

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];
$empresa = $_POST["empresa"];
$contrasena_confirmar = $_POST["contrasena_confirmar"];



if ($contrasena !== $contrasena_confirmar) {
    $err = "Las contraseñas no coinciden, intente de nuevo";
    header("Location: /user/regitrar.php?err=".$err);
    exit;
}


include_once "funciones.php";


$existe = usuarioExiste($correo);
if ($existe) {
    $err = "Lo siento, ya existe alguien registrado con ese correo";
    header("Location: /user/regitrar.php?err=".$err);
    exit; 
}

$registradoCorrectamente = registrarUsuario($correo, $contrasena, $empresa);
if ($registradoCorrectamente) {
    echo "<script>
    alert('Registrado correctamente. Ahora el usuario puede iniciar sesión.');
    window.location= '/user/login.php'
    </script>";
} else {
    $err = "Error al registrarte. Intenta más tarde";
    header("Location: /user/regitrar.php?err=".$err);
}
