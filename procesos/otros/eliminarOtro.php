<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Otros.php";

	$obj= new otros;

	echo $obj->eliminaOtro($_POST['idotro']);

 ?>