<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT CLIENTE_CVE_CG,
	CLIENTE_CG_RFC,CLIENTE_CO_TIPO,CLIENTE_CO_NUMERO_TIMBRE,CLIENTE_CO_FECHA_PAGO,
	CLIENTE_CO_VIGENCIA,CLIENTE_CO_FACTURA_FOL,CLIENTE_CO_FACTURA_SFACIL,CLIENTE_CO_SERIE_NUEVA,
	CLIENTE_CO_POLIZA,CLIENTE_CO_SERIE_ANTERIOR,CLIENTE_CO_PROGRAMA_PRRODUCTO,CLIENTE_CO_IMP_LOCALES,
	CLIENTE_CO_AGENDA,CLIENTE_CO_COMPLEMENTO FROM cliente_comerciales";

	$result=mysqli_query($conexion,$sql); 
?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Datos Clientes Comerciales</label></caption>
		<tr>
			<td>RFC</td>
			<td>Tipo</td>
			<td>Numero de Timbre</td>
			<td>Fecha de Pago</td>
			<td>Vigencia</td>
			<td>Factura Fol</td>
			<td>Factura Sfácil</td>
			<td>Serie Nueva</td>
			<td>Poliza</td>
			<td>Serie Anterior</td>
			<td>Programa Producto</td>
			<td>IMP Locales</td>
			<td>Agenda</td>
			<td>Complementos</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php $ddb=$ver[4]; $ndate = date("d-m-Y", strtotime($ddb)); echo $ndate; ?></td>
			<td><?php $ddb=$ver[5]; $ndate = date("d-m-Y", strtotime($ddb)); echo $ndate; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td><?php echo $ver[8]; ?></td>
			<td><?php echo $ver[9]; ?></td>
			<td><?php echo $ver[10]; ?></td>
			<td><?php echo $ver[11]; ?></td>
			<td><?php echo $ver[12]; ?></td>
			<td><?php echo $ver[13]; ?></td>
			<td><?php echo $ver[14]; ?></td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaClientec" onclick="agregaDatosClientec('<?php echo $ver[0]; ?>')">
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