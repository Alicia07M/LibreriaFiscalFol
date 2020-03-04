<?php 

	class clientesc{
		public function agregaClienteC($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_comerciales (
							CLIENTE_CG_RFC,CLIENTE_CO_DESCUENTO_UNO,CLIENTE_CO_TASA_IVA,
							CLIENTE_CO_TASA_RET_IVA,CLIENTE_CO_TASA_RET_ISR,
							CLIENTE_CO_TASA_RET_IEPS,CLIENTE_CO_IMP_LOCALES,CLIENTE_CO_AGENDA,
							CLIENTE_CO_COMPLEMENTO) VALUES ('$datos[0]','$datos[1]','$datos[2]',
														'$datos[3]','$datos[4]','$datos[5]',
														'$datos[6]','$datos[7]','$datos[8]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosClienteC($idclientec){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT CLIENTE_CVE_CG,CLIENTE_CG_RFC,CLIENTE_CO_DESCUENTO_UNO,CLIENTE_CO_TASA_IVA,
							CLIENTE_CO_TASA_RET_IVA,CLIENTE_CO_TASA_RET_ISR,
							CLIENTE_CO_TASA_RET_IEPS,CLIENTE_CO_IMP_LOCALES,CLIENTE_CO_AGENDA,
							CLIENTE_CO_COMPLEMENTO FROM cliente_comerciales 
							where CLIENTE_CVE_CG = '$idclientec'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('CLIENTE_CVE_CG'=>$ver[0],
						'CLIENTE_CG_RFC'=>$ver[1],
						'CLIENTE_CO_DESCUENTO_UNO'=>$ver[2],
						'CLIENTE_CO_TASA_IVA'=>$ver[3],
						'CLIENTE_CO_TASA_RET_IVA'=>$ver[4],
						'CLIENTE_CO_TASA_RET_ISR'=>$ver[5],
						'CLIENTE_CO_TASA_RET_IEPS'=>$ver[6],
						'CLIENTE_CO_IMP_LOCALES'=>$ver[7],
						'CLIENTE_CO_AGENDA'=>$ver[8],
						'CLIENTE_CO_COMPLEMENTO'=>$ver[9]);

			return $datos;
		}
		public function actualizaClienteC($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cliente_comerciales set CLIENTE_CG_RFC='$datos[1]',
											CLIENTE_CO_DESCUENTO_UNO='$datos[2]',
											CLIENTE_CO_TASA_IVA='$datos[3]',
											CLIENTE_CO_TASA_RET_IVA='$datos[4]',
											CLIENTE_CO_TASA_RET_ISR='$datos[5]',
											CLIENTE_CO_TASA_RET_IEPS='$datos[6]',
											CLIENTE_CO_IMP_LOCALES='$datos[7]',
											CLIENTE_CO_AGENDA='$datos[8]',
											CLIENTE_CO_COMPLEMENTO='$datos[9]' where CLIENTE_CVE_CG='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminaClienteC($idclientec){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from cliente_comerciales where CLIENTE_CVE_CG='$idclientec'";

			return mysqli_query($conexion,$sql);
		}
	}
 ?>