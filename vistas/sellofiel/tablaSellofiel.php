<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT SSF_CVE_SELLOS_FIEL,SEC_CLAVE,SEC_CLAVE_SAT,SEC_CLAVE_UNIDAD_SAT,SSF_PRECIO FROM servicio_sellos_fiel_lff";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Sellos y Fiel</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Clave SAT</td>
			<td>Clave Unidad SAT</td>
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
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaSellofiel" onclick="agregaDatosSellofiel('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaSellofiel('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>