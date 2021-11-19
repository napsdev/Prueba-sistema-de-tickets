<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: /user/login.php");
    exit();
}
include __DIR__ . '/conexion.php';
if (!empty($_POST)) {
	if (isset($_POST["descripcion"]) && isset($_POST["fecha"]) && isset($_POST["id"]) && isset($_POST["estado"])) {
		if ($_POST["descripcion"] != "" && $_POST["id"] != "" && $_POST["fecha"] != "") {
			$sql = "update tickets set descripcion=\"$_POST[descripcion]\",fecha=\"$_POST[fecha]\", estado=\"$_POST[estado]\" where id=" ."'". $_POST["id"]."'";
			$query = $con->query($sql);
			if ($query != null) {
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../empresa.php';</script>";
			} else {
				print "<script>alert(\"No se pudo actualizar.\");window.location='../empresa.php';</script>";
			}
		}
	}
}
