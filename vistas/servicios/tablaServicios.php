<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT ser.SVR_CVE_VREMOTA,ser.SVR_CLAVE,ser.SVR_SERVICIO_REMOTO,ser.SVR_FECHA_HORA,ser.SVR_PRECIO,act.PSL_CLAVE FROM servicio_via_remota_lff as ser inner join producto_sf_nueva_actualizacion_conversion as act on ser.PSL_CVE_ACTUALIZACION=act.PSL_CVE_ACTUALIZACION";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Servicios Vía Remota</label></caption>
		<tr>
			<td>Actualizacion</td>
			<td>Clave Fol</td>
			<td>Nombre</td>
			<td>Fecha y Hora</td>
			<td>Precio</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while ($ver=mysqli_fetch_row($result)):?>
		<tr>
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php $ddb=$ver[3]; $ndate = date("d-m-Y H:i", strtotime($ddb)); echo $ndate; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaServicio" onclick="agregaDatosServicio('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaServicio('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>