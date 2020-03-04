
<?php require_once "dependencias.php";?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <div id="nav">
    <div class="navbar navbar-dark bg-primary navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive wrap img-thumbnail" src="../images/libreria-Fiscal-Fol.jpg" alt="" width="200px" height="200px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active" style="background-color: #E0F8F7;"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>
          <li id="op1" class="dropdown" style="background-color: #E0F8F7;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>Productos y Servicios <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="op2" style="background-color: #E0F8F7;"><a href="actualizaciones.php">Actualizaciones</a></li>
              <li id="op3" style="background-color: #E0F8F7;"><a href="cursos.php">Cursos</a></li>
              <li id="op4" style="background-color: #E0F8F7;"><a href="productos.php">Libros y Leyes</a></li>
              <li id="op5" style="background-color: #E0F8F7;"><a href="otros.php">Otros</a></li>
              <li id="op6" style="background-color: #E0F8F7;"><a href="revistas.php">Revistas</a></li>
              <li id="op7" style="background-color: #E0F8F7;"><a href="sellofiel.php">Sellos y Fieles</a></li>
              <li id="op8" style="background-color: #E0F8F7;"><a href="servicios.php">Servicio Vía Remota</a></li>
              <li id="op9" style="background-color: #E0F8F7;"><a href="timbres.php">Timbres</a></li>
            </ul>
          </li>          
          <?php 
            if ($_SESSION['nRol']=="Gerencia General" || $_SESSION['nRol']=="Gerencia General de Operaciones"):
           ?>
           <li id="op10" style="background-color: #E0F8F7;"><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span>Usuarios</a>
            </li>
            <?php 
              endif;
             ?>

          <li id="op11" class="dropdown" style="background-color: #E0F8F7;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Clientes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="op12" style="background-color: #E0F8F7;"><a href="clientesg.php">Datos Generales</a></li>
              <li id="op13" style="background-color: #E0F8F7;"><a href="clientesf.php">Datos Fiscales</a></li>
              <li id="op14" style="background-color: #E0F8F7;"><a href="clientesc.php">Datos Comerciales</a></li>
              <li id="op15" style="background-color: #E0F8F7;"><a href="clientescon.php">Datos Contacto</a></li>
              <li id="op16" style="background-color: #E0F8F7;"><a href="clientese.php">Datos de Envio</a></li>   
            </ul>
          <li id="op17" style="background-color: #E0F8F7;"><a href="ventas.php"><span class="glyphicon glyphicon-usd"></span>Módulo de Ventas</a>
          </li>
          <li id="op18" style="background-color: #E0F8F7;"><a href="envios.php"><span class="glyphicon glyphicon-envelope"></span>Envíos</a>
          </li>
          <li class="dropdown" style="background-color: #E0F8F7;">
            <a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color: #E0F8F7;">
              <li style="background-color: #E0F8F7;"> <a href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  });
</script>