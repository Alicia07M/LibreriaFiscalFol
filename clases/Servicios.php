<?php 

class servicios{
	public function agregaServicio($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO servicio_via_remota_lff (PSL_CVE_ACTUALIZACION,SVR_CLAVE,SVR_CLAVE_SAT,SVR_CLAVE_UNIDAD_SAT,SVR_SERVICIO_REMOTO,SVR_FECHA_HORA,SVR_PRECIO) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosServicio($idservicio){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT SVR_CVE_VREMOTA,PSL_CVE_ACTUALIZACION,SVR_CLAVE,SVR_SERVICIO_REMOTO,SVR_FECHA_HORA,SVR_PRECIO FROM servicio_via_remota_lff where SVR_CVE_VREMOTA = '$idservicio'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('SVR_CVE_VREMOTA'=>$ver[0],'PSL_CVE_ACTUALIZACION'=>$ver[1],'SVR_CLAVE'=>$ver[2],
			'SVR_SERVICIO_REMOTO'=>$ver[3],'SVR_FECHA_HORA'=>$ver[4],'SVR_PRECIO'=>$ver[5]);

		return $datos;
	}
	public function actualizaServicio($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE servicio_via_remota_lff set PSL_CVE_ACTUALIZACION='$datos[1]',SVR_CLAVE='$datos[2]',SVR_SERVICIO_REMOTO='$datos[3]', SVR_FECHA_HORA='$datos[4]',SVR_PRECIO='$datos[5]' where SVR_CVE_VREMOTA='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaServicio($idservicio){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from servicio_via_remota_lff where SVR_CVE_VREMOTA='$idservicio'";

		return mysqli_query($conexion,$sql);
	}
}
?>