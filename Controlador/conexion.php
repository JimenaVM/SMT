<?php
	

	$mysqli=new mysqli("localhost","root","","inventario"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	class connexion{
		function conectar(){
			return mysql_connect('localhost', 'root', '') or die('No se pudo conectar: '.mysql_error());
		}
	}
?>