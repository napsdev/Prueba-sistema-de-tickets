<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="icon" type="image/png" href="/user/images/icons/favicon.ico  "/>
</head>
    <body>
        <script src="user/vendor/jquery/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="user/vendor/bootstrap/css/bootstrap.min.css">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Salir</span></a>
                </li>
                </ul>
            </div>
            </nav>




        <form action="/tickets/agregar.php" method="POST">

        <input type="hidden" value="<?=$_SESSION["empresa"]?>" name="empresa">
        <input type="hidden" value="<?=$_SESSION["correo"]?>" name="correo_usuario">
        <h4>Ingresa la descripción</h4>
        <input type="text" name="descripcion" required>
        <h4>Fecha</h4>
        <input type="date" name="fecha">
        <br><br>
        <input type="submit" value="Crear ticket" required>

        </form>
        <?php include "tickets/tabla.php"; ?>

        <script src="user/vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

