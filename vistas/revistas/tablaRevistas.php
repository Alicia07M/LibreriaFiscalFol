<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT PLR_CVE_REVISTA,PLR_CLAVE,PLR_NOMBRE_REVISTA,PLR_PRECIO_REVISTA,PLR_ANO_REVISTA,PLR_EDITORIAL_REVISTA,PLR_TIPO_REVISTA,PLR_NUMERO_POR_MES_REVISTA FROM producto_revista_lff";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Revistas</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Año</td>
			<td>Editorial</td>
			<td>Tipo</td>
			<td>Numero por Mes</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while ($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaRevista" onclick="agregaDatosRevista('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaRevista('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>