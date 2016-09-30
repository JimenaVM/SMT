<?php 
 
  session_start();
  $con=require '../Controlador/conexion.php';

  #
   include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
  #
  
  if(!isset($_SESSION["id_usuario"])){
    header("Location: ../Vistas/index.php");
  }
  
  $sql = "SELECT idRol, tipo FROM rol";
  $result=$mysqli->query($sql);
  
  $bandera = false;
  
  #nombre usuario
  $idUsuario = $_SESSION['id_usuario'];
  
  $sql = "SELECT u.IdRolUsuario, p.nombre FROM rolusuario AS u INNER JOIN usuario AS p ON u.idUsuario=p.idUsuario WHERE u.idUsuario = '$idUsuario'";
  $result=$mysqli->query($sql);
  
  $row = $result->fetch_assoc();
  
  

// El mensaje
$mensaje = "Usuario:\r\nLíne\r\nContraseña:";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviarlo
mail('jimenaedith.93@gmail.com', 'Supersol', $mensaje);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SUPERSOL </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

     <link href="../Vistas/css/bootstrap-theme.css" rel="stylesheet">
     <link href="../Vistas/css/bootstrap-theme.min.css" rel="stylesheet">
     <link href="../Vistas/css/bootstrapValidator.css" rel="stylesheet">
     <link href="../Vistas/css/bootstrapValidator.min.css" rel="stylesheet">
     <link href="../Vistas/css/bootstrapValidator.scss" rel="stylesheet">



      <link rel="stylesheet" href="../Vistas/css/bootstrap.css"/>
      <link rel="stylesheet" href="../Vistas/css/bootstrapValidator.css"/>

      <script type="text/javascript" src="../Vistas/jquery/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="../Vistas//js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../Vistas/js/bootstrapValidator.js"></script>


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SUPERSOL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/picture.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenid@,</span>
                <h2><?php echo ''.utf8_decode($row['nombre']); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="usuario.php">Administrar Usuarios</a></li>
                      <li><a href="index2.html">Administrar Roles</a></li>
                      <li><a href="empresa.php">Administrar Empresa</a></li>
                      <li><a href="index3.html">Auditoría</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="proveedor.php">Administrar Proveedor</a></li>
                      <li><a href="producto.php">Administrar Productos</a></li>
                      <li><a href="categoria.php">Administrar Categorías</a></li>
                
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="icons.html">Lista Ventas</a></li>
                      <li><a href="general_elements.html">Dosificación</a></li>
                      <li><a href="media_gallery.html">Generar Venta</a></li>
                      <li><a href="typography.html">Facturación</a></li>
                      <li><a href="icons.html">Créditos</a></li>
                  
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="cliente.php">Administrar Clientes</a></li>
                      <li><a href="empresa.php">Administrar Empresas</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-clone"></i>Pedido <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Lista Pedidos</a></li>
                     
                    </ul>
                  </li>
                   <li><a><i class="fa fa-clone"></i>Publicidad<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Lista de promociones</a></li>
                      <li><a href="fixed_footer.html"></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Productos</a></li>
                      <li><a href="tables_dynamic.html">Ventas</a></li>
                        <li><a href="tables_dynamic.html">Créditos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Dashboards <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdownn-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/picture.jpg" alt=""><?php echo ''.utf8_decode($row['nombre']); ?></h1>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                   
                
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/picture.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ''.utf8_decode($row['nombre']); ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Administrar Usuario</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Modificar Usuario</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Crear Nuevo Usuario</a>
                        </li>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!-- Insert Table User -->
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Email</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Accion</th>
                              </tr>
                            </thead>


                            <tbody>
                              
                               <?php 
                               $queryUsuarios="SELECT * FROM usuario";
                               $getAll = mysql_query($queryUsuarios);
                               while ($row = mysql_fetch_array($getAll, MYSQLI_ASSOC)):
                               ?>
                               <tr>
                                 <th scope="row"><?php echo $row ["nombre"];?></th>
                                 <td><?php echo $row ['apellidoPaterno'];?> </td>
                                 <td><?php echo $row ['apellidoMaterno'];?> </td>
                                 <td><?php echo $row ['email'];?> </td>
                                 <td><?php echo $row ['telefono'];?> </td> 
                                 <td>

                                     <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Acción</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                         
                                            <li><a href="modificarUsuario.php?id=<?php echo $row ['idUsuario'];?>">Editar</a>
                                            </li>

                                             <li class="divider"></li>
                                            <li><a onclick="eliminar(<?php echo $row ['idUsuario'];?>)";>Eliminar</a>
                                            </li>
                                            
                                          </ul>
                                      </div>
                                </td>
                      
                                </tr>
                              <?php endwhile; ?>

                            </tbody>
                          </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <!-- Insert Form New Register -->
                          <div class="x_content">

                              <form id="usuarios" class="form-horizontal form-label-left" action="../Controlador/UsuarioControlador.php" method="POST">
                                
                              <span class="section">Nuevo Usuario</span>

                                <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                                  </div>
                                </div>
                                 <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Paterno <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="apellidoPaterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellidoPaterno"  required="required" type="text">
                                  </div>
                                </div>
                                 <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Materno <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="apellidoMaterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellidoMaterno"  required="required" type="text">
                                  </div>
                                </div>
                                <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" placeholder="ejemplo@dominio.com" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                              </div>
                                 <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Teléfono <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="telefono" name="telefono" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>

                                 <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Cédula <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="carnet" name="carnet" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>

                                <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Empresa <span class="required">*</span>
                                  </label>             
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    M:
                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                                  </div>
                                
                                 
                               </div>
                               <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Roles <span class="required">*</span>
                                  </label>

                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php 
                                         $queryRoles="SELECT * FROM rol";
                                         $getAll = mysql_query($queryRoles);
                                         while ($row = mysql_fetch_array($getAll, MYSQLI_ASSOC)):
                                         ?>
                                          <div class="col-md-12 col-sm-12 col-xs-6">
                                              <label class="checkbox-inline">
                                              <input type="checkbox" id="roles" value="<?php echo $row ['idRol'];?>" name="rol[]"> <?php echo $row ['tipo'];?>
                                              </label>
                                          </div>
                                
                                        <?php endwhile; ?>

                                  </div>
                               </div>
                        





                                    
                          </div>
                              <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Registrar</button>
                                  </div>
                                </div>
                                  </div>
                                </div>
                          </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- Eliminar Usuario -->
    <script type="text/javascript">
      function eliminar(id){
        
        if (confirm("Desea Eliminar al Usuario?")) {
          window.location.href = "../Controladores/DeleteUsuario.php?id=" + id;
        };
        /*var confirm = confirm("Desea Eliminar al Usuario?");
        if (confirm == true) {
            confirm = "acepto";
        } else {
            confirm = "close";
        }*/;
      }
    </script>
    <!-- /Eliminar Usuario -->

    <script type="text/javascript">

      $(document).ready(function() {
      $('#usuarios').bootstrapValidator({
        message: 'Este valor no es válido',

      fields: {

      name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
     
      
    

      }

      });
      });

    </script>

    <script type="text/javascript">
      $("#name").keyup(function(e) {
      // Our regex
      // a-z => allow all lowercase alphabets
      // A-Z => allow all uppercase alphabets
      // 0-9 => allow all numbers
      // @ => allow @ symbol
      var regex = /^[a-zA-Z]+$/;
      // This is will test the value against the regex
      // Will return True if regex satisfied
      if (regex.test(this.value) !== true)
      //alert if not true
      //alert("Invalid Input");

      // You can replace the invalid characters by:
        this.value = this.value.replace(/[^a-zA-Z]+/, '');
    });
    </script>

    <script type="text/javascript">
      $("#apellidoPaterno").keyup(function(e) {
      // Our regex
      // a-z => allow all lowercase alphabets
      // A-Z => allow all uppercase alphabets
      // 0-9 => allow all numbers
      // @ => allow @ symbol
      var regex = /^[a-zA-Z]+$/;
      // This is will test the value against the regex
      // Will return True if regex satisfied
      if (regex.test(this.value) !== true)
      //alert if not true
      //alert("Invalid Input");

      // You can replace the invalid characters by:
        this.value = this.value.replace(/[^a-zA-Z]+/, '');
    });
    </script>
    <script type="text/javascript">
      $("#apellidoMaterno").keyup(function(e) {
      // Our regex
      // a-z => allow all lowercase alphabets
      // A-Z => allow all uppercase alphabets
      // 0-9 => allow all numbers
      // @ => allow @ symbol
      var regex = /^[a-zA-Z]+$/;
      // This is will test the value against the regex
      // Will return True if regex satisfied
      if (regex.test(this.value) !== true)
      //alert if not true
      //alert("Invalid Input");

      // You can replace the invalid characters by:
        this.value = this.value.replace(/[^a-zA-Z]+/, '');
    });
    </script>
    <script type="text/javascript">
      $("#telefono").keyup(function(e) {
      // Our regex
      // a-z => allow all lowercase alphabets
      // A-Z => allow all uppercase alphabets
      // 0-9 => allow all numbers
      // @ => allow @ symbol
      var regex = /^[0-9]+$/;
      // This is will test the value against the regex
      // Will return True if regex satisfied
      if (regex.test(this.value) !== true)
      //alert if not true
      //alert("Invalid Input");

      // You can replace the invalid characters by:
        this.value = this.value.replace(/[^0-9]+/, '');
    });
    </script>
        <script type="text/javascript">
      $("#carnet").keyup(function(e) {
      // Our regex
      // a-z => allow all lowercase alphabets
      // A-Z => allow all uppercase alphabets
      // 0-9 => allow all numbers
      // @ => allow @ symbol
      var regex = /^[0-9]+$/;
      // This is will test the value against the regex
      // Will return True if regex satisfied
      if (regex.test(this.value) !== true)
      //alert if not true
      //alert("Invalid Input");

      // You can replace the invalid characters by:
        this.value = this.value.replace(/[^0-9]+/, '');
    });
    </script>
  </body>
</html>