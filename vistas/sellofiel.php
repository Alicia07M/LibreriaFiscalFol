<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Sellos Y Fiel</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Sellos y Fiel</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmSellofiel">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaSellofiel">Agregar</span>
					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaSellofielLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaSellofiel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza</h4>
					</div>
					<div class="modal-body">
						<form id="frmSellofielU">
							<input type="text" hidden="" id="idSellofiel" name="idSellofiel">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Clave SAT:</label>
							<input type="text" class="form-control input-sm" id="clavesatU" name="clavesatU">
							<label>Clave Unidad SAT:</label>
							<input type="text" class="form-control input-sm" id="unidadsatU" name="unidadsatU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaSellofiel" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaSellofielLoad').load("sellofiel/tablaSellofiel.php");
			$('#btnAgregaSellofiel').click(function(){

				vacios=validarFormVacio('frmSellofiel');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmSellofiel').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/sellofiel/agregaSellofiel.php",
					success:function(r){
						alert(r);
						if (r==1) {
							$('#frmSellofiel')[0].reset();
							$('#tablaSellofielLoad').load("sellofiel/tablaSellofiel.php");
							alertify.success("¡Agregado con Exito!");
						}else{
							alertify.error("¡No se puede Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosSellofiel(idsellofiel){
			$.ajax({
				type:"POST",
				data:"idsellofiel=" + idsellofiel,
				url:"../procesos/sellofiel/obtenDatosSellofiel.php",
				success:function(r){
					alert(r);
					dato=jQuery.parseJSON(r);

					$('#idSellofiel').val(dato['SSF_CVE_SELLOS_FIEL']);
					$('#claveU').val(dato['SEC_CLAVE']);
					$('#clavesatU').val(dato['SEC_CLAVE_SAT']);
					$('#unidadsatU').val(dato['SEC_CLAVE_UNIDAD_SAT']);
					$('#precioU').val(dato['SSF_PRECIO']);
				}
			});
		}
		function eliminaSellofiel(idsellofiel){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idsellofiel="+ idsellofiel,
					url:"../procesos/sellofiel/eliminarSellofiel.php",
					success:function(r){
						if (r==1) {
							$('#tablaSellofielLoad').load("sellofiel/tablaSellofiel.php");
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
			$('#btnActualizaSellofiel').click(function(){

				datos=$('#frmSellofielU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/sellofiel/actualizaSellofiel.php",
					success:function(r){
						alert(r);
						if (r==1) {
							$('#tablaSellofielLoad').load("sellofiel/tablaSellofiel.php");
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
			document.getElementById("op7").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>