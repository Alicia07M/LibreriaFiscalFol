<?php 

	class usuarios{
		public function registroUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();


			$sql="INSERT into USUARIO_LFF (USU_LFF_NOMBRE,USU_LFF_APELLIDO,USU_LFF_ROL,USU_LFF_USUARIO,USU_LFF_CONTRASENA) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";

			return mysqli_query($conexion,$sql);
		}
		public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$_SESSION['usuario']=$datos[0];
			$_SESSION['nRol']=self::traeRol($datos);

			$sql="SELECT * from USUARIO_LFF where USU_LFF_USUARIO='$datos[0]' and USU_LFF_CONTRASENA='$datos[1]'";

			$result=mysqli_query($conexion,$sql);

			if (mysqli_num_rows($result)>0) {
				return 1;
			}else{
				return 0;
			}
		}
		public function traeRol($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT USU_LFF_ROL from USUARIO_LFF where USU_LFF_USUARIO='$datos[0]'";


			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}
		public function obtenDatosUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT USU_LFF_CVE_ID,USU_LFF_NOMBRE,USU_LFF_APELLIDO,USU_LFF_ROL,USU_LFF_USUARIO, USU_LFF_CONTRASENA from USUARIO_LFF where USU_LFF_CVE_ID='$idusuario'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('USU_LFF_CVE_ID'=>$ver[0],'USU_LFF_NOMBRE'=>$ver[1],
						'USU_LFF_APELLIDO'=>$ver[2],'USU_LFF_ROL'=>$ver[3],
						'USU_LFF_USUARIO'=>$ver[4], 'USU_LFF_CONTRASENA'=>$ver[5]);

			return $datos;
		}
		public function actualizaUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE USUARIO_LFF set USU_LFF_NOMBRE='$datos[1]',USU_LFF_APELLIDO='$datos[2]',USU_LFF_ROL='$datos[3]',USU_LFF_USUARIO='$datos[4]', USU_LFF_CONTRASENA='$datos[5]' where USU_LFF_CVE_ID='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}
		public function eliminaUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from USUARIO_LFF where USU_LFF_CVE_ID='$idusuario'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>