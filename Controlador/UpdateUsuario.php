<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDUSUARIO = $_POST["id"];
	$NOMBRE = $_POST["Nombre"];
	$PATERNO = $_POST["apellidoPaterno"];
	$MATERNO = $_POST["apellidoMaterno"];
	$EMAIL = $_POST["email"];
	$TELEFONO = $_POST["telefono"];
	$ESTADO = $_POST["estado"];

	$INSERT_USER = "UPDATE usuario
					SET nombre='$NOMBRE',apellidoPaterno='$PATERNO',apellidoMaterno='$MATERNO',email='$EMAIL',telefono='$TELEFONO',estado='$ESTADO'
					WHERE idUsuario='$IDUSUARIO'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR USUARIO";
	} else {
		header("Location: ../Vista/usuario.php");
	}


	mysql_close($con);

?>
