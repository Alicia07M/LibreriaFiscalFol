<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj= new productos;

	$datos= array($_POST['clave'],$_POST['clavesat'],$_POST['unidadsat'],$_POST['nombre'],$_POST['precio'],$_POST['ano'],$_POST['editorial'],$_POST['tipo']);

	echo $obj->agregaProducto($datos);

 ?>