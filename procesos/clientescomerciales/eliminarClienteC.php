<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteC.php";

	$obj= new clientesc;

	echo $obj->eliminaClienteC($_POST['idclientec']);

 ?>