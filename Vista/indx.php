<?php
    require('../Controladores/conexion.php');

   
  
    session_start();
    
    if(isset($_SESSION["id_Usuario"])){
      header("Location: ../Vista/welcome.php");
    }
    
    if(!empty($_POST))
    {
      $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
      $password = mysqli_real_escape_string($mysqli,$_POST['password']);
      $error = '';
      
      $pass = md5($password);
      
      $sql = "SELECT r.idUsuario, r.idRol FROM RolUsuario r inner join Usuario u on r.idUsuario=u.idUsuario WHERE u.login = '$usuario' AND u.password = '$pass'";
      $result=$mysqli->query($sql);
      $rows = $result->num_rows;
      
      if($rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['idRolUsuario'];
        $_SESSION['tipo_usuario'] = $row['id_tipo'];
        
        header("location: welcome.php");
        } else {
        $error = "El nombre o contraseña son incorrectos";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SUPERSOL | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
 

  <body class="login" background="fd.jpg">

  
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="../Controladores/Autentificacion.php">
              <h1>SUPERSOL</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="true"  id="usuario" name="login"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="true"  id="contras" name="contrasena"/>
              </div>
              <div>
                <button type="submit" class="btn btn-success">Ingresar</button>
                <a class="reset_pass" href="#">Olvide mi contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
          
                  <p>©2016 All Rights Reserved. SUPERSOL</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
