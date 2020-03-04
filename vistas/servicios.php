<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Servicios</title>
		<?php require_once "menu.php" ?>
		<?php require_once "../clases/Conexion.php";
		$c=new conectar();
		$conexion=$c->conexion();
		$sql="SELECT PSL_CVE_ACTUALIZACION, PSL_CLAVE FROM producto_sf_nueva_actualizacion_conversion";

		$result=mysqli_query($conexion,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<h4>Servicios</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmServicio">
						<label>Actualizacion:</label>
						<select class="form-control input-sm" id="actualizacionSelect" name="actualizacionSelect">
							<option value="A">Selecciona la Actualizacion:</option>
							<?php while ($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave Del SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Nombre del Servicio:</label>
						<input type="text" class="form-control input-sm" id="servicio" name="servicio">
						<label>Fecha y Hora:</label>
						<input type="datetime-local" class="form-control input-sm" id="fechahora" name="fechahora">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaServicio">Agregar</span>
					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaServiciosLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza</h4>
					</div>
					<div class="modal-body">
						<form id="frmServicioU">
							<label>Actualizacion:</label>
							<input type="text" hidden="" id="idServicio" name="idServicio">
							<select class="form-control input-sm" id="actualizacionSelectU" name="actualizacionSelectU">
								<option value="A">Selecciona la Actualizacion:</option>
								<?php $sql="SELECT PSL_CVE_ACTUALIZACION, PSL_CLAVE FROM producto_sf_nueva_actualizacion_conversion";

								$result=mysqli_query($conexion,$sql); ?>
								<?php while ($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0]; ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Nombre del Servicio:</label>
							<input type="text" class="form-control input-sm" id="servicioU" name="servicioU">
							<label>Fecha y Hora:</label>
							<input type="text" class="form-control input-sm" id="fechahoraU" name="fechahoraU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaServicio" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaServiciosLoad').load("servicios/tablaServicios.php");
			$('#btnAgregaServicio').click(function(){

				vacios=validarFormVacio('frmServicio');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmServicio').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/servicios/agregaServicio.php",
					success:function(r){
						if (r==1) {
							$('#frmServicio')[0].reset();
							$('#tablaServiciosLoad').load("servicios/tablaServicios.php");
							alertify.success("¡Servicio Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!")
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosServicio(idservicio){
			$.ajax({
				type:"POST",
				data:"idservicio=" + idservicio,
				url:"../procesos/servicios/obtenDatosServicio.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idServicio').val(dato['SVR_CVE_VREMOTA']);
					$('#actualizacionSelectU').val(dato['PSL_CVE_ACTUALIZACION']);
					$('#claveU').val(dato['SVR_CLAVE']);
					$('#servicioU').val(dato['SVR_SERVICIO_REMOTO']);
					$('#fechahoraU').val(dato['SVR_FECHA_HORA']);
					$('#precioU').val(dato['SVR_PRECIO']);
				}
			});
		}
		function eliminaServicio(idservicio){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idservicio="+ idservicio,
					url:"../procesos/servicios/eliminarServicio.php",
					success:function(r){
						if (r==1) {
							$('#tablaServiciosLoad').load("servicios/tablaServicios.php");
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
			$('#btnActualizaServicio').click(function(){

				datos=$('#frmServicioU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/servicios/actualizaServicio.php",
					success:function(r){
						if (r==1) {
							$('#tablaServiciosLoad').load("servicios/tablaServicios.php");
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
			document.getElementById("op8").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>