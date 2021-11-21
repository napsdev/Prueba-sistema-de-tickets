<?php
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
include __DIR__ . '/conexion.php';

if ($_SESSION['empresa'] == "admin") {
	
	$sql1 = "select * from tickets where fecha LIKE '%2021-09%'";
}else{
	$sql1 = "select * from tickets where correo_usuario=\"$_SESSION[correo]\" and fecha LIKE '%2021-09%'";
}

$query = $con->query($sql1);
?>
<?php if ($query->num_rows > 0) : ?>
		<?php while ($r = $query->fetch_array()) : ?>

			<div class="col-12 col-md-6 col-lg-4">
				<div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
					<div class="timeline-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
					<div class="timeline-text">
						<h6><?php echo $r["fecha"]; ?></h6>
						<p><?php echo $r["descripcion"]; ?> <br> 
						<strong style="<?php if ($r["estado"]=='EN PROCESO') {
							echo 'color:#2ecc71;';
						}else{
							echo 'color:#e74c3c;';
						}?>"><?php echo $r["estado"]; ?>
						</strong>
						<a href="tickets/editarticket.php?id=<?php echo $r["id"]; ?>" >Editar</a>
						<a href="#" id="del-<?php echo $r["id"]; ?>" >Eliminar</a>
						<script>
							$("#del-<?php echo $r["id"]; ?>").click(function(e) {
								e.preventDefault();
								p = confirm("Estas seguro?");
								if (p) {
									window.location = "/tickets/eliminar.php?id=<?php echo $r["id"]; ?>" ;
								}
							});
						</script>
						<a href="#" id="concluir-<?php echo $r["id"]; ?>">Concluir</a>
						<script>
							$("#concluir-<?php echo $r["id"]; ?>").click(function(e) {
								e.preventDefault();
								p = confirm("Estas seguro de cloncluir el ticket?");
								if (p) {
									window.location = "/tickets/concluir.php?id=<?php echo $r["id"]; ?>" ;
								}
							});
						</script>
							<?php if ($_SESSION['empresa'] == "admin") {
							echo $r["empresa"];
						}?>
						</p>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
<?php else : ?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>