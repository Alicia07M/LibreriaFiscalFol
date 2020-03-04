<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Datos Clientes Envío</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesecrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelE.php">Importar Excel</a>
				</div>
				<br><br>
				<h4>Datos Clientes Envío</h4>
				<div class="col-sm-3">
					<form id="frmClientesEnvio">
						<label>RFC:</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<label>Calle de Envío:</label>
						<input type="text" class="form-control input-sm" id="callen" name="callen">
						<label>No. Exterior:</label>
						<input type="text" class="form-control input-sm" id="noint" name="noint">
						<label>No. Interior:</label>
						<input type="text" class="form-control input-sm" id="noext" name="noext">
						<label>Colonia:</label>
						<input type="text" class="form-control input-sm" id="colonia" name="colonia">
						<label>Localidad:</label>
						<input type="text" class="form-control input-sm" id="localidad" name="localidad">
						<label>Municipio:</label>
						<input type="text" class="form-control input-sm" id="municipio" name="municipio">
						<label>Codigo Postal:</label>
						<input type="text" class="form-control input-sm" id="codpostal" name="codpostal">
						<label>Entidad Federativa:</label>
						<input type="text" class="form-control input-sm" id="entfederativa" name="entfederativa">
						<label>País:</label>
						<input type="text" class="form-control input-sm" id="pais" name="pais">
						<label>Teléfono:</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>Celular:</label>
						<input type="text" class="form-control input-sm" id="celular" name="celular">
						<label>Observaciones:</label>
						<input type="text" class="form-control input-sm" id="obs" name="obs">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaClienteE">Agregar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<br><br>
					<label for="caja_busqueda">Buscar:</label>
					<input type="text" id="caja_busqueda" name="caja_busqueda" placeholder="RFC">
					<div id="tablaClientesELoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaClienteE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cliente General</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesEnvioU">
							<input type="text" hidden="" id="idClienteE" name="idClienteE">
							<label>RFC:</label>
							<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
							<label>Calle de Envío:</label>
							<input type="text" class="form-control input-sm" id="callenU" name="callenU">
							<label>No. Exterior:</label>
							<input type="text" class="form-control input-sm" id="noextU" name="noextU">
							<label>No. Interior:</label>
							<input type="text" class="form-control input-sm" id="nointU" name="nointU">
							<label>Colonia:</label>
							<input type="text" class="form-control input-sm" id="coloniaU" name="coloniaU">
							<label>Localidad:</label>
							<input type="text" class="form-control input-sm" id="localidadU" name="localidadU">
							<label>Municipio:</label>
							<input type="text" class="form-control input-sm" id="municipioU" name="municipioU">
							<label>Codigo Postal:</label>
							<input type="text" class="form-control input-sm" id="codpostalU" name="codpostalU">
							<label>Entidad Federativa:</label>
							<input type="text" class="form-control input-sm" id="entfederativaU" name="entfederativaU">
							<label>País:</label>
							<input type="text" class="form-control input-sm" id="paisU" name="paisU">
							<label>Teléfono:</label>
							<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
							<label>Celular:</label>
							<input type="text" class="form-control input-sm" id="celularU" name="celularU">
							<label>Observaciones:</label>
							<input type="text" class="form-control input-sm" id="obsU" name="obsU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaClientee" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesELoad').load("clientesenvio/tablaClientesEnvio.php");
			$('#btnAgregaClienteE').click(function(){

				datos=$('#frmClientesEnvio').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesenvio/agregaClienteE.php",
					success:function(r){
						if (r==1) {
							$('#frmClientesEnvio')[0].reset();
							$('#tablaClientesELoad').load("clientesenvio/tablaClientesEnvio.php");
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
		function agregaDatosClienteE(idclientee){
			$.ajax({
				type:"POST",
				data:"idclientee=" + idclientee,
				url:"../procesos/clientesenvio/obtenDatosClienteE.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idClienteE').val(dato['CLIENTE_CVE_CG']);
					$('#rfcU').val(dato['CLIENTE_CG_RFC']);
					$('#callenU').val(dato['CLIENTE_CE_CALLE']);
					$('#noextU').val(dato['CLIENTE_CE_NUMERO_EXTERIOR']);
					$('#nointU').val(dato['CLIENTE_CE_NUMERO_INTERIOR']);
					$('#coloniaU').val(dato['CLIENTE_CE_COLONIA']);
					$('#localidadU').val(dato['CLIENTE_CE_LOCALIDAD']);
					$('#municipioU').val(dato['CLIENTE_CE_MUNICIPIO']);
					$('#codpostalU').val(dato['CLIENTE_CE_CODIGO_POSTAL']);
					$('#entfederativaU').val(dato['CLIENTE_CE_ENTIDAD']);
					$('#paisU').val(dato['CLIENTE_CE_PAIS']);
					$('#telefonoU').val(dato['CLIENTE_CE_TELEFONO']);
					$('#celularU').val(dato['CLIENTE_CE_CELULAR']);
					$('#obsU').val(dato['CLIENTE_CE_OBSERVACIONES']);
				}
			});
		}
		function eliminaClienteE(idclientee){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idclientee="+ idclientee,
					url:"../procesos/clientesenvio/eliminarClienteE.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesELoad').load("clientesenvio/tablaClientesEnvio.php");
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
				url:'clientesenvio/tablaClientesEnvio.php',
				type:'POST',
				dataType:'html',
				data:{consulta: consulta },
			})
			.done(function(respuesta){
				$('#tablaClientesELoad').html(respuesta);
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
			$('#btnActualizaClientee').click(function(){

				datos=$('#frmClientesEnvioU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesenvio/actualizaClienteE.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesELoad').load("clientesenvio/tablaClientesEnvio.php");
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
			document.getElementById("op16").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>