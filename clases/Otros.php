<?php 

class otros{
	public function agregaOtros($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO otros_lff (OTO_LFF_NOMBRE,OTO_LFF_DESCRIPCION,OTRO_LFF_PRECIO,OTO_LFF_CLAVE,OTO_LFF_CLAVE_SAT,OTO_LFF_CLAVE_UNIDAD_SAT) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";

		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosOtro($idotro){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT OTO_CVE_LFF,OTO_LFF_NOMBRE,OTO_LFF_DESCRIPCION,OTRO_LFF_PRECIO,OTO_LFF_CLAVE FROM otros_lff where OTO_CVE_LFF = '$idotro'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('OTO_CVE_LFF'=>$ver[0],'OTO_LFF_NOMBRE'=>$ver[1],
			'OTO_LFF_DESCRIPCION'=>$ver[2],'OTRO_LFF_PRECIO'=>$ver[3],
			'OTO_LFF_CLAVE'=>$ver[4]);

		return $datos;
	}
	public function actualizaOtro($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE otros_lff set OTO_LFF_NOMBRE='$datos[1]',OTO_LFF_DESCRIPCION='$datos[2]',OTRO_LFF_PRECIO='$datos[3]', OTO_LFF_CLAVE='$datos[4]' where OTO_CVE_LFF='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaOtro($idotro){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from otros_lff where OTO_CVE_LFF='$idotro'";

		return mysqli_query($conexion,$sql);
	}
}
?>