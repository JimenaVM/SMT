<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$NOMBRE = $_POST["Nombre"];
	$PATERNO = $_POST["apellidoPaterno"];
	$MATERNO = $_POST["apellidoMaterno"];
	$EMAIL = $_POST["email"];
	$TELEFONO = $_POST["telefono"];

	$PASSWORD = getPassword();

	$IDROL = $_POST["rol"];
	
	$INSERT_USER = "INSERT INTO usuario(idUsuario,nombre,apellidoPaterno,apellidoMaterno,email,telefono,login,password,estado,Rol_idRol)
					VALUES('','$NOMBRE','$PATERNO','$MATERNO','$EMAIL','$TELEFONO','$NOMBRE','$PASSWORD','0','3')";
       
      
	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL INSERTAR USUARIO";
	} else {

		
		$query= mysql_query("SELECT * FROM usuario WHERE nombre='$NOMBRE' AND email='$EMAIL'");
		$array = mysql_fetch_array($query);
		$result = mysql_num_rows($query);
		if ($result > 0) {

			$GET_ID = $array['idUsuario'];
			# code...
			foreach ($IDROL as $ID) {
						# code...
				$INSERT_USER_ROL="INSERT INTO rolusuario(idUsuario,idRol) VALUES('$GET_ID','$ID')";
				if (!mysql_query($INSERT_USER_ROL)) {
					# code...
					echo "ERROR AL INSERTAR ROL USUARIO";
				}
						
			}
			header("Location: ../Vistas/usuario.php");

		} else {
			echo "id: ".$result;
		}
		
	}

	function getPassword($tam=6){
		$ramdon = "abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}


?>