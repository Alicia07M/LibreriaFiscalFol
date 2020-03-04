<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Sellofiel.php";

	$obj= new sellofiel;

	echo json_encode($obj->obtenDatosSellofiel($_POST['idsellofiel']));

 ?>