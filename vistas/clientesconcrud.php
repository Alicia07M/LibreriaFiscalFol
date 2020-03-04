<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Datos Clientes Contacto</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesconcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelCO.php">Importar Excel</a>
				</div>
				<br><br>
				<h4>Datos Clientes Contacto</h4>
				<div class="col-sm-3">
					<form id="frmClientesContacto">
						<label>RFC:</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<label>Nombre:</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Teléfono:</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>Celular:</label>
						<input type="text" class="form-control input-sm" id="celular" name="celular">
						<label>Email Uno:</label>
						<input type="text" class="form-control input-sm" id="email1" name="email1">
						<label>Email Dos:</label>
						<input type="text" class="form-control input-sm" id="email2" name="email2">
						<label>Observaciones:</label>
						<input type="text" class="form-control input-sm" id="obs" name="obs">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaClienteCO">Agregar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<br><br>
					<label for="caja_busqueda">Buscar:</label>
					<input type="text" id="caja_busqueda" name="caja_busqueda" placeholder="RFC o Nombre">
					<div id="tablaClientesCOLoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaClienteCO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cliente Contacto</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesContactoU">
							<input type="text" hidden="" id="idClienteCO" name="idClienteCO">
							<label>RFC:</label>
							<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
							<label>Nombre:</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Teléfono:</label>
							<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
							<label>Celular:</label>
							<input type="text" class="form-control input-sm" id="celularU" name="celularU">
							<label>Email Uno:</label>
							<input type="text" class="form-control input-sm" id="email1U" name="email1U">
							<label>Email Dos:</label>
							<input type="text" class="form-control input-sm" id="email2U" name="email2U">
							<label>Observaciones:</label>
							<input type="text" class="form-control input-sm" id="obsU" name="obsU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaClienteco" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesCOLoad').load("clientescontacto/tablaClientesContacto.php");
			$('#btnAgregaClienteCO').click(function(){

				datos=$('#frmClientesContacto').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientescontacto/agregaClienteCO.php",
					success:function(r){
						if (r==1) {
							$('#frmClientesContacto')[0].reset();
							$('#tablaClientesCOLoad').load("clientescontacto/tablaClientesContacto.php");
							alertify.success("¡Cliente Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosClienteCO(idclienteco){
			$.ajax({
				type:"POST",
				data:"idclienteco=" + idclienteco,
				url:"../procesos/clientescontacto/obtenDatosClienteCO.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idClienteCO').val(dato['CLIENTE_CVE_CG']);
					$('#rfcU').val(dato['CLIENTE_CG_RFC']);
					$('#nombreU').val(dato['CLIENTE_CON_NOMBRE']);
					$('#telefonoU').val(dato['CLIENTE_CON_TELEFONO']);
					$('#celularU').val(dato['CLIENTE_CON_CELULAR']);
					$('#email1U').val(dato['CLIENTE_CON_EMAIL_UNO']);
					$('#email2U').val(dato['CLIENTE_CON_EMAIL_DOS']);
					$('#obsU').val(dato['CLIENTE_CON_OBSERVACIONES']);

				}
			});
		}
		function eliminaClienteCO(idclienteco){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idclienteco="+ idclienteco,
					url:"../procesos/clientescontacto/eliminarClienteCO.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesCOLoad').load("clientescontacto/tablaClientesContacto.php");
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
		$(buscar_datos());

		function buscar_datos(consulta){
			$.ajax({
				url:'clientescontacto/tablaClientesContacto.php',
				type:'POST',
				dataType:'html',
				data:{consulta: consulta },
			})
			.done(function(respuesta){
				$('#tablaClientesCOLoad').html(respuesta);
			})
			.fail(function(){
				console.log("error");
			})
		}

		$(document).on('keyup', '#caja_busqueda', function(){
			var valor = $(this).val();
			if (valor!="") {
				buscar_datos(valor);
			}else{
				buscar_datos();
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaClienteco').click(function(){

				datos=$('#frmClientesContactoU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientescontacto/actualizaClienteCO.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesCOLoad').load("clientescontacto/tablaClientesContacto.php");
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
		window.onload = function(){
			document.getElementById("op11").style.background='#3498DB';
			document.getElementById("op15").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>