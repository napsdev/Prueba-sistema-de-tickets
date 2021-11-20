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

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="../empresa.php">Inicio</a>
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

              <form role="form" method="post" action="actualizar.php">
              <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $person->descripcion; ?>">
              </div>
              <div class="form-group">
                <label>Fecha</label>
                <input type="date" class="form-control" name="fecha" value="<?php echo $person->fecha; ?>">
              </div>
              <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="estado">
                  <option selected value="<?php echo $person->estado; ?>"><?php echo $person->estado; ?></option>
                  <option value="<?php
                  if( $person->estado == "EN PROCESO"){
                      echo 'CONCLUIDO';
                  }else{
                      echo 'EN PROCESO';
                  }
                  ?>"><?php
                  if( $person->estado == "EN PROCESO"){
                      echo 'CONCLUIDO';
                  }else{
                      echo 'EN PROCESO';
                  }
                  ?></option>
                </select>
              </div>
              <input type="hidden" name="id" value="<?php echo $person->id; ?>">
              <button type="submit" class="btn btn-default">Actualizar</button>
              <a href="../empresa.php">Cancelar</a>
            </form>
          <?php else : ?>
            <p class="alert alert-danger">404 No se encuentra</p>
          <?php endif; ?>

        <script src="../user/vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>