<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Revistas</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Revistas</h4>
			<div class="row">
				<div class="col-sm-3">
					<form id="frmRevista">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave Del SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Nombre:</label>
						<input type="text" class="form-control input-sm" id="revista" name="revista">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Año:</label>
						<input type="number" class="form-control input-sm" id="ano" name="ano" min="2013" max="4000">
						<label>Editorial:</label>
						<select class="form-control input-sm" id="editorial" name="editorial">
							<option value="A">Selecciona Editorial:</option>
							<option value="TAX">TAX</option>
							<option value="IMPC">IMPC</option>
							<option value="THEMIS">THEMIS</option>
							<option value="GASCA">GASCA</option>
							<option value="DOFISCAL">DOFISCAL</option>
							<option value="ISEF">ISEF</option>
							<option value="OTRAS">OTRAS</option>
						</select>
						<label>Tipo:</label>
						<select class="form-control input-sm" id="tipo" name="tipo">
							<option value="A">Selecciona Tipo:</option>
							<option value="Online">Online</option>
							<option value="Papel">Papel</option>
						</select>
						<label>Mes de la Revista:</label>
						<select class="form-control input-sm" id="mes" name="mes">
							<option value="A">Seleccion Mes:</option>
							<option value="Enero">Enero</option>
							<option value="Febrero">Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						</select>
						<p></p>
						<span class="btn btn-primary" id="btnAgregaRevista">Agregar</span>
					</form>
				</div>
				<div class="col-sm-9">
					<div id="tablaRevistasLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaRevista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Revista</h4>
					</div>
					<div class="modal-body">
						<form id="frmRevistaU">
							<input type="text" hidden="" id="idRevista" name="idRevista">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Nombre:</label>
							<input type="text" class="form-control input-sm" id="revistaU" name="revistaU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							<label>Año:</label>
							<input type="number" class="form-control input-sm" id="anoU" name="anoU" min="2013" max="4000">
							<label>Editorial:</label>
							<select class="form-control input-sm" id="editorialU" name="editorialU">
								<option value="A">Selecciona Editorial:</option>
								<option value="TAX">TAX</option>
								<option value="IMPC">IMPC</option>
								<option value="THEMIS">THEMIS</option>
								<option value="GASCA">GASCA</option>
								<option value="DOFISCAL">DOFISCAL</option>
								<option value="ISEF">ISEF</option>
								<option value="OTRAS">OTRAS</option>
							</select>
							<label>Tipo:</label>
							<select class="form-control input-sm" id="tipoU" name="tipoU">
								<option value="A">Selecciona Tipo:</option>
								<option value="Online">Online</option>
								<option value="Papel">Papel</option>
							</select>
							<label>Mes de la Revista:</label>
							<select class="form-control input-sm" id="mesU" name="mesU">
								<option value="A">Seleccion Mes:</option>
								<option value="Enero">Enero</option>
								<option value="Febrero">Febrero</option>
								<option value="Marzo">Marzo</option>
								<option value="Abril">Abril</option>
								<option value="Mayo">Mayo</option>
								<option value="Junio">Junio</option>
								<option value="Julio">Julio</option>
								<option value="Agosto">Agosto</option>
								<option value="Septiembre">Septiembre</option>
								<option value="Octubre">Octubre</option>
								<option value="Noviembre">Noviembre</option>
								<option value="Diciembre">Diciembre</option>
							</select>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaRevista" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaRevistasLoad').load("revistas/tablaRevistas.php");
			$('#btnAgregaRevista').click(function(){

				vacios=validarFormVacio('frmRevista');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmRevista').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/revistas/agregaRevista.php",
					success:function(r){
						alert(r);
						if (r==1) {
							$('#frmRevista')[0].reset();
							$('#tablaRevistasLoad').load("revistas/tablaRevistas.php");
							alertify.success("¡Revista Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!")
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosRevista(idrevista){
			$.ajax({
				type:"POST",
				data:"idrevista=" + idrevista,
				url:"../procesos/revistas/obtenDatosRevista.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idRevista').val(dato['PLR_CVE_REVISTA']);
					$('#claveU').val(dato['PLR_CLAVE']);
					$('#revistaU').val(dato['PLR_NOMBRE_REVISTA']);
					$('#precioU').val(dato['PLR_PRECIO_REVISTA']);
					$('#anoU').val(dato['PLR_ANO_REVISTA']);
					$('#editorialU').val(dato['PLR_EDITORIAL_REVISTA']);
					$('#tipoU').val(dato['PLR_TIPO_REVISTA']);
					$('#mesU').val(dato['PLR_NUMERO_POR_MES_REVISTA']);
					$('#fechaiU').val(dato['PLR_VIGENCIA_INICIO_REVISTA']);
					$('#fechafU').val(dato['PLR_VIGENCIA_FIN_REVISTA']);
				}
			});
		}
		function eliminaRevista(idrevista){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idrevista="+ idrevista,
					url:"../procesos/revistas/eliminarRevista.php",
					success:function(r){
						if (r==1) {
							$('#tablaRevistasLoad').load("revistas/tablaRevistas.php");
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
			$('#btnActualizaRevista').click(function(){

				datos=$('#frmRevistaU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/revistas/actualizaRevista.php",
					success:function(r){
						if (r==1) {
							$('#tablaRevistasLoad').load("revistas/tablaRevistas.php");
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
			document.getElementById("op6").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>