<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Timbres.php";

	$obj= new timbres;

	echo $obj->eliminaTimbre($_POST['idtimbre']);

 ?>