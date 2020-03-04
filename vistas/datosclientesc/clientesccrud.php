<!DOCTYPE html>
<html>
<head>
	<title>Datos Generales</title>
</head>
<body>
	<div class="container">
		<h4>Clientes Datos Generales</h4>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmClientesc">
					<label>RFC:</label>
					<input type="text" class="form-control input-sm" id="rfc" name="rfc">
					<label>Tipo:</label>
					<input type="text" class="form-control input-sm" id="tipo" name="tipo">
					<label>Numero de Timbre:</label>
					<input type="text" class="form-control input-sm" id="notimbre" name="notimbre">
					<label>Fecha de Pago:</label>
					<input type="date" class="form-control input-sm" id="fechap" name="fechap">
					<label>Vigencia:</label>
					<input type="date" class="form-control input-sm" id="vigencia" name="vigencia">
					<label>Factura Fol:</label>
					<input type="text" class="form-control input-sm" id="facturafol" name="facturafol" placeholder="Numero de Fcatura Fol">
					<label>Factura SFácil:</label>
					<input type="text" class="form-control input-sm" id="facturasfacil" name="facturasfacil" placeholder="Numero de Fcatura SFácil">
					<label>Seria Nueva:</label>
					<input type="text" class="form-control input-sm" id="serien" name="serien" placeholder="Numero de Serie Nueva">
					<label>Poliza:</label>
					<input type="text" class="form-control input-sm" id="poliza" name="poliza">
					<label>Serie Anterior:</label>
					<input type="text" class="form-control input-sm" id="seriea" name="seriea" placeholder="Numero de Serie Anterior">
					<label>Programa Producto:</label>
					<input type="text" class="form-control input-sm" id="programap" name="programap">
					<label>Descuento:</label>
					<input type="text" class="form-control input-sm" id="descuento" name="descuento" placeholder=".05,0.10...">
					<label>Tasa IVA:</label>
					<input type="text" class="form-control input-sm" id="iva" name="iva" placeholder=".05,0.10...">
					<label>Tasa Retenciones IVA:</label>
					<input type="text" class="form-control input-sm" id="riva" name="riva" placeholder=".05,0.10...">
					<label>Tasa Retenciones ISR:</label>
					<input type="text" class="form-control input-sm" id="isr" name="isr" placeholder=".05,0.10...">
					<label>Tasa Retenciones EIPS:</label>
					<input type="text" class="form-control input-sm" id="eips" name="eips" placeholder=".05,0.10...">
					<label>IMP Locales:</label>
					<input type="text" class="form-control input-sm" id="imp" name="imp" placeholder=".05,0.10...">
					<label>Agenda:</label>
					<input type="text" class="form-control input-sm" id="agenda" name="agenda">
					<label>Complementos:</label>
					<input type="text" class="form-control input-sm" id="complementos" name="complementos">
					<p></p>
					<span class="btn btn-primary" id="btnAgergaClientesc">Agregar Cliente</span>
				</form>
			</div>
			<div class="col-sm-12">
				<div id="tablaClientescLoad"></div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="actualizaClientec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualiza Datos Comerciales</h4>
				</div>
				<div class="modal-body">
					<form id="frmClientescU">
					<label>RFC:</label>
					<input type="text" class="form-control input-sm" id="rfcU" name="rfcU">
					<label>Tipo:</label>
					<input type="text" class="form-control input-sm" id="tipoU" name="tipoU">
					<label>Numero de Timbre:</label>
					<input type="text" class="form-control input-sm" id="notimbreU" name="notimbreU">
					<label>Fecha de Pago:</label>
					<input type="text" class="form-control input-sm" id="fechapU" name="fechapU">
					<label>Vigencia:</label>
					<input type="text" class="form-control input-sm" id="vigenciaU" name="vigenciaU">
					<label>Factura Fol:</label>
					<input type="text" class="form-control input-sm" id="facturafolU" name="facturafolU">
					<label>Factura SFácil:</label>
					<input type="text" class="form-control input-sm" id="facturasfacilU" name="facturasfacilU">
					<label>Serie Nueva:</label>
					<input type="text" class="form-control input-sm" id="serienU" name="serienU">
					<label>Poliza:</label>
					<input type="text" class="form-control input-sm" id="polizaU" name="polizaU">
					<label>Serie Anterior:</label>
					<input type="text" class="form-control input-sm" id="serieaU" name="serieaU">
					<label>Programa Producto:</label>
					<input type="text" class="form-control input-sm" id="programapU" name="programapU">
					<label>IMP Locales:</label>
					<input type="text" class="form-control input-sm" id="impU" name="impU">
					<label>Agenda:</label>
					<input type="text" class="form-control input-sm" id="agendaU" name="agendaU">
					<label>Complementos:</label>
					<input type="text" class="form-control input-sm" id="complementosU" name="complementosU">
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
		$('#tablaClientescLoad').load("clientesc/tableClientesc.php");
		$('#btnAgergaClientesc').click(function(){

			vacios=validarFormVacio('frmClientesc');
			if (vacios > 0) {
				alertify.alert("¡Debes todos los campos!");
				return false;
			}
			datos=$('#frmClientesc').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/clientesc/agregaClientesc.php",
				success:function(r){
					if (r==1) {
						$('#frmTimbres')[0].reset();
						$('#tablaClientescLoad').load("clientesc/tableClientesc.php");
						alertify.success("¡Cliente Agregado!");
					}else{
						alertify.error("¡No se pudieron Agregar!");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	function agregaDatosClientec(idclientec){
		$.ajax({
			type:"POST",
			data:"idclientec=" + idclientec,
			url:"../procesos/timbres/obtenDatosTimbre.php",
			success:function(r){
				dato=jQuery.parseJSON(r);

				$('#idTimbre').val(dato['PST_CVE_TIMBRES']);
				$('#claveU').val(dato['PST_CLAVE']);
				$('#facturaU').val(dato['PST_FACTURA']);
				$('#nominaU').val(dato['PST_NOMINA']);
				$('#retencionesU').val(dato['PST_RETENCIONES']);
				$('#precioU').val(dato['PST_PRECIO_TIMBRES']);
				$('#timbresU').val(dato['PST_CANTIDAD_TIMBRES_COMPRADOS']);
				$('#fechaiU').val(dato['PST_VIGENCIA_INICIO']);
				$('#fechafU').val(dato['PST_VIGENCIA_FIN']);
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
						$('#tablaClientescLoad').load("clientesc/tableClientesc.php");
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
		$('#btnActualizaClientec').click(function(){

			datos=$('#frmClientescU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/timbres/actualizaTimbre.php",
				success:function(r){
					if (r==1) {
						$('#tablaClientescLoad').load("clientesc/tableClientesc.php");
						alertify.success("¡Actualizado con Exito!");
					}else{
						alertify.error("¡Error al Actualizar!");
					}
				}
			});
		});
	});
</script>