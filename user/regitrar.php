<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" action="../registrar.php" method="POST">
					<span class="login100-form-title p-b-34">
						Login
					</span>
					<?php
					if(isset($_GET['err'])){?>
					<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $_GET['err']; ?></strong> </div>
					<?php
					}?>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Escriba el correo" required>
						<input id="first-name" class="input100" type="email" name="correo" placeholder="Correo">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Escriba la contraseña" required>
						<input class="input100" type="password" name="contrasena" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>

					

					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Escriba la contraseña" required>
						<input class="input100" type="password" name="contrasena_confirmar" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>



					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Escriba la contraseña" required>
					<select style="overflow: hidden;" class="input100" name="empresa" multiple aria-label="multiple select example">
					<?php
					include '../tickets/conexion.php';
					$sql1 = "select * from empresa";
					$query = $con->query($sql1);
					?>
					<?php if ($query->num_rows > 0) : ?>
							<?php while ($r = $query->fetch_array()) : ?>

								<option value="<?php echo $r["nombre"]; ?>"><?php echo $r["nombre"]; ?></option>

								<?php endwhile; ?>
					<?php else : ?>
						<option value="">No hay resultados</option>
					<?php endif; ?>
					</select>
					<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrar
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239">
					
					</div>
					<div class="w-full text-center">
						<a href="login.php" class="txt3">
							Login
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/imagen1.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>