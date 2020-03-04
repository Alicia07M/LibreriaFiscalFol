<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Datos Clientes Comerciales</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesccrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelC.php">Importar Excel</a>
				</div>
				<br><br>
				<h4>Datos Clientes Comerciales</h4>
				<div class="col-sm-3">
					<form id="frmClientesComerciales">
						<label>RFC:</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<label>Descuento:</label>
						<input type="text" class="form-control input-sm" id="descuento" name="descuento">
						<label>Tasa IVA:</label>
						<input type="text" class="form-control input-sm" id="iva" name="iva">
						<label>Tasa Ret. IVA:</label>
						<input type="text" class="form-control input-sm" id="tasaiva" name="tasaiva">
						<label>Tasa Ret. ISR:</label>
						<input type="text" class="form-control input-sm" id="tasaisr" name="tasaisr">
						<label>Tasa Ret. IEPS:</label>
						<input type="text" class="form-control input-sm" id="ieps" name="ieps">
						<label>Imp. Locales:</label>
						<input type="text" class="form-control input-sm" id="implocal" name="implocal">
						<label>Agenda:</label>
						<input type="text" class="form-control input-sm" id="agenda" name="agenda">
						<label>Complemento:</label>
						<input type="text" class="form-control input-sm" id="complemento" name="complemento">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaClienteC">Agregar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<br><br>
					<label for="caja_busqueda">Buscar:</label>
					<input type="text" id="caja_busqueda" name="caja_busqueda" placeholder="RFC">
					<div id="tablaClientesCLoad"></div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="actualizaClienteC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cliente Comercial</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesComercialesU">
							<input type="text" hidden="" id="idClienteC" name="idClienteC">
							<label>RFC:</label>
							<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
							<label>Descuento:</label>
							<input type="text" class="form-control input-sm" id="descuentoU" name="descuentoU">
							<label>Tasa IVA:</label>
							<input type="text" class="form-control input-sm" id="ivaU" name="ivaU">
							<label>Tasa Ret. IVA:</label>
							<input type="text" class="form-control input-sm" id="tasaivaU" name="tasaivaU">
							<label>Tasa Ret. ISR:</label>
							<input type="text" class="form-control input-sm" id="tasaisrU" name="tasaisrU">
							<label>Tasa Ret. IEPS:</label>
							<input type="text" class="form-control input-sm" id="iepsU" name="iepsU">
							<label>Imp. Locales:</label>
							<input type="text" class="form-control input-sm" id="implocalU" name="implocalU">
							<label>Agenda:</label>
							<input type="text" class="form-control input-sm" id="agendaU" name="agendaU">
							<label>Complemento:</label>
							<input type="text" class="form-control input-sm" id="complementoU" name="complementoU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaClientec" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesCLoad').load("clientescomerciales/tablaClientesComerciales.php");
			$('#btnAgregaClienteC').click(function(){

				datos=$('#frmClientesComerciales').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientescomerciales/agregaClienteC.php",
					success:function(r){
						if (r==1) {
							$('#frmClientesComerciales')[0].reset();
							$('#tablaClientesCLoad').load("clientescomerciales/tablaClientesComerciales.php");
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
		function agregaDatosClienteC(idclientec){
			$.ajax({
				type:"POST",
				data:"idclientec=" + idclientec,
				url:"../procesos/clientescomerciales/obtenDatosClienteC.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idClienteC').val(dato['CLIENTE_CVE_CG']);
					$('#rfcU').val(dato['CLIENTE_CG_RFC']);
					$('#descuentoU').val(dato['CLIENTE_CO_DESCUENTO_UNO']);
					$('#ivaU').val(dato['CLIENTE_CO_TASA_IVA']);
					$('#tasaivaU').val(dato['CLIENTE_CO_TASA_RET_IVA']);
					$('#tasaisrU').val(dato['CLIENTE_CO_TASA_RET_ISR']);
					$('#iepsU').val(dato['CLIENTE_CO_TASA_RET_IEPS']);
					$('#implocalU').val(dato['CLIENTE_CO_IMP_LOCALES']);
					$('#agendaU').val(dato['CLIENTE_CO_AGENDA']);
					$('#complementoU').val(dato['CLIENTE_CO_COMPLEMENTO']);
				}
			});
		}
		function eliminaClienteC(idclientec){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idclientec="+ idclientec,
					url:"../procesos/clientescomerciales/eliminarClienteC.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesCLoad').load("clientescomerciales/tablaClientesComerciales.php");
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
				$('#tablaClientesCLoad').html(respuesta);
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
			$('#btnActualizaClientec').click(function(){

				datos=$('#frmClientesComercialesU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientescomerciales/actualizaClienteC.php",
					success:function(r){
						if (r==1) {
							$('#tablaClientesCLoad').load("clientescomerciales/tablaClientesComerciales.php");
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
			document.getElementById("op14").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>