<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteG.php";

	$obj= new clientesg;

	echo $obj->eliminaClienteG($_POST['idclienteg']);

 ?>