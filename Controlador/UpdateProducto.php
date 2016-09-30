<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$IDPRODUCTO = $_POST["id"];
	
	$NOMBRE = $_POST["nombreProducto"];
	$DESCRIPCION = $_POST["desProducto"];
	$FECHA = $_POST["fecha"];
	$CODIGO = $_POST["codigoProducto"];
	$IMAGEN= $_POST["imagen"];
    $CATEGORIA=$_POST['nombreCat']; 
    $STOCK=$_POST['stockProd'];
    $PRECIOV=$_POST['precioVenta'];


	$INSERT_USER = "UPDATE producto
					SET nombre='$NOMBRE',descripcion='$DESCRIPCION',fechaExpiracion='$FECHA',codigo='$CODIGO',foto='$IMAGEN',cantidadStock='$STOCK',precioVenta='$PRECIOV'#,idCategoria='$CATEGORIA'
					WHERE idProducto='$IDPRODUCTO'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR PRODUCTO";
	} else {
	
		header("Location: ../Vistas/producto.php");
	}


	mysql_close($con);

?>
