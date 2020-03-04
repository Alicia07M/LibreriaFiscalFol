<?php 

	class clientese{
		public function agregaClienteE($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO  cliente_envio (
							CLIENTE_CG_RFC,CLIENTE_CE_CALLE,CLIENTE_CE_NUMERO_EXTERIOR,CLIENTE_CE_NUMERO_INTERIOR,CLIENTE_CE_COLONIA,CLIENTE_CE_LOCALIDAD,CLIENTE_CE_MUNICIPIO,CLIENTE_CE_CODIGO_POSTAL,CLIENTE_CE_ENTIDAD,CLIENTE_CE_PAIS,CLIENTE_CE_TELEFONO,CLIENTE_CE_CELULAR,CLIENTE_CE_OBSERVACIONES) VALUES (
							'$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]',
							'$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]')";

			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosClienteE($idclientee){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT CLIENTE_CVE_CG,CLIENTE_CG_RFC,CLIENTE_CE_CALLE,CLIENTE_CE_NUMERO_EXTERIOR,CLIENTE_CE_NUMERO_INTERIOR,CLIENTE_CE_COLONIA,CLIENTE_CE_LOCALIDAD,CLIENTE_CE_MUNICIPIO,CLIENTE_CE_CODIGO_POSTAL,CLIENTE_CE_ENTIDAD,CLIENTE_CE_PAIS,CLIENTE_CE_TELEFONO,CLIENTE_CE_CELULAR,CLIENTE_CE_OBSERVACIONES FROM cliente_envio where CLIENTE_CVE_CG = '$idclientee'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('CLIENTE_CVE_CG'=>$ver[0],'CLIENTE_CG_RFC'=>$ver[1],
						'CLIENTE_CE_CALLE'=>$ver[2],'CLIENTE_CE_NUMERO_EXTERIOR'=>$ver[3],'CLIENTE_CE_NUMERO_INTERIOR'=>$ver[4],
						'CLIENTE_CE_COLONIA'=>$ver[5],'CLIENTE_CE_LOCALIDAD'=>$ver[6],
						'CLIENTE_CE_MUNICIPIO'=>$ver[7],'CLIENTE_CE_CODIGO_POSTAL'=>$ver[8],'CLIENTE_CE_ENTIDAD'=>$ver[9],
						'CLIENTE_CE_PAIS'=>$ver[10],'CLIENTE_CE_TELEFONO'=>$ver[11],'CLIENTE_CE_CELULAR'=>$ver[12],'CLIENTE_CE_OBSERVACIONES'=>$ver[13]);

			return $datos;
		}
		public function actualizaClienteE($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cliente_envio set CLIENTE_CG_RFC='$datos[1]',
											CLIENTE_CE_CALLE='$datos[2]',
											CLIENTE_CE_NUMERO_EXTERIOR='$datos[3]',
											CLIENTE_CE_NUMERO_INTERIOR='$datos[4]',
											CLIENTE_CE_COLONIA='$datos[5]',
											CLIENTE_CE_LOCALIDAD='$datos[6]',
											CLIENTE_CE_MUNICIPIO='$datos[7]',
											CLIENTE_CE_CODIGO_POSTAL='$datos[8]',
											CLIENTE_CE_ENTIDAD='$datos[9]',
											CLIENTE_CE_PAIS='$datos[10]',
											CLIENTE_CE_TELEFONO='$datos[11]',
											CLIENTE_CE_CELULAR='$datos[12]',
											CLIENTE_CE_OBSERVACIONES='$datos[12]' where CLIENTE_CVE_CG='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminaClienteE($idclientee){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from cliente_envio where CLIENTE_CVE_CG='$idclientee'";

			return mysqli_query($conexion,$sql);
		}
	}
 
 ?>