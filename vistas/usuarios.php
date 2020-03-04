<?php 
session_start();
if (isset($_SESSION['usuario']) and $_SESSION['nRol'] =='Gerencia General' || ($_SESSION['nRol']) =='Gerencia General de Operaciones'){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Usuarios</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Usuarios</h4>
			<div class="row">
				<div class="col-sm-3">
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
					</form>
				</div>
				<div class="col-sm-9">
					<div id="tablaUsuariosLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nombre:</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Apellido:</label>
							<input type="text" class="form-control input-sm" id="apellidoU" name="apellidoU">
							<label>Rol:</label>
							<input type="text" class="form-control input-sm" id="rolU" name="rolU">
							<label>Usuario:</label>
							<input type="text" class="form-control input-sm" id="usuarioU" name="usuarioU">
							<label>Contraseña:</label>
							<input type="text" class="form-control input-sm" id="passwordU" name="passwordU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaUsuario" type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Actualiza Usuario</button>

					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		function agregaDatosUsuario(idusuario){
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procesos/usuarios/obtenDatosUsuario.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idUsuario').val(dato['USU_LFF_CVE_ID']);
					$('#nombreU').val(dato['USU_LFF_NOMBRE']);
					$('#apellidoU').val(dato['USU_LFF_APELLIDO']);
					$('#rolU').val(dato['USU_LFF_ROL']);
					$('#usuarioU').val(dato['USU_LFF_USUARIO']);
					$('#passwordU').val(dato['USU_LFF_CONTRASENA']);
				}
			});
		}

		function eliminaUsuario(idusuario){
			alertify.confirm('¿Desea eliminar este Usuario?',function(){
				$.ajax({
					type:"POST",
					data:"idusuario="+ idusuario,
					url:"../procesos/usuarios/eliminarUsuario.php",
					success:function(r){
						if (r==1) {
							$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
							alertify.success('¡Eliminado con Exito!');
						}else{
							alertify.error('¡No se Pudo Eliminar!');
						}
					}
				});
			}, function (){
				alertify.error('¡Cancelado!');
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaUsuario').click(function(){

				datos=$('#frmRegistroU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/usuarios/actualizaUsuario.php",
					success:function(r){
						if (r==1) {
							$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
							alertify.success("¡Actualizado con Exito!");
						}else{
							alertify.error("¡Error al Actualizar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
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
					url:"../procesos/regLogin/registrarUsuario.php",
					success:function(r){
						if (r==1) {
							$('#frmRegistro')[0].reset();
							$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
							alertify.success("¡Agregado con Exito!");
						}else{
							alertify.error("¡Fallo al agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("op10").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>