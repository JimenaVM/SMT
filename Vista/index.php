<?php
	require('../Controlador/conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		$pass = md5($password);
		
		$sql = "SELECT idRolUsuario, idRol FROM RolUsuario WHERE login = '$usuario' AND password = '$pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['idRolUsuario'];
			$_SESSION['tipo_usuario'] = $row['idRol'];
			
			header("location: welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SUPERSOL</title>

        <link rel="stylesheet" href="css/style.css">
   
    
  </head>

  <body>

    <div class="wrapper">
	  <div class="container">
		<h1>Bienvenid@</h1>
		
		<form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
			<input type="text" placeholder="Usuario" id="usuario" name="usuario">
			<input type="password" placeholder="Contraseña" id="password" name="password">
			<button type="submit" id="login-button">Ingresar</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../Vista/js/index.js"></script>

    
    
    
  </body>
</html>
