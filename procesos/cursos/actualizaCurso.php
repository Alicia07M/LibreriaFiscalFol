<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Cursos.php";

	$obj = new cursos;

	$datos=array($_POST['idCurso'],$_POST['claveU'],
				$_POST['cursoU'],$_POST['fechacU'],
				$_POST['lugarU'],$_POST['precioU']);

	echo $obj->actualizaCurso($datos);

 ?>