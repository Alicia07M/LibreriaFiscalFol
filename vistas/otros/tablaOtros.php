<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT OTO_CVE_LFF,OTO_LFF_NOMBRE,OTO_LFF_DESCRIPCION,OTRO_LFF_PRECIO,OTO_LFF_CLAVE FROM otros_lff";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Otros</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Nombre del Producto</td>
			<td>Descripción</td>
			<td>Precio</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while ($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaOtro" onclick="agregaDatosOtros('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaCurso('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>