<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj = new productos;

	$datos=array($_POST['idProducto'],$_POST['claveU'],$_POST['nombreU'],
				$_POST['precioU'],$_POST['anoU'],
				$_POST['editorialU'],$_POST['tipoU']);

	echo $obj->actualizaProducto($datos);

 ?>