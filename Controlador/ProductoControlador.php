<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$NOMBRE = $_POST["nomProducto"];
	$DESCRIPCION = $_POST["desProducto"];
	$FECHA = $_POST["fecha"];
	$CODIGO = $_POST["codigoProducto"];
	$IMAGEN= $_POST["imagen"];
    $CATEGORIA=$_POST['nombreCat']; 
    $STOCK=$_POST['stockProd'];
    $PRECIOV=$_POST['precioVenta']; 
	
	
	$INSERT_USER = "INSERT INTO producto(idProducto,nombre,descripcion,fechaExpiracion,codigo,foto,cantidadStock,precioVenta,idCategoria)
					VALUES('','$NOMBRE','$DESCRIPCION','$FECHA','$CODIGO','$IMAGEN','$STOCK','$PRECIOV','$CATEGORIA')";
       
      
	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL INSERTAR PRODUCTO";
		echo "nombre" .$NOMBRE;
	echo "des".$DESCRIPCION;
	echo "fecha".$FECHA;
	echo "cod".$CODIGO;
	echo "ima".$IMAGEN;
   echo "cate" .$CATEGORIA; 
    echo "stock".$STOCK;
    echo "precio".$PRECIOV; 
	
	} else {

		
		$query= mysql_query("SELECT * FROM producto WHERE nombre='$NOMBRE' ");
		$array = mysql_fetch_array($query);
		$result = mysql_num_rows($query);
		if ($result > 0) {

			$GET_ID = $array['idProducto'];
			# code...
		
			header("Location: ../Vistasproducto.php");

		} else {
			echo "id: ".$result;
		}
		
	}




?>