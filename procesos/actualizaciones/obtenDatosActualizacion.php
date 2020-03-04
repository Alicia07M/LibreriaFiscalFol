<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Actualizaciones.php";

	$obj=new actualizaciones;
	
	echo json_encode($obj->obtenDatosActualizacion($_POST['idactualizacion']));

 ?>