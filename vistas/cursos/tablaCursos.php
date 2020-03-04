<?php

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT SEC_CVE_CURSO,SEC_CLAVE,SEC_NOMBRE_CURSO,SEC_FECHA_CURSO,SEC_LUGAR_CURSO,SEC_PRECIO FROM SERVICIO_CURSO_LFF";

	$result=mysqli_query($conexion,$sql);

 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Cursos</label></caption>
		<tr>
			<td>Clave Fol</td>
			<td>Nombre del Curso</td>
			<td>Fecha del Curso</td>
			<td>Lugar</td>
			<td>Precio</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php 
		while ($ver=mysqli_fetch_row($result)): 
		?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php $ddb=$ver[3]; $ndate = date("d-m-Y H:i", strtotime($ddb)); echo $ndate;?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCurso" onclick="agregaDatosCurso('<?php echo $ver[0]; ?>')">
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