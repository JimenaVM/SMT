<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$IDEMPRESA = $_POST["idEmpresa"];
	$NOMBRE = $_POST["nombreEmpresa"];
	$NIT = $_POST["nitEmpresa"];

	$INSERT_USER = "INSERT INTO empresa(idEmpresa,nombreEmpresa,nit)
					VALUES('','$NOMBRE','$NIT')";
       
     
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL CREAR NUEVA EMPRESA";
	} else {
		header("Location: ../Vista/empresa.php");
	}


	mysql_close($con);

?>
