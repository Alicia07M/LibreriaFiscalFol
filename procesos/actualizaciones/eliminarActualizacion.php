<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Actualizaciones.php";

	$obj= new actualizaciones;

	echo $obj->eliminaActualizacion($_POST['idactualizacion']);

 ?>