<!DOCTYPE html>
<html>
<head>
	<title>Datos Generales</title>
</head>
<body>
	<h4>Clientes Datos Generales</h4>
	<div class="row">
		<div class="col-sm-4">
			<form id="frmClientesg" enctype="multipart/form-data">
				<label>RFC:</label>
				<input type="text" class="form-control input-sm" id="rfc" name="rfc">
				<label>KEY:</label>
				<input type="file" class="form-control input-sm" id="key" name="key">
				<label>CER:</label>
				<input type="file" class="form-control input-sm" id="cer" name="cer">
				<label>Nombre:</label>
				<input type="text" class="form-control input-sm" id="nombre" name="nombre">
				<label>Nombre Comercial:</label>
				<input type="text" class="form-control input-sm" id="nombrecomercial" name="nombrecomercial">
				<label>Calle</label>
				<input type="text" class="form-control input-sm" id="calle" name="calle">
				<label>No. Exterior:</label>
				<input type="text" class="form-control input-sm" id="noexterior" name="noexterior">
				<label>No. Interior:</label>
				<input type="text" class="form-control input-sm" id="nointeior" name="nointeior">
				<label>Colonia:</label>
				<input type="text" class="form-control input-sm" id="colonia" name="colonia">
				<label>Localidad:</label>
				<input type="text" class="form-control input-sm" id="localidad" name="localidad">
				<label>Municipio Delegacion:</label>
				<input type="text" class="form-control input-sm" id="mdelegacion" name="mdelegacion">
				<label>Codigo Postal:</label>
				<input type="text" class="form-control input-sm" id="codigo" name="codigo">
				<label>Entidad Federativa:</label>
				<input type="text" class="form-control input-sm" id="efederativa" name="efederativa">
				<label>Telefono:</label>
				<input type="text" class="form-control input-sm" id="telefono" name="telefono">
				<label>Celular:</label>
				<input type="text" class="form-control input-sm" id="celular" name="celular">
				<label>Email 1:</label>
				<input type="text" class="form-control input-sm" id="emailuno" name="emailuno">
				<label>Email 2:</label>
				<input type="text" class="form-control input-sm" id="emaildos" name="emaildos">
				<label>CURP:</label>
				<input type="text" class="form-control input-sm" id="curp" name="curp">
				<label>Moneda:</label>
				<input type="text" class="form-control input-sm" id="moneda" name="moneda">
				<label>Clasificacion:</label>
				<input type="text" class="form-control input-sm" id="clasificacion" name="clasificacion">
				<label>Fecha de Alta:</label>
				<input type="date" class="form-control input-sm" id="fechaA" name="fechaA">
				<label>Observaciones:</label>
				<input type="text" class="form-control input-sm" id="obs" name="obs">
				<p></p>
				<span class="btn btn-primary" id="btnAgergaClientesg">Agregar Cliente</span>
			</form>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaClientegLoad').load("clientesg/tableClientesg.php");
		$('#btnAgergaClientesg').click(function(){

			vacios=validarFormVacio('frmClientesg');
			if (vacios > 0) {
				alertify.alert("¡Debes todos los campos!");
				return false;
			}
			datos=$('#frmClientesg').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/timbres/agregaTimbre.php",
				success:function(r){
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
						$('#tablaClientegLoad').load("clientesg/tableClientesg.php");
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
						$('#tablaClientegLoad').load("clientesg/tableClientesg.php");
						alertify.success("¡Actualizado con Exito!");
					}else{
						alertify.error("¡Error al Actualizar!");
					}
				}
			});
		});
	});
</script>