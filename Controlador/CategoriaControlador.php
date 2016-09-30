<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	
	$NOMBRE = strtoupper($_POST["nombreCategoria"]);
	$IMPUESTO = $_POST["nombreImpuesto"];
	
    if($IMPUESTO==0)
    {
      $IMPUESTO="";
      $INSERT_USER = "INSERT INTO categoria(idCategoria,descripcion,idImpuesto)
					VALUES('','$NOMBRE','$IMPUESTO')";
    }
    else{
      $INSERT_USER = "INSERT INTO categoria(idCategoria,descripcion,idImpuesto)
					VALUES('','$NOMBRE','$IMPUESTO')";
    }
	
       
     
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL CREAR NUEVA CATEGORIA";
		echo "caaacc".$IMPUESTO;
	} else {
		header("Location: ../Vista/categoria.php");
	}


	mysql_close($con);

?>
