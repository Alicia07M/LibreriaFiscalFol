<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteF.php";

	$obj= new clientesf();

	$datos= array($_POST['rfc'],$_POST['calle'],$_POST['noext'],$_POST['noint'],$_POST['colonia'],$_POST['localidad'],$_POST['municipio'],$_POST['cp'],$_POST['entfed']);

	echo $obj->agregaClienteF($datos);
 ?>