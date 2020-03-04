<?php 
require_once "clases/Conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$sql="SELECT * from USUARIO_LFF where USU_LFF_USUARIO='FRED'";
$result=mysqli_query($conexion,$sql);
$validar=0;
if (mysqli_num_rows($result)>0) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Administrador</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body style="background: url(images/banner.jpg);">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel panel-heading">Registrar Administrador</div>
					<div class="panel panel-body">
						<form id="frmRegistro">
							<label>Nombre:</label>
							<input type="text" class="form-control input-sm" id="nombre" name="nombre">
							<label>Apellido:</label>
							<input type="text" class="form-control input-sm" id="apellido" name="apellido">
							<label>Rol:</label>
							<input type="text" class="form-control input-sm" id="rol" name="rol">
							<label>Usuario:</label>
							<input type="text" class="form-control input-sm" id="usuario" name="usuario">
							<label>Contraseña:</label>
							<input type="text" class="form-control input-sm" id="password" name="password">
							<p></p>
							<span class="btn btn-success btn-sm" id="registro">Registrar</span>
							<a href="index.php" class="btn btn-primary btn-sm">Inicio</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){
			vacios=validarFormVacio('frmRegistro');
			if (vacios > 0) {
				alert("¡Debes todos los campos!");
				return false;
			}
			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					if (r==1) {
						alert("¡Aregado con Exito!");
					}else{
						alert("¡Fallo al agregar!");
					}
				}
			});
		});
	});
</script>