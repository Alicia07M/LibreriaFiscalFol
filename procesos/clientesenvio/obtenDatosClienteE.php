<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteE.php";

	$obj=new clientese;
	
	echo json_encode($obj->obtenDatosClienteE($_POST['idclientee']));

 ?>