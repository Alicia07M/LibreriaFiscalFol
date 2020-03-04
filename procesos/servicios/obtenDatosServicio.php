<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Servicios.php";

	$obj= new servicios;

	echo json_encode($obj->obtenDatosServicio($_POST['idservicio']));

 ?>