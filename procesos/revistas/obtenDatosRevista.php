<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Revistas.php";

	$obj= new revistas;

	echo json_encode($obj->obtenDatosRevista($_POST['idrevista']));

 ?>