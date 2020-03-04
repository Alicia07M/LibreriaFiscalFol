<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Datos Clientes Generales</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesgcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelG.php">Importar Excel</a>
				</div>
				<br><br>
				<h4>Datos Clientes Generales</h4>
				<div class="col-sm-3">
					<form id="frmClientesGenerales">
						<label>RFC:</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<label>Nombre:</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Tipo:</label>
						<input type="text" class="form-control input-sm" id="tipo" name="tipo">
						<label>Nombre Comercial:</label>
						<input type="text" class="form-control input-sm" id="nomcomercial" name="nomcomercial">
						<label>Teléfono:</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>Email Uno:</label>
						<input type="text" class="form-control input-sm" id="email1" name="email1">
						<label>Email Dos:</label>
						<input type="text" class="form-control input-sm" id="email2" name="email2">
						<label>CURP:</label>
						<input type="text" class="form-control input-sm" id="curp" name="curp">
						<label>Moneda:</label>
						<input type="text" class="form-control input-sm" id="moneda" name="moneda">
						<label>Clasificación:</label>
						<input type="text" class="form-control input-sm" id="clasificacion" name="clasificacion">
						<label>Fecha de Alta:</label>
						<input type="text" class="form-control input-sm" id="fecha" name="fecha">
						<label>Observaciones:</label>
						<input type="text" class="form-control input-sm" id="obs" name="obs">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaClienteG">Agregar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<br><br>
					<label for="caja_busqueda">Buscar:</label>
					<input type="text" id="caja_busqueda" name="caja_busqueda" placeholder="RFC o Nombre">
					<div id="tablaClientesGLoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaClienteG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cliente General</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesGeneralesU">
							<input type="text" hidden="" id="idClienteG" name="idClienteG">
							<label>RFC:</label>
							<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
							<label>Nombre:</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Tipo:</label>
							<input type="text" class="form-control input-sm" id="tipoU" name="tipoU">
							<label>Nombre Comercial:</label>
							<input type="text" class="form-control input-sm" id="nomcomercialU" name="nomcomercialU">
							<label>Teléfono:</label>
							<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
							<label>Email Uno:</label>
							<input type="text" class="form-control input-sm" id="email1U" name="email1U">
							<label>Email Dos:</label>
							<input type="text" class="form-control input-sm" id="email2U" name="email2U">
							<label>CURP:</label>
							<input type="text" class="form-control input-sm" id="curpU" name="curpU">
							<label>Moneda:</label>
							<input type="text" class="form-control input-sm" id="monedaU" name="monedaU">
							<label>Clasificación:</label>
							<input type="text" class="form-control input-sm" id="clasificacionU" name="clasificacionU">
							<label>Fecha de Alta:</label>
							<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
							<label>Observaciones:</label>
							<input type="text" class="form-control input-sm" id="obsU" name="obsU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaClienteg" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesGLoad').load("clientesgenerales/tablaClientesGenerales.php");
			$('#btnAgregaClienteG').click(function(){

				datos=$('#frmClientesGenerales').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesgenerales/agregaClienteG.php",
					success:function(r){
						if (r==1) {
							$('#frmClientesGenerales')[0].reset();
							$('#tablaClientesGLoad').load("clientesgenerales/tablaClientesGenerales.php");
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
		function agregaDatosClienteG(idclienteg){
			$.ajax({
				type:"POST",
				data:"idclienteg=" + idclienteg,
				url:"../procesos/clientesgenerales/obtenDatosClienteG.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idClienteG').val(dato['CLIENTE_CVE_CG']);
					$('#rfcU').val(dato['CLIENTE_CG_RFC']);
					$('#nombreU').val(dato['CLIENTE_CG_NOMBRE']);
					$('#tipoU').val(dato['CLIENTE_CG_TIPO']);
					$('#nomcomercialU').val(dato['CLIENTE_CG_NOMBRE_COMERCIAL']);
					$('#telefonoU').val(dato['CLIENTE_CG_TELEFONO']);
					$('#email1U').val(dato['CLIENTE_CG_EMAIL_UNO']);
					$('#email2U').val(dato['CLIENTE_CG_EMAIL_DOS']);
					$('#curpU').val(dato['CLIENTE_CG_CURP']);
					$('#monedaU').val(dato['CLIENTE_CG_MONEDA']);
					$('#clasificacionU').val(dato['CLINETE_CG_CLASIFICACION']);
					$('#fechaU').val(dato['CLIENTE_CG_FECHA_ALTA']);
					$('#obsU').val(dato['CLIENTE_CG_OBSERVACIONES']);
				}
			});
		}
		function eliminaClienteG(idclienteg){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idclienteg="+ idclienteg,
					url:"../procesos/clientesgenerales/eliminarClienteG.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesGLoad').load("clientesgenerales/tablaClientesGenerales.php");
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
				url:'clientesgenerales/tablaClientesGenerales.php',
				type:'POST',
				dataType:'html',
				data:{consulta: consulta },
			})
			.done(function(respuesta){
				$('#tablaClientesGLoad').html(respuesta);
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
			$('#btnActualizaClienteg').click(function(){

				datos=$('#frmClientesGeneralesU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesgenerales/actualizaClienteG.php",
					success:function(r){
						alert(r);
						if (r==1) {
							$('#tablaClientesGLoad').load("clientesgenerales/tablaClientesGenerales.php");
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
			document.getElementById("op12").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>