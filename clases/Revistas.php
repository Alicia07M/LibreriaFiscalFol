<?php 

class revistas{
	public function agregaRevista($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO producto_revista_lff (PLR_CLAVE,PLR_CLAVE_SAT,PLR_CLAVE_UNIDAD_SAT,PLR_NOMBRE_REVISTA,PLR_PRECIO_REVISTA,PLR_ANO_REVISTA,PLR_EDITORIAL_REVISTA,PLR_TIPO_REVISTA,PLR_NUMERO_POR_MES_REVISTA) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";

		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosRevista($idrevista){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT PLR_CVE_REVISTA,PLR_CLAVE,PLR_NOMBRE_REVISTA,PLR_PRECIO_REVISTA,PLR_ANO_REVISTA,PLR_EDITORIAL_REVISTA,PLR_TIPO_REVISTA,PLR_NUMERO_POR_MES_REVISTA FROM producto_revista_lff where PLR_CVE_REVISTA = '$idrevista'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('PLR_CVE_REVISTA'=>$ver[0],'PLR_CLAVE'=>$ver[1],
			'PLR_NOMBRE_REVISTA'=>$ver[2],'PLR_PRECIO_REVISTA'=>$ver[3],
			'PLR_ANO_REVISTA'=>$ver[4], 'PLR_EDITORIAL_REVISTA'=>$ver[5],
			'PLR_TIPO_REVISTA'=>$ver[6],'PLR_NUMERO_POR_MES_REVISTA'=>$ver[7],);

		return $datos;
	}
	public function actualizaRevista($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE producto_revista_lff set PLR_CLAVE='$datos[1]',PLR_NOMBRE_REVISTA='$datos[2]',PLR_PRECIO_REVISTA='$datos[3]', PLR_ANO_REVISTA='$datos[4]',PLR_EDITORIAL_REVISTA='$datos[5]',PLR_TIPO_REVISTA='$datos[6]',PLR_NUMERO_POR_MES_REVISTA='$datos[7]' where PLR_CVE_REVISTA='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaRevista($idrevista){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from producto_revista_lff where PLR_CVE_REVISTA='$idrevista'";

		return mysqli_query($conexion,$sql);
	}
}
?>