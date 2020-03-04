<?php 
	require_once "clases/Conexion.php";
	$obj=new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from USUARIO_LFF where USU_LFF_ROL='Gerencia General'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if (mysqli_num_rows($result)>0) {
		$validar=1;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login de Usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body style="background:url(images/banner.jpg); ">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Sistema de la Libería Fiscal Fol</div>
					<div class="panel panel-body">
						<p>
							<img src="images/libreria-Fiscal-Fol.jpg" height="50">
						</p>
						<form id="frmLogin">
							<label>Usuario:</label>
							<input type="text" class="form-control input-sm" id="usuario" name="usuario">
							<label>Contraseña:</label>
							<input type="password" class="form-control input-sm" id="password" name="password">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<?php if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
						<?php endif; ?>
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
		$('#entrarSistema').click(function(){

			vacios=validarFormVacio('frmLogin');
			if (vacios > 0) {
				alert("¡Debes todos los campos!");
				return false;
			}

			datos=$('#frmLogin').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/login.php",
				success:function(r){
					if (r==1) {
						alert("Bienvenido estás entrando al Sistema Interno Libreria Fiscal Fol");
						window.location="vistas/inicio.php";
					}else{
						alert("No Se Puede Accerder con este Usuario");
					}
				}
			});
		});
	});
</script>