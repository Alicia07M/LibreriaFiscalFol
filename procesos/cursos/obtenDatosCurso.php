<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Cursos.php";

	$obj= new cursos;

	echo json_encode($obj->obtenDatosCurso($_POST['idcurso']));

 ?>