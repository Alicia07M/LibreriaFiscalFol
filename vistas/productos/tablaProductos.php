<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT PLI_CVE_LIBRO,PLI_CLAVE,PLI_NOMBRE_LIBRO,PLI_PRECIO_LIBRO,PLI_ANO_LIBRO,PLI_EDITORIAL_LIBRO,PLI_TIPO_LIBRO FROM producto_libro_ley_lff";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Libros y Leyes</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Año</td>
			<td>Editorial</td>
			<td>Tipo</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while ($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2] ?></td>
			<td><?php echo $ver[3] ?></td>
			<td><?php echo $ver[4] ?></td>
			<td><?php echo $ver[5] ?></td>
			<td><?php echo $ver[6] ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaProducto" onclick="agregaDatosProducto('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaProducto('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>