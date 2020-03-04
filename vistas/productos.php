<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Leyes</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h4>Libros y Leyes</h4>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmProducto">
						<label>Clave Fol:</label>
						<input type="text" class="form-control input-sm" id="clave" name="clave">
						<label>Clave del SAT</label>
						<input type="text" class="form-control input-sm" id="clavesat" name="clavesat">
						<label>Clave Unidad SAT</label>
						<input type="text" class="form-control input-sm" id="unidadsat" name="unidadsat">
						<label>Nombre de la Ley o Libro:</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Precio:</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Año:</label>
						<input type="number" class="form-control input-sm" id="ano" name="ano" min="1999" max="4000">
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
							<option value="E-book">E-book</option>
							<option value="Online">Online</option>
							<option value="Papel">Papel</option>
						</select>
						<p></p>
						<span class="btn btn-primary" id="btnAgregaProducto">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaProductosLoad"></div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="actualizaProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Libro o Ley</h4>
					</div>
					<div class="modal-body">
						<form id="frmProductoU">
							<input type="text" hidden="" id="idProducto" name="idProducto">
							<label>Clave Fol:</label>
							<input type="text" class="form-control input-sm" id="claveU" name="claveU">
							<label>Nombre de la Ley o Libro:</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Precio:</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							<label>Año:</label>
							<input type="number" class="form-control input-sm" id="anoU" name="anoU" min="1999" max="4000">
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
								<option value="E-book">E-book</option>
								<option value="Online">Online</option>
								<option value="Papel">Papel</option>
							</select>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaProducto" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span>Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaProductosLoad').load("productos/tablaProductos.php");
			$('#btnAgregaProducto').click(function(){

				vacios=validarFormVacio('frmProducto');
				if (vacios > 0) {
					alertify.alert("¡Debes todos los campos!");
					return false;
				}
				datos=$('#frmProducto').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/productos/agregaProducto.php",
					success:function(r){
						if (r==1) {
							$('#frmProducto')[0].reset();
							$('#tablaProductosLoad').load("productos/tablaProductos.php");
							alertify.success("¡Producto Agregado!");
						}else{
							alertify.error("¡No se puede Agregar!")
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDatosProducto(idproducto){
			$.ajax({
				type:"POST",
				data:"idproducto=" + idproducto,
				url:"../procesos/productos/obtenDatosProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idProducto').val(dato['PLI_CVE_LIBRO']);
					$('#claveU').val(dato['PLI_CLAVE']);
					$('#nombreU').val(dato['PLI_NOMBRE_LIBRO']);
					$('#precioU').val(dato['PLI_PRECIO_LIBRO']);
					$('#anoU').val(dato['PLI_ANO_LIBRO']);
					$('#editorialU').val(dato['PLI_EDITORIAL_LIBRO']);
					$('#tipoU').val(dato['PLI_TIPO_LIBRO']);
				}
			});
		}
		function eliminaProducto(idproducto){
			alertify.confirm('¿Desea eliminar?',function(){
				$.ajax({
					type:"POST",
					data:"idproducto="+ idproducto,
					url:"../procesos/productos/eliminarProducto.php",
					success:function(r){
						if (r==1) {
							$('#tablaProductosLoad').load("productos/tablaProductos.php");
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
			$('#btnActualizaProducto').click(function(){

				datos=$('#frmProductoU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/productos/actualizaProducto.php",
					success:function(r){
						if (r==1) {
							$('#tablaProductosLoad').load("productos/tablaProductos.php");
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
			document.getElementById("op4").style.background='#3498DB';
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>