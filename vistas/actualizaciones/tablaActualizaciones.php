<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT PSL_CVE_ACTUALIZACION,PSL_CLAVE,
				PSL_PRECIO,PSL_NO_SERIE,PSL_FACTURA,PSL_NOMINA,PSL_CONTABILIDAD,
				PSL_RESTRINCCIONES FROM producto_sf_nueva_actualizacion_conversion";

	$result=mysqli_query($conexion,$sql);
 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Actualizaciones de Software</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Precio</td>
			<td>No. Serie</td>
			<td>Factura</td>
			<td>Nomina</td>
			<td>Contabilidad</td>
			<td>Restricciones</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo '$'.' '.$ver[2]; ?></td>
			<td><?php echo $ver[3] ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaActualizacion" onclick="agregaDatosActualizacion('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaActualizacion('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>