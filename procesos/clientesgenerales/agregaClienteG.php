<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteG.php";

	$obj= new clientesg();

	$datos= array($_POST['rfc'],$_POST['nombre'],$_POST['tipo'],$_POST['nomcomercial'],$_POST['telefono'],$_POST['email1'],$_POST['email2'],$_POST['curp'],$_POST['moneda'],$_POST['clasificacion'],$_POST['fecha'],$_POST['obs']);

	echo $obj->agregaClienteG($datos);
 ?>