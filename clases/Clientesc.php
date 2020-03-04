<?php 

	class clientesc{
		public function agregaClientec($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_comerciales(CLIENTE_CG_RFC,CLIENTE_CO_TIPO,CLIENTE_CO_NUMERO_TIMBRE,CLIENTE_CO_FECHA_PAGO,CLIENTE_CO_VIGENCIA,CLIENTE_CO_FACTURA_FOL,CLIENTE_CO_FACTURA_SFACIL,CLIENTE_CO_SERIE_NUEVA,CLIENTE_CO_POLIZA,CLIENTE_CO_SERIE_ANTERIOR,CLIENTE_CO_PROGRAMA_PRRODUCTO,CLIENTE_CO_DESCUENTO_UNO,CLIENTE_CO_TASA_IVA,CLIENTE_CO_TASA_RET_IVA,CLIENTE_CO_TASA_RET_ISR,CLIENTE_CO_TASA_RET_IEPS,CLIENTE_CO_IMP_LOCALES,CLIENTE_CO_AGENDA,CLIENTE_CO_COMPLEMENTO) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosActualizacion($idclientec){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT PSL_CVE_ACTUALIZACION,PSL_CLAVE,PSL_PRECIO,PSL_VIGENCIA_INICIO,PSL_VIGENCIA_FIN,PSL_FACTURA,PSL_NOMINA,PSL_CONTABILIDAD,PSL_RESTRINCCIONES FROM producto_sf_nueva_actualizacion_conversion where PSL_CVE_ACTUALIZACION = '$idclientec'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('PSL_CVE_ACTUALIZACION'=>$ver[0],'PSL_CLAVE'=>$ver[1],
						'PSL_PRECIO'=>$ver[2],'PSL_VIGENCIA_INICIO'=>$ver[3],
						'PSL_VIGENCIA_FIN'=>$ver[4], 'PSL_FACTURA'=>$ver[5],
						'PSL_NOMINA'=>$ver[6],'PSL_CONTABILIDAD'=>$ver[7],
						'PSL_RESTRINCCIONES'=>$ver[8]);

			return $datos;
		}
		/*public function actualizaActualizacion($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE producto_sf_nueva_actualizacion_conversion set PSL_CLAVE='$datos[1]',PSL_PRECIO='$datos[2]',PSL_VIGENCIA_INICIO='$datos[3]', PSL_VIGENCIA_FIN='$datos[4]',PSL_FACTURA='$datos[5]',PSL_NOMINA='$datos[6]',PSL_CONTABILIDAD='$datos[7]',PSL_RESTRINCCIONES='$datos[8]' where PSL_CVE_ACTUALIZACION='$datos[0]'";
			

			return mysqli_query($conexion,$sql);
		}
		public function eliminaActualizacion($idactualizacion){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from producto_sf_nueva_actualizacion_conversion where PSL_CVE_ACTUALIZACION='$idactualizacion'";

			return mysqli_query($conexion,$sql);
		}*/
	}
 ?>