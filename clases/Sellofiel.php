<?php 

class sellofiel{
	public function agregaSellofiel($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO servicio_sellos_fiel_lff (SEC_CLAVE,SEC_CLAVE_SAT,SEC_CLAVE_UNIDAD_SAT,SSF_PRECIO) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";


		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosSellofiel($idsellofiel){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT SSF_CVE_SELLOS_FIEL,SEC_CLAVE,SEC_CLAVE_SAT,SEC_CLAVE_UNIDAD_SAT,SSF_PRECIO FROM servicio_sellos_fiel_lff where SSF_CVE_SELLOS_FIEL = '$idsellofiel'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('SSF_CVE_SELLOS_FIEL'=>$ver[0],'SEC_CLAVE'=>$ver[1],
						'SEC_CLAVE_SAT'=>$ver[2],'SEC_CLAVE_UNIDAD_SAT'=>$ver[3],
						'SSF_PRECIO'=>$ver[4]);

		return $datos;
	}
	public function actualizaSellofiel($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE servicio_sellos_fiel_lff set SEC_CLAVE='$datos[1]',SEC_CLAVE_SAT='$datos[2]',SEC_CLAVE_UNIDAD_SAT='$datos[3]', SSF_PRECIO='$datos[4]' where SSF_CVE_SELLOS_FIEL='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaSellofiel($idsellofiel){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from servicio_sellos_fiel_lff where SSF_CVE_SELLOS_FIEL='$idsellofiel'";

		return mysqli_query($conexion,$sql);
	}
}
?>