<?php 

	class actualizaciones{
		public function agregaActualizacion($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  producto_sf_nueva_actualizacion_conversion (PSL_CLAVE,PSL_CLAVE_SAT,PSL_CLAVE_UNIDAD_SAT,PSL_PRECIO,PSL_NO_SERIE,PSL_FACTURA,PSL_NOMINA,PSL_CONTABILIDAD,PSL_RESTRINCCIONES) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosActualizacion($idactualizacion){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT PSL_CVE_ACTUALIZACION,PSL_CLAVE,PSL_PRECIO,PSL_NO_SERIE,PSL_FACTURA,PSL_NOMINA,PSL_CONTABILIDAD,PSL_RESTRINCCIONES FROM producto_sf_nueva_actualizacion_conversion where PSL_CVE_ACTUALIZACION = '$idactualizacion'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('PSL_CVE_ACTUALIZACION'=>$ver[0],'PSL_CLAVE'=>$ver[1],
						'PSL_PRECIO'=>$ver[2],'PSL_NO_SERIE'=>$ver[3],'PSL_FACTURA'=>$ver[4],
						'PSL_NOMINA'=>$ver[5],'PSL_CONTABILIDAD'=>$ver[6],
						'PSL_RESTRINCCIONES'=>$ver[7]);

			return $datos;
		}
		public function actualizaActualizacion($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE producto_sf_nueva_actualizacion_conversion set PSL_CLAVE='$datos[1]',PSL_PRECIO='$datos[2]',PSL_NO_SERIE='$datos[3]',PSL_FACTURA='$datos[4]',PSL_NOMINA='$datos[5]',PSL_CONTABILIDAD='$datos[6]',PSL_RESTRINCCIONES='$datos[7]' where PSL_CVE_ACTUALIZACION='$datos[0]'";
			

			return mysqli_query($conexion,$sql);
		}
		public function eliminaActualizacion($idactualizacion){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from producto_sf_nueva_actualizacion_conversion where PSL_CVE_ACTUALIZACION='$idactualizacion'";

			return mysqli_query($conexion,$sql);
		}
	}
 //PWZX35CJqB
 ?>