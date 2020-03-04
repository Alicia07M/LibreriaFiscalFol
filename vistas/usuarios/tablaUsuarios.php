<?php 

	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="SELECT USU_LFF_CVE_ID,
				USU_LFF_NOMBRE,
				USU_LFF_APELLIDO,
				USU_LFF_ROL,
				USU_LFF_USUARIO,
				USU_LFF_CONTRASENA from USUARIO_LFF";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Usuarios</label></caption>
		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rol</td>
			<td>Usuario</td>
			<td>Contraseña</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php 
			while($ver=mysqli_fetch_row($result)):
		 ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td>
				<span  data-toggle="modal" data-target="#actualizaUsuarioModal" class="btn btn-warning btn-xs" onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaUsuario('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>