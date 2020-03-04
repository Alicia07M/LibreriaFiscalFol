<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Timbres</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Timbres</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmTimbres">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Factura:</label>
						<input type="text" class="form-control input-sm" id="factura" name="factura">
						<label>Nomina:</label>
						<input type="text" class="form-control input-sm" id="nomina" name="nomina">
						<label>Retenciones:</label>
						<input type="text" class="form-control input-sm" id="retenciones" name="retenciones">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaTimbres">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaTimbresLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaTimbre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza</h4>
					</div>
					<div class="modal-body">
						<form id="frmTimbresU">
							<input type="text" hidden="" id="idTimbre" name="idTimbre">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Factura:</label>
							<input type="text" class="form-control input-sm" id="facturaU" name="facturaU">
							<label>Nomina:</label>
							<input type="text" class="form-control input-sm" id="nominaU" name="nominaU">
							<label>Retenciones:</label>
							<input type="text" class="form-control input-sm" id="retencionesU" name="retencionesU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaTimbre" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaTimbresLoad').load("timbres/tablaTimbres.php");
			$('#btnAgregaTimbres').click(function(){

				vacios=validarFormVacio('frmTimbres');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmTimbres').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/timbres/agregaTimbre.php",
					success:function(r){
						alert(r)
						if (r==1) {
							$('#frmTimbres')[0].reset();
							$('#tablaTimbresLoad').load("timbres/tablaTimbres.php");
							alertify.success("¡Timbres Agregados!");
						}else{
							alertify.error("¡No se pudieron Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosTimbre(idtimbre){
			$.ajax({
				type:"POST",
				data:"idtimbre=" + idtimbre,
				url:"../procesos/timbres/obtenDatosTimbre.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idTimbre').val(dato['PST_CVE_TIMBRES']);
					$('#claveU').val(dato['PST_CLAVE']);
					$('#facturaU').val(dato['PST_FACTURA']);
					$('#nominaU').val(dato['PST_NOMINA']);
					$('#retencionesU').val(dato['PST_RETENCIONES']);
					$('#precioU').val(dato['PST_PRECIO_TIMBRES']);
				}
			});
		}
		function eliminaTimbre(idtimbre){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idtimbre="+ idtimbre,
					url:"../procesos/timbres/eliminarTimbre.php",
					success:function(r){
						if (r==1) {
							$('#tablaTimbresLoad').load("timbres/tablaTimbres.php");
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
			$('#btnActualizaTimbre').click(function(){

				datos=$('#frmTimbresU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/timbres/actualizaTimbre.php",
					success:function(r){
						if (r==1) {
							$('#tablaTimbresLoad').load("timbres/tablaTimbres.php");
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
			document.getElementById("op9").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>