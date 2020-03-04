<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Datos Clientes Fiscales</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesfcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelF.php">Importar Excel</a>
				</div>
				<br><br>
				<h4>Datos Clientes Generales</h4>
				<div class="col-sm-3">
					<form id="frmClientesFiscales">
						<label>RFC:</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<label>Calle:</label>
						<input type="text" class="form-control input-sm" id="calle" name="calle">
						<label>No. Exterior:</label>
						<input type="text" class="form-control input-sm" id="noext" name="noext">
						<label>No. Interior:</label>
						<input type="text" class="form-control input-sm" id="noint" name="noint">
						<label>Colonia:</label>
						<input type="text" class="form-control input-sm" id="colonia" name="colonia">
						<label>Localidad:</label>
						<input type="text" class="form-control input-sm" id="localidad" name="localidad">
						<label>Municipio o Delegación:</label>
						<input type="text" class="form-control input-sm" id="municipio" name="municipio">
						<label>Codigo Postal:</label>
						<input type="text" class="form-control input-sm" id="cp" name="cp">
						<label>Entidad Federativa:</label>
						<input type="text" class="form-control input-sm" id="entfed" name="entfed">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaClienteF">Agregar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<br><br>
					<label for="caja_busqueda">Buscar:</label>
					<input type="text" id="caja_busqueda" name="caja_busqueda" placeholder="RFC">
					<div id="tablaClientesFLoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaClienteF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cliente Fiscal</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesFiscalesU">
							<input type="text" hidden="" id="idClienteF" name="idClienteF">
							<label>RFC:</label>
							<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
							<label>Calle:</label>
							<input type="text" class="form-control input-sm" id="calleU" name="calleU">
							<label>No. Exterior:</label>
							<input type="text" class="form-control input-sm" id="noextU" name="noextU">
							<label>No. Interior:</label>
							<input type="text" class="form-control input-sm" id="nointU" name="nointU">
							<label>Colonia:</label>
							<input type="text" class="form-control input-sm" id="coloniaU" name="coloniaU">
							<label>Localidad:</label>
							<input type="text" class="form-control input-sm" id="localidadU" name="localidadU">
							<label>Municipio o Delegación:</label>
							<input type="text" class="form-control input-sm" id="municipioU" name="municipioU">
							<label>Codigo Postal:</label>
							<input type="text" class="form-control input-sm" id="cpU" name="cpU">
							<label>Entidad Federativa:</label>
							<input type="text" class="form-control input-sm" id="entfedU" name="entfedU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaClientef" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesFLoad').load("clientesfiscales/tablaClientesFiscales.php");
			$('#btnAgregaClienteF').click(function(){

				datos=$('#frmClientesFiscales').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesfiscales/agregaClienteF.php",
					success:function(r){
						if (r==1) {
							$('#frmClientesFiscales')[0].reset();
							$('#tablaClientesFLoad').load("clientesfiscales/tablaClientesFiscales.php");
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
		function agregaDatosClienteF(idclientef){
			$.ajax({
				type:"POST",
				data:"idclientef=" + idclientef,
				url:"../procesos/clientesfiscales/obtenDatosClienteF.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idClienteF').val(dato['CLIENTE_CVE_CG']);
					$('#rfcU').val(dato['CLIENTE_CG_RFC']);
					$('#calleU').val(dato['CLIENTE_FIS_CALLE']);
					$('#noextU').val(dato['CLIENTE_FIS_NO_EXT']);
					$('#nointU').val(dato['CLIENTE_FIS_NO_INT']);
					$('#coloniaU').val(dato['CLIENTE_FIS_COLONIA']);
					$('#localidadU').val(dato['CLIENTE_FIS_LOCALIDAD']);
					$('#municipioU').val(dato['CLIENTE_FIS_MUNICIPIO']);
					$('#cpU').val(dato['CLIENTE_FIS_CODIGO_POSTAL']);
					$('#entfedU').val(dato['CLIENTE_FIS_ENTIDAD_FEDERATIVA']);
				}
			});
		}
		function eliminaClienteF(idclientef){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idclientef="+ idclientef,
					url:"../procesos/clientesfiscales/eliminarClienteF.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesFLoad').load("clientesfiscales/tablaClientesFiscales.php");
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
				url:'clientesfiscales/tablaClientesFiscales.php',
				type:'POST',
				dataType:'html',
				data:{consulta: consulta },
			})
			.done(function(respuesta){
				$('#tablaClientesFLoad').html(respuesta);
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
			$('#btnActualizaClientef').click(function(){

				datos=$('#frmClientesFiscalesU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientesfiscales/actualizaClienteF.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesFLoad').load("clientesfiscales/tablaClientesFiscales.php");
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
			document.getElementById("op13").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>