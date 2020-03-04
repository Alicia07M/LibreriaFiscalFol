<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteE.php";

	$obj= new clientese;

	echo $obj->eliminaClienteE($_POST['idclientee']);

 ?>