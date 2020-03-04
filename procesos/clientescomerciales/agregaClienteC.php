<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteC.php";

	$obj= new clientesc();

	$datos= array($_POST['rfc'],$_POST['descuento'],$_POST['iva'],$_POST['tasaiva'],$_POST['tasaisr'],$_POST['ieps'],$_POST['implocal'],$_POST['agenda'],$_POST['complemento']);

	echo $obj->agregaClienteC($datos);
 ?>