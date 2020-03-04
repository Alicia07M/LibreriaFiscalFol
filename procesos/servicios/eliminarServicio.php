<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Servicios.php";

	$obj= new servicios;

	echo $obj->eliminaServicio($_POST['idservicio']);

 ?>