<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Cursos.php";

	$obj= new cursos;

	echo $obj->eliminaCurso($_POST['idcurso']);

 ?>