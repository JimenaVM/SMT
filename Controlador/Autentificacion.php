<?php
//session_start();
	include "../Controladores/conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	
	$re=mysql_query("select * from usuario where login='".$_POST['login']."' AND 
 					password='".$_POST['contrasena']."'")	or die(mysql_error());
	
	$row = mysql_num_rows($re);

	if($row > 0){
		
		header("Location: ../vistas/usuario.php");
	}else{
		header("Location: ../vistas/login.php");
	}
?>