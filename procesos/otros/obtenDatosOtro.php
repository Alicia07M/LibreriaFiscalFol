<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Otros.php";

	$obj= new otros;

	echo json_encode($obj->obtenDatosOtro($_POST['idotro']));

 ?>