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
      <meta charset="utf-8">
      <title>Tickets</title>
      <link rel="icon" type="image/png" href="../user/images/icons/favicon.ico  "/>
      <link rel="stylesheet" href="../CSS/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
              

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

 
                <div class="ticket-form">
                <form action="actualizar.php" method="POST">
                    <input type="hidden" value="<?=$_SESSION["empresa"]?>" name="empresa">
                    <input type="hidden" value="<?=$_SESSION["correo"]?>" name="correo_usuario">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" name="fecha" value="<?php echo $person->fecha; ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Noviembre, octubre y septiembre.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descripción</label>
                        <input type="text" name="descripcion" value="<?php echo $person->descripcion; ?>" required class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="estado">
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
                    <button type="submit" class="btn btn-primary">Actualizar ticket</button>
                    <a href="../empresa.php">Cancelar</a>
                </form>
                </div>

          <?php else : ?>
            <p class="alert alert-danger">404 No se encuentra</p>
          <?php endif; ?>

      
    </body>
</html>