<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteCO.php";

	$obj=new clientesco;
	
	echo json_encode($obj->obtenDatosClienteCO($_POST['idclienteco']));

 ?>