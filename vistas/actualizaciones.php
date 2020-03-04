<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Actualizaciones de Software</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Actualizaciones de Software</h4>
			<div class="row">
				<div class="col-sm-3">
					<form id="frmActualizaciones">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave del SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>No. Serie</label>
						<input type="text" class="form-control input-sm" id="noserie" name="noserie">
						<label>Factura:</label>
						<input type="text" class="form-control input-sm" id="factura" name="factura">
						<label>Nomina:</label>
						<input type="text" class="form-control input-sm" id="nomina" name="nomina">
						<label>Contabilidad:</label>
						<input type="text" class="form-control input-sm" id="contabilidad" name="contabilidad">
						<label>Restricciones:</label>
						<input type="text" class="form-control input-sm" id="restricciones" name="restricciones">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaActualizacion">Agregar</span>
					</form>
				</div>
				<div class="col-sm-9">
					<div id="tablaActualizacionesLoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaActualizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Software Fácil</h4>
					</div>
					<div class="modal-body">
						<form id="frmActualizacionesU">
							<input type="text" hidden="" id="idActualizacion" name="idActualizacion">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							<label>No. Serie</label>
							<input type="text" class="form-control input-sm" id="noserieU" name="noserieU">
							<label>Factura:</label>
							<input type="text" class="form-control input-sm" id="facturaU" name="facturaU">
							<label>Nomina:</label>
							<input type="text" class="form-control input-sm" id="nominaU" name="nominaU">
							<label>Contabilidad:</label>
							<input type="text" class="form-control input-sm" id="contabilidadU" name="contabilidadU">
							<label>Restricciones:</label>
							<input type="text" class="form-control input-sm" id="restriccionesU" name="restriccionesU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaActualizacion" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaActualizacionesLoad').load("actualizaciones/tablaActualizaciones.php");
			$('#btnAgregaActualizacion').click(function(){

				vacios=validarFormVacio('frmActualizaciones');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmActualizaciones').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/actualizaciones/agregaActualizacion.php",
					success:function(r){
						if (r==1) {
							$('#frmActualizaciones')[0].reset();
							$('#tablaActualizacionesLoad').load("actualizaciones/tablaActualizaciones.php");
							alertify.success("¡Actualización Agregada!");
						}else{
							alertify.error("¡No se puede Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosActualizacion(idactualizacion){
			$.ajax({
				type:"POST",
				data:"idactualizacion=" + idactualizacion,
				url:"../procesos/actualizaciones/obtenDatosActualizacion.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idActualizacion').val(dato['PSL_CVE_ACTUALIZACION']);
					$('#claveU').val(dato['PSL_CLAVE']);
					$('#precioU').val(dato['PSL_PRECIO']);
					$('#noserieU').val(dato['PSL_NO_SERIE']);
					$('#facturaU').val(dato['PSL_FACTURA']);
					$('#nominaU').val(dato['PSL_NOMINA']);
					$('#contabilidadU').val(dato['PSL_CONTABILIDAD']);
					$('#restriccionesU').val(dato['PSL_RESTRINCCIONES']);
				}
			});
		}
		function eliminaActualizacion(idactualizacion){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idactualizacion="+ idactualizacion,
					url:"../procesos/actualizaciones/eliminarActualizacion.php",
					success:function(r){
						if (r==1) {
							$('#tablaActualizacionesLoad').load("actualizaciones/tablaActualizaciones.php");
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
			$('#btnActualizaActualizacion').click(function(){

				datos=$('#frmActualizacionesU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/actualizaciones/actualizaActualizacion.php",
					success:function(r){
						if (r==1) {
							$('#tablaActualizacionesLoad').load("actualizaciones/tablaActualizaciones.php");
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
			document.getElementById("op1").style.background='#3498DB';
			document.getElementById("op2").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>