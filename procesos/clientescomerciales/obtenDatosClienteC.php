<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteC.php";

	$obj=new clientesc;
	
	echo json_encode($obj->obtenDatosClienteC($_POST['idclientec']));

 ?>