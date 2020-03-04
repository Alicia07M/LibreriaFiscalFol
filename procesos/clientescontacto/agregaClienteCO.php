<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteCO.php";

	$obj= new clientesco();

	$datos= array($_POST['rfc'],$_POST['nombre'],$_POST['telefono'],
				  $_POST['celular'],$_POST['email1'],$_POST['email2'],$_POST['obs']);

	echo $obj->agregaClienteCO($datos);
 ?>