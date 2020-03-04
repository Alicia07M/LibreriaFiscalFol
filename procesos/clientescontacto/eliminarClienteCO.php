<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteCO.php";

	$obj= new clientesco;

	echo $obj->eliminaClienteCO($_POST['idclienteco']);

 ?>