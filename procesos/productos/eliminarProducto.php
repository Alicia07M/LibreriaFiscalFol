<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj= new productos;

	echo $obj->eliminaProducto($_POST['idproducto']);

 ?>