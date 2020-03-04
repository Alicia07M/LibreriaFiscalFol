<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Sellofiel.php";

	$obj= new sellofiel;

	$datos= array($_POST['clave'],$_POST['clavesat'],
				  $_POST['unidadsat'],$_POST['precio']);

	echo $obj->agregaSellofiel($datos);

 ?>