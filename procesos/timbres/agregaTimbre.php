<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Timbres.php";

	$obj= new timbres;

	$datos= array($_POST['clave'],$_POST['clavesat'],$_POST['unidadsat'],$_POST['factura'],$_POST['nomina'],$_POST['retenciones'],$_POST['precio']);

	echo $obj->agregaTimbre($datos);

 ?>