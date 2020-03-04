<?php 

class timbres{
	public function agregaTimbre($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO producto_sf_timbres (PST_CLAVE,PST_CLAVE_SAT,PST_CLAVE_UNIDAD_SAT,PST_FACTURA,PST_NOMINA,PST_RETENCIONES,PST_PRECIO_TIMBRES) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosTimbre($idtimbre){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT PST_CVE_TIMBRES,PST_CLAVE,PST_FACTURA,PST_NOMINA,PST_RETENCIONES,PST_PRECIO_TIMBRES FROM producto_sf_timbres where PST_CVE_TIMBRES = '$idtimbre'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('PST_CVE_TIMBRES'=>$ver[0],'PST_CLAVE'=>$ver[1],
					'PST_FACTURA'=>$ver[2],'PST_NOMINA'=>$ver[3],'PST_RETENCIONES'=>$ver[4],
					'PST_PRECIO_TIMBRES'=>$ver[5]);

		return $datos;
	}
	public function actualizaTimbre($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE producto_sf_timbres set PST_CLAVE='$datos[1]',PST_FACTURA='$datos[2]',
										PST_NOMINA='$datos[3]',PST_RETENCIONES='$datos[4]',
										PST_PRECIO_TIMBRES='$datos[5]' where PST_CVE_TIMBRES='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaTimbre($idtimbre){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from producto_sf_timbres where PST_CVE_TIMBRES='$idtimbre'";

		return mysqli_query($conexion,$sql);
	}
}
?>