<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = $_POST["nombreCliente"];
	$CEDULA = $_POST["cedulaCliente"];
	$NIT = $_POST["nitCliente"];

	$INSERT_USER = "UPDATE cliente
					SET nombre='$NOMBRE',cedula='$CEDULA',nit='$NIT'
					WHERE idCliente='$IDEMPRESA'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR EMPRESA";
	} else {
		header("Location: ../Vista/cliente.php");
	}


	mysql_close($con);

?>
