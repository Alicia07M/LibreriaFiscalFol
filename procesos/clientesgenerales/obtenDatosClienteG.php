<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteG.php";

	$obj=new clientesg;
	
	echo json_encode($obj->obtenDatosClienteG($_POST['idclienteg']));

 ?>