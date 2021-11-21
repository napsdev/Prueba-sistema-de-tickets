<?php
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
include __DIR__ . '/conexion.php';

if ($_SESSION['empresa'] == "admin") {
	
	$sql1 = "select * from tickets";
}else{
	$sql1 = "select * from tickets where correo_usuario=\"$_SESSION[correo]\"";
}

$query = $con->query($sql1);
?>
<?php if ($query->num_rows > 0) : ?>
	<table id="table_id" class="table table-bordered table-hover">
		<thead>
			<th>Descripción</th>
			<th>Fecha</th>
			<th>Empresa</th>
			<th>Estado</th>
			<th></th>
		</thead>
		<?php while ($r = $query->fetch_array()) : ?>
			<tr>
				<td><?php echo $r["descripcion"]; ?></td>
				<td><?php echo $r["fecha"]; ?></td>
				<td><?php echo $r["empresa"]; ?></td>
				
				<td style="<?php if ($r["estado"]=='EN PROCESO') {
					echo 'color:#2ecc71;';
				}else{
					echo 'color:#e74c3c;';
				}?>"><?php echo $r["estado"]; ?></td>
				<td style="width:150px;">
					<a href="tickets/editarticket.php?id=<?php echo $r["id"]; ?>" class="btn btn-sm btn-warning">Editar</a>
					
					<a href="#" id="del-<?php echo $r["id"]; ?>" class="btn btn-sm btn-danger">Eliminar</a>
					<script>
						$("#del-<?php echo $r["id"]; ?>").click(function(e) {
							e.preventDefault();
							p = confirm("Estas seguro?");
							if (p) {
								window.location = "/tickets/eliminar.php?id=<?php echo $r["id"]; ?>" ;
							}
						});
					</script>
					<a href="#" id="concluir-<?php echo $r["id"]; ?>" class="btn btn-sm btn-success">Concluir</a>
					<script>
						$("#concluir-<?php echo $r["id"]; ?>").click(function(e) {
							e.preventDefault();
							p = confirm("Estas seguro de cloncluir el ticket?");
							if (p) {
								window.location = "/tickets/concluir.php?id=<?php echo $r["id"]; ?>" ;
							}
						});
					</script>


				</td>
			</tr>
		<?php endwhile; ?>
	</table>
<?php else : ?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>