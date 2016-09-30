<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDUSUARIO = $_POST["id"];
	$NOMBRE = $_POST["NombreProv"];
	$NIT = $_POST["NitProv"];
	$NUMERO = $_POST["NumProv"];
	$ESTADO = $_POST["estado"];

	$INSERT_USER = "UPDATE proveedor
					SET nombre='$NOMBRE',nit='$NIT',numeroAutorizacion='$NUMERO',estado='$ESTADO'
					WHERE idProveedor='$IDUSUARIO'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR PROVEEDOR";
	} else {
		header("Location: ../Vista/proveedor.php");
	}


	mysql_close($con);

?>
