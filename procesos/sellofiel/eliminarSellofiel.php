<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Sellofiel.php";

	$obj= new sellofiel;

	echo $obj->eliminaSellofiel($_POST['idsellofiel']);

 ?>