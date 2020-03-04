<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Timbres.php";

	$obj= new timbres;

	echo json_encode($obj->obtenDatosTimbre($_POST['idtimbre']));

 ?>