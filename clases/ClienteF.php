<?php 

	class clientesf{
		public function agregaClienteF($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_fiscales (CLIENTE_CG_RFC,CLIENTE_FIS_CALLE,
							CLIENTE_FIS_NO_EXT,CLIENTE_FIS_NO_INT,
							CLIENTE_FIS_COLONIA,CLIENTE_FIS_LOCALIDAD,CLIENTE_FIS_MUNICIPIO,
							CLIENTE_FIS_CODIGO_POSTAL,CLIENTE_FIS_ENTIDAD_FEDERATIVA) 
							VALUES ('$datos[0]','$datos[1]','$datos[2]',
									'$datos[3]','$datos[4]','$datos[5]',
									'$datos[6]','$datos[7]','$datos[8]')";
			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosClienteF($idclientef){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT CLIENTE_CVE_CG,CLIENTE_CG_RFC,CLIENTE_FIS_CALLE,CLIENTE_FIS_NO_EXT,CLIENTE_FIS_NO_INT,CLIENTE_FIS_COLONIA,CLIENTE_FIS_LOCALIDAD,CLIENTE_FIS_MUNICIPIO,CLIENTE_FIS_CODIGO_POSTAL,CLIENTE_FIS_ENTIDAD_FEDERATIVA FROM cliente_fiscales where CLIENTE_CVE_CG = '$idclientef'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('CLIENTE_CVE_CG'=>$ver[0],'CLIENTE_CG_RFC'=>$ver[1],
						'CLIENTE_FIS_CALLE'=>$ver[2],'CLIENTE_FIS_NO_EXT'=>$ver[3],'CLIENTE_FIS_NO_INT'=>$ver[4],
						'CLIENTE_FIS_COLONIA'=>$ver[5],'CLIENTE_FIS_LOCALIDAD'=>$ver[6],
						'CLIENTE_FIS_MUNICIPIO'=>$ver[7],'CLIENTE_FIS_CODIGO_POSTAL'=>$ver[8],'CLIENTE_FIS_ENTIDAD_FEDERATIVA'=>$ver[9]);

			return $datos;
		}
		public function actualizaClienteF($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cliente_fiscales set CLIENTE_CG_RFC='$datos[1]',
											CLIENTE_FIS_CALLE='$datos[2]',
											CLIENTE_FIS_NO_EXT='$datos[3]',
											CLIENTE_FIS_NO_INT='$datos[4]',
											CLIENTE_FIS_COLONIA='$datos[5]',
											CLIENTE_FIS_LOCALIDAD='$datos[6]',
											CLIENTE_FIS_MUNICIPIO='$datos[7]',
											CLIENTE_FIS_CODIGO_POSTAL='$datos[8]',
											CLIENTE_FIS_ENTIDAD_FEDERATIVA='$datos[9]'
										 where CLIENTE_CVE_CG='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}
		public function eliminaClienteF($idclientef){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from cliente_fiscales where CLIENTE_CVE_CG='$idclientef'";

			return mysqli_query($conexion,$sql);
		}
	}
 ?>