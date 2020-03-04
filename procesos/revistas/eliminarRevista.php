<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Revistas.php";

	$obj= new revistas;

	echo $obj->eliminaRevista($_POST['idrevista']);

 ?>