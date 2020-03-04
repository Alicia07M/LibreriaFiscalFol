<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Cursos.php";

	$obj= new cursos();

	$datos= array($_POST['clave'],$_POST['clavesat'],$_POST['unidadsat'],$_POST['curso'],$_POST['fechac'],$_POST['lugar'],$_POST['precio']);

	echo $obj->agregaCurso($datos);
 ?>