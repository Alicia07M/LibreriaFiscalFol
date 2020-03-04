<?php 

	class clientesco{
		public function agregaClienteCO($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_contacto (
							CLIENTE_CG_RFC,CLIENTE_CON_NOMBRE,CLIENTE_CON_TELEFONO,CLIENTE_CON_CELULAR,CLIENTE_CON_EMAIL_UNO,CLIENTE_CON_EMAIL_DOS,CLIENTE_CON_OBSERVACIONES) VALUES ('$datos[0]','$datos[1]','$datos[2]',
														'$datos[3]','$datos[4]','$datos[5]',
														'$datos[6]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosClienteCO($idclienteco){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT CLIENTE_CVE_CG,CLIENTE_CG_RFC,CLIENTE_CON_NOMBRE,CLIENTE_CON_TELEFONO,CLIENTE_CON_CELULAR,CLIENTE_CON_EMAIL_UNO,CLIENTE_CON_EMAIL_DOS,CLIENTE_CON_OBSERVACIONES FROM cliente_contacto where CLIENTE_CVE_CG = '$idclienteco'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('CLIENTE_CVE_CG'=>$ver[0],'CLIENTE_CG_RFC'=>$ver[1],
						'CLIENTE_CON_NOMBRE'=>$ver[2],'CLIENTE_CON_TELEFONO'=>$ver[3],'CLIENTE_CON_CELULAR'=>$ver[4],
						'CLIENTE_CON_EMAIL_UNO'=>$ver[5],'CLIENTE_CON_EMAIL_DOS'=>$ver[6],
						'CLIENTE_CON_OBSERVACIONES'=>$ver[7]);

			return $datos;
		}
		public function actualizaClienteCO($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cliente_contacto set CLIENTE_CG_RFC='$datos[1]',
											CLIENTE_CON_NOMBRE='$datos[2]',
											CLIENTE_CON_TELEFONO='$datos[3]',
											CLIENTE_CON_CELULAR='$datos[4]',
											CLIENTE_CON_EMAIL_UNO='$datos[5]',
											CLIENTE_CON_EMAIL_DOS='$datos[6]',
											CLIENTE_CON_OBSERVACIONES='$datos[7]'
											 where CLIENTE_CVE_CG='$datos[0]'";
			

			return mysqli_query($conexion,$sql);
		}
		public function eliminaClienteCO($idclienteco){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from cliente_contacto where CLIENTE_CVE_CG='$idclienteco'";

			return mysqli_query($conexion,$sql);
		}
	}
 
 ?>