<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Servicios.php";

	$obj= new servicios;

	$datos= array($_POST['actualizacionSelect'],$_POST['clave'],$_POST['clavesat'],$_POST['unidadsat'],$_POST['servicio'],$_POST['fechahora'],$_POST['precio']);

	echo $obj->agregaServicio($datos);

 ?>