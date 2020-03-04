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
			<h4>Cursos</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCursos">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave SAT:</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT:</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Nombre del Curso:</label>
						<input type="text" class="form-control input-sm" id="curso" name="curso">
						<label>Fecha del Curso:</label>
						<input type="datetime-local" class="form-control input-sm" id="fechac" name="fechac">
						<label>Lugar:</label>
						<input type="text" class="form-control input-sm" id="lugar" name="lugar">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCurso">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaCursosLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Curso</h4>
					</div>
					<div class="modal-body">
						<form id="frmCursosU">
							<input type="text" hidden="" id="idCurso" name="idCurso">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Nombre del Curso:</label>
							<input type="text" class="form-control input-sm" id="cursoU" name="cursoU">
							<label>Fecha del Curso:</label>
							<input type="text" class="form-control input-sm" id="fechacU" name="fechacU">
							<label>Lugar:</label>
							<input type="text" class="form-control input-sm" id="lugarU" name="lugarU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaCurso" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaCursosLoad').load("cursos/tablaCursos.php");
			$('#btnAgregaCurso').click(function(){

				vacios=validarFormVacio('frmCursos');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmCursos').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/cursos/agregaCurso.php",
					success:function(r){
						if (r==1) {
							$('#frmCursos')[0].reset();
							$('#tablaCursosLoad').load("cursos/tablaCursos.php");
							alertify.success("¡Curso Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosCurso(idcurso){
			$.ajax({
				type:"POST",
				data:"idcurso=" + idcurso,
				url:"../procesos/cursos/obtenDatosCurso.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idCurso').val(dato['SEC_CVE_CURSO']);
					$('#claveU').val(dato['SEC_CLAVE']);
					$('#cursoU').val(dato['SEC_NOMBRE_CURSO']);
					$('#fechacU').val(dato['SEC_FECHA_CURSO']);
					$('#lugarU').val(dato['SEC_LUGAR_CURSO']);
					$('#precioU').val(dato['SEC_PRECIO']);
				}
			});
		}
		function eliminaCurso(idcurso){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idcurso="+ idcurso,
					url:"../procesos/cursos/eliminarCurso.php",
					success:function(r){
						if (r==1) {
							$('#tablaCursosLoad').load("cursos/tablaCursos.php");
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
			$('#btnActualizaCurso').click(function(){

				datos=$('#frmCursosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/cursos/actualizaCurso.php",
					success:function(r){
						if (r==1) {
							$('#tablaCursosLoad').load("cursos/tablaCursos.php");
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
			document.getElementById("op3").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>