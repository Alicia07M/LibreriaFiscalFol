<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteF.php";

	$obj=new clientesf;
	
	echo json_encode($obj->obtenDatosClienteF($_POST['idclientef']));

 ?>