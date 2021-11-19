<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
if (!empty($_POST)) {
	if (isset($_POST["descripcion"]) && isset($_POST["fecha"]) && isset($_POST["empresa"]) && isset($_POST["correo_usuario"])) {
		if ($_POST["descripcion"] != "" && $_POST["correo_usuario"] != "" && $_POST["fecha"] != "") {
			include __DIR__ . '/conexion.php';

			$sql = "insert into tickets(descripcion,fecha,empresa,correo_usuario) value (\"$_POST[descripcion]\",\"$_POST[fecha]\",\"$_POST[empresa]\",\"$_POST[correo_usuario]\")";
			$query = $con->query($sql);
			if ($query != null) {
				print "<script>alert(\"Agregado exitosamente.\");window.location='../empresa.php';</script>";
			} else {
				print "<script>alert(\"No se pudo agregar.\");window.location='../empresa.php';</script>";
			}
		}
	}
}
