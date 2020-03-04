<?php 

class productos{
	public function agregaProducto($datos){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="INSERT INTO producto_libro_ley_lff (PLI_CLAVE,PLI_CLAVE_SAT,PLI_CLAVE_UNIDAD_SAT,PLI_NOMBRE_LIBRO,PLI_PRECIO_LIBRO,PLI_ANO_LIBRO,PLI_EDITORIAL_LIBRO,PLI_TIPO_LIBRO) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";

		return mysqli_query($conexion,$sql);
	}
	public function obtenDatosProducto($idproducto){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT PLI_CVE_LIBRO,PLI_CLAVE,PLI_NOMBRE_LIBRO,PLI_PRECIO_LIBRO,PLI_ANO_LIBRO,PLI_EDITORIAL_LIBRO,PLI_TIPO_LIBRO FROM producto_libro_ley_lff where PLI_CVE_LIBRO = '$idproducto'";
		

		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$datos=array('PLI_CVE_LIBRO'=>$ver[0],'PLI_CLAVE'=>$ver[1],
			'PLI_NOMBRE_LIBRO'=>$ver[2],'PLI_PRECIO_LIBRO'=>$ver[3],
			'PLI_ANO_LIBRO'=>$ver[4], 'PLI_EDITORIAL_LIBRO'=>$ver[5],
			'PLI_TIPO_LIBRO'=>$ver[6]);

		return $datos;
	}
	public function actualizaProducto($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="UPDATE producto_libro_ley_lff set PLI_CLAVE='$datos[1]',PLI_NOMBRE_LIBRO='$datos[2]',PLI_PRECIO_LIBRO='$datos[3]', PLI_ANO_LIBRO='$datos[4]',PLI_EDITORIAL_LIBRO='$datos[5]',PLI_TIPO_LIBRO='$datos[6]' where PLI_CVE_LIBRO='$datos[0]'";


		return mysqli_query($conexion,$sql);
	}
	public function eliminaProducto($idproducto){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from producto_libro_ley_lff where PLI_CVE_LIBRO='$idproducto'";

		return mysqli_query($conexion,$sql);
	}
}
?>