<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql= "SELECT * FROM cliente_fiscales";

	$result=mysqli_query($conexion,$sql);

	if (isset($_POST['consulta'])) {
		$s=mysqli_real_escape_string($conexion,$_POST['consulta']);
		$query="SELECT * from cliente_fiscales WHERE CLIENTE_CG_RFC LIKE '%".$s."%'";
		$result=mysqli_query($conexion,$query);
	}
 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Clientes Fiscales</label></caption>
		<tr>
			<td>RFC</td>
			<td>Calle</td>
			<td>No. Exterior</td>
			<td>No. Interior</td>
			<td>Colonia</td>
			<td>Localidad</td>
			<td>Municipio</td>
			<td>Codigo Postal</td>
			<td>Entidad Federativa</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td><?php echo $ver[8]; ?></td>
			<td><?php echo $ver[9]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaClienteF" onclick="agregaDatosClienteF('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaClienteF('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>