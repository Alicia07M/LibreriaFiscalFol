<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Clientesc.php";

	$obj= new clientesc();

	$datos= array($_POST['rfc'],$_POST['tipo'],$_POST['notimbre'],$_POST['fechap'],$_POST['vigencia'],
		$_POST['facturafol'],$_POST['facturasfacil'],$_POST['serien'],$_POST['poliza'],$_POST['seriea'],
		$_POST['programap'],$_POST['descuento'],$_POST['iva'],$_POST['riva'],$_POST['isr'],
		$_POST['eips'],$_POST['imp'],$_POST['agenda'],$_POST['complementos']);

	echo $obj->agregaClientec($datos);
 ?>