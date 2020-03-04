<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteF.php";

	$obj= new clientesf;

	echo $obj->eliminaClienteF($_POST['idclientef']);

 ?>