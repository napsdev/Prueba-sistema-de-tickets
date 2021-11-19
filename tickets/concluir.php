<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
if (!empty($_GET)) {
	include __DIR__ . '/conexion.php';

	$sql = "UPDATE tickets SET estado = 'CONCLUIDO' WHERE id=" ."'". $_GET["id"]."'" ;
	$query = $con->query($sql);
	if ($query != null) {
		print "<script>alert(\"Concluido exitosamente.\");window.location='../empresa.php';</script>";
	} else {
		print "<script>alert(\"No se pudo concluir.\");window.location='../empresa.php';</script>";
	}
}