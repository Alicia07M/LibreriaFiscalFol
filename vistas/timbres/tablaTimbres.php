<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT PST_CVE_TIMBRES,PST_CLAVE,PST_FACTURA,PST_NOMINA,PST_RETENCIONES,PST_PRECIO_TIMBRES FROM producto_sf_timbres";

	$result=mysqli_query($conexion,$sql); 
?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Timbres</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Factura</td>
			<td>Nomina</td>
			<td>Retenciones</td>
			<td>Precio</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo '$'.' '.$ver[5]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaTimbre" onclick="agregaDatosTimbre('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaTimbre('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>