<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$NOMBRE = $_POST["nombreProveedor"];
	$NIT = $_POST["nitProveedor"];
	$ESTADO = $_POST["estado"];
    $AUTORIZACION = $_POST["numAutorizacion"];
	
	$INSERT_USER = "INSERT INTO proveedor(idProveedor,nombre,nit,estado,numeroAutorizacion)
					VALUES('','$NOMBRE','$NIT','$ESTADO','$AUTORIZACION')";
       
      
	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL INSERTAR PROVEEDOR";
	} else {
		$query= mysql_query("SELECT * FROM proveedor WHERE nombre='$NOMBRE' AND nit='$NIT'");
		$array = mysql_fetch_array($query);
		$result = mysql_num_rows($query);
		if ($result > 0) {

			$GET_ID = $array['idProveedor'];
			# code...
			
			header("Location: ../Vista/proveedor.php");

		} else {
			echo "id: ".$result;
		}
		
	}

	function getPassword($tam=6){
		$ramdon = "abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}


?>