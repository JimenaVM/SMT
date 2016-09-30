<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = $_POST["nombreEmpres"];
	$NIT = $_POST["nitEmpres"];
	$ESTADO = $_POST["estado"];

	$INSERT_USER = "UPDATE empresa
					SET nombreEmpresa='$NOMBRE',nit='$NIT',estado='$ESTADO'
					WHERE idEmpresa='$IDEMPRESA'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR EMPRESA";
	} else {
		header("Location: ../Vista/empresa.php");
	}


	mysql_close($con);

?>
