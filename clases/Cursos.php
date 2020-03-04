<?php 

	class cursos{
		public function agregaCurso($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO servicio_curso_lff (SEC_CLAVE, SEC_CLAVE_SAT,SEC_CLAVE_UNIDAD_SAT,SEC_NOMBRE_CURSO,SEC_FECHA_CURSO,SEC_LUGAR_CURSO,SEC_PRECIO) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

			return mysqli_query($conexion,$sql);
		} 
		public function obtenDatosCurso($idcurso){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT SEC_CVE_CURSO,SEC_CLAVE,SEC_NOMBRE_CURSO,SEC_FECHA_CURSO,SEC_LUGAR_CURSO,SEC_PRECIO FROM SERVICIO_CURSO_LFF where SEC_CVE_CURSO='$idcurso'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array('SEC_CVE_CURSO'=>$ver[0],'SEC_CLAVE'=>$ver[1],
						'SEC_NOMBRE_CURSO'=>$ver[2],'SEC_FECHA_CURSO'=>$ver[3],
						'SEC_LUGAR_CURSO'=>$ver[4], 'SEC_PRECIO'=>$ver[5]);

			return $datos;
		}
		public function actualizaCurso($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE servicio_curso_lff set SEC_CLAVE='$datos[1]',SEC_NOMBRE_CURSO='$datos[2]',SEC_FECHA_CURSO='$datos[3]', SEC_LUGAR_CURSO='$datos[4]',SEC_PRECIO='$datos[5]' where SEC_CVE_CURSO='$datos[0]'";
			

			return mysqli_query($conexion,$sql);
		}
		public function eliminaCurso($idcurso){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from servicio_curso_lff where SEC_CVE_CURSO='$idcurso'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>