<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

    
	$NOMBRE = $_POST["nombreCliente"];
	$CEDULA = $_POST["cedCliente"];
	$NIT= $_POST["nitCliente"];


	$INSERT_USER = "INSERT INTO cliente(idCliente,nombre,cedula,nit)
					VALUES('','$NOMBRE','$CEDULA','$NIT')";
       
     
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL CREAR NUEVA MARCA";
	} else {
		header("Location: ../Vista/cliente.php");
	}


	mysql_close($con);

?>
