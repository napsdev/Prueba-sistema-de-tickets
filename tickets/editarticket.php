<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
include __DIR__ . '/conexion.php';
$user_id = null;
$sql1 = "select * from tickets where id = " ."'".$_GET["id"]."'";
$query = $con->query($sql1);
$person = null;
if ($query->num_rows > 0) {
  while ($r = $query->fetch_object()) {
    $person = $r;
    break;
  }
}
?>
<?php if ($person != null) : ?>
<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tickets</title>
      <link rel="icon" type="image/png" href="../user/images/icons/favicon.ico  "/>
  </head>
        <body>
              <script src="../user/vendor/jquery/jquery-3.2.1.min.js"></script>
              <link rel="stylesheet" href="../user/vendor/bootstrap/css/bootstrap.min.css">

              <form role="form" method="post" action="actualizar.php">
              <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $person->descripcion; ?>">
              </div>
              <div class="form-group">
                <label>Fecha</label>
                <input type="date" class="form-control" name="fecha" value="<?php echo $person->fecha; ?>">
              </div>
              <input type="hidden" name="id" value="<?php echo $person->id; ?>">

              <button type="submit" class="btn btn-default">Actualizar</button>
            </form>
          <?php else : ?>
            <p class="alert alert-danger">404 No se encuentra</p>
          <?php endif; ?>

        <a href="logout.php">Cerrar sesión</a>
    

        <script src="../user/vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>