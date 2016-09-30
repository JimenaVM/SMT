<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$NOMBRE = $_POST["name"];
	$PATERNO = $_POST["apellidoPaterno"];
	$MATERNO = $_POST["apellidoMaterno"];
	$EMAIL = $_POST["email"];
	$TELEFONO = $_POST["telefono"];
    $EMPRESA = $_POST["nombreEmpres"];
	$PASSWORD = MD5(getPassword());
    $CEDULA = $_POST["carnet"];
	$IDROL = $_POST["rol"];
	

	$LOGIN=substr($PATERNO, 0,1)+""+substr($MATERNO, 0,1)+""+substr($NOMBRE, 0,1)+""+getLogin();


	$INSERT_USER = "INSERT INTO usuari(idUsuario,nombre,apellidoPaterno,apellidoMaterno,email,telefono,estado,cedula,idEmpresa)
					VALUES('','$NOMBRE','$PATERNO','$MATERNO','$EMAIL','$TELEFONO','0',$CEDULA,'$EMPRESA')";
       

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL INSERTAR USUARIO";
		echo "loginnnnnnnnn:::::".$LOGIN;
	} else {

		
		$query= mysql_query("SELECT * FROM usuario WHERE nombre='$NOMBRE' AND email='$EMAIL' AND cedula='$CEDULA'");
		$array = mysql_fetch_array($query);
		$result = mysql_num_rows($query);
		if ($result > 0) {

			$GET_ID = $array['idUsuario'];
			# code...
			foreach ($IDROL as $ID) {
						# code...
				$INSERT_USER_ROL="INSERT INTO rolusuario(idUsuario,login,password,idRol) VALUES('$GET_ID','$LOGIN','$PASSWORD','$ID')";
				if (!mysql_query($INSERT_USER_ROL)) {
					# code...
					echo "ERROR AL INSERTAR ROL USUARIO";
				}
						
			}
			header("Location: ../Vista/usuario.php");

		} else {
			echo "id: ".$result;
		}
		
	}

	function getPassword($tam=6){
		$ramdon = "abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}
	function getLogin($tam=3){
		$ramdon = "1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}


?>