<?php 

	class clientesg{
		public function agregaClienteG($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_general (
							CLIENTE_CG_RFC,CLIENTE_CG_NOMBRE,CLIENTE_CG_TIPO,
							CLIENTE_CG_NOMBRE_COMERCIAL,CLIENTE_CG_TELEFONO,
							CLIENTE_CG_EMAIL_UNO,CLIENTE_CG_EMAIL_DOS,CLIENTE_CG_CURP,
							CLIENTE_CG_MONEDA,CLINETE_CG_CLASIFICACION,CLIENTE_CG_FECHA_ALTA,
							CLIENTE_CG_OBSERVACIONES) VALUES ('$datos[0]','$datos[1]','$datos[2]',
														'$datos[3]','$datos[4]','$datos[5]',
														'$datos[6]','$datos[7]','$datos[8]',
														'$datos[9]','$datos[10]','$datos[11]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosClienteG($idclienteg){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT CLIENTE_CVE_CG,CLIENTE_CG_RFC,CLIENTE_CG_NOMBRE,CLIENTE_CG_TIPO,CLIENTE_CG_NOMBRE_COMERCIAL,CLIENTE_CG_TELEFONO,CLIENTE_CG_EMAIL_UNO,CLIENTE_CG_EMAIL_DOS,CLIENTE_CG_CURP,CLIENTE_CG_MONEDA,CLINETE_CG_CLASIFICACION,CLIENTE_CG_FECHA_ALTA,CLIENTE_CG_OBSERVACIONES FROM cliente_general where CLIENTE_CVE_CG = '$idclienteg'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('CLIENTE_CVE_CG'=>$ver[0],'CLIENTE_CG_RFC'=>$ver[1],
						'CLIENTE_CG_NOMBRE'=>$ver[2],'CLIENTE_CG_TIPO'=>$ver[3],'CLIENTE_CG_NOMBRE_COMERCIAL'=>$ver[4],
						'CLIENTE_CG_TELEFONO'=>$ver[5],'CLIENTE_CG_EMAIL_UNO'=>$ver[6],
						'CLIENTE_CG_EMAIL_DOS'=>$ver[7],'CLIENTE_CG_CURP'=>$ver[8],'CLIENTE_CG_MONEDA'=>$ver[9],
						'CLINETE_CG_CLASIFICACION'=>$ver[10],'CLIENTE_CG_FECHA_ALTA'=>$ver[11],'CLIENTE_CG_OBSERVACIONES'=>$ver[12]);

			return $datos;
		}
		public function actualizaClienteG($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cliente_general set CLIENTE_CG_RFC='$datos[1]',
											CLIENTE_CG_NOMBRE='$datos[2]',
											CLIENTE_CG_TIPO='$datos[3]',
											CLIENTE_CG_NOMBRE_COMERCIAL='$datos[4]',
											CLIENTE_CG_TELEFONO='$datos[5]',
											CLIENTE_CG_EMAIL_UNO='$datos[6]',
											CLIENTE_CG_EMAIL_DOS='$datos[7]',
											CLIENTE_CG_CURP='$datos[8]',
											CLIENTE_CG_MONEDA='$datos[9]',
											CLINETE_CG_CLASIFICACION='$datos[10]',
											CLIENTE_CG_FECHA_ALTA='$datos[11]',
											CLIENTE_CG_OBSERVACIONES='$datos[12]' where CLIENTE_CVE_CG='$datos[0]'";
			

			return mysqli_query($conexion,$sql);
		}
		public function eliminaClienteG($idclienteg){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from cliente_general where CLIENTE_CVE_CG='$idclienteg'";

			return mysqli_query($conexion,$sql);
		}
	}
 
 ?>