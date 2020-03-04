<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Cursos</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Otros</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmOtros">
						<label>Nombre del Producto:</label>
						<input type="text" class="form-control input-sm" id="otro" name="otro">
						<label>Descripción</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaOtros">Agregar</span>
					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaOtrosLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaOtro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Otro</h4>
					</div>
					<div class="modal-body">
						<form id="frmOtrosU">
							<input type="text" hidden="" id="idOtro" name="idOtro">
							<label>Nombre del Producto:</label>
							<input type="text" class="form-control input-sm" id="otroU" name="otroU">
							<label>Descripción</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaOtro" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaOtrosLoad').load("otros/tablaOtros.php");
			$('#btnAgregaOtros').click(function(){

				vacios=validarFormVacio('frmOtros');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmOtros').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/otros/agregaOtros.php",
					success:function(r){
						if (r==1) {
							$('#frmOtros')[0].reset();
							$('#tablaOtrosLoad').load("otros/tablaOtros.php");
							alertify.success("¡Producto Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosOtros(idotro){
			$.ajax({
				type:"POST",
				data:"idotro=" + idotro,
				url:"../procesos/otros/obtenDatosOtro.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idOtro').val(dato['OTO_CVE_LFF']);
					$('#otroU').val(dato['OTO_LFF_NOMBRE']);
					$('#descripcionU').val(dato['OTO_LFF_DESCRIPCION']);
					$('#precioU').val(dato['OTRO_LFF_PRECIO']);
					$('#claveU').val(dato['OTO_LFF_CLAVE']);
				}
			});
		}
		function eliminaCurso(idotro){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idotro="+ idotro,
					url:"../procesos/otros/eliminarOtro.php",
					success:function(r){
						if (r==1) {
							$('#tablaOtrosLoad').load("otros/tablaOtros.php");
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
			$('#btnActualizaOtro').click(function(){

				datos=$('#frmOtrosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/otros/actualizaOtro.php",
					success:function(r){
						if (r==1) {
							$('#tablaOtrosLoad').load("otros/tablaOtros.php");
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
			document.getElementById("op5").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>