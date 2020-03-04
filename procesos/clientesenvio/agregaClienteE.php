<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteE.php";

	$obj= new clientese();

	$datos= array($_POST['rfc'],$_POST['callen'],$_POST['noext'],$_POST['noint'],$_POST['colonia'],$_POST['localidad'],$_POST['municipio'],$_POST['codpostal'],$_POST['entfederativa'],$_POST['pais'],$_POST['telefono'],$_POST['celular'],$_POST['obs']);

	echo $obj->agregaClienteE($datos);
 ?>