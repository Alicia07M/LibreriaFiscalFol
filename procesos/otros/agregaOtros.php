<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Otros.php";

	$obj= new otros;

	$datos= array($_POST['otro'],$_POST['descripcion'],$_POST['precio'],$_POST['clave'],$_POST['clavesat'],$_POST['unidadsat']);

	echo $obj->agregaOtros($datos);
 ?>