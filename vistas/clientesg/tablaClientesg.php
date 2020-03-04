<?php 

	require_once "../../clases/Conexion.php";
	$c=new conectar();
	$conexion=$c->conexion();

	$sql="SELECT PST_CVE_TIMBRES,PST_CLAVE,PST_FACTURA,PST_NOMINA,PST_RETENCIONES,PST_PRECIO_TIMBRES,PST_CANTIDAD_TIMBRES_COMPRADOS,PST_VIGENCIA_INICIO,PST_VIGENCIA_FIN FROM producto_sf_timbres";

	$result=mysqli_query($conexion,$sql); 
?>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<caption><label>Timbres</label></caption>
		<tr>
			<td>RFC</td>
			<td>Key</td>
			<td>Cer</td>
			<td>Nombre</td>
			<td>Nombre Comercial</td>
			<td>Calle</td>
			<td>No. Exterior</td>
			<td>No. Interior</td>
			<td>Colonia</td>
			<td>Localidad</td>
			<td>Municipio</td>
			<td>Codigo Postal</td>
			<td>Entidad Federativa</td>
			<td>Teléfono</td>
			<td>Celular</td>
			<td>Email Uno</td>
			<td>Email Dos</td>
			<td>CURP</td>
			<td>Moneda</td>
			<td>Fecha de Alta</td>
			<td>Observaciones</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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