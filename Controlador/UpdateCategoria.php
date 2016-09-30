<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDCAT = $_POST["id"];
	$NOMBRE = $_POST["nombreMarca"];
    $IMP= $_POST["estadoMarca"]

	$INSERT_USER = "UPDATE categoria
					SET nombre='$NOMBRE',idImpuesto='$IMP'
					WHERE idCategoria='$CAT'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR Categoria";
	} else {
		header("Location: ../Vistas/marca.php");
	}


	mysql_close($con);

?>
